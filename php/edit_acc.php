<?php
    require("connect.php");
    $id = $_GET['id'];
    $type = $_GET['type'];
    $update = ("UPDATE users " .       // The table you want to update
              "SET type='.$type.'" . // Column of the table you wish to update
              "WHERE id='.$id.'") ;   // Then tell us the row you want to update, else, the 'SET' above will affect all rows in that column.
      $res=mysqli_query($conn, $update);
      if (!$res) { // if the variable does not contain any data, use a die function on it
        die("Query Failed" . mysqli_error($conn));
      }else {
        echo "Account Update Successfully";
      }

?>