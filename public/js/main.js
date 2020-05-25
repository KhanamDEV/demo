$(document).ready(function () {
    let widthMenu = $("#wrap-menu ul").width();
    let widthDevice = $(document).width();
    let heightheader = $("#wrap-header-user").height();
    $("#main-container").css("padding-top", heightheader + "px");
    $('.show-menu').hide();
    function setFooter() {
        let heightHeaderLogin = $("#wrap-header-login").outerHeight();
        let heightHeaderUser = $("#wrap-header-user").outerHeight();
        let heightFooter = $("#wrap-footer").outerHeight();
        let heightContainer = $("#main-container").outerHeight();
        let heightDevice = document.documentElement.clientHeight;
        if (heightContainer + heightFooter + heightHeaderLogin < heightDevice || heightContainer + heightFooter + heightHeaderUser < heightDevice) {
            $("#wrap-footer").addClass('position');
        }
        else {
            $("#wrap-footer").removeClass('position');
        }
    }

    $('.show-menu').click(function () {
        showMenu();
    });
    $(".hide-menu").click(function () {
        hideMenu();
    });

    function showMenu() {
        let widthDevice = $(document).width();
        $('#wrap-menu .menu').css({ "left": "0", "transition": "all 0.5s" });
        if (widthDevice > 768) {
            $("#main-container").css({ 'padding-left': widthMenu + 'px', 'transition': "all 0.5s" });
            $("#wrap-header-user .title-header").css({ "padding-left": widthMenu + 'px', "transition": "all 0.4s" });
            $('.show-menu').hide();
            $('.logo-menu').css({ "left": "0", "transition": "all 0.5s" });
        }

    }

    function hideMenu() {
        let widthDevice = $(document).width();
        $('#wrap-menu .menu').css({ "left": "-100%", "transition": "all 0.5s" });
        if (widthDevice > 768) {
            $("#main-container").css({ 'padding-left': 0 + 'px', 'transition': "all 0.5s" });
            $("#wrap-header-user .title-header").css({ "padding-left": '0px', "transition": "all 0.4s" });
            $('.show-menu').show();
            $('.logo-menu').css({ "left": "-100%", "transition": "all 0.5s" });
        }

    }
    function setLogomenu() {
        let widthtLogo = $(".menu").width();
        $(".logo-menu").attr("style", "width: " + widthtLogo + 'px');
    }

    function responsive() {
        let widthDevice = $(document).width();
        if (widthDevice > 768) {
            $("#main-container").css({ 'padding-left': widthMenu + 'px' });
            $("#wrap-header-user .title-header").css({ "padding-left": widthMenu + 'px', "transition": "all 0.4s" });
            $("#wrap-header-user").css({ "position": "none" });
            $("ul.menu").css("left", "0");
            $(".logo-menu").css({ "left": "0px", 'transition': 'all 0.5s' });
        }
        else {
            $("#wrap-header-user").css({ "position": "fixed", "width": "100%" });
            $("#wrap-header-user .title-header").css({ "padding-left": 0 + 'px' });
            $("ul.menu").css("left", "-100%");
            $(".logo-menu").css({ "left": "-100%", 'transition': 'all 0s' });
        }
    }
    $("#show-form-edit").click(function(){
        $(this).hide();
        $(".form-hide").show();
    });
    $(".form-hide button:first-child()").click(function(){
        $(".form-hide").hide();
        $("#show-form-edit").show();
    });
    $("#show-modal-2").click(function(){
        $(this).parent().find("button").first().click();
    });
    responsive();
    setFooter();
    setLogomenu();
    $(window).resize(function () {
        setFooter();
        responsive();
    });
})