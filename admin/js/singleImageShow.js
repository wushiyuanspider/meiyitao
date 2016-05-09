//file id,  img图片外面的盒子id 269 148
function previewImage(file, target, MAXWIDTH, MAXHEIGHT) {
	MAXWIDTH = MAXWIDTH || 200;
	MAXHEIGHT = MAXHEIGHT || 100;
	var oDiv = target == "string" ? document.getElementById(target) : target;
	var oDiv_id = "div___0"
	var img_id = oDiv_id + "_img"
	if (file.files && file.files[0]) {
		oDiv.innerHTML = '<img id="' + img_id + '">';
		var img = document.getElementById(img_id);
		img.onload = function() {
			img.width = MAXWIDTH;
			img.height = MAXHEIGHT;
		}
		var reader = new FileReader();
		reader.onload = function(evt) {
			img.src = evt.target.result;
		}
		reader.readAsDataURL(file.files[0]);
	} else {
		file.select();
		var src = document.selection.createRange().text;
		oDiv.innerHTML = '<img id="' + img_id + '">';
		var img = document.getElementById(img_id);
		img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
		var string = '<div style="width:' + MAXWIDTH + 'px;height:' + MAXHEIGHT + 'px;filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=' +
			src + ');"></div>';
		oDiv.innerHTML = string;
	}
}