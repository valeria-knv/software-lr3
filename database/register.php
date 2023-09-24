<?php
    $conn = new mysqli("localhost", "root", "", "user_registration");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST["register_username"];
    $age = $_POST["register_age"];
    $email = $_POST["register_email"];
    $phone = $_POST["register_phone"];
    $password = md5($_POST["register_password"]);

    $sql_check = "SELECT * FROM users WHERE phone_number='$phone'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        echo "User already exists. Please log in.";
    } else {
        $sql_insert = "INSERT INTO users (username, age, email, phone_number, password) VALUES ('$username', $age, '$email', '$phone', '$password')";
        if ($conn->query($sql_insert) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }
    }

    $conn->close();
?>
