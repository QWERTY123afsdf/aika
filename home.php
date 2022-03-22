


<?php


session_start();

echo 'Welcome to your shitty profile -';
echo '<br />';
echo $_SESSION['Fname'];
echo '<br />';
echo $_SESSION['Lname'];
echo '<br />';
echo $_SESSION['Gender'];
echo '<br />';
echo $_SESSION['Age'];
echo '<br />';
echo $_SESSION['Email'];
echo '<br />';
echo $_SESSION['User'];
echo '<br />';



?>



<a href="logout.php">Logout</a>