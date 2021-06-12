<?php
namespace Tests\Traits;

/**
 * 
 */
trait HasImage
{
    public function deleteImage($path){
        $this->assertFileExists($path);
        @unlink($path);
        $this->assertFileDoesNotExist($path);
    }
}