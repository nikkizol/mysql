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
    <h1>Login</h1>
    <form action="index.php" method="post">
        <fieldset>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" class="form-control"
                           value="<?php echo $_SESSION["email"]; ?>">
                </div>
            </div>
            <div>
                <div class="form-group col-md-6">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control"
                           value="">
                    <span class="good"><?php echo $ERROR; ?></span>
                </div>
            </div>
        </fieldset>
        <button type="submit" name="submit" class="btn btn-primary">Log in</button>
    </form>
    <br>
    <form method="get">
        <button type="submit" name="register" class="btn btn-primary">Register</button>
    </form>
</div>

<style>
    footer {
        text-align: center;
    }
</style>
</body>
</html>
