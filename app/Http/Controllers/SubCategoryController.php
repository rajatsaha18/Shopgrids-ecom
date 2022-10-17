<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    private $categories;
    private $category;
    public function index()
    {
        $this->categories = Category::all();
        return view('admin.subcategory.index', ['categories' => $this->categories]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sub_categories'
        ]);
        SubCategory::newSubCategory($request);
        return redirect('/add-sub-category')->with('message','subcategory add successfully');

    }

    public function manage()
    {
        $this->categories = SubCategory::all();
        return view('admin.subcategory.manage', ['subCategories' => $this->categories]);
    }

    public function edit($id)
    {
        $this->category = SubCategory::find($id);
        return view('admin.subcategory.edit', ['category' => $this->category]);
    }

    public function update(Request $request, $id)
    {
        SubCategory::updateSubCategory($request,$id);
        return redirect('/manage-sub-category')->with('message', 'Update sub-category successfully');

    }

    public function delete($id)
    {
        SubCategory::deleteSubCategory($id);
        return redirect('/manage-sub-category');
    }
}
