<?php

include 'config.php';

if(isset($_POST['register']) && isset($_POST['username']) && isset($_POST['password']))
{
	$username = htmlentities($_POST['username'], ENT_QUOTES);
	$password = htmlentities($_POST['password'], ENT_QUOTES);
	
	$exists_sql = "SELECT * FROM users WHERE username = '" . $username . "'";
	$exists_res = $conn->query($exists_sql);
	
	if($exists_res->num_rows > 0) die('Utilizatorul exista deja!');
	
	$admin = 0;
	if(isset($_POST['admin']) && ($_POST['admin'] == 'true' || $_POST['admin'] == '1')) $admin = 1;
	if(isset($_POST['isadmin']) && ($_POST['isadmin'] == 'true' || $_POST['isadmin'] == '1')) $admin = 1;
	if(isset($_POST['administrator']) && ($_POST['administrator'] == 'true' || $_POST['administrator'] == '1')) $admin = 1;
	
	$sql = "INSERT INTO users(username, password, admin) VALUES('" . $username . "', '" . $password . "', " . $admin . ")";
    
	$results = $conn->query($sql);
    
	if($results) print 'Inregistrare cu succes!';
	else print 'Eroare la inregistrare';

}
else
{
    
?>

Inregistrare <br /><br />

<form method="post" action="register.php">
Username: <input type="text" name="username" /><br />
Password: <input type="password" name="password" /><br />
<input type="submit" name="register" value="Inregistrare" />
</form>

<?php

}

?>
