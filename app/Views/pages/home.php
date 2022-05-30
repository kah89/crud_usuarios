<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<style>
    .btn{
        margin-bottom: 20px;
    }

    .fa-edit{
        margin-left: 11px;
    }
/* 
    #divConteudo {
        overflow-y: scroll;
    } */
</style>
<script>
    function confirma(){
        if(!confirm("Deseja Excluir?")){
            return false;
        }
        return true;
    }
</script>

<main id="t3-content">

            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12" id="divConteudo">
                    <h2 style="text-align: center; font-size:30px">Usuários</h2>
                    <a class="btn btn-primary  text-uppercase" id="cad" type="submit" href="./user/create">Cadastrar</a>
                    <table class="table table-hover display" id="tabela">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome Completo</th>
                                <th>E-mail</th>
                                <th>Ações</th> <!-- botão-->
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($user) && is_array($user)):?>
                        <?php foreach ($user as $user_item) : ?>
                            <tr>
                                <td><?php echo $user_item['ID'] ?></td>
                                <td><?php echo $user_item['NomeCompleto'] ?></td>
                                <td><?php echo $user_item['Email'] ?></td>
                                <td>
                                    <a href='./user/editar/<?php echo $user_item['ID'] ?>'><i class="fa fa-edit" style="color: blue"></i></a> -
                                    <a href='./user/delete/<?php echo $user_item['ID'] ?>' onclick="return confirma()"><i class="fa fa-trash"  style="color: red"></i></a>
                                </td>

                               
                            </tr>
                        <?php endforeach ?>
                        <?php else : ?>
                        <tr>
                            <td colspan="2"> Nenhum usuário encontrado!</td>
                        </tr>
                        <?php endif?>
                        </tbody>
                    </table>
                </div>
            
        </div>
</main>
<script>
    $(document).ready(function() {
        $('#tabela').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese-Brasil.json'
            }
        });
    });
</script>

