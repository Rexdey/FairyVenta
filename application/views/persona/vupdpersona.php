<div class="content">


  <!-- Horizontal Form -->
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title"><?php echo "Usuario : ".$this->session->userdata('s_usuario'); ?></h3>
    </div>
    <!-- /.card-header -->
    <!-- form actualizar -->
    <form class="form-horizontal" action="<?php echo base_url(); ?>cpersona/actualizarDatos" method="post">
      <div class="card-body">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" name="txtNombre" placeholder="Nombre">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Apellido Paterno</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" name="txtApPaterno" placeholder="Apellido Paterno">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Apellido Materno</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" name="txtApMaterno" placeholder="Apellido Materno">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail3" name="txtApMaterno" placeholder="Email">
          </div>
        </div>


      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-info">Actualizar</button>
      </div>
      <!-- /.card-footer -->
    </form>

    <!-- form eliminar -->
    <form class="form-horizontal" action="<?php echo base_url(); ?>cpersona/eliminarPersona" method="post">
      <div class="card-body">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">ID persona</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" name="txtIdPersona" placeholder="ID">
          </div>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-danger">Eliminar</button>
      </div>
      <!-- /.card-footer -->
    </form>
  </div>


</div>
<!-- /.card -->
