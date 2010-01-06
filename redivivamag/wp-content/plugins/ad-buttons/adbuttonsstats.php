<?php 
    global $wpdb;
	$ab_plugindir = get_option('siteurl').'/'.PLUGINDIR.'/'.dirname(plugin_basename(__FILE__));
	$graphdate = $_GET['month'];
	if(!$graphdate){
		$graphdate = date(Ym);
	}
	$graphyear = substr($graphdate, 0, 4);
	$graphmonth = substr($graphdate, 4, 2);	

	$prevmonth = $graphmonth - 1;
	$nextmonth = $graphmonth + 1;
	$prevyear = $graphyear;
	$nextyear = $graphyear;
	
	if ($prevmonth == 0){
		$prevmonth = 12;
		$prevyear = $prevyear - 1;
	}

	if ($nextmonth == 13){
		$nextmonth = 1;
		$nextyear = $nextyear +1;
	}
	
	$prevdate = $prevyear.str_pad($prevmonth, 2, 0, STR_PAD_LEFT);
	$nextdate = $nextyear.str_pad($nextmonth, 2, 0, STR_PAD_LEFT);
	
	$replacetag = "&month=$graphdate";
	$nplink = str_replace($replacetag, "", $_SERVER['REQUEST_URI']);
?>
<div class="wrap">
<h2>Ad Buttons Stats </h2>
<a href="<?php echo "$nplink&month=$prevdate";?>">previous month</a> <a href="<?php echo "$nplink&month=$nextdate";?>">next month</a> <br/>
<img src="<?php echo $ab_plugindir; ?>/adbuttonsstatsimg.php?graphdate=<?php echo $graphdate;?>">
<br/>
<p>Bars represent ad views. The scale is shown on the left side. (Each ad is counted individually, so if you are 
showing an Ad Buttons ad block with 4 ads in your sidebar, you should see numbers four times as high as your page 
view count)<br/>
Lines show the number of ad clicks for each day. The scale is shown on the right side of the graph.
</p>
<p>Stats are a work in progress, stay tuned for updates! <a href="http://blogio.net/blog/donate/" target="_blank">You can help speed things up!</a></p>

</div>