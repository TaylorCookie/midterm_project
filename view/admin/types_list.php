<?php include '../../view/header.php'; ?>

<section class="container">
    <!-- Display a table of items -->
    <h2>Types</h2>
    <table>
        <tr>
            <!--<th>Type ID</th>-->
            <th>Type</th>
            <th>Remove</th>
        </tr>
        <?php foreach ($types as $product) : ?>
        <tr>
            <!--<td><?//php echo $product['type_id']; ?></td>-->
            <td><?php echo $product['types']; ?></td>
            <td><form action="." method="post">
                <input type="hidden" name="action" value="delete_type">
                <input type="hidden" name="id" value="<?php echo $product['type_id']; ?>">
                <input type="submit" value="Delete">
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
</section><br></br>

<section class="container">
    <h2>Add New Type:</h2>
    <form action="." method="post">
    <input type="hidden" name="action" value="add_type">
    <table>
        <tr>
            <th>Type Name</th>
        </tr>
        <tr>
            <td><input type="text" id="type" name="type" required></td>
        </tr>                
    </table>
        <button>Submit</button><br></br>
    </form>
</section> 

<section class="container">

<form action="." method="post">
<input type="hidden" name="action" value="class">
<button>View Classes</button>
</form>

<form action="." method="post">
<input type="hidden" name="action" value="makes">
<button>View Makes</button>
</form>

<form action="." method="post">
<input type="hidden" name="action" value="vehicles">
<button>View Vehicles</button>
</form>

</section>
</main>
<?php include '../../view/footer.php'; ?>