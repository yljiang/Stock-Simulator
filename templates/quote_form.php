<ul class="nav nav-pills" style="display:inline-block;">
    <li><a href="quote.php" >Quote</a></li>
    <li><a href="buy.php">Buy</a></li>
    <li><a href="sell.php">Sell</a></li>
    <li><a href="history.php">History</a></li>
    <li><a href="settings.php">Settings</a></li>
    <li><a href="logout.php"><b>Log Out</b></a></li>
</ul>
<form action="quote.php" method="POST">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="ticker" placeholder="Quote" type="text"/>
        </div>
        <div class="form-group">
            <button type=submit" class="btn btn-default">Submit</button>
        </div>
    </fieldset>
</form> 


