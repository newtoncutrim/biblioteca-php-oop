<!-- cadastro.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cadastro</title>
  <style>
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
    .form-container {
      background-color: white;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }
    h2 {
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
    .form-group input,
    .form-group select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    .form-group button {
      width: 100%;
      padding: 12px;
      background-color: #28a745;
      border: none;
      color: white;
      font-weight: bold;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    .form-group button:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Cadastro</h2>
    <form action="/cadastro" method="POST">
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" required placeholder="Digite seu nome completo" />
      </div>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required placeholder="Digite seu e-mail" />
      </div>
      <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" required placeholder="Crie uma senha segura" />
      </div>
      <div class="form-group">
        <label for="tipo">Tipo</label>
        <select id="tipo" name="tipo" required>
          <option value="">Selecione</option>
          <option value="aluno">Aluno</option>
          <option value="professor">Professor</option>
        </select>
      </div>
      <div class="form-group">
        <button type="submit">Cadastrar</button>
      </div>
    </form>
  </div>
</body>
</html>
