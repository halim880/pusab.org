<?php

namespace App\Models;

use App\Traits\HasUrl;
use App\Traits\HasView;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory, HasUrl, HasView;
    public const BASE_URL = 'scholarship/centers';
    protected $guarded = [];

    public function toArray()
    {
        return [
            'name'=> $this->name,
        ];
    }
}
