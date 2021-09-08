<?php
include('connection.php');
class Get_doctors extends Connection
{ 
   function get_doctor()   
   {
    session_start();
   $city=  $_SESSION['patient_city'];
   
   $query_service = "SELECT * FROM `employee` WHERE `emp_address`='$city' ";
       
       $query_get_service = mysqli_query($this->con,$query_service);

           
           if (mysqli_num_rows($query_get_service) > 0) 
           
           {
               while ($row = mysqli_fetch_array($query_get_service)) 
               {
                $dept = $row['dept_id'];
                $query_get_dept = mysqli_query($this->con," SELECT `dept_name` FROM `department` WHERE `dept_id`='$dept' ");
                  while ($rows = mysqli_fetch_array($query_get_dept)) 
                  {
                    echo '<tr> 
                    <option>'.$row['emp_name'].'</option>                   
                     <tr>';
                  }
               }
           
           }
       
       }
   
   }
   
   $getdept = new Get_doctors();
   $getdept -> get_doctor();                            
?>