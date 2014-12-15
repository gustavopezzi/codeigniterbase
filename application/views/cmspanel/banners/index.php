<?=$this->load->view(CMSPANELFOLDER.'header'); ?>

<div class="purplebox-wrapper">
    <div class="purplebox">

        <span class="purplebox-title">BANNERS</span>
        
        <div class="buttons-add">
            <span class="button"><a class="btn btn-primary" href="<?php echo site_url(CMSPANELFOLDER.$controller.'/add')?>">Add banner</a></span>
        </div>
        <?php if (!is_array($items) || count($items) == 0 || empty($items)): ?>
                    <div class="message">There are no banners in the database</div>
        <?php else: ?>
            <table class='item-list-table'>
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Link</th>
                    	<th>Actions</th>
                	</tr>
                </thead>
                <tbody>
                    <?php $total = count($items); ?>
        		    <?php foreach($items as $item): ?>
                            <tr>
                                <td>
                                    <img src="<?=site_url(BANNERS_PATH.$item->img); ?>" style="max-width:100px; max-height:100px;" />
                                </td>
                                <td>
                                    <?= $item->link ?>
                                </td>
                                <td align="right">
                                    <?php if ($total > 1) :?>
                            	                <?php if ($item->order > 1): ?>
                                                        <a href="<?=site_url(CMSPANELFOLDER.'banners/goup/'.$item->banner_id); ?>" title="Move up"><span class="button order"><img src="<?=site_url(ASSETS_CMSPANEL."images/upArrow.png")?>"/></span></a>
                                                <?php endif ?>
                            	       	        <?php if ($item->order >= 1 && $item->order<$total): ?>
                                                        <a href="<?=site_url(CMSPANELFOLDER.'banners/godown/'.$item->banner_id); ?>" title="Move down"><span class="button order"><img src="<?=site_url(ASSETS_CMSPANEL."images/downArrow.png")?>"/></span></a>
                                                <?php endif ?>
                                   	<?php endif; ?>
                                	<a href="<?=site_url(CMSPANELFOLDER.$controller.'/edit/'.$item->banner_id); ?>" title="Edit"><span class="button">Edit</span></a>
                                	<a href="<?=site_url(CMSPANELFOLDER.$controller.'/delete/'.$item->banner_id); ?>" onclick="return confirm('Do you really want to remove this item?');" title="Remove"><span class="button">Del</span></a>
                                </td>
                            </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php endif ?>
    </div>
</div>
<?=$this->load->view(CMSPANELFOLDER.'footer') ?>