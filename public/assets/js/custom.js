/* ------------------------------------------------------------------------------
 *
 *  # Custom JS code
 *
 *  Place here all your custom js. Make sure it's loaded after app.js
 *
 * ---------------------------------------------------------------------------- */

function praloader(){
    document.getElementById('praloader').style.display="";
}
//loading selesai
function praloaderend(){
    $(".praloader").fadeOut();
}

// Convert Nilai ex: 1000000.00
function convertAutoNumber(val) {
    if(!val || val==null || val=='') return;
    let a = val.replace(",", "");
    let aa = a.replace(",", "");
    let aaa = aa.replace(",", "");
    let aaaa = aaa.replace(",", "");
    let aaaaa = aaaa.replace(",", "");
    let aaaaaa = aaaaa.replace(",", ".");

    return aaaaaa;
}

function convertAutoNumberDot(val){
    if(!val || val==null || val=='') return;
    let a = val.replace('.','');
    let aa = a.replace('.','');
    let aaa = aa.replace('.','');
    let aaaa = aaa.replace('.','');
    let aaaaa = aaaa.replace('.','');
    let aaaaaa = aaaaa.replace(',','.');

    return aaaaaa;
}

function convertAutoNumberDot2(val){
    if(!val || val==null || val=='') return;
    let a = val.replace('.',',');

    return a;
}

  function comma(Num) { //function to add commas to textboxes
    Num += '';
    x = Num.split(',');
    x1 = x[0];
    x2 = x.length > 1 ? ',' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1))
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    return x1+x2;
  }


  function change_theme() {
    if ($('.sidebar').hasClass('sidebar-light')) {
        $("#theme_icon").removeClass("icon-droplet2");
        $("#theme_icon").addClass('icon-droplet');
        localStorage.setItem('theme_icon', 'icon-droplet');
        localStorage.setItem('theme', 'sidebar-light');
        window.open(location, "_self");
    } else if($('.sidebar').hasClass('sidebar-dark')){
        $("#theme_icon").removeClass("icon-droplet");
        $("#theme_icon").addClass('icon-droplet2');
        localStorage.setItem('theme_icon', 'icon-droplet2');
        localStorage.setItem('theme', 'sidebar-dark');
        window.open(location, "_self");
    }
}



  
$(document).ready(function () {
    $(".praloader").fadeOut();
     // Active Menu
    var path = location.pathname.split('/');

    if(path[1] != ''){
        // set active menu
        $('ul.nav.nav-sidebar li a').each(function() {
            var href = $(this).attr('href').split('/');
            if(href[3] == path[1]) {
                $(this).addClass('active'); // Level 1
                $(this).addClass('active').parent().parent().parent('li').addClass('nav-item-expanded nav-item-open'); // Level 2
                $(this).addClass('active').parent().parent().parent().parent().parent('li').addClass('nav-item-expanded nav-item-open'); // Level 3
                $(this).addClass('active').parent().parent().parent().parent().parent().parent().parent('li').addClass('nav-item-expanded nav-item-open'); // Level 4
            }
        });	
    }
    // Alertify
    alertify.defaults.theme.ok = "btn btn-sm btn-primary";
    alertify.defaults.theme.input = "form-control";
    alertify.defaults.theme.cancel = "btn btn-sm btn-danger";
    alertify.set("notifier", "position", "top-center");
    alertify.set("notifier", "delay", 3);

    // UNIFORM FORM Input file
    $(".form-control-uniform").uniform();

    // Nilai ex: 1,000,000.00
    $(".AutoNumeric").autoNumeric("init");

    $('.AutoNumericDot').autoNumeric('init', {
        aSep: '.',
        aDec: ',',
        vMin: "-999999999999999999.99",
        vMax: "999999999999999999.99",
    });

    // tooltip
    $('[data-toggle="tooltip"]').tooltip();

    window.setTimeout(function () {
        $("#notif-alert")
            .fadeTo(500, 0)
            .slideUp(500, function () {
                $(this).remove();
            });
    }, 2000);

    function generateKode(length) {
        var result = "";
        var characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        var charactersLength = characters.length;
        for (var i = 0; i < length; i++) {
            result += characters.charAt(
                Math.floor(Math.random() * charactersLength)
            );
        }
        return result;
    }

    //set Theme
    if (localStorage.getItem("theme") == "sidebar-light") {
        $(".sidebar").removeClass("sidebar-light");
        $(".sidebar").addClass('sidebar-dark bg-green-900');
        $("#theme_icon").removeClass("icon-droplet2");
        $("#theme_icon").addClass('icon-droplet');
        
        $(".nav-theme").removeClass("navbar-dark");
        $(".nav-theme").addClass('sidebar-dark bg-green-900');
        $(".sidebar-theme").addClass('sidebar-dark bg-green-900');
        $("body").css('background-color','#292929');
        $(".card").addClass('sidebar-dark bg-green-900');
        $(".table").css('background-color','#fefefe');

        $(".modal-content").css('background-color','#293a50');
        
    }else if(localStorage.getItem("theme") == "sidebar-dark"){
        $(".sidebar").removeClass("sidebar-dark bg-green-900");
        $(".sidebar").addClass('sidebar-light');
        $("#theme_icon").removeClass("icon-droplet");
        $("#theme_icon").addClass('icon-droplet2');

        $(".nav-theme").removeClass("sidebar-dark bg-green-900");
        $(".nav-theme").addClass('navbar-dark');
    }

    // CONVERT NUMBER TO ROMAWI
    function romanize(num) {
        var lookup = {
                M: 1000,
                CM: 900,
                D: 500,
                CD: 400,
                C: 100,
                XC: 90,
                L: 50,
                XL: 40,
                X: 10,
                IX: 9,
                V: 5,
                IV: 4,
                I: 1,
            },
            roman = "",
            i;
        for (i in lookup) {
            while (num >= lookup[i]) {
                roman += i;
                num -= lookup[i];
            }
        }
        return roman;
    }

    // UPPER CASE or LOWER CASE to Capitalized
    function capitalize(val) {
        return val[0].toUpperCase() + val.slice(1).toLowerCase();
    }

    // Format Tanggal Senin, 18 Oktober 1997
    function day(val) {
        let options = {
            weekday: "long",
            year: "numeric",
            month: "long",
            day: "numeric",
        };
        let thisDay = new Date(val);

        return thisDay.toLocaleDateString("id", options);
    }

    // Format Tanggal 18 Oktober 1997
    function dates(val) {
        let options = { year: "numeric", month: "long", day: "numeric" };
        let thisDay = new Date(val);

        return thisDay.toLocaleDateString("id", options);
    }
});

var Library = (function () {
    // Summernote
    var _componentSummernote = function () {
        if (!$().summernote) {
            console.warn("Warning - summernote.min.js is not loaded.");
            return;
        }
        // Default initialization
        $(".summernote").summernote();
        //
        // // Control editor height
        // $('.summernote-height').summernote({
        //     height: 400
        // });
        //
        // // Air mode
        // $('.summernote-airmode').summernote({
        //     airMode: true
        // });
        var eleman = document.getElementById("pdf");
        // Edit
        $("#edit").on("click", function () {
            $(".click2edit").summernote({ focus: true });
            eleman.setAttribute("disabled", true);
        });

        // Save
        $("#save").on("click", function () {
            var aHTML = $(".click2edit").summernote("code");
            $(".click2edit").summernote("destroy");
            eleman.removeAttribute("disabled", false);
        });
    };

    // Lightbox
    var _componentFancybox = function () {
        if (!$().fancybox) {
            console.warn("Warning - fancybox.min.js is not loaded.");
            return;
        }

        // Image lightbox
        $('[data-popup="lightbox"]').fancybox({
            padding: 3,
        });
    };

    // Uniform
    var _componentUniform = function () {
        if (!$().uniform) {
            console.warn("Warning - uniform.min.js is not loaded.");
            return;
        }

        // Default initialization
        $(".form-check-input-styled").uniform();

        //
        // Contextual colors
        //

        // Initialize
        $(".form-input-styled").uniform({
            fileButtonClass: "action btn bg-blue",
        });

        // Primary
        $(".form-check-input-styled-primary").uniform({
            wrapperClass: "border-primary-600 text-primary-800",
        });

        // Danger
        $(".form-check-input-styled-danger").uniform({
            wrapperClass: "border-danger-600 text-danger-800",
        });

        // Success
        $(".form-check-input-styled-success").uniform({
            wrapperClass: "border-success-600 text-success-800",
        });

        // Warning
        $(".form-check-input-styled-warning").uniform({
            wrapperClass: "border-warning-600 text-warning-800",
        });

        // Info
        $(".form-check-input-styled-info").uniform({
            wrapperClass: "border-info-600 text-info-800",
        });

        // Custom color
        $(".form-check-input-styled-custom").uniform({
            wrapperClass: "border-indigo-600 text-indigo-800",
        });
    };

    // Switchery
    var _componentSwitchery = function () {
        if (typeof Switchery == "undefined") {
            console.warn("Warning - switchery.min.js is not loaded.");
            return;
        }

        // Initialize multiple switches
        var elems = Array.prototype.slice.call(
            document.querySelectorAll(".form-check-input-switchery")
        );
        elems.forEach(function (html) {
            var switchery = new Switchery(html);
        });

        // Colored switches
        var primary = document.querySelector(
            ".form-check-input-switchery-primary"
        );
        var switchery = new Switchery(primary, { color: "#2196F3" });

        var danger = document.querySelector(
            ".form-check-input-switchery-danger"
        );
        var switchery = new Switchery(danger, { color: "#EF5350" });

        var warning = document.querySelector(
            ".form-check-input-switchery-warning"
        );
        var switchery = new Switchery(warning, { color: "#FF7043" });

        var info = document.querySelector(".form-check-input-switchery-info");
        var switchery = new Switchery(info, { color: "#00BCD4" });
    };

    // Sticky.js
    var _componentSticky = function () {
        if (!$().stick_in_parent) {
            console.warn("Warning - sticky.min.js is not loaded.");
            return;
        }

        // Initialize
        $(".navbar-sticky").stick_in_parent();
    };

    return {
        init: function () {
            _componentFancybox();
            _componentUniform();
            _componentSwitchery();
            _componentSticky();
        },
    };
})();

document.addEventListener("DOMContentLoaded", function () {
    Library.init();
});

function caridata(id, table){
    var input;
    var saring;
    var status; 
    var tbody; 
    var tr; 
    var td;
    var i; 
    var j;
    input = document.getElementById(id);
    saring = input.value.toUpperCase();
    tbody = document.getElementById(table);
    tr = tbody.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(saring) > -1) {
                status = true;
            }
        }
        if (status) {
            tr[i].style.display = "";
            status = false;
        } else {
            tr[i].style.display = "none";
        }
      }
    }
