<?php include 'connect.inc.php'; ?>
<?php
  $unlog = @$_POST['usarnm'];
  if (isset($unlog)) {

    $pwlog = @$_POST['usarpw'];
    $pwloge = md5($pwlog);
    $pwlogee = md5($pwloge);
      $query = mysqli_query($conn, "SELECT * FROM users WHERE Username = '".$unlog. "' AND Password = '".$pwlogee. "' " );
      if(mysqli_num_rows(  $query) == 1){

         $getinf = mysqli_fetch_assoc($query);
         $getid = $getinf['id'];
         echo "Your id is ";
         echo $getid;
        }
    else {
      echo "your data's not correct";
    }
  }
  else {
    echo "string";
  }
 ?>
