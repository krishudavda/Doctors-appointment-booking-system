<?php
include 'connection.php';
class Get_patients extends Connection
{
   function get_all_ptients() 
   {
   
   $get_patients = "SELECT * FROM `patient_info`";
       
       $query_get_patients = mysqli_query($this->con,$get_patients);

           
           if (mysqli_num_rows($query_get_patients) > 0) 
           {
               $count = 1;
               while ($row = mysqli_fetch_array($query_get_patients)) 
               
               {
                   
                   echo '<tr>
                   <td>'."#". $count.'</td>  
                   <td>'. $row['patient_id'].'</td>
                   
                   <td>'. $row['patient_name'].'</td>
                   <td>'. $row['patient_gender'].'</td>  
                   
                   <td>'. $row['patient_contact'].'</td>
                   <td>'. $row['patient_city'].'</td>  
                   
                   <td>'. $row['patient_blood_group'].'</td>
                   
                   <td><a href="show_patient_details.php?show_id='.$row['patient_id'].'" class="btn btn-primary btn-outline btn-sm m-l-xs pj-table-icon-edit"><i class="fas fa-info"></i></a></td>
                   
                   <td><a href="../modal/manage_patient.php?delete_id='.$row['patient_id'].'&patient_id='.$row['patient_id'].'" class="btn btn-danger btn-outline btn-sm m-l-xs pj-table-icon-delete"><i class="far fa-trash-alt"></i></a></td>
                   
                   
                   <tr>';
                   $count = $count+1;
               
               }
           
           }
       
       }
   
   }
   
   $add = new Get_patients();
   
   $add -> get_all_ptients();                            

?>