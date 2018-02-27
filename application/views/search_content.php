<div class="search-result-wrapper">
<?php foreach($result as $row) { ?>
<div class="sport-label soccer">
  <?php echo $row->name;?>
</div>

<table>
  <thead>
	<tr>
	  <th>The teams</th>
	</tr>
  </thead>

  <tbody>
  <?php foreach($row->participants as $participant) { ?>
	<tr>
	  <td>
		<a href="<?=base_url($game.'/'.url_title($participant->country,'dash',true)).'/takim/'.url_title($participant->name,'dash',true).'-'.$participant->id?>"><span><?=$participant->name?> (<?=$participant->country?>)</span></a>
	  </td>
	</tr>
  <?php } ?>
  </tbody>
</table>
<?php } ?>
</div>