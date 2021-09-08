<?php
class Get_labs extends Connection
{
   function get_all_labs()
   {
   
   $get_depts = "SELECT * FROM `labs/centers`";
       
       $query_get_depts = mysqli_query($this->con,$get_depts);

           
           if (mysqli_num_rows($query_get_depts) > 0) 
           
           {
               $count = 1;
               while ($row = mysqli_fetch_array($query_get_depts)) 
               
               {
                   
                   echo '<tr>
                   <td>'."#". $count.'</td>  
                   <td>'. $row['lab_id'].'</td> 
                   <td>'. $row['lab_name'].'</td>
                   <td>'. $row['dept_id'].'</td>
                   <td>'. $row['emp_id'].'</td>
                   <td>'. $row['lab_location'].'</td>

                   <td><a href="show_lab_details.php?show_id='.$row['lab_id'].'" class="btn btn-primary btn-outline btn-sm m-l-xs pj-table-icon-edit"><i class="far fa-edit"></i></a></td>
                   
                   <td><a href="../modal/manage_labs.php?delete_id='.$row['lab_id'].'" class="btn btn-danger btn-outline btn-sm m-l-xs pj-table-icon-delete"><i class="far fa-trash-alt"></i></a></td>
                   
                   <tr>';
                   $count = $count+1;               
               }
           
           }
       
       }
   
   }
   
   $add = new Get_labs();
   
   $add -> get_all_labs();                            

?>