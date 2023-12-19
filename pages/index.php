<?php
require "./header.php";
require "../includes/dbh.inc.php";


if (!$_SESSION['client']) {
    header('Location: signup.php');
}
?>
<style>
    .forms {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .label {
        margin-bottom: 10px;
    }

    .button {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        border: 2px solid #fff;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
        margin-top: 10px;
    }

    .x {
        margin-top: 5rem;
    }

    h1 {
        margin-bottom: 2rem;
    }

    .button {
        padding: .6rem 2rem;
    }

    .button a {
        text-decoration: none;
        color: inherit;
        /* Inherit the color from the parent (.button) */
    }

    main.dark {
        background-color: greenyellow !important;
    }

    .form-control {
        position: relative;
        width: 83%;
        /* Adjust the width as needed */
        margin: 20px 30px 30px 100px;
        /* Center the input horizontally */
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="search"] {
        width: 83%;
        padding-right: 30px;
        box-sizing: border-box;
        outline: none;
    }

    input[type="search"]::placeholder {
        color: #ddd;
    }

    input[type="search"]:focus {
        border: 2px solid #45a049;
    }

    .form-control .search-icon {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        color: #555;
    }

    #searchresult {
        display: flex;
        flex-wrap: wrap;
    }
</style>
<main class="dark">
    <div class="container x ">
        <div class="left ">
            <h1> Filter by Color </h1>
            <form action="./index.php" class="forms" method="post">
                <?php
                $sql = "SELECT * FROM categorie ;";
                $request = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_row($request)) {

                ?>
                    <div>
                        <input type="checkbox" value="<?= $row[1] ?>" name="filter[]" class="label" id="<?= $row[1] ?>">
                        <label for="<?= $row[1] ?>"><?= $row[1] ?></label>
                    </div>

                <?php
                }
                ?>
                <button name="choose" class="button">filter</button>
            </form>
        </div>
        <div class="main x">

            <div class="details" id="plantes">

                <input type="search" class="form-control" id="live_search" autocomplete="off" placeholder="search">
                <div id="searchresult" class="container  bg-white ">

                </div>
                <div class="container bg-white box">

                    <?php

                    if (isset($_POST['choose'])) {
                        $selectedCategories = !empty($_POST['filter']) ? array_map('mysqli_real_escape_string', array_fill(0, count($_POST['filter']), $conn), $_POST['filter']) : array();

                        $catChecked = implode("','", $selectedCategories);

                        if (!empty($selectedCategories)) {
                            $sql = "SELECT plante.*, categorie.nomCateorie FROM plante JOIN categorie ON plante.idCategorie = categorie.idCategorie WHERE categorie.nomCateorie IN ('$catChecked')";
                        } else {
                            $sql = "SELECT plante.*, categorie.nomCateorie FROM plante JOIN categorie ON plante.idCategorie = categorie.idCategorie";
                        }
                    } else {
                        $sql = "SELECT plante.*, categorie.nomCateorie FROM plante JOIN categorie ON plante.idCategorie = categorie.idCategorie";
                    }


                    $request = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_row($request)) {



                    ?>
                        <div class="product">
                            <div class="title pt-4 pb-1"><?php echo $row[1] ?></div>
                            <img src="../uploads/<?php echo $row[3] ?>" alt="images">
                            <div class="title  pt-4 pb-1"><?php echo $row[5] ?> </div>
                            <div class="price"><?php echo $row[2] ?> $</div>
                            <button class="button"><a href="../includes/ajouterAuPanier.inc.php?id=<?php echo $row[0] ?>">ajouter au panier</a></button>
                        </div>


                    <?php
                    }
                    ?>

                </div>
            </div>

        </div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $("#live_search").keyup(function() {
            var input = $(this).val();
            if (input != "") {
                $.ajax({
                    url: "livesearch.inc.php",
                    method: "POST",
                    data: {
                        search_input: input
                    },
                    success: function(data) {
                        $("#searchresult").html(data);
                        $("#searchresult").css("display", "block");
                        $(".product").css("display", "none");
                        $(".box").css("box-shadow", "none");

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("AJAX Error:", textStatus, errorThrown);
                    }
                });
            } else {
                $("#searchresult").css("display", "none");
                $(".product").css("display", "block");
            }
        });
    });
</script>
<?php
require "footer.php";
?>