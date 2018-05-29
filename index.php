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
        //echo sizeof($_SESSION['recent_book_list']);
        echo "<div class='carousel'>";
        for ($i = 0; $i < sizeof($_SESSION['recent_book_list']); $i++){
            $value = $_SESSION['recent_book_list'][$i];
            //echo $i."<br>";
            echo "<div class='recent_book'><img height=\"50%\" width=\"50%\" src='Assets/book.png'><br><a href='BookPage.php?id=".$value."'>".getBookTitleFromId($conn, $value)."</a></div>";

        }
        echo "</div>";
        function getBookTitleFromId($conn, $id){
            $result = $conn->query("SELECT Title FROM Books WHERE ID=".$id);
            while ($row = $result->fetch_assoc()){
                return $row['Title'];
            }
        }
        ?>
        <button class="rounded navbtn" onclick="ajax_clear_recent_items()">Clear Items</button>

        <script>
            function ajax_clear_recent_items(){
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if (this.readyState == 4 && this.status == 200){
                        document.getElementsByClassName("carousel")[0].innerHTML = xmlhttp.responseText;
                    }
                };
                xmlhttp.open("GET", "UserUtils/ClearRecentItems.php?doclear=true", true);
                xmlhttp.send();
            }
        </script>
    </div>
</body>
</html>
