<p>Here is a list of all OPCINAs:</p>

<?php foreach($opcina as $opcinasingle) { ?>
  <p>
    <?php echo $opcinasingle->SIFRA_OPCINE ." ".$opcinasingle->NAZIV_OPCINE  ?>
    <a href='?controller=opcina&action=deleteopcina&id=<?php echo $opcinasingle->SIFRA_OPCINE; ?>'>BRISI OPCINU</a>
  </p>
<?php } ?>