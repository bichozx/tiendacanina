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
    <title>MundoAnimal</title>
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
        <div class="container">
            <div class="row row-cols-1 row-cols-md-5 g-4">
                <?php foreach ($productos as $producto) : ?>

                    <div class="col mt-5 ">
                        <div class="card h-100 p-2 fondofooter aling-self-center">
                            <img src="<?= $producto["foto"] ?>" class="card-img-top h-100 aling-self-center" alt="...">
                            <div class="card-body">
                                <h3 class="card-title text-center text-white fuente"><?= $producto['nombreproducto'] ?></h3>
                                <h5 class="card-text text-center fuente2 text-white"> $ <?= $producto['precio'] ?> </h5>
                                <p class="card-text  text-center fuente2"><?= $producto['descripcion'] ?></p>
                                <a data-bs-toggle="modal" data-bs-target="#confirmacion<?= $producto["id"] ?>" href="#" class="btn btn-transparent"><i class="fas fa-trash-alt fa-2x" style="color: white"></i></a>
                                <a data-bs-toggle="modal" data-bs-target="#editar<?= $producto["id"] ?>" href="#" class="btn btn-transparent ml-5 aling-self-center"><i class="fas fa-edit fa-2x" style="color: white"></i></a>
                            </div>
                        </div>

                        <section>
                            <div class="modal fade" id="confirmacion<?= $producto["id"] ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header fondo fuente text-white">
                                            <h5 class="modal-title ">Eliminar producto</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body fuente2">
                                            <p>¿Está suguro de eliminar este producto?</p>
                                            <p><p><?= $producto["id"] ?></p></p>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary fuente2" data-bs-dismiss="modal">Cerrar</button>
                                            <a href="<?= site_url('/productos/eliminar/' . $producto["id"]) ?>" class=" fuente2 btn btn-danger">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section>
                            <div class="modal fade" id="editar<?= $producto["id"] ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header fondo fuente text-white">
                                            <h5 class="modal-title ">Editar producto</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body fuente2">
                                            <div class="row">
                                                <div class="col-3 aling-self-center">
                                                    <img src="<?= $producto["foto"] ?>" alt="foto" class="img-fluid w-100">
                                                </div>
                                                <div class="col-9">
                                                    <form action="<?= site_url('/productos/editar/' . $producto["id"]) ?>" method="POST">


                                                        <div class="mb-3">
                                                            <label class="form-label fuente2">Producto:</label>
                                                            <input type="text" class="form-control fuente2" value="<?= $producto['nombreproducto'] ?>" id="nombreproducto" name="nombreproducto">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label fuente2">Fotografía:</label>
                                                            <input type="text" class="form-control fuente2" value="<?= $producto['foto'] ?>" id="foto" name="foto">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label fuente2">Precio Unidad:</label>
                                                            <input type="number" class="form-control fuente2" value="<?= $producto['precio'] ?>" id="precio" name="precio">
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="form-floating">
                                                                <textarea class="form-control fuente2" id="descripcion" placeholder="Descripcion" name="descripcion" style="height: 100px"><?= $producto['descripcion'] ?></textarea>
                                                                <label for="floatingTextarea" class="fuente2">Descripción</label>
                                                            </div>

                                                        </div>

                                                        <div class="d-grid gap-2">
                                                            <button class="btn boton fondo text-white fuente" type="submit">Editar Producto</button>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </section>

                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </main>




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










    <script src="https://kit.fontawesome.com/7b642ec699.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>