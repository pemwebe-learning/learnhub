<!DOCTYPE html>
<html>
<head>
    <title>Login Guru</title>
    <style>
        /* ===== General Layout ===== */
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            font-family: "Poppins", sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background: radial-gradient(circle at top left, #00313a, #000000 80%);
            background-attachment: fixed;
            color: #e0e0e0;
            overflow: hidden;
            animation: fadeInBody 1s ease-in-out;
        }

        @keyframes fadeInBody {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* ===== Card ===== */
        .card {
            background: rgba(20, 20, 20, 0.92);
            backdrop-filter: blur(8px);
            padding: 40px 45px;
            width: 360px;
            border-radius: 14px;
            box-shadow: 0 0 25px rgba(0, 255, 204, 0.25), 0 0 40px rgba(0, 255, 255, 0.07);
            animation: fadeInCard 1.2s ease;
        }

        @keyframes fadeInCard {
            0% {
                transform: translateY(40px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* ===== Title ===== */
        h4 {
            text-align: center;
            color: #00f7ff;
            font-weight: 600;
            font-size: 1.6em;
            margin-bottom: 25px;
            text-shadow: 0 0 8px rgba(0, 255, 255, 0.5);
            animation: fadeInTitle 1.5s ease;
        }

        @keyframes fadeInTitle {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        /* ===== Form Elements ===== */
        label {
            display: block;
            color: #bdbdbd;
            font-size: 0.95em;
            margin-bottom: 6px;
            animation: fadeInItem 1.6s ease;
        }

        input {
            width: 100%;
            padding: 11px;
            margin-bottom: 18px;
            border: none;
            border-radius: 6px;
            background-color: rgba(255, 255, 255, 0.1);
            color: #e0e0e0;
            font-size: 0.95em;
            outline: none;
            transition: 0.3s;
            animation: fadeInItem 1.6s ease;
        }

        input:focus {
            background-color: rgba(0, 255, 255, 0.08);
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
        }

        /* ===== Button Container ===== */
        .btn-container {
            display: flex;
            justify-content: center;
            animation: fadeInItem 1.8s ease;
        }

        /* ===== Button ===== */
        .btn {
            width: 70%;
            padding: 10px;
            border: none;
            border-radius: 6px;
            background: linear-gradient(90deg, #00e0ff, #00ffc3);
            color: #000;
            font-weight: bold;
            font-size: 1em;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 0 10px rgba(0, 255, 204, 0.3);
            text-align: center;
            animation: pulseGlow 3s ease-in-out infinite;
        }

        .btn:hover {
            box-shadow: 0 0 20px rgba(0, 255, 204, 0.7);
            transform: scale(1.07);
        }

        /* ===== Breathing Glow Animation ===== */
        @keyframes pulseGlow {
            0% {
                box-shadow: 0 0 8px rgba(0, 255, 204, 0.3), 0 0 20px rgba(0, 255, 255, 0.1);
            }
            50% {
                box-shadow: 0 0 16px rgba(0, 255, 204, 0.6), 0 0 30px rgba(0, 255, 255, 0.3);
            }
            100% {
                box-shadow: 0 0 8px rgba(0, 255, 204, 0.3), 0 0 20px rgba(0, 255, 255, 0.1);
            }
        }

        /* ===== Alerts ===== */
        .alert {
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 0.9em;
            animation: fadeInItem 1.5s ease;
        }

        .alert-danger {
            background-color: rgba(255, 76, 76, 0.1);
            border: 1px solid rgba(255, 76, 76, 0.4);
            color: #ff6b6b;
        }

        .alert-success {
            background-color: rgba(0, 255, 195, 0.1);
            border: 1px solid rgba(0, 255, 195, 0.4);
            color: #00ffc3;
        }

        ul {
            padding-left: 20px;
            margin: 0;
        }

        /* ===== Fade-in for elements ===== */
        @keyframes fadeInItem {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ===== Responsive ===== */
        @media (max-width: 480px) {
            .card {
                width: 90%;
                padding: 30px;
            }

            .btn {
                width: 80%;
            }
        }
    </style>
</head>
<body>

<div class="card">
    <h4>Login guru</h4>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif ?>

    <?php if (session()->has('errors')): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach (session('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>

    <form action="<?= base_url('proses_login_guru') ?>" method="post">
        <?= csrf_field() ?>

        <label>Email</label>
        <input type="email" name="email" value="<?= old('email') ?>" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <div class="btn-container">
            <button class="btn">Login</button>
        </div>
    </form>
</div>

</body>
</html>
