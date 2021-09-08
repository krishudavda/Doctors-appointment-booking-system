<?php
include 'connection.php';
class Get_patients extends Connection
{
   function patient_list() 
   {
    $doctor_name =  $_SESSION['emp_name'];
   $query_appoitment = " SELECT * FROM `appointment_booking` WHERE `doctor_name`='$doctor_name' ";
       
       $query_get_appoitments = mysqli_query($this->con,$query_appoitment);

           
           if (mysqli_num_rows($query_get_appoitments) > 0) 
           {
               $count = 1;
               while ($row = mysqli_fetch_array($query_get_appoitments)) 
               {
                   $patientID = $row['patient_id'];
                   $query_get_patient = mysqli_query($this->con," SELECT * FROM `patient_info` WHERE `patient_id`='$patientID' ");
                    while ($rows = mysqli_fetch_array($query_get_patient)) 
                    {  

                       echo '<tr>
                       <td>'."#". $count.'</td>  
                       <td>'. $row['patient_id'].'</td>
                       
                       <td>'. $row['patient_name'].'</td>
                       <td>'. $rows['patient_gender'].'</td>
                       <td>'. $rows['patient_contact'].'</td> 
                       <td>'. $rows['patient_city'].'</td>
                       <tr>';
                       $count = $count+1;
                     }
               
               }
           
           }
           else
           {
              echo '<center><td colspan="7">
                  No Patients You Attented !! <br>
                  Thank You 
              </td></center>';
           }
       
       }
   
   }
   
   $add = new Get_patients();
   
   $add -> patient_list();                            

