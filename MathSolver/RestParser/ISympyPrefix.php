<?php


interface ISympyPrefix
{
    CONST SYMPY_ADDRESS = "https://gamma.sympy.org/";
    CONST BASIC_REQUEST_PREFIX = "input/?i=";
    CONST STEP_BY_STEP_REQUEST_PREFIX = "card/";
    CONST DIFF_REQUEST_PREFIX = "diffsteps?";
    CONST INT_REQUEST_PREFIX = "intsteps?";
    CONST VARIABLE = "variable=";
    CONST EXPRESSION = "&expression=";

    function choosePrefix();
}