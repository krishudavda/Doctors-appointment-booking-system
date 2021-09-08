<?php
include 'connection.php';
class Get_employee extends Connection
{
                                
   
   function get_all_emp()
   
   {
   
   $get_emp = "SELECT * FROM `employee`";
       
       $query_get_emp = mysqli_query($this->con,$get_emp);

           
           if (mysqli_num_rows($query_get_emp) > 0) 
           
           {
               $count = 1;
               while ($row = mysqli_fetch_array($query_get_emp)) 
               
               {
                   
                   echo '<tr>
                   <td>'."#". $count.'</td>  
                   <td>'. $row['emp_id'].'</td>  
                   <td>'. $row['emp_name'].'</td>  
                   <td>'. $row['dept_id'].'</td>  
                   <td>'. $row['emp_desigation'].'</td>  
                   <td>'. $row['emp_email'].'</td>  
                   <td>'. $row['emp_mobile'].'</td>
                   <td>'. $row['emp_address'].'</td>
                   <td>'. $row['Concultting_fees'].'</td>
                   
                   <td><a href="show_employee_details.php?show_id='.$row['emp_id'].'" class="btn btn-primary btn-outline btn-sm m-l-xs pj-table-icon-edit"><i class="far fa-edit"></i></a></td>
                   
                   <td><a href="../modal/manage_employee.php?delete_id='.$row['emp_id'].'" class="btn btn-danger btn-outline btn-sm m-l-xs pj-table-icon-delete"><i class="far fa-trash-alt"></i></a></td>
                   <tr>';
                   $count = $count+1;
               
               }
           
           }
       
       }
   
   }
   
   $get = new Get_employee();
   $get -> get_all_emp();                            

?>