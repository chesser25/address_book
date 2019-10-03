<?php
namespace App\Library\Services;

use Illuminate\Support\Facades\Storage;
use Image;
  
/**
 * Implementation of image manager
 * 
 * @author Andrew Lomakin
 * 
 */
class image_manager {
    
    function __construct(){
        // Image width and height size constants
        define('WIDTH', 300);
        define('HEIGHT', 400);
    }

    /**
     * Save image on storage disk (upload)
     * @param UploadedFile $imageFile image, user'd like to save
     * @return $filename
     */
    public function save($imageFile){
        // Create unique name using standard Laravel class
        $filename  = \Str::random(6) . '.' . $imageFile->getClientOriginalExtension(); 
        
        // Create, resize and encode image with 80% quality (max=100%)
        $photo = Image::make($imageFile)->resize(WIDTH, HEIGHT)->encode('jpg',80);

        // Save file on disk
        Storage::disk('upload')->put($filename, $photo);
        return $filename;
    }

    /**
     * Remove image file from disk
     * @param UploadedFile $imageFile
     */
    public function delete($imageFile){
        Storage::disk('upload')->delete($imageFile);
    }
}