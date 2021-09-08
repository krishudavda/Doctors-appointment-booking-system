<?php
include('connection.php');
class Operation extends Connection
{ 
   function get_Rate()   
   {
   $doctor_name = $_POST['doctor_name'];
   $query_rate = "SELECT `Concultting_fees` FROM `employee` WHERE `emp_name`='$doctor_name' ";       
       $query_get_rate = mysqli_query($this->con,$query_rate);

           if (mysqli_num_rows($query_get_rate) > 0) 
           
           {
               while ($row = mysqli_fetch_array($query_get_rate)) 
               {
                  echo ' '.$row['Concultting_fees'].' ';
               }
           
           }
       
       }
   
   }
   
   $getdept = new Operation();
   $getdept -> get_Rate();
?>