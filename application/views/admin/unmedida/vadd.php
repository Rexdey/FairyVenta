<div class="content-wrapper" width="100%">
  <div class="container-fluid">
    <section class="content-header">
      <h1>
          <a href="<?php echo base_url();?>mantenimiento/cunmedida/">unmedida</a>
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
              <!-- <form role="form" id="quickForm" action="<?php echo base_url();?>mantenimiento/cunmedida/cinsert" method="post"> -->
              <form  action="<?php echo base_url();?>mantenimiento/cunmedida/cinsert" method="post">
                <div class="form-group <?php echo !empty(form_error('txtcodigo'))? 'has-error' : '';?>">
                    <label for="codigo">Código</label>
                    <input type="text" id="txtcodigo" name="txtcodigo" class="form-control <?php if(form_error('txtcodigo')) : ?>is-invalid<?php endif; ?>" value="<?php echo set_value('txtcodigo')?>" onblur="this.value=this.value.toUpperCase();">
                    <?php echo form_error('txtcodigo','<span class="help-block" style="color:red">','</span>')?>

                </div>
                <div class="form-group <?php echo !empty(form_error('txtnombre'))? 'has-error' : '';?>" >
                  <label for="nombre">Nombre</label>
                  <input type="text" id="txtnombre" name="txtnombre" class="form-control <?php if(form_error('txtnombre')) : ?>is-invalid<?php endif; ?>" value="<?php echo set_value('txtnombre')?>" onblur="this.value=this.value.toUpperCase();">
                  <?php echo form_error('txtnombre','<span class="help-block" style="color:red">','</span>')?>
                </div>
                <div class="form-group <?php echo !empty(form_error('txtdescripcion'))? 'has-error' : '';?>">
                  <label for="descripcion">Descripción</label>
                  <input type="text" id="txtdescripcion" name="txtdescripcion" class="form-control <?php if(form_error('txtdescripcion')) : ?>is-invalid<?php endif; ?>" value="<?php echo set_value('txtdescripcion')?>" onblur="this.value=this.value.toUpperCase();">
                  <?php echo form_error('txtdescripcion','<span class="help-block" style="color:red">','</span>')?>
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

<!-- <?php if ($this->uri->segment(2)=='cunmedida') {?> -->

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
