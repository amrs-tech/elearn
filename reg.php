<?php
$f = $u = $email = $phone = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$f = $_POST["fullname"];
	$u = $_POST["username"];
	$email = $_POST["email"];
    $phone = $_POST["phone"];
}

?>

<?php
$serv = "localhost";
$user = "root";
$pass = "";
$db = "elearn";

$conn = new mysqli($serv,$user,$pass,$db);

if($conn->connect_error)
 echo "<br>Server Connection Problem... Try after Sometime !";
else
{
if(strlen($f)!=0 and strlen($u)!=0 and strlen($email)!=0 and strlen($phone)!=0){
$sql = "insert into reg values('$f','$u','$email','$phone')";
if($conn->query($sql) === TRUE){
 echo "<script>window.alert('Registered Successfully !')</script>";
 echo '<script>window.setTimeout(function(){

        window.location.href = "/elearn";

    }, 1500);</script>';
}
 
else{
 echo "<script>window.alert('Some Technical Problem !')</script>";
 echo '<script>window.setTimeout(function(){

        window.location.href = "/elearn/text.html";

    }, 1500);</script>';
   }
}
else {
	echo "<script>window.alert('Invalid Input !')</script>";
	echo '<script>window.setTimeout(function(){

        window.location.href = "/elearn/text.html";

    }, 1500);</script>';
}

}

$conn->close();
?>