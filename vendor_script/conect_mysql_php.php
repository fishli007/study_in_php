<?php 
   header("Content-type:text/html;charset=utf-8");
   // echo "x_debug_vvv";
   $dbhost = '127.0.0.1';  // mysql服务器主机地址
   $dbuser = 'root';         // mysql用户名
   $dbpass = '135565';          // mysql用户名密码
   $dbname = 'exuser';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn )
   {
       die('failed' . mysqli_error($conn));
   }
   // 设置编码，防止中文乱码
   mysqli_query($conn , "set names utf8");

   $sql = 'SELECT * FROM `wp_users`';
    
   mysqli_select_db( $conn, $dbname );
   $retval = mysqli_query( $conn, $sql );

   if(! $retval )
   {
       die('无法读取数据: ' . mysqli_error($conn));
   }

   while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
   {
   	  // echo $row['entity_id']."-";
   	  // echo $email."--";
   	  // echo $entity_id."<br>";
    	echo $row['user_login']."#".$row['user_email']."<br>";
   }
   mysqli_close($conn);


?>