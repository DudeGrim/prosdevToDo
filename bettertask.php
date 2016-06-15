    <link href="task_stylesheet.css" rel="stylesheet" media="screen">
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
                    <li class="list_shopping li_num_0_1">
                        <div class="col_md_1_list">
                            <p>SHOPPIGN</p>
                        </div>
                        <div class="col_md_2_list">
                            <h4>BUY COFFEE BEANS</h4>
                            <p>DODIDONE COFFEE STORE</p>
                        </div>
                        <div class="col_md_3_list">
                            <div class="cont_text_date">
                                <p>TODAY</p>
                            </div>
                            <div class="cont_btns_options">
                                <ul>
                                    <li><a href="#" onclick="finish_action('0','0_1');"><i class="material-icons">&#xE5CA;</i></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>


                <!--   End cont_todo_list_top  -->
            </div>


            <!--   End cont_central  -->
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> 
    <script >
        function callAdd(){
            add_to_list();

            console.log("hai");
            var category = document.querySelector('#action_select').value
            , description = document.querySelector('.input_description').value
            , title = document.querySelector('.input_title_desc').value
            , date = document.getElementById('date_select').value;

            jQuery.ajax({
                type: "POST",
                url: '../PHP/newTask.php',
                data: {functionname: 'add_new_task', arguments: [category, description, title, date]}, 
                 success:function(data) {
                    alert(data); 
                 }
            });

        }
    </script>
    <script src="task-script.js"></script>