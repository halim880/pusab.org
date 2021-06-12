<?php

namespace App\Http\Requests;

use App\Exceptions\ApplicantNotFoundException;
use App\Models\Applicant;
use App\Models\Result;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Http\FormRequest;

class ResultRequest extends FormRequest
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
            'applicant_id'=> ['required', 'numeric'],
            'correct_answer'=> ['required', 'numeric', 'max:100', 'min:0'],
            'incorrect_answer'=> ['required', 'numeric', 'max:100', 'min:0'],
        ];
    }

    public function store(){
        Result::create($this->toArray());
    }

    public function toArray()
    {
        try {
            $applicant = Applicant::findOrFail($this->applicant_id);
            return [
                'applicant_id'=> $applicant->id,
                'correct_answer'=> $this->correct_answer,
                'incorrect_answer'=> $this->incorrect_answer,
                'score'=> $this->score(),
            ];
        } catch (ModelNotFoundException $th) {
            throw new ApplicantNotFoundException("Applicant with the given roll ".$this->applicant_id." is not found");
        }
    }

    public function score(){
        return intval($this->correct_answer) - 0.4 * intval($this->incorrect_answer);
    }
}
