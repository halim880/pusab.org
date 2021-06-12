<?php

namespace App\Models;

use App\Traits\HasImage;
use App\Traits\HasUrl;
use App\Traits\HasView;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Applicant extends Model
{
    use HasFactory, Notifiable, HasUrl, HasImage, HasView;
    
    protected $guarded = [];
    public const IMAGE_PATH = 'storage/image/applicant';
    public const BASE_URL = 'scholarship/applicants';
    public const VIEWS_PATH = 'scholarship.applicant.';
    public const IMAGE_DIRECTORY = 'app/public/image/applicant';


    public function getAddressAttribute(){
        return $this->village.', '.$this->union.', '.'Bisswambharpur, Sunamganj';
    }



    /**
     * Relationship defination
     */
    public function admitCard(){
        return $this->hasOne(AdmitCard::class);
    }

    public function school(){
        return $this->belongsTo(School::class);
    }

    public function exam(){
        return $this->belongsTo(Exam::class);
    }
    /**
     * Route notifications for the Nexmo channel.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return string
     */
    public function routeNotificationForNexmo($notification)
    {
        return $this->phone;
    }
/**
 * Accessors for applicant instance
 */

    public function getRole(){
        return $this->id;
    }

     public function getSchoolNameAttribute(){
         return $this->school->name;
     }

    public function getExamNameAttribute(){
        return $this->exam->name;
    }

    public function getCreateAdmitCardUrlAttribute(){
        return $this->url.'/admitCard/create';
    }

    public function getCreateAdmitCardViewAttribute(){
        return self::VIEWS_PATH.'admitCard.create';
    }

    public function getShowAdmitCardUrlAttribute(){
        return $this->admitCard->url;
    }

    public function getPermanentAddress(){
        return $this->village.', '.$this->post_office.', '.$this->union.', Bisswamvharpur, Sunamganj';
    }

    public function getCenterName(){
        return $this->admitCard->center->name;
    }
    /**
     * Helpers 
     */

     public function hasAdmitCard(){
         return !is_null($this->admitCard);
     }

     public function hasGroup(){
         return $this->class==9 || $this->class == 10;
     }
     public function getExamName(){
         return $this->exam->name;
     }

     public function getAdmitCardData():array{
        return [
            'id'=> $this->id,
            'name'=> $this->name,
            'roll'=> $this->id,
            'father_name'=> $this->father_name,
            'mother_name'=> $this->mother_name,
            'school'=> $this->school_name,
            'class'=> $this->class,
            'image'=> $this->image_path,
            'exam'=> $this->exam_name,
            'center'=> $this->getCenterName(),
            'room'=> $this->room_number,
        ];
     }
}
