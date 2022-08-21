<?php
    switch($_REQUEST["acao"]){

        case "cadastrar":

            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = sha1($_POST["senha"]);
            $data_nasc = $_POST["data_nasc"];

            $sql = "INSERT INTO usuarios (nome, email, senha, data_nasc) 
            VALUES ('{$nome}','{$email}','{$senha}','{$data_nasc}')";

            $res  = $conn->query($sql);

            if ($res == true){
                print "<script>alert('Cadastro realizado com sucesso!');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possível cadastrar!');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            break;

        case "editar":

            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = sha1($_POST["senha"]);
            $data_nasc = $_POST["data_nasc"];
            
            $sql = "UPDATE usuarios SET
                        nome = '{$nome}',
                        email = '{$email}',
                        senha = '{$senha}',
                        data_nasc = '{$data_nasc}'
                    WHERE id =".$_REQUEST["id"];

            $res  = $conn->query($sql);

            if ($res == true){
                print "<script>alert('Cadastro editado com sucesso!');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possível editar!');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            break;

        case "excluir":
            
            $sql = "DELETE FROM usuarios WHERE id=".$_REQUEST["id"];

            $res  = $conn->query($sql);

            if ($res == true){
                print "<script>alert('Cadastro excluído com sucesso!');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possível excluir!');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            break;

        case "buscar":

            print "<h1 class='mb-3'>Resultado de Busca</h1>";

            $buscar_nome = $_POST['buscar_nome'];

            //$sql = "SELECT * FROM usuarios WHERE nome LIKE '%".$buscar_nome."%'";
            $sql = "(SELECT * FROM usuarios WHERE nome LIKE '%".$buscar_nome."%' ORDER BY id)";

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
                print "<h4 class='mt-3'><a href='?page=listar'>Voltar</a></h4>";
            }else{
                print "<p class='alert alert-danger'>Não encontrou resultados!</p>";
                print "<h4 class='mt-3'><a href='?page=listar'>Voltar</a></h4>";
            }
            break;
    }
?>

