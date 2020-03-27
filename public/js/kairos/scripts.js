var table;
var result;
function searchInKairos()
{
    var product = $('input[name="product"]').val();
    if(product.length < 1) {
        bootbox.alert('<h3>Por favor ingrese el nombre del medicamento a buscar</h3>');
        return false;
    } else {
        var data = {
            _token: $('input[name="_token"]').val(),
            product: product
        };

        $.ajax({
            url: "/kairos/search",
            type: 'post',
            data: data,
            success: function(result) {
                $('#queryResponse').html(result);
            }
        });
    }
}