<?php require_once 'config/mysql.conf.php'; ?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Loja TCC - Detalhes do Produto</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/main.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <?php require_once 'includes/menu.inc.php'; ?>
        </nav>
        <div class="container">
            <?php
              $sql = "select * from produtos where id = " . $_GET['idProduto'] . "";
              $result = $conn->query($sql);
              $row = $result->fetch_array()
            ?>
            <h1 class="title">
              Detalhes do produto: <i>"<?php echo $row['titulo']; ?>"</i>
            </h1>
            <div class="row">
                <!-- /.col-lg-3 -->
                <div class="col-lg-12">

                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="produto.php?estrelas=<?php echo $row['estrelas']; ?>&idProduto=<?php echo $row['id']; ?>"><?php echo $row['titulo']; ?></a>
                                    </h4>
                                    <h5><?php echo 'R$ ' . number_format($row['preco'], 2, ',', '.'); ?></h5>
                                    <p class="card-text"><?php echo $row['descricao']; ?></p>
                                    <strong id="estrelas"></strong>
                                </div>
                                <?php include 'includes/estrelas.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
        <?php require_once 'includes/footer.inc.php'; ?>
    </body>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script>
    //var url = encodeURI(document.URL);
    var url = document.URL;
    var pos = url.indexOf("estrelas=");
    if (pos != -1) {
        var numeroDeEstrelas = url.substring(pos + 9, url.length).split('&')[0];
        var texto = "Este produto possui " + numeroDeEstrelas + " estrela(s).";
        document.getElementById("estrelas").innerHTML = unescape(texto);
    }
    </script>
</html>
