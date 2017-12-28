<?php if(!class_exists('Rain\Tpl')){exit;}?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Cadastro de Construtoras
  </h1>
  <ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="construtoras">Construtoras</a></li>
    <li class="active"><a href="construtoras/0">Cadastro</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-8">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Dados do Construtoras</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="../construtoras/<?php echo htmlspecialchars( $construtora["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <input type="hidden" name="id" value="<?php echo htmlspecialchars( $construtora["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

          <div class="box-body">
            <div class="form-row">
              <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o Nome da Construtora" value="<?php echo htmlspecialchars( $construtora["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="responsavel">Responsável</label>
                <input type="text" class="form-control" id="responsavel" name="responsavel" placeholder="Digite o Nome do Responsável" value="<?php echo htmlspecialchars( $construtora["responsavel"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite o Numero do Telefone" value="<?php echo htmlspecialchars( $construtora["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="telefone">Celular</label>
                <input type="text" class="form-control" id="celular" name="celular" placeholder="Digite o Numero do Celular" value="<?php echo htmlspecialchars( $construtora["celular"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
            </div>

          </div>

          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Gravar</button>
            <a href="../construtoras" class="btn btn-normal">Voltar</a>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->