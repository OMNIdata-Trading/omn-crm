<?php

function getTheInitialLetters($term, $separator = ' ', $code = 'first_last_initials')
{
    $initials = '';
    $names = explode($separator, $term);
    foreach($names as $index => $name){
        $wordWithoutAccentuation = removeAccent($name);
        if($code === 'first_last_initials'){
            if($index === 0 || $index === count($names) - 1){
                $initials .= str_split($wordWithoutAccentuation)[0];
            }
        }else {
            $initials .= str_split($wordWithoutAccentuation)[0];
        }
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

function readableArray(
    $items,
    string $arrayIndex,
    string $transform = 'capitalize',
    string $separator = ', ',
)
{
    $transformedList = '';

    foreach($items as $key => $item){
        $separator = ($items->count() > 1) ? $separator : '';
        if($key == $items->count() - 1){
            $separator = '';
        }
        $transformedTerm = strTransform($item->$arrayIndex, $transform);
        $transformedList .= $transformedTerm . $separator;
    }

    return $transformedList;
    
}

function strTransform($term, $transformStyle){
    switch($transformStyle){
        case 'capitalize':
            return ucfirst($term);
        case 'uppercase':
            return strtoupper($term);
        default:
            return strtolower($term);
    }
}

function existsObjectInArray($array, $item, $property)
{
    foreach($array as $key => $arrayItem){
        if($arrayItem->$property == $item){
            // dd($array, $arrayItem, $item, $property, $key);
            return $key;
        }
    }
    return false;
}

function date_difference($date1, $date2, $income_format = 'days')
{
    // $income_format: y|m|d|h|i|s|weekday|days
    if($date1 == null || $date2 == null){
        return "empty";
    }

    $date1 = new DateTime($date1);
    $date2 = new DateTime($date2);

    return $date1->diff($date2)->$income_format;
}

function addTimeToDate($date1, $humanizedTime)
{
    if($date1 == null || $humanizedTime == null){
        return "empty";
    }
    $date1 = new DateTime($date1);
    $date1->modify("+$humanizedTime");

   return $date1->format('d-m-Y');
}

function dateSeparator($date, $separator = '-')
{
    if($date == null){
        return 'empty';
    }
    $date = new DateTime($date);
    return $date->format("d".$separator."m".$separator."Y");
}

function getThePercentage($number, $total)
{
    return (100 * $number) / $total . "%";
}

function validateWebsite(string $website)
{
    $headers = @get_headers($website);
    return $headers && strpos($headers[0], '200') ? true : false; 
}