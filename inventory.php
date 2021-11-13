<?php

$_SESSION['Inventory'] = [];

/**
 * Creating class "Inventory"
 */
class Inventory
{
    public $input = [];

    public function __construct()
    {
        echo "Add item to inventory:";
        $input = trim(fgets(STDIN, 1024));
        $this->checkInput($input);
    }
    /**
     *  Check if the input is correct (ADD or END action) */
    public function checkInput($input)
    {
        $inputArray = explode(" ", $input);

        if ($inputArray[0] === "END") {
            if (empty($_SESSION['Inventory'])) {
                echo "inventory is empty \n";
            } else {
            /**
             *If the field is not empty, go to the second stage */
                include 'cart.php';
                return;
            }
            /** 
             * Added this option because app is crashing when you add decimal numbers to products quantity */
            function bd_nice_number($n) {
                
                $n = (0+str_replace(",","",$n));
               
                
                if(!is_numeric($n)) return false;
               
                
                if($n>1000000000000) return round(($n/1000000000000),1);
                else if($n>1000000000) return round(($n/1000000000),1);
                else if($n>1000000) return round(($n/1000000),1);
                else if($n>1000) return round(($n/1000),1);
                else if($n>100) return round(($n/100),1);
                else if($n>10) return round(($n/10),1);
                else if($n>1) return round(($n/1),1);
               
                return number_format($n);
            }

        } else if ($inputArray[0] === "ADD") {
            if ($this->checkErrors($inputArray)) {
            /**
             *If there are no errors, start adding to the inventory */
                echo "Item added \n";
                $this->insertIntoInventory($inputArray);
            }
        } else {
            echo "input must be ADD or END \n";
        }
        new inventory;
    }
    /**
     *  Function for adding items */
    public function insertIntoInventory($input)
    {
        $_SESSION['Inventory'][$input[1]] = [
            'sku' => trim($input[1]),
            'quantity' => trim($input[3]),
            'name' => trim($input[2]),
            'price' => trim($input[4]),
        ];
    }
    /**
     *  Five entries is a must */
    public function checkErrors($inputArray)
    {
        if (count($inputArray) !== 5) {
            echo "invalid entry \n";
        } else if (!is_numeric($inputArray[1])) {
            echo 'sku must be a number \n';
        } else if (!is_numeric($inputArray[3])) {
            echo 'quantity must be a number \n';
        } else if (!is_string($inputArray[2])) {
            echo 'name must be a string \n';
        } else if (!is_numeric($inputArray[4])) {
            echo 'price must be a number \n';
        } else {
            return true;
        }
    }

}
