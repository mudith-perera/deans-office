$("#rePsw").focusout(() => {
    
    const psw = $("#psw").val();
    const rePsw = $("#rePsw").val();

    if (psw != rePsw) {
        $('#passwordErr').modal('show');
    }
    
    
})

$("form").submit(function () {
    console.log(this);
});

function reload() {
    
}

$(".modalBtn").click(function()  {
    window.location.reload();
});

// swal({
//     title: "Good job!",
//     text: "You clicked the button!",
//     icon: "success",
//     button: "Aww yiss!",
//   });