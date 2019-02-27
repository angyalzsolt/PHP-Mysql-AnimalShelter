<?php 

class DbConnection {

	protected $serverName;
	protected $userName;
	protected $password;
	protected $dbName;


	public function __construct(){
		$this->Connect();
	}

	public function Connect(){

		$this->serverName = "mustafa.codefactory.live";
		$this->userName = "mustafac_piestan";
		$this->password = "cosmos@@";
		$this->dbName = "mustafac_piestany";

		try{
			$conn = new PDO('mysql:host=$this->serverName;dbname=$this->dbname', $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "Connected Successfully";
		}
		catch(PDOException $error){
			echo "Connection failed ".$error->getMessage();
		}

	}
}

$conn = new DbConnection;
echo $conn;
 ?>