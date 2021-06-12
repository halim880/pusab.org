<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUrl;
use App\Traits\HasView;
use Carbon\Carbon;

class Exam extends Model
{
    use HasFactory, HasUrl, HasView;
    public const BASE_URL = 'scholarship/exams';
    public const VIEWS_PATH = 'scholarship.exam.';
    protected $guarded = [];

    public function applicants(){
        return $this->hasMany(Applicant::class);
    }

    public function centers()
    {
        return $this->hasMany(Center::class);
    }

    public function isOngoing(){
        return $this->is_ongoing==1;
    }

    public function isApplicationOngoing(){
        return $this->form_published == 1;
    }

    public function isAdmitCardAvailable(){
        return $this->admit_card_published==1;
    }
    
    public function isResultPublished(){
        return $this->result_published==1;
    }

    public function getTimeAttribute(){
        return Carbon::parse($this->date)->format('h:i A');
    }

    public function getDate(){
        return Carbon::parse($this->date)->toFormattedDateString();
    }
    public function getCenters(){
        return $this->centers;
    }
    public function getTotalApplicant(){
        return $this->applicants->count();
    }

    public function getApplicationDadline(){
        return Carbon::parse($this->created_at)->addDay(20)->toFormattedDateString();
    }

    public function startApplication(){
        $this->update(['form_published'=> 1]);
    }
    public function closeApplication(){
        $this->update(['form_published'=> 0]);
    }

    public function publishAdmitCard(){
        $this->update(['admit_card_published'=> 1]);
    }
    public function closeAdmitCard(){
        $this->update(['admit_card_published'=> 0]);
    }
}
