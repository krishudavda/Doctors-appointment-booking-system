<?php
include 'connection.php';
class Get_services extends Connection
{
   function get_service()
   {
    $dept_id = $_GET['dept_id'];

   $fetch_service = " SELECT * FROM `employee` WHERE `dept_id`= '$dept_id' ";
       
       $query_get_service = mysqli_query($this->con,$fetch_service);

           if (mysqli_num_rows($query_get_service) > 0) 
           
           {
               $count = 1;
               while ($row = mysqli_fetch_array($query_get_service)) 
               {
                   $get_dept = " SELECT `dept_name` FROM `department` WHERE `dept_id`='$dept_id' ";
                   $query_get_dept = mysqli_query($this->con,$get_dept);
                   $rows = mysqli_fetch_array($query_get_dept);

                   echo '<tr>
                   <td>'."#". $count.'</td>  
                   <td>'. $row['emp_name'].'</td>  
                   <td>'. $rows['dept_name'].'</td>  
                   <td>'. $row['Concultting_fees'].'</td>
                   <tr>';
                   $count = $count+1;
               
               }
           
           }      
       }
   
   }
   
   $get = new Get_services();
   $get -> get_service();
?>