<?php
$conn = mysqli_connect("localhost", "root", "", "o_pepv2");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if (isset($_POST['input'])) {
    $input = $_POST['input'];
    $query = "SELECT idArticle, titreArticle, textArticle, imageArticle FROM article WHERE titreArticle LIKE '{$input}%'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='grid grid-cols-1 md:grid-cols-3 gap-4 w-4/5 m-auto my-5'>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "
    <div class='max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-center items-center p-4'>
        <a href='#'>
            <img class='rounded-t-lg w-full w-24' src='../uploads/{$row['imageArticle']}' alt='' />
        </a>
        <div class='p-5'>
            <a href='#'>
                <h5 class='mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white'>{$row['titreArticle']}</h5>
            </a>
            <p class='mb-3 font-normal text-gray-700 dark:text-gray-400'>";

            if (str_word_count($row['textArticle']) <= 5) {
                echo $row['textArticle'];
            } else {
                $pieces = explode(' ', $row['textArticle']);
                for ($i = 0; $i < 5; $i++) {
                    echo $pieces[$i] . ' ';
                }
                echo '.....';
            }
            echo "</p>
                    <a href='./blogarticle.php?idArticle={$row['idArticle']}' class='inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'>
                        Read more
                        <svg class='rtl:rotate-180 w-3.5 h-3.5 ms-2' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 14 10'>
                            <path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M1 5h12m0 0L9 1m4 4L9 9' />
                        </svg>
                    </a>
                </div>
            </div>";
        }
        echo "</div>";
    } else {
        echo "<h6 class='text-danger text-center mt-3'>Aucun Article avec ce titre</h6>";
    }
} ?>

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