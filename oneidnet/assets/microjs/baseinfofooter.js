$(document).on("click", "#basicinfo_page", function() {
    window.location = oneidnet_url + "basic_info"
}), $(document).on("click", "#preferences", function() {
    window.location = oneidnet_url + "preferences"
}), $(document).on("click", "#people_page", function() {
    window.location = oneidnet_url + "people"
}), $(document).on("click", "#deactive_page", function() {
    window.location = oneidnet_url + "deactive"
}), $(document).on("click", "#statistics", function() {
    window.location = oneidnet_url + "statistics"
}), $(document).on("click", "#invitefriends", function() {
    window.location = oneidnet_url + "invite"
}), $(document).on("click", "#setting_icon", function() {
    window.location = oneidnet_url
}), $(document).on("click", "#settings", function() {
    window.location = oneidnet_url
}), $(document).on("click", "#requests", function() {
    window.location = oneidnet_url + "login/doLogout"
}),  $(".suggession-close").click(function() {
    $(this).parent().hide()
});

