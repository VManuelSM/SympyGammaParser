<?php

include_once ("BasicExpression.php");

class AdvancedExpression extends BasicExpression
{
    private $variable = "";

    /**
     * AdvancedExpression constructor.
     * @param string $stringExpression
     * @param string $variable
     */
    public function __construct(string $stringExpression,string $variable)
    {
        parent::setOperator(parent::getOperatorfromInput($stringExpression));
        $this->variable = $variable;
        parent::choosePrefix();
        $this->addVariableToRestUrl();
        parent::formExpression($stringExpression);
    }
    private function addVariableToRestUrl()
    {
        parent::setRestURL(parent::getRestURL(). ISympyPrefix::VARIABLE . $this->variable);
    }

}