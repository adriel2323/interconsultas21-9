function addErrors(data, div = "#resultado") {
    console.log(div);

    var errors = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p><strong>Parece que hay un error:</strong></p>';
    errors += '<ul>';
    for (var datos in data) {
        errors += '<li>' + data[datos] + '</li>';
    }
    errors += '</ul></div>';
    $(div).html(errors);
}