This is a custom woocommerce product for selling letters (as in characters) and similar items.
The customer can buy any combination of available letters. Each letter is the same price. Each letter is too small an item to define it as a separate product, but it has a limited stock.
The product has a special meta field (items), where a json table is stored with letters and their stock.
Admin can edit letters and stock in product tab "items".
A custom field for selecting (typing) desired letters is displayed on the product page.
When the customer enters the desired characters into the selection field, availability is verified with ajax calls.
Each letter is another piece of product in the cart (i.e. 5 different letters means the customer is buying 5 units of the product).
Changing numer of units of the product is disabled - it can only be done by modifying letter selection in the selection box.
Upon checkout the plugin verifies again if selected letters are still available. If yes - the meta field "items" is updated and order is placed.
The selected letters are visible in order details, so that they can be packed and shipped.