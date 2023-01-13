 <div class="login-card">

     <form autocomplete="off" wire:submit.prevent="doLogin" class="theme-form login-form">
         @csrf
         <h4>Login</h4>
         <h6>Welcome back! Log in to your account.</h6>
         @if (Session::has('error'))
             <div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error !</strong>
                 {{ Session::get('error') }}
                 <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"
                     data-bs-original-title="" title=""></button>
             </div>
         @endif
         <div class="form-group">
             <label>Email Address</label>
             <div class="input-group">
                 <span class="input-group-text">
                     <i class="fas fa-envelope"></i>
                 </span>
                 <input wire:model.defer="email" class="form-control @error('email') is-invalid @enderror"
                     type="email" placeholder="someone@gmail.com">
             </div>
             @error('email')
                 <div class="invalid-feedback">
                     {{ $message }}
                 </div>
             @enderror
         </div>
         <div class="form-group">
             <label>Password</label>
             <div class="input-group">
                 <span class="input-group-text">
                     <i class="fas fa-lock"></i>
                 </span>
                 <input wire:model.defer="password" class="form-control @error('password') is-invalid @enderror"
                     type="password" name="login[password]" placeholder="*********">
                 <div class="show-hide">
                     <span class="show"> </span>
                 </div>
             </div>
             @error('password')
                 <div class="invalid-feedback">
                     {{ $message }}
                 </div>
             @enderror
         </div>

         <div class="form-group">
             <button class="btn btn-primary" type="submit">
                 Sign in
             </button>
         </div>

     </form>
 </div>
