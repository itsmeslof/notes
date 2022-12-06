<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNotebookRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user() != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            // 'require_passcode' => ['sometimes', 'boolean'],
            // 'passcode_duration' => ['required_if:require_passcode,true', 'integer', 'min:1', 'max'],
            // 'passcode_interval' => ['required_if:require_passcode,true', 'integer', Rule::in([
            //     PasscodeInterval::MINUTES,
            //     PasscodeInterval::HOURS
            // ])]
        ];
    }
}
