<html>
    <head>
    </head>

    <body>

    <?php

    include('connect.php');

    $sql = "SELECT * FROM userinfo";
    $result = mysqli_query($connect, $sql);
    while($row = mysqli_fetch_array($result)){
        echo "<a href = 'user.php?id=".$row['id']."'>";
        echo $row ['Fname']." ".$row['Lname'];
        echo "</a>";
        echo "<br />";
        echo "<br />";
        echo "<br />";

    }

    ?>



</html>