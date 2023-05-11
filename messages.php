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
    <link rel="stylesheet" href="assets/bootstrap/css/messagecs.css" />
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
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Email</h3>

                    </div>
                    <div class="container">
                        <?php
                        $sql = mysqli_query($conn, "SELECT * FROM accounts WHERE email = '$email'");
                        if (mysqli_num_rows($sql) > 0) {
                            $row = mysqli_fetch_assoc($sql);
                        }
                        ?>

                        <div class="card shadow border-start-success py-2 mt-5">
                            <div class="text-dark" style="margin-left:50px">

                                <div class="row search">
                                    <div class="col col-lg-12">
                                        <img class="" src="assets/img/user.png" style="height:80px;float:left;margin-right:20px;padding-top:10px;padding-bottom:10px" alt="" srcset="">
                                        <h3 style="margin-top:10px"><?php echo $data['firstName'] . ", " . $data['lastName']; ?></h3>
                                        <h6>Status : Active now</h6>
                                    </div>

                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col col-lg-8">
                                <div class="card shadow border-start-success py-2 mt-3" style="width:700px;margin-left:0px;margin-right:20px">

                                    <div class="users-list">
                                        <a href="" style="text-decoration:none">
                                            <table class="table table-hover text-center">


                                                <thead>
                                                    <tr>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Mail</th>
                                                    </tr>
                                                </thead>


                                                <tbody class="table-group-divider">

                                                    <?php
                                                    include "connection.php";
                                                    $sql = "SELECT * FROM `accounts`";
                                                    $result = mysqli_query($conn, $sql);

                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $row['firstName'] . ", " . $row['lastName'] ?></td>
                                                            <td>
                                                                <a href="mailto:<?php echo $row['email'] ?>" class=""><i class="fa-solid fa-envelope fs-5 me-3" style="color: #9a9996;"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php

                                                    }
                                                    ?>
                                                </tbody>

                                            </table>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col col-lg-4 mt-3">



                                <div class="content">


                                    <iframe src="https://discord.com/widget?id=1104264295207944213&theme=dark" width="400" height="500" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>

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
    <script src="assets/bootstrap/js/search.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>