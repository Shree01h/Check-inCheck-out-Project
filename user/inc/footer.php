<!-- Footer -->

<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-lg-4 p-4">
            <h3 class="h-font fw-bold fs-3 mb-2">OceanOasis Hotel</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis ipsum cumque eaque! Illo, quibusdam
                expedita?</p>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Links</h5>
            <a href="#" class="d-inline-block mb-2 text-decoration-none text-dark">Home</a><br>
            <a href="#" class="d-inline-block mb-2 text-decoration-none text-dark">Rooms</a><br>
            <a href="#" class="d-inline-block mb-2 text-decoration-none text-dark">Facilities</a><br>
            <a href="#" class="d-inline-block mb-2 text-decoration-none text-dark">Contact Us</a><br>
            <a href="#" class="d-inline-block mb-2 text-decoration-none text-dark">About</a>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Follow Us</h5>
            <a href="#" class="d-inline-block text-decoration-none text-dark mb-2">
                <i class="bi bi-twitter me-1"></i> Twitter
            </a><br>
            <a href="#" class="d-inline-block text-decoration-none text-dark mb-2">
                <i class="bi bi-facebook me-1"></i> Facebook
            </a><br>
            <a href="#" class="d-inline-block text-decoration-none text-dark">
                <i class="bi bi-instagram me-1"></i> Instagram
            </a>
        </div>
    </div>
</div>
<h6 class="text-center bg-dark text-white p-3 m-0">Designed and Developed by OceanOasis Hotel</h6>
<script>
    function alert(type, msg, position = 'body') {
        let bs_class = (type === "success") ? "alert-success" : 'alert-danger';
        let element = document.createElement('div');
        element.innerHTML = `
        <div class="alert ${bs_class} alert-dismissible fade show custom-alert" role="alert">
            <strong class="me-3">${msg}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        `;
        if (position === 'body') {
            document.body.append(element);
            element.classList.add('custom-alert');
        } else {
            document.getElementById(position).appendChild(element);
        }
        setTimeout(() => { document.getElementsByClassName('alert')[0].remove(); }, 2000);
    }

    document.getElementById('register-form').addEventListener('submit', (e) => {
        e.preventDefault();
        let register_form = e.target;
        let data = new FormData(register_form);

        var myModal = document.getElementById('registerModal');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../ajax/login_register.php", true);

        xhr.onload = function () {
            console.log(this.responseText); // Debugging output
            if (this.responseText === 'pass_mismatch') {
                alert('error', "Password Mismatch");
            } else if (this.responseText === 'email_already') {
                alert('error', "Email is already registered!");
            } else if (this.responseText === 'phone_already') {
                alert('error', "Phone Number is already registered!");
            } else if (this.responseText === 'ins_failed') {
                alert('error', "Registration failed!");
            } else if (this.responseText === '1') {
                alert('success', "Registration Successful!");
                register_form.reset();
            } else {
                alert('error', "Unexpected response: " + this.responseText);
            }
        };

        xhr.send(data); // Ensure FormData is sent
    });

    document.getElementById('book-room-form').addEventListener('submit', (e) => {
    e.preventDefault();
    let bookRoomForm = e.target;
    let data = new FormData(bookRoomForm);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../ajax/book_room.php", true);

    xhr.onload = function () {
        console.log(this.responseText); // Debugging output
        if (this.responseText === '1') {
            alert('Booking Successful!');
            bookRoomForm.reset(); // Reset the form to defaults
            // Reset select options to default
            bookRoomForm.querySelector('select[name="adult"]').value = '1';
            bookRoomForm.querySelector('select[name="children"]').value = '0';
        } else if (this.responseText === 'ins_failed') {
            alert('Booking failed. Please try again.');
        } else if (this.responseText === 'Invalid Request') {
            alert('Invalid Request. Please check your input.');
        } else {
            alert('Unexpected response: ' + this.responseText);
        }
    };

    xhr.send(data);
});



</script>