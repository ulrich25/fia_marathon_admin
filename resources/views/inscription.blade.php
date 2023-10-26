{{-- @php
    dd($listeCourse[0]->id_courses);
@endphp --}}
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marathon | Formulaire d'inscription</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/toastr.js/cdnjs/toastr.min.css') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo_fav.png') }}" />
</head>

<body>
    <!-- MultiStep Form -->
    <div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2><strong>Formulaire de paiement de kit</strong></h2>
                    {{-- <p>Fill all form field to go to next step</p> --}}
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform" method="post">
                                @csrf
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>Etape 1</strong></li>
                                    <li id="personal"><strong>Etape 2 </strong></li>
                                    <li id="payment"><strong>Paiement</strong></li>
                                </ul>
                                <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title pb-3">Informations personnelles</h2>
                                        <div class=" row">
                                            <div class="col-12">
                                                <input type="text" name="nom" id="nom"
                                                    class=" form-control input" placeholder="Nom" required>

                                            </div>
                                            <div class="col-12">
                                                <input type="text" name="prenom" id="prenom"
                                                    placeholder="Prénoms" class="input" required>
                                            </div>
                                            <div class="col-12 pb-3">
                                                <select name="genre" id="genre" class=" list-dt col-12 input"
                                                    required>
                                                    <option value="">Choisissez votre genre</option>
                                                    <option value="M">Masculin</option>
                                                    <option value="F">Féminin</option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <input type="text" name="profession" placeholder="Profession"
                                                    class=" input" required>
                                            </div>
                                            <div class="col-12">
                                                <input type="text" name="nationnalite" placeholder="Nationnalité"
                                                    class=" input" required>
                                            </div>
                                            <div class="col-12">
                                                <input type="email" name="adresse" placeholder="Adresse email"
                                                    class=" input" required>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Suivant">
                                </fieldset>

                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title pb-3">Informations Personnelles</h2>
                                        <input type="text" name="telephone" id="telephone" placeholder="Téléphone"
                                            class=" input" required>
                                        <input type="text" name="equipe"
                                            placeholder="Participation/Equipe - nom de l'equipe">

                                        <label for="">Date de naissance</label>
                                        <input type="date" name="dateNaissance" placeholder="Date de naissance"
                                            class="input" required>


                                        <div class="mb-4">
                                            <select name="course" id="course" class=" list-dt col-12 input"
                                                required>
                                                <option value="0">Choix de courses </option>
                                                @foreach ($listeCourse as $item)
                                                    <span style=" display : none" class=""
                                                        id="mnt-{{ $item->id_courses }}"></span>
                                                    <option value="{{ $item->id_courses }}"
                                                        data-mnt ="{{ $item->montant }}"> {{ $item->libelle }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="">
                                            <select name="categories" id="" class=" list-dt col-12 input"
                                                required>
                                                <option value="0">Choix de la cartégories</option>
                                                <option value="1">ECOLES</option>
                                                <option value="2">ENTREPRISES</option>
                                                <option value="3">CORPS CONSTITUES</option>
                                                <option value="4">COMMUNES</option>
                                                <option value="5">INDIVIDUELS</option>
                                            </select>

                                        </div>
                                        <br>
                                        <hr>

                                        <div class=" row pt-3">
                                            <div class=" col-md-6  col-sm-12 col-xs-12">
                                                <label for="">Mot de passe</label>
                                                <input type="password" name="mdp" id="mdp" class=" input"
                                                    required>
                                            </div>
                                            <div class=" col-md-6 col-sm-12 col-xs-12">
                                                <label for="">Confirmation de mot de passe</label>
                                                <input type="password" name="mdpConfirm" id="mdpConfirm"
                                                    class=" input" style="margin-bottom: 0px !important;" readonly
                                                    required>
                                                <span id="etatMdpFalse"
                                                    style=" color :red; font-size : 10px; font-style:italic; " hidden>
                                                    Mot de passe non conforme</span>
                                                <span id="etatMdpTrue"
                                                    style=" color :green; font-size : 10px; font-style:italic; "
                                                    hidden>
                                                    Mot de passe conforme</span>
                                            </div>

                                        </div>

                                    </div>

                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Précédent">
                                    <input type="button" name="next" class="next action-button" value="Suivant">


                                </fieldset>

                                <fieldset>
                                    <span id="beforePaye">

                                        <div class="form-card text-center">
                                            <h2 class="fs-title">Information de paiement</h2>
                                            <div class=" row ">
                                                <div class="col-6"><label for="">
                                                        <span style=" font-size:8pt">Nom
                                                            et Prenom</span>
                                                        <br>
                                                        <span class=" h4" id="nomVieu"></span>
                                                    </label>
                                                </div>
                                                <div class="col-6"><label for=""><span
                                                            style=" font-size:8pt">Téléphone</span> <br><span
                                                            class=" h4" id="telView"></span></label>
                                                </div>
                                                <div class="col-12">
                                                    <span style=" font-size:8pt">Montant à payer</span>
                                                    <h1 class=" text-success text-bold" id="mntFinale"></h1>
                                                </div>

                                            </div>
                                        </div>

                                        <div class=" row">
                                            <div class=" col-md-6 col-sm-12 col-xs-12 ">
                                                <input type="button" name="previous" class=" col-md-12 previous action-button-previous" value="Précédent" />
                                            </div>
                                            <div class=" col-md-6 col-sm-12 col-xs-12 ">
                                                <input type="submit" name="make_payment" class=" col-md-12 submit action-button" value="Enregister" />
                                            </div>
                                        </div>
                                    </span>

                                    <div hidden id="paye">
                                        <div class="form-card text-center">
                                            <div class=" row">
                                                <div class=" col-md-6  col-sm-12 col-xs-12 mb-3">

                                                        <button type="button" id="printFiche" class=" col-12 btn btn-secondary">Imprimer ma fiche</button>

                                                </div>
                                                <div class=" col-md-6  col-sm-12 col-xs-12 mb-3">
                                                    <button type="button"  class=" col-12 btn btn-success" id="doPaye" >Passer au paiement</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/bootstrap.min.bundle.js') }}"></script>
    <script src="{{ asset('assets/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/toastr.js/cdnjs/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/jspdf-2.5.1/dist/jspdf.umd.js') }}"></script>
    <script>
        $(document).ready(function() {

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "10000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "swing",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var step = 1

            var donne

            var montant = 10000
            var fautPaye = ""
            $("#course").on("change", function(e) {
                if (e.target.value == "3") montant = 15000

                $("#mntFinale").text(montant + " FCFA")
            })

            $("#doPaye").click(function() {
                window.location.href = apiPaye(fautPaye, montant, $(
                        "input[name=telephone]").val(), $("input[name=nom]").val(),
                    $("input[name=prenom]").val(), $("input[name=adresse]").val())
                // $("#msform")
            })

            $("#mdp").on('change', function() {
                if ($.trim($("#mdp").val()).length > 0) {
                    $("#mdpConfirm").removeAttr('readonly')
                }
            })

            $("#mdpConfirm").on("input", function() {
                if ($("#mdp").val() != $("#mdpConfirm").val()) {
                    $("#etatMdpFalse").removeAttr("hidden")
                } else {
                    $("#etatMdpFalse").attr("hidden", "hidden")
                    $("#etatMdpTrue").removeAttr("hidden")
                }
            })

            $(".next").click(function() {

                if (step == 2) {
                    $("#nomVieu").text($("#nom").val() + " " + $("#prenom").val())
                    $("#telView").text("(+225) " + $("#telephone").val())
                }

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                if (!validateform(current_fs)) {
                    return false
                }

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 600
                });
                step++

            });

            $(".previous").click(function() {

                if (step == 3) {
                    current_fs = $(this).parent().parent();
                    previous_fs = $(this).parent().parent().prev();
                } else {
                    current_fs = $(this).parent();
                    previous_fs = $(this).parent().prev();
                }

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 600
                })

                step--
            })

            $('.radio-group .radio').click(function() {
                $(this).parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
            })

            $("#msform").on("submit", function(e) {
                e.preventDefault();
                donne = []
                $.ajax({
                    url: "{{ route('insertParticipant') }}",
                    data: new FormData(this),
                    dataType: "json",
                    method: "POST",
                    contentType: false,
                    processData: false,
                    success: function(reponse, statut) {
                        // console.log(reponse)
                        if (reponse.error == false) {
                            donne = reponse.data[0]
                            fautPaye = reponse.codePaiement
                            $("#beforePaye").attr("hidden", "hidden")
                            $("#paye").removeAttr("hidden")
                            toastr.success("Enregistrement éffectué . Félicitation !")
                        } else {
                            if (reponse.code == '23000') {
                                toastr.error(
                                    "Enregistrement non effectué ! Votre numero de téléphone existe déja / Une information n'a pas été remplie . "
                                    )
                                    return 0
                            }

                            toastr.error("L'enregistrement ne s'est pas effectué, veuillez svp vérifier vos informations !")
                        }
                    },
                    error: function(reponse, statut, err) {
                        toastr.error("Une erreur s'est produite !")
                        console.log(reponse)
                    }
                })

                // console.log(apiPaye("mKozARyHDIHDIhdhdiuh", 25000, $("input[name=telephone]").val(), $("input[name=nom]").val(), $("input[name=prenom]").val(), $("input[name=adresse]").val()))
            })

            function validateform(current_fs) {

                var validate = true;
                current_fs.find(".input").each(function() {
                    $(this).removeClass('warning');
                    if ($(this).attr('required')) { // Correction : 'required' au lieu de 'require'
                        if ($(this).val().length === 0) {
                            validate = false;
                            $(this).addClass('border-danger');
                        }
                    }
                });
                return validate;
            }

            $("#printFiche").click(function(){
                const {
                    jsPDF
                } = window.jspdf;
                const doc = new jsPDF({
                    orientation: "l",
                    unit: "mm",
                    format: "a5"
                });

                var width = doc.internal.pageSize.getWidth()/2;
                var height = doc.internal.pageSize.getHeight();

                // console.log(height)
                // console.log(width)
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
            function apiPaye(key, montant, tel, nom, prenom, mail, motif = "paiement de fia", indice = 225) {
                return `https://pay.apaym.com/fia/m=${montant}/i=${indice}/t=${tel}/n=${nom}/p=${prenom}/e=${mail}/r=${motif}/k=${key}`
            }

        });
    </script>
</body>

</html>
