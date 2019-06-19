<div class="row row-card-no-pd">
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="flaticon-chart-pie text-warning"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">Quiz conducted</p>
                            <h4 class="card-title">100</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="flaticon-coins text-success"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">Quiz Drafted</p>
                            <h4 class="card-title">10</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="flaticon-error text-danger"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">No of Subjects</p>
                            <h4 class="card-title">23</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="flaticon-twitter text-primary"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">No of Students</p>
                            <h4 class="card-title">200</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END OF DASHBOARD VALUES-->


<div class="row mt--2">

    <!--OVERALL STATISTICS-->
    <div class="col-md-6">
        <div class="card full-height">
            <div class="card-body">
                <div class="card-title">Marks of last 3 quizzes</div>

                <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                    <div class="px-2 pb-2 pb-md-0 text-center">
                        <div id="circles-1"></div>
                        <h6 class="fw-bold mt-3 mb-0">Students passes</h6>
                    </div>
                    <div class="px-2 pb-2 pb-md-0 text-center">
                        <div id="circles-2"></div>
                        <h6 class="fw-bold mt-3 mb-0">Students failed</h6>
                    </div>
                    <div class="px-2 pb-2 pb-md-0 text-center">
                        <div id="circles-3"></div>
                        <h6 class="fw-bold mt-3 mb-0">Students not attempted</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END OF OVERALL STATISTICS-->

    <!--TOTAL INCOME AND SPEND STATISTICS-->
    <div class="col-md-6">
        <div class="card full-height">
            <div class="card-body">
                <div class="card-title">Total income & spend statistics</div>
                <div class="row py-3">
                    <div class="col-md-4 d-flex flex-column justify-content-around">
                        <div>
                            <h6 class="fw-bold text-uppercase text-success op-8">Total Income</h6>
                            <h3 class="fw-bold">$9.782</h3>
                        </div>
                        <div>
                            <h6 class="fw-bold text-uppercase text-danger op-8">Total Spend</h6>
                            <h3 class="fw-bold">$1,248</h3>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div id="chart-container">
                            <canvas id="totalIncomeChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END OF TOTAL INCOME AND SPEND STATISTICS-->

</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Top Products</div>
            </div>
            <div class="card-body pb-0">
                <div class="d-flex">
                    <div class="avatar">
                        <img src="../../assets/img/logoproduct.svg" alt="..." class="avatar-img rounded-circle">
                    </div>
                    <div class="flex-1 pt-1 ml-2">
                        <h6 class="fw-bold mb-1">CSS</h6>
                        <small class="text-muted">Cascading Style Sheets</small>
                    </div>
                    <div class="d-flex ml-auto align-items-center">
                        <h3 class="text-info fw-bold">+$17</h3>
                    </div>
                </div>
                <div class="separator-dashed"></div>
                <div class="d-flex">
                    <div class="avatar">
                        <img src="../../assets/img/logoproduct.svg" alt="..." class="avatar-img rounded-circle">
                    </div>
                    <div class="flex-1 pt-1 ml-2">
                        <h6 class="fw-bold mb-1">J.CO Donuts</h6>
                        <small class="text-muted">The Best Donuts</small>
                    </div>
                    <div class="d-flex ml-auto align-items-center">
                        <h3 class="text-info fw-bold">+$300</h3>
                    </div>
                </div>
                <div class="separator-dashed"></div>
                <div class="d-flex">
                    <div class="avatar">
                        <img src="../../assets/img/logoproduct3.svg" alt="..." class="avatar-img rounded-circle">
                    </div>
                    <div class="flex-1 pt-1 ml-2">
                        <h6 class="fw-bold mb-1">Ready Pro</h6>
                        <small class="text-muted">Bootstrap 4 Admin Dashboard</small>
                    </div>
                    <div class="d-flex ml-auto align-items-center">
                        <h3 class="text-info fw-bold">+$350</h3>
                    </div>
                </div>
                <div class="separator-dashed"></div>
                <div class="pull-in">
                    <canvas id="topProductsChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="card-title fw-mediumbold">Suggested People</div>
                <div class="card-list">
                    <div class="item-list">
                        <div class="avatar">
                            <img src="../../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <div class="info-user ml-3">
                            <div class="username">Jimmy Denis</div>
                            <div class="status">Graphic Designer</div>
                        </div>
                        <button class="btn btn-icon btn-primary btn-round btn-xs">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <div class="item-list">
                        <div class="avatar">
                            <img src="../../assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <div class="info-user ml-3">
                            <div class="username">Chad</div>
                            <div class="status">CEO Zeleaf</div>
                        </div>
                        <button class="btn btn-icon btn-primary btn-round btn-xs">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <div class="item-list">
                        <div class="avatar">
                            <img src="../../assets/img/talha.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <div class="info-user ml-3">
                            <div class="username">Talha</div>
                            <div class="status">Front End Designer</div>
                        </div>
                        <button class="btn btn-icon btn-primary btn-round btn-xs">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <div class="item-list">
                        <div class="avatar">
                            <img src="../../assets/img/mlane.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <div class="info-user ml-3">
                            <div class="username">John Doe</div>
                            <div class="status">Back End Developer</div>
                        </div>
                        <button class="btn btn-icon btn-primary btn-round btn-xs">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <div class="item-list">
                        <div class="avatar">
                            <img src="../../assets/img/talha.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <div class="info-user ml-3">
                            <div class="username">Talha</div>
                            <div class="status">Front End Designer</div>
                        </div>
                        <button class="btn btn-icon btn-primary btn-round btn-xs">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <div class="item-list">
                        <div class="avatar">
                            <img src="../../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <div class="info-user ml-3">
                            <div class="username">Jimmy Denis</div>
                            <div class="status">Graphic Designer</div>
                        </div>
                        <button class="btn btn-icon btn-primary btn-round btn-xs">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--<div class="col-md-4">-->
    <!--<div class="card card-primary bg-primary-gradient">-->
    <!--<div class="card-body">-->
    <!--<h4 class="mt-3 b-b1 pb-2 mb-4 fw-bold">Active user right now</h4>-->
    <!--<h1 class="mb-4 fw-bold">17</h1>-->
    <!--<h4 class="mt-3 b-b1 pb-2 mb-5 fw-bold">Page view per minutes</h4>-->
    <!--<div id="activeUsersChart"></div>-->
    <!--<h4 class="mt-5 pb-3 mb-0 fw-bold">Top active pages</h4>-->
    <!--<ul class="list-unstyled">-->
    <!--<li class="d-flex justify-content-between pb-1 pt-1"><small>/product/readypro/index.html</small> <span>7</span></li>-->
    <!--<li class="d-flex justify-content-between pb-1 pt-1"><small>/product/atlantis/demo.html</small> <span>10</span></li>-->
    <!--</ul>-->
    <!--</div>-->
    <!--</div>-->
    <!--</div>-->

</div>

<!--USER STATISTICS-->
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">User Statistics</div>
                    <div class="card-tools">
                        <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
												<span class="btn-label">
													<i class="fa fa-pencil"></i>
												</span>
                            Export
                        </a>
                        <a href="#" class="btn btn-info btn-border btn-round btn-sm">
												<span class="btn-label">
													<i class="fa fa-print"></i>
												</span>
                            Print
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-container" style="min-height: 375px">
                    <canvas id="statisticsChart"></canvas>
                </div>
                <div id="myChartLegend"></div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header">
                <div class="card-title">Daily Sales</div>
                <div class="card-category">March 25 - April 02</div>
            </div>
            <div class="card-body pb-0">
                <div class="mb-4 mt-2">
                    <h1>$4,578.58</h1>
                </div>
                <div class="pull-in">
                    <canvas id="dailySalesChart"></canvas>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body pb-0">
                <div class="h1 fw-bold float-right text-warning">+7%</div>
                <h2 class="mb-2">213</h2>
                <p class="text-muted">Transactions</p>
                <div class="pull-in sparkline-fix">
                    <div id="lineChart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END OF USER STATISTICS-->



<div class="row">
    <div class="col-md-6">
        <div class="card full-height">
            <div class="card-header">
                <div class="card-title">Feed Activity</div>
            </div>
            <div class="card-body">
                <ol class="activity-feed">
                    <li class="feed-item feed-item-secondary">
                        <time class="date" datetime="9-25">Sep 25</time>
                        <span class="text">Responded to need <a href="#">"Volunteer opportunity"</a></span>
                    </li>
                    <li class="feed-item feed-item-success">
                        <time class="date" datetime="9-24">Sep 24</time>
                        <span class="text">Added an interest <a href="#">"Volunteer Activities"</a></span>
                    </li>
                    <li class="feed-item feed-item-info">
                        <time class="date" datetime="9-23">Sep 23</time>
                        <span class="text">Joined the group <a href="single-group.php">"Boardsmanship Forum"</a></span>
                    </li>
                    <li class="feed-item feed-item-warning">
                        <time class="date" datetime="9-21">Sep 21</time>
                        <span class="text">Responded to need <a href="#">"In-Kind Opportunity"</a></span>
                    </li>
                    <li class="feed-item feed-item-danger">
                        <time class="date" datetime="9-18">Sep 18</time>
                        <span class="text">Created need <a href="#">"Volunteer Opportunity"</a></span>
                    </li>
                    <li class="feed-item">
                        <time class="date" datetime="9-17">Sep 17</time>
                        <span class="text">Attending the event <a href="single-event.php">"Some New Event"</a></span>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card full-height">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Support Tickets</div>
                    <div class="card-tools">
                        <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="pills-today" data-toggle="pill" href="#pills-today" role="tab" aria-selected="true">Today</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-week" data-toggle="pill" href="#pills-week" role="tab" aria-selected="false">Week</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-month" data-toggle="pill" href="#pills-month" role="tab" aria-selected="false">Month</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex">
                    <div class="avatar avatar-online">
                        <span class="avatar-title rounded-circle border border-white bg-info">J</span>
                    </div>
                    <div class="flex-1 ml-3 pt-1">
                        <h6 class="text-uppercase fw-bold mb-1">Joko Subianto <span class="text-warning pl-3">pending</span></h6>
                        <span class="text-muted">I am facing some trouble with my viewport. When i start my</span>
                    </div>
                    <div class="float-right pt-1">
                        <small class="text-muted">8:40 PM</small>
                    </div>
                </div>
                <div class="separator-dashed"></div>
                <div class="d-flex">
                    <div class="avatar avatar-offline">
                        <span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
                    </div>
                    <div class="flex-1 ml-3 pt-1">
                        <h6 class="text-uppercase fw-bold mb-1">Prabowo Widodo <span class="text-success pl-3">open</span></h6>
                        <span class="text-muted">I have some query regarding the license issue.</span>
                    </div>
                    <div class="float-right pt-1">
                        <small class="text-muted">1 Day Ago</small>
                    </div>
                </div>
                <div class="separator-dashed"></div>
                <div class="d-flex">
                    <div class="avatar avatar-away">
                        <span class="avatar-title rounded-circle border border-white bg-danger">L</span>
                    </div>
                    <div class="flex-1 ml-3 pt-1">
                        <h6 class="text-uppercase fw-bold mb-1">Lee Chong Wei <span class="text-muted pl-3">closed</span></h6>
                        <span class="text-muted">Is there any update plan for RTL version near future?</span>
                    </div>
                    <div class="float-right pt-1">
                        <small class="text-muted">2 Days Ago</small>
                    </div>
                </div>
                <div class="separator-dashed"></div>
                <div class="d-flex">
                    <div class="avatar avatar-offline">
                        <span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
                    </div>
                    <div class="flex-1 ml-3 pt-1">
                        <h6 class="text-uppercase fw-bold mb-1">Peter Parker <span class="text-success pl-3">open</span></h6>
                        <span class="text-muted">I have some query regarding the license issue.</span>
                    </div>
                    <div class="float-right pt-1">
                        <small class="text-muted">2 Day Ago</small>
                    </div>
                </div>
                <div class="separator-dashed"></div>
                <div class="d-flex">
                    <div class="avatar avatar-away">
                        <span class="avatar-title rounded-circle border border-white bg-danger">L</span>
                    </div>
                    <div class="flex-1 ml-3 pt-1">
                        <h6 class="text-uppercase fw-bold mb-1">Logan Paul <span class="text-muted pl-3">closed</span></h6>
                        <span class="text-muted">Is there any update plan for RTL version near future?</span>
                    </div>
                    <div class="float-right pt-1">
                        <small class="text-muted">2 Days Ago</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>