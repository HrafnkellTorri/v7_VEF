<html>
	<head>
		<title>Info</title>
	</head>
	<body>
			<?php

            
            session_start();
            $username = trim($_POST['E']);
            $pwd = trim($_POST['G']);
            $servername = "localhost";
            $username = "root";
            $password = "12345678";
            $dbname = "VEF_7";
            $admin = "admin.php";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT Password from User where Username = $username";
                $conn->exec([$sql]);
                echo "Log in successfull!";
                $storedPwd = $conn->fetchColumn();
                
                if (password_verify($pwd, $storedPwd)) {
                     echo "Log in successfull!";
                $_SESSION['authenticated'] = 'Test';
                // get the time the session started
                $_SESSION['start'] = time();
                session_regenerate_id();
                header("Location: $admin");
                exit;
                } else {
                // if not verified, prepare error message
                $error = 'Invalid username or password';
                    echo $error;
                }
                
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }
        
            ?>
	</body>
</html>
