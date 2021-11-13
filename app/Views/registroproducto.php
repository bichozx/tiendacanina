<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css2?family=Rampart+One&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Rampart+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('public/styles/estilos.css') ?>">
	<title>Animalandia</title>
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark fondo">
			<div class="container-fluid">
				<a class="navbar-brand fuente" href="#">
					<i class="fas fa-paw"></i>
					Animalandia
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active fuente" aria-current="page" href="<?= site_url('Home') ?>">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link fuente" href="<?= site_url('producto') ?>">Registro Productos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link fuente" href="<?= site_url('animales') ?>">Registro Animales</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<main>
		<section class="container-fluid">
			<div class="mt-5 d-flex">
				<div class="mr-5 d-flex flex-row">
					<h2 class="fuente2 text-center p-2">PRECIONA PARA REGISTAR EL PRODUCTO &nbsp; <i class="fas fa-arrow-right "></i> </h2>
				</div>
				<button class=" navbar-toggler mx-2 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
					<i class="fas fa-paw fa-2x" style="color: #941304"></i>
				</button>
				<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

					<div class="offcanvas-body">
						<div class="">
							<div class="row">
								<div class="col-12">
									<button class="btn bg-light"> Inventario
										<a href=" <?= site_url('/productos/listado') ?>">
											
										<h6 class="fuente2"><i class="fas fa-list fa-2x" style="color: #941304"></i></h6>
											

										</a>
									</button>

								</div>
							</div>
						</div>

						<form class="mb-3 mt-3" action="<?= site_url('/productos/registro/nuevo') ?>" method="POST">

							<div class="mb-3">
								<label class="form-label fuente2 ">Producto:</label>
								<input type="text" class="form-control fuente2" id="nombreproducto" name="nombreproducto">
							</div>
							<div class="mb-3">
								<label class="form-label fuente2 ">Fotografía:</label>
								<input type="text" class="form-control fuente2" id="foto" name="foto">
							</div>
							<div class="mb-3 aling-self-center">
								<label class="form-label fuente2 ">Precio Unidad:</label>
								<input type="number" class="form-control fuente2" id="precio" name="precio">
							</div>
							<div class="mb-3">
								<div class="form-floating">
									<textarea class="form-control fuente2" id="descripcion" placeholder="Descripcion" name="descripcion" style="height: 100px"></textarea>
									<label for="floatingTextarea" class="fuente2">Descripción</label>
								</div>

							</div>
							<div class="mb-3">
								<label class="form-label fuente2">Tipo de animal:</label>
								<select class="form-select fuente2" name="tipo" id="tipo">
									<option class="fuente2" value="1" selected>Perro</option>
									<option class="fuente2" value="2">Gato</option>
									<option class="fuente2" value="3">Ave</option>
									<option class="fuente2" value="4">Caballo</option>
									<option class="fuente2" value="5">Reptil</option>
								</select>
							</div>
							<div class="d-grid gap-2">
								<button class="btn boton fondo text-white fuente2" type="submit">Registrar Producto</button>
							</div>


						</form>
					</div>
				</div>

			</div>
		</section>
		<section class="container">
			<div class="col-12 col-md-5 align-self-end text-center mt-5">
				<img src="<?= base_url('public/img/tiendaperritos.jpg') ?>" alt="imagen" class="img-fluid w-100">
				


			</div>

		</section>

	</main>
	<section>
		<?php if (session('mensaje')) : ?>
			<!-- Modal -->
			<div class="modal fade" id="modal" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header fuente fondo text-white">
							<h5 class="modal-title ">Animalandia</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body fuente2">
							<h5><?= session('mensaje') ?></h5>
						</div>

					</div>
				</div>
			</div>

			<?php unset($_SESSION['mensaje']); ?>
		<?php endif ?>
	</section>
	




	<footer class="fondofooter p-5 mt-5">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-4">
					<h3 class="fw-bold fuente2">Horario de atención:</h3>
					<p>Lunes a viernes 7:00 am - 3:00 pm / Sábado: 7:00 am - 2:30 pm / Domingos y festivos 8:00 am - 3:00 pm</p>
					<br>
					<h3 class="fw-bold fuente2">Dirección:</h3>
					<p>Belén Altavista Calle 8A # 112-82 </p>
				</div>

				<div class="col-12 col-md-4">
					<h3 class="fw-bold fuente2">Ayudas:</h3>
					<p>Glosario / Correo remoto / Monitoreo y desempeño de uso del sitio web</p>
					<br>
					<h3 class=" fw-bold fuente2">Protección de datos:</h3>
					<p>Protección de datos personales en el Municipio de Medellín </p>
				</div>
				<div class="col-12 col-md-4">
					<h1 class="fw-bold fuente"><span><i class="fas fa-paw"></i></span>ANIMALANDIA</h1>
					<br>
					<i class="fab fa-facebook fa-3x"></i>
					<i class="fab fa-instagram fa-3x"></i>
					<i class="fab fa-youtube fa-3x"></i>
					<br>
					<p class="mt-4 fuente2">© 2021 / NIT: 890905211-1 / Código DANE: 05001 / Código Postal: 050015</p>

				</div>
			</div>

		</div>

	</footer>


	<script type="module" src="<?= base_url('public/js/lanzarmodal.js') ?>"></script>
	<script script src="https://kit.fontawesome.com/7b642ec699.js" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>