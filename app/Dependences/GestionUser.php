<?php

namespace App\Dependences;

use App\User;
use App\Dependences\GestionUserInterface;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;




class GestionUser implements GestionUserInterface{

    public function update_profile($request, $id)
    {
        $user = User::find($id);
            if($request->hasFile('image')) {
                $avatar = $request->file('image');
                $filename = time() . "." . $avatar->getClientOriginalExtension();
                $name =  $avatar->getClientOriginalName();

                Image::make($avatar)->resize(215,215)->save(public_path('avatars'.'/'.$name));
                $user->image = $name;
                //dd($user);

                //User::where('id', $id)->update($request->except('password'));
            }
            else{
                $user->image = Auth::user()->image;
            }
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();
            return true;

    }

}














?>
