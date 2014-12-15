<?=$this->load->view(CMSPANELFOLDER.'header'); ?>

<div class="purplebox-wrapper">
    <div class="purplebox">

        <span class="purplebox-title"><?=empty($item->product_id)? 'ADD' : 'EDIT' ?> PRODUCT ICON</span>

        <?= form_open_multipart(CMSPANELFOLDER.$controller.'/save', array('class'=>'form-horizontal')); ?>
            <fieldset>
                <!-- form item ids -->
                <input type="hidden" name="product_id" value="<?= empty($product_id) ? '' : $product_id; ?>"/>
                <input type="hidden" name="product_icon_id" value="<?=empty($item->product_icon_id)? '' : $item->product_icon_id; ?>"/>

                <!-- title -->
                <div class="input-row">
                    <label>Title:</label>
                    <input type="text" name="title" id="title" value="<?=empty($item->title)? set_value('title') : $item->title ?>"/>
                </div>

                <!-- img -->
                <div class="input-row">
                    <label>Image:</label>
                    <input type="file" id="product-icon-input-file" name="img_file" class="hidden"/>
                    <span class="button" id="product-icon-upload-button">Upload...</span>
                    <span id="product-icon-file-name" name="product-icon-file-name">no file selected...</span>
                </div>
                <div class="input-row">
                    <label></label>
                    <?php if (!empty($item->img)): ?>
                            <a href="<?php echo site_url(PRODUCTS_PATH.$product_id.'/'.$item->img); ?>" title="Open current image" target="_blank">Open current image...</a>
                    <?php endif ?>
                </div>

                <!-- action buttons -->
                <div class="action-buttons">
                    <input value="Save" class="button" type="submit"/>
                    <a href="<?=site_url(CMSPANELFOLDER.$controller.'/index/'.$product_id)?>"><span class="button">Back</span></a>
                </div>
            </fieldset>
        <?= form_close(); ?>
    </div>
</div>

<?=$this->load->view(CMSPANELFOLDER.'footer')?>