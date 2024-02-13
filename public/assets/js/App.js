const BASE_URL = 'http://127.0.0.1:8000/';
const DASHBOARD = BASE_URL + 'dashboard/';

async function Logout() {
    try {
        const response = await $.ajax({
            type: 'GET',
            url: DASHBOARD + 'logout',
            dataType: 'json'
        });

        window.location.href = response.redirect;
    } catch (error) {
        console.error(error);
    }
}

function toggleCollapse(elementId) {
    const element = document.getElementById(elementId);
    element.classList.toggle('max-h-0');
    element.classList.toggle('max-h-full');
    element.classList.toggle('hidden');
}

function ajaxRequest(url, method, data, successCallback, errorCallback) {
    if (typeof data === '') {
        data = null;
    }

    $.ajax({
        url: BASE_URL + url,
        method: method,
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        success: successCallback,
        error: errorCallback
    });
}
