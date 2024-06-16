<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <style>
    /* Basic styles */
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .container {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      padding: 20px;
      width: 300px;
      max-width: 100%;
    }
    .login-form {
      margin-top: 20px;
    }
    .login-form h2 {
      font-size: 1.5rem;
      margin-bottom: 15px;
      text-align: center;
    }
    .form-control {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    .form-control:focus {
      outline: none;
      border-color: #007bff;
      box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
    }
    .text-danger {
      color: #dc3545;
      font-size: 14px;
      display: block;
      margin-top: -10px;
      margin-bottom: 10px;
    }
    .text-success {
      color: #28a745;
      font-size: 14px;
      display: block;
      margin-top: 10px;
      margin-bottom: 10px;
    }
    .alert {
      padding: 10px;
      background-color: #f8d7da;
      border: 1px solid #f5c6cb;
      color: #721c24;
      border-radius: 4px;
      font-size: 14px;
      margin-bottom: 15px;
    }
    .alert-info {
      background-color: #d1ecf1;
      border-color: #bee5eb;
      color: #0c5460;
    }
    .btn-submit {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
    }
    .btn-submit:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>
  <div class="container">
    @if($errors->any())
    <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
      @endforeach
    </div>
    @endif
    
    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif
    
    <div class="login-form">
      <h2>Login</h2>
      <form action="{{ route('sample.validate_login') }}" method="post">
        @csrf
        <p>
          <input type="text" name="email" class="form-control" placeholder="Email" />
          @error('email')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </p>
        <p>
          <input type="password" name="password" class="form-control" placeholder="Password" />
          @error('password')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </p>
        <p>
          <input type="submit" value="Login" class="btn-submit" />
        </p>
      </form>
    </div>
  </div>
</body>
</html>
