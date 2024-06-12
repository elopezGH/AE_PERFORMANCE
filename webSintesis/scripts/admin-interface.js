const button = document.getElementsByClassName("button_admin")



for (var i = 0 ; i < button.length; i++) {
    button[i].addEventListener('click' , (e) =>{
    console.log(e.target.parentNode.parentNode.id)
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'admin-user-interface.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            
        }
    };
    xhr.send(`id=${e.target.parentNode.parentNode.id}`);
    }) 
 }
