<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>NFL Football Bars</title>
    <base target="_self">
    <meta name="description" content="NFL Football bars in your city.  Find bars across the country to watch and support your favorite NFL team."/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google" value="notranslate">
    <link rel="shortcut icon" href="/images/favicon1.ico">


    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/tablestyles.css">
    <script src="js/populate.js"></script>

</head>

<body>

<!------------- Nav Bar ------->


<nav class="navbar navbar-trans navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapsible">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand text-danger" href="#" style="font-variant:small-caps;"> <span style="color:#f44d3c;"><b>Football</b></span><span
                    style="color:#ffffff;">Bars.net</span></a>
        </div>
        <div class="navbar-collapse collapse" id="navbar-collapsible">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="#section2">Find Bar</a></li>
                <li><a href="#section3">Add Bar</a></li>
                <li><a href="#section4">About</a></li>
                <li><a href="#section5">Contact</a></li>

                <li>&nbsp;</li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-heart-o fa-lg"></i></a></li>
            </ul>
        </div>
    </div>
</nav>


<!------------- Splash Section ------->

<section class="container-fluid" id="section1">
    <div class="v-center">
        <h1 class="text-center" style="font-variant:small-caps;"><span style="color:#f44d3c;"><b>Football</b></span>Bars.net
        </h1>
        <h2 class="text-center lato animate slideInDown"><b>Your</b> Team. <b>Your</b> City.</h2>
        <h3 class="text-center"> Find bars across the country to watch and support your favorite NFL team.</h3>
        <p class="text-center">
            <br>
            <a href="#section2" class="btn btn-danger btn-lg btn-huge lato">Find a bar now</a>
        </p>


    </div>
    <a href="#section2">
        <div class="scroll-down bounceInDown animated">
            <span>
                <i class="fa fa-angle-down fa-2x"></i>
            </span>
        </div>
    </a>
</section>


<!------------- Find a Bar ------->

<section class="container-fluid" id="section2">
    <div class="container" style="height: auto;">
                            <h2 class="text-center">Find your NFL Team bar!</h2>
                        <hr>
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="panel panel-default" id="pan">
                            <div class="panel-heading">
                                <h3>Your Team</h3></div>
                            <div class="panel-body">
                                <p>Pick your favorite NFL Team!</p>
                                <hr>
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                            aria-haspopup="true"
                                            aria-expanded="true" data-toggle="dropdown">
                                        Choose Your Team
                                        <span class="caret"></span>
                                    </button>
                                    <ul id="TeamList" class="dropdown-menu"
                                        style="max-height:220px; overflow-y: auto; text-align:center; width: 100%; height:auto;"
                                        aria-labelledby="dropdownMenu1">

                                        <?php
                                        include 'database.php';
                                        $pdo = Database::connect();
                                        $sql = 'SELECT * FROM teams ORDER BY state';
                                        foreach ($pdo->query($sql) as $row) {
                                            echo '
                                        <li>';
                                            echo '<a id="teamSelection" data-ddid="teamSelect"
                                                     data-value="' . $row['team_ID'] . '"
                                                     href="#' . $row['team_name'] . '">' .
                                                $row['state'] . " " . $row['team_name'] . '</a>';

                                            echo '
                                        </li>
                                        ';
                                        }
                                        Database::disconnect();
                                        ?>

                                    </ul>

                                </div>

                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 text-center">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3>Your City</h3></div>
                            <div class="panel-body">
                                <p>Narrow it down by picking your state!</p>
                                <hr>


                                <div id="ddTEST" class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="StateDropDown"
                                            aria-haspopup="true"
                                            aria-expanded="true" data-toggle="dropdown">
                                        Select State
                                        <span class="caret"></span>
                                    </button>
                                    <ul id="StateList" class="dropdown-menu"
                                        style="text-align:center;  width: 100%;  max-height:220px; overflow-y: auto; height:auto;"
                                        aria-labelledby="StateDropDown">

                                        <?php
                                        if ($_POST['val']) {
                                            $valueID = $_POST['val'];
                                        } else {
                                            $valueID = 0;
                                        }
                                        echo '<li>Select Team First</li>';
                                        $pdo = Database::connect();
                                        $sql = 'SELECT DISTINCT bar_STATE FROM Bars WHERE team_ID="' . $valueID . '" ORDER
                                        BY team_ID DESC';
                                        foreach ($pdo->query($sql) as $row) {
                                            echo '
                                        <li>';
                                            echo '<a data-ddid="stateSelect" data-value="55"
                                                     href="#' . $row['bar_STATE'] . '">' .
                                                $row['state'] . " " . $row['bar_STATE'] . '</a>';

                                            echo '
                                        </li>
                                        ';


                                        }
                                        Database::disconnect();
                                        ?>

                                    </ul>

                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--/row-->
        <div class="row">
            <br>
        </div>
        <div class="row">
            <br>
        </div>

        <div><h3 class="text-center" id="ybyc">Bars</h3></div>

        <div class="table-responsive">
            <!--class="table table-striped table-bordered"-->
            <table id="barsTable" class="dataTable table table-striped table-bordered" cellspacing="10" width="100%">
                <thead class="head">
                <tr>
                    <th class="more"></th>
                    <th>Bar Name</th>
                    <th>City</th>
                    <th>Website</th>


                </tr>
                </thead>

                <tbody id="tableBody">

                </tbody>

            </table>
        </div>

    </div>
    <!--/container-->


</section>

<?php
include 'mail.php';
?>

<!--------------------add  aa bar ------------>
<section id="section3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Add a bar</h1>
                <hr>
            </div>
            <div class="col-md-12">
                <h3 class="text-center">Know of a bar that should be added? Tell me whatever info you know about it and
                    I will vet it and add it to the database!</h3>
                </br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form class="form-horizontal" role="form" method="post" action="index.php#section3">
                    <div class="form-group">

                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="teamName" name="teamName"
                                   placeholder="Team Name" value="">
                        </div>

                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="barName" name="barName" placeholder="Bar Name"
                                   value="">
                        </div>

                    </div>

                    <div class="form-group">

                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="barCity" name="barCity" placeholder="Bar City"
                                   value="">
                        </div>

                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="barState" name="barState"
                                   placeholder="Bar State" value="">
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="barWebsite" name="barWebsite"
                                   placeholder="Bar Website Address">
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-sm-12">
                            <textarea class="form-control" rows="4" name="message2"
                                      placeholder="Comments and Messages"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="human2" class="col-sm-1 control-label">5 + 3 = ?</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="human2" name="human2" placeholder="Your Answer">
                            <?php echo "<p class='text-danger'>$errHuman</p>"; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-0">
                            <input id="submit2" name="submit2" type="submit" value="Add" class="btn btn-danger">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <?php echo $result2; ?>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>


<!----- ABOUT ---->
<section class="container-fluid" id="section4">
    <h1 class="text-center">About</h1>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h3 class="text-center lato slideInUp animate">Two problems coming together
            </h3>
            <br>
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2">
                    <p>


                        I was stuck in an unfamiliar city during a division rivalry game.
                        I had no idea where to go to watch my local team play and
                        I was currently finishing up school and looking for a personal
                        project to practice some web technologies. And so...
                    </p>
                </div>
            </div>
            <h3 class="text-center lato slideInUp animate" style="font-variant:small-caps;"><span
                    style="color:#f44d3c;"><b>Football</b></span>Bars.net is born!
            </h3><br/>
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2">
                    <p> A website for NFL fans to find places to watch and support their favorite teams in different
                        cities around the country.
                    </p>
                </div>
            </div>
            <br>
            <p class="text-center">
                <img src="/images/stadium.jpg" class="img-responsive thumbnail center-block ">
            </p>
        </div>
    </div>
</section>


<!---------- contact ---------------->


<section id="section5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Send me a message!</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form class="form-horizontal" role="form" method="post" action="index.php#section5">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Name" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email"
                                   placeholder="example@domain.com" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-sm-2 control-label">Message</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="4" name="message"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="human" class="col-sm-2 control-label">5 + 3 = ?</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
                            <?php echo "<p class='text-danger'>$errHuman</p>"; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <input id="submit" name="submit" type="submit" value="Send" class="btn btn-danger">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <?php echo $result; ?>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>


<footer id="footer">
    <div class="container">

        <p class="text-center">copyright me©2016</p>
    </div>
</footer>

<div class="scroll-up">
    <a href="#"><i class="fa fa-angle-up"></i></a>
</div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="text-center"><i class="fa fa-heart-o fa-lg"></i><br></h2>
            </div>
            <div class="modal-body row">
                <h3 class="text-center">Thanks for clicking the heart!</h3>
                <div>
                    <p class="text-center">Maybe someday I will add a sign in with the ability to rate, add, update,
                        etc. For now, it is just information that hopefully someone will find useful.</p>
                </div>
            </div>
            <div class="modal-footer">
                <h6 class="text-center"><a href="#section5">Contact me to say hi or let know what I should add to the
                        site!</a></h6>
            </div>
        </div>
    </div>
</div>

<div id="mobile-test" class="hidden-xs"></div>

<script>
    // sandbox disable popups
    if (window.self !== window.top && window.name != "view1") {
        ;
        window.alert = function () {/*disable alert*/
        };
        window.confirm = function () {/*disable confirm*/
        };
        window.prompt = function () {/*disable prompt*/
        };
        window.open = function () {/*disable open*/
        };
    }

    // prevent href=# click jump
    document.addEventListener("DOMContentLoaded", function () {
        var links = document.getElementsByTagName("A");
        for (var i = 0; i < links.length; i++) {
            if (links[i].href.indexOf('#') != -1) {
                links[i].addEventListener("click", function (e) {
                    console.debug("prevent href=# click");
                    if (this.hash) {
                        if (this.hash == "#") {
                            e.preventDefault();
                            return false;
                        }
                        else {
                            /*
                             var el = document.getElementById(this.hash.replace(/#/, ""));
                             if (el) {
                             el.scrollIntoView(true);
                             }
                             */
                        }
                    }
                    return false;
                })
            }
        }
    }, false);
</script>

<!--scripts-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/selection.js"></script>


</body>
</html>