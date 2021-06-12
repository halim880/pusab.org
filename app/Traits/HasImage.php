<?php

namespace App\Traits;

/**
 * 
 */
trait HasImage {
    public static function storeImage($image){
        $image->move(self::getImageDirectory(), self::getImageName($image));
    }
    
    public static function getImageName($image){
        return now()->format('YmdHis').'.'.$image->getClientOriginalExtension();
    }

    public function removeImage($image = ''){
        if ($image=='') {
            $image = $this->image;
        }

        @unlink(self::getImageDirectory().'/'.$image);
        return true;
    }

    public static function getImageDirectory(){
        return storage_path(self::IMAGE_DIRECTORY);
    }

    public function getImagePathAttribute(){
        return self::IMAGE_PATH."/".$this->image;
    }
}
