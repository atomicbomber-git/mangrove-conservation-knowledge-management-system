<?php

namespace App\Helpers;

use Jenssegers\Date\Date;

class Formatter implements FormatterInterface
{
    public function date($value): string
    {
        return (new Date($value))->format("m/d/Y");
    }

    public function currency($value): string
    {
        return number_format($value, 2, ",", ".");
    }
}
