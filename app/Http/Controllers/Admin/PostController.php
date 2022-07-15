<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\VarDumper\Cloner\Data;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getValidationRules());

        $current_data = $request->all();

        if (isset($current_data['image'])) {
            $image_path = Storage::put('post_covers', $current_data['image']);
            $current_data['cover'] = $image_path;
        }

        $new_post = new Post();
        $new_post->fill($current_data);
        $new_post->slug = Post::generatePostSlugFromTitle($new_post->title);
        $new_post->save();

        if (isset($current_data['tags'])) {
            $new_post->tags()->sync($current_data['tags']);
        }

        return redirect()->route('admin.posts.show', ['post' => $new_post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $selected_post = Post::findOrFail($id);
        $category = $selected_post->category;
        return view('admin.posts.show', compact('selected_post', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selected_post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('selected_post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->getValidationRules());

        $current_data = $request->all();
        $post_to_update = Post::findOrFail($id);

        if (isset($current_data['image'])) {

            if ($post_to_update->cover) {
                Storage::delete($post_to_update->cover);
            }

            $image_path = Storage::put('post_covers', $current_data['image']);
            $current_data['cover'] = $image_path;
        }

        $current_data['slug'] = Post::generatePostSlugFromTitle($post_to_update->title);
        $post_to_update->update($current_data);

        if (isset($current_data['tags'])) {
            $post_to_update->tags()->sync($current_data['tags']);
        } else {
            $post_to_update->tags()->sync([]);
        }

        return redirect()->route('admin.posts.show', ['post' => $post_to_update->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post_to_delete = Post::findOrFail($id);
        $post_to_delete->slug .= $post_to_delete->id;
        $post_to_delete->save();
        $post_to_delete->tags()->sync([]);
        $post_to_delete->delete();
        return redirect()->route('admin.posts.index');
    }

    private function getValidationRules()
    {
        return [
            'title' => 'required|max:255',
            'text' => 'required|max:30000',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
            'image' => 'nullable|max:400'
        ];
    }
}
