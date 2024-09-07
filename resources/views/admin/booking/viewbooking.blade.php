@extends('layouts.app')
@section('content')
    <div class="container-fluid  p-0 m-0">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" id="successMessage">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row mb-2 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-10">
                <h2 class="text-center text-white">BOOKINGS OF {{ $project->title }}</h2>
            </div>
            <div class="col-lg-2 d-flex justify-content-end align-items-center">
                <span>
                    @if (Auth::user()->usertype == 'admin')
                        <a href="{{ route('trashview', $project->id) }}" class="btn" style="background-color: #e3f2fd">Go
                            To Trash</a>
                    @endif
                    <a href="{{ route('project.show', request()->route('projectid')) }}" class="btn"
                        style="background-color: #e3f2fd">Back</a>
                </span>
            </div>
        </div>
        <table class="table table-bordered data-table text-center mt-5">
            <thead>
                <tr>
                    <th>No</th>

                    <th>Sector Name</th>
                    <th>Plot Number</th>
                    <th>Client Name</th>
                    <th>Mobile</th>
                    @if (Auth::user()->usertype == 'admin')
                        <th>Agent Name</th>
                    @endif
                    <th>Agent Commission</th>
                    <th>Plot Size</th>
                    <th>Action</th>
                </tr>
            </thead>

        </table>
    </div>
    <script type="text/javascript">
        $(function() {
            // Get the project ID from the URL
            var projectId = "{{ $project->id }}";

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.booking.viewbooking', '') }}/" + projectId,
                columns: [{
                        data: null,
                        name: 'iteration',
                        orderable: false,
                        searchable: false,
                        // index: false,
                        render: function(data, type, row, meta) {
                            return meta.row + 1; // Add 1 to start the index from 1
                        }
                    },
                    // {
                    //     data: 'plot.sector.project.title',
                    //     name: 'plot.sector.project.title'
                    // },
                    {
                        data: 'plot.sector.sectorname',
                        name: 'plot.sector.sectorname',
                        render: function(data, type, row) {
                            return 'Sector ' + data;
                        }
                    },
                    {
                        data: 'plotnumber',
                        name: 'plotnumber',
                        render: function(data, type, row) {
                            return 'Plot ' + data;
                        }
                    },

                    {
                        data: 'fullname',
                        name: 'fullname'
                    },

                    {
                        data: 'mobile',
                        name: 'mobile'
                    },
                    @if (Auth::user()->usertype == 'admin')
                        {
                            data: 'Agent_Name',
                            name: 'Agent_Name'
                        },
                    @endif {
                        data: 'agent_commisson',
                        name: 'agent_commisson',
                        render: function(data, type, row) {
                            return data + '%';
                        }
                    },

                    {
                        data: 'area',
                        name: 'area'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

        });
    </script>
@endsection
