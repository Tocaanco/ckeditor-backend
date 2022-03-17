<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
/**
 * @param $file
 * @param $folder_name
 * @return string
 */
function addAttachment($file, $folder_name)
{

    ///////////////////////////////

    $destinationPath = public_path().'/uploads/'.$folder_name.'/';
    $extension = $file->getClientOriginalExtension(); // getting image extension

    if (!File::isDirectory($destinationPath)) {
        File::makeDirectory($destinationPath, 0755, true, true);
    }

    $image = '-'.time().''.rand(11111, 99999).'.'.$extension;
    $file->move($destinationPath, $image); // uploading file to given
    $path = 'uploads/'.$folder_name.'/'.$image;

    return $path;
}

/**
 * @param $file
 * @param $oldFilesPath
 * @param $folder_name
 * @return string
 */
function updateAttachment(
    $file,
    $oldFilesPath,
    $folder_name
) {
    deleteAttachment($oldFilesPath);
    addAttachment($file, $folder_name);
}

/**
 * @param $file_path
 * @return bool
 */
function deleteAttachment($file_path)
{
    foreach ((array) $file_path as $file) {

        File::delete(public_path().'/'.$file);
    }
    return true;
}