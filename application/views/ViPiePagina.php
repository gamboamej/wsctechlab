<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
               <p class="no-margin-bottom">2022 &copy; techlab.</p>
            </div>
          </div>
        </footer>
      </div>
 </div>
   <!-- Modal Cambio de clave-->
<div class="modal fade" id="modal-cambio-clave">
<form class="form" id="Frm-cambio-clave">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-primary">
	  <h4 class="modal-title">Alerta - techlab</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	 
						<fieldset>
							<div class="form-group col-md-12">
								<label class="control-label">Contraseña Actual</label>
								<div class="inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input id="tx_clave" name="tx_clave" class="form-control" type="password">
									</div>
								</div>
							</div>
							<div class="form-group col-md-12">
								<label class="control-label">Nueva Contraseña</label>
								<div class="inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input id="tx_clave_nueva" name="tx_clave_nueva" class="form-control" type="password">
									</div>
								</div>
							</div>
							<div class="form-group col-md-12">
								<label class="control-label">Repita Nueva Contraseña</label>
								<div class="inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input id="tx_clave_nueva_repetida" name="tx_clave_nueva_repetida" class="form-control" type="password">
									</div>
								</div>
							</div>
						</fieldset>
					
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary"><i class="nav-icon fa fa-sign-out-alt"></i> Cambiar</button>
	      </div>
	  </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
  <!-- /.modal -->

  <!-- Modal Salir-->
<div class="modal fade" id="modal-salir">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-danger">
	  <h4 class="modal-title">Alerta - techlab</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4><dt>
            <?php echo $this->session->userdata('tx_nombre')?>
            <?php echo $this->session->userdata('tx_apellido')?></dt></h4>
        <p>¿Desea Salir?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a href="<?php echo base_url ('salir');?>" class="btn btn-danger"><i class="nav-icon fa fa-sign-out-alt"></i> Cerrar Sesion</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
  <!-- /.modal -->

  <!-- Modal Reset-password-->
<div class="modal fade" id="modal-reset-password">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header bg-warning">
				<h4 class="modal-title">Alert - PRR</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-center">
				<h5><dt>¿Restablecer Contraseña?</dt></h5>
			</div>
			<div class="modal-footer justify-content-between">
      <input type="hidden" id="id-reset-pass">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button id="btn-id-reset-pass" type="button" class="btn btn-warning" data-dismiss="modal">Resetear</button>
			</div>
		</div>
    <!-- /.modal-content -->
    </div>
  <!-- /.modal-dialog -->
</div>
  <!-- /.modal -->

<!-- Modal Activar-->
<div class="modal fade" id="modal-active">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header bg-success">
      <h4 class="modal-title">Alerta - techlab</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-center">
				<h5><dt>¿Activar?</dt></h5>
			</div>
			<div class="modal-footer justify-content-between">
      <input type="hidden" id="id-active">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button id="btn-id-active" type="button" class="btn btn-success" data-dismiss="modal">Activar</button>
			</div>
		</div>
    <!-- /.modal-content -->
    </div>
  <!-- /.modal-dialog -->
</div>
  <!-- /.modal -->

<!-- Modal Desactivar-->
<div class="modal fade" id="modal-inactive">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header bg-danger">
      <h4 class="modal-title">Alerta - techlab</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-center">
			<h5><dt>¿Desactivar?</dt></h5>
			</div>
			<div class="modal-footer justify-content-between">
      <input type="hidden" id="id-inactive">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button id="btn-id-inactive" type="button" class="btn btn-danger" data-dismiss="modal">Desactivar</button>
			</div>
		</div>
    <!-- /.modal-content -->
    </div>
  <!-- /.modal-dialog -->
</div>
  <!-- /.modal -->

<!-- Modal Eliminar-->
<div class="modal fade" id="modal-del">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<h4 class="modal-title">Alerta - techlab</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-center">
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h5>¡Peligro!</h5>¡No podrar restaurar!
				</div>
				<h5><dt>¿Desea Borrarlo?</dt></h5>
			</div>
			<div class="modal-footer justify-content-between">
        <input type="hidden" id="id-del">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button id="btn-del" type="button" class="btn btn-danger" data-dismiss="modal">Borrar</button>
			</div>
		</div>
    <!-- /.modal-content -->
    </div>
  <!-- /.modal-dialog -->
</div>
  <!-- /.modal -->

    <!-- JavaScript files-->
    <script src="<?php base_url();?>web/Dark-Admin-Bootstrap-4/vendor/jquery/jquery.min.js"></script>
    <script src="<?php base_url();?>web/Dark-Admin-Bootstrap-4/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php base_url();?>web/Dark-Admin-Bootstrap-4/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php base_url();?>web/Dark-Admin-Bootstrap-4/vendor/jquery.cookie/jquery.cookie.js"> </script>
	<script src="<?php base_url();?>web/Dark-Admin-Bootstrap-4/vendor/jquery-validation/jquery.validate.min.js"></script>
	<script src="<?php base_url();?>web/Dark-Admin-Bootstrap-4/vendor/sweetalert2/sweetalert2.min.js"></script>
	<!-- page plugins custom -->
<?php

if(@$js){
        foreach ($js as $j) {?>

            <script src="<?php echo base_url(); ?><?php echo $j?>"></script>

        <?}
    }
?>  
    <script src="<?php base_url();?>web/Dark-Admin-Bootstrap-4/js/front.js"></script>
    <script src="<?php base_url();?>web/js/IuBtnAcciones.js"> </script>

</body>
</html>