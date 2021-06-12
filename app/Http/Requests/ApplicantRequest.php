<?php

namespace App\Http\Requests;

use App\Events\NewApplicantCreatedEvent;
use App\Models\Applicant;
use Illuminate\Foundation\Http\FormRequest;

class ApplicantRequest extends FormRequest
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
            'school_id'=> ['required', 'numeric'],
            'class'=> ['required', 'numeric', 'min:8', 'max:10'],
            'exam_id'=> ['required', 'numeric'],
            'village'=>['required'],
            'post_office'=>['required'],
            'union'=>['required'],
            'current_address'=> ['required'],
            'phone'=> ['required'],
            'admit_card_id'=> ['nullable', 'numeric'],
            'image'=> ['required', 'mimes:jpg,jpeg,png'],
        ];
    }

    public function store(){
        $applicant = Applicant::create($this->toArray());
        if($applicant!==null) {
            Applicant::storeImage($this->image);
            NewApplicantCreatedEvent::dispatch($applicant);
        }
    }
    public function update($applicant){

        $image = $applicant->image;
        if ($applicant->update($this->toArray())) {
            $applicant->removeImage($image);
            Applicant::storeImage($this->image);
        };

    }

    public function toArray()
    {
        return [
            'name'=> $this->name,
            'id'=> $this->roll(),
            'father_name'=> $this->father_name,
            'mother_name'=> $this->mother_name,
            'school_id'=> $this->school_id,
            'class'=> $this->class,
            'exam_id'=> $this->exam_id,
            'village'=>$this->village,
            'post_office'=>$this->post_office,
            'union'=>$this->union,
            'current_address'=> $this->current_address,
            'phone'=> $this->phone,
            'image'=> Applicant::getImageName($this->image),
        ];
    }

    public function roll(){
        $lastRoll = Applicant::where([
            'exam_id'=> $this->exam_id,
            'class'=> $this->class,
        ])->orderBy('id', 'DESC')->first();

        $roll = '';

        if ($lastRoll==null) {
            if (intval($this->class) < 10) {
                $roll = '210'.$this->class.'0000';
            } else $roll = 21100000;
        } else $role = $lastRoll->id;
        return intval($roll) + 1;
    }
}
