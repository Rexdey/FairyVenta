<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <a href="<?php echo base_url();?>mantenimiento/cproveedor/">Proveedor</a>
        <small>Nuevo</small>
      </h1>
    </section>
    <section class="content">
      <div class="card">
        <div class="card-body">

          <div class="row">
            <div class="col-md-12">
              <?php $valid=""?>
              <?php if($this->session->flashdata('error')):?>
                <div class="alert alert-danger">
                  <?php echo $this->session->flashdata('error')?>
                </div>
              <?php endif; ?>
              <form action="<?php echo base_url();?>mantenimiento/cproveedor/cupdate" method="POST">
                <div class="container-fluid">
                  <input type="hidden"  value="<?php echo $proveedoredit->idproveedor ?>" class="" id="txtidproveedor" name="txtidproveedor">
                </div>
                <div class="form-group" >
                  <label for="tipo_documento">Documento</label>
                  <select id="txttipo_documento" name="txttipo_documento" class="form-control selectpicker" data-live-search="true">
                      <?php foreach ($tipo_documentocombo as $atributos):  ?>
                        <?php if ($atributos->idtipo_documento == $proveedoredit->idtipo_documento): ?>
                        <option value="<?php echo $atributos->idtipo_documento; ?>" selected><?php echo $atributos->nombre; ?></option>
                        <?php else :?>
                        <option value="<?php echo $atributos->idtipo_documento; ?>"><?php echo $atributos->nombre; ?></option>
                      <?php endif ?>
                     <?php endforeach ?>
                   </select>
                 </div>
                <div class="form-group <?php echo !empty(form_error('txtcodigo'))? $valid="is-invalid" :'';?>">
                  <label for="codigo">Código</label>
                  <input type="text" id="txtcodigo" name="txtcodigo" value="<?php echo !empty(form_error('txtcodigo'))? set_value('txtcodigo') :$proveedoredit->codigo ?>" class="form-control <?php if(form_error('txtcodigo')) : ?>is-invalid<?php endif; ?>" onblur="this.value=this.value.toUpperCase();" onkeypress="this.value=this.value.toUpperCase();">
                  <?php echo form_error('txtcodigo','<span class="help-block" style="color:red">','</span>') ?>
                </div>
                <div class="form-group" >
                  <label for="tipo_proveedor">Tipo proveedor</label>
                  <select id="txttipo_proveedor" name="txttipo_proveedor" class="form-control selectpicker" data-live-search="true">
                      <?php foreach ($tipo_clientecombo as $atributos):  ?>
                        <?php if ($atributos->idtipo_cliente == $proveedoredit->idtipo_cliente): ?>
                        <option value="<?php echo $atributos->idtipo_cliente; ?>" selected><?php echo $atributos->nombre; ?></option>
                        <?php else :?>
                        <option value="<?php echo $atributos->idtipo_cliente; ?>"><?php echo $atributos->nombre; ?></option>
                      <?php endif ?>
                    <?php endforeach ?>
                   </select>
               </div>


                <div class="form-group <?php echo !empty(form_error('txtnombre'))? 'has-error' :'';?>">
                  <label for="nombre">Nombre</label>
                  <input type="text" id="txtnombre" name="txtnombre" value="<?php echo $proveedoredit->nombre ?>" class="form-control <?php if(form_error('txtnombre')) : ?>is-invalid<?php endif; ?>" onblur="this.value=this.value.toUpperCase();" onkeypress="this.value=this.value.toUpperCase();">
                  <?php echo form_error('txtnombre','<span class="help-block" style="color:red">','</span>') ?>
                </div>
                <div class="form-group">
                  <label for="direccion">Dirección</label>
                  <input type="text" id="txtdireccion" name="txtdireccion" value="<?php echo $proveedoredit->direccion ?>" class="form-control <?php if(form_error('txtdireccion')) : ?>is-invalid<?php endif; ?>" onblur="this.value=this.value.toUpperCase();" onkeypress="this.value=this.value.toUpperCase();">
                </div>
                <div class="form-group">
                  <label for="telefono">Telefono</label>
                  <input type="text" id="txttelefono" name="txttelefono" value="<?php echo $proveedoredit->telefono ?>" class="form-control <?php if(form_error('txttelefono')) : ?>is-invalid<?php endif; ?>" onblur="this.value=this.value.toUpperCase();" onkeypress="this.value=this.value.toUpperCase();">
                </div>


                <div class="form-group <?php echo ($proveedoredit->estado == 1) ? $valid="is-valid" : $valid="is-invalid"; ?>">
                  <label for="estado">Estado</label>
                  <select type="text" id="txtestado" name="txtestado" class="form-control <?php  echo $valid ;?>" required>
                    <option value="1" <?php if($proveedoredit->estado ==1) echo 'selected'; ?>>Activa</option>
                    <option value="2" <?php if($proveedoredit->estado ==2) echo 'selected'; ?>>Inactiva</option>
                  </select>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-success">Guardar</button>
                </div>
              </form>
            </div>

          </div>

        </div>

      </div>

    </section>
</div>
