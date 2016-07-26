<div class="param">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                
                <!--Back Button-->
                <button type="button" onclick="goBack()" class="btn btn-info btn-lg buy-button">Back</button>
                
                <div class="logo" align ="center">
                    <a href="<?php echo URL; ?>home/index">
                        <img src="<?php echo URL; ?>img/shopu-mod.jpg" alt="ShopU logo"
                             style="height:100px"/>
                    </a>
                </div>

                <!-- form -->
                <form action="<?php echo URL; ?>items/additem" method="POST" enctype="multipart/form-data">

                    <!-- input fields -->
                    <label for="title" class="control-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" autocomplete="off" required/>
                    <label for="price" class="control-label">Price</label>
                    <input type="number" name="price" id="price" class="form-control" step="0.01" min="0.01" autocomplete="off" required/>

                    <label for="category" class="control-label">Category</label>
                    <select name="category" id="category" class="form-control">
                        <option value="Furniture">Furniture</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Clothes">Clothes</option>
                        <option value="Books">Books</option>
                    </select>

                    <div class="shape-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                    <div class="shape-group">
                        <label for="keywords">Keywords</label>
                        <input type="text" name="keywords" id="keywords" class="form-control" autocomplete="off"/>
                    </div>
                    <div class="shape-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image"/>
                    </div>
                    <br><br>

                    <!-- submit button -->
                    <input class="form-control btn-primary" type="submit" name="submit_add_item" value="Sell Item" />
                </form>

            </div>
        </div>
    </div>
</div>
