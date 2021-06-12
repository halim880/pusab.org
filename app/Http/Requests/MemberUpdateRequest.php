<?php

namespace App\Http\Requests;

use App\Models\Member;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MemberUpdateRequest extends FormRequest
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
            'father_name'=> ['required'],
            'mother_name'=> ['required'],
            'institution'=> ['required'],
            'department'=> ['required'],
            'session'=> ['required'],
            'college'=> ['required'],
            'high_school'=> ['required'],
            'blood_group'=> ['required'],
            'village'=>['required'],
            'post_office'=>['required'],
            'union'=>['required'],
            'current_address'=> ['required'],
            'phone'=> ['required'],
        ];
    }


    
    public function update($member){
        DB::beginTransaction();
        
        try {

            $this->updateUser($member->user);
            $member->update($this->toMemberArray());

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function toMemberArray(){
        return [
            'father_name'=> $this->father_name,
            'mother_name'=> $this->mother_name,
            'institution'=> $this->institution,
            'department'=> $this->department,
            'session'=> request('session'),
            'college'=> $this->college,
            'high_school'=> $this->high_school,
            'blood_group'=> $this->blood_group,
            'village'=>$this->village,
            'post_office'=>$this->post_office,
            'union'=>$this->union,
            'current_address'=> $this->current_address,
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

