<?php
require "../includes/dbh.inc.php";
session_start();
if (!empty($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
}
//    if($_SESSION['statut'] != 'client'){
//         header("Location: ../pages/index.php");
//    }
if (!$_GET['id']) {
    header("Location: ../pages/blog.php");
}
$idtheme = $_GET['id'];

$num_par_page = 6;

$sql = "SELECT DISTINCT(article.titreArticle),article.*, theme.* from article JOIN articletag JOIN tag JOIN theme WHERE articletag.ArticleID = article.idArticle AND articletag.tagID = tag.idTag AND tag.themeID = theme.idTheme AND theme.idTheme = $idtheme";
$req = mysqli_query($conn, $sql);

$num_article = mysqli_num_rows($req);

$num_pages = ceil($num_article / $num_par_page);

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$contenu_premier_page = ($page - 1) * $num_par_page;

$sql1 = "SELECT DISTINCT(article.titreArticle),article.*, theme.* from article JOIN articletag JOIN tag JOIN theme WHERE articletag.ArticleID = article.idArticle AND articletag.tagID = tag.idTag AND tag.themeID = theme.idTheme AND theme.idTheme = $idtheme LIMIT $contenu_premier_page, $num_par_page";
$req1 = mysqli_query($conn, $sql1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .pop {
            width: 30vw;
            height: auto;
            position: absolute;
            background: rgb(34, 146, 195);
            background: linear-gradient(0deg, rgba(34, 146, 195, 1) 0%, rgba(45, 198, 173, 1) 41%, rgba(56, 253, 45, 1) 100%);
            right: 38%;
            top: -100em;
            border-radius: 2em;
        }

        .open {
            right: 38%;
            top: 6em;
            visibility: visible;
            transition: all .5s;
            /* transition-delay : 1s; */
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Blog</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class=" bg-white dark:bg-slate-600">
    <header class='p-2 bg-slate-100 relative bg-white dark:bg-slate-600'>


        <div class="flex ">
            <div class=" w-4/5 ">
                <nav class=' flex justify-between items-center p-5 w-full m-auto'>
                    <img class="w-20" src="../images/logo.webp" alt="">
                    <ul class='flex justify-center items-center'>
                        <a href="./blog.php" class='mx-2 ease-in duration-300 hover:bg-stone-100 hover:text-black bg-gray-700 text-white rounded-md px-3 py-2 text-sm font-medium'>Accueil</a>
                        <a href="./index.php" class='ease-in duration-300 class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium'>Store</a>
                    </ul>
                    <div class="flex justify-center items-center">
                        <button onclick="Openpop()" type="submit" class="px-4 py-2 rounded-lg hover:bg-green-900 mx-2 bg-green-600 mb-2 text-sm font-medium text-gray-900 dark:text-white">&#43; Article</button>
                        <div class="pop p-5  flex justify-between items-center flex-col" id="pop">
                            <div class="w-full">
                                <button onclick="allo()">&#x274C</button>
                            </div>
                            <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl lg:text-4xl ">Ajouter un article</h1>

                            <?php
                            // $getID = "";
                            // $ToGetId = mysqli_query($conn, $getID);

                            // while ($row = mysqli_fetch_row($ToGetId)) {
                            ?>

                            <?php
                            // }
                            ?>
                            <form class="max-w-sm mx-auto" method="post" action="./article.php?id=<?php echo $idtheme; ?>" enctype="multipart/form-data">
                                <div class="mb-5">
                                    <label for="titre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                                    <input type="file" name="image" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                                </div>
                                <div class="mb-5">
                                    <label for="titre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre</label>
                                    <input type="text" name="titre" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                                </div>
                                <div class="mb-5">
                                    <label for="titre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                    <textarea type="text" name="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required></textarea>
                                </div>
                                <div class="mb-5 grid grid-cols-1 md:grid-cols-2 gap-4  m-auto ">
                                    <?php
                                    $sql2 = "select * from tag where themeID = $idtheme";
                                    $req2 = mysqli_query($conn, $sql2);

                                    while ($tag_forA = mysqli_fetch_row($req2)) {
                                    ?>
                                        <div>
                                            <input name='tag[]' id="default-checkbox" type="checkbox" value="<?php echo $tag_forA[0] ?>" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $tag_forA[1] ?></label>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>

                                <input type="submit" name="go" value="Ajouter" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                                <?php
                                if (isset($_POST['go'])) {
                                    $titre = $_POST['titre'];
                                    $text = $_POST['text'];
                                    $image_name = $_FILES['image']['name'];
                                    $tmp_name = $_FILES['image']['tmp_name'];
                                    $error = $_FILES['image']['error'];
                                    $tags = $_POST['tag'];

                                    $image_extention = pathinfo($image_name, PATHINFO_EXTENSION);
                                    $image_extention = strtolower($image_extention);

                                    $new_name = uniqid("IMG", true) . '.' . $image_extention;
                                    $img_upload_path = '../uploads/' . $new_name;
                                    move_uploaded_file($tmp_name, $img_upload_path);
                                    $sql1 = "INSERT INTO article VALUES(NULL,'$text','$titre','$new_name','$userid')";
                                    $req1 = mysqli_query($conn, $sql1);
                                    $lastInsertedID = mysqli_insert_id($conn);
                                    foreach ($tags as $tag) {
                                        $sql2 = "INSERT INTO articletag VALUES(NULL,'$tag','$lastInsertedID')";
                                        $req2 = mysqli_query($conn, $sql2);
                                    }
                                    header('Location: http://www.google.com/');
                                }
                                ?>
                            </form>
                        </div>
                        <script src="main.js"></script>
                        <h1 class="mx-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">Bonjour cher client</h1>
                    </div>
                </nav>
                <div class=' my-5  h-3/4 text-center   '>
                    <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl lg:text-4xl dark:text-white">Bienvenue dans le theme
                        <?php
                        $theme = "SELECT * from theme where theme.idTheme = $idtheme ";
                        $nomTheme = mysqli_query($conn, $theme);
                        while ($row = mysqli_fetch_assoc($nomTheme)) {
                            echo $row['nomTheme'];
                        }
                        ?>
                    </h1>
                    <p class="px-20">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit earum voluptates quae, amet deleniti totam culpa qui adipisci repellat quo necessitatibus molestias enim quis, labore rem porro, et doloremque ad.</p>

                    <!-- ======================Search form================================== -->
                    <div class="search m-10">
                        <div class="text-center mt-5 mb-4">
                            <h2>CHERCHER UN ARTICLE</h2>
                        </div>
                        <input type="text" class="form-control" id="live_search" placeholder="search ...">
                    </div>

                    <!-- ======================Search form================================== -->

                    <div id="resultat" class="grid grid-cols-1 md:grid-cols-3 gap-4 w-4/5 m-auto my-5 ">
                        <?php
                        while ($row = mysqli_fetch_row($req1)) {
                        ?>
                            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-center items-center p-4">
                                <a href="#">
                                    <img class="rounded-t-lg w-full w-24" src="../uploads/<?php echo $row[4] ?>" alt="" />
                                </a>
                                <div class="p-5">
                                    <a href="#">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $row[3] ?></h5>
                                    </a>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                        <?php
                                        if (str_word_count($row[2]) <= 5) {
                                            echo $row[2];
                                        } else {
                                            $pieces = explode(" ", $row[2]);
                                            for ($i = 0; $i < 5; $i++) {
                                                echo $pieces[$i] . ' ';
                                            }
                                            echo '.....';
                                        }
                                        ?></p>
                                    <a href="./blogarticle.php?idArticle=<?php echo $row[1] ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Read more
                                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div class="h-screen w-1/5 ">
                <div class="w-full h-full bg-white ">
                    <div class="bg-black">
                        <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight  md:text-4xl lg:text-4xl text-white text-center py-5">
                            TAGS
                        </h1>
                    </div>
                    <?php
                    echo '<div id="tag-container" class="flex flex-col justify-center items-center w-4/5 m-auto">';
                    $sql2 = "select * from tag where themeID = $idtheme";
                    $req2 = mysqli_query($conn, $sql2);
                    while ($tag = mysqli_fetch_row($req2)) {
                        echo '<button value="' . $tag['1'] . '" id="tags" class="w-full text-gray-900 bg-white border border-gray-300  hover:bg-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2" ">' . $tag['1'] . '</button>
                        ';
                    }
                    echo '</div>';
                    ?>
                    <!--<div class=" flex flex-col justify-center items-center w-4/5 m-auto">
                        <?php /*
                        $sql2 = "select * from tag where themeID = $idtheme";
                        $req2 = mysqli_query($conn, $sql2);
                        while ($tag = mysqli_fetch_row($req2)) {
                            echo '<a class="w-full text-gray-900 bg-white border border-gray-300  hover:bg-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2" href="article.php?id=' . $idtheme . '&tag=' . $tag['1'] . '">' . $tag['1'] . '</a>';
                        ?>
                            <!-- <button type="button" class="w-full text-gray-900 bg-white border border-gray-300  hover:bg-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 "><?php //echo $tag['1'] ?></button> -->
                        <?php
                        }*/
                        ?>
                    </div>-->
                </div>
            </div>
        </div>
        <?php
        for ($page = 1; $page <= $num_pages; $page++) {
            echo '<a class="h-10 px-5 text-green-600 transition-colors duration-150 rounded-l-lg focus:shadow-outline hover:bg-green-100" href="article.php?id=' . $idtheme . '&page=' . $page . '">' . $page . '</a> ';
        }
        ?>
    </header>
    <main>
    </main>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#live_search").keyup(function() {
                var input = $(this).val();
                //alert(input);
                if (input != "") {
                    $.ajax({
                        url: "search.php",
                        method: "POST",
                        data: {
                            input: input
                        },
                        success: function(data) {
                            $("#resultat").html(data);
                            $("#resultat").css("display", "block");
                        }
                    });
                } else {

                    $("#resultat").html("");
                    $("#resultat").css("display", "none");
                }
            });
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".tag-filter").click(function(e) {

                e.preventDefault();
                var tag = $(this).data("tag");

                $.ajax({
                    url: "filter.php", // Create a new PHP file to handle the AJAX request
                    method: "POST",
                    data: {
                        tag: tag,
                        idtheme: <?php echo $idtheme; ?>,
                    },
                    success: function(data) {
                        $("#resultat").html(data);
                    },
                });
            });
        });
        const tags = document.querySelectorAll('#tags');
        const idTheme = document.querySelector('#idTheme');
        tags.forEach(item => {
            item.addEventListener("click", (event) => {
                var tag = event.target.value
                $("#resultat").html("");

                $.ajax({
                    url: "cardArticles.php", // Create a new PHP file to handle the AJAX request
                    method: "POST",
                    data: {
                        tag: tag,
                        idtheme: <?php echo $idtheme; ?>,

                        stratPage: <?php echo $contenu_premier_page; ?>,
                        endPage: <?php echo $num_par_page; ?>

                    },
                    success: function(data) {
                        $("#resultat").html(data);
                    },
                });
            })
        })
    </script>
</body>

</html>