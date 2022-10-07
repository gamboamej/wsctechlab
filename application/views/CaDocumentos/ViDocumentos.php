<div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Documentos</h2>
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url ('panel');?>">Inicio</a></li>
            <li class="breadcrumb-item active">Documentos</li>
          </ul>
        </div>
        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12 col-md-6 col-lg-12">
                <div class="block margin-bottom-sm">
                  <div class="title"><strong>Descarga de documentos</strong>
				  <?php if ($this->session->userdata('co_tipo_usuario')<>3): ?>
				  <button class="btn btn-primary float-right" data-toggle="modal" data-target="#cargardocumento">Cargar Documento</a>
				  <?php endif; ?>
				</div>

                  <div class="table-responsive"> 
                  <table id="documentos" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
											<thead>
												<tr role="row">
													<th title="Descripción">Descripción</th>
													<th class="d-none">codocumento</th>
													<th class="d-none">id</th>
													<th class="d-none">co_responsible</th>
													<th title="Actions">Acciones</th>
													<th title="Estado">Estado</th>
													<th title="Unidad">Unidad</th>
													<th title="Fecha Subida">Fecha Subida</th>
													<th title="Fecha Act">Fecha Act</th>
								
											</tr>
											</thead>
											<tbody>
												<? foreach($listar_documentos as $fila){ ?>
												<tr role="row" class="odd">
													<td><?php echo $fila->nb_documento;?></td>
													<td class="d-none"><?php echo $fila->co_documento;?></td>
													<td class="d-none"><?php echo $fila->co_documento;?></td>
													<td class="d-none"><?php echo $fila->co_user_responsible;?></td>
													<td>
														<div class="btn-group" role="group" aria-label="Basic example">
															<?php if ($this->session->userdata('co_tipo_usuario')==1): ?>
															<button type="button" class="btn btn-danger" title="Delete" href="#" data-toggle="modal" data-target="#modal-del"><i class="fa fa-trash" aria-hidden="true"></i></button>
															<?php endif; ?>
															<?php if ($this->session->userdata('co_tipo_usuario')==2): ?>
																<button type="button" class="btn btn-danger" title="Delete" href="#" data-toggle="modal" data-target="#modal-del"><i class="fa fa-trash" aria-hidden="true"></i></button>	
															<?php endif; ?>
															<?php //if ($this->session->userdata('co_tipo_usuario')==3): ?>
																<a class="btn btn-primary" target="_blank" title="Descarga <?php echo $fila->nb_documento;?>" href="<?php echo base_url();?>web/docs/<?php echo $fila->tx_url;?>"><i class="fa fa-download" aria-hidden="true"></i> Descargar</a>
															<?php //endif; ?>
															<?php if ($this->session->userdata('co_tipo_usuario')==1): ?>
															<button type="button" class="btn btn-success" title="Permisar Documento" href="#" data-toggle="modal" data-target="#modal-asigna-documento"><i class="fa fa-user" aria-hidden="true"></i></button>
															<?php endif; ?>
															<?php if ($this->session->userdata('co_tipo_usuario')==2): ?>
															<button type="button" class="btn btn-success" title="Permisar Documento" href="#" data-toggle="modal" data-target="#modal-asigna-documento"><i class="fa fa-user" aria-hidden="true"></i></button>
															<?php endif; ?>
														</div>
													</td>
													<td><?php echo $fila->tx_descripcion;?></td>
													<td><?php echo $fila->co_unidad;?></td>
													<td><?php echo $fila->fe_add;?></td>
													<td><?php echo $fila->fe_upd;?></td>
					
												</tr>
												<? } ?>
											</tbody>
											<tfoot>
												<tr>
                        							<th title="Descripción">Descripción</th>
													<th class="d-none">codocumento</th>
													<th class="d-none">id</th>
													<th class="d-none">co_responsible</th>
													<th title="Actions">Acciones</th>
													<th title="Estado">Estado</th>
													<th title="Unidad">Unidad</th>
													<th title="Fecha Subida">Fecha Subida</th>
													<th title="Fecha Act">Fecha Act</th>

												</tr>
											</tfoot>
										</table>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </section>
      </div>

<!-- Modal Cargar Documento-->
<div class="modal fade" id="cargardocumento" tabindex="-1" role="dialog" aria-labelledby="cargardocumentoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cargardocumentoModalLabel">Subida de Documentos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form role="form" id="frm-cargar-documento" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                      <div class="form-group">
                        <label class="form-control-label">Nombre</label>
                        <input type="text" name="tx_nombre_documento" placeholder="Nombre" class="form-control">
                      </div>
                      <div class="form-group">       
                        <label class="form-control-label">Documento</label>
                        <input type="file" name="userfile" id="userfile" class="form-control">
                      </div>
                     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="btn-cargar-documento" value="Signin" class="btn btn-primary">Subir</button>
      </div>
	  </form>
    </div>
  </div>
</div>
  <!-- /.modal -->

<!-- Modal Permisar Documento-->
  <div class="modal fade" id="modal-asigna-documento" tabindex="-1" role="dialog" aria-labelledby="modal-asigna-documentoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-asigna-documentoModalLabel">Permiso a Documento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form role="form" id="frm-permisar-documento" accept-charset="utf-8">
                      <div class="form-group">
                        <label class="form-control-label">RUT </label>
                        <input type="text" name="nu_rut" placeholder="RUT" class="form-control">
						<input type="hidden" name="co_documento" id="id-documento">
                      </div>                     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="btn-permisar-documento" value="Signin" class="btn btn-success">Permisar</button>
      </div>
	  </form>
    </div>
  </div>
</div>
  <!-- /.modal -->