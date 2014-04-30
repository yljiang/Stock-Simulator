<ul class="nav nav-pills" style="display:inline-block;">
    <li><a href="quote.php" >Quote</a></li>
    <li><a href="buy.php">Buy</a></li>
    <li><a href="sell.php">Sell</a></li>
    <li><a href="history.php">History</a></li>
    <li><a href="settings.php">Settings</a></li>
    <li><a href="logout.php"><b>Log Out</b></a></li>
</ul>

<form action="buy.php" method="POST">
    <fieldset>
       <div class="form-group">
            Symbol: <input autofocus class="form-control" name="symbol" placeholder="Symbol" type="text"/>
        </div> 
        <div class="form-group">
            Shares: <input autofocus class="form-control" name="shares" placeholder="Shares" type="text"/>
        </div>
        <button type=submit" class="btn btn-default" >Buy</button>
    </fieldset>
</form> 

