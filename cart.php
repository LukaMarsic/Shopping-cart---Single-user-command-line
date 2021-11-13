<?php
$_SESSION['Cart'] = [];
class Cart
{

    public function __construct()
    {   // Start cart
        echo "Adds an item in the current shopping cart:";
        $input = trim(fgets(STDIN,1024));
        $this -> checkInput($input);
    }

    public function checkInput($input)
    {
        //Explode input
        $inputArray = explode(" ",$input);
        // Check (ADD,CHECKOUT,REMOVE,END)
        switch ($inputArray[0]) {
            case 'ADD':
                    //Check if this item exists in the inventory 
                    if(isset($_SESSION['Inventory'][$inputArray[1]]))
                    {
                        //Check errors & quantity  
                        if($this -> checkError($inputArray) && $this -> checkQuantity($inputArray)){
                           //Insert into 
                            $this -> insertItem($inputArray);
                            echo "Item added \n";
                        }
                    }else{
                        echo "Item not found \n";
                    }
                break;
            case 'REMOVE':
                //Check if this item exists 
                if(isset($_SESSION['Cart'][$inputArray[1]]))
                {
                    if($this -> checkError($inputArray)){
                        //Check errors & remove items
                        $this -> removeItem($inputArray);
                        echo "Item removed \n";
                    }
                }else{
                    echo "Item not found \n";
                }
                break;    
            case 'CHECKOUT':
                if(!empty($_SESSION['Cart'])){
                    //Call checkout if something is  in the cart 
                    $this -> checkout();
                }else{
                    echo "ADD some item \n";
                }
                
                break;
            case 'END':
                //exit
                echo "Goodbye \n";
                exit;
                break;    
            default:
                echo "invalid entry \n";
                break;
        }
        New Cart;
    }
