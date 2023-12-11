<?php
require "header.php";
?>
<main class="signup-form">

    <form class="" action="../includes/signup.inc.php" method="post">
        <div class="form-signup">
            <h1 class="form-title">Sign Up</h1>
            <input type="text" name="uid" class="form-input" placeholder="Your Name" value="<?php echo isset($_GET['uid']) ? $_GET['uid'] : ''; ?>">
            <input type="text" name="email" class="form-input" placeholder="Email" value="<?php echo isset($_GET['email']) ?  $_GET['email'] : "" ?>">
            <input type="password" name="password" class="form-input" placeholder="Password">
            <input type="password" name="password-repeat" class="form-input" placeholder="Repeat Password">
            <button type="submit" name="signup-submit" class="form-button">suivant</button>
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyfields") {
                    echo '<p class="error">fill the inputs</p>';
                } elseif ($_GET['error'] == "invalidemailUid") {
                    echo '<p class="error">email and username not valid</p>';
                } elseif ($_GET['error'] == "invalidemail") {
                    echo '<p class="error">email not valid</p>';
                } elseif ($_GET['error'] == "invaliduid") {
                    echo '<p class="error"> username not valid</p>';
                } 
                elseif ($_GET['error'] == "passwordcheck") {
                    echo '<p class="error">Passwords do not match</p>';
                }
                elseif ($_GET['error'] == "usertaken") {
                    echo '<p class="error">email already taken</p>';
                }
            } elseif (isset($_GET['signup']) == "success") {
                echo '<p class="success">Sign up Successfully</p>';
            }

            ?>
        </div>
    </form>

</main>
<?php
require "footer.php";
?>