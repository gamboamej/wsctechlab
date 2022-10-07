<?php	defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-content" style="padding-bottom: 70px;">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Personas</h2>
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url ('panel');?>">Home</a></li>
            <li class="breadcrumb-item active">Personas            </li>
          </ul>
        </div>
        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
             <!-- Form Elements -->
              <div class="col-lg-12">
                <div class="block">
                  <div class="title"><strong>Registro Personas</strong></div>
                  <div class="block-body">
				  <form id="Frm-Users" name="Frm-Users" method="post" role="form" class="form" enctype="multipart/form-data">
								<div class="card-body row">
								<div class="form-group col-sm-12 col-md-6 col-lg-3">
                    <label for="nu_rut">RUT</label>
                    <input type="text" name="nu_rut" class="form-control" id="nu_rut">
                  </div>
										<div class="form-group col-sm-12 col-md-6 col-lg-3">
                    <label for="tx_nombre">Nombre</label>
                    <input type="text" name="tx_nombre" class="form-control" id="tx_nombre">
                  </div>
									<div class="form-group col-sm-12 col-md-6 col-lg-3">
										<label for="tx_apellido">Apellido</label>
										<input type="text" name="tx_apellido" class="form-control" id="tx_apellido">
									</div>
									<div class="form-group col-sm-12 col-md-6 col-lg-3">
										<label for="tx_email">Correo</label>
										<input type="email" name="tx_correo" class="form-control" id="tx_correo">
									</div>
									<div class="form-group col-sm-12 col-md-6 col-lg-3">
										<label for="co_user_rol">Rol</label>
										<select name="co_user_rol" class="form-control" id="co_user_rol" style="width: 100%;">
										<option value="">seleccione...</option>
									<option value="1">administrador</option>
									<option value="2">avanzado</option>
									<option value="3">cliente</option>
										</select>
									</div>
						
                  <div class="form-group col-sm-12 col-md-6 col-lg-3">
                    <label for="in_status">Activo?</label>
                    <select name="in_status" class="form-control" id="in_status" style="width: 100%;">
					<option value="0">seleccione...</option>
									<option value="1">Activo</option>
									<option value="0">Inactivo</option>
									<option value="2">Borrado</option>
                    </select>
                  </div>
									<div class="form-group col-sm-12 col-md-6 col-lg-3">
											<label for="userfile">Avatar</label>
		 								  <div class="fileupload fileupload-new" data-provides="fileupload">
													<div class="fileupload-preview thumbnail"  id="fotomostrar">
															<img class="img-thumbnail" width="100px"src="<?php echo base_url(); ?>web/img/no-user.jpg"/>

													</div>
													<div>
													<br>
															<span class="btn btn-file btn-success">
																	<span class="fileupload-new">Subir</span>
																	<span class="fileupload-exists">Cambiar</span>
																	<input type="file" name="userfile" id="userfile" accept="image/*">
															</span>
															<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Borrar</a>
													</div>
											</div>
									</div>
									<div class="form-group col-12">
										<button type="submit" class="btn btn-primary">Guardar</button>
									</div>
							</form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
