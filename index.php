<?php
session_start();
include "connection.php";
include "functions.php";

$data = check_login($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Fyndle</title>
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap" />
    <link rel="stylesheet" href="assets/bootstrap/css/todolist.css" />
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css" />


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>



<body id="page-top" data-bs-theme="dark">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0 mt-5" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"><img src="assets/fyndleLogo.png" style="height:150px;" alt=""></div>
                </a>
                <hr class="sidebar-divider my-0" />

                <br><br>

                <a class="nav-link text-bg-primary" href="index.php"><span><i class="fa-solid fas fa-circle" style="color: #f6d32d;width:25px;margin-left:3px"></i><b> Dashboard</b></span></a>
                <br>
                <a class="nav-link text-bg-primary" href="project.php"><span><i class="fa-solid fas fa-circle" style="color: #f6d32d;width:25px;margin-left:-20px"></i><b>   Projects</b></span></a>
                <br>
                <a class="nav-link text-bg-primary" href="documents.php"><span><i class="fa-solid fas fa-circle" style="color: #f6d32d;width:25px;margin-left:3px"></i><b> Documents</b></span></a>
                <br>
                <a class="nav-link text-bg-primary" href="profile.php"><span><i class="fa-solid fas fa-circle" style="color: #f6d32d;width:25px;margin-left:5px"></i><b> User Profile</b></span></a>
                <br>
                <a class="nav-link text-bg-primary" href="messages.php"><span><i class="fa-solid fas fa-circle" style="color: #f6d32d;width:25px;margin-left:-43px"></i><b> Email</b></span></a>
                <br>
                <a class="nav-link text-bg-primary" href="employee.php"><span><i class="fa-solid fas fa-circle" style="color: #f6d32d;width:25px;margin-left:-13px"></i><b> Employee</b></span></a></a>
                <br>
                <a class="nav-link text-bg-primary" href="settings.php"><span><i class="fa-solid fas fa-circle" style="color: #f6d32d;width:25px;margin-left:-23px"></i><b> Settings</b></span></a></a>
                <br>
                <a class="nav-link text-bg-primary" href="login.php"><span><i class="fa-solid fas fa-circle" style="color: #f6d32d;width:25px;margin-left:-33px"></i><b> Logout</b></span></a></a>
                <br>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <div class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <div class="container-fluid p-2 align-items-center">
                                        <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">

                                                <?php

                                                echo $data['firstName'] . ", " . $data['lastName'];

                                                ?>


                                            </span>


                                            <img class="border rounded-circle img-profile" src="assets/img/user.png" /></a>
                                        <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                            <a class="dropdown-item" href="profile.php"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a>
                                            <a class="dropdown-item" href="settings.php"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="login.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                        </div>
                                    </div>
                                </div>
                        </ul>
                    </div>
                </nav>
                <?php
                if (isset($_POST['modalSubmit'])) {
                    $text1 = $_POST['text1'];
                }
                $sql = "INSERT INTO `concern` (text1) VALUES('$text1')";
                $result = mysqli_query($conn, $sql);

                ?>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3>
                        <!--Concern-->
                        <button type="button" class="btn btn-primary btn-sm d-none d-sm-inline-block" data-toggle="modal" data-target="#myModal">Concern</button>

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Generate Text</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="concern">What is your concern? </label>
                                                <textarea type="text" class="form-control" id="concern" name="text1"></textarea>
                                            </div>

                                            <button type="modalSubmit" name="modalSubmit" class="btn btn-primary btn-badge mt-3">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4 col-xl-4 mb-4">
                            <div class="card shadow border-start-info py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-info fw-bold text-xs mb-1">
                                                <span>Public Documents</span>
                                            </div>
                                            <div class="row g-0 align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-dark fw-bold h5 mb-0" style="height: 24px">
                                                        <button class="btn btn-outline-success">
                                                            <a href="documents.php" style="
                                height: 30px;
                                font-size: 15px;
                                text-decoration: none;
                              ">Contribute</a>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php
                        if (isset($_POST['submit1'])) {
                            $name = $_POST['fileToUpload'];
                            $sql = "INSERT INTO `project` (manager) VALUES ('$name')";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                header("Location: createProject.php");
                            }
                        }
                        ?>



                        <div class="col-md-4 col-xl-4 mb-4">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-success fw-bold text-xs mb-1">
                                                <span>Create Project</span>
                                            </div>
                                            <div class="text-dark fw-bold h5 mb-0" style="height: 24px">
                                                <button class="btn btn-outline-success">
                                                    <a href="createProject.php" style="
                                height: 30px;
                                font-size: 15px;
                                text-decoration: none;
                              ">New Project</a>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="assets/img/add.png" alt="" style="height: 40px; opacity: 0.3" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-4 mb-4">
                            <div class="card shadow border-start-warning py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-warning fw-bold text-xs mb-1">
                                                <span>Projects</span>
                                            </div>
                                            <div class="text-dark fw-bold h5 mb-0" style="height: 24px">
                                                <button class="btn btn-outline-success">
                                                    <a href="joinProject.php" style="
                                height: 30px;
                                font-size: 15px;
                                text-decoration: none;
                              ">Join Project</a>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-duotone fa-rocket fa-2x text-gray-300"></i>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3" style="height:60px;">
                                    <h6 class="text-primary fw-bold m-0">Announcements</h6>
                                </div>
                                <div class="card-body">

                                    <table class="table">

                                        <tbody>
                                            <?php
                                            include "connection.php";
                                            $sql = "SELECT * FROM `announcements`";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['date'] ?></td>
                                                    <td><?php echo $row['msg'] ?></td>
                                                </tr>
                                            <?php
                                            }


                                            ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-lg-12 col-xl-12">
                                    <div class="card shadow mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center" style="height:60px;">
                                            <h6 class="text-primary fw-bold m-0">Events</h6>

                                        </div>
                                        <div class="card-body">

                                            <table class="table">

                                                <tbody>
                                                    <?php
                                                    include "connection.php";
                                                    $sql = "SELECT * FROM `events`";
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $row['date'] ?></td>
                                                            <td><?php echo $row['text'] ?></td>
                                                        </tr>
                                                    <?php
                                                    }


                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                        <div class="">
                                <div class="row">
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="card shadow mb-4" style="">
                                            <div class="card-header d-flex justify-content-between align-items-center" style="height:60px;">
                                                <h6 class="text-primary fw-bold m-0">Forums</h6>
                                               
                                            </div>
                                            <div class="card-body">
                                            <img src="assets/img/wireframe.drawio.png" alt="" style="width:100%">
                                               





                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright">
                <span>Copyright © FYNDLE 2023</span>
            </div>
        </div>
    </footer>
    </div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/todolist.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <script src="assets/js/theme.js"></script>
</body>

</html>