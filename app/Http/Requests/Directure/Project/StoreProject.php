<?php

namespace App\Http\Requests\Directure\Project;

use Illuminate\Foundation\Http\FormRequest;

class StoreProject extends FormRequest
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
            'project_name' => 'required|max:255',
            'start_date' => 'required|date',
            'deadline' => 'required|date',
            'location' => 'required|max:255',
            'project_cost' => 'required|numeric',
            'client' => 'required|',
        ];
    }
}
