<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>   
    <title>Demo embedded SQL</title>
    <script>
        $(document).ready(function(){
            $("#txt_query").on("keyup",function(){
                var text = $(this).val().toLowerCase();   
                $("#tabela tr").filter(function(){
                    $(this).toggle($(this).text().toLowerCase().indexOf(text) > -1);
                });

            });
        });
    </script>
</head>

<body>
    <center>
        <h1>Lista de alunos</h1>
    </center>
    <div class="container">
        <form action="insert.php" method="post" class="row g-3">
            <div class="col">
                <label for="inputPrimNome" class="form-label">Primeiro Nome</label>
                <input type="text" class="form-control" name="primnome" aria-label="First name">
            </div>
            <div class="col">
                <label for="inputUltNome" class="form-label">Último Nome</label>
                <input type="text" class="form-control" name="ultnome" aria-label="Last name">
            </div>

            <div class="col-12">
                <label for="inputAddress" class="form-label">Morada</label>
                <input type="text" class="form-control" name="morada">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" name="datanasc">
            </div>
            <div class="col-md-4">
                <label for="inputAddress" class="form-label">Telemóvel</label>
                <input type="text" class="form-control" name="telemovel">

            </div>
            <div class="col-md-2">
                <label for="inputState" class="form-label">Género</label>
                <select name="genero" class="form-select">
                    <option selected>Escolher...</option>
                    <option>M</option>
                    <option>F</option>
                </select>
            </div>
            <div class="separador"></div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Inserir</button>
            </div>
            <div class="separador"></div>
        </form>
    </div>
    <div class="container">
            <form class="d-flex">
              <input class="form-control me-2" id="txt_query" type="search" placeholder="Search" aria-label="Search">
            </form>
        <div class="separador"></div>
        <table class="table table-striped" >
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Morada</th>
                    <th scope="col">Data Nascimento</th>
                    <th scope="col">Telemóvel</th>
                    <th scope="col">Género</th>
                </tr>
            </thead>
            <tbody id="tabela">
            <?php
                include('filltable.php');
            ?>
            </tbody>
        </table>
    </div>
</body>

</html>