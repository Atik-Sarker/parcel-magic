<?php

namespace app\Http\Traits;


trait ImageManage {

    function UploadImage($newImage, $oldImage = null, $folder = 'banner'){
        if ($oldImage !== null){
            if (file_exists(public_path("storage/{$oldImage}")))
                unlink(public_path("storage/{$oldImage}"));
        }
        $originalExtension = $newImage->getClientOriginalExtension();
        $originalName = str_replace([' ','.','_','|'],['-','','-', ''],substr($newImage->getClientOriginalName(), 0, -strlen($originalExtension)));
        $fileName = strtolower($originalName).'-'.time().'.'.$originalExtension;
        $imagePath = $newImage->storeAs($folder, $fileName);
        return $imagePath; 

    }

   public function DeleteFile($file){
       if ($file !== null){
           if (file_exists(public_path("storage/{$file}")))
               unlink(public_path("storage/{$file}"));
           return true;
       }
       return false;
    }

}