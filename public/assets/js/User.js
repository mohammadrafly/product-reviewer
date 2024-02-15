function saveUser() {
    const id = $('#id').val();
    var formData = new FormData($('#userForm')[0]);

    ajaxRequest(`dashboard/user/${id ? 'update/' : ''}` + (id ? id : ''), 'POST', formData,
        function(response) {
            console.log(response);
            $('#userForm')[0].reset();
            alert('User saved successfully!');
        },
        function(xhr, status, error) {
            console.error(xhr.responseText);
            alert('Failed to save user. Please try again later.');
        }
    );
}

function updateUser(id) {
    ajaxRequest('dashboard/user/update/' + id, 'GET', '',
        function(response) {
            console.log(response);
            toggleCollapse('form');
            $('#id').val(response.message.id);
            $('#name').val(response.message.name);
            $('#email').val(response.message.email);

            $('#password').prop('disabled', true);
            $('#password_confirm').prop('disabled', true);
        },
        function(xhr, status, error) {
            console.error(xhr);
            alert('Failed to save user. Please try again later.');
        }
    );
}

function deleteUser(id) {
    if (confirm("Are you sure you want to delete this user?")) {
        ajaxRequest('dashboard/user/delete/' + id, 'GET', null,
            function(response) {
                console.log(response);
                alert('User deleted successfully!');
            },
            function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Failed to delete user. Please try again later!');
            }
        );
    }
}

