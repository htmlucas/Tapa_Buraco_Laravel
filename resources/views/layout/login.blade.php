<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Projeto Buraco </title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        @if(session()->has('msg_error'))
                            <div class="row mt-3 mb-3">
                                <div class="col-12 ">
                                    <div class="alert alert-danger" role="alert">
                                        {{ session()->get('msg_error') }}
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        @yield('content')
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.html">Precisa de uma conta? Registre - se !</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Projeto Buraco 2020</div>
                            <div>
                                <a href="#">Política de Privacidade</a>
                                &middot;
                                <a href="#">Termos &amp; Condições</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="{{asset('js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{asset('js/boostrap.bundle.min.js') }}"></script>
        <script src="{{asset('js/scripts.js') }}"></script>    
    </body>
</html>
