$(function() {

  var activeTooltip = '';

  // Klicka på "Boka speltid" öppnar modalen
  $('.cta-button, .close-btn').click(function(e){
      e.preventDefault();
    $('.reservation-modal').slideToggle({
      specialEasing: 'ease-in',
      duration: 300,
    });
  });

  // Öppnar tooltip
  $('.tiptool').click(function(){
    $('.test-tip').each(function () {
      if( activeTooltip != '' && !activeTooltip.is($(this)) ){
        $(this).animateCss('bounceOut');
      }
    })
    activeTooltip = $('[data-tooltip-id="' + $(this).data('id') + '"]');
    activeTooltip.animateCss('bounceIn');
  });
  // Stänger tooltip
  $('.close-tip').on('click', function(){
    activeTooltip.animateCss('bounceOut');
    activeTooltip = '';
  });

  $(document).on("mouseup.clickOFF touchend.clickOFF", function (e) {
      if (activeTooltip !== '' && !activeTooltip.is(e.target) // if the target of the click isn't the activeTooltip...
          && activeTooltip.has(e.target).length === 0) // ... nor a descendant of the activeTooltip
      {
          activeTooltip.animateCss('bounceOut');
          activeTooltip = '';
      }
  });

});

$.fn.extend({
    animateCss: function (animationName) {
      var wasVisible = true;
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        if(!$(this).is(':visible') ){
          wasVisible = false;
          $(this).show();
        }

        $(this).addClass('animated ' + animationName).one(animationEnd, function() {
          $(this).removeClass('animated ' + animationName);
          if(wasVisible){
            $(this).hide();
          }
        });
    }
});
