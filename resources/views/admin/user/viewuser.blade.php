@extends('layouts.app')
@section('content')
    @if ($message = Session::get('Success'))
        <div class="alert alert-success" id="successMessage">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container-fluid p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h2 class="text-white">VIEW AGENTS</h2>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                @if (Auth::user()->usertype == 'admin')
                    <span style="float:right; padding-left:44px"><a href="{{ route('admin.user.adduser') }}" class="btn"
                            style="background-color: #e3f2fd">Add Agent</a></span>
                    <span style="float:right"><a href="{{ route('admin.trash.index') }}" class="btn ms-2"
                            style="background-color: #e3f2fd">Go To Trash</a></span>
                @endif
            </div>
        </div>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Agent Code</th>
                    <th>Agent Name</th>
                    <th>Mobile</th>
                    <th>Alternate Mobile</th>
                    <th>Email</th>
                    <th>Documnet Type</th>
                    <th>Documnet Number</th>
                    <th>Address</th>
                    {{-- <th>usertype</th> --}}
                    @if (Auth::user()->usertype == 'admin')
                        <th>action</th>
                    @endif
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->agentcode }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->mobile }}</td>
                        <td>{{ $item->alternatemobile }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->doctype }}</td>
                        <td>{{ $item->docnumber }}</td>
                        <td>{{ $item->address }}</td>
                        {{-- <td>{{ $item->usertype }}</td> --}}
                        @if (Auth::user()->usertype == 'admin')
                            <td>
                                <div class="d-flex gap-2">
                                    <div>
                                        <a href="{{ route('admin.user.edituser', $item->id) }}"
                                            class="btn btn-primary shadow-none mb-2 ">Edit</a>
                                    </div>
                                    <div>
                                        <button class="delete-user btn btn-danger shadow-none"
                                            data-id="{{ $item->id }}">Delete</button>
                                    </div>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        const deleteButtons = document.querySelectorAll('.delete-user');

        deleteButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                const userId = e.target.getAttribute('data-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning', //question , error , warning , success , info

                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to a route that handles user deletion
                        window.location.href = `/users/delete/${userId}`;
                    }
                });
            });
        });
    </script>
@endsection
