<?php
    require("../includes/config.php");
    
    render("buy_form.php",["title"=>"Buy"]);
    $cash =query("SELECT cash FROM users WHERE id=?",$_SESSION["id"])[0]["cash"];
    
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        //restrict shares to only unsigned int
         if (preg_match("/^\d+$/",$_POST["shares"])){
            
        //check if symbol exists  
        $check=lookup($_POST["symbol"]);
        $price =$check["price"];//Price of stock
        
        if($check !== false){
            // check if have enough money to buy X shares
            if($price * $_POST["shares"] < $cash){
                //Inset purchase in portfolio and update cash
                query("INSERT INTO portfolio (id, symbol, shares) VALUES (".$_SESSION["id"].",UPPER('".$_POST["symbol"]."'),".$_POST["shares"].") ON DUPLICATE  KEY UPDATE shares = shares +VALUES(shares)"); 
                query("UPDATE users SET cash = cash - " . number_format($price*$_POST["shares"],2) ." WHERE id=?",$_SESSION["id"]);
            
                redirect("/");
            
            }else{
                apologize("Sorry, insufficient funds.");
                }
        }else{
            apologize("The symbol does not exist");
        }
        }
    }

?>

