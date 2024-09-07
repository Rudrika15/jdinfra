@extends('layouts.app')
@section('content')
<div class="container">
    @if ($message = Session::get('Success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="py-3 ">
            <span>View Client</span>
            
            <span style="float:right; padding-left:44px"><a href="{{route('admin.user.addclient')}}" class="btn btn-primary">Add Client</a></span> 
            
            {{-- <span style="float:right"><a href="{{route('admin.dashboard')}}" class="btn btn-primary">Back</a></span> --}}
            
    </div>
    <br>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Alternate Mobile</th>
                <th>Id Proof</th>
                <th>Id Number</th>
                <th>Address</th>
                <th>City</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <tr>
            @foreach ($clients as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->mobile}}</td>
                    <td>{{$item->alternatemobile}}</td>
                    <td>{{$item->doctype}}</td>
                    <td>{{$item->docnumber}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->city}}</td>
                    
                    <td>
                        <div class="d-flex gap-2 justify-content-center">
                            <div>
                                <a href="{{route('admin.user.editclient',$item->id)}}" class="btn btn-primary mb-2 ">Edit</a>                                                    
                            </div>
                            <div>
                                <button class="delete-client btn btn-danger" data-id="{{ $item->id }}">Delete</button>                                             
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tr>
        </tbody>   
    </table>
</div>
<script>
    const deleteButtons = document.querySelectorAll('.delete-client');

    deleteButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const ClientId = e.target.getAttribute('data-id');

            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning' ,//question , error , warning , success , info
                
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to a route that handles user deletion
                    window.location.href = `/admin/client/delete/${ClientId}`;
                }
            });
        });
    });
</script>
@endsection 