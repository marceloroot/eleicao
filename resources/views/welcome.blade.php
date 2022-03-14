<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Marcelo') }}</title>


        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

        @stack('styles')


        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @stack('styles')

     
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

       
    </head>
    <body id="page-top">
     <!-- Navigation-->
     <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container px-5">
            <a class="navbar-brand d-flex" href="#page-top">
                <img src="https://www.novaconcursos.com.br/portal/wp-content/uploads/2015/07/Prefeitura-de-alfenas.jpg" style="max-width:80px;max-height:80px; margin-top:15px;border-radius:5px;" /><span class="ml-5" style="margin-top: 2rem">Eleiçao Alfenas 2021</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    @auth
                    <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}">Inscricao</a></li>
                    @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Entrar</a></li>
                    @if (Route::has('register'))
                   <!-- <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Inscrever-se</a></li> -->
                    @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container px-5">
                <h1 class="masthead-heading mb-0" style="font-size:69px; color:#4F4F4F; font-weight: :bold;">Inscrição para Eleição do Conselho Municipal de Saúde de Alfenas</h1>
                @auth
                <a class="btn btn-primary btn-xl rounded-pill mt-5"  href="{{ route('dashboard') }}">Ver Inscrição</a>
                @else
                <a class="btn btn-primary btn-xl rounded-pill mt-5"  href="{{ route('register') }}">Inscrição</a>
                @endauth

                <a class="btn btn-primary btn-xl rounded-pill mt-5" target="_blank" href="http://editais.alfenas.mg.gov.br/Uploads/ArquivoSecretaria/202112061236170.pdf">Manual do Candidato</a>
            </div>
        </div>
      
    </header>
    <!-- Content section 1-->
    
    <!-- Content section 2-->
    
    <!-- Content section 3-->

    <!-- Footer-->
    <footer class="py-5 bg-black">
        <div class="container px-5"><p class="m-0 text-center text-white small">Copyright &copy; PMA ALFENAS</p></div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

              <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
              <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
         
         
    </body>
</html>
