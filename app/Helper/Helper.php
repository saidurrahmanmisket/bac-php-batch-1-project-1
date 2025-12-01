<?php


use Illuminate\Http\Request;

function uploadImage($file, $folder)
{
    if (!$file->isValid()) {
        return null;
    }

    $imageName = Str::slug(time() . rand() . '.' . $file->extension());
    $path = public_path('uploads/' . $folder);

    if (!file_exists($path)) {
        mkdir($path, 0755, true);
    }
    $file->move($path, $imageName);
    return 'uploads/' . $folder . '/' . $imageName;

}
