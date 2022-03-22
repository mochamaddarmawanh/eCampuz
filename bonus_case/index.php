<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>

<body class="text-center">

    <?php

    include('code/login.php');

    ?>

    <main class="form-signin">
        <form method="POST">
            <img class="mb-4" src="https://media-exp1.licdn.com/dms/image/C560BAQFsAwcZGZTfTQ/company-logo_200_200/0/1611203188008?e=2147483647&v=beta&t=OU-FaefiTZKxNKXJSGpCuYei--BM5GFvV1vuPBKJqWQ" alt="" width="72" height="70">
            <h1 class="h3 mb-3 fw-normal">Login</h1>

            <?php echo $message ?>

            <div class="form-floating">
                <input type="text" class="form-control" name="username" placeholder="Username">
                <label>Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <label>Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-danger" type="submit" name="login" value="login">Login</button>
            <p class="mt-3 mb-3 text-muted">&copy; 2022</p>
        </form>
    </main>



</body>

</html>