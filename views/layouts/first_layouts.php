
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/views/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/views/css/bootstrap.min.css">
    <link rel="stylesheet" href="/views/css/style.css">
    <title> </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/views/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="/views/js/script.js"></script>
</head>
<body>
<div class="container">
    <header class="row">
        <nav class="navbar navbar-expand-md sticky-top navbar-dark bg-dark col">
            <a class="navbar-brand" href="#">TaskerApp</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/task/create">New task</a>
                    </li>
                    <li class="nav-item">
                        <?php if (isset($_COOKIE['username'])) : ?>
                            <a class="nav-link" href="/login/logout">Logout</a>
                        <?php else :?>
                            <a class="nav-link" href="/login">Admin login</a>
                        <?php endif;?>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="content">
<?php
	include ($contentPage);
?>
</div>

<footer class="row bg-dark text-white pt-3 mt-3">
    <div class="col">
        <p>Copyright &copy; Beelab inc.</p>
    </div>
</footer>
</div>
</body>
</html>