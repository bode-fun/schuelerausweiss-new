const serverUrl = 'api/Controller.php';

$(document).on('click', '.login', function(e){
    e.preventDefault();

    console.group('START LOGIN');
    console.log('logging in...');

    let refEl = $(this);
    let refForm = $(refEl).closest('form');
    let sendData = $(refForm).serializeArray();

    $.ajax({
        url: serverUrl,
        dataType: "json",
        type: "POST",
        data: sendData,
        success: function (ret) {
            if(ret.status === 'success'){
                console.log('LOGGED IN!');
                showSuccessMessage(ret.message);
            }else{
                showErrorMessage(ret.message);
            }
            
            console.groupEnd();
        },
        error: function (xhr, exception) {
            var msg = "";
            if (xhr.status === 0) {
                msg = "Not connect.\n Verify Network." + xhr.responseText;
            } else if (xhr.status == 404) {
                msg = "Requested page not found. [404]" + xhr.responseText;
            } else if (xhr.status == 500) {
                msg = "Internal Server Error [500]." +  xhr.responseText;
            } else if (exception === "parsererror") {
                msg = "Requested JSON parse failed.";
            } else if (exception === "timeout") {
                msg = "Time out error." + xhr.responseText;
            } else if (exception === "abort") {
                msg = "Ajax request aborted.";
            } else {
                msg = "Error:" + xhr.status + " " + xhr.responseText;
            }
            
            showErrorMessage(msg);
            console.groupEnd();
        }
    }); 
});

function showSuccessMessage(message){
    Swal.fire({
        icon: 'success',
        title: 'Erfolgreich...',
        text: message,
        showConfirmButton: false,
        timer: 2000
    });
}

function showErrorMessage(message){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: message,
        showConfirmButton: false,
        timer: 2000
    });
}