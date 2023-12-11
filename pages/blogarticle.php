<?php
session_start();

if (!empty($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
}


if (empty($_GET['idArticle'])) {
    header("Location: ../pages/article.php");
} else {
    $idArticle = $_GET['idArticle'];
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>


    <style>
        *,
        *:before,
        *:after {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        *:focus {
            outline: none;
        }

        body {
            padding-top: 45px;
            font-family: "Montserrat", sans-serif;
            letter-spacing: 0px;
            line-height: 1.5em;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Merriweather Sans", sans-serif;
            letter-spacing: 1px;
        }

        ul {
            list-style: none;
        }

        li {
            display: inline;
        }

        a {
            text-decoration: none;
            color: #0b41d8;
            cursor: pointer;
            margin: 4px;
        }

        .svg-inline--fa {
            font-size: 1.2em;
        }

        .mybtn {
            background: transparent;
            border: 2px solid #fff;
            color: #fff;
            display: inline-block;
            margin-top: 10px;
            padding: 12px 20px;
            border-radius: 0px;
            text-align: center;
            transition: all 0.35s;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .mybtn:hover {
            background: #e91e63;
            border: 2px solid #e91e63;
            color: #fff;
        }

        .myrow-uneven {
            max-width: 1460px;
            margin: 0 auto;
        }

        /* 
==================================================
Navigation menus
================================================== 
*/

        /* **********
STANDARD MENU 
********** */



        .links {
            padding: 12px 2px;
        }

        .links a {
            padding: 0px 12px;
            color: #eee;
            transition: all 0.35s;
            display: inline-block;
        }

        .links a:hover {
            transform: scale(1.1);
            color: #e91e63;
        }

        .brand {
            color: #eee;
            padding: 12px 15px;
            display: inline-block;
        }

        /* 
==================================================
Hero
================================================== 
*/

        .top-intro {
            text-align: center;
        }

        .top-intro h1 {
            font-size: 3em;
            line-height: 1.2em;
            text-transform: uppercase;
        }

        .top-intro p {
            font-size: 1.2em;
        }

        .accent {
            background: #000;
            color: #fff;
            padding: 5px 10px;
        }

        #home .myrow {
            margin-bottom: 0;
        }

        .hero .myrow {
            background: transparent;
        }

        .hero {
            /* height: 768px;
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
        url("../images/Pivoine.jpg")no-repeat center; */

            background-size: cover;
            display: flex;
            align-items: center;
            color: #fff;
            padding: 4 0px;
        }

        .hero h1 {
            font-size: 5em;
            text-transform: uppercase;
        }

        .hero p {
            font-size: 2em;
        }

        /* 
==================================================
Posts
================================================== 
*/

        .blog-header {
            text-align: center;
        }

        .blog-header h2 {
            text-transform: uppercase;
        }

        .date {
            color: #aaa;
        }

        .likes,
        .replies {
            padding: 10px 15px;
            cursor: pointer;
            transition: all 0.35s;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .likes {
            border: 1px solid #b2b2b2;
            background: transparent;
            font-weight: bold;
        }

        .likes:hover {
            border: 1px solid #000;
            background: #000;
            color: #fff;
        }

        .replies {
            border: 1px solid #000;
            background: #000;
            color: #fff;
        }

        .replies:hover {
            border: 1px solid #f1f1f1;
            background: #f1f1f1;
            color: #000;
        }

        .count {
            color: #fff;
            padding: 5px;
            margin-left: 15px;
        }

        .post-btm-bar {
            display: flex;
            justify-content: space-between;
        }

        /* 
==================================================
Sidebar
================================================== 
*/

        .profile .author {
            padding: 0;
        }

        .abt {
            padding: 10px 20px;
            background: #000;
            color: #fff;
            margin-top: -7px;
        }


        /************
POPULAR POSTS
************/

        .sidebar-header {
            background: green;
            color: #fff;
            padding: 1px 20px;
        }

        .p-img img {
            width: 100%;
            height: auto;
        }

        .p-img {
            margin-right: 10px;
            max-width: 100px;
        }

        .p-posts {
            display: flex;
            align-items: center;
            transition: all 0.35s;
            cursor: pointer;
        }

        .popular-posts .myrow {
            margin-bottom: 0;
            border-bottom: 1px solid #eee;
        }

        .p-posts:hover {
            background: #f6f6f6 !important;
            color: #000;
        }

        .popular-posts .myrow:last-child {
            margin-bottom: 20px;
            border: none;
        }

        .p-text h5 {
            line-height: 0;
        }

        /************
TAG CLOUD
************/

        .tag {
            display: inline-block;
            background: #eee;
            padding: 5px 10px;
            font-size: 0.85em;
            margin-bottom: 5px;
            cursor: pointer;
            transition: all 0.35s;
        }

        .tag:hover {
            background: #000;
            color: #fff;
        }

        /************
SOCIAL FOLLOW
************/

        .follow a {
            transition: all 0.35s;
            display: inline-block;
            font-size: 1.2em;
            padding: 2px;
        }

        .follow a:hover {
            transform: scale(1.1);
            color: #e91e63;
        }

        /************
SUBSCRIBE
************/

        .subscribe form input[type="submit"] {
            background: #e91e63;
            border: none;
            border-radius: 0px;
            width: 100%;
            padding: 10px;
            color: #fff;
            transition: all 0.35s;
            cursor: pointer;
            -webkit-appearance: none;
        }

        .subscribe form input[type="submit"]:hover {
            opacity: 0.5;
        }

        .subscribe form input[type="email"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 0px;
            -webkit-appearance: none;
        }

        /* 
==================================================
Footer
================================================== 
*/

        footer {
            text-align: center;
            background: #000;
            color: #eee;
            padding: 5px;
        }

        footer .myrow,
        footer .mycol {
            margin-bottom: 0;
            padding-bottom: 0;
        }

        footer a {
            display: inline-block;
            padding-right: 10px;
            color: #eee;
            transition: all 0.35s;
        }

        footer a:hover {
            transform: scale(1.05);
            color: #e91e63;
        }

        footer p {
            font-size: 0.75em;
            color: #aaa;
            text-transform: uppercase;
        }

        footer .svg-inline--fa {
            font-size: 1em;
        }

        /* 
==================================================
Grid Layout
================================================== 
*/
        /* Style for the form with class "comments" */
        form.comments {
            margin-bottom: 20px;
        }

        /* Style for the input field with class "addcomments" */
        input.addcomments {
            padding: 10px;
            margin-right: 5px;
            border: 1px solid #4CAF50;
            border-radius: 5px;
            width: 84%;
        }

        /* Style for the button */
        form.comments button {
            padding: 10px 15px;
            cursor: pointer;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            margin-top: 30px;
        }

        /* Style for the comments container with class "allcomments" */
        div.allcomments {
            border: 1px solid #4CAF50;
            background-color: #eaf7ea;
            padding: 15px;
            border-radius: 8px;
        }

        /* Style for individual comments inside the container */
        div.allcomments p {
            margin: 10px 0;
            background-color: #d4f0c3;
            padding: 15px;
            border-radius: 8px;
        }


        .myrow {
            display: flex;
            margin: 0 0 30px 0;
        }

        .mycol {
            padding: 20px;
        }

        .myrow-uneven .mycol {
            background: #fff;
            /* padding: 20px; */
            border: 2px solid green;
        }

        .myrow-uneven {
            padding: 30px;
        }

        .mycol-left {
            margin-right: 15px;
        }

        .mycol-right {
            margin-left: 15px;
        }

        .myrow .mycol {
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
        }

        .myrow-halves,
        .myrow-thirds,
        .myrow-fourths,
        .myrow-uneven {
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        .myrow-uneven .mycol-left {
            width: 70%;
        }

        .myrow-uneven .mycol-right {
            width: 30%;
        }

        .myrow-halves .mycol {
            width: 49%;
            margin: 0 auto;
        }

        .myrow-thirds .mycol {
            width: 32%;
        }

        .myrow-fourths .mycol {
            width: 24%;
        }

        /* 
==================================================
Media Queries
================================================== 
*/

        @media (max-width: 970px) {

            .myrow,
            .myrow-halves,
            .myrow-thirds,
            .myrow-fourths,
            .myrow-uneven {
                display: block;
            }

            .myrow .mycol,
            .myrow-halves .mycol,
            .myrow-thirds .mycol,
            .myrow-fourths .mycol,
            .myrow-uneven .mycol-left,
            .myrow-uneven .mycol-right {
                width: 100%;
                margin: 0 0 10px 0;
            }
        }

        @media (max-width: 650px) {
            .hero h1 {
                font-size: 4em;
                text-transform: uppercase;
            }

            .hero p {
                font-size: 1.5em;
            }
        }

        @media (max-width: 550px) {
            .hero h1 {
                font-size: 4em;
                text-transform: uppercase;
                line-height: 1.2em;
            }

            .hero p {
                font-size: 1.5em;
                line-height: 0;
            }
        }

        @media(max-width: 480px) {
            .top-intro h1 {
                font-size: 2.5em;
            }
        }

        
    </style>
</head>
<?php



include '../includes/dbh.inc.php';





// change this later with the id from GET OR POST
$req = "SELECT ar.*, ut.nom FROM article AS ar LEFT JOIN utilisateur AS ut ON ar.userID = ut.idUser WHERE  ar.idArticle = $idArticle  ;";
$sql = mysqli_query($conn, $req);
$row = mysqli_fetch_assoc($sql);

?>




<body>
    <nav class="md:container md:mx-auto flex justify-between items-center w-full m-auto bg-green-700">
        <img class="w-20" src="../images/logo.webp" alt="">
        <ul class="flex justify-center items-center">
            <a href="./blog.php" class="mx-2 hover:bg-white hover:text-green-700 text-white rounded-md px-3 py-2 text-sm font-medium transition duration-300 ease-in">Accueil</a>
            <a href="./index.php" class="mx-2 hover:bg-white hover:text-green-700 text-white rounded-md px-3 py-2 text-sm font-medium transition duration-300 ease-in">Store</a>
        </ul>
    </nav>
    <section id="home" class="py-16 bg-green-400">
        <div class="container mx-auto">
            <div class="grid grid-cols-12 md:grid-cols-2">
                <div class="md:col-span-12 flex items-center justify-center">
                    <header class="top-intro text-center">
                        <h1 class="text-4xl font-bold text-white mb-4 mx-auto">
                            <?= $row['titreArticle']; ?>
                        </h1>
                        <p class="text-lg text-white">
                            Created By: <b><i><u><?= $row['nom']; ?></u></i></b>
                        </p>
                    </header>
                </div>
            </div>
        </div>
    </section>

    <div class="myrow-uneven">
        <div class="mycol-left">
            <div class="myrow">
                <div class="mycol">
                    <img src="../uploads/<?= $row['imageArticle'] ?>" style="width:30%;margin:auto">
                    <p> <?= $row['textArticle'];  ?></p>
                    <div class="post-btm-bar">
                        <?php
                        $count = "SELECT count(*) as totalComment FROM commentaire, article where commentaire.idArticle = article.idArticle and article.idArticle = $idArticle;";
                        $countRes = mysqli_query($conn, $count);
                        while ($row = mysqli_fetch_assoc($countRes)) {
                        ?>
                            <button class="replies bg-green-500 text-white border border-white font-bold transition duration-350 ease-in">Replies <span class="count"><?= $row['totalComment'];  ?></span></button>
                        <?php
                        }
                        ?>
                    </div>
                    <?php
                    if (isset($_SESSION['userid'])) {
                    ?>
                        <form action="../includes/addComment.inc.php?idArticle=<?php echo $idArticle; ?>" class="comments" method="post">
                            <input type="text" name="commentaire" id="" class="addcomments">
                            <button type="submit" name="addComm">add comment</button>
                        </form>
                    <?php
                    }
                    ?>
                    <div class="allcomments">
                        <div class="mycol">
                            <?php
                            $sql = "SELECT * FROM commentaire , utilisateur where utilisateur.idUser = commentaire.userID and idArticle = $idArticle";
                            $stmt = mysqli_stmt_init($conn);

                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                // Handle the error as needed
                                echo "SQL statement preparation failed";
                            } else {
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);

                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <div>
                                        <?= ($row['nom']);  ?> commented :
                                        <p id=<?= $row['idCommentaire'] ?> 
                                        <?php
                                            if (isset($_SESSION['userid'])) {
                                                if ($_SESSION['userid'] == $row['userID']) {
                                                    echo 'contentEditable = "true"';
                                                }
                                            }
                                        ?>>
                                        <?= ($row['textCommentaire']);  ?>
                                        </p>
                                        <?php
                                        if (isset($_SESSION['userid'])) {
                                            if ($_SESSION['userid'] == $row['userID']) {
                                                echo '<a class="mx-2 bg-red-700 text-white rounded-md px-3 py-2 text-sm font-medium transition duration-300 ease-in" href="../includes/deleteComm.inc.php?idComm=' . $row['idCommentaire'] . '&idArticle=' . $idArticle . '"> delete</a>';
                                                echo '<a id="update" class="mx-2 bg-yellow-400 text-white rounded-md px-3 py-2 text-sm font-medium transition duration-300 ease-in" onclick=update()> update</a>';
                                                echo '<script>

                                        function update(){
                                var commentText = document.getElementById(\'' . $row['idCommentaire'] . '\').textContent;
                                if(commentText != ""){
                            window.location.href = "../includes/updateComm.inc.php?idArticle=' . $row['idArticle'] . '&&idComm=' . $row['idCommentaire'] . '&textComment=" + encodeURIComponent(commentText);}
                            else{
                                alert("error empty fields!");
                            }
                        }
                        </script>';
                                            }
                                        }
                                        ?>
                                        <?php
                                        if (isset($_SESSION['admin'])) {
                                            echo '<a class="red" href="../includes/deleteComm.inc.php?idComm=' . $row['idCommentaire'] . '"> delete</a>';
                                        }
                                        ?>




                                    </div>
                            <?php
                                }
                            }
                            mysqli_stmt_close($stmt);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mycol-right">
            <section class="popular-posts">
                <header class="sidebar-header">
                    <h2>Related Posts</h2>
                </header>
                <?php
                $tags = "SELECT DISTINCT tagID FROM articletag WHERE ArticleID = $idArticle;";
                $res = mysqli_query($conn, $tags);
                while ($row = mysqli_fetch_assoc($res)) {
                    $tagsID[] = $row['tagID'];
                }
                $tagsIDString = implode(',', $tagsID);

                $sql = "SELECT article.textArticle, article.titreArticle, article.imageArticle 
                        FROM article, tag, articletag
                        WHERE article.idArticle = articletag.ArticleID
                        AND articletag.tagID = tag.idTag
                        AND article.idArticle != $idArticle
                        AND tag.idTag IN ($tagsIDString)
                        ORDER BY article.idArticle desc
                        LIMIT 2;";



                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {



                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="myrow">
                            <div class="mycol p-posts">
                                <div class="p-img">
                                    <img src="<?= $row['imageArticle'] ?>" alt="<?= $row['imageArticle'] ?>">
                                </div>
                                <div class="p-text">
                                    <h5><?= $row['titreArticle'] ?></h5>
                                    <p><?= mb_strimwidth($row['textArticle'], 0, 100, "..."); ?></p>
                                </div>
                            </div>
                        </div>


                    <?php
                    }
                } else {
                    ?>
                    <div class="myrow">
                        <div class="mycol p-posts">

                            <div class="p-text">
                                <h5>no realated post</h5>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </section>
            <section class="tag-cloud">
                <header class="sidebar-header">
                    <h2>Tags</h2>
                </header>
                <div class="myrow">
                    <div class="mycol">
                        <?php
                        $sql = "SELECT tag.textTag from articletag ,article , tag where tag.idTag = articletag.tagID and article.idArticle = articletag.ArticleID and article.idArticle = $idArticle;
;
";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "SQL statement preparation failed";
                        } else {
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <span class="tag"><?= $row['textTag'] ?> </span>
                        <?php
                            }
                        }
                        mysqli_stmt_close($stmt);
                        ?>
                    </div>
                </div>

            </section>

            <section class="follow">
                <header class="sidebar-header">
                    <h2>Theme</h2>
                </header>
                <div class="myrow">
                    <div class="mycol">

                        <?php
                        $sql = "SELECT theme.nomTheme from article , articletag , tag , theme where article.idArticle = articletag.ArticleID and articletag.tagID = tag.idTag and tag.themeID = theme.idTheme and article.idArticle = $idArticle LIMIT 1;";
                        $res = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                            <span class="tag"><?= $row['nomTheme'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </section>



        </div>
    </div>

</body>

</html>