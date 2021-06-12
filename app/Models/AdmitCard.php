<?php

namespace App\Models;

use App\Traits\HasImage;
use App\Traits\HasUrl;
use App\Traits\HasView;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmitCard extends Model
{
    use HasFactory, HasUrl, HasImage, HasView;
    protected $guarded = [];
    public const IMAGE_PATH = 'storage/image/signature';
    public const IMAGE_DIRECTORY = 'app/public/image/signature';

    public const BASE_URL = 'scholarship/admitCards';
    public const VIEWS_PATH = 'scholarship.admitCard.';

    public function applicant(){
        return $this->belongsTo(Applicant::class);
    }

    public function exam(){
        return $this->belongsTo(Exam::class);
    }

    public function center(){
        return $this->belongsTo(Center::class);
    }

    public static function createFor($applicant){
        $data = [
            'applicant_id'=> $applicant->id,
            'center_id'=> 1,
            'room_number'=> 1,
            'sit_number'=> 101,
            'image'=> 'signature.jpg',
        ];
        return self::create($data);
    }

    /**
     * Accessors for admit card instance
     */

    // applicant_name
    public function getApplicantNameAttribute(){
        return $this->applicant->name;
    }

    // father_name
    public function getFatherNameAttribute(){
        return $this->applicant->father_name;
    }
    // mother_name
    public function getMotherNameAttribute(){
        return $this->applicant->mother_name;
    }

    // school_name
    public function getSchoolNameAttribute(){
        return $this->applicant->school_name;
    }

    // applicant_image
    public function getApplicantImageAttribute(){
        return $this->applicant->image;
    }

    // applicant_image
    public function getExamNameAttribute(){
        return $this->applicant->exam_name;
    }

    /**
     * Helpers
     */
     public function data():array{
        return [
            'name'=> $this->applicant->name,
            'roll'=> $this->applicant->id,
            'father_name'=> $this->applicant->father_name,
            'mother_name'=> $this->applicant->mother_name,
            'school'=> $this->applicant->school_name,
            'class'=> $this->applicant->class,
            'image'=> $this->applicant->image_path,
            'exam'=> $this->applicant->exam_name,
            'center'=> $this->center->name,
            'room'=> $this->room_number,
        ];
     }
}
