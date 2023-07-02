<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {

            $validator = Validator::make($request->all(), [
                'comment_body' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with('message', 'សូមបញ្ចូលមតិយោបល់របស់អ្នក');
            }

            $post = Post::where('slug', $request->input('post_slug'))->where('status', 1)->first();
            if ($post) {
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => Auth::user()->id,
                    'comment_body' => $request->input('comment_body'),
                ]);
                return redirect()->back()->with('message', 'មតិយោបល់ត្រូវបានបញ្ចូលដោយជោគជ័យ');
            } else {
                return redirect()->back()->with('message', 'មិនមានអត្តបទទេ');
            }
        } else {
            return redirect('/login')->with('message', 'សូមចូលទៅកាន់គណនីរបស់អ្នកជាមុនសិន');
        }
    }

    public function destroy(Request $request)
    {
        if (Auth::check()) {
            $comment = Comment::where('id', $request->input('comment_id'))->where('user_id', Auth::user()->id)->first();

            if ($comment) {
                $comment->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'មតិយោបល់ត្រូវបានលុបដោយជោគជ័យ'
                ]);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'មិនអាចលុបមតិយោបល់នេះបានទេ ដោយសារមានអ្វីមួយមិនប្រក្រតីក្នុងការលុបមតិយោបល់នេះទេ'
                ]);
            }
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'សូមចូលទៅកាន់គណនីរបស់អ្នកជាមុនសិន'
            ]);
        }
    }
}
