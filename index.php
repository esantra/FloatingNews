<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title>The Floating News</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all"/>
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body">

	<img id="top" src="images/top.png" alt=""/>
	<div id="form_container">

		<h1>
			<a>Preferences</a>
		</h1>
		<form id="formId" class="preferences" method="post"
			action="floatingNewsView.php">
			<div class="form_description">
				<h2>Preferences</h2>
			</div>
			<ul>

				<li id="li_1"><label class="description" for="element_1">How many headlines today? </label>
					<div>
						<input id="numPosts" name="numPosts" class="element text small inputStyle"
							type="text" maxlength="6" value="" />
					</div>
					<p class="guidelines" id="guide_1">
						<small>You may pick up to 1000 to view, but 200 is generally best!
						(Number of headlines may be smaller than the amount specified depending
						upon availabilty)</small>
					</p></li>
					<li id="li_2">
						<label class="description" for="element_2">Popular
						News Sources </label> <span> 
						
						<input id="cnn"
						name="source[]" class="element checkbox" type="checkbox" value="0" />
						<label class="choice" for="cnn">CNN</label> 
						
						<input id="time" name="source[]" class="element checkbox"
						type="checkbox" value="1" /> 
						<label class="choice" for="time">Time Magazine</label> 
						
						<input id="pcens" name="source[]" class="element checkbox" type="checkbox" 
							value="2" />
						<label class="choice" for="pcens">Project Censored</label> 
						
						<input id="wired" name="source[]" class="element checkbox"
						type="checkbox" value="3" /> 
						<label class="choice" for="wired">Wired</label>
						
						<input id="techCrunch" name="source[]" class="element checkbox"
						type="checkbox" value="4" /> 
						<label class="choice" for="techCrunch">Tech Crunch</label>	
						
						<input id="reuters" name="source[]" class="element checkbox"
						type="checkbox" value="5" /> 
						<label class="choice" for="reuters">Reuters</label>	
						
						<input id="alternet" name="source[]" class="element checkbox"
						type="checkbox" value="6" /> 
						<label class="choice" for="alternet">Alternet</label>																	

						<input id="msn" name="source[]" class="element checkbox"
						type="checkbox" value="7" /> 
						<label class="choice" for="msn">MSN</label>	
						
						</span>
					</li>

				<li class="buttons"><input type="hidden" name="form_id"
					value="1096802" /> <input id="saveForm" class="button button1"
					type="submit" name="submit" value="Submit" /></li>
			</ul>
		</form>
	</div>
	<img id="bottom" src="images/bottom.png" alt=""/>
</body>
</html>