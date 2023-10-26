@php
    if (session()->has('numero')) {
        redirect('/participant/connect');
    }

@endphp
<!DOCTYPE html>

<html lang="fr" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('assets/') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Marathon | Espace client </title>

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
    <link rel="stylesheet" href="{{ asset('assets/toastr.js/cdnjs/toastr.min.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet"
        href="{{ asset('assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('assets/admin/assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/admin/assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">

                    <a href="{{ url('/participant') }}" class="app-brand-link gap-2 ">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('assets/images/logo-marathon.png') }}" width="7%" alt=""
                                srcset="">
                        </span>
                    </a>

                    {{-- <div class="app-brand d-flex justify-content-center" >

                    </div> --}}

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
                            <div data-i18n="Dashboards">Accueil</div>
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
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">

                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="../assets/img/avatars/1.png" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="../assets/img/avatars/1.png" alt
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-medium d-block">John Doe</span>
                                                    <small class="text-muted">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('/participant.deconnect') }}">
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

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Accueil /</span></h4>

                        <div class="row">
                            <div class="col-md-12">

                                <div class="card mb-4">
                                    <div class="card-header">
                                        <div class=" row">
                                            <div class=" col-3">Profile Details</div>
                                            <div>

                                            </div>
                                            <div class=" offset-3 col-6 d-flex justify-content-around text-end">
                                                <button class=" btn btn-dark" id="print"> <i
                                                        class='bx bxs-printer'></i> &nbsp; Imprimer ma
                                                    ficher</button>
                                                <button class=" btn btn-primary" id="btnPaye" hidden> <i
                                                        class='bx bx-money-withdraw'></i> &nbsp; Passer au
                                                    paiement</button>
                                                <button class=" btn btn-secondary" id="btnConfirmePaye" hidden> <i
                                                        class='bx bx-check-double'></i> &nbsp;
                                                    Confirmer
                                                    son paiement</button>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Account -->
                                    <div class="card-body">

                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <input type="hidden" name="__token" id="__token"
                                            value="{{ csrf_token() }}">
                                        <input type="hidden" name="crsf_token" id="crsf_token"
                                            value="{{ csrf_token() }}">
                                        <form id="formAccountSettings" method="POST">
                                            <input type="hidden" name="idParpaticipant" id="idParpaticipant">
                                            <input type="hidden" name="mntParpaticipant" id="mntParpaticipant">
                                            <input type="hidden" name="codePaie" id="codePaie">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="nom" class="form-label">Nom</label>
                                                    <input class="form-control edit" type="text" id="nom"
                                                        name="nom" autofocus readonly />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="prenom" class="form-label">Prenom</label>
                                                    <input type="text" class="form-control  edit" name="prenom"
                                                        id="prenom" readonly />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="email" class="form-label">E-mail</label>
                                                    <input class="form-control edit" type="text" id="email"
                                                        name="email" readonly />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="date_naiss" class="form-label">Date de
                                                        naissance</label>
                                                    <input type="date" class="form-control edit" id="date_naiss"
                                                        name="date_naiss" readonly />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="phoneNumber">Numéro de
                                                        téléphone</label>
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text">CI (+225)</span>
                                                        <input type="text" id="telephone" name="telephone"
                                                            class="form-control edit" readonly />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="address" class="form-label">Profession</label>
                                                    <input type="text" class="form-control edit" id="profession"
                                                        name="profession" readonly />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="country">Courses</label>
                                                    <select class="form-control" id="courses"
                                                        name="courses"></select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="state" class="form-label">Catégories</label>
                                                    <select class="form-control" id="categories" name="categories">

                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="zipCode" class="form-label">Nationnalités</label>
                                                    <input type="text" class="form-control edit" id="nationnalite"
                                                        name="nationnalite" readonly />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="country">Nom de l'équipe</label>
                                                    <input type="text" class="form-control edit" id="nom_equipe"
                                                        name="nom_equipe" readonly />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="genre" class="form-label">Genre</label>
                                                    <select id="genre" name="genre"
                                                        class="select2 form-select">
                                                        <option value="M">
                                                            Masculin</option>
                                                        <option value="F">
                                                            Féminin</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mt-2 float-end">
                                                <span id="zoneSave" hidden>
                                                    <button type="reset" class="btn btn-outline-secondary"
                                                        id="btnAnnuler">Annuler</button>
                                                    <button type="submit" class="btn btn-primary me-2">
                                                        Enregistrer les modifications
                                                    </button>
                                                </span>
                                                <span id="zoneEdit">
                                                    <button type="button" class=" btn btn-secondary" id="editBtn">
                                                        <i class=" fa fa-edit"></i>
                                                        Modifier mes informations
                                                    </button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /Account -->
                                </div>
                                {{-- <div class="card">
                                    <h5 class="card-header">Delete Account</h5>
                                    <div class="card-body">
                                        <div class="mb-3 col-12 mb-0">
                                            <div class="alert alert-warning">
                                                <h6 class="alert-heading mb-1">Are you sure you want to delete your
                                                    account?</h6>
                                                <p class="mb-0">Once you delete your account, there is no going back.
                                                    Please be certain.</p>
                                            </div>
                                        </div>
                                        <form id="formAccountDeactivation" onsubmit="return false">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox"
                                                    name="accountActivation" id="accountActivation" />
                                                <label class="form-check-label" for="accountActivation">I confirm my
                                                    account deactivation</label>
                                            </div>
                                            <button type="submit"
                                                class="btn btn-danger deactivate-account">Deactivate Account</button>
                                        </form>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    {{-- Modal --}}

                    <div class="modal fade" id="modalValidePaie" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Confirmation de paiement</h5>
                                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="mb-3">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <label for="moyenPaie" class="form-label"> Mode de paiement</label>
                                            <select class="form-select" id="moyenPaie"
                                                aria-label="Default select example" name="moyenPaie">
                                                <option selected>Choisissez votre moyen de paiement</option>

                                                <option value=" "> </option>

                                            </select>
                                        </div>
                                        <div class="col mb-3">
                                            <label for="nameBasic" class="form-label">Référence de paiement</label>
                                            <input type="text" id="reference" name="reference"
                                                class="form-control" placeholder="Ref-00146992" />
                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        <i class=""></i> Fermer
                                    </button>
                                    <button type="button" class="btn btn-primary" id="btnSaveRef"><i
                                            class=" fa fa-save"></i> Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div
                            class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , made with ❤️ by
                                <a href="" target="_blank"
                                    class="footer-link fw-medium">ThemeSelection</a>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{ asset('assets/admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/vendor/js/menu.js') }}"></script>

    <script src="{{ asset('assets/admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/toastr.js/cdnjs/toastr.min.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/admin/assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('assets/jspdf-2.5.1/dist/jspdf.umd.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>
        $(document).ready(function() {

            var donne
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

            getData()

            $("#editBtn").click(function() {
                validateform($("#formAccountSettings"), "add")
            })

            $("#btnAnnuler").click(function() {
                validateform($("#formAccountSettings"), "delete")
            })

            function validateform(current_fs, actions) {
                // var validate = true;
                if (actions == 'add') {
                    current_fs.find(".edit").each(function() {
                        $(this).removeAttr('readonly');
                    });

                    $("#zoneSave").removeAttr("hidden")
                    $("#zoneEdit").attr("hidden", "hidden")

                } else {
                    current_fs.find(".edit").each(function() {
                        $(this).attr('readonly', 'readonly');
                    });

                    $("#zoneEdit").removeAttr("hidden")
                    $("#zoneSave").attr("hidden", "hidden")
                    getData()
                }
            }

            $("#btnConfirmePaye").click(function() {
                $("#modalValidePaie").modal("show")
            })

            $("#btnSaveRef").click(function() {
                if ($("#moyenPaie").val() != "" && $("#reference").val() != "") {
                    $.ajax({
                        url: "{{ route('updateRef') }}",
                        method: "post",
                        data: {
                            _token: $("input[name=_token]").val(),
                            ref: $("#reference").val(),
                            moyenPaie: $("#moyenPaie").val(),
                            refParticipant: $("#idParpaticipant").val(),
                        },
                        dataType: "json",
                        success: function(response, status) {

                            if (response.error == false) {
                                toastr.success("Opération de confirmation éffectuée !")
                                $("#modalValidePaie").modal("hide")
                                return 0
                            }
                            //console.log(response)
                            toastr.error("Une erreur c'est produite !")
                        },
                        error: function(response, status, err) {
                            toastr.error("Une erreur c'est produite !")
                            //console.log(response)
                        }
                    })
                }
            })

            $("#btnPaye").click(function() {
                var montant = $("#mntParpaticipant").val()
                var fautPaye = $("#codePaie").val()

                // window.location.href = apiPaye(fautPaye, montant, $(
                //         "input[name=telephone]").val(), $("input[name=nom]").val(),
                //     $("input[name=prenom]").val(), $("input[name=email]").val())

                window.open(apiPaye(fautPaye, montant, $(
                        "input[name=telephone]").val(), $("input[name=nom]").val(),
                    $("input[name=prenom]").val(), $("input[name=email]").val()), '_blank');
            })

            $("#formAccountSettings").on("submit", function(e) {
                e.preventDefault();

                var formData = new FormData(this)
                formData.append("_token", $("#__token").val())
                $.ajax({
                    url: "{{ route('updateParticipant') }}",
                    method: "post",
                    dataType: "json",
                    data: formData,

                    contentType: false,
                    processData: false,
                    success: function(response, statut) {
                        if (response.error == false) {
                            toastr.success("Modification éffectuée ! ")
                            getData()
                            return 0
                        }
                        toastr.error("Modification non éffectuée ! ")

                    },
                    error: function(response, statut, err) {
                        //console.log(response)
                        toastr.error("Une erreur s'est produite ! ")
                    }
                })
            })

            $("#print").click(function() {
                const {
                    jsPDF
                } = window.jspdf;
                const doc = new jsPDF({
                    orientation: "l",
                    unit: "mm",
                    format: "a5"
                });

                donne

                var width = doc.internal.pageSize.getWidth()/2;
                var height = doc.internal.pageSize.getHeight();

                // //console.log(height)
                // //console.log(width)
                var imgLogo = new Image();
                imgLogo.src = "{{ asset('assets/images/logo-marathon.png') }}"
                doc.addImage(imgLogo, 10, 10, 30, 8.01);

                var x = 10
                var y = 60

                doc.rect(40, 30, 130, 10)
                doc.text("FORMULAIRE D'INSCRIPTION AU MARATHON", 42, 37)

                doc.setFontSize(12)
                doc.text(x, y, 'Nom : ')
                doc.text(x, y + 10, 'Prenom : ')
                doc.text(x, y + 20, 'Date de naissance : ')
                doc.text(x, y + 30, 'Genre : ')

                doc.text(width, y, 'Téléphone : ')
                doc.text(width, y + 10, 'Mail : ')
                doc.text(width, y + 20, 'Profession: ')
                doc.text(width, y + 30, 'Nationnalité : ')

doc.text(x + 5, y + 50, 'Equipe : ')
                doc.text(x + 70, y + 50, 'Catégories : ')
                doc.text(x + 130, y + 50, 'Courses : ')


                doc.setFontSize(14)
                doc.text(x + 15, y, donne.Nom)
                doc.text(x + 23, y + 10, donne.Prenom)
                doc.text(x + 40, y + 20, donne.Date_de_Naissance)
                doc.text(x + 20, y + 30, donne.Genre)

                doc.text(width + 25, y, donne.Telephone)
                doc.text(width + 15, y + 10, donne.Adresse)
                doc.text(width + 25, y + 20, donne.Profession)
                doc.text(width + 30, y + 30, donne.Nationalite)

                doc.rect(10, y + 40, doc.internal.pageSize.getWidth() - 20, 25)

                doc.setTextColor(255, 144, 0)
                doc.text(x + 5, y + 55, donne.Nom_equipe)
                doc.text(x + 70, y + 55, donne.libelle_cat)
                doc.text(x + 130, y + 55, donne.libelle_course)

                var date  = new Date().toLocaleDateString();
                // doc.setFontType("italic")
                doc.setFontSize(7)
                doc.setTextColor(0, 0, 0)
                doc.text("Fiche d'inscription au marathion Fia 2023" , 10, height - 8)
                doc.text("généré le : " , doc.internal.pageSize.getWidth() - 28, height - 8)
                doc.text(date , doc.internal.pageSize.getWidth() - 15, height - 8)

                doc.output("dataurlnewwindow");
            })

            function getData() {
                donne = []
                $.ajax({
                    url: "{{ route('detailParticipant') }}",
                    method: "post",
                    dataType: "json",
                    data: {
                        _token: $("#crsf_token").val()
                    },
                    success: function(response, statut) {

                        // //console.log(response)
                        var participation = response.detailParticipant[0]
                        donne = response.detailParticipant[0]

                        if (participation.etat_paiement == "1") $("#btnPaye").removeAttr("hidden")
                        if (participation.etat_paiement == "2") $("#btnConfirmePaye").removeAttr("hidden")

                        $("#courses").html("")
                        $("#categories").html("")
                        $("#moyenPaie").html("")

                        $("#idParpaticipant").val(participation.Id_participant)
                        $("#mntParpaticipant").val(participation.courseMontant)
                        $("#codePaie").val(participation.code_paiement)
                        $("#nom").val(participation.Nom)
                        $("#prenom").val(participation.Prenom)
                        $("#email").val(participation.Adresse)
                        $("#date_naiss").val(participation.Date_de_Naissance)
                        $("#telephone").val(participation.Telephone)
                        $("#profession").val(participation.Profession)
                        $("#nationnalite").val(participation.Nationalite)
                        $("#nom_equipe").val(participation.Nom_equipe)
                        $("#genre").val(participation.Genre).change()

                        $.each(response.listeCourse, function(key, value) {
                            $("#courses").append(
                                `<option value="${value.id_courses}">${value.libelle}</option>`
                            )
                        })

                        $.each(response.listeCategorie, function(key, value) {
                            $("#categories").append(
                                `<option value="${value.id_categories}">${value.libelle}</option>`
                            )
                        })

                        $.each(response.moyenPaie, function(key, value) {
                            $("#moyenPaie").append(
                                `<option value="${value.idMoyenPaie}">${value.libelleMoyenPaie}</option>`
                            )
                        })

                        // $("#categories").val(participation.)
                        // $("#moyenPaie").val(participation.)
                    },
                    error: function(response, statut, err) {
                        //console.log(response)
                    }
                })
            }

            function apiPaye(key, montant, tel, nom, prenom, mail, motif = "paiement de fia", indice = 225) {
                return `https://pay.apaym.com/fia/m=${montant}/i=${indice}/t=${tel}/n=${nom}/p=${prenom}/e=${mail}/r=${motif}/k=${key}`
            }


        })
    </script>
</body>

</html>
