<html>
<head>
<title>PETH</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<?php
if(isset($_POST['submit'])) 
{ 
    $name = $_POST['name'];
    echo "User Has submitted the form and entered this name : <b> $name </b>";
    echo "<br>You can use the following form again to enter a new name."; 
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   <input type="text" name="name"><br>
   <input type="submit" name="submit" value="Submit Form"><br>
</form>

<?php 

// $hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';

$password = '123456';
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo $password;
echo "<br>";
echo $hashed_password;

// $passw = '$2y$10$fld.GRiuMf59kkMGkeloMuaQ61yy.BCBLy8JegZN7akBeGmH.YuP.';

// if(password_verify($password, $passw)) {
//     echo 'Password is valid!';
// } else {
//     echo 'Invalid password.';
// }
?>

</body>
</html>