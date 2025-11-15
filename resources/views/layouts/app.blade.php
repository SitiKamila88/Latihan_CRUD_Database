<!DOCTYPE html>
<html>
<head>
    <title>CRUD Daftar Pacarku</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Style -->
    <style>
        body {
            background: #e8f0ffff;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar-custom {
    background: linear-gradient(90deg, #030a42ff, #361270ff, #5c6bc0);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.navbar-custom .navbar-brand {
    color: #ffffff;
    font-weight: 700;
    font-size: 20px;
    letter-spacing: 0.5px;
}

.navbar-custom .navbar-brand:hover {
    color: #e0e7ff;
}

        .card-custom {
            border: none;
            border-radius: 12px;
            padding: 20px;
            background: white;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.08);
        }

        h2.title {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        /* Optional: biar alert lebih halus */
        .alert {
            border-radius: 10px;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="{{ route('pacar.index') }}">
            CRUD Daftar Pacarku
        </a>
    </div>
</nav>

<div class="container mt-4">

    <!-- Alert -->
    @if(session('success'))
        <div id="alertMessage" class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(() => {
                const alertBox = document.getElementById('alertMessage');
                if (alertBox) {
                    alertBox.classList.remove('show');
                    alertBox.classList.add('fade');
                    setTimeout(() => alertBox.remove(), 500);
                }
            }, 2000);
        </script>
    @endif

    <!-- CONTENT WRAPPER -->
    <div class="card card-custom">
        @yield('content')
    </div>

</div>

</body>
</html>
