<?php
include_once('functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <!-- <meta charset="UTF-8"> -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encomage test task</title>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/f10727c711.js" crossorigin="anonymous"></script>
    <!-- Bootstrap 4.5.3 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body class="bg-dark">
    <div class="container bg-secondary mt-5">
        <!-- Header -->
        <div class="d-flex justify-content-between py-3">
            <span class="text-white font-weight-bold d-flex align-items-center">User list</span>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createEditUsersForm" data-whatever="addUser" style="border: 1px solid white;"><i class="fas fa-user-plus pr-2"></i>Add user</button>
        </div>
        <!-- Users grid -->
        <table class="table text-white">
            <thead>
                <tr class="bg-dark">
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Create Date</th>
                    <th scope="col">Update Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row with filters -->
                <form id="form_filters" name="form_filters" action="index.php" method="POST">
                    <tr class="mb-1 bg-dark">
                        <th scope="row"><input type="text" id="f_id" name="f_id" style="width:40px;"></th>
                        <td><input type="text" id="f_first_name" name="f_first_name" class="w-75"></td>
                        <td><input type=" text" id="f_last_name" name="f_last_name" class="w-75"></td>
                        <td><input type="text" id="f_email" name="f_email" class="w-75"></td>
                        <td style="border-top: 0px;">
                            <div class="d-flex justify-content-end ">
                                <label for="from_create_date" class="pr-1">From:</label>
                                <input type="date" id="from_create_date" name="from_create_date">
                            </div>
                            <div class="d-flex justify-content-end mb-1">
                                <label for="to_create_date" class="pr-1">To:</label>
                                <input type="date" id="to_create_date" name="to_create_date">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-end">
                                <label for="from_update_date" class="pr-1">From:</label>
                                <input type="date" id="from_update_date" name="from_update_date">
                            </div>
                            <div class="d-flex justify-content-end">
                                <label for=" to_update_date" class="pr-1">To:</label>
                                <input type="date" id="to_update_date" name="to_update_date">
                            </div>
                        </td>
                        <td class="d-flex flex-column justify-content-center" style="border-top: 0px;">
                            <button class="btn btn-secondary mb-1 text-nowrap" style="border: 1px solid white;" type="reset" name="Reset">Reset filters</button>
                            <button class="btn btn-info" type="submit" style="border: 1px solid white;" onclick="Process()"><i class="fas fa-search pr-2"></i>Search</button>
                        </td>
                    </tr>
                </form>
                <!-- Rows with users data -->
                <tr id="f_users">
                    <?php

                    if (isset($_POST['form_filters'])) {
                    } else {
                        getAllUsers();
                    }

                    ?>
                </tr>
            </tbody>
        </table>
        <!-- End .container -->
    </div>

    <!-- Modal window (create and edit users form)-->
    <div class="modal fade" id="createEditUsersForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createEditUsersFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createEditUsersFormLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="false">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <?php
                    if (!isset($_POST['btn_submit'])) {
                    ?>
                        <form action="index.php" method="post" id="form_users_data" name="form_users_data">
                            <div class="form-group">
                                <label for="first_name" class="col-form-label">First name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name">
                            </div>
                            <div class="form-group">
                                <label for="last_name" class="col-form-label">Last name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name">
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="btn_submit" name="btn_submit"></button>
                            </div>
                        </form>
                        <?php
                    } else {
                        if (addUser($_POST['first_name'], $_POST['last_name'], $_POST['email'])) {
                        ?>
                            <!-- <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header">
                                    <strong class="mr-auto">Successfull</strong>
                                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="toast-body">
                                    New user added!
                                </div>
                            </div> -->
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- JQuery & Bootstrap scripts-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Custom scripts -->
    <script type="text/javascript">
        $('#createEditUsersForm').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-whatever attributes

            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).

            // Update the modal's content.

            var modal = $(this)

            // Show form for add user
            if (recipient == "addUser") {
                modal.find('.modal-title').text('Add new user')
                modal.find('#btn_submit').text('Add user')
                document.forms['form_users_data'].action = "addUser.php"

                // Show form for edit user
            } else if (recipient == "editUser") {
                modal.find('.modal-title').text('Edit user')
                modal.find('#btn_submit').text('Edit user')
                document.forms['form_users_data'].action = "editUser.php"

                // $user = getUserById();
                // modal.find('#first_name').val($user['first_name'])
                // modal.find('#last_name').val($user['last_name'])
                // modal.find('#email').val($user['email'])
            }
        })
    </script>


    <!-- AJAX script -->
    <script type="text/javascript" src="ajax.js"></script>

    <!-- AJAX for filtering -->
    <script>
        // function filterUsers() {
        //     var id = document.getElementById('f_id').value;
        //     var first_name = document.getElementById('f_first_name').value;
        //     var last_name = document.getElementById('f_last_name').value;
        //     var email = document.getElementById('f_email').value;
        //     var from_create_date = document.getElementById('from_create_date').value;
        //     var to_create_date = document.getElementById('to_create_date').value;
        //     var from_update_date = document.getElementById('from_update_date').value;
        //     var to_update_date = document.getElementById('to_update_date').value;
        // if (id == "") {
        //     id = "*";

        // }
        // if (first_name == "") {
        //     first_name = "*";

        // }
        // if (last_name == "") {
        //     last_name = "*";

        // }
        // if (email == "") {
        //     email = "*";

        // }
        // if (from_create_date == "") {
        //     from_create_date = "*";

        // }
        // if (to_create_date == "") {
        //     to_create_date = "*";

        // }
        // if (from_update_date == "") {
        //     from_update_date = "*";

        // }
        // if (to_update_date == "") {
        //     to_update_date = "*";

        // }

        //     var xhttp;
        //     xhttp = new XMLHttpRequest();
        //     xhttp.onreadystatechange = function() {
        //         if (this.readyState == 4 && this.status == 200) {
        //             document.getElementById("users").innerHTML = this.responseText;
        //         }
        //     };
        //     xhttp.open("GET", "filter.php?id=" + id +
        //         "first_name" + first_name +
        //         "last_name" + last_name +
        //         "email" + email +
        //         "from_create_date" + from_create_date +
        //         "to_create_date" + to_create_date +
        //         "from_update_date" + from_update_date +
        //         "to_update_date" + to_update_date, true);
        //     xhttp.send();
        // }
    </script>
</body>

</html>