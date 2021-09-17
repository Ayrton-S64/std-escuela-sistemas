<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tramite Documentario</title>
  <link rel="stylesheet" href="{{ asset('css/style_index.css') }}">
  <!--ICONS BOXICONS-->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <!-- HEADER-->
  <!-- ===== HEADER =====-->
  <header class="l-header">
    <nav class="nav bd-grid">
      <a href="#" class="nav__logo">Tramite Documentario/Ingenieria de Sistemas</a>

      <div class="nav__toggle" id="nav-toggle">
        <i class='bx bx-menu-alt-right'></i>
      </div>

      <div class="nav__menu" id="nav-menu">
        <ul class="nav__list">
          <li class="nav__item"><a href="#" class="nav__link">Inicio</a></li>
          <li class="nav__item"><a href="#" class="nav__link">Explorar</a></li>
          <li class="nav__item"><a href="#" class="nav__link">Sobre Nosotros</a></li>
          <li class="nav__item"><a href='{{ route('login') }}' class="nav__link">Iniciar Sesión <i
                class='bx bx-log-in'></i></a></li>
        </ul>
      </div>
    </nav>
  </header>

  <main>
    <!-- ===== HOME =====-->
    <div class="home">

      <img src="img/fondo2.jpg" alt="">
      <h1 class="parallax home__title" data-rellax-speed="-6">Tramite Documentario</h1><br>
      <span class="parallax home__subtitle" data-rellax-speed="-5">Escuela de Ingenieria de Sistemas</span>


      <div class="home__scroll">
        <a href="#section"><i class='bx bx-mouse'></i></a>
      </div>

    </div>

    <!-- ===== SECTION =====-->
  
      <section class="l-section" id="section">
        <div class="container">
          <div class="row">
            <div class="col-8 offset-2" style="padding: 3em ">
              <div style="height: 100%; overflow-y: auto">
                @foreach ($tramites as $tramite)
                  <div class ="shadow p-3 mb-5 bg-body rounded" style="width:100%; padding: .8em 2.3em; ">
                    <h2 class="section__title">{{$tramite->descripcion}}</h2>
                    <div class="col"><strong>REQUISITOS: </strong> {{$tramite->Requisitos}}</div>
                    <a type="submit" target="__blank" href="/storage/formatos/{{$tramite->informacion}}" class="btn1">Descargar Tramite</a>
                  </div>
                  <br>
                @endforeach
              </div>
            </div>
        </div>
       
      </section>    
    
  </main>
  <!-- RELLAX JS-->
  <script src="{{ asset('js/rellax.min.js') }}"></script>
  <!-- GSAP-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.6/gsap.min.js"></script>
  <!-- SCROLL REVEAL -->
  <script src="https://unpkg.com/scrollreveal"></script>
  <!-- MAIN JS -->
  <script src="{{ asset('js/main.js') }}"></script>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
