<?php

namespace App\Http\Controllers\Admin;

use App\Courier;
use App\Delivery;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderStatus;
use App\Partner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Контроллер вывода заказов в админке
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::with('items', 'items.product')->with('courier')->get();
        return view('pages.admin.order.index', ['orders' => $orders]);
    }

    public function show($id)
    {
        $couriers = Courier::all();
        $order = Order::with('items', 'items.product')->with('courier')->where('id', $id)->firstOrFail();
        $delivery = $order->delivery()->withTrashed()->first();
        $groupedOrder = $order->items->groupBy(function ($item) {
            return $item->product->store_id;
        });
        $stores = Partner::whereIn('id', array_keys($groupedOrder->toArray()))->get();
        $orderStores = $order->orderStores->keyBy('store_id');
        $storeNames = $stores->pluck('company_name', 'id');
        $privateAccount = $order->user->privateAccount;
        return view('pages.admin.order.show', [
            'order' => $order,
            'groupedOrder' => $groupedOrder,
            'storeNames' => $storeNames,
            'orderStores' => $orderStores,
            'couriers' => $couriers,
            'account' => $privateAccount,
            'delivery' => $delivery
        ]);
    }

    public function changeOrder(Request $request, $id)
    {
        $order = Order::where('id', $id)->firstOrFail();
        $order->status = $request->input('status');
        $order->address = $request->input('address');
        $order->full_name = $request->input('fullName');
        $order->phone = preg_replace('~[+\- ()]+~', '', $request->input('phone'));
        $order->email = $request->input('email');
        $order->delivery_date = Carbon::createFromFormat('m/d/Y', $request->input('date'))->format('Y-m-d');
        $order->delivery_start_time = Carbon::createFromFormat('H:i', $request->input('timeFrom'))->format('H:i:s');
        $order->delivery_end_time = Carbon::createFromFormat('H:i', $request->input('timeTo'))->format('H:i:s');
        if ($request->input('status') == OrderStatus::COMPLETED) {
            $amountToRefund = $order->getSum() - $order->getFinalSum() - $order->refunded_amount;
            if ($amountToRefund > 0 ) {
                $privateAccount = $order->user->privateAccount;
                $privateAccount->refund_amount += $amountToRefund;
                $privateAccount->save();
                $order->refunded_amount += $amountToRefund;
            }
        }
        $order->save();
        $order->sendStatusNotification();

        return redirect()->route('admin_order', $id);
    }

    protected function commentUpdateValidator(array $data)
    {
        $messages = [
            'required' => 'Поле :attribute обязательно для заполнения.',
            'max' => 'Поле :attribute должно содержать не более :max символов',
        ];

        $names = [
            'comment' => 'Заметки',
        ];

        return Validator::make($data, [
            'comment' => ['required', 'string', 'max:2000'],
        ], $messages, $names);
    }

    public function updateComment(Request $request, $id)
    {
        $this->commentUpdateValidator($request->all())->validate();
        $order = Order::where('id', $id)->firstOrFail();
        $order->comment = $request->input('comment');
        $order->save();
        return response('', 200);
    }

    protected function courierUpdateValidator(array $data)
    {
        $messages = [
            'required' => 'Поле :attribute обязательно для заполнения.',
        ];

        $names = [
            'courierId' => 'ID курьера',
        ];

        return Validator::make($data, [
            'courierId' => ['required', 'integer'],
        ], $messages, $names);
    }

    public function updateCourier(Request $request, $id)
    {
        $this->courierUpdateValidator($request->all())->validate();
        $order = Order::where('id', $id)->firstOrFail();
        $content = '';
        if ($request->input('courierId') > 0) {
            $courier = Courier::where('id', $request->input('courierId'))->firstOrFail();
            $order->courier_id = $courier->id;
            $content = view('components.admin.order.courier-data', ['fullName'=> $courier->full_name, 'phone' => $courier->phone, 'carSize' => $order->car_size])->render();
        } else {
            $order->courier_id = null;
        }
        $order->save();
        return response($content, 200);
    }
}
