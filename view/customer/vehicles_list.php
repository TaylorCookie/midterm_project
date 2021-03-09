<?php include '../../view/header.php'; ?>

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



<table>
    <tr>
        <th>Year</th>
        <th>Model</th>
        <th>Price</th>
        <th>Type</th>
        <th>Class</th>
        <th>Make</th>
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
    </tr>
    <?php endforeach; ?>
</table>
    </div>


</main>
<?php include '../../view/footer.php'; ?>