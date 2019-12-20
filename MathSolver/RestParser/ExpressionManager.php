<?php
include("AdvancedExpression.php");
include ("MathOperatorChecker.php");
$data = json_decode(file_get_contents("php://input"), true);
$input = $data['input'];
//It must receive the x vairable by the POST method. For this example, it's used a static one.
$variable = "x";
$expression = new AdvancedExpression($input,$variable);
echo file_get_contents($expression->getRestURL());