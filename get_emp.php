<?php
class Get_employee extends Connection
{ 
   function get_emp()   
   {
   
   $get_emp = " SELECT `emp_id`,`emp_name`,`dept_id` FROM `employee` ";
       
       $query_get_emp = mysqli_query($this->con,$get_emp);

           
           if (mysqli_num_rows($query_get_emp) > 0) 
           
           {
               while ($row = mysqli_fetch_array($query_get_emp)) 
               
               {
                  echo '<tr> 
                  <option>'. $row['emp_id']." - ". $row['emp_name']."      (".$row['dept_id'].")".'</option>                 
                   <tr>';
               }
           
           }
           else
           {
            echo "No employee Added";
           }
       
       }
   
   }
   
   $getdept = new Get_employee();
   
   $getdept -> get_emp();                            

?>