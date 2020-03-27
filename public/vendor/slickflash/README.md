# slick-flash
A Jquery plugin that provides a simple way to display subtle animated css flash messages.

![Demo animation](demo/images/demo-animation.gif?raw=true "Demo animation")

## Installation
Include the css `slick-flash.css`
```html
<link rel="stylesheet" href="../stylesheets/css/slick-flash.css">
```
Include the javascript `slick-flash.js` after you have loaded Jquery
```html
<script type="text/javascript" src="../javascripts/slick-flash.js"></script>
```

## Usage
Simply call one of the 4 javascript functions with the Message type and message content.

![Information](demo/images/information.png?raw=true "Information")
```javascript
$.slickFlash('information', 'You have 3 new messages in your inbox');
```

![Success](demo/images/success.png?raw=true "Success")
```javascript
$.slickFlash('success', 'Your application wass successfully submitted');
```

![Error](demo/images/error.png?raw=true "Error")
```javascript
$.slickFlash('error', 'An error occurred while sending mail. The mail server responded: Authentication is required');
```

![Warning](demo/images/warning.png?raw=true "Warning")
```javascript
$.slickFlash('warning', 'Your subscription is due to expire in 9 days');
```

## ToDo
 - Configurable defaults
 - Refactor Coffeescript
 - Optional display time
 - Optional message name
 - Customisable colours including opacity
 - Better responsive support
