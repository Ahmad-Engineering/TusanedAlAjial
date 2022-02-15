<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'category_id' => 'required|integer|exists:categories,id',
            'text' => 'required|string|min:10|max:300',
            'title' => 'required|string|min:3|max:50',
        ]);
        //
        if (!$validator->fails()) {
            $category = Category::where('id', $request->get('category_id'))
            ->where('admin_id', auth('admin')->user()->id)
            ->first();

            if (!is_null($category)) {
                $post = new Post();
                $post->text = $request->get('text');
                if (is_null($request->get('post_image'))) {
                    $post_image = $request->file('post_image');
                    $post_image_name = time() . '_category_' . $request->get('category_id') . '_admin_' . auth('admin')->user()->id . '_.' . $post_image->getClientOriginalExtension();
                    $post_image->move(public_path('/images/posts/'), $post_image_name);
                    $post->image = $post_image_name;
                }
                $post->title = $request->get('title');
                $post->category_id = $request->get('category_id');
                $post->admin_id = auth('admin')->user()->id;
                $isSaved = $post->save();

                return response()->json([
                    'message' => $isSaved ? 'Posted success' : 'Faild to post',
                ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
            }else {
                return redirect()->route('admin.profile');
            }
        }else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
