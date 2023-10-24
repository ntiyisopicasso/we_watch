<?php
    include 'connection.php';
    $conn = OpenConnection();
    
    if($conn){

        $email = $_POST['email'];
        $passwrod = $_POST['password'];
        
        $cookie_name = "user_email";
        $cookie_value = $email;
        $cookie_expiry = time() + (10 * 24 * 60 * 60);

        setcookie($cookie_name, $cookie_value, $cookie_expiry, "/");

        $sql = "SELECT * FROM student WHERE Email=?";
        $stmt= $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        while($row = $result->fetch_assoc()) {
                if($passwrod == $row["Password"]){
                    header('Location: /auth/homepage.html');
                }else{
                    echo "<script>alert(Incorrect Email or Password)</script>";
                    header('Location: /auth/login.html');
                }
            }

    }

?>