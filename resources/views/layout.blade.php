<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>

    <style>
        body {
            font-family: "Lato", sans-serif;
            transition: background-color .5s;
            margin-top:50px;
            background-image: url("/images/1.png");
            background-size: cover;
            background-repeat: no-repeat;
            text-transform: uppercase;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s
        }

        .sidenav a:hover, .offcanvas a:focus{
            color: #f1f1f1;
        }

        .sidenav #closebtn {
            position: relative;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        .sidenav-list{
            float: left;
        }

        #closebtn
        {
            width: 40px;
            float: right;
        }
        #main {
            transition: margin-left .5s;
            padding: 16px;
            margin-top:100px

        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
        
        .panel-footer{
            position: fixed;
            bottom: 0%;
            width: 100%;
            font-style: bold;
        }

        .table{
            margin-left: 25%;
            margin-right: 25%;
            margin-top: 1%;
            margin-bottom: 10%;
            width: 50%;
            box-shadow: 0px 0px 20px 20px rgba(150,150,150,1);
        }

        table tr th td{
            background-color: red;
            text-decoration: black;
            color: black;
            border: 1px red solid;
        }

        h1{
            color: #000000;
            font-family: 'Raleway',sans-serif;
            font-size: 48px;
            font-weight: 800;
            line-height: 72px;
            margin: 0 0 24px;
            text-align: center;
            text-transform: uppercase;
        }
        @yield('css');
    </style>

    <body id="main">
        <!-- SideBar -->
        <div id="mySidenav" class="sidenav">
            <!--<a href="javascript:void(0)" id="closebtn" onclick="closeNav()" style:"margin-right:100px;">&times;</a>-->
            <div class="sidenav-list">
            @yield('sidebar')
            </div>
        </div>

        <!-- Top Navigation Bar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li class="active"><p><span style="font-size:30px;cursor:pointer;color:white;" onclick="SideBarControl()">&#9776;</span></p></li>
                </ul>
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        IITG AUTOMATION: NO DUES FORM
                    </a>
                </div>
            </div>
        </nav>


        <!-- Main Body part which is different for the different sections -->
        <div id="mainbody" >
            @yield('mainbody')
        </div>
        <!-- The footer of created by tag  -->
        
        <footer style="float:bottom;">
            <div class="panel-footer">
                <h4 style="color:blue;">Created By: Team SCARDY</h4>
            </div>
        </footer>
        
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script>
            var x = 0;
            function SideBarControl(){
                if (x == 1) {
                    closeNav();
                    x = 0;
                }
                else {
                    openNav();
                    x = 1;
                }
            }

            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";
                document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft= "0";
                document.body.style.backgroundColor = "white";
            }
            @yield('js')
        </script>

        <script>
            function Check(){
              var checkBoxes = document.getElementsByClassName('cb');
              for (i = 0; i < checkBoxes.length; i++){
                checkBoxes[i].checked = (selectControl.innerHTML == "Select All") ? 'checked' : '';
              }
              selectControl.innerHTML = (selectControl.innerHTML == "Select All") ? "Unselect All" : 'Select All';
            }

            window.onload = function(){
              var selectControl = document.getElementById("selectall");
              selectControl.onclick = function(){Check()};
            };
        </script>

    </body>    
</html>
