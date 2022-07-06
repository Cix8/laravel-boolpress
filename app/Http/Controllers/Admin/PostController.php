<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        return view('admin.posts.create');
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
        $new_post = new Post();
        $new_post->fill($current_data);
        $new_post->slug = $this->generatePostSlugFromTitle($new_post->title);
        $new_post->save();

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
        return view('admin.posts.show', compact('selected_post'));
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
        return view('admin.posts.edit', compact('selected_post'));
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
        $post_to_update->fill($current_data);
        $post_to_update->slug = $this->generatePostSlugFromTitle($post_to_update->title);
        $post_to_update->save();

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
        $post_to_delete->delete();
        return redirect()->route('admin.posts.index');
    }

    private function generatePostSlugFromTitle($title) {
        $original_slug = Str::slug($title, '-');
        $result_slug = $original_slug;
        $count = 1;
        $post_found = Post::where('slug', '=', $result_slug)->first();
        while ($post_found) {
            $result_slug = $original_slug . '-' . $count;
            $post_found = Post::where('slug', '=', $result_slug)->first();
            $count++;
        }

        return $result_slug;
    }

    private function getValidationRules() {
        return [
            'title' => 'required|max:255',
            'text' => 'required|max:30000'
        ];
    }
}
