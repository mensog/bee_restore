<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Delivery;
use App\Order;
use App\OrderStatus;
use App\Promocode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    protected function orderCreateValidator(array $data)
    {
        $messages = [
            'required' => 'Поле :attribute обязательно для заполнения.',
            'phone.min' => 'Телефон должен состоять из 11 символов (7 XXX XXX XX XX)',
            'phone.max' => 'Телефон должен состоять из 11 символов (7 XXX XXX XX XX)',
            'max' => 'Поле :attribute должно содержать не более :max символов',
        ];

        $names = [
            'fullName' => 'имя и фамилия',
            'email' => 'e-mail',
            'phone' => 'телефон',
            'address' => 'адрес',
        ];

        return Validator::make($data, [
            'fullName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string', 'min:11', 'max:11'],
            'address' => ['required', 'string', 'max:255'],
        ], $messages, $names);
    }

    /**
     * Контроллер создания заказа
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $cart = Cart::current();
        $user = Auth::user();
        if (count($cart->content) == 0) {
            return redirect()->route('cart');
        }
        if (Order::WEIGHT_MAX_LIMIT < $cart->getTotalWeight() || Order::WEIGHT_MIN_LIMIT > $cart->getTotalWeight()) {
            return redirect()->route('cart');
        }
        $this->orderCreateValidator($request->all())->validate();
        $order = new Order();
        $order->user_id = $user->id;
        $order->full_name = $request->input('fullName');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->status = OrderStatus::PAID;
        $order->delivery_id = $request->input('delivery');
        if (env('FREE_FIRST_DELIVERY_ENABLED') && $user->orders->count() == 0) {
            $order->delivery_amount = 0;
        } else {
            $order->delivery_amount = Delivery::find($request->input('delivery'))->price;
        }
        $order->save();
        $order->fillFromCart($cart);
        $order = Order::where('id', $order->id)->with('items')->first();
        $order->fillOrderStores();
        $itemsSum = $order->getItemsSum();
        if ($cart->bonus_discount > $itemsSum) {
            $amountToWithdrawFromPrivateAccount = $itemsSum;
        } else {
            $amountToWithdrawFromPrivateAccount = $cart->bonus_discount;
        }
        $withdrawFromPrivateAccountResult = $user->privateAccount->withdraw($amountToWithdrawFromPrivateAccount);
        if ($withdrawFromPrivateAccountResult) {
            $order->bonus_discount = $amountToWithdrawFromPrivateAccount;
        } else {
            $order->bonus_discount = 0;
        }
        $promocodeDiscount = 0;
        if (!is_null($cart->promocode)) {
            $promocode = Promocode::where('name', $cart->promocode)->first();
            if ($promocode) {
                $promocodeDiscount = $promocode->getCurrencyAmountFromTotal($itemsSum - $order->bonus_discount);
                if ($promocodeDiscount > $itemsSum - $order->bonus_discount) {
                    $order->promocode_discount = $itemsSum - $order->bonus_discount;
                } else {
                    $order->promocode_discount = $promocodeDiscount;
                }
                $order->promocode_name = $cart->promocode;
            }
        }
        $order->amount_paid = $order->getSum() - $order->bonus_discount - $order->promocode_discount;
        $amountToPay = $order->getSum() - $order->bonus_discount - $order->promocode_discount;
        $order->amount_paid = $amountToPay;
        $order->sendStatusNotification();
        $request->session()->flash('createdOrderId', $order->id);
        $order->save();
        $cart->clear();
        return redirect()->route('lk_orders');
    }
}
