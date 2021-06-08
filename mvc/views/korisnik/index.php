 <link rel="stylesheet" href="css/style.css">
<div id="container1">
	<br>
    <center><h1>Korisnici</h1></center>
	<br>
  <div class="mb-2">
  <a class="btn btn-primary" href="?controller=korisnik&action=verifyinsert" role="button">Dodaj</a>
  </div>

  <div class="table-responsive"> 
    <table class="table">
        <tr>
            <th>CUST ID</th>
            <th>ADDRESS</th>
            <th>CITY</th>
            <th>CUST_TYPE_CD</th>
            <th>FED_ID</th>
            <th>POSTAL_CODE</th>
            <th>STATE</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($korisnik as $row): ?>
        <tr>
            <td><?php echo $row->CUST_ID ?></td>
            <td><?php echo $row->ADDRESS ?></td>
            <td><?php echo $row->CITY ?></td>
            <td><?php echo $row->CUST_TYPE_CD ?></td>
            <td><?php echo $row->FED_ID ?></td>
            <td><?php echo $row->POSTAL_CODE ?></td>
            <td><?php echo $row->STATE ?></td>
            <td><a href="?controller=korisnik&action=verifyupdate&oD=<?php echo $row->CUST_ID?>" class="btn btn-primary btn-xs"> Edit</a></td>
            <td><a href="?controller=korisnik&action=verifydelete&oD=<?php echo $row->CUST_ID?>" class="btn btn-danger btn-xs"> Delete</a></td>

        </tr>
        <?php endforeach ?>
    </table>
	</div>
  </div