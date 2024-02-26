<?php
include 'db.php';
include 'style/style.css';
if($_SERVER["REQUEST_METHOD"] == "GET") 
{
  $user_name = $_POST["user_name"];
  $password = $_POST["password"];
if ($conn) {
    echo "Connected successfully";
    $sql = "SELECT * FROM learn_users WHERE user_name = $user_name && password = $password";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
         echo "instructor :  ".$result->num_rows."<br><br>";
    } else {
        echo "No results found";
    }
    $conn->close();
} else {
    die("Connection failed: " . mysqli_connect_error());
}
}
?>
<?php
include 'db.php'; // Include file with database credentials

// Check for POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_name = $_POST["user_name"];
  $password = $_POST["password"];

  // Prepare SQL statement with placeholders for security
  $sql = "SELECT * FROM learn_users WHERE user_name = ? AND password = ?";
  $stmt = $conn->prepare($sql);//Prepares a statement for execution
  $stmt->bind_param("ss", $user_name, $password);//Binds variables to placeholders ["ss" for two strings]
  $stmt->execute();//Executes the prepared statement
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    // Successful login
    session_start(); // Start a session to store user information
    $_SESSION['user_name'] = $user_name; // Store username in session
    header("Location: welcome.php"); // Redirect to welcome page
    exit();
  } else {
    echo "Invalid username or password";
  }

  $stmt->close();
  $conn->close();
}
?>
