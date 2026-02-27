<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.layouts.master_1.head.main')
</head>

<body>
    <div class="wrapper">
        @include('components.layouts.master_1.sidebar.main')

        <div class="main-panel">
            @include('components.layouts.master_1.header.main')

            <div class="container">
                <div class="page-inner">
                    @yield('content')
                </div>
            </div>

            @include('components.layouts.master_1.footer.main')
        </div>
    </div>

    @include('components.layouts.master_1.modal.main')
    @include('components.layouts.master_1.script.main')
</body>

</html>
