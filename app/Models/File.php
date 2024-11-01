<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Exception;
use Intervention\Image\Facades\Image; 


class File extends Model
{
    public static function img_upload($request, $file_name) {
        
         if ($request->file($file_name)) {
             // Get the file from the request 
             $file = $request->file($file_name);

             $fileName = time() . '_' . $file->getClientOriginalName(); 
            $targetPath = public_path('storage/uploads/' . $fileName);
              // Resize the image 
              File::resizeImage($file, $targetPath, 800, 600);
              // Create a path for saving 
              
                return $targetPath;
             } 
             return null;
            
            
            
            }
            
static function  resizeImage($sourcePath, $targetPath, $newWidth, $newHeight) {
    // Get the image type
    $imageInfo = getimagesize($sourcePath);
    $imageType = $imageInfo[2];

    // Create image from source
    switch ($imageType) {
        case IMAGETYPE_JPEG:
            $sourceImage = imagecreatefromjpeg($sourcePath);
            break;
        case IMAGETYPE_PNG:
            $sourceImage = imagecreatefrompng($sourcePath);
            break;
        case IMAGETYPE_GIF:
            $sourceImage = imagecreatefromgif($sourcePath);
            break;
        default:
            throw new Exception('Unsupported image type');
    }

    // Create a new, empty image with new dimensions
    $targetImage = imagecreatetruecolor($newWidth, $newHeight);

    // Copy and resize the source image into the target image
    imagecopyresampled($targetImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, imagesx($sourceImage), imagesy($sourceImage));

    // Save the resized image
    switch ($imageType) {
        case IMAGETYPE_JPEG:
            imagejpeg($targetImage, $targetPath);
            break;
        case IMAGETYPE_PNG:
            imagepng($targetImage, $targetPath);
            break;
        case IMAGETYPE_GIF:
            imagegif($targetImage, $targetPath);
            break;
    }

    // Free up memory
    imagedestroy($sourceImage);
    imagedestroy($targetImage);
}


}


