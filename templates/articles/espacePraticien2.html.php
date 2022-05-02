<link href="../../assets/css/espacePraticien2.css" rel="stylesheet" />
<?php extract($donnesPraticien) ?>

<body class="d-flex align-items-center">

    <div class="container-fluid" style=" height: 90vh">
        <div class="row">
            <div class="col-2">
                <div class="col-10">
                    <div class="sideBar d-flex flex-column justify-content-space-between align-items-center">
                        <div class="w-100 d-flex justify-content-center ">
                            <h1 class="fs-2 fw-bold mb-4 w-100 text-center"><span><i class="bi bi-activity"></i></span>Pro<span style="color : #FF819A">MED</span></h1>
                        </div>
                        <div class="w-100">
                            <div class="menuSideBar w-100 d-flex justify-content-center align-items-center p-3">
                                <i class="bi bi-house-heart w-25 text-start"></i>
                                <span class="w-75 text-start fs-6">Mon espace</span>
                            </div>
                            <div class="menuSideBar w-100 d-flex justify-content-center align-items-center p-3">
                                <i class="bi bi-person-circle  w-25 text-start"></i>
                                <span class="w-75 text-start fs-6">Mon profil</span>
                            </div>
                            <div class="menuSideBar w-100 d-flex justify-content-center align-items-center p-3">
                                <i class="bi bi-person-rolodex w-25 text-start"></i>
                                <span class="w-75 text-start fs-6">Mes patients</span>
                            </div>
                        </div>
                        <div class="w-100">
                            <div class="menuSideBar w-100 d-flex justify-content-center align-items-center p-3">
                                <i class="bi bi-box-arrow-right  w-25 text-start"></i>
                                <span class="w-75 text-start fs-6">Déconnexion</span>
                            </div>
                        </div>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-10">
                <div class="col-12">
                    <div style="display: flex; justify-content: space-between ; align-items : center">
                        <h1 class=" fs-2 fw-bold" style="font-family: Lato, sans-serif"># DASHBOARD</h1>
                        <h2 class="fs-4 me-4" style="font-family: Lato, sans-serif">Bienvenue <?= $prenom . ' ' . strtoupper($nom) ?></h2>

                        <h4 id="affichageHeure" class="text-end me-2 fs-6" style="font-family: Lato, sans-serif">
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="main col-8">
                        <div class="container">
                            <div class="rdv rounded-3 bg-white shadow mt-4" style="font-family: Lato, sans-serif">
                                <h2 class="mesRdv fs-4">Mes rendez-vous de la journée</h2>
                            </div>
                        </div>

                        <div class="container">
                            <div class="rdv rounded-3 bg-white shadow mt-4" style="font-family: Lato, sans-serif">
                                <h2 class="mesRdv fs-4">Historiques de mes rendez-vous</h2>
                            </div>
                        </div>
                    </div>
                    <div class="main col-4">
                        <div class="container">
                            <div class="rdvAutre rounded-3 bg-white shadow mt-4" style="font-family: Lato, sans-serif">
                                <h2 class="mesRdv fs-4">Something</h2>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>



        <!-- <div class="main col-3">
                <div class="container">
                    <div class="rdv rounded-3 bg-white shadow mt-4" style="font-family: Lato, sans-serif">
                        <h2 class="mesRdv fs-4">Test</h2>
                    </div>
                </div>
            </div> -->




    </div>
</body>

<script src="../../assets/scripts/espacePraticien.js"></script>