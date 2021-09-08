<?php
include 'connection.php';
class Get_appoitments extends Connection
{
   function get_all_appoitment() 
   {
    $doctor_name =  $_SESSION['emp_name'];
   $query_appoitment = " SELECT * FROM `appointment_booking`  WHERE `doctor_name`='$doctor_name' ";
       
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
                   <td><button class="btn btn-danger btn-outline btn-sm m-l-xs pj-table-icon-delete"><i class="far fa-trash-alt" onclick="Cancel_appoitment('.$row['appointment_id'].')" id="delete_btn"></i></button></td>
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