<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


    <title>Data Science - Lab</title>

    <style>
        body {
            background-image: url("gambar/bg.jpg");
            background-size: cover;
            /* background-size: contain; */
            background-repeat: no-repeat;
            overflow-y: hidden ! important;
            overflow-x: hidden ! important;
        }

        .box {
            height: 525px;
            width: 369px;
            margin-top: auto;
            margin-bottom: auto;
            background: white;
            position: relative;
            display: flex;
            justify-content: center;
            flex-direction: column;
            padding: 10px;
            /* box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75); */
            border-radius: 10px;
            border: 1px black solid;
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
        <div class="container">
            <a class="navbar-brand" href="/">Data Science Lab</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center h-100">
                <div class="col-md-8 d-flex mb-5">
                    <div class="d-flex my-auto">
                        <h1 class="d-flex my-auto">
                            Pelajari Ilmu Data Science Kapan Saja Dimana Saja
                        </h1>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="d-flex justify-content-center mt-1">
                            <h2 class="mb-5 mt-0">
                                Daftar
                            </h2>
                        </div>
                        <div class="d-flex justify-content-center form_container">
                            <form class="mt-3" action="/login" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <input class="form-control text-decoration-none" name="username"
                                        placeholder="Username" type="text" value="">
                                    @if ($errors->has('username'))
                                        <span class="error">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>
                                <div class="input-group mb-3">
                                    <input class="form-control text-decoration-none" name="password"
                                        placeholder="Password" type="password" value="">
                                </div>
                                <div class="input-group mb-3">
                                    <input class="form-control text-decoration-none" name="password" placeholder="Email"
                                        type="password" value="">
                                </div>
                                <div class="d-flex justify-content-center mt-3 login_container">
                                    <button class="btn login_btn btn-md btn-warning" type="submit">Daftar</button>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-center mt-4">
                                        <p>Sudah punya akun ? <a href="/login">Login</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
    -->
</body>

</html>

{{-- <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="username">
    @if ($errors->has('username'))
        <span class="error">{{ $errors->first('username') }}</span>
    @endif
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
</script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
    -->
</body>

</html> --}}
