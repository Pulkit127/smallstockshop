<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Small Shop Retail</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

  <section class="vh-100" style="background-color: #f5f5f5;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-lg" style="border-radius: 1rem;">
            <div class="card-body p-5">

              <h3 class="text-center mb-4">Login to Your Account</h3>

              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- phone input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="phone">Mobile No.</label>
                  <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror"
                    required autofocus maxlength="10">
                  @error('phone')
                    <span class="text-danger small">{{ $message }}</span>
                  @enderror
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="password">Password</label>
                  <input type="password" id="password" name="password"
                    class="form-control @error('password') is-invalid @enderror" required>
                  @error('password')
                    <span class="text-danger small">{{ $message }}</span>
                  @enderror
                </div>

                <!-- Submit button -->
                <div class="d-grid mb-4">
                  <button type="submit" class="btn btn-primary btn-lg">
                    Login
                  </button>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>