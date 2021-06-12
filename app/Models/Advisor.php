<?php

namespace App\Models;

use App\Traits\HasImage;
use App\Traits\HasUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUser;

class Advisor extends Model
{
    use HasFactory, HasUser, HasImage, HasUrl;
    protected $guarded = [];
    public const BASE_URL = 'backend/advisors';
    public const IMAGE_PATH = 'storage/image/advisor';
    public const IMAGE_DIRECTORY = 'app/public/image/advisor';
}
