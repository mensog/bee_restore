<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notifications\OrderRefundedNotification;
use App\Models\OrderItem;
use App\Models\OrderItemStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderItemController extends Controller
{
    protected function orderItemQuantityValidator(array $data)
    {
        $messages = [
            'required' => 'Поле :attribute обязательно для заполнения.',
            'min' => 'Поле :attribute должно быть не менее :min',
            'max' => 'Поле :attribute должно быть не более :max',
        ];

        $names = [
            'quantity' => 'количество',
        ];

        return Validator::make($data, [
            'quantity' => ['required', 'integer', 'min:0', 'max:10000'],
        ], $messages, $names);
    }

    public function updateQuantity(Request $request, $id)
    {
        $this->orderItemQuantityValidator($request->all())->validate();
        $item = OrderItem::findOrFail($id);
        $quantity = (int)$request->input('quantity');
        $item->stock_quantity = $quantity;
        $item->save();
        $totalSum = $item->order->getSum();
        $finalSum = $item->order->getFinalSum();
        $response = [
            'itemTotal' => $item->price * $quantity,
            'final' => $finalSum,
            'refund' => $totalSum - $finalSum,
        ];
        return response()->json($response);
    }


    public function updateStatus(Request $request, $id)
    {
        $possibleStatuses = [];
        $status = $request->input('status');
        if (!in_array($status, $possibleStatuses)) {
            response('Неизвестный статус', 404);
        }
        $item = OrderItem::findOrFail($id);
        $item->status = $status;
        $item->save();
        if ($item->status == OrderItemStatus::REFUNDED) {
            $item->order->user->notify(new OrderRefundedNotification($item->order, $item->product));
        }
        return response('', 200);
    }
}
