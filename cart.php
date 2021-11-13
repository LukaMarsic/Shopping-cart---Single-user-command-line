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

    public function removeItem($inputArray)
    {
        //Delete or change quantity number
        if($_SESSION['Cart'][$inputArray[1]]['quantity'] <= $inputArray[2])
        {
            $_SESSION['Inventory'][$inputArray[1]]['quantity'] = 
            $_SESSION['Inventory'][$inputArray[1]]['quantity'] + 
            $_SESSION['Cart'][$inputArray[1]]['quantity'];
            unset($_SESSION['Cart'][$inputArray[1]]);
        }else
        {
            $_SESSION['Inventory'][$inputArray[1]]['quantity'] = 
            $_SESSION['Inventory'][$inputArray[1]]['quantity'] + $inputArray[2];   
            $_SESSION['Cart'][$inputArray[1]]['quantity']= 
            $_SESSION['Cart'][$inputArray[1]]['quantity'] - $inputArray[2];

        }

    }

    public function checkout()
    {   //Show all items and print total price
        $totalPrice=0;
        echo "\n";
        foreach($_SESSION['Cart'] as $keyCart)
        {
            foreach ($_SESSION['Inventory'] as $keyInventory) {
                
                if($keyCart['sku'] == $keyInventory['sku'])
                {
                    $totalPrice = ($keyCart['quantity'] * $keyInventory['price']) + $totalPrice;
                    echo $keyInventory['name']." ".$keyCart['quantity']. "x". $keyInventory['price'] ."=".$keyCart['quantity'] * $keyInventory['price'] ."\n";
                }
            } 
        }
        echo "\n";
        echo "Total price ".$totalPrice. "\n";
        echo "\n";
        // Delete the cart items
        foreach($_SESSION['Cart'] as $keyCart){
            unset($_SESSION['Cart'][$keyCart['sku']]);
        }
    }

    public function insertItem($input)
    {
        //Insert item in cart  
        $_SESSION['Cart'][$input[1]] = [
            'sku' => trim($input[1]),
            'quantity' => trim($input[2])
        ];
        //Decrease item quantity 
        $_SESSION['Inventory'][$input[1]]['quantity'] =
        $_SESSION['Inventory'][$input[1]]['quantity'] - $input[2]; 


    }

    public function checkError($inputArray)
    {   //Check input errors
        if(count($inputArray) !== 3)
        {
            echo "invalid entry \n";
        }
        else if(!is_numeric($inputArray[1]))
        {
            echo "sku must be a number \n";
        }
        else if(!is_numeric($inputArray[2]))
        {
            echo "quantity must be a number \n";
        }
        else
        {
            return true;
        }
    }
    public function checkQuantity($inputArray)
    {
        //Check quantity. 
        //If it is more than in the inventory, show error
        if($_SESSION['Inventory'][$inputArray[1]]['quantity'] < $inputArray[2])
        {
            echo $_SESSION['Inventory'][$inputArray[1]]['quantity']." are available \n";
            return false;
        }
        return true;
    }

}

$class = new cart;