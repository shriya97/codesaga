
/***************************************************
	MODAL BOX WINDOW
***************************************************/
/*
 * jQuery Reveal Plugin 1.0 - www.ZURB.com - Copyright 2010, ZURB - Free to use under the MIT license.
*/
(function($) {

/*---------------------------
 Defaults for Reveal
----------------------------*/
	 
/*---------------------------
 Listener for data-reveal-id attributes
----------------------------*/

	$('a[data-reveal-id]').live('click', function(e) {
		e.preventDefault();
		var modalLocation = $(this).attr('data-reveal-id');
		$('#'+modalLocation).reveal($(this).data());
	});

/*---------------------------
 Extend and Execute
----------------------------*/

    $.fn.reveal = function(options) {
        
        
        var defaults = {  
	    	animation: 'fadeAndPop', //fade, fadeAndPop, none
		    animationspeed: 300, //how fast animtions are
		    closeonbackgroundclick: true, //if you click background will modal close?
		    dismissmodalclass: 'close-reveal-modal' //the class of a button or element that will close an open modal
    	}; 
    	
        //Extend dem' options
        var options = $.extend({}, defaults, options); 
	
        return this.each(function() {
        
/*---------------------------
 Global Variables
----------------------------*/
        	var modal = $(this),
        		topMeasure  = parseInt(modal.css('top')),
				topOffset = modal.height() + topMeasure,
          		locked = false,
				modalBG = $('.reveal-modal-bg');

/*---------------------------
 Create Modal BG
----------------------------*/
			if(modalBG.length == 0) {
				modalBG = $('<div class="reveal-modal-bg" />').insertAfter(modal);
			}		    
     
/*---------------------------
 Open & Close Animations
----------------------------*/
			//Entrance Animations
			modal.bind('reveal:open', function () {
			  modalBG.unbind('click.modalEvent');
				$('.' + options.dismissmodalclass).unbind('click.modalEvent');
				if(!locked) {
					lockModal();
					if(options.animation == "fadeAndPop") {
						modal.css({'top': $(document).scrollTop()-topOffset, 'opacity' : 0, 'visibility' : 'visible'});
						modalBG.fadeIn(options.animationspeed/2);
						modal.delay(options.animationspeed/2).animate({
							"top": $(document).scrollTop()+topMeasure + 'px',
							"opacity" : 1
						}, options.animationspeed,unlockModal());					
					}
					if(options.animation == "fade") {
						modal.css({'opacity' : 0, 'visibility' : 'visible', 'top': $(document).scrollTop()+topMeasure});
						modalBG.fadeIn(options.animationspeed/2);
						modal.delay(options.animationspeed/2).animate({
							"opacity" : 1
						}, options.animationspeed,unlockModal());					
					} 
					if(options.animation == "none") {
						modal.css({'visibility' : 'visible', 'top':$(document).scrollTop()+topMeasure});
						modalBG.css({"display":"block"});	
						unlockModal()				
					}
				}
				modal.unbind('reveal:open');
			}); 	

			//Closing Animation
			modal.bind('reveal:close', function () {
			  if(!locked) {
					lockModal();
					if(options.animation == "fadeAndPop") {
						modalBG.delay(options.animationspeed).fadeOut(options.animationspeed);
						modal.animate({
							"top":  $(document).scrollTop()-topOffset + 'px',
							"opacity" : 0
						}, options.animationspeed/2, function() {
							modal.css({'top':topMeasure, 'opacity' : 1, 'visibility' : 'hidden'});
							unlockModal();
						});					
					}  	
					if(options.animation == "fade") {
						modalBG.delay(options.animationspeed).fadeOut(options.animationspeed);
						modal.animate({
							"opacity" : 0
						}, options.animationspeed, function() {
							modal.css({'opacity' : 1, 'visibility' : 'hidden', 'top' : topMeasure});
							unlockModal();
						});					
					}  	
					if(options.animation == "none") {
						modal.css({'visibility' : 'hidden', 'top' : topMeasure});
						modalBG.css({'display' : 'none'});	
					}		
				}
				modal.unbind('reveal:close');
			});     
   	
/*---------------------------
 Open and add Closing Listeners
----------------------------*/
        	//Open Modal Immediately
    	modal.trigger('reveal:open')
			
			//Close Modal Listeners
			var closeButton = $('.' + options.dismissmodalclass).bind('click.modalEvent', function () {
			  modal.trigger('reveal:close')
			});
			
			if(options.closeonbackgroundclick) {
				modalBG.css({"cursor":"pointer"})
				modalBG.bind('click.modalEvent', function () {
				  modal.trigger('reveal:close')
				});
			}
			$('body').keyup(function(e) {
        		if(e.which===27){ modal.trigger('reveal:close'); } // 27 is the keycode for the Escape key
			});
			
			
/*---------------------------
 Animations Locks
----------------------------*/
			function unlockModal() { 
				locked = false;
			}
			function lockModal() {
				locked = true;
			}	
			
        });//each call
    }//orbit plugin call
})(jQuery);
/***************************************************
	COUNTDOWN
***************************************************/
/* http://keith-wood.name/countdown.html Written by Keith Wood (kbwood{at}iinet.com.au) January 2008.
   Dual licensed under the GPL (http://dev.jquery.com/browser/trunk/jquery/GPL-LICENSE.txt) and 
   MIT (http://dev.jquery.com/browser/trunk/jquery/MIT-LICENSE.txt) licenses. */
(function($){function Countdown(){this.regional=[];this.regional['']={labels:['Years','Months','Weeks','Days','Hours','Minutes','Seconds'],labels1:['Year','Month','Week','Day','Hour','Minute','Second'],compactLabels:['y','m','w','d'],whichLabels:null,timeSeparator:':',isRTL:false};this._defaults={until:null,since:null,timezone:null,serverSync:null,format:'dHMS',layout:'',compact:false,significant:0,description:'',expiryUrl:'',expiryText:'',alwaysExpire:false,onExpiry:null,onTick:null,tickInterval:1};$.extend(this._defaults,this.regional['']);this._serverSyncs=[];function timerCallBack(a){var b=(a||new Date().getTime());if(b-d>=1000){$.countdown._updateTargets();d=b}c(timerCallBack)}var c=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||null;var d=0;if(!c){setInterval(function(){$.countdown._updateTargets()},980)}else{d=window.mozAnimationStartTime||new Date().getTime();c(timerCallBack)}}var w='countdown';var Y=0;var O=1;var W=2;var D=3;var H=4;var M=5;var S=6;$.extend(Countdown.prototype,{markerClassName:'hasCountdown',_timerTargets:[],setDefaults:function(a){this._resetExtraLabels(this._defaults,a);extendRemove(this._defaults,a||{})},UTCDate:function(a,b,c,e,f,g,h,i){if(typeof b=='object'&&b.constructor==Date){i=b.getMilliseconds();h=b.getSeconds();g=b.getMinutes();f=b.getHours();e=b.getDate();c=b.getMonth();b=b.getFullYear()}var d=new Date();d.setUTCFullYear(b);d.setUTCDate(1);d.setUTCMonth(c||0);d.setUTCDate(e||1);d.setUTCHours(f||0);d.setUTCMinutes((g||0)-(Math.abs(a)<30?a*60:a));d.setUTCSeconds(h||0);d.setUTCMilliseconds(i||0);return d},periodsToSeconds:function(a){return a[0]*31557600+a[1]*2629800+a[2]*604800+a[3]*86400+a[4]*3600+a[5]*60+a[6]},_settingsCountdown:function(a,b){if(!b){return $.countdown._defaults}var c=$.data(a,w);return(b=='all'?c.options:c.options[b])},_attachCountdown:function(a,b){var c=$(a);if(c.hasClass(this.markerClassName)){return}c.addClass(this.markerClassName);var d={options:$.extend({},b),_periods:[0,0,0,0,0,0,0]};$.data(a,w,d);this._changeCountdown(a)},_addTarget:function(a){if(!this._hasTarget(a)){this._timerTargets.push(a)}},_hasTarget:function(a){return($.inArray(a,this._timerTargets)>-1)},_removeTarget:function(b){this._timerTargets=$.map(this._timerTargets,function(a){return(a==b?null:a)})},_updateTargets:function(){for(var i=this._timerTargets.length-1;i>=0;i--){this._updateCountdown(this._timerTargets[i])}},_updateCountdown:function(a,b){var c=$(a);b=b||$.data(a,w);if(!b){return}c.html(this._generateHTML(b));c[(this._get(b,'isRTL')?'add':'remove')+'Class']('countdown_rtl');var d=this._get(b,'onTick');if(d){var e=b._hold!='lap'?b._periods:this._calculatePeriods(b,b._show,this._get(b,'significant'),new Date());var f=this._get(b,'tickInterval');if(f==1||this.periodsToSeconds(e)%f==0){d.apply(a,[e])}}var g=b._hold!='pause'&&(b._since?b._now.getTime()<b._since.getTime():b._now.getTime()>=b._until.getTime());if(g&&!b._expiring){b._expiring=true;if(this._hasTarget(a)||this._get(b,'alwaysExpire')){this._removeTarget(a);var h=this._get(b,'onExpiry');if(h){h.apply(a,[])}var i=this._get(b,'expiryText');if(i){var j=this._get(b,'layout');b.options.layout=i;this._updateCountdown(a,b);b.options.layout=j}var k=this._get(b,'expiryUrl');if(k){window.location=k}}b._expiring=false}else if(b._hold=='pause'){this._removeTarget(a)}$.data(a,w,b)},_changeCountdown:function(a,b,c){b=b||{};if(typeof b=='string'){var d=b;b={};b[d]=c}var e=$.data(a,w);if(e){this._resetExtraLabels(e.options,b);extendRemove(e.options,b);this._adjustSettings(a,e);$.data(a,w,e);var f=new Date();if((e._since&&e._since<f)||(e._until&&e._until>f)){this._addTarget(a)}this._updateCountdown(a,e)}},_resetExtraLabels:function(a,b){var c=false;for(var n in b){if(n!='whichLabels'&&n.match(/[Ll]abels/)){c=true;break}}if(c){for(var n in a){if(n.match(/[Ll]abels[0-9]/)){a[n]=null}}}},_adjustSettings:function(a,b){var c;var d=this._get(b,'serverSync');var e=0;var f=null;for(var i=0;i<this._serverSyncs.length;i++){if(this._serverSyncs[i][0]==d){f=this._serverSyncs[i][1];break}}if(f!=null){e=(d?f:0);c=new Date()}else{var g=(d?d.apply(a,[]):null);c=new Date();e=(g?c.getTime()-g.getTime():0);this._serverSyncs.push([d,e])}var h=this._get(b,'timezone');h=(h==null?-c.getTimezoneOffset():h);b._since=this._get(b,'since');if(b._since!=null){b._since=this.UTCDate(h,this._determineTime(b._since,null));if(b._since&&e){b._since.setMilliseconds(b._since.getMilliseconds()+e)}}b._until=this.UTCDate(h,this._determineTime(this._get(b,'until'),c));if(e){b._until.setMilliseconds(b._until.getMilliseconds()+e)}b._show=this._determineShow(b)},_destroyCountdown:function(a){var b=$(a);if(!b.hasClass(this.markerClassName)){return}this._removeTarget(a);b.removeClass(this.markerClassName).empty();$.removeData(a,w)},_pauseCountdown:function(a){this._hold(a,'pause')},_lapCountdown:function(a){this._hold(a,'lap')},_resumeCountdown:function(a){this._hold(a,null)},_hold:function(a,b){var c=$.data(a,w);if(c){if(c._hold=='pause'&&!b){c._periods=c._savePeriods;var d=(c._since?'-':'+');c[c._since?'_since':'_until']=this._determineTime(d+c._periods[0]+'y'+d+c._periods[1]+'o'+d+c._periods[2]+'w'+d+c._periods[3]+'d'+d+c._periods[4]+'h'+d+c._periods[5]+'m'+d+c._periods[6]+'s');this._addTarget(a)}c._hold=b;c._savePeriods=(b=='pause'?c._periods:null);$.data(a,w,c);this._updateCountdown(a,c)}},_getTimesCountdown:function(a){var b=$.data(a,w);return(!b?null:(!b._hold?b._periods:this._calculatePeriods(b,b._show,this._get(b,'significant'),new Date())))},_get:function(a,b){return(a.options[b]!=null?a.options[b]:$.countdown._defaults[b])},_determineTime:function(k,l){var m=function(a){var b=new Date();b.setTime(b.getTime()+a*1000);return b};var n=function(a){a=a.toLowerCase();var b=new Date();var c=b.getFullYear();var d=b.getMonth();var e=b.getDate();var f=b.getHours();var g=b.getMinutes();var h=b.getSeconds();var i=/([+-]?[0-9]+)\s*(s|m|h|d|w|o|y)?/g;var j=i.exec(a);while(j){switch(j[2]||'s'){case's':h+=parseInt(j[1],10);break;case'm':g+=parseInt(j[1],10);break;case'h':f+=parseInt(j[1],10);break;case'd':e+=parseInt(j[1],10);break;case'w':e+=parseInt(j[1],10)*7;break;case'o':d+=parseInt(j[1],10);e=Math.min(e,$.countdown._getDaysInMonth(c,d));break;case'y':c+=parseInt(j[1],10);e=Math.min(e,$.countdown._getDaysInMonth(c,d));break}j=i.exec(a)}return new Date(c,d,e,f,g,h,0)};var o=(k==null?l:(typeof k=='string'?n(k):(typeof k=='number'?m(k):k)));if(o)o.setMilliseconds(0);return o},_getDaysInMonth:function(a,b){return 32-new Date(a,b,32).getDate()},_normalLabels:function(a){return a},_generateHTML:function(c){var d=this._get(c,'significant');c._periods=(c._hold?c._periods:this._calculatePeriods(c,c._show,d,new Date()));var e=false;var f=0;var g=d;var h=$.extend({},c._show);for(var i=Y;i<=S;i++){e|=(c._show[i]=='?'&&c._periods[i]>0);h[i]=(c._show[i]=='?'&&!e?null:c._show[i]);f+=(h[i]?1:0);g-=(c._periods[i]>0?1:0)}var j=[false,false,false,false,false,false,false];for(var i=S;i>=Y;i--){if(c._show[i]){if(c._periods[i]){j[i]=true}else{j[i]=g>0;g--}}}var k=this._get(c,'compact');var l=this._get(c,'layout');var m=(k?this._get(c,'compactLabels'):this._get(c,'labels'));var n=this._get(c,'whichLabels')||this._normalLabels;var o=this._get(c,'timeSeparator');var p=this._get(c,'description')||'';var q=function(a){var b=$.countdown._get(c,'compactLabels'+n(c._periods[a]));return(h[a]?c._periods[a]+(b?b[a]:m[a])+' ':'')};var r=function(a){var b=$.countdown._get(c,'labels'+n(c._periods[a]));return((!d&&h[a])||(d&&j[a])?'<span class="countdown_section"><span class="countdown_amount">'+c._periods[a]+'</span><br/>'+(b?b[a]:m[a])+'</span>':'')};return(l?this._buildLayout(c,h,l,k,d,j):((k?'<span class="countdown_row countdown_amount'+(c._hold?' countdown_holding':'')+'">'+q(Y)+q(O)+q(W)+q(D)+(h[H]?this._minDigits(c._periods[H],2):'')+(h[M]?(h[H]?o:'')+this._minDigits(c._periods[M],2):'')+(h[S]?(h[H]||h[M]?o:'')+this._minDigits(c._periods[S],2):''):'<span class="countdown_row countdown_show'+(d||f)+(c._hold?' countdown_holding':'')+'">'+r(Y)+r(O)+r(W)+r(D)+r(H)+r(M)+r(S))+'</span>'+(p?'<span class="countdown_row countdown_descr">'+p+'</span>':'')))},_buildLayout:function(c,d,e,f,g,h){var j=this._get(c,(f?'compactLabels':'labels'));var k=this._get(c,'whichLabels')||this._normalLabels;var l=function(a){return($.countdown._get(c,(f?'compactLabels':'labels')+k(c._periods[a]))||j)[a]};var m=function(a,b){return Math.floor(a/b)%10};var o={desc:this._get(c,'description'),sep:this._get(c,'timeSeparator'),yl:l(Y),yn:c._periods[Y],ynn:this._minDigits(c._periods[Y],2),ynnn:this._minDigits(c._periods[Y],3),y1:m(c._periods[Y],1),y10:m(c._periods[Y],10),y100:m(c._periods[Y],100),y1000:m(c._periods[Y],1000),ol:l(O),on:c._periods[O],onn:this._minDigits(c._periods[O],2),onnn:this._minDigits(c._periods[O],3),o1:m(c._periods[O],1),o10:m(c._periods[O],10),o100:m(c._periods[O],100),o1000:m(c._periods[O],1000),wl:l(W),wn:c._periods[W],wnn:this._minDigits(c._periods[W],2),wnnn:this._minDigits(c._periods[W],3),w1:m(c._periods[W],1),w10:m(c._periods[W],10),w100:m(c._periods[W],100),w1000:m(c._periods[W],1000),dl:l(D),dn:c._periods[D],dnn:this._minDigits(c._periods[D],2),dnnn:this._minDigits(c._periods[D],3),d1:m(c._periods[D],1),d10:m(c._periods[D],10),d100:m(c._periods[D],100),d1000:m(c._periods[D],1000),hl:l(H),hn:c._periods[H],hnn:this._minDigits(c._periods[H],2),hnnn:this._minDigits(c._periods[H],3),h1:m(c._periods[H],1),h10:m(c._periods[H],10),h100:m(c._periods[H],100),h1000:m(c._periods[H],1000),ml:l(M),mn:c._periods[M],mnn:this._minDigits(c._periods[M],2),mnnn:this._minDigits(c._periods[M],3),m1:m(c._periods[M],1),m10:m(c._periods[M],10),m100:m(c._periods[M],100),m1000:m(c._periods[M],1000),sl:l(S),sn:c._periods[S],snn:this._minDigits(c._periods[S],2),snnn:this._minDigits(c._periods[S],3),s1:m(c._periods[S],1),s10:m(c._periods[S],10),s100:m(c._periods[S],100),s1000:m(c._periods[S],1000)};var p=e;for(var i=Y;i<=S;i++){var q='yowdhms'.charAt(i);var r=new RegExp('\\{'+q+'<\\}(.*)\\{'+q+'>\\}','g');p=p.replace(r,((!g&&d[i])||(g&&h[i])?'$1':''))}$.each(o,function(n,v){var a=new RegExp('\\{'+n+'\\}','g');p=p.replace(a,v)});return p},_minDigits:function(a,b){a=''+a;if(a.length>=b){return a}a='0000000000'+a;return a.substr(a.length-b)},_determineShow:function(a){var b=this._get(a,'format');var c=[];c[Y]=(b.match('y')?'?':(b.match('Y')?'!':null));c[O]=(b.match('o')?'?':(b.match('O')?'!':null));c[W]=(b.match('w')?'?':(b.match('W')?'!':null));c[D]=(b.match('d')?'?':(b.match('D')?'!':null));c[H]=(b.match('h')?'?':(b.match('H')?'!':null));c[M]=(b.match('m')?'?':(b.match('M')?'!':null));c[S]=(b.match('s')?'?':(b.match('S')?'!':null));return c},_calculatePeriods:function(c,d,e,f){c._now=f;c._now.setMilliseconds(0);var g=new Date(c._now.getTime());if(c._since){if(f.getTime()<c._since.getTime()){c._now=f=g}else{f=c._since}}else{g.setTime(c._until.getTime());if(f.getTime()>c._until.getTime()){c._now=f=g}}var h=[0,0,0,0,0,0,0];if(d[Y]||d[O]){var i=$.countdown._getDaysInMonth(f.getFullYear(),f.getMonth());var j=$.countdown._getDaysInMonth(g.getFullYear(),g.getMonth());var k=(g.getDate()==f.getDate()||(g.getDate()>=Math.min(i,j)&&f.getDate()>=Math.min(i,j)));var l=function(a){return(a.getHours()*60+a.getMinutes())*60+a.getSeconds()};var m=Math.max(0,(g.getFullYear()-f.getFullYear())*12+g.getMonth()-f.getMonth()+((g.getDate()<f.getDate()&&!k)||(k&&l(g)<l(f))?-1:0));h[Y]=(d[Y]?Math.floor(m/12):0);h[O]=(d[O]?m-h[Y]*12:0);f=new Date(f.getTime());var n=(f.getDate()==i);var o=$.countdown._getDaysInMonth(f.getFullYear()+h[Y],f.getMonth()+h[O]);if(f.getDate()>o){f.setDate(o)}f.setFullYear(f.getFullYear()+h[Y]);f.setMonth(f.getMonth()+h[O]);if(n){f.setDate(o)}}var p=Math.floor((g.getTime()-f.getTime())/1000);var q=function(a,b){h[a]=(d[a]?Math.floor(p/b):0);p-=h[a]*b};q(W,604800);q(D,86400);q(H,3600);q(M,60);q(S,1);if(p>0&&!c._since){var r=[1,12,4.3482,7,24,60,60];var s=S;var t=1;for(var u=S;u>=Y;u--){if(d[u]){if(h[s]>=t){h[s]=0;p=1}if(p>0){h[u]++;p=0;s=u;t=1}}t*=r[u]}}if(e){for(var u=Y;u<=S;u++){if(e&&h[u]){e--}else if(!e){h[u]=0}}}return h}});function extendRemove(a,b){$.extend(a,b);for(var c in b){if(b[c]==null){a[c]=null}}return a}$.fn.countdown=function(a){var b=Array.prototype.slice.call(arguments,1);if(a=='getTimes'||a=='settings'){return $.countdown['_'+a+'Countdown'].apply($.countdown,[this[0]].concat(b))}return this.each(function(){if(typeof a=='string'){$.countdown['_'+a+'Countdown'].apply($.countdown,[this].concat(b))}else{$.countdown._attachCountdown(this,a)}})};$.countdown=new Countdown()})(jQuery);

/***************************************************
	TWITTER
***************************************************/
/***
 * Twitter JS v2.0.0
 * http://code.google.com/p/twitterjs/
 * Copyright (c) 2009 Remy Sharp / MIT License
 * $Date$
*/
 /* MIT (MIT-LICENSE.txt) */
typeof getTwitters!="function"&&function(){var a={},b=0;!function(a,b){function m(a){l=1;while(a=c.shift())a()}var c=[],d,e,f=!1,g=b.documentElement,h=g.doScroll,i="DOMContentLoaded",j="addEventListener",k="onreadystatechange",l=/^loade|c/.test(b.readyState);b[j]&&b[j](i,e=function(){b.removeEventListener(i,e,f),m()},f),h&&b.attachEvent(k,d=function(){/^c/.test(b.readyState)&&(b.detachEvent(k,d),m())}),a.domReady=h?function(b){self!=top?l?b():c.push(b):function(){try{g.doScroll("left")}catch(c){return setTimeout(function(){a.domReady(b)},50)}b()}()}:function(a){l?a():c.push(a)}}(a,document),window.getTwitters=function(c,d,e,f){b++,typeof d=="object"&&(f=d,d=f.id,e=f.count),e||(e=1),f?f.count=e:f={},!f.timeout&&typeof f.onTimeout=="function"&&(f.timeout=10),typeof f.clearContents=="undefined"&&(f.clearContents=!0),f.twitterTarget=c,typeof f.enableLinks=="undefined"&&(f.enableLinks=!0),a.domReady(function(a,b){return function(){function f(){a.target=document.getElementById(a.twitterTarget);if(!!a.target){var f={limit:e};f.includeRT&&(f.include_rts=!0),a.timeout&&(window["twitterTimeout"+b]=setTimeout(function(){twitterlib.cancel(),a.onTimeout.call(a.target)},a.timeout*1e3));var g="timeline";d.indexOf("#")===0&&(g="search"),d.indexOf("/")!==-1&&(g="list"),a.ignoreReplies&&(f.filter={not:new RegExp(/^@/)}),twitterlib.cache(!0),twitterlib[g](d,f,function(d,e){clearTimeout(window["twitterTimeout"+b]);var f=[],g=d.length>a.count?a.count:d.length;f=["<ul>"];for(var h=0;h<g;h++){d[h].time=twitterlib.time.relative(d[h].created_at);for(var i in d[h].user)d[h]["user_"+i]=d[h].user[i];a.template?f.push("<li>"+a.template.replace(/%([a-z_\-\.]*)%/ig,function(b,c){var e=d[h][c]+""||"";c=="text"&&(e=twitterlib.expandLinks(d[h])),c=="text"&&a.enableLinks&&(e=twitterlib.ify.clean(e));return e})+"</li>"):a.bigTemplate?f.push(twitterlib.render(d[h])):f.push(c(d[h]))}f.push("</ul>"),a.clearContents?a.target.innerHTML=f.join(""):a.target.innerHTML+=f.join(""),a.callback&&a.callback(d)})}}function c(b){var c=a.enableLinks?twitterlib.ify.clean(twitterlib.expandLinks(b)):twitterlib.expandLinks(b),d="<li>";a.prefix&&(d+='<li><span className="twitterPrefix">',d+=a.prefix.replace(/%(.*?)%/g,function(a,c){return b.user[c]}),d+=" </span></li>"),d+='<span className="twitterStatus">'+twitterlib.time.relative(b.created_at)+"</span> ",d+='<span className="twitterTime">'+b.text+"</span>",a.newwindow&&(d=d.replace(/<a href/gi,'<a target="_blank" href'));return d}typeof twitterlib=="undefined"?setTimeout(function(){var a=document.createElement("script");a.onload=a.onreadystatechange=function(){typeof window.twitterlib!="undefined"&&f()},a.src="http://remy.github.com/twitterlib/twitterlib.js";var b=document.head||document.getElementsByTagName("head")[0];b.insertBefore(a,b.firstChild)},0):f()}}(f,b))}}()

/***************************************************
	FORM VALIDATION JAVASCRIPT
***************************************************/
$(document).ready(function() {
	$('form#contact_form').submit(function() {
		$('form#contact_form .error').remove();
		var hasError = false;
		$('.requiredField').each(function() {
			if(jQuery.trim($(this).val()) == '') {
            	var labelText = $(this).prev('label').text();
            	$(this).parent().append('<span class="error">Please enter your Email '+labelText+'</span>');
            	$(this).addClass('inputError');
            	hasError = true;
            } else if($(this).hasClass('email')) {
            	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            	if(!emailReg.test(jQuery.trim($(this).val()))) {
            		var labelText = $(this).prev('label').text();
            		$(this).parent().append('<span class="error">Please enter a valid email address'+labelText+'</span>');
            		$(this).addClass('inputError');
            		hasError = true;
            	}
            }
		});
		if(!hasError) {
			$('form#contact_form input.submit').fadeOut('normal', function() {
				$(this).parent().append('');
			});
			var formInput = $(this).serialize();
			$.post($(this).attr('action'),formInput, function(data){
				$('form#contact_form').slideUp("fast", function() {
					$(this).before('<p class="success">Thank you!</p>');
				});
			});
		}

		return false;

	});
});
/***************************************************
	EASING
***************************************************/
/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/ - Open source under the BSD License. 
 * Copyright å© 2008 George McGinley Smith
 * All rights reserved.
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
*/
jQuery.easing.jswing=jQuery.easing.swing;jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(e,f,a,h,g){return jQuery.easing[jQuery.easing.def](e,f,a,h,g)},easeInQuad:function(e,f,a,h,g){return h*(f/=g)*f+a},easeOutQuad:function(e,f,a,h,g){return -h*(f/=g)*(f-2)+a},easeInOutQuad:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f+a}return -h/2*((--f)*(f-2)-1)+a},easeInCubic:function(e,f,a,h,g){return h*(f/=g)*f*f+a},easeOutCubic:function(e,f,a,h,g){return h*((f=f/g-1)*f*f+1)+a},easeInOutCubic:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f+a}return h/2*((f-=2)*f*f+2)+a},easeInQuart:function(e,f,a,h,g){return h*(f/=g)*f*f*f+a},easeOutQuart:function(e,f,a,h,g){return -h*((f=f/g-1)*f*f*f-1)+a},easeInOutQuart:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f*f+a}return -h/2*((f-=2)*f*f*f-2)+a},easeInQuint:function(e,f,a,h,g){return h*(f/=g)*f*f*f*f+a},easeOutQuint:function(e,f,a,h,g){return h*((f=f/g-1)*f*f*f*f+1)+a},easeInOutQuint:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f*f*f+a}return h/2*((f-=2)*f*f*f*f+2)+a},easeInSine:function(e,f,a,h,g){return -h*Math.cos(f/g*(Math.PI/2))+h+a},easeOutSine:function(e,f,a,h,g){return h*Math.sin(f/g*(Math.PI/2))+a},easeInOutSine:function(e,f,a,h,g){return -h/2*(Math.cos(Math.PI*f/g)-1)+a},easeInExpo:function(e,f,a,h,g){return(f==0)?a:h*Math.pow(2,10*(f/g-1))+a},easeOutExpo:function(e,f,a,h,g){return(f==g)?a+h:h*(-Math.pow(2,-10*f/g)+1)+a},easeInOutExpo:function(e,f,a,h,g){if(f==0){return a}if(f==g){return a+h}if((f/=g/2)<1){return h/2*Math.pow(2,10*(f-1))+a}return h/2*(-Math.pow(2,-10*--f)+2)+a},easeInCirc:function(e,f,a,h,g){return -h*(Math.sqrt(1-(f/=g)*f)-1)+a},easeOutCirc:function(e,f,a,h,g){return h*Math.sqrt(1-(f=f/g-1)*f)+a},easeInOutCirc:function(e,f,a,h,g){if((f/=g/2)<1){return -h/2*(Math.sqrt(1-f*f)-1)+a}return h/2*(Math.sqrt(1-(f-=2)*f)+1)+a},easeInElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k)==1){return e+l}if(!j){j=k*0.3}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}return -(g*Math.pow(2,10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j))+e},easeOutElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k)==1){return e+l}if(!j){j=k*0.3}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}return g*Math.pow(2,-10*h)*Math.sin((h*k-i)*(2*Math.PI)/j)+l+e},easeInOutElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k/2)==2){return e+l}if(!j){j=k*(0.3*1.5)}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}if(h<1){return -0.5*(g*Math.pow(2,10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j))+e}return g*Math.pow(2,-10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j)*0.5+l+e},easeInBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}return i*(f/=h)*f*((g+1)*f-g)+a},easeOutBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}return i*((f=f/h-1)*f*((g+1)*f+g)+1)+a},easeInOutBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}if((f/=h/2)<1){return i/2*(f*f*(((g*=(1.525))+1)*f-g))+a}return i/2*((f-=2)*f*(((g*=(1.525))+1)*f+g)+2)+a},easeInBounce:function(e,f,a,h,g){return h-jQuery.easing.easeOutBounce(e,g-f,0,h,g)+a},easeOutBounce:function(e,f,a,h,g){if((f/=g)<(1/2.75)){return h*(7.5625*f*f)+a}else{if(f<(2/2.75)){return h*(7.5625*(f-=(1.5/2.75))*f+0.75)+a}else{if(f<(2.5/2.75)){return h*(7.5625*(f-=(2.25/2.75))*f+0.9375)+a}else{return h*(7.5625*(f-=(2.625/2.75))*f+0.984375)+a}}}},easeInOutBounce:function(e,f,a,h,g){if(f<g/2){return jQuery.easing.easeInBounce(e,f*2,0,h,g)*0.5+a}return jQuery.easing.easeOutBounce(e,f*2-g,0,h,g)*0.5+h*0.5+a}});
/*
 *
 * TERMS OF USE - EASING EQUATIONS
 * 
 * Open source under the BSD License. 
 * 
 * Copyright å© 2001 Robert Penner
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
 */

/***************************************************
	SUPERSIZED
***************************************************/
/*Supersized - Fullscreen Slideshow jQuery Plugin
	Version : 3.2.7
	Site	: www.buildinternet.com/project/supersized
	Author	: Sam Dunn
	Company : One Mighty Roar (www.onemightyroar.com)
	License : MIT License / GPL License
*/
(function(a){a(document).ready(function(){a("body").append('<div id="supersized-loader"></div><ul id="supersized"></ul>')});a.supersized=function(b){var c="#supersized",d=this;d.$el=a(c);d.el=c;vars=a.supersized.vars;d.$el.data("supersized",d);api=d.$el.data("supersized");d.init=function(){a.supersized.vars=a.extend(a.supersized.vars,a.supersized.themeVars);a.supersized.vars.options=a.extend({},a.supersized.defaultOptions,a.supersized.themeOptions,b);d.options=a.supersized.vars.options;d._build()};d._build=function(){var g=0,e="",j="",h,f="",i;while(g<=d.options.slides.length-1){switch(d.options.slide_links){case"num":h=g;break;case"name":h=d.options.slides[g].title;break;case"blank":h="";break}e=e+'<li class="slide-'+g+'"></li>';if(g==d.options.start_slide-1){if(d.options.slide_links){j=j+'<li class="slide-link-'+g+' current-slide"><a>'+h+"</a></li>"}if(d.options.thumb_links){d.options.slides[g].thumb?i=d.options.slides[g].thumb:i=d.options.slides[g].image;f=f+'<li class="thumb'+g+' current-thumb"><img src="'+i+'"/></li>'}}else{if(d.options.slide_links){j=j+'<li class="slide-link-'+g+'" ><a>'+h+"</a></li>"}if(d.options.thumb_links){d.options.slides[g].thumb?i=d.options.slides[g].thumb:i=d.options.slides[g].image;f=f+'<li class="thumb'+g+'"><img src="'+i+'"/></li>'}}g++}if(d.options.slide_links){a(vars.slide_list).html(j)}if(d.options.thumb_links&&vars.thumb_tray.length){a(vars.thumb_tray).append('<ul id="'+vars.thumb_list.replace("#","")+'">'+f+"</ul>")}a(d.el).append(e);if(d.options.thumbnail_navigation){vars.current_slide-1<0?prevThumb=d.options.slides.length-1:prevThumb=vars.current_slide-1;a(vars.prev_thumb).show().html(a("<img/>").attr("src",d.options.slides[prevThumb].image));vars.current_slide==d.options.slides.length-1?nextThumb=0:nextThumb=vars.current_slide+1;a(vars.next_thumb).show().html(a("<img/>").attr("src",d.options.slides[nextThumb].image))}d._start()};d._start=function(){if(d.options.start_slide){vars.current_slide=d.options.start_slide-1}else{vars.current_slide=Math.floor(Math.random()*d.options.slides.length)}var o=d.options.new_window?' target="_blank"':"";if(d.options.performance==3){d.$el.addClass("speed")}else{if((d.options.performance==1)||(d.options.performance==2)){d.$el.addClass("quality")}}if(d.options.random){arr=d.options.slides;for(var h,m,k=arr.length;k;h=parseInt(Math.random()*k),m=arr[--k],arr[k]=arr[h],arr[h]=m){}d.options.slides=arr}if(d.options.slides.length>1){if(d.options.slides.length>2){vars.current_slide-1<0?loadPrev=d.options.slides.length-1:loadPrev=vars.current_slide-1;var g=(d.options.slides[loadPrev].url)?"href='"+d.options.slides[loadPrev].url+"'":"";var q=a('<img src="'+d.options.slides[loadPrev].image+'"/>');var n=d.el+" li:eq("+loadPrev+")";q.appendTo(n).wrap("<a "+g+o+"></a>").parent().parent().addClass("image-loading prevslide");q.load(function(){a(this).data("origWidth",a(this).width()).data("origHeight",a(this).height());d.resizeNow()})}}else{d.options.slideshow=0}g=(api.getField("url"))?"href='"+api.getField("url")+"'":"";var l=a('<img src="'+api.getField("image")+'"/>');var f=d.el+" li:eq("+vars.current_slide+")";l.appendTo(f).wrap("<a "+g+o+"></a>").parent().parent().addClass("image-loading activeslide");l.load(function(){d._origDim(a(this));d.resizeNow();d.launch();if(typeof theme!="undefined"&&typeof theme._init=="function"){theme._init()}});if(d.options.slides.length>1){vars.current_slide==d.options.slides.length-1?loadNext=0:loadNext=vars.current_slide+1;g=(d.options.slides[loadNext].url)?"href='"+d.options.slides[loadNext].url+"'":"";var e=a('<img src="'+d.options.slides[loadNext].image+'"/>');var p=d.el+" li:eq("+loadNext+")";e.appendTo(p).wrap("<a "+g+o+"></a>").parent().parent().addClass("image-loading");e.load(function(){a(this).data("origWidth",a(this).width()).data("origHeight",a(this).height());d.resizeNow()})}d.$el.css("visibility","hidden");a(".load-item").hide()};d.launch=function(){d.$el.css("visibility","visible");a("#supersized-loader").remove();if(typeof theme!="undefined"&&typeof theme.beforeAnimation=="function"){theme.beforeAnimation("next")}a(".load-item").show();if(d.options.keyboard_nav){a(document.documentElement).keyup(function(e){if(vars.in_animation){return false}if((e.keyCode==37)||(e.keyCode==40)){clearInterval(vars.slideshow_interval);d.prevSlide()}else{if((e.keyCode==39)||(e.keyCode==38)){clearInterval(vars.slideshow_interval);d.nextSlide()}else{if(e.keyCode==32&&!vars.hover_pause){clearInterval(vars.slideshow_interval);d.playToggle()}}}})}if(d.options.slideshow&&d.options.pause_hover){a(d.el).hover(function(){if(vars.in_animation){return false}vars.hover_pause=true;if(!vars.is_paused){vars.hover_pause="resume";d.playToggle()}},function(){if(vars.hover_pause=="resume"){d.playToggle();vars.hover_pause=false}})}if(d.options.slide_links){a(vars.slide_list+"> li").click(function(){index=a(vars.slide_list+"> li").index(this);targetSlide=index+1;d.goTo(targetSlide);return false})}if(d.options.thumb_links){a(vars.thumb_list+"> li").click(function(){index=a(vars.thumb_list+"> li").index(this);targetSlide=index+1;api.goTo(targetSlide);return false})}if(d.options.slideshow&&d.options.slides.length>1){if(d.options.autoplay&&d.options.slides.length>1){vars.slideshow_interval=setInterval(d.nextSlide,d.options.slide_interval)}else{vars.is_paused=true}a(".load-item img").bind("contextmenu mousedown",function(){return false})}a(window).resize(function(){d.resizeNow()})};d.resizeNow=function(){return d.$el.each(function(){a("img",d.el).each(function(){thisSlide=a(this);var f=(thisSlide.data("origHeight")/thisSlide.data("origWidth")).toFixed(2);var e=d.$el.width(),h=d.$el.height(),i;if(d.options.fit_always){if((h/e)>f){g()}else{j()}}else{if((h<=d.options.min_height)&&(e<=d.options.min_width)){if((h/e)>f){d.options.fit_landscape&&f<1?g(true):j(true)}else{d.options.fit_portrait&&f>=1?j(true):g(true)}}else{if(e<=d.options.min_width){if((h/e)>f){d.options.fit_landscape&&f<1?g(true):j()}else{d.options.fit_portrait&&f>=1?j():g(true)}}else{if(h<=d.options.min_height){if((h/e)>f){d.options.fit_landscape&&f<1?g():j(true)}else{d.options.fit_portrait&&f>=1?j(true):g()}}else{if((h/e)>f){d.options.fit_landscape&&f<1?g():j()}else{d.options.fit_portrait&&f>=1?j():g()}}}}}function g(k){if(k){if(thisSlide.width()<e||thisSlide.width()<d.options.min_width){if(thisSlide.width()*f>=d.options.min_height){thisSlide.width(d.options.min_width);thisSlide.height(thisSlide.width()*f)}else{j()}}}else{if(d.options.min_height>=h&&!d.options.fit_landscape){if(e*f>=d.options.min_height||(e*f>=d.options.min_height&&f<=1)){thisSlide.width(e);thisSlide.height(e*f)}else{if(f>1){thisSlide.height(d.options.min_height);thisSlide.width(thisSlide.height()/f)}else{if(thisSlide.width()<e){thisSlide.width(e);thisSlide.height(thisSlide.width()*f)}}}}else{thisSlide.width(e);thisSlide.height(e*f)}}}function j(k){if(k){if(thisSlide.height()<h){if(thisSlide.height()/f>=d.options.min_width){thisSlide.height(d.options.min_height);thisSlide.width(thisSlide.height()/f)}else{g(true)}}}else{if(d.options.min_width>=e){if(h/f>=d.options.min_width||f>1){thisSlide.height(h);thisSlide.width(h/f)}else{if(f<=1){thisSlide.width(d.options.min_width);thisSlide.height(thisSlide.width()*f)}}}else{thisSlide.height(h);thisSlide.width(h/f)}}}if(thisSlide.parents("li").hasClass("image-loading")){a(".image-loading").removeClass("image-loading")}if(d.options.horizontal_center){a(this).css("left",(e-a(this).width())/2)}if(d.options.vertical_center){a(this).css("top",(h-a(this).height())/2)}});if(d.options.image_protect){a("img",d.el).bind("contextmenu mousedown",function(){return false})}return false})};d.nextSlide=function(){if(vars.in_animation||!api.options.slideshow){return false}else{vars.in_animation=true}clearInterval(vars.slideshow_interval);var h=d.options.slides,e=d.$el.find(".activeslide");a(".prevslide").removeClass("prevslide");e.removeClass("activeslide").addClass("prevslide");vars.current_slide+1==d.options.slides.length?vars.current_slide=0:vars.current_slide++;var g=a(d.el+" li:eq("+vars.current_slide+")"),i=d.$el.find(".prevslide");if(d.options.performance==1){d.$el.removeClass("quality").addClass("speed")}loadSlide=false;vars.current_slide==d.options.slides.length-1?loadSlide=0:loadSlide=vars.current_slide+1;var k=d.el+" li:eq("+loadSlide+")";if(!a(k).html()){var j=d.options.new_window?' target="_blank"':"";imageLink=(d.options.slides[loadSlide].url)?"href='"+d.options.slides[loadSlide].url+"'":"";var f=a('<img src="'+d.options.slides[loadSlide].image+'"/>');f.appendTo(k).wrap("<a "+imageLink+j+"></a>").parent().parent().addClass("image-loading").css("visibility","hidden");f.load(function(){d._origDim(a(this));d.resizeNow()})}if(d.options.thumbnail_navigation==1){vars.current_slide-1<0?prevThumb=d.options.slides.length-1:prevThumb=vars.current_slide-1;a(vars.prev_thumb).html(a("<img/>").attr("src",d.options.slides[prevThumb].image));nextThumb=loadSlide;a(vars.next_thumb).html(a("<img/>").attr("src",d.options.slides[nextThumb].image))}if(typeof theme!="undefined"&&typeof theme.beforeAnimation=="function"){theme.beforeAnimation("next")}if(d.options.slide_links){a(".current-slide").removeClass("current-slide");a(vars.slide_list+"> li").eq(vars.current_slide).addClass("current-slide")}g.css("visibility","hidden").addClass("activeslide");switch(d.options.transition){case 0:case"none":g.css("visibility","visible");vars.in_animation=false;d.afterAnimation();break;case 1:case"fade":g.animate({opacity:0},0).css("visibility","visible").animate({opacity:1,avoidTransforms:false},d.options.transition_speed,function(){d.afterAnimation()});break;case 2:case"slideTop":g.animate({top:-d.$el.height()},0).css("visibility","visible").animate({top:0,avoidTransforms:false},d.options.transition_speed,function(){d.afterAnimation()});break;case 3:case"slideRight":g.animate({left:d.$el.width()},0).css("visibility","visible").animate({left:0,avoidTransforms:false},d.options.transition_speed,function(){d.afterAnimation()});break;case 4:case"slideBottom":g.animate({top:d.$el.height()},0).css("visibility","visible").animate({top:0,avoidTransforms:false},d.options.transition_speed,function(){d.afterAnimation()});break;case 5:case"slideLeft":g.animate({left:-d.$el.width()},0).css("visibility","visible").animate({left:0,avoidTransforms:false},d.options.transition_speed,function(){d.afterAnimation()});break;case 6:case"carouselRight":g.animate({left:d.$el.width()},0).css("visibility","visible").animate({left:0,avoidTransforms:false},d.options.transition_speed,function(){d.afterAnimation()});e.animate({left:-d.$el.width(),avoidTransforms:false},d.options.transition_speed);break;case 7:case"carouselLeft":g.animate({left:-d.$el.width()},0).css("visibility","visible").animate({left:0,avoidTransforms:false},d.options.transition_speed,function(){d.afterAnimation()});e.animate({left:d.$el.width(),avoidTransforms:false},d.options.transition_speed);break}return false};d.prevSlide=function(){if(vars.in_animation||!api.options.slideshow){return false}else{vars.in_animation=true}clearInterval(vars.slideshow_interval);var h=d.options.slides,e=d.$el.find(".activeslide");a(".prevslide").removeClass("prevslide");e.removeClass("activeslide").addClass("prevslide");vars.current_slide==0?vars.current_slide=d.options.slides.length-1:vars.current_slide--;var g=a(d.el+" li:eq("+vars.current_slide+")"),i=d.$el.find(".prevslide");if(d.options.performance==1){d.$el.removeClass("quality").addClass("speed")}loadSlide=vars.current_slide;var k=d.el+" li:eq("+loadSlide+")";if(!a(k).html()){var j=d.options.new_window?' target="_blank"':"";imageLink=(d.options.slides[loadSlide].url)?"href='"+d.options.slides[loadSlide].url+"'":"";var f=a('<img src="'+d.options.slides[loadSlide].image+'"/>');f.appendTo(k).wrap("<a "+imageLink+j+"></a>").parent().parent().addClass("image-loading").css("visibility","hidden");f.load(function(){d._origDim(a(this));d.resizeNow()})}if(d.options.thumbnail_navigation==1){loadSlide==0?prevThumb=d.options.slides.length-1:prevThumb=loadSlide-1;a(vars.prev_thumb).html(a("<img/>").attr("src",d.options.slides[prevThumb].image));vars.current_slide==d.options.slides.length-1?nextThumb=0:nextThumb=vars.current_slide+1;a(vars.next_thumb).html(a("<img/>").attr("src",d.options.slides[nextThumb].image))}if(typeof theme!="undefined"&&typeof theme.beforeAnimation=="function"){theme.beforeAnimation("prev")}if(d.options.slide_links){a(".current-slide").removeClass("current-slide");a(vars.slide_list+"> li").eq(vars.current_slide).addClass("current-slide")}g.css("visibility","hidden").addClass("activeslide");switch(d.options.transition){case 0:case"none":g.css("visibility","visible");vars.in_animation=false;d.afterAnimation();break;case 1:case"fade":g.animate({opacity:0},0).css("visibility","visible").animate({opacity:1,avoidTransforms:false},d.options.transition_speed,function(){d.afterAnimation()});break;case 2:case"slideTop":g.animate({top:d.$el.height()},0).css("visibility","visible").animate({top:0,avoidTransforms:false},d.options.transition_speed,function(){d.afterAnimation()});break;case 3:case"slideRight":g.animate({left:-d.$el.width()},0).css("visibility","visible").animate({left:0,avoidTransforms:false},d.options.transition_speed,function(){d.afterAnimation()});break;case 4:case"slideBottom":g.animate({top:-d.$el.height()},0).css("visibility","visible").animate({top:0,avoidTransforms:false},d.options.transition_speed,function(){d.afterAnimation()});break;case 5:case"slideLeft":g.animate({left:d.$el.width()},0).css("visibility","visible").animate({left:0,avoidTransforms:false},d.options.transition_speed,function(){d.afterAnimation()});break;case 6:case"carouselRight":g.animate({left:-d.$el.width()},0).css("visibility","visible").animate({left:0,avoidTransforms:false},d.options.transition_speed,function(){d.afterAnimation()});e.animate({left:0},0).animate({left:d.$el.width(),avoidTransforms:false},d.options.transition_speed);break;case 7:case"carouselLeft":g.animate({left:d.$el.width()},0).css("visibility","visible").animate({left:0,avoidTransforms:false},d.options.transition_speed,function(){d.afterAnimation()});e.animate({left:0},0).animate({left:-d.$el.width(),avoidTransforms:false},d.options.transition_speed);break}return false};d.playToggle=function(){if(vars.in_animation||!api.options.slideshow){return false}if(vars.is_paused){vars.is_paused=false;if(typeof theme!="undefined"&&typeof theme.playToggle=="function"){theme.playToggle("play")}vars.slideshow_interval=setInterval(d.nextSlide,d.options.slide_interval)}else{vars.is_paused=true;if(typeof theme!="undefined"&&typeof theme.playToggle=="function"){theme.playToggle("pause")}clearInterval(vars.slideshow_interval)}return false};d.goTo=function(f){if(vars.in_animation||!api.options.slideshow){return false}var e=d.options.slides.length;if(f<0){f=e}else{if(f>e){f=1}}f=e-f+1;clearInterval(vars.slideshow_interval);if(typeof theme!="undefined"&&typeof theme.goTo=="function"){theme.goTo()}if(vars.current_slide==e-f){if(!(vars.is_paused)){vars.slideshow_interval=setInterval(d.nextSlide,d.options.slide_interval)}return false}if(e-f>vars.current_slide){vars.current_slide=e-f-1;vars.update_images="next";d._placeSlide(vars.update_images)}else{if(e-f<vars.current_slide){vars.current_slide=e-f+1;vars.update_images="prev";d._placeSlide(vars.update_images)}}if(d.options.slide_links){a(vars.slide_list+"> .current-slide").removeClass("current-slide");a(vars.slide_list+"> li").eq((e-f)).addClass("current-slide")}if(d.options.thumb_links){a(vars.thumb_list+"> .current-thumb").removeClass("current-thumb");a(vars.thumb_list+"> li").eq((e-f)).addClass("current-thumb")}};d._placeSlide=function(e){var h=d.options.new_window?' target="_blank"':"";loadSlide=false;if(e=="next"){vars.current_slide==d.options.slides.length-1?loadSlide=0:loadSlide=vars.current_slide+1;var g=d.el+" li:eq("+loadSlide+")";if(!a(g).html()){var h=d.options.new_window?' target="_blank"':"";imageLink=(d.options.slides[loadSlide].url)?"href='"+d.options.slides[loadSlide].url+"'":"";var f=a('<img src="'+d.options.slides[loadSlide].image+'"/>');f.appendTo(g).wrap("<a "+imageLink+h+"></a>").parent().parent().addClass("image-loading").css("visibility","hidden");f.load(function(){d._origDim(a(this));d.resizeNow()})}d.nextSlide()}else{if(e=="prev"){vars.current_slide-1<0?loadSlide=d.options.slides.length-1:loadSlide=vars.current_slide-1;var g=d.el+" li:eq("+loadSlide+")";if(!a(g).html()){var h=d.options.new_window?' target="_blank"':"";imageLink=(d.options.slides[loadSlide].url)?"href='"+d.options.slides[loadSlide].url+"'":"";var f=a('<img src="'+d.options.slides[loadSlide].image+'"/>');f.appendTo(g).wrap("<a "+imageLink+h+"></a>").parent().parent().addClass("image-loading").css("visibility","hidden");f.load(function(){d._origDim(a(this));d.resizeNow()})}d.prevSlide()}}};d._origDim=function(e){e.data("origWidth",e.width()).data("origHeight",e.height())};d.afterAnimation=function(){if(d.options.performance==1){d.$el.removeClass("speed").addClass("quality")}if(vars.update_images){vars.current_slide-1<0?setPrev=d.options.slides.length-1:setPrev=vars.current_slide-1;vars.update_images=false;a(".prevslide").removeClass("prevslide");a(d.el+" li:eq("+setPrev+")").addClass("prevslide")}vars.in_animation=false;if(!vars.is_paused&&d.options.slideshow){vars.slideshow_interval=setInterval(d.nextSlide,d.options.slide_interval);if(d.options.stop_loop&&vars.current_slide==d.options.slides.length-1){d.playToggle()}}if(typeof theme!="undefined"&&typeof theme.afterAnimation=="function"){theme.afterAnimation()}return false};d.getField=function(e){return d.options.slides[vars.current_slide][e]};d.init()};a.supersized.vars={thumb_tray:"#thumb-tray",thumb_list:"#thumb-list",slide_list:"#slide-list",current_slide:0,in_animation:false,is_paused:false,hover_pause:false,slideshow_interval:false,update_images:false,options:{}};a.supersized.defaultOptions={slideshow:1,autoplay:1,start_slide:1,stop_loop:0,random:0,slide_interval:5000,transition:1,transition_speed:750,new_window:1,pause_hover:0,keyboard_nav:1,performance:1,image_protect:1,fit_always:0,fit_landscape:0,fit_portrait:1,min_width:0,min_height:0,horizontal_center:1,vertical_center:1,slide_links:1,thumb_links:1,thumbnail_navigation:0};a.fn.supersized=function(b){return this.each(function(){(new a.supersized(b))})}})(jQuery);
