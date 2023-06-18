<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Naviluxe</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">




</head>

<body id="page-top">


    <div id="wrapper">

        <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #fbe086;">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3 text-dark">Admin</div>
            </a>



            <li class="nav-item active">
                <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <form action="" method="post">
                            <button class="collapse-item" style="border: none;background:#fff;" type="submit">Dashboard</button>
                        </form>
                        <form action="" method="post">
                            <button class="collapse-item" style="border: none;background:#fff;" type="submit" name="form-agence">Ajouter des agences</button>
                        </form>

                        <form action="" method="post">
                            <button class="collapse-item" style="border: none;background:#fff;" type="submit" name="liste_agence">Liste des agences</button>
                        </form>

                        <form action="" method="post">
                            <button class="collapse-item" style="border: none;background:#fff;" type="submit" name="liste_paiement">Gestion des paiements</button>
                        </form>

                        <a class="collapse-item" href="ChatApps-admin/users.php">Messenger</a>
                        <a class="collapse-item" href="../index.php" target="_blank">Accueil de site</a>
                        <form action="deconnexion.php" method="post">
                            <button class="collapse-item" style="border: none;background:#fff;" type="submit" name="deconnexion">Deconnexion</button>
                        </form>

                    </div>
                </div>
            </li>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">



                <div class="container-fluid">
                    <?php
                    include_once("ajouter_agence.php");
                    echo $output;
                    ?>
                </div>
                <div class="container-fluid" style="margin-top: 5%;">
                    <?php
                    include_once("ajouter_agence.php");

                    if ($liste != "") {
                    ?>
                        <h2 style="margin-top:4%;border-left:8px solid #fbe086;padding-left:5px;margin-bottom:3%;">Liste des agences</h2>

                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" style="margin-top: 5%;" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="th-sm">Nom agence

                                    </th>
                                    <th class="th-sm">Nom de gerant

                                    </th>
                                    <th class="th-sm">Adresse

                                    </th>
                                    <th class="th-sm">Ville

                                    </th>
                                    <th class="th-sm">Operation

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $liste; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nom agence
                                    </th>
                                    <th>Nom de gerant
                                    </th>
                                    <th>Adresse
                                    </th>
                                    <th>Ville
                                    </th>
                                    <th>Operation
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    <?php
                    }

                    ?>
                </div>

                <div class="container-fluid" style="margin-top: 5%;">
                    <?php
                    include_once("gestion_paiement.php");
                    if ($listPaiement != "" || $listAlreadyPaye != "") {
                    ?>
                        <h2 style="margin-top:4%;border-left:8px solid #fbe086;padding-left:5px;margin-bottom:3%;">Les paiements qui ne sont pas versés</h2>

                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm"  cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="th-sm">Nom agence

                                    </th>
                                    <th class="th-sm">Total de prix (DH)

                                    </th>
                                   
                                    <th class="th-sm">Operation

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $listPaiement; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nom agence
                                    </th>
                                    <th>Total de prix (DH)
                                    </th>
                                    <th>Operation
                                    </th>
                                </tr>
                            </tfoot>
                        </table>

                        <h2 style="margin-top:4%;border-left:8px solid #fbe086;padding-left:5px;margin-bottom:3%;">Les paiements qui sont déjà versés</h2>

                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm"  cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="th-sm">Nom agence

                                    </th>
                                    <th class="th-sm">Total de prix (DH)

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $listAlreadyPaye; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nom agence
                                    </th>
                                    <th>Total de prix (DH)
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    <?php
                    }
                    if($listPaiement =="" && $list == "" && $listAlreadyPaye==""){
                        echo $dashbord;
                    }

                    ?>
                </div>

            </div>
            <div class="modal" id="supprimer" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Suppression d'agence</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Voulez-vous vraiment supprimer cette agence ?</p>
                        </div>
                        <div class="modal-footer">
                            <form action="delete_agence.php" id="formDelete" method="post">
                                <input type="hidden" name="id_agence" id="hiddenValue" value="">
                                <button type="submit" id="btn" class="btn btn-success">Oui</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">Non</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal" id="supprimerResponse" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Suppression d'agence/h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModals()">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Vous avez supprimé agence avec réussir.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModals()">D'accord</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal" id="ajouterResponse" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ajouter d'agence</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModalResponse()">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Vous avez ajouté agence avec réussir.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModalResponse()">D'accord</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal" id="paiement" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Gestion des paiements</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModalResponses()">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Les paiements sont déjà versés.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModalResponses()">D'accord</button>
                        </div>
                    </div>
                </div>
            </div>
            
            

            <footer class="sticky-footer bg-white" style="margin-top: 5%;">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Naviluxe 2023</span>
                    </div>
                </div>
            </footer>


        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script>
        var agenceCount = <?php echo json_encode($agenceCount); ?>;
        var clientCount = <?php echo json_encode($clientCount); ?>;

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Nombre des agences', 'Nombre des clients'],
                datasets: [{
                    label: 'Statique de platform',
                    data: [agenceCount, clientCount],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 3
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>