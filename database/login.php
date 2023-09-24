<?php
    $conn = new mysqli("localhost", "root", "", "user_registration");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $phone = $_POST["login_phone"];
    $password = md5($_POST["login_password"]);

    $sql = "SELECT * FROM users WHERE phone_number='$phone'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        echo "User not found. Please sign up.";
    } else {
        $row = $result->fetch_assoc();
        if ($password != $row["password"]) {
            echo "Incorrect password. Please try again.";
        } else {
            echo "Login successful!";
        }
    }

    $conn->close();
?>
