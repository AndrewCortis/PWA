

var divmapa= document.getElementByid('map.canvas')
navigator.geolocalizacion.getCurrentposition(fn_ok,fn_mal);
//declaracion de las funciones fn_ok,fn_mal

function fn_mal(){

}
//se declara la funcion y se regresara una variable llamada rta

function fn_ok(){
	var lat=rta.coords.latitude;
	var lon=rta.coords.longitude;
	var texto='<h1>lugar y/O VISITA>'
}