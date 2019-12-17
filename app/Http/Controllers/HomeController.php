<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Auth;

class HomeController extends Controller
    {

    /**
     * Create a new controller instance.
     *
     * @return void
      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id = null)
        {
        if ($id)// check if id exist
            {
            $fullPost = Post::with('image')->where('id', $id)->first();
            $post = null;
            if ($fullPost)
                {
                $Comments = Comment::with(['post' => function($query) {
                                $query->with(['info' => function($get) {
                                        $get->select('id','name');
                                    }]);
                            }])->where('post_id', $id)
                        ->get(); //get full post and comment with users details
                  //dd($Comments);
                return view('index', compact('fullPost', 'Comments', 'post'));
                }
            }
        $post = Post::with('info')
                ->where('isPublish', 1)
                ->orderBy('created_at', 'desc')
                ->Paginate(9); //get all post order by latest date
        // dd($post);
        return view('index', compact('post'));
        }

    public function comment(Request $request)
        {
        if ($request->isMethod('post'))
            {
            $data = $request->except('_token');
            
            
            $data['user_id']=Auth::user()->id;// get logined user id
             Comment::create($data); // create comment and get comment
             return redirect()->route('home',['id'=>$data['post_id']])->with('success','comment added');        
            }
        }

    }
