<?php
/**
 *  Base Request clas from which all the request are going to extend.
 *
 * @category Service
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

abstract class BaseRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        $errorMessages = json_decode(json_encode($validator->errors()), true);
        foreach ($errorMessages as $value) {
            foreach ($value as $message) {
                throw new BadRequestHttpException($message);
            }
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules();

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    abstract public function authorize();
}
