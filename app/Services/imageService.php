<?php

namespace App\Services;
Use InterventionImage;
Use Illuminate\Support\Facades\Storage;

class ImageService
{
  public static function upload($imageFile, $folderName){
    // dd($imageFile['image']);
    if(is_array($imageFile))
    {
      $file = $imageFile['image'];
    } else {
      $file = $imagefile;
    }
    $resizedImage = InterventionImage::make($file)->resize(1920, 1080)->encode(); 
    $fileName = uniqid(rand().'_');
    $extension = $file->extension();
    $fileNameToStore = $fileName. '.' . $extension; 

    Storage::put('public/' . $folderName . '/' . $fileNameToStore, $resizedImage );

    return $fileNameToStore;
  }
}