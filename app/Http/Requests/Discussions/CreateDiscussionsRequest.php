<?php

namespace LaravelForum\Http\Requests\Discussions;

use Illuminate\Foundation\Http\FormRequest;

class CreateDiscussionsRequest extends FormRequest
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
            //
            'title' => 'required|unique:discussions',
            'content' => 'required',
            'channel_id' => 'required',
        ];
    }
}
