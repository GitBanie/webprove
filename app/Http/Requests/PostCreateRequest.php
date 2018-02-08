<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
            'category_id' => 'required|in:1,2,3,4,5,6,7,8',
            'post_type'   => 'required|in:stage,formation',
            'title'       => 'required|string|max:100',
            'description' => 'required|string',
            'started_at'  => 'required|date|date_format:Y-m-d H:i:s|before:ended_at',
            'ended_at'    => 'required|date|date_format:Y-m-d H:i:s|after:started_at',
            'price'       => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'status'      => 'required|in:published,unpublished',
            'picture'     => 'image',
        ];
    }
}
