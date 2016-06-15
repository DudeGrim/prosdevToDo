<?PHP

	/*get all posts of a user*/
	require_once __DIR__.'/Connection.php';


    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message
    if (isset($_SESSION["iduser"])) {

         // set parameters and execute
        $idUser = $_SESSION["iduser"];
        getTasks($idUser);
    }

    function getTasks($id){
	/*get connection from database*/
    $connect = new DBConnection();
    $connect = $connect->getInstance();

	// sql to delete a record
	$sql = "SELECT * FROM `task` WHERE `iduser` = '$id' and `active` = 1";

    $result = $connect->query($sql);

        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {     
              
            	  $arr[] = array('idTask' => $row['idTask'], 
            				     'idUser' => $row['idUser'],
        				         'task' => $row['task'],
                                 'description' => $row['description'],
                                 'deadline' => $row['deadline'],
                                 'worktag' => $row['worktag'], 
                                 'schooltag' => $row['schooltag'],
                                 'familytag' => $row['familytag'],
                                 'personaltag' => $row['personaltag'],
                                 'notag' => $row['notag'],
                                 'usertag' => $row['usertag']);             
            }
          echo json_encode($arr);
        }
        else {
            echo 'No Tasks found';
        }
        
        $connect->close();
    }
?>