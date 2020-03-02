<?php

namespace App\Http\Controllers;

use App\Policies\BlogPolicy;
use Illuminate\Http\Request;
use App\Blog;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderby('created_at', 'desc')->paginate(10);
        return view('blog.index')->with('blogs', $blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogs = [] ;
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titre' => 'required',
            'description' => 'required',
        ]);
        $blog = new Blog;
        $blog->titre = $request->input('titre');
        $blog->description = $request->input('description');
        $blog->user_id = Auth::user()->id;
        $blog->save();

        return redirect('/blog')->with('success', 'created successfully!');
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

        $blog = Blog::find($id);
        $user = Auth::user();
        if (!empty($blog) && ($blog->user_id == $user->id || $user->role_id == 1)) {
            return view('blog.edit', ['blogs'=>$blog]);
        }
        return back();

        //dd($user);
        //$blog_id = new Blog::find($id);

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
        $blog = Blog::find($id);

        if ($request->isMethod('get')){
            //$request->user_id =  $blog->user_id;
            $user = Auth::user();
            if (!empty($blog) && ($blog->user_id == $user->id || $user->role_id == 1)){
                return view('blog.update', ['blogs'=>$blog]);
            }
            return back();
        }
        else {
            //var_dump($request);
            Blog::where('id', $id)->update($request->except('user_id'));
             return redirect('/blog')->with('success', 'Updated Successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::destroy($id);
        return redirect('/blog')->with('success', 'Deleted!');
    }

}
