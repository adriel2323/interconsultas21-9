<div style="text-align: center;">

    <button type="button" class="btn btn-lg btn-app" style="background-color:red; color:white;" onclick='editSurgicalProtocol({{$surgeryEventId}});return false;'>
        <i class="fa fa-edit"></i> Editar
    </button>

    <a href="/surgery/surgicalProtocol/printBySurgeryEventId/{{$surgeryEventId}}" target="_blank" class="btn btn-lg btn-app" style="background-color:green;color:white;">
        <i class="fa fa-file-pdf-o"></i> Descargar
    </a>
</div>