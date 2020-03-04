<?php

namespace App\Http\Controllers;

use App\Dependences\GestionUserInterface;
use App\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function list()
    {
        $users = User::orderby('created_at', 'desc')->paginate(10);
        return view('user.list')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect('/user')->with('success', 'created successfully!');
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
    }

    public function profile(Request $request, $id, GestionUserInterface $gestionuser)
    {
        if ($request->isMethod('post')){

           if($gestionuser->update_profile($request, $id)){
            return back()->with('success', 'Updated Successfully!');
           }
           else{
            return back()->with("error","Désolé mais votre profil n'est pas mis a jour !");
           }

        }
        else{
            return view('user.profile');

        }
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
        $user = User::find($id);
        $roles = Role::all();

        if ($request->isMethod('get')){
            //$request->user_id =  $blog->user_id;
                return view('user.update', ['user'=>$user, 'roles'=>$roles]);
        }
        else {
            //var_dump($request);
            User::where('id', $id)->update($request->except('password'));
             return redirect('/user')->with('success', 'Updated Successfully!');
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
        User::destroy($id);
        return redirect('/user')->with('success', 'Deleted!');
    }
}
