<?php
// Start session to store user information
session_start();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get form input values
  $email = $_POST['Username'];
  $password = $_POST['Password'];

  $servername="localhost";
$username="root";
$dbpassword="";
$database_name="eunoiadb";

  // Validate input values
  if (empty($username) || empty($password)) {
    echo "Please enter both username and password";
  } else {
    // Connect to database
    $conn=mysqli_connect($servername,$username,$dbpassword,$database_name);

    // Check if connection was successful
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Query database to check for matching username and password
    $sql = "SELECT * FROM login WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
      // Set session variable with user ID
      $row = mysqli_fetch_assoc($result);
      $_SESSION['user_id'] = $row['id'];

      // Redirect to homepage or other authorized page
      header("Location: homepage.php");
    } else {
      echo "Invalid username or password";
    }

    // Close database connection
    mysqli_close($conn);
  }
}
?>
