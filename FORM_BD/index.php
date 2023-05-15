<?php

define('MYSQL_HOST','localhost:3306');
define('MYSQL_USER','root');
define('MYSQL_PASSWORD','');
define('MYSQL_DB_NAME','bd_cliente');

try{

    $PDO = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD);

}catch(PDOException $e){

    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Banco de Dados</title>
</head>
    <style>
        body{
            background-color: #CACACA;
            text-align: center;
        }
        .table-responsive{
            background-color: white;
            margin-top: 6%;
        }
        table{
            margin: 0 !important;
        }
        h1{
            margin-top: 3%;
        }
    </style>
<body>
  
    <div class="container">
    <h1>Consulta com Banco de Dados</h1>
    <?php
        $sql = "SELECT * FROM clientes";
        $resul = $PDO->query($sql);
        $rows = $resul->fetchAll();
        ?>
        <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Endereço</th>
                <th scope="col">Bairro</th>
                <th scope="col">CEP</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
        <?php
            for($i = 0; $i< count($rows); $i++){?>
                <tr>
                <th scope="row"><?php echo $rows[$i]['id'] ?></th>
                <td><?php echo $rows[$i]['nome'] ?></td>
                <td><?php echo $rows[$i]['endereco'] ?></td>
                <td><?php echo $rows[$i]['bairro'] ?></td>
                <td><?php echo $rows[$i]['cep'] ?></td>
                <td><?php echo $rows[$i]['cidade'] ?></td>
                <td><?php echo $rows[$i]['estado'] ?></td>
                </tr>
       <?php }?>
            </tbody>
       </table>
        </div>
        </div>

</body>
</html>