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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body id="page-top">
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
                <a class="nav-link text-bg-primary" href="project.php"><span><i class="fa-solid fas fa-circle" style="color: #f6d32d;width:25px;margin-left:-20px"></i><b> Projects</b></span></a>
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
                        <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <div class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
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

                if (isset($_POST['submit'])) {

                    $manager = $_POST['manager'];
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $goal = $_POST['goal'];
                    $scope = $_POST['scope'];
                    $timeline = $_POST['timeline'];
                    $creator = $data['email'];
                    $ghDrive = $_POST['ghDrive'];
                    $meet = $_POST['meet'];
                    $m1 = "Vacancy";
                    $m2 = "Vacancy";
                    $m3 = "Vacancy";
                    $m4 = "Vacancy";



                    $sql = "INSERT INTO `project`(id,manager,title, description, goal, scope,timeline,creator,ghDrive,meet,m1,m2,m3,m4) VALUES (NULL,'$manager','$title','$description','$goal','$scope','$timeline','$creator','$ghDrive','$meet','$m1','$m2','$m3','$m4')";

                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        header("Location: index.php");
                    }
                }

                ?>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Create Project</h3>

                    </div>
                </div>
                <div class="container">



                    <div class="card shadow border-start-success py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col me-2">

                                    <br>
                                    <form method="post">

                                        <div class="row mt-3">
                                            <div class="col col-lg-4">
                                                <label for="manager" class="form-label">Project Manager: </label>
                                                <input type="text" class="form-control" name="manager" id="manager" placeholder="">

                                            </div>
                                            <div class="col col-lg-4">
                                                <label for="title" class="form-label">Project Name: </label>
                                                <input type="text" class="form-control" name="title" id="title" placeholder="">
                                            </div>
                                            <div class="col col-lg-4">
                                                <label for="timeline" class="form-label">Meet Code: </label>
                                                <input type="text" class="form-control" name="meet" id="timeline" placeholder="">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col col-lg-12">
                                                <label for="description" class="form-label">Project Description: </label>
                                                <textarea id="description" rows="16" style="height:200px" class="form-control" name="description" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col col-lg-4">
                                                <label for="goal" class="form-label">Project Goal: </label>
                                                <input type="text" class="form-control" name="goal" id="goal" placeholder="">
                                            </div>
                                            <div class="col col-lg-4">
                                                <label for="scope" class="form-label">Project Scope: </label>
                                                <input type="text" class="form-control" name="scope" id="scope" placeholder="">
                                            </div>
                                            <div class="col col-lg-4">
                                                <label for="timeline" class="form-label">Project Timeline: </label>
                                                <input type="text" class="form-control" name="timeline" id="timeline" placeholder="">
                                            </div>
                                        </div>
                                        <div class="row mt-3">

                                            <div class="col col-lg-12">
                                                <label for="scope" class="form-label">Github Repository: </label>
                                                <input type="text" class="form-control" name="ghDrive" id="scope" placeholder="">
                                            </div>

                                        </div>

                                        <br>

                                        <div class="text-dark fw-bold h5 mb-0" style="height: 24px">

                                            <button type="submit" name="submit" class="btn btn-success text-white">Add</button>
                                            <button type="button" class="btn btn-danger">Cancel</button>
                                        </div>


                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>


    </div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/todolist.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <script src="assets/js/theme.js"></script>
</body>
<footer class="bg-white sticky-footer">
    <div class="container my-auto">
        <div class="text-center my-auto copyright">
            <span>Copyright © FYNDLE 2023</span>
        </div>
    </div>
</footer>

</html>