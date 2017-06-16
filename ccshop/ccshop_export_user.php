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

   $sql = 'SELECT * FROM `cc_user_addresses`';
    
   mysqli_select_db( $conn, $dbname );
   $retval = mysqli_query( $conn, $sql );

   if(! $retval )
   {
       die('无法读取数据: ' . mysqli_error($conn));
   }

   while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
   {
   	  // var_dump($row);
   	  // echo $row['entity_id']."-";
   	  // $entity_id = $row['entity_id'];
   	  // $email = $row['email'];
   	  // echo "x";
   	  // echo $email."--";
   	  // echo $entity_id."<br>";
   	  echo $row['email']."#";

   	  echo $row['name']."#";
   	  echo $row['phone']."<br>";
   	  
    }