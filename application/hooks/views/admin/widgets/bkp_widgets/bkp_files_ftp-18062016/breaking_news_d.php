<script>
$(document).ready(function() { 
setInterval(function(){
        $(".breaking").toggleClass("blinking");
		$(".arrow-right-break").toggleClass("blinking-arrow");
     },500);
   });
</script>
<script>
(function ($) {
    $.fn.marquee = function (klass) {
        var newMarquee = [],
            last = this.length;

        // works out the left or right hand reset position, based on scroll
        // behavior, current direction and new direction
        function getReset(newDir, marqueeRedux, marqueeState) {
            var behavior = marqueeState.behavior, width = marqueeState.width, dir = marqueeState.dir;
            var r = 0;
            if (behavior == 'alternate') {
                r = newDir == 1 ? marqueeRedux[marqueeState.widthAxis] - (width*2) : width;
            } else if (behavior == 'slide') {
                if (newDir == -1) {
                    r = dir == -1 ? marqueeRedux[marqueeState.widthAxis] : width;
                } else {
                    r = dir == -1 ? marqueeRedux[marqueeState.widthAxis] - (width*2) : 0;
                }
            } else {
                r = newDir == -1 ? marqueeRedux[marqueeState.widthAxis] : 0;
            }
            return r;
        }

        // single "thread" animation
        function animateMarquee() {
            var i = newMarquee.length,
                marqueeRedux = null,
                $marqueeRedux = null,
                marqueeState = {},
                newMarqueeList = [],
                hitedge = false;
                
            while (i--) {
                marqueeRedux = newMarquee[i];
                $marqueeRedux = $(marqueeRedux);
                marqueeState = $marqueeRedux.data('marqueeState');
                
                if ($marqueeRedux.data('paused') !== true) {
                    // TODO read scrollamount, dir, behavior, loops and last from data
                    marqueeRedux[marqueeState.axis] += (marqueeState.scrollamount * marqueeState.dir);

                    // only true if it's hit the end
                    hitedge = marqueeState.dir == -1 ? marqueeRedux[marqueeState.axis] <= getReset(marqueeState.dir * -1, marqueeRedux, marqueeState) : marqueeRedux[marqueeState.axis] >= getReset(marqueeState.dir * -1, marqueeRedux, marqueeState);
                    
                    if ((marqueeState.behavior == 'scroll' && marqueeState.last == marqueeRedux[marqueeState.axis]) || (marqueeState.behavior == 'alternate' && hitedge && marqueeState.last != -1) || (marqueeState.behavior == 'slide' && hitedge && marqueeState.last != -1)) {                        
                        if (marqueeState.behavior == 'alternate') {
                            marqueeState.dir *= -1; // flip
                        }
                        marqueeState.last = -1;

                        $marqueeRedux.trigger('stop');

                        marqueeState.loops--;
                        if (marqueeState.loops === 0) {
                            if (marqueeState.behavior != 'slide') {
                                marqueeRedux[marqueeState.axis] = getReset(marqueeState.dir, marqueeRedux, marqueeState);
                            } else {
                                // corrects the position
                                marqueeRedux[marqueeState.axis] = getReset(marqueeState.dir * -1, marqueeRedux, marqueeState);
                            }

                            $marqueeRedux.trigger('end');
                        } else {
                            // keep this marquee going
                            newMarqueeList.push(marqueeRedux);
                            $marqueeRedux.trigger('start');
                            marqueeRedux[marqueeState.axis] = getReset(marqueeState.dir, marqueeRedux, marqueeState);
                        }
                    } else {
                        newMarqueeList.push(marqueeRedux);
                    }
                    marqueeState.last = marqueeRedux[marqueeState.axis];

                    // store updated state only if we ran an animation
                    $marqueeRedux.data('marqueeState', marqueeState);
                } else {
                    // even though it's paused, keep it in the list
                    newMarqueeList.push(marqueeRedux);                    
                }
            }

            newMarquee = newMarqueeList;
            
            if (newMarquee.length) {
                setTimeout(animateMarquee, 50);
            }            
        }
        
        // TODO consider whether using .html() in the wrapping process could lead to loosing predefined events...
        this.each(function (i) {
            var $marquee = $(this),
                width = $marquee.attr('width') || $marquee.width(),
                height = $marquee.attr('height') || $marquee.height(),
                $marqueeRedux = $marquee.after('<div ' + (klass ? 'class="' + klass + '" ' : '') + 'style="display: block-inline; height: ' + height + '; overflow: hidden;"><div style="float: left; white-space: nowrap;">' + $marquee.html() + '</div></div>').next(),
                marqueeRedux = $marqueeRedux.get(0),
                hitedge = 0,
                direction = ($marquee.attr('direction') || 'left').toLowerCase(),
                marqueeState = {
                    dir : /down|right/.test(direction) ? -1 : 1,
                    axis : /left|right/.test(direction) ? 'scrollLeft' : 'scrollTop',
                    widthAxis : /left|right/.test(direction) ? 'scrollWidth' : 'scrollHeight',
                    last : -1,
                    loops : $marquee.attr('loop') || -1,
                    scrollamount : $marquee.attr('scrollamount') || this.scrollAmount || 2,
                    behavior : ($marquee.attr('behavior') || 'scroll').toLowerCase(),
                    width : /left|right/.test(direction) ? width : height
                };
            
            // corrects a bug in Firefox - the default loops for slide is -1
            if ($marquee.attr('loop') == -1 && marqueeState.behavior == 'slide') {
                marqueeState.loops = 1;
            }

            $marquee.remove();
            
            // add padding
            if (/left|right/.test(direction)) {
                $marqueeRedux.find('> div').css('padding', '0 ' + width + 'px');
            } else {
                $marqueeRedux.find('> div').css('padding', height + 'px 0');
            }
            
            // events
            $marqueeRedux.bind('stop', function () {
                $marqueeRedux.data('paused', true);
            }).bind('pause', function () {
                $marqueeRedux.data('paused', true);
            }).bind('start', function () {
                $marqueeRedux.data('paused', false);
            }).bind('unpause', function () {
                $marqueeRedux.data('paused', false);
            }).data('marqueeState', marqueeState); // finally: store the state
            
            // todo - rerender event allowing us to do an ajax hit and redraw the marquee

            newMarquee.push(marqueeRedux);

            marqueeRedux[marqueeState.axis] = getReset(marqueeState.dir, marqueeRedux, marqueeState);
            $marqueeRedux.trigger('start');
            
            // on the very last marquee, trigger the animation
            if (i+1 == last) {
                animateMarquee();
            }
        });            

        return $(newMarquee);
    };
}(jQuery));
    </script>
    <script type="text/javascript">
    <!--
    $(function () {
        // basic version is: $('div.demo marquee').marquee() - but we're doing some sexy extras
        
        $('div.demo marquee').marquee('pointer').mouseover(function () {
            $(this).trigger('stop');
        }).mouseout(function () {
            $(this).trigger('start');
        }).mousemove(function (event) {
            if ($(this).data('drag') == true) {
                this.scrollLeft = $(this).data('scrollX') + ($(this).data('x') - event.clientX);
            }
        }).mousedown(function (event) {
            $(this).data('drag', true).data('x', event.clientX).data('scrollX', this.scrollLeft);
        }).mouseup(function () {
            $(this).data('drag', false);
        });
    });
    //-->
    </script>
	
	
<div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="line">
	<h3 class="breaking">சுடச்சுட</h3>
	<div class="arrow-right-break"></div>
	
	<div id="doc">
	 
	 <div class="demo">
			<?php 
			$view_mode = $content['mode'];
			$param = $content['page_param'];
			$breaking_news = $this->widget_model->get_widget_breakingNews_content($view_mode);
			
			$scroll_speed = $this->widget_model->select_setting($view_mode);
			$news = "";
			$domain_name =  base_url();
			foreach($breaking_news as $news_content)
			{
				$news_title = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $news_content['Title']);   //to remove first<p> and last</p>  tag
				if($news_content['Content_ID'] != '')
				{
					$content_type = 1;
					$is_home = 'n';
					if($view_mode=='live'){
					$content_details = $this->widget_model->get_contentdetails_from_database($news_content['Content_ID'], $content_type,$is_home, $view_mode);					
					$content_url = $content_details[0]['url'];
					}else{
					$content_url = $news_content['url'];
					}
					$live_article_url = $domain_name.$content_url."?pm=".$param;					
					$news_content = '<a  href="'.$live_article_url.'" class="article_click"  >'.$news_title.'</a>';
				}
				else
				{
					$news_content = $news_title;
				}
				
				$news .=  '<i class="fa fa-star-o" aria-hidden="true"></i>&nbsp; &nbsp;'.$news_content.'&nbsp; &nbsp;';
			}		

			?>
			  <marquee cbehavior="scroll" direction="left" height="26px" scrollamount="<?php if($scroll_speed['breakingNews_scrollSpeed'] != "" && $scroll_speed['breakingNews_scrollSpeed'] != 0) { echo $scroll_speed['breakingNews_scrollSpeed']; } else { echo 5; } ?>"> 
             <?php echo $news; ?>
            </marquee>
			
			  </div>
      </div>
</div>

 </div>
    </div>
