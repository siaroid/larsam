<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Photo;
use App\Post;
use App\User;
use function compact;
use function dd;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use function random_int;
use function redirect;
use function time;
use function unlink;
use function view;

class AdminPostscontroller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $posts=Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cats=Category::lists('name','id');
        return view('admin.posts.create',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //
        $input=$request->all();

        $user=Auth::user();
        if ($file=$request->file('path')){
            $name=time().random_int(1,9).'.'.$file->getClientOriginalExtension();
            $file->move('images/posts',$name);
            $photo= Photo::create(['path'=>$name]);
            $input['photo_id']=$photo->id;

        }

        $user->posts()->create($input);
        return redirect('admin/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post=Post::find($id);
        $cats=Category::lists('name','id');
        $auth=User::lists('name','id');
        return view('admin.posts.edit',compact('post','cats','auth'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        //
        $post=Post::find($id);
        $photo_id=$post->getAttributes()['photo_id'];

        $input=$request->all();

        if ($file=$request->file('path')){
            if(file_exists(public_path($post->photo_id))) {
                unlink(public_path() . '/' . $post->photo_id);
                Photo::find($photo_id)->delete();
            }
            $name=time().random_int(1,9).'.'.$file->getClientOriginalExtension();
            $file->move('images/posts',$name);
            $photo= Photo::create(['path'=>$name]);
            $input['photo_id']=$photo->id;

        }

        $post->update($input);
        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post=Post::find($id);
        $photo_id=$post->getAttributes()['photo_id'];
        if(file_exists(public_path($post->photo_id))) {
            unlink(public_path() . '/' . $post->photo_id);
            Photo::find($photo_id)->delete();
        }

        $post_title=$post->title;
        $post->delete();
        Session::flash('deleted_post','پست '.$post_title.'  حذف شد...  ');
        return redirect('admin/posts');

    }
}
