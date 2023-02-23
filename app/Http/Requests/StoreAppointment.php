<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointment extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
                'start_time'=> 'required|unique:appointments,start_time',
                'end_time'=> 'required|unique:appointments,end_time',
                'date'=>'required|date|date_format:Y-m-d',
                'employee_id'=> 'required|numeric',
                'client_id'=> 'required|numeric',
                'branch_id'=> 'required|numeric'
        ];
    }
}
