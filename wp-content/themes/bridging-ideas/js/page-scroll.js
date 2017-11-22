(function ($) {
  $(document).ready(function () {

    //nur auf der landingpage
    if (!jQuery('body').hasClass('home')) {
      // wenn nicht auf der Home seite, verlinkt er auf die startseite und hängt den GET parameter an die URL an
      // alle menu items die mit # beginnen. Das sind keine richtigen links nodern nur verweise
      $('#navbarNav a[href^="#"]').click(function (e) {
        //          e.preventDefault(); verhindert das eigentliche Verlinken von links sondern verweist nur auf die ID der Seite
        e.preventDefault();
        //setzt get parameter
        location = "?jumpto=" + this.getAttribute("href");
      });
    } else {
      //um zur ID position der Seite zu scrollen
      //bezogen auf alle elemente mit dem attribut 'rel'
      $('#navbarNav a[href^="#"]').click(function (e) {
        // wählt das element auf der seite aus welches die id des links hat
        var target = jQuery(this.getAttribute("href"));
        if (target.length ) {
          //          e.preventDefault(); verhindert das eigentliche Verlinken von links sondern verweist nur auf die ID der Seite
          e.preventDefault();
          // rechnet den abstand von oben vom zielcontainer minus die höhe der navbar und der admin bar aus
          var targetOffset = target.offset().top - jQuery('.header-main').height() - (jQuery('#wpadminbar').height());

          //springt zum Ziel
          jQuery('html,body').animate({scrollTop: targetOffset}, 1000); // change number for scroll speed, higher = slower
          if (jQuery('.nav-menu > li').width() == jQuery('html').width()) { //disable on mobile
            jQuery('#primary-navigation').toggleClass('toggled-on');
          }
        }
      });
      //            versucht den jump to GET parameter zu bekommnen
      var jumpto = getParameterByName('jumpto');

      if (!jumpto) jumpto = location.hash;
      //            schaut in der UL menu-pat-a-mat
      if (jumpto) {
        $('#navbarNav').find('a[href="' + jumpto + '"]').trigger('click');
      }
      $('#backtotop,#navicon').click(function () {
        jQuery('html,body').animate({scrollTop: 0}, 1000);
      })
    }

  });

  //   Hilffunktionen um den GET parameter zu bekommen
  function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
      results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
  }
})(jQuery);
