<?php

namespace App\Helpers;

use Jenssegers\Date\Date;

class Formatter implements FormatterInterface
{
    public function date($value): string
    {
        return (new Date($value))->format("j F Y");
    }

    public function currency($value): string
    {
        return "Rp. " . number_format($value, 2, ",", ".");
    }
}
