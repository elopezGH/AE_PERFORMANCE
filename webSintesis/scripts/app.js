let menuVisible = false;

function mostrarOcultarMenu(){
    if(menuVisible){
        document.getElementById("nav").classList ="";
        menuVisible = false;
    }else{
        document.getElementById("nav").classList ="responsive";
        menuVisible = true;
    }
}
function seleccionar(){

    document.getElementById("nav").classList = "";
    menuVisible = false;
}
document.getElementById('scrollButton').addEventListener('click', function() {
    
    var contentHeight = document.querySelector('.contenedor-inicio1, .contenedor-inicio, .contenedor-inter').scrollHeight;
    

    window.scrollTo({
        top: contentHeight,
        behavior: 'smooth'
    });
});