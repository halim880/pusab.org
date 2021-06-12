<?php

namespace App\Http\Requests;

use App\Models\SayorPost;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SayorPostRequest extends FormRequest
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
            'category_id'=> ['required', 'numeric'],
            'title'=> ['required', 'string', 'max:150'],
            'body'=> ['required', 'string', 'max:1500'],
        ];
    }

    public function store(){
        SayorPost::create($this->toArray());
    }

    public function toArray()
    {
        return [
            'user_id'=> Auth::user()->id,
            'category_id'=> $this->category_id,
            'title'=> $this->title,
            'body'=> $this->body,
        ];
    }
}
