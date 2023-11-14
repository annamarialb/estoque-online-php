<?php

    if(isset($_POST['submit'])){
        // print_r('Nome do Item: ' . $_POST['nomeitem']);
        // print_r('<br>');
        // print_r('Quantidade de Itens: ' . $_POST['quantitens']);
        // print_r('<br>');
        // print_r('Valor de compra do Item: ' . $_POST['valcompraitens']);
        // print_r('<br>');
        // print_r('Valor de venda do Item: ' . $_POST['valorvendaitens']);
        
        include_once('config.php');

        $nomeitem = $_POST['nomeitem'];
        $quantitens = $_POST['quantitens'];
        $valcompraitens = $_POST['valcompraitens'];
        $valorvendaitens = $_POST['valorvendaitens'];
        

        $result = mysqli_query($conexao, "INSERT INTO itens (nomeitem, quantitens, valcompraitens,valorvendaitens) 
        VALUES ('$nomeitem', '$quantitens', '$valcompraitens', '$valorvendaitens')");

        header('Location: login.php');
    }

    ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, #3ed6ae, #2edbf2);
        }
        .box{
            color: #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.7);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid #1f9bed;
        }
        legend{
            border: 2px solid #1f9bed;
            padding: 10px;
            text-align: center;
            background-color: #1f9bed;
            border-radius: 9px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            color: #fff;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput, .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: #1f9bed;
        }
        #submit{
            background-image: linear-gradient(45deg, #1f9bed, #1f9bed);
            width: 100%;
            border: none;
            padding: 13px;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px; 
        }
        #submit:hover{
            background-image: linear-gradient(45deg, #43abf0, #43abf0);
        }
    </style>
</head>
<body>
    <a href="home.php">Voltar</a>
    <div class="box">
        <form action="cadastroproduto.php" method="POST">
            <fieldset>
                <legend><b>Cadastro de Produtos</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nomeitem" id="nomeitem" class="inputUser" required>
                    <label for="nomeitem" class="labelInput">Nome do Item</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="quantitens" id="quantitens" class="inputUser" required>
                    <label for="quantitens" class="labelInput">Quantidade de Itens</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="valcompraitens" id="valcompraitens" class="inputUser" required>
                    <label for="valcompraitens" class="labelInput">Valor de Compra do Item</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="valorvendaitens" id="valorvendaitens" class="inputUser" required>
                    <label for="valorvendaitens" class="labelInput">Valor de Venda do Item</label>
                </div>
                
                <br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>