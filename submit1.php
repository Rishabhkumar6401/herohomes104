<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $contactNumber = $_POST["mobile"];
    $email = $_POST["email"];
    $query = $_POST["query"];


    // Validate and sanitize the form data (perform necessary checks)

    

     // Connect to the database
     $servername = "localhost"; // Replace with your MySQL server name
     $username = "u339725174_herohomes104"; // Replace with your MySQL username
     $password = "Herohomes@123"; // Replace with your MySQL password
     $dbname = "u339725174_herohomes"; // Replace with your MySQL database name

    // Create a new PDO instance
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // Handle database connection error
        echo "Connection failed: " . $e->getMessage();
        exit;
    }

    // Prepare and execute the database query
    try {
        $stmt = $conn->prepare("INSERT INTO enquiry1 (name, contact_number,email, query) VALUES (:name, :contactNumber,:email, :query)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':contactNumber', $contactNumber);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':query', $query);
        $stmt->execute();
    } catch (PDOException $e) {
        // Handle database query error
        echo "Error: " . $e->getMessage();
        exit;
    }

    // Close the database connection
    $conn = null;
    
    header("Location: success.html");
    exit;

}