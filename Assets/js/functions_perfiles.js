document.getElementById('profile-tab').addEventListener('click', function() {
    document.getElementById('profile-edit').classList.add('show', 'active');
    document.getElementById('profile-change-password').classList.remove('show', 'active');
});

document.getElementById('password-tab').addEventListener('click', function() {
    document.getElementById('profile-edit').classList.remove('show', 'active');
    document.getElementById('profile-change-password').classList.add('show', 'active');
});

function updateProfile() {
    const formProfile = document.querySelector("#form-profile");
    const formData = new FormData(formProfile);
    axios.post(base_url + '/Perfiles/updateProfile', formData)
        .then(response => {
            if (response.data.status) {
                Swal.fire('Éxito', response.data.msg, 'success');
            } else {
                Swal.fire('Error', response.data.msg, 'error');
            }
        })
        .catch(error => {
            Swal.fire('Error', 'Ocurrió un error en la solicitud', 'error');
        });
}

function changePassword() {
    const formPassword = document.querySelector("#form-password");
    const formData = new FormData(formPassword);
    axios.post(base_url + '/Perfiles/changePassword', formData)
        .then(response => {
            console.log(response.data);  // Verifica los datos que se reciben del servidor
            if (response.data.status) {
                Swal.fire('Éxito', response.data.msg, 'success');
                formPassword.reset();
            } else {
                Swal.fire('Error', response.data.msg, 'error');
            }
        })
        .catch(error => {
            console.error(error);  // Verifica el error en caso de problemas de red
            Swal.fire('Error', 'Ocurrió un error en la solicitud', 'error');
        });
}
