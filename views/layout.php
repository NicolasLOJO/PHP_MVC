<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <script type='text/javascript' src="asset/js/materialize.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <link href="asset/css/style.css" type="text/css" rel="stylesheet">
    <title><?= $title ?></title>
</head>
<body>
    <header>
        <nav>
            <div class="nav-wrapper">
                <a href="/Php_MVC/Blog_test" class="brand-logo"><?= $title ?></a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a class="mail" href="?controller=posts&action=index"><i class="medium material-icons left navmail">comment</i><span class="navtext">Posts</span></a></li>
                    <li><a class="mail" href="?controller=annonce&action=index"><i class="medium material-icons left navmail">collections</i><span class="navtext">Annonces</span></a></li>
                    <?php
                    if (isset($_SESSION['connected']) && $_SESSION['connected'] == true){
                    ?>
                        <li><a class ="mail" href="?controller=Connected&action=mail"><i class="medium material-icons left navmail">email</i><span class="navtext">Message<span></a></li>
                        <li><a class="mail" href="?controller=Connected&action=member"><i class="medium material-icons left navmail">account_circle</i><span class="navtext">Espace Membre</span></a></li>
                        <li><a class="logout"><i class="medium material-icons left navmail">power_settings_new</i>Deconnexion(<?= $_SESSION['Username'] ?>)</a></li>
                    <?php
                    } else {
                    ?>
                        <li><a href="?controller=Connected&action=login">Connexion</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>

        <ul class="sidenav" id="mobile-demo">
            <li><a href="?controller=posts&action=index">Posts</a></li>
            <li><a href="?controller=annonce&action=index">Annonces</a></li>
            <?php
                if (isset($_SESSION['connected']) && $_SESSION['connected'] == true){
            ?>
            <li><a href="?controller=Connected&action=mail"><i class="material-icons">email</i>Message</a></li>
            <li><a href="?controller=Connected&action=member">Espace utilisateur</a></li>
            <li><a class="logout">Deconnexion(<?= $_SESSION['Username'] ?>)</a></li>
            <?php
                } else {
            ?>
            <li><a href="?controller=Connected&action=login">Connexion</a></li>
            <li><a href="?controller=Connected&action=signup">Inscription</a></li>
            <?php
                }
            ?>
        </ul>
            
    </header>
        <div id="main" class="container">
            <?php require_once('route.php'); ?>
        </div>
    <footer class="page-footer bottom">
        <div class="container">
            <div class="row">
            <div class="col l6 s12">
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Posts</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Annonces</a></li>
                </ul>
            </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
            © 2018 Copyright Niko
            </div>
        </div>
    </footer>
 <script type='text/javascript' src="asset/js/jquery.js"></script>
</body>

</html>