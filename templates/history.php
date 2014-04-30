<ul class="nav nav-pills" style="display:inline-block;">
    <li><a href="quote.php" >Quote</a></li>
    <li><a href="buy.php">Buy</a></li>
    <li><a href="sell.php">Sell</a></li>
    <li><a href="history.php">History</a></li>
    <li><a href="logout.php"><b>Log Out</b></a></li>
</ul>

<table class="table table-striped">
    <th class="head">Transaction</th>
    <th class="head">Date/Time</th>
    <th class="head">Symbol</th>
    <th class="head">Shares</th>
    <th class="head">Price</th>
    
    <?php
#        foreach($rows as $item){
#        print("<tr>");
#            print("<td>" .$item["transaction"] . "</td>");
#            print("<td>" .$item["date"] . "</td>");
#            print("<td>" .$item["symbol"] . "</td>");
#            print("<td>$" .$item["shares"] . "</td>");
#            print("<td>$" .number_format($item["price"],2) . "</td>");
#            print("</tr>");
#        
#        }
    ?>
</table>

