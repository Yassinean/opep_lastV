<?php
require "../includes/dbh.inc.php";
$output = '';

if (isset($_POST["tag"]) && isset($_POST["idtheme"]) && isset($_POST["stratPage"]) && isset($_POST["endPage"])) {
    $tag = $_POST["tag"];
    $idtheme = $_POST["idtheme"];
    $contenu_premier_page = $_POST["stratPage"];
    $num_par_page = $_POST["endPage"];

    $sql1 = "SELECT DISTINCT(article.titreArticle),article.*, theme.* from article JOIN articletag JOIN tag JOIN theme WHERE articletag.ArticleID = article.idArticle AND articletag.tagID = tag.idTag AND tag.themeID = theme.idTheme AND theme.idTheme = $idtheme AND textTag= '$tag' LIMIT $contenu_premier_page, $num_par_page  ";
    $req1 = mysqli_query($conn, $sql1);

    while ($row = mysqli_fetch_row($req1)) {
        $output .= '
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-center items-center p-4">
                <a href="#">
                    <img class="rounded-t-lg w-full w-24" src="../uploads/' . $row[4] . '" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">' . $row[3] . '</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">';

        if (str_word_count($row[2]) <= 5) {
            $output .= $row[2];
        } else {
            $pieces = explode(" ", $row[2]);
            for ($i = 0; $i < 5; $i++) {
                $output .= $pieces[$i] . ' ';
            }
            $output .= '.....';
        }

        $output .= '</p>
                    <a href="./blogarticle.php?idArticle=' . $row[1] . '" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>';
    }
}

echo $output;
