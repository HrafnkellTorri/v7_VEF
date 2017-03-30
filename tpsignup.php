<html>
	<head>
		<title>Info</title>
	</head>
	<body>
			<?php

            $use = $_GET['F'];
            $pas = $_GET['P'];
            $net = $_GET['N'];
            $servername = "localhost";
            $username = "root";
            $password = "12345678";
            $dbname = "VEF_7";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO User (Username, Password,Netfang)
            VALUES ('$use','$pas','$net')";
                // use exec() because no results are returned
                $conn->exec($sql);
                echo "New record created successfully";
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }




            ?>
	</body>
</html>
