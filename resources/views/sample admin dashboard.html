@php
    /*
     * COMPLETE GIMMS DASHBOARD UI PROTOTYPE
     * Pass dashboardRole from an authorized controller: 'admin' or 'member'.
     * Defaults to admin so the full administration menu is visible in this preview.
     * Presentation is NOT authorization. Replace all sample data before production.
     */
    $isAdmin = ($dashboardRole ?? 'admin') === 'admin';
    $userName = auth()->user()?->name ?? auth()->user()?->username ?? 'Alex Morgan';
    $firstName = explode(' ', trim($userName))[0];
    $initials = strtoupper(mb_substr($userName, 0, 1));
    $logoPath = 'assets/images/gimms-logo.png';
    $hasLogo = is_file(public_path($logoPath));
    $logoutUrl = $logoutAction ?? (\Illuminate\Support\Facades\Route::has('logout') ? route('logout') : null);

    $adminMenu = [
        ['id'=>'membership','title'=>'Membership','icon'=>'users','children'=>[
            ['id'=>'members','title'=>'All members'],
            ['id'=>'membership-applications','title'=>'Membership applications','badge'=>'12'],
            ['id'=>'groups','title'=>'Groups & committees'],
            ['id'=>'membership-dues','title'=>'Membership dues'],
            ['id'=>'inactive-members','title'=>'Inactive & suspended members'],
        ]],
        ['id'=>'loans','title'=>'Loan management','icon'=>'bank','children'=>[
            ['id'=>'loan-overview','title'=>'Loan overview'],
            ['id'=>'loan-applications','title'=>'Applications','badge'=>'8'],
            ['id'=>'loan-approvals','title'=>'Review & approval queue'],
            ['id'=>'awaiting-disbursement','title'=>'Awaiting disbursement'],
            ['id'=>'disbursements','title'=>'Disbursements'],
            ['id'=>'active-loans','title'=>'Active loans'],
            ['id'=>'repayment-schedules','title'=>'Repayment schedules'],
            ['id'=>'repayments','title'=>'Repayment records'],
            ['id'=>'overdue-loans','title'=>'Overdue accounts','badge'=>'3'],
            ['id'=>'loan-products','title'=>'Loan products & terms'],
        ]],
        ['id'=>'contributions-menu','title'=>'Contributions','icon'=>'wallet','children'=>[
            ['id'=>'contributions','title'=>'Contribution overview'],
            ['id'=>'member-contributions','title'=>'Member contribution records'],
            ['id'=>'contribution-payments','title'=>'Payment history'],
            ['id'=>'contribution-statements','title'=>'Statements & receipts'],
        ]],
        ['id'=>'sales','title'=>'Sales & programs','icon'=>'bag','children'=>[
            ['id'=>'sales-overview','title'=>'Sales overview'],
            ['id'=>'sales-programs','title'=>'Sales programs'],
            ['id'=>'products','title'=>'Products & pricing'],
            ['id'=>'categories','title'=>'Product categories'],
            ['id'=>'inventory','title'=>'Inventory'],
            ['id'=>'orders','title'=>'Orders','badge'=>'16'],
            ['id'=>'installments','title'=>'Installment accounts'],
            ['id'=>'deliveries','title'=>'Delivery & collection'],
            ['id'=>'returns','title'=>'Returns & cancellations'],
        ]],
        ['id'=>'finance','title'=>'Finance & reports','icon'=>'chart','children'=>[
            ['id'=>'transactions','title'=>'All transactions'],
            ['id'=>'reconciliation','title'=>'Payment reconciliation'],
            ['id'=>'expenses','title'=>'Expenses'],
            ['id'=>'refunds','title'=>'Refunds'],
            ['id'=>'financial-reports','title'=>'Financial reports'],
        ]],
        ['id'=>'communications','title'=>'Communications','icon'=>'message','children'=>[
            ['id'=>'announcements','title'=>'Announcements'],
            ['id'=>'member-notifications','title'=>'Member notifications'],
            ['id'=>'message-history','title'=>'Message history'],
        ]],
        ['id'=>'events','title'=>'Events & meetings','icon'=>'calendar','children'=>[
            ['id'=>'calendar','title'=>'Community calendar'],
            ['id'=>'event-management','title'=>'Manage events'],
            ['id'=>'registrations','title'=>'Registrations'],
        ]],
        ['id'=>'learning','title'=>'Learning & resources','icon'=>'book','children'=>[
            ['id'=>'library','title'=>'Resource library'],
            ['id'=>'books','title'=>'Recommended books'],
            ['id'=>'courses','title'=>'Recommended courses'],
        ]],
        ['id'=>'administration','title'=>'Administration','icon'=>'settings','children'=>[
            ['id'=>'administrators','title'=>'Administrators'],
            ['id'=>'roles','title'=>'Roles & permissions'],
            ['id'=>'approval-workflows','title'=>'Approval workflows'],
            ['id'=>'audit','title'=>'Audit activity'],
            ['id'=>'association-settings','title'=>'Association settings'],
            ['id'=>'payment-settings','title'=>'Payment settings'],
        ]],
    ];
    $memberMenu = [
        ['id'=>'membership','title'=>'My membership','icon'=>'users','children'=>[
            ['id'=>'membership-details','title'=>'Membership details'],
            ['id'=>'members','title'=>'Member directory'],
            ['id'=>'groups','title'=>'My groups'],
            ['id'=>'announcements','title'=>'Announcements'],
        ]],
        ['id'=>'loans','title'=>'My loans','icon'=>'bank','children'=>[
            ['id'=>'loan-products','title'=>'Available loan options'],
            ['id'=>'loan-apply','title'=>'Apply for a loan'],
            ['id'=>'loan-applications','title'=>'My applications'],
            ['id'=>'active-loans','title'=>'My active loans'],
            ['id'=>'repayment-schedules','title'=>'Repayment schedule'],
            ['id'=>'repayments','title'=>'Repayment history'],
        ]],
        ['id'=>'contributions-menu','title'=>'Contributions','icon'=>'wallet','children'=>[
            ['id'=>'contributions','title'=>'My contributions'],
            ['id'=>'contribution-payments','title'=>'Payment history'],
            ['id'=>'contribution-statements','title'=>'Statements & receipts'],
        ]],
        ['id'=>'sales','title'=>'Shop & programs','icon'=>'bag','children'=>[
            ['id'=>'sales-programs','title'=>'Available programs'],
            ['id'=>'products','title'=>'Browse products'],
            ['id'=>'cart','title'=>'My cart'],
            ['id'=>'orders','title'=>'My orders'],
            ['id'=>'installments','title'=>'My installment plans'],
            ['id'=>'deliveries','title'=>'Delivery & collection'],
        ]],
        ['id'=>'finance','title'=>'Payments & statements','icon'=>'chart','children'=>[
            ['id'=>'transactions','title'=>'My transactions'],
            ['id'=>'statements','title'=>'Statements & receipts'],
        ]],
        ['id'=>'events','title'=>'Events & meetings','icon'=>'calendar','children'=>[
            ['id'=>'calendar','title'=>'Community calendar'],
            ['id'=>'registrations','title'=>'My registrations'],
        ]],
        ['id'=>'learning','title'=>'Learning & resources','icon'=>'book','children'=>[
            ['id'=>'library','title'=>'Resource library'],
            ['id'=>'books','title'=>'Recommended books'],
            ['id'=>'courses','title'=>'Recommended courses'],
        ]],
    ];
    $menuGroups = $isAdmin ? $adminMenu : $memberMenu;
    $pages = [['id'=>'overview','title'=>'Overview','group'=>'Workspace','icon'=>'grid']];
    foreach ($menuGroups as $group) {
        foreach ($group['children'] as $child) {
            $pages[] = [...$child, 'group'=>$group['title'], 'icon'=>$group['icon']];
        }
    }
    $pages[] = ['id'=>'profile','title'=>'My profile','group'=>'Account','icon'=>'user'];
    $pageIds = array_column($pages, 'id');
    $pageRoutes = $dashboardRoutes ?? []; // Optional: ['members' => route('your.actual.route')]

    $metrics = $isAdmin ? [
        ['label'=>'Active members','value'=>'2,846','note'=>'128 joined this month','icon'=>'users','tone'=>'green'],
        ['label'=>'Loan principal outstanding','value'=>'₦24.8m','note'=>'Across 146 active accounts','icon'=>'bank','tone'=>'blue'],
        ['label'=>'Sales receipts this month','value'=>'₦8.2m','note'=>'Payments received, not order value','icon'=>'bag','tone'=>'orange'],
        ['label'=>'Loans awaiting review','value'=>'08','note'=>'Applications requiring attention','icon'=>'layers','tone'=>'purple'],
    ] : [
        ['label'=>'My contributions','value'=>'₦245,000','note'=>'Total recorded contributions','icon'=>'wallet','tone'=>'green'],
        ['label'=>'Outstanding loan principal','value'=>'₦180,000','note'=>'Principal only; view full breakdown','icon'=>'bank','tone'=>'blue'],
        ['label'=>'Next loan repayment','value'=>'₦30,000','note'=>'Due 25 October 2026','icon'=>'calendar','tone'=>'orange'],
        ['label'=>'Purchase balance','value'=>'₦45,000','note'=>'Separate purchase installment plan','icon'=>'bag','tone'=>'purple'],
    ];
    $transactions = [
        ['title'=>'Monthly contribution','ref'=>'GMS-10248','type'=>'Contribution','date'=>'16 Oct 2026','amount'=>'₦25,000','status'=>'Completed'],
        ['title'=>'Personal loan repayment','ref'=>'GMS-10247','type'=>'Loan repayment','date'=>'15 Oct 2026','amount'=>'₦30,000','status'=>'Completed'],
        ['title'=>'Household program payment','ref'=>'GMS-10246','type'=>'Purchase installment','date'=>'14 Oct 2026','amount'=>'₦15,000','status'=>'Pending'],
        ['title'=>'Food essentials purchase','ref'=>'GMS-10245','type'=>'Product purchase','date'=>'12 Oct 2026','amount'=>'₦42,000','status'=>'Completed'],
    ];
    $loans = [
        ['ref'=>'LN-00241','title'=>'Personal support loan','member'=>'Alex Morgan','principal'=>'₦300,000','balance'=>'₦180,000','status'=>'Active'],
        ['ref'=>'LN-00238','title'=>'Enterprise support loan','member'=>'Sarah Johnson','principal'=>'₦500,000','balance'=>'₦350,000','status'=>'Active'],
        ['ref'=>'LN-00252','title'=>'Education support loan','member'=>'David Okafor','principal'=>'₦200,000','balance'=>'Not disbursed','status'=>'Under review'],
        ['ref'=>'LN-00253','title'=>'Personal support loan','member'=>'Grace Bello','principal'=>'₦150,000','balance'=>'Not disbursed','status'=>'Approved'],
        ['ref'=>'LN-00220','title'=>'Enterprise support loan','member'=>'Michael Adeyemi','principal'=>'₦400,000','balance'=>'₦210,000','status'=>'Overdue'],
    ];
    $memberLoans = [$loans[0]];
    $products = [
        ['name'=>'Food essentials bundle','category'=>'Food & household','price'=>'₦42,000','description'=>'Illustrative household essentials package.','icon'=>'basket','tone'=>'green','program'=>'Food essentials program'],
        ['name'=>'Home appliance package','category'=>'Home & living','price'=>'₦165,000','description'=>'Illustrative household appliance offer.','icon'=>'home','tone'=>'blue','program'=>'Household purchase program'],
        ['name'=>'Work & study laptop','category'=>'Technology','price'=>'₦385,000','description'=>'Illustrative technology purchase offer.','icon'=>'laptop','tone'=>'purple','program'=>'Technology program'],
    ];
    $orders = [
        ['ref'=>'ORD-00418','name'=>'Home appliance package','total'=>'₦165,000','paid'=>'₦120,000','fulfillment'=>'Processing','payment'=>'Part paid'],
        ['ref'=>'ORD-00405','name'=>'Food essentials bundle','total'=>'₦42,000','paid'=>'₦42,000','fulfillment'=>'Collected','payment'=>'Paid'],
    ];
    $members = [
        ['name'=>'Sarah Johnson','detail'=>'Community coordinator','initials'=>'SJ','tone'=>'green'],
        ['name'=>'David Okafor','detail'=>'Business & enterprise','initials'=>'DO','tone'=>'blue'],
        ['name'=>'Grace Bello','detail'=>'Education & development','initials'=>'GB','tone'=>'purple'],
        ['name'=>'Michael Adeyemi','detail'=>'Member relations','initials'=>'MA','tone'=>'orange'],
    ];
    $events = [
        ['day'=>'24','month'=>'OCT','title'=>'Community general meeting','detail'=>'10:00 AM · Community hall','tone'=>'green'],
        ['day'=>'29','month'=>'OCT','title'=>'Financial wellbeing workshop','detail'=>'2:00 PM · Online session','tone'=>'purple'],
        ['day'=>'05','month'=>'NOV','title'=>'Member networking circle','detail'=>'11:00 AM · Community hub','tone'=>'blue'],
    ];
    $chartData = [
        ['May', 2.4, 1.5], ['Jun', 3.2, 1.9], ['Jul', 2.8, 2.2],
        ['Aug', 4.2, 2.8], ['Sep', 5.4, 3.1], ['Oct', 6.4, 3.6],
    ];
    $financePages = ['contributions','member-contributions','contribution-payments','transactions','repayments'];
    $loanPages = ['loan-overview','loan-applications','loan-approvals','awaiting-disbursement','disbursements','active-loans','overdue-loans'];
    $quickActions = $isAdmin ? [
        ['loan-applications','Loan applications','bank','green'],
        ['repayments','Repayment records','wallet','blue'],
        ['orders','Manage orders','bag','orange'],
        ['sales-programs','Sales programs','layers','purple'],
    ] : [
        ['loan-apply','Apply for a loan','bank','green'],
        ['repayment-schedules','My repayments','calendar','blue'],
        ['products','Browse products','bag','orange'],
        ['orders','Track my orders','layers','purple'],
    ];
@endphp
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#10233f">
    <title>Overview · GIMMS</title>
    <style>
        :root{color-scheme:light;--bg:#f2f5fb;--surface:#fff;--soft:#f7f9fd;--ink:#192d49;--muted:#72829a;--line:#e4ebf4;--navy:#10233f;--green:#087f65;--green-soft:#e4f6ee;--blue:#3978d4;--blue-soft:#eaf2ff;--orange:#d67930;--orange-soft:#fff0e2;--purple:#805acc;--purple-soft:#f0eaff;--sidebar-width:286px;--shadow:0 6px 25px rgba(24,49,88,.035)}
        [data-theme="dark"]{color-scheme:dark;--bg:#0e1828;--surface:#162338;--soft:#1c2c43;--ink:#edf3ff;--muted:#a4b4ca;--line:#2c3d55;--green:#6bdcb9;--green-soft:#173e37;--blue:#96bdff;--blue-soft:#203b61;--orange:#f4b17b;--orange-soft:#453327;--purple:#c7b0ff;--purple-soft:#352d50;--shadow:none}
        *,*::before,*::after{box-sizing:border-box}
        body{margin:0;background:var(--bg);color:var(--ink);font-family:Inter,"Segoe UI",-apple-system,BlinkMacSystemFont,sans-serif;font-size:15px;line-height:1.6;-webkit-font-smoothing:antialiased}
        button,input,select{font:inherit;color:inherit}button{cursor:pointer}a{color:inherit;text-decoration:none}[hidden]{display:none!important}
        :focus-visible{outline:3px solid #efa061;outline-offset:4px}
        .icon{display:block;width:21px;height:21px;flex-shrink:0;fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}
        .sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0}
        .skip-link{position:fixed;z-index:200;top:-100px;left:20px;padding:12px 18px;background:var(--surface);border-radius:8px}.skip-link:focus{top:15px}
        .sidebar{position:fixed;z-index:70;inset:0 auto 0 0;display:flex;flex-direction:column;width:var(--sidebar-width);padding:27px 17px 18px;color:#a0b5d0;background:radial-gradient(ellipse at 0 0,rgba(38,107,127,.22),transparent 45%),#10233f;transition:transform .25s ease}
        .brand{display:flex;align-items:center;gap:12px;padding:0 11px;margin-bottom:26px}.brand-mark{display:grid;place-items:center;width:46px;height:46px;flex-shrink:0;color:#fff;background:linear-gradient(140deg,#1ba87e,#3280bf);border-radius:13px;font-size:27px;font-weight:850}.brand-mark.has-logo{padding:4px;background:#fff}.brand-mark img{width:100%;height:100%;object-fit:contain}.brand-title{display:block;color:#fff;font-size:25px;font-weight:750;letter-spacing:-.8px;line-height:1.2}.brand-subtitle{display:block;margin-top:5px;color:#92a9c7;font-size:12px}
        .workspace{display:flex;align-items:center;gap:11px;padding:14px;margin-bottom:18px;background:rgba(255,255,255,.035);border:1px solid #2b405d;border-radius:13px}.workspace-icon{display:grid;place-items:center;width:36px;height:36px;color:#80e3bc;background:#164b45;border-radius:10px}.workspace-title{display:block;color:#e9f2ff;font-size:14px;font-weight:600}.workspace-subtitle{display:block;margin-top:3px;color:#92a9c7;font-size:12px}
        .nav-search{position:relative;margin-bottom:22px}.nav-search .icon{position:absolute;left:13px;top:13px;width:18px;height:18px;color:#91a8c6}.nav-search input{width:100%;height:44px;padding:0 12px 0 40px;color:#e9f2ff;background:#142b49;border:1px solid #2b4160;border-radius:10px;font-size:14px}.nav-search input::placeholder{color:#91a8c6}
        .sidebar-scroll{flex:1;min-height:0;overflow-y:auto;scrollbar-width:thin;scrollbar-color:#34506e transparent}.nav-label{margin:0 0 12px;padding:0 13px;color:#8ba2c1;font-size:11px;font-weight:650;letter-spacing:.13em;text-transform:uppercase}
        .nav-root,.group-toggle{display:flex;align-items:center;gap:11px;width:100%;min-height:48px;padding:12px 13px;color:#a8bbd4;background:transparent;border:0;border-radius:10px;font-size:14px;font-weight:500;text-align:left}.nav-root:hover,.group-toggle:hover{color:#fff;background:#1a3352}.nav-root.active{color:#fff;background:linear-gradient(100deg,#1e695f,#1d4e64);box-shadow:inset 0 0 0 1px rgba(133,226,192,.12)}.nav-root.active::after{content:"";width:6px;height:6px;margin-left:auto;border-radius:50%;background:#79e3b8}.nav-group{margin-top:5px}.nav-group.has-active>.group-toggle{color:#eef5ff}.group-chevron{width:14px;height:14px;margin-left:auto;color:#91a9c6;transition:transform .2s ease}.group-toggle[aria-expanded="true"] .group-chevron{transform:rotate(90deg)}
        .submenu{display:grid;gap:3px;margin:5px 0 10px 23px;padding-left:15px;border-left:1px solid #35506d}.sub-link{position:relative;display:flex;align-items:center;gap:7px;width:100%;min-height:42px;padding:9px 11px;color:#a1b6d1;background:transparent;border:0;border-radius:8px;font-size:13px;line-height:1.5;text-align:left}.sub-link:hover{color:#fff;background:#19324f}.sub-link.active{color:#93ecc8;background:#17463f}.sub-link.active::before{content:"";position:absolute;left:-19px;width:6px;height:6px;background:#82e0bc;border-radius:50%}.nav-badge{min-width:23px;padding:1px 6px;margin-left:auto;text-align:center;color:#f7c99c;background:#4f3e34;border-radius:5px;font-size:11px}.nav-empty{padding:12px;color:#a8bed7;font-size:13px}
        .sidebar-footer{padding-top:16px;margin-top:16px;border-top:1px solid #2b405c}.user-button{display:flex;align-items:center;gap:11px;width:100%;padding:5px;background:transparent;border:0;text-align:left}.avatar{display:grid;place-items:center;width:42px;height:42px;flex-shrink:0;color:#795a3a;background:#f2dfc6;border-radius:50%;font-size:14px;font-weight:700}.user-name{display:block;max-width:158px;overflow:hidden;color:#eaf2fe;font-size:13px;font-weight:600;white-space:nowrap;text-overflow:ellipsis}.user-role{display:block;margin-top:3px;color:#98afcd;font-size:12px}.logout-button{display:flex;align-items:center;gap:8px;width:100%;padding:10px 5px 0;color:#acbdd3;background:none;border:0;font-size:12px}.logout-button .icon{width:16px;height:16px}
        .main{margin-left:var(--sidebar-width);transition:margin-left .25s ease}.topbar{position:sticky;z-index:40;top:0;display:flex;align-items:center;justify-content:space-between;gap:18px;min-height:82px;padding:18px 32px;background:var(--surface);border-bottom:1px solid var(--line)}.topbar-left,.topbar-right{display:flex;align-items:center;gap:13px}.icon-button{position:relative;display:grid;place-items:center;width:41px;height:41px;padding:0;color:var(--muted);background:var(--surface);border:1px solid var(--line);border-radius:11px}.icon-button:hover{color:var(--ink);background:var(--soft)}.breadcrumb{display:flex;align-items:center;gap:11px;color:var(--muted);font-size:13px}.breadcrumb .icon{width:12px;height:12px}.breadcrumb-current{color:var(--ink);font-weight:600}.command-trigger{display:flex;align-items:center;gap:9px;width:245px;height:42px;padding:0 12px;color:var(--muted);background:var(--soft);border:1px solid var(--line);border-radius:10px;font-size:13px;text-align:left}.command-trigger .icon{width:18px;height:18px}kbd{margin-left:auto;padding:2px 6px;background:var(--surface);border:1px solid var(--line);border-radius:5px;font:inherit;font-size:11px}.notification-dot{position:absolute;top:9px;right:10px;width:6px;height:6px;background:#ed843e;border-radius:50%}.role-pill{padding:6px 10px;color:var(--green);background:var(--green-soft);border-radius:7px;font-size:11px;font-weight:650;white-space:nowrap}
        .content{max-width:1740px;margin:auto;padding:30px 32px 40px}.preview-note{display:flex;align-items:flex-start;gap:8px;margin:0 0 21px;color:var(--muted);font-size:12px}.preview-note::before{content:"";width:6px;height:6px;flex-shrink:0;margin-top:7px;background:var(--orange);border-radius:50%}.page-heading{display:flex;align-items:center;justify-content:space-between;gap:20px;margin-bottom:25px}.eyebrow{margin:0 0 8px;color:var(--muted);font-size:12px;font-weight:600;letter-spacing:.09em;text-transform:uppercase}.page-heading h1{margin:0;font-size:clamp(27px,2.3vw,34px);font-weight:750;line-height:1.2;letter-spacing:-1px}.page-description{margin:10px 0 0;color:var(--muted);font-size:14px;line-height:1.75}
        .button{display:inline-flex;align-items:center;justify-content:center;gap:9px;min-height:44px;padding:11px 16px;color:var(--ink);background:var(--surface);border:1px solid var(--line);border-radius:11px;font-size:13px;font-weight:600;line-height:1.5}.button .icon{width:18px;height:18px}.button.primary{color:#fff;background:#d66c28;border-color:#d66c28}.button:hover{filter:brightness(.97)}
        .hero{position:relative;isolation:isolate;overflow:hidden;display:flex;align-items:center;justify-content:space-between;gap:30px;min-height:215px;padding:31px 34px;margin-bottom:25px;color:#fff;background:radial-gradient(ellipse at 88% 10%,rgba(81,190,162,.34),transparent 52%),linear-gradient(115deg,#123452,#145765);border-radius:21px}.hero::after{content:"";position:absolute;z-index:-1;width:370px;height:370px;top:-190px;right:-90px;border:1px solid rgba(255,255,255,.14);border-radius:50%;box-shadow:0 0 0 45px rgba(255,255,255,.025),0 0 0 90px rgba(255,255,255,.02)}.hero-label{display:inline-flex;align-items:center;gap:8px;margin-bottom:14px;color:#b6eddc;font-size:11px;font-weight:550;letter-spacing:.1em;text-transform:uppercase}.hero-label::before{content:"";width:6px;height:6px;background:#8ce2b8;border-radius:50%}.hero h2{max-width:600px;margin:0;font-size:clamp(25px,2.1vw,32px);font-weight:600;line-height:1.3;letter-spacing:-.8px}.hero p{max-width:560px;margin:12px 0 0;color:#bdd8e4;font-size:14px;line-height:1.8}.hero-actions{display:flex;flex-wrap:wrap;gap:10px;margin-top:21px}.hero .button{color:#17475a;background:#fff;border-color:#fff}.hero .button.outline{color:#fff;background:transparent;border-color:rgba(255,255,255,.35)}.hero-summary{min-width:180px;padding-left:25px;border-left:1px solid rgba(255,255,255,.18)}.hero-summary span{display:block;color:#c0dde3;font-size:12px}.hero-summary strong{display:block;margin:5px 0;color:#fff;font-size:29px;font-weight:650;letter-spacing:-.7px}.hero-summary small{color:#b4d5dd;font-size:12px}
        .metrics{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:18px;margin-bottom:25px}.metric{position:relative;overflow:hidden;padding:22px;background:var(--surface);border:1px solid var(--line);border-radius:17px;box-shadow:var(--shadow)}.metric::before{content:"";position:absolute;top:0;left:20px;right:20px;height:3px;background:var(--accent);border-radius:0 0 8px 8px}.metric.green-card{--accent:#15aa80}.metric.blue-card{--accent:#4d8ce9}.metric.orange-card{--accent:#efa35a}.metric.purple-card{--accent:#a182e8}.metric-top{display:flex;align-items:flex-start;justify-content:space-between;gap:10px;margin-bottom:17px}.metric-label{color:var(--muted);font-size:13px;line-height:1.5}.tile-icon{display:grid;place-items:center;width:39px;height:39px;flex-shrink:0;border-radius:12px}.tile-icon .icon{width:20px;height:20px}.green{color:var(--green);background:var(--green-soft)}.blue{color:var(--blue);background:var(--blue-soft)}.orange{color:var(--orange);background:var(--orange-soft)}.purple{color:var(--purple);background:var(--purple-soft)}.metric-value{display:block;margin-bottom:11px;font-size:33px;font-weight:750;line-height:1.2;letter-spacing:-1px}.metric-note{color:var(--muted);font-size:12px;line-height:1.6}
        .dashboard-grid{display:grid;grid-template-columns:minmax(0,1.7fr) minmax(320px,1fr);gap:23px;align-items:start}.stack{display:grid;gap:23px;min-width:0}.panel{min-width:0;background:var(--surface);border:1px solid var(--line);border-radius:18px;box-shadow:var(--shadow)}.panel-head{display:flex;align-items:center;justify-content:space-between;gap:15px;padding:23px}.panel-head h2{margin:0;font-size:16px;font-weight:650;line-height:1.4}.panel-head p{margin:7px 0 0;color:var(--muted);font-size:12px;line-height:1.7}.text-button{display:inline-flex;align-items:center;gap:6px;padding:0;color:var(--green);background:transparent;border:0;font-size:12px;font-weight:600;white-space:nowrap}.text-button .icon{width:16px;height:16px}
        .quick-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:11px;padding:0 20px 21px}.quick-link{display:flex;align-items:center;gap:10px;min-height:80px;padding:13px;text-align:left;background:var(--soft);border:1px solid var(--line);border-radius:12px;transition:transform .2s ease}.quick-link:hover{transform:translateY(-2px)}.quick-link span:last-child{font-size:12px;font-weight:600;line-height:1.5}.quick-link .tile-icon{width:33px;height:33px;border-radius:10px}.quick-link .icon{width:18px;height:18px}
        .loan-card{padding:0 23px 23px}.balance-label{color:var(--muted);font-size:13px}.balance-value{margin:5px 0 18px;font-size:32px;font-weight:750;letter-spacing:-1px}.progress-track{height:9px;background:var(--green-soft);border-radius:20px;overflow:hidden}.progress-fill{height:100%;width:var(--progress);background:linear-gradient(90deg,#0b9475,#58c99f);border-radius:inherit}.progress-caption{display:flex;justify-content:space-between;gap:12px;margin-top:10px;color:var(--muted);font-size:12px}.detail-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:15px;margin-top:22px;padding-top:19px;border-top:1px solid var(--line)}.detail-grid span{display:block;color:var(--muted);font-size:12px}.detail-grid strong{display:block;margin-top:5px;font-size:14px;font-weight:600}.muted{color:var(--muted)}.small{font-size:12px}
        .due-item{display:flex;align-items:flex-start;gap:12px;padding:18px 22px;border-top:1px solid var(--line)}.due-item .tile-icon{width:35px;height:35px}.due-main{flex:1;min-width:0}.due-main h3{margin:0 0 5px;font-size:14px;font-weight:600}.due-main p{margin:0;color:var(--muted);font-size:12px}.due-amount{font-size:14px;font-weight:650;white-space:nowrap}
        .chart-summary{display:flex;align-items:flex-end;justify-content:space-between;gap:15px;padding:0 24px}.chart-value{font-size:31px;font-weight:750;line-height:1.2;letter-spacing:-.9px}.chart-value small{display:block;margin-top:8px;color:var(--muted);font-size:12px;font-weight:400;letter-spacing:0}.legend-list{display:flex;flex-wrap:wrap;gap:12px}.legend{display:flex;align-items:center;gap:6px;color:var(--muted);font-size:11px}.legend::before{content:"";width:8px;height:8px;background:#159b7c;border-radius:3px}.legend.secondary::before{background:#82a9e6}.chart{display:flex;align-items:flex-end;justify-content:space-around;gap:16px;height:180px;margin:28px 25px 47px;background:repeating-linear-gradient(to top,var(--line) 0,var(--line) 1px,transparent 1px,transparent 45px)}.bar-group{position:relative;display:flex;align-items:flex-end;justify-content:center;gap:5px;height:100%;flex:1}.bar{width:min(45%,20px);height:var(--height);background:linear-gradient(180deg,#20b189,#087e70);border-radius:5px 5px 0 0}.bar.secondary{background:linear-gradient(180deg,#91b6ef,#6896d7)}.bar-label{position:absolute;bottom:-26px;color:var(--muted);font-size:12px}
        .filters{display:flex;flex-wrap:wrap;gap:6px;padding:0 23px 18px}.filter{min-height:35px;padding:7px 11px;color:var(--muted);background:transparent;border:0;border-radius:8px;font-size:12px}.filter.active{color:var(--green);background:var(--green-soft)}.table-wrap{overflow-x:auto}.data-table{width:100%;border-collapse:collapse;text-align:left}.data-table th{padding:14px 22px;color:var(--muted);background:var(--soft);font-size:12px;font-weight:500;white-space:nowrap}.data-table td{padding:18px 22px;border-top:1px solid var(--line);font-size:13px;white-space:nowrap}.record-title{display:block;margin-bottom:5px;font-size:13px;font-weight:600}.record-sub{color:var(--muted);font-size:12px}.status{display:inline-flex;align-items:center;gap:6px;padding:5px 9px;color:var(--green);background:var(--green-soft);border-radius:7px;font-size:11px;line-height:1.5}.status::before{content:"";width:5px;height:5px;background:currentColor;border-radius:50%}.status.pending{color:var(--orange);background:var(--orange-soft)}.status.danger{color:#b14644;background:#ffe9e8}[data-theme="dark"] .status.danger{color:#ffb0ab;background:#4e292c}.table-footer{display:flex;justify-content:space-between;gap:12px;padding:16px 22px;color:var(--muted);border-top:1px solid var(--line);font-size:12px}
        .card-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:19px}.product-card,.profile-card,.module-card{overflow:hidden;background:var(--surface);border:1px solid var(--line);border-radius:17px;box-shadow:var(--shadow)}.product-art{position:relative;display:grid;place-items:center;min-height:165px;overflow:hidden}.product-art::after{content:"";position:absolute;width:160px;height:160px;right:-40px;top:-60px;border:1px solid currentColor;opacity:.1;border-radius:50%;box-shadow:0 0 0 30px currentColor}.product-art>.icon{width:68px;height:68px;stroke-width:1.1}.product-body{padding:22px}.product-category{display:block;margin-bottom:8px;color:var(--muted);font-size:12px}.product-body h2{margin:0 0 9px;font-size:18px;line-height:1.4}.product-body p{margin:0;color:var(--muted);font-size:13px;line-height:1.8}.product-price{display:block;margin-top:17px;font-size:23px;font-weight:750;letter-spacing:-.5px}.product-footer{display:flex;align-items:center;justify-content:space-between;gap:10px;margin-top:18px;padding-top:16px;border-top:1px solid var(--line)}
        .program-card{position:relative;overflow:hidden;padding:25px;color:#fff;background:radial-gradient(ellipse at 100% 0,rgba(178,155,255,.3),transparent 70%),linear-gradient(120deg,#514192,#6d56ac);border-radius:18px}.program-card .tile-icon{color:#fff;background:rgba(255,255,255,.12);margin-bottom:18px}.program-card h2{margin:0 0 10px;font-size:23px;line-height:1.3;letter-spacing:-.5px}.program-card p{margin:0 0 20px;color:#e0d8f6;font-size:13px;line-height:1.8}.program-card .button{color:#624a9f;background:#fff;border-color:#fff}
        .profile-card,.module-card{padding:26px}.profile-card .avatar{width:52px;height:52px;margin-bottom:20px}.profile-card h2,.module-card h2{margin:0 0 9px;font-size:17px;line-height:1.4}.profile-card p,.module-card p{margin:0;color:var(--muted);font-size:14px;line-height:1.8}.module-card .tile-icon{width:45px;height:45px;margin-bottom:22px}.module-card .text-button{margin-top:22px}.module-placeholder{padding:44px 25px;text-align:center}.module-placeholder .tile-icon{width:54px;height:54px;margin:0 auto 22px}.module-placeholder h2{margin:0 0 13px;font-size:23px;letter-spacing:-.5px}.module-placeholder p{max-width:570px;margin:0 auto 11px;color:var(--muted);font-size:14px;line-height:1.8}
        .event{display:flex;gap:14px;padding:20px 22px;border-top:1px solid var(--line)}.event-date{display:flex;flex-direction:column;align-items:center;justify-content:center;width:51px;height:58px;flex-shrink:0;border-radius:12px;font-size:23px;font-weight:700;line-height:1}.event-date small{margin-top:7px;font-size:10px;letter-spacing:.06em}.event h3{margin:0 0 7px;font-size:13px;font-weight:600;line-height:1.5}.event p{margin:0;color:var(--muted);font-size:12px;line-height:1.7}.footer{display:flex;justify-content:space-between;gap:15px;margin-top:30px;color:var(--muted);font-size:12px;line-height:1.8}
        .notifications{position:fixed;z-index:80;top:73px;right:28px;width:min(390px,calc(100vw - 28px));background:var(--surface);border:1px solid var(--line);border-radius:16px;box-shadow:0 20px 60px rgba(10,30,60,.18)}.notification-item{padding:18px 23px;border-top:1px solid var(--line)}.notification-item p{margin:0 0 7px;font-size:14px;line-height:1.7}.notification-item small{color:var(--muted);font-size:12px}
        .command-dialog{width:min(620px,calc(100vw - 28px));max-height:80vh;padding:0;color:var(--ink);background:var(--surface);border:1px solid var(--line);border-radius:19px;box-shadow:0 30px 100px rgba(0,0,0,.25)}.command-dialog::backdrop{background:rgba(7,20,42,.55)}.command-search{display:flex;align-items:center;gap:13px;padding:20px;border-bottom:1px solid var(--line)}.command-search>.icon{color:var(--muted)}.command-search input{width:100%;padding:0;background:transparent;border:0;outline:none;font-size:16px}.command-results{max-height:420px;padding:10px;overflow-y:auto}.command-result{display:flex;align-items:center;gap:13px;width:100%;min-height:67px;padding:12px;text-align:left;background:transparent;border:0;border-radius:11px}.command-result:hover,.command-result:focus-visible{background:var(--soft)}.command-result>.icon{color:var(--blue)}.command-result-title{display:block;font-size:14px;font-weight:600}.command-result-group{display:block;margin-top:4px;color:var(--muted);font-size:12px}.command-hint{display:flex;justify-content:space-between;gap:10px;padding:15px 20px;border-top:1px solid var(--line);color:var(--muted);font-size:12px}
        .drawer-backdrop,.mobile-bottom{display:none}body.sidebar-collapsed .sidebar{transform:translateX(-100%)}body.sidebar-collapsed .main{margin-left:0}
        @media(min-width:1800px){.content{padding:38px 45px}.hero{min-height:240px}}
        @media(max-width:1450px){:root{--sidebar-width:272px}.metrics{grid-template-columns:repeat(2,minmax(0,1fr))}.dashboard-grid{grid-template-columns:minmax(0,1.5fr) minmax(300px,1fr)}.hero-summary{display:none}.command-trigger{width:210px}.card-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
        @media(max-width:1100px){.sidebar{width:286px;transform:translateX(-100%)}.main,body.sidebar-collapsed .main{margin-left:0}body.drawer-open .sidebar{transform:translateX(0)}body.drawer-open{overflow:hidden}body.drawer-open .drawer-backdrop{display:block;position:fixed;z-index:65;inset:0;background:rgba(5,20,42,.55);border:0}}
        @media(max-width:800px){.content{padding:26px 23px 40px}.topbar{padding:17px 23px}.dashboard-grid{grid-template-columns:1fr}.right-stack{grid-template-columns:repeat(2,minmax(0,1fr));align-items:start}.right-stack>:last-child{grid-column:1 / -1}.breadcrumb-group,.breadcrumb>.icon{display:none}}
        @media(max-width:560px){.topbar{min-height:73px;padding:15px 17px;gap:10px}.topbar-left,.topbar-right{gap:7px}.breadcrumb{font-size:12px}.command-trigger{display:grid;place-items:center;width:38px;height:38px;padding:0}.command-trigger span,.command-trigger kbd,.topbar-right .role-pill{display:none}.icon-button{width:38px;height:38px}.content{padding:25px 17px 110px}.preview-note{font-size:11px}.page-heading{align-items:flex-start;margin-bottom:23px}.page-heading h1{font-size:28px}.page-description{max-width:290px;font-size:14px}.page-heading>.button{width:43px;min-height:43px;flex-shrink:0;padding:10px}.page-heading>.button span{display:none}.hero{min-height:235px;padding:25px;margin-bottom:19px;border-radius:18px}.hero h2{font-size:28px}.hero p{font-size:13px}.hero-label{font-size:11px}.hero-actions .button{font-size:12px;padding:10px 12px}.metrics{gap:11px;margin-bottom:19px}.metric{padding:17px;border-radius:14px}.metric-top{gap:7px;margin-bottom:16px}.metric-label{font-size:12px}.metric-value{font-size:clamp(24px,6.3vw,31px)}.metric-note{font-size:11px}.metric .tile-icon{width:29px;height:29px;border-radius:9px}.metric .tile-icon .icon{width:16px;height:16px}.stack,.dashboard-grid{gap:19px}.right-stack{grid-template-columns:1fr}.right-stack>:last-child{grid-column:auto}.panel-head{padding:21px 18px}.panel-head h2{font-size:16px}.panel-head p{font-size:12px}.loan-card{padding:0 18px 21px}.detail-grid{grid-template-columns:repeat(2,minmax(0,1fr))}.balance-value{font-size:30px}.chart-summary{flex-direction:column;align-items:flex-start;gap:13px;padding:0 19px}.chart{height:165px;margin-left:20px;margin-right:20px}.chart-value{font-size:30px}.data-table thead{display:none}.data-table,.data-table tbody{display:block}.data-table tr{display:flex;flex-wrap:wrap;align-items:flex-start;gap:12px;padding:18px;border-top:1px solid var(--line)}.data-table td{display:block;flex:1 1 42%;min-width:0;padding:0;border:0;white-space:normal}.data-table td::before{content:attr(data-label);display:block;margin-bottom:4px;color:var(--muted);font-size:11px}.record-title{white-space:normal}.table-footer{flex-wrap:wrap;padding:15px 18px;font-size:11px}.event{padding:20px 18px}.event h3{font-size:14px}.card-grid{grid-template-columns:1fr;gap:15px}.footer{flex-direction:column;gap:4px;font-size:11px}.notifications{top:68px;right:14px}.mobile-bottom{position:fixed;z-index:50;left:0;right:0;bottom:0;display:grid;grid-template-columns:repeat(4,1fr);padding:9px 10px calc(9px + env(safe-area-inset-bottom));background:var(--surface);border-top:1px solid var(--line);box-shadow:0 -5px 25px rgba(20,40,75,.035)}.mobile-nav{display:flex;flex-direction:column;align-items:center;gap:6px;min-height:50px;padding:6px;color:var(--muted);background:transparent;border:0;border-radius:10px;font-size:11px}.mobile-nav.active{color:var(--green);background:var(--green-soft)}.mobile-nav .icon{width:21px;height:21px}.nav-search input,.command-search input{font-size:16px}.command-hint{flex-wrap:wrap;font-size:11px}}
        @media(max-width:360px){.metrics{grid-template-columns:1fr}.metric-value{font-size:32px}.due-item{flex-wrap:wrap}.due-amount{margin-left:47px}}
        @media(prefers-reduced-motion:reduce){*,*::before,*::after{transition:none!important;animation:none!important}}
    </style>
</head>
<body>
<a href="#mainContent" class="skip-link">Skip to content</a>
<svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" aria-hidden="true" style="position:absolute">
    <defs>
        <symbol id="grid" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></symbol>
        <symbol id="users" viewBox="0 0 24 24"><circle cx="9" cy="7" r="3"/><path d="M3 21v-3a6 6 0 0 1 12 0v3M16 4a3 3 0 0 1 0 6M21 21v-3a6 6 0 0 0-3-5"/></symbol>
        <symbol id="user" viewBox="0 0 24 24"><circle cx="12" cy="7" r="4"/><path d="M4 21v-2a8 8 0 0 1 16 0v2"/></symbol>
        <symbol id="wallet" viewBox="0 0 24 24"><path d="M20 8V5H6a3 3 0 0 0 0 6h15v9H6a3 3 0 0 1-3-3V8M21 12h-5v5h5M17.5 14.5h.01"/></symbol>
        <symbol id="bank" viewBox="0 0 24 24"><path d="m3 7 9-4 9 4v3H3V7ZM3 21h18M6 10v8M10 10v8M14 10v8M18 10v8"/></symbol>
        <symbol id="bag" viewBox="0 0 24 24"><path d="M5 7h14l1 14H4L5 7ZM8 8V6a4 4 0 0 1 8 0v2"/></symbol>
        <symbol id="basket" viewBox="0 0 24 24"><path d="M3 9h18l-2 11H5L3 9ZM7 9l5-7 5 7M9 13v3M15 13v3"/></symbol>
        <symbol id="home" viewBox="0 0 24 24"><path d="m3 10 9-7 9 7M5 9v12h14V9M9 21v-8h6v8"/></symbol>
        <symbol id="laptop" viewBox="0 0 24 24"><rect x="4" y="3" width="16" height="13" rx="1.5"/><path d="m4 16-2 5h20l-2-5M10 18h4"/></symbol>
        <symbol id="layers" viewBox="0 0 24 24"><path d="m12 3 10 5-10 5L2 8l10-5ZM2 12l10 5 10-5M2 16l10 5 10-5"/></symbol>
        <symbol id="calendar" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 11h18M8 15h2M14 15h2"/></symbol>
        <symbol id="book" viewBox="0 0 24 24"><path d="M12 5C8 2 3 3 2 4v16c3-2 7-1 10 1 3-2 7-3 10-1V4c-3-2-7-1-10 1ZM12 5v16"/></symbol>
        <symbol id="chart" viewBox="0 0 24 24"><path d="M3 3v18h18M7 15l4-4 4 2 6-8"/></symbol>
        <symbol id="settings" viewBox="0 0 24 24"><circle cx="12" cy="12" r="4"/><path d="M12 2v3M12 19v3M2 12h3M19 12h3M5 5l2 2M17 17l2 2M5 19l2-2M17 7l2-2"/></symbol>
        <symbol id="message" viewBox="0 0 24 24"><path d="M21 15a3 3 0 0 1-3 3H9l-6 4V5a3 3 0 0 1 3-3h12a3 3 0 0 1 3 3v10ZM7 7h10M7 11h7"/></symbol>
        <symbol id="menu" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></symbol>
        <symbol id="search" viewBox="0 0 24 24"><circle cx="10.5" cy="10.5" r="6.5"/><path d="m16 16 5 5"/></symbol>
        <symbol id="chevron" viewBox="0 0 24 24"><path d="m9 5 7 7-7 7"/></symbol>
        <symbol id="arrow" viewBox="0 0 24 24"><path d="M5 12h14m-6-6 6 6-6 6"/></symbol>
        <symbol id="bell" viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9M10 21h4"/></symbol>
        <symbol id="moon" viewBox="0 0 24 24"><path d="M21 13A9 9 0 0 1 11 3a9 9 0 1 0 10 10Z"/></symbol>
        <symbol id="close" viewBox="0 0 24 24"><path d="m6 6 12 12M6 18 18 6"/></symbol>
        <symbol id="logout" viewBox="0 0 24 24"><path d="M9 3H4v18h5M10 12h11m-4-4 4 4-4 4"/></symbol>
    </defs>
</svg>
<button id="drawerBackdrop" type="button" class="drawer-backdrop" aria-label="Close navigation" tabindex="-1"></button>

<aside id="sidebar" class="sidebar" aria-label="{{ $isAdmin ? 'Administrator' : 'Member' }} navigation">
    <a href="{{ url('/') }}" class="brand">
        <span class="brand-mark {{ $hasLogo ? 'has-logo' : '' }}">
            @if ($hasLogo)<img src="{{ asset($logoPath) }}" alt="GIMMS">@else<span aria-hidden="true">G</span>@endif
        </span>
        <span><span class="brand-title">GIMMS</span><span class="brand-subtitle">Growing together.</span></span>
    </a>
    <div class="workspace">
        <span class="workspace-icon"><svg class="icon" aria-hidden="true"><use href="#{{ $isAdmin ? 'settings' : 'users' }}"></use></svg></span>
        <span><span class="workspace-title">{{ $isAdmin ? 'Administration' : 'Member workspace' }}</span><span class="workspace-subtitle">{{ $isAdmin ? 'Association operations' : 'Your association, connected' }}</span></span>
    </div>
    <div class="nav-search">
        <svg class="icon" aria-hidden="true"><use href="#search"></use></svg>
        <label for="navigationSearch" class="sr-only">Search navigation</label>
        <input id="navigationSearch" type="search" placeholder="Find a menu..." autocomplete="off">
    </div>
    <div class="sidebar-scroll">
        <p class="nav-label">{{ $isAdmin ? 'Admin workspace' : 'Member workspace' }}</p>
        <nav>
            <button type="button" class="nav-root active" data-page="overview" data-nav-search="overview dashboard home" aria-current="page"><svg class="icon" aria-hidden="true"><use href="#grid"></use></svg>Overview</button>
            @foreach ($menuGroups as $group)
                <div class="nav-group" data-group="{{ $group['id'] }}" data-group-title="{{ strtolower($group['title']) }}">
                    <button id="toggle-{{ $group['id'] }}" type="button" class="group-toggle" aria-expanded="false" aria-controls="submenu-{{ $group['id'] }}">
                        <svg class="icon" aria-hidden="true"><use href="#{{ $group['icon'] }}"></use></svg>
                        <span>{{ $group['title'] }}</span>
                        <svg class="icon group-chevron" aria-hidden="true"><use href="#chevron"></use></svg>
                    </button>
                    <div id="submenu-{{ $group['id'] }}" class="submenu" aria-labelledby="toggle-{{ $group['id'] }}" hidden>
                        @foreach ($group['children'] as $child)
                            <button type="button" class="sub-link" data-page="{{ $child['id'] }}" data-nav-search="{{ strtolower($child['title']) }}">
                                <span>{{ $child['title'] }}</span>
                                @isset($child['badge'])<span class="nav-badge">{{ $child['badge'] }}</span>@endisset
                            </button>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </nav>
        <p id="navigationEmpty" class="nav-empty" hidden>No matching menu items.</p>
    </div>
    <div class="sidebar-footer">
        <button type="button" class="user-button" data-page="profile">
            <span class="avatar">{{ $initials }}</span>
            <span><span class="user-name">{{ $userName }}</span><span class="user-role">{{ $isAdmin ? 'Administrator' : 'Association member' }}</span></span>
        </button>
        @if ($logoutUrl)
            <form action="{{ $logoutUrl }}" method="POST">@csrf<button type="submit" class="logout-button"><svg class="icon" aria-hidden="true"><use href="#logout"></use></svg>Sign out</button></form>
        @endif
    </div>
</aside>

<div class="main">
    <header class="topbar">
        <div class="topbar-left">
            <button id="menuButton" type="button" class="icon-button" aria-label="Toggle navigation" aria-controls="sidebar" aria-expanded="true"><svg class="icon" aria-hidden="true"><use href="#menu"></use></svg></button>
            <div class="breadcrumb"><span id="breadcrumbGroup" class="breadcrumb-group">Workspace</span><svg class="icon" aria-hidden="true"><use href="#chevron"></use></svg><span id="breadcrumbTitle" class="breadcrumb-current">Overview</span></div>
        </div>
        <div class="topbar-right">
            <button id="commandButton" type="button" class="command-trigger" aria-label="Search pages" aria-haspopup="dialog"><svg class="icon" aria-hidden="true"><use href="#search"></use></svg><span>Jump to a page...</span><kbd>Ctrl/⌘ K</kbd></button>
            <button id="themeButton" type="button" class="icon-button" aria-label="Switch to dark mode"><svg class="icon" aria-hidden="true"><use href="#moon"></use></svg></button>
            <button id="notificationButton" type="button" class="icon-button" aria-label="Open notifications" aria-controls="notificationPanel" aria-expanded="false"><svg class="icon" aria-hidden="true"><use href="#bell"></use></svg><span class="notification-dot"></span></button>
            <span class="role-pill">{{ $isAdmin ? 'ADMIN' : 'MEMBER' }}</span>
        </div>
    </header>
    <section id="notificationPanel" class="notifications" aria-labelledby="notificationTitle" hidden>
        <div class="panel-head"><h2 id="notificationTitle">Notifications</h2><button id="closeNotifications" type="button" class="icon-button" aria-label="Close notifications"><svg class="icon" aria-hidden="true"><use href="#close"></use></svg></button></div>
        <div class="notification-item"><p>{{ $isAdmin ? 'Loan applications are awaiting review.' : 'Your next sample loan repayment is scheduled for 25 October.' }}</p><small>Preview notification · Loan activity</small></div>
        <div class="notification-item"><p>The household purchase program is available to explore.</p><small>Preview notification · Sales programs</small></div>
    </section>

    <main id="mainContent" class="content" tabindex="-1">
        <p class="preview-note">UI preview · All figures, badges, names, products, dates, loan terms, and records are illustrative.</p>
        <div class="page-heading">
            <div><p id="pageEyebrow" class="eyebrow">{{ $isAdmin ? 'Administration' : 'Your workspace' }}</p><h1 id="pageTitle" tabindex="-1">Welcome back, {{ $firstName }}.</h1><p id="pageDescription" class="page-description">Membership, lending, product programs, and payments in one connected workspace.</p></div>
            <button type="button" class="button primary" data-page="{{ $isAdmin ? 'loan-applications' : 'loan-apply' }}"><svg class="icon" aria-hidden="true"><use href="#bank"></use></svg><span>{{ $isAdmin ? 'Review applications' : 'Explore a loan application' }}</span></button>
        </div>

        <section data-panel="overview">
            <div class="hero">
                <div>
                    <div class="hero-label">{{ $isAdmin ? 'Association at a glance' : 'More value from membership' }}</div>
                    <h2>{{ $isAdmin ? 'Lead with clarity. Build a stronger association.' : 'Support for today. Possibilities for tomorrow.' }}</h2>
                    <p>{{ $isAdmin ? 'Stay close to your members, oversee lending, track collections, and keep your sales programs moving.' : 'Stay on top of repayments, explore association sales programs, and manage your membership.' }}</p>
                    <div class="hero-actions">
                        <button type="button" class="button" data-page="{{ $isAdmin ? 'loan-overview' : 'loan-products' }}">{{ $isAdmin ? 'Loan portfolio' : 'Explore loan options' }}<svg class="icon" aria-hidden="true"><use href="#arrow"></use></svg></button>
                        <button type="button" class="button outline" data-page="sales-programs">{{ $isAdmin ? 'Manage sales programs' : 'Browse sales programs' }}</button>
                    </div>
                </div>
                <div class="hero-summary"><span>{{ $isAdmin ? 'Active loan accounts' : 'One connected workspace' }}</span><strong>{{ $isAdmin ? '146' : 'Your next step.' }}</strong><small>{{ $isAdmin ? 'Sample portfolio snapshot' : 'Membership · Loans · Purchases' }}</small></div>
            </div>
            <div class="metrics">
                @foreach ($metrics as $metric)
                    <article class="metric {{ $metric['tone'] }}-card"><div class="metric-top"><span class="metric-label">{{ $metric['label'] }}</span><span class="tile-icon {{ $metric['tone'] }}"><svg class="icon" aria-hidden="true"><use href="#{{ $metric['icon'] }}"></use></svg></span></div><span class="metric-value">{{ $metric['value'] }}</span><span class="metric-note">{{ $metric['note'] }}</span></article>
                @endforeach
            </div>
            <div class="dashboard-grid">
                <div class="stack">
                    @if ($isAdmin)
                        <section class="panel">
                            <div class="panel-head"><div><h2>Loan portfolio activity</h2><p>Sample cash activity · May–October · Amounts in millions of naira</p></div><button type="button" class="text-button" data-page="loan-overview">View portfolio</button></div>
                            <div class="chart-summary"><div class="chart-value">₦6.4m<small>Illustrative principal disbursed in October</small></div><div class="legend-list"><span class="legend">Disbursed</span><span class="legend secondary">Repayments</span></div></div>
                            <div class="chart" role="img" aria-label="Sample monthly disbursements and repayments. October: 6.4 million disbursed and 3.6 million repayments.">
                                @foreach ($chartData as [$month,$disbursed,$repaid])
                                    <div class="bar-group" aria-hidden="true"><div class="bar" style="--height:{{ ($disbursed / 7) * 100 }}%" title="{{ $month }}: ₦{{ $disbursed }}m disbursed"></div><div class="bar secondary" style="--height:{{ ($repaid / 7) * 100 }}%" title="{{ $month }}: ₦{{ $repaid }}m repayments"></div><span class="bar-label">{{ $month }}</span></div>
                                @endforeach
                            </div>
                        </section>
                    @else
                        <section class="panel">
                            <div class="panel-head"><div><h2>My active loan</h2><p>Personal support loan · LN-00241</p></div><span class="status">Active</span></div>
                            <div class="loan-card"><span class="balance-label">Outstanding principal</span><div class="balance-value">₦180,000</div><div class="progress-track" role="progressbar" aria-label="Sample principal repayment progress" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"><div class="progress-fill" style="--progress:40%"></div></div><div class="progress-caption"><span>₦120,000 principal repaid</span><span>40% of principal</span></div>
                                <div class="detail-grid"><div><span>Original principal</span><strong>₦300,000</strong></div><div><span>Next scheduled payment</span><strong>₦30,000</strong></div><div><span>Next due date</span><strong>25 Oct 2026</strong></div></div>
                                <button type="button" class="button" data-page="repayment-schedules" style="margin-top:21px">Repayment schedule<svg class="icon" aria-hidden="true"><use href="#arrow"></use></svg></button>
                                <p class="muted small" style="margin:15px 0 0">Sample figures. Principal is not the same as the full settlement amount. Show interest, fees, and payment allocations from your backend.</p>
                            </div>
                        </section>
                    @endif
                    <section class="panel">
                        <div class="panel-head"><div><h2>{{ $isAdmin ? 'Recent payment activity' : 'My recent payments' }}</h2><p>Contributions, loan repayments, and purchase payments stay distinct.</p></div><button type="button" class="text-button" data-page="transactions">View all<svg class="icon" aria-hidden="true"><use href="#arrow"></use></svg></button></div>
                        <div class="table-wrap"><table class="data-table"><thead><tr><th>Payment</th><th>Category</th><th>Amount</th><th>Status</th></tr></thead><tbody>
                            @foreach ($transactions as $transaction)
                                <tr><td data-label="Payment"><span class="record-title">{{ $transaction['title'] }}</span><span class="record-sub">{{ $transaction['ref'] }}</span></td><td data-label="Category">{{ $transaction['type'] }}</td><td data-label="Amount">{{ $transaction['amount'] }}</td><td data-label="Status"><span class="status {{ $transaction['status'] === 'Pending' ? 'pending' : '' }}">{{ $transaction['status'] }}</span></td></tr>
                            @endforeach
                        </tbody></table></div><div class="table-footer"><span>Illustrative payment records</span><span>Amounts in Nigerian naira</span></div>
                    </section>
                    <section class="panel">
                        <div class="panel-head"><div><h2>{{ $isAdmin ? 'Sales program shortcuts' : 'Explore association programs' }}</h2><p>Food, household, and technology purchase programs.</p></div><button type="button" class="text-button" data-page="products">Browse products</button></div>
                        <div class="quick-grid"><button type="button" class="quick-link" data-page="sales-programs"><span class="tile-icon green"><svg class="icon" aria-hidden="true"><use href="#basket"></use></svg></span><span>Food essentials program</span></button><button type="button" class="quick-link" data-page="sales-programs"><span class="tile-icon blue"><svg class="icon" aria-hidden="true"><use href="#home"></use></svg></span><span>Household purchase program</span></button></div>
                    </section>
                </div>
                <div class="stack right-stack">
                    <section class="panel"><div class="panel-head"><h2>Quick access</h2><span class="role-pill">WORKSPACE</span></div><div class="quick-grid">
                        @foreach ($quickActions as [$target,$label,$icon,$tone])
                            <button type="button" class="quick-link" data-page="{{ $target }}"><span class="tile-icon {{ $tone }}"><svg class="icon" aria-hidden="true"><use href="#{{ $icon }}"></use></svg></span><span>{{ $label }}</span></button>
                        @endforeach
                    </div></section>
                    <section class="panel">
                        <div class="panel-head"><div><h2>{{ $isAdmin ? 'Attention needed' : 'Due next' }}</h2><p>{{ $isAdmin ? 'Sample operational priorities' : 'Loan and purchase obligations are separate' }}</p></div></div>
                        @if ($isAdmin)
                            @foreach ([['bank','orange','Loan applications','Awaiting review','8','loan-applications'],['bag','purple','Orders to fulfill','Delivery or collection pending','16','orders'],['calendar','blue','Overdue loan accounts','Review account details','3','overdue-loans']] as [$icon,$tone,$title,$detail,$amount,$target])
                                <div class="due-item"><span class="tile-icon {{ $tone }}"><svg class="icon" aria-hidden="true"><use href="#{{ $icon }}"></use></svg></span><div class="due-main"><h3>{{ $title }}</h3><p>{{ $detail }}</p><button type="button" class="text-button" data-page="{{ $target }}" style="margin-top:7px">Open queue →</button></div><span class="due-amount">{{ $amount }}</span></div>
                            @endforeach
                        @else
                            <div class="due-item"><span class="tile-icon blue"><svg class="icon" aria-hidden="true"><use href="#bank"></use></svg></span><div class="due-main"><h3>Loan repayment</h3><p>25 Oct 2026 · LN-00241</p></div><span class="due-amount">₦30,000</span></div>
                            <div class="due-item"><span class="tile-icon purple"><svg class="icon" aria-hidden="true"><use href="#bag"></use></svg></span><div class="due-main"><h3>Purchase installment</h3><p>28 Oct 2026 · ORD-00418</p></div><span class="due-amount">₦15,000</span></div>
                        @endif
                    </section>
                    <section class="program-card"><span class="tile-icon"><svg class="icon" aria-hidden="true"><use href="#bag"></use></svg></span><h2>More possibilities<br>for everyday living.</h2><p>Explore available product programs and their approved pricing, availability, and payment terms.</p><button type="button" class="button" data-page="sales-programs">Explore programs<svg class="icon" aria-hidden="true"><use href="#arrow"></use></svg></button></section>
                    <section class="panel"><div class="panel-head"><h2>Community calendar</h2><button type="button" class="text-button" data-page="calendar">View all</button></div>
                        @foreach (array_slice($events,0,2) as $event)
                            <article class="event"><div class="event-date {{ $event['tone'] }}">{{ $event['day'] }}<small>{{ $event['month'] }}</small></div><div><h3>{{ $event['title'] }}</h3><p>{{ $event['detail'] }}</p></div></article>
                        @endforeach
                    </section>
                </div>
            </div>
        </section>

        {{-- All configured menu pages have a panel. Some are explicitly integration placeholders. --}}
        @foreach ($pages as $page)
            @continue($page['id'] === 'overview')
            <section data-panel="{{ $page['id'] }}" hidden>
                @if (in_array($page['id'],$financePages))
                    @php
                        $visibleTransactions = array_values(array_filter($transactions, fn ($transaction) => match ($page['id']) {
                            'contributions','member-contributions','contribution-payments' => $transaction['type'] === 'Contribution',
                            'repayments' => $transaction['type'] === 'Loan repayment',
                            default => true,
                        }));
                    @endphp
                    <section class="panel">
                        <div class="panel-head"><div><h2>{{ $page['title'] }}</h2><p>Sample payment records · No financial processing is connected.</p></div></div>
                        <div class="filters" aria-label="Filter payment records">@foreach (['All','Completed','Pending'] as $filter)<button type="button" class="filter {{ $loop->first ? 'active' : '' }}" data-filter="{{ $filter }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}">{{ $filter }}</button>@endforeach</div>
                        <div class="table-wrap"><table class="data-table"><thead><tr><th>Payment</th><th>Date / category</th><th>Amount</th><th>Status</th></tr></thead><tbody>
                            @foreach ($visibleTransactions as $transaction)
                                <tr data-status="{{ $transaction['status'] }}"><td data-label="Payment"><span class="record-title">{{ $transaction['title'] }}</span><span class="record-sub">{{ $transaction['ref'] }}</span></td><td data-label="Date / category"><span class="record-title">{{ $transaction['date'] }}</span><span class="record-sub">{{ $transaction['type'] }}</span></td><td data-label="Amount">{{ $transaction['amount'] }}</td><td data-label="Status"><span class="status {{ $transaction['status'] === 'Pending' ? 'pending' : '' }}">{{ $transaction['status'] }}</span></td></tr>
                            @endforeach
                        </tbody></table></div>
                        <p data-filter-empty class="module-placeholder muted" hidden>No records match this filter.</p>
                        <div class="table-footer"><span data-record-count>{{ count($visibleTransactions) }} records</span><span>Illustrative records only</span></div>
                    </section>
                @elseif (in_array($page['id'],$loanPages))
                    @php
                        $visibleLoans = $isAdmin ? $loans : $memberLoans;
                        $visibleLoans = array_values(array_filter($visibleLoans, fn ($loan) => match ($page['id']) {
                            'loan-applications','loan-approvals' => $loan['status'] === 'Under review',
                            'awaiting-disbursement' => $loan['status'] === 'Approved',
                            'active-loans','disbursements' => $loan['status'] === 'Active',
                            'overdue-loans' => $loan['status'] === 'Overdue',
                            default => true,
                        }));
                    @endphp
                    <section class="panel">
                        <div class="panel-head"><div><h2>{{ $page['title'] }}</h2><p>Sample loan accounts. Approval does not imply disbursement. No decisions can be submitted here.</p></div><span class="role-pill">{{ count($visibleLoans) }} RECORDS</span></div>
                        @if (count($visibleLoans))
                            <div class="table-wrap"><table class="data-table"><thead><tr><th>Loan</th><th>Original principal</th><th>Principal balance / stage</th><th>Status</th></tr></thead><tbody>
                                @foreach ($visibleLoans as $loan)
                                    <tr><td data-label="Loan"><span class="record-title">{{ $loan['title'] }}</span><span class="record-sub">{{ $loan['ref'] }} @if($isAdmin)· {{ $loan['member'] }}@endif</span></td><td data-label="Original principal">{{ $loan['principal'] }}</td><td data-label="Principal balance / stage">{{ $loan['balance'] }}</td><td data-label="Status"><span class="status {{ $loan['status'] === 'Overdue' ? 'danger' : (in_array($loan['status'],['Under review','Approved']) ? 'pending' : '') }}">{{ $loan['status'] }}</span></td></tr>
                                @endforeach
                            </tbody></table></div>
                        @else
                            <div class="module-placeholder"><h2>No sample records in this view</h2><p>Your authorized loan records will appear here.</p></div>
                        @endif
                        <div class="table-footer"><span>Principal balances exclude undisplayed interest and fees.</span></div>
                    </section>
                @elseif ($page['id'] === 'repayment-schedules')
                    <section class="panel"><div class="panel-head"><div><h2>Loan repayment schedule</h2><p>Sample preview of three upcoming scheduled payments · LN-00241</p></div></div>
                        @foreach (['25 Oct 2026','25 Nov 2026','25 Dec 2026'] as $date)
                            <div class="due-item"><span class="tile-icon blue"><svg class="icon" aria-hidden="true"><use href="#calendar"></use></svg></span><div class="due-main"><h3>Personal support loan</h3><p>{{ $date }} · Scheduled payment</p></div><span class="due-amount">₦30,000</span></div>
                        @endforeach
                        <div class="table-footer"><span>Connect the full principal, interest, fees, and allocation schedule.</span></div>
                    </section>
                @elseif (in_array($page['id'],['products','sales-programs','sales-overview']))
                    <div class="card-grid">
                        @foreach ($products as $product)
                            <article class="product-card"><div class="product-art {{ $product['tone'] }}" aria-hidden="true"><svg class="icon"><use href="#{{ $product['icon'] }}"></use></svg></div><div class="product-body"><span class="product-category">{{ $product['category'] }}</span><h2>{{ $product['name'] }}</h2><p>{{ $product['description'] }}</p><span class="product-price">{{ $product['price'] }}</span><div class="product-footer"><span class="small muted">{{ $product['program'] }}</span><span class="status">Preview</span></div><p class="small" style="margin-top:15px">Illustration only. Connect approved stock, pricing, specifications, and program payment terms.</p></div></article>
                        @endforeach
                    </div>
                @elseif (in_array($page['id'],['orders','deliveries']))
                    <section class="panel"><div class="panel-head"><div><h2>{{ $page['title'] }}</h2><p>Payment and fulfillment statuses are intentionally separate.</p></div></div><div class="table-wrap"><table class="data-table"><thead><tr><th>Order</th><th>Total / paid</th><th>Payment status</th><th>Fulfillment</th></tr></thead><tbody>
                        @foreach ($orders as $order)
                            <tr><td data-label="Order"><span class="record-title">{{ $order['name'] }}</span><span class="record-sub">{{ $order['ref'] }}</span></td><td data-label="Total / paid"><span class="record-title">{{ $order['total'] }}</span><span class="record-sub">Paid: {{ $order['paid'] }}</span></td><td data-label="Payment status"><span class="status {{ $order['payment'] === 'Part paid' ? 'pending' : '' }}">{{ $order['payment'] }}</span></td><td data-label="Fulfillment"><span class="status {{ $order['fulfillment'] === 'Processing' ? 'pending' : '' }}">{{ $order['fulfillment'] }}</span></td></tr>
                        @endforeach
                    </tbody></table></div></section>
                @elseif ($page['id'] === 'installments')
                    <section class="panel"><div class="panel-head"><div><h2>Household purchase plan</h2><p>ORD-00418 · This is a purchase installment plan, not a loan.</p></div><span class="status">Active</span></div><div class="loan-card"><span class="balance-label">Remaining purchase balance</span><div class="balance-value">₦45,000</div><div class="detail-grid"><div><span>Order total</span><strong>₦165,000</strong></div><div><span>Recorded payments</span><strong>₦120,000</strong></div><div><span>Next installment</span><strong>₦15,000</strong></div></div><p class="muted small" style="margin-top:20px">Sample plan. Live schedules must show each due date, payment allocation, and applicable charges.</p></div></section>
                @elseif ($page['id'] === 'members')
                    <div class="card-grid">@foreach ($members as $member)<article class="profile-card"><span class="avatar {{ $member['tone'] }}">{{ $member['initials'] }}</span><h2>{{ $member['name'] }}</h2><p>{{ $member['detail'] }}</p><span class="status" style="margin-top:19px">Active member</span></article>@endforeach</div>
                @elseif ($page['id'] === 'calendar')
                    <section class="panel">@foreach ($events as $event)<article class="event"><div class="event-date {{ $event['tone'] }}">{{ $event['day'] }}<small>{{ $event['month'] }}</small></div><div><h3>{{ $event['title'] }}</h3><p>{{ $event['detail'] }}</p></div></article>@endforeach</section>
                @elseif ($page['id'] === 'library')
                    <div class="card-grid">@foreach ([['books','Recommended books','Reading to inspire your next chapter.','blue'],['courses','Recommended courses','Learning for your next step.','purple'],['sales-programs','Association programs','Explore available product programs.','green']] as [$target,$title,$description,$tone])<article class="module-card"><span class="tile-icon {{ $tone }}"><svg class="icon" aria-hidden="true"><use href="#book"></use></svg></span><h2>{{ $title }}</h2><p>{{ $description }}</p><button type="button" class="text-button" data-page="{{ $target }}">Explore section<svg class="icon" aria-hidden="true"><use href="#arrow"></use></svg></button></article>@endforeach</div>
                @elseif ($page['id'] === 'profile')
                    <section class="panel"><div class="panel-head"><div><h2>{{ $userName }}</h2><p>{{ $isAdmin ? 'Administrator' : 'Association member' }}</p></div><span class="avatar">{{ $initials }}</span></div><div style="padding:0 23px 25px"><p class="page-description">Connect your profile, password, and account security forms here.</p><button id="profileThemeButton" type="button" class="button" style="margin-top:20px"><svg class="icon" aria-hidden="true"><use href="#moon"></use></svg>Change appearance</button></div></section>
                @elseif (in_array($page['id'],['loan-products','loan-apply']))
                    <section class="panel module-placeholder"><span class="tile-icon green"><svg class="icon" aria-hidden="true"><use href="#bank"></use></svg></span><h2>{{ $page['title'] }}</h2><p>Connect approved loan products, eligibility checks, repayment terms, interest, fees, and your authorized application workflow.</p><p>This preview does not calculate borrowing limits or submit applications.</p></section>
                @elseif ($page['id'] === 'audit')
                    <section class="panel"><div class="panel-head"><div><h2>Audit activity preview</h2><p>Illustrative events, not a real audit trail.</p></div></div><div class="table-wrap"><table class="data-table"><thead><tr><th>Event</th><th>Actor</th><th>Module</th><th>Time</th></tr></thead><tbody><tr><td data-label="Event">Loan application viewed</td><td data-label="Actor">Sample administrator</td><td data-label="Module">Loan management</td><td data-label="Time">Today · 09:40</td></tr><tr><td data-label="Event">Product pricing updated</td><td data-label="Actor">Sample administrator</td><td data-label="Module">Sales programs</td><td data-label="Time">Yesterday · 15:10</td></tr></tbody></table></div></section>
                @elseif ($page['id'] === 'announcements')
                    <div class="card-grid"><article class="module-card"><span class="tile-icon blue"><svg class="icon" aria-hidden="true"><use href="#message"></use></svg></span><h2>Community meeting</h2><p>Sample announcement: review the community calendar for the next association meeting.</p><button type="button" class="text-button" data-page="calendar">Open calendar →</button></article><article class="module-card"><span class="tile-icon purple"><svg class="icon" aria-hidden="true"><use href="#bag"></use></svg></span><h2>Association sales programs</h2><p>Sample announcement: explore food, household, and technology program previews.</p><button type="button" class="text-button" data-page="sales-programs">Explore programs →</button></article></div>
                @else
                    <section class="panel module-placeholder"><span class="tile-icon blue"><svg class="icon" aria-hidden="true"><use href="#{{ $page['icon'] }}"></use></svg></span><h2>{{ $page['title'] }}</h2><p>This {{ strtolower($page['title']) }} page is an integration placeholder within the complete navigation interface.</p><p>Connect your existing authorized controller, tenant-scoped data, and forms. No changes, approvals, financial processing, or documents are simulated here.</p></section>
                @endif
            </section>
        @endforeach
        <footer class="footer"><span>© {{ date('Y') }} GIMMS. Great Ideas Multipurpose Society.</span><span>Membership. Finance. Shared opportunity.</span></footer>
    </main>
</div>

@php
    $mobileItems = $isAdmin
        ? [['overview','Home','grid'],['loan-applications','Loans','bank'],['orders','Orders','bag'],['transactions','Finance','wallet']]
        : [['overview','Home','grid'],['active-loans','My loans','bank'],['products','Shop','bag'],['contributions','Contributions','wallet']];
@endphp
<nav class="mobile-bottom" aria-label="Mobile navigation">
    @foreach ($mobileItems as [$target,$label,$icon])
        <button type="button" class="mobile-nav {{ $loop->first ? 'active' : '' }}" data-page="{{ $target }}" @if($loop->first) aria-current="page" @endif><svg class="icon" aria-hidden="true"><use href="#{{ $icon }}"></use></svg>{{ $label }}</button>
    @endforeach
</nav>

<dialog id="commandDialog" class="command-dialog" aria-labelledby="commandTitle">
    <h2 id="commandTitle" class="sr-only">Search workspace pages</h2>
    <div class="command-search"><svg class="icon" aria-hidden="true"><use href="#search"></use></svg><label for="commandSearch" class="sr-only">Search pages</label><input id="commandSearch" type="search" placeholder="Search loans, orders, members..." autocomplete="off"><button id="closeCommand" type="button" class="icon-button" aria-label="Close search"><svg class="icon" aria-hidden="true"><use href="#close"></use></svg></button></div>
    <div class="command-results">
        @foreach ($pages as $page)
            <button type="button" class="command-result" data-page="{{ $page['id'] }}" data-command-search="{{ strtolower($page['title'].' '.$page['group']) }}"><svg class="icon" aria-hidden="true"><use href="#{{ $page['icon'] }}"></use></svg><span><span class="command-result-title">{{ $page['title'] }}</span><span class="command-result-group">{{ $page['group'] }}</span></span></button>
        @endforeach
        <p id="commandEmpty" class="module-placeholder" role="status" hidden>No matching pages.</p>
    </div>
    <div class="command-hint"><span>↑ ↓ Navigate · Enter Open</span><span>Esc Close</span></div>
</dialog>

<script>
(() => {
    const pages = @json($pages);
    const externalRoutes = @json($pageRoutes);
    const pageMap = new Map(pages.map(page => [page.id, page]));
    const welcomeTitle = @json('Welcome back, '.$firstName.'.');
    const body = document.body;
    const sidebar = document.getElementById('sidebar');
    const menuButton = document.getElementById('menuButton');
    const mobileQuery = window.matchMedia('(max-width: 1100px)');
    const groups = [...document.querySelectorAll('.nav-group')];
    const panels = [...document.querySelectorAll('[data-panel]')];
    const pageButtons = [...document.querySelectorAll('[data-page]')];
    const navSearch = document.getElementById('navigationSearch');
    const navEmpty = document.getElementById('navigationEmpty');
    const commandDialog = document.getElementById('commandDialog');
    const commandSearch = document.getElementById('commandSearch');
    const commandResults = [...document.querySelectorAll('.command-result')];
    const notifications = document.getElementById('notificationPanel');
    const notificationButton = document.getElementById('notificationButton');
    let expandedBeforeSearch = null;

    const descriptions = {
        overview:'Membership, lending, product programs, and payments in one connected workspace.',
        'loan-overview':'Review your association loan portfolio without mixing principal with sales or contributions.',
        'loan-applications':'Track loan applications and their current review stage.',
        'loan-approvals':'Review applications through your authorized approval workflow.',
        'awaiting-disbursement':'Approved applications that have not yet been disbursed.',
        'active-loans':'Review active loans and outstanding principal.',
        'overdue-loans':'Review overdue loan accounts and follow-up requirements.',
        'repayment-schedules':'Keep track of upcoming loan repayment dates.',
        repayments:'Review loan repayments separately from other payment categories.',
        products:'Explore sample products, program pricing, and availability.',
        'sales-programs':'Explore association product sales programs.',
        orders:'Order fulfillment and payment status are tracked separately.',
        installments:'Review purchase installment balances and schedules.',
        contributions:'Review recorded association contributions.',
        transactions:'Contributions, loan repayments, and purchase payments in one categorized history.',
        profile:'Your account information and appearance preferences.'
    };

    function setGroup(group, expanded) {
        group.querySelector('.group-toggle').setAttribute('aria-expanded', String(expanded));
        group.querySelector('.submenu').hidden = !expanded;
    }
    groups.forEach(group => {
        const toggle = group.querySelector('.group-toggle');
        toggle.addEventListener('click', () => setGroup(group, toggle.getAttribute('aria-expanded') !== 'true'));
    });

    function syncSidebar() {
        const hidden = mobileQuery.matches
            ? !body.classList.contains('drawer-open')
            : body.classList.contains('sidebar-collapsed');
        sidebar.inert = hidden;
        sidebar.setAttribute('aria-hidden', String(hidden));
        menuButton.setAttribute('aria-expanded', String(!hidden));
    }
    function closeDrawer(returnFocus = false) {
        body.classList.remove('drawer-open');
        syncSidebar();
        if (returnFocus) menuButton.focus();
    }
    menuButton.addEventListener('click', () => {
        if (mobileQuery.matches) {
            const opening = !body.classList.contains('drawer-open');
            body.classList.toggle('drawer-open', opening);
            syncSidebar();
            if (opening) navSearch.focus();
        } else {
            body.classList.toggle('sidebar-collapsed');
            syncSidebar();
        }
    });
    document.getElementById('drawerBackdrop').addEventListener('click', () => closeDrawer(true));
    mobileQuery.addEventListener('change', () => {
        body.classList.remove('drawer-open');
        syncSidebar();
    });

    function filterNavigation() {
        const query = navSearch.value.trim().toLowerCase();
        if (query && expandedBeforeSearch === null) {
            expandedBeforeSearch = new Map(groups.map(group => [
                group.dataset.group,
                group.querySelector('.group-toggle').getAttribute('aria-expanded') === 'true'
            ]));
        }
        let matches = 0;
        const overview = document.querySelector('.nav-root');
        const showOverview = !query || overview.dataset.navSearch.includes(query);
        overview.hidden = !showOverview;
        if (showOverview) matches++;
        groups.forEach(group => {
            const parentMatches = group.dataset.groupTitle.includes(query);
            let visibleChildren = 0;
            group.querySelectorAll('.sub-link').forEach(link => {
                const visible = !query || parentMatches || link.dataset.navSearch.includes(query);
                link.hidden = !visible;
                if (visible) visibleChildren++;
            });
            group.hidden = visibleChildren === 0;
            matches += visibleChildren;
            if (query && visibleChildren) setGroup(group, true);
            else if (!query && expandedBeforeSearch) {
                setGroup(group, expandedBeforeSearch.get(group.dataset.group) || group.classList.contains('has-active'));
            }
        });
        if (!query) expandedBeforeSearch = null;
        navEmpty.hidden = matches !== 0;
    }
    navSearch.addEventListener('input', filterNavigation);

    function closeNotifications() {
        notifications.hidden = true;
        notificationButton.setAttribute('aria-expanded', 'false');
    }
    notificationButton.addEventListener('click', () => {
        const opening = notifications.hidden;
        notifications.hidden = !opening;
        notificationButton.setAttribute('aria-expanded', String(opening));
    });
    document.getElementById('closeNotifications').addEventListener('click', () => {
        closeNotifications();
        notificationButton.focus();
    });
    document.addEventListener('click', event => {
        if (!notifications.contains(event.target) && !notificationButton.contains(event.target)) closeNotifications();
    });

    function showPage(id, updateHistory = true, focusHeading = true) {
        const page = pageMap.get(id) || pageMap.get('overview');
        navSearch.value = '';
        filterNavigation();
        panels.forEach(panel => { panel.hidden = panel.dataset.panel !== page.id; });
        pageButtons.forEach(button => {
            const isNavigation = button.classList.contains('nav-root') || button.classList.contains('sub-link') || button.classList.contains('mobile-nav');
            if (!isNavigation) return;
            const active = button.dataset.page === page.id;
            button.classList.toggle('active', active);
            if (active) button.setAttribute('aria-current', 'page');
            else button.removeAttribute('aria-current');
        });
        groups.forEach(group => {
            const active = [...group.querySelectorAll('.sub-link')].some(link => link.dataset.page === page.id);
            group.classList.toggle('has-active', active);
            if (active) setGroup(group, true);
        });
        document.getElementById('breadcrumbGroup').textContent = page.group;
        document.getElementById('breadcrumbTitle').textContent = page.title;
        document.getElementById('pageEyebrow').textContent = page.group;
        const heading = document.getElementById('pageTitle');
        heading.textContent = page.id === 'overview' ? welcomeTitle : page.title;
        document.getElementById('pageDescription').textContent = descriptions[page.id] || `Explore your ${page.title.toLowerCase()} workspace.`;
        document.title = `${page.title} · GIMMS`;
        if (commandDialog.open) commandDialog.close();
        closeNotifications();
        closeDrawer();
        if (updateHistory && location.hash !== `#${page.id}`) history.pushState(null, '', `#${page.id}`);
        window.scrollTo({top:0, behavior:'auto'});
        if (focusHeading) heading.focus({preventScroll:true});
    }
    pageButtons.forEach(button => {
        button.addEventListener('click', () => {
            const target = button.dataset.page;
            if (externalRoutes[target]) {
                window.location.assign(externalRoutes[target]);
                return;
            }
            showPage(target);
        });
    });
    window.addEventListener('popstate', () => showPage(location.hash.slice(1), false));

    document.querySelectorAll('[data-filter]').forEach(button => {
        button.addEventListener('click', () => {
            const panel = button.closest('.panel');
            const selected = button.dataset.filter;
            panel.querySelectorAll('[data-filter]').forEach(filter => {
                const active = filter === button;
                filter.classList.toggle('active', active);
                filter.setAttribute('aria-pressed', String(active));
            });
            let count = 0;
            panel.querySelectorAll('[data-status]').forEach(row => {
                const visible = selected === 'All' || row.dataset.status === selected;
                row.hidden = !visible;
                if (visible) count++;
            });
            panel.querySelector('[data-record-count]').textContent = `${count} ${count === 1 ? 'record' : 'records'}`;
            panel.querySelector('[data-filter-empty]').hidden = count !== 0;
        });
    });

    const themeButton = document.getElementById('themeButton');
    function setTheme(theme) {
        document.documentElement.dataset.theme = theme;
        themeButton.setAttribute('aria-label', theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode');
        try { localStorage.setItem('gimms-dashboard-theme', theme); } catch (error) {}
    }
    function toggleTheme() {
        setTheme(document.documentElement.dataset.theme === 'dark' ? 'light' : 'dark');
    }
    themeButton.addEventListener('click', toggleTheme);
    document.getElementById('profileThemeButton')?.addEventListener('click', toggleTheme);
    let initialTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    try {
        const saved = localStorage.getItem('gimms-dashboard-theme');
        if (saved === 'light' || saved === 'dark') initialTheme = saved;
    } catch (error) {}
    setTheme(initialTheme);

    function filterCommands() {
        const query = commandSearch.value.trim().toLowerCase();
        let matches = 0;
        commandResults.forEach(result => {
            const visible = result.dataset.commandSearch.includes(query);
            result.hidden = !visible;
            if (visible) matches++;
        });
        document.getElementById('commandEmpty').hidden = matches !== 0;
    }
    function openCommand() {
        closeNotifications();
        closeDrawer();
        commandSearch.value = '';
        filterCommands();
        if (!commandDialog.open) commandDialog.showModal();
        commandSearch.focus();
    }
    document.getElementById('commandButton').addEventListener('click', openCommand);
    document.getElementById('closeCommand').addEventListener('click', () => commandDialog.close());
    commandSearch.addEventListener('input', filterCommands);
    commandDialog.addEventListener('click', event => {
        if (event.target !== commandDialog) return;
        const bounds = commandDialog.getBoundingClientRect();
        if (event.clientX < bounds.left || event.clientX > bounds.right || event.clientY < bounds.top || event.clientY > bounds.bottom) commandDialog.close();
    });
    commandDialog.addEventListener('keydown', event => {
        const results = commandResults.filter(result => !result.hidden);
        const index = results.indexOf(document.activeElement);
        if (event.key === 'ArrowDown' && results.length) {
            event.preventDefault();
            results[index < 0 ? 0 : (index + 1) % results.length].focus();
        }
        if (event.key === 'ArrowUp' && results.length) {
            event.preventDefault();
            results[index <= 0 ? results.length - 1 : index - 1].focus();
        }
        if (event.key === 'Enter' && document.activeElement === commandSearch && results.length) {
            event.preventDefault();
            results[0].click();
        }
    });
    document.addEventListener('keydown', event => {
        if ((event.ctrlKey || event.metaKey) && event.key.toLowerCase() === 'k') {
            event.preventDefault();
            if (commandDialog.open) commandDialog.close(); else openCommand();
            return;
        }
        if (event.key === 'Escape' && !commandDialog.open) {
            closeNotifications();
            if (body.classList.contains('drawer-open')) closeDrawer(true);
        }
        if (event.key !== 'Tab' || !mobileQuery.matches || !body.classList.contains('drawer-open') || commandDialog.open) return;
        const focusable = [...sidebar.querySelectorAll('a[href],button:not([disabled]),input:not([disabled])')].filter(element => element.getClientRects().length);
        const first = focusable[0], last = focusable[focusable.length - 1];
        if (event.shiftKey && document.activeElement === first) {
            event.preventDefault(); last?.focus();
        } else if (!event.shiftKey && document.activeElement === last) {
            event.preventDefault(); first?.focus();
        }
    });
    syncSidebar();
    showPage(location.hash.slice(1) || 'overview', false, false);
})();
</script>
</body>
</html>
