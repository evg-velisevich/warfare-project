$(document).ready(() => {
    $.getJSON("engine/ajaxData.php", {"user_id":"349401911"}, (response) => {
        console.log(response);
    });
});