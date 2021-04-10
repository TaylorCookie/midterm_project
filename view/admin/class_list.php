<?php 
include '../../view/admin/header.php'; 
?>


<section class="container">
    <!-- Display a table of items -->
    <h2>Classes</h2>
    <table>
        <tr>
            <!--<th>Class ID</th>-->
            <th>Class</th>
            <th>Remove</th>
        </tr>
        <?php foreach ($class as $product) : ?>
        <tr>
            <!--<td><?//php echo $product['class_id']; ?></td>-->
            <td><?php echo $product['class']; ?></td>
            <td><form action="." method="post">
                <input type="hidden" name="action" value="delete_class">
                <input type="hidden" name="id" value="<?php echo $product['class_id']; ?>">
                <input type="submit" value="Delete">
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
</section><br></br>

<section class="container">
    <h2>Add New Class:</h2>
    <form action="." method="post">
    <input type="hidden" name="action" value="add_class">
    <table>
        <tr>
            <th>Class Name</th>
        </tr>
        <tr>
            <td><input type="text" id="class" name="class" required></td>
        </tr>                
    </table>
        <button>Submit</button><br></br>
    </form>
</section> 

</main>
<?php include '../../view/admin/footer.php'; ?>