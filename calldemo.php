<?php include 'fileinput.php' ;

//create Object 
$conObj = new operation();

// select Data

$row = $conObj->selectData('cakes',$conn);

//insert data 

if(isset($_POST['submit']))
{
	$data = $_POST;


	$objrow = $conObj->updateData('std',$conn,2,$data);

	print_r($objrow);
	die;
}
?>