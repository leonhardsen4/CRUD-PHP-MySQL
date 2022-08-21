<div class="d-flex justify-content-between">
    <h1>Listar Usuário</h1>
    <button name="btnSalvar" class="btn btn-primary mb-3" onclick="location.href='?page=novo'">Novo Usuário</button>
</div>

<form action="?page=salvar" method="POST" class="d-flex mb-3">
    <input type="hidden" name="acao" value="buscar">
        <input class="form-control me-2" type="search" name="buscar_nome" placeholder="Buscar pelo nome">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
</form>

<!--LISTAR TODOS OS USUÁRIOS-->
<?php
    $sql = "SELECT * FROM usuarios ORDER BY id";

    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if($qtd > 0){
        print "<table class='table table-hover table-striped table-bordered'>";
            print "<tr>"; 
                print "<th>ID</th>";
                print "<th>Nome</th>";
                print "<th>E-mail</th>";
                print "<th>Data de Nascimento</th>";
                print "<th>Ações</th>";
            print "</tr>";
        while($row = $res->fetch_object()){
            print "<tr>";
                print "<td>".$row->id."</td>";
                print "<td>".$row->nome."</td>";
                print "<td>".$row->email."</td>";
                print "<td>".$row->data_nasc."</td>";
                print 
                    "<td>

                    <button
                        onclick=\"location.href='?page=editar&id=".$row->id."';\" 
                        class='btn btn-success'>Editar
                    </button>

                    <button
                        onclick=\"
                            if(confirm('Tem certeza que deseja excluir?')){
                                location.href='?page=salvar&acao=excluir&id=".$row->id."';
                            }else{
                                false;
                            }\" 
                        class='btn btn-danger'>Excluir
                    </button>
                    </td>";
            print "</tr>";
        }
        print "</table>";
    }else{
        print "<p class='alert alert-danger'>Não encontrou resultados!</p>";
    }
?>



