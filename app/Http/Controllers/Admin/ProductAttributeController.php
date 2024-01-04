<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductAttributeController extends Controller
{
    protected function productAttributeSearchValidator(array $data)
    {
        $messages = [
            'required' => 'Поле :attribute обязательно для заполнения.',
            'min' => 'Поле :attribute должно быть не менее :min',
            'max' => 'Поле :attribute должно быть не более :max',
        ];

        $names = [
            'query' => 'запрос',
        ];

        return Validator::make($data, [
            'query' => ['required', 'string', 'min:1', 'max:255'],
        ], $messages, $names);
    }
    public function search(Request $request)
    {
        $this->productAttributeSearchValidator($request->all())->validate();
        $attributes = ProductAttribute::select('id','name as text')->where('name', 'like', '%' . $request->input('query') . '%')->orderBy('name')->get()->toArray();
        return response()->json($attributes);
    }
}
