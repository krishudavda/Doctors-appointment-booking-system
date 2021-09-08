<?php
include 'connection.php';
class Get_time extends Connection
{
   function get_all_time() 
   {
   
   $get_times = "SELECT * FROM `timming_doctor`";
       
       $query_get_time = mysqli_query($this->con,$get_times);

           
           if (mysqli_num_rows($query_get_time) > 0) 
           
           {
               $count = 1;
               while ($row = mysqli_fetch_array($query_get_time)) 
               
               {
                   
                   echo '<tr>
                   <td>'."#". $count.'</td>  
                   
                   <td>'. $row['start_time'].'</td>
                   <td>'. $row['end_time'].'</td>
                   
                   <td><a href="show_timming_details.php?edit_id='.$row['time_id'].'" class="btn btn-primary btn-outline btn-sm m-l-xs pj-table-icon-edit"><i class="far fa-edit"></i></a></td>
                   
                   <td><a href="../modal/manage_time.php?delete_id='.$row['time_id'].'&time_id='.$row['time_id'].'" class="btn btn-danger btn-outline btn-sm m-l-xs pj-table-icon-delete"><i class="far fa-trash-alt"></i></a></td>
                   
                   
                   <tr>';
                   $count = $count+1;
               
               }
           
           }
       
       }
   
   }
   
   $add = new Get_time();
   
   $add -> get_all_time();                            

?>