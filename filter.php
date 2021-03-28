 <?php
    include_once('functions.php');
    filterUsers(
        $_POST["f_id"],
        $_POST["f_first_name"],
        $_POST["f_last_name"],
        $_POST["f_email"],
        $_POST["from_create_date"],
        $_POST["to_create_date"],
        $_POST["from_update_date"],
        $_POST["to_update_date"]
    );
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;







    // $user = $_GET['name'];
    // $response = "";
    // foreach ($users as $u) {
    //     if (substr($u, 0, strlen($user)) === $user) {
    //         $response .= $u . "<br/>";
    //     }
    // }
    // echo $response;
    // filterUsers(
    //     $_POST['id'],
    //     $_POST['first_name'],
    //     $_POST['last_name'],
    //     $_POST['email'],
    //     $_POST['from_create_date'],
    //     $_POST['to_create_date'],
    //     $_POST['from_update_date'],
    //     $_POST['to_update_date']
    // );
    // header("Location: {$_SERVER['HTTP_REFERER']}");
    // exit;


    //     $select = 'select * from users';
    //     $insert = 'insert into users (first_name, last_name, email) values("' . $first_name . '","' .  $last_name . '","' . $email . '")';
    //     $conn = connect();
    //     mysqli_query($conn, $select);

    //     if ($result = mysqli_query($conn, $select)) {
    //         $i = 0;
    //         while ($row = mysqli_fetch_assoc($result)) {
    //             echo '<tr>';
    //             echo "<th scope='row'>$row[id]</th>";
    //             echo "<td>$row[first_name]</th>";
    //             echo "<td>$row[last_name]</th>";
    //             echo "<td>$row[email]</th>";
    //             echo "<td>$row[create_date]</th>";
    //             echo "<td>$row[update_date]</th>";
    //             echo "<td class='d-flex flex-column justify-content-center'>
    //                         <button type='button'
    //                         class='btn btn-warning'
    //                         data-toggle='modal' 
    //                         data-target='#createEditUsersForm'
    //                         data-whatever='editUser'
    //                         style='border: 1px solid white;'
    //                         name='user$row[id]'>
    //                         <i class='fas fa-user-edit pr-2'></i>
    //                         Edit
    //                         </button>
    //                     </td>";
    //             echo "</tr>";
    //             $i++;
    //         }
    //     } else {
    //         http_response_code(404);
    //     }


    //     // 
    //     $mysqli = new mysqli("servername", "username", "password", "dbname");
    //     if ($mysqli->connect_error) {
    //         exit('Could not connect');
    //     }

    //     $sql = "SELECT customerid, companyname, contactname, address, city, postalcode, country
    // FROM customers WHERE customerid = ?";

    //     $stmt = $mysqli->prepare($sql);
    //     $stmt->bind_param("s", $_GET['q']);
    //     $stmt->execute();
    //     $stmt->store_result();
    //     $stmt->bind_result($cid, $cname, $name, $adr, $city, $pcode, $country);
    //     $stmt->fetch();
    //     $stmt->close();


    //     echo "<th>CustomerID</th>";
    //     echo "<td>" . $cid . "</td>";
    //     echo "<th>CompanyName</th>";
    //     echo "<td>" . $cname . "</td>";
    //     echo "<th>ContactName</th>";
    //     echo "<td>" . $name . "</td>";
    //     echo "<th>Address</th>";
    //     echo "<td>" . $adr . "</td>";
    //     echo "<th>City</th>";
    //     echo "<td>" . $city . "</td>";
    //     echo "<th>PostalCode</th>";
    //     echo "<td>" . $pcode . "</td>";
    //     echo "<th>Country</th>";
    //     echo "<td>" . $country . "</td>";




    //     echo "<th scope='row'>$row[id]</th>";
    //     echo "<td>$row[first_name]</th>";
    //     echo "<td>$row[last_name]</th>";
    //     echo "<td>$row[email]</th>";
    //     echo "<td>$row[create_date]</th>";
    //     echo "<td>$row[update_date]</th>";
    //     echo "<td class='d-flex flex-column justify-content-center'>
    //             <button type='button'
    //             class='btn btn-warning'
    //             data-toggle='modal' 
    //             data-target='#createEditUsersForm'
    //             data-whatever='editUser'
    //             style='border: 1px solid white;'
    //             name='user$row[id]'>
    //             <i class='fas fa-user-edit pr-2'></i>
    //             Edit
    //             </button>
    //             </td>";
    // 
    ?> 