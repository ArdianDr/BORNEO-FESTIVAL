const toggle = document.getElementById('toggleDark');
const body = document.querySelector('body');
const menu = document.querySelector('.menu , .menu li a');
const deskripsi = document.querySelector('.artikel');

toggle.addEventListener('click', function(){
    this.classList.toggle('bi-moon');

    if(this.classList.toggle('bi-brightness-high-fill')){
        var konfirmasi = confirm("Berpindah ke light mode?");

        if(konfirmasi==true){
            body.style.background = '#6B728E';
            body.style.transition = '1s';

            menu.style.background = '#50577A';
            menu.style.transition = '1s';

            deskripsi.style.background = '#474E68'
            deskripsi.style.transition = '1s';
        }else{
            alert("GAGAL!");
        }
    }else{
        var konfirmasi = confirm("Berpindah ke darkmode?");

        if(konfirmasi==true){
            body.style.background = '#2B2B2B';
            body.style.transition = '1s';

            menu.style.background = '#404258';
            menu.style.transition = '1s';

            deskripsi.style.background = '#171010'
            deskripsi.style.transition = '1s';
        }else{
            alert("GAGAL!");
        }       
    }   
});

