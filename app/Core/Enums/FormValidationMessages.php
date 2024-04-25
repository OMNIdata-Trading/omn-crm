<?php

namespace App\Core\Enums;

enum FormValidationMessages: string{
    case REQUIRED_FIELD = 'Campo obrigatório';
    case EXISTENT_FIELD = 'Este :field já está sendo utilizado';

    public static function existentField(string $field): string
    {
        return str_replace(':field', $field, self::EXISTENT_FIELD->value);
    }

}