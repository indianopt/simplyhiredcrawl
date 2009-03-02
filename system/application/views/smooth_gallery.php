<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>SmoothGallery</title>
		<link rel="stylesheet" href="<?=base_url()?>js/smooth_gallery/css/layout.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="<?=base_url()?>js/smooth_gallery/css/jd.gallery.css" type="text/css" media="screen" charset="utf-8" />
		<script src="<?=base_url()?>js/smooth_gallery/scripts/mootools.v1.11.js" type="text/javascript"></script>
		<script src="<?=base_url()?>js/smooth_gallery/scripts/jd.gallery.js" type="text/javascript"></script>
	</head>
	<body>
		<script type="text/javascript">
			function startGallery() {
				var myGallery = new gallery($('myGallery'), {
					timed: false
				});
			}
			window.addEvent('domready',startGallery);
		</script>
		<div class="content">
			<?if(isset($item_images) && count($item_images) > 0) {?>
                <div id="myGallery">
                    <?foreach($item_images as $image) {?>
            			<div class="imageElement">
            				<h3><?=$image['title']?></h3>
            				<p><?=$image['title']?></p>
            				<a href="#" title="open image" class="open"></a>
            				<img src="<?=base_url()?>uploads/item_image_gallery/<?=$image['image']?>" class="full" />
            				<img src="<?=base_url()?>uploads/item_image_gallery/thumbnail/<?=$image['image']?>" class="thumbnail" />
            			</div>
                    <?}?>
        		</div>
            <?}?>
		</div>
	</body>
</html>