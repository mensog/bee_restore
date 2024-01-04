<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderStore;
use App\Models\OrderStoreStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderStoreController extends Controller
{
    public function updateStatus(Request $request, $id)
    {
        $possibleStatuses = [
            OrderStoreStatus::CREATED,
            OrderStoreStatus::ORDERED,
            OrderStoreStatus::READY_FOR_DELIVERY,
            OrderStoreStatus::PAID,
            OrderStoreStatus::CANCELED,
        ];
        $status = $request->input('status');
        if (!in_array($status, $possibleStatuses)) {
            response('Неизвестный статус', 404);
        }
        $store = OrderStore::findOrFail($id);
        $store->status = $status;
        $store->save();
        response('', 200);
    }

    protected function storeOrderIdValidator(array $data)
    {
        $messages = [
            'required' => 'Поле :attribute обязательно для заполнения.',
            'min' => 'Поле :attribute должно быть не менее :min',
            'max' => 'Поле :attribute должно быть не более :max',
        ];

        $names = [
            'externalStoreOrderId' => 'ID',
        ];

        return Validator::make($data, [
            'externalStoreOrderId' => ['required', 'string', 'min:0', 'max:255'],
        ], $messages, $names);
    }

    public function updateStoreOrderId(Request $request, $id)
    {
        $this->storeOrderIdValidator($request->all())->validate();
        $store = OrderStore::findOrFail($id);
        $store->store_order_id = $request->input('externalStoreOrderId');
        $store->save();
        response('', 200);
    }
}
