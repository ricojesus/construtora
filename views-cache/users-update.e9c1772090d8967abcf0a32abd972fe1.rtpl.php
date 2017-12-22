<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Usuários
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-6">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Usuário</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/users/<?php echo htmlspecialchars( $user["usuario_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="usuario_nome">Nome</label>
              <input type="text" class="form-control" id="usuario_nome" name="usuario_nome" placeholder="Digite o Nome" value="<?php echo htmlspecialchars( $user["usuario_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>            
            <div class="form-group">
              <label for="usuario_login">Login</label>
              <input type="text" class="form-control" id="usuario_login" name="usuario_login" placeholder="Digite o login" value="<?php echo htmlspecialchars( $user["usuario_login"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->