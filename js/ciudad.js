$.post(baseurl+"cciudad/getCiudades",
{sitReg:1},
function(data){
  var obj = JSON.parse(data);
  output= '';
  var estilo = 'width: 100px; height: 100px; -moz-border-radius; 50%; -webkit-border-radius: 50%; border-radius: 50%; background: #5cb85c' ;
  $.each(obj, function(i, item){
    output += '<li>'+
      '<div style="'+estilo+'" class="clsCiudad"></div>'+
      '<a class="users-list-name" href="#">'+item.ciudad+'</a>'+
      '<span class="users-list-date">'+item.idCiudad+'</span>'+
    '</li>';

  });
  // $('#listCiudades').html(output);
  $('#listCiudades').append(output);

  $('#listCiudades .clsCiudad').click(function(index){
    var i = $('.clsCiudad').index(this);
    alert(i);
  });

  // $('#listCiudades .clsCiudad').click(function(index){
	// 		var i = $('.clsCiudad').index(this);

			// alert($(this).attr('id') + " " + $('.nomMesa:eq('+i+')').html());
      // alert(i);
		// });

});
