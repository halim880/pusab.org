<?php

namespace App\Models;

use App\Traits\HasUrl;
use App\Traits\HasView;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory, HasUrl, HasView;
    public const BASE_URL = 'scholarship/schools';
    public const VIEWS_PATH = 'scholarship.school.';
    protected $guarded = [];
}
