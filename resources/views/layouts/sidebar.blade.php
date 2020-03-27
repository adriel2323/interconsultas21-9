<aside class="main-sidebar" id="sidebar-wrapper">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/images/logo.png" class="img-circle" alt="User Image"/>
            </div>

            <div class="pull-left info">
                <p>{{ Auth::user()->name}}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> En Línea</a>
            </div>

        </div>

        <ul class="sidebar-menu">
            @include('layouts.menu')
        </ul>

        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>