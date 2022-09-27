<?php

define('PAGINATION_COUNT', 10);

function getFolder()
{

    return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
}


// function uploadImage($folder,$image){
//     dd($folder);
//     $image->store('/', $folder);
//     $filename = $image->hashName();
//     return  $filename;
//  }

    function upload_image($file, $prefix){
        if($file){
            $files = $file;
            $imageName = $prefix.rand(3,999).'-'.time().'.'.$files->extension();
            $image = "storage/".$imageName;
            $files->move(public_path('storage'), $imageName);
            $getValue = $image;
            return $getValue;
        }
    }
