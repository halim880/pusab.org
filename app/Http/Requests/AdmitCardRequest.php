<?php

namespace App\Http\Requests;

use App\Http\Controllers\Scholarship\ApplicantController;
use App\Models\AdmitCard;
use App\Models\Applicant;
use Illuminate\Foundation\Http\FormRequest;

class AdmitCardRequest extends FormRequest
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
            'applicant_id'=> ['required'],
            'center_id'=> ['required'],
            'room_number'=> ['nullable', 'numeric'],
            'sit_number'=>['nullable', 'numeric'],
            'image'=>['nullable', 'image', 'mimes:jpg,png,jpeg'],
        ];
    }

    public function store(){
        return AdmitCard::create($this->toArray());
    }

    public function toArray()
    {
        return [
            'applicant_id'=> $this->applicant_id,
            'center_id'=> $this->center_id,
            // 'room_number'=> $this->room_number,
            // 'sit_number'=>$this->sit_number,
            // 'image'=> AdmitCard::getImageName($this->image),
        ];
    }
}
