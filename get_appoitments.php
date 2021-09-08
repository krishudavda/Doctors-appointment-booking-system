<?php
include 'connection.php';
class Get_appoitments extends Connection
{
   function get_all_appoitment() 
   {
    $date = date("d-m-y");
    $doctor_name =  $_SESSION['emp_name'];
   $query_appoitment = " SELECT * FROM `appointment_booking`  WHERE `appointment_date`='$date' &&  `doctor_name`='$doctor_name' ";
       
       $query_get_appoitments = mysqli_query($this->con,$query_appoitment);

           
           if (mysqli_num_rows($query_get_appoitments) > 0) 
           {
               $count = 1;
               while ($row = mysqli_fetch_array($query_get_appoitments)) 
               
               {
                   
                   echo '<tr>
                   <td>'."#". $count.'</td>  
                   <td>'. $row['appointment_date'].'</td>
                   
                   <td>'. $row['patient_id'].'</td>
                   <td>'. $row['patient_name'].'</td>
                   <td>'. $row['appointment_time'].'</td>
                   <tr>';
                   $count = $count+1;
               
               }
           
           }
           else
           {
              echo '<center><td colspan="7">
                  No Appoitments For Today !! <br>
                  Thank You 
              </td></center>';
           }
       
       }
   
   }
   
   $add = new Get_appoitments();
   
   $add -> get_all_appoitment();                            

?>