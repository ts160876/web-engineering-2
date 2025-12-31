<?php
//Define a few variables to demonstrate various expressions / operators.
$aVariable = 4;
$bVariable = 5;
$cVariable = "4";
$dVariable = "5";

//Comparison operators
echo "$aVariable == $bVariable: ";
var_dump($aVariable == $bVariable);
echo "$aVariable > $bVariable: ";
var_dump($aVariable > $bVariable);
echo "$aVariable < $bVariable: ";
var_dump($aVariable < $bVariable);
echo "$aVariable >= $bVariable: ";
var_dump($aVariable >= $bVariable);
echo "$aVariable <= $bVariable: ";
var_dump($aVariable <= $bVariable);

//Strict equivalence operators
echo "$aVariable == '$cVariable': ";
var_dump($aVariable == $cVariable);
echo "$aVariable === '$cVariable': ";
var_dump($aVariable === $cVariable);
echo "$aVariable != '$dVariable': ";
var_dump($aVariable != $dVariable);
echo "$aVariable !== '$dVariable': ";
var_dump($aVariable !== $dVariable);

//Increment and decrement operators (first pre, then post)
echo '$aVariable++: ';
echo $aVariable++ . PHP_EOL;
echo '$aVariable--: ';
echo $aVariable-- . PHP_EOL;
echo '$aVariable: ';
echo $aVariable . PHP_EOL;
echo '++$aVariable: ';
echo ++$aVariable . PHP_EOL;
echo '--$aVariable: ';
echo --$aVariable . PHP_EOL;
echo '$aVariable: ';
echo $aVariable . PHP_EOL;

//Combined operator-assignments
echo '$aVariable += 3: ';
echo $aVariable += 3;
echo PHP_EOL;
echo '$aVariable -= 5: ';
echo $aVariable -= 5;
echo PHP_EOL;
echo '$aVariable *= 10: ';
echo $aVariable *= 10;
echo PHP_EOL;
echo '$aVariable /= 4: ';
echo $aVariable /= 4;
