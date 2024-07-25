<!DOCTYPE html>
<html>
<head>
    <title>New Contract Created</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #4CAF50;
            color: #ffffff;
            padding: 10px 0;
            text-align: center;
        }
        .content {
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            color: #888888;
            font-size: 12px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Contract Created</h1>
        </div>
        <div class="content">
            <p>Dear {{ $contract->user->name }},</p>
            <p>A new contract has been created for you with the following details:</p>
            <ul>
                <li>Organization: {{ $contract->organization->name }}</li>
                <li>Details: {{ $contract->contract_details }}</li>
            </ul>
            <p>Thank you!</p>
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} Our Service. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
