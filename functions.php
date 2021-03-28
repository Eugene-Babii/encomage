<?php
function connect(
    $dbHost = 'localhost',
    $dbName = 'test_encomage_db',
    $dbUser = 'root',
    $dbPass = 'root'
) {
    $db = mysqli_connect($dbHost, $dbUser, $dbPass) or die('error db connection');
    mysqli_select_db($db, $dbName);
    mysqli_query($db, 'set names "utf8"');
    return $db;
}

function addUser($first_name, $last_name, $email)
{
    $first_name = trim(htmlspecialchars($first_name));
    $last_name = trim(htmlspecialchars($last_name));
    $email = trim(htmlspecialchars($email));
    if ($first_name == "" || $last_name == "" || $email == "") {
        echo "<h3/><span style='color:red;'>Fill All Required Fields!</span><h3/>";
        return false;
    }
    if (
        strlen($first_name) < 3 || strlen($first_name) > 30 ||
        strlen($last_name) < 3 || strlen($last_name) > 30 ||
        strlen($email) > 30
    ) {
        echo "<h3/><span style='color:red;'>Values Length Must Be Between 3 And 30!</span><h3/>";
        return false;
    }
    $insert = 'insert into users (first_name, last_name, email) values("' . $first_name . '","' .  $last_name . '","' . $email . '")';
    $conn = connect();
    mysqli_query($conn, $insert);
    $err = mysqli_errno($conn);
    if ($err) {
        echo "<h3/><span style='color:red;'>Error code:" . $err . "!</span><h3/>";
        return false;
    }
    mysqli_close($conn);
    return true;
}

function editUser($first_name, $last_name, $email)
{
    $first_name = trim(htmlspecialchars($first_name));
    $last_name = trim(htmlspecialchars($last_name));
    $email = trim(htmlspecialchars($email));
    if ($first_name == "" || $last_name == "" || $email == "") {
        echo "<h3/><span style='color:red;'>Fill All Required Fields!</span><h3/>";
        return false;
    }
    if (
        strlen($first_name) < 3 || strlen($first_name) > 30 ||
        strlen($last_name) < 3 || strlen($last_name) > 30 ||
        strlen($email) > 30
    ) {
        echo "<h3/><span style='color:red;'>Values Length Must Be Between 3 And 30!</span><h3/>";
        return false;
    }
    $ins = 'insert into users (first_name, last_name, email) values("' . $first_name . '","' .  $last_name . '","' . $email . '")';
    $conn = connect();
    mysqli_query($conn, $ins);
    $err = mysqli_errno($conn);
    if ($err) {
        echo "<h3/><span style='color:red;'>Error code:" . $err . "!</span><h3/>";
        return false;
    }
    mysqli_close($conn);
    return true;
}

// function getAllUsers(){
//     $conn = connect();
//     $users = [];

//     $select = 'select * from users';

//     if ($result = mysqli_query($conn, $select)) {
//         $i = 0;
//         while ($row = mysqli_fetch_assoc($result)) {
//             $users[$i]['id'] = $row['id'];
//             $users[$i]['first_name'] = $row['first_name'];
//             $users[$i]['last_name'] = $row['last_name'];
//             $users[$i]['email'] = $row['email'];
//             $users[$i]['create_date'] = $row['create_date'];
//             $users[$i]['update_date'] = $row['update_date'];
//             $i++;
//         }
//         return $users;
//     } else {
//         http_response_code(404);
//     }
// }

function getAllUsers()
{
    $conn = connect();
    // $users = [];

    $select = 'select * from users';

    if ($result = mysqli_query($conn, $select)) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo "<th scope='row'>$row[id]</th>";
            echo "<td>$row[first_name]</th>";
            echo "<td>$row[last_name]</th>";
            echo "<td>$row[email]</th>";
            echo "<td>$row[create_date]</th>";
            echo "<td>$row[update_date]</th>";
            echo "<td class='d-flex flex-column justify-content-center'>
                        <button type='button'
                        class='btn btn-warning'
                        data-toggle='modal' 
                        data-target='#createEditUsersForm'
                        data-whatever='editUser'
                        style='border: 1px solid white;'
                        name='user$row[id]'>
                        <i class='fas fa-user-edit pr-2'></i>
                        Edit
                        </button>
                    </td>";
            echo "</tr>";
            $i++;
        }
        // return $users;
    } else {
        http_response_code(404);
    }
}

function filterUsers(
    $f_id,
    $f_first_name,
    $f_last_name,
    $f_email,
    $from_create_date,
    $to_create_date,
    $from_update_date,
    $to_update_date
) {

    $f_id = trim(htmlspecialchars($f_id));
    $f_first_name = trim(htmlspecialchars($f_first_name));
    $f_last_name = trim(htmlspecialchars($f_last_name));
    $f_email = trim(htmlspecialchars($f_email));
    $from_create_date = trim(htmlspecialchars($from_create_date));
    $to_create_date = trim(htmlspecialchars($to_create_date));
    $from_update_date = trim(htmlspecialchars($from_update_date));
    $to_update_date = trim(htmlspecialchars($to_update_date));

    $conn = connect();
    $users = [];

    $select = "select * from users where id='.$f_id.
    ' or first_name='. $f_first_name.
    ' or last_name='.$f_last_name.
    ' or email='. $f_email.
    ' or create_date between '. $from_create_date.
    ' and ' . $to_create_date .
    ' or create_date between'. $from_update_date.
    ' and ' . $to_update_date.'";

    if ($result = mysqli_query($conn, $select)) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<th scope='row'>$row[id]</th>";
            echo "<td>$row[first_name]</th>";
            echo "<td>$row[last_name]</th>";
            echo "<td>$row[email]</th>";
            echo "<td>$row[create_date]</th>";
            echo "<td>$row[update_date]</th>";
            echo "<td class='d-flex flex-column justify-content-center'>
                        <button type='button'
                        class='btn btn-warning'
                        data-toggle='modal' 
                        data-target='#createEditUsersForm'
                        data-whatever='editUser'
                        style='border: 1px solid white;'
                        name='user$row[id]'>
                        <i class='fas fa-user-edit pr-2'></i>
                        Edit
                        </button>
                    </td>";
            $i++;
        }
    } else {
        http_response_code(404);
    }
}

// function filterUsers(
//     $id,
//     $first_name,
//     $last_name,
//     $email,
//     $from_create_date,
//     $to_create_date,
//     $from_update_date,
//     $to_update_date
// ) {
//     $id = trim(htmlspecialchars($id));
//     $first_name = trim(htmlspecialchars($first_name));
//     $last_name = trim(htmlspecialchars($last_name));
//     $email = trim(htmlspecialchars($email));
//     $from_create_date = trim(htmlspecialchars($from_create_date));
//     $to_create_date = trim(htmlspecialchars($to_create_date));
//     $from_update_date = trim(htmlspecialchars($from_update_date));
//     $to_update_date = trim(htmlspecialchars($to_update_date));

//     $conn = connect();
//     $users = [];

//     $select = 'select * from users';

//     if ($result = mysqli_query($conn, $select)) {
//         $i = 0;
//         while ($row = mysqli_fetch_assoc($result)) {
//             $users[$i]['first_name'] = $row['first_name'];
//             $i++;
//         }
//     } else {
//         http_response_code(404);
//     }


//     $user = $_GET['f_first_name'];
//     $response = "";
//     foreach ($users as $u) {
//         if (substr($u, 0, strlen($user)) === $user) {
//             $response .= $u . "<br/>";
//         }
//     }
//     echo $response;


    // if ($result = mysqli_query($conn, $select)) {
    //     $i = 0;
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         echo '<tr>';
    //         echo "<th scope='row'>$row[id]</th>";
    //         echo "<td>$row[first_name]</th>";
    //         echo "<td>$row[last_name]</th>";
    //         echo "<td>$row[email]</th>";
    //         echo "<td>$row[create_date]</th>";
    //         echo "<td>$row[update_date]</th>";
    //         echo "<td class='d-flex flex-column justify-content-center'>
    //                     <button type='button'
    //                     class='btn btn-warning'
    //                     data-toggle='modal' 
    //                     data-target='#createEditUsersForm'
    //                     data-whatever='editUser'
    //                     style='border: 1px solid white;'
    //                     name='user$row[id]'>
    //                     <i class='fas fa-user-edit pr-2'></i>
    //                     Edit
    //                     </button>
    //                 </td>";
    //         echo "</tr>";
    //         $i++;
    //     }
    //     return $users;
    // } else {
    //     http_response_code(404);
    // }







// }
