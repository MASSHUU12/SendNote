$("#with_password").click(() => {
    $("#label-pass").slideToggle(300, () => {
        if ($("#label-pass").css("display") == "block")
            $("#label-pass").css("display", "flex");
    });
});

$("#with_notification").click(() => {
    $("#label-notif").slideToggle(300, () => {
        if ($("#label-notif").css("display") == "block")
            $("#label-notif").css("display", "flex");
    });
});

$("#with_views").click(() => {
    $("#label-views").slideToggle(300, () => {
        if ($("#label-views").css("display") == "block")
            $("#label-views").css("display", "flex");
    });
});
