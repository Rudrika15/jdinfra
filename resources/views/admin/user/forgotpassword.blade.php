 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

 <div class="container mt-3  p-5">
     @if (session('status'))
         <h5 class="alert alert-success mb-2">{{ session('status') }}</h5>
     @endif

     <form method="POST" action="{{ route('password.email') }}">
         @csrf

         <div class="form-group row">
             {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Addres') }}</label> --}}
             <label for="email"> Enter E-mail Address</label>
             <div class="col-md-6 mt-2">
                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                     name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                 @error('email')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
             </div>
         </div>

         <div class="form-group row mt-5">
             <div class="col-md-6 ">
                 <button type="submit" class="btn btn-primary shadow-none">
                     {{ __('Send Password Reset Link') }}
                 </button>
             </div>
         </div>
     </form>
 </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
 </script>
