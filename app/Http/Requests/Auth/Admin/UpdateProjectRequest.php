<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()) {
            return true; // blocca l'azione e da un errore di autorizzazione
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */

    public function rules()
    {
        return [
            "img_cover" => "min:100",
            "name" => "required|min:5|max:255",
            "description" => "required|min:35",
            "link_project" => "min:20",
            "creation_date" => "required|date",
        ];
    }

    public function messages(){
        return[
            "img_cover.min" => "lunghezza minima 100 cartteri",

            "name.required" => "il campo è obbligatorio",
            "name.min" => "min 5 cxaratteri",
            "name.max" => "max 255 caratteri",
            
            "description.required" => "il campo è obbligatorio",
            "description.min" => "min 35 caratteri",
            
            "link_project.min" => "lunghezza minima 20 caratteri",
            
            "creation_date.require" => "il campo è obbligatorio",
            "creation_date.date" => "è richiesta una data",

        ];

    }
}
