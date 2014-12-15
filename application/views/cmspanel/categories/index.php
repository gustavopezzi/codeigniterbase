<?=$this->load->view(CMSPANELFOLDER.'header'); ?>

<div class="purplebox-wrapper">
    <div class="purplebox">

        <span class="purplebox-title">CATEGORIES</span>
        
        <div class="buttons-add">
            <span class="button"><a class="btn btn-primary" href="<?php echo site_url(CMSPANELFOLDER.$controller.'/add')?>">Add Category</a></span>
        </div>
        <?php if (!is_array($items) || count($items) == 0 || empty($items)): ?>
                    <div class="message">There are no categories in the database</div>
        <?php else: ?>
            <table class='item-list-table'>
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Abbreviation</th>
                    	<th>Actions</th>
                	</tr>
                </thead>
                <tbody>
        		    <?php foreach($items as $item): ?>
                            <tr>
                                <td>
                                    <?= $item->name ?>
                                </td>
                                <td>
                                    <?= $item->abbreviation ?>
                                </td>
                                <td align="right">
                                    <a href="<?=site_url(CMSPANELFOLDER.$controller.'/edit/'.$item->category_id); ?>" title="Edit"><span class="button">Edit</span></a>
                                	<a href="<?=site_url(CMSPANELFOLDER.$controller.'/delete/'.$item->category_id); ?>" onclick="return confirm('Do you really want to remove this item?');" title="Remove"><span class="button">Del</span></a>
                                </td>
                            </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php endif ?>
    </div>
</div>
<?=$this->load->view(CMSPANELFOLDER.'footer') ?>