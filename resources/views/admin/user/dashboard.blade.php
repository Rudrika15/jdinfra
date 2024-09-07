@extends('layouts.app')

@section('content')
    <style>
        .dashboard-header {
            background: linear-gradient(90deg, rgb(26, 15, 243) 0%, rgba(9, 9, 121, 1) 29%, rgba(0, 212, 255, 1) 100%);
            padding: 20px;
            border-radius: 15px;
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin-bottom: 20px;
            box-shadow: 0px 3px 5px 0px rgba(0, 0, 0, 0.1);
            animation: pulse 2s infinite alternate;
        }

        @keyframes pulse {
            0% {
                color: white;
                text-shadow: 0px 0px 5px rgba(255, 255, 255, 0.5);
            }

            100% {
                color: #d8e9f0;
                text-shadow: 0px 0px 20px rgba(255, 255, 255, 0.5);
            }

        }
    </style>
    <div class="container">
        @if (Auth::user()->usertype == 'admin')
            <div class="dashboard-header">
                <h1>Admin Dashboard</h1>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="card bg-primary text-white mb-4" style="border-radius: 15px;">
                        <div class="card-body">
                            <h5 class="card-title mb-0" style="font-size: 1.5rem;"><i class="fas fa-users"></i> Total Agents
                            </h5>
                            <p class="card-text" style="font-size: 2.5rem;">{{ $agents }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-success text-white mb-4" style="border-radius: 15px;">
                        <div class="card-body">
                            <h5 class="card-title mb-0" style="font-size: 1.5rem;"><i class="fas fa-project-diagram"></i>
                                Total
                                Projects </h5>
                            <p class="card-text" style="font-size: 2.5rem;">{{ $projects }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-warning text-white mb-4" style="border-radius: 15px;">
                        <div class="card-body">
                            <h5 class="card-title mb-0" style="font-size: 1.5rem;"><i class="fas fa-users"></i> Total
                                Clients </h5>
                            <p class="card-text" style="font-size: 2.5rem;">{{ $bookings }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <canvas id="myChart" style="width: 700px; height: 220px;"></canvas>
                </div>
            </div>
        @else
            <div class="dashboard-header">
                <h1>Welcome {{ Auth::user()->name }} to the Agent Dashboard!</h1>
            </div>
            <!-- Additional content specific to agent users -->
            <form id="projectForm" action="{{ route('admin.dashboard') }}" method="GET">
                <div class="row d-flex justify-content-end p-0 mt-5">
                    <div class="col-lg-2 mb-3 p-0 ">
                        <select name="project_id" class="form-select shadow-none " id="project_id">

                            <option value="All" {{ request()->input('project_id') === 'All' ? 'selected' : '' }}>All
                            </option>
                            @foreach ($project as $project)
                                <option value="{{ $project->id }}"
                                    {{ request()->input('project_id') == $project->id ? 'selected' : '' }}>

                                    {{ $project->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>


            <script>
                document.getElementById('project_id').addEventListener('change', function() {
                    document.getElementById('projectForm').submit();
                });
                document.addEventListener('DOMContentLoaded', function() {
                    // Get the project ID from the URL
                    const urlParams = new URLSearchParams(window.location.search);
                    const projectId = urlParams.get('project_id');

                    // Select the dropdown element
                    const projectDropdown = document.getElementById('project_id');

                    // Set the selected option based on the project ID in the URL
                    if (!projectId || projectId === 'All') {
                        projectDropdown.value = 'All';
                    } else {
                        projectDropdown.value = projectId;
                    }
                });
            </script>

            <div class="row">
                @if (count($booking) > 0)
                    <table class="table table-bordered">
                        <tr>
                            <thead>
                                <th>Project Name</th>
                                <th>Sector Name</th>
                                <th>Plot Number</th>
                                <th>Booking Amount</th>
                                <th>Agent Commission</th>
                                <th>Action</th>
                            </thead>
                        </tr>
                    @else
                        <div class="row d-flex justify-content-center mt-5">
                            <div class="alert alert-danger col-lg-8 d-flex justify-content-center align-items-center">
                                @php
                                    $selectedProjectId = request()->input('project_id');
                                    $selectedProject = $project->where('id', $selectedProjectId)->first();
                                    $projectTitle = $selectedProject ? $selectedProject->title : '';
                                @endphp
                                <h3 class="text-uppercase"><strong>There Are No Records for {{ $projectTitle }}</strong>
                                </h3>
                            </div>
                        </div>
                @endif
                <tr>

                    @foreach ($booking as $item)
                <tr>
                    <td>{{ $item->plot->sector->project->title }}</td>
                    <td>Sector {{ $item->plot->sector->sectorname }}</td>
                    <td>Plot {{ $item->plot->plotnumber }}</td>
                    <td>{{ $item->booking_amount }}</td>
                    <td>{{ $item->agent_commisson }}</td>
                    <td><a href="{{ route('officedetails', $item->id) }}" class="btn btn-primary  shadow-none">View
                            more</a></td>
                </tr>
        @endforeach
        </tr>
        </table>
    </div>
    </div>
    @endif
    </div>
    <script>
        document.getElementById('project_id').addEventListener('change', function() {
            document.getElementById('projectForm').submit(); // Submit the form
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if (session('Success'))
        <script>
            // Display the success message using SweetAlert
            Swal.fire({
                icon: 'success',
                title: 'Logged In Sucessfully',
                showConfirmButton: false,
                timer: 1500,

            });
        </script>
    @endif

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Agents', 'Projects', 'Clients'],
                datasets: [{
                    data: [{{ $agents }}, {{ $projects }}, {{ $bookings }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false // This line removes the legend
                    }
                }
            }
        });
    </script>
@endsection
