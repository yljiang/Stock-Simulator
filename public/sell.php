<?php
    require("../includes/config.php");
    
    $rows=query("SELECT symbol FROM portfolio WHERE id=?",$_SESSION["id"]);
    $symbol=[];
   
    foreach ($rows as $row){
          $symbol[]=[
         
          "symbol" => $row["symbol"]  
          ];
    }
    
         
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
     
        //check if user holds the stock
        $check=query("SELECT symbol FROM portfolio WHERE symbol=?",$_POST["symbol"]);
       
        
        if($check !== false){
            $stock = lookup($_POST["symbol"]); //Look up price of stock
            $shares=query("SELECT shares FROM portfolio WHERE id=? AND symbol=?",$_SESSION["id"],$_POST["symbol"]);//Retrieve # of shares owned

            //if user holds the stock, delete it from database
            query("DELETE FROM portfolio WHERE id=? AND symbol =?",$_SESSION["id"],$_POST["symbol"]);  
            //update cash balances
            query("UPDATE users SET cash = cash + ".$stock["price"]*$shares[0]["shares"] .  " WHERE id=?",$_SESSION["id"]);
            //add to history table
            query("INSERT INTO history (id,Transaction,Symbol,Shares,Price) VALUES (".$_SESSION["id"].",'SELL',UPPER('".$_POST["symbol"]."'),".$shares[0]["shares"].",".$stock["price"].")");
               
            redirect("/");
            
        }else{
            apologize("Sorry. You don't hold the stock");
        }
    
    
    }else{
      render("sell_form.php",["symbol"=>$symbol,"title"=>"Sell"]); 
    }

?>
