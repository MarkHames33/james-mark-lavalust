<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f4f5f7;
            padding: 40px 20px;
            color: #1f2933;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        h1 {
            padding: 24px 24px 0 24px;
            font-size: 1.5rem;
        }
        p.subtitle {
            padding: 4px 24px 20px 24px;
            color: #616e7c;
            font-size: 0.9rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        thead {
            background: #1f2933;
            color: #fff;
        }
        th, td {
            padding: 12px 16px;
            text-align: left;
            font-size: 0.95rem;
        }
        tbody tr:nth-child(even) {
            background: #f8f9fa;
        }
        tbody tr:hover {
            background: #eef2ff;
        }
        tbody td {
            border-bottom: 1px solid #e4e7eb;
        }
        .empty {
            padding: 24px;
            text-align: center;
            color: #616e7c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Users</h1>
        <p class="subtitle">Records retrieved from the <code>users</code> table via UsersModel::all()</p>

        <?php if (!empty($users)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['id']) ?></td>
                    <td><?= htmlspecialchars($user['firstname']) ?></td>
                    <td><?= htmlspecialchars($user['lastname']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['username']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p class="empty">No users found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
