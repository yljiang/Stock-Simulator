<ul class="nav nav-pills" style="display:inline-block;">
    <li><a href="quote.php" >Quote</a></li>
    <li><a href="buy.php">Buy</a></li>
    <li><a href="sell.php">Sell</a></li>
    <li><a href="history.php">History</a></li>
    <li><a href="settings.php">Settings</a></li>
    <li><a href="logout.php"><b>Log Out</b></a></li>
</ul>
<form action="sell.php" method="POST">
    <fieldset>
       <div class="form-group">
        <select class="form-control" name="symbol">
            <?php
               foreach ($symbol as $value){
                   print('<option value ="' . $value["symbol"] . '">' . $value["symbol"]. '</option>');
               }
         ?>
         </select>
         </div>
         <button type=submit" class="btn btn-default" >Sell</button>
    </fieldset>
</form> 

