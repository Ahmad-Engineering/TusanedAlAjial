<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::where('admin_id', auth('admin')->user()->id)->get();
        $category_count = Category::where('admin_id', auth('admin')->user()->id)->count();
        if ($category_count == 0)
            return redirect()->route('admin.dashbord');
        return response()->view('cpanel.category.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('cpanel.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3|max:30',
            'category_image' => 'required|image|mimes:jpg,png,jpeg|max:5024',
            'status' => 'required|boolean',
        ]);
        //

        if (!$validator->fails()) {
            $category = new Category();
            $category->name = $request->get('name');
            $category->status = $request->get('status');
            $category_image = $request->file('category_image');
            $category_image_name = time() . '_category_' . auth('admin')->user()->id . '_.' . $category_image->getClientOriginalExtension();
            $category_image->move(public_path('/images/categories/'), $category_image_name);
            $category->image = $category_image_name;
            $category->admin_id = auth('admin')->user()->id;

            $isSaved = $category->save();

            return response()->json([
                'message' => $isSaved ? 'Category created successfully' : 'Faild to create category'
            ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        if ($category->admin_id != auth('admin')->user()->id)
            return redirect()->route('admin.dashbord');
        return response()->view('cpanel.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3|max:30',
            'status' => 'required|boolean',
        ]);
        //
        if (!$validator->fails()) {
            $category = Category::where('id', $id)
                ->where('admin_id', auth('admin')->user()->id)
                ->first();
            if (is_null($category)) {
                return redirect()->route('admin.dashbord');
            }
            $category->name = $request->get('name');
            $category->status = $request->get('status');
            if (is_null($request->get('category_image'))) {
                $category_image = $request->file('category_image');
                $category_image_name = time() . '_category_' . auth('admin')->user()->id . '_.' . $category_image->getClientOriginalExtension();
                $category_image->move(public_path('/images/categories/'), $category_image_name);
                $category->image = $category_image_name;
            }
            $category->admin_id = auth('admin')->user()->id;

            $isSaved = $category->save();

            return response()->json([
                'message' => $isSaved ? 'Category updated successfully' : 'Faild to update category'
            ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        if ($category->delete()) {
            return response()->json([
                'icon' => 'success',
                'title' => 'Deleted',
                'text' => 'Category deleted successfully',
            ], Response::HTTP_OK);
        }else {
            return response()->json([
                'icon' => 'error',
                'title' => 'Faild',
                'text' => 'Faild to delete cateogry',
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
