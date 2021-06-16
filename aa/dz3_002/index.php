<?php
$valid_passwords = array ("pero" => "admin321");
$valid_users = array_keys($valid_passwords);

$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];

$validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);

if (!$validated) {
  header('WWW-Authenticate: Basic realm="My Realm"');
  header('HTTP/1.0 401 Unauthorized');
  die ("Not authorized");
}

// Connect to database
	Class dbObj{
	
	var $servername = "localhost";
	var $username = "root";
	var $password = "Admin321";
	var $dbname = "fsr-cms";
	var $conn;
	function getConnstring() {
		$con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());
 
		
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		} else {
			$this->conn = $con;
		}
		return $this->conn;
	}
}

function get_employees($id=0)
{
	global $connection;
	$query="SELECT * FROM employees";
	if($id != 0)
	{
		$query.=" WHERE emp_no=".$id." LIMIT 100";
	}
	$response=array();
	$result=mysqli_query($connection, $query);
	while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
	{
		$response[]=$row;
	}
	header('Content-Type: application/json');
	echo json_encode($response);
}

function insert_employee()
	{
		global $connection;

		$data = json_decode(file_get_contents('php://input'), true);
		$employee_number	=$_POST["employee_number"];
		$employee_bdate		=$_POST["employee_bdate"];
		$employee_fname		=$_POST["employee_fname"];
		$employee_lname		=$_POST["employee_lname"];
		$employee_gender	=$_POST["employee_gender"];
		$employee_date		=$_POST["employee_date"];
		echo $query="INSERT INTO employees(emp_no, birth_date, first_name, last_name, gender, hire_date)VALUES(".$employee_number.",'".$employee_bdate."','".$employee_fname."','".$employee_lname."','".$employee_gender."','".$employee_date."')";
		if(mysqli_query($connection, $query))
		{
			$broj_redaka = mysqli_affected_rows($connection);
			$response=array(
				'status' => 1,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Add Successfully.'
			);
		}
		else
		{
			$broj_redaka = mysqli_affected_rows($connection);
			$response=array(
				'status' => 0,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Add Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
function update_employee($id)
	{
		global $connection;
		$post_vars = json_decode(file_get_contents("php://input"),true);
		$employee_fname		=$_POST["employee_fname"];
		$employee_lname		=$_POST["employee_lname"];
		$employee_gender	=$_POST["employee_gender"];
						
		$query="UPDATE employees SET first_name='".$employee_fname."', last_name='".$employee_lname."', gender='".$employee_gender."' WHERE emp_no=".$id;
		
		$result=mysqli_query($connection, $query);
		$broj_redaka = mysqli_affected_rows($connection);;
		
		if($result)
		{
			$response=array(
				'status' => 1,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Update Successfull.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Update Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}

function delete_employee($id)
{
	global $connection;
	$query="DELETE FROM employees WHERE emp_no=".$id;
	if($result = mysqli_query($connection, $query))
	{
		
		$response=array(
			'status' => 1,
			'status_message' =>'Delete Successfull.'
		);
	}
	else
	{
		$response=array(
			'status' => 0,
			'status_message' =>'Delete Failed.'
		);
	}
	header('Content-Type: application/json');
	echo json_encode($response);
}
	
	$db = new dbObj();
	$connection =  $db->getConnstring();
 
	$request_method=$_SERVER["REQUEST_METHOD"];
	switch($request_method)
	{
		case 'GET':
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				get_employees($id);
			}
			else
			{
				get_employees();
			}
			break;
			
			case 'POST':
			insert_employee();
			break;	
			
			case 'PUT':
			if (isset($_GET["id"])){
				$id=intval($_GET["id"]);
				update_employee($id);				
			}
			else{
				header('Content-Type: application/json');
				echo json_encode("Error while calling method and parametars");
				
			}				
			
			break;				
			case 'DELETE':
			$id=intval($_GET["id"]);
			delete_employee($id);
			break;
			
		default:
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}
?>
