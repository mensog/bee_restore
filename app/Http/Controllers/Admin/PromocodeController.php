<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promocode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PromocodeController extends Controller
{
    protected function promocodeValidator(array $data)
    {
        $messages = [
            'required' => 'Поле :attribute обязательно для заполнения.',
            'min' => 'Поле :attribute должно быть не менее :min',
            'max' => 'Поле :attribute должно быть не более :max',
            'integer' => 'Поле :attribute должно быть числом',
        ];

        $names = [
            'name' => 'название',
            'amount' => 'размер скидки',
        ];

        return Validator::make($data, [
            'name' => ['required', 'string', 'min:1', 'max:255'],
            'amount' => ['required', 'integer', 'min:0', 'max:999999'],
        ], $messages, $names);
    }

    public function index(Request $request)
    {
        $promocodes = Promocode::all();
        return view('pages.admin.promocode.index', ['promocodes' => $promocodes]);
    }

    public function showCreatePage(Request $request)
    {
        return view('pages.admin.promocode.create');
    }

    public function showEditPage(Request $request, $id)
    {
        $promocode = Promocode::findOrFail($id);
        return view('pages.admin.promocode.show', ['promocode' => $promocode]);
    }

    public function create(Request $request)
    {
        $this->promocodeValidator($request->all())->validate();
        $promocode = new Promocode();
        $promocode->name = $request->input('name');
        $promocode->amount = $request->input('amount') * 100;
        $promocode->save();
        return redirect(route('admin_promocode_update_page', $promocode->id));
    }

    public function update(Request $request, $id)
    {
        $this->promocodeValidator($request->all())->validate();
        $promocode = Promocode::findOrFail($id);
        $promocode->name = $request->input('name');
        $promocode->amount = $request->input('amount') * 100;
        $promocode->save();
        return redirect(route('admin_promocode_update_page', $promocode->id));

    }

    public function delete(Request $request, $id)
    {
        $promocode = Promocode::findOrFail($id);
        $promocode->delete();
        return redirect(route('admin_promocodes'));
    }
}
