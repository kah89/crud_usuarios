<!-- <h2>Editar</h2> -->
<h2><?php echo isset($id) ? "Cadastrar" : "Editar" ;?></h2>
<?php echo \config\Services::validation()->listErrors();?>

<form action="./store" method="post">
    <div class="form-group">
        <label for="NomeCompleto"> Nome Completo:</label>
        <input type="text" class="form-control" name="NomeCompleto" id="nome" value="<?php echo isset($NomeCompleto) ? $NomeCompleto : set_value('NomeCompleto')?>">
    </div>
    <div class="form-group">
        <label for="Email"> E-mail:</label>
        <input type="text" class="form-control" name="Email" id="email" value="<?php echo isset($Email) ? $Email : set_value('Email')?>">
    </div>
    <input type="hidden" name="ID" value="<?php echo isset($id) ? $id : set_value('ID')?>">

    <div class="form-group">
        <input type="submit" value="Salvar" class="btn btn-success">
    </div>

</form>