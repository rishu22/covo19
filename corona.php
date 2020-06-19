<?php 
$crl = curl_init();
curl_setopt_array($crl, array(
  CURLOPT_URL => "https://covid-19india-api.herokuapp.com/all",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));
$state = curl_exec($crl);
curl_close($crl); 
$statedata = json_decode($state,true); // giving true to json_decode returns array
$statecount = count($statedata[1]['state_data']);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Corona</title>
	<meta charset="UTF-8">
	<meta name="description" content="Corona Live Update">
	<meta name="keywords" content="corona, corona status, covid19, coronaindia">
	<meta name="author" content="Rishav Krishna">
	<meta http-equiv="refresh" content="30">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<style type="text/css">
.my-card
{
    position:absolute;
    left:40%;
    top:-20px;
    border-radius:50%;
}
.last_updated{
	text-align: center;
}
.carousel-item {
    height: 65vh;
    min-height: 350px;
    background: no-repeat center center scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover
}

#mainNavbar {
    padding-left: 50px;
    padding-top: 80px
}

.navbar-dark .navbar-brand {
    font-family: 'Source Serif Pro', serif
}

.navbar-nav .nav-link {
    font-family: 'Source Serif Pro', serif
}

.display-4 {
    font-family: 'Source Serif Pro', serif
}

.lead {
    font-family: 'Source Serif Pro', serif
}

.navbar.scrolled {
    background: rgb(34, 31, 31);
    transition: background 500ms
}
/* Footer */

</style>
</head>
<body>
	<nav id="mainNavbar" class="navbar navbar-dark navbar-expand-md py-0 fixed-top"> <a href="#" class="navbar-brand">BRANDNAME</a> <button class="navbar-toggler" data-toggle="collapse" data-target="#navLinks"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navLinks">
        <ul class="navbar-nav">
            <li class="nav-item"> <a href="" class="nav-link">HOME</a> </li>
            <li class="nav-item"> <a href="helpline.php" class="nav-link">HELP-LINE NUMBER</a> </li>
            <li class="nav-item"> <a href="news.php" class="nav-link">NEWS</a> </li>
            <li class="nav-item"> <a href="" class="nav-link">CONTACTS</a> </li>
    </div>
</nav>
<header>
    <div id="indicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#indicators" data-slide-to="0" class="active"></li>
            <li data-target="#indicators" data-slide-to="1"></li>
            <li data-target="#indicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active image-responsive " style="background-image: url('1.jpg')">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="display-4">Image one</h3>
                    <p class="lead">Some description about the first slide</p>
                </div>
            </div> <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('2.jpg')">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="display-4">Image two</h3>
                    <p class="lead">Some description about the second slide</p>
                </div>
            </div> <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('3.jpg')">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="display-4">Image three</h3>
                    <p class="lead">Some description about the third slide</p>
                </div>
            </div>
        </div> <a class="carousel-control-prev" href="#indicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#indicators" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
    </div>
</header>

<div class="jumbotron">	
<div class="row w-100">
        <div class="col-md-3">
            <div class="card border-info mx-sm-1 p-3">
                <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-car"></span></div>
                <div class="text-info text-center mt-3"><h4>Active Cases</h4></div>
                <div class="text-info text-center mt-2"><h1><?php echo $statedata[0]['active_cases'];?></h1></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-success mx-sm-1 p-3">
                <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-eye" aria-hidden="true"></span></div>
                <div class="text-success text-center mt-3"><h4>Recovered</h4></div>
                <div class="text-success text-center mt-2"><h1><?php echo $statedata[0]['recovered_cases']?></h1></div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card border-warning mx-sm-1 p-3">
                <div class="card border-warning shadow text-warning p-3 my-card" ><span class="fa fa-inbox" aria-hidden="true"></span></div>
                <div class="text-warning text-center mt-3"><h4>Confirmed</h4></div>
                <div class="text-warning text-center mt-2"><h1><?php echo $statedata[0]['confirmed_cases']?></h1></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-danger mx-sm-1 p-3">
                <div class="card border-danger shadow text-danger p-3 my-card" ><span class="fa fa-heart" aria-hidden="true"></span></div>
                <div class="text-danger text-center mt-3"><h4>Death</h4></div>
                <div class="text-danger text-center mt-2"><h1><?php echo $statedata[0]['death_cases']?></h1></div>
            </div>
        </div>
     </div>
      <small class="last_updated"><p><b>Covid India As On:</b><?php echo $statedata[0]['last_updated']?></p></small>
</div><br>

<div class="container" style="    background-color: #f5f5f5;">
<div  class="table-responsive-sm">
    <table class="table table-bordered table-striped text-center">
      <thead class="thead-dark">
        <tr>
          <th class="text-capitalize">state</th>
          <th class="text-capitalize">confirmed</th>
          <th class="text-capitalize">recovered</th>
          <th class="text-capitalize">active</th>
          <th class="text-capitalize">deaths</th>
          <th class="text-capitalize">recovered rate</th>
        </tr>
      </thead>
      <tbody>
<?php 
      	$i=1;
		while ($i < $statecount) { ?>
			<tr>
				<td><?php echo $statedata[1]['state_data'][$i]['state']; ?></td>
				<td style="color: blue;"><?php echo $statedata[1]['state_data'][$i]['confirmed']; ?></td>
				<td style="color: green;"><?php echo $statedata[1]['state_data'][$i]['recovered']; ?></td>
				<td style="color: #20B2AA;"><?php echo $statedata[1]['state_data'][$i]['active']; ?></td>
				<td style="color: red;"><?php echo $statedata[1]['state_data'][$i]['deaths']; ?></td>
				<td style="color: #9ACD32;"><?php echo $statedata[1]['state_data'][$i]['recovered_rate']; ?>%</td>
			</tr>
			<?php
		$i++;
}?>
   
     
        
        
      </tbody>
    </table>
</div>
</div>

<script>
    $(function() {
        $(document).scroll(function() {
            var $nav = $("#mainNavbar");
            $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());
        });
    });
</script>

</body>
</html>