<style>
    .navbar-inverse{
    padding-top: 10px;
    background-color:#0d6efd; 
}.navbar-inverse {
  padding-top: 10px;
  background-color: #0d6efd;
}
.navbar-inverse .navbar-nav > li > a {
  color: #c8c9ce;
  font-weight: 400;
  font-family: Arial;
  font-size: 15px;
  text-align: center;
}
.navbar-inverse .navbar-nav > .open > a,
.navbar-inverse .navbar-nav > .open > a:hover,
.navbar-inverse .navbar-nav > .open > a:focus {
  background-color: #0d6efd;
}
.navbar-inverse .navbar-nav > li > a:hover,
.navbar-inverse .navbar-nav > li > a:focus {
  color: #ffffff;
  background-color: #0d6efd;
}

@media (min-width: 768px) {
  .navbar-nav > li > a {
    padding-top: 15px;
    padding-bottom: 15px;
  }
}
.dropdown-menu {
  margin-left: 10px;
  background-color: #0d6efd;
}
.dropdown-menu > li > a {
  padding-bottom: 10px;
  color: #c8c9ce;
  width: 180px;
}
.dropdown-menu > li > a:hover {
  background-color: transparent;
  color: #fff;
}
.dropdown-toggle {
  position: relative;
}

.dropdown-menu:after {
  content: "";
  position: absolute;
  left: -9px;
  top: 15px;
  width: 0;
  height: 0;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  border-right: 10px solid #0d6efd;
}
@media (min-width: 768px) {
  .container {
    width: 503px;
  }
}
@media (min-width: 992px) {
  .container {
    width: 723px;
  }
}
@media (min-width: 1200px) {
  .container {
    width: 923px;
  }
}
@media (min-width: 1432px) {
  .container {
    width: 1170px;
  }
}
body {
  padding-top: 70px;
}
.navbar-fixed-left,
.navbar-fixed-right {
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 1030;
}
@media (min-width: 768px) {
  .navbar-fixed-left,
  .navbar-fixed-right {
    width: 135px;
    height: 100vh;
    border-radius: 0;
  }
  .navbar-fixed-left .container,
  .navbar-fixed-left .container-fluid,
  .navbar-fixed-right .container,
  .navbar-fixed-right .container-fluid {
    padding-right: 0;
    padding-left: 0;
    width: auto;
  }
  .navbar-fixed-left .navbar-header,
  .navbar-fixed-right .navbar-header {
    float: none;
    padding-left: 15px;
    padding-right: 15px;
  }
  .navbar-fixed-left .navbar-collapse,
  .navbar-fixed-right .navbar-collapse {
    padding-right: 0;
    padding-left: 0;
    max-height: none;
  }
  .navbar-fixed-left .navbar-collapse .navbar-nav,
  .navbar-fixed-right .navbar-collapse .navbar-nav {
    float: none !important;
  }
  .navbar-fixed-left .navbar-collapse .navbar-nav > li,
  .navbar-fixed-right .navbar-collapse .navbar-nav > li {
    width: 100%;
  }
  .navbar-fixed-left .navbar-collapse .navbar-nav > li.dropdown .dropdown-menu,
  .navbar-fixed-right
    .navbar-collapse
    .navbar-nav
    > li.dropdown
    .dropdown-menu {
    top: 0;
  }
  .navbar-fixed-left .navbar-collapse .navbar-nav.navbar-right,
  .navbar-fixed-right .navbar-collapse .navbar-nav.navbar-right {
    margin-right: 0;
  }
}
@media (min-width: 768px) {
  body {
    padding-top: 0;
    margin-left: 150px;
  }
  .navbar-fixed-left {
    right: auto !important;
    left: 0 !important;
    border-width: 0 1px 0 0 !important;
  }
  .navbar-fixed-left .dropdown .dropdown-menu {
    left: 100%;
    right: auto;
    border-radius: 5px;
    padding: 25px;
  }
  .navbar-fixed-left .dropdown .dropdown-toggle .caret {
    border-top: 4px solid transparent;
    border-left: 4px solid;
    border-bottom: 4px solid transparent;
    border-right: none;
  }
}

.navbar-inverse .navbar-nav>li>a{
        color: #c8c9ce;
        font-weight: 400;
        font-family: Arial;
    font-size:15px;
    text-align: center;
}
.navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a:focus {
    background-color: #0d6efd;
}
.navbar-inverse .navbar-nav>li>a:hover, .navbar-inverse .navbar-nav>li>a:focus {
    color: #ffffff;
    background-color: #0d6efd;
}
.fa{
    font-size: 26px;
}
@media (min-width: 768px){
.navbar-nav>li>a {
    padding-top: 15px;
    padding-bottom: 15px;
}}
.dropdown-menu {
   margin-left:  10px;
   background-color: #0d6efd;
}
.dropdown-menu>li>a {
    padding-bottom: 10px;
    color: #c8c9ce;
    width: 180px;
 }
 .dropdown-menu>li>a:hover {
     background-color: transparent;
     color: #fff;
 }
.dropdown-toggle {
    position: relative;
}

.dropdown-menu:after {
    content: "";
    position: absolute;
    left: -9px;
    top: 15px;
    width: 0; 
    height: 0; 
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    border-right: 10px solid #0d6efd;
}
@media (min-width: 768px) {
  .container {
    width: 503px;
  }
}
@media (min-width: 992px) {
  .container {
    width: 723px;
  }
}
@media (min-width: 1200px) {
  .container {
    width: 923px;
  }
}
@media (min-width: 1432px) {
  .container {
    width: 1170px;
  }
}
body {
  padding-top: 70px;
}
.navbar-fixed-left,
.navbar-fixed-right {
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 1030;
}
@media (min-width: 768px) {
  .navbar-fixed-left,
  .navbar-fixed-right {
    width: 135px;
    height: 100vh;
    border-radius: 0;
  }
  .navbar-fixed-left .container,
  .navbar-fixed-left .container-fluid,
  .navbar-fixed-right .container,
  .navbar-fixed-right .container-fluid {
    padding-right: 0;
    padding-left: 0;
    width: auto;
  }
  .navbar-fixed-left .navbar-header,
  .navbar-fixed-right .navbar-header {
    float: none;
    padding-left: 15px;
    padding-right: 15px;
  }
  .navbar-fixed-left .navbar-collapse,
  .navbar-fixed-right .navbar-collapse {
    padding-right: 0;
    padding-left: 0;
    max-height: none;
  }
  .navbar-fixed-left .navbar-collapse .navbar-nav,
  .navbar-fixed-right .navbar-collapse .navbar-nav {
    float: none !important;
  }
  .navbar-fixed-left .navbar-collapse .navbar-nav > li,
  .navbar-fixed-right .navbar-collapse .navbar-nav > li {
    width: 100%;
  }
  .navbar-fixed-left .navbar-collapse .navbar-nav > li.dropdown .dropdown-menu,
  .navbar-fixed-right
    .navbar-collapse
    .navbar-nav
    > li.dropdown
    .dropdown-menu {
    top: 0;
  }
  .navbar-fixed-left .navbar-collapse .navbar-nav.navbar-right,
  .navbar-fixed-right .navbar-collapse .navbar-nav.navbar-right {
    margin-right: 0;
  }
}
@media (min-width: 768px) {
  body {
    padding-top: 0;
    margin-left: 150px;
  }
  .navbar-fixed-left {
    right: auto !important;
    left: 0 !important;
    border-width: 0 1px 0 0 !important;
  }
  .navbar-fixed-left .dropdown .dropdown-menu {
    left: 100%;
    right: auto;
    border-radius: 5px;
    padding: 25px;
  }
  .navbar-fixed-left .dropdown .dropdown-toggle .caret {
    border-top: 4px solid transparent;
    border-left: 4px solid;
    border-bottom: 4px solid transparent;
    border-right: none;
  }
}


/*  media*/
@media screen and (max-width: 768px) {
.navbar-inverse .navbar-nav .open .dropdown-menu>li>a {
            color: #c8c9ce;
            text-align: center;
            width: 95%;
        }
        
}
</style>
<nav class="navbar navbar-inverse navbar-fixed-left">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-controls="navbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li class="arrow"><a href="#"><i class="fa fa-tachometer"></i><br>Dashboard</a></li>
           <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"><i class="fa fa-table" aria-hidden="true"></i><br>Tables<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Table 1</a></li>
              <li><a href="#">Table 2</a></li>
              <li><a href="#">Table 3</a></li>
              <li><a href="#">Table 4</a></li>
              <li><a href="#">Table 5</a></li>
              <li><a href="#">Table 6</a></li>
             
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"><i class="fa fa-file" aria-hidden="true"></i><br>Report<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Report A</a></li>
              <li><a href="#">Report B</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"><i class="fa fa-user" aria-hidden="true"></i><br>Attendance<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Team Attendance</a></li>
              <li><a href="#">User Attendance</a></li>
            </ul>
          </li>
          <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><br>Location</a></li>
          <li><a href="#"><i class="fa fa-line-chart"></i><br>Sales</a></li>
        </ul>
     
      </div>
    </div>
  </nav>