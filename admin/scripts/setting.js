let general_data;
let contact_data;

const team_s_form = document.getElementById('team_s_form');

// Fetch general settings
function get_general() {
    let site_title = document.getElementById('site_title');
    let site_about = document.getElementById('site_about');

    const shutdown_toggle = document.getElementById('shutdown_toggle');  // Fixed the ID

    let site_title_inp = document.getElementById('site_title_inp');
    let site_about_inp = document.getElementById('site_about_inp');

    let xhr = new XMLHttpRequest();
    xhr.open('GET', '../admin/ajax/api/general_settings.php?action=get_general', true);
    xhr.onload = function () {
        if (this.status == 200) {
            general_data = JSON.parse(this.responseText);
            site_title.innerText = general_data.site_title;
            site_about.innerText = general_data.site_about;

            site_title_inp.value = general_data.site_title;
            site_about_inp.value = general_data.site_about;

            // Set the state of the shutdown toggle
            if (general_data.shutdown == 0) {
                shutdown_toggle.checked = false;
                shutdown_toggle.value = 0;
            } else {
                shutdown_toggle.checked = true;
                shutdown_toggle.value = 1;
            }

            // Ensure that the event listener is only added once
            shutdown_toggle.removeEventListener('change', handleShutdownToggleChange);  // Remove previous listener if any
            shutdown_toggle.addEventListener('change', handleShutdownToggleChange);  // Add new listener
        } else {
            console.error('Error fetching general settings');
        }
    };
    xhr.send();
}

// Event handler for the shutdown toggle
function handleShutdownToggleChange() {
    upd_shutdown(shutdown_toggle.checked ? 1 : 0);
}

document.addEventListener('DOMContentLoaded', get_general);  // Fetch general settings on page load

// Update general settings
function upd_general() {
    const site_title_val = document.getElementById('site_title_inp').value;
    const site_about_val = document.getElementById('site_about_inp').value;

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../admin/ajax/api/general_settings.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        const myModal = document.getElementById('general-s');
        const modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        if (this.responseText == 1) {
            alert('success', 'Changes saved!');
        } else {
            alert('error', 'Changes not saved');
        }
    };
    xhr.send(`site_title=${encodeURIComponent(site_title_val)}&site_about=${encodeURIComponent(site_about_val)}&action=upd_general`);
}

// Update shutdown mode
function upd_shutdown(val) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../admin/ajax/api/general_settings.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (this.responseText == 1) {
            alert('success', 'Shutdown mode updated');
        } else {
            alert('error', 'Shutdown mode removed');
        }
    };
    xhr.send(`value=${encodeURIComponent(val)}&action=upd_shutdown`);  // Ensure correct key for `value`
}

// Fetch contact details
function get_contacts() {
    const contacts_ids = ["addressVal", "gmap", "pn1", "pn2", "email", "fb", "insta", "tw"];
    const iframe = document.getElementById('iframe');

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../admin/ajax/api/general_settings.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        const contact_data = JSON.parse(this.responseText);

        // Set the iframe src directly from the contact_data object
        iframe.src = contact_data.iframe;

        // Update the contact information on the page
        contacts_ids.forEach((id) => {
            document.getElementById(id).innerText = contact_data[id];
        });
        contact_inp(contact_data);
    };
    xhr.send('action=get_contacts');
}

// Populate contact input fields
function contact_inp(data) {
    const contact_inp_ids = ["address_inp", "gmap_inp", "pn1_inp", "pn2_inp", "email_inp", "fb_inp", "insta_inp", "tw_inp", "iframe_inp"];
    const contact_keys = ["addressVal", "gmap", "pn1", "pn2", "email", "fb", "insta", "tw", "iframe"];

    contact_inp_ids.forEach((id, index) => {
        document.getElementById(id).value = data[contact_keys[index]];
    });
}

// Update contact details
function upd_contact() {
    const contact_inp_ids = ["address_inp", "gmap_inp", "pn1_inp", "pn2_inp", "email_inp", "fb_inp", "insta_inp", "tw_inp", "iframe_inp"];
    const contact_bind = ['address', 'gmap', 'pn1', 'pn2', 'email', 'fb', 'insta', 'tw', 'iframe'];
    let data_str = contact_inp_ids.map((id, index) => `${contact_bind[index]}=${encodeURIComponent(document.getElementById(id).value)}`).join('&');
    data_str += '&action=upd_contact';

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../admin/ajax/api/general_settings.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        const myModal = document.getElementById('contact-s');
        const modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        if (this.responseText == 1) {
            alert('success', 'Changes saved!');
            get_contacts();
        } else {
            alert('error', 'Changes not saved');
        }
    };
    xhr.send(data_str);
}

// Add team member
team_s_form.addEventListener('submit', function (e) {
    e.preventDefault();
    add_member();
});

function add_member() {
    const member_name_inp = document.getElementById('member_name_inp');
    const member_pic_inp = document.getElementById('member_pic_inp');
    const data = new FormData();
    data.append('name', member_name_inp.value);
    data.append('picture', member_pic_inp.files[0]);
    data.append('action', 'add_member');

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../admin/ajax/api/general_settings.php", true);
    xhr.onload = function () {
        const myModal = document.getElementById('team-s');
        const modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        if (this.status == 200) {
            const response = JSON.parse(this.responseText);
            if (response.success) {
                alert(response.message);
                member_name_inp.value = '';
                member_pic_inp.value = '';
                get_member();
            } else {
                alert('Failed to add member: ' + response.message);
            }
        } else {
            alert('HTTP Error: ' + this.status);
        }
    };
    xhr.send(data);
}

document.addEventListener('DOMContentLoaded', function () {
    fetchTeamMembers(); // Fetch and display team members
});

function fetchTeamMembers() {
    fetch('path/to/your/api-endpoint', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'action': 'get_member'
        })
    })
        .then(response => response.text())
        .then(data => {
            document.getElementById('team_data').innerHTML = data;
        })
        .catch(error => console.error('Error fetching team members:', error));
}


// Fetch team members
function get_member() {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../admin/ajax/api/general_settings.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        document.getElementById('team_data').innerHTML = this.responseText;
    };
    xhr.send('action=get_member');
}

// Remove team member
function remove_mem(sr_no) {
    if (confirm('Are you sure you want to remove this team member?')) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../admin/ajax/api/general_settings.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onload = function () {
            if (this.status == 200) {
                const response = JSON.parse(this.responseText);
                if (response.success) {
                    alert('success', 'Member removed successfully.');
                    get_member();  // Refresh the list of team members
                } else {
                    alert('error', 'Failed to remove member: ' + response.message);
                }
            } else {
                alert('error', 'HTTP Error: ' + this.status);
            }
        };
        xhr.send(`action=rem_mem&value=${encodeURIComponent(sr_no)}`);
    }
}


// Reset general settings form
function resetGen() {
    const site_title_inp = document.getElementById('site_title_inp');
    const site_about_inp = document.getElementById('site_about_inp');
    site_title_inp.value = general_data.site_title;
    site_about_inp.value = general_data.site_about;
}

// Initial fetch of general settings, contact details, and team members
window.onload = function () {
    get_general();
    get_contacts();
    get_member();
}
