<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Cadastro de Construtoras
  </h1>
  <ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/construtoras">Construtoras</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-10">
  		<div class="box box-primary">
        <div class="box-header">
          <a href="construtoras/0" class="btn btn-success">Nova Construtora</a>
        </div>
        <!-- form start -->
        <form role="form" action="/construtoras" method="post">

          <div class="box-body no-padding">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th style="width: 25%;">Nome</th>
                  <th style="width: 20%;">Responsável</th>
                  <th style="width: 20%;">Telefone</th>
                  <th style="width: 20%;">Celular</th>
                  <th style="width: 70px">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php $counter1=-1;  if( isset($construtoras) && ( is_array($construtoras) || $construtoras instanceof Traversable ) && sizeof($construtoras) ) foreach( $construtoras as $key1 => $value1 ){ $counter1++; ?>
                <tr>
                  <td><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["responsavel"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["celular"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td>
                    <a href="construtoras/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                    <a href="construtoras/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->