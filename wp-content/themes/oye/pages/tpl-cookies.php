<?php $categories = get_terms('cookie_manager_cat', array('orderby'=>'slug','order'=>'DESC')); $catcount = 1; ?>
<div id="cookie-popup">
    <a href="javascript:void(0);" class="cookie-popup_close popup-close-btn"></a>
	<h3 class="cookie-heading">our cookies.</h3>
    <div class="cookie-top">Our websites uses cookies. We do this to optimise the performance of our website and to be able to adjust our services and marketing to our visitors. Do you accept that we place those cookies? View our <a href="<?php echo site_url('privacy-policy'); ?>">privacy policy</a> for more information about the specific cookies we place.</div>

    <div id="cookie-accordian">
		<ul class="cookie-accordian-inner">
			<?php foreach ($categories as $category) {
				$activeclass = $catcount == 1 ? 'active' : '';
				echo '<li class='.$activeclass.'>
					<label><input type="radio" name="slide-cookie" value="'.$category->term_id.'"><span>'.$category->name.'</span></label>
					<ul class="slide">
						<li>'.$category->description.'</li>
					</ul>
				</li>';
				
				$catcount++;
			} ?>
		</ul>
	</div>

	<div class="cookie-bottom">
		<span class="cookies-btn"><a class="btn btn-white cookies-btn-link" href="javascript:void(0);" target="_self" hreflang="en">DO NOT SHOW ANYMORE</a></span>
	</div>
</div>

<div id="cookie-strip" style="display: none;">
	<div class="cookie-strip-inner">
		We use <a class="show-cookie-popup" href="javascript:void(0);">cookies</a>. <a class="cookie-accept-btn" href="javascript:void(0);">I agree</a>
	</div>
	<a href="javascript:void(0);" class="popup-strip-btn popup-close-btn"></a>
</div>