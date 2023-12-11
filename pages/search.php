<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- had joj lignes 7ethom flhead diyal l'article -->
<!-- ============================================== -->
<!-- ======================Search form================================== -->
<div class="search m-10">
    <div class="text-center mt-5 mb-4">
        <h2>CHERCHER UN ARTICLE</h2>
    </div>
    <input type="text" class="form-control" id="live_search" placeholder="search ...">
</div>

<!-- ======================Search form================================== -->
<div id="resultat"></div>
<!-- =========================================================================== -->
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
<?php
$conn = mysqli_connect("localhost", "root", "", "o_pepv2");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>
<?php
if (isset($_POST['input'])) {
    $input = $_POST['input'];
    $query = "SELECT * FROM article WHERE titreArticle LIKE '{$input}%'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='container'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='max-w-sm bg-white border border-gray-200 rounded-lg shadow mb-4 text-center'>
                    <img class='rounded-t-lg' src='{$row['imageArticle']}' alt='Image' />
                    <div class='p-5'>
                        <h5 class='mb-2 text-2xl font-bold tracking-tight text-gray-900'>{$row['titreArticle']}</h5>
                        <p class='mb-3 font-normal text-gray-700'>{$row['textArticle']}</p>
                    </div>
                </div>";
        }
        echo "</div>";
    } else {
        echo "<h6 class='text-danger text-center mt-3'>Aucun Article avec ce titre</h6>";
    }
}
?>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        max-width: 80%;
        margin: auto;
        padding: 20px;
    }

    .text-center {
        text-align: center;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        margin-bottom: 10px;
    }

    #resultat {
        margin-top: 20px;
    }

    .max-w-sm {
        max-width: 20rem;
    }

    .bg-white {
        background-color: #fff;
    }

    .border {
        border-width: 1px;
    }

    .rounded-lg {
        border-radius: 0.375rem;
    }

    .shadow {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .rounded-t-lg {
        border-top-left-radius: 0.375rem;
        border-top-right-radius: 0.375rem;
    }

    .p-5 {
        padding: 1.25rem;
    }

    .mb-2 {
        margin-bottom: 0.5rem;
    }

    .text-2xl {
        font-size: 1.5rem;
        line-height: 2rem;
    }

    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        max-width: 80%;
        margin: auto;
        padding: 20px;
    }

    .text-center {
        text-align: center;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        margin-bottom: 10px;
    }

    #resultat {
        margin-top: 20px;
    }

    .max-w-sm {
        max-width: 20rem;
    }

    .bg-white {
        background-color: #fff;
    }

    .border {
        border-width: 1px;
    }

    .rounded-lg {
        border-radius: 0.375rem;
    }

    .shadow {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .rounded-t-lg {
        border-top-left-radius: 0.375rem;
        border-top-right-radius: 0.375rem;
    }

    .p-5 {
        padding: 1.25rem;
    }

    .mb-2 {
        margin-bottom: 0.5rem;
    }

    .text-2xl {
        font-size: 1.5rem;
        line-height: 2rem;
    }

    .font-bold {
        font-weight: 700;
    }

    .tracking-tight {
        letter-spacing: -0.01562em;
    }

    .text-gray-900 {
        color: #1a202c;
    }

    .mb-3 {
        margin-bottom: 0.75rem;
    }

    .font-normal {
        font-weight: 400;
    }

    .text-gray-700 {
        color: #4a5568;
    }

    .text-danger {
        color: #dc3545;
    }
</style>
<?php
 $conn = mysqli_connect("localhost", "root", "", "o_pepv2");

 if (mysqli_connect_errno()) {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     exit();
 }
 ?><?php
    if (isset($_POST['input'])) {
        $input = $_POST['input'];
        $query = "SELECT * FROM article WHERE titreArticle LIKE '{$input}%'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<div class='container'>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='max-w-sm bg-white border border-gray-200 rounded-lg shadow mb-4 text-center'>
                    <img class='rounded-t-lg' src='{$row['imageArticle']}' alt='Image' />
                    <div class='p-5'>
                        <h5 class='mb-2 text-2xl font-bold tracking-tight text-gray-900'>{$row['titreArticle']}</h5>
                        <p class='mb-3 font-normal text-gray-700'>{$row['textArticle']}</p>
                    </div>
                </div>";
            }
            echo "</div>";
        } else {
            echo "<h6 class='text-danger text-center mt-3'>Aucun Article avec ce titre</h6>";
        }
    }
    ?>
<!-- =========================script ajax==================================== -->

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
                    }
                });
            } else {
                $("#resultat").css("display", "none");
            }
        });
    });
</script>