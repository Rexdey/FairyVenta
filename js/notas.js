// alert('asdf notas');
$.post(baseurl+"cnotas/getNotas",
  function(data){
    // alert(data);
    var obj = JSON.parse(data);
    var x = 0;
    $.each(obj, function(i,item){
      x=i+1;
      $('#tblNotas').append(
        '<tbody>'+
        '<tr class="filaNotas">'+
          '<td style="width: 100%">'+x+'</td>'+
          '<td style="width: 100%"><div class="alum" id="'+item.idPersona+'"></div>'+item.alumno+'</td>'+
          '<td style="width: 100%"> <input type="text" value="'+item.a+'" maxlength="2" class="nota1"></td>'+
          '<td style="width: 100%"> <input type="text" value="'+item.b+'" maxlength="2" class="nota2"></td>'+
          '<td style="width: 100%"> <input type="text" value="'+item.c+'" maxlength="2" class="nota3"></td>'+
          '<td style="width: 100%"> <input type="text" value="'+item.d+'" maxlength="2" class="nota4"></td>'+
          '<td style="width: 100%"> <input type="text" value="'+item.notafinal+'" maxlength="2" class="notafinal"></td>'+
          '</tr>'+
         '</tbody>'
      );

    });


        $('input').focus(function(){
         $(this).select();
        });
    // selecciona todo el contenido al hacer click

        $('input').change(function(){ //funciona en Chrome, Opera y casi al 100 en IE.
        if($(this).val()>20){
         alert('Valor incorrecto, por favor corrígelo.');
         $(this).select();
            }
          });
  // valida valor ingresado con alerta

      $('#tblNotas .nota4').change(function(){
        var i = $('.nota4').index(this);

        var n1 = $('.nota1:eq('+i+')').val();
        var n2 = $('.nota2:eq('+i+')').val();
        var n3 = $('.nota3:eq('+i+')').val();

        var promedio = (parseFloat(n1)+parseFloat(n2)+parseFloat(n3)+parseFloat($(this).val()))/4;
        $('.notafinal:eq('+i+')').val(promedio);
        // alert('nota4: ' + i);
      });
      //genera la nota final con el promedio


  });

  $('#btnGrabarNotas').click(function(){
    var i=0;
    $('#tblNotas .filaNotas').each(function(){
      var idPer = $('.alum:eq('+i+')').attr('id');
      var n1 = $('.nota1:eq('+i+')').val();
      var n2 = $('.nota2:eq('+i+')').val();
      var n3 = $('.nota3:eq('+i+')').val();
      var n4 = $('.nota4:eq('+i+')').val();
      var nf = $('.notafinal:eq('+i+')').val();

          $.post(baseurl="cnotas/saveNotas",
          {
            idPer:idPer,
            n1:n1,
            n2:n2,
            n3:n3,
            n4:n4,
            nf:nf
          },
        function(data){
                  //alert(data);
                      });
                      i++;
                });
              alert('se guardó satisfactoriamente');
              });
