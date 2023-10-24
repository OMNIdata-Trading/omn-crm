<?php

function getTheInitialLetters($term, $separator = ' ')
{
    $initials = '';
    $names = explode($separator, $term);
    foreach($names as $name){
        $wordWithoutAccentuation = removeAccent($name);
        $initials .= str_split($wordWithoutAccentuation)[0];
    }
    return $initials;
}

function removeAccent($term){
    $from = [
        'à', 'á', 'â', 'ã', 'ä', 'å', 'æ',
        'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ',
        'ß', 'ç', 'Ç',
        'è', 'é', 'ê', 'ë',
        'È', 'É', 'Ê', 'Ë',
        'ì', 'í', 'î', 'ï',
        'Ì', 'Í', 'Î', 'Ï',
        'ñ', 'Ñ',
        'ò', 'ó', 'ô', 'õ', 'ö',
        'Ò', 'Ó', 'Ô', 'Õ', 'Ö',
        'š', 'Š',
        'ù', 'ú', 'û', 'ü',
        'Ù', 'Ú', 'Û', 'Ü',
        'ý', 'Ý', 'ž', 'Ž'
    ];
    
    $to = [
        'a', 'a', 'a', 'a', 'a', 'a', 'a', 
        'A', 'A', 'A', 'A', 'A', 'A', 'A',
        'B',  'c', 'C',
        'e', 'e', 'e', 'e',
        'E', 'E', 'E', 'E',
        'i', 'i', 'i', 'i',
        'I', 'I', 'I', 'I', 
        'n',  'N',
        'o', 'o', 'o', 'o', 'o',
        'O', 'O', 'O', 'O', 'O', 
        's',  'S', 
        'u', 'u', 'u', 'u', 
        'U', 'U', 'U', 'U', 
        'y',  'Y', 'z', 'Z'
    ];

    return str_replace( $from, $to, $term );
}