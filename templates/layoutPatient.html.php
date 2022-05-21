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
    <link href="./assets/css/espacePraticien.css" rel="stylesheet" />
    <link href="./assets/css/listes.css" rel="stylesheet" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

    <!-- Formulaire François -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>


    <title><?= $pageTitle ?></title>
</head>



<body class="d-flex align-items-center" style="background: #FAFAFF">
    <div class="container-fluid" style=" height: 90vh">
        <div class="row">
            <div class="col-2">
                <div class="col-10">
                    <div class="sideBar d-flex flex-column justify-content-space-between align-items-center">
                        <div class="w-100 d-flex justify-content-center ">
                            <h1 class="fs-2 fw-bold mb-4 w-100 text-center"><span><i class="bi bi-activity"></i></span>Pro<span style="color : #FF819A">MED</span></h1>
                        </div>
                        <div class="w-100">
                            <a class="liensEspace" href="./?controller=patient&task=showEspace">
                                <div class="menuSideBar w-100 d-flex justify-content-center align-items-center p-3">
                                    <i class="bi bi-house-heart w-25 text-start"></i>
                                    <span class="w-75 text-start fs-6">Mon espace</span>
                                </div>
                            </a>

                            <a class="liensEspace" href="./?controller=patient&task=profilPatient">
                                <div class="menuSideBar w-100 d-flex justify-content-center align-items-center p-3">
                                    <i class="bi bi-person-circle  w-25 text-start"></i>
                                    <span class="w-75 text-start fs-6">Mon profil</span>
                                </div>
                            </a>
                            <a class="liensEspace" href="./?controller=patient&task=pagePourRechercherUnPraticien">
                                <div class="menuSideBar w-100 d-flex justify-content-center align-items-center p-3">
                                    <i class="bi bi-person-rolodex w-25 text-start"></i>
                                    <span class="w-75 text-start fs-6">Prendre rendez-vous</span>
                                </div>
                            </a>
                        </div>
                        <div class="w-100">
                            <a class="liensEspace" href="./?controller=patient&task=logout">
                                <div class="menuSideBar w-100 d-flex justify-content-center align-items-center p-3">
                                    <i class="bi bi-box-arrow-right w-25 text-start"></i>
                                    <span class="w-75 text-start fs-6">Déconnexion</span>
                                </div>
                            </a>
                        </div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-10">
                <div class="col-12">
                    <div style="display: flex; justify-content: space-between ; align-items : center">
                        <h1 class=" fs-2 fw-bold" style="font-family: Lato, sans-serif">#
                            <?= $nomPartie ?>
                        </h1>
                        <h2 class="fs-4 me-4" style="font-family: Lato, sans-serif">
                            <?= $_SESSION['prenom'] . ' ' . strtoupper($_SESSION['nom']) ?>
                        </h2>

                        <h4 id="affichageHeure" class="text-end me-2 fs-6" style="font-family: Lato, sans-serif">
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <?= $contenuEspacePraticien ?>
                </div>
            </div>
        </div>
    </div>


    <!-- date & heure -->
    <script src="./assets/scripts/dateHeure.js"></script>
    <!-- Rechercher un praticien + AJAX -->
    <script src="./assets/scripts/recherchePraticien.js"></script>
</body>

</html>