<?php
session_start();


if (empty($_SESSION['name'])) {
    header('location:index.php');
    exit();
}

include('header.php');
include('includes/connection.php');


if (isset($_GET['ids'])) {
    $id = $_GET['ids'];
    
    if (is_numeric($id)) {
        $delete_query = mysqli_query($connection, "DELETE FROM tbl_course WHERE id='$id'");
        if ($delete_query) {
            $msg = "Course deleted successfully!";
        } else {
            $msg = "Failed to delete course. Please try again.";
        }
    } else {
        $msg = "Invalid course ID.";
    }
}


$fetch_query = mysqli_query($connection, "SELECT * FROM tbl_course");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Course</title>
    <link rel="stylesheet" href="path/to/your/css/file.css">
    <style>
        body {
            font-family: 'Times New Roman', serif;
        }
        .page-wrapper, .content, .datatable, table, th, td {
            font-family: 'Times New Roman', serif;
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Manage Course</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="add-course.php" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add New Course</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="datatable table table-stripped">
                    <thead>
                        <tr>
                            <th>S. No.</th>
                            <th>Course</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($msg)) {
                            echo "<tr><td colspan='6' class='text-center'>$msg</td></tr>";
                        }
                        $i = 1; 
                        while ($row = mysqli_fetch_array($fetch_query)) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo htmlspecialchars($row['course']); ?></td>
                            <td><?php echo htmlspecialchars($row['description']); ?></td>
                            <td>
                                <?php if ($row['status'] == 1) { ?>
                                    <span class="custom-badge status-green">Active</span>
                                <?php } else { ?>
                                    <span class="custom-badge status-red">Inactive</span>
                                <?php } ?>
                            </td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="edit-course.php?id=<?php echo $row['id']; ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item" href="manage-course.php?ids=<?php echo $row['id']; ?>" onclick="return confirmDelete()"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>

    <script language="JavaScript" type="text/javascript">
    function confirmDelete() {
        return confirm('Are you sure you want to delete this Course?');
    }
    </script>
</body>
</html>
