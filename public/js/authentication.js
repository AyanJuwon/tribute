const password = document.getElementById('password');
const confirmPassword = document.getElementById('confirmPassword')
const show = document.getElementById('show');
const showConfirm = document.getElementById('showConfirm');
const hide = document.getElementById('hide');
const hideConfirm = document.getElementById('hideConfirm');
const iconPass = document.querySelector('.form-sign__iconPass');
const iconConfirmPass = document.querySelector('.form-sign__icon-confirmPass');

const passwordVisibility = function (pass, showID, hideID) {
    if (pass.type === 'password') {
        pass.type = 'text';
        hideID.style.display = 'none';
        showID.style.display = 'block';
    } else {
        pass.type = 'password';
        hideID.style.display = 'block';
        showID.style.display = 'none';
    }
}

iconPass.addEventListener('click', function () {
    passwordVisibility(password, show, hide);
});

iconConfirmPass.addEventListener('click', function () {
    passwordVisibility(confirmPassword, showConfirm, hideConfirm);
});