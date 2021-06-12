<?php

namespace App\Http\Requests;

use App\Models\Activity;
use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
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
            'title'=> ['required', 'string', 'max:150'],
            'description'=> ['required', 'string'],
            'time'=> ['date'],
            'image'=> ['required', 'image', 'mimes:jpg,png,jpeg'],
        ];
    }

    public function store(){
        Activity::create($this->toArray());
        Activity::storeImage($this->image);
    }

    public function toArray()
    {
        return [
            'title'=> $this->title,
            'description'=> $this->description,
            'image'=> Activity::getImageName($this->image),
            'time'=> $this->time,
        ];
    }

}
