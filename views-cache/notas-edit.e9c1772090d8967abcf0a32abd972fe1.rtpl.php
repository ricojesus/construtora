<?php if(!class_exists('Rain\Tpl')){exit;}?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Notas
  </h1>
  <ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/notas">Notas</a></li>
    <li class="active"><a href="notas/0">Cadastro</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-8">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Cadastro de Notas Fiscais</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/notas/<?php echo htmlspecialchars( $nota["nota_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <input type="hidden" name="nota_id" value="<?php echo htmlspecialchars( $nota["nota_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

          <div class="box-body">
            <div class="form-row">
              <div class="form-group">
                <label for="nota_numero">Numero</label>
                <input type="text" class="form-control" id="nota_numero" name="nota_numero" placeholder="Digite o Numero da Nota Fiscal" value="<?php echo htmlspecialchars( $nota["nota_numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>

            </div>
        
            <div class="form-group">
                <label for="fornecedor_nome">Fornecedor</label>
                <select class="form-control selectpicker" data-live-search="true" name="fornecedor_id" id="fornecedor_id">
                    <option value="">Selecione um Fornecedor</option>
                    <?php $counter1=-1;  if( isset($fornecedores) && ( is_array($fornecedores) || $fornecedores instanceof Traversable ) && sizeof($fornecedores) ) foreach( $fornecedores as $key1 => $value1 ){ $counter1++; ?>
                    <option <?php if( $value1["fornecedor_id"]==$nota["fornecedor_id"] ){ ?>selected<?php } ?> value="<?php echo htmlspecialchars( $value1["fornecedor_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["fornecedor_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group col-md-6" style="padding-left: 0px;">
              <label for="nota_telefone">Vencimento</label>
              <input type="date" class="form-control" name="nota_vencimento" id="nota_vencimento" value="<?php echo htmlspecialchars( $nota["nota_vencimento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group col-md-6" style=" padding-right: 0px;">
              <label for="nota_valor">Valor</label>
              <input type="number" min="0.00" max="999999999.00" step="0.01" class="form-control input-medium" pattern="(\d{3})([\.])(\d{2})" id="nota_valor" name="nota_valor" placeholder="0,00" value="<?php echo htmlspecialchars( $nota["nota_valor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="nota_descricao">Descrição</label>
              <textarea rows="3" class="form-control input-medium" id="nota_descricao" name="nota_descricao" placeholder="Digite a Descrição da Nota"><?php echo htmlspecialchars( $nota["nota_descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
            <a href="/notas" class="btn btn-primary">Voltar</a>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->