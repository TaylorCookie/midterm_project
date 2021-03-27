<?php include '../../view/header.php'; ?>

<section class="container">
    <h1>Thank you for signing out, <?php echo($_SESSION['userid']) ?>.</h1>

    <form action="." method="post">
        <input type="hidden" name="action" value="default">
        <button>Vehicles List</button>
    </form>
<section>

</main>
<?php include '../../view/footer.php'; ?>