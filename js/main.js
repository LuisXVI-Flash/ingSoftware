'use strict';
window.addEventListener("load", () => {
  const formbuscar = document.getElementById("formbuscar");
  const buscar = document.getElementById("buscar");
  const alerta = document.getElementById("tbody");
  const mensaje = document.getElementById("mensaje");

  const template=document.querySelector('#template-table').content;
  const fragment=document.createDocumentFragment();
  const mostrarProducto=()=>{
    fetch("./controllers/controlador_busqueda.php")
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
        for (let i = 0; i < data.length; i++) {
        
          template.querySelector('.trow #id').textContent = data[i].id;
          template.querySelector('.trow #pac').textContent = data[i].pac;
          template.querySelector('.trow #estado').textContent = data[i].estado;
          // template.querySelector('.trow #idproducto').textContent = data[i].idproducto;
          
          template.querySelector('.trow #editar').setAttribute("href",`index.php?vista=dispositivo&id=${data[i].idproducto}&operacion=editar`);
          template.querySelector('.trow #eliminar').setAttribute("href",`index.php?vista=dispositivo&id=${data[i].idproducto}&operacion=eliminar`);
          const clone=template.cloneNode(true);
          fragment.appendChild(clone);
        }
        alerta.append(fragment)
       // mensaje.innerHTML = ``;
      }
    });
  }

  mostrarProducto();

  const buscarProdcuto=(producto)=>{
    const data = {
        producto,
      };
      fetch("./controllers/controlador_busqueda.php", {
        body: JSON.stringify(data),
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.error) {
            mensaje.innerHTML = `
              <div class="alert alert-danger" role="alert">
              producto no encontrado 2
              </div>`;
              alerta.innerHTML= ``;
          }else{
            alerta.innerHTML=``;
          for (let i = 0; i < data.length; i++) {
            
          template.querySelector('.trow #id').textContent = data[i].id;
          template.querySelector('.trow #pac').textContent = data[i].pac;
          template.querySelector('.trow #estado').textContent = data[i].estado;
          // template.querySelector('.trow #idproducto').textContent = data[i].idproducto;
          
          template.querySelector('.trow #editar').setAttribute("href",`index.php?vista=dispositivo&id=${data[i].idproducto}&operacion=editar`);
          template.querySelector('.trow #eliminar').setAttribute("href",`index.php?vista=dispositivo&id=${data[i].idproducto}&operacion=eliminar`);
            const clone=template.cloneNode(true);
            fragment.appendChild(clone);
          }
          alerta.append(fragment)
          mensaje.innerHTML = ``;
        }
        });
  }
  // GET
  formbuscar.addEventListener("submit", (e) => {
    e.preventDefault();
    buscarProdcuto(buscar.value);
  });

  //POST
  buscar.addEventListener("keyup", (e) => {
    if(e.target.value.length==0){
      // console.log('no hay nada');
        mostrarProducto();
        alerta.innerHTML= ``;
    }else{
      buscarProdcuto(e.target.value);
    }
  });
});
