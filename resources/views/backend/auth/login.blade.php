<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Requin BD</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: #0f0f0f;
      color: #fff;
      min-height: 100vh;
      overflow: hidden;
    }

    section {
      position: absolute;
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 2px;
      flex-wrap: wrap;
      overflow: hidden;
      background: #111;
    }

    section::before {
      content: '';
      position: absolute;
      width: 100%;
      height: 100%;
      background: repeating-linear-gradient(
        0deg, #0f0f0f 0 1px, transparent 1px 40px
      ), repeating-linear-gradient(
        90deg, #0f0f0f 0 1px, transparent 1px 40px
      );
      z-index: 0;
    }

    .signin {
      position: relative;
      z-index: 1;
      background: #1c1c1c;
      padding: 40px 30px;
      border-radius: 8px;
      box-shadow: 0 0 25px #e56a2e;
      width: 320px;
    }

    .content h2 {
      text-align: center;
      color: #e56a2e;
      margin-bottom: 20px;
    }

    .form .inputBox {
      position: relative;
      margin: 20px 0;
    }

    .form .inputBox input {
      width: 100%;
      padding: 10px;
      background: #222;
      border: none;
      outline: none;
      color: #fff;
      font-size: 16px;
      border-radius: 4px;
    }

    .form .inputBox i {
      position: absolute;
      left: 10px;
      top: 50%;
      transform: translateY(-50%);
      font-style: normal;
      color: #aaa;
      pointer-events: none;
      transition: 0.3s;
    }

    .form .inputBox input:focus + i,
    .form .inputBox input:valid + i {
      top: -10px;
      left: 5px;
      font-size: 12px;
      color: #e56a2e;
    }

    .links {
      display: flex;
      justify-content: space-between;
      margin: 10px 0 20px;
    }

    .links a {
      color: #e56a2e;
      text-decoration: none;
      font-size: 14px;
      transition: 0.3s;
    }

    .links a:hover {
      text-decoration: underline;
    }

    .form .inputBox input[type="submit"] {
      background: #e56a2e;
      color: #ffffff;
      cursor: pointer;
      font-weight: bold;
      transition: 0.3s;
    }

    .form .inputBox input[type="submit"]:hover {
      background: #e56a2e;
    }

    .alert {
      background: #e56a2e;
      padding: 10px;
      border-radius: 5px;
      margin-bottom: 15px;
      color: #ffffff;
      text-align: center;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <section>
    <div class="signin">
      <div class="content">
        <h2>Login</h2>

        @if ($errors->any())
          <div class="alert">
            {{ $errors->first() }}
          </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}" class="form">
          @csrf
          <div class="inputBox">
            <input type="email" name="email" required>
            <i>Email</i>
          </div>
          <div class="inputBox">
            <input type="password" name="password" required>
            <i>Password</i>
          </div>
          <div class="links">
            <a href="#" hidden>Forgot Password</a>
            <a href="#" hidden>Signup</a>
          </div>
          <div class="inputBox">
            <input type="submit" value="Login">
          </div>
        </form>
      </div>
    </div>
  </section>
</body>
</html>
