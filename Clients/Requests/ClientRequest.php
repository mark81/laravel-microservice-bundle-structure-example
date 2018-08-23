<?php

namespace App\Clients\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        if (in_array($this->method(), ['GET', 'OPTIONS', 'DELETE'])) {
            return [];
        }

        switch ($this->method()) {
            case 'PUT':
                return [
                    'name' => 'sometimes|string',
                    'code' => 'sometimes|nullable|string',
                    'description' => 'sometimes|nullable|string',
                    'telephone' => 'sometimes|nullable|string',
                    'email' => 'sometimes|nullable|email',
                    'street' => 'sometimes|nullable|string',
                    'county' => 'sometimes|nullable|string',
                    'city' => 'sometimes|nullable|string',
                    'country' => 'sometimes|nullable|string',
                    'postcode' => 'sometimes|nullable|string'
                ];
            case 'POST':
                return [
                    'type_id' => 'required|integer',
                    'name' => 'required|string',
                    'code' => 'sometimes|nullable|string',
                    'description' => 'sometimes|nullable|string',
                    'telephone' => 'sometimes|nullable|string',
                    'email' => 'sometimes|nullable|email',
                    'street' => 'sometimes|nullable|string',
                    'county' => 'sometimes|nullable|string',
                    'city' => 'sometimes|nullable|string',
                    'country' => 'sometimes|nullable|string',
                    'postcode' => 'sometimes|nullable|string'
                ];
        }
    }
}
