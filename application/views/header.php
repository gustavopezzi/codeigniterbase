<!DOCTYPE html>
<html>
	<head>
	    <title><?php echo $page_title?> Base Project</title>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	    
	    <!-- load css -->
	    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/normalize.css');?>?d=<?php echo md5(time());?>" />
	    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/main.css');?>?d=<?php echo md5(time());?>" />

	    <!-- load javascript -->
	    <script type="text/javascript">site_url = "<?php echo site_url();?>"</script>
	    <script src="<?php echo site_url('_assets/js/jquery.min.js')?>" type="text/javascript"></script>
	    <script src="<?php echo site_url('_assets/js/main.js')?>?d=<?php echo md5(time());?>" type="text/javascript"></script>
	    <script>var url = '<?php echo site_url();?>'</script>
	</head>
	<body>
		<div class="header">
			HEADER
		</div>