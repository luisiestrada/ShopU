<div class="container">
    <h2>ShopU</h2>
    <div>
        <h3>Sell Item</h3>
        
        <form action="<?php echo URL; ?>items/additem" method="POST" enctype="multipart/form-data">
            <label>Title</label>
            <input type="text" name="title" required autocomplete="off" value="text"/><br><br>
            
            <label>Price</label>
            <input type="number" name="price" required autocomplete="off" value="10.00" step="0.01"/><br><br>
            
            <label>Category</label>
            <select name="category">
                <option value="Furniture">Furniture</option>
                <option value="Electronics">Electronics</option>
                <option value="Clothes">Clothes</option>
                <option value="Books">Books</option>
            </select><br><br>
            
            <label>Description</label>
            <input type="text" name="description" required autocomplete="off" value="text"/><br><br>
            
            <label>Keywords</label>
            <input type="text" name="keywords" required autocomplete="off" value="text"/><br><br>
            
            <label>Image</label>
            <input type="file" name="image"/><br><br>
            
            <!-- submit button -->
            <input type="submit" name="submit_add_item" value="Sell Item" />
        </form>
    </div>
</div>
