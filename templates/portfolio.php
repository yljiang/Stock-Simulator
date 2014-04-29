
<ul class="nav nav-pills" style="display:inline-block;">
    <li><a href="quote.php" >Quote</a></li>
    <li><a href="Buy.php">Buy</a></li>
    <li><a href="Sell.php">Sell</a></li>
    <li><a href="History.php">History</a></li>
    <li><a href="logout.php"><b>Log Out</b></a></li>
</ul>

<br>
<table class="table table-striped">
    <th style="text-align:center"> Symbol</th>
    <th style="text-align:center"> Name</th>
    <th style="text-align:center"> Shares</th>
    <th style="text-align:center"> Price</th>
    <th style="text-align:center"> Total</th>
    
    <?php
        $total=0;
        foreach ($positions as $item){
            print("<tr>");
            print("<td>" .$item["symbol"] . "</td>");
            print("<td>" .$item["name"] . "</td>");
            print("<td>" .$item["shares"] . "</td>");
            print("<td>$" .$item["price"] . "</td>");
            print("<td>$" .$item["shares"]*$item["price"] . "</td>");
            print("</tr>");
            
            $total=$total+$item["shares"]*$item["price"];
        }
        print("<td>CASH</td>");print("<td></td>");print("<td></td>");print("<td></td>");
        print("<td>$".$total."</td>");
    ?>
</table>
