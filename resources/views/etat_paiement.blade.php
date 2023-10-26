<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marathon | Etat de paiement </title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome.css') }}">
</head>

<body>
    <!-- MultiStep Form -->
    <div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2><strong>Etat de paiement </strong></h2>
                    {{-- <p>Fill all form field to go to next step</p> --}}
                    <div class="row">
                        <div class="col-md-12 mx-0 my-3">
                            <form>

                                <!-- fieldsets -->
                                <fieldset class=" m-3">
                                    <div class="form-card">
                                        <h2 class="fs-title pb-3">Informations personnelles</h2>
                                        <div class=" row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="" class=" control-label"></label>
                                                    <input type="text" name="" class=" form-control" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="" class=" control-label"></label>
                                                    <input type="text" name="" class=" form-control" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="" class=" control-label"></label>
                                                    <input type="text" name="" class=" form-control" id="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button id="btnValid" class="btn btn-secondary">Suivant</button>
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
    <script>
        $(document).ready(function() {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var step = 1

            $('#btnValid').on("click", function() {
                $.ajax({
                    url: "https://pay.apaym.com/api/status-payment"
                    method: POST
                    data: {
                        id_order: String,
                        status_order: String,
                        (success, failed, interrupted),
                        id_transaction: String(k = 144 hjfe234n)
                    },
                    success: function(response, statut) {

                    },
                    error: function(response, statut, err) {

                    }
                })
            })
        });
    </script>
</body>

</html>
