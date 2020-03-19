<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <a href="<?php echo base_url();?>mantenimiento/cformato/">Formato</a>
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
              <form action="<?php echo base_url();?>mantenimiento/cformato/cupdate" method="POST">
                <div class="container-fluid">
                  <input type="hidden"  value="<?php echo $formatoedit->idformato ?>" class="" id="txtidformato" name="txtidformato">
                </div>

                <div class="form-group <?php echo !empty(form_error('txtcodigo'))? $valid="is-invalid" :'';?>">
                  <label for="codigo">Código</label>
                  <input type="text" id="txtcodigo" name="txtcodigo" value="<?php echo !empty(form_error('txtcodigo'))? set_value('txtcodigo') :$formatoedit->codigo ?>" class="form-control <?php if(form_error('txtcodigo')) : ?>is-invalid<?php endif; ?>" onblur="this.value=this.value.toUpperCase();">
                  <?php echo form_error('txtcodigo','<span class="help-block" style="color:red">','</span>') ?>
                </div>
                <div class="form-group <?php echo !empty(form_error('txtnombre'))? 'has-error' :'';?>">
                  <label for="nombre">Nombre</label>
                  <input type="text" id="txtnombre" name="txtnombre" value="<?php echo $formatoedit->nombre ?>" class="form-control <?php if(form_error('txtnombre')) : ?>is-invalid<?php endif; ?>" onblur="this.value=this.value.toUpperCase();">
                  <?php echo form_error('txtnombre','<span class="help-block" style="color:red">','</span>') ?>
                </div>
                <div class="form-group <?php echo !empty(form_error('txtdescripcion'))? $valid="is-invalid" :'';?>">
                  <label for="descripcion">Descripción</label>
                  <input type="text" id="txtdescripcion" name="txtdescripcion" value="<?php echo $formatoedit->descripcion ?>" class="form-control <?php if(form_error('txtdescripcion')) : ?>is-invalid<?php endif; ?>" onblur="this.value=this.value.toUpperCase();">
                  <?php echo form_error('txtdescripcion','<span class="help-block" style="color:red">','</span>') ?>
                </div>
                <div class="form-group <?php echo ($formatoedit->estado == 1) ? $valid="is-valid" : $valid="is-invalid"; ?>">
                  <label for="descripcion">Estado</label>
                  <select type="text" id="txtestado" name="txtestado" class="form-control <?php  echo $valid ;?>" required>
                    <option value="1" <?php if($formatoedit->estado ==1) echo 'selected'; ?>>Activa</option>
                    <option value="2" <?php if($formatoedit->estado ==2) echo 'selected'; ?>>Inactiva</option>
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
