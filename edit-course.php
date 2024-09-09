<?php
session_start();

if (empty($_SESSION['name'])) {
    header('location:index.php');
    exit();
}

include('header.php');
include('includes/connection.php');

$id = $_GET['id'];
if (isset($_POST['update-course'])) {
    $course_name = $_POST['course'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $update_query = mysqli_query($connection, "UPDATE tbl_course SET course='$course_name', description='$description', status='$status' WHERE id='$id'");
    if ($update_query) {
        $msg = "Course updated successfully!";
        header('Location: manage-course.php'); 
        exit();
    } else {
        $msg = "Failed to update course. Please try again.";
    }
}

$course_query = mysqli_query($connection, "SELECT * FROM tbl_course WHERE id='$id'");
$course = mysqli_fetch_assoc($course_query);
?>

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Edit Course</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="manage-course.php" class="btn btn-primary btn-rounded float-right"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form method="post">
                    <?php if (isset($msg)) { echo "<div class='alert alert-info'>$msg</div>"; } ?>
                    <div class="form-group">
                        <label>Course Name</label>
                        <input class="form-control" type="text" name="course" value="<?php echo htmlspecialchars($course['course']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" required><?php echo htmlspecialchars($course['description']); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1" <?php if ($course['status'] == 1) echo 'selected'; ?>>Active</option>
                            <option value="0" <?php if ($course['status'] == 0) echo 'selected'; ?>>Inactive</option>
                        </select>
                    </div>
                    <button type="submit" name="update-course" class="btn btn-primary">Update Course</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>
