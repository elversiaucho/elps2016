<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
    	<div class="navbar-header">
        	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            	<span class="sr-only">Toggle navigation</span>
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
          	</button>
          	<a class="navbar-brand" href="#"><?php echo $this->config->item("header"); ?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
        	<ul class="nav navbar-nav">
            	<li class="active"><a href="#">Home</a></li>
            	<li><a href="#about">About</a></li>
            	<li><a href="#contact">Contact</a></li>
            	<li class="dropdown">
              		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              		<ul class="dropdown-menu">
                		<li><a href="#">Action</a></li>
                		<li><a href="#">Another action</a></li>
                		<li><a href="#">Something else here</a></li>
                		<li role="separator" class="divider"></li>
                		<li class="dropdown-header">Nav header</li>
                		<li><a href="#">Separated link</a></li>
                		<li><a href="#">One more separated link</a></li>
              		</ul>
            	</li>
          	</ul>
        </div><!--/.nav-collapse -->
        
        <div class="row" id="colorbar">
			<div class="row col-md-offset-4 col-md-5 hidden-xs" id="color_container">
				<div id="color1"></div>
				<div id="color2"></div>
				<div id="color3"></div>
				<div id="color4"></div>
				<div id="color5"></div>
				<div id="color6"></div>
			</div>
		</div>		
		<div class="clearfix"></div>
		
	</div>
</nav>