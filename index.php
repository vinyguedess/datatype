<?php

require __DIR__ . '/vendor/autoload.php';

echo "<strong>Strings</strong>:<br />";
$string = new DataType\String\Text('datatype');
echo "String: {$string}<br />";

echo "String Replace: {$string->replace('data', 'xtree')}<br />";
echo "String Chained Replace: {$string->replace('data', 'xtree')->replace('type', '-xmas')}<br />";
echo "String Substring: {$string->substring(4)}<br />";
echo "String Chained Substring: {$string->substring(4)->substring(2, 2)}<br />";

// --------------------------------------------------------------------------------------------------------------

echo "<br /><strong>Numbers</strong>:<br />";
$integer = new DataType\Number\Integer(6);
echo "Integer: {$integer}<br />";

$float = new DataType\Number\Double(2.75);
echo "Float: {$float}<br />";

echo "Sum: {$integer->add($float)}<br />";
echo "Subtraction: {$integer->subtract($float)}<br />";
echo "Multiply: {$integer->multiply($float)}<br />";
echo "Divide: {$integer->divide($float)}<br />";
echo "Potentiation: {$integer->potentiation(new DataType\Number\Integer(2))}<br />";

// --------------------------------------------------------------------------------------------------------------

echo "<br /><strong>Lambda</strong><br />";
$lambda = new DataType\Lambda\Lambda(function($a, $b) {
        return $a * $b;
});
echo "Lambda: {$lambda(3, 10)}<br />";

echo "Starting chained Lambda:<br />";
$chainedLambda = new DataType\Lambda\ChainedLambda(function($string) {
        return str_replace(' ', '', $string);
});

$chainedLambdaResponse = $chainedLambda('Essa e uma string de teste')
    ->use($string)
    ->use($integer)
    ->then(function(DataType\String\Text $stringer, $response) {
        echo $response . '<br />';
        return substr($response, -10);
    })
    ->then(function($response) {
        echo $response . '<br />';
        return str_replace('teste', ' xxx', $response);
    })
    ->then(function($response) {
        echo $response . '<br />';
        return "OK";
    })->get();
echo "Response of chained lambda: {$chainedLambdaResponse}<br />";

// --------------------------------------------------------------------------------------------------------------

echo "<br /><strong>Array</strong><br />";

$array = new DataType\ArrayType\Map;
$array->add(1);
$array->add(2);
$array->add($float);
$array->add($string);
echo "Array to Json:{$array}<br />";
