const btn = document.getElementsByClassName('btn')




for (var i = 0 ; i < btn.length; i++) {
    btn[i].addEventListener('click' , (e) =>{

        console.log(e.target.id)
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../../php/afegirInscripcio.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
                
            }
        };
        xhr.send(`id=${e.target.id}`);
        e.target.style.background = 'lightgreen'
        e.target.innerHTML = 'Tarifa Contractada!!'
    }) 
 }
