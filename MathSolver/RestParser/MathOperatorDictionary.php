<?php

include_once ("IMathOperator.php");

class MathOperatorDictionary
{
    private static $instance = MathOperatorDictionary::class;
    private $dictionary = null;

    /**
     * MathOperatorDictionary constructor.
     */
    private function __construct()
    {
        $this->dictionary = array(

            Hashing::hashPrefixValue(IMathOperator::SIN) => IMathOperator::SIN,
            Hashing::hashPrefixValue(IMathOperator::COS) => IMathOperator::COS,
            Hashing::hashPrefixValue(IMathOperator::TAN) => IMathOperator::TAN,
            Hashing::hashPrefixValue(IMathOperator::COT) => IMathOperator::COT,
            Hashing::hashPrefixValue(IMathOperator::CSC) => IMathOperator::CSC,
            Hashing::hashPrefixValue(IMathOperator::SEC) => IMathOperator::SEC,
            Hashing::hashPrefixValue(IMathOperator::EXP) => IMathOperator::EXP,
            Hashing::hashPrefixValue(IMathOperator::LN) => IMathOperator::LN,
            Hashing::hashPrefixValue(IMathOperator::LOG) => IMathOperator::LOG,
            Hashing::hashPrefixValue(IMathOperator::L_PARENTHESIS) => IMathOperator::L_PARENTHESIS,
            Hashing::hashPrefixValue(IMathOperator::R_PARENTHESIS) => IMathOperator::R_PARENTHESIS,
            Hashing::hashPrefixValue(IMathOperator::COMMA) => IMathOperator::COMMA,
            Hashing::hashPrefixValue(IMathOperator::PLUS) => IMathOperator::PLUS,

        );
    }

    public static function getInstance()
    {
        if(self::$instance == null) self::$instance = new MathOperatorDictionary();
        return self::$instance;
    }

    public function getDictionaryItemValue($hashValue)
    {
        return self::$instance->dictionary[$hashValue];
    }
}