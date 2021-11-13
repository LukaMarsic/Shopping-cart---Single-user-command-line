Design a simple in-memory, single user command line store / shopping cart. The application has two stages: Build an inventory store, to store items and their associated sku, quantity, name, and price Shopping Cart Builder (Removes items from inventory to build personal cart of items)

First stage has following commands (STDIN): ADD - Add item to inventory, INPUT: sku(number) name(string) quantity(number) price(number); e.g. ADD 1 T-Shirt 3 5.99

END - Closes the adding inventory stage and moves to next stage; INPUT: None

Second stage has the following commands (STDIN):
ADD - Adds an item in the current shopping cart; INPUT: sku(number) quantity(number); e.g. ADD 1 1

REMOVE - Removes an item from the shopping cart; INPUT: sku(number) quantity(number); e.g. REMOVE 1 1

CHECKOUT - Print all items (every line consist of a single item, quantity, and price) and the last line will print total price. It also clears the shopping cart items INPUT: None

END - Closes the stage and exits the program; INPUT: None

Please note: -You can run the command ADD/REMOVE as many times as you want, and in any order after building out the INVENTORY stage.
-String contains no space (single word)
-Use a language you’re most comfortable with
-Write production quality code
-Please comment your decisions
-Unit testing is desireable

Example:
Program STDIN:
ADD 1 T-Shirt 5 5.99
ADD 2 Badge 10 0.99
END
ADD 1 1
ADD 2 3
CHECKOUT
ADD 1 1
CHECKOUT
END
Program STDOUT:
T-shirt 1 x 5.99 = 5.99
Badge 3 x 0.99 = 2.97
TOTAL = 8.96
T-shirt 1 x 5.99 = 5.99
TOTAL = 5.99 
