<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Projekat iz razvoj naprednih web aplikacija">
        <meta name="keywords" content="HTML CSS JavaScript">
        <meta name="author" content="Luka Blažević Petar Šimović">
        <title>Projekt RNWA</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="asset/css/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="container">
                <div id="logo">
                    <h1>Razvoj <span class="highlight">naprednih</span> web aplikacija </h1> 
					
                </div>
                <div id="registration">
                    <ul>
                        <li><a href="#">Log in</a></li>
                        <li><a href="#">Registration</a></li>
                    </ul>
                </div>
                <nav>
                    <ui>
                        <li class="current"><a href="./">Početna</a></li>
                        <li><a href="about.html">Git-HUB</a></li>
                        <li><a href="http://fsre.sum.ba/naslovnica/">Fakultet</a></li>
                        <li><a href="?controller=korisnik&action=index">Korisnik</a></li>
                    </ui>
                </nav>
            </div>
        </header>
        <section id="back">
        <div class="container">
        <?php require_once('routes.php'); ?>
        </div>
        </section>
        <footer>
            <p>Projekt razvoj naprednih web aplikacija, Copyright &copy; 2021</p>
            <p>Petar Šimović @email: <a href="mailto:pertar.simovi@student.fsre.ba">pertar.simovi@student.fsre.ba</a></p>
            <p>Luka Blažević @email: <a href="mailto:luka.blazevic@student.fsre.ba">luka.blazevic@student.fsre.ba</a></p>
        </footer>
    </body>
</html>