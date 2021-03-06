<div class="content-wrapper">
    <section class="content-header">
      <h1>Marca</h1>
      <small>Listado</small>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <a href="<?php echo base_url();?>mantenimiento/cmarca/cadd" class="btn btn-primary"><span class="fa fa-plus"></span>Agregar marca</a>

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
                      <th>Descripción</th>
                      <th>Estado</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($marcaindex)): ?>
                      <?php foreach ($marcaindex as $atributos): ?>
                        <tr>
                              <td><?php echo $atributos->idmarca; ?></td>
                              <td><?php echo $atributos->codigo; ?></td>
                              <td><?php echo $atributos->nombre; ?></td>
                              <td><?php echo $atributos->descripcion; ?></td>
                              <?php
                              if ($atributos->estado == 1) {
                                $style='class="badge bg-success"';
                                echo "<td><p><span $style><font style='vertical-align: inherit;'>Activa</font></span></p></td>";
                              }else{
                                $style='class="badge bg-danger"';
                                echo "<td><p><span $style><font style='vertical-align: inherit;'>Inactiva</font></span></p></td>";
                              }
                              ?>
                              <?php $data = $atributos->idmarca."*".$atributos->codigo."*".$atributos->nombre."*".$atributos->descripcion; ?>


                              <td>
                                <div class="btn-group">
                                  <button onclick="myModal(this)" type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $data; ?>">
                                  <span class="fa fa-eye"></span>
                                  </button>
                                  <a href="<?php echo base_url();?>mantenimiento/cmarca/cedit/<?php echo $atributos->idmarca;?>" class="btn btn-warning">
                                  <span class="fas fa-edit"></span>
                                  </a>
                                  <!-- <a href="<?php echo base_url();?>mantenimiento/cmarca/cdelete/<?php echo $atributos->idmarca;  ?>" class="btn btn-danger btn-remove"> -->
                                  <button onclick="myModal2(this)" type="button" class="btn btn-danger btn-remove" data-toggle="modal" data-target="#modal-confirmacion" value="<?php echo $atributos->idmarca; ?>">
                                  <!-- <button class="btn btn-danger btn-remove"  type="button" data-toggle="modal" data-target="#modal-confirmacion"> -->
                                  <span class="fas fa-trash-alt"></span>
                                </button>
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
<!-- <div class="modal fade" id="modal-confirmacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Esta a punto de borrar la seleccion.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         ¿Confirma esta decisión?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Si</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div> -->

<div class="modal fade" id="modal-confirmacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ESTÁ A PUNTO DE ELIMINAR LA SELECCIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Esta acción es irreversible.
        Se recomienda en cambio, desactivar la selección en caso de volver a necesitarla.
        ¿Confirma la eliminación?
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger">Si</button> -->
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  function myModal2($var){
      var boton = $var.value;
      conf="<a href=<?php echo base_url();?>mantenimiento/cmarca/cdelete/"+boton+" role='button' class='btn btn-danger'>Eliminar</a><button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>";

      $("#modal-confirmacion .modal-footer").html(conf);
    }
</script>

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
      resp = "<p><strong>Codiogo: </strong>"+info[1]+" </p>"
      resp += "<p><strong>Nombre: </strong>"+info[2]+" </p>"
      $("#modal-default .modal-body").html(resp);
    }
</script>
