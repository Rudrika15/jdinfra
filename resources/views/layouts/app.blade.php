<!DOCTYPE html>

<html lang="en" data-bs-theme="auto">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="img/favicon.ico" rel="icon">

    <link rel="icon" type="image/x-icon" href="{{ asset('templatevisitor/img/favicon.ico') }}">
    <title>JD Infraspace Pvt Ltd - admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
    {{--  <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min. css" rel="stylesheet">  --}}

    <meta name="theme-color" content="#712cf9">
    <style>
        .navbar {
            background-color: rgba(227, 242, 253, 0.9);
            /* border: 2px solid black !important; */
            /* Light blue with 0.9 opacity */
        }

        .sticky-top.navbar {
            background-color: rgba(227, 242, 253, 0.9) !important;
            /* border: 2px solid #0b6ab2 !important; */
            /* background-color: black !important; */
            /* Light blue with 0.7 opacity */
        }

        h1 {
            text-transform: uppercase;
        }

        h2 {
            text-transform: uppercase;
        }

        h3 {
            text-transform: uppercase;
        }
    </style>


</head>

<body>



    <main>

        <nav class="navbar navbar-expand-lg navbar-light form-control  sticky-top" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                {{-- <a class="navbar-brand" href="{{route('admin.dashboard')}}">RealEstate</a> --}}

                <a href="{{ route('admin.dashboard') }}"> <img class="navbar-brand"
                        src="{{ asset('templatevisitor/img/logo.png') }}" width="100" alt="Icon"></a>
                <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class=" nav-link {{ Route::currentRouteNamed('admin.dashboard') ? 'active' : '' }}"
                                href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        @if (Auth::user()->usertype == 'admin')
                            <li class="nav-item">
                                <a class=" nav-link {{ Route::currentRouteNamed('topbar.index') ? 'active' : '' }}"
                                    href="{{ route('topbar.index') }}">Home details</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class=" nav-link {{ Route::currentRouteNamed('project.index') ? 'active' : '' }}"
                                href="{{ route('project.index') }}">Project</a>
                        </li>
                        @if (Auth::user()->usertype == 'admin')
                            <li class="nav-item">
                                <a class="  nav-link {{ Route::currentRouteNamed('viewcontact') ? 'active' : '' }}"
                                    href="{{ route('viewcontact') }}">Contact</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class=" nav-link {{ Route::currentRouteNamed('report.index') ? 'active' : '' }}"
                                href="{{ route('report.index') }}">Report</a>
                        </li>
                        @if (Auth::user()->usertype == 'admin')
                            <li class="nav-item">
                                <a class=" nav-link {{ Route::currentRouteNamed('admin.user.index') ? 'active' : '' }}"
                                    href="{{ route('admin.user.index') }}">Agents</a>
                            </li>
                        @endif
                        @if (Auth::user()->usertype == 'admin')
                            <li class="nav-item">
                                <a class=" nav-link {{ Route::currentRouteNamed('admin.user.agentbookings') ? 'active' : '' }}"
                                    href="{{ route('admin.user.agentbookings') }}">Agent Bookings</a>
                            </li>
                        @endif
                        @if (Auth::user()->usertype == 'admin')
                            <li class="nav-item">
                                <a class=" nav-link {{ Route::currentRouteNamed('plot.resoldshow') ? 'active' : '' }}"
                                    href="{{ route('plot.resoldshow') }}">History Plots</a>
                            </li>
                        @endif
                    </ul>
                </div>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end"
                            aria-labelledby="navbarDarkDropdownMenuLink">

                            <li><a class="dropdown-item"
                                    href="{{ route('admin.user.changepassword', Auth::user()->id) }}">Change
                                    Password</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a></li>
                        </ul>
                </ul>


            </div>



        </nav>


        <div class="container-fluid p-5">

            @yield('content')

        </div>
    </main>
    <script>
        // Hide the success message after 5 minutes
        setTimeout(function() {
            $('#successMessage').fadeOut('slow');
        }, 2000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <script>
        // Initialize Summernote editor
        $(document).ready(function() {
            $('.summernote').summernote({
                placeholder: 'Start typing...',
                tabsize: 2,
                height: 200
            });
        });
    </script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css" rel="stylesheet">
</body>

</html>
