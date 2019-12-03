<?php
session_start();
error_reporting(E_ALL & ~ E_NOTICE);
require ('textlocal.class.php');

class Controller
{
    function __construct() {
        $this->processMobileVerification();
    }
    function processMobileVerification()
    {
        switch ($_POST["action"]) {
            case "send_otp":
                
               echo $stid = $_POST['stid'];

                $conn=mysqli_connect("localhost","root","","online_exam_db");

                $que="SELECT * FROM student WHERE ST_ID='$stid'";
                $result=mysqli_query($conn,$que);
                $array=mysqli_fetch_array($result);

                $mobile_number=$array['CONT_NO'];
				$mobile_number;
                $username = "sayansadhukhan62@gmail.com";
                $hash = "113f2e972cab60e05ebbcb5a306a8d40ef4279dad78ba60a0851adcba04248c0";
				// Config variables. Consult http://api.textlocal.in/docs for more info.
				$test = "0";

				// Data for text message. This is the text message data.
				$sender = "TXTLCL"; // This is who the message appears to be from.
				$numbers = "91".$mobile_number; // A single number or a comma-seperated list of numbers
				$otp = rand(100000, 999999);
                $_SESSION['session_otp'] = $otp;
                $message = "Your One Time Password is " . $otp;
                
                try{
                    $message = urlencode($message);
					$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
					$ch = curl_init('http://api.textlocal.in/send/?');
					curl_setopt($ch, CURLOPT_POST, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$result = curl_exec($ch); // This is the result from the API
					curl_close($ch);
                    require_once ("verification-form.php");
                    exit();
                }catch(Exception $e){
                    die('Error: '.$e->getMessage());
                }
                break;
                
            case "verify_otp":
                $otp = $_POST['otp'];
                
                if ($otp == $_SESSION['session_otp']) {
                    unset($_SESSION['session_otp']);
                    echo json_encode(array("type"=>"success", "message"=>"Your mobile number is verified!"));
                } else {
                    echo json_encode(array("type"=>"error", "message"=>"Mobile number verification failed"));
                }
                break;
        }
    }
}
$controller = new Controller();
?>