<!-- login.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <style>
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      background-color: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: Arial, sans-serif;
    }
    .login-container {
      background-color: white;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }
    .login-container h2 {
      text-align: center;
      margin-bottom: 24px;
    }
    .form-group {
      margin-bottom: 16px;
    }
    .form-group label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
    }
    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    .form-group button {
      width: 100%;
      padding: 12px;
      background-color: #007bff;
      border: none;
      color: white;
      font-weight: bold;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    .form-group button:hover {
      background-color: #0056b3;
    }
    .register-link {
      margin-top: 16px;
      text-align: center;
    }
    .register-link a {
      color: #007bff;
      text-decoration: none;
      font-weight: bold;
    }
    .register-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <form action="/login" method="POST">
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required placeholder="Digite seu e-mail" />
      </div>
      <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" required placeholder="Digite sua senha" />
      </div>
      <div class="form-group">
        <button type="submit">Entrar</button>
      </div>
    </form>
    <div class="register-link">
      <p>Não tem uma conta? <a href="/cadastro">Cadastrar</a></p>
    </div>
  </div>
</body>
</html>
