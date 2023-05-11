<x-layout>
    <div class="container py-md-5">
        <form method="POST" action="/register">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" value="{{old('username')}}" class="form-control" id="username" name="username">
                @error('username')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" value="{{old('email')}}" class="form-control" id="email" name="email">
              @error('email')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password">
              @error('password')
              <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                @error('password_confirmation')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <br>
          <p>Already have an account login here <a href="/login-page">Login</a></p>
        </div>
  </x-layout>