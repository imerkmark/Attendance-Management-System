<html>
    <body>
    <?php
    session_start();
    if (isset($_SESSION["username"]) && $_SESSION["role"]) {
        if (isset($_GET['Student_ID']) && isset($_GET['Subject_ID'])) {
            // Retrieve the values
            $Student_ID = $_GET['Student_ID'];
            $Subject_ID = $_GET['Subject_ID'];
            $servername = "localhost";
            $username_db = "zaid";
            $password_db = "1234";
            $dbname = "attendance";

            // Create connection
            $conn = new mysqli($servername, $username_db, $password_db, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql3 = "DELETE from $Subject_ID where Student_ID='$Student_ID'";
            $result3 = $conn->query($sql3);

            // Check if the deletion was successful
            if ($result3) {
                // Display a success alert using JavaScript
                echo '<script>alert("Student expelled successfully!");</script>';

                // Redirect using JavaScript
                echo '<script>window.location.href = "update_class.php?Subject_ID=' . $Subject_ID . '";</script>';
                exit();
            } else {
                // Display an error alert if the deletion failed
                echo '<script>alert("Error: Unable to expel student!");</script>';
            }
        }
    }
    ?>
    </body>
</html>