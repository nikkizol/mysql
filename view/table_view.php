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
    <h1>All users</h1>
    <table id ='customers'>
        <tbody>
        <td>ID</td>
        <td>FIRST NAME</td>
        <td>LAST NAME</td>
        <td>EMAIL</td>
        <td>CREATED AT</td>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?php echo $student->getId(); ?></td>
                <td><?php echo $student->getFirstName(); ?></td>
                <td><?php echo $student->getLastName(); ?></td>
                <td><?php echo $student->getEmail(); ?></td>
                <td><?php echo $student->getCreatedAt(); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <form method="post">
        <button type="submit" name="all_users" class="btn btn-primary">Show all users</button>
    </form>
</div>

<style>
    .container {
        width: 50%;
    }
    #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
</style>
</body>
</html>