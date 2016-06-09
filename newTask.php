<?PHP

	/*Insert New task*/

	require_once __DIR__.'/Connection.php';

	/*Input all data*/
     
     function newTask($idUser, $task, $description, $deadline, $tags){

        $worktag = 0;
        $schooltag = 0;
        $familytag = 0;
        $personaltag = 0;
        $usertag = "";
        $notag = 0;
        // tags
        list($worktag, $schooltag, $familytag, $personaltag, $usertag) = explode(":", $tags);

        echo $worktag;
        echo $schooltag;
        echo $familytag;
        echo $personaltag;
        echo $usertag;


        /*get connection from database*/
        $connect = new DBConnection();
        $connect = $connect->getInstance();

        if(empty($worktag) == true || empty($schooltag) == true || empty($familytag) == true || empty($personaltag) == true || empty($usertag) == true){
            $notag = 0;

              /*prepared statement*/
            $stmt = $connect->prepare(" INSERT INTO `task`(`isUser`, `task`, `description`, `deadline`, `worktag`, `schooltag`, `familytag`, `personaltag`, `notag`, `usertag` ) VALUES (?,?,?,?, ?, ?, ?, ?, ?,?)");
            $stmt->bind_param("isssiiiiis", $idUser, $task, $description, $deadline, $worktag ,$schooltag,$familytag,$personaltag,$notag, $usertag);
          }
        else{
              /*prepared statement*/
            $stmt = $connect->prepare(" INSERT INTO `task`(`isUser`, `task`, `description`, `deadline`) VALUES (?,?,?,?)");
            $stmt->bind_param("isss", $idUser, $task, $description, $deadline);
        }
      


         if($stmt->execute() == TRUE) {
        	$taskID = $connect->insert_id;
         	echo $taskID;
    	} else {
    		echo $connect->error;
    	}

        $stmt->close();
        $connect->close();  
    }

     // set parameters and execute
     $idUser = $_POST["isUser"];
     $task = $_POST["task"];
     $description = $_POST["description"];
     $dealine = $_POST["deadline"];
     $tags = $_POST["tags"];

    if(isSet($idPost) ==  TRUE)
    {
        newTask($idUser, $task, $description, $deadline, $tags);
    }
?>