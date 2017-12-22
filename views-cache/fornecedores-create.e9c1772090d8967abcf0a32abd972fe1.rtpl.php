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
          <h3 class="box-title">Novo Fornecedor</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/fornecedores/create" method="post">
          <input type="hidden" name="fornecedor_id" value="0">
          <div class="box-body">
            <div class="form-group">
              <label for="fornecedor_nome">Nome</label>
              <input type="text" class="form-control" id="fornecedor_nome" name="fornecedor_nome" placeholder="Digite o Nome">
            </div>
            <div class="form-group">
              <label for="fornecedor_contato">Contato</label>
              <input type="text" class="form-control" id="fornecedor_contato" name="fornecedor_contato" placeholder="Digite o Contato">
            </div>
            <div class="form-group">
              <label for="fornecedor_telefone">Telefone</label>
              <input type="text" class="form-control input-medium bfh-phone" data-format="(dd) dddd-dddd" id="fornecedor_telefone" name="fornecedor_telefone" placeholder="Digite o Telefone">
            </div>
            <div class="form-group">
              <label for="fornecedor_celular">Celular</label>
              <input type="text" class="form-control input-medium" id="fornecedor_celular" name="fornecedor_celular" placeholder="Digite o Celular">
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