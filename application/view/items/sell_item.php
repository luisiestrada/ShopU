<div class="param">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">

                <!--Back Button-->
                <!--User will go to previous page they were browsing clicking back button-->
                <button type="button" onclick="goBack()" class="btn btn-info btn-lg buy-button">Back</button>

                <div class="logo" align ="center">
                    <a href="<?php echo URL; ?>home/index">
                        <img src="<?php echo URL; ?>img/shopu-mod.png" alt="ShopU logo"/>
                    </a>
                </div>
                <div class="shape-group text-center">
                    <h2>Sell Item</h2>
                </div>

                <form action="<?php echo URL; ?>items/additem" method="POST" enctype="multipart/form-data" class="form">
                
                    <!-- input fields -->
                    <div class="form-group">
                        <label for="title" class="control-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" 
                               autocomplete="off" required/>
                    </div>
                    <div class="form-group">
                        <label for="price" class="control-label">Price</label>
                        <input type="number" name="price" id="price" class="form-control"
                               step="0.01" min="0.01" autocomplete="off" required/>
                    </div>
                    <div class="form-group">
                        <label for="category" class="control-label">Category</label>
                        <select name="category" id="category" class="form-control">
                            <?php foreach ($categories as $cat) { ?>
                                <option value="<?php echo $cat->category; ?>"><?php echo $cat->category; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="keywords">Keywords</label>
                        <input type="text" name="keywords" id="keywords" class="form-control" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image"/>
                    </div>
                    <br><br>

                    <!-- submit button -->
                    <input class="form-control btn-primary" type="submit" name="submit_add_item" value="Submit to Sell Item" />
                
                </form>
            </div>
        </div>
    </div>
</div>
