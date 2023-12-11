<?php
require "../includes/dbh.inc.php";

if (isset($_POST['tag']) && isset($_POST['idtheme'])) {
    $tag = $_POST['tag'];
    $idtheme = $_POST['idtheme'];

    $sql = "SELECT DISTINCT(article.titreArticle),article.*, theme.* from article JOIN articletag JOIN tag JOIN theme WHERE articletag.ArticleID = article.idArticle AND articletag.tagID = tag.idTag AND tag.themeID = theme.idTheme AND theme.idTheme = $idtheme AND tag.name = '$tag'";
    $req = mysqli_query($conn, $sql);

    // Output filtered results
    while ($row = mysqli_fetch_row($req)) {
        // Your HTML output for filtered results...
        echo '<a class="w-full text-gray-900 bg-white border border-gray-300  hover:bg-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2" href="article.php?id=' . $idtheme . '&tag=' . $tag['1'] . '">' . $tag['1'] . '</a>';
    }
}
