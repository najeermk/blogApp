<x-layout>
    <div class="container py-md-5">
    <form method="POST" action="/login">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <br>
      <p>Not registered yet sign up here <a href="/register-page">Register</a></p>
    </div>
</x-layout>