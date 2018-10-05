function create_character_user(form) {
    let a = create_character(form);
    if (a == false) return;
    
    let b = create_user(form);
    if (b == false) return;
}


function create_character(form) {
    let formdata = new FormData(form);
    $.ajax({
        url: "https://api.rome.callumb.co.uk/user/create_character.php",
        data: formdata,
        method: "POST",
        processData: false,
        contentType: false,
        success: function(result) {
            let json = $.parseJSON(result);
            if (json.error) {
                alert(json.error);
                return false;
            }
        }
    })
}


function create_user(form) {
    let formdata = new FormData(form);
    $.ajax({
        url: "https://api.rome.callumb.co.uk/user/create_user.php",
        data: formdata,
        method: "POST",
        processData: false,
        contentType: false,
        success: function(result) {
            let json = $.parseJSON(result);
            if (json.error) {
                alert(json.error);
                return false;
            }
        }
    })
}
