<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
            $photo = explode('.',$_FILES['photo']['name']);
            $name = 'image_' . uniqid()  . '.' . end($photo);
            $path = public_path() . '\photo\\';
            move_uploaded_file($request['photo'], $path . $name);
            if (file_exists('photo\\'.$user->photo))
            {
                unlink('photo\\'.$user->photo);
            }
            $user->photo = $name;
        }
        $user->save();
        return redirect(route("to_profile_page", ['id' => $id]));
    }
}
