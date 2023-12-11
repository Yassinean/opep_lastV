<?php
require "../includes/dbh.inc.php";
require "./header.php";
session_start();

?>
<!DOCTYPE html>

<style>
    .cart-container {
        max-width: 800px;
        margin: 120px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .cart-item {
        display: flex;
        margin-bottom: 20px;
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
    }

    .item-image {
        flex: 0 0 80px;
        margin-right: 10px;
    }

    .item-image img {
        width: 100%;
        border-radius: 4px;
    }

    .item-details {
        flex: 1;
    }

    .item-title {
        font-size: 1.2em;
        font-weight: bold;
    }

    .item-price {
        color: #ff5722;
        font-size: 1.2em;
    }

    .item-quantity {
        font-size: 1em;
        color: #666;
    }

    .total {
        text-align: right;
        margin-top: 20px;
        font-size: 1.2em;
    }

    .checkout-btn {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1.2em;

    }

    .commander {
        background-color: #4caf50;
        height: fit-content;
        padding: 10px;
        border-radius: 7px;
        cursor: pointer;
        margin-top: 15px;
    }

    .supprimer {
        background-color: #ff5722;
        height: fit-content;
        padding: 10px;
        border-radius: 7px;
        cursor: pointer;
        margin-top: 15px;
        margin-left: 20px;
    }
</style>

<div class="cart-container">
    <?php
    $idUser = $_SESSION["idUser"];
    $idPanier = $_SESSION["panierId"];
    $sql = "SELECT * FROM panierplante, panier, plante 
        WHERE panierplante.plante_id = plante.idPlante 
        AND panierplante.panier_id = panier.idPanier 
        AND panier.idUser = $idUser 
        AND panierplante.status = 1;";

    $request = mysqli_query($conn, $sql);
 
    while ($row = mysqli_fetch_row($request)) {

    ?>
        <div class="cart-item">

            <div class="item-image">
                <img src="../uploads/<?= $row[10] ?>" alt="Product 1">
            </div>
            <div class="item-details">
                <div class="item-title"><?= $row[8] ?></div>
                <div class="item-price">price : <?= $row[9] ?> $</div>
                <div class="item-quantity">quantity : <?= $row[3] ?></div>

            </div>
            <a class="commander" href="../includes/commander.inc.php?idPivot=<?= $row[0]; ?>&idplante=<?= $row[1]; ?>">commander</a>
            <a class="supprimer" href="../includes/supprimerCommande.inc.php?id=<?= $row[1]; ?>">supprimer</a>

        </div>
    <?php
    }
    ?>

</div>
</body>

</html>