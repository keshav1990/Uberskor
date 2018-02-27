<div id="ifmenu-calendar" class="has-tomorrow has-yesterday">

							  <!----span class="day yesterday"><span class="arrow"></span></span--->

							  <?php
									echo "<select  class=\"home_selct\" name=\"proposed_deliver_date\" id='datechange' onchange=\"changeDate()\"><option>-Tarih seç-</option>";
									for($i = 0; $i < 14; $i++) {
									// Get the current year, month, and day
									$year = date('y');
									$mon = date('m');
									$day = (date('d')-7)+ $i;
									// Make sure we don't have too many days for the current month...if we do, subtract the two
									if($day > date('t')) {
										$day -= date('t');
										// We've increased a month too, by the way
										$mon += 1;
										// Make sure we compensate for a new year
										if($mon > 12) { $mon = 1; $year++; }
									}
									// Now make a timestamp of the current information
									$stamp = mktime(0,0,0,$mon,$day,$year); 
									// Substitue this with your dropdown code 
									echo  "<option class='optCss' value='".date('Y-m-d',$stamp)."' ".(date('Y-m-d',$stamp)==$date?"selected":'')." >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;". date('D M d', $stamp)."&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</option>"; 
									}  
									echo "</select>";
								?>
							 
								<span class="day tomorrow"><span class="inner"><span class="arrow"></span></span></span>
								
							  </div>