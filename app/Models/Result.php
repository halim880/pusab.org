<?php

namespace App\Models;

use App\Traits\HasUrl;
use App\Traits\HasView;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory, HasUrl, HasView;
    public const BASE_URL = 'scholarship/results';
    public const VIEWS_PATH = 'scholarship.result.';
    protected $guarded = [];
}
