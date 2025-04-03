<!DOCTYPE html>
<html>

<head>
    <title>Cart</title>
</head>

<body>
    <h1>Your Cart</h1>
    <ul>
        <?php foreach ($cartItems as $item): ?>
        <li><?php echo $item['product_id']; ?> - Quantity: <?php echo $item['quantity']; ?></li>
        <form action="/admin/cart/update/<?php echo $item['id']; ?>" method="post">
            <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>">
            <button type="submit">Update</button>
        </form>
        <form action="/admin/cart/delete/<?php echo $item['id']; ?>" method="post">
            <button type="submit">Delete</button>
        </form>
        <?php endforeach; ?>
    </ul>
    <form action="/admin/cart/add" method="post">
        <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
        <input type="number" name="product_id" placeholder="Product ID">
        <input type="number" name="quantity" placeholder="Quantity">
        <button type="submit">Add to Cart</button>
    </form>
</body>

</html>