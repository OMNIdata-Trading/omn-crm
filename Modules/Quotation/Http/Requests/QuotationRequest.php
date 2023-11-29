<?php

namespace Modules\Quotation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuotationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vendor' => 'required',
            'delivery_time' => '',
            'requested_at' => 'required',
            'file_name' => 'required',
            'file' => 'mimetypes:application/pdf,image/png,image/jpeg,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet|max:102400'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'vendor.required' => 'Fornecedor: é um campo obrigatório',
            'requested_at.required' => 'Data da solicitação: é um campo obrigatório',
            'file_name' => 'Nome do arquivo: é um campo obrigatório',
            'file.required' => 'Seleccione um arquivo',
            'file.mimes' => 'O arquivo deve ser do tipo: png,jpg,pdf,docx,xlsx',
            'file.max' => 'O tamanho máximo do arquivo deve ser 100MB'
        ];
    }
}
