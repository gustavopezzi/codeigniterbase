<?=$this->load->view(CMSPANELFOLDER.'header'); ?>

<div class="purplebox-wrapper">
    <div class="purplebox">

        <span class="purplebox-title"><?=empty($item->banner_id)? 'ADD' : 'EDIT' ?> BANNER</span>

        <?= form_open_multipart(CMSPANELFOLDER.'banners/save', array('class'=>'form-horizontal')); ?>
            <fieldset>
                <!-- banner_id -->
                <input type="hidden" name="banner_id" value="<?=empty($item->banner_id)? '' : $item->banner_id; ?>"/>

                <!-- img -->
                <div class="input-row">
                    <label>IMAGE:</label>
                    <input type="file" id="banner-input-file" name="img_file" class="hidden"/>
                    <span class="button" id="banner-upload-button">Upload...</span>
                    <span id="banner-file-name" name="banner-file-name">no file selected...</span>
                </div>
                <div class="input-row">
                    <label></label>
                    <?php if (!empty($item->img)): ?>
                            <a href="<?php echo site_url(BANNERS_PATH.$item->img); ?>" title="ver imagem atual" target="_blank">Open current image...</a>
                    <?php endif ?>
                </div>

                <!-- link -->
                <div class="input-row">
                    <label>LINK:</label>
                    <input type="text" name="link" id="link" value="<?=empty($item->link)? set_value('link') : $item->link ?>"/>
                </div>
                <div class="action-buttons">
                    <input value="Save" class="button" type="submit"/>
              	    <a href="<?=site_url(CMSPANELFOLDER.'banners')?>"><span class="button">Back</span></a>
                </div>
            </fieldset>
        <?= form_close(); ?>
    </div>
</div>

<?=$this->load->view(CMSPANELFOLDER.'footer')?>