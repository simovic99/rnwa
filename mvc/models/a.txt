<?php
  class Opcina  {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $SIFRA_OPCINE;
    public $NAZIV_OPCINE;
	public $SIFRA_ZUPANIJE;


    public function __construct($SIFRA_OPCINE, $NAZIV_OPCINE,$SIFRA_ZUPANIJE) {
      $this->SIFRA_OPCINE      = $SIFRA_OPCINE;
      $this->NAZIV_OPCINE  = $NAZIV_OPCINE;
	$this->SIFRA_ZUPANIJE =$SIFRA_ZUPANIJE

    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM Opcina');


      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $Opcina) {
        $list[] = new Opcina($Opcina['SIFRA_OPCINE'], $Opcina['NAZIV_OPCINE'],$Opcina['SIFRA_ZUPANIJE']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM Opcina WHERE SIFRA_OPCINE = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $Opcina = $req->fetch();

      return new Opcina($Opcina['SIFRA_OPCINE'], $Opcina['NAZIV_OPCINE'],$Opcina['SIFRA_ZUPANIJE']);
    }
	
	public static function deleteOpcina($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      //$id = intval($id);
	  $sql="DELETE FROM Opcina WHERE SIFRA_OPCINE ='$id'";
	  //echo $sql;
	  
      //$req = $db->prepare($sql);
      // the query was prepared, now we replace :id with our actual $id value
      //if ($req->execute(array('id' => $id))){
		  //$req=$r->execute($sql);
	if ($db->query($sql) == TRUE){
	//if (1==2){
		  $rez="USPJESNO brisanje";
	  }
		  else {
			 $rez="NESPJESNO brisanje";;
		  }
		  return $rez;
	  
}
  }
?>