<?php
$f = $u = $email = $phone = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
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
if(strlen($email)!=0 and strlen($phone)!=0){
$sql = "select email, phone from reg where email = '$email'";
$res = $conn->query($sql);
if($res->num_rows > 0)
{
while($res->fetch_assoc()){ 
echo "<br><br><pre><h3>                         Successfully logged in !            </h3></pre>";
echo "<script>window.setTimeout(function () {location.href = 'index.html';}, 2000);</script>";
}
}
else{
 echo "<br><br><pre><h3>                            Incorrect Email Id or Password !            </h3></pre>";
 echo "<script>window.setTimeout(function () {location.href = 'text.html';}, 2000);</script>";
 exit;
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