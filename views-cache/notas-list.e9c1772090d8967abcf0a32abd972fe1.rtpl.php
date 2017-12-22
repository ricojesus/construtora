<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Notas Fiscais
  </h1>
  <ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/notas">Notas</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header">
          <a href="/notas/0" class="btn btn-success">Nova</a>
        </div>
        <!-- form start -->
        <form role="form" action="/notas/baixa" method="post">

          <div class="box-body no-padding">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th style="width: 100px">Numero</th>
                  <th>Fornecedor</th>
                  <th>Valor</th>
                  <th>Vencimento</th>
                  <th>Status</th>
                  <th>Data Pgto</th>
                  <th>Valor Pago</th>
                  <th style="width: 200px">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php $counter1=-1;  if( isset($notas) && ( is_array($notas) || $notas instanceof Traversable ) && sizeof($notas) ) foreach( $notas as $key1 => $value1 ){ $counter1++; ?>
                <tr>
                  <td><?php echo htmlspecialchars( $value1["nota_numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["fornecedor_nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["nota_valor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["nota_vencimento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php if( $value1["nota_status"]==1 ){ ?>Em Aberto<?php }else{ ?>Paga<?php } ?></td>
                  <td><?php echo htmlspecialchars( $value1["nota_pagamento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["nota_valor_pago"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td>
                    <a href="/notas/<?php echo htmlspecialchars( $value1["nota_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="NotaID(<?php echo htmlspecialchars( $value1["nota_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>);">
                      Baixar
                    </button>                      
                    <a href="/notas/<?php echo htmlspecialchars( $value1["notas_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <!-- Modal -->
            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                     <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                         <h4 class="modal-title">Baixa de Nota Fiscal</h4>
                     </div>
                     <div class="modal-body">
                        <div class="box-body">
                          <div class="form-row">
                            <div class="form-group">
                              <label for="nota_data_pagamento">Data Pagamento</label>
                              <input type="Date" class="form-control" id="nota_data_pagamento" name="nota_data_pagamento">
                            </div>
                            <div class="form-group">
                              <label for="nota_valor_pago">Valor Pago</label>
                              <input type="text" class="form-control" id="nota_valor_pago" name="nota_valor_pago">
                            </div>
                          </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Baixar Nota</button>
                     </div>        
                </div>
              </div>
            </div>
            <!-- Modal -->               
          </div>
          <!-- /.box-body -->
          <input type="hidden" name="nota_id" id="nota_id">

        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script type="text/javascript">
function NotaID(id){
  document.getElementById('nota_id').value = id;
} 
</script>
