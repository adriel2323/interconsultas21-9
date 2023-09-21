var extendedDescription;
var shortDescription;

$(document).ready(function() {
    shortDescription = textboxio.replace("#short_description");
    extendedDescription = textboxio.replace("#extended_description");
});

function createSomeNews()
{
    var showUntil = $('input[name="show_until"]').val();
    var imageUrl = $('input[name="image_url"]').val();
    var title = $('input[name="title"]').val();


    var data = {
        _token: $('input[name="_token"]').val(),
        showUntil: showUntil,
        imageUrl: imageUrl,
        title: title,
        shortDescription: shortDescription.content.get(),
        extendedDescription: extendedDescription.content.get(),
    };

    $.ajax({
       url: '/webNews',
       type: "post",
       data: data,
        success: function(result) {
           location.href = "/webNews/create";
        },
        error: function (data) {
            var exeption = data.responseJSON;
            addErrors(exeption.errors);
        }
    });
}