<?php
class config
{
	public function connect_db()
	{
		$conn = mysqli_connect("localhost","root","","cakesbakery"); 
		return $conn;
	}

}
$conn = new config();
$conn = $conn->connect_db();
return $conn;

?>