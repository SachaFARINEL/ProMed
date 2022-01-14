<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;400&display=swap" rel="stylesheet">

    <link href="/assets/css/styles.css" rel="stylesheet" />

    <!-- Bootstrap -->


    <!-- Formulaire François -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="/assets/scripts/formulaireP.js"></script>

    <!-- Formulaire Sacha -->


    <title>proMED - <?= $pageTitle ?></title>
</head>

<body>

    <nav>

        <a href="./?action=accueil">
            <img id='logo' src="assets/images/logoEntete.png" alt="logo" />
            <h1>PRO<strong>MED</strong></h1>
        </a>

    </nav>

    <?= $pageContent ?>

</body>

</html>