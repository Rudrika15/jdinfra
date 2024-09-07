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
                <h2 class="text-white">
                    @if (count($Contact) > 0)
                        TRASH DATA OF CONTACT
                    @else
                        There are no Contact
                    @endif
                </h2>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float:right;"><a href="{{ route('viewcontact', request()->route('projectid')) }}" class="btn"
                        style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>
        @if (count($Contact) !== 0)
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
                                        <a onclick="return confirm('do you want to restore it')"
                                            href="{{ route('restore', $item->id) }}"
                                            class="btn btn-primary shadow-none btn text-nowrap">Restore</a>
                                        <a href="{{ route('contact.destroy', $item->id) }}"
                                            class="delete-contact btn btn-danger shadow-none "
                                            onclick="return confirm('Do You Want To Delete It')">Delete</a>
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
        {{-- <script>
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
                        confirmButtonText: 'Yes,permanently delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect to a route that handles user deletion
                            window.location.href = `/contact/delete/${ContactId}`;
                        }
                    });
                });
            });
        </script> --}}
    @endsection
