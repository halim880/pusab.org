<?php
namespace Tests\Traits;

use Illuminate\Http\UploadedFile;

/**
 * 
 */
trait RequestData
{
    private function ApplicationData($merge = []) :array{
        return array_merge(
            [
                'name'=> 'Shohidullah Kaisar',
                'father_name'=> 'Enayet Ullah',
                'mother_name'=> 'Kulsuma Khatun',
                'school_id'=> $this->school_id,
                'class'=> 10,
                'exam_id'=> $this->exam_id,
                'village'=>'Kachir Gati',
                'post_office'=>'Polash',
                'union'=>'Polash',
                'current_address'=> 'Maktab goli, Chittagong',
                'phone'=> '01714 870178',
                'image'=> UploadedFile::fake()->image('random.jpeg'),
            ],
            $merge
        );
    }
}
