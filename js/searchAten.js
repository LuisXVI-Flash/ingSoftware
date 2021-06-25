'use strict';
window.addEventListener("load", () => {
  const formbuscar = document.getElementById("formbuscar");
  const buscar = document.getElementById("buscar");
  const alerta = document.getElementById("tbody");
  const mensaje = document.getElementById("mensaje");
  const selectAtendido=document.getElementById("selectAtendido");

  const template=document.querySelector('#template-table-atendido').content;
  const fragment=document.createDocumentFragment();
  const mostrarAtendido=()=>{
    fetch("./controllers/controlador_atendido.php")
    .then((res) => res.json())
    .then((data) => {
      console.log(data);
      // console.log(JSON.parse(data))
      if (data.error) {
        mensaje.innerHTML = `
            <div class="alert alert-danger" role="alert">
            Llena el campo buscar
            </div>`;
        alerta.innerHTML=``;
      } else {
        // const datos=JSON.stringify(data);
        filtrarAtendidos(data)
      //   console.log(filtrarAtendidos(data))
      //   for (let i = 0; i < data.length; i++) {
      //     console.log(data[i].pac)
      //     template.querySelector('.trow #id').textContent = data[i].idsolicitud;
      //     template.querySelector('.trow #pac').textContent = data[i].pac;
      //     template.querySelector('.trow #fecha').textContent = data[i].fecha;
      //     template.querySelector('.trow #name').textContent = data[i].nombres;

      //     template.querySelector('.trow #editar').setAttribute("href",`index.php?vista=dispositivo&id=${data[i].idproducto}&operacion=editar`);
      //     const clone=template.cloneNode(true);
      //     fragment.appendChild(clone);
      //   }
      //   alerta.append(fragment)
      //  mensaje.innerHTML = ``;
      
      $(document).ready( function () {
          $('#listingTable').DataTable({
            data:data,
            // "columns":[
            // {"data":data},
            // {"defaultContent":`<a class="btn btn-danger my-2 btn__action" href="index.php?vista=dispositivo&id=${data[i].idproducto}&operacion=editar"></a>`}
            // ],
          //   "language": {
          //     "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
          // },
          "lengthMenu":[[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
          });
        } );
      }
    });
  }
  mostrarAtendido()
  // buscador

  // filtro atendidos y no atendidos
  const filtrarAtendidos=(data)=>{
    selectAtendido.addEventListener('change',()=>{
      // console.log({data})
      // let opt=selectAtendido.options[0];
      // console.log(opt)
      const atendidos=data.filter(dat=>dat.estado=="1");
      const noatendidos=data.filter(dat=>dat.estado=="0");
      if(selectAtendido.value=="atendido"){
        console.log(atendidos)
        return atendidos
      }else if(selectAtendido.value=="no atendido"){
        console.log(noatendidos)
        return noatendidos
      }else if(selectAtendido.value=="filtrar"){
        console.log(data)
        return data
      }
    })
  }

  //paginador

})