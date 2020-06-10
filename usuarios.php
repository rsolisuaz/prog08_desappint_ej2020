<?php
   // Verifica que haya una sesión activa, si no es así redireccionar a login.php

  include "config.php";
  include "MiPDO.php";
  include "headdoc.php";
  include "servicioentidad.php";
  include "serviciousuario.php";
  include "serviciomunicipio.php";
  $serventidad = new ServicioEntidad();
  $servusuario= new ServicioUsuario();
  $servmun=new ServicioMunicipio();
?>

<body>
  <?php
    $nomfuncioneliminar="eliminaUsuario";
    $nomfuncioncancelar="cancelaUsuario";
    include "modaleliminar.php";
    include "modalcancelar.php";
    include "barranav.php";  
  ?>
  <main class="container">
    <div class="py-4">      
      <form id="formausuario" onsubmit="return false">
      <div class="row">
        <div class="col">
          <h5>Información del Usuario</h5>
        </div>
      </div>
      <div class="border border-secondary rounded px-4 py-4">
        <div class="form-group row">
          <label class="col-4 col-lg-1 my-2">Nombre</label>
          <div class="col-8 col-lg-3 my-2">
            <input type="text" id="nombre" name="nombre" class="form-control border border-dark">
          </div>
  
          <label class="col-4 col-lg-2 my-2">Apellido Paterno</label>
          <div class="col-8 col-lg-2 my-2">
            <input type="text" id="ap_paterno" name="ap_paterno" class="form-control border border-dark">
          </div>
  
          <label class="col-4 col-lg-2 my-2">Apellido Materno</label>
          <div class="col-8 col-lg-2 my-2">
            <input type="text" id="ap_materno" name="ap_materno" class="form-control">
          </div>
  
          <div class="w-100"></div>
  
          <label class="col-4 offset-lg-1 col-lg-1 my-2">RFC</label>
          <div class="col-8 col-lg-4 my-2">
            <input type="text" id="RFC" name="RFC" class="form-control border border-dark">
          </div>
  
          <label class="col-4 col-lg-1 my-2">e-mail</label>
          <div class="col-8 col-lg-4 my-2">
            <input type="text" id="email" name="email" class="form-control border border-dark">
          </div>
        </div>

        <div class="row">
          <div class="col">
            <h5>Dirección</h5>
          </div>
        </div>
        <div class="border border-secondary rounded px-4 py-4">
          <div class="form-group row">
            <label class="col-4 col-lg-1 my-2">Calle</label>
            <div class="col-8 col-lg-5 my-2">
              <input type="text" id="calle" name="calle" class="form-control">
            </div>
    
            <label class="col-4 col-lg-1 my-2">Colonia</label>
            <div class="col-8 col-lg-5 my-2">
              <input type="text" id="colonia" name="colonia" class="form-control">
            </div>
    
            <div class="w-100"></div>
    
            <label class="col-4 col-lg-1 my-2">Entidad</label>
            <div class="col-8 col-lg-2 my-2">
              <select class="form-control" id="entidad" name="entidad" onchange="cambiaMunicipios()">

               <?php
                  // Aqui va el codigo para cargar las entidades como options
                ?>
              </select>
            </div>
    
            <label class="col-4 col-lg-1 my-2">Municipio</label>
            <div class="col-8 col-lg-2 my-2">
              <select class="form-control" id="municipio" name="municipio">
               <?php
                  // Aqui va el codigo para cargar los municipios como options
                ?>
                  ?>    
                </select>
            </div>
    
            <label class="col-4 col-lg-1 my-2">Código Postal</label>
            <div class="col-8 col-lg-2 my-2">
              <input type="text" id="codpostal" name="codpostal" class="form-control">
            </div>
            
            <label class="col-4 col-lg-1 my-2">Teléfono</label>
            <div class="col-8 col-lg-2 my-2">
              <input type="text" id="telefono" name="telefono" class="form-control border border-dark">
            </div>
          </div>
        </div>
      </div>

      <div class="form-group row mt-3">
        <button type="button" class="col-12 offset-lg-3 col-lg-2 my-2 btn btn-secondary ocultable" id="botonguardausuario" onclick="guardaUsuario()">Agregar</button>
        <button type="button" class="col-12 offset-lg-2 col-lg-2 my-2 btn btn-secondary ocultable" id="botoncancelausuario" onclick="confirmaCancelaUsuario()">Cancelar</button>
      </div>

      <div class="form-group row my-5">
        <div class="col-12 offset-lg-1 col-lg-7 my-2">
          <select id="usuarios" name="usuarios" size="8" onchange="obtenInfoUsuario()"  class="form-control">
            <?php
                  // Aqui va el codigo para cargar los usuarios como options
                ?>  
          </select>
        </div>
        <div class="col-12 offset-lg-1 col-lg-2 my-2">
          <div class="row">
            <button  type="button" class="col-12 btn btn-secondary my-1 deshabilitable" id="botonnuevousuario" onclick="nuevoUsuario()">Nuevo</button>
            <div class="w-100"></div>
            <button  type="button" class="col-12 btn btn-secondary my-1 deshabilitable" id="botonmodificausuario" onclick="modificaUsuario()">Modificar</button>
            <div class="w-100"></div>
            <button type="button" class="col-12 btn btn-secondary my-1 deshabilitable" id="botoneliminausuario" onclick="confirmaElimUsuario()">Eliminar</button>
          </div>
        </div>
      </div>
    </form>


    </div>
  </main>

  <?php
  include "footer.php";
  ?>

  <script>
    $(document).ready(function() {
        deshabilitaCampos("#formausuario",true)
        $("#botonnuevousuario").prop("disabled",false)
    })
  </script>
</body>

</html>
