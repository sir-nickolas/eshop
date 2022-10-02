@section('content')
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="active">
            <h1>
                <a href="{{ url('/') }}" class="logo">C.</a>
            </h1>
            <ul class="list-unstyled components mb-5">
                <li class="{{ Request::is('admin/dashboard') ? 'bg-warning' : '' }}">
                    <a href="{{ url('admin/dashboard') }}"><span class="fa fa-home"></span>Αρχική Διαχειριστή</a>
                </li>
                <li class="{{ Request::is('add-category') ? 'bg-warning' : '' }}">
                    <a href="{{ url('add-category') }}"><span class="fa fa-user"></span>Εισαγωγή Κατηγορίας</a>
                </li>
                <li class="{{ Request::is('view-categories') ? 'bg-warning' : '' }}">
                    <a href="{{ url('view-categories') }}"><span class="fa fa-sticky-note"></span>Κατηγορίες</a>
                </li>
                <li class="{{ Request::is('add-product') ? 'bg-warning' : '' }}">
                    <a href="{{ url('add-product') }}"><span class="fa fa-cogs"></span>Εισαγωγή Προιόντος</a>
                </li>
                <li class="{{ Request::is('view-products') ? 'bg-warning' : '' }}">
                    <a href="{{ url('view-products') }}"><span class="fa fa-paper-plane"></span>Προιόντα</a>
                </li>
            </ul>

            <div class="footer">
                <p>
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | <i class="icon-heart" aria-hidden="true"></i> <a
                        href="#"></a>
                </p>
            </div>
        </nav>
        @yield('extra')
    </div>

    @yield('dashboardscripts')
@endsection
