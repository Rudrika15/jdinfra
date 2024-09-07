 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <div class="container mt-3 p-5 ">
     @if (session('status'))
         <h5 class="alert alert-success mb-2">{{ session('status') }}</h5>
     @endif
     <form action="{{ route('password.update') }}" method="POST">
         @csrf
         <input type="hidden" name="token" value="{{ $token }}">
         <input type="hidden" name="email" value="{{ $email }}">
         <div class="form-group row">
             <div class="col-md-6 mt-2">
                 <label for="password">Enter New Password</label>
                 <input type="text" class="form-control @error('password') is-invalid @enderror mb-3"
                     name="password">
                 <span class="text-danger">
                     @error('password')
                         <strong>{{ $message }}</strong>
                     @enderror
                 </span>
             </div>
         </div>
         <div class="row">
             <div class="col-md-6 mt-2">
                 <label for="password_confirmation">Re-Enter New Password</label>
                 <input type="text" class="form-control @error('password_confirmation') is-invalid @enderror mb-3"
                     name="password_confirmation">
                 <span class="text-danger">
                     @error('password_confirmation')
                         <strong>{{ $message }}</strong>
                     @enderror
                 </span>
             </div>
         </div>
         <button class="btn btn-primary shadow-none" type="submit">Reset Password</button>

     </form>
 </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
 </script>
