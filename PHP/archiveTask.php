<?PHP
	/*Update active column of a task to 0*/

	require_once __DIR__.'/Connection.php';

    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message
    if (isset($_POST['functionname'])) {
        // set parameters and execute   
        $id = $_POST['task_id'];

        if(isset($id) == TRUE){
            updateActive($id);
        }
        else{
             $error = "All fields are required!";
        }
    }
    function updateActive($id){
    	/*get connection from database*/
	    $connect = new DBConnection();
	    $connect = $connect->getInstance();


	    $sql = "UPDATE `task` SET `active`= 0 WHERE `idTask` = $id";

		if ($connect->query($sql) === TRUE) {
		    echo "Task updated successfully";
		} else {
		    echo "Error updating record: " . $connect->error;
		}
		$connect->close();
    }    
?>


