<?php

class Fizzbuzz
{
    private $argc;
    private $argv;
    private $n;

    public function __construct($argc, $argv)
    {
        $this->argc = $argc;
        $this->argv = $argv;
        $this->n = null;
    }

    public function start()
    {
        if(!$this->validation()){
            return;
        }

        for ($i = 1; $i <= $this->n; $i++) {

            if (($i % 3 === 0) && ($i % 5 === 0)) {
                echo "FizzBuzz\n";
            } elseif($i % 3 === 0) {
                echo "Fizz\n";
            } elseif($i % 5 === 0){
                echo "Buzz\n";
            } else {
                echo $i."\n";
            }

        }

    }

    public function validation()
    {
        // Check for commandline arguments
        if($this->argc < 3){
            echo("Missing Command line arguments:\n");
        } else {
            $function = $this->argv[1];
            // Check if the method exists
            if (!method_exists($this, $function)) {
                echo("Please write \"php Fizzbuzz.php start\" followed by any number \n");
            } else {
                // Check if N is a positive integer
                $n = $this->argv[2];
                if (!(is_numeric($n) && $n > 0 && intval($n) == $n)) {
                    echo("You must provide a positive integer");
                } else {
                    $this->n = $n;
                    return true;
                }
            }
        }
        return false;
    }
}


$fizzBuzz = new Fizzbuzz($_SERVER['argc'], $_SERVER['argv']);

$fizzBuzz->start();
