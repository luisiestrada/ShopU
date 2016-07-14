<div class="container">
    <h2>ShopU</h2>
    <!-- add user form -->
    <div>
        <h3>Register</h3>
        <form action="<?php echo URL; ?>users/adduser" method="POST" enctype="multipart/form-data">
            <label>SFSU ID</label>
            <input autofocus type="text" name="student_id" required autocomplete="off" value="text"/><br><br>
            <label>Username</label>
            <input type="text" name="username" required autocomplete="off" value="text"/><br><br>
            <label>SFSU Email</label>
            <input type="text" name="email" required autocomplete="off" value="text"/><br><br>
            <label>Password</label>
            <input type="password" name="password" required autocomplete="off" value="text"/><br><br>
            <label>Profile picture</label>
            <input type="file" name="image"/><br><br>
            <input type="submit" name="submit_add_user" value="Sign up" />
        </form>
    </div>
</div>
