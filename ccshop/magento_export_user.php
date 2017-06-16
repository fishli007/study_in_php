<?php 
   header("Content-type:text/html;charset=utf-8");
   // echo "x_debug_vvv";
   $dbhost = '127.0.0.1';  // mysql服务器主机地址
   $dbuser = 'root';         // mysql用户名
   $dbpass = '135565';          // mysql用户名密码
   $dbname = 'test';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn )
   {
       die('failed' . mysqli_error($conn));
   }
   // 设置编码，防止中文乱码
   mysqli_query($conn , "set names utf8");

   $sql = 'SELECT * FROM `customer_entity`';
    
   mysqli_select_db( $conn, $dbname );
   $retval = mysqli_query( $conn, $sql );

   if(! $retval )
   {
       die('无法读取数据: ' . mysqli_error($conn));
   }

   while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
   {
   	  // echo $row['entity_id']."-";
   	  $entity_id = $row['entity_id'];
   	  $email = $row['email'];
   	  // echo $email."--";
   	  // echo $entity_id."<br>";
   	  $sql_for_user = "SELECT * FROM `customer_entity_varchar` WHERE `entity_id` = $entity_id";
        $retval_b = mysqli_query($conn, $sql_for_user);

        
/*        $sql_for_tel = "SELECT * FROM `customer_address_entity_varchar` WHERE `entity_id` = $entity_id";
   	  $retval_c = mysqli_query($conn, $sql_for_tel);

        while($row = mysqli_fetch_array($retval_c, MYSQL_ASSOC))
        {
         // echo $row['attribute_id']."<br>";
         if($row['attribute_id'] == 31 ){
            echo $email."#";
            // echo $row['entity_id']." ";
            echo $row['value']."<br>";
         }
        }*/





	   while($row = mysqli_fetch_array($retval_b, MYSQL_ASSOC))
	   {
	   	// echo $row['attribute_id']."<br>";
	   	if($row['attribute_id'] == 5 ){
	   		echo $email."#";
            // echo $entity_id."#";
	   		echo $row['value'];
	   	}
	   	
         if($row['attribute_id'] == 7 ){
	   		echo $row['value']."#";
            // $entity_id = $entity_id - 1;
            $sql_for_tel = "SELECT * FROM `customer_address_entity_varchar` WHERE `entity_id` = $entity_id";
            $retval_c = mysqli_query($conn, $sql_for_tel);

            while($row = mysqli_fetch_array($retval_c, MYSQL_ASSOC))
            {
             // echo $row['attribute_id']."<br>";
             if($row['attribute_id'] == 31 ){
                // echo $email."#";
                // echo $row['entity_id']." ";
                // echo $entity_id."#";
                echo $row['value'];
                echo "<br>";
             }
            }   

	   	}
         // echo "<br>";


	   }



   }
   mysqli_close($conn);


?>