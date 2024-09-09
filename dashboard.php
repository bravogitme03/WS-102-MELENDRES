<?php
session_start();
if (empty($_SESSION['name'])) {
    header('location:index.php');
}
include('header.php');
include('includes/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <style>
        .page-wrapper {
            padding: 20px;
        }

        .dash-widget {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            margin: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .dash-widget:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        .dash-widget-bg1 {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: #fff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 60px;
            height: 60px;
            font-size: 30px;
        }

        .dash-widget-bg2 {
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            color: #fff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 60px;
            height: 60px;
            font-size: 30px;
        }

        .dash-widget-info {
            margin-left: 15px;
        }

        .dash-widget-info h3 {
            font-size: 28px;
            margin: 0;
        }

        .widget-title1, .widget-title2 {
            font-size: 16px;
            color: #888;
        }

        .widget-title1 i, .widget-title2 i {
            margin-left: 5px;
        }

        .widget-chart {
            margin-top: 20px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget">
                        <span class="dash-widget-bg1"><i class="fa fa-users" aria-hidden="true"></i></span>
                        <?php
                        $fetch_query = mysqli_query($connection, "SELECT COUNT(*) as total FROM tbl_student"); 
                        $stu = mysqli_fetch_row($fetch_query);
                        ?>
                        <div class="dash-widget-info text-right">
                            <h3><?php echo $stu[0]; ?></h3>
                            <span class="widget-title1">Students <i class="fa fa-address-book-o" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget">
                        <span class="dash-widget-bg2"><i class="fa fa-book"></i></span>
                        <?php
                        $fetch_query = mysqli_query($connection, "SELECT COUNT(*) as total FROM tbl_course WHERE status=1"); 
                        $course = mysqli_fetch_row($fetch_query);
                        ?>
                        <div class="dash-widget-info text-right">
                            <h3><?php echo $course[0]; ?></h3>
                            <span class="widget-title2">Courses <i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                    <div class="widget-chart">
                        <h4 class="text-center">Student Enrollment Over Time</h4>
                        <canvas id="studentChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        
        const ctx = document.getElementById('studentChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Number of Students',
                    data: [20, 40, 30, 50, 60, 70, 90],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>

<?php 
include('footer.php');
?>
