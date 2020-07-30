/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$('.class').on('click', () => console.log("Entrei"))

document.getElementsByClassName('class')[0].onclick = 

$(document).ready(function () {
    var indiceId = {"system": 0, "notifications": 0, "informationsUser": 0};
    $('.menu .item').tab();
    $('.checkbox').checkbox();
    $('select').dropdown();
    $(".carregando").removeClass('active');//loader
    var idSibebar = "";
    $(window).resize(function () {
        if ($(window).width() <= 767) {
            idSibebar = "sidebarMobile";
        } else if ($(window).width() >= 767 && $(window).width() <= 991) {
            idSibebar = "sidebarTablet";
        } else {
            idSibebar = "sidebarPC";
        }
    });
    if ($(window).width() <= 767) {
        idSibebar = "sidebarMobile";
    } else if ($(window).width() >= 767 && $(window).width() <= 991) {
        idSibebar = "sidebarTablet";
    } else {
        idSibebar = "sidebarPC";
    }

    $(".openbtn").on("click", function () {
        sidebarDevices();
        $(".openbtn").toggleClass("marginlefting");
        $(".openbtnmobile").toggleClass("marginleftingMobile");
        $(".openbtntablet").toggleClass("marginleftingTablet");
    });
    $(".openbtnmobile").on("click", function () {
        sidebarDevices();
        $(".openbtn").toggleClass("marginlefting");
        $(".openbtnmobile").toggleClass("marginleftingMobile");
        $(".openbtntablet").toggleClass("marginleftingTablet");
    });
    $(".openbtntablet").on("click", function () {
        sidebarDevices();
        $(".openbtn").toggleClass("marginlefting");
        $(".openbtnmobile").toggleClass("marginleftingMobile");
        $(".openbtntablet").toggleClass("marginleftingTablet");
    });
    // Lógica para itens sem  content
    $(".ui.accordion .item.notContent").click(function () {
        var valorId = $(this).attr('id');
        var content = $(this).parent().attr("id");
        eachRemoveClass('.ui.accordion .content#' + content + ' .title.item', 'auxActive');
        eachRemoveClass('.ui.accordion .content#' + content + ' .title.item', 'active');
        eachRemoveClass('.ui.accordion .content#' + content + " .content", 'active');
        eachRemoveClass('.ui.accordion .content#' + content + " .content", 'auxActive');
        eachRemoveClass('.ui.accordion .item.notContent', 'active');
        eachRemoveClass('.ui.accordion .item.aLoadContainer', 'activeA');
        eachRemoveClass('.ui.accordion .content:not(#' + content + ')', 'active');
        eachRemoveClass('.ui.accordion .content:not(#' + content + ')', 'auxActive');
        eachRemoveClass('.ui.accordion .title:not(#' + content + ')', 'active');
        eachRemoveClass('#iconesSidebarMenor i', 'active');
        var rota = "";
        if (content != undefined) {
            rota = content + "/" + valorId;
            $(".ui.accordion .title#" + content).removeClass('auxActive');
            $("#iconesSidebarMenor i#" + content).addClass('active');
        } else {
            rota = valorId;
            $("#iconesSidebarMenor i#" + valorId).addClass('active');
        }
        $(".ui.accordion .item.notContent#" + valorId).addClass('active');
        // Chama função para carregar container de acordo com a rota
        ajaxToLoadContainer(rota);
    });
    // Lógica para tag a carregar container
    $(".ui.accordion .aLoadContainer").click(function () {
        var valorId = $(this).attr('id');
        var content = $(this).parent().attr("id");
        var parentContent = $(this).parent().parent().parent().attr("id");
        eachRemoveClass('.ui.accordion .content:not(#' + parentContent + ') .content', 'active');
        eachRemoveClass('.ui.accordion .content:not(#' + parentContent + ') .content', 'auxActive');
        eachRemoveClass('.ui.accordion .content:not(#' + parentContent + ') .title.item', 'active');
        eachRemoveClass('.ui.accordion .content:not(#' + parentContent + ') .title.item', 'auxActive');
        eachRemoveClass('.ui.accordion .content#' + parentContent + ' .title.item:not(#' + content + ')', 'auxActive');
        eachRemoveClass('.ui.accordion  .content#' + parentContent + ' .title.item:not(#' + content + ')', 'active');
        eachRemoveClass('.ui.accordion .content#' + parentContent + ' .content:not(#' + content + ')', 'active');
        eachRemoveClass('.ui.accordion .item.aLoadContainer', 'activeA');
        eachRemoveClass('.ui.accordion .item.notContent', 'active');
        eachRemoveClass('#iconesSidebarMenor i', 'active');
        $("#iconesSidebarMenor i#" + parentContent).addClass('active');
        $(".ui.accordion .item.aLoadContainer#" + valorId).addClass('activeA');
        $(".ui.accordion .title#" + content).addClass('auxActive');
        var rota = content + "/" + valorId;
        ajaxToLoadContainer(rota);
    });
    $("#iconesSidebarMenor i").click(function () {
        var valorId = $(this).attr("id");
        eachRemoveClass('.ui.accordion .content:not(#' + valorId + ') .content', 'active');
        eachRemoveClass('.ui.accordion .content:not(#' + valorId + ') .content', 'auxActive');
        eachRemoveClass('.ui.accordion .content:not(#' + valorId + ') .title.item', 'active');
        eachRemoveClass('.ui.accordion .content:not(#' + valorId + ') .title.item', 'auxActive');
        eachRemoveClass('.ui.accordion .item.aLoadContainer', 'activeA');
        eachRemoveClass('.ui.accordion .item.notContent', 'active');
        eachRemoveClass('#iconesSidebarMenor i', 'active');
        var lengthMenu = $("#iconesSidebarMenor .menu." + valorId).length;
        $(".ui.accordion .item.notContent#" + valorId).addClass('active');
        if (lengthMenu != 0) {

        } else {
            $(this).addClass('active');
        }
        ajaxToLoadContainer(valorId);
    });
    $(".ui.dropdown").dropdown({
        on: "hover"
    });
    $('.ui.accordion').accordion({
        selector: {

        }
    });
    openPopup('#system', '#popUpSystem');
    openPopup('#notifications', '#popUpNotifications');
    openPopup('#informationsUser', '#popUpInformationUser');
    $("#" + idSibebar + " .ui.accordion .item.notContent#paginaInicial").trigger('click');

    $('body').on('click', function (e) {
        if(idSibebar !== "sidebarPC"){
            if (!($('#' + idSibebar).find(e.target).length == 1 || $(e.target).is('#' + idSibebar))) {
                if (!($(e.target).is('.openbtn') || $(e.target).parent().is('.openbtn') || $(e.target).is('.openbtntablet') || $(e.target).parent().is('.openbtntablet') || $(e.target).is('.openbtnmobile') || $(e.target).parent().is('.openbtnmobile'))) {
                    if (!$('#' + idSibebar).hasClass('very')) {
                        sidebarDevices();
                        $(".openbtn").toggleClass("marginlefting");
                        $(".openbtnmobile").toggleClass("marginleftingMobile");
                        $(".openbtntablet").toggleClass("marginleftingTablet");
                    }
                }
            }
        }

    });
});
function sidebarDevices() {
    // Sidebar Mobile
    elementoSidebarDevices(".ui.sidebar#sidebarMobile", "very thin icon");
    elementoSidebarDevices("#sidebarMobile.sidebar z", "displayblock");
    elementoSidebarDevices("#sidebarMobile .ui.accordion", "displayblock");
    elementoSidebarDevices("#sidebarMobile .ui.dropdown.item", "displaynone");
    $("#sidebarMobile .logo").find('img').toggle();
    // Sidebar PC
    elementoSidebarDevices(".ui.sidebar#sidebarPC", "very thin icon");
    elementoSidebarDevices("#sidebarPC.sidebar z", "displaynone");
    elementoSidebarDevices("#sidebarPC .ui.accordion", "displaynone");
    elementoSidebarDevices("#sidebarPC .ui.dropdown.item", "displayblock");
    elementoSidebarDevices("#containerToInformations", "container");
    elementoSidebarDevices("#containerToInformations", "margin-content-adjustment");
    $("#sidebarPC .logo").find('img').toggle();
    // Sidebar Tablet
    elementoSidebarDevices(".ui.sidebar#sidebarTablet", "very thin icon");
    elementoSidebarDevices("#sidebarTablet.sidebar z", "displaynone");
    elementoSidebarDevices("#sidebarTablet .ui.accordion", "displaynone");
    elementoSidebarDevices("#sidebarTablet .ui.dropdown.item", "displayblock");
    $("#sidebarTablet .logo").find('img').toggle();
}
function elementoSidebarDevices(elemento, classe) {
    $(elemento).toggleClass(classe);
}

function ajaxToLoadContainer(rota) {
    $.ajax({
        url: '/' + rota,
        type: 'POST',
        beforeSend: function (xhr) {

        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {

        }, success: function (data, textStatus, jqXHR) {
            $("#containerToInformations").html("");
            $("#containerToInformations").html(data);
        }, complete: function (jqXHR, textStatus) {
            console.log(document.body.scrollHeight);
            
        }
    });
}

function openPopup(atributo, popup) {
    $(atributo).popup({
        inline: true,
        hoverable: true,
        position: 'bottom center',
        delay: {
            show: 100,
            hide: 200
        },
        popup: popup
    });
}

function eachRemoveClass(elemento, valorClass) {
    $(elemento).each(function () {
        $(this).removeClass(valorClass);
    });
}

function eachAddClass(elemento, valorClass) {
    $(elemento).each(function () {
        $(this).addClass(valorClass);
    });
}