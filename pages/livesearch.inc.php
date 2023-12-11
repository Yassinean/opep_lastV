<style>
    .container .products {
        width: calc(33.33% - 60px);
        box-sizing: border-box;
        margin: 20px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        transition: transform 0.3s ease-in-out;
        text-align: center;
    }

    .container .products:hover {
        transform: scale(1.05);
    }

    .container .products img {
        max-width: 100%;
        height: auto;
        border-radius: 20px;
        transition: transform 0.3s ease-in-out;
    }

    .container .products:hover img {
        transform: scale(1.1);
    }

    .container .products .title {
        font-size: 18px;
        font-weight: bold;
        margin-top: 10px;
    }

    .container .products .price {
        font-size: 16px;
        color: #007bff;
        /* Change color as needed */
        margin-top: 5px;
    }


    /* Add any additional styling for product details as needed */
</style>
<?php
include("../includes/dbh.inc.php");
$input = $_POST['search_input'];

if (empty($input)) {
    $query = "SELECT plante.*, categorie.nomCateorie FROM plante JOIN categorie ON plante.idCategorie = categorie.idCategorie;";
} else {
    $query = "SELECT plante.*, categorie.nomCateorie FROM plante JOIN categorie ON plante.idCategorie = categorie.idCategorie WHERE plante.nom LIKE '{$input}%';";
}

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>

        <div class="containerx ">
            <div class="products">
                <div class="title pt-4 pb-1"><?php echo $row['nom']; ?></div>
                <img src="../uploads/<?php echo $row['image']; ?>" alt="images">
                <div class="title pt-4 pb-1"><?php echo $row['nomCateorie']; ?></div>
                <div class="price"><?php echo $row['prix']; ?> $</div>
                <button class="button"><a href="../includes/ajouterAuPanier.inc.php?id=<?php echo $row['idPlante']; ?>">ajouter au panier</a></button>
            </div>


        </div>

<?php
    }
} else {
    echo "<h6>no data</h6>";
}
