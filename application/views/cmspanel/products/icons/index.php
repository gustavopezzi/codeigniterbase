<?=$this->load->view(CMSPANELFOLDER.'header'); ?>

<div class="purplebox-wrapper">
    <div class="purplebox">

        <span class="purplebox-title">PRODUCT ICONS</span>
        
        <div class="buttons-add">
            <span class="button"><a class="btn btn-primary" href="<?php echo site_url(CMSPANELFOLDER.$controller.'/add/'.$product_id)?>">Add Icon</a></span>
        </div>
        <?php if (!is_array($items) || count($items) == 0 || empty($items)): ?>
                    <div class="message">This product has no icons</div>
        <?php else: ?>
            <table class='item-list-table'>
                <thead>
                    <tr>
                        <th>Icon</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item): ?>
                            <tr>
                                <td>
                                    <img src="<?=site_url(PRODUCTS_PATH.$product_id.'/'.$item->img); ?>"/>
                                </td>
                                <td>
                                    <?= $item->title ?>
                                </td>
                                <td align="right">
                                    <a href="<?= site_url(CMSPANELFOLDER.$controller.'/edit/'.$item->product_icon_id.'/'.$product_id); ?>" title="Edit"><span class="button">Edit</span></a>
                                    <a href="<?= site_url(CMSPANELFOLDER.$controller.'/delete/'.$item->product_icon_id.'/'.$product_id); ?>" onclick="return confirm('Do you really want to remove this item?');" title="Remove"><span class="button">Del</span></a>
                                </td>
                            </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
        <?php endif ?>
    </div>
</div>
<?=$this->load->view(CMSPANELFOLDER.'footer') ?>