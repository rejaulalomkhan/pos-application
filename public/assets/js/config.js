// show loader
function showLoader(){
    document.getElementById('loading').classList.remove('d-none');
    document.getElementById('main').style.opacity = '0.5';
    document.getElementById('main').style.pointerEvents = 'none';
}

// hide loader
function hideLoader(){
    document.getElementById('loading').classList.add('d-none');
    document.getElementById('main').style.opacity = '1';
    document.getElementById('main').style.pointerEvents = 'auto';
}

// show success message
function successToast($msg){
    Toastify({
        text: $msg,
        duration: 3000,
        className: "mb-5",
        close: true,
        gravity: "bottom",
        position: "left",
        style: {
          background: "linear-gradient(to right, #188c05, #3bb634)",
        }
      }).showToast();
}

// show error toast
function errorToast($msg){
    Toastify({
        text: $msg,
        duration: 3000,
        className: "mb-5",
        close: true,
        gravity: "bottom",
        position: "left",
        style: {
          background: "linear-gradient(to right, #ec0b14, #900a1d)",
        }
      }).showToast();
}
