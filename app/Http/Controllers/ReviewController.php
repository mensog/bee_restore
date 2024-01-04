<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    protected function reviewCreateValidator(array $data)
    {
        $messages = [
            'required' => 'Поле :attribute обязательно для заполнения.',
            'max' => 'Поле :attribute должно содержать не более :max символов',
        ];

        $names = [
            'rating' => 'оценка',
            'advantages' => 'достоинства',
            'disadvantages' => 'недостатки',
            'comment' => 'комментарий',
        ];

        return Validator::make($data, [
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'advantages' => ['string', 'max:4000'],
            'disadvantages' => ['string', 'max:4000'],
            'comment' => ['string', 'max:4000'],
        ], $messages, $names);
    }


    public function create(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('createReview', $product);
        $this->reviewCreateValidator($request->all())->validate();
        $review = new Review();
        $review->user_id = auth()->user()->id;
        $review->product_id = $product->id;
        $review->rating = $request->input('rating');
        if ($request->has('advantages') && $request->input('advantages')) {
            $review->advantages = $request->input('advantages');
        }
        if ($request->has('disadvantages') && $request->input('disadvantages')) {
            $review->disadvantages = $request->input('disadvantages');
        }
        if ($request->has('comment') && $request->input('comment')) {
            $review->comment = $request->input('comment');
        }
        $review->save();
        return redirect()->back();
    }
}
