<?php
session_start();
include "connection.php";
include "functions.php";
$data = check_login($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Fyndle</title>
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
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
                <a class="nav-link text-bg-primary" href="index.php"><span><i class="fa-solid fas fa-circle" style="color: #f6d32d;width:25px;margin-left:3px"></i><b>   Dashboard</b></span></a>
                <br>
                <a class="nav-link text-bg-primary" href="documents.php"><span><i class="fa-solid fas fa-circle" style="color: #f6d32d;width:25px;margin-left:3px"></i><b>   Documents</b></span></a>
                <br>
                <a class="nav-link text-bg-primary" href="profile.php"><span><i class="fa-solid fas fa-circle" style="color: #f6d32d;width:25px;margin-left:5px"></i><b>   User Profile</b></span></a>
                <br>
                <a class="nav-link text-bg-primary" href="messages.php"><span><i class="fa-solid fas fa-circle" style="color: #f6d32d;width:25px;margin-left:-43px"></i><b>   Email</b></span></a>
                <br>
                <a class="nav-link text-bg-primary" href="employee.php"><span><i class="fa-solid fas fa-circle" style="color: #f6d32d;width:25px;margin-left:-13px"></i><b>   Employee</b></span></a></a>
                <br>
                <a class="nav-link text-bg-primary" href="settings.php"><span><i class="fa-solid fas fa-circle" style="color: #f6d32d;width:25px;margin-left:-23px"></i><b>   Settings</b></span></a></a>
                <br>
                <a class="nav-link text-bg-primary" href="login.php"><span><i class="fa-solid fas fa-circle" style="color: #f6d32d;width:25px;margin-left:-33px"></i><b>   Logout</b></span></a></a>
                <br>
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
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Profile Settings</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3" style="height:480px">
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="assets/img/user.png" width="300" height="300">
                                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="button">Change Photo</button></div>
                                </div>
                            </div>
                         
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">User Settings</p>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            
                                            $id = $data['id'];

                                            if (isset($_POST['submit'])) {
                                               
                                                $firstName = $_POST['firstName'];
                                                $lastName = $_POST['lastName'];
                                                $gender = $_POST['gender'];
                                                $email = $_POST['email'];
                                                $number = $_POST['number'];
                                                $address = $_POST['address'];
                                                $city = $_POST['city'];
                                                $country = $_POST['country'];

                                                $sql = "UPDATE `accounts` SET `firstName`='$firstName',`lastName`='$lastName',`address`='$address',`gender`='$gender',`number`='$number',`email`='$email',`password`='$password',`city`='$city',`country`='$country' WHERE id = $id";

                                                $result = mysqli_query($conn,$sql);
                                                if($result)
                                                {
                                                    header("Location: index.php");
                                                }
                                            }

                                            ?>
                                            <form method="post">
                                                <div class="row">


                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="firstName"><strong>First Name</strong></label><input class="form-control" type="text" placeholder="First Name" name="firstName"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="lastName"><strong>Last Name</strong></label><input class="form-control" type="text" placeholder="Last Name" name="lastName"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="gender"><strong>Gender</strong></label><input class="form-control" type="text" placeholder="Gender" name="gender"></div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="number"><strong>Mobile Number</strong></label><input class="form-control" type="text" placeholder="Number" name="number"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="email"><strong>Email Address</strong></label><input class="form-control" type="email" placeholder="Email" name="email"></div>
                                                    </div>
                                                </div>


                                                <div class="mb-3"><label class="form-label" for="address"><strong>Address</strong></label><input class="form-control" type="text" id="address" placeholder="Address" name="address"></div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="city"><strong>City</strong></label><input class="form-control" type="text" id="city" placeholder="City" name="city"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="country"><strong>Country</strong></label><input class="form-control" type="text" id="country" placeholder="Country" name="country"></div>
                                                    </div>
                                                </div>
                                                <div class="mb-3"><button class="btn btn-primary btn-sm" name="submit" type="submit">Save Settings</button></div>
                                            </form>
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
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2023</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/boostrap/js/ajaxregister.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>