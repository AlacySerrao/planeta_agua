
$(function(){
    // changed id to class
    $('.modalButton').click(function (){
        $.get($(this).attr('href'), function(data) {
          $('#modal').modal('show').find('#modalContent').html(data)
       });
       return false;
    });
});
               
$(function(){
    // changed id to class
    $('.modalButton2').click(function (){
        $.get($(this).attr('href'), function(data) {
          $('#modal2').modal('show').find('#modalContent2').html(data)
       });
       return false;
    });
});
     