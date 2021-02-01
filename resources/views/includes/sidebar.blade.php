        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" >
                <div class="sidebar-brand-icon">
                    <img src="img/icon-logo.png" alt="" height="50">
                </div>
                <div class="sidebar-brand-text mx-3">{{ config('app.name') }} Dashboard</div>
            </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="?p=dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?p=transaction-new">
                <i class="fa fa-exchange" aria-hidden="true"></i>  
                <span>Transaction</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?p=return">
            <i class="fa fa-comments-o" aria-hidden="true"></i>  
                <span>Customer Concern</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Tools
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-archive"></i>
                <span>Inventory</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Inventory Tools:</h6>
                    <a class="collapse-item" href="?p=inventory">Inventory</a>
                    <a class="collapse-item" href="?p=incoming">Incoming Items</a>
                    <a class="collapse-item" href="includes/all-items.php">All Items</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Account
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a  class="nav-link" href="#" id="b-reg">
                <i class="fa fa-users" aria-hidden="true"></i>
                <span>Create an Account</span>
            </a>
            <a class="nav-link" href="?p=account">
                <i class="fas fa-fw fa-user"></i>
                <span>My Account</span>
            </a>
        </li>
        <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/sidebar.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
