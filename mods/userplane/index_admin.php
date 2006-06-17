<?php
/*
This is the ATutor Userplane module page. It allows an admin user
to set or edit  the Userplane for the phpMyAdmin installation for ATutor, and
it includes the launcher, which opens phpMyAdmin in a new window

*/
define('AT_INCLUDE_PATH', '../../include/');
require (AT_INCLUDE_PATH.'vitals.inc.php');


if (isset($_POST['submit'])) {
	$_POST['uri'] = trim($_POST['uri']);

	if (!$_POST['uri']){
		$msg->addError('USERPLANE_ID_ADD_EMPTY');
	}
			
	if (!$msg->containsErrors()) {
		$_POST['uri'] = $addslashes($_POST['uri']);
		$sql = "REPLACE INTO ".TABLE_PREFIX."config VALUES ('userplane', '$_POST[uri]')";
		mysql_query($sql, $db);
		$msg->addFeedback('USERPLANE_ID_SAVED');

		header('Location: '.$_SERVER['PHP_SELF']);
		exit;
	}
}

require (AT_INCLUDE_PATH.'header.inc.php');

?>

<?php if ($_config['userplane']): ?>
	<div class="input-form">
		<div class="row">
			<p><?php echo _AT('userplane_text'); ?></p>
		</div>
	</div>
<?php else: ?>
	<div class="input-form">
		<div class="row">
			<p><?php echo _AT('userplane_missing_id');  ?></p>
		</div>
	</div>
<?php endif; ?>

<form action="<?php  $_SERVER['PHP_SELF']; ?>" method="post">
	<div class="input-form">
		<div class="row">
			<p><label for="uri"><?php echo _AT('userplane_id'); ?></label></p>
	
			<input type="text" name="uri" value="<?php echo $_config['userplane']; ?>" id="uri" size="60" style="min-width: 65%;" />
		</div>
		<div class="row buttons">
			<input type="submit" name="submit" value="<?php echo _AT('save'); ?>"  />
		</div>
	</div>
</form>
<?php  require (AT_INCLUDE_PATH.'footer.inc.php'); ?>