$(function() {

  // Klicka på "Boka speltid" öppnar modalen
  $('.button').click(function(){
    $('.modal').addClass('modal-show');
    $('.modal').css('pointer-events', 'auto');
    return false;
  });

  // Stänger ner modalen
  $('.close-btn').click(function(){
    $('.modal').removeClass('modal-show');
    $('.modal').css('pointer-events', 'none');
  });

});
