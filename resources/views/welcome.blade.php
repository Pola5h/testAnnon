<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test Project For AnnonLab</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        .api-routes {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .route {
            margin: 10px 0;
        }
        .route-title {
            font-weight: bold;
            margin-bottom: 10px;
            color: #007bff;
        }
        .route-detail {
            margin-left: 20px;
            color: #555;
        }
        .route-title strong,
        .route-detail strong {
            color: #007bff;
        }
    </style>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="container">
        <div class="api-routes">
            <div class="route">
                <div class="route-title"><strong>Users API:</strong></div>
                <div class="route-detail"><strong>Index:</strong> GET http://localhost:8000/api/users</div>
                <div class="route-detail"><strong>Store:</strong> POST http://localhost:8000/api/users</div>
                <div class="route-detail"><strong>Show:</strong> GET http://localhost:8000/api/users/{id}</div>
                <div class="route-detail"><strong>Update:</strong> PUT/PATCH http://localhost:8000/api/users/{id}</div>
                <div class="route-detail"><strong>Destroy:</strong> DELETE http://localhost:8000/api/users/{id}</div>
            </div>
            <div class="route">
                <div class="route-title"><strong>Organizations API:</strong></div>
                <div class="route-detail"><strong>Index:</strong> GET http://localhost:8000/api/organizations</div>
                <div class="route-detail"><strong>Store:</strong> POST http://localhost:8000/api/organizations</div>
                <div class="route-detail"><strong>Show:</strong> GET http://localhost:8000/api/organizations/{id}</div>
                <div class="route-detail"><strong>Update:</strong> PUT/PATCH http://localhost:8000/api/organizations/{id}</div>
                <div class="route-detail"><strong>Destroy:</strong> DELETE http://localhost:8000/api/organizations/{id}</div>
            </div>
            <div class="route">
                <div class="route-title"><strong>Contracts API:</strong></div>
                <div class="route-detail"><strong>Index:</strong> GET http://localhost:8000/api/contracts</div>
                <div class="route-detail"><strong>Store:</strong> POST http://localhost:8000/api/contracts</div>
                <div class="route-detail"><strong>Show:</strong> GET http://localhost:8000/api/contracts/{id}</div>
                <div class="route-detail"><strong>Update:</strong> PUT/PATCH http://localhost:8000/api/contracts/{id}</div>
                <div class="route-detail"><strong>Destroy:</strong> DELETE http://localhost:8000/api/contracts/{id}</div>
            </div>
        </div>
    </div>
</body>
</html>
