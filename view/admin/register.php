<?php 
include '../../view/admin/header.php'; 
?>

    <?php if (isset($errors)) { ?>
        <?php foreach ($errors as $product) : ?>
            <?php echo array_pop($errors); ?><br></br>
        <?php endforeach; ?>
    <?php } ?>

    <section class="container">
        <h2>Register</h2>
        <form action="." method="post">
        <input type="hidden" name="action" value="register">
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
                <label>Confirm Password:</label>
            </div>
            <div class='row container'>
                <input type="text" id="confirm_password" name="confirm_password" required>
            </div>
            <div>
                <button>Submit</button><br></br>
            </div><br></br>
        </form>
    </section> 

</main>
<?php include '../../view/admin/footer.php'; ?>