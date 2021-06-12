<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SayorPost extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getCreatedTime(){
        return Carbon::parse($this->created_at)->format('h:i:s a, d M, Y');
    }

    public function getCreatorImg(){
        return 'image/slider_images/01.jpg';
    }

    public function isCreator(){
        return true;
    }
}
