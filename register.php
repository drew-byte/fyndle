<?php

session_start();

include "connection.php";
include "functions.php";

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

<?php

if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $number = $_POST['number'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $status = "Active now";

    $sql1 = "INSERT INTO `accounts`(id, image,firstName, lastName, number , gender ,email, password, address, city, country,status) VALUES (NULL,'$image','$firstName','$lastName','$number','$gender','$email','$password','$address','$city','$country','$status')";

    $result = mysqli_query($conn, $sql1);

    header("Location: login.php");
}
?>

<body class="bg-gradient-primary">
    <div class="container " style="margin-top:100px;">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0 signup">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;assets/fyndleLogo.png&quot;);"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Create an Account!</h4>
                            </div>
                            <form method="post">
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" placeholder="First Name" name="firstName"></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" placeholder="Last Name" name="lastName"></div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" placeholder="Mobile Number" name="number"></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" placeholder="Gender" name="gender"></div>
                                </div>
                                <div class="mb-3"><input class="form-control form-control-user" type="text" placeholder="Address" name="address"></div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" placeholder="City" name="city"></div>
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" placeholder="Country" name="country"></div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="email" placeholder="Email Address" name="email"></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="password" placeholder="Password" name="password"></div>
                                </div>
                                <div class="buttonSignup">
                                    <button class="btn btn-primary d-block btn-user w-100" type="submit" name="submit">Register Account</button>
                                </div>
                                <hr>
                                <div class="text-center"><a class="small" href="login.php">Already have an account? Login!</a></div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/bootstrap/js/ajaxregister.js"></script>
</body>

</html>