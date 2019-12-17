<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Category;
use App\Comment;

class PostController extends Controller
    {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
        {
        $SinglePost = Post::find($id);
        if ($SinglePost)
            {
            $getComment = Comment::with(['post' => function($query) {
                            $query->with(['info' => function($get) {
                                    $get->select('id', 'body', 'created_at');
                                }]);
                        }])
                    ->get();
            return view('post', compact('SinglePost', 'getComment'));
            }
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id=null)
        {
        $category = Category::all();
        
        return view('Admin.posts.createNew', compact('category'));
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {
        $data = $request->all();
        try
            {
            $rules = [
                'title' => 'required',
                'body' => 'required',
                'category_id' => 'nullable',
                'images' => 'nullable',
            ];
            $this->validate($request, $rules);
            $post = Post::create($data);
//            if ($data['image'] !== null)//check if image exist
//                {
//                foreach ($images as $value)// loop throug all the images and store in db with the post id
//                    {
//                    $image[] = [
//                        'post_id' => $post->id,
//                        'images' => $value,
//                    ];
//                    }
//                Images::create($image);//create image
//                }
            return redirect()->back()->with('success', 'added successfully');
            } catch (Exception $e)
            {
            return redirect()->back()->with('error', 'check and try again');
            }
        }

    public function allPost()
        {
        $allPost = Post::with('info', 'cat')
                ->orderBy('created_at', 'desc')
                ->paginate(40);
        //dd($allPost);
        return view('Admin.posts.show', compact('allPost'));
        }

    public function view($id)
        {
        $post = Post::where('id', $id)->first();
        return view('Admin.posts.view', compact('post')); //return to view post
        }

    public function approve($id)
        {
        $Apost = Post::find($id); //approve a Post
        if ($Apost)
            {
            $Apost->isPublish = '1';
            $Apost->save();
            return redirect()->route('view.post')->with('success', 'Post Published');
            }
        }
        public function edit(Request $request)
        {
            $category= Category::all();
        $post = Post::find($request->get('id')); // search  for a specified resources
       /// dd($post);
        if ($post)
            {
            return view('Admin.posts.edit', compact('category', 'post'));
            }
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
        {
         $data = $request->all();
        try
            {
            $rules = [
                'title' => 'required',
                'body' => 'required',
                'category_id' => 'nullable',
                'images' => 'nullable',
            ];
            $this->validate($request, $rules);
            $post=Post::findOrfail($id);
            if ($post)
            {
            $post->fill($data);
            $post->save();
            return redirect()->route('view.post')->with('success', 'Post Published');
            } 
            return redirect()->route('view.post')->with('sucess', 'added updated');
            } catch (Exception $e)
            {
            return redirect()->back()->with('error', 'check and try again');
            }
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
        {
       if ($request->isMethod('post'))//delete class
            {
           $comment=Comment::where('post_id',$request->get('hidden'));// now delete all comment
           $comment->delete();
            $post = Post::findOrFail($request->get('hidden'));// now delete all post
            $post->delete();
            return redirect()->route('view.post')->with('success', 'Record and All comment deleted!');
            }
        // for get request
       
        
        }

    }
