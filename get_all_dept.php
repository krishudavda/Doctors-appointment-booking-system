<?php
include 'connection.php';
class Get_dept extends Connection
{
   function get_all_dept() 
   {
   
   $get_depts = "SELECT * FROM `department`";
       
       $query_get_depts = mysqli_query($this->con,$get_depts);

           
           if (mysqli_num_rows($query_get_depts) > 0) 
           
           {
               $count = 1;
               while ($row = mysqli_fetch_array($query_get_depts)) 
               
               {
                   
                   echo '<tr>
                   <td>'."#". $count.'</td>  
                   <center><td>'. $row['dept_id'].'</td></center>  
                   
                   <td>'. $row['dept_name'].'</td>
                   
                   <td><a href="show_department_details.php?edit_id='.$row['dept_id'].'" class="btn btn-primary btn-outline btn-sm m-l-xs pj-table-icon-edit"><i class="far fa-edit"></i></a></td>
                   
                   <td><a href="../modal/manage_depts.php?delete_id='.$row['dept_id'].'&dept_id='.$row['dept_id'].'" class="btn btn-danger btn-outline btn-sm m-l-xs pj-table-icon-delete"><i class="far fa-trash-alt"></i></a></td>
                   
                   
                   <tr>';
                   $count = $count+1;
               
               }
           
           }
       
       }
   
   }
   
   $add = new Get_dept();
   
   $add -> get_all_dept();                            

?>