<?php
include 'connect.php';
session_start();
?>

<?php
if (isset($_SESSION['appointmentid'])) {
    $id = $_SESSION['appointmentid'];
    $sql2 = "SELECT * FROM appointment WHERE appointmentID = '$id';";
    $result3 = mysqli_query($connect, $sql2);

    if ($result3) {
        $row = mysqli_fetch_assoc($result3);

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
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <img src="image/SSURT.png" id="m1">
    <br><br>
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
                    <a href="http://localhost/IWT%20my%20project/plans.php">PLANS</a>
                    <ul>
                        <li><a href="http://localhost/IWT%20my%20project/wedding.php">WEDDING PLANS</a></li>
                        <li><a href="http://localhost/IWT%20my%20project/party.php">PARTY PLANS</a></li>
                        <li><a href="http://localhost/IWT%20my%20project/special.php">SPECIAL OCCASION</a></li>
                    </ul>
                </li>
                <li class="sign"><a class="sign" href="#">SIGNIN</a></li>
                <li class="sign"><a class="sign" href="#">SIGNUP</a></li>
            </ul>
        </nav>
    </div>

    <fieldset style="width: 700px; background-color: #f2f2f2;">
        <legend style="text-align:center"><b>Appointment</b></legend>
        <div class="formbold-main-wrapper">
            <div class="formbold-form-wrapper">
                <form method="GET">
                    <div class="formbold-mb-5">
                        <label for="name" class="formbold-form-label"> Full Name </label>
                        <input type="text"
                               name="name"
                               id="name"
                               placeholder ="Fullname"
                               class="formbold-form-input"
                               value="<?php if (isset($username)) { echo $username; } ?>" disabled />
                    </div>
                    <div class="formbold-mb-5">
                        <label for="phone" class="formbold-form-label"> Phone Number </label>
                        <input type="text"
                               name="phone"
                               id="phone"
                               placeholder="Enter your phone number"
                               class="formbold-form-input"
                               value="<?php if (isset($mobile)) { echo $mobile; } ?>" disabled />
                    </div>
                    <div class="formbold-mb-5">
                        <label for="email" class="formbold-form-label"> Email Address </label>
                        <input type="text"
                               name="email"
                               id="email"
                               placeholder="Enter your email"
                               class="formbold-form-input"
                               value="<?php if (isset($email)) { echo $email; } ?>" disabled />
                    </div>
                    <div class="formbold-mb-5">
                        <label for="name" class="formbold-form-label"> Plan Type </label>
                        <input type="text"
                               name="plantype"
                               id="name"
                               placeholder="Plan Type"
                               class="formbold-form-input"
                               value="<?php if (isset($plantype)) { echo $plantype; } ?>" disabled />
                    </div>
                    <div class="flex flex-wrap formbold--mx-3">
                        <div class="w-full sm:w-half formbold-px-3">
                            <div class="formbold-mb-5 w-full">
                                <label for="date" class="formbold-form-label"> Date </label>
                                <input type="date"
                                       name="date"
                                       id="date"
                                       class="formbold-form-input"
                                       value="<?php if (isset($date)) { echo $date; } ?>" disabled />
                            </div>
                        </div>
                        <div class="w-full sm:w-half formbold-px-3">
                            <div class="formbold-mb-5">
                                <label for="time" class="formbold-form-label"> Time </label>
                                <input type="time"
                                       name="time"
                                       id="time"
                                       class="formbold-form-input"
                                       value="<?php if (isset($time)) { echo $time; } ?>" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="formbold-mb-5 formbold-pt-3">
                        <label class="formbold-form-label formbold-form-label-2">
                            Address Details
                        </label>
                        <div class="flex flex-wrap formbold--mx-3">
                            <div class="w-full sm:w-half formbold-px-3">
                                <div class="formbold-mb-5">
                                    <input type="text"
                                           name="country"
                                           id="area"
                                           placeholder="Enter Country"
                                           class="formbold-form-input"
                                           value="<?php if (isset($country)) { echo $country; } ?>" disabled />
                                </div>
                            </div>
                            <div class="w-full sm:w-half formbold-px-3">
                                <div class="formbold-mb-5">
                                    <input type="text"
                                           name="province"
                                           id="city"
                                           placeholder="Enter Province"
                                           class="formbold-form-input"
                                           value="<?php if (isset($province)) { echo $province; } ?>" disabled />
                                </div>
                            </div>
                            <div class="w-full sm:w-half formbold-px-3">
                                <div class="formbold-mb-5">
                                    <input type="text"
                                           name="city"
                                           id="state"
                                           placeholder="Enter City"
                                           class="formbold-form-input"
                                           value="<?php if (isset($city)) { echo $city; } ?>" disabled />
                                </div>
                            </div>
                            <div class="w-full sm:w-half formbold-px-3">
                                <div class="formbold-mb-5">
                                    <input type="text"
                                           name="postcode"
                                           id="post-code"
                                           placeholder="Post Code"
                                           class="formbold-form-input"
                                           value="<?php if (isset($postcode)) { echo $postcode; } ?>" disable />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</fieldset>
<br>
<br>
<center>
    <label for="delete" class="formbold-form-label"> <b>If you want to cancel this appointment please click the button below</b> </label>
    <input type="submit" class="del1" value="DELETE" name="delete">
</center>
<br />

<footer>
    <div class="footer">
        <button id="about">About us</button>
        <b id="contact">Contact us<b>
                <br>
                <div id="icon">
                    <i id="face" class="fa fa-facebook"></i>
                    <i id="what" class="fa fa-whatsapp"></i>
                    <i id="insta" class="fa fa-instagram"></i>
                </div>
    </div>
</footer>

</body>
</html>


<?php
if (isset($_POST['delete'])) {
    $id = $_SESSION['appointmentid'];

    $deletesql = "DELETE FROM register WHERE appointmentID = $id;";
    $delete = mysqli_query($connect, $deletesql);
    session_destroy();
    header("location:dashboard.php");
}

mysqli_close($connect);
?>
