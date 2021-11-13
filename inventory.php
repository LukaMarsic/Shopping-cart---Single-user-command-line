<?php

$_SESSION['Inventory'] = [];

class Inventory
{

    public $input = [];

    public function __construct()
    {   //Open input in command line
        echo "Add item to inventory:";
        $input = trim(fgets(STDIN,1024));
        $this -> checkInput($input);
        
    }

    public function checkInput($input)
    {   //Explode string 
        $inputArray = explode(" ",$input);

        // Check ADD or END action
        if($inputArray[0] === "END")
        {   
            if(empty($_SESSION['Inventory']))
            {
                echo "inventory is empty \n";
            }else
            {   //If the field is not empty, go to the second stage 
                include 'cart.php';
                return;
            }
            
        }else if($inputArray[0] === "ADD")
        {
            if($this-> checkErrors($inputArray))
            {   //If there are no errors, start adding to the inventory
                echo "Item added \n";
                $this -> insertIntoInventory($inputArray);
            }
        }else
        {
            echo "input must be ADD or END \n";
        }
        new inventory;
    }