<?php
namespace App\Library\Services;

use Illuminate\Support\Facades\Storage;
use Image;
  
class ImageManager
{
    function __construct(){
        define('UPLOADS_FOLDER', 'uploads/');
        define('WIDTH', 300);
        define('HEIGHT', 400);
    }

    public function save($imageFile){
        $filename  = \Str::random(6) . '.' . $imageFile->getClientOriginalExtension();       
        $photo = Image::make($imageFile)->resize(WIDTH, HEIGHT)->encode('jpg',80);
        Storage::disk('upload')->put($filename, $photo);
        return $filename;
    }

    public function delete($imageFile){
        Storage::disk('upload')->delete($imageFile);
    }
}