<!doctype html>
<html lang="es">

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
<?php
include 'array.php';
?>
<body>
  <header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="#" class="navbar-brand d-flex align-items-center">
            <img src="data:image/png;base64,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" alt="Logo" width="30px" height="30px">
            <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
            <circle cx="12" cy="13" r="4" /></svg>
          <strong>Cinemes Màgic Badalona</strong>
        </a>
      </div>
    </div>
  </header>

  <main>
    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            foreach($peliculas as $pelicula) {
                echo "<div class='col'>";
                    echo "<div class='card shadow-sm'>" ;
                        echo "<svg class='bd-placeholder-img card-img-top' width='100%' height='0' xmlns='http://www.w3.org/2000/svg'";
                        echo "aria-label='Placeholder: Thumbnail' preserveAspectRatio='xMidYMid slice' role='img' focusable='false'>";
                        echo "<rect width='0%' height='0%' fill='#55595c' /><img src='{$pelicula['imatge']}' alt='foto' width='400px' height='400px'><text x='50%' y='50%' fill='#eceeef'";
                        echo "dy='.3em'>{$pelicula['nom']}</text> <br>";
                        echo implode(" ",$pelicula['horaris']);
                        echo '</svg>';
                        echo '<div class="card-body">';
                            echo "<p class='card-text'></p>";
                            echo '<div class="d-flex justify-content-between align-items-center">';
                                echo '<div class="btn-group">';
                                    echo '<button type="button" class="btn btn-sm btn-outline-secondary"><a href="trailer.php?id='.$pelicula['id'].'" style="text-decoration: none;">Trailer</a></button>';
                                    echo '<button type="button" class="btn btn-sm btn-outline-secondary"><a href="detall.php?id='.$pelicula['id'].'" style="text-decoration: none;">Mas informacion</a></button>';
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