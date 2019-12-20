<?php


interface IMathOperator
{
    /**
     * Trigonométical functions;
     */
    CONST SIN = "sin";
    CONST COS = "cos";
    CONST TAN = "tan";
    CONST COT = "cot";
    CONST CSC = "csc";
    CONST SEC = "sec";

    /**
     * Math functions
     */
    CONST SQRT = "sqrt";
    CONST EXP = "exp";
    CONST LOG = "log";
    CONST LN = "ln";

    CONST L_PARENTHESIS = "%28";
    CONST R_PARENTHESIS = "%29";
    CONST PLUS = "%2B";
    CONST COMMA = "%2C";
    CONST SLASH = "%2F";

    static function verifyMathFunctions($clientExpression);
    static function parse($clientExpression);
}