			<?=style('banners_slider.css')?>
            <script type="text/javascript" src="<?=base_url()?>js/contentslider/contentslider.js"></script>
			<div id="banners_slider" class="bannerwrapper">
                <?foreach($imageFileNames as $fn) {?>
            	    <div class="contentdiv" style="background: transparent url(<?=$fn?>) no-repeat scroll left center; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; display: none; z-index: 230; opacity: 1.1; visibility: visible;"></div>
                <?}?>
        	</div>
        	<div id="paginate-banners_slider" class="pagination" style="display: none"></div>
	        <script type="text/javascript">
		        featuredcontentslider.init({
		        	id: "banners_slider",
		        	contentsource: ["inline", ""],
		        	toc: "#increment",
		        	nextprev: ["", ""],
		        	revealtype: "click",
		        	enablefade: [true, 0.05],
		        	autorotate: [true, 3000],
		        	onChange: function(previndex, curindex){
		        	}
		        });
	        </script>
