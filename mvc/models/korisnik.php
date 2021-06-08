<?php
  class Korisnik  {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $CUST_ID;
    public $ADDRESS;
    public $CITY;
    public $CUST_TYPE_CD;
    public $FED_ID;
    public $POSTAL_CODE;
    public $STATE;


    public function __construct($CUST_ID, $ADDRESS, $CITY, $CUST_TYPE_CD, $FED_ID, $POSTAL_CODE, $STATE) {
      $this->CUST_ID      = $CUST_ID;
      $this->ADDRESS      = $ADDRESS;
      $this->CITY      = $CITY;
      $this->CUST_TYPE_CD      = $CUST_TYPE_CD;
      $this->FED_ID      = $FED_ID;
      $this->POSTAL_CODE      = $POSTAL_CODE;
      $this->STATE      = $STATE;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM CUSTOMER');
      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $oD) {
        $list[] = new Korisnik($oD['CUST_ID'], $oD['ADDRESS'], $oD['CITY'], $oD['CUST_TYPE_CD'], $oD['FED_ID'], $oD['POSTAL_CODE'], $oD['STATE']);
      }

      return $list;
    }

    public static function find($oD) {
      $db = Db::getInstance();
      $oD = intval($oD);
      $req = $db->prepare('SELECT * FROM CUSTOMER WHERE CUST_ID = :oD');
      $req->execute(array('oD' => $oD));
      $korisnik = $req->fetch();

      return new Korisnik($korisnik['CUST_ID'], $korisnik['ADDRESS'], $korisnik['CITY'], $korisnik['CUST_TYPE_CD'], $korisnik['FED_ID'], $korisnik['POSTAL_CODE'], $korisnik['STATE']);
    }

    public static function inserkorisnik($CUST_ID,$ADDRESS, $CITY, $CUST_TYPE_CD, $FED_ID, $POSTAL_CODE, $STATE) {
      $db = Db::getInstance();
      $ADDRESS = intval($ADDRESS);
      $CITY = intval($CITY);
      $CUST_TYPE_CD = intval($CUST_TYPE_CD);
      $FED_ID = intval($FED_ID);
      $POSTAL_CODE = intval($POSTAL_CODE);
      $STATE = intval($STATE);
      $sql="INSERT INTO CUSTOMER (CUST_ID,ADDRESS, CITY, CUST_TYPE_CD, FED_ID, POSTAL_CODE, STATE)
      VALUES ('$CUST_ID','$ADDRESS', '$CITY', '$CUST_TYPE_CD', '$FED_ID', '$POSTAL_CODE', '$STATE')";
      $db->query($sql);
    }

    public static function updatekorisnik($CUST_ID,$ADDRESS, $CITY, $CUST_TYPE_CD, $FED_ID, $POSTAL_CODE, $STATE) {
      $db = Db::getInstance();
      $CUST_ID = intval($CUST_ID);
      $ADDRESS = intval($ADDRESS);
      $CITY = intval($CITY);
      $CUST_TYPE_CD = intval($CUST_TYPE_CD);
      $FED_ID = intval($FED_ID);
      $POSTAL_CODE = intval($POSTAL_CODE);
      $STATE = intval($STATE);
      $sql="UPDATE CUSTOMER SET ADDRESS = '$ADDRESS', CITY='$CITY', CUST_TYPE_CD = '$CUST_TYPE_CD', FED_ID = '$FED_ID', POSTAL_CODE = '$POSTAL_CODE', STATE = '$STATE'
       WHERE CUST_ID = '$CUST_ID' 
       AND ADDRESS = '$ADDRESS'";
      $db->query($sql);
    }

  	public static function deletekorisnik($oD) {
      $db = Db::getInstance();
      $sql="DELETE FROM CUSTOMER WHERE CUST_ID = '$oD'";
	    $db->query($sql);
		}
  }
?>