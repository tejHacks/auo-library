<div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
               
                <a class="navbar-brand">

                    <img src="../assets/school.png" />
                </a>

            </div>

            <div class="right-div">
                <a href="logout.php" class="btn btn-danger pull-right">LOG ME OUT</a>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="dashboard.php" class="menu-top-active">DASHBOARD</a></li>
                           
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Categories <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="add-category.php">Add Category</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-categories.php">Manage Categories</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Authors <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="add-author.php">Add Author</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-authors.php">Manage Authors</a></li>
                                </ul>
                            </li>
 <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Books <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="add-book.php">Add Book</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-books.php">Manage Books</a></li>
                                </ul>
                            </li>

                           <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Issue Books <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="issue-book.php">Issue New Book</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-issued-books.php">Manage Issued Books</a></li>
                                </ul>
                            </li>
                             <li><a href="reg-students.php">Reg Students</a></li>
                    
  <li><a href="change-password.php">Change Password</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <style>
        
/*=============================================================
    Authour URI: www.binarytheme.com
    License: Commons Attribution 3.0

    http://creativecommons.org/licenses/by/3.0/

    100% Free To use For Personal And Commercial Use.
    IN EXCHANGE JUST GIVE US CREDITS AND TELL YOUR FRIENDS ABOUT US
   
    ========================================================  */



/* =============================================================
   GENERAL STYLES
 ============================================================ */

body {
    font-family: 'Open Sans', sans-serif;
    line-height:28px;
   
}
.set-radius-zero {
    border-radius:0px;
    -moz-border-radius:0px;
    -webkit-border-radius:0px;
}
.content-wrapper {
    margin-top: 40px;
    min-height:800px;
    padding-bottom:90px;
}
.header-line {
    font-weight:900;
    padding-bottom:25px;
    border-bottom:1px solid #eeeeee;
    text-transform:uppercase;
}
.pad-botm {
    padding-bottom:30px;
}


/* =============================================================
   NAVBAR & MENU STYLES
 ============================================================ */

.right-div {
    float: right; 
    padding: 20px;
}
#menu-top a {
    color:#000;
    text-decoration:none;
    font-weight:500;
    padding: 25px 15px 25px 15px;
    text-transform:uppercase;

}
.menu-section {
    background-color: #f7f7f7;
    border-bottom:5px solid #9170E4;
    width:100%
}
.menu-top-active {
    background-color:#eeeeee;
}
.navbar-inverse {
background-color: #FFF;
border-color: rgba(155, 153, 153, 0.23);

}

.navbar {
    min-height: 90px;
    margin-bottom: 0px;
   
}
.navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
    border-color:transparent;
}
.navbar-toggle {
background-color: black;
border: 1px solid black;
}

    /* =============================================================
   DASHBOARD STYLES
 ============================================================ */

.img-comments {
   border: 3px double #e1e1e1;
height: 60px;

}

.chat-widget-main {
    max-height:330px;
    overflow:auto;
}

.slide-bdr {
   border:5px solid #9170E4
}
.chat-widget-left:after {
    top: 100%;
    left: 10%;
    border: solid transparent;
    content: " ";
    position: absolute;
    border-top-color: #F70E62;
    border-width: 15px;
    margin-left: -15px;
}

.chat-widget-left {
    width: 100%;
    height: auto;
    padding: 15px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    position: relative;
    border: 1px solid #F70E62;
    font-size:12px;
}
.chat-widget-right:after {
    top: 100%;
    right: 10%;
    border: solid transparent;
    content: " ";
    position: absolute;
    border-top-color: #5AA8CC;
    border-width: 15px;
    margin-left: -15px;
}

.chat-widget-right {
    width: 100%;
    height: auto;
    padding: 15px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    position: relative;
    border: 1px solid #5AA8CC;
    font-size:12px;
}

.chat-widget-name-left {
   color: #808080;
    margin-top: 30px;
    margin-left: 60px;
    text-align:left;
}
img{
    width:100px;
}

    .img-left-chat {
        border:3px double #e1e1e1;
        float:left;
        margin-right:30px;
    }
     .img-right-chat {
        border:3px double #e1e1e1;
        float:right;
        margin-left:30px;
    }
     .chat-widget-main img-right {
        border:3px double #e1e1e1;
        float:left;
    }
.chat-widget-name-left h4 {
    font-weight:normal;
    font-size:11px;
    
}
.chat-widget-name-left h5 {
    font-weight:normal;
    font-size:10px;
}
.chat-widget-name-right h4 {
    font-weight:normal;
    font-size:11px;
}
.chat-widget-name-right h5 {
    font-weight:normal;
    font-size:10px;
}
.chat-widget-name-right {
    color: #808080;
    margin-top: 40px;
    margin-right: 60px;
    text-align:right;
}

.recent-users-sec img {
    max-height:80px;
    margin:15px;
}

.back-widget-set {
    background-color:transparent;
}

/* =============================================================
   FOOTER SECTION STYLES
 ============================================================ */
.footer-section {
    padding:25px 50px 25px 50px;
    color:#000;
    font-size:13px;
      background-color: #f7f7f7;
      text-align:right;
       border-top:5px solid #9170E4;

}

    .footer-section a, .footer-section a:hover {
        color:#000;
    }



    /* Bootstrap style for the sidebar or maybe the header bar */

    </style>