<?php
 class operation
{

	public function selectData($tbl,$conn)
	{

		$sql = "select * from cakes";
	if ($res = mysqli_query($conn,$sql)) { 
    	if (mysqli_num_rows($res) > 0) { 
       		while ($row[] = mysqli_fetch_assoc($res)) { 
            
        } } 
		return $row;
       } }

       public function UpdateData($tbl,$conn,$id,$data)
       {
       			


       		/* If Array occuerd  */
	//	$data['education'] = implode(" ", $data['education']) ;

		//$strcolumn = implode(",",$columnData);

	//	array_pop($data);


			
   		
		
		/*$query = "UPDATE $tbl SET";
		$comma = " ";
	foreach($data as $key => $val) {
    if( ! empty($val)) {
        $query .= $comma . $key . " = '" . $val . "'";
        $comma = ", ";
    }
} */

	$query = "UPDATE $tbl SET";
	$comma = " ";
	foreach($data as $key => $val) {
    if( ! empty($val)) {
        $query .= $comma . $key . " = '" . $val . "'";
        $comma = ", ";
    }
}
	$query .= "WHERE id= $id"; 

	
	$sql = mysqli_query($conn,$query);

	if($sql)
	{
		return 1;
	}
	else
	{
			return 0;
	}
	


        }
        public function DeleteData($tbl,$conn,$id)
        {
        	$query = "delete FROM $tbl where id = '$id'";
			$sqlquery = mysqli_query($conn,$query);
			if($sqlquery)
			{
					return 1;
			}
			else
			{
				return 0;
			}



        }
        public function InsertData($tbl,$conn,$data)
        {
          //$conObj = new opration();
          $objrow = $this->doaData($tbl,$conn);

         /* $data['education'] = implode(" ", $data['education']) ;
            $strcolumn = implode(",",$columnData);
            array_pop($data); */

            $data = array_values($data);


            $datapass = implode(",",$data);

           /* $sql = "INSERT INTO $tbl (" . implode(',', $objrow) . ")"
         	. "VALUES ('" . implode(',', $data) . "')"; */

         	$sql = "INSERT INTO $tbl (" . implode(', ', $objrow) . ") "
         . "VALUES ('" . implode("', '", $data) . "')";
			$sql = substr($sql, 0,-5) . ")"; 
	
			$sqlquery = mysqli_query($conn,$sql);
			if($sqlquery)
			{
				return 1;
			}
        	else
        	{
        		return 0;
        	}
         
        }

        public function DoaData($tbl,$conn)
       {
         $sql1 = "SHOW COLUMNS FROM $tbl";
    
         $sql2= "SHOW KEYS FROM $tbl WHERE Key_name = 'PRIMARY'";
        $result1 =  mysqli_query($conn,$sql1);

        $result2 = mysqli_query($conn,$sql2);

        while($row = mysqli_fetch_array($result1))
        {
        $output1[] = $row[0];
        }

      $output2=  mysqli_fetch_array($result2);

      $array2[] = $output2['Column_name'];
      $resultColumn=array_diff($output1,$array2);
     //print_r($resultColumn);
      return $resultColumn;

	}
	public function LogindData($tbl,$email,$password,$conn)
	{
		$sql = "SELECT * FROM $tbl where email='$email' and password='$password'";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_row($result);
			$count = mysqli_num_rows($result);
			return $count;
	}


}

?>