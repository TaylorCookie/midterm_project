<?php
require_once('../../model/util/secure_conn.php');

if(isset($login_message)) {
    echo $login_message;
}
?>

<section class="container">
    <h2>Login</h2>
    <form action="." method="post">
    <input type="hidden" name="action" value="login">
        <div class='row container'>
            <label>Username:</label>
        </div>
        <div class='row container'>
            <input type="text" id="username" name="username" required>
        </div>
        <div class='row container'>
            <label>Password:</label>
        </div>
        <div class='row container'>
            <input type="text" id="password" name="password" required>
        </div>
        <div class='row container'>
            <button>Submit</button><br></br>
        </div>
    </form>
</section> 

