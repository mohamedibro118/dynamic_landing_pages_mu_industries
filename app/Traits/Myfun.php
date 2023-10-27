<?php

namespace App\Traits;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image ;
use Spatie\Image\Image as svgImage;
use Spatie\Image\Manipulations;

trait Myfun
{

    public function uploadeImg_Logo($file, $dir)
    {
        $width = 250;
        $height = 250;

        // Use Intervention Image to resize the image
        $image = Image::make($file)->resize($width, $height, function ($constraint) {
            // $constraint->upsize();
        });
        $path ='uploade/'.$dir. '/' .time() . $file->getClientOriginalName();
        $image->save($path, 100);

        return $path;
    }
    public function uploadeImg($file, $dir, $width, $height)
    {
       
        // Get the file extension
        $extension = $file->getClientOriginalExtension();
    
        // Check if the file is an SVG
        if ($extension === 'svg') {
            // Handle SVG resizing (modify viewBox)
            $path = 'uploade/' . $dir . '/' . time() . $file->getClientOriginalName();
    
            // Read the contents of the SVG file
            $svgContent = file_get_contents($file);
    
            // // Find and replace the viewBox attribute to resize the SVG
            // $svgContent = preg_replace(
            //     '/viewBox=["\']([^"\']+)["\']/i',
            //     'viewBox="$1 0 0 ' . $width . ' ' . $height . '"',
            //     $svgContent
            // );
    
            // // Save the modified SVG
            file_put_contents($path, $svgContent);
    
            return $path;
        } else {
            // Handle non-SVG image resizing with Intervention Image
            $image = Image::make($file)->resize($width, $height, function ($constraint) {
                // $constraint->upsize();
            });
            $path = 'uploade/' . $dir . '/' . time() . $file->getClientOriginalName();
            $image->save($path, 100);
    
            return $path;
        }
    }
    

    public function uploadeBackGround($file, $dir)
    {
        $width = 1920;
        $height = 1080;

        // Use Intervention Image to resize the image
        $image = Image::make($file)->resize($width, $height, function ($constraint) {
            // $constraint->upsize();
        });
        $path ='uploade/'.$dir. '/' .time() . $file->getClientOriginalName();
        $image->save($path, 100);

        return $path;
    }
    public function uploadeCard_Photo($file, $dir)
    {
        $width = 520;
        $height = 400;

        // Use Intervention Image to resize the image
        $image = Image::make($file)->resize($width, $height, function ($constraint) {
            // $constraint->upsize();
        });
        $path ='uploade/'.$dir. '/' .time() . $file->getClientOriginalName();
        $image->save($path, 100);

        return $path;
    }
    public function uploade($request, $dir)
    {
        $file = $request->file('logo');
        $width = 520;
        $height = 400;

        // Use Intervention Image to resize the image
        $image = Image::make($file)->resize($width, $height, function ($constraint) {
            // $constraint->upsize();
        });
        $path ='uploade/'.$dir. '/' .time() . $file->getClientOriginalName();
        $image->save($path, 100);

        return $path;
    }
   
    
   

    public function uplaodeGallary($files, $dir)
    {
        foreach ($files as $image) {
            $width = 1000;
            $height = 750;

            // Use Intervention Image to resize the image
            $imagef = Image::make($image)->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $singlepath ='uploade/'.$dir . '/' .time() . $image->getClientOriginalName();
            $imagef->save($singlepath, 100);
            $path[] =$singlepath;
        }
        return $path;
    }

 
    

    public function deleteprevlogo($file)
    {
        if ($file) {
            File::delete($file);
        }
    }

   

    public function deleteprevgallary($caller, $path)
    {
        if ($caller->gallary) {
            File::delete($caller->gallary);
        }
    }
 
    public function deleteprev($file)
    {
        
        if ($file) {
            File::delete(json_decode($file));
        }
    }
}
