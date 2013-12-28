<div id="pageheader_top">
        <div id="pageheader_logo">
            <a href="/index.php"><img src="<?php bloginfo('template_directory'); ?>/_resources/images/AT_Header_Logo.gif" alt="" width="243" height="81"></a></div>
        <div id="pageheader_global"><p>
            <a href="/abilitytrip-mobile/">ABILITYTRIP MOBILE</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/about/">ABOUT US</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/contact/">CONTACT US</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/resources/">RESOURCES</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/services/">SERVICES</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/advertising/">ADVERTISING</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/forums/">FORUMS</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/in-the-news/">NEWS</a>
          </p>
      </div> 
      
       <div id="pageheader_nav">
        <ul>
        	<li><a href="/destinations/">DESTINATIONS<img class="down_li" src="<?php bloginfo('template_directory'); ?>/_resources/images/AT-down_li.gif" /></a></li>
            <li><a href="/travel-tools/">TRAVEL TOOLS<img class="down_li" src="<?php bloginfo('template_directory'); ?>/_resources/images/AT-down_li.gif" /></a></li>
                <li><a href="/ways-you-can-contribute-knowledge-for-destinations/">ADD KNOWLEDGE</a></li>
               
            
            <?php
			$registereduser = new User();
			if (!($registereduser->isLoggedIn())) { ?>
            <li><a href="/register/">REGISTER NOW!</a></li>
            <?php } ?>
            </ul>
        
        </div>
        <div id="pageheader_search"><p>
            <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/index.php"><input name="s" id="s" class="search_text" type="text" value="Search" maxlength="125" /> &nbsp; <input name="Search" type="submit" id="searchsubmit" value="Search" /></form>
          </p></div> 
      
    </div>
