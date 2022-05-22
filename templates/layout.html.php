<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/favicon.png" />


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;400&display=swap" rel="stylesheet">

    <!-- Css de base  -->
    <link href="./assets/css/styles.css" rel="stylesheet" />


    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

    <!-- Formulaire François -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <!-- Calendrier supprimé-->

    <!-- Formulaire Sacha -->


    <title><?= $pageTitle ?></title>
</head>

<body>
    <nav class="d-flex justify-content-center align-items-center shadow p-3 mb-5 bg-body">
        <a href="/index.php" class="text-decoration-none text-reset d-flex justify-content-center align-items-center ">
            <img id='logo' src="assets/images/logoEntete.png" alt="logo" class="w-25 p-3" />
            <h1 class="fs-2 ">PRO<strong class="fs-1 fw-bold font-monospace">MED</strong></h1>
        </a>
    </nav>
    <?= $pageContent ?>
</body>

</html>