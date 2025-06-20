
<body>
  
    <section class ="carousel">
    
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
  <div class="carousel-inner">
    <div class="carousel-item active c-item">
      <img src="assets\img\primera.jpeg" class="d-block w-100 rounded c-img"  alt="tortas">
    </div>
    <div class="carousel-item c-item">
      <img src="assets\img\galletita.jpeg" class="d-block w-100 rounded c-img"  alt="galletitas">
    </div>
    <div class="carousel-item c-item">
      <img src="assets\img\DONAS.jpg" class="d-block w-100 rounded c-img"  alt="donas">
    </div>
  </div>
  </div>
</section>
<?php if(!empty (session()->getFlashdata('msg'))):?>
        <div class="alert alert-success alert-dismissible"><?=session()->getFlashdata('msg');?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif?>

<section class ="introduccion">
    <h1> Valen & Vir </h1>
    <p> Creamos postres únicos, hechos a mano con ingredientes de calidad y mucho amor. 
      En cada receta combinamos tradición y creatividad para ofrecerte experiencias 
      dulces que sorprenden. 
      Nada industrial, todo fresco, real y lleno de sabor.
      Hacemos pedidos personalizados para que celebres a tu manera: 
      cumpleaños, eventos o antojos únicos. Lo artesanal también puede ser moderno,
      delicioso y con onda.</p>  
</section>


  <section class ="categoria">
  <h2> Categorías</h2>
  <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100 position-relative">
      <a href="<?php echo base_url('catalogo_produc'.'1');?>" class="stretched-link"></a>
      <img src="assets\img\primerados.jpeg" class="card-img-top" alt="Torta de dos pisos">
      <div class="card-body">
        <h5 class="card-title">Tortas de dos pisos</h5>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 position-relative">
      <a href="<?php echo base_url('catalogo_produc'.'2');?>" class="stretched-link"></a>
      <img src="assets\img\mediana.jpg" class="card-img-top" alt="postres">
      <div class="card-body">
        <h5 class="card-title">Tortas Medianas</h5>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 position-relative">
      <a href="<?php echo base_url('catalogo_produc'.'3');?>" class="stretched-link"></a>
      <img src="assets\img\kg.jpg" class="card-img-top" alt="super poderosas">
      <div class="card-body">
        <h5 class="card-title">Tortas de Kilos</h5>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 position-relative">
      <a href="<?php echo base_url('catalogo_produc'.'4');?>" class="stretched-link"></a>
      <img src="assets\img\mini.jpg" class="card-img-top" alt="postres">
      <div class="card-body">
        <h5 class="card-title">Mini tortas</h5>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 position-relative">
      <a href="<?php echo base_url('catalogo_produc'.'5');?>" class="stretched-link"></a> 
      <img src= "assets\img\Hamburguesa.jpg" class="card-img-top" alt="super poderosas">
      <div class="card-body">
        <h5 class="card-title">Tortas tamaño hamburguesa</h5>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 position-relative">
      <a href="<?php echo base_url('catalogo_produc'.'6');?>" class="stretched-link"></a>
      <img src="assets\img\chocotorta.jpeg" class="card-img-top" alt="postres">
      <div class="card-body">
        <h5 class="card-title">Postres</h5>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 position-relative">
      <a href="<?php echo base_url('catalogo_produc'.'7');?>" class="stretched-link"></a>
      <img src="assets/img/TARTA_MANZ.jpg" class="card-img-top" alt="tarta manzana">
      <div class="card-body">
        <h5 class="card-title">Tartas</h5>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 position-relative">
      <a href="<?php echo base_url('catalogo_produc'.'8');?>" class="stretched-link"></a>
      <img src= "assets\img\alfajorMaicena.jpg" class="card-img-top" alt="alfajores">
      <div class="card-body">
        <h5 class="card-title">Alfajores</h5>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 position-relative">
      <a href="<?php echo base_url('catalogo_produc'.'9');?>" class="stretched-link"></a>
      <img src="assets/img/cupcakes.jpeg" class="card-img-top" alt="cupcakes">
      <div class="card-body">
        <h5 class="card-title">Cupcakes</h5>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 position-relative">
      <a href="<?php echo base_url('catalogo_produc'.'10');?>" class="stretched-link"></a>
      <img src="assets/img/galletita.jpeg" class="card-img-top" alt="galletitas">
      <div class="card-body">
        <h5 class="card-title">Galletas</h5>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 position-relative">
      <a href="<?php echo base_url('catalogo_produc'.'11');?>" class="stretched-link"></a>
      <img src="assets/img/DONAS.jpg" class="card-img-top" alt="donas">
      <div class="card-body">
        <h5 class="card-title">Donas</h5>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 position-relative">
      <a href="<?php echo base_url('catalogo_produc'.'12');?>" class="stretched-link"></a>
      <img src= "assets\img\paletaM.jpg" class="card-img-top" alt="cupcakes">
      <div class="card-body">
        <h5 class="card-title">Mesas de dulces</h5>
      </div>
    </div>
  </div>
</div>
</section>

</html>