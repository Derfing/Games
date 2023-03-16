<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Classes\UserControl;
use UserControl as GlobalUserControl;

use function PHPUnit\Framework\fileExists;

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
        if ($id == Auth::user())
        {
            $user = new GlobalUserControl($id);
            $user->changeName($request['name']);
            $user->changeDescription($request['description']);
            $user->changeProfileImage($request['photo'], $_FILES['photo']['name']);
            $user->saveChanges();
        }

        return redirect(route("to_profile_page", ['id' => $id]));
    }
}
