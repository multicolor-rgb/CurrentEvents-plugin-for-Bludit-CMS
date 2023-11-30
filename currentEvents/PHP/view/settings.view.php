<style>
	.btn {
		display: inline-flex;
		padding: 5px 10px;
		border: solid 1px #000;
		background: #000;
		color: #fff !important;
		text-decoration: none !important;
	}

	.btn-sm {
		display: inline-flex;
		padding: 5px 10px;
		border: solid 1px #000;
		background: #000;
		color: #fff !important;
		text-decoration: none !important;
		margin: 0 3px;
		text-align: center;
	}

	.btn-sm-red {
		background: red;
		border: red;
	}

	.form-settings {
		background: #fafafa;
		border: solid 1px #ddd;
		padding: 10px;
		margin-top: 10px;
	}

	.form-settings :is(select, input) {
		width: 100%;
		padding: 5px;
		border-radius: 0;
		border: solid 1px #ddd;
		background: #fff;
		margin: 10px 0;
	}

	.form-settings .create-settings {
		display: inline-flex;
		padding: 5px 10px;
		border: solid 1px #000;
		background: #000;
		color: #fff !important;
		text-decoration: none !important;
		width: 200px;
		margin-top: 10px;
	}

	.no-italics {
		font-style: normal;
	}
</style>







<label for="">Lang. Shortcode</label>
<input type="text" name="locale" placeholder="en" value="<?php echo $this->getValue('locale'); ?>">

<label for="">Calendar Display Style</label>
<select name="initialView" class="initialView" id="">
	<option value="dayGridMonth" <?php if($this->getValue('initialView')=='dayGridMonth'){echo 'selected';};?> >Grid - Month</option>
	<option value="dayGridWeek" <?php if($this->getValue('initialView')=='dayGridWeek'){echo 'selected';};?>>Grid - Week</option>
	<option value="dayGridDay" <?php if($this->getValue('initialView')=='dayGridDay'){echo 'selected';};?>>Grid - Day</option>

	<option value="listDay" <?php if($this->getValue('initialView')=='listDay'){echo 'selected';};?>>List - Year</option>
	<option value="listWeek"  <?php if($this->getValue('initialView')=='listWeek'){echo 'selected';};?>>List - Month</option>
	<option value="listMonth" <?php if($this->getValue('initialView')=='listMonth'){echo 'selected';};?>>List - Week</option>
	<option value="listYear" <?php if($this->getValue('initialView')=='listYear'){echo 'selected';};?>>List - Day</option>
</select>

<label for="">Start Day</label>
<select name="firstday" class="firstday">
	<option value="1" <?php if($this->getValue('firstday')=='1'){echo 'selected';};?>>Monday</option>
	<option value="2" <?php if($this->getValue('firstday')=='2'){echo 'selected';};?>>Tuesday</option>
	<option value="3" <?php if($this->getValue('firstday')=='3'){echo 'selected';};?>>Wednesday</option>
	<option value="4" <?php if($this->getValue('firstday')=='4'){echo 'selected';};?>>Thursday</option>
	<option value="5" <?php if($this->getValue('firstday')=='5'){echo 'selected';};?>>Friday</option>
	<option value="6" <?php if($this->getValue('firstday')=='6'){echo 'selected';};?>>Saturday</option>
	<option value="0" <?php if($this->getValue('firstday')=='7'){echo 'selected';};?>>Sunday</option>
</select>

<label for="">Default Background Color</label>
<input type="color" class="backgroundColor form-control" name="backgroundColor" value="<?php echo $this->getValue('backgroundColor');?>">

<label for="">Default Text Color</label>
<input type="color" class="textColor form-control" value="<?php echo $this->getValue('textColor');?>" name="textColor">



<label for="">Show Header Nav?</label>
<select name="headershow" class="headershow" id="headershow">
	<option value="yes" <?php if($this->getValue('headershow')=='yes'){echo 'selected';};?>>Yes</option>
	<option value="no" <?php if($this->getValue('headershow')=='no'){echo 'selected';};?>>No</option>
</select>



<input type="submit" name="create-settings" class="create-settings btn btn-primary mt-3" value="Save Settings">

<div class="col-md-12 mt-5 p-0">
<script type='text/javascript' src='https://storage.ko-fi.com/cdn/widget/Widget_2.js'></script><script type='text/javascript'>kofiwidget2.init('Support Me on Ko-fi', '#29abe0', 'I3I2RHQZS');kofiwidget2.draw();</script> 
</div>