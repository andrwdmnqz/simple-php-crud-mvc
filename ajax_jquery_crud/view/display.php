<?php
    include "../controller/UserController.php";

    if (isset($_POST["dataToSend"])) {
        $controller = new UserController();
        $result = $controller->readAll();

        $table = '        <table class="table table-hover table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Re. Number</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>';
        $order_id = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $username = $row["name"];
            $email = $row["email"];
            $password = str_repeat("*", 8);
            $gender = $row["gender"];
                    $table .= '<tr>
                                  <td>'.$order_id.'</td>
                                  <td>'.$username.'</td>
                                  <td>'.$email.'</td>
                                  <td>'.$password.'</td>
                                  <td>'.$gender.'</td>
                                  <td>
                                    <button class="btn btn-primary" onclick="updateDetails('.$id.')">Update</button>
                                    <button class="btn btn-danger" onclick="deleteUser('.$id.')">Delete</button>
                                  </td>
                               </tr>';
            $order_id++;
        }
        $table .= '         </tbody>
                        </table>';
        echo $table;
    }
?>
