var SlickFlash;

SlickFlash = (function() {
  var genrate_html;

  function SlickFlash() {
    $('.slick-flash').remove();
  }

  SlickFlash.prototype.warning = function(msg) {
    console.log('warn');
    return genrate_html('warning', msg);
  };

  SlickFlash.prototype.information = function(msg) {
    console.log('info');
    return genrate_html('information', msg);
  };

  SlickFlash.prototype.success = function(msg) {
    return genrate_html('success', msg);
  };

  SlickFlash.prototype.error = function(msg) {
    return genrate_html('error', msg);
  };

  genrate_html = function(type, msg) {
    var container, content, line, msg_body, msg_type;
    container = $('<div>');
    content = $('<div>');
    msg_type = $('<span>');
    msg_body = $('<span>');
    line = $('<div>');
    msg_type.text(type);
    msg_body.text(msg);
    container.addClass("slick-flash");
    container.addClass(type);
    content.addClass("message-content");
    msg_type.addClass('message-type');
    msg_body.addClass('message-body');
    line.addClass('line');
    content.appendTo(container);
    msg_type.appendTo(content);
    msg_body.appendTo(content);
    line.appendTo(container);
    return $("body").append(container);
  };

  return SlickFlash;

})();

(function($) {
  return $.extend({
    slickFlash: function(msg_type, msg) {
      var sf;
      sf = new SlickFlash;
      switch (msg_type) {
        case 'warning':
          return sf.warning(msg);
        case 'information':
          return sf.information(msg);
        case 'success':
          return sf.success(msg);
        case 'error':
          return sf.error(msg);
      }
    }
  });
})(jQuery);
