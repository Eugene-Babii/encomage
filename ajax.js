var ao = createAjaxObject(); //ao is global variable

function createAjaxObject() {
    var ao = null;
    try {
        //for modern browsers
        ao = new XMLHttpRequest();
    }
    catch (e) {
        try {
            //for new IE
            ao = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            try {
                //for old browsers
                ao = new
                    ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) {
                alert("AJAX is not supported by your browser!")
                return false;
            }
        }
    }
    return ao;
}

function Process() {
    alert('hello');
    if (ao.readyState == 4 || ao.readyState == 0) {
        var f_id = document.getElementById("f_id").value;
        var f_first_name = document.getElementById("f_first_name").value;
        var f_last_name = document.getElementById("f_last_name").value;
        var f_email = document.getElementById("f_email").value;
        var from_create_date = document.getElementById("from_create_date").value;
        var to_create_date = document.getElementById("to_create_date").value;
        var from_update_date = document.getElementById("from_update_date").value;
        var to_update_date = document.getElementById("to_update_date").value;
        ao.open("POST", "filter.php", true);
        ao.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ao.onreadystatechange = getData;
        ao.send(
            "f_id=" + f_id +
            "&f_first_name=" + f_first_name +
            "&f_last_name=" + f_last_name +
            "&f_email=" + f_email +
            "&from_create_date=" + from_create_date +
            "&to_create_date=" + to_create_date +
            "&from_update_date=" + from_update_date +
            "&to_update_date=" + to_update_date
        );
    }
}

function getData() {
    if (ao.readyState == 4 && ao.status == 200) {
        resp = ao.responseText;
        document.getElementById("f_users").innerHTML = resp;
    }
}