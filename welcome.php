<link rel="stylesheet" href="style/style.css" type="text/css">

<header>
   <img class="logo" src="assets/logo.png">
   <div class="search-bar">
   <form action="api/search.php" method="get">
        <label for="search">Search by Name:</label>
        <input type="text" name="search" id="search" value="<?php echo htmlspecialchars($searchName); ?>">
        <button type="submit">Search</button>
    </form>
   </div>
   <a class="logout-link" style="font-weight: 900;" href="logout.php">
    <mark>LOGOUT</mark>
   </a>
</header>
<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  header("Location: index.php"); // Redirect to login page if not logged in
  exit();
}

echo "Welcome, " . $_SESSION['user_name'] . "!<br>";

?>
<h2>
  <a href="api/getstudent.php">
    <button class="buttons">
      student
    </button>
  </a>
  <a href="api/getinstuctor.php">
    <button class="buttons">
      instuctor
    </button>
  </a>
      <a href="api/getsubject.php">
    <button class="buttons">
      subject
    </button>
  </a>
<footer>
  <h3>Copyright © 2021 InfixLMS. All rights reserved | Made By CodeThemes</h3>
</footer>