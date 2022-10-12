<?php                     
    if (isset($_POST["register"])) {
        $connection = new mysqli("localhost", "root", "", "jquery");

		$nama = $connection->real_escape_string($_POST["nama"]);  						
		$email = $connection->real_escape_string($_POST["email"]);  
		$password = sha1($connection->real_escape_string($_POST["pass"])); 
			
		$data = $connection->query("INSERT INTO userr (nama, email, pass) VALUES ('$nama', '$email', '$password')");

    	if ($data === false)
        	echo "Connection error!";
    	else
    	   echo "Your have been signed up - please now Log In";
	}	                 
?>
<html>
    <body>
        <form method="post" action="register.php">      
            <input type="text" name="nama" placeholder="Your Username"  />                
            <input type="email" name="email" placeholder="Your Email"  />
            <input type="password" name="pass" placeholder="Password"  />
            <input type="submit" name="register" value="Register" />                   
        </form>
    </body>
</html>