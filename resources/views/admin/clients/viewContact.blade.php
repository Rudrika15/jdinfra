@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" id="successMessage">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container-fluid  p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                @if (count($Contact) > 0)
                    <h2 class="text-white">VIEW CONTACT</h2>
                @else
                    <h2 class="text-white">THERE ARE CONTACTS</h2>
                @endif
            </div>
            @if (count($Contact) > 0)
                <div class="col-lg-6 d-flex justify-content-end align-items-center">
                    <a href="{{ route('contact.trash', request()->route('projectid')) }}" class="btn me-2"
                        style="background-color: #e3f2fd">Go To Trash</a>
                </div>
            @endif
        </div>
        @if (count($Contact) > 0)
            <table class="table table-bordered  text-center">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Message</th>
                        <th>Date</th>
                        @if (Auth::user()->usertype == 'admin')
                            <th>Delete</th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        @foreach ($Contact as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->mobile }}</td>
                        <td>{{ $item->message }}</td>
                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                        @if (Auth::user()->usertype == 'admin')
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <div>
                                        <button class="delete-contact btn btn-danger shadow-none "
                                            data-id="{{ $item->id }}">Delete</button>
                                    </div>
                                </div>
                            </td>
                        @endif
                    </tr>
        @endforeach
        </tr>
        </tbody>
        </table>
        @endif

        <script>
            const deleteButtons = document.querySelectorAll('.delete-contact');

            deleteButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    const ContactId = e.target.getAttribute('data-id');

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
                            window.location.href = `/contact/delete/${ContactId}`;
                        }
                    });
                });
            });
        </script>
    @endsection
