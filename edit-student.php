<?php 
session_start();
if(empty($_SESSION['name']))
{
    header('location:index.php');
}
include('header.php');
include('includes/connection.php');

$id = $_GET['id'];
$fetch_query = mysqli_query($connection, "select * from tbl_student where id='$id'");
$row = mysqli_fetch_array($fetch_query);

if(isset($_REQUEST['update-student']))
{
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


      $update_query = mysqli_query($connection, "update tbl_student set course_name='$course_name', first_name='$first_name', last_name='$last_name', gender='$gender',  dob='$dob', mobile='$mobile', emailid='$emailid', address='$address', gaurdian_name='$gaurdian_name', gaurdian_mobile='$gaurdian_mobile', board='$hboard_name', subject='$hsubject', passing_year='$hpassing_year', I_board='$iboard_name', I_subject='$isubject', I_passing_year='$ipassing_year', status='$status' where id='$id'");
      if($update_query>0)
      {
          $msg = "Student record updated successfully.";
          $fetch_query = mysqli_query($connection, "select * from tbl_student where id='$id'");
          $row = mysqli_fetch_array($fetch_query);   
          
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
                        <h4 class="page-title">Edit Student</h4>
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
                                        <input class="form-control" type="text" name="stu_id" value="<?php echo $row['student_id']; ?>" disabled> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Course Name <span class="text-danger">*</span></label>
                                        <select class="select" name="course_name" required>
                                            <option value="">Select</option>
                                        <?php
                                        $fetch_query = mysqli_query($connection, "select course, description from tbl_course where status=1");
                                        while($rows = mysqli_fetch_array($fetch_query)){
                                        ?>
                                            
                                            <option value="<?php echo $rows['course']; ?>" <?php if($row['course_name']== $rows['course']) { echo 'selected'; } ?>><?php echo $rows['course']; ?> (<?php echo $rows['description']; ?>)</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="first_name" value="<?php echo $row['first_name']; ?>" required> 
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="last_name" value="<?php echo $row['last_name']; ?>" required> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-6">
                            <div class="form-group">
                                <label class="display-block">Gender</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="Male" <?php if($row['gender']=='Male') { echo 'checked' ; } ?>>
                                    <label class="form-check-label">
                                    Male
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="Female" <?php if($row['gender']=='Female') { echo 'checked' ; } ?>>
                                    <label class="form-check-label">
                                    Female
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="Others" <?php if($row['gender']=='Others') { echo 'checked' ; } ?>>
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
                                            <input type="text" class="form-control datetimepicker" name="dob" value="<?php echo $row['dob']; ?>" required>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile No. <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="mobile" value="<?php echo $row['mobile']; ?>" required> 
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>EmailId <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="emailid" required value="<?php echo $row['emailid']; ?>"> 
                                    </div>
                                </div>
                            </div>  
                            <div class="row">
                            <div class="col-sm-6">              
                                <div class="form-group">
                                <label>Address <span class="text-danger">*</span></label>
                                <textarea cols="15" rows="2" class="form-control" name="address" required><?php echo $row['address']; ?></textarea>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Guardian Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="gaurdian_name" required value="<?php echo $row['gaurdian_name']; ?>"> 
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Gaurdian Mobile No. <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="gaurdian_mobile" required value="<?php echo $row['gaurdian_mobile']; ?>"> 
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
                                        <input class="form-control" type="text" name="hboard_name" required value="<?php echo $row['board']; ?>"> 
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Subject <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="hsubject" required value="<?php echo $row['subject']; ?>"> 
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Year of Passing <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="hpassing_year" required value="<?php echo $row['passing_year']; ?>"> 
                                    </div>
                                </div>
                            </div>
                            <h5>Intermediate:</h5>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Board Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="iboard_name" required value="<?php echo $row['I_board']; ?>"> 
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Subject <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="isubject" required value="<?php echo $row['I_subject']; ?>"> 
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Year of Passing <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="ipassing_year" required value="<?php echo $row['I_passing_year']; ?>"> 
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="display-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_active" value="1" <?php if($row['status']==1) { echo 'checked' ; } ?>>
                                    <label class="form-check-label" for="product_active">
                                    Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_inactive" value="0" <?php if($row['status']==0) { echo 'checked' ; } ?>>
                                    <label class="form-check-label" for="product_inactive">
                                    Inactive
                                    </label>
                                </div>
                            </div>
                             
                            <div class="m-t-20 text-center">
                                <button name="update-student" class="btn btn-primary submit-btn">Update Student</button>
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