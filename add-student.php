<?php
session_start();
if(empty($_SESSION['name']))
{
    header('location:index.php');
}
include('header.php');
include('includes/connection.php');
    
      $fetch_query = mysqli_query($connection, "select max(id) as id from tbl_student");
      $row = mysqli_fetch_row($fetch_query);
      if($row[0]==0)
      {
        $stu_id = 1;
      }
      else
      {
        $stu_id = $row[0] + 1;
      }
    if(isset($_REQUEST['add-student']))
    {
      
      $stu_id = 'SRN-'.$stu_id;
      $course_name = $_REQUEST['course_name'];
      $first_name = $_REQUEST['first_name'];
      $last_name = $_REQUEST['last_name'];
      $gender = $_REQUEST['gender'];
      $dob = $_REQUEST['dob'];
      $mobile = $_REQUEST['mobile'];
      $emailid = $_REQUEST['emailid'];
      $address = $_REQUEST['address'];
      $gaurdian_name = $_REQUEST['gaurdian_name'];
      $gaurdian_mobile = $_REQUEST['gaurdian_mobile'];
      $hboard_name = $_REQUEST['hboard_name'];
      $hsubject = $_REQUEST['hsubject'];
      $hpassing_year = $_REQUEST['hpassing_year'];
      $iboard_name = $_REQUEST['iboard_name'];
      $isubject = $_REQUEST['isubject'];
      $ipassing_year = $_REQUEST['ipassing_year'];
      $status = $_REQUEST['status'];

      
      $insert_query = mysqli_query($connection, "insert into tbl_student set student_id='$stu_id', course_name='$course_name', first_name='$first_name', last_name='$last_name', gender='$gender',  dob='$dob', mobile='$mobile', emailid='$emailid', address='$address', gaurdian_name='$gaurdian_name', gaurdian_mobile='$gaurdian_mobile', board='$hboard_name', subject='$hsubject', passing_year='$hpassing_year', I_board='$iboard_name', I_subject='$isubject', I_passing_year='$ipassing_year', status='$status'");

      if($insert_query>0)
      {
          $msg = "Student record created successfully.";
      }
      else
      {
          $msg = "Error!";
      }
    }
?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 ">
                        <h4 class="page-title">Add Student</h4>
                         
                    </div>
                    <div class="col-sm-8  text-right m-b-20">
                        <a href="manage-student.php" class="btn btn-primary btn-rounded float-right">Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post" >
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Student ID <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="stu_id" value="<?php if(!empty($stu_id)) { echo 'SRN-'.$stu_id; } else { echo "SRN-1"; } ?>" disabled> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Course Name <span class="text-danger">*</span></label>
                                        <select class="select" name="course_name" required>
                                            <option value="">Select</option>
                                        <?php
                                        $fetch_query = mysqli_query($connection, "select course, description from tbl_course where status=1");
                                        while($row = mysqli_fetch_array($fetch_query)){
                                        ?>
                                            
                                            <option value="<?php echo $row['course']; ?>"><?php echo $row['course']; ?> (<?php echo $row['description']; ?>)</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="first_name" required> 
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="last_name" required> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-6">
                            <div class="form-group">
                                <label class="display-block">Gender</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="Male" checked>
                                    <label class="form-check-label">
                                    Male
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="Female">
                                    <label class="form-check-label">
                                    Female
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="Others">
                                    <label class="form-check-label">
                                    Others
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="dob" required>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile No. <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="mobile" required> 
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="emailid" required> 
                                    </div>
                                </div>
                            </div>  
                            <div class="row">
                            <div class="col-sm-6">              
                                <div class="form-group">
                                <label>Address <span class="text-danger">*</span></label>
                                <textarea cols="15" rows="2" class="form-control" name="address" required></textarea>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Guardian Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="gaurdian_name" required> 
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Gaurdian Mobile No. <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="gaurdian_mobile" required> 
                                    </div>
                                </div>
                            </div>
                            <br>
                            <center><h4>Academic Details</h4></center><br>
                            <h5>High School:</h5>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Board Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="hboard_name" required> 
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Subject <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="hsubject" required> 
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Year of Passing <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="hpassing_year" required> 
                                    </div>
                                </div>
                            </div>
                            <h5>Intermediate:</h5>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Board Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="iboard_name" required> 
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Subject <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="isubject" required> 
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Year of Passing <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="ipassing_year" required> 
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="display-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_active" value="1" checked>
                                    <label class="form-check-label" for="product_active">
                                    Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_inactive" value="0">
                                    <label class="form-check-label" for="product_inactive">
                                    Inactive
                                    </label>
                                </div>
                            </div>
                             
                            <div class="m-t-20 text-center">
                                <button name="add-student" class="btn btn-primary submit-btn">Create Student</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
		</div>
    
<?php
    include('footer.php');
?>
<script type="text/javascript">
     <?php
        if(isset($msg)) {
            echo 'swal("' . $msg . '");';
        }
    ?>
</script>