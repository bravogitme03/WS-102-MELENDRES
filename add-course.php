<?php
session_start();
if(empty($_SESSION['name']))
{
    header('location:index.php');
}
include('header.php');
include('includes/connection.php');
    
    if(isset($_REQUEST['add-course']))
    {
      $course_name = $_REQUEST['course_name'];
      $description = $_REQUEST['description'];
      $status = $_REQUEST['status'];
      $insert_query = mysqli_query($connection, "insert into tbl_course set course='$course_name', description='$description', status='$status'");

      if($insert_query>0)
      {
          $msg = "Course created successfully.";
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
                        <h4 class="page-title">Add Course</h4>
                         
                    </div>
                    <div class="col-sm-8  text-right m-b-20">
                        <a href="manage-course.php" class="btn btn-primary btn-rounded float-right">Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post" >
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Course Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="course_name" required> 
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Description <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="description" required>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
							
                            <div class="form-group">
                                <label class="display-block">Status</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="course_active" value="1" checked>
									<label class="form-check-label" for="course_active">
									Active
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="course_inactive" value="2">
									<label class="form-check-label" for="course_inactive">
									Inactive
									</label>
								</div>
                            </div>
                            <div class="m-t-20 text-center"><button name="add-course" class="btn btn-primary submit-btn">Create Course</button>
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