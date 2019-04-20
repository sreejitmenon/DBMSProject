<?php
include "db_connect.php";
include "authen_login.php";
$key = isset($_POST['key']) ? $_POST['key'] : '';   
        $result = $connection->query("SELECT images FROM car_details WHERE car_id = '$key'");
    if($result){
        $imgData = $result->fetch_assoc();

        echo '          <div align="center">
                          <tr>  
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($imgData['images'] ).'" height="500" width="500" class="img-thumnail" />  
                               </td>  
                          </tr>  
                        </div>
                     ';  
    }else{
        echo 'Image not found...';
    }      
?>
