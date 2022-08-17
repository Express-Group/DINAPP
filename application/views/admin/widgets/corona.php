<?php
$style 		= str_replace(["style='background-color:" ,";'"] ,"" ,$content['widget_bg_color']);
$widget_instance_id	 	= $content['widget_values']['data-widgetinstanceid'];
$view_mode              = $content['mode'];
$widget_instance_details= $this->widget_model->getWidgetInstance('', '','', '', $widget_instance_id, $content['mode']);
$widget_position = $content['widget_position'];	
;
if($widget_instance_details['AdvertisementScript']=='3'){
?>
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 s-margin-bottom-<?php echo $widget_instance_id; ?>">
    <div class="ad_script_<?php echo $widget_instance_id;?>" id="ad_script_<?php echo $widget_instance_id;?>">
      <?php echo $widget_instance_details['AdvertisementScript']; ?>
    </div>
  </div>
</div>
<script>$.ajax({ type:'post', url :'<?php echo BASEURL ?>/user/commonwidget/corona?type=<?php echo $widget_instance_details['AdvertisementScript']; ?>',	cache:false, success:function(result){ $('#ad_script_<?php echo $widget_instance_id; ?>').html(result);} });</script>
<?php	
}else{
?>

<style>.box{width: 145px;height: 80px;font-size: 13px;color:#fff;position: fixed;right: 2%;bottom: 15%;z-index: 999999;}.box .side {box-shadow: 0px 1px 7px 1px #00000042;cursor: move;padding:5%;width:100%;}.box .side table{width:100%;background:#fff;color:#000;padding: 3%;font-weight: bold;font-size: 12px; border: 4px solid #fff;}	.box .side h6{margin:0;padding-bottom:3px;font-weight:bold !important;font-size:17px;text-align:center;color:#fff !important;position:relative;}.box .side h6 span{background: #2b5279;padding: 0px 4px 1px;cursor: pointer;position: absolute;right: -7px;top: -7px;}.box .side h5 {margin:0;text-align:center;font-weight:normal;}.box .side h5 a{color:#fff;text-decoration:underline;font-size:10px;}.box .side table tr  td:last-child , .box .side table tr  th:last-child{text-align:center;}.box .side table thead tr{background:#eee;}.flipbox-wrapper {perspective: 800px; perspective-origin: 50% 50%;}.flipbox-wrapper .flipbox-box {position: relative; width: 100%; height: 100%; transform-style: preserve-3d; transition-property: transform;}.flipbox-wrapper .flipbox-box .flipbox-side {position: absolute; width: 100%; height: 100%; backface-visibility: hidden;}.flipbox-wrapper .flipbox-box .flipbox-side.flipbox-front {transform: translateZ(0);}.flipbox-wrapper .flipbox-box .flipbox-side.flipbox-left {transform-origin: center left;}.flipbox-wrapper .flipbox-box .flipbox-side.flipbox-right {transform-origin: top right;}	.flipbox-wrapper .flipbox-box .flipbox-side.flipbox-top {transform-origin: top center;}	.flipbox-wrapper .flipbox-box .flipbox-side.flipbox-bottom {transform-origin: bottom center;}.close_btn{float: right; padding-right:5px; cursor:pointer; }.box .side table tr td{font-size:10px;}@media only screen and (max-width: 991px){.box{right: 7%;bottom: 12%;}}</style>
<?php
if($widget_instance_details['AdvertisementScript']=='1'){
	echo '<style>.box .side {background: #09155E;}</style>';
}else{
	echo '<style>.box .side {background: #366696;}</style>'; 
}
?>
<div draggable="true" class="box" id="cube"></div><script>(function($){'use strict';var namespace='jquery-flipbox';function FlipBox($element,options){options=options||{};this.$element=$element;this.rotation=0;this.contents=this.$element.children().detach().map(function(){return this});this.contentIndex=Math.min(Math.max(options.index,0),this.contents.length-1)||0;this.config(options);this.create()}FlipBox.prototype.config=function(options){options=options||{};if(this.options){delete options.vertical;delete options.width;delete options.height}this.options=$.extend({vertical:!1,width:this.$element.width(),height:this.$element.height(),animationDuration:3000,animationEasing:'ease',autoplay:!1,autoplayReverse:!1,autoplayWaitDuration:3000,autoplayPauseOnHover:!1},this.options,options)};FlipBox.prototype.create=function(){var _this=this;this.$element.addClass('flipbox-wrapper');this.$box=$('<div></div>').addClass('flipbox-box').css('transition-duration',(this.options.animationDuration||0)+'ms').css('transition-timing-function',this.options.animationEasing).appendTo(this.$element);this.$front=$('<div></div>').addClass('flipbox-side flipbox-front').appendTo(this.$box);this.$back=$('<div></div>').addClass('flipbox-side flipbox-back').appendTo(this.$box);if(this.options.vertical){this.$box.addClass('flipbox-vertical');this.$top=$('<div></div>').addClass('flipbox-side flipbox-top').appendTo(this.$box);this.$bottom=$('<div></div>').addClass('flipbox-side flipbox-bottom').appendTo(this.$box)}else{this.$box.addClass('flipbox-horizontal');this.$left=$('<div></div>').addClass('flipbox-side flipbox-left').appendTo(this.$box);this.$right=$('<div></div>').addClass('flipbox-side flipbox-right').appendTo(this.$box)}this.$front.append(this.contents[this.contentIndex]);if(this.options.autoplay&&this.options.autoplayPauseOnHover){this.$element.on('mouseenter.'+namespace,function(){_this.toggleAutoplay(!1)}).on('mouseleave.'+namespace,function(){_this.toggleAutoplay(!0)})}this.resize();this.toggleAutoplay(this.options.autoplay);$(window).on('focus.'+namespace,function(){_this.toggleAutoplay(_this.options.autoplay)});$(window).on('blur.'+namespace,function(){_this.toggleAutoplay(!1)});this.trigger('created')};FlipBox.prototype.update=function(){this.$box.css('transition-duration',(this.options.animationDuration||0)+'ms').css('transition-timing-function',this.options.animationEasing);this.$element.off('mouseenter.'+namespace+' mouseleave.'+namespace);if(this.options.autoplay&&this.options.autoplayPauseOnHover){var _this=this;this.$element.on('mouseenter.'+namespace,function(){_this.toggleAutoplay(!1)}).on('mouseleave.'+namespace,function(){_this.toggleAutoplay(!0)})}this.resize();this.toggleAutoplay(this.options.autoplay);this.trigger('updated')};FlipBox.prototype.destroy=function(){$(window).off('focus.'+namespace+' blur.'+namespace);this.$element.off('mouseenter.'+namespace+' mouseleave.'+namespace);this.$element.removeClass('flipbox-wrapper');this.$element.empty();this.$element.append(this.contents);this.trigger('destroyed')};FlipBox.prototype.resize=function(){if(this.options.vertical){this.$box.css('transform-origin','0 '+(this.options.height/2)+'px -'+(this.options.height/2)+'px');this.$back.css('transform','translateZ(-'+this.options.height+'px) rotateX(180deg)');this.$top.css('transform','rotateX(-270deg) translateY(-'+this.options.height+'px)');this.$bottom.css('transform','rotateX(-90deg) translateY('+this.options.height+'px)')}else{this.$box.css('transform-origin',(this.options.width/2)+'px 0 -'+(this.options.width/2)+'px');this.$back.css('transform','translateZ(-'+this.options.width+'px) rotateY(180deg)');this.$left.css('transform','rotateY(270deg) translateX(-'+this.options.width+'px)');this.$right.css('transform','rotateY(-270deg) translateX('+this.options.width+'px)')}};FlipBox.prototype.displayContent=function(contentIndex,reverse){if(this.contentIndex!==contentIndex){var $side=this.getNextSide(reverse);$side.find('>').detach();$side.append(this.contents[contentIndex]);var prevIndex=this.contentIndex;this.contentIndex=contentIndex;this.flip(reverse,prevIndex,contentIndex)}};FlipBox.prototype.refreshCurrentContent=function(){var $side=this.getCurrentSide();$side.find('>').detach();$side.append(this.contents[this.contentIndex])};FlipBox.prototype.addContent=function(newContent,contentIndex){contentIndex=contentIndex||contentIndex===0?contentIndex:this.contents.length;contentIndex=Math.min(Math.max(0,contentIndex),this.contents.length);this.contents.splice(contentIndex,0,$(newContent)[0]);this.contentIndex=Math.max(this.contentIndex,0);if(this.contentIndex===contentIndex){this.refreshCurrentContent()}this.trigger('added',{index:contentIndex})};FlipBox.prototype.removeContent=function(contentIndex){contentIndex=Math.min(Math.max(0,contentIndex),this.contents.length);this.contents.splice(contentIndex,1);if(this.contentIndex===contentIndex){this.contentIndex=Math.min(this.contentIndex,this.contents.length-1);this.refreshCurrentContent()}this.trigger('removed',{index:contentIndex})};FlipBox.prototype.replaceContent=function(newContent,contentIndex){contentIndex=contentIndex||contentIndex===0?contentIndex:this.contentIndex;contentIndex=Math.min(Math.max(0,contentIndex),this.contents.length);this.contents[contentIndex]=$(newContent)[0];if(this.contentIndex===contentIndex){this.refreshCurrentContent()}this.trigger('replaced',{index:contentIndex})};FlipBox.prototype.flip=function(reverse,fromIndex,toIndex){var _this=this;this.trigger('flipping',{reverse:reverse,currentIndex:fromIndex,nextIndex:toIndex});this.$box.off('transitionend.'+namespace).one('transitionend.'+namespace,function(){_this.trigger('flipped',{reverse:reverse,prevIndex:fromIndex,currentIndex:toIndex})});if(this.options.vertical){this.rotation+=90*(reverse?-1:1);this.$box.css('transform','rotateX('+this.rotation+'deg)')}else{this.rotation-=90*(reverse?-1:1);this.$box.css('transform','rotateY('+this.rotation+'deg)')}};FlipBox.prototype.getCurrentSide=function(){var current=(this.rotation/90)%4;current=current<0?4+current:current;if(this.options.vertical){if(current===0){return this.$front}else if(current===1){return this.$bottom}else if(current===2){return this.$back}else{return this.$top}}else{if(current===0){return this.$front}else if(current===1){return this.$left}else if(current===2){return this.$back}else{return this.$right}}};FlipBox.prototype.getNextSide=function(reverse){var current=(this.rotation/90)%4;current=current<0?4+current:current;if(this.options.vertical){if(current===0){return reverse?this.$top:this.$bottom}else if(current===1){return reverse?this.$front:this.$back}else if(current===2){return reverse?this.$bottom:this.$top}else{return reverse?this.$back:this.$front}}else{if(current===0){return reverse?this.$left:this.$right}else if(current===1){return reverse?this.$back:this.$front}else if(current===2){return reverse?this.$right:this.$left}else{return reverse?this.$front:this.$back}}};FlipBox.prototype.toggleAutoplay=function(autoplay){clearInterval(this.autoplayTimer);if(autoplay){var _this=this;this.autoplayTimer=setInterval(function(){_this.next(_this.options.autoplayReverse)},this.options.autoplayWaitDuration)}};FlipBox.prototype.next=function(reverse){this.displayContent(this.contentIndex+1<this.contents.length?this.contentIndex+1:0,reverse)};FlipBox.prototype.prev=function(reverse){this.displayContent(this.contentIndex>0?this.contentIndex-1:this.contents.length-1,reverse)};FlipBox.prototype.jump=function(index,reverse){this.displayContent(Math.min(Math.max(index,0),this.contents.length-1),reverse)};FlipBox.prototype.trigger=function(name,data){this.$element.trigger(name,data)};$.fn.flipbox=function(options){var args=arguments;if(options==='size'){return $(this).data(namespace).contents.length}else if(options==='current'){return $(this).data(namespace).contentIndex}else{return this.each(function(){var $element=$(this);var flipbox=$element.data(namespace);if(options==='destroy'){flipbox.destroy();$element.data(namespace,null)}else if(options==='next'){flipbox.next(args[1])}else if(options==='prev'){flipbox.prev(args[1])}else if(options==='jump'){flipbox.jump(args[1],args[2])}else if(options==='add'){flipbox.addContent(args[1],args[2])}else if(options==='remove'){flipbox.removeContent(args[1])}else if(options==='replace'){flipbox.replaceContent(args[1],args[2])}else{if(!flipbox){flipbox=new FlipBox($element,options);$element.data(namespace,flipbox)}else{flipbox.config(options);flipbox.update()}}})}}})(jQuery); var wth = $(document).innerWidth()-120;var hth = $(window).height()-130;		dragElement(document.getElementById("cube"));function dragElement(elmnt){elmnt.onmousedown=dragMouseDown; function dragMouseDown(e){ e=e||window.event;e.preventDefault(); pos3=e.clientX;pos4=e.clientY; document.onmouseup=closeDragElement; document.onmousemove=elementDrag;}function elementDrag(e){ e=e||window.event; e.preventDefault(); pos1=pos3-e.clientX; pos2=pos4-e.clientY; pos3=e.clientX;pos4=e.clientY; var postion = $('#cube').position(); if(postion.left  >= 10 && postion.top >= 10 && postion.left <= wth && postion.top <= hth){ elmnt.style.top=(elmnt.offsetTop-pos2)+"px"; elmnt.style.left=(elmnt.offsetLeft-pos1)+"px"; }if(postion.left < 10){ elmnt.style.left ="11px";}if(postion.left > wth){ elmnt.style.left = (wth -10)+"px";}if(postion.top < 10){ elmnt.style.top ="11px";}if(postion.top > hth){ elmnt.style.top =(hth -10)+"px";}}function closeDragElement(){document.onmouseup=null;document.onmousemove=null;}}	$(document).ready(function(){ $(document).on('click',".side h6 span",function(){ $('.box').slideUp(700, function(){ $('.rmbxbtn').remove(); $('body').append('<span class="rmbxbtn" style="cursor:pointer;position: fixed;bottom: -1px;right: 2%;background: #eee;padding: 6px 14px 5px;font-size: 16px;border-top-left-radius: 8px;border-top-right-radius: 8px;">Show statics</span>'); });$(document).on('click' ,'.rmbxbtn',function(){ $('.box').slideDown(700, function(){ $('.rmbxbtn').remove(); }); }); }); $.ajax({ type:'post', url :'<?php echo BASEURL ?>/user/commonwidget/corona?type=<?php echo $widget_instance_details['AdvertisementScript']; ?>',	cache:false, success:function(result){ $('#cube').html(result);	$('#cube').flipbox({vertical: false,autoplay: true,autoplayReverse: false,autoplayWaitDuration: 3000,autoplayPauseOnHover: true}); } }); });</script>
<?php } ?>