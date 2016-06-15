<?PHP

  /*Insert New task*/

  require_once __DIR__.'/Connection.php';

    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message
echo "im a little bitch!";
    if (isset($_POST['add_new_task'])) {

         // set parameters and execute
        $idUser = $_SESSION["iduser"];
        $task = $_POST["task"];
        $description = $_POST["description"];
        $date = $_POST["date"];
        $categories = $_POST["categories"];

        if(isset($task) == TRUE && isset($description) == TRUE && isset($date) == TRUE && isset($categories) == TRUE){
            newTask($idUser, $task, $description, $date, $categories);
        }
        else{
             $error = "All fields are required!";
        }
    }
  /*Input all data*/
     
     function newTask($idUser, $task, $description, $deadline, $tags){

        $worktag = 0;
        $schooltag = 0;
        $familytag = 0;
        $personaltag = 0;
        $usertag = "usertag";
        $notag = 0;
         
         /*
            // tags
            list($worktag, $schooltag, $familytag, $personaltag, $usertag) = explode(":", $tags);
        */
        echo $worktag;
        echo $schooltag;
        echo "family".$familytag;
        echo $personaltag;
        echo $usertag;


        /*get connection from database*/
        $connect = new DBConnection();
        $connect = $connect->getInstance();

        if(empty($worktag) == true || empty($schooltag) == true || empty($familytag) == true || empty($personaltag) == true || empty($usertag) == true){
            $notag = 0;

              /*prepared statement*/
            $stmt = $connect->prepare(" INSERT INTO `task`(`isUser`, `task`, `description`, `deadline`, `worktag`, `schooltag`, `familytag`, `personaltag`, `notag`, `usertag` ) VALUES (?,?,?,?, ?, ?, ?, ?, ?,?)");
            $stmt->bind_param("isssiiiiis", 
                              $idUser, 
                              $task, 
                              $description, 
                              $deadline, 
                              $worktag ,
                              $schooltag,
                              $familytag,
                              $personaltag,
                              $notag, 
                              $usertag);
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
?>