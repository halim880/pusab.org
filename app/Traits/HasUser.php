<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\DB;

/**
 * 
 */
trait HasUser
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getNameAttribute(){
        return $this->user->name;
    }

    public function getEmailAttribute(){
        return $this->user->email;
    }

    public function getRoles(){
        return $this->user->roles;
    }

    public function assignRole($role){
        $this->user->assignRole($role);
    }

    public function hasRole($role){
        return $this->user->hasRole($role);
    }

    public function removeRole($role){
        return $this->user->removeRole($role);
    }
}
