function saveProfile() {
    var formData = new FormData($('#profileForm')[0]);

    ajaxRequest(`dashboard/profile`, 'POST', formData,
        function(response) {
            console.log(response);
            $('#profileForm')[0].reset();
            alert('Profile saved successfully!');
        },
        function(xhr, status, error) {
            console.error(xhr.responseText);
            alert('Failed to save profile. Please try again later.');
        }
    );
}

function savePassword() {
    var formData = new FormData($('#passwordForm')[0]);

    ajaxRequest(`dashboard/profile/change/password`, 'POST', formData,
        function(response) {
            console.log(response);
            $('#passwordForm')[0].reset();
            alert('Password changed successfully!');
        },
        function(xhr, status, error) {
            console.error(xhr.responseText);
            var errorMessage = JSON.parse(xhr.responseText).message;
            alert(`Failed to change password. ${errorMessage}`);
        }
    );
}
