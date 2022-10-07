<div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Permiso a Descarga de Documentos</h2>
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url ('panel');?>">Inicio</a></li>
            <li class="breadcrumb-item active">Permisos</li>
          </ul>
        </div>
        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12 col-md-6 col-lg-12">
                <div class="block margin-bottom-sm">
                  <div class="title"><strong>Permisos a documentos</strong>
				  <?php if ($this->session->userdata('co_tipo_usuario')<>3): ?>
			<!--	  <button class="btn btn-primary float-right" data-toggle="modal" data-target="#cargardocumento">Cargar Documento</a>-->
				  <?php endif; ?>
				</div>

                  <div class="table-responsive"> 
                  <table id="documentos" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
											<thead>
												<tr role="row">
                          <th title="Descripción">Descripción</th>
                          <th class="d-none">codocumento</th>
													<th title="Accion de Revocar/Eliminar permiso">Acciones</th>
													<th title="Nombre del cliente a quien se le ortoga el permiso">Cliente</th>
													<th title="Nombre del usuario que otorga permiso">Permisado</th>
                          <th title="Fecha en que se otorga el permiso">Fecha Permiso</th>
													<th title="Fecha Act">Fecha Act</th>
								
											</tr>
											</thead>
											<tbody>
												<? foreach($listar_permisos_documentos as $fila){ ?>
												<tr role="row" class="odd">
													<td><?php echo $fila->nb_documento;?></td>
                          <td class="d-none"><?php echo $fila->co_documento_usuario;?></td>
													<td>
														<div class="btn-group" role="group" aria-label="Basic example">
															<?php if ($this->session->userdata('co_tipo_usuario')==1): ?>
															<button type="button" class="btn btn-danger" title="Eliminar Permiso" href="#" data-toggle="modal" data-target="#modal-del"><i class="fa fa-trash" aria-hidden="true"></i></button>
															
															<?php endif; ?>
															<?php if ($this->session->userdata('co_tipo_usuario')==2): ?>
																<button type="button" class="btn btn-danger" title="Eliminar Permiso" href="#" data-toggle="modal" data-target="#modal-del"><i class="fa fa-trash" aria-hidden="true"></i></button>	
															<?php endif; ?>
														</div>
													</td>
													<td><?php echo $fila->tx_nombre_usuario_permiso_documento;?> <?php echo $fila->tx_apellido_usuario_permiso_documento;?> </td>
													<td><?php echo $fila->tx_nombre_crea_permiso_documento;?> <?php echo $fila->tx_apellido_crea_permiso_documento;?></td>
													<td><?php echo $fila->fe_permiso_documento;?></td>
													<td><?php echo $fila->fe_upd;?></td>
					
												</tr>
												<? } ?>
											</tbody>
											<tfoot>
												<tr>
                          <th title="Descripción">Descripción</th>
                          <th class="d-none">codocumento</th>
													<th title="Accion de Revocar/Eliminar permiso">Acciones</th>
													<th title="Nombre del cliente a quien se le ortoga el permiso">Cliente</th>
													<th title="Nombre del usuario que otorga permiso">Permisado</th>
													<th title="Fecha en que se otorga el permiso">Fecha Permiso</th>
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