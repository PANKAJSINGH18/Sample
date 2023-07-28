<?php
$username = session_name("username");
session_set_cookie_params(0, '/', '');
session_start();

function checkAuth() {
    return(isset($_SESSION['username']));
}


?>
<!DOCTYPE html>
<head>
<link rel="icon" type="image/x-icon" href="brain.ico">
<!-- <link rel="stylesheet" href="http://microblog.htb/static/css/styles.css"> -->
<!-- <script src="http://microblog.htb/static/js/jquery.js"></script>
<script src="http://microblog.htb/static/js/fontawesome.js"></script>
<script src="http://microblog.htb/static/js/typed.js"></script> -->

<title>Microblog</title>
</head>
<body>
    <div class = "semi-circle blue-fill">
        <div class="navbar">
            <a href="/" class="float-left title">Microblog</a>
            <div class = "float-right select-buttons">
            </div>
        </div>
        <div class = "main-page-header-content">
            <div class = "header-content-inner">
                <div class = "header-content-left header-content-item">
                    <span class = "big-text text-right">Don’t complicate it, <div class = "text-break text-break-main"></div>keep it <span class = "pink-color">micro</span></span><div style = "height: 30px"></div>
                    <span class = "medium-text text-right">Let Microblog bring your stories to life<br/>completely <b>free of charge</b> in minutes</span><div style = "height: 30px"></div>
                    <a href = "/dashboard" class = "custom-button pink-fill">Get Blogging</a>
                    ho
                </div>
                <div class = "header-content-right header-content-item">
                    <img src = "brain.png" class = "front-brain" />
                </div>
            </div>
        </div>
    </div>
    <div style = "min-height: 80px"></div>
    <div style = "width: 100%;"><span class = "big-text" style = "text-align: center;">Infinite possibilities</span></div>
    <div class = "infinite-possibilities-container">
        <div class = "infinite-possibilities-outer">
            <div class = "infinite-possibilities-custom pink-fill-semi-transparent">
            </div>
            <div class = "infinite-possibilities-static pink-color">
                .microblog.htb
            </div>
        </div>
    </div><br/>
    <div style = "min-height: 45px"></div>
    <div class = "end-message blue-fill">
        <div class = "end-message-text">Loving Microblog? <a href = "http://microblog.htb:3000/cooper/microblog" style = "font-weight: bold;" >Contribute here!</a></div>
    </div>
    <footer>
        © 2022 Microblog<br/>
        <a href="https://www.vecteezy.com/free-vector/brain">Brain Vectors by Vecteezy</a>
    </footer>
</body>
</html>
