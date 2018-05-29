<?php
session_start();
include("Assets/Header.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fellowship Village Library Catalog</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <div class="content">
        <h1 class="title">Fellowship Village Library Catalog</h1>
        <p class="title">Welcome to the Fellowship Village Library Catalog. Press "Login" if you want to login, and "Search" if you want to search. <br>If you would like to create an account for the catalog, please contact the librarian.
        </p>
        <h3 class="title">Recent Items: </h3>
        <?php
        $conn = new mysqli('localhost', 'default_u', 'letmeinmysql', 'lcatalog');
        //echo "rbooklist: ". $_SESSION['recent_book_list'].count($_SESSION['recent_book_list']);
        //print_r($_SESSION['recent_book_list']);
        foreach ($_SESSION['recent_book_list'] as $key => $value){
            if (!$key == 0){
                echo "<div class='carousel'><div class='recent_book'><img height=\"10%\" width=\"10%\" src='Assets/book.png'><br><a href='BookPage.php?id=".$value."'>".getBookTitleFromId($conn, $value)."</a></div></div>";
            }

        }
        function getBookTitleFromId($conn, $id){
            $result = $conn->query("SELECT Title FROM Books WHERE ID=".$id);
            while ($row = $result->fetch_assoc()){
                return $row['Title'];
            }
        }
        ?>
    </div>
</body>
</html>
