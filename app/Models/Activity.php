<?php

namespace App\Models;

use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory, HasImage;
    protected $guarded = [];
    public const BASE_URL = 'backend/activities';
    public const VIEWS_PATH = 'scholarship.applicant.';
    public const IMAGE_PATH = 'storage/image/activity';
    public const IMAGE_DIRECTORY = 'app/public/image/activity';
}
