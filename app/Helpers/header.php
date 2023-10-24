<?php

function activeIfUrlIs (string $uri, $classToReturn = 'active', int $segment = 2)
{
    $actualEndpoint = request()->segment($segment);
    if(!($actualEndpoint == $uri)){
        return '';
    }
    return $classToReturn;
}