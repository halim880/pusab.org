<?php

namespace App\Models;

use App\Traits\HasImage;
use App\Traits\HasUrl;
use App\Traits\HasUser;
use App\Traits\HasView;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Member extends Model
{
    use HasFactory, HasUser, HasUrl, HasImage, HasView;
    protected $guarded = [];
    public const IMAGE_PATH = 'storage/image/member';
    public const IMAGE_DIRECTORY = 'app/public/image/member';
    public const BASE_URL = 'backend/members';


    public function getAddressAttribute(){
        return $this->village.', '.$this->union.', '.'Bisswambharpur, Sunamganj';
    }
}
