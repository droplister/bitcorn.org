<?php

namespace App\Http\Requests\Causes;

use App\Cause;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', Cause::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $fortyFiveDays = Carbon::now()->addDays(45)->format('Y-m-d');

        return [
            'title' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'content' => 'required|max:5000',
            'address' => 'required|min:26|max:34',
            'memo' => 'required|unique:causes|min:4|max:12',
            'target' => 'required|min:1|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|dimensions:width=370,height=240',
            'asset_id' => 'required|exists:assets,id',
            'ended_at' => 'required|date|after:yesterday|before_or_equal:' . $fortyFiveDays,
            'terms' => 'required',
        ];
    }
}
