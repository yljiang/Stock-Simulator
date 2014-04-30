
<ul class="nav nav-pills" style="display:inline-block;">
    <li><a href="quote.php" >Quote</a></li>
    <li><a href="buy.php">Buy</a></li>
    <li><a href="sell.php">Sell</a></li>
    <li><a href="history.php">History</a></li>
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
    
        foreach ($positions as $item){
            print("<tr>");
            print("<td>" .$item["symbol"] . "</td>");
            print("<td>" .$item["name"] . "</td>");
            print("<td>" .$item["shares"] . "</td>");
            print("<td>$" .$item["price"] . "</td>");
            print("<td>$" .number_format($item["shares"]*$item["price"],2) . "</td>");
            print("</tr>");
            
            
        }
        print("<tr>");
        print("<td>CASH</td>");print("<td></td>");print("<td></td>");print("<td></td>");
        print("<td>$".number_format($cash[0]["cash"],2)."</td>");
        print("</tr>");
    ?>
</table>
