<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- custome CSS file link -->
    <link rel="stylesheet" href="adminstyle2.css">
</head>
<body>
    <!-- top bar start -->
    <header class="header">
        <a class="logo" style="color:green; text-decoration: none; font-size:3rem;"><i class="fa-brands fa-pagelines"></i>&nbsp;New Leaf</a>
        <h3>admin panel</h3>
        <div class="icons">
            <div class="fa fa-user" id="login-btn"></div>
        </div>
    </header>
    <!-- top bar end -->
    <!-- sidebar start -->
    <?php 
    include("sidebar.php");
    ?>
    <!-- sidebar end -->
</body>
</html>