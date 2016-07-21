<div class="param">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                
                <!--Back Button-->
                <a href="<?php echo URL; ?>home/index">
                    <button class="btn btn-info btn-lg buy-button">Back</button>
                </a>
                
                <div class="logo" align ="center">
                    <a href="<?php echo URL; ?>home/index">
                        <img src="<?php echo URL; ?>img/shopu-mod.jpg" alt="ShopU logo"
                             style="height:100px"/>
                    </a>
                </div>

                <!-- form -->
                <form action="<?php echo URL; ?>items/additem" method="POST" enctype="multipart/form-data">

                    <!-- input fields -->
                    <label class="control-label">Title</label>
                    <input class="form-control" type="text" name="title" autocomplete="off" required/>
                    <label class="control-label">Price</label>
                    <input class="form-control" type="number" name="price" step="0.01" autocomplete="off" required/>

                    <label>Category</label>
                    <select class="form-control" name="category">
                        <option value="Furniture">Furniture</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Clothes">Clothes</option>
                        <option value="Books">Books</option>
                    </select>

                    <div class="shape-group">
                        <label>Description</label>
                        <input class="form-control" type="text" name="description" autocomplete="off" required/>
                    </div>
                    <div class="shape-group">
                        <label>Keywords</label>
                        <input class="form-control" type="text" name="keywords" autocomplete="off" required/>
                    </div>
                    <div class="shape-group">
                        <label>Image</label>
                        <input type="file" name="image"/>
                    </div><br><br>

                    <!-- submit button -->
                    <input class="form-control btn-primary" type="submit" name="submit_add_item" value="Sell Item" />
                </form>

            </div>
        </div>
    </div>
</div>
