<?php
    include 'connection.php';
    $conn = OpenConnection();
    
    if($conn){

        $student_no = $_POST['Student'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $module = $_POST['module'];
        $password = $_POST['password'];

        $cookie_name = "user_email";
        $cookie_value = $email;
        $cookie_expiry = time() + (10 * 24 * 60 * 60);

        setcookie($cookie_name, $cookie_value, $cookie_expiry, "/");
        
        $sql = "INSERT INTO student (`Student No`, `Name`, `Surname`, `Contact`, `Module Code`, `Email`, `Password`) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
 
        $stmt= $conn->prepare($sql);
        $stmt->bind_param("dssdsss", $student_no, $name, $surname, $phone, $module, $email, $password);  

        if($stmt->execute()){
            header('Location: /auth/login.html');
        }else{
            header('Location: /auth/create.account.html');
        }
        
    }
    
    CloseConnection($conn);
?>