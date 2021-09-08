<?php
include('connection.php');
class Get_service extends Connection
{
   function get_all_service()
   {
   
   $get_service = "SELECT * FROM `services_list`";
       
       $query_get_services = mysqli_query($this->con,$get_service);

           
           if (mysqli_num_rows($query_get_services) > 0) 
           
           {
               $count = 1;
               while ($row = mysqli_fetch_array($query_get_services)) 
               
               {
                   
                   echo '<tr>
                   <td>'."#". $count.'</td>  
                   <td>'. $row['service_id'].'</td> 
                   <td>'. $row['service_name'].'</td>
                   <td>'. $row['service_department'].'</td>
                   <td>'. " ₹ ".$row['service_price'].'</td>
                   

                   <td><a href="show_service_details.php?show_id='.$row['service_id'].'" class="btn btn-primary btn-outline btn-sm m-l-xs pj-table-icon-edit"><i class="far fa-edit"></i></a></td>
                   
                   <td><a href="../modal/manage_services.php?delete_id='.$row['service_id'].'" class="btn btn-danger btn-outline btn-sm m-l-xs pj-table-icon-delete"><i class="far fa-trash-alt"></i></a></td>
                   
                   <tr>';
                   $count = $count+1;               
               }
           
           }
       
       }
   
   }
   
   $add = new Get_service();
   
   $add -> get_all_service();                            

?>