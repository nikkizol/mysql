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
    <h1>User:<?php echo searchGroupsArray($students, $userID)->getFirstName() ?></h1>
    <img src= <?php echo $img; ?>>
    <p> <?php var_dump(searchGroupsArray($students, $userID)) ?></p>

    <form method="post">
        <?php echo $update; ?>
        <?php echo $delete;"<br>" ?>
        <button type="submit" name="backToAllUSers" class="btn btn-primary">Go back</button>
    </form>
    <?php echo $form; ?>
</div>

<style>
    img {
        width: 250px;
        height: 250px;
    }
</style>
</body>
</html>