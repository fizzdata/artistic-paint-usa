<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Exception;


class File extends Model
{
    public static function resizeImage($sourcePath, $destPath, $targetWidth = 600, $targetHeight = 400) {
        // Load the image based on file type
        $imageInfo = getimagesize($sourcePath);
        $imageType = $imageInfo[2];
        
        switch ($imageType) {
            case IMAGETYPE_JPEG:
                $srcImage = imagecreatefromjpeg($sourcePath);
                break;
            case IMAGETYPE_PNG:
                $srcImage = imagecreatefrompng($sourcePath);
                break;
            default:
                throw new Exception('Unsupported image type');
        }
        
        list($srcWidth, $srcHeight) = $imageInfo;
    
        // Calculate aspect ratios
        $srcAspectRatio = $srcWidth / $srcHeight;
        $targetAspectRatio = $targetWidth / $targetHeight;
    
        // Determine new dimensions
        if ($srcAspectRatio > $targetAspectRatio) {
            $newWidth = $targetWidth;
            $newHeight = $targetWidth / $srcAspectRatio;
        } else {
            $newHeight = $targetHeight;
            $newWidth = $targetHeight * $srcAspectRatio;
        }
    
        // Create new image with white background
        $newImage = imagecreatetruecolor($targetWidth, $targetHeight);
        $white = imagecolorallocate($newImage, 255, 255, 255);
        imagefill($newImage, 0, 0, $white);
    
        // Copy and resize the old image into the center of the new image
        $dstX = ($targetWidth - $newWidth) / 2;
        $dstY = ($targetHeight - $newHeight) / 2;
        imagecopyresampled($newImage, $srcImage, $dstX, $dstY, 0, 0, $newWidth, $newHeight, $srcWidth, $srcHeight);
    
        // Save the new image based on file type
        switch ($imageType) {
            case IMAGETYPE_JPEG:
                imagejpeg($newImage, $destPath, 100);
                break;
            case IMAGETYPE_PNG:
                imagepng($newImage, $destPath);
                break;
        }
    
        // Free memory
        imagedestroy($srcImage);
        imagedestroy($newImage);
    }
    
    // Example usage
    //resizeImage('source.png', 'destination.png');
}
