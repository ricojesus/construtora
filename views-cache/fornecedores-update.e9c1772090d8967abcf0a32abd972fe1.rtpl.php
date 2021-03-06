<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Fornecedores
  </h1>
  <ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/fornecedores">Fornecedores</a></li>
    <li class="active"><a href="fornecedores/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-8">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Cadastro de Fornecedor</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/fornecedores/<?php echo htmlspecialchars( $fornecedor["fornecedor_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <input type="hidden" name="fornecedor_id" value="<?php echo htmlspecialchars( $fornecedor["fornecedor_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

          <div class="box-body">
            <div class="form-group">
              <label for="fornecedor_nome">Nome</label>
              <input type="text" class="form-control" id="fornecedor_nome" name="fornecedor_nome" placeholder="Digite o Nome" value="<?php echo htmlspecialchars( $fornecedor["fornecedor_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="fornecedor_contato">Contato</label>
              <input type="text" class="form-control" id="fornecedor_contato" name="fornecedor_contato" placeholder="Digite o Contato" value="<?php echo htmlspecialchars( $fornecedor["fornecedor_contato"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="fornecedor_telefone">Telefone</label>
              <input type="text" class="form-control input-medium bfh-phone" data-format="(dd) dddd-dddd" id="fornecedor_telefone" name="fornecedor_telefone" placeholder="Digite o Telefone" value="<?php echo htmlspecialchars( $fornecedor["fornecedor_telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="fornecedor_celular">Celular</label>
              <input type="text" class="form-control input-medium" id="fornecedor_celular" name="fornecedor_celular" placeholder="Digite o Celular" value="<?php echo htmlspecialchars( $fornecedor["fornecedor_celular"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->