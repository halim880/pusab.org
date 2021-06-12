<?php

namespace App\Http\Requests;

use App\Models\Exam;
use Illuminate\Foundation\Http\FormRequest;

class ScholarshipExamRequest extends FormRequest
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
            'date'=> ['required', 'date'],
        ];
    }

    public function store(){
        Exam::create($this->toArray());
    }

    public function update($exam){
        $exam->update($this->toArray());
    }

    public function toArray()
    {
        return [
            'name'=> $this->name,
            'date'=> $this->date,
        ];
    }
}
