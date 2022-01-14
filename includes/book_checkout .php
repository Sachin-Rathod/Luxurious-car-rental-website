<?php 
session_start();
$name = $_POST['fullname'];
$email = $_POST['email'];
$aadhar = $_POST['aadhar'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zip'];
$date = $_POST['date'];
$time = $_POST['time'];
$card_name = $_POST['cardname'];
$card_no = $_POST['cardnumber'];
$exp_month = $_POST['expmonth'];
$exp_year = $_POST['expyear'];
$cvv = $_POST['cvv'];
$status=0;

if(!empty($name) || !empty($email) || !empty($aadhar) || !empty($address) || !empty(city) || !empty($state) || !empty(zipcode) || !empty($date) || !empty($time) || !empty($card_name) || !empty($card-no) || !empty($exp_month) || !empty($exp_year) || !empty($cvv)){
    $host = 'localhost';
    $dbuser = 'root';
    $pass = '';
    $dbname = 'carrental';
    
    $dbh = new mysqli($host, $dbuser, $pass, $dbname);
    
    if(mysqli_connect_error()){
        die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    
    else{
    
        $select = "SELECT Date, Time FROM booking WHERE Date = ?, Time = ? Limit = 1";
        $insert="INSERT INTO booking(Name, Email, Aadhar, Address, City, State, Zipcode, Date, Time, Card_Name, Card_no, Exp_Month, Exp_Year, Status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";


            $query = $dbh->prepare($insert);
            $query->bind_param('ssisssisssisii', $name, $email, $aadhar, $address, $city, $state, $zipcode, $date, $time, $card_name, $card_no, $exp_month, $exp_year, $status);
            $query->execute();
            echo"<script>alert('Booking Successfull')</script>";
            echo"<script>location.replace('../index.php')</script>";
    }
}
else{
    echo"All Fields are required";
    die();
}
?>