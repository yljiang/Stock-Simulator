<?php
    
    require("../includes/config.php");
    
      
    render("quote_form.php",["title"=>"Quote"]);
    
    
    if($_SERVER["REQUEST_METHOD"] == "POST") { 
        
        $stock = lookup($_POST["ticker"]);
    
        if ($stock===false){
            apologize("Symbol not found!");    
        }else{
          # render("quote.php","title"=>"Quote",]);
           echo "<div> A share of " . $stock["name"] . " (" . $stock["symbol"] . ") costs " . $stock["price"].". </div>";

        }
    }
?>
