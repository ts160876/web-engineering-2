<?php
//Similarly to anonymous function, PHP does also support anonymous classes (and objects instantiated from those).
//Here is a very simple example.

//Define an interface for classes to be used to log activities.
interface Logger
{
    public function logSomething(string $message);
}

//Define a simple logger which logs activities to the console.
class ConsoleLogger implements Logger
{
    public function logSomething(string $message)
    {
        echo $message . PHP_EOL;
    }
}

//Define a Calculator class. This offers simple methods for add, subtract, multiple and divide.
//The constructor expect a logger (i.e. class/object implementing the Logger interface).
class Calculator
{
    private Logger $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    function add($a, $b)
    {
        $this->logger->logSomething("Add numbers " . $a . " and " . $b . ".");
        return $a + $b;
    }

    function subtract($a, $b)
    {
        $this->logger->logSomething("Subtract numbers " . $a . " and " . $b . ".");
        return $a - $b;
    }

    function multiply($a, $b)
    {
        $this->logger->logSomething("Multiply numbers " . $a . " and " . $b . ".");
        return $a * $b;
    }

    function divide($a, $b)
    {
        $this->logger->logSomething("Divide numbers " . $a . " and " . $b . ".");
        return $a / $b;
    }
}

//Create a calculator and use an instance of ConsoleLogger for the logging.
echo "Create a calculator and use an instance of ConsoleLogger for the logging." . PHP_EOL;
$consoleLogger = new ConsoleLogger();
$calculator1 = new Calculator($consoleLogger);
$calculator1->add(5, 7);
$calculator1->multiply(3, 8);

//Create another calculator and use an anonymous class for the logging.
echo "Create another calculator and use an anonymous class for the logging." . PHP_EOL;
$calculator2 = new Calculator(new class implements Logger {
    public function logSomething(string $message)
    {
        //Log everything in upper case.
        echo strtoupper($message) . PHP_EOL;
    }
});
$calculator2->add(5, 7);
$calculator2->multiply(3, 8);
