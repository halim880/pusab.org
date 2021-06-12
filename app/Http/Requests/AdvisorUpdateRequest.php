<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class AdvisorUpdateRequest extends FormRequest
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
            'institution'=> ['required', 'string'],
            'department'=> ['required', 'string'],
            'passing_year'=> ['required', 'numeric'],
            'profession'=>['required'],
            'job_title'=>['required'],
            'job_location'=>['required'],
            'phone'=> ['required'],
            'current_address'=> ['nullable', 'string'],
            'permanent_address'=> ['nullable', 'string'],
        ];
    }

    public function update($advisor){
        DB::beginTransaction();
        
        try {

            $this->updateUser($advisor->user);
            $advisor->update($this->toAdvisorArray());

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function toAdvisorArray(){
        return [
            'institution'=> $this->institution,
            'department'=> $this->department,
            'passing_year'=> $this->passing_year,
            'profession'=> $this->profession,
            'job_title'=> $this->job_title,
            'job_location'=> $this->job_location,
            'current_address'=> $this->current_address,
            'permanent_address'=> $this->permanent_address,
            'phone'=> $this->phone,
        ];
    }


    public function toUserArray(){
        return [
            'name'=> $this->name,
        ];
    }
    private function updateUser($user){
        return $user->update($this->toUserArray());
    }
}
