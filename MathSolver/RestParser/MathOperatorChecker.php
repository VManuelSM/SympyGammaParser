<?php

include_once ("IMathOperator.php");

class MathOperatorChecker implements IMathOperator
{

    static function parse($shortExpression)
    {
        if (is_numeric($shortExpression)) return $shortExpression;
        else{
            switch ($shortExpression) {
                case "+": return IMathOperator::PLUS;           break;
                case "/": return IMathOperator::SLASH;          break;
                case ",": return IMathOperator::COMMA;          break;
                case "(": return IMathOperator::L_PARENTHESIS;  break;
                case ")": return IMathOperator::R_PARENTHESIS;  break;
                default: return $shortExpression;
            }
        }
    }

    static function verifyMathFunctions($clientExpression)
    {
        $rParenthesis = array();
        $lParenthesis = array();
        for ($i = 0; $i < $length = strlen($clientExpression); $i++){
            if ($clientExpression[$i] == IMathOperator::R_PARENTHESIS) array_push($rParenthesis, $clientExpression[$i]);
            if ($clientExpression[$i] == IMathOperator::L_PARENTHESIS) array_push($lParenthesis, $clientExpression[$i]);
        }
        return sizeof($rParenthesis) == sizeof($lParenthesis);
    }

    static function formParseContent($clientExpression){
        if(self::verifyMathFunctions()){

        }
    }
}