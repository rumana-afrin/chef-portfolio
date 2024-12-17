<?php

use Illuminate\Support\Facades\Storage;

function getDefaultImage()
{
   return asset('assets/img/No-image-available-2.jpg');
}
function getImage($file)
{
        if (Storage::disk('public')->exists($file)) {
            return asset('storage/' . $file);
        }
        return asset('assets/img/No-image-available-2.jpg');
    
}


function uploadFile($to, $file, $oldFile = '')
{

   if ($oldFile) {
      removeFile($oldFile); // Pass the old file path
  }
   $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
   $file_name = time() . rand(1000, 9999) . '.' . $extension;
   $file_name = str_replace(' ', '_', $file_name);

   Storage::disk('public')->put($to . '/' . $file_name, file_get_contents($file->getRealPath()));
   return $to . '/' . $file_name;
}
function removeFile($file)
{
   if (Storage::disk('public')->exists($file)) {
      Storage::disk('public')->delete($file);
      return true;
   }
   return false;
}


function getOption($option_key)
{

    $system_settings = config('settings');


    if ($option_key && isset($system_settings[$option_key])) {
        return $system_settings[$option_key];
    } else {
        return '';
    }
}
