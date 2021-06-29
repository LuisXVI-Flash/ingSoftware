
const buscarcliente = document.getElementById('btnbuscar_cliente')
const mostrarCliente=()=>{
    fetch("./controllers/controlador_busquedaclien.php")
    .then((res) => res.json())
    .then((data) => {
      // console.log(data);
      // console.log(JSON.parse(data))
      if (data.error) {

        console.log(data.error)
        //mensaje.innerHTML = `
          //  <div class="alert alert-danger" role="alert">
            //Llena el campo buscar
            //</div>`;
       // alerta.innerHTML=``;
      } else {

        // console.log(data)
       
        $(document).ready( function () {
            // creamos el boton
        //     $('#cliente_romel').on('click', 'td.editor-delete', function (e) {
        //       e.preventDefault();
       
        //       editor.remove( $(this).closest('tr'), {
        //           title: 'Delete record',
        //           message: 'Are you sure you wish to remove this record?',
        //           buttons: 'Delete'
        //       } );
        //   } );
        // creamos la tabla

        
              $('#cliente_romel').DataTable({
                columns:[
                  {data:"idcliente"},
                  {data:"nombres"},
                  {data:"apellidos"},
                  {data:"correo"},
                  {data:"dni"},
                  {data:"celular"},

                  {
                     data: null,
                    className: "dt-center editor-delete",
                //     defaultContent: `<form action="index.php?vista=cliente&id=${data["idcliente"]}"
                //     method="POST">
                //     <td class="content__btn">
                //         <input type="submit" name="Eliminar" value="Editar" class="btn btn-primary btn-sm">
                //     </td>
                // </form>`,
                render: function(data, type, row) {
                    return `<form action="index.php?vista=cliente&id=${data["idcliente"]}"
                        method="POST">
                        <td class="content__btn">
                           <input type="submit" name="Editar" value="Editar" class="btn btn-primary btn-sm">
                        </td>
                 </form>`;
                  },

                    orderable: false
                  },

                  {
                    data: null,
                    className: "dt-center editor-delete",
                    render: function(data, type, row) {
                        return `<form action="index.php?vista=cliente&id=${data["idcliente"]}"
                            method="POST">
                            <td class="content__btn">
                               <input type="submit" name="Eliminar" value="Eliminar" class="btn btn-secondary btn-sm">
                            </td>
                     </form>`;
                      },
                    orderable: false
                  },
                ],
                data:data,
                "language": {
                  "url": "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                },
                // success: function(data) {
                //   cargarTabla(data);
                //      },
              "lengthMenu":[[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
              });
            } );

      }
    });
  }
  console.log("Hola")
  mostrarCliente()
