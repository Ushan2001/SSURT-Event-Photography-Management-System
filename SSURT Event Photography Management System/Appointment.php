<?php
session_start();
include "connect.php";

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $plantype = $_POST['plantype'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $country = $_POST['country'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];

    $sql1 = "INSERT INTO appointment(Fullname, Phonenumber, Email, Plantype, Date, Time, Country, Province, City, Postcode) VALUES ('$username', '$mobile', '$email', '$plantype', '$date', '$time', '$country', '$province', '$city', '$postcode')";
    $result = mysqli_query($connect, $sql1);
//check the if condtion 
    if($result) {
        $sql2 = "SELECT * FROM appointment WHERE Fullname = '$username'";
        $result2 = mysqli_query($connect, $sql2);
        $row = mysqli_fetch_assoc($result2);

        $id = $row['appointmentID'];
        $username = $row['Fullname'];
        $mobile = $row['Phonenumber'];
        $email = $row['Email'];
        $plantype = $row['Plantype'];
        $date = $row['Date'];
        $time = $row['Time'];
        $country = $row['Country'];
        $province = $row['Province'];
        $city = $row['City'];
        $postcode = $row['Postcode'];

        // Create sessions
        $_SESSION['appointmentID'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['mobile'] = $mobile;
        $_SESSION['email'] = $email;
        $_SESSION['plantype'] = $plantype;
        $_SESSION['date'] = $date;
        $_SESSION['time'] = $time;
        $_SESSION['country'] = $country;
        $_SESSION['province'] = $province;
        $_SESSION['city'] = $city;
        $_SESSION['postcode'] = $postcode;

        // Redirect to appointment page
        header('Location:http://localhost/SSURT%20Event%20Photography%20Management%20System/dashboard.php');
        exit;
    }
    else {
        echo "Error: " . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html>
<head>
    <title>appointment</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>
    <img src="image/SSURT.png" id="m1">
    <br> <br> 
    <img src="image/log.png" id="m2">

    <br> 
    <div id="container">
        <nav>
            <ul>
                <li><a href="#">HOME</a></li>
                <li>
                    <a href="#">GALLERY</a>
                </li>
                <li>
                    <a href="http://localhost/SSURT%20Event%20Photography%20Management%20System/plans.php" target="_blank" >PLANS</a>
                    <ul>
                        <li><a href="http://localhost/SSURT%20Event%20Photography%20Management%20System/wedding.php" target="_blank" >WEDDING PLANS</a></li>
                        <li><a href="http://localhost/SSURT%20Event%20Photography%20Management%20System/party.php" target="_blank">PARTY PLANS</a></li>
                        <li><a href="http://localhost/SSURT%20Event%20Photography%20Management%20System/spectial.php" target="_blank">SPECIAL OCCATION</a></li>
                    </ul>
                </li>
                <li class="sign"><a class="sign" href="#">SIGNIN</a></li>
                <li class="sign"><a class="sign" href="#">SIGNUP</a></li>
            </ul>
        </nav>
    </div>

    <fieldset style="width: 700px; background-color: #f2f2f2;">
        <legend style="text-align:center"><b>Appointment Details</b></legend>
        <div class="formbold-main-wrapper">
            <div class="formbold-form-wrapper">
                <form action="appointment.php" method="POST">
                    <div class="formbold-mb-5">
                        <label for="name" class="formbold-form-label">Full Name</label>
                        <input type="text" name="username" id="name" placeholder="Full Name" class="formbold-form-input" />
                    </div>
                    <div class="formbold-mb-5">
                        <label for="phone" class="formbold-form-label">Phone Number</label>
                        <input type="text" name="mobile" id="phone" placeholder="Enter your phone number" class="formbold-form-input" />
                    </div>
                    <div class="formbold-mb-5">
                        <label for="email" class="formbold-form-label">Email Address</label>
                        <input type="text" name="email" id="email" placeholder="Enter your email" class="formbold-form-input" />
                    </div>
                    <div class="formbold-mb-5">
                        <label for="name" class="formbold-form-label">Plan Type</label>
                        <input type="text" name="plantype" id="name" placeholder="Plan Type" class="formbold-form-input" />
                    </div>
                    <div class="flex flex-wrap formbold--mx-3">
                        <div class="w-full sm:w-half formbold-px-3">
                            <div class="formbold-mb-5 w-full">
                                <label for="date" class="formbold-form-label">Date</label>
                                <input type="date" name="date" id="date" class="formbold-form-input" />
                            </div>
                        </div>
                        <div class="w-full sm:w-half formbold-px-3">
                            <div class="formbold-mb-5">
                                <label for="time" class="formbold-form-label">Time</label>
                                <input type="time" name="time" id="time" class="formbold-form-input" />
                            </div>
                        </div>
                    </div>
                    <div class="formbold-mb-5 formbold-pt-3">
                        <label class="formbold-form-label formbold-form-label-2">Address Details</label>
                        <div class="flex flex-wrap formbold--mx-3">
                            <div class="w-full sm:w-half formbold-px-3">
                                <div class="formbold-mb-5">
                                    <input type="text" name="country" id="area" placeholder="Enter Country" class="formbold-form-input" />
                                </div>
                            </div>
                            <div class="w-full sm:w-half formbold-px-3">
                                <div class="formbold-mb-5">
                                    <input type="text" name="province" id="area" placeholder="Enter Province" class="formbold-form-input" />
                                </div>
                            </div>
                            <div class="w-full sm:w-half formbold-px-3">
                                <div class="formbold-mb-5">
                                    <input type="text" name="city" id="area" placeholder="Enter City" class="formbold-form-input" />
                                </div>
                            </div>
                            <div class="w-full sm:w-half formbold-px-3">
                                <div class="formbold-mb-5">
                                    <input type="text" name="postcode" id="area" placeholder="Enter Postcode" class="formbold-form-input" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center formbold-my-10">
                        <button type="submit" name="submit" class="formbold-btn formbold-btn-primary formbold-btn-lg">Submit</button>
                    </div>
                </form>
            </div>
        </div> 
    </fieldset>
</body>
</html>

