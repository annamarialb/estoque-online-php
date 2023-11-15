<?php

    session_start();
    include_once('config.php');
    // print_r($_SESSION);

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['email'];

    if(!empty($_GET['search'])){
        $data = $_GET['search'];
        $sql = "SELECT * FROM itens WHERE nomeitem LIKE '%$data%' ORDER BY iditem DESC";
    }else{
        $sql = "SELECT * FROM itens ORDER BY iditem DESC";
    }

    $result = $conexao->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Sistema</title>
    <style>
        body{
            background-image: linear-gradient(45deg, #91d1dd, #5ec2d4);
            color: #fff;
            text-align: center;
        }
        .box-search{
            display: flex;
            justify-content: center;
            gap: .3%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Easy Estoque</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="d-flex">
        <a href="sair.php" class="btn btn-danger me-5">Sair</a>
    </div>
    </nav>
    <br>
    <?php

        echo "<h1>Bem vindo <u>$logado</u></h1>";

    ?>
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar nome do produto" id=pesquisar>
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>
    <div class="m-5">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor de Compra</th>
                    <th scope="col">Valor de Venda</th>
                    <th scope="col">Editar/Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    while($user_data = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$user_data['iditem']."</td>";
                        echo "<td>".$user_data['nomeitem']."</td>";
                        echo "<td>".$user_data['quantitens']."</td>";
                        echo "<td>".$user_data['valcompraitens']."</td>";
                        echo "<td>".$user_data['valorvendaitens']."</td>";
                        echo "<td>
                                <a class='btn btn-sm btn-primary' href='editar.php?iditem=$user_data[iditem]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                </svg>
                                </a>
                                <a class='btn btn-sm btn-danger' href='excluir.php?iditem=$user_data[iditem]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                </svg>
                                </a>
                            </td>";
                        echo "<tr>";
                    }

                ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event){
        if (event.key === "Enter"){
            searchData();
        }
    })

    function searchData(){
        window.location = 'listarproduto.php?search='+search.value;
    }
</script>
</html>
