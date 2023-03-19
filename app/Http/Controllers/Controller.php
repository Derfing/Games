<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Classes\UserControl;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function landing()
    {
        return view('landing_page');
    }
    public function catalog()
    {
        return view('catalog');
    }
    public function profile($id)
    {
        return view('profile', ['user' => User::find($id)]);
    }

    public function edit_profile($id, Request $request)
    {
        if (Auth::id() == $id){
            $user = new UserControl($id);
            $user->changeName($request['name']);
            $user->changeDescription($request['description']);
            $user->changeProfileImage($_FILES['photo']['tmp_name'], $_FILES['photo']['name']);
            $user->saveChanges();
        }
        return redirect(route("to_profile_page", ['id' => $id]));
    }

    public function delete_profile($id)
    {
        if (Auth::id() == $id){
            $user = new UserControl($id);
            $user->deleteUser();
            $user->saveChanges();
        }
        return redirect("/logout");
    }
}
