<?php

use App\Models\User;

class UserControl
{
    private User $user;
    public string $errors;
    public string $warnings;

    public function __construct($id)
    {
        $this->user = User::where('id', $id);
    }

    public function deleteUser(): void
    {
        $this->user->delete();
    }

    public function changeName($name): void
    {
        if (isset($name)) {
            if (isset(User::where('name', $name)->first())) {
                $this->errors .= "This name aleready exist.";
            } else {
                $this->user->name = $name;
            }
        } else {
            $this->errors .= "Empty name.";
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
            $this->errors .= "Empty description.";
        }
    }

    public function changeProfileImage($name, $image): void // $_FILES['photo']['name']
    {
        if (isset($photo)) {
            $photo = explode('.', $image);
            $name = 'image_' . uniqid()  . '.' . end($photo);
            $path = public_path() . '\photo\\';
            move_uploaded_file($name, $path . $name);
            if (file_exists('photo\\' . $this->user->photo) && $this->user->photo != null) {
                unlink('photo\\' . $this->user->photo);
            }
            $this->user->photo = $name;
        } else {
            $this->errors .= "Empty image.";
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
