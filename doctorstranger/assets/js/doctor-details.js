$(document).ready(function() {                    
    var id = 2;
    
    function deletePanel(){
        $('.deleteSlot').click(function(){
            var day = $(this).data('day');
            var slot_no = $(this).data('no');
            $("#"+day+"_slot_"+slot_no).remove();
            getSlotLength(day);
        });
    }
    deletePanel();
    
    function getSlotLength(day){
        var len = $('#slot-container-'+day).children('.row').length;
//        alert(len);
        $('#slot_length_'+day).val(len);
    }
    
    
    $('.add_Slot').click(function(){
        var day = $(this).data('day');
        var appendString = '<div class="row" id="'+day+'_slot_'+id+'"><div class="col-md-3"><div class="form-group"><label for="">Slot Opening Time</label><select name="'+day+'_opening_slot_'+id+'" id='+day+'_opening_slot_'+id+'" class="chosen-select js-opening-single" data-placeholder="Choose opening hour..."></select></div></div><div class="col-md-3"><div class="form-group"><label for="">Slot Closing Time</label><select name="'+day+'_closing_slot_'+id+'" id="'+day+'_closing_slot_'+id+'" class="chosen-select js-closing-single" data-placeholder="Choose opening hour..."></select></div></div><div class="col-md-4"><div class="form-group"><label for="">Slot Capacity</label><input type="text" name="'+day+'_capacity_slot_'+id+'" id="'+day+'_capacity_slot_'+id+'" class="form-input form-input--pill form-input--border-c-gallery" placeholder="10"></div></div><div class="col-md-2"><div class="form-group"><label for=""> &nbsp;</label><button type="button" class="button btn-danger button--pill button--small button--block button--submit deleteSlot" data-day="'+day+'" data-no="'+id+'"><i class="fa fa-trash"></i></button></div></div></div>';        

        $("#slot-container-"+day).append(appendString);
        selectOptions();
        deletePanel();
        getSlotLength(day);
        id++;
    });

    /**************Wizard Opening-Closing chosen**********************/
    function selectOptions(){
        var x = 60; //minutes interval
        var times = []; // time array
        var tt = 0; // start time
        var ap = ['AM', 'PM']; // AM-PM
        var options = "";

        options += "<option value='NA'>NA</option>";

        for (var i=0;tt<24*60; i++) {
            var hh = Math.floor(tt/60); // getting hours of day in 0-24 format
            var mm = (tt%60); // getting minutes of the hour in 0-55 format
            var option_val = ("" + ((hh==0 || hh==12)?12:hh%12)).slice(-2) + ':' + ("0" + mm).slice(-2) +' '+ ap[Math.floor(hh/12)];
            options += "<option value="+option_val+">" + option_val +"</option>";
            tt = tt + x;
        }

        $('.js-opening-single').append(options);
        $('.js-closing-single').append(options);    
        $('.chosen-select').chosen({
          disable_search_threshold: 10,
          width: '100%'
        }); 
    }
    selectOptions();

    $('#education_detail').on("click", function(event) {
        event.preventDefault();
        //console.log( $('#insert_education_detail').serialize());

        $.ajax({
            type: 'POST',
            url: 'includes/process-ajax-request.php',
            data: $('#insert_education_detail').serialize(),
        }).done(function(response) {
            console.log(response);
            $('#insert_education_detail')[0].reset();
            $('#educationmodal').modal('hide');
        });
    });

    $('#experience_detail').on("click", function(event) {
        event.preventDefault();
//        console.log($('#insert_experience_detail').serialize());

        $.ajax({
            type: 'POST',
            url: 'includes/process-ajax-request.php',
            data: $('#insert_experience_detail').serialize(),
        }).done(function(response) {
            console.log(response);
            $('#insert_experience_detail')[0].reset();
            $('#experiencemodal').modal('hide');
        });
    });

});


/*********************************Getting the form**************************/
$("#details-form").submit(function(e){
//    console.log($('#details-form').serialize());
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: 'includes/process-ajax-request.php',
        data: $('#details-form').serialize(),
    }).done(function(response) {
        if(response){
            window.location.href = "dashboard.php";
        }
    });
});


$('#educationmodal').on('hidden.bs.modal', function() {
    $('#insert_education_detail')[0].reset();
});

$('#experiencemodal').on('hidden.bs.modal', function() {
    $('#insert_experience_detail')[0].reset();
});

/*****************Chosen select Ajax***********************/
var optionsSpecial = new Array();
$.ajax({
    type: 'POST',
    url: 'includes/process-ajax-request.php',
    data: 'manage=specialization',
}).done(function(response) {
    $('.js-specialization').append(response);
});