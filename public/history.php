<?php
    require("../includes/config.php");
   
    $rows=query("SELECT * FROM history WHERE id=? ORDER BY Date DESC",$_SESSION["id"]);
    $positions=[];
    
    if ($rows !== false){
    
    
        foreach ($rows as $row){
            $positions[]=[
                "transaction"=>$row["Transaction"],
                "date"=>$row["Date"],
                "symbol"=>$row["Symbol"],
                "shares" =>$row["Shares"],
                "price"=>$row["Price"]
            
            ];
    
        }
    }
    
    render("history.php",["rows"=>$positions,"title"=>"History"]);
    
?>
