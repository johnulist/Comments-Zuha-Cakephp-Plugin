<?php
/**
 * Copyright 2009 - 2010, Cake Development Corporation
 *                        1785 E. Sahara Avenue, Suite 490-423
 *                        Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 */
?>
<?php
	$_actionLinks = array();
	if (!empty($displayUrlToComment)) {
		$_actionLinks[] = sprintf('<a href="%s">%s</a>', $urlToComment . '/' . $comment['Comment']['slug'], __d('comments', 'View', true));
	}

	if (!empty($allowAddByAuth)) {
		$_actionLinks[] = $commentWidget->link(__d('comments', 'Reply', true), array_merge($url, array('comment' => $comment['Comment']['id'], '#' => 'comment' . $comment['Comment']['id'])));
		if (!empty($isAdmin)) {
			if (empty($comment['Comment']['approved'])) {
				$_actionLinks[] = $commentWidget->link(__d('comments', 'Publish', true), array_merge($url, array('comment' => $comment['Comment']['id'], 'comment_action' => 'toggleApprove', '#' => 'comment' . $comment['id'])));
			} else {
				$_actionLinks[] = $commentWidget->link(__d('comments', 'Unpublish', true), array_merge($url, array('comment' => $comment['Comment']['id'], 'comment_action' => 'toggleApprove', '#' => 'comment' . $comment['Comment']['id'])));
			}
		}
	}
	$_userLink = '<div class="avatar">'.$this->element('snpsht', array('plugin' => 'users', 'useGallery' => true, 'userId' => $comment[$userModel]['id'], 'thumbSize' => 'small', 'thumbLink' => '/users/users/view/'.$comment[$userModel]['id'])).'</div>';
?>
<div class="comment index"><a name="comment<?php echo $comment['Comment']['id'];?>"></a>
	<span style="float: right"><?php echo join('&nbsp;', $_actionLinks);?></span>
	<div class="indexCell image">
		<?php echo $_userLink; ?>
    </div>
	<div class="indexCell">
   		 <div class="indexCell metaData"><?php echo $this->Html->link($comment[$userModel]['full_name'], array('plugin' => 'users', 'controller' => 'users', 'action' => 'view', $comment[$userModel]['id'])); ?> &nbsp; <?php __d('comments', 'posted'); ?> &nbsp; <?php echo $time->timeAgoInWords($comment['Comment']['created']); ?></div>
    	<div class="indexCell body truncate"><strong><a name="comment<?php echo $comment['Comment']['id'];?>"><?php echo $comment['Comment']['title'];?></a></strong> : <?php echo $cleaner->bbcode2js($comment['Comment']['body']);?></div>
    </div>
</div>