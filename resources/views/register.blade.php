<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ env('APP_NAME') }} - Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <section class="vh-100" style="background-color: #f5f5f5;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-lg" style="border-radius: 1rem;">
            <div class="card-body p-5">

              <h3 class="text-center mb-4">Register</h3>

              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="form-outline mb-3">
                  <label class="form-label" for="name">Name</label>
                  <input type="text" id="name" name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" required autofocus>
                  @error('name')
                    <span class="text-danger small">{{ $message }}</span>
                  @enderror
                </div>

                <!-- Email -->
                <div class="form-outline mb-3">
                  <label class="form-label" for="email">Email</label>
                  <input type="email" id="email" name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" required>
                  @error('email')
                    <span class="text-danger small">{{ $message }}</span>
                  @enderror
                </div>

                <!-- Phone -->
                <div class="form-outline mb-3">
                  <label class="form-label" for="phone">Mobile No.</label>
                  <input type="text" id="phone" name="phone"
                    class="form-control @error('phone') is-invalid @enderror"
                    value="{{ old('phone') }}" required maxlength="10">
                  @error('phone')
                    <span class="text-danger small">{{ $message }}</span>
                  @enderror
                </div>

                <!-- Password -->
                <div class="form-outline mb-3">
                  <label class="form-label" for="password">Password</label>
                  <input type="password" id="password" name="password"
                    class="form-control @error('password') is-invalid @enderror" required>
                  @error('password')
                    <span class="text-danger small">{{ $message }}</span>
                  @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-outline mb-3">
                  <label class="form-label" for="password_confirmation">Confirm Password</label>
                  <input type="password" id="password_confirmation" name="password_confirmation"
                    class="form-control" required>
                </div>

                <!-- Submit -->
                <div class="d-grid mb-3">
                  <button type="submit" class="btn btn-primary btn-lg">Register</button>
                </div>

                <p class="text-center small">
                  Already have an account? <a href="{{ route('login') }}">Login here</a>
                </p>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
