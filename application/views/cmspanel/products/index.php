<?=$this->load->view(CMSPANELFOLDER.'header'); ?>

<div class="purplebox-wrapper">
    <div class="purplebox">

        <span class="purplebox-title">PRODUCTS</span>
        
        <div class="buttons-add">
            <span class="button"><a class="btn btn-primary" href="<?php echo site_url(CMSPANELFOLDER.$controller.'/add')?>">Add Product</a></span>
        </div>
        <?php if (!is_array($items) || count($items) == 0 || empty($items)): ?>
                    <div class="message">There are no products in the database</div>
        <?php else: ?>
            <table class='item-list-table'>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Icons</th>
                        <th>Starred</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item): ?>
                            <tr>
                                <td>
                                    <img src="<?=site_url(PRODUCTS_PATH.$item->img); ?>" style="max-width:50px; max-height:50px;"/>
                                </td>
                                <td>
                                    <?= $item->code ?>
                                </td>
                                <td>
                                    <?= $item->name ?>
                                </td>
                                <td>
                                    <?= $item->description ?>
                                </td>
                                <td>
                                    <?= $this->Category->get($item->category_id)->abbreviation ?>
                                </td>
                                <td>
                                    <a href="<?=site_url(CMSPANELFOLDER.'products_icons/index/'.$item->product_id)?>" title="Edit Icons"> <span class="button"><?=$this->ProductIcon->countItems($item->product_id)?></span></a>
                                </td>
                                <td>
                                    <?= (empty($item->starred))? "" : "<img src='".site_url(ASSETS_CMSPANEL.'images/imgCheck.png')."'/>"; ?>
                                </td>
                                <td align="right">
                                    <a href="<?= site_url(CMSPANELFOLDER.$controller.'/edit/'.$item->product_id); ?>" title="Edit"><span class="button">Edit</span></a>
                                    <a href="<?= site_url(CMSPANELFOLDER.$controller.'/delete/'.$item->product_id); ?>" onclick="return confirm('Do you really want to remove this item?');" title="Remove"><span class="button">Del</span></a>
                                </td>
                            </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php endif ?>
    </div>
</div>
<?=$this->load->view(CMSPANELFOLDER.'footer') ?>