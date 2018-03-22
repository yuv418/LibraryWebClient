<?php session_start();
include("Assets/Header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <div class="content">
        <h1 class="title">Search</h1>
        <form method="GET" action="SearchResults.php">
            <input name="query" type="text"><br><br>
            <input type="Submit" value="Search!" class="submit_btn">
        </form>

    </div>
</body>
</html>