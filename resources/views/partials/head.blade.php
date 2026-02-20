<meta charset="utf-8">
<title>TrackTime &mdash; @yield('title', 'Dashboard')</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome 6 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<!-- DataTables -->
<link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<!-- Flatpickr (date/time picker) -->
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">

<style>
  :root {
    --sidebar-bg:       #0f172a;
    --sidebar-hover:    #1e293b;
    --sidebar-active:   #6366f1;
    --sidebar-text:     #94a3b8;
    --sidebar-text-h:   #f1f5f9;
    --accent:           #6366f1;
    --accent-dark:      #4f46e5;
    --body-bg:          #f1f5f9;
    --card-bg:          #ffffff;
    --topbar-bg:        #ffffff;
    --topbar-h:         64px;
    --sidebar-w:        260px;
  }

  * { box-sizing: border-box; }

  body {
    font-family: 'Inter', sans-serif;
    background: var(--body-bg);
    color: #1e293b;
    font-size: 14px;
    margin: 0;
  }

  /* ── TOPBAR ─────────────────────────────────── */
  .topbar {
    position: fixed;
    top: 0; left: var(--sidebar-w); right: 0;
    height: var(--topbar-h);
    background: var(--topbar-bg);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 28px;
    box-shadow: 0 1px 0 #e2e8f0;
    z-index: 100;
    transition: left .3s;
  }
  .topbar .brand-mobile { display: none; }
  .topbar .page-title-bar {
    font-size: 16px;
    font-weight: 600;
    color: #0f172a;
  }
  .topbar .top-right {
    display: flex;
    align-items: center;
    gap: 12px;
  }
  .topbar .avatar {
    width: 36px; height: 36px;
    background: linear-gradient(135deg,#6366f1,#8b5cf6);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    color: #fff; font-weight: 600; font-size: 14px;
    cursor: pointer;
  }
  .topbar .btn-toggle {
    background: none;
    border: none;
    cursor: pointer;
    color: #64748b;
    font-size: 18px;
    padding: 6px;
    border-radius: 6px;
    display: none;
  }
  .topbar .btn-toggle:hover { background: #f1f5f9; }

  /* ── SIDEBAR ─────────────────────────────────── */
  .sidebar {
    position: fixed;
    top: 0; left: 0; bottom: 0;
    width: var(--sidebar-w);
    background: var(--sidebar-bg);
    display: flex;
    flex-direction: column;
    z-index: 200;
    transition: transform .3s;
    overflow-y: auto;
    scrollbar-width: thin;
    scrollbar-color: #1e293b #0f172a;
  }
  .sidebar::-webkit-scrollbar { width: 4px; }
  .sidebar::-webkit-scrollbar-thumb { background: #334155; border-radius: 4px; }

  .sidebar-brand {
    padding: 20px 24px;
    display: flex;
    align-items: center;
    gap: 10px;
    border-bottom: 1px solid #1e293b;
  }
  .sidebar-brand .brand-icon {
    width: 36px; height: 36px;
    background: linear-gradient(135deg,#6366f1,#8b5cf6);
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    color: #fff; font-size: 16px;
  }
  .sidebar-brand .brand-name {
    font-size: 18px;
    font-weight: 700;
    color: #f1f5f9;
    letter-spacing: -.3px;
  }
  .sidebar-brand .brand-name span { color: #818cf8; }

  .sidebar-section {
    padding: 20px 0 8px;
    flex: 1;
  }
  .sidebar-section-label {
    padding: 0 22px 6px;
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 1.2px;
    text-transform: uppercase;
    color: #475569;
  }

  .sidebar-item {
    position: relative;
  }
  .sidebar-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 22px;
    color: var(--sidebar-text);
    text-decoration: none;
    font-size: 13.5px;
    font-weight: 500;
    border-radius: 0;
    transition: all .2s;
    white-space: nowrap;
  }
  .sidebar-link:hover {
    background: var(--sidebar-hover);
    color: var(--sidebar-text-h);
  }
  .sidebar-link.active {
    background: rgba(99,102,241,.15);
    color: #818cf8;
  }
  .sidebar-link.active::before {
    content: '';
    position: absolute;
    left: 0; top: 0; bottom: 0;
    width: 3px;
    background: var(--sidebar-active);
    border-radius: 0 3px 3px 0;
  }
  .sidebar-link .icon {
    width: 20px; text-align: center;
    font-size: 14px;
  }
  .sidebar-link .arrow {
    margin-left: auto;
    font-size: 11px;
    transition: transform .2s;
  }
  .sidebar-link[aria-expanded="true"] .arrow {
    transform: rotate(90deg);
  }

  .sidebar-submenu {
    background: rgba(0,0,0,.15);
  }
  .sidebar-submenu .sidebar-link {
    padding-left: 52px;
    font-size: 13px;
    color: #64748b;
  }
  .sidebar-submenu .sidebar-link:hover { color: #94a3b8; }
  .sidebar-submenu .sidebar-link.active { color: #818cf8; }

  .sidebar-divider {
    border-top: 1px solid #1e293b;
    margin: 8px 0;
  }
  .sidebar-logout {
    padding: 16px 22px;
    border-top: 1px solid #1e293b;
  }
  .sidebar-logout a {
    display: flex;
    align-items: center;
    gap: 12px;
    color: #64748b;
    text-decoration: none;
    font-size: 13.5px;
    font-weight: 500;
    transition: color .2s;
  }
  .sidebar-logout a:hover { color: #ef4444; }

  /* ── MAIN CONTENT ────────────────────────────── */
  .main-wrap {
    margin-left: var(--sidebar-w);
    padding-top: var(--topbar-h);
    min-height: 100vh;
  }
  .main-content {
    padding: 28px;
  }

  /* ── CARDS ───────────────────────────────────── */
  .card {
    background: var(--card-bg);
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    box-shadow: 0 1px 3px rgba(0,0,0,.04);
  }
  .card-header {
    background: transparent;
    border-bottom: 1px solid #f1f5f9;
    padding: 18px 22px;
    font-weight: 600;
    font-size: 14px;
    color: #0f172a;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .card-body { padding: 22px; }

  /* ── STAT CARDS ──────────────────────────────── */
  .stat-card {
    border-radius: 14px;
    padding: 22px;
    color: #fff;
    position: relative;
    overflow: hidden;
  }
  .stat-card .stat-icon {
    position: absolute;
    right: 20px; top: 18px;
    font-size: 38px;
    opacity: .15;
  }
  .stat-card .stat-value {
    font-size: 28px;
    font-weight: 700;
    line-height: 1;
  }
  .stat-card .stat-label {
    font-size: 13px;
    opacity: .85;
    margin-top: 6px;
  }
  .stat-card.indigo  { background: linear-gradient(135deg,#6366f1,#8b5cf6); }
  .stat-card.teal    { background: linear-gradient(135deg,#0d9488,#059669); }
  .stat-card.amber   { background: linear-gradient(135deg,#f59e0b,#f97316); }
  .stat-card.pink    { background: linear-gradient(135deg,#ec4899,#f43f5e); }

  /* ── PAGE HEADING ────────────────────────────── */
  .page-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 22px;
  }
  .page-heading h4 {
    font-weight: 700;
    font-size: 20px;
    color: #0f172a;
    margin: 0;
  }
  .page-heading .breadcrumb {
    background: none;
    margin: 0;
    padding: 0;
    font-size: 12px;
  }

  /* ── BUTTONS ─────────────────────────────────── */
  .btn {
    font-size: 13px;
    font-weight: 500;
    border-radius: 8px;
    padding: 7px 16px;
    gap: 6px;
    display: inline-flex;
    align-items: center;
    transition: all .2s;
  }
  .btn-primary {
    background: var(--accent);
    border-color: var(--accent);
    color: #fff;
  }
  .btn-primary:hover { background: var(--accent-dark); border-color: var(--accent-dark); }
  .btn-success   { background: #10b981; border-color: #10b981; color:#fff; }
  .btn-success:hover { background: #059669; border-color:#059669; color:#fff; }
  .btn-info      { background: #0ea5e9; border-color: #0ea5e9; color:#fff; }
  .btn-info:hover{ background: #0284c7; border-color:#0284c7; color:#fff; }
  .btn-danger    { background: #ef4444; border-color: #ef4444; color:#fff; }
  .btn-danger:hover { background: #dc2626; border-color:#dc2626; color:#fff; }
  .btn-secondary { background: #64748b; border-color: #64748b; color:#fff; }
  .btn-xs { padding: 4px 10px; font-size: 12px; border-radius: 6px; }
  .btn-sm { padding: 5px 12px; font-size: 12px; }

  /* ── FORMS ───────────────────────────────────── */
  .form-label { font-weight: 500; font-size: 13px; color: #374151; margin-bottom: 5px; }
  .form-control, .form-select {
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    font-size: 13.5px;
    padding: 9px 13px;
    color: #1e293b;
    background: #f8fafc;
    transition: border-color .2s, box-shadow .2s;
  }
  .form-control:focus, .form-select:focus {
    border-color: #6366f1;
    box-shadow: 0 0 0 3px rgba(99,102,241,.12);
    background: #fff;
    outline: none;
  }
  textarea.form-control { resize: vertical; }

  /* ── TABLES ──────────────────────────────────── */
  .table {
    font-size: 13.5px;
    color: #334155;
  }
  .table thead th {
    background: #f8fafc;
    color: #64748b;
    font-weight: 600;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: .6px;
    border-bottom: 1px solid #e2e8f0;
    padding: 13px 16px;
    white-space: nowrap;
  }
  .table td {
    padding: 13px 16px;
    vertical-align: middle;
    border-color: #f1f5f9;
  }
  .table tbody tr:hover { background: #fafbff; }
  .table-actions { white-space: nowrap; }
  .table-actions form { display: inline; }

  /* ── ALERTS ──────────────────────────────────── */
  .alert {
    border-radius: 10px;
    border: none;
    font-size: 13.5px;
    padding: 12px 18px;
  }
  .alert-success { background: #ecfdf5; color: #065f46; }
  .alert-danger  { background: #fef2f2; color: #991b1b; }
  .alert-info    { background: #eff6ff; color: #1e40af; }

  /* ── BADGES ──────────────────────────────────── */
  .badge { font-weight: 500; border-radius: 5px; }

  /* ── AUTH PAGE ───────────────────────────────── */
  .auth-page {
    min-height: 100vh;
    background: linear-gradient(135deg,#0f172a 0%,#1e1b4b 50%,#0f172a 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
  }
  .auth-card {
    background: rgba(255,255,255,.03);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255,255,255,.08);
    border-radius: 20px;
    padding: 48px 44px;
    width: 100%;
    max-width: 440px;
    box-shadow: 0 25px 50px rgba(0,0,0,.4);
  }
  .auth-card .auth-logo {
    text-align: center;
    margin-bottom: 32px;
  }
  .auth-card .auth-logo .logo-icon {
    width: 58px; height: 58px;
    background: linear-gradient(135deg,#6366f1,#8b5cf6);
    border-radius: 16px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    color: #fff;
    margin-bottom: 14px;
  }
  .auth-card .auth-logo h2 {
    color: #f1f5f9;
    font-weight: 700;
    font-size: 24px;
    margin: 0;
  }
  .auth-card .auth-logo p {
    color: #64748b;
    font-size: 13px;
    margin: 6px 0 0;
  }
  .auth-card .form-label { color: #94a3b8; }
  .auth-card .form-control {
    background: rgba(255,255,255,.06);
    border: 1px solid rgba(255,255,255,.1);
    color: #f1f5f9;
  }
  .auth-card .form-control:focus {
    background: rgba(255,255,255,.09);
    border-color: #6366f1;
    color: #f1f5f9;
  }
  .auth-card .form-control::placeholder { color: #475569; }
  .auth-card .btn-primary {
    background: linear-gradient(135deg,#6366f1,#8b5cf6);
    border: none;
    width: 100%;
    padding: 11px;
    font-size: 14px;
    font-weight: 600;
    border-radius: 10px;
  }
  .auth-card .btn-primary:hover {
    background: linear-gradient(135deg,#4f46e5,#7c3aed);
    transform: translateY(-1px);
    box-shadow: 0 8px 20px rgba(99,102,241,.35);
  }
  .form-check-label { color: #94a3b8; font-size: 13px; }

  /* ── RESPONSIVE ──────────────────────────────── */
  @media (max-width: 768px) {
    .sidebar { transform: translateX(-100%); }
    .sidebar.open { transform: translateX(0); }
    .main-wrap { margin-left: 0; }
    .topbar { left: 0; }
    .topbar .btn-toggle { display: block; }
    .overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,.5); z-index:150; }
    .overlay.show { display:block; }
  }
</style>
