<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>CMS Panel</title>
		<!-- stylesheet -->
		<link href="<?=site_url(ASSETS_CMSPANEL.'css/normalize.css')?>" rel="stylesheet"/>
		<link href="<?=site_url(ASSETS_CMSPANEL.'css/fonts.css')?>" rel="stylesheet"/>
		<link href="<?=site_url(ASSETS_CMSPANEL.'css/purplegui.css')?>" rel="stylesheet"/>
		<link href="<?=site_url(ASSETS_CMSPANEL.'css/base.css')?>" rel="stylesheet"/>
		<!-- javascript -->
		<script type="text/javascript" src="<?=site_url(ASSETS_CMSPANEL."js/jquery.js") ?>"></script>
		<script type="text/javascript" src="<?=site_url(ASSETS_CMSPANEL."js/main.js") ?>"></script>
	</head>
	<body>
		<?php $this->load->view('cmspanel/navigation_bar', $this->data); ?>
		<div class="container">
			<?=$this->load->view('cmspanel/messages')?>