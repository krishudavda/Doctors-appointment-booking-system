<?php
    session_start();
    if (isset($_SESSION['emp_id'])) 
    {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Diagnostic center</title>
</head>
<style>
     div.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  margin-top: 50px;
  padding: 20px;
}
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}    

</style>
<body>
 <div class="page-wrapper">
        <?php
            include('header.php');
        ?>
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                 <center><h3> Dashboard </h3></center>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="float-right">
                        <div class="header-wrap">
                            <div class="header-button">
                                
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['emp_name'];  ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                    <h3 class="name">
                                                        <center><?php echo $_SESSION['emp_name'];  ?></center>
                                                    </h3>
                                                <center><span class="email"><?php echo $_SESSION['emp_email'];  ?></span></center> 
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="manage_admin_account.php">
                                                        <i class="zmdi zmdi-account"></i> Manage Account</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="main-content">
                <div class="section__content section__content--p30">
                      <div class="row">
                            <div>
                                <div>
                                    <button class="btn btn-primary" id="add_center"><i class="fa fa-plus"> &nbsp Add Hospitals / Labs / Diagnostic center</i></button>
                                </div><br>
                                <h2 class="title-1 m-b-25">Diagnostic center</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-striprd table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Center ID</th>
                                                <th>Center Name</th>
                                                <th>Center Type</th>
                                                <th>Head Dr.</th>
                                                <th>Center Location</th>
                                                <th colspan="2"> Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                 include('../modal/connection.php');
                                                 include('../modal/get_labs.php');
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>  
                </div>
                <div class="section__content section__content--p30"> 
                    <div class="row">
                        <div class="container" id="add_center_div">
                      <form action="#" id="Registration_form" onsubmit="return false">
                                <div class="form-group">
                                    <i class="fa fa-user icon"></i>&nbsp<label>Center Name</label>
                                    <input class="form-control" type="text" name="center_name" id="center_name" placeholder="Center/Lab Name">
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-building"></i>&nbsp<label>Center Type</label>
                                     <select class="form-control" id="center_type">
                                      <option>Please Select Anyone</option>
                                      <?php
                                        include('../modal/get_dept_add_emp.php');
                                      ?>
                                   </select>
                                </div>
                                <div class="form-group">
                                   <i class="fas fa-briefcase"></i>&nbsp<label>Center Head</label>
                                   <select class="form-control" id="center_head">
                                      <option>Please Select Anyone</option>
                                      <?php
                                        include('../modal/get_emp.php');
                                      ?>
                                   </select> 
                                </div>
                                <div class="form-group">
                                     <i class="fas fa-map-marker-alt"></i>&nbsp<label>Center Location</label>
                                    <input class="form-control" type="text" id="center_loc" name="center_loc" placeholder="Center Location">
                                </div>
                                 <p id="error"></p><br>
                                <input type="submit" name="submit_add_center" id="submit_add_center" value="Save Center" class="btn btn-primary">
                               
                            </form>       
                    </div>     
                    </div>
                </div>
            </div>
    	</div>
            
    </div>


<script type="text/javascript">

$('#add_center_div').hide();

$('#add_center').click(function(){
$('#add_center_div').show();

});

$('#submit_add_center').click(function(){

var center_name = $('#center_name').val();
var center_type = $('#center_type').val();
var center_head = $('#center_head').val();
var center_loc = $('#center_loc').val();

        if (center_name != '' && center_type != '' && center_head != '' && center_loc != '') 
        {
            if (center_type != 'Please Select Anyone' && center_head != 'Please Select Anyone') 
            {
                 $.ajax({
                    url : '../modal/add_center.php',
                    method : 'post',
                    data : {
                        center_name : center_name,
                        center_type : center_type,
                        center_head : center_head,
                        center_loc : center_loc
                    },

                    success: function(data,status)
                    {
                        if (data == 1) 
                         {
                            $('#add_center_div').hide();
                            window.location = 'diagnostic_center.php';
                         }
                         else
                         {
                             $('#error').html(data).css("color","red");
                         }
                    }
                });
            }
            else
            {
                $('#error').html('Please Select Anyone').css("color","red");
            }
           
        }
        else
        {
            $('#error').html('Blank Fields').css("color","red");
        }
});
</script>
<?php
include('footer.html');

?>
<?php
    }
    else
    {
        header("Location:login.php");
    }
?>
</body>
</html>