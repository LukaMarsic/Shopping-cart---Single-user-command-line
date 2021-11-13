# Shopping cart /single user command line

Design a simple in-memory, single user command line store / shopping cart. The application has two stages: Build an inventory store, to store items and their associated sku, quantity, name, and price Shopping Cart Builder (Removes items from inventory to build personal cart of items)

First stage has following commands (STDIN): ADD - Add item to inventory, INPUT: sku(number) name(string) quantity(number) price(number); e.g. ADD 1 T-Shirt 3 5.99

END - Closes the adding inventory stage and moves to next stage; INPUT: None

Second stage has the following commands (STDIN):
ADD - Adds an item in the current shopping cart; INPUT: sku(number) quantity(number); e.g. ADD 1 1

REMOVE - Removes an item from the shopping cart; INPUT: sku(number) quantity(number); e.g. REMOVE 1 1

CHECKOUT - Print all items (every line consist of a single item, quantity, and price) and the last line will print total price. It also clears the shopping cart items INPUT: None

END - Closes the stage and exits the program; INPUT: None

Please note: -You can run the command ADD/REMOVE as many times as you want, and in any order after building out the INVENTORY stage. <br>
-String contains no space (single word) <br>
-Use a language you’re most comfortable with <br>
-Write production quality code <br>
-Please comment your decisions <br>
-Unit testing is desireable <br>

Example: <br>
Program STDIN: <br>
ADD 1 T-Shirt 5 5.99 <br>
ADD 2 Badge 10 0.99 <br>
END <br>
ADD 1 1 <br>
ADD 2 3 <br>
CHECKOUT <br>
ADD 1 1 <br>
CHECKOUT <br>
END <br>
Program STDOUT: <br>
T-shirt 1 x 5.99 = 5.99 <br>
Badge 3 x 0.99 = 2.97 <br>
TOTAL = 8.96 <br>
T-shirt 1 x 5.99 = 5.99 <br>
TOTAL = 5.99  <br>
