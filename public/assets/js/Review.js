function saveReview() {
    const id = $('#id').val();
    var formData = new FormData($('#reviewForm')[0]);

    ajaxRequest(`dashboard/review/${id ? 'update/' : ''}` + (id ? id : ''), 'POST', formData,
        function(response) {
            console.log(response);
            $('#reviewForm')[0].reset();
            alert('Review saved successfully!');
        },
        function(xhr, status, error) {
            console.error(xhr.responseText);
            alert('Failed to save review. Please try again later.');
        }
    );
}

function updateReview(id) {
    ajaxRequest('dashboard/review/update/' + id, 'GET', '',
        function(response) {
            console.log(response);
            toggleCollapse('form');
            $('#id').val(response.message.id);
            $('#id_product').val(response.message.id_product);
            $('#name').val(response.message.name);
            $('#email').val(response.message.email);
            $('#stars').val(response.message.stars);
            $('#review').val(response.message.review);
        },
        function(xhr, status, error) {
            console.error(xhr);
            alert('Failed to save review. Please try again later.');
        }
    );
}

function deleteReview(id) {
    if (confirm("Are you sure you want to delete this review?")) {
        ajaxRequest('dashboard/review/delete/' + id, 'GET', null,
            function(response) {
                console.log(response);
                alert('Review deleted successfully!');
            },
            function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Failed to delete review. Please try again later!');
            }
        );
    }
}

