<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Multi Language</title>
</head>
<body>
<select onchange="javascript:window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/'+this.value;">
    <option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>>English</option>
    <option value="french" <?php if($this->session->userdata('site_lang') == 'french') echo 'selected="selected"'; ?>>French</option>
    <option value="spanish" <?php if($this->session->userdata('site_lang') == 'spanish') echo 'selected="selected"'; ?>>Spanish</option>  
    <option value="turkish" <?php if($this->session->userdata('site_lang') == 'turkish') echo 'selected="selected"'; ?>>Turkish</option>   
</select>
<p><?php echo $this->lang->line('welcome_message'); ?></p>

</body>
</html>