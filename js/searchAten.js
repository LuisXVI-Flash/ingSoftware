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
        getUltimosAtendidos(data);
        filtrarAtendidos(data);
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
        // creamos el boton
        $('#listingTable').on('click', 'td.editor-delete', function (e) {
          e.preventDefault();
   
          editor.remove( $(this).closest('tr'), {
              title: 'Delete record',
              message: 'Are you sure you wish to remove this record?',
              buttons: 'Delete'
          } );
      } );
    // creamos la tabla
          $('#listingTable').DataTable({
            columns:[
              {data:"idsolicitud"},
              {data:"pac"},
              {data:"fecha"},
              {data:"nombres"},
              {
                data: null,
                className: "dt-center editor-delete",
                defaultContent: `<button class="btn btn-primary">atendido</button>`,
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

  //filtrar ultimos atendidos
  const containerCard=document.querySelector('.container__atendidos__cards');
  const template2=document.getElementById('card').content;
  const fragment2=document.createDocumentFragment();
  const getUltimosAtendidos=(data)=>{
    // const cards=document.querySelectorAll('.card__atendido');
    const atendidos=data.filter(dat=>dat.estado=="1");
    // const ultimaFecha=atendidos.filter(dat=>mayorfecha(dat.fecha));
    const ordenFechas=atendidos.sort((a,b)=>{
      if(a.fecha>b.fecha){
        return 1;
      }if(a.fecha<b.fecha){
        return -1;
      }
      return 0;
    });
    const ultimosTres=ordenFechas.slice(ordenFechas.length-3);
    // console.log(ultimosTres)
    // console.log(template2)
    ultimosTres.forEach(el => {
      console.log(el)
      template2.querySelector('.card__atendido h3').textContent=el.nombres;
      template2.querySelector('.card__atendido h4').textContent=el.fecha;
      const clone=template2.cloneNode(true);
      fragment2.appendChild(clone);
    });
    containerCard.appendChild(fragment2)
  //   for (let i = 0; i < ultimosTres.length; i++) {
  //   console.log(ultimosTres[i].fecha)
  //     template.querySelector('h3').textContent=ultimosTres[i].nombres;
  //     template.querySelector('h4').textContent=ultimosTres[i].fecha;
  // }
  // cards.forEach(element => {
  //   // console.log(element)
  //     element.querySelector('h3').innerHTML=ultimosTres[i].nombres;
  //     element.querySelector('h4').innerHTML=ultimosTres[i].fecha;
   
  // });

  }

  //paginador

})