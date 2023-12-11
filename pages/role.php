<?php
require "header.php";
?>
<form action="../includes/role.inc.php" method="post">
    <div class="form-signup">
        <h1 class="form-title">Sign Up</h1>
        <select name="role" class="choix">
            <option value="1">Admin</option>
            <option value="2">Client</option>
        </select>
        <button type="submit" name="role-submit" class="form-button">sign up</button>
    </div>
</form>


<?php
require "footer.php";
?>