<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoryRequest extends FormRequest
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
        $storyId = $this->route('story.id');
        return [
            'title' => ['required', 'min:6', 'max:50', function( $attribute, $value, $fail) {
                    if($value == 'Dummy Title') { $fail('The ' . $attribute . ' is not valid'); }
                },
                Rule::unique('stories')->ignore($storyId)
            ],
            'body' => ['required', 'min:25'],
            'type' => 'required',
            'status' => 'required',
            'image' => 'sometimes|mimes:jpeg,jpg,png'
        ];
    }

    public function withValidator($v)
    {
        $v->sometimes('body', 'max:100', function($value){
            return 'short' == $value->type;
        });
    }

    public function messages()
    {
        return [
            'title.required' => 'You must enter :attribute',
            'required' => 'Please enter :attribute'
        ];
    }
}
