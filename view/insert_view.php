<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Insert</title>
</head>
<body>
<div class="container">
    <h1>Your info</h1>
    <form method="post">
        <fieldset>
            <legend>Your info</legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="f_name">First Name:</label>
                    <input type="text" name="f_name" id="f_name" class="form-control"
                           value="<?php echo $_SESSION["f_name"]; ?>">
                    <span class="error"><?php echo $f_nameErr; ?></span>
                    <span class="good"><?php echo $f_nameG; ?></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="l_name">Last Name:</label>
                    <input type="text" id="l_name" name="l_name" class="form-control"
                           value="<?php echo $_SESSION["l_name"]; ?>">
                    <span class="error"><?php echo $lnameErr; ?></span>
                    <span class="good"><?php echo $lnameG; ?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" class="form-control"
                           value="<?php echo $_SESSION["email"]; ?>">
                    <span class="error"><?php echo $emailErr; ?></span>
                    <span class="good"><?php echo $emailG; ?></span>
                </div>
            </div>
            <div>
                <div class="form-group col-md-6">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control"
                           value="">
                    <span class="error"><?php echo $passwordErr; ?></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="cpassword">Password Confirmation:</label>
                    <input type="password" id="cpassword" name="cpassword" class="form-control"
                           value="">
                    <span class="error"><?php echo $cpasswordErr; ?></span>
                </div>
            </div>
        </fieldset>
        <button type="submit" name="submit" class="btn btn-primary">Register</button>
    </form>
    <br>
    <form method="post">
        <button type="submit" name="loginPage" class="btn btn-primary">Login page</button>
    </form>
</div>

<style>
    footer {
        text-align: center;
    }
</style>
</body>
</html>