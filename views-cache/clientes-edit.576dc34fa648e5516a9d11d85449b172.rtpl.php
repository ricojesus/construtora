<?php if(!class_exists('Rain\Tpl')){exit;}?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Cadastro de Clientes
  </h1>
  <ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/clientes">Clientes</a></li>
    <li class="active"><a href="clientes/0">Cadastro</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-8">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Dados do Clientes</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/clientes/<?php echo htmlspecialchars( $cliente["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <input type="hidden" name="id" value="<?php echo htmlspecialchars( $cliente["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

          <div class="box-body">
            <div class="form-row">
              <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o Nome do Cliente" value="<?php echo htmlspecialchars( $cliente["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite o Numero do Telefone" value="<?php echo htmlspecialchars( $cliente["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="telefone">Celular</label>
                <input type="text" class="form-control" id="celular" name="celular" placeholder="Digite o Numero do Celular" value="<?php echo htmlspecialchars( $cliente["celular"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
            </div>

          </div>

          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Gravar</button>
            <a href="/clientes" class="btn btn-normal">Voltar</a>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->