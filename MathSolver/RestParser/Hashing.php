<?php


class Hashing
{
    static function hashPrefixValue($operator)
    {
        $operatorHashValue = 0;
        for($i = 0; $i < $length = strlen($operator); $i++){
            $operatorHashValue = $operatorHashValue + intval(ord($operator[$i] )* .31);
        }
        return $operatorHashValue;
    }
}