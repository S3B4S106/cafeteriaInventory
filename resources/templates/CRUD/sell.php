<?php include '../header.php'?>

<?php
    if(!isset($_GET['id'])){
        header('Location: index.php?message=error');
        exit();
    }

    include_once '../../config/connection.php';
    $id = $_GET['id'];

    $query = $base_de_datos->prepare("SELECT * FROM products WHERE product_id = ?;");
    $query->execute([$id]);
    $product = $query->fetch(PDO::FETCH_OBJ);
?>

<div class="container mt-5 p-4">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <!--Inicio Alert - Error -->
            <?php
                if($product->stock <= 0){

            ?>

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>¡ERROR!</strong> No hay unidades disponibles del producto, no se puede vender. <i>Por favor regrese al inicio</i>
            </div>
            
            <script>
              var alertList = document.querySelectorAll('.alert');
              alertList.forEach(function (alert) {
                new bootstrap.Alert(alert)
              })
            </script>

            <?php
                }
            ?>
         

        <div class="card">
                <div class="card-header text-center">
                    <b>VENTA DE PRODUCTO</b>
                </div>
                
                <form class="p-3" method="POST" action="../../controllers/sellController.php">
                <div class="form-group row">    
                    <div class="mb-2 col-md-6 form-group">
                        <label for="name" class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="name" id="name" readonly value="<?php echo $product->product_name ?>">
                    </div>
                    <div class="mb-2 col-md-6 form-group">
                        <label for="cantity" class="form-label">Cantidad: </label>
                        <input type="number" class="form-control" name="cantity" id="cantity" value="1">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="mb-2 col-md-6 form-group">
                        <label for="stock" class="form-label">Stock: </label>
                        <input type="number" class="form-control" name="stock" id="stock" readonly value="<?php echo $product->stock ?>">
                    </div>
                    <div class="mb-2 col-md-6 form-group">
                        <label for="price" class="form-label">Precio: </label>
                        <input type="number" class="form-control" name="price" id="price" readonly value="<?php echo $product->price ?>">
                    </div>
                </div>
                <div class="d-grid p-2">
                    <input type="hidden" name="id" value="<?php echo $product->product_id; ?>">

                <?php
                if($product->stock > 0){
                ?>
                    <input type="submit" class="btn btn-info m-2" value="Vender">
                <?php
                }
                ?>
  
                <a class="text-center" href="/cafeteriaInventory/index.php"><i class="bi bi-box-arrow-left"></i></a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../footer.php'?>