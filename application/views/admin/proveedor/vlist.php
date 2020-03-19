<div class="content-wrapper">
    <section class="content-header">
      <h1>Proveedor</h1>
      <small>Listado</small>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <a href="<?php echo base_url();?>mantenimiento/cproveedor/cadd" class="btn btn-primary"><span class="fa fa-plus"></span>Agregar proveedor</a>

              </div>

            </div>
            <?php if ($this->session->flashdata('correcto')): ?>
              <br>
            <div class="alert alert-success">
              <?php echo $this->session->flashdata('correcto')?>
            </div>
          <?php endif; ?>


            <hr>
            <div class="row">
              <div class="col-md-12">
                <table id="example1" class="table table-bordered table-hover" width="100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Código</th>
                      <th>Nombre</th>
                      <th>Tipo Documento</th>
                      <th>Tipo proveedor</th>
                      <th>Direccion</th>
                      <th>Estado</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($proveedorindex)): ?>
                      <?php foreach ($proveedorindex as $atributos): ?>
                        <tr>
                              <td><?php echo $atributos->idproveedor; ?></td>
                              <td><?php echo $atributos->codigo; ?></td>
                              <td><?php echo $atributos->nombre; ?></td>
                              <td><?php echo $atributos->tipo_documento; ?></td>
                              <td><?php echo $atributos->tipo_proveedor; ?></td>
                              <td><?php echo $atributos->direccion; ?></td>
                              <td><?php echo $atributos->telefono; ?></td>
                              <?php
                              if ($atributos->estado == 1) {
                                $style='class="badge bg-success"';
                                echo "<td><p><span $style><font style='vertical-align: inherit;'>Activa</font></span></p></td>";
                              }else{
                                $style='class="badge bg-danger"';
                                echo "<td><p><span $style><font style='vertical-align: inherit;'>Inactiva</font></span></p></td>";
                              }
                              ?>
                              <?php $data = $atributos->idproveedor."*".$atributos->codigo."*".$atributos->nombre."*".$atributos->tipo_documento."*".$atributos->tipo_proveedor."*".$atributos->direccion."*".$atributos->telefono; ?>


                              <td>
                                <div class="btn-group">
                                  <button onclick="myModal(this)" type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $data; ?>">
                                  <span class="fa fa-eye"></span>
                                  </button>
                                  <a href="<?php echo base_url();?>mantenimiento/cproveedor/cedit/<?php echo $atributos->idproveedor;?>" class="btn btn-warning">
                                  <span class="fas fa-edit"></span>
                                  </a>
                                  <a href="<?php echo base_url();?>mantenimiento/cproveedor/cdelete/<?php echo $atributos->idproveedor;  ?>" class="btn btn-danger btn-remove">
                                  <span class="fas fa-trash-alt"></span>
                                  </a>
                                </div>
                              </td>
                        </tr>
                      <?php endforeach ?>
                    <?php endif; ?>
                  </tbody>

                </table>

              </div>

            </div>

          </div>

        </div>
      </div>


    </section>

</div>



<!-- Modal -->
<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información de la categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function myModal($var){
      var boton = $var.value;
      var info = boton.split("*");
      resp = "<p><strong>Codigo: </strong>"+info[1]+" </p>"
      resp += "<p><strong>Nombre: </strong>"+info[2]+" </p>"
      resp += "<p><strong>Tipo Documento: </strong>"+info[3]+" </p>"
      resp += "<p><strong>Tipo proveedor: </strong>"+info[4]+" </p>"
      resp += "<p><strong>Direccion: </strong>"+info[5]+" </p>"
      resp += "<p><strong>Telefono: </strong>"+info[6]+" </p>"
      $("#modal-default .modal-body").html(resp);

    }

</script>
