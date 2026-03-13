<?php
//Demonstrate the usage of property hooks. A property hook overrides the read and write behavior.
//This only works with PHP 8.4
class SimpleNumber
{
    public int $aNumberThatCanOnlyBeIncreased = 0 {
        get {
            echo "Call GET for aNumberThatCanOnlyBeIncreased." . PHP_EOL;
            $this->readAccesses++;
            return $this->aNumberThatCanOnlyBeIncreased;
        }
        set(int $number) {
            echo "Call SET for aNumberThatCanOnlyBeIncreased." . PHP_EOL;
            if ($number > $this->aNumberThatCanOnlyBeIncreased) {
                $this->aNumberThatCanOnlyBeIncreased = $number;
                echo "Successfully set the number by increasing it to " . $number . "." . PHP_EOL;
                $this->writeAccesses++;
            } else {
                echo "Number could not be set, since it would not have been an increase." . PHP_EOL;
            }
        }
    }
    private int $readAccesses;
    private int $writeAccesses;

    public function __construct($number)
    {
        //Initializing the number of read accesses here causes the read access in the 
        //constructor is (also) counted.
        $this->readAccesses = 0;
        $this->writeAccesses = 0;
        $this->aNumberThatCanOnlyBeIncreased = $number;
    }

    public function getNumberOfReadAccesses()
    {
        return $this->readAccesses;
    }

    public function getNumberOfWriteAccesses()
    {
        return $this->writeAccesses;
    }
}

//Create a new number.
echo "Create a new number 5. Notice that this already calls the GET hook." . PHP_EOL;
$n1 = new SimpleNumber(5);
echo "Read the number." . PHP_EOL;
$n1->aNumberThatCanOnlyBeIncreased;
echo "Read the number." . PHP_EOL;
$n1->aNumberThatCanOnlyBeIncreased;
echo "Try to increase the number to 7." . PHP_EOL;
$n1->aNumberThatCanOnlyBeIncreased = 7;
echo "Try to decrease the number to 3." . PHP_EOL;
$n1->aNumberThatCanOnlyBeIncreased = 3;
echo "Show the number of read and (successful) write acceses." . PHP_EOL;
echo "Number of read accesses: " . $n1->getNumberOfReadAccesses() . PHP_EOL;
echo "Number of write accesses: " . $n1->getNumberOfWriteAccesses() . PHP_EOL;
