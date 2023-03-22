<?php

namespace App\Http\Services;

class LeadService
{
    public static function createFullName($first_name, $last_name): string
    {
        return $first_name. ' ' . $last_name;
    }
}
