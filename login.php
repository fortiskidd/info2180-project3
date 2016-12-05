<?php
    //session_start();

	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	//$con = false;
	$con=mysql_connect("127.0.0.1:3306","bobbyv","");
	$db = mysql_select_db("cheapomail",$con);
	if (!$con) 
	{
		echo "Connection failed";
		echo mysql_error();
		
	}
	else{
	    //Redirects the user on Successfull login
	    echo "Printing to confirm the connection to the database";
	    
	}

	
   
    $sql = "SELECT * FROM user WHERE username = '$username' and password = '$password';";
    $results= mysql_query($sql);
    if (mysql_num_rows($results)==0)
    {
    	// sends something to javascript if it fails
    	echo "fail";
    }
    else
    {
    	// ends something to javascript if it succeeds
    	//session_start();
    	//$_SESSION['username']=$username;
    	setcookie('username',$username,time()+2000);
    	echo "pass";
    	header('Location: homepage.html');
    }

?>
