$(document).ready(function () {
    $('#ing').click(function(){
        $.get('/i_want_inquire/ing',function(data){
            result.innerHTML=data;
        })
    })
});
$(document).ready(function () {
    $('#evaluate').click(function(){
        $.get('/i_want_inquire/evaluate',function(data){
            result.innerHTML=data;
        })
    })
});
$(document).ready(function () {
    $('#done').click(function(){
        $.get('/i_want_inquire/done',function(data){
            result.innerHTML=data;
        })
    })
});
$(document).ready(function () {
    $('#e_ing').click(function(){
        $.get('/e_check/ing',function(data){
            result.innerHTML=data;
        })
    })
});
$(document).ready(function () {
    $('#e_done').click(function(){
        $.get('/e_check/done',function(data){
            result.innerHTML=data;
        })
    })
});
$(document).ready(function () {
    $('#number').blur(function(){
        $.post('/equipment_location',
            {number:$('#number').val()}
            ,function(data){
            $("#location").val(data);
        })
    })
});
$(document).ready(function () {
    $('#number').blur(function(){
        $.post('/equipment_user',
            {number:$('#number').val()}
            ,function(data){
                $("#user").val(data);
            })
    })
});
