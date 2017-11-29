<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $this->config->item("title"); ?></title>
    <link rel="icon" href="../../favicon.ico">
    <link href="<?php echo base_url("/css/bootstrap/bootstrap.min.css"); ?>" rel="stylesheet"/>
    <link href="<?php echo base_url("/css/bootstrap/sticky-footer-navbar.css"); ?>" rel="stylesheet"/>
    <link href="<?php echo base_url("css/jqueryui/jquery-ui.css"); ?>" rel="stylesheet"/>  
    <link href="<?php echo base_url("js/jquery.qtip.custom/jquery.qtip.css"); ?>" rel="stylesheet"/>
    <link href="<?php echo base_url("/css/jqgrid/ui.jqgrid-bootstrap.css"); ?>" rel="stylesheet"/>
    <link href="<?php echo base_url("/css/style.css"); ?>" rel="stylesheet"/>
    <script src="<?php echo base_url("/js/bootstrap/jquery-1.11.3.min.js"); ?>" rel="stylesheet"></script>
  </head>
  <body>
    <?php $this->load->view("/template/navbar"); ?>
    <div class="container">
    	<?php if (isset($view) && $view!=""){ 
    	      		$this->load->view($view);
    		  }
    	?>  
    </div>
    <?php $this->load->view("/template/footer"); ?>
    <!-- JavaScript Functions -->    
    <script src="<?php echo base_url("/js/bootstrap/bootstrap.min.js"); ?>" rel="stylesheet"></script>
    <script src="<?php echo base_url("/js/jquery.qtip.custom/jquery.qtip.js"); ?>"></script>    
    <script src="<?php echo base_url("/js/jqueryui/jquery-ui.min.js"); ?>"></script>
    <script src="<?php echo base_url("/js/jquery.qtip.custom/jquery.qtip.js"); ?>"></script>
    <script src="<?php echo base_url("/js/jqgrid/i18n/grid.locale-es.js"); ?>" type="text/ecmascript"></script>
	<script src="<?php echo base_url("/js/jqgrid/jquery.jqGrid.js"); ?>" type="text/ecmascript"></script>	
	<script src="<?php echo base_url("/js/jquery.validator/jquery.validate.min.js"); ?>"></script>
	<script src="<?php echo base_url("/js/bootstrap/ie-emulation-modes-warning.js"); ?>" rel="stylesheet"></script>
    <script src="<?php echo base_url("/js/bootstrap/ie10-viewport-bug-workaround.js"); ?>" rel="stylesheet"></script>
    <script src="<?php echo base_url("/js/danevalidator.js"); ?>"></script> 
  </body>  
</html>