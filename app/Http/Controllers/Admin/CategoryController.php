<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parse_url')->orderBy('parent')->orderBy('name')->get()->groupBy('parent')->toArray();
        if (isset($categories[''])) {
            $rootCategory = $categories[''];
        } else {
            $rootCategory = [];
        }
        return view('pages.admin.category.index', ['rootCategory' => $rootCategory, 'categories' => $categories]);
    }

    public function unsortedIndex()
    {
        $parsedCategories = Category::whereNotNull('parse_url')->whereNull('move_to')->with('partner')->get();
        $categories = Category::whereNull('parse_url')->get();
        return view('pages.admin.category.unsorted', ['parsedCategories' => $parsedCategories, 'categories' => $categories]);
    }

    public function setParent(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $parent = (int) $request->input('parent');
        $category->setParent($parent);
        $category->save();
        return response('', 200);
    }

    public function setVisible(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $visibleStatus = (int) $request->input('visible');
        if ($visibleStatus > 0) {
            $category->visible = 1;
        } else {
            $category->visible = 0;
        }
        $category->save();
    }

    protected function categoryCreateOrUpdateValidator(array $data, $currentCategory)
    {
        $messages = [
            'required' => 'Поле :attribute обязательно для заполнения.',
            'min' => 'Поле :attribute должно быть не менее :min',
            'max' => 'Поле :attribute должно быть не более :max',
            'unique' => 'Такое значение :attribute уже занято, должно быть уникальным',
            'mimes' => 'Иконка должна быть в формате svg',
            'regex' => 'ЧПУ может содержать только английские буквы, цифры и знак дефиса',
        ];

        $names = [
            'name' => 'название',
            'friendlyUrlName' => 'ЧПУ',
            'visible' => 'видимость',
            'parent' => 'родительская категория',
        ];

        return Validator::make($data, [
            'name' => ['required', 'string', 'min:1', 'max:255'],
            'friendlyUrlName' => ['required', 'regex:/(^[a-z0-9-]+$)/i', 'string', \Illuminate\Validation\Rule::unique('categories','friendly_url_name')->ignore($currentCategory), 'min:1', 'max:255'],
            'visible' => ['sometimes', 'required', 'integer', 'min:0', 'max:1'],
            'parent' => ['required', 'integer'],
            'icon' => ['file', 'mimes:svg'],
        ], $messages, $names);
    }

    public function showEditPage(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::whereNull('parse_url')->orderBy('name')->get();
        return view('pages.admin.category.edit', ['category' => $category, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $this->categoryCreateOrUpdateValidator($request->all(), $id)->validate();
        $category->name = $request->input('name');
        $category->friendly_url_name = $request->input('friendlyUrlName');
        if($request->has('visible')) {
            $category->visible = 1;
        } else {
            $category->visible = 0;
        }
        $category->setParent($request->input('parent'));
        if ($request->hasFile('icon')) {
            if (!is_null($category->icon_path)) {
                $category->deleteIcon();
            }
            $path = Storage::putFileAs(Category::ICON_DIRECTORY, $request->file('icon'), $category->friendly_url_name . '.svg');
            $category->icon_path = $path;
        }
        $category->save();
        return redirect()->route('admin_edit_category_page', $category->id);
    }

    public function moveCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $newCategory = Category::findOrFail($request->input('newCategoryId'));
        if ($category->id == $newCategory->id) {
            return response('', 403);
        }
        Product::where('category_id', $category->id)->update(['category_id' => $newCategory->id]);
        $category->move_to = $newCategory->id;
        $category->save();
        return response('', 200);
    }

    public function showCreatePage()
    {
        $categories = Category::whereNull('parse_url')->orderBy('name')->get();
        return view('pages.admin.category.create', ['categories' => $categories]);
    }

    public function create(Request $request)
    {
        $this->categoryCreateOrUpdateValidator($request->all(), 0)->validate();
        $category = new Category();
        $category->name = $request->input('name');
        $category->friendly_url_name = $request->input('friendlyUrlName');
        if($request->has('visible')) {
            $category->visible = 1;
        } else {
            $category->visible = 0;
        }
        $category->setParent($request->input('parent'));
        $category->save();
        return redirect()->route('admin_edit_category_page', $category->id);
    }

    public function delete(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $newCategory = Category::findOrFail($request->input('moveToCategoryId'));
        Product::where('category_id', $category->id)->update(['category_id' => $newCategory->id]);
        Category::where('parent', $category->id)->update(['parent' => (is_null($category->parent)) ? null : $category->parent]);
        $category->delete();
        return redirect()->route('admin_categories');
    }

    public function breadcrumbs(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $breadcrumbs = $category->getBreadcrumbs();
        return response()->json($breadcrumbs);
    }

    public function deleteIcon(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->deleteIcon();
        return redirect()->back();
    }
}
