<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $user = Auth::user();
        if ($request['name'])
        {
           $user->name = $request['name'];
        }
        if ($request['description'])
        {
            $user->description = $request['description'];
        }
        if ($request['photo'])
        {
            $user->photo = $request['photo'];
        }
        $user->save();
        return redirect(route("to_profile_page", ['id' => $id]));
    }
}
