<?php

session_start();

include 'config.php';

if(isset($_POST['login']))
{
	$username = htmlentities($_POST['username'], ENT_QUOTES);
	$password = htmlentities($_POST['password'], ENT_QUOTES);
	
	$sql = "SELECT * FROM users WHERE username = '" . $username . "' AND password='" . $password . "'";
    
	$results = $conn->query($sql);
    
	if($results->num_rows == 1)
	{
		$data = mysqli_fetch_array($results, MYSQLI_ASSOC);
		if($data['admin'] == '1') print 'Felicitari, esti admin. Ia un steag: ' . $flag;
		else print 'Login cu succes dar nu esti admin :(';
	}
	else print 'Login fara prea mult succes!';
}
else
{

?>

Login <br />
<form method="post" action="login.php">
Username: <input type="text" name="username" /><br />
Password: <input type="password" name="password" /><br />
<input type="submit" name="login" value="Login" />
</form>

<?php

}

?>
