class SlickFlash

  constructor: ->
    $('.slick-flash').remove()

  warning: (msg) ->
    console.log 'warn'
    genrate_html('warning', msg)

  information: (msg) ->
    console.log 'info'
    genrate_html('information', msg)

  success: (msg) ->
    genrate_html('success', msg)

  error: (msg) ->
    genrate_html('error', msg)

  genrate_html = (type, msg) ->
    container = $ '<div>'
    content = $ '<div>'
    msg_type = $ '<span>'
    msg_body = $ '<span>'
    line = $ '<div>'

    msg_type.text(type)
    msg_body.text(msg)

    container.addClass "slick-flash"
    container.addClass type
    content.addClass "message-content"
    msg_type.addClass 'message-type'
    msg_body.addClass 'message-body'
    line.addClass 'line'

    content.appendTo(container)
    msg_type.appendTo(content)
    msg_body.appendTo(content)
    line.appendTo(container)

    $( "body" ).append(container);

(($) ->
  $.extend slickFlash: (msg_type, msg) ->
    sf = new SlickFlash
    switch msg_type
      when 'warning' then sf.warning(msg)
      when 'information' then sf.information(msg)
      when 'success' then sf.success(msg)
      when 'error' then sf.error(msg)
) jQuery
