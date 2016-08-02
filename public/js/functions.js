$(function() {

  // Klicka på "Boka speltid" öppnar modalen
  $('.cta-button').click(function(){
    $('.reservation-modal').slideToggle();
    return false;
  });

  // Stänger ner modalen
  $('.close-btn').click(function(){
    $('.reservation-modal').slideToggle();
  });

});
