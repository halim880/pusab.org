<?php

namespace App\Http\Requests;

use App\Models\Advisor;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdvisorSignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=> ['required'],
            'email'=> ['required', 'email', 'unique:users'],
            'password'=> ['required', 'confirmed'],
            'institution'=> ['required', 'string'],
            'department'=> ['required', 'string'],
            'passing_year'=> ['required', 'numeric'],
            'profession'=>['required'],
            'job_title'=>['required'],
            'job_location'=>['required'],
            'phone'=> ['required'],
            'image'=> ['required', 'image', 'mimes:jpg,jpeg,png'],
            'current_address'=> ['nullable', 'string'],
            'permanent_address'=> ['nullable', 'string'],
        ];
    }

    

    public function createAdvisor(){
        $this->saveModel(new Advisor, $this->toAdvisorArray());
    }

    public function toAdvisorArray(){
        return [
            'user_id'=> $this->getUserId(),
            'institution'=> $this->institution,
            'department'=> $this->department,
            'passing_year'=> $this->passing_year,
            'profession'=> $this->profession,
            'job_title'=> $this->job_title,
            'job_location'=> $this->job_location,
            'current_address'=> $this->current_address,
            'permanent_address'=> $this->permanent_address,
            'phone'=> $this->phone,
            'image'=> Advisor::getImageName($this->image),
        ];
    }

    public function toUserArray(){
        return [
            'name'=> $this->name,
            'email'=> $this->email,
            'password'=> Hash::make($this->password),
        ];
    }
    private function getUserId(){
        return User::create($this->toUserArray())->id;
    }

    public function saveModel($model, $data){
        DB::beginTransaction();
        try {
            if($model::create($data)!==null) {
                $model::storeImage($this->image);
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}
