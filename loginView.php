<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>Home</title>

    <?php
    require('nonUserNav.php');
    ?>
  </head>
  <body>
    <div class="container" style="background-color: red">
        <h1>Login</h1>
        <form action="checkLogin.php" method="post">
            <div class="form-group">
                <label>User Name</label>
                <input type="userName" name="user_name" class="form-control" placeholder="Enter User Name" require>
            </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="user_password"class="form-control" id="exampleInputPassword1" placeholder="Password" require>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <form action="createAccount.php">
        <button type="submit" class="btn btn-primary">Create Account </button>
        </form>
       
    </div>
 </body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>