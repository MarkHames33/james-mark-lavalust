<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!--
    Save this file as: app/views/users_view.php
    Winter-themed redesign — frosted glass, ice-blue palette, drifting snow.
-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Users — Winter Roster</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600&family=Work+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  :root{
    --frost-deep:   #0e2a43;
    --frost-mid:    #2f6690;
    --frost-ice:    #6fb3d9;
    --frost-pale:   #dcf0fb;
    --frost-glow:   #f4fbff;
    --snow:         #ffffff;
    --ink:          #12283c;
    --ink-soft:     #4d6a82;
    --line:         #c9e5f5;
  }

  * { box-sizing: border-box; }

  html, body {
    margin: 0;
    min-height: 100vh;
  }

  body {
    font-family: 'Work Sans', sans-serif;
    color: var(--ink);
    background:
      radial-gradient(ellipse 900px 500px at 15% -10%, #ffffff 0%, transparent 60%),
      radial-gradient(ellipse 700px 500px at 110% 10%, #ffffff 0%, transparent 55%),
      linear-gradient(180deg, #eaf6ff 0%, #cfe9f7 45%, #b9dcf0 100%);
    padding: 64px 24px 96px;
    position: relative;
    overflow-x: hidden;
  }

  /* -- drifting snow, sparse and slow -- */
  .snow {
    position: fixed;
    top: -10px;
    border-radius: 50%;
    background: var(--snow);
    opacity: 0.75;
    pointer-events: none;
    animation: fall linear infinite;
  }
  @keyframes fall {
    to { transform: translateY(110vh); }
  }
  @media (prefers-reduced-motion: reduce) {
    .snow { animation: none; display: none; }
  }

  .page {
    max-width: 880px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
  }

  .masthead {
    display: flex;
    align-items: baseline;
    gap: 18px;
    margin-bottom: 8px;
  }

  .flake-mark {
    width: 34px;
    height: 34px;
    flex-shrink: 0;
    color: var(--frost-mid);
  }

  h1 {
    font-family: 'Fraunces', serif;
    font-weight: 500;
    font-optical-sizing: auto;
    font-size: clamp(2.4rem, 5vw, 3.4rem);
    letter-spacing: -0.01em;
    margin: 0;
    color: var(--frost-deep);
  }

  .sub {
    margin: 6px 0 40px 52px;
    color: var(--ink-soft);
    font-size: 1rem;
    max-width: 46ch;
  }

  .divider {
    height: 2px;
    margin: 0 0 40px 52px;
    background: linear-gradient(90deg, var(--frost-ice), transparent);
    border: none;
  }

  /* -- frosted glass card housing the table -- */
  .card {
    background: rgba(255, 255, 255, 0.62);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border: 1px solid rgba(255, 255, 255, 0.9);
    border-radius: 18px;
    box-shadow:
      0 30px 60px -30px rgba(14, 42, 67, 0.35),
      inset 0 1px 0 rgba(255, 255, 255, 0.8);
    overflow: hidden;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  thead th {
    text-align: left;
    font-family: 'Work Sans', sans-serif;
    font-weight: 600;
    font-size: 0.86rem;
    letter-spacing: 0.01em;
    color: var(--frost-glow);
    background: linear-gradient(180deg, var(--frost-mid), var(--frost-deep));
    padding: 16px 22px;
  }

  thead th:first-child { border-top-left-radius: 18px; }
  thead th:last-child  { border-top-right-radius: 18px; }

  tbody td {
    padding: 15px 22px;
    font-size: 0.96rem;
    color: var(--ink);
    border-bottom: 1px solid var(--line);
  }

  tbody tr:last-child td { border-bottom: none; }

  tbody tr:nth-child(even) {
    background: rgba(220, 240, 251, 0.5);
  }

  tbody tr {
    transition: background 0.2s ease;
  }

  tbody tr:hover {
    background: rgba(111, 179, 217, 0.18);
  }

  td:first-child {
    color: var(--frost-mid);
    font-variant-numeric: tabular-nums;
    width: 60px;
  }

  .empty-row td {
    text-align: center;
    padding: 40px 20px;
    color: var(--ink-soft);
    font-style: italic;
  }

  footer.note {
    margin: 28px 4px 0 52px;
    font-size: 0.82rem;
    color: var(--ink-soft);
  }

  @media (max-width: 640px) {
    .sub, .divider, footer.note { margin-left: 0; }
    thead th, tbody td { padding: 12px 14px; font-size: 0.88rem; }
  }
</style>
</head>
<body>

  <!-- sparse drifting snow -->
  <div class="snow" style="left:8%;  width:6px;  height:6px;  animation-duration:14s; animation-delay:0s;"></div>
  <div class="snow" style="left:22%; width:4px;  height:4px;  animation-duration:11s; animation-delay:2s;"></div>
  <div class="snow" style="left:38%; width:7px;  height:7px;  animation-duration:16s; animation-delay:1s;"></div>
  <div class="snow" style="left:55%; width:5px;  height:5px;  animation-duration:13s; animation-delay:4s;"></div>
  <div class="snow" style="left:70%; width:4px;  height:4px;  animation-duration:12s; animation-delay:3s;"></div>
  <div class="snow" style="left:84%; width:6px;  height:6px;  animation-duration:15s; animation-delay:5s;"></div>
  <div class="snow" style="left:93%; width:3px;  height:3px;  animation-duration:10s; animation-delay:1.5s;"></div>

  <div class="page">
    <div class="masthead">
      <svg class="flake-mark" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round">
        <path d="M12 2v20M4 7l16 10M20 7L4 17M8 3.5 12 7l4-3.5M8 20.5 12 17l4 3.5M2.5 9 6 12l-3.5 3M21.5 9 18 12l3.5 3"/>
      </svg>
      <h1>Users</h1>
    </div>
    <p class="sub">Everyone currently registered, pulled live from the database.</p>
    <hr class="divider">

    <div class="card">
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
          <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
              <tr>
                <td><?= htmlspecialchars($user['id']) ?></td>
                <td><?= htmlspecialchars($user['firstname']) ?></td>
                <td><?= htmlspecialchars($user['lastname']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['username']) ?></td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr class="empty-row">
              <td colspan="5">No users yet — add a record to see it here.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <footer class="note">Data from the <code>users</code> table in <code>mydb</code>.</footer>
  </div>

</body>
</html>