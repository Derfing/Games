<?php

namespace App\Classes;

use App\Models\User;

abstract class UserControl
{
    static function deleteUser($userId): bool
    {
        if (User::find($userId)->forceDelete()) {
            return true;
        } else {
            return false;
        }
    }

    static function changeName($userId, $name): bool
    {
        $user = User::where('id', $userId)->first();

        if (isset($name)) {
            if (User::where('name', $name)->first()) {
                return false;
            } else {
                $user->name = $name;
                $user->save();
                return true;
            }
        } else {
            return false;
        }
    }

    static function changeDescription($userId, $description): bool
    {
        $user = User::where('id', $userId)->first();

        if (isset($description)) {
            if ($user->description == $description) {
                return false;
            } else {
                $user->description = $description;
                $user->save();
                return true;
            }
        } else {
            return false;
        }
    }

    static function changeProfileImage($userId, $file, $image)
    {
        $user = User::where('id', $userId)->first();

        if (isset($file) && isset($image)) {
            $photo = explode('.', $image);
            if (!end($photo)) {
                return false;
            } else {
                $name = 'image_' . uniqid()  . '.' . end($photo);
                $path = public_path() . '\photo\\';
                move_uploaded_file($file, $path . $name);
                if (file_exists('photo\\' . $user->photo) && $user->photo != null) {
                    unlink('photo\\' . $user->photo);
                }
                $user->photo = $name;
                $user->save();
                return true;
            }
        } else {
            return false;
        }
    }
}
