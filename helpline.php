<?php 
$crl = curl_init();
curl_setopt_array($crl, array(
  CURLOPT_URL => "https://covid-19india-api.herokuapp.com/helpline_numbers",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));
$helpline = curl_exec($crl);
curl_close($crl); 
$helpline = json_decode($helpline,true); // giving true to json_decode returns array
$helpcount = count($helpline['contact_details']);
/*echo "<pre>";
print_r($helpline);*/
/**/
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
    padding-top: 20px
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
body {
    background: #eee;
    font-family: Assistant, sans-serif
}

.cell-1 {
    border-collapse: separate;
    border-spacing: 0 4em;
    background: #fff;
    border-bottom: 5px solid transparent;
    background-clip: padding-box
}

thead {
    background: #dddcdc
}

</style>
</head>
<body>
	<nav id="mainNavbar" class="navbar navbar-dark navbar-expand-md py-0 fixed-top"> <a href="#" class="navbar-brand">BRANDNAME</a> <button class="navbar-toggler" data-toggle="collapse" data-target="#navLinks"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navLinks">
        <ul class="navbar-nav">
            <li class="nav-item"> <a href="" class="nav-link">HOME</a> </li>
            <li class="nav-item"> <a href="helpline.php" class="nav-link">HELP-LINE NUMBER</a> </li>
            <li class="nav-item"> <a href="" class="nav-link">SERVICES</a> </li>
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
            <div class="carousel-item active" style="background-image: url('4.jpg')">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="display-4">Image one</h3>
                    <p class="lead">Some description about the first slide</p>
                </div>
            </div> <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('https://images.unsplash.com/photo-1460602594182-8568137446ce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1355&q=80')">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="display-4">Image two</h3>
                    <p class="lead">Some description about the second slide</p>
                </div>
            </div> <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('https://images.unsplash.com/photo-1465146633011-14f8e0781093?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80')">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="display-4">Image three</h3>
                    <p class="lead">Some description about the third slide</p>
                </div>
            </div>
        </div> <a class="carousel-control-prev" href="#indicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#indicators" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
    </div>
</header>

<div class="container mt-5">
    <h4 class="text-center">Helpline Numbers of States & Union Territories (UTs)</h4>
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            <div class="rounded">
                <div class="table-responsive table-borderless">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th>State or Ut</th>
                                <th>Help-Line Number</th>
                                
                            </tr>
                        </thead>
                        <tbody class="table-body">
                            <?php 
                                    $i=1;
                                   $j=1; while ($i < $helpcount) { ?>

                            <tr class="cell-1">
                                <td class="text-center"><?php echo $j; ?></td>
                                <td><?php echo $helpline['contact_details'][$i]['state_or_UT']; ?></td>
                                <td><span class="badge badge-success"><?php echo $helpline['contact_details'][$i]['helpline_number']; ?></span></td>
                               
                            </tr>
                             <?php
                                 $i++;
                                 $j++;
                        }?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
<div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center text-capitalize">toll free</h5>
        <p class="card-text text-center"><span class="badge badge-info"><?php echo $helpline['toll_free'];?></span></p>
        
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center text-capitalize">helpline email</h5>
        <p class="card-text text-center"><span class="badge badge-info"><?php echo $helpline['helpline_email']; ?></span></p>
      </div>
    </div>
  </div>
   <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center text-capitalize">helpline number</h5>
        <p class="card-text text-center"><span class="badge badge-info"><?php echo $helpline['helpline_number'];?></span></p>
       
      </div>
    </div>
  </div>
</div>
</div><br>

<p class="text-center"><b>Source:</b><?php echo $helpline['source']; ?></p>
 

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