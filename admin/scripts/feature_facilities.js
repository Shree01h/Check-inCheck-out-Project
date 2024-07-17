// for handling feature form
let features_s_form = document.getElementById('features_s_form');
features_s_form.addEventListener('submit', function (e) {
    e.preventDefault();
    add_features();
})

function add_features() {
    let features_name_inp = document.getElementById('features_name_inp');
    let data = new FormData();
    data.append('name', features_name_inp.value);
    data.append('add_features', '');
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../ajax/features_facilities_crud.php", true);
    xhr.onload = function () {
        var myModal = document.getElementById('features-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        console.log(this.responseText);
        if (this.responseText == 1) {
            alert('success', 'Features Added')
            features_name_inp.value = '';
            let elem = document.getElementsByClassName('show');
            elem[0].remove();
            get_features();
        } else {
            alert('error', 'Features not Added');
        }
    }
    xhr.send(data);

}

function get_features() {

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../ajax/features_facilities_crud.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        document.getElementById('features_data').innerHTML = this.responseText;
    }
    xhr.send('get_features');

}

function remove_features(val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../ajax/features_facilities_crud.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (this.responseText == 1) {
            // console.log(this.responseText);
            alert('Success', 'Features deleted')
            get_features();
        } else {
            alert('error', 'Features not deleted')
        }
    }
    xhr.send('rem_features=' + val);
}

// for handling facilities form
facilities_s_form.addEventListener('submit', function (e) {
    e.preventDefault();
    add_facilities();
})

function add_facilities() {
    let facilities_name_inp = document.getElementById('facilities_name_inp');
    let facilities_icon_inp = document.getElementById('facilities_icon_inp');
    let facilities_desc_inp = document.getElementById('facilities_desc_inp');
    let data = new FormData();
    data.append('icon', facilities_icon_inp.files[0]);
    data.append('name', facilities_name_inp.value);
    data.append('desc', facilities_desc_inp.value);
    data.append('add_facilities', '');
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../ajax/features_facilities_crud.php", true);
    xhr.onload = function () {
        var myModal = document.getElementById('facilities-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        if (this.responseText == 'inv_img') {
            alert('error', 'Image size should be bewtween 0-2 MB')
        } else if (this.responseText == 'inv_img') {
            alert('error', 'Please choose valid extention JPG and PNG');
        } else {
            alert('success', 'facilities is Added');
            facilities_name_inp.value = '';
            facilities_icon_inp.value = '';
            facilities_desc_inp.value = '';
            let elem = document.getElementsByClassName('show');
            elem[0].remove();
            get_facilities();
        }
    }
    xhr.send(data);
}

function get_facilities() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../ajax/features_facilities_crud.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        // console.log(this.responseText);
        document.getElementById('facilities_data').innerHTML = this.responseText;
    }
    xhr.send('get_facilities');

}

function remove_facilities(val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../ajax/features_facilities_crud.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (this.responseText == 1) {
            console.log(this.responseText);
            get_facilities();
            alert('success', 'Facilities Removed successfully');
        }
        else {
            alert('error', 'Facilities in not removed');
        }
    }
    xhr.send('rem_facilities=' + val);
}



window.onload = function () {
    get_features();
    get_facilities();
}