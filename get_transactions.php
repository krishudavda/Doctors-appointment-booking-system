<?php
include 'connection.php';
class Get_employee extends Connection
{
   function get_all_emp()
   {
   $query_get_trans = "SELECT * FROM `payment_invoice`";  
       $get_trans = mysqli_query($this->con,$query_get_trans);
           if (mysqli_num_rows($get_trans) > 0) 
           {
               $count = 1;
               while ($row = mysqli_fetch_array($get_trans)) 
               {
                $appointment_id = $row['appointment_id'];
                $query_get_patient = " SELECT `patient_id`, `patient_name` FROM `appointment_booking` WHERE `appointment_id`='$appointment_id' ";
                    $get_patient = mysqli_query($this->con,$query_get_patient);
                    while ($rows = mysqli_fetch_array($get_patient)) 
                    {

                   echo '<tr>
                   <td>'."#". $count.'</td>  
                   <td>'. $rows['patient_id'].'</td>  
                   <td>'. $rows['patient_name'].'</td>  
                   <td>'. $row['appointment_id'].'</td>  
                   <td>'. $row['TXNID'].'</td>  
                   <td>'. $row['TXNAMOUNT'].'</td>
                   <td>'. $row['PAYMENTMODE'].'</td>  
                   <td>'. $row['CURRENCY'].'</td>
                   <td>'. $row['TXNDATE_TIME'].'</td>
                   <td>'. $row['STATUS'].'</td>  
                   <td>'. $row['GATEWAYNAME'].'</td>  
                   <td>'. $row['BANKTXNID'].'</td>  
                   <td>'. $row['BANKNAME'].'</td> 
                   <tr>';
                   $count = $count+1;
               
                   }
                }
           
           }
       
       }
   
   }
   
   $get = new Get_employee();
   $get -> get_all_emp();                            

?>