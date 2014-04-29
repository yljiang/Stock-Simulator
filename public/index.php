<?php

    // configuration
    require("../includes/config.php"); 
    
    
    //retrieve portfolio information

    $row=query("SELECT * FROM portfolio WHERE id = ?", $_SESSION["id"]); //lookup user portfolio in database by ID
    $positions=[];
    
    foreach ($row as $value){
        $stock = lookup($value["symbol"]);
        
        if ($stock !== false){
            $positions[] =[
                "name" => $stock["name"],
                "price" => $stock["price"],
                "shares" => $value["shares"],
                "symbol" => $value["symbol"]
            ];
        
        }
    
    }
    
    
    // render portfolio
    render("portfolio.php", ["positions" =>$positions, "title" => "Portfolio"]);
    
?>
