<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function showEditPage(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        return view('pages.admin.review.edit',['review' => $review]);
    }

    protected function reviewUpdateValidator(array $data)
    {
        $messages = [
            'required' => 'Поле :attribute обязательно для заполнения.',
            'max' => 'Поле :attribute должно содержать не более :max символов',
        ];

        $names = [
            'advantages' => 'достоинства',
            'disadvantages' => 'недостатки',
            'comment' => 'комментарий',
        ];

        return Validator::make($data, [
            'advantages' => ['string', 'max:4000', 'nullable'],
            'disadvantages' => ['string', 'max:4000', 'nullable'],
            'comment' => ['string', 'max:4000', 'nullable'],
        ], $messages, $names);
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $this->reviewUpdateValidator($request->all())->validate();
        $review->advantages = $request->input('advantages');
        $review->disadvantages = $request->input('disadvantages');
        $review->comment = $request->input('comment');
        $review->save();
        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $productId = $review->product_id;
        $review->delete();
        return redirect()->route('admin_product', $productId);
    }
}
