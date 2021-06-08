<div class="container">
<form action="?controller=korisnik&action=updatekorisnik" method="POST">
  <div class="form-group">
    <label for="oD">CUST_ID</label>
    <input type="text" readonly class="form-control" name="oD" value=<?php echo $korisnik->CUST_ID?>>
  <div class="form-group">
    <label for="ADDRESS">ADDRESS</label>
    <input type="text" readonly class="form-control" name="ADDRESS" value=<?php echo $korisnik->ADDRESS?>>
  </div>
  <div class="form-group">
    <label for="CITY">CITY</label>
    <input type="text" class="form-control" name="CITY" value=<?php echo $korisnik->CITY?>>
  </div>
  <div class="form-group">
    <label for="CUST_TYPE_CD">CUST_TYPE_CD</label>
    <input type="text" class="form-control" name="CUST_TYPE_CD" value=<?php echo $korisnik->CUST_TYPE_CD?>>
  </div>
  <div class="form-group">
    <label for="FED_ID">FED_ID</label>
    <input type="text" class="form-control" name="FED_ID" value=<?php echo $korisnik->FED_ID?>>
  </div>
  <div class="form-group">
    <label for="POSTAL_CODE">POSTAL_CODE</label>
    <input type="text" class="form-control" name="POSTAL_CODE" value=<?php echo $korisnik->POSTAL_CODE?>>
  </div>
  <div class="form-group">
    <label for="STATE">STATE</label>
    <input type="text" class="form-control" name="STATE" value=<?php echo $korisnik->STATE?>>
  </div>
    <button type="submit" class="btn btn-default">Confirm</button>
</form> 
</div>
