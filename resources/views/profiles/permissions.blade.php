{!! Form::hidden('id',$role->id) !!}
<!-- ABM Usuarios -->
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('users.view'))
                <input type="checkbox" name="permissions[]" value="users.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="users.view"/>
            @endif
            <label for="users.view">Ver Usuarios</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('users.create'))
                <input type="checkbox" name="permissions[]" value="users.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="users.create"/>
            @endif
            <label for="users.view">Crear Usuarios</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('users.edit'))
                <input type="checkbox" name="permissions[]" value="users.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="users.edit"/>
            @endif
            <label for="users.view">Editar Usuarios</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('users.delete'))
                <input type="checkbox" name="permissions[]" value="users.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="users.delete"/>
            @endif
            <label for="users.view">Eliminar Usuarios</label>
        </div>
    </div>
</div>
<br>
<!-- ABM Perfiles -->
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('roles.view'))
                <input type="checkbox" name="permissions[]" value="roles.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="roles.view"/>
            @endif
            <label for="users.view">Ver Perfiles</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('roles.create'))
                <input type="checkbox" name="permissions[]" value="roles.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="roles.create"/>
            @endif
            <label for="users.view">Crear Perfiles</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('roles.edit'))
                <input type="checkbox" name="permissions[]" value="roles.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="roles.edit"/>
            @endif
            <label for="users.view">Editar Perfiles</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('roles.delete'))
                <input type="checkbox" name="permissions[]" value="roles.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="roles.delete"/>
            @endif
            <label for="users.view">Eliminar Perfiles</label>
        </div>
    </div>
</div>
<br>
<!-- ABM Servicios -->
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('services.view'))
                <input type="checkbox" name="permissions[]" value="services.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="services.view"/>
            @endif
            <label for="users.view">Ver Servicios</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('services.create'))
                <input type="checkbox" name="permissions[]" value="services.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="services.create"/>
            @endif
            <label for="users.view">Crear Servicios</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('services.edit'))
                <input type="checkbox" name="permissions[]" value="services.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="services.edit"/>
            @endif
            <label for="users.view">Editar Servicios</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('services.delete'))
                <input type="checkbox" name="permissions[]" value="services.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="services.delete"/>
            @endif
            <label for="users.view">Eliminar Servicios</label>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('os.view'))
                <input type="checkbox" name="permissions[]" value="os.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="os.view"/>
            @endif
            <label for="users.view">Ver Obras Sociales</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('os.create'))
                <input type="checkbox" name="permissions[]" value="os.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="os.create"/>
            @endif
            <label for="users.view">Crear Obras Sociales</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('os.edit'))
                <input type="checkbox" name="permissions[]" value="os.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="os.edit"/>
            @endif
            <label for="users.view">Editar Obras Sociales</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('os.delete'))
                <input type="checkbox" name="permissions[]" value="os.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="os.delete"/>
            @endif
            <label for="users.view">Eliminar Obras Sociales</label>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('biopsyTypes.view'))
                <input type="checkbox" name="permissions[]" value="biopsyTypes.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="biopsyTypes.view"/>
            @endif
            <label for="users.view">Ver Tipos de Biopsias</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('biopsyTypes.create'))
                <input type="checkbox" name="permissions[]" value="biopsyTypes.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="biopsyTypes.create"/>
            @endif
            <label for="users.view">Crear Tipos de Biopsias</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('biopsyTypes.edit'))
                <input type="checkbox" name="permissions[]" value="biopsyTypes.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="biopsyTypes.edit"/>
            @endif
            <label for="users.view">Editar Tipos de Biopsias</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('biopsyTypes.delete'))
                <input type="checkbox" name="permissions[]" value="biopsyTypes.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="biopsyTypes.delete"/>
            @endif
            <label for="users.view">Eliminar Tipos de Biopsias</label>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('internshipBiopsies.delete'))
                <input type="checkbox" name="permissions[]" value="internshipBiopsies.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="internshipBiopsies.view"/>
            @endif
            <label for="users.view">Ver Biopsias de Internados</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('biopsyTypes.delete'))
                <input type="checkbox" name="permissions[]" value="internshipBiopsies.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="internshipBiopsies.create"/>
            @endif
            <label for="users.view">Crear Biopsias de Internados</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('biopsyTypes.delete'))
                <input type="checkbox" name="permissions[]" value="internshipBiopsies.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="internshipBiopsies.edit"/>
            @endif
            <label for="users.view">Editar Biopsias de Internados</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('biopsyTypes.delete'))
                <input type="checkbox" name="permissions[]" value="internshipBiopsies.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="internshipBiopsies.delete"/>
            @endif
            <label for="users.view">Eliminar Biopsias de Internados</label>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('consultingRoomBiopsies.view'))
                <input type="checkbox" name="permissions[]" value="consultingRoomBiopsies.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="consultingRoomBiopsies.view"/>
            @endif
            <label for="users.view">Ver Biopsias de Consultorio</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('consultingRoomBiopsies.create'))
                <input type="checkbox" name="permissions[]" value="consultingRoomBiopsies.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="consultingRoomBiopsies.create"/>
            @endif
            <label for="users.view">Crear Biopsias de Consultorio</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('consultingRoomBiopsies.edit'))
                <input type="checkbox" name="permissions[]" value="consultingRoomBiopsies.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="consultingRoomBiopsies.edit"/>
            @endif
            <label for="users.view">Editar Biopsias de Consultorio</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('consultingRoomBiopsies.delete'))
                <input type="checkbox" name="permissions[]" value="consultingRoomBiopsies.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="consultingRoomBiopsies.delete"/>
            @endif
            <label for="users.view">Eliminar Biopsias de Consultorio</label>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('emergencyConsultings.view'))
                <input type="checkbox" name="permissions[]" value="emergencyConsultings.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="emergencyConsultings.view"/>
            @endif
            <label for="users.view">Ver Consultas de Guardia</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('emergencyConsultings.create'))
                <input type="checkbox" name="permissions[]" value="emergencyConsultings.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="emergencyConsultings.create"/>
            @endif
            <label for="users.view">Crear Consultas de Guardia</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('emergencyConsultings.edit'))
                <input type="checkbox" name="permissions[]" value="emergencyConsultings.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="emergencyConsultings.edit"/>
            @endif
            <label for="users.view">Editar Consultas de Guardia</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('emergencyConsultings.delete'))
                <input type="checkbox" name="permissions[]" value="emergencyConsultings.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="emergencyConsultings.delete"/>
            @endif
            <label for="users.view">Eliminar Consultas de Guardia</label>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('interconsulting.view'))
                <input type="checkbox" name="permissions[]" value="interconsulting.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="interconsulting.view"/>
            @endif
            <label for="users.view">Ver Interconsultas</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('interconsulting.create'))
                <input type="checkbox" name="permissions[]" value="interconsulting.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="interconsulting.create"/>
            @endif
            <label for="users.view">Crear Interconsultas</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('interconsulting.edit'))
                <input type="checkbox" name="permissions[]" value="interconsulting.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="interconsulting.edit"/>
            @endif
            <label for="users.view">Editar Interconsultas</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('interconsulting.delete'))
                <input type="checkbox" name="permissions[]" value="interconsulting.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="interconsulting.delete"/>
            @endif
            <label for="users.view">Eliminar Interconsultas</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('interconsulting.changeStatus'))
                <input type="checkbox" name="permissions[]" value="interconsulting.changeStatus" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="interconsulting.changeStatus"/>
            @endif
            <label for="users.view">Cambiar estado de interconsulta</label>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('doctors.view'))
                <input type="checkbox" name="permissions[]" value="doctors.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="doctors.view"/>
            @endif
            <label for="users.view">Ver Médicos</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('doctors.create'))
                <input type="checkbox" name="permissions[]" value="doctors.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="doctors.create"/>
            @endif
            <label for="users.view">Crear Médicos</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('doctors.edit'))
                <input type="checkbox" name="permissions[]" value="doctors.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="doctors.edit"/>
            @endif
            <label for="users.view">Editar Médicos</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('doctors.delete'))
                <input type="checkbox" name="permissions[]" value="doctors.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="doctors.delete"/>
            @endif
            <label for="users.view">Eliminar Médicos</label>
        </div>
    </div>
</div>
<br>

<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('reports.view'))
                <input type="checkbox" name="permissions[]" value="reports.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="reports.view"/>
            @endif
            <label for="reports.view">Ver Reportes</label>
        </div>
    </div>
</div>
<br>

<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('accounting.receipts.view'))
                <input type="checkbox" name="permissions[]" value="accounting.receipts.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="accounting.receipts.view"/>
            @endif
            <label for="reports.view">Ver Recibos</label>
        </div>

        <div class="col-sm-3">
            @if($role->hasPermissionTo('accounting.receipts.create'))
                <input type="checkbox" name="permissions[]" value="accounting.receipts.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="accounting.receipts.create"/>
            @endif
            <label for="reports.view">Crear Recibos</label>
        </div>

        <div class="col-sm-3">
            @if($role->hasPermissionTo('accounting.receipts.edit'))
                <input type="checkbox" name="permissions[]ci" value="accounting.receipts.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="accounting.receipts.edit"/>
            @endif
            <label for="reports.view">Modificar Recibos</label>
        </div>

        <div class="col-sm-3">
            @if($role->hasPermissionTo('accounting.receipts.delete'))
                <input type="checkbox" name="permissions[]" value="accounting.receipts.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="accounting.receipts.delete"/>
            @endif
            <label for="reports.view">Eliminar Recibos</label>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('surgery.view'))
                <input type="checkbox" name="permissions[]" value="surgery.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="surgery.view"/>
            @endif
            <label for="users.view">Ver Cirugías</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('surgery.create'))
                <input type="checkbox" name="permissions[]" value="surgery.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="surgery.create"/>
            @endif
            <label for="users.view">Crear Cirugías</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('surgery.edit'))
                <input type="checkbox" name="permissions[]" value="surgery.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="surgery.edit"/>
            @endif
            <label for="users.view">Editar Cirugías</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('surgery.delete'))
                <input type="checkbox" name="permissions[]" value="surgery.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="surgery.delete"/>
            @endif
            <label for="users.view">Eliminar Cirugías</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('surgery.changeStatus'))
                <input type="checkbox" name="permissions[]" value="surgery.changeStatus" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="surgery.changeStatus"/>
            @endif
            <label for="users.view">Cambiar estado de Cirugías</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('surgery.updateSurgeryData'))
                <input type="checkbox" name="permissions[]" value="surgery.updateSurgeryData" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="surgery.updateSurgeryData"/>
            @endif
            <label for="surgery.updateSurgeryData">Modificar TODOS los datos de cirugía</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('surgery.updatePatientData'))
                <input type="checkbox" name="permissions[]" value="surgery.updatePatientData" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="surgery.updatePatientData"/>
            @endif
            <label for="surgery.updatePatientData">Modificar datos del paciente de cirugía</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('surgery.updateSurgeryComments'))
                <input type="checkbox" name="permissions[]" value="surgery.updateSurgeryComments" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="surgery.updateSurgeryComments"/>
            @endif
            <label for="surgery.updateSurgeryComments">Actualizar comentarios de cirugía</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('surgery.updateSurgeryEventData'))
                <input type="checkbox" name="permissions[]" value="surgery.updateSurgeryEventData" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="surgery.updateSurgeryEventData"/>
            @endif
            <label for="surgery.updateSurgeryEventData">Actualizar turno de cirugía</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('surgery.createSurgicalProtocol'))
                <input type="checkbox" name="permissions[]" value="surgery.createSurgicalProtocol" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="surgery.createSurgicalProtocol"/>
            @endif
            <label for="surgery.createSurgicalProtocol">Crear protocolo quirúrgico</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('surgery.deleteSurgicalProtocol'))
                <input type="checkbox" name="permissions[]" value="surgery.deleteSurgicalProtocol" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="surgery.deleteSurgicalProtocol"/>
            @endif
            <label for="surgery.deleteSurgicalProtocol">Eliminar protocolo quirúrgico</label>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('surgeryType.view'))
                <input type="checkbox" name="permissions[]" value="surgeryType.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="surgeryType.view"/>
            @endif
            <label for="users.view">Ver Tipos de Cirugías</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('surgeryType.create'))
                <input type="checkbox" name="permissions[]" value="surgeryType.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="surgeryType.create"/>
            @endif
            <label for="users.view">Crear Tipos de Cirugías</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('surgeryType.edit'))
                <input type="checkbox" name="permissions[]" value="surgeryType.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="surgeryType.edit"/>
            @endif
            <label for="users.view">Editar Tipos de Cirugías</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('surgeryType.delete'))
                <input type="checkbox" name="permissions[]" value="surgeryType.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="surgeryType.delete"/>
            @endif
            <label for="users.view">Eliminar Tipos de Cirugías</label>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('insuranceCompanies.view'))
                <input type="checkbox" name="permissions[]" value="insuranceCompanies.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="insuranceCompanies.view"/>
            @endif
            <label for="insuranceCompanies.view">Ver Compañías de ART</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('insuranceCompanies.create'))
                <input type="checkbox" name="permissions[]" value="insuranceCompanies.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="insuranceCompanies.create"/>
            @endif
            <label for="insuranceCompanies.create">Crear Compañías de ART</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('insuranceCompanies.edit'))
                <input type="checkbox" name="permissions[]" value="insuranceCompanies.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="insuranceCompanies.edit"/>
            @endif
            <label for="insuranceCompanies.edit">Editar Compañías de ART</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('insuranceCompanies.delete'))
                <input type="checkbox" name="permissions[]" value="insuranceCompanies.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="insuranceCompanies.delete"/>
            @endif
            <label for="insuranceCompanies.delete">Eliminar Compañías de ART</label>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('orthopedics.view'))
                <input type="checkbox" name="permissions[]" value="orthopedics.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="orthopedics.view"/>
            @endif
            <label for="orthopedics.view">Ver Ortopedias</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('orthopedics.create'))
                <input type="checkbox" name="permissions[]" value="orthopedics.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="orthopedics.create"/>
            @endif
            <label for="orthopedics.view">Crear Ortopedias</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('orthopedics.edit'))
                <input type="checkbox" name="permissions[]" value="orthopedics.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="orthopedics.edit"/>
            @endif
            <label for="orthopedics.view">Editar Ortopedias</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('orthopedics.delete'))
                <input type="checkbox" name="permissions[]" value="orthopedics.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="orthopedics.delete"/>
            @endif
            <label for="orthopedics.view">Eliminar Ortopedias</label>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('webNews.view'))
                <input type="checkbox" name="permissions[]" value="webNews.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="webNews.view"/>
            @endif
            <label for="webNews.view">Ver Noticias Web</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('webNews.create'))
                <input type="checkbox" name="permissions[]" value="webNews.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="webNews.create"/>
            @endif
            <label for="webNews.view">Crear Noticias Web</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('webNews.edit'))
                <input type="checkbox" name="permissions[]" value="webNews.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="webNews.edit"/>
            @endif
            <label for="webNews.view">Editar Noticias Web</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('webNews.delete'))
                <input type="checkbox" name="permissions[]" value="webNews.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="webNews.delete"/>
            @endif
            <label for="webNews.view">Eliminar Noticias Web</label>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('extraHoursRequest.view'))
                <input type="checkbox" name="permissions[]" value="extraHoursRequest.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="extraHoursRequest.view"/>
            @endif
            <label for="extraHoursRequest.view">Ver Pedidos de Horas Extras</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('extraHoursRequest.create'))
                <input type="checkbox" name="permissions[]" value="extraHoursRequest.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="extraHoursRequest.create"/>
            @endif
            <label for="extraHoursRequest.create">Crear Pedidos de Horas Extras</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('extraHoursRequest.edit'))
                <input type="checkbox" name="permissions[]" value="extraHoursRequest.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="extraHoursRequest.edit"/>
            @endif
            <label for="extraHoursRequest.edit">Editar Pedidos de Horas Extras</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('extraHoursRequest.delete'))
                <input type="checkbox" name="permissions[]" value="extraHoursRequest.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="extraHoursRequest.delete"/>
            @endif
            <label for="extraHoursRequest.delete">Eliminar Pedidos de Horas Extras</label>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('accounting.checkMaking.view'))
                <input type="checkbox" name="permissions[]" value="accounting.checkMaking.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="accounting.checkMaking.view"/>
            @endif
            <label for="accounting.checkMaking.view">Ver Cheques</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('accounting.checkMaking.create'))
                <input type="checkbox" name="permissions[]" value="accounting.checkMaking.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="accounting.checkMaking.create"/>
            @endif
            <label for="accounting.checkMaking.create">Crear Cheques</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('accounting.checkMaking.edit'))
                <input type="checkbox" name="permissions[]" value="accounting.checkMaking.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="accounting.checkMaking.edit"/>
            @endif
            <label for="accounting.checkMaking.edit">Editar Cheques</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('accounting.checkMaking.delete'))
                <input type="checkbox" name="permissions[]" value="accounting.checkMaking.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="accounting.checkMaking.delete"/>
            @endif
            <label for="accounting.checkMaking.delete">Eliminar Cheques</label>
        </div>
    </div>
</div>
<br>

<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('accounting.checkMaking.view'))
                <input type="checkbox" name="permissions[]" value="accounting.bankAccounts.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="accounting.bankAccounts.view"/>
            @endif
            <label for="accounting.bankAccounts.view">Ver Cuentas Bancarias</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('accounting.checkMaking.create'))
                <input type="checkbox" name="permissions[]" value="accounting.bankAccounts.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="accounting.bankAccounts.create"/>
            @endif
            <label for="accounting.bankAccounts.create">Crear Cuentas Bancarias</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('accounting.bankAccounts.edit'))
                <input type="checkbox" name="permissions[]" value="accounting.bankAccounts.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="accounting.bankAccounts.edit"/>
            @endif
            <label for="accounting.bankAccounts.edit">Editar Cuentas Bancarias</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('accounting.bankAccounts.delete'))
                <input type="checkbox" name="permissions[]" value="accounting.bankAccounts.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="accounting.bankAccounts.delete"/>
            @endif
            <label for="accounting.bankAccounts.delete">Eliminar Cuentas Bancarias</label>
        </div>
    </div>
</div>
<br>


<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('accounting.vendors.view'))
                <input type="checkbox" name="permissions[]" value="accounting.vendors.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="accounting.vendors.view"/>
            @endif
            <label for="accounting.vendors.view">Ver Proveedores</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('accounting.vendors.create'))
                <input type="checkbox" name="permissions[]" value="accounting.vendors.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="accounting.vendors.create"/>
            @endif
            <label for="accounting.vendors.create">Crear Proveedores</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('accounting.vendors.edit'))
                <input type="checkbox" name="permissions[]" value="accounting.vendors.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="accounting.vendors.edit"/>
            @endif
            <label for="accounting.vendors.edit">Editar Proveedores</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('accounting.vendors.delete'))
                <input type="checkbox" name="permissions[]" value="accounting.vendors.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="accounting.vendors.delete"/>
            @endif
            <label for="accounting.vendors.delete">Eliminar Proveedores</label>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('pathologyCategoryClassOne.view'))
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassOne.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassOne.view"/>
            @endif
            <label for="accounting.vendors.view">Ver Cat. de A.P Nivel I</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('pathologyCategoryClassOne.create'))
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassOne.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassOne.create"/>
            @endif
            <label for="accounting.vendors.create">Crear Cat. de A.P Nivel I</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('pathologyCategoryClassOne.edit'))
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassOne.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassOne.edit"/>
            @endif
            <label for="accounting.vendors.edit">Editar Cat. de A.P Nivel I</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('pathologyCategoryClassOne.delete'))
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassOne.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassOne.delete"/>
            @endif
            <label for="accounting.vendors.delete">Eliminar Cat. de A.P Nivel I</label>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('pathologyCategoryClassTwo.view'))
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassTwo.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassTwo.view"/>
            @endif
            <label for="accounting.vendors.view">Ver Cat. de A.P Nivel II</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('pathologyCategoryClassTwo.create'))
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassTwo.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassTwo.create"/>
            @endif
            <label for="accounting.vendors.create">Crear Cat. de A.P Nivel II</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('pathologyCategoryClassTwo.edit'))
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassTwo.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassTwo.edit"/>
            @endif
            <label for="accounting.vendors.edit">Editar Cat. de A.P Nivel II</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('pathologyCategoryClassTwo.delete'))
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassTwo.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassTwo.delete"/>
            @endif
            <label for="accounting.vendors.delete">Eliminar Cat. de A.P Nivel II</label>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('pathologyCategoryClassThree.view'))
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassThree.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassThree.view"/>
            @endif
            <label for="accounting.vendors.view">Ver Cat. de A.P Nivel II</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('pathologyCategoryClassThree.create'))
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassThree.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassThree.create"/>
            @endif
            <label for="accounting.vendors.create">Crear Cat. de A.P Nivel II</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('pathologyCategoryClassThree.edit'))
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassThree.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassThree.edit"/>
            @endif
            <label for="accounting.vendors.edit">Editar Cat. de A.P Nivel II</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('pathologyCategoryClassThree.delete'))
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassThree.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassThree.delete"/>
            @endif
            <label for="accounting.vendors.delete">Eliminar Cat. de A.P Nivel II</label>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            @if($role->hasPermissionTo('pathologyCategoryClassFour.view'))
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassFour.view" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassFour.view"/>
            @endif
            <label for="accounting.vendors.view">Ver Cat. de A.P Nivel IV</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('pathologyCategoryClassFour.create'))
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassFour.create" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassFour.create"/>
            @endif
            <label for="accounting.vendors.create">Crear Cat. de A.P Nivel IV</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('pathologyCategoryClassFour.edit'))
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassFour.edit" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassFour.edit"/>
            @endif
            <label for="accounting.vendors.edit">Editar Cat. de A.P Nivel IV</label>
        </div>
        <div class="col-sm-3">
            @if($role->hasPermissionTo('pathologyCategoryClassFour.delete'))
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassFour.delete" checked/>
            @else
                <input type="checkbox" name="permissions[]" value="pathologyCategoryClassFour.delete"/>
            @endif
            <label for="accounting.vendors.delete">Eliminar Cat. de A.P Nivel IV</label>
        </div>
    </div>
</div>
<br>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('profiles.index') !!}" class="btn btn-default">Cancelar</a>
</div>