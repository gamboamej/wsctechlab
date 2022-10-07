<div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Personas</h2>
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url ('panel');?>">Inicio</a></li>
            <li class="breadcrumb-item active">Personas</li>
          </ul>
        </div>
        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12 col-md-6 col-lg-12">
                <div class="block margin-bottom-sm">
                  <div class="title"><strong>Personas</strong>
				  <?php if ($this->session->userdata('co_tipo_usuario')<>3): ?>
				  <a href="<?php echo base_url('personas-registro');?>" class="btn btn-primary float-right"><i class="nav-icon fa fa-user-tag"></i> Registro</a>
				  <?php endif; ?>
				</div>

                  <div class="table-responsive"> 
                  <table id="personas" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
											<thead>
												<tr role="row">
												    <th>RUT</th>
													<th class="d-none">nu_rut</th>
													<th>Nombre</th>
													<th class="d-none">tx_nombre</th>
													<th class="d-none">tx_apellido</th>
													<th>Accciones</th>
													<th class="d-none">id</th>
													<th class="d-none">url_avatar</th>
													<th>Avatar</th>
													<th class="d-none">email</th>
													<th>Email</th>
													<th>Rol</th>
													<th class="d-none">rol_id</th>
													<th>Activo?</th>
													<th class="d-none">in_status</th>
													<th>Creado</th>
												</tr>
											</thead>
											<tbody>
												<? foreach($listar_usuarios as $fila){ ?>
                                                    <tr role="row" class="odd">
													<td class="col-2"><?php echo $fila->nu_rut;?></td>
													<td class="d-none"><?php echo $fila->nu_rut;?></td>	
													<td class="col-2"><?php echo $fila->tx_nombre;?> <?php echo $fila->tx_apellido;?></td>
													<td class="d-none"><?php echo $fila->tx_nombre;?></td>
													<td class="d-none"><?php echo $fila->tx_apellido;?></td>
													<td>
														<div class="btn-group" role="group" aria-label="Basic example">
															<? if ($fila->in_status==1): ?>
															<button type="button" href="#" class="btn btn-danger btn-action" value="<?php echo $fila->co_usuario;?>" title="Inactive" data-toggle="modal" data-target="#modal-inactive"><i class="fa fa-ban" aria-hidden="true"></i></button>
															<button type="button" class="btn btn-primary btn-action" value="<?php echo $fila->co_usuario;?>" title="Edit" href="#" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-edit" aria-hidden="true"></i></button>
															<button type="button" class="btn btn-warning btn-action" value="<?php echo $fila->co_usuario;?>" title="Reset Password" href="#" data-toggle="modal" data-target="#modal-reset-password"><i class="fa fa-lock" aria-hidden="true"></i></button>
															<button type="button" class="btn btn-danger btn-action" value="<?php echo $fila->co_usuario;?>" title="Delete" href="#" data-toggle="modal" data-target="#modal-del"><i class="fa fa-trash" aria-hidden="true"></i></button>
															<? endif; ?>
															<? if ($fila->in_status==0): ?>
															<button type="button" href="#" class="btn btn-success btn-action" value="<?php echo $fila->co_usuario;?>" title="Active" data-toggle="modal" data-target="#modal-active"><i class="fa fa-check" aria-hidden="true"></i></button>
															<button type="button" class="btn btn-danger btn-action" value="<?php echo $fila->co_usuario;?>" title="Delete" href="#" data-toggle="modal" data-target="#modal-del"><i class="fa fa-trash" aria-hidden="true"></i></button>
															<? endif; ?>
															<? if ($fila->in_status==2): ?>
															<button type="button" href="#" class="btn btn-success btn-action" value="<?php echo $fila->co_usuario;?>" title="Active" data-toggle="modal" data-target="#modal-active"><i class="fa fa-check" aria-hidden="true"></i></button>
															<? endif; ?>
														</div>
													</td>
													<td class="d-none"><?php echo $fila->co_usuario;?></td>
													<th class="d-none"><?php echo base_url(); ?>web/img/personas/<?php echo $fila->url_avatar ?></th>
													<td>
														<?php	if (@$fila->url_avatar != NULL) { if ($fila->url_avatar){?>
														<img style="max-width:50px;" class="img-thumbnail" src="<?php echo base_url(); ?>web/img/personas/<?php echo $fila->url_avatar ?>">
														<?php	}
	else { ?>
														<img style="max-width:50px;" src="<?php echo base_url(); ?>web/img/non_available.jpg">
														<?php } }
	else { ?>
														<img style="max-width:50px;" src="<?php echo base_url(); ?>web/img/non_available.jpg">
														<?php } ?>
													</td>
													<td class="d-none"><?php echo $fila->tx_correo;?></td>
													<td><a href="mailto:<?php echo $fila->tx_correo;?>?subject=Techlab"><?php echo $fila->tx_correo;?></a></td>
													<td><?php echo $fila->nb_rol;?></td>
													<td class="d-none">
														<?php echo $fila->co_usuario_rol;?>
													</td>
													<td>
														<? if ($fila->in_status==1): ?>
														<span title="Usuario Activo" class="text-success">Activo <i class="fa fa-check" aria-hidden="true"></i></span>
														<? endif; ?>
														<? if ($fila->in_status==0): ?>
														<span title="Usuario Inactivo" class="text-danger">Inactivo <i class="fa fa-ban" aria-hidden="true"></i></span>
														<? endif; ?>
														<? if ($fila->in_status==2): ?>
														<span title="Usuario Borrado" class="text-danger">Borrado <i class="fa fa-ban" aria-hidden="true"></i></span>
														<? endif; ?>
													</td>
													<td class="d-none"><?php echo $fila->in_status;?></td>
													<td><?php echo date("d/m/Y", strtotime($fila->fe_add));?></td>
												</tr>

												<? } ?>
											</tbody>
											<tfoot>
											<tr role="row">
												    <th>RUT</th>
													<th class="d-none">nu_rut</th>
													<th>Nombre</th>
													<th class="d-none">tx_nombre</th>
													<th class="d-none">tx_apellido</th>
													<th>Accciones</th>
													<th class="d-none">id</th>
													<th class="d-none">url_avatar</th>
													<th>Avatar</th>
													<th class="d-none">email</th>
													<th>Email</th>
													<th>Rol</th>
													<th class="d-none">rol_id</th>
													<th>Activo?</th>
													<th class="d-none">in_status</th>
													<th>Creado</th>
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

	  <!-- /.modal-content -->
<div class="modal fade" id="modal-edit">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h4 class="modal-title">Alerta - Techlab</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="Frm-Users" name="Frm-Users" method="post" role="form" class="form" enctype="multipart/form-data">
					<div class="card-body">
						<div class="row">
							<div class="form-group col-sm-12 col-md-12 col-lg-12">
							<input id="id" type="hidden" name="id">
								<label for="nu_rut">RUT</label>
								<input type="text" name="nu_rut" class="form-control" id="nu_rut">
							</div>
							<div class="form-group col-sm-12 col-md-12 col-lg-12">
							<label for="tx_nombre">Nombre</label>
								<input type="text" name="tx_nombre" class="form-control" id="tx_nombre">
							</div>
							<div class="form-group col-sm-12 col-md-12 col-lg-12">
								<label for="tx_apellido">Apellido</label>
								<input type="text" name="tx_apellido" class="form-control" id="tx_apellido">
							</div>
							<div class="form-group col-sm-12 col-md-12 col-lg-12">
								<label for="tx_correo">Correo</label>
								<input type="email" name="tx_correo" class="form-control" id="tx_correo">
							</div>
							<div class="form-group col-sm-12 col-md-12 col-lg-12">
								<label for="co_usuario_rol">Rol</label>
								<select name="co_usuario_rol" class="form-control" id="co_usuario_rol" style="width: 100%;">
								<option value="">seleccione...</option>
									<option value="1">administrador</option>
									<option value="2">avanzado</option>
									<option value="3">cliente</option>
								</select>
							</div>
		      				<div class="form-group col-sm-12 col-md-12 col-lg-12">
								<label for="in_status">Status</label>
								<select name="in_status" class="form-control" id="in_status" style="width: 100%;">
									<option>seleccione...</option>
									<option value="0">inactivo</option>
									<option value="1">activo</option>
									<option value="2">borrado</option>
								</select>
							</div>
							<div class="form-group col-sm-12 col-md-12 col-lg-12">
									<label for="userfile">Avatar</label>
									<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="fileupload-preview thumbnail"  id="im_avatar">
													<img id="img-thumbnail" class="img-thumbnail" <?php
															if (@$fic_usu != NULL) {
																	if ($fic_usu->fot_usu) {
																			print "width='150' height='150' src='data:image/jpeg;base64,$fic_usu->fot_usu'";
																	} else {
																			?>
																			src="<?php print base_url(); ?>web/img/non_available.jpg" <?php
																	}
															} else {
													?>
																	src="<?php print base_url(); ?>web/img/non_available.jpg" <?php }?>/>

											</div>
											<div>
											<br>
													<span class="btn btn-file btn-success">
															<span class="fileupload-new">Upload</span>
															<span class="fileupload-exists">Change</span>
														<input type="file" name="userfile" id="userfile" accept="image/*">
													</span>
													<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Delete</a>
											</div>
									</div>
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-primary">Editar</button>
			</div>
			</form>
		</div>
	</div>
</div>
