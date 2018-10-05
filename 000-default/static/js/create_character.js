function create_character_user(form) {    
    let formdata = new FormData(form);
    let redirect = true;
    $.ajax({
        url: "https://api.realmsofmiddle-earth.com/user/create_user.php",
        data: formdata,
        method: "POST",
        processData: false,
        contentType: false,
        success: function(result) {
            let json = $.parseJSON(result);
            console.log(json);
            if (json.error != null) {
                alert(json.error);
                redirect = false;
                return false;
            }
            $.ajax({
                url: "https://api.realmsofmiddle-earth.com/user/create_character.php",
                data: formdata,
                method: "POST",
                processData: false,
                contentType: false,
                success: function(result) {
                    let json = $.parseJSON(result);
                    console.log(json);
                    if (json.error != null) {
                        alert(json.error);
                        redirect = false;
                        return false;
                    }
                    else {
                        alert("Account created successfully!");
                        $(location).attr('href', '/main');
                    }
                }
            });
        }
    });
}


function create_character(form) {
    let formdata = new FormData(form);
    $.ajax({
        url: "https://api.realmsofmiddle-earth.com/user/create_character.php",
        data: formdata,
        method: "POST",
        processData: false,
        contentType: false,
        success: function(result) {
            let json = $.parseJSON(result);
            console.log(json);
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
        url: "https://api.realmsofmiddle-earth.com/user/create_user.php",
        data: formdata,
        method: "POST",
        processData: false,
        contentType: false,
        success: function(result) {
            let json = $.parseJSON(result);
            console.log(json);
            if (json.error) {
                alert(json.error);
                return false;
            }
        }
    })
}
