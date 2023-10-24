<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/profile.css">
    <script src="/script/script.js" defer></script>
    <title>Profile</title>
</head>

<body>
    <div class="main">
        <div class="sidebar">
            <div class="image">
                <img id="img" src="https://w0.peakpx.com/wallpaper/979/89/HD-wallpaper-purple-smile-design-eye-smily-profile-pic-face-thumbnail.jpg"
                    alt="student image">
            </div>
            <div class="upload">


                <input type="file" id="upload" accept="image/*" hidden />
                <label for="upload">Choose image</label>
               

            </div>
            
        </div>
        <div class="profile">
            <div class="heading">
                <p>Profile information</p>
                
            </div>
            <div class="form">
                <?php
                include $_SERVER["DOCUMENT_ROOT"]."/server/connection.php";
    
                if(isset($_COOKIE['user_email'])) {
                    $email = $_COOKIE['user_email'];
                    
                    // Open a database connection
                    $conn = OpenConnection();
                    
                    // Check if the connection has been established
                    if($conn) {
                        $sql = "SELECT * FROM student WHERE Email = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $email);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        
                        if($result->num_rows > 0) {

                            $row = $result->fetch_assoc();
                            $student_no = $row['Student No'];
                            $name = $row['Name'];
                            $surname = $row['Surname'];
                            $phone = $row['Contact'];
                            $module = $row['Module Code'];
                            $password = $row['Password'];
                        
                            echo '
                            <div class="form">
                                <section class="container">
                                    <form action="/server/update.php" method="POST" class="form">
                                        <div class="input-box">
                                            <input type="text" placeholder="Student Number" name="Student" value="' . htmlspecialchars($student_no) . '" required />
                                        </div>
                                        <div class="input-box">
                                            <input type="text" placeholder="First name" name="name" value="' . htmlspecialchars($name) . '" required />
                                        </div>
                                        <div class="input-box">
                                            <input type="text" placeholder="Surname" name="surname" value="' . htmlspecialchars($surname) . '" required />
                                        </div>
                                        <div class="input-box">
                                            <input type="text" placeholder="Email address" name="email" value="' . htmlspecialchars($email) . '" required readonly />
                                        </div>
                                        <div class="input-box">
                                            <input type="number" placeholder="Phone number" name="phone" value="' . htmlspecialchars($phone) . '" required />
                                        </div>
                                        <div class="input-box">
                                            <div class="select-box">
                                                <select name="module">
                                                    <option hidden>Module code</option>
                                                    <option value="SCSC012" ' . ($module == "SCSCO12" ? 'selected' : '') . '>SCSCO12</option>
                                                    <option value="SMTH012" ' . ($module == "SMTH012" ? 'selected' : '') . '>SMTH012</option>
                                                    <option value="SSTS012" ' . ($module == "SSTS012" ? 'selected' : '') . '>SSTS012</option>
                                                    <option value="SAPA012" ' . ($module == "SAPA012" ? 'selected' : '') . '>SAPA012</option>
                                                    <option value="SHEL012" ' . ($module == "SHEL012" ? 'selected' : '') . '>SHEL012</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-box">
                                            <div class="column password">
                                                <input type="password" placeholder="Password" name="password" value="' . htmlspecialchars($password) . '" required />
                                            </div>
                                        </div>
                                        <button>Update</button>
                                        <button> <a href="/index.html">Log out</a></button>
     
                                    </form>
                                </section>
                            </div>
                            ';
                        }
                        
                        // Close the database connection
                        CloseConnection($conn);
                    }
                }
                ?>
            </div>
        </div>
        
    </div>
</body>

</html>