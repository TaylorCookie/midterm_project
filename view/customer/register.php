<?php include '../../view/header.php'; ?>

<section class="container">
    <form action="." method="GET">
        <input type="hidden" name="action" value="register">
        <label>Please enter your first name:</label>
        <br></br>
        <input type="text" id="firstName" name="firstName" required></input>
        <button>Register</button><br></br>
    </form>
</section> 

</main>
<?php include '../../view/footer.php'; ?>