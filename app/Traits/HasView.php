<?php

namespace App\Traits;

/**
 * 
 */
trait HasView {
    public static function indexView(){
        return self::VIEWS_PATH.'index';
    }

    public static function editView(){
        return self::VIEWS_PATH.'edit';
    }

    public static function showView(){
        return self::VIEWS_PATH.'show';
    }

    public static function createView(){
        return self::VIEWS_PATH.'create';
    }

    public function getShowAttribute(){
        return self::VIEWS_PATH.'show';
    }
    public function getEditAttribute(){
        return self::VIEWS_PATH.'edit';
    }
}