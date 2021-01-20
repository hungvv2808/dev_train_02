(function () {

})();

$(document).ready(function() {
    setTimeout(function () {
        hideNoti();
    }, 3000)
});

function rollBack(role) {
    window.location.href = window.location.origin.concat("/dev_train_02/manage/index.php?role=" + role);
}

function triggerClick() {
    $('#customFile').click();
}

function displayImage(e) {
    if (e.files[0]) {
        var renderer = new FileReader();
        renderer.onload = function (e) {
            $('#customDisplay').attr('src', e.target.result);
        };
        renderer.readAsDataURL(e.files[0]);
    }
}

function hideNoti() {
    $('#alert').addClass('none');
}