<?php
    include 'connection.php';
    $conn = OpenConnection();
    
    if ($conn) {
        $student_no = $_POST['Student'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $module = $_POST['module'];
        $password = $_POST['password'];

        $sql = "UPDATE student
                SET `Student No` = ?, Name = ?, Surname = ?, Contact = ?, `Module Code` = ?, Password = ?
                WHERE Email = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("dssdsss", $student_no, $name, $surname, $phone, $module, $password, $email);

        if ($stmt->execute()) {
            header('Location: /profile.php');
        } else {
            header('Location: /auth/create.account.html');
        }
    }

    CloseConnection($conn);
?>
