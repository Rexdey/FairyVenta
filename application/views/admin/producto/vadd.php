<div class="content-wrapper" width="100%">
  <div class="container-fluid">
    <section class="content-header">
      <h1>
          <a href="<?php echo base_url();?>mantenimiento/cproducto/">producto</a>
          <br>
          <small>Nueva</small>
      </h1>
    </section>
    <section class="content">

      <div class="card">
        <div class="card-body" >
          <div class="row">
            <div class="col-md-12">
              <?php if ($this->session->flashdata('error')):?>
                <div class="alert alert-danger">
                  <?php echo $this->session->flashdata('error')?>
                </div>
              <?php endif; ?>
              <!-- <form role="form" id="quickForm" action="<?php echo base_url();?>mantenimiento/cproducto/cinsert" method="post"> -->
              <form  action="<?php echo base_url();?>mantenimiento/cproducto/cinsert" method="post">

                <div class="form-group" >
                  <label for="categoria">Categoría</label>
                  <select id="txtcategoria" name="txtcategoria" class="form-control selectpicker" data-live-search="true">
                      <?php foreach ($categoriacombo as $atributos):  ?>
                        <option value="<?php echo $atributos->idcategoria; ?>"<?php if ($atributos->idcategoria==1): echo "selected"; endif ?>><?php echo $atributos->nombre; ?></option>
                     <?php endforeach ?>
                   </select>
                 </div>

                 <div class="form-group" >
                   <label for="marca">Marca</label>
                   <select id="txtmarca" name="txtmarca" class="form-control selectpicker" data-live-search="true">
                       <?php foreach ($marcacombo as $atributos):  ?>
                         <option value="<?php echo $atributos->idmarca; ?>"<?php if ($atributos->idmarca==1): echo "selected"; endif ?>><?php echo $atributos->nombre; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>

                  <div class="form-group" >
                    <label for="formato">Formato</label>
                    <select id="txtformato" name="txtformato" class="form-control selectpicker" data-live-search="true">
                        <?php foreach ($formatocombo as $atributos):  ?>
                          <option value="<?php echo $atributos->idformato; ?>"<?php if ($atributos->idformato==1): echo "selected"; endif ?>><?php echo $atributos->nombre; ?></option>
                       <?php endforeach ?>
                     </select>
                   </div>

                   <div class="form-group" >
                     <label for="medida">Medida</label>
                     <select id="txtmedida" name="txtmedida" class="form-control selectpicker" data-live-search="true">
                         <?php foreach ($medidacombo as $atributos):  ?>
                           <option value="<?php echo $atributos->idmedida; ?>"<?php if ($atributos->idmedida==1): echo "selected"; endif ?>><?php echo $atributos->nombre; ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>

                    <div class="form-group" >
                      <label for="unmedida">Un. Medida</label>
                      <select id="txtunmedida" name="txtunmedida" class="form-control selectpicker" data-live-search="true">
                          <?php foreach ($unmedidacombo as $atributos):  ?>
                            <option value="<?php echo $atributos->idunmedida; ?>"<?php if ($atributos->idunmedida==1): echo "selected"; endif ?>><?php echo $atributos->nombre; ?></option>
                         <?php endforeach ?>
                       </select>
                     </div>

                     <div class="form-group <?php echo !empty(form_error('txtprecio'))? 'has-error' : '';?>">
                       <label for="precio">Precio</label>
                       <input type="text" id="txtprecio" name="txtprecio" class="form-control <?php if(form_error('txtprecio')) : ?>is-invalid<?php endif; ?>" value="<?php echo set_value('txtprecio')?>" onblur="this.value=this.value.toUpperCase();">
                       <?php echo form_error('txtprecio','<span class="help-block" style="color:red">','</span>')?>
                     </div>


                    <div class="form-group <?php echo !empty(form_error('txtcodigo'))? 'has-error' : '';?>">
                        <label for="codigo">Código</label>
                        <input type="text" id="txtcodigo" name="txtcodigo" class="form-control <?php if(form_error('txtcodigo')) : ?>is-invalid<?php endif; ?>" value="<?php echo set_value('txtcodigo')?>" onblur="this.value=this.value.toUpperCase();">
                        <?php echo form_error('txtcodigo','<span class="help-block" style="color:red">','</span>')?>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-success" >Guardar</button>
                    </div>

              </form>

            </div>

          </div>

        </div>

      </div>
    </section>
  </div>





</div>

<!-- <?php if ($this->uri->segment(2)=='cproducto') {?> -->

<!-- jquery-validation -->
<!-- <script src="<?php echo base_url();?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jquery-validation/additional-methods.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      txtcodigo: {
        required: true,
        unique: true,

      },
      txtnombre: {
        required: true,

      },
      txtdescripcion: {
        required: true
      },
    },
    messages: {
      txtcodigo: {
        required: "Por favor ingrese un código",

      },
      txtnombre: {
        required: "Por favor ingrese un nombre",
      },
      txtdescripcion: "Por favor ingrese una descripcion"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
<?php  }?> -->
