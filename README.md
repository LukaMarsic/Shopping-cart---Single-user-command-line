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
