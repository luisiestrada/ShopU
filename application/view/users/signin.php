<div class="param">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                
                <!--Back Button-->
                <button type="button" onclick="goBack()" class="btn btn-info btn-lg buy-button">Back</button>
                
                <div class="logo" align="center">
                    <a href="<?php echo URL; ?>home/index">
                        <img src="<?php echo URL; ?>img/shopu-mod.jpg" alt="ShopU logo" />
                    </a>
                </div>
                
                <form action="<?php echo URL; ?>users/signinuser" method="POST">
                    <div class="shape-group text-center">
                        <h2>Sign in</h2>
                    </div>

                    <!-- input fields -->
                    <div class="shape-group">
                        <label>Username</label>
                        <input name="username" type="text" maxlength="50"
                               autocomplete="off" class="form-control" required>
                    </div>
                    <div class="shape-group">
                        <label>Password</label>
                        <input name="password" type="password" maxlength="25"
                               autocomplete="off" class="form-control" required>
                    </div><br>

                    <!-- sign in -->
                    <div class="shape-group">
                        <button name="signup" type="submit" class="btn btn-warning btn-block">Sign in</button>
                    </div>

                    <!-- create an account -->
                    <div class="shape-group div">
                        <hr class="pos-left">New to site?<hr class="pos-right">
                    </div>
                    <p class="shape-group"><a href="<?php echo URL; ?>users/signup" class="btn btn-info btn-block">Create an account</a></p>

                    <!-- terms & conditions -->
                    <p class="shape-group text-center">By signing in you are agreeing to our 
                        <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a>.</p>
                </form>
            </div>
        </div>
    </div>
</div>
