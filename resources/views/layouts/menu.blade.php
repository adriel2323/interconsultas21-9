@yield("menu-items")

@can('internshipBiopsies.view')
    <li class="{{ Request::is('internshipBiopsies*') ? 'active' : '' }}">
        <a href="{!! route('internshipBiopsies.index') !!}"><i class="text-info fa fa-heartbeat"></i><span>Biopsias Internados</span></a>
    </li>
@endcan

@can('consultingRoomBiopsies.view')
    <li class="{{ Request::is('consultingRoomBiopsies*') ? 'active' : '' }}">
        <a href="{!! route('consultingRoomBiopsies.index') !!}"><i class="text-info fa fa-heartbeat"></i><span>Biopsias Consultorio</span></a>
    </li>
@endcan

@can('surgery.view')
    <li class="{{ Request::is('surgery*') ? 'active' : '' }}">
        <a href="{!! url('/surgery') !!}"><i class="text-info fa fa-user-md"></i><span>Turnos de Cirugía</span></a>
    </li>
@endcan

@can('surgery.view')
    <li class="{{ Request::is('surgery/list*') ? 'active' : '' }}">
        <a href="{!! url('/surgery/list') !!}"><i class="text-info fa fa-user-md"></i><span>Listado de turnos de Cirugía</span></a>
    </li>
@endcan

@can('emergencyConsultings.view')
    <li class="{{ Request::is('emergencyConsultings*') ? 'active' : '' }}">
        <a href="{!! route('emergencyConsultings.index') !!}"><i class="text-info fa fa-edit"></i><span>Consultas de Guardia</span></a>
    </li>
@endcan

@can('interconsulting.view')
    <li class="{{ Request::is('interconsultings*') ? 'active' : '' }}">
        <a href="{!! route('interconsultings.index') !!}"><i class="text-info fa fa-user-md"></i><span>Interconsultas</span></a>
    </li>
    <li class="{{ Request::is('interconsultings*') ? 'active' : '' }}">
        <a href="{!! url('/interconsulting/pending') !!}"><i class="text-info fa fa-user-secret"></i><span>Interconsultas Pendientes</span></a>
    </li>
@endcan

@can('reports.view')
    <li class="{{ Request::is('reports*') ? 'active' : '' }}">
        <a href="{!! url('/reports') !!}"><i class="text-info fa fa-file-archive-o"></i><span>Reportes</span></a>
    </li>
@endcan

@canany(['accounting.receipts.view', 'accounting.checkMaking.view', 'accounting.bankAccounts.view', 'accounting.vendors.view'])
    <li class="treeview">
        <a href="#"><i class="text-info fa fa-fw fa-money"></i> <span>Contaduría</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
        </a>

        <ul class="treeview-menu">
            @can('accounting.receipts.view')
                <li class="{{ Request::is('receipts*') ? 'active' : '' }}">
                    <a href="{!! route('accounting.receipts.index') !!}"><i class="text-info fa fa-file-archive-o"></i><span>Recibos</span></a>
                </li>
            @endcan

            @can('accounting.checkMaking.view')
                <li class="{{ Request::is('receipts*') ? 'active' : '' }}">
                    <a href="{!! route('accountingChecks.index') !!}"><i class="text-info fa fa-money"></i><span>Cheques</span></a>
                </li>
            @endcan

            @can('accounting.bankAccounts.view')
                <li class="{{ Request::is('accountingBanks*') ? 'active' : '' }}">
                    <a href="{!! route('accountingBanks.index') !!}"><i class="text-info fa fa-building"></i><span>Cuentas Bancarias</span></a>
                </li>
            @endcan

            @can('accounting.vendors.view')
                <li class="{{ Request::is('accountingVendors*') ? 'active' : '' }}">
                    <a href="{!! route('accountingVendors.index') !!}"><i class="text-info fa fa-users"></i><span>Proveedores</span></a>
                </li>
            @endcan
        </ul>
    </li>
@endcanany

@canany(['users.view','doctors.view','roles.view','services.view','os.view','biopsyTypes.view','surgeryType.view', 'insuranceCompanies.view', 'orthopedics.view'])
<li class="treeview">
    <a href="#"><i class="text-info fa fa-fw fa-cog"></i> <span>Administración</span>
        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
    </a>
    <ul class="treeview-menu">
        @can('users.view')
            <li class="{{ Request::is('users*') ? 'active' : '' }}">
                <a href="{!! route('users.index') !!}"><i class="text-info fa fa-users"></i><span>Usuarios</span></a>
            </li>
        @endcan

        @can('doctors.view')
            <li class="{{ Request::is('doctors*') ? 'active' : '' }}">
                <a href="{!! route('doctors.index') !!}"><i class="text-info fa fa-user-md"></i><span>Especialistas</span></a>
            </li>
        @endcan

        @can('roles.view')
            <li class="{{ Request::is('profiles*') ? 'active' : '' }}">
                <a href="{!! url('/profiles') !!}"><i class="text-info fa fa-user-circle-o"></i><span>Perfiles</span></a>
            </li>
        @endcan

        @can('services.view')
            <li class="{{ Request::is('services*') ? 'active' : '' }}">
                <a href="{!! route('services.index') !!}"><i class="text-info fa fa-user-md"></i><span>Servicios</span></a>
            </li>
        @endcan

        @can('os.view')
            <li class="{{ Request::is('os*') ? 'active' : '' }}">
                <a href="{!! route('os.index') !!}"><i class="text-info fa fa-address-card"></i><span>Obras Sociales</span></a>
            </li>
        @endcan

        @can('biopsyTypes.view')
            <li class="{{ Request::is('biopsiesTypes*') ? 'active' : '' }}">
                <a href="{!! route('biopsiesTypes.index') !!}"><i class="text-info fa fa-edit"></i><span>Tipos de Biopsias</span></a>
            </li>
        @endcan

        @can('surgeryType.view')
            <li class="{{ Request::is('surgeryTypes*') ? 'active' : '' }}">
                <a href="{!! route('surgeryTypes.index') !!}"><i class="text-info fa fa-user-md"></i><span>Tipos de Cirugía</span></a>
            </li>
        @endcan

        @can('insuranceCompanies.view')
            <li class="{{ Request::is('insuranceCompanies*') ? 'active' : '' }}">
                <a href="{!! route('insuranceCompanies.index') !!}"><i class="text-info fa fa-ambulance"></i><span>Compañías ART</span></a>
            </li>
        @endcan

        @can('orthopedics.view')
            <li class="{{ Request::is('orthopedics*') ? 'active' : '' }}">
                <a href="{!! route('orthopedics.index') !!}"><i class="text-info fa fa-edit"></i><span>Ortopedias</span></a>
            </li>
        @endcan

            <li class="{{ Request::is('departments*') ? 'active' : '' }}">
                <a href="{!! route('departments.index') !!}"><i class="text-info fa fa-building"></i><span>Departmentos</span></a>
            </li>

            <li class="{{ Request::is('institutions*') ? 'active' : '' }}">
                <a href="{!! route('institutions.index') !!}"><i class="text-info fa fa-building"></i><span>Instituciones</span></a>
            </li>

            <li class="treeview">

                <a href="#"><i class="text-info fa fa-fw fa-cog"></i> <span>Anatomía Patológica</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>

                <ul class="treeview-menu">
                    @can('pathologyCategoryClassOne.view')
                        <li class="{{ Request::is('pathologicalCategoryClassOne*') ? 'active' : '' }}">
                            <a href="{!! route('pathologicalCategoryClassOne.index') !!}"><i class="text-info fa fa-flask"></i><span>A. Patológica - Cat. Nivel I</span></a>
                        </li>
                    @endcan

                    @can('pathologyCategoryClassTwo.view')
                        <li class="{{ Request::is('pathologicalCategoryClassTwo*') ? 'active' : '' }}">
                            <a href="{!! route('pathologicalCategoryClassTwo.index') !!}"><i class="text-info fa fa-flask"></i><span>A. Patológica - Cat. Nivel II</span></a>
                        </li>
                    @endcan

                    @can('pathologyCategoryClassThree.view')
                        <li class="{{ Request::is('pathologicalCategoryClassThree*') ? 'active' : '' }}">
                            <a href="{!! route('pathologicalCategoryClassThree.index') !!}"><i class="text-info fa fa-flask"></i><span>A. Patológica - Cat. Nivel III</span></a>
                        </li>
                    @endcan

                    @can('pathologyCategoryClassFour.view')
                        <li class="{{ Request::is('pathologicalCategoryClassFour*') ? 'active' : '' }}">
                            <a href="{!! route('pathologicalCategoryClassFour.index') !!}"><i class="text-info fa fa-flask"></i><span>A. Patológica - Cat. Nivel IV</span></a>
                        </li>
                    @endcan

                    <li class="{{ Request::is('pathologicalAnatomyTemplatesTitles*') ? 'active' : '' }}">
                        <a href="{!! route('paTemplatesTitles.index') !!}"><i class="text-info fa fa-paste"></i><span>Cat. Plantillas Informes A.P</span></a>
                    </li>

                    <li class="{{ Request::is('pathologicalAnatomyTemplates*') ? 'active' : '' }}">
                        <a href="{!! route('pathologicalAnatomyTemplates.index') !!}"><i class="text-info fa fa-paste"></i><span>Plantillas de Informes A.P</span></a>
                    </li>
                </ul>

            </li>

    </ul>
</li>
@endcanany

{{--@canany(['webNews.view'])--}}
    {{--<li class="treeview">--}}

        {{--<a href="#"><i class="text-info fa fa-fw fa-cog"></i> <span>Página Web</span>--}}
            {{--<span class="pull-right-container">--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                  {{--</span>--}}
        {{--</a>--}}

        {{--<ul class="treeview-menu">--}}
            {{--<li class="{{ Request::is('webNews*') ? 'active' : '' }}">--}}
                {{--<a href="{!! route('webNews.index') !!}"><i class="fa fa-edit"></i><span>Novedades</span></a>--}}
            {{--</li>--}}
        {{--</ul>--}}

    {{--</li>--}}
{{--@endcanany--}}

{{--@can('extraHoursRequest.view')--}}
    {{--<li class="{{ Request::is('ExtraHourRequest*') ? 'active' : '' }}">--}}
        {{--<a href="{!! url('/ExtraHourRequest') !!}"><i class="text-info fa fa-clock-o"></i><span>Pedido de horas extras</span></a>--}}
    {{--</li>--}}
{{--@endcan--}}

@canany(['pathologyCategoryClassOne.view', 'pathologyCategoryClassTwo.view', 'pathologyCategoryClassThree.view', 'pathologyCategoryClassFour.view'])
<li class="treeview">

    <a href="#"><i class="text-info fa fa-fw fa-flask"></i> <span>Anatomía Patológica</span>
        <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
    </a>

    <ul class="treeview-menu">

        <li class="{{ Request::is('pathologicalAnatomy/create*') ? 'active' : '' }}">
            <a href="{!! url('/pathologicalAnatomy/create') !!}"><i class="text-info fa fa-plus"></i><span>Crear Muestras</span></a>
        </li>

        <li class="{{ Request::is('pathologicalAnatomy/receiveSamples*') ? 'active' : '' }}">
            <a href="{!! url('/pathologicalAnatomy/receiveSamples') !!}"><i class="text-info fa fa-download"></i><span>Recibir Muestras</span></a>
        </li>

        <li class="{{ Request::is('pathologicalAnatomySamples*') ? 'active' : '' }}">
            <a href="{!! url('/pathologicalAnatomy') !!}"><i class="text-info fa fa-paste"></i><span>Informar Muestras</span></a>
        </li>

        <li class="{{ Request::is('pathologicalAnatomy*') ? 'active' : '' }}">
            <a href="{!! url('/pathologicalAnatomy/informedSamples') !!}"><i class="text-info fa fa-list-alt"></i><span>Informes</span></a>
        </li>


    </ul>

</li>
@endcanany


