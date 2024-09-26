<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.72.0">
  <title>Album example · Bootstrap</title>

  <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/album/">



  <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


</head>

<body>

  <header>
    <div class="collapse bg-dark" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">About</h4>
            <p class="text-muted">Add some information about the album below, the author, or any other background
              context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off
              to some social networking sites or contact information.</p>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4 class="text-white">Contact</h4>
            <ul class="list-unstyled">
              <li><a href="#" class="text-white">Follow on Twitter</a></li>
              <li><a href="#" class="text-white">Like on Facebook</a></li>
              <li><a href="#" class="text-white">Email me</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="#" class="navbar-brand d-flex align-items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2"
            viewBox="0 0 24 24">
            <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
            <circle cx="12" cy="13" r="4" /></svg>
          <strong>Album</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"
          aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </header>

  <main>

    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="font-weight-light">Album example</h1>
          <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator,
            etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
          <p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
          </p>
        </div>
      </div>
    </section>

    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php

$idolos = [
    ["foto" => "https://www.svg.com/img/gallery/the-untold-truth-of-tyler1/he-was-banned-from-league-of-legends-for-nearly-two-years-1527099715.jpg", "nombreApellido" => "Tyler Steinkamp", "descripcion" => "Es mi idolo porque ha llegado al maximo nivel en todos los roles del lol, y tiene mas de 2K en chess."],
    ["foto" => "https://sm.ign.com/ign_es/screenshot/default/dark-souls-3-3239553_kqbz.jpg", "nombreApellido" => "Hidetaka Miyazaki", "descripcion" => "Tiene la mejor saga de videojuegos de la historia, en resumen mi padre."],
    ["foto" => "https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/media/image/2022/11/batman-rie-2881801.jpg?tf=3840x",  "nombreApellido" => "Batman que rie", "descripcion" => "Como no va a ser mi idolo si la fusion de  batman y Joker."],
    ["foto" => "https://sm.ign.com/t/ign_latam/news/h/hideo-koji/hideo-kojima-connecting-worlds-documentary-premieres-on-disn_m2ny.1280.jpg", "nombreApellido" => "Hideo Kojima", "descripcion" => "Ha creado unos videojuegos maravillosos y ahora se dedica a no hacer nada y subir fotos a instagram, mi padre"],
    ["foto" => "https://poggers.com/cdn/shop/articles/ed56d69aa2829600610042c745d213c6_1919x1079_crop_center.webp?v=1708120715", "nombreApellido" => "Hajime Isayama", "descripcion" => "Creador de Attack on Titan, ha revolucionado el mundo del manga y el anime con su narrativa profunda y giros inesperados."],
    ["foto" => "https://i.blogs.es/e4bfee/yoko-taro/1366_2000.jpeg", "nombreApellido" => "Yoko Taro", "descripcion" => "Creador de Nier, su visión única me fascina."],
    ["foto" => "https://i.ytimg.com/vi/Gv6CRPqkpuU/maxresdefault.jpg", "nombreApellido" => "Ari Gibson", "descripcion" => "Creador de Hollow Knight, su arte y diseño de mundo han dejado una huella profunda en el género de los Metroidvania."],
    ["foto" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT96ShF6-kIoLZQvlniPz3AUJQKT5nyprmudQ&s", "nombreApellido" => "Brandon Sanderson", "descripcion" => "Autor aclamado de fantasía, conocido por sus mundos complejos y sistemas de magia innovadores en series como Mistborn y El Archivo de las Tormentas."],
    ["foto" => "https://phantom-marca.unidadeditorial.es/23c41a1136b75eed5a1a13b0a83d3b35/resize/828/f/jpg/assets/multimedia/imagenes/2024/05/22/17163942703017.jpg", "nombreApellido" => "Faker", "descripcion" => "Ha ganado 4 mundiales, ha mandado a callar a todo el mundo y va a por el quinto."]
];
    foreach($idolos as $idolo) {
        echo "<div class='col'>";
            echo "<div class='card shadow-sm'>" ;
                echo "<svg class='bd-placeholder-img card-img-top' width='100%' height='0' xmlns='http://www.w3.org/2000/svg'";
                echo "aria-label='Placeholder: Thumbnail' preserveAspectRatio='xMidYMid slice' role='img' focusable='false'>";
                echo "<title>{$idolo['nombre']}</title>";
                echo "<rect width='0%' height='0%' fill='#55595c' /><img src='{$idolo['foto']}' alt='foto'><text x='50%' y='50%' fill='#eceeef'";
                echo "dy='.3em'>{$idolo['nombreApellido']}</text>";
                echo '</svg>';
                echo '<div class="card-body">';
                    echo "<p class='card-text'>{$idolo['descripcion']}</p>";
                    echo '<div class="d-flex justify-content-between align-items-center">';
                        echo '<div class="btn-group">';
                            echo '<button type="button" class="btn btn-sm btn-outline-secondary">View</button>';
                            echo '<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>';
                        echo '</div>';
                        echo '<small class="text-muted">9 mins</small>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
       
    ?>

        </div>
      </div>
    </div>

  </main>

  <footer class="text-muted py-5">
    <div class="container">
      <p class="float-right mb-1">
        <a href="#">Back to top</a>
      </p>
      <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
      <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a
          href="/docs/5.0/getting-started/introduction/">getting started guide</a>.</p>
    </div>
  </footer>
</body>

</html>