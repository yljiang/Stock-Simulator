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

<div>
    <a href="/">Go back</a>
</div>
