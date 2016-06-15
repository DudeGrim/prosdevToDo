<?php
    include('../PHP/newTask.php'); // Includes Add new task Script
	$iduser=$_SESSION['iduser'];
?>
    <html>

    <head>
        <title>Ready to add task?</title>
        <link href="../CSS/task_stylesheet.css" rel="stylesheet" media="screen">
    
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> 
        <script >   
        function callAdd(){
            
            var category = document.querySelector('#action_select').value
            , description = document.querySelector('.input_description').value
            , title = document.querySelector('.input_title_desc').value
            , date = document.getElementById('date_select').value;

            jQuery.ajax({
                type: "POST",
                url: '../PHP/newTask.php',
                data: {functionname: 'add_new_task', arguments: [category, description, title, date]}, 
                 success:function(data) {
                    console.log("new task added"); 
                    console.log("task id" + data);
                    add_to_list(data);
                 }
            });

        }
    </script>
    <script src="../JS/task-script.js"></script>
        <script>
         $( window ).load(function() {
            jQuery.ajax({
                type: "POST",
                url: '../PHP/readAllUserTask.php',
                data: {functionname: 'loadTasks'}, 
                 success:function(data) {
                    console.log(data); 

                    try {
                        var arr = jQuery.parseJSON( data );

                         for(var i in arr)
                         {
                             var idtask = arr[i].idTask;
                             var task = arr[i].task;
                             var description = arr[i].description;
                             var deadline = arr[i].deadline;
                             var worktag = arr[i].worktag;
                             var schooltag = arr[i].schooltag;
                             var personaltag = arr[i].personaltag;
                             var familytag = arr[i].familytag;
                             var notag = arr[i].notag;
                             var usertag = arr[i].usertag;

                             console.log(idtask  + task + description + deadline + worktag+ schooltag+personaltag+familytag+notag+usertag);

                             if(notag == 1){
                                loadList(idtask, task, description, deadline, "DEFAULT");
                             }
                             else if(worktag == 1){
                                loadList(idtask, task, description, deadline, "WORK");
                             }
                             else if(schooltag == 1){
                                loadList(idtask, task, description, deadline, "SCHOOL");
                             }
                             else if(personaltag == 1){
                                loadList(idtask, task, description, deadline, "PERSONAL");
                             }
                             else if(familytag == 1){
                                loadList(idtask, task, description, deadline, "FAMILY");
                             }
                        }
                    } catch (e) {
                        console.log("add new tasks");
                    }
                   
                }
            });
        });
        </script>
    </head>

    <body>
        <a href='logout.php'>Click here to log out</a>
        <b id="welcome">Welcome : <i><?php echo $iduser; ?></i></b>
        <h1>Start adding task!</h1>
        <div class="cont_principal">
            <div class="cont_centrar">

                <div class="cont_todo_list_top">
                    <div class="cont_titulo_cont">
                        <h3>THINGS TO DO</h3>
                    </div>
                    <div class="cont_add_titulo_cont"><a href="#e" onclick="add_new()"><i class="material-icons">&#xE145;</i></a>
                    </div>

                    <!--   End cont_todo_list_top  -->
                </div>
                <div class="cont_crear_new">
                    <!--<form action="" method="post">-->
                        <table class="table">
                            <tr>
                                <th>Action</th>
                                <th>Title</th>
                                <th>Date</th>
                            </tr>
                            <tr>
                                <td>
                                    <select name="categories" id="action_select">
                                        <option value="DEFAULT">DEFAULT</option>
                                        <option value="WORK">WORK</option>
                                        <option value="FAMILY">FAMILY</option>
                                        <option value="SCHOOL">SCHOOL</option>
                                        <option value="PERSONAL">PERSONAL</option>
                                    </select>
                                    <!-- End td 1 -->
                                </td>
                                <td>
                                    <input name="task" type="text" class="input_title_desc" />

                                    <!-- End td 2 -->
                                </td>
                                <td>
                                    <input name="date" type="date" id="date_select">
                                    <br>
                                    <!-- End td 3 -->
                                </td>
                            </tr>
                            <tr>
                                <th class="titl_description">Description</th>
                            </tr>
                            <tr>

                                <td colspan="3">
                                    <input name="description" type="text" class="input_description" required />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button name="add_new_task" class="btn_add_fin" onclick="callAdd()">ADD</button>
                                </td>
                            </tr>
                        </table>
                    <!--</form>-->
                    <!--   End cont_crear_new  -->
                </div>


                <div class="cont_princ_lists">
                    <ul>
                    </ul>
                    <!--   End cont_todo_list_top  -->
                </div>


                <!--   End cont_central  -->
            </div>
        </div>
        <?php getTasks($iduser)?>
           

    </body>
    </html>