@extends('layouts.userLayout')
@section('title', 'Dashboard')
@section('content')

    <div class="page-head">
        <div>
            <h1 class="page-title">Dashboard</h1>
            <p class="page-sub">Cooperative performance overview · October 2026</p>
        </div>

        <div class="head-actions">
            <button class="btn">
                <i class="fa-solid fa-file-export"></i> Export Report
            </button>

            <button class="btn btn-gold">
                <i class="fa-solid fa-hand-holding-dollar"></i> New Loan
            </button>

            <button class="btn btn-primary">
                <i class="fa-solid fa-plus"></i> New Sale
            </button>
        </div>
    </div>

    <!-- KPIs -->
    <div class="kpi-grid">
        <div class="card kpi">
            <div class="kpi-top">
                <div class="kpi-label">Total Members</div>
                <div class="kpi-icon teal"><i class="fa-solid fa-users"></i></div>
            </div>
            <div class="kpi-value">1,248</div>
            <div class="kpi-trend up">
                <i class="fa-solid fa-arrow-trend-up"></i> 36 new members this month
            </div>
        </div>

        <div class="card kpi">
            <div class="kpi-top">
                <div class="kpi-label">Total Savings</div>
                <div class="kpi-icon blue"><i class="fa-solid fa-piggy-bank"></i></div>
            </div>
            <div class="kpi-value">₦184.6M</div>
            <div class="kpi-trend up">
                <i class="fa-solid fa-arrow-trend-up"></i> ₦7.2M this month
            </div>
        </div>

        <div class="card kpi">
            <div class="kpi-top">
                <div class="kpi-label">Loan Portfolio</div>
                <div class="kpi-icon amber"><i class="fa-solid fa-hand-holding-dollar"></i></div>
            </div>
            <div class="kpi-value">₦92.4M</div>
            <div class="kpi-trend down">
                <i class="fa-solid fa-triangle-exclamation"></i> 27 overdue loans
            </div>
        </div>

        <div class="card kpi">
            <div class="kpi-top">
                <div class="kpi-label">Monthly Sales</div>
                <div class="kpi-icon red"><i class="fa-solid fa-cart-shopping"></i></div>
            </div>
            <div class="kpi-value">₦12.8M</div>
            <div class="kpi-trend up">
                <i class="fa-solid fa-arrow-trend-up"></i> 14.6% vs last month
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="grid-2">
        <div class="card">
            <div class="card-head">
                <div>
                    <h2 class="card-title">Financial Performance</h2>
                    <p class="card-sub">Collections, disbursements, sales and expenses</p>
                </div>
                <button class="btn"><i class="fa-solid fa-calendar"></i> This Year</button>
            </div>

            <div class="card-body">
                <div class="chart-box">
                    <canvas id="financeChart"></canvas>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-head">
                <div>
                    <h2 class="card-title">Loan Portfolio Health</h2>
                    <p class="card-sub">Portfolio distribution</p>
                </div>
            </div>

            <div class="card-body">
                <div class="donut-box">
                    <canvas id="loanChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Loan applications + approvals -->
    <div class="grid-2">
        <div class="card">
            <div class="card-head">
                <div>
                    <h2 class="card-title">Recent Loan Applications</h2>
                    <p class="card-sub">Awaiting review and approval</p>
                </div>
                <button class="btn"><i class="fa-solid fa-eye"></i> View All</button>
            </div>

            <div style="overflow-x:auto">
                <table>
                    <thead>
                        <tr>
                            <th>Member</th>
                            <th>Loan ID</th>
                            <th>Amount</th>
                            <th>Purpose</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <div class="member">
                                    <div class="member-avatar" style="background:#0f766e">MI</div>
                                    <div>
                                        <strong>Musa Ibrahim</strong><br>
                                        <span style="color:var(--muted)">M-1042</span>
                                    </div>
                                </div>
                            </td>
                            <td>LN-2043</td>
                            <td><strong>₦750,000</strong></td>
                            <td>Business expansion</td>
                            <td><span class="status warning"><i class="fa-solid fa-clock"></i>
                                    Pending</span></td>
                            <td>
                                <div class="actions">
                                    <button class="mini-btn approve"><i class="fa-solid fa-check"></i>
                                        Approve</button>
                                    <button class="mini-btn reject"><i class="fa-solid fa-xmark"></i>
                                        Reject</button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="member">
                                    <div class="member-avatar" style="background:#2563eb">AY</div>
                                    <div>
                                        <strong>Amina Yusuf</strong><br>
                                        <span style="color:var(--muted)">M-1088</span>
                                    </div>
                                </div>
                            </td>
                            <td>LN-2044</td>
                            <td><strong>₦250,000</strong></td>
                            <td>School fees</td>
                            <td><span class="status info"><i class="fa-solid fa-magnifying-glass"></i>
                                    Under Review</span></td>
                            <td>
                                <div class="actions">
                                    <button class="mini-btn approve"><i class="fa-solid fa-check"></i>
                                        Approve</button>
                                    <button class="mini-btn reject"><i class="fa-solid fa-xmark"></i>
                                        Reject</button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="member">
                                    <div class="member-avatar" style="background:#b45309">TA</div>
                                    <div>
                                        <strong>Tunde Adeyemi</strong><br>
                                        <span style="color:var(--muted)">M-1121</span>
                                    </div>
                                </div>
                            </td>
                            <td>LN-2045</td>
                            <td><strong>₦1,200,000</strong></td>
                            <td>Equipment purchase</td>
                            <td><span class="status warning"><i class="fa-solid fa-clock"></i>
                                    Pending</span></td>
                            <td>
                                <div class="actions">
                                    <button class="mini-btn approve"><i class="fa-solid fa-check"></i>
                                        Approve</button>
                                    <button class="mini-btn reject"><i class="fa-solid fa-xmark"></i>
                                        Reject</button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="member">
                                    <div class="member-avatar" style="background:#059669">GO</div>
                                    <div>
                                        <strong>Grace Okon</strong><br>
                                        <span style="color:var(--muted)">M-1156</span>
                                    </div>
                                </div>
                            </td>
                            <td>LN-2046</td>
                            <td><strong>₦400,000</strong></td>
                            <td>Trade finance</td>
                            <td><span class="status success"><i class="fa-solid fa-circle-check"></i>
                                    Approved</span></td>
                            <td>
                                <button class="mini-btn"><i class="fa-solid fa-eye"></i> View</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-head">
                <div>
                    <h2 class="card-title">Approvals Queue</h2>
                    <p class="card-sub">Requires administrator action</p>
                </div>
            </div>

            <div class="card-body">
                <div class="target-row">
                    <div><i class="fa-solid fa-hand-holding-dollar"></i> Loan Applications</div>
                    <strong>18 pending</strong>
                </div>
                <div class="progress"><span style="width:72%"></span></div>

                <div class="target-row" style="margin-top:18px">
                    <div><i class="fa-solid fa-money-bill-transfer"></i> Withdrawal Requests</div>
                    <strong>12 pending</strong>
                </div>
                <div class="progress"><span style="width:48%; background:var(--gold)"></span></div>

                <div class="target-row" style="margin-top:18px">
                    <div><i class="fa-solid fa-user-plus"></i> Membership Applications</div>
                    <strong>9 pending</strong>
                </div>
                <div class="progress"><span style="width:35%; background:var(--info)"></span></div>

                <div class="target-row" style="margin-top:18px">
                    <div><i class="fa-solid fa-receipt"></i> Expense Claims</div>
                    <strong>6 pending</strong>
                </div>
                <div class="progress"><span style="width:28%; background:var(--danger)"></span></div>
            </div>
        </div>
    </div>

    <!-- Sales + activity -->
    <div class="grid-2">
        <div class="card">
            <div class="card-head">
                <div>
                    <h2 class="card-title">Recent Sales</h2>
                    <p class="card-sub">Latest transactions across cooperative outlets</p>
                </div>
                <button class="btn"><i class="fa-solid fa-chart-column"></i> Sales Report</button>
            </div>

            <div style="overflow-x:auto">
                <table>
                    <thead>
                        <tr>
                            <th>Invoice</th>
                            <th>Customer</th>
                            <th>Product</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>INV-9041</td>
                            <td>Green Farms Ltd</td>
                            <td>Fertilizer</td>
                            <td><strong>₦320,000</strong></td>
                            <td><i class="fa-solid fa-building-columns"></i> Bank Transfer</td>
                            <td><span class="status success"><i class="fa-solid fa-circle-check"></i>
                                    Paid</span></td>
                        </tr>

                        <tr>
                            <td>INV-9042</td>
                            <td>Musa Ibrahim</td>
                            <td>Cement</td>
                            <td><strong>₦85,000</strong></td>
                            <td><i class="fa-solid fa-money-bill"></i> Cash</td>
                            <td><span class="status success"><i class="fa-solid fa-circle-check"></i>
                                    Paid</span></td>
                        </tr>

                        <tr>
                            <td>INV-9043</td>
                            <td>Amina Yusuf</td>
                            <td>Cooking Gas</td>
                            <td><strong>₦42,500</strong></td>
                            <td><i class="fa-solid fa-credit-card"></i> POS</td>
                            <td><span class="status success"><i class="fa-solid fa-circle-check"></i>
                                    Paid</span></td>
                        </tr>

                        <tr>
                            <td>INV-9044</td>
                            <td>Tunde Adeyemi</td>
                            <td>Roofing Sheets</td>
                            <td><strong>₦410,000</strong></td>
                            <td><i class="fa-solid fa-hourglass-half"></i> Credit</td>
                            <td><span class="status warning"><i class="fa-solid fa-clock"></i> Part
                                    Payment</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-head">
                <div>
                    <h2 class="card-title">Recent Activity</h2>
                    <p class="card-sub">System and member activity</p>
                </div>
            </div>

            <div class="card-body">
                <ul class="feed">
                    <li>
                        <div class="feed-icon"><i class="fa-solid fa-piggy-bank"></i></div>
                        <div>
                            <div class="feed-text"><strong>Amina Yusuf</strong> made a savings deposit of
                                ₦50,000.</div>
                            <div class="feed-time">12 minutes ago</div>
                        </div>
                    </li>

                    <li>
                        <div class="feed-icon"><i class="fa-solid fa-hand-holding-dollar"></i></div>
                        <div>
                            <div class="feed-text">Loan <strong>LN-2043</strong> was disbursed to Musa
                                Ibrahim.</div>
                            <div class="feed-time">1 hour ago</div>
                        </div>
                    </li>

                    <li>
                        <div class="feed-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                        <div>
                            <div class="feed-text">Product <strong>Cement</strong> fell below reorder
                                level.</div>
                            <div class="feed-time">3 hours ago</div>
                        </div>
                    </li>

                    <li>
                        <div class="feed-icon"><i class="fa-solid fa-clipboard-check"></i></div>
                        <div>
                            <div class="feed-text">Expense claim <strong>EXP-882</strong> awaits treasurer
                                approval.</div>
                            <div class="feed-time">Today, 09:24 AM</div>
                        </div>
                    </li>

                    <li>
                        <div class="feed-icon"><i class="fa-solid fa-building-columns"></i></div>
                        <div>
                            <div class="feed-text">Dividend declaration for FY 2026 was created.</div>
                            <div class="feed-time">Yesterday</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>




@endsection
