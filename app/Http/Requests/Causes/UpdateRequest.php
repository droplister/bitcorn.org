<?php

namespace App\Http\Requests\Causes;

use App\Cause;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $cause = Cause::find($this->route('cause'));

        return $cause && $this->user()->can('update', $cause);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'decision' => 'required|in:approved_at,rejected_at',
        ];
    }
}