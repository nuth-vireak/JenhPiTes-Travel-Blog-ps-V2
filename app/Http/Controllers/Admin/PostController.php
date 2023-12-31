<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $category = Category::where('status', '1')->get();
        return view('admin.post.create', compact('category'));
    }

    public function store(PostFormRequest $request)
    {
        $data = $request->validated();

        $post = new Post;
        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = Str::slug($data['slug']);
        $post->description = $data['description'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/post/', $filename);
            $post->image = $filename;
        }

        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keywords = $data['meta_keywords'];
        $post->status = $request->status ? '1' : '0';
        $post->created_by = Auth::user()->id;
        $post->save();

        return redirect('admin/posts')->with('message', 'អត្តបទបានបង្កើតដោយជោគជ័យ!');
    }

    public function edit($post_id) {
        $post = Post::find($post_id);
        $category = Category::where('status', '1')->get();
        return view('admin.post.edit', compact('post', 'category'));
    }

    public function update(PostFormRequest $request, $post_id) {
        $data = $request->validated();

        $post = Post::find($post_id);
        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = Str::slug($data['slug']);
        $post->description = $data['description'];

        if ($request->hasFile('image')) {

            $destination = 'uploads/post/' . $post->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/post/', $filename);
            $post->image = $filename;
        }

        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keywords = $data['meta_keywords'];
        $post->status = $request->status ? '1' : '0';
        $post->created_by = Auth::user()->id;
        $post->update();

        return redirect('admin/posts')->with('message', 'អត្តបទបានកែប្រែដោយជោគជ័យ!');
    }

    public function destroy($post_id) {
        $post = Post::find($post_id);
        $post->delete();

        return redirect('admin/posts')->with('message', 'អត្តបទបានលុបដោយជោគជ័យ!');
    }
}
