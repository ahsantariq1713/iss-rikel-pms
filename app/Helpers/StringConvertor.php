<?php

namespace App\Helpers;

class StringConvertor
{
    public static function toPropCase($input)
    {
        str_replace(' ' , '' , $input);
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }

    public static function Abbrv($s)
    {
        if (preg_match_all('/\b(\w)/', strtoupper($s), $m)) {
            $v = implode('', $m[1]);
            return $v;
        }
    }
}
