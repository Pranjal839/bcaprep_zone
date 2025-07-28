<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bca_prepzone";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $name = mysqli_real_escape_string($conn, $_POST['Name']);
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $phone = mysqli_real_escape_string($conn, $_POST['Phone']);
    $subject = mysqli_real_escape_string($conn, $_POST['Subject']);
    $message = mysqli_real_escape_string($conn, $_POST['Message']);
    
    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        echo "<script>
                alert('Please fill in all required fields (Name, Email, and Message)');
                window.history.back();
              </script>";
        exit();
    }
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
                alert('Please enter a valid email address');
                window.history.back();
              </script>";
        exit();
    }
    
    // Create table if it doesn't exist
    $sql_create_table = "CREATE TABLE IF NOT EXISTS contact_messages (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        phone VARCHAR(20),
        subject VARCHAR(200),
        message TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($sql_create_table) === FALSE) {
        echo "<script>
                alert('Error creating table: " . $conn->error . "');
                window.history.back();
              </script>";
        exit();
    }
    
    // Insert data into database
    $sql_insert = "INSERT INTO contact_messages (name, email, phone, subject, message) 
                   VALUES ('$name', '$email', '$phone', '$subject', '$message')";
    
    if ($conn->query($sql_insert) === TRUE) {
        // Send email notification (optional)
        $to = "anishaverma839@gmail.com";
        $email_subject = "New Contact Form Submission - BCA Prep_Zone";
        $email_body = "You have received a new message from your website contact form.\n\n";
        $email_body .= "Name: " . $name . "\n";
        $email_body .= "Email: " . $email . "\n";
        $email_body .= "Phone: " . $phone . "\n";
        $email_body .= "Subject: " . $subject . "\n";
        $email_body .= "Message:\n" . $message . "\n";
        
        $headers = "From: " . $email . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        
        // Uncomment the line below to enable email sending
        // mail($to, $email_subject, $email_body, $headers);
        
        echo "<script>
                alert('Thank you for your message! We will get back to you soon.');
                window.location.href = 'index.html';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $sql_insert . "\\n" . $conn->error . "');
                window.history.back();
              </script>";
    }
}

$conn->close();
?> 