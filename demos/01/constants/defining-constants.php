<?php
//Define a simple constant (integer) with define().
//The constant is defined at RUNTIME.
//Remark: By convention, constant indentifiers are UPPERCASE.
define("A_CONSTANT", 5);
//Define a simple constant (integer) with constant.
//The constant is defined at COMPILE TIME.
const B_CONSTANT = 6;

//The constants can be accessed using their name.
echo A_CONSTANT . PHP_EOL;
echo B_CONSTANT . PHP_EOL;

//With define() the constant name can be specified dynamically.
//That is NOT possible with const. 
define("CONSTANT_NAME", "C_CONSTANT");
define(CONSTANT_NAME, 7);

//The following statement works despite am error displayed in the IDE.
//echo C_CONSTANT . PHP_EOL;

function  someFunction()
{
    //Define() can also be used in functions, loops, if statements, try/catch blocks.
    define("D_CONSTANT", 8);
    echo D_CONSTANT . PHP_EOL;
    //Const can only be used in global scope (i.e., outside functions, if statements, try/catch blocks) and in classes.
    //const E_CONSTANT ) 9;
}

someFunction();

//List all constants. The list includes:
//- Constants defined with define().
//- Constants defined with const. 
//- Predefined constants, such as PHP_VERSION, PHP_EOL, E_ERROR, E_WARNING, E_NOTICE.
foreach (get_defined_constants() as $key => $value) {
    echo $key . " of type " . gettype($value) . PHP_EOL;
}
