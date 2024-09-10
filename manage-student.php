<?php
session_start();
if(empty($_SESSION['name']))
{
    header('location:index.php');
}
include('header.php');
include('includes/connection.php');
?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Manage Student</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-student.php" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Student</a>
                    </div>
                </div>
                <div class="table-responsive">
                                    <table class="datatable table table-stripped ">
                                    <thead>
                                        <tr>
                                            <th>Student Id</th>
                                            <th>Student Name</th>
                                            <th>Course Name</th>
                                            <th>Gender</th>
                                            <th>DOB</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Gaurdian Name</th>
                                            <th>Gaurdian Mobile</th>
                                            <th>10<sup>th</sup> Board</th>
                                            <th>10<sup>th</sup> Subject</th>
                                            <th>10<sup>th</sup> Passing Year</th>
                                            <th>12<sup>th</sup> Board</th>
                                            <th>12<sup>th</sup> Subject</th>
                                            <th>12<sup>th</sup> Passing Year</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(isset($_GET['ids'])){
                                        $id = $_GET['ids'];
                                        $delete_query = mysqli_query($connection, "delete from tbl_student where id='$id'");
                                        }
                                        $fetch_query = mysqli_query($connection, "select * from tbl_student");
                                        while($row = mysqli_fetch_array($fetch_query))
                                        {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['student_id']; ?></td>
                                            <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                                            <td><?php echo $row['course_name']; ?></td>
                                            <td><?php echo $row['gender']; ?></td>
                                            <td><?php echo $row['dob']; ?></td>
                                            <td><?php echo $row['mobile']; ?></td>
                                            <td><?php echo $row['emailid']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['gaurdian_name']; ?></td>
                                            <td><?php echo $row['gaurdian_mobile']; ?></td>
                                            <td><?php echo $row['board']; ?></td>
                                            <td><?php echo $row['subject']; ?></td>
                                            <td><?php echo $row['passing_year']; ?></td>
                                            <td><?php echo $row['I_board']; ?></td>
                                            <td><?php echo $row['I_subject']; ?></td>
                                            <td><?php echo $row['I_passing_year']; ?></td>
                                            <?php if($row['status']==1) { ?>
                                            <td><span class="custom-badge status-green">Active</span></td>
                                        <?php } else {?>
                                            <td><span class="custom-badge status-red">Inactive</span></td>
                                        <?php } ?>
                                            <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="edit-student.php?id=<?php echo $row['id'];?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="manage-student.php?ids=<?php echo $row['id'];?>" onclick="return confirmDelete()"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
function confirmDelete(){
    return confirm('Are you sure want to delete this Student?');
}
</script>
