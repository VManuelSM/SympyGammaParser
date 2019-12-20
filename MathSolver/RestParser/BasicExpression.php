<?php

include_once("SympyOperatorDictionary.php");
include_once("IMathOperator.php");
include_once("ISympyPrefix.php");

class BasicExpression implements ISympyPrefix, IMathOperator
{
    private $operator = "";
    private $expression = "";
    private $restURL = "";

    /**
     * BasicExpression constructor.
     * @param $stringExpression
     */
    public function __construct($stringExpression)
    {
        $this->operator = $this->getOperatorfromInput($stringExpression);
        $this->choosePrefix();
        $this->formExpression($stringExpression);
    }

    /**
     * @param int|string $operator
     */
    protected function setOperator($operator): void
    {
        $this->operator = $operator;
    }
    protected function formExpression($stringExpression){
        /* Some shit I haven't developed */
        $parsedExpression = "";
        foreach (str_split($stringExpression) as $letter){
            $parsedExpression = $parsedExpression . MathOperatorChecker::parse($letter);
        }
        $this->formRestURL($parsedExpression);
    }

    protected function formCompleteRestURL(){
        $this->restURL = $this->restURL . $this->expression;
    }

    /**
     * @param string $restURL
     */
    protected function setRestURL(string $restURL): void
    {
        $this->restURL = $restURL;
    }

    /**
     * @param $input is the expression that contains the Sympy operator and the content of the mathematic problem
     * @return int|string
     */
    protected function getOperatorfromInput($input)
    {
        $inputOperator = explode("(", $input)[0];
        $operatorHashValue = Hashing::hashPrefixValue($inputOperator);
        return SympyOperatorDictionary::getInstance()->getDictionaryItemValue($operatorHashValue) != null ? $inputOperator : "Operator no suported";
    }

    /**
     * @return mixed
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     *
     */
    function choosePrefix()
    {
        switch ($this->operator) {
            case ISympyOperator::DIFFERENTIATION:
                $this->restURL = ISympyPrefix::SYMPY_ADDRESS . ISympyPrefix::STEP_BY_STEP_REQUEST_PREFIX . ISympyPrefix::DIFF_REQUEST_PREFIX ;
                break;
            case ISympyOperator::INTEGRATION:
                $this->restURL = ISympyPrefix::SYMPY_ADDRESS . ISympyPrefix::STEP_BY_STEP_REQUEST_PREFIX . ISympyPrefix::INT_REQUEST_PREFIX;
                break;
            default:
                $this->restURL = ISympyPrefix::SYMPY_ADDRESS . ISympyPrefix::BASIC_REQUEST_PREFIX . $this->operator;

        }
    }

    /**
     * @return string
     */
    public function getRestURL(): string
    {
        return $this->restURL;
    }

    /**
     * @return string
     */
    public function getExpression(): string
    {
        return $this->expression;
    }
    protected function formRestURL($stringExpression){
        $this->restURL = $this->restURL.  ISympyPrefix::EXPRESSION.$stringExpression;
    }

    static function verifyMathFunctions($clientExpression)
    {
        // TODO: Implement verifyMathFunctions() method.
    }

    static function parse($clientExpression)
    {
        // TODO: Implement parse() method.
    }
}
