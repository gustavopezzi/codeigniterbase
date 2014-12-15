<?=$this->load->view(CMSPANELFOLDER.'header'); ?>

<div class="purplebox-wrapper">
    <div class="purplebox">

        <span class="purplebox-title"><?= empty($item->category_id)? 'ADD' : 'EDIT' ?> CATEGORY</span>

        <?= form_open_multipart(CMSPANELFOLDER.$controller.'/save', array('class'=>'form-horizontal')); ?>
            <fieldset>
                <!-- category_id -->
                <input type="hidden" name="category_id" value="<?=empty($item->category_id)? '' : $item->category_id; ?>"/>

                <!-- name -->
                <div class="input-row">
                    <label>NAME:</label>
                    <input type="text" name="name" id="name" value="<?=empty($item->name)? set_value('name') : $item->name ?>"/>
                </div>

                <!-- abbreviation -->
                <div class="input-row">
                    <label>ABBREV.:</label>
                    <input type="text" name="abbreviation" id="abbreviation" value="<?=empty($item->abbreviation)? set_value('abbreviation') : $item->abbreviation ?>"/>
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