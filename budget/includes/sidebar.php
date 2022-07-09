<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
<style>
body {
    overflow-x: hidden;
}

/* Toggle Styles */

#viewport {
    padding-left: 250px;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#content {
    width: 100%;
    position: relative;
    margin-right: 0;
}

/* Sidebar Styles */

#sidebar {
    z-index: 1000;
    position: fixed;
    width: 260px;
    top: 0;
    bottom: 0;
    height: 100%;
    margin-left: -250px;
    overflow-y: auto;
    background: #37474F;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#sidebar header {
    background-color: #263238;
    font-size: 20px;
    line-height: 52px;
    text-align: center;
}

#sidebar header a {
    color: #fff;
    display: block;
    text-decoration: none;
}

#sidebar header a:hover {
    color: #fff;
}

#sidebar .nav {}

#sidebar .nav a {
    background: none;
    border-bottom: 2px solid #455A64;
    color: #CFD8DC;
    font-size: 14px;
    padding: 16px 24px;
}

#sidebar .nav a:hover {
    background: none;
    color: #ECEFF1;
}

#sidebar .nav a i {
    margin-right: 20px;
    margin-left:10px;
}
</style>
<div id="viewport">
    <!-- Sidebar -->
    <div id="sidebar">
        <header>
            <a href="#">Welcome</a>
        </header>
        <ul class="nav">
            <li>
                <a href="http://localhost/budget/dashboard.php">
                    <i class="zmdi zmdi-view-dashboard"></i>Dashboard
                </a>
            </li>

            <li>
                <a href="http://localhost/budget/income.php">
                <i class="zmdi zmdi-balance"></i>Income
                </a>
            </li>

            <li>
                <a href="http://localhost/budget/budget.php"> 
                    <i class="zmdi zmdi-case"></i>Budget
                </a>
            </li>
            <li>
                <a href="http://localhost/budget/expenses.php">
                <i class="zmdi zmdi-balance-wallet"></i> Expense
                </a>
            </li>       
        </ul>
    </div>
</div>