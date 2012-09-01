(function(){
  jQuery.noConflict();

  jQuery.fn.popbox = function(options){
    var settings = jQuery.extend({
      selector      : this.selector,
      open          : '.open',
      box           : '.box',
      arrow         : '.arrow',
      arrow_border  : '.arrow-border',
      close         : '.close'
    }, options);

    var methods = {
      open: function(event){
        event.preventDefault();

        var pop = jQuery(this);
        var box = jQuery(this).parent().find(settings['box']);

        box.find(settings['arrow']).css({'left': box.width()/2 - 10});
        box.find(settings['arrow_border']).css({'left': box.width()/2 - 10});

        if(box.css('display') == 'block'){
          methods.close();
        } else {
          box.css({'display': 'block', 'top': 10, 'left': ((pop.parent().width()/2) -box.width()/2 )});
        }
      },

      close: function(){
        jQuery(settings['box']).fadeOut("fast");
      }
    };

    jQuery(document).bind('keyup', function(event){
      if(event.keyCode == 27){
        methods.close();
      }
    });

    jQuery(document).bind('click', function(event){
      if(!jQuery(event.target).closest(settings['selector']).length){
        methods.close();
      }
    });

    return this.each(function(){
      jQuery(this).css({'width': jQuery(settings['box']).width()}); // Width needs to be set otherwise popbox will not move when window resized.
      jQuery(settings['open'], this).bind('click', methods.open);
      jQuery(settings['open'], this).parent().find(settings['close']).bind('click', function(event){
        event.preventDefault();
        methods.close();
      });
    });
  }

}).call(this);
