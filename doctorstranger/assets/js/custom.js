/*****************Wizard Navigation***********************/
function changetabNext(currentab){
    var nexttab = currentab+1;
    $("#tab"+currentab).removeClass("is-selected");
    $("#tab"+nexttab).addClass("is-selected");
}
function changetabPrevious(currentab){
    var prevtab = currentab-1;
    $("#tab"+currentab).removeClass("is-selected");
    $("#tab"+prevtab).addClass("is-selected");
}

/************Login-Register page*************/
var formSignin = document.querySelector('.js-login-form');
var formBlocks = Array.from(document.querySelectorAll('.js-form-block'));

if (formSignin) {
    formSignin.addEventListener('click', function (e) {
        if (e.target.classList.contains('js-block-trigger')) {
            e.preventDefault();
            var href = e.target.getAttribute('href');
            var currentBlock = formSignin.querySelector(href);

            formBlocks.forEach(function (block) {
                block.classList.remove('is-selected');
            });
            currentBlock.classList.add('is-selected');
        }
    });
}

/**************************Gallery**********************/
var listingGallery = document.querySelector('.js-listing-gallery');

if (listingGallery) {
    var listingFigures = Array.from(listingGallery.querySelectorAll('.swiper-slide'));
    var galleryLinks = Array.from(listingGallery.querySelectorAll('a'));
    var container = [];
    galleryLinks.forEach(function (link) {
        var item = {
            src: link.getAttribute('href'),
            w: link.getAttribute('data-width'),
            h: link.getAttribute('data-height')
        };
        container.push(item);
    });

    listingGallery.addEventListener('click', function (e) {
        e.preventDefault();
        var pswpElement = document.querySelector('.pswp');
        var current = e.target.closest('figure');
        var targetIndex = void 0;
        if (!current) return;
        for (var index = 0; index < listingFigures.length; index += 1) {
            if (current === listingFigures[index]) {
                targetIndex = index;
            }
        }
        var options = {
            index: targetIndex,
            bgOpacity: 0.85,
            showHideOpacity: true
        };
        var gallery = new _photoswipe2.default(pswpElement, _photoswipeUiDefault2.default, container, options);
        gallery.init();
    });
}

var filters = Array.from(document.querySelectorAll('.listing-filter'));
var expandToggle = document.querySelector('.js-expand');
var filterCheckbox = document.querySelector('.listing-more-filter');

filters.forEach(function (filter) {
    filter.addEventListener('click', function (e) {
        e.preventDefault();
        var currentFilter = e.target.closest('li');
        if (!currentFilter) return;
        var filterLi = Array.from(filter.querySelectorAll('li'));
        filterLi.forEach(function (item) {
            item.classList.remove('is-active');
        });
        currentFilter.classList.add('is-active');
    });
});

if (expandToggle) {
    expandToggle.addEventListener('click', function (e) {
        e.preventDefault();
        expandToggle.classList.toggle('is-active');
        var height = filterCheckbox.firstElementChild.getBoundingClientRect().height;
        if (expandToggle.classList.contains('is-active')) {
            filterCheckbox.style.height = height + 'px';
        } else {
            filterCheckbox.style.height = '0';
        }
    });
}

/******************Navbar*******************/
var clientWidth = document.body.clientWidth;
var navToggle = $('.js-nav-toggle');
var navigation = $('.main-navigation');

function adjustMenu() {
    if (clientWidth < 992) {
        $('.main-navigation li').unbind('mouseenter mouseleave');
        $('a.parent').unbind('click').bind('click', function () {
            $(this).parent('li').toggleClass('is-active');
            $(this).toggleClass('is-active');
            return false;
        });
    } else if (clientWidth >= 992) {
        $('.main-navigation li').removeClass('is-active');
        $('.main-navigation li a').unbind('click');
        $('a.parent').removeClass('is-active').on('click', function (e) {
            return e.preventDefault();
        });
        $('.main-navigation li').unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function () {
            $(this).toggleClass('is-active');
        });
    }
}

$(document).ready(function () {
    $('.main-navigation a:not(:only-child)').each(function () {
        $(this).addClass('parent');
    });
    navToggle.on('click', function (e) {
        e.preventDefault();
        navToggle.toggleClass('is-active');
        navigation.slideToggle(300);
    });
    adjustMenu();
});

$(window).on('resize orientationchange', function () {
    clientWidth = document.body.clientWidth;
    adjustMenu();
});


/**********************DropZone**********************/
$("div#listing-gallery").dropzone({
    url: "/create-listing"
});


/**********************Approve-Reject-Cancel-All************************/
$("#approve").click(function(){
    var app_id = $(this).data("id");
    $.ajax({
        type: 'POST',
        url: 'includes/process-ajax-request.php',
        data: "manage=approve&id="+app_id,
    }).done(function(response){
        location.reload();
    });
});
$("#reject").click(function(){
    var app_id = $(this).data("id");
    $.ajax({
        type: 'POST',
        url: 'includes/process-ajax-request.php',
        data: "manage=reject&id="+app_id,
    }).done(function(response){
        location.reload();
    });
});
$("#cancelAll").click(function(){
    var date = $(this).data("date");
    var doctor_id = $(this).data("did");;
    $.ajax({
        type: 'POST',
        url: 'includes/process-ajax-request.php',
        data: "manage=cancelAll&date="+date+"&doctor_id="+doctor_id,
    }).done(function(response){
        location.reload();
    });
});

/************************Datepicker*************************/
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1;
var yyyy = today.getFullYear();

if(dd<10) {
    dd = '0'+dd
} 

if(mm<10) {
    mm = '0'+mm
} 
today = mm + '/' + dd + '/' + yyyy;

$('[data-toggle="datepicker"]').datepicker({
    autoHide: true,
    startDate: today,
    format: 'mm/dd/yyyy',
});
$("#user_dob").datepicker({
    autoHide: true,
    format: 'yyyy-mm-dd',
});

/************************Auto-Detect Button*****************/
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
    //alert("Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude);    
    var url = "http://www.mapquestapi.com/geocoding/v1/reverse?key=FOKXNDWWs9onmEMOSgdGhCHZ9Xl57vbx&location="+ position.coords.latitude +"%2C"+ position.coords.longitude +"&outFormat=json";
    $.getJSON(url).done(function(location) {
        $("#cityname").val(location['results'][0]['locations'][0]['adminArea5']);
//        console.log(location['results'][0]['locations'][0]['adminArea5']);
    });
}