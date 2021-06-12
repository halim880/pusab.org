<?php

namespace App\Http\Requests;

use App\Models\Member;
use App\Models\User;
use App\Notifications\MemberRequestNotification;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role;

class MemberRegistrationRequest extends FormRequest
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
            'password'=> ['required'],
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
            'image'=> ['required', 'mimes:jpg,jpeg,png'],
        ];
    }


    
    public function createMember(){
        DB::beginTransaction();
        try {

            $member = Member::create($this->toMemberArray());
            if($member!==null) {
                Member::storeImage($this->image);
                $this->sendNotification($member);
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function toMemberArray(){
        return [
            'user_id'=> $this->getUserId(),
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
            'image'=> Member::getImageName($this->image),
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
        $user = User::create($this->toUserArray());
        $user->assignRole('member');
        return $user->id;
    }

    private function sendNotification($member){
        $role = Role::where('name', 'admin')->first();
        foreach ($role->users as $admin) {
            Notification::send($admin, new MemberRequestNotification($member));
        }
    }
}
