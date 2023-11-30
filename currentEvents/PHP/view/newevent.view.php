<style>
	.btn {
		display: inline-flex;
		padding: 5px 10px;
		border: solid 1px #000;
		background: #000;
		color: #fff !important;
		text-decoration: none !important;
	}

	.current-event-form {
		margin-top: 10px;
		background: #fafafa;
		border: solid 1px #ddd;
		padding: 10px;
	}

	.current-event-form :is(input, select) {
		width: 100%;
		padding: 5px;
		margin: 10px 0;
	}

	.current-event-form select {
		background: #fff;
		border: solid 1px #000;
	}

	.current-event-form textarea {
		width: 100%;
		height: 150px;
		margin-bottom: 10px;
	}

	.current-event-form label {
		padding: 5px 0;
	}

	.submit-event {
		background: #000;
		color: #fff;
		border: solid 1px;
		padding: 10px 15px;
	}

	.no-italics {
		font-style: normal;
	}
</style>



<h3><span class="no-italics">📅</span> CurrentEvents - Add New Event</h3>
<a href="<?php echo DOMAIN_ADMIN; ?>/plugin/currentevents" class="btn">Back to list</a>

<?php
$fileSet = PATH_CONTENT . 'current-events/settings/settings.json';
?>

<?php
if (isset($_GET['edit'])) {
	$file = file_get_contents(PATH_CONTENT . 'current-events/' . $_GET['edit'] . '.json');
	$fileJS = json_decode($file);
};
?>

<form method="post" class="current-event-form">
<input type="hidden" id="jstokenCSRF" name="tokenCSRF" value="<?php echo $tokenCSRF;?>">

	<label for="title-current-event">Title Event</label>
	<input type="text" name="title-current-event" required <?php if (isset($_GET['edit'])) {
																echo 'value="' . $fileJS->eventname . '"';
															}; ?>>
	<label for="description-current-event">Event Description </label>
	<textarea name="description-current-event">
<?php if (isset($_GET['edit'])) {
	echo $fileJS->eventdescription;
}; ?>
</textarea>

	<label for="">Event Display Style</label>
	<select required name="longevent" class="longevent">
		<option value="fullday">Full Day</option>
		<option value="hourday">Hourly</option>
	</select>

	<label for="start-date">Event Start (Required)</label>
	<input type="<?php

					if (isset($fileJS->fullday)  && $fileJS->fullday == 'hourday') {
						echo 'datetime-local';
					} else {
						echo 'date';
					};
					?>" name="start-date" class="startdate" required <?php if (isset($_GET['edit'])) {
																			echo 'value="' . $fileJS->start . '"';
																		}; ?>>
	<label for="end-date">Event End (Required)</label>
	<input type="<?php

					if (isset($fileJS->fullday)  && $fileJS->fullday == 'hourday') {
						echo 'datetime-local';
					} else {
						echo 'date';
					};
					?>" name="end-date" class="enddate" required <?php if (isset($_GET['edit'])) {
																		echo 'value="' . $fileJS->end . '"';
																	}; ?>>
	<label for="end-date">Event Background Color</label>
	<input type="color" name="color-current-event" required <?php if (isset($_GET['edit'])) {
																echo 'value="' . $fileJS->backgroundColor . '"';
															} else {

																if (file_exists($fileSet)) {
																	$js = json_decode(file_get_contents($fileSet));
																	echo 'value="' . $js->backgroundColor . '"';
																};
															}; ?>>

	<label for="end-date">Event Text Color</label>
	<input type="color" name="color-current-text" required <?php if (isset($_GET['edit'])) {
																echo 'value="' . $fileJS->colortext . '"';
															} else {

																if (file_exists($fileSet)) {
																	$js = json_decode(file_get_contents($fileSet));
																	echo 'value="' . $js->textColor . '"';
																};
															};; ?>>

	<label for="url-current-event">Link to Event (Optional)</label>
	<input type="text" name="url-current-event" <?php if (isset($_GET['edit'])) {
													echo 'value="' . @$fileJS->url . '"';
												}; ?>>
	<button type="submit" name="create-event" class="submit-event">Save Event</button>
</form>

<script>
	document.querySelector('.longevent').addEventListener('click', () => {

		if (document.querySelector('.longevent').value == 'fullday') {
			document.querySelector('.startdate').setAttribute('type', 'date');
			document.querySelector('.enddate').setAttribute('type', 'date');
		} else {
			document.querySelector('.startdate').setAttribute('type', 'datetime-local');
			document.querySelector('.enddate').setAttribute('type', 'datetime-local');
		}

	});
</script>

<div class="col-md-12 mt-5 p-0">
	<script type='text/javascript' src='https://storage.ko-fi.com/cdn/widget/Widget_2.js'></script>
	<script type='text/javascript'>
		kofiwidget2.init('Support Me on Ko-fi', '#29abe0', 'I3I2RHQZS');
		kofiwidget2.draw();
	</script>
</div>