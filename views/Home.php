<?php
session_start();

//echo $_SESSION["username"] . "<br>";
//echo $_SESSION["email"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/Home.css">
    <script src="./js/base_service.js" type="text/javascript"></script>
    <title>Home</title>
</head>

<body>
    
    <div class="container">

        <nav class="navigation">

            <div class="logout">
                <button class="logout-btn" id="logout-btn">
                    <p class="logout-text">Logout</p>
                </button>
            </div>
            
            <div class="user-image">
                <img src="./assets/profile-pictures/default.jpg" alt="Profile picture" class="circular-pfp">
                <!-- <a href="https://www.freepik.com/free-photo/user-profile-icon-front-side_41949685.htm#query=default%20profile%20picture&position=44&from_view=search&track=ais">Image by qalebstudio</a> on Freepik -->
            </div>

            <div class="user-name">
                <p>Hi, John Doe!</p>
            </div>

            <ul class="menu-list">
                <li><a href="#">Home</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Saved posts</a></li>
                <li><a href="#">Settings</a></li>
            </ul>

        </nav>

        <main class="post-container">
            <h1>The newest posts</h1>
            <div class="post">
                <button class="save-btn">SAVE</button>
                <h2>Title</h2>
                <span class="post-row">
                    <p>By: Author</p>
                    <p>Date</p>
                </span>
            </div>
            <div class="post">
                <h2>Title</h2>
                <span class="post-row">
                    <p>Author</p>
                    <p>Date</p>
                </span>
            </div>
            <div class="post">
                <h2>Title</h2>
                <span class="post-row">
                    <p>Author</p>
                    <p>Date</p>
                </span>
            </div>
            <div class="post">
                <h2>Title</h2>
                <span class="post-row">
                    <p>Author</p>
                    <p>Date</p>
                </span>
            </div>
            <div class="post">
                <h2>Title</h2>
                <span class="post-row">
                    <p>Author</p>
                    <p>Date</p>
                </span>
            </div>
        </main>

        <aside class="recommendations">
            
        </aside>

    </div>

</body>

</html>