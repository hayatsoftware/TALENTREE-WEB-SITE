(() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, false)
    })
})()
$(document).ready(function () {
    $("body").on('keyup', '.only-text', function (e) {
        var val = $(this).val();
        if (val.match(/[^a-zA-ZçÇöÖşŞıİğĞüÜ ]/g)) {
            $(this).val(val.replace(/[^a-zA-ZçÇöÖşŞıİğĞüÜ ]/g, ''));
        }
    });
    $("body").on('keyup','.only-number',function(e){
        var val = $(this).val();
        if(val.match(/[^0-123456789 ]/g)){
            $(this).val(val.replace(/[^0-123456789 ]/g,''));
        }
    });
    var input_and_textarea = '.form-group input, .form-group select, .form-group textarea';

    $(document).delegate(input_and_textarea,'click',function(){
        $(this).parent().addClass('ok');
    });
    $(document).delegate(input_and_textarea,'focus',function(){
        $(this).parent().addClass('ok');
    });
    $(document).delegate(input_and_textarea,'focusout',function(){
        if($(this).attr('type')!='file' && $(this).attr('type')!='tel' && !$(this).hasClass('datepicker') && !$(this).find('option').length){
            if($(this).val()){
                $(this).parent().addClass('ok');
                $(this).parent().addClass('oke');
            }else{
                $(this).parent().removeClass('ok');
            }
        }
    });
});
$("body").on('keyup','.phone',function(e){
    var val = $(this).val();
    if(val.match(/[^0-123456789 ]/g)){
        $(this).val(val.replace(/[^0-123456789 ]/g,''));
    }
});

var phoneScript = [];
$.each($(".telmask"), function (key, value) {
    phoneScript.push(window.intlTelInput(value, {
        preferredCountries: ["tr"],
        separateDialCode: true,
        autoPlaceholder: "polite",
        customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
            return selectedCountryPlaceholder.replace(/[0-9]/g, "0");
        }
    }));
    var obj = $(value);
    obj.on("focus", function() {
        var activePlaceholder = obj.attr("placeholder");
        var newMask = activePlaceholder.replace(/[0-9]/g, "0");
        obj.mask(newMask);
    });

    obj.on("countrychange", function (e, countryData) {
        obj.val("");
        obj.attr("maxlength", 20);
    });
});
function movePlus(){
    let objs = $(".telmask");
    $.each(objs, function (key, value) {
        obj = $(value);
        var flag = obj.closest(".iti--allow-dropdown").find("div.iti__selected-dial-code");
        if (obj.val().indexOf("+") == -1 && obj.val() !== "") {
            obj.val(flag.text() + " " + obj.val());
        }
    });
}

$(".telmask").on("input",(function(n){""==$(this).val()?$(".phone_group").find(".invalid-feedback").show():$(".phone_group").find(".invalid-feedback").hide()})),$(".needs-validation").on("submit",(function(){""==$(".telmask").val()?$(".phone_group").find(".invalid-feedback").show():$(".phone_group").find(".invalid-feedback").hide()}))
$('form').on('submit',function(){
    movePlus();
});

function checkEmail(){
    var pass = $('#eMail').val();
    $('#eMail_confirmation').attr('pattern','^(?=.[^ @]*@[^ @]*$).*'+pass+'$$');

}
$('.chosenSelect').chosen({
    allow_single_deselect: true
});

$('#birthday').each(function(){
    $('#birthday').mask('00/00/0000');
});


