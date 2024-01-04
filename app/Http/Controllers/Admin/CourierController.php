<?php

namespace App\Http\Controllers\Admin;

use App\Courier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourierController extends Controller
{
    public function index()
    {
        $couriers = Courier::all();
        return view('pages.admin.courier.index', ['couriers' => $couriers]);
    }


    public function showCreatePage()
    {
        return view('pages.admin.courier.create');
    }

    public function show($id)
    {
        $courier = Courier::with('orders')->where('id', $id)->firstOrFail();
        return view('pages.admin.courier.show', ['courier' => $courier]);
    }

    protected function courierCreateOrUpdateValidator(array $data)
    {
        $messages = [
            'required' => 'Поле :attribute обязательно для заполнения.',
            'max' => 'Поле :attribute должно содержать не более :max символов',
        ];

        $names = [
            'fullName' => 'ФИО',
            'phone' => 'телефон',
            'carSize' => 'размер машины',
            'commission' => 'условия сотрудничества',
        ];

        return Validator::make($data, [
            'fullName' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'carSize' => ['required', 'string', 'max:255'],
            'commission' => ['required', 'integer', 'max:100'],
        ], $messages, $names);
    }

    public function create(Request $request)
    {
        $this->courierCreateOrUpdateValidator($request->all())->validate();
        $courier = new Courier();
        $courier->full_name = $request->input('fullName');
        $courier->phone = $request->input('phone');
        $courier->car_size = $request->input('carSize');
        $courier->commission = $request->input('commission');
        $courier->save();
        return redirect()->route('admin_courier', $courier->id);
    }

    public function showUpdatePage(Request $request, $id)
    {
        $courier = Courier::findOrFail($id);
        return view('pages.admin.courier.edit', ['courier' => $courier]);
    }

    public function update(Request $request, $id)
    {
        $this->courierCreateOrUpdateValidator($request->all())->validate();
        $courier = Courier::findOrFail($id);
        $courier->full_name = $request->input('fullName');
        $courier->phone = $request->input('phone');
        $courier->car_size = $request->input('carSize');
        $courier->commission = $request->input('commission');
        $courier->save();
        return redirect()->route('admin_courier', $courier->id);
    }
}
