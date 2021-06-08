<?php
  class KorisnikController {
    public function index() {
      // we store all the posts in a variable
      $korisnik = Korisnik::all();
      require_once('views/korisnik/index.php');
    }
  
    public function verifyinsert(){
      require_once('views/korisnik/insert.php');
    }

    public function insertkorisnik()
    {
      Korisnik::insertkorisnik($_POST['CUST_ID'], $_POST['ADDRESS'], $_POST['CITY'], $_POST['CUST_TYPE_CD'], $_POST['FED_ID'], $_POST['POSTAL_CODE'], $_POST['STATE']);
     return call('korisnik', 'index');
    }
  
  public function verifyupdate()
  {
    if (!isset($_GET['oD']))
          return call('pages', 'error');
    $korisnik = Korisnik::find($_GET['oD']);
    require_once('views/korisnik/update.php');
  }

  public function updatekorisnik()
  {
    if (!isset($_POST['CUST_ID']))
      return call('pages', 'error');
   Korisnik::updatekorisnik($_POST['CUST_ID'], $_POST['ADDRESS'], $_POST['CITY'], $_POST['CUST_TYPE_CD'], $_POST['FED_ID'], $_POST['POSTAL_CODE'], $_POST['STATE']);
   return call('korisnik', 'index');
  }

	public function delete() {
      if (!isset($_GET['CUST_ID']))
        return call('pages', 'error');
      Korisnik::korisnik($_GET['oD']);
      return call('korisnik', 'index');
    }

    public function verifydelete(){
      if (!isset($_GET['oD']))
          return call('pages', 'error');
          require_once('views/korisnik/delete.php');
      }
  }
 ?>