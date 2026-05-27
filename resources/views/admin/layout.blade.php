<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f5f5;
        }

        .sidebar{
            min-height:100vh;
            background:#6a3013;
            color:white;
        }

        .sidebar a{
            color:white;
            text-decoration:none;
            display:block;
            padding:12px 15px;
            border-radius:8px;
            margin-bottom:5px;
        }

        .sidebar button.nav-like{
            width:100%;
            text-align:left;
            background:transparent;
            border:none;
            color:white;
            padding:12px 15px;
            border-radius:8px;
            margin-bottom:5px;
        }

        .sidebar button.nav-like:hover{
            background:rgba(255,255,255,0.1);
        }

        .sidebar a:hover{
            background:rgba(255,255,255,0.1);
        }

        .content{
            padding:25px;
        }

        .stat-card{
            padding:20px;
            border-radius:12px;
            color:white;
        }

        .brown{
            background:#6a3013;
        }

        .gold{
            background:#b8860b;
        }

        .dark{
            background:#343a40;
        }

        .badge-unread{
            background:red;
            color:white;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-2 sidebar p-3">

            <h4 class="mb-4">Admin</h4>

            <a href="{{ route('admin.dashboard') }}">
                Dashboard
            </a>

            <a href="{{ route('admin.products.index') }}">
                Products
            </a>

            <a href="{{ route('admin.testimonials.index') }}">
                Testimonials
            </a>

            <a href="{{ route('admin.messages.index') }}">
                Messages
            </a>

                <a href="{{ route('admin.banners.index') }}" class="nav-link">
                    Banners
                </a>

            <form action="{{ route('logout') }}" method="POST" class="mb-0">
                @csrf
                <button type="submit" class="nav-like">Logout</button>
            </form>

        </div>

        <!-- Main Content -->
        <div class="col-md-10 content">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('admin-content')

        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>