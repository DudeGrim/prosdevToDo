<?PHP

  /*Insert New task*/

  require_once __DIR__.'/Connection.php';

    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message
    if (isset($_POST['functionname'])) {

         // set parameters and execute
        $idUser = $_SESSION["iduser"];
        $task = $_POST['arguments'][2];
        $description = $_POST['arguments'][1];
        $date = $_POST['arguments'][3];
        $category = $_POST['arguments'][0];

        if(isset($task) == TRUE && isset($description) == TRUE && isset($date) == TRUE && isset($category) == TRUE){
            newTask($idUser, $task, $description, $date, $category);
        }
        else{
             $error = "All fields are required!";
        }
    }
  /*Input all data*/
     
     function newTask($idUser, $task, $description, $deadline, $category){

        $worktag = 0;
        $schooltag = 0;
        $familytag = 0;
        $personaltag = 0;
        $usertag = "";
        $notag = 0;
         
     
        switch ($category) {
          case 'DEFAULT':
            $notag = 1;
            break;
          case 'WORK':
            $worktag = 1;
            break;
          case 'FAMILY':
            $familytag = 1;
            break;
          case 'SCHOOL':
            $schooltag = 1;
            break;
          case 'PERSONAL':
            $personaltag = 1;
            break;
          default:
            # code...
            break;
        }
        /*get connection from database*/
        $connect = new DBConnection();
        $connect = $connect->getInstance();

        if($notag == 0){
            /*prepared statement*/
            $stmt = $connect->prepare(" INSERT INTO `task`(`iduser`, `task`, `description`, `deadline`, `worktag`, `schooltag`, `familytag`, `personaltag`, `notag`, `usertag` ) VALUES (?,?,?,?, ?, ?, ?, ?, ?,?)");
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
            $stmt = $connect->prepare(" INSERT INTO `task`(`iduser`, `task`, `description`, `deadline`, `usertag` ) VALUES (?,?,?,?,?)");
            $stmt->bind_param("issss", $idUser, $task, $description, $deadline, $usertag);
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