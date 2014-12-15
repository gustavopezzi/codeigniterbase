<?=$this->load->view(CMSPANELFOLDER.'header'); ?>

<div class="purplebox-wrapper">
    <div class="purplebox">

        <span class="purplebox-title"><?=empty($item->product_id)? 'ADD' : 'EDIT' ?> PRODUCT</span>

        <?= form_open_multipart(CMSPANELFOLDER.$controller.'/save', array('class'=>'form-horizontal')); ?>
            <fieldset>
                <!-- form item id -->
                <input type="hidden" name="product_id" value="<?=empty($item->product_id)? '' : $item->product_id; ?>"/>

                <!-- code -->
                <div class="input-row">
                    <label>Code:</label>
                    <input type="text" name="code" id="code" value="<?=empty($item->code)? set_value('code') : $item->code ?>"/>
                </div>

                <!-- name -->
                <div class="input-row">
                    <label>Name:</label>
                    <input type="text" name="name" id="name" value="<?=empty($item->name)? set_value('name') : $item->name ?>"/>
                </div>

                <!-- description -->
                <div class="input-row">
                    <label>Description:</label>
                    <input type="text" name="description" id="description" value="<?=empty($item->description)? set_value('description') : $item->description ?>"/>
                </div>

                <!-- starred -->
                <div class="input-row">
                    <label>Starred</label>
                    <span class="purplebox-label"></span>
                    <input type="checkbox" name="starred" id="starred" class="purplebox-checkbox" value="1" <?php echo (!empty($item->starred))? "checked" : ""; ?>/>
                    <label for="starred" class="purplebox-checkbox-label"></label>
                </div>

                <!-- img -->
                <div class="input-row">
                    <label>Image:</label>
                    <input type="file" id="product-input-file" name="img_file" class="hidden"/>
                    <span class="button" id="product-upload-button">Upload...</span>
                    <span id="product-file-name" name="product-file-name">no file selected...</span>
                </div>
                <div class="input-row">
                    <label></label>
                    <?php if (!empty($item->img)): ?>
                            <a href="<?php echo site_url(PRODUCTS_PATH.$item->img); ?>" title="Open current image" target="_blank">Open current image...</a>
                    <?php endif ?>
                </div>

                <!-- category_id -->
                <div class="input-row">
                    <label>Category:</label>
                    <span class="purplebox-select-arrow">
                    <select name="category_id" id="category_id" class="purplebox-select">
                        <option value="" <?php if(!empty($item)) { echo (0 == $item->category_id)? 'selected' : ''; }?> ><?php echo "None" ?></option>
                        <?php foreach($categories as $category): ?>
                                <option value="<?=$category->category_id?>" <?php if (!empty($item)) { echo ($category->category_id == $item->category_id)? 'selected' : ''; }?>>
                                    <?= $this->Category->get($category->category_id)->abbreviation; ?>
                                </option> 
                        <?php endforeach;?>
                    </select>
                </div>

                <!-- action buttons -->
                <div class="action-buttons">
                    <input value="Save" class="button" type="submit"/>
              	    <a href="<?=site_url(CMSPANELFOLDER.$controller)?>"><span class="button">Back</span></a>
                </div>
            </fieldset>
        <?= form_close(); ?>
    </div>
</div>

<?=$this->load->view(CMSPANELFOLDER.'footer')?>