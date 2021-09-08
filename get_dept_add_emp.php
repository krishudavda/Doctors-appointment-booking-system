<?php
class Get_departments extends Connection
{ 
   function get_dept()   
   {
   
   $get_depts = "SELECT `dept_id`,`dept_name` FROM `department`";
       
       $query_get_depts = mysqli_query($this->con,$get_depts);

           
           if (mysqli_num_rows($query_get_depts) > 0) 
           
           {
               while ($row = mysqli_fetch_array($query_get_depts)) 
               
               {
                  echo '<tr> 
                  <option>'.$row['dept_id']." - ". $row['dept_name'].'</option>                   
                   <tr>';
               }
           
           }
       
       }
   
   }
   
   $getdept = new Get_departments();
   $getdept -> get_dept();                            

?>