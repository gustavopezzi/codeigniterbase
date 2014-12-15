<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Management</title>
        <!-- stylesheet -->
        <link href="<?php echo site_url(ASSETS_CMSPANEL.'css/normalize.css')?>" rel="stylesheet"/>
        <link href="<?php echo site_url(ASSETS_CMSPANEL.'css/fonts.css')?>" rel="stylesheet"/>
        <link href="<?php echo site_url(ASSETS_CMSPANEL.'css/purplegui.css')?>" rel="stylesheet"/>
        <link href="<?php echo site_url(ASSETS_CMSPANEL.'css/base.css')?>" rel="stylesheet"/>
    </head>
    <body>
        <div class="purplebox-wrapper-middle">
            <div class="purplebox">
                <span class="purplebox-title">LOGIN</span>
                <?= form_open('cmspanel/login/doLogin'); ?>
                    <div class="input-row">
                        <label>USER</label>
                        <input name="login" type="text" id="login" value="<?php echo set_value('login'); ?>" automplete="off"/>
                    </div>
                    <div class="input-row">
                        <label>PASSWD</label>
                        <input name="password" type="password" id="password" />
                    </div>
                    <?php if (!empty($errors)): ?>
                            <div class="error"><?php echo $errors;?></div>
                    <?php endif ?>
                    <div class="action-buttons">
                        <button id="btnSubmit" class="button">LOGIN</button>
                    </div>
                <?= form_close(); ?>
            </div>
        </div>
    </body>
</html>