<?php

namespace App\Helpers;

interface FormatterInterface
{
    public function date($value): string;
    public function localizedDate($value): string;
    public function localizedDatetime($value): string;
    public function currency($value): string;
}
