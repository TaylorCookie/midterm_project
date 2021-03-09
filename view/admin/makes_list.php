<?php include '../../view/header.php'; ?>

<section class="container">
    <!-- Display a table of items -->
    <h2>Makes</h2>
    <table>
        <tr>
            <!--<th>Make ID</th>-->
            <th>Make</th>
            <th>Remove</th>
        </tr>
        <?php foreach ($makes as $product) : ?>
        <tr>
            <!--<td><?php //echo $product['make_id']; ?></td>-->
            <td><?php echo $product['make']; ?></td>
            <td><form action="." method="post">
                <input type="hidden" name="action" value="delete_make">
                <input type="hidden" name="id" value="<?php echo $product['make_id']; ?>">
                <input type="submit" value="Delete">
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
</section><br></br>

<section class="container">
    <h2>Add New Make:</h2>
    <form action="." method="post">
    <input type="hidden" name="action" value="add_make">
    <table>
        <tr>
            <th>Make Name</th>
        </tr>
        <tr>
            <td><input type="text" id="make" name="make" required></td>
        </tr>                
    </table>
        <button>Submit</button><br></br>
    </form>
</section> 

<section class="container">

<form action="." method="post">
<input type="hidden" name="action" value="types">
<button>View Types</button>
</form>

<form action="." method="post">
<input type="hidden" name="action" value="class">
<button>View Classes</button>
</form>

<form action="." method="post">
<input type="hidden" name="action" value="vehicles">
<button>View Vehicles</button>
</form>

</section>
</main>
<?php include '../../view/footer.php'; ?>