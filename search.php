<?php
require("php/connect.php");
$partialNode = $_POST['partialNode'];

 $nodes = mysqli_query($conn,"SELECT * FROM inventory WHERE company_name LIKE '%$partialNode%'");

while($srow = mysqli_fetch_array($nodes)){
    if($srow != ""){
     echo '<tr>';
                     echo     '<td>'.$srow["inv_date"].'</td>';
                     echo     '<td>'.$srow["company_name"].'</td>';
                     echo     '<td>'.$srow["brand_name"].'</td>';
                     echo     '<td>'.$srow["sub_name"].'</td>';
                     echo     '<td>'.$srow["quantity"].' kg.</td>';
                     echo     '<td>'.$srow["order_no"].'</td>';
                     echo     '<td>'.$srow["weighbill_no"].'</td>';
                     echo     '<td>'.$srow["vehicle_no"].'</td>';
                     echo     '<td>'.$srow["iss_date"].'</td>';
                     echo     '<td>'.$srow["invoice_date"].'</td>';
                     echo     '<td>'.$srow["receive_date"].'</td>';
                     echo     '<td>'.$srow["driver_name"].'</td>';
                     echo     '<td>'.$srow["outlet"].'</td>';
                     $date = $srow["expiry_date"];
                     $new_format = date("M d, Y", strtotime($date));
                     $str = "id={$srow['id']}&invDate={$srow['inv_date']}&comName={$srow['company_name']}";
                     echo     '<td data-countid="1" class="counter">'.$new_format.'</td>';
                     echo '<td>
                            
                            <a href="javascript:delete_inv('.$srow["id"].')" class="waves-effect waves-light  btn-floating"><i class="mdi-content-content-cut left"></i>Delete</a>
                           </td>';
                        //   <a href="php/edit.php?id='.$str.'" class="waves-effect waves-light  btn-floating"><i class="mdi-image-edit  left"></i>Edit</a>
                      echo '</tr>';
    }else {
        echo '<tr>No Data Found</tr>';
    }

}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
      
<script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
 <script type="text/javascript">
    //   var baseUrl='http://smartinventory.zarvilla.com';
    //   function ConfirmDelete()
    //   {
    //         if (confirm("Delete Account?")){
    //              location.href=baseUrl+'/php/delete.php';
    //         }
    //   }
    
    $(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
  </script>
  <script type="text/javascript">
        function delete_id(id)
        {
         if(confirm('Sure To Remove This Record ?'))
         {
          window.location.href='php/delete.php?delete_id='+id;
         }
        }
        </script>

    
  </body>
</html>