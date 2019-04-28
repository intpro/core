<?php

namespace Interpro\Core;


class Helpers
{
    public static function laravel_db_result_to_array($result)
    {
        if(gettype($result) != 'array')
        {
            $result = $result->map(function($x){ return (array) $x;})->toArray();
        }

        return $result;
    }
}