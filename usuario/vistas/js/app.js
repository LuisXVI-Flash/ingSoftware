

function cerrar(){
    document.getElementById("mensaje").innerHTML="";

}

new Vue({
    el: "#app",
    data() {
        return {
            idproducto: null,
            pacproducto: null,
            apellidos: null,
            nombres: null,
            dni:null,
            correo: null,
            telefono: null,
            titulo:"Activacion del contrato SigFox",
            mensaje:"Siguiente",
            etapa:1,
        }
    },
    
    methods: {
        comprobariddispositivo() {

            var url = './controladores/api_dispositivo.php';
            var peticion = {
                "idproducto": this.idproducto,
            };
            if(this.idproducto!=null && this.idproducto.trim()!=""){

            
            fetch(url, {
                body: JSON.stringify(peticion),
                method: "POST",
                headers: {
                  "Content-Type": "application/json",
                },
              })
                .then((res) => res.json())
                .then((data) =>{
                    if(data=="1"){
                        
                        
                        document.getElementById("id").setAttribute("style","border:1px solid black");
                        // document.getElementById("menid").innerHTML="";
                    }else{
                        document.getElementById("id").setAttribute("style","border:2px solid red");
                        alert("Error ingrese un id valido")
                        // document.getElementById("menid").innerHTML="Error ingrese un valor valido";
                    }
                    
                })
                .catch(function(error) {
                    console.log('Hubo un problema con la petición ' + error.message);
                  });
            }
        },
        comprobarpacdispositivo(e) {
            // console.log('hola')
            // console.log(e.target.value)
            var url = './controladores/api_dispositivo.php';
            var peticion = {
                "pacproducto": this.pacproducto,
            };
            if(this.pacproducto!=null && this.pacproducto.trim()!=""){

            
            fetch(url, {
                body: JSON.stringify(peticion),
                method: "POST",
                headers: {
                  "Content-Type": "application/json",
                },
              })
                .then((res) => res.json())
                .then((data) =>{
                    if(data=="1"){
                        
                        document.getElementById("pac").setAttribute("style","border:1px solid black");
                        // document.getElementById("menpac").innerHTML="";
                    }else{
                        document.getElementById("pac").setAttribute("style","border:2px solid red");
                        // document.getElementById("menpac").innerHTML="Error ingrese un valor valido";
                        alert("Error ingrese un pac valido");
                    }
                    
                })
                .catch(function(error) {
                    console.log('Hubo un problema con la petición' + error.message);
                  });
            }
        },
        siguiente(){
            if(this.etapa!=3){
            var url = './controladores/api_dispositivo.php';
            var peticion = {
                "pacproducto": this.pacproducto,
                "idproducto": this.idproducto
            };
            // console.log(JSON.stringify(peticion));
            if(this.pacproducto!=null && this.pacproducto.trim()!="" && this.idproducto!=null && this.idproducto.trim()!=""){
            fetch(url, {
                body: JSON.stringify(peticion),
                method: "POST",
                headers: {
                  "Content-Type": "application/json",
                },
              })
                .then((res) => res.json())
                .then((data) =>{
                    if(data=="1"){
                        console.log("hola");
                        this.etapa=2;
                        this.titulo="Registro Cliente";
                       
                    }else{
                        
                    }
                    
                })
                .catch(function(error) {
                    
                  });
                }else{
                    alert("ingrese datos");
                }
            }else{
                window.location.replace("index.php");
            }
        },
        
        validar_email(){
            if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(this.correo)){
                return true;
               } else {
                alert("La dirección de email es incorrecta!.");
                return false;
               }
        },
        validar_telefono(){
            let dato= Array.from((this.telefono.trim()));
            if(dato.length<7 || dato.length>11 ){
                alert("el telefono debe ser de 7 a 11 caracteres ");
                return false;
            }else{
                return true;
            }
        },
        
        validar_dni(){
            let dato= Array.from((this.dni.trim()));
            if(dato.length!=8){
                alert("el dni debe ser de 8 caracteres ");
                return false;
            }else{
                return true;
            }

        },
        registrar_pedido(){
                
            var url = './controladores/api_dispositivo.php';
            var peticion = {
                "pacproducto": this.pacproducto,
                "idproducto": this.idproducto,
                "nombres":this.nombres,
                "apellidos":this.apellidos,
                "dni":this.dni,
                "correo":this.correo,
                "telefono":this.telefono
            };
            
            if(this.pacproducto!=null && this.pacproducto.trim()!="" && this.idproducto!=null && this.idproducto.trim()!=""&&this.nombres!=null && this.nombres.trim()!=""&&this.apellidos!=null && this.apellidos.trim()!=""&&this.correo!=null && this.correo.trim()!=""&&this.telefono!=null && this.telefono.trim()!=""){
            if(this.validar_dni&&this.validar_telefono&&this.validar_email){
                fetch(url, {
                body: JSON.stringify(peticion),
                method: "POST",
                headers: {
                  "Content-Type": "application/json",
                },
              })
                .then((res) => res.json())
                .then((data) =>{
                    if(data=="1"){
                        // this.mensaje="registrado";
                        this.etapa=3;
                        this.mensaje="Volver al inicio";
                        
                    }else{
                        alert("error al registras solicitud de activacion. Vuelva a intentarlo");
                    }
                    
                })
                .catch(function(error) {
                    console.log('Hubo un problema con la petición ' + error.message);
                    alert("error al registrar su solicitud");
                  });
                }else{
                    alert("rellene todo los campos primero");
                }
                }else{
                    alert("ingrese primero los datos");
                }
        },
        goBack() {
            if(this.etapa==1){
                window.history.back();
            }if(this.etapa==2){
                this.etapa=1;
                this.titulo="Activacion Dispositivo";
            }
            
          },
          terminar(){
            window.history.back();
          }
    },
})