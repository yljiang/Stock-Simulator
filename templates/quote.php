<div>
<?php $stock = lookup($_POST["ticker"]); print("A share of " . $stock["name"] . " (" . $stock["symbol"] . ") costs $" . $stock["price"]); ?>
</div>
<a href="quote.php">Go Back</a> 
