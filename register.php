<?php
	/*client calls this*/
	/*new user's are inserted here*/

	require_once __DIR__.'/Connection.php';

    function register($name, $email, $password){

    	/*get connection from database*/
        $connect = new DBConnection();
        $connect = $connect->getInstance();

        /*prepared statement*/
        $stmt = $connect->prepare("INSERT INTO `user`(`name`, `email`, `password`) VALUES (?,?,?)");


        $stmt->bind_param("sss", $name, $email, $password);         

         if($stmt->execute() == TRUE) {

        	$uID = $connect->insert_id;

         //echo "New user added successfully";
         	/*return userID*/
         	$arr = array('userID' => $uID);
         	echo json_encode($arr);
    	} else {
    		echo $connect->error;
    	}

        $stmt->close();
        $connect->close();

    }
        // set parameters and execute
         $name = $_POST["name"];
         $email = $_POST["email"];
         $password = $_POST["pass"];
         //$pictureFile = "uploads/profPic".$idUser; 

         if(isset($name) == TRUE && isset($email) == TRUE && isset($password) == TRUE){
            register($name, $email, $password);
         }
?>