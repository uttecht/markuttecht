// closure to avoid namespace collision
(function(){
		tinymce.create('tinymce.plugins.thundercodes', {
	    createControl: function(n, cm) {
	        switch (n) {
	            case 'thundercodes_button':
	                var c = cm.createSplitButton('thundercodes_button', {
	                    title : 'ThunderCodes',
	                    image : '../wp-content/themes/webpaint/functions/thundercodes/thunder_icon.png',
	                    
	                });
	
	                c.onRenderMenu.add(function(c, m) {
	                    m.add({title : 'ThunderCodes', 'class' : 'mceMenuItemTitle'}).setDisabled(1);
	
	                    m.add({title : 'Button', onclick : function() {
	                    	callshortcode("button");
	                    }});
	
	                    m.add({title : 'Intro Text', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[intro]YOUR_TEXT_HERE[/intro]');                    
	                    }});
	                    
	                    m.add({title : 'Divider', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[divider]');                    
	                    }});
	                    
	                    m.add({title : 'Dropcap', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[dropcap]C[/dropcap]');                    
	                    }});
	                    
	                    m.add({title : 'Box', onclick : function() {
	                    	callshortcode("box");
	                    }});
	                    
	                    m.add({title : 'Highlight', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[highlight style="1 OR 2"]YOUR_HIGHLIGHTED_TEXT[/highlight]');   
	                    }});
	                    
	                    m.add({title : 'Codebox', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[codebox]YOUR_CODE[/codebox]');   
	                    }});
	                    
	                    m.add({title : 'Darkblock', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[darkblock][/darkblock]');
	                    }});
	                    
	                    m.add({title : 'Blackblock', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[blackblock][/blackblock]');
	                    }});
	                    
	                    m.add({title : 'Parallaxblock', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[parallaxblock background="URL of the huge image to scroll as background"]][/parallaxblock]');
	                    }});
	                    
	                    m.add({title : 'Sup Text', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[sup]YOUR_SUP_TEXT[/sup]');   
	                    }});
	                    
	                    m.add({title : 'Sub Text', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[sub]YOUR_SUB_TEXT[/sub]');   
	                    }});
	                    
	                    m.add({title : 'Cite Text', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[cite]YOUR_CITE_TEXT[/cite]');   
	                    }});
	                   
	                    m.add({title : 'Abbr Text', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[abbr title="abbr explanation"]YOUR_ABBR_TEXT[/abbr]');   
	                    }});
	                    
	                    m.add({title : 'HeadSubline', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[headsubline subline="YOUR_SUBLINE_TEXT"]>YOUR_HEADLINE_TEXT[/headsubline]');                    
	                    }});
	                    
	                    m.add({title : 'Latest Posts', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[latest_posts number="2" comments="on" categories="on" exclude="Insert the slugs (not name) of the categories you do not want to get listed here (Comma seperated)" ]');   
	                    }});
	                    
	                    m.add({title : 'Portfolio Carousel', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[latest_projects_carousel cat_slugs="Comma Seperated List of the Portfolio Category Slugs" lightbox="yes or no"]');
	                    }});
	                    
	                    m.add({title : 'Portfolio Showcase', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[showcase number=12 cat_slugs="Comma Seperated List of the Portfolio Category Slugs"]');
	                    }});
	                    
	                    m.add({title : 'Portfolio Lightbox', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[portfolio_lightbox number=12 cat_slugs="Comma Seperated List of the Portfolio Category Slugs"]]');
	                    }});
	                    
	                    m.add({title : 'Portfolio Classic', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[portfolio_classic number=12 cat_slugs="Comma Seperated List of the Portfolio Category Slugs"]');
	                    }});
	                    
	                    m.add({title : 'Tabs', onclick : function() {
	                    	callshortcode("tabs");
	                    }});
	                    
	                    m.add({title : 'Toggle', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[toggle title="YOUR_TOGGLE_TITLE"]YOUR_TOGGLE_CONTENT[/toggle]');   
	                    }});
	                    
	                    m.add({title : 'Progress Bar', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[progress][progbar width="90%"]CSS/HTML <em>90%</em>[/progbar][progbar width="40%"]jQuery <em>40%</em>[/progbar][/progress]');   
	                    }});
	                    
	                    m.add({title : 'Google Map', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[gmap width="100%" height="450" link="https://maps.google.com/maps?source=embed&amp;hl=en-US&amp;ie=UTF8&amp;ll=41.525287,-87.450485&amp;spn=0.099472,0.263844&amp;t=m&amp;z=13&amp;output=embed"]');   
	                    }});
	                    
	                    m.add({title : 'Socialbar', onclick : function() {
	                    	callshortcode("socialbar");
	                    }});
	                    
	                    m.add({title : 'Testimonials', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[testimonials]<br>[quote author="AUTHOR_NAME"]THE_TEXT[/quote]<br>[quote author="AUTHOR_NAME"]THE_TEXT[/quote][/testimonials]');
	                    }});
	                    
	                    m.add({title : 'Portfolio Info', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[portfolio_info_set]<br>[portfolio_info title="Date:"]February 15, 2013[/portfolio_info]<br>[portfolio_info title="Categories:"]Category 1, Category 2[/portfolio_info]<br>[portfolio_info title="Client:"]ThunderBuddies[/portfolio_info]<br>[portfolio_info title="Link:"]http://themes.thunderbuddies4life.com[/portfolio_info][/portfolio_info_set]');   
	                    }});
	                    m.add({title : 'Client List', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[client_list][client link="IMAGE_LINK" image="IMAGE_URL"][client link="IMAGE_LINK" image="IMAGE_URL"][/client_list]');
	                    }});
	                    
	                    m.add({title : 'Latest Tweets', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[darkblock][latest_tweet twitter_id="tbthemes" consumer_key="Find or Create your Twitter App -> http://dev.twitter.com/apps" consumer_secret="" access_token="" access_token_secret=""][/darkblock]');
	                    }});
	                    
	                    m.add({title : 'Price Table', onclick : function() {
	                    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[pricetable columns=4]\
[pricetable_column title="FREE" price="FREE!" price_prefix="" price_subline="1 day" button_text="Select Plan" button_url="#"]\
<ul>\
            <li>1 Domains</li>\
            <li>1GB Storage</li>\
            <li>1 Users</li>\
            <li>20 Pages</li>\
            <li>Enhanced Security</li>\
          </ul>\
[/pricetable_column]\
[pricetable_column title="BRONZE" price=9 price_prefix="$" price_subline="7 days" button_text="Select Plan" button_url="#"]\
<ul>\
            <li>5 Domains</li>\
            <li>2GB Storage</li>\
            <li>25 Users</li>\
            <li>Unlimited Pages</li>\
            <li>Enhanced Security</li>\
          </ul>\
[/pricetable_column]\
[pricetable_column title="SILVER" price=18 price_prefix="$" price_subline="30 days" button_text="Select Plan" button_url="#"]\
<ul>\
            <li>5 Domains</li>\
            <li>2GB Storage</li>\
            <li>25 Users</li>\
            <li>Unlimited Pages</li>\
            <li>Enhanced Security</li>\
          </ul>\
[/pricetable_column]\
[pricetable_column title="GOLD" price=27 price_prefix="$" price_subline="120 days" button_text="Select Plan" button_url="#"]\
<ul>\
            <li>5 Domains</li>\
            <li>2GB Storage</li>\
            <li>25 Users</li>\
            <li>Unlimited Pages</li>\
            <li>Enhanced Security</li>\
          </ul>\
[/pricetable_column]\
[/pricetable]');
	                    }});
	                    
	                });
	
	              // Return the new splitbutton instance
	              return c;
	        }
	
	        return null;
	    }
	});	
	
	
	
	tinymce.PluginManager.add('thundercodes', tinymce.plugins.thundercodes);

	
	function callshortcode(thundershortcode){
		switch (thundershortcode) {
		    case "button": 
		    				var form = jQuery('<div id="thundercodes-form" class="thundercodes-form"><table id="thundercodes-table" class="form-table">\
										<tr>\
				<th><label for="thundercodes-link">Link</label></th>\
				<td><input type="text" id="thundercodes-link" name="link" value="#" /><br />\
				<small>The link a button sends you when clicking</small></td>\
			</tr>\
												<tr>\
				<th><label for="thundercodes-target">Target</label></th>\
				<td><input type="text" id="thundercodes-target" name="target" value="_self" /><br />\
				<small>Where should the link be opened?</small></td>\
			</tr>\
												<tr>\
				<th><label for="thundercodes-color">Color</label></th>\
				<td><select name="color" id="thundercodes-color">\ <option value="highlight">highlight</option><option value="pink">pink</option><option value="purple">purple</option><option value="gray">gray</option><option value="green">green</option><option value="blue">blue</option><option value="aqua">aqua</option><option value="yellow">yellow</option><option value="orange">orange</option>		</select><br />\
				<small>Select the Color</small></td>\
			</tr>\
												<tr>\
				<th><label for="thundercodes-content">Text</label></th>\
				<td><input type="text" id="thundercodes-content" name="content" value="Button" /><br />\
				<small>Text on the button</small></td>\
			</tr>\
												</table>\
										<p class="submit">\
											<input type="button" id="thundercodes-submit" class="button-primary" value="Insert Button" name="submit" onclick="submitForm()" />\
										</p>\
									</div>');
							thunder_options = Array("link","target","color"); 
							thunder_shortcode = "[button {{link}} {{target}} {{color}}]YOUR_BUTTON_TEXT[/button]";
							H = 294;
		    	break;	
		    
		    case "box": 
		    				var form = jQuery('<div id="thundercodes-form" class="thundercodes-form"><table id="thundercodes-table" class="form-table">\
										<tr>\
				<th><label for="thundercodes-style">Style</label></th>\
				<td><select name="style" id="thundercodes-style">\ <option value="info">info</option><option value="download">download</option><option value="warning">warning</option><option value="note">note</option>		</select><br />\
				<small>Define the display style of the Box</small></td>\
			</tr>\
												</table>\
										<p class="submit">\
											<input type="button" id="thundercodes-submit" class="button-primary" value="Insert Box" name="submit" onclick="submitForm()" />\
										</p>\
									</div>');
							thunder_options = Array("style"); 
							thunder_shortcode = "[box {{style}}]YOUR_BOX_TEXT[/box]";
							H = 110;
		    	break;	
		    	
		    case "projects": 
		    				var form = jQuery('<div id="thundercodes-form" class="thundercodes-form"><table id="thundercodes-table" class="form-table">\
										<tr>\
				<th><label for="thundercodes-portfolioslug">Portfolio</label></th>\
				<td><select name="portfolioslug" id="thundercodes-portfolioslug">\ 		</select><br />\
				<small>Choose the Portfolio to Display</small></td> \
			</tr>\ 										<tr>\
				<th><label for="thundercodes-number">Number</label></th>\
				<td><input type="text" id="thundercodes-number" name="number" value="2" /><br />\
				<small>How many Portfolio items do you want to display?</small></td>\
			</tr>\
												</table>\
										<p class="submit">\
											<input type="button" id="thundercodes-submit" class="button-primary" value="Insert Latest Projects" name="submit" onclick="submitForm()" />\
										</p>\
									</div>');
							thunder_options = Array("number","portfolioslug"); 
							thunder_shortcode = "[latest_projects {{number}} {{portfolioslug}}]";
							H = 170;
		    	break;	
		    case "tabs": 
		    				var form = jQuery('<div id="thundercodes-form" class="thundercodes-form"><table id="thundercodes-table" class="form-table">\
										<tr>\
				<th><label for="thundercodes-number">Number of Tabs</label></th>\
				<td><input type="text" id="thundercodes-number" name="number" value="3" /><br />\
				<small>How many Tabs?</small></td>\
			</tr>\
												<tr>\
				<th><label for="thundercodes-align">Tabs Align</label></th>\
				<td><select name="align" id="thundercodes-align">\ <option value="side">side</option><option value="top">top</option>		</select><br />\
				<small>Display the tabs bound to the left or on top (classic)</small></td>\
			</tr>\
												</table>\
										<p class="submit">\
											<input type="button" id="thundercodes-submit" class="button-primary" value="Insert Tabs" name="submit" onclick="submitTabsForm()" />\
										</p>\
									</div>');
							thunder_options = Array("number"); 
							thunder_shortcode = "{{tabs}}";
							H = 170;
		    	break;	
		    case "socialbar": 
		    				var form = jQuery('<div id="thundercodes-form" class="thundercodes-form"><table id="thundercodes-table" class="form-table">\
										<tr>\
				<th><label for="thundercodes-socials">Socials</label></th>\
				<td>\
				<div>\
			        <div style="display:none;">\
			        	<br><div class="thesocials"><select class="widefat">\
				        	<option value="dribbble">Dribbble</option>\
				        	<option value="facebook">Facebook</option>\
				        	<option value="flickr">Flickr</option>\
				        	<option value="forrst">Forrst</option>\
				        	<option value="google">Google</option>\
				        	<option value="lastfm">LastFM</option>\
				        	<option value="linkedin">LinkedIn</option>\
				        	<option value="pinterest">Pinterest</option>\
				        	<option value="rss">RSS</option>\
				        	<option value="skype">Skype</option>\
				        	<option value="tumblr">Tumblr</option>\
				        	<option value="twitter">Twitter</option>\
				        	<option value="vimeo">Vimeo</option>\
				        	<option value="youtube">Youtube</option>\
				        </select>\
				        <label>URL Link:</label>\
				        <input type="text" class="widefat"/>\</div>\
				        <br><a href="#" class="tb_longwave_delete_social">Delete Social</a><br>\
				   </div>\
				   <div class="thesocials"><select class="widefat">\
			        	<option value="dribbble">Dribbble</option>\
			        	<option value="facebook">Facebook</option>\
			        	<option value="flickr">Flickr</option>\
			        	<option value="forrst">Forrst</option>\
			        	<option value="google">Google</option>\
			        	<option value="lastfm">LastFM</option>\
			        	<option value="linkedin">LinkedIn</option>\
			        	<option value="pinterest">Pinterest</option>\
			        	<option value="rss">RSS</option>\
			        	<option value="skype">Skype</option>\
			        	<option value="tumblr">Tumblr</option>\
			        	<option value="twitter">Twitter</option>\
			        	<option value="vimeo">Vimeo</option>\
			        	<option value="youtube">Youtube</option>\
			        </select>\
			        <label>URL Link:</label>\
			        <input type="text" class="widefat"/></div><br>\
			        <span></span>\
			        <br><hr><a href="#" class="tb_longwave_add_social">Add Social</a>\
				</div>\
				</td>\
			</tr>\
												</table>\
										<p class="submit">\
											<input type="button" id="thundercodes-submit" class="button-primary" value="Insert Socialbar" name="submit" onclick="submitSocialsForm()" />\
										</p>\
									</div>');
							thunder_options = Array("number"); 
							thunder_shortcode = "[socialbar{{socials}}]";
							H = 350;
		    	break;	
		}
			
		jQuery(".thundercodes-form").remove();							
		var table = form.find('#thundercodes-table');
		form.appendTo('body').hide();
    
        // triggers the thickbox
		//var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
		var width = jQuery(window).width(), W = ( 720 < width ) ? 720 : width;
		W = W - 80;
		//H = H - 84;
		tb_show( 'ThunderCodes', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=thundercodes-form' );
		jQuery("#TB_window").css("height",H+65);
		jQuery("#TB_window").css("overflow-y","auto");
		jQuery("#TB_window").css("overflow-x","hidden");

		// handles the click event of the submit button
		//form.find('#thundercodes-submit').click(function(){
	}

	jQuery(".tb_longwave_add_social").live("click",function(){
    	$parent = jQuery(this).closest("div");
    	$field = $parent.find("div:first").clone(true);
    	$field.find("select,input").each(function(){
        	$this = jQuery(this);
        	$this.attr("name",$this.data("name"));
        	});
    	$field.css("display","");
    	$parent.find("span").before($field);
    	return false;
	});
	jQuery(".tb_longwave_delete_social").live("click",function(){
    	jQuery(this).closest("div").remove();	
    	return false;
	});

})()
	var thunder_options;
	var thunder_shortcode;
	
	function submitForm(){
			for(index in thunder_options){
				var value = jQuery("#thundercodes-table").find('#thundercodes-' + thunder_options[index]).val();
				// attaches the attribute to the shortcode only if it's different from the default value
				//if ( value !== options[index] )
				if(value!="")
					thunder_shortcode = thunder_shortcode.replace( "{{"+thunder_options[index]+"}}" , thunder_options[index] + '="'+ value +'"');
				else 
					thunder_shortcode = thunder_shortcode.replace( "{{"+thunder_options[index]+"}}" , "");
			};
			/*value = jQuery("#thundercodes-table").find('#thundercodes-content').val();
			if(value!="")	
				thunder_shortcode = thunder_shortcode.replace( "{{content}}" , value);
			else 
				thunder_shortcode = thunder_shortcode.replace( "{{content}}" , '');
			*/			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, thunder_shortcode);
			
			// closes Thickbox
			tb_remove();
	}
	
	function submitTabsForm(){
			var number = jQuery("#thundercodes-table").find('#thundercodes-number').val();
			var align = jQuery("#thundercodes-table").find('#thundercodes-align').val();	
			var tabs = "";	
			for (i=1; i <= number; i++ ){
				tabs += '[tab title="Tab Title '+i+'"]Tab Content '+i+'[/tab]';
			}
			thunder_shortcode = '[tabs align="' +align+'"]' +thunder_shortcode+ '[/tabs]';
			thunder_shortcode = thunder_shortcode.replace( "{{tabs}}" , tabs);
			
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, thunder_shortcode);
			
			// closes Thickbox
			tb_remove();
	}
	
	function submitSocialsForm(){
			socials = "";
			jQuery(".thesocials").each(function(){
				$this = jQuery(this);
				network = $this.find("select").val();
				link = $this.find("input").val();
				if(link!="")
					socials += ' ' + network + '=' + '"' + link + '"';
			});
			
			thunder_shortcode = thunder_shortcode.replace( "{{socials}}" , socials);
			
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, thunder_shortcode);
			
			// closes Thickbox
			tb_remove();
	}