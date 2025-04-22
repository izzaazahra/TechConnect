<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - TechConnect</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f3f4f6;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #111827;
            color: white;
            position: fixed;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            padding: 20px 0 !important;
            border-bottom: 1px solid #374151 !important;
            margin-bottom: 20px !important;
        }


        .sidebar-menu {
            list-style: none;
            flex-grow: 1;
        }

        .sidebar-menu li {
            margin-bottom: 10px;
        }

        .sidebar-menu a {
            color: #d1d5db;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .sidebar-menu a:hover {
            background-color: #374151;
            color: white;
        }

        .sidebar-menu a.active {
            background-color: #1d4ed8;
            color: white;
        }

        .sidebar-footer {
            padding-top: 20px;
            border-top: 1px solid #374151;
        }

        .logout-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #dc2626;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background-color: #b91c1c;
        }

        .main-content {
            margin-left: 250px;
            padding: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e5e7eb;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #d1d5db;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #111827;
            font-weight: bold;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            color: #6b7280;
            font-size: 1rem;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 2rem;
            font-weight: bold;
            color: #111827;
        }

        .bg-primary {
            background-color: #1955d6;
        }

        .bg-secondary {
            background-color: #111827;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>TechConnect</h2>
            <p>Admin Panel</p>
        </div>
        <ul class="sidebar-menu">
            <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a></li>
            <li><a href="{{ route('admin.users') }}" class="{{ request()->routeIs('admin.users*') ? 'active' : '' }}">Users</a></li>
            <li><a href="{{ route('admin.courses') }}" class="{{ request()->routeIs('admin.courses*') ? 'active' : '' }}">Courses</a></li>
        </ul>
        <div class="sidebar-footer">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>

    <div class="main-content">
        @yield('content')
    </div>
</body>
</html>
