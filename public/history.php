<?php
    require("../includes/config.php");
   
    $rows=query("SELECT * FROM history WHERE id=?",$_SESSION["id"]);
    $positions=[];
    
    if ($rows !== false){
    
    
        foreach ($rows as $row){
            $positions[]=[
                "transaction"=>$row["transaction"],
                "date"=>$row["date"],
                "symbol"=>$row["symbol"],
                "shares" =>$row["shares"],
                "price"=>$row["price"]
            
            ];
    
        }
    }else{
        render("history.php",["rows"=>$positions,"title"=>"History"]);
    }
?>
