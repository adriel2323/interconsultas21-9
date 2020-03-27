function setExpirationDate(days)
{
    var emissionDate = moment($('input[name="emission_date"]').val());
    var expirationDate = emissionDate.add(days, 'days');

    $('input[name="expiration_date"]').val(expirationDate.format('YYYY-MM-DD'));
}

function getVendorPayName()
{
    var vendorId = $('select[name="accounting_vendor_id"]').val();

    $.ajax({
        url: "/helpers/accountingChecks/getVendorPayName/" + vendorId,
        type: 'get',
        success: function (result) {
            $('input[name="pay_name"]').val(result);
        }
    });
}

function getLastCheckNumber()
{
    var bankAccountId = $('select[name="accounting_bank_account"]').val();

    $.ajax({
        url: "/helpers/accountingChecks/getLastCheckNumber/" + bankAccountId,
        type: 'get',
        success: function (result) {
            $('input[name="check_number"]').val(result);
        }
    });
}

function selectPrintingRanges()
{
    $.ajax({
        url: "/helpers/accountingChecks/printingRanges",
        type: 'get',
        success: function (result) {
            var dialog = bootbox.dialog({
               className: 'rubberBand animated',
                animated: true,
                message: result,
                size: 'small',
                onEscape: true,
                buttons: {
                    Ok: {
                        label: 'Aceptar',
                        className: 'btn-primary',
                        callback: function () {
                            var fromCheckNumber = $('input[name="fromCheckNumber"]').val();
                            var toCheckNumber = $('input[name="toCheckNumber"]').val();
                            var bankAccountId = $('select[name="bankAccountId"]').val();
                            window.open("/accounting/checkPrintingConfirmation/" + bankAccountId + "/" + fromCheckNumber + "/" + toCheckNumber, '_blank');
                            /*location.href = "/accounting/checkPrintingConfirmation/" + bankAccountId + "/" + fromCheckNumber + "/" + toCheckNumber;*/
                        }
                    },
                    Cancel: {
                        label: 'Cancelar',
                        className: 'btn-warning',
                        callback: function () {
                            dialog.modal("hide");
                        }
                    }
                }

            }).init(function() {
                $('.chosen-select').chosen({
                    width: '100%'
                });
            });
        }
    });
}