<?php

    // configuration
    require("../includes/config.php"); 
    
    
    //retrieve portfolio information

    $row=query("SELECT * FROM portfolio WHERE id = ?", $_SESSION["id"]); //lookup user portfolio in database by ID
    $cash=query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]); //Query to return cash
    #print_r($cash[0]["cash"]);
    
    $positions=[];
    
    foreach ($row as $value){
        $stock = lookup($value["symbol"]);
        
        if ($stock !== false){
            $positions[] =[
                "name" => $stock["name"],
                "price" => number_format($stock["price"],2),
                "shares" => $value["shares"],
                "symbol" => $value["symbol"]
          
            ];
        
        }
    
    }
    
    
    // render portfolio
    render("portfolio.php", ["positions" =>$positions,"cash"=>$cash, "title" => "Portfolio"]);
    
?>
