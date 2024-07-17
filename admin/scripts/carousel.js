carousel_s_form.addEventListener('submit', function (e) {
    e.preventDefault();
    add_img();
})

function add_img() {
    let caro_img_inp = document.getElementById('caro_img_inp');
    let data = new FormData();
    data.append('picture', caro_img_inp.files[0]);
    data.append('add_img', '');
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../ajax/carousel_crud.php", true);
    xhr.onload = function () {
        var myModal = document.getElementById('carousel-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        if (this.responseText == 'inv_img') {
            alert('error', 'Image size should be bewtween 0-2 MB')
        } else if (this.responseText == 'inv_img') {
            alert('error', 'Please choose valid extention JPG and PNG');
        } else {
            alert('success', 'Member is Added');
            caro_img_inp.value = '';
            get_img();
        }
        console.log(this.responseText);
    }
    xhr.send(data);


}

function get_img() {

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../ajax/carousel_crud.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        document.getElementById('carousel_img').innerHTML = this.responseText
    }

    xhr.send('get_img');
    let elem = document.getElementsByClassName('show');
    elem[0].remove();
}

function remove_img(val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../ajax/carousel_crud.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (this.responseText == 1) {
            console.log(this.responseText);
            get_img();
        }
        else {
            alert('error', 'something went wrong')
        }
    }
    xhr.send('rem_img=' + val);
}



window.onload = function () {
    ;
    get_img();
}