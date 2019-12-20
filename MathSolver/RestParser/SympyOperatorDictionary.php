<?php

include_once ("ISympyOperator.php");
include_once ("Hashing.php");

class SympyOperatorDictionary implements ISympyOperator
{
    private $dictionary;
    private static $instance = null;

    /**
     * SympyOperatorDictionary constructor.
     */
    private function __construct()
    {
        $this->dictionary = array();
        $this->dictionary[Hashing::hashPrefixValue(self::SYMPLIFY)] = self::SYMPLIFY;
        $this->dictionary[Hashing::hashPrefixValue(self::DIVPOL)] = self::DIVPOL;
        $this->dictionary[Hashing::hashPrefixValue(self::GREATESTCOMMONDIVISOR)] = self::GREATESTCOMMONDIVISOR;
        $this->dictionary[Hashing::hashPrefixValue(self::LESSESTCOMMONMULTIPLIER)] = self::LESSESTCOMMONMULTIPLIER;
        $this->dictionary[Hashing::hashPrefixValue(self::FACTOR)] = self::FACTOR;
        $this->dictionary[Hashing::hashPrefixValue(self::ECUATIONSSYSTEM)] = self::ECUATIONSSYSTEM;
        $this->dictionary[Hashing::hashPrefixValue(self::LIMIT)] = self::LIMIT;
        $this->dictionary[Hashing::hashPrefixValue(self::DIFFERENTIATION)] = self::DIFFERENTIATION;
        $this->dictionary[Hashing::hashPrefixValue(self::INTEGRATION)] = self::INTEGRATION;
    }

    /**
     * @return SympyOperatorDictionary|null
     */
    public static function getInstance()
    {
        if(self::$instance == null) self::$instance = new SympyOperatorDictionary();
        return self::$instance;
    }

    /**
     * @param $operator
     * @return mixed
     */
    public function getDictionaryItemValue($hashValue)
    {
        return self::$instance->dictionary[$hashValue];
    }

    /**
     * @param $operator operator to be treating into this function to get its hash value
     * @return int hash value of the operator
     */
}