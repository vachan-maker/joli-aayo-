<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Enums\ApplicationStatus;
use Illuminate\Validation\Rules\Enum;
class StoreApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company_name' => 'required|string|max:255',
            'role_title' => 'required|string|max:255',
            'status' => ['required', new Enum(ApplicationStatus::class)],
            'date_applied' => 'required|date',
            'job_url' => 'nullable|url',
            'email' => 'nullable|email',
            'source' => 'nullable|string|max:255',
            'resume_version_id'=>'nullable|integer'
        ];
    }
}
