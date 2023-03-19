<?php

namespace App\Classes;

use App\Models\User;

class UserControl
{
    private User $user;
    public string $errors = "";
    public string $warnings = "";

    public function __construct($id)
    {
        $this->user = User::where('id', $id)->first();
    }

    public function deleteUser(): void
    {
        $this->user->forceDelete();
    }

    public function changeName($name): void
    {
        if (isset($name)) {
            if (User::where('name', $name)->first()) {
                $this->errors .= "This name aleready exist.";
            } else {
                $this->user->name = $name;
            }
        } else {
            $this->warnings .= "Empty name.";
        }
    }

    public function changeDescription($description): void
    {
        if (isset($description)) {
            if ($this->user->description == $description) {
                $this->warnings .= "Input the same description.";
            } else {
                $this->user->description = $description;
            }
        } else {
            $this->warnings .= "Empty description.";
        }
    }

    public function changeProfileImage($file, $image): void
    {
        if (isset($file) && isset($image)) {
            $photo = explode('.', $image);
            if (!end($photo))
            {
                $this->warnings .= "Empty image.";
                return;
            }
            $name = 'image_' . uniqid()  . '.' . end($photo);
            $path = public_path() . '\photo\\';
            move_uploaded_file($file, $path . $name);
            if (file_exists('photo\\' . $this->user->photo) && $this->user->photo != null) {
                unlink('photo\\' . $this->user->photo);
            }
            $this->user->photo = $name;
        } else {
            $this->warnings .= "Empty image.";
        }
    }

    public function saveChanges()
    {
        if (!$this->errors) {
            $this->user->save();
            return true;
        } else {
            return $this->errors;
        }
    }
}
