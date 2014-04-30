<?php
    require("../includes/config.php");
    
    
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
                //update cash balances
                query("UPDATE users SET cash = cash - " . $price*$_POST["shares"] ." WHERE id=?",$_SESSION["id"]);
                //add entry to history table
                query("INSERT INTO history (id,Transaction,Symbol,Shares,Price) VALUES (".$_SESSION["id"].",'BUY',UPPER('".$_POST["symbol"]."'),".$_POST["shares"].",".$price.")");
                redirect("/");
            
            }else{
                    apologize("Insufficient funds.");
                }
        }else{
            apologize("The symbol does not exist");
        }
        }
    }else{
        render("buy_form.php",["title"=>"Buy"]);
    }

?>

