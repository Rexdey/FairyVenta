

// rellena el combo box ciudades
$.post(baseurl+"cciudad/getCiudades",
      {
        sitReg:1
      },
      function(data){
        var c = JSON.parse(data);
        $.each(c,function(i,item){
          $('#cboCIudad').append('<option value="'+item.idCiudad+'">'+item.ciudad+'</option>');
        });
      });

$('#cboCIudad').change(function(){
  $('#cboCIudad option:selected').each(function(){
    var id= $('#cboCIudad').val();
    alert(id);
  });
});

$('#btnGetPersonas').click(function(){
  // alert('entro al boton');
  $('#tblPersonas').html(
    '<tr>'+
    '<th style="width: 10px">#</th>'+
    '<th>Nombre</th>'+
    '<th>Paterno</th>'+
    '<th>Materno</th>'+
    '<th>DNI</th>'+
    '<th>Ciudad</th>'+
    '</tr>'
  );

  $.post(baseurl+"cpersona/getPersonas",
    function(data){
        // alert(data);
        var p = JSON.parse(data);
        $.each(p,function(i,item){
          $('#tblPersonas').append(
            '<tbody>'+
              '<td>1</td>'+
              '<td>'+item.nombre+'</td>'+
              '<td>'+item.app+'</td>'+
              '<td>'+item.apmaterno+'</td>'+
              '<td>'+item.dni+'</td>'+
              '<td>'+item.ciudad+'</td>'+
					   '</tbody>'
          );
        });
    });
});
