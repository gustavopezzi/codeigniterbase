<div class="messages-wrapper">
	<div class="msgs">
		<?php if (!empty($msgs)): ?>
		    <?= $msgs ?>
		<?php endif ?>
	</div>
	<div class="errors">
		<?php if (!empty($errors)): ?>
		    <?= $errors ?>
		<?php endif ?>
	</div>
	<div class="infos">
		<?php if (!empty($infos)): ?>
	    	<?= $infos ?>
		<?php endif ?>
	</div>
</div>