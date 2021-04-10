<?php 
include '../../view/admin/header.php'; 
?>

<div class="container">
    <form action="." method="post">
    <input type="hidden" name="action" value="sort_category">
        
        <div class="select-box">
            <select class="col-md-6" id="type_name" name="type_name">
                <option>View All Types</option>
            <?php 
            $types = get_types();
            foreach ($types as $product) : ?>
                <option><?php echo $product['types']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        
        <div class="select-box">
            <select class="col-md-6" id="class_name" name="class_name">
                <option>View All Classes</option>
            <?php 
            $class = get_classes();
            foreach ($class as $product) : ?>
                <option><?php echo $product['class']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        
        <div class="select-box">
            <select class="col-md-6" id="make_name" name="make_name">
                <option>View All Makes</option>
            <?php 
            $make = get_makes();
            foreach ($make as $product) : ?>
                <option><?php echo $product['make']; ?></option>
            <?php endforeach; ?>
            </select> 
        </div>

    <div class="container radio">
        <div class="row radio-row">
            <p class="sort-title">Sort:</p>
            <div class="radio-buttons">
                <input type="radio" id="price" name="price" value="price">
                <label for="price">Price</label>
                <input type="radio" id="year" name="year" value="year">
                <label for="year">Year</label>
            </div>
                <button class="sort-button">Submit</button>
            </form>
        </div>
    </div>
</div>

<section class="container">
    <!-- Display a table of items -->
    <table>
        <tr>
            <th>Year</th>
            <th>Model</th>
            <th>Price</th>
            <th>Type</th>
            <th>Class</th>
            <th>Make</th>
            <th>Remove</th>
        </tr>
        <?php foreach ($vehicles as $product) : ?>
        <tr>
            <td><?php echo $product['year']; ?></td>
            <td><?php echo $product['model']; ?></td>
            <td>$<?php echo $product['price']; ?></td>
            <?php $type_name = get_type_name($product['type_id']);?>
            <td><?php echo $type_name; ?></td>
            <?php $class_name = get_class_name($product['class_id']);?>
            <td><?php echo $class_name; ?></td>
            <?php $make_name = get_make_name($product['make_id']);?>
            <td><?php echo $make_name; ?></td>
            <td><form action="." method="post">
                <input type="hidden" name="action" value="delete_vehicle">
                <input type="hidden" name="id" value="<?php echo $product['vehicle_id']; ?>">
                <input type="submit" value="Delete">
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
</section> <br></br>

<section class="container">
    <h2>Add New Vehicle:</h2>
    <form action="." method="post">
    <input type="hidden" name="action" value="add_vehicle">

        <h3>Year</h3>
        <input class="col-md-6 vehicle-input" type="text" id="year" name="year" required>

        <h3>Model</h3>
        <input class="col-md-6 vehicle-input" type="text" id="model" name="model" required>
        
        <h3>Price</h3>
        <input class="col-md-6 vehicle-input" type="text" id="price" name="price" required>
        
        <h3>Type</h3>
        <select class="col-md-6 vehicle-input" id="type_name" name="type_name" required>
        <?php 
        $types = get_types();
        foreach ($types as $product) : ?>
            <option><?php echo $product['types']; ?></option>
        <?php endforeach; ?>
        </select>
        
        <h3>Class</h3>
        <select class="col-md-6 vehicle-input" id="class_name" name="class_name" required>
        <?php 
        $class = get_classes();
        foreach ($class as $product) : ?>
            <option><?php echo $product['class']; ?></option>
        <?php endforeach; ?>
        </select>
        
        <h3>Make</h3>
        <select class="col-md-6 vehicle-input" id="make_name" name="make_name" required>
        <?php 
        $make = get_makes();
        foreach ($make as $product) : ?>
            <option><?php echo $product['make']; ?></option>
        <?php endforeach; ?>
        </select><br></br>  

        <button>Submit</button>
    </form>
</section> <br></br>

</main>
<?php include '../../view/admin/footer.php'; ?>