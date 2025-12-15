<!DOCTYPE html>
<html>

<head>
    <title>Login Admin</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #3498db, #3498db);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Card Login */
        form {
            background: #ffffff;
            padding: 30px 35px;
            width: 330px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: 700;
            color: #333;
        }

        /* Label */
        label {
            font-weight: 600;
            margin-top: 10px;
            color: #555;
        }

        /* Input */
        input[type="email"],
        input[type="password"] {
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
            transition: 0.3s ease;
        }

        input:focus {
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(255, 152, 0, 0.5);
            outline: none;
        }

        /* Tombol Login */
        button {
            margin-top: 20px;
            padding: 10px;
            border-radius: 6px;
            border: none;
            background-color: #3498db;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            background-color: #3498db;
            transform: translateY(-2px);
        }

        /* Error Message */
        p {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
</head>

<body>
     <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf
        <h2>Login Admin</h2>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>

        @if ($errors->any())
            <p style="color:red">{{ $errors->first() }}</p>
        @endif
    </form>

</body>

</html>
