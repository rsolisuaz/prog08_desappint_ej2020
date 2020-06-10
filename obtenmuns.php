<?php

  // Verifica que haya una sesión activa, si no es así enviar un codigo 403

  // Si hay sesion activa pero no trae el parametro ident  requerido via GET
  // enviar un codigo 400
  
  // Si todo esta bien, con ayuda del ServicioMunicipio obtener un arreglo con los municipios de la entidad solicitida y a partir de la respuesta dada por el servicio  crear un string compuesto de etiquetas option formadas con cada uno de los municipios, teniendo como value el id_municipio y como texto el nombre_municipio
  // En caso de que venga un parametro idmun, marcar el option correspondiente como selected
?>

