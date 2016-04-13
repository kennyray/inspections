<!DOCTYPE html>
<html>
    <head>
        <title>Restaurant Inspections</title>
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/spinner.css">
	</head>
<body>

<div id="nav">
  <div class="navbar navbar-default navbar-static">
    <div class="container">
      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="glyphicon glyphicon-bar"></span>
        <span class="glyphicon glyphicon-bar"></span>
        <span class="glyphicon glyphicon-bar"></span>
      </a>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="/businesses">Businesses</a></li>
          <li class="divider"></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Terms</a></li>
        </ul>
        <ul class="nav pull-right navbar-nav">
          <li>
            <a href="#">South Florida</a>
          </li>
        </ul>
      </div>		
    </div>
  </div><!-- /.navbar -->
</div>



<div class="container">
@yield("content")
</div>
<script src="/js/all.js"></script>
</body>
</html>
