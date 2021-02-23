    $(function(){
  
  $('.modalButton').click(function (){
      $.get($(this).attr('href'), function(data) {
        $('#modal').modal('show').find('#modalconteudo').html(data)
     });
     return false;
  });
});