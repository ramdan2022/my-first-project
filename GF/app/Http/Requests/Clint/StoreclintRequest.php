<?php

namespace App\Http\Requests\Clint;

use Illuminate\Foundation\Http\FormRequest;



class StoreclintRequest extends FormRequest
{
    function rules()
    {
        return [
            'clintsNumber' => 'bail|required',
            'clintsName' => 'required|min:3|max:15',
            'postalCode' => ['required', 'integer'],

        ];
    }

    function messages()
    {
        return [
            'clintsNumber.integer' => 'you must add full number of four digits',
            'clintsNumber.required' => 'you must add some thing here ya man focus',
        ];
    }

    // make sure that c.n is more than 0 and less than 1000


    /**
     * Summary of clintsNumberZero
     * @var $x int
     * @return bool
     */
    function clintsNumberZero()
    {
        if (intval($this->clintsNumber) == 0) {
            return true;
        }
    }

    function clintsNumberGreater()
    {
        if (intval($this->clintsNumber) < 1000) {
            return true;
        }
    }

    // make sure is phon is Wright

    function PhoneInEgypt()
    {
        $ops = ['010', '011', '012', '015'];

        $op = substr($this->phone, 0, 3);

        if (!in_array($op, $ops)) {
            return true;
        }
    }

    // spiciefic custome error massege

    function WithValidator($validator)
    {
        $validator->after(function($validator) {

            if ($this->clintsNumberZero()) {
                $validator->errors()->add('clintsNumber', 'the clints number should not be zero');
            }

            if ($this->clintsNumberGreater()) {
                $validator->errors()->add('clintsNumber', 'the clintsnumber should be start by 1 or more');
            }

            if ($this->PhoneInEgypt()) {
                $validator->errors()->add('phone', 'this is not egyptian number');
            }
        });

    }
}