# How to run app

1.First, we have to download PHP from it’s official website. We have to download the .zip file from the respective section depending upon on our system architecture(x86 or x64).
________________________________________________________________________________________
2.Extract the .zip file to your preferred location. It is recommended to choose the Boot Drive(C Drive) inside a folder named php (ie. C:\php).
________________________________________________________________________________________
3.Now we have to add the folder (C:\php) to the Environment Variable Path so that it becomes accessible from the command line. <br> To do so, we have to:  <br> ->Right click on My Computer or This PC icon,<br> ->Then Choose Properties from the context menu.<br> ->Then click the Advanced system settings link,<br> ->Then click Environment Variables. <br><br>In the section System Variables, we have to find the PATH environment variable and then select and Edit it. If the PATH environment variable does not exist, we have to click New. In the Edit System Variable (or New System Variable) window, we have to specify the value of the PATH environment variable (C:\php or the location of our extracted php files). After that, we have to click OK and close all remaining windows by clicking OK.
________________________________________________________________________________________
4.After installation of PHP, we are ready to run PHP code through command line. You just follow the steps to run PHP program using command line.  <br><br>
->Open terminal or command line window.<br>
->Goto the specified folder or directory where php files are present.<br>
->Then we can run php code code using the following command:<br>

              php file_name.php

________________________________________________________________________________________
# Shopping cart /single user command line store

Design a simple in-memory, single user command line store / shopping cart. The application has two stages: <br>
1.Build an inventory store, to store items and their associated sku, quantity, name. <br>
2.Price Shopping Cart Builder (Removes items from inventory to build personal cart of items) <br>
________________________________________________________________________________________
First stage has following commands (STDIN): ADD - Add item to inventory, INPUT: sku(number) name(string) quantity(number) price(number); e.g. ADD 1 T-Shirt 3 5.99

END - Closes the adding inventory stage and moves to next stage; INPUT: None
________________________________________________________________________________________
Second stage has the following commands (STDIN):
ADD - Adds an item in the current shopping cart; INPUT: sku(number) quantity(number); e.g. ADD 1 1

REMOVE - Removes an item from the shopping cart; INPUT: sku(number) quantity(number); e.g. REMOVE 1 1

CHECKOUT - Print all items (every line consist of a single item, quantity, and price) and the last line will print total price. It also clears the shopping cart items INPUT: None

END - Closes the stage and exits the program; INPUT: None
________________________________________________________________________________________
