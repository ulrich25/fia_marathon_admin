<!DOCTYPE html>

<html lang="fr" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('assets/admin/assets/') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Marathon | Liste des participants</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo_fav.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/admin/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet"
        href="{{ asset('assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/toastr.js/cdnjs/toastr.min.css') }}" />
    <script src="{{ asset('assets/admin/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">

                    <a href="{{ url('/admin') }}" class="app-brand-link gap-2 ">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('assets/images/logo-marathon.png') }}" width="5%" alt=""
                                srcset="">
                        </span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboards -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link ">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Dashboards">Liste participans</div>
                        </a>
                    </li>
                </ul>
            </aside>

            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">


                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->


                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('assets/images/logo_fav.png') }}" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('assets/images/logo_fav.png') }}" alt
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span
                                                        class="fw-medium d-block">{{ session()->get('NomPrenom') }}</span>
                                                    <small class="text-muted">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ url('/deconnect') }}">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Deconnexion</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Accueil /</span> Listes des
                            participants</h4>

                        <!-- Basic Bootstrap Table -->
                        <div class="card">
                            <div class="card-header">
                                <div class=" row">
                                    <div class=" offset-md-9 col-md-3 d-flex justify-content-end">
                                        <button type="button" class=" btn btn-outline-success" id="ExportExcel">
                                            <i class='bx bxs-file-css'></i>
                                            Exporter en excel
                                        </button>
                                    </div>
                                </div>
                                <hr>
                                <div class=" row">
                                    <div class=" col-md-4">
                                        <div class=" form-group">
                                            <label for="">Courses</label>
                                            <select name="courses" id="courses" class=" form-control">
                                                <option value="0">Toutes les courses</option>
                                                <option value="1">FITINI ( 5KM ) </option>
                                                <option value="2">MINI ( 10KM ) </option>
                                                <option value="3">SEMI ( 21KM ) </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" col-md-4">
                                        <div class=" form-group">
                                            <label for="">Genre</label>
                                            <select name="genre" id="genre" class=" form-control">
                                                <option value="0">Tous les genres</option>
                                                <option value="M">Masculin</option>
                                                <option value="F">Feminin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" col-md-4">
                                        <div class=" form-group">
                                            <label for="">Etat de paiement</label>
                                            <select name="paiement" id="paiement" class=" form-control">
                                                <option value="0">Tous les Etats</option>
                                                <option value="1">PAIEMENT EN COURS</option>
                                                <option value="2">PAIEMENT SUCCESS</option>
                                                <option value="3">PAIEMENT ECHOUE</option>
                                                <option value="4">PAIEMENT INTERROMPU</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table" id="tableListe">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nom & prenoms</th>
                                            <th>Mail</th>
                                            <th>Telephone</th>
                                            <th>Profession</th>
                                            <th>Date de naissance</th>
                                            <th>Genre</th>
                                            <th>Nationnalité</th>
                                            <th>Etat</th>
                                            <th>Cartegories</th>
                                            <th>Courses</th>
                                            <th>Nom de l'équipe</th>
                                            <th>Creer Le</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                                <table class="table" id="tableListeExport" style=" display:none">
                                    <thead>
                                        <tr>
                                            <th colspan="15"
                                                style=" text-align:center; font-weight: bold; color:#ff9000; font-size : 16pt">
                                                LISTE DES PARTICIPANT</th>
                                        </tr>
                                        <tr>
                                            <th>Nom & prenoms</th>
                                            <th>Mail</th>
                                            <th>Telephone</th>
                                            <th>Profession</th>
                                            <th>Date de naissance</th>
                                            <th>Genre</th>
                                            <th>Nationnalité</th>
                                            <th>Etat</th>
                                            <th>Cartegories</th>
                                            <th>Courses</th>
                                            <th>Montant</th>
                                            <th>Moyen de paiement</th>
                                            <th>Reference de paiement</th>
                                            <th>Nom de l'équipe</th>
                                            <th>Creer Le</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/ Basic Bootstrap Table -->

                        <hr class="my-5" />
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div
                            class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , Conçu par
                                <a href="" target="_blank" class="footer-link fw-medium">DevProject</a>

                            </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3 text-center">
                                <input type="hidden" id="id" class="form-control"
                                    placeholder="Enter Name" />
                                <i class='bx bx-error text-danger ' style=" font-size : 6em"></i>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class='bx bx-x-circle bx-spin'></i> &nbsp;
                            Annuler
                        </button>
                        <button type="button" class="btn btn-success" id="btnValide">
                            <i class='bx bx-check-double'></i>&nbsp;
                            Valider
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <script src="{{ asset('assets/admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('assets/admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/admin/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/table-to-excel-master/dist/tableToExcel.js') }}"></script>
    <script src="{{ asset('assets/jspdf-2.5.1/dist/jspdf.umd.js') }}"></script>
    <script src="{{ asset('assets/jspdf-2.5.1/dist/html2canvas.min.js') }}"></script>
    <script src="{{ asset('assets/toastr.js/cdnjs/toastr.min.js') }}"></script>
    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>
        $(document).ready(function() {
            var table = $("#tableListe").DataTable({
                language: {
                    processing: false,

                    lengthMenu: "Afficher :&nbsp; _MENU_ &eacute;l&eacute;ments",
                    info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                    infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                    infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    infoPostFix: "",
                    loadingRecords: "Chargement en cours...",
                    zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    emptyTable: "Aucune donnée disponible dans le tableau",

                    paginate: {
                        first: "",
                        previous: "Pr&eacute;c&eacute;dent",
                        next: "Suivant",
                        last: ""
                    },
                    aria: {
                        sortAscending: ": activer pour trier la colonne par ordre croissant",
                        sortDescending: ": activer pour trier la colonne par ordre décroissant"
                    },
                    search: "Rechercher&nbsp;:",
                },
                // pagingType: 'full_numbers',
                pageLength: 10,

                // columnDefs: [{
                //         targets: [0, 2, 3, 6],
                //         className: 'text-center'
                //     },
                //     {
                //         targets: [1],
                //         className: 'text-center',
                //     },
                //     {
                //         targets: [4],
                //         className: 'text-end'
                //     },
                //     {
                //         targets: [5],
                //         className: 'text-start'
                //     },
                //     {
                //         "targets": 4, // La deuxième colonne (index 1)
                //     }
                // ],
                order: [11, "desc"]
            })

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "swing",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            var dataDonne = []
            $("#courses").change()
            getData($("#categories").val(), $("#paiement").val(), $("#courses").val())

            $("#courses").on("change", function() {
                getData($("#genre").val(), $("#paiement").val(), $("#courses").val())
            })
            $("#genre").on("change", function() {
                getData($("#genre").val(), $("#paiement").val(), $("#courses").val())
            })
            $("#paiement").on("change", function() {
                getData($("#genre").val(), $("#paiement").val(), $("#courses").val())
            })

            $('#ExportExcel').click(function() {
                TableToExcel.convert(document.getElementById("tableListeExport"), {
                    name: "export_liste_participants.xlsx",
                    sheet: {
                        name: "Liste des participants"
                    }
                });
            })

            // $("#btnPrint").on("click", function() {
            //     // var printDoc = new jsPDF();
            //     const {
            //         jsPDF
            //     } = window.jspdf;
            //     const printDoc = new jsPDF();
            //     // printDoc.html($('#tableListeExport'), {
            //     //     'width': 180
            //     // });


            //     printDoc.html(document.body, {
            //         callback: function(doc) {
            //             // doc.save();
            //             printDoc.autoPrint();
            //             printDoc.output("dataurlnewwindow");
            //         },
            //         x: 10,
            //         y: 10
            //     });
            // });

            $("#btnValide").click(function() {
                $.ajax({
                    url: "{{ route('deleteParticipation') }}",
                    method: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: $("#id").val(),
                    },
                    dataType: "json",
                    success: function(response, statut) {
                        //console.log(response)
                        if (response.error != true) {
                            $("#smallModal").modal("hide")
                            getData($("#genre").val(), $("#paiement").val(), $("#courses")
                                .val())
                            toastr.success("Opération éffectuée !!!")
                        }
                        toastr.error("Opération non éffectuée !!!")

                    },
                    error: function(reponse, statut, err) {
                        //console.log(reponse)
                        toastr.error("Une erreur c'est produite !!!")
                    }
                })
            })

            $('#tableListe tbody').on("click", '.bx-trash', function(evt) {
                var id = evt.target.id.split("-")[1]
                $("#id").val(dataDonne[id])
                $("#smallModal").modal("show")
            })

            function getData(genre, etat, course) {
                $.ajax({
                    url: "{{ route('selectParticipation') }}",
                    method: "GET",
                    data: {
                        genre: genre,
                        etat: etat,
                        course: course
                    },
                    dataType: "json",
                    success: function(response, statut) {
                        // //console.log(response)
                        table.clear().draw()
                        $("#tableListeExport tbody").html("")
                        var etats =""
                        var etat =""
                        $.each(response, function(key, value) {
                            // //console.log(response)

                            switch (value.etat_paiement) {
                                case 1:
                                    etat =
                                        `<span class="badge bg-label-secondary me-1" style="width: 11rem">PAIEMENT EN COURS</span>`
                                    etats = "PAIEMENT EN COURS"
                                    break;
                                case 2:
                                    etat =
                                        `<span class="badge bg-label-success me-1" style="width: 11rem">PAIEMENT SUCCESS</span>`
                                    etats = "PAIEMENT SUCCESS"
                                    break;
                                case 3:
                                    etat =
                                        `<span class="badge bg-label-danger me-1" style="width: 11rem">PAIEMENT ECHOUE</span>`
                                    etats = "PAIEMENT ECHOUE"
                                    break;
                                case 4:
                                    etat =
                                        `<span class="badge bg-label-warning me-1" style="width: 11rem">PAIEMENT INTERROMPU</span>`
                                    etats = "PAIEMENT INTERROMPU"
                                    break;
                            }
                            dataDonne[key] = value.Id_participant
                            table.row.add([
                                `<i class='bx bx-trash text-danger' title='Supprimer' id='delete-${key}'></i>`,
                                `${value.Nom} ${value.Prenom}`,
                                `${value.Adresse}`,
                                `${value.Telephone}`,
                                `${value.Profession}`,
                                `${explodeDate(value.Date_de_Naissance)}`,
                                `${value.Genre}`,
                                `${value.Nationalite}`,
                                `${etat}`,
                                `${value.libelle_cat}`,
                                `${value.libelle_course}`,
                                `${value.Nom_equipe}`,
                                `${explodeDate(value.created_at,'h')}`,
                            ])

                            $("#tableListeExport tbody").append(
                                `<tr><td>${value.Nom} ${value.Prenom}</td><td>${value.Adresse}</td><td>${value.Telephone}</td><td>${value.Profession}</td><td>${explodeDate(value.Date_de_Naissance)}</td><td>${value.Genre}</td><td>${value.Nationalite}</td><td>${etats}</td><td>${value.libelle_cat}</td><td>${value.libelle_course}</td><td>${value.montantCourses}</td><td>${value.libelleMoyenPaie}</td><td>${value.reference_paiement}</td><td>${value.Nom_equipe}</td><td>${explodeDate(value.created_at,'h')}</td></tr>`
                            )
                        })

                        table.draw()
                    },
                    error: function(reponse, statut, err) {
                        //console.log(reponse)
                    }
                })
            }

            function explodeDate(param, date = "") {
                if (
                    param != "null" ||
                    param != null ||
                    param != "" ||
                    typeof param !== object
                ) {
                    if (date != "") {
                        var date = param.split(" ")[0].split("-");
                        var heure = param.split(" ")[1];
                        return date[2] + "/" + date[1] + "/" + date[0] + " " + heure;
                    } else {
                        var date = param.split(" ")[0].split("-");
                        return date[2] + "/" + date[1] + "/" + date[0];
                    }
                }
                return param;
            }
        })
    </script>
</body>

</html>
