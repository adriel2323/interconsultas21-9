function searchPendingsInterconsults()
{
    var doctorID = $('select[name="doctor"]').val();
    $.ajax({
        url: "/interconsulting/pending/" + doctorID,
        type: 'get',
        success: function(result) {
            bootbox.alert({
                message: result,
                class: "bounceIn",
                callback: function (result) {
                    location.reload();
                }
            });
        }
    });
}