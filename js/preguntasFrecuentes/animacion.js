$(function(){

    /*obtengo todos los elementos que tengan la clase .pregunta y los guardo en un arreglo caja */
    var caja = document.querySelectorAll('.pregunta');

    /*activo el evento scroll y ejecuto una function fade */
    window.addEventListener('scroll', fade);

    /*funcion que se encarga de dar la animacion de fade a las cajas obtenidas */
    function fade(){
        /**se obtiene el alto de la pantalla y lo dividimos */
        var altura = (window.innerHeight / 5 * 4);

        /**se recorre el arreglo para asignarle o quitarle una clase personalizada a cada elemento */
        caja.forEach(box =>{

            /**se obtiene la posicion del scroll respecto a la parte superior */
            var distancia = box.getBoundingClientRect().top;

            // titulo[j].classList.add('transform' + direccion);
            /**se valida que la posicion del scroll sea menor al tamaño del alto de la pantalla designado */
            if(distancia < altura){

                //**si es cierto, entonces se agrega la clase */
                box.classList.add('show');

            }else{
                //**si ya tiene la clase, entonces se remueve */
                box.classList.remove('show');
            }
        })
    }

    fade();

});




