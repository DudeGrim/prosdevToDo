<?php
    /*client calls this*/
    /*new user's are inserted here*/

    require_once __DIR__.'/Connection.php';

    $error=''; // Variable To Store Error Message
    if (isset($_POST['register'])) {
         // set parameters and execute
         $name = $_POST["name"];
         $email = $_POST["email"];
         $password = $_POST["pass"];
         $passwordConfirm = $_POST["passconfirm"];

        if(isset($name) == TRUE && isset($email) == TRUE && isset($password) == TRUE && isset($passwordConfirm) == TRUE){
            if(strcmp($password,$passwordConfirm)==0){
                register($name, $email, $password);
            }
            else{
             $error = "Confirm password again!";
             echo $error;
            }
            
         }
        else{
             $error = "ALL fields required!";
             echo $error;
        }
         
    }

    function register($name, $email, $password){

        /*get connection from database*/
        $connect = new DBConnection();
        $connect = $connect->getInstance();

        /*prepared statement*/
        $stmt = $connect->prepare("INSERT INTO `user`(`name`, `email`, `password`) VALUES (?,?,?)");


        $stmt->bind_param("sss", $name, $email, $password);         

         if($stmt->execute() == TRUE) {

            $userID = $connect->insert_id;

            //echo "New user added successfully";
            /*return userID*/
            $_SESSION['iduser']=$userID; // Initializing Session

            header("location: task.php"); // Redirecting To Other Page
        } else {
            echo $connect->error;
        }

        $stmt->close();
        $connect->close();

    }
       
?>