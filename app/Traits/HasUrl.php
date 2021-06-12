<?php

namespace App\Traits;

/**
 * 
 */
trait HasUrl {
    public function getUrlAttribute(){
        return self::BASE_URL.'/'.$this->id;
    }

    public function getEditUrlAttribute(){
        return self::BASE_URL.'/'.$this->id.'/edit';
    }

    public static function createUrl(){
        return self::BASE_URL.'/create';
    }

    public static function storeUrl(){
        return self::BASE_URL;
    }

    public static function indexUrl(){
        return self::BASE_URL;
    }

    public function getUpdateUrlAttribute(){
        return self::BASE_URL.'/'.$this->id;
    }

    public function getDeleteUrlAttribute(){
        return $this->url;
    }
    public function getShowsUrlAttribute(){
        return $this->url;
    }
}
