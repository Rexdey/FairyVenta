<div class="content-wrapper">
    <section class="content-header">
      <h1>Categoria</h1>
      <small>Listado</small>
    </section>
    <section class="content">
      <div class="box box-solid">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <a href="<?php echo base_url();?>mantenimiento/ccategoria/cadd" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span>Agregar Categoria</a>

            </div>

          </div>
          <div class="flash-data" data-flashdata=<?php $this->session->flashdata('correcto');  ?>> </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($categoriasindex)): ?>
                    <?php foreach ($categoriasindex as $atributos): ?>
                      <tr>
                            <td><?php echo $atributos->idcategoria; ?></td>
                            <td><?php echo $atributos->nombre; ?></td>
                            <td><?php echo $atributos->descripcion; ?></td>
                            <?php
                            if ($atributos->estado == 1) {
                              $style='class="badge bg-success"';
                              echo "<td><p><span $style><font style='vertical-align: inherit;'>Activo</font></span></p></td>";
                            }else{
                              $style='class="badge bg-danger"';
                              echo "<td><p><span $style><font style='vertical-align: inherit;'>Desactivo</font></span></p></td>";
                            }
                            ?>
                            <td>
                              <div class="btn-group">
                                <button type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $atributos->idcategoria; ?>">
                                <span class="fa fa-eye"></span>
                                </button>
                                <a href="<?php echo base_url();?>mantenimiento/ccategoria/cedit<?php echo $atributos->idcategoria;?>" class="btn btn-warning">
                                <span class="fas fa-edit"></span>
                                </a>
                                <a href="<?php echo base_url();?>mantenimiento/ccategoria/cdelete<?php echo $atributos->idcategoria;  ?>" class="btn btn-danger btn-remove">
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

    </section>

</div>
