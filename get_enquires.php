<?php
include 'connection.php';
class Get_enquires extends Connection
{
   function fetch_enquire()
   {
   $query_get_enquire = "SELECT * FROM `enquire_tbl`";
       
       $getenquires = mysqli_query($this->con,$query_get_enquire);
           if (mysqli_num_rows($getenquires) > 0) 
           {
               $count = 1;
               while ($row = mysqli_fetch_array($getenquires)) 
               {
                   echo '<tr>
                   <td>'."#". $count.'</td>  
                   <td>'. $row['patient_id'].'</td>  
                   <td>'. $row['patient_name'].'</td>  
                   <td>'. $row['date'].'</td>  
                   <td>'. $row['enquire_text'].'</td>  
                   <td>'. $row['patient_phone'].'</td>
                   <td>'. $row['patient_email'].'</td>
                   </tr>';
                   $count = $count+1;
               
               }
           
           }
           else
           {
            echo '<tr>
                <td colspan=7>'."No Enquires".'</td>
            </tr>';
           }
       
       }
   
   }
   
   $get = new Get_enquires();
   $get -> fetch_enquire();                            

?>