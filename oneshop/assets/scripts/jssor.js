﻿function $JssorObject$(){function n(n,t){$JssorDebug$.$Execute(function(){if(void 0==n||null==n)throw new Error("param 'eventName' is null or empty.");if("function"!=typeof t)throw"param 'handler' must be a function.";$Jssor$.$Each(i,function(e){if(e.$EventName==n&&e.$Handler===t)throw new Error("The handler listened to the event already, cannot listen to the same event of the same object with the same handler twice.")})}),i.push({$EventName:n,$Handler:t})}function t(n,t){$JssorDebug$.$Execute(function(){if(void 0==n||null==n)throw new Error("param 'eventName' is null or empty.");if("function"!=typeof t)throw"param 'handler' must be a function."}),$Jssor$.$Each(i,function(e,r){e.$EventName==n&&e.$Handler===t&&i.splice(r,1)})}function e(){i=[]}function r(){$Jssor$.$Each(a,function(n){$Jssor$.$RemoveEvent(n.$Obj,n.$EventName,n.$Handler)}),a=[]}var o=this,i=[],a=[];o.$Listen=function(n,t,e,r){$JssorDebug$.$Execute(function(){if(!n)throw new Error("param 'obj' is null or empty.");if(void 0==t||null==t)throw new Error("param 'eventName' is null or empty.");if("function"!=typeof e)throw"param 'handler' must be a function.";$Jssor$.$Each(a,function(r){if(r.$Obj===n&&r.$EventName==t&&r.$Handler===e)throw new Error("The handler listened to the event already, cannot listen to the same event of the same object with the same handler twice.")})}),$Jssor$.$AddEvent(n,t,e,r),a.push({$Obj:n,$EventName:t,$Handler:e})},o.$Unlisten=function(n,t,e){$JssorDebug$.$Execute(function(){if(!n)throw new Error("param 'obj' is null or empty.");if(void 0==t||null==t)throw new Error("param 'eventName' is null or empty.");if("function"!=typeof e)throw"param 'handler' must be a function."}),$Jssor$.$Each(a,function(r,o){r.$Obj===n&&r.$EventName==t&&r.$Handler===e&&($Jssor$.$RemoveEvent(n,t,e),a.splice(o,1))})},o.$UnlistenAll=r,o.$On=o.addEventListener=n,o.$Off=o.removeEventListener=t,o.$TriggerEvent=function(n){var t=[].slice.call(arguments,1);$Jssor$.$Each(i,function(e){e.$EventName==n&&e.$Handler.apply(window,t)})},o.$Destroy=function(){r(),e();for(var n in o)delete o[n]},$JssorDebug$.$C_AbstractClass(o)}function $JssorAnimator$(n,t,e,r,o,i){function a(n){b+=n,I+=n,P+=n,A+=n,J+=n,D+=n,S=n}function s(t,e){var r=t-b+n*e;return a(r),I}function u(n,a){var s=n;if(T&&(s>=I||b>=s)&&(s=((s-b)%T+T)%T+b),!y||E||a||J!=s){var u=Math.min(s,I);if(u=Math.max(u,b),!y||E||a||u!=D){if(i){var $=(u-P)/(t||1);e.$Reverse&&($=1-$);var c=$Jssor$.$Cast(o,i,$,p,w,g,e);$Jssor$.$Each(c,function(n,t){M[t]&&M[t](r,n)})}x.$OnInnerOffsetChange(D-P,u-P),D=u,$Jssor$.$Each(R,function(t,e){var r=J>n?R[R.length-e-1]:t;r.$GoToPosition(D-S,a)});var f=J,l=D;J=s,y=!0,x.$OnPositionChange(f,l)}}}function $(n,t,e){$JssorDebug$.$Execute(function(){0!==t&&1!==t&&$JssorDebug$.$Fail("Argument out of range, the value of 'combineMode' should be either 0 or 1.")}),t&&n.$Locate(I,1),e||(b=Math.min(b,n.$GetPosition_OuterBegin()+S),I=Math.max(I,n.$GetPosition_OuterEnd()+S)),R.push(n)}function c(){if(d){var n=$Jssor$.$GetNow(),t=Math.min(n-O,e.$IntervalMax),r=J+t*m;O=n,r*m>=h*m&&(r=h),u(r),!E&&r*m>=h*m?l(C):L(c)}}function f(n,t,e){d||(d=!0,E=e,C=t,n=Math.max(n,b),n=Math.min(n,I),h=n,m=J>h?-1:1,x.$OnStart(),O=$Jssor$.$GetNow(),L(c))}function l(n){d&&(E=d=C=!1,x.$OnStop(),n&&n())}n=n||0;var d,v,h,m,E,p,g,w,C,y,b,I,T,M,x=this,O=0,S=0,J=0,D=0,P=n,A=n+t,R=[],L=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.msRequestAnimationFrame;$Jssor$.$IsBrowserSafari()&&$Jssor$.$BrowserVersion()<7&&(L=null),L=L||function(n){$Jssor$.$Delay(n,e.$Interval)},x.$Play=function(n,t,e){f(n?J+n:I,t,e)},x.$PlayToPosition=f,x.$PlayToBegin=function(n,t){f(b,n,t)},x.$PlayToEnd=function(n,t){f(I,n,t)},x.$Stop=l,x.$Continue=function(n){f(n)},x.$GetPosition=function(){return J},x.$GetPlayToPosition=function(){return h},x.$GetPosition_Display=function(){return D},x.$GoToPosition=u,x.$GoToBegin=function(){u(b,!0)},x.$GoToEnd=function(){u(I,!0)},x.$Move=function(n){u(J+n)},x.$CombineMode=function(){return v},x.$GetDuration=function(){return t},x.$IsPlaying=function(){return d},x.$IsOnTheWay=function(){return J>P&&A>=J},x.$SetLoopLength=function(n){T=n},x.$Locate=s,x.$Shift=a,x.$Join=$,x.$Combine=function(n){$(n,0)},x.$Chain=function(n){$(n,1)},x.$GetPosition_InnerBegin=function(){return P},x.$GetPosition_InnerEnd=function(){return A},x.$GetPosition_OuterBegin=function(){return b},x.$GetPosition_OuterEnd=function(){return I},x.$OnPositionChange=x.$OnStart=x.$OnStop=x.$OnInnerOffsetChange=$Jssor$.$EmptyFunction,x.$Version=$Jssor$.$GetNow(),e=$Jssor$.$Extend({$Interval:16,$IntervalMax:50},e),$JssorDebug$.$Execute(function(){e=$Jssor$.$Extend({$LoopLength:void 0,$Setter:void 0,$Easing:void 0},e)}),T=e.$LoopLength,M=$Jssor$.$Extend({},$Jssor$.$StyleSetter(),e.$Setter),b=P=n,I=A=n+t,g=e.$Round||{},w=e.$During||{},p=$Jssor$.$Extend({$Default:$Jssor$.$IsFunction(e.$Easing)&&e.$Easing||$JssorEasing$.$EaseSwing},e.$Easing)}function $JssorPlayerClass$(){function n(n){function t(e){var o=$Jssor$.$EvtSrc(e);r=o.pInstance,$Jssor$.$RemoveEvent(o,"dataavailable",t),$Jssor$.$Each(i,function(n){n!=r&&n.$Remove()}),n.pTagName=r.tagName,i=null}function e(e){var r;if(!e.pInstance){var o=$Jssor$.$AttributeEx(e,"pHandler");$JssorPlayer$[o]&&($Jssor$.$AddEvent(e,"dataavailable",t),r=new $JssorPlayer$[o](n,e),i.push(r),$JssorDebug$.$Execute(function(){"function"!=$Jssor$.$Type(r.$Remove)&&$JssorDebug$.$Fail("'pRemove' interface not implemented for player handler '"+o+"'.")}))}return r}var r,o=this,i=[];o.$InitPlayerController=function(){if(!n.pInstance&&!e(n)){var t=$Jssor$.$Children(n);$Jssor$.$Each(t,function(n){e(n)})}}}var t=this,e=[];t.$EVT_SWITCH=21,t.$FetchPlayers=function(t){t=t||document.body;var r=$Jssor$.$FindChildren(t,"player");$Jssor$.$Each(r,function(t){e[t.pId]||(t.pId=e.length,e.push(new n(t)));var r=e[t.pId];r.$InitPlayerController()})}}var $JssorDebug$=new function(){function n(t){if(t.constructor===n.caller)throw new Error("Cannot create instance of an abstract class.")}this.$DebugMode=!0,this.$Log=function(n,t){var e=window.console||{},r=this.$DebugMode;r&&e.log?e.log(n):r&&t&&alert(n)},this.$Error=function(n,t){var e=window.console||{},r=this.$DebugMode;if(r&&e.error?e.error(n):r&&alert(n),r)throw t||new Error(n)},this.$Fail=function(n){throw new Error(n)},this.$Assert=function(n,t){var e=this.$DebugMode;if(e&&!n)throw new Error("Assert failed "+t||"")},this.$Trace=function(n){var t=window.console||{},e=this.$DebugMode;e&&t.log&&t.log(n)},this.$Execute=function(n){var t=this.$DebugMode;t&&n()},this.$LiveStamp=function(n,t){var e=this.$DebugMode;if(e){var r=document.createElement("DIV");r.setAttribute("id",t),n.$Live=r}},this.$C_AbstractProperty=function(){throw new Error("The property is abstract, it should be implemented by subclass.")},this.$C_AbstractMethod=function(){throw new Error("The method is abstract, it should be implemented by subclass.")},this.$C_AbstractClass=n},$JssorEasing$=window.$JssorEasing$={$EaseSwing:function(n){return-Math.cos(n*Math.PI)/2+.5},$EaseLinear:function(n){return n},$EaseInQuad:function(n){return n*n},$EaseOutQuad:function(n){return-n*(n-2)},$EaseInOutQuad:function(n){return(n*=2)<1?.5*n*n:-0.5*(--n*(n-2)-1)},$EaseInCubic:function(n){return n*n*n},$EaseOutCubic:function(n){return(n-=1)*n*n+1},$EaseInOutCubic:function(n){return(n*=2)<1?.5*n*n*n:.5*((n-=2)*n*n+2)},$EaseInQuart:function(n){return n*n*n*n},$EaseOutQuart:function(n){return-((n-=1)*n*n*n-1)},$EaseInOutQuart:function(n){return(n*=2)<1?.5*n*n*n*n:-0.5*((n-=2)*n*n*n-2)},$EaseInQuint:function(n){return n*n*n*n*n},$EaseOutQuint:function(n){return(n-=1)*n*n*n*n+1},$EaseInOutQuint:function(n){return(n*=2)<1?.5*n*n*n*n*n:.5*((n-=2)*n*n*n*n+2)},$EaseInSine:function(n){return 1-Math.cos(n*Math.PI/2)},$EaseOutSine:function(n){return Math.sin(n*Math.PI/2)},$EaseInOutSine:function(n){return-0.5*(Math.cos(Math.PI*n)-1)},$EaseInExpo:function(n){return 0==n?0:Math.pow(2,10*(n-1))},$EaseOutExpo:function(n){return 1==n?1:-Math.pow(2,-10*n)+1},$EaseInOutExpo:function(n){return 0==n||1==n?n:(n*=2)<1?.5*Math.pow(2,10*(n-1)):.5*(-Math.pow(2,-10*--n)+2)},$EaseInCirc:function(n){return-(Math.sqrt(1-n*n)-1)},$EaseOutCirc:function(n){return Math.sqrt(1-(n-=1)*n)},$EaseInOutCirc:function(n){return(n*=2)<1?-0.5*(Math.sqrt(1-n*n)-1):.5*(Math.sqrt(1-(n-=2)*n)+1)},$EaseInElastic:function(n){if(!n||1==n)return n;var t=.3,e=.075;return-(Math.pow(2,10*(n-=1))*Math.sin(2*(n-e)*Math.PI/t))},$EaseOutElastic:function(n){if(!n||1==n)return n;var t=.3,e=.075;return Math.pow(2,-10*n)*Math.sin(2*(n-e)*Math.PI/t)+1},$EaseInOutElastic:function(n){if(!n||1==n)return n;var t=.45,e=.1125;return(n*=2)<1?-.5*Math.pow(2,10*(n-=1))*Math.sin(2*(n-e)*Math.PI/t):Math.pow(2,-10*(n-=1))*Math.sin(2*(n-e)*Math.PI/t)*.5+1},$EaseInBack:function(n){var t=1.70158;return n*n*((t+1)*n-t)},$EaseOutBack:function(n){var t=1.70158;return(n-=1)*n*((t+1)*n+t)+1},$EaseInOutBack:function(n){var t=1.70158;return(n*=2)<1?.5*n*n*(((t*=1.525)+1)*n-t):.5*((n-=2)*n*(((t*=1.525)+1)*n+t)+2)},$EaseInBounce:function(n){return 1-$JssorEasing$.$EaseOutBounce(1-n)},$EaseOutBounce:function(n){return 1/2.75>n?7.5625*n*n:2/2.75>n?7.5625*(n-=1.5/2.75)*n+.75:2.5/2.75>n?7.5625*(n-=2.25/2.75)*n+.9375:7.5625*(n-=2.625/2.75)*n+.984375},$EaseInOutBounce:function(n){return.5>n?.5*$JssorEasing$.$EaseInBounce(2*n):.5*$JssorEasing$.$EaseOutBounce(2*n-1)+.5},$EaseGoBack:function(n){return 1-Math.abs((n*=2)-1)},$EaseInWave:function(n){return 1-Math.cos(n*Math.PI*2)},$EaseOutWave:function(n){return Math.sin(n*Math.PI*2)},$EaseOutJump:function(n){return 1-((n*=2)<1?(n=1-n)*n*n:(n-=1)*n*n)},$EaseInJump:function(n){return(n*=2)<1?n*n*n:(n=2-n)*n*n}},$JssorDirection$=window.$JssorDirection$={$TO_LEFT:1,$TO_RIGHT:2,$TO_TOP:4,$TO_BOTTOM:8,$HORIZONTAL:3,$VERTICAL:12,$GetDirectionHorizontal:function(n){return 3&n},$GetDirectionVertical:function(n){return 12&n},$IsHorizontal:function(n){return 3&n},$IsVertical:function(n){return 12&n}},$JssorKeyCode$={$BACKSPACE:8,$COMMA:188,$DELETE:46,$DOWN:40,$END:35,$ENTER:13,$ESCAPE:27,$HOME:36,$LEFT:37,$NUMPAD_ADD:107,$NUMPAD_DECIMAL:110,$NUMPAD_DIVIDE:111,$NUMPAD_ENTER:108,$NUMPAD_MULTIPLY:106,$NUMPAD_SUBTRACT:109,$PAGE_DOWN:34,$PAGE_UP:33,$PERIOD:190,$RIGHT:39,$SPACE:32,$TAB:9,$UP:38},$Jssor$=window.$Jssor$=new function(){function n(){if(!X){X={$Touchable:"ontouchstart"in window||"createTouch"in document};var n;(ln.pointerEnabled||(n=ln.msPointerEnabled))&&(X.$TouchActionAttr=n?"msTouchAction":"touchAction")}return X}function t(n){if(!sn)if(sn=-1,"Microsoft Internet Explorer"==dn&&window.attachEvent&&window.ActiveXObject){var t=vn.indexOf("MSIE");sn=tn,$n=pn(vn.substring(t+5,vn.indexOf(";",t))),un=document.documentMode||$n}else if("Netscape"==dn&&window.addEventListener){var e=vn.indexOf("Firefox"),r=vn.indexOf("Safari"),o=vn.indexOf("Chrome"),i=vn.indexOf("AppleWebKit");if(e>=0)sn=en,un=pn(vn.substring(e+8));else if(r>=0){var a=vn.substring(0,r).lastIndexOf("/");sn=o>=0?on:rn,un=pn(vn.substring(a+1,r))}else{var s=/Trident\/.*rv:([0-9]{1,}[\.0-9]{0,})/i.exec(vn);s&&(sn=tn,un=$n=pn(s[1]))}i>=0&&(fn=pn(vn.substring(i+12)))}else{var s=/(opera)(?:.*version|)[ \/]([\w.]+)/i.exec(vn);s&&(sn=an,un=pn(s[2]))}return n==sn}function e(){return t(tn)}function r(){return e()&&(6>un||"BackCompat"==document.compatMode)}function o(){return t(en)}function i(){return t(rn)}function a(){return t(on)}function s(){return t(an)}function u(){return i()&&fn>534&&535>fn}function $(){return e()&&9>un}function c(n){return Y||(d(["transform","WebkitTransform","msTransform","MozTransform","OTransform"],function(t){return void 0!=n.style[t]?(Y=t,!0):void 0}),Y=Y||"transform"),Y}function f(n){return{}.toString.call(n)}function l(){return Z||(Z={},d(["Boolean","Number","String","Function","Array","Date","RegExp","Object"],function(n){Z["[object "+n+"]"]=n.toLowerCase()})),Z}function d(n,t){if("[object Array]"==f(n)){for(var e=0;e<n.length;e++)if(t(n[e],e,n))return!0}else for(var r in n)if(t(n[r],r,n))return!0}function v(n){return null==n?String(n):l()[f(n)]||"object"}function h(n){for(var t in n)return!0}function m(n){try{return"object"==v(n)&&!n.nodeType&&n!=n.window&&(!n.constructor||{}.hasOwnProperty.call(n.constructor.prototype,"isPrototypeOf"))}catch(t){}}function E(n,t){return{x:n,y:t}}function p(n,t){setTimeout(n,t||0)}function g(n,t,e){var r=n&&"inherit"!=n?n:"";return d(t,function(n){var t=n.exec(r);if(t){var e=r.substr(0,t.index),o=r.substr(t.lastIndex+1,r.length-(t.lastIndex+1));r=e+o}}),r=e+(0!=r.indexOf(" ")?" ":"")+r}function w(n,t){9>un&&(n.style.filter=t)}function C(n,t,e){if(9>cn){var r=n.style.filter,o=new RegExp(/[\s]*progid:DXImageTransform\.Microsoft\.Matrix\([^\)]*\)/g),i=t?"progid:DXImageTransform.Microsoft.Matrix(M11="+t[0][0]+", M12="+t[0][1]+", M21="+t[1][0]+", M22="+t[1][1]+", SizingMethod='auto expand')":"",a=g(r,[o],i);w(n,a),K.$CssMarginTop(n,e.y),K.$CssMarginLeft(n,e.x)}}function y(n){n.constructor===y.caller&&n.$Construct&&n.$Construct.apply(n,y.caller.arguments)}function b(n){return n||window.event}function I(n,t,e){if(void 0==e){var r=n.currentStyle||n.style;return e=r[t],""==e&&window.getComputedStyle&&(r=n.ownerDocument.defaultView.getComputedStyle(n,null),r&&(e=r.getPropertyValue(t)||r[t])),e}n.style[t]=e}function T(n,t,e,r){return void 0==e?pn(I(n,t)):(r&&(e+="px"),void I(n,t,e))}function M(n,t,e){return T(n,t,e,!0)}function x(n,t){var e=2&t,r=t?T:I;return function(t,o){return r(t,n,o,e)}}function O(n){if(e()&&9>$n){var t=/opacity=([^)]*)/.exec(n.style.filter||"");return t?pn(t[1])/100:1}return pn(n.style.opacity||"1")}function S(n,t,r){if(e()&&9>$n){var o=n.style.filter||"",i=new RegExp(/[\s]*alpha\([^\)]*\)/g),a=Math.round(100*t),s="";(100>a||r)&&(s="alpha(opacity="+a+") ");var u=g(o,[i],s);w(n,u)}else n.style.opacity=1==t?"":Math.round(100*t)/100}function J(n,t){var e=t.$Rotate||0,r=void 0==t.$Scale?1:t.$Scale;if($()){var o=K.$CreateMatrix(e/180*Math.PI,r,r);C(n,e||1!=r?o:null,K.$GetMatrixOffset(o,t.$OriginalWidth,t.$OriginalHeight))}else{var i=c(n);if(i){var s="rotate("+e%360+"deg) scale("+r+")";a()&&fn>535&&"ontouchstart"in window&&(s+=" perspective(2000px)"),n.style[i]=s}}}function D(n,t,e,r){for(r=r||"u",n=n?n.firstChild:null;n;n=n.nextSibling)if(1==n.nodeType){if(F(n,r)==t)return n;if(!e){var o=D(n,t,e,r);if(o)return o}}}function P(n,t,e,r){r=r||"u";var o=[];for(n=n?n.firstChild:null;n;n=n.nextSibling)if(1==n.nodeType&&(F(n,r)==t&&o.push(n),!e)){var i=P(n,t,e,r);i.length&&(o=o.concat(i))}return o}function A(n,t,e){for(n=n?n.firstChild:null;n;n=n.nextSibling)if(1==n.nodeType){if(n.tagName==t)return n;if(!e){var r=A(n,t,e);if(r)return r}}}function R(n,t,e){var r=[];for(n=n?n.firstChild:null;n;n=n.nextSibling)if(1==n.nodeType&&(t&&n.tagName!=t||r.push(n),!e)){var o=R(n,t,e);o.length&&(r=r.concat(o))}return r}function L(){var n,t,e,r,o=arguments,i=1&o[0],a=1+i;for(n=o[a-1]||{};a<o.length;a++)if(t=o[a])for(e in t)r=t[e],void 0!==r&&(r=t[e],n[e]=i&&m(n[e])?L(i,{},r):r);return n}function N(n,t){$JssorDebug$.$Assert(t);var e,r,o,i={};for(e in n)if(r=n[e],o=t[e],r!==o){var a;m(r)&&m(o)&&(r=N(o),a=!h(r)),!a&&(i[e]=r)}return i}function B(n){return document.createElement(n)}function H(n,t,e){return void 0==e?n.getAttribute(t):void n.setAttribute(t,e)}function F(n,t){return H(n,t)||H(n,"data-"+t)}function G(n,t){return void 0==t?n.className:void(n.className=t)}function W(n){var t={};return d(n,function(n){t[n]=n}),t}function _(n,t){return n.match(t||nn)}function j(n,t){return W(_(n||"",t))}function U(n,t){var e="";return d(t,function(t){e&&(e+=n),e+=t}),e}function V(n,t,e){G(n,U(" ",L(N(j(G(n)),j(t)),j(e))))}function k(n,t,e){var r=n.cloneNode(!t);return e||K.$RemoveAttribute(r,"id"),r}function q(n){function t(){V(n,o,u[f||$||2&c||c])}function e(n){$=0,t(),K.$RemoveEvent(document,"mouseup",e),K.$RemoveEvent(document,"touchend",e),K.$RemoveEvent(document,"touchcancel",e)}function r(n){f?K.$CancelEvent(n):($=4,t(),K.$AddEvent(document,"mouseup",e),K.$AddEvent(document,"touchend",e),K.$AddEvent(document,"touchcancel",e))}var o,i=this,a="",s=["av","pv","ds","dn"],u=[],$=0,c=0,f=0;i.$Selected=function(n){return void 0==n?c:(c=2&n||1&n,void t())},i.$Enable=function(n){return void 0==n?!f:(f=n?0:3,void t())},n=K.$GetElement(n);var l=$Jssor$.$Split(G(n));l&&(a=l.shift()),d(s,function(n){u.push(a+n)}),o=U(" ",u),u.unshift(""),K.$AddEvent(n,"mousedown",r),K.$AddEvent(n,"touchstart",r)}function z(){return gn||(gn=L({$MarginTop:K.$CssMarginTop,$MarginLeft:K.$CssMarginLeft,$Clip:K.$SetStyleClip,$Transform:K.$SetStyleTransform},wn)),gn}function Q(){return z(),gn.$Transform=gn.$Transform,gn}var X,Y,Z,K=this,nn=/\S+/g,tn=1,en=2,rn=3,on=4,an=5,sn=0,un=0,$n=0,cn=0,fn=0,ln=navigator,dn=ln.appName,vn=(ln.appVersion,ln.userAgent),hn=document.documentElement;K.$Device=n,K.$IsBrowserIE=e,K.$IsBrowserIeQuirks=r,K.$IsBrowserFireFox=o,K.$IsBrowserSafari=i,K.$IsBrowserChrome=a,K.$IsBrowserOpera=s,K.$IsBrowserBadTransform=u,K.$IsBrowserIe9Earlier=$,K.$BrowserVersion=function(){return un},K.$BrowserEngineVersion=function(){return $n||un},K.$WebKitVersion=function(){return t(),fn},K.$Delay=p,K.$Inherit=function(n,t){return t.call(n),L({},n)},K.$Construct=y,K.$GetElement=function(n){return K.$IsString(n)&&(n=document.getElementById(n)),n},K.$GetEvent=b,K.$EvtSrc=function(n){return n=b(n),n.target||n.srcElement||document},K.$EvtTarget=function(n){return n=b(n),n.relatedTarget||n.toElement},K.$EvtWhich=function(n){return n=b(n),n.which||[0,1,3,0,2][n.button]||n.charCode||n.keyCode},K.$MousePosition=function(n){return n=b(n),{x:n.pageX||n.clientX||0,y:n.pageY||n.clientY||0}},K.$PageScroll=function(){var n=document.body;return{x:(window.pageXOffset||hn.scrollLeft||n.scrollLeft||0)-(hn.clientLeft||n.clientLeft||0),y:(window.pageYOffset||hn.scrollTop||n.scrollTop||0)-(hn.clientTop||n.clientTop||0)}},K.$WindowSize=function(){var n=document.body;return{x:n.clientWidth||hn.clientWidth,y:n.clientHeight||hn.clientHeight}},K.$SetStyleTransform=function(n,t){u()?p(K.$CreateCallback(null,J,n,t)):J(n,t)},K.$SetStyleTransformOrigin=function(n,t){var e=c(n);e&&(n.style[e+"Origin"]=t)},K.$CssScale=function(n,t){if(e()&&9>$n||10>$n&&r())n.style.zoom=1==t?"":t;else{var o=c(n);if(o){var i="scale("+t+")",a=n.style[o],s=new RegExp(/[\s]*scale\(.*?\)/g),u=g(a,[s],i);n.style[o]=u}}},K.$EnableHWA=function(n){n.style[c(n)]&&"none"!=n.style[c(n)]||(n.style[c(n)]="perspective(2000px)")},K.$DisableHWA=function(n){n.style[c(n)]="none"};var mn=0,En=0;K.$WindowResizeFilter=function(n,t){return $()?function(){var e=!0,o=r()?n.document.body:n.document.documentElement;if(o){var i=o.offsetWidth-mn,a=o.offsetHeight-En;i||a?(mn+=i,En+=a):e=!1}e&&t()}:t},K.$MouseOverOutFilter=function(n,t){return $JssorDebug$.$Execute(function(){if(!t)throw new Error('Null reference, parameter "target".')}),function(e){e=b(e);var r=e.type,o=e.relatedTarget||("mouseout"==r?e.toElement:e.fromElement);(!o||o!==t&&!K.$IsChild(t,o))&&n(e)}},K.$AddEvent=function(n,t,e,r){n=K.$GetElement(n),$JssorDebug$.$Execute(function(){n||$JssorDebug$.$Fail("Parameter 'elmt' not specified."),e||$JssorDebug$.$Fail("Parameter 'handler' not specified."),n.addEventListener||n.attachEvent||$JssorDebug$.$Fail("Unable to attach event handler, no known technique.")}),n.addEventListener?("mousewheel"==t&&n.addEventListener("DOMMouseScroll",e,r),n.addEventListener(t,e,r)):n.attachEvent&&(n.attachEvent("on"+t,e),r&&n.setCapture&&n.setCapture())},K.$RemoveEvent=function(n,t,e,r){n=K.$GetElement(n),n.removeEventListener?("mousewheel"==t&&n.removeEventListener("DOMMouseScroll",e,r),n.removeEventListener(t,e,r)):n.detachEvent&&(n.detachEvent("on"+t,e),r&&n.releaseCapture&&n.releaseCapture())},K.$FireEvent=function(n,t){$JssorDebug$.$Execute(function(){document.createEvent||document.createEventObject||$JssorDebug$.$Fail("Unable to fire event, no known technique."),n.dispatchEvent||n.fireEvent||$JssorDebug$.$Fail("Unable to fire event, no known technique.")});var e;if(document.createEvent)e=document.createEvent("HTMLEvents"),e.initEvent(t,!1,!1),n.dispatchEvent(e);else{var r="on"+t;e=document.createEventObject(),n.fireEvent(r,e)}},K.$CancelEvent=function(n){n=b(n),n.preventDefault&&n.preventDefault(),n.cancel=!0,n.returnValue=!1},K.$StopEvent=function(n){n=b(n),n.stopPropagation&&n.stopPropagation(),n.cancelBubble=!0},K.$CreateCallback=function(n,t){var e=[].slice.call(arguments,2),r=function(){var r=e.concat([].slice.call(arguments,0));return t.apply(n,r)};return r},K.$InnerText=function(n,t){if(void 0==t)return n.textContent||n.innerText;var e=document.createTextNode(t);K.$Empty(n),n.appendChild(e)},K.$InnerHtml=function(n,t){return void 0==t?n.innerHTML:void(n.innerHTML=t)},K.$GetClientRect=function(n){var t=n.getBoundingClientRect();return{x:t.left,y:t.top,w:t.right-t.left,h:t.bottom-t.top}},K.$ClearInnerHtml=function(n){n.innerHTML=""},K.$EncodeHtml=function(n){var t=K.$CreateDiv();return K.$InnerText(t,n),K.$InnerHtml(t)},K.$DecodeHtml=function(n){var t=K.$CreateDiv();return K.$InnerHtml(t,n),K.$InnerText(t)},K.$SelectElement=function(n){var t;window.getSelection&&(t=window.getSelection());var e=null;document.createRange?(e=document.createRange(),e.selectNode(n)):(e=document.body.createTextRange(),e.moveToElementText(n),e.select()),t&&t.addRange(e)},K.$DeselectElements=function(){document.selection?document.selection.empty():window.getSelection&&window.getSelection().removeAllRanges()},K.$Children=function(n,t){for(var e=[],r=n.firstChild;r;r=r.nextSibling)(t||1==r.nodeType)&&e.push(r);return e},K.$FindChild=D,K.$FindChildren=P,K.$FindChildByTag=A,K.$FindChildrenByTag=R,K.$GetElementsByTag=function(n,t){return n.getElementsByTagName(t)},K.$Extend=L,K.$Unextend=N,K.$IsFunction=function(n){return"function"==v(n)},K.$IsArray=function(n){return"array"==v(n)},K.$IsString=function(n){return"string"==v(n)},K.$IsNumeric=function(n){return!isNaN(pn(n))&&isFinite(n)},K.$Type=v,K.$Each=d,K.$IsNotEmpty=h,K.$IsPlainObject=m,K.$CreateElement=B,K.$CreateDiv=function(){return B("DIV")},K.$CreateSpan=function(){return B("SPAN")},K.$EmptyFunction=function(){},K.$Attribute=H,K.$AttributeEx=F,K.$ClassName=G,K.$ToHash=W,K.$Split=_,K.$Join=U,K.$AddClass=function(n,t){V(n,null,t)},K.$RemoveClass=V,K.$ReplaceClass=V,K.$ParentNode=function(n){return n.parentNode},K.$HideElement=function(n){K.$CssDisplay(n,"none")},K.$EnableElement=function(n,t){t?K.$Attribute(n,"disabled",!0):K.$RemoveAttribute(n,"disabled")},K.$HideElements=function(n){for(var t=0;t<n.length;t++)K.$HideElement(n[t])},K.$ShowElement=function(n,t){K.$CssDisplay(n,t?"none":"")},K.$ShowElements=function(n,t){for(var e=0;e<n.length;e++)K.$ShowElement(n[e],t)},K.$RemoveAttribute=function(n,t){n.removeAttribute(t)},K.$CanClearClip=function(){return e()&&10>un},K.$SetStyleClip=function(n,t){if(t)n.style.clip="rect("+Math.round(t.$Top)+"px "+Math.round(t.$Right)+"px "+Math.round(t.$Bottom)+"px "+Math.round(t.$Left)+"px)";else{var e=n.style.cssText,r=[new RegExp(/[\s]*clip: rect\(.*?\)[;]?/i),new RegExp(/[\s]*cliptop: .*?[;]?/i),new RegExp(/[\s]*clipright: .*?[;]?/i),new RegExp(/[\s]*clipbottom: .*?[;]?/i),new RegExp(/[\s]*clipleft: .*?[;]?/i)],o=g(e,r,"");$Jssor$.$CssCssText(n,o)}},K.$GetNow=function(){return(new Date).getTime()},K.$AppendChild=function(n,t){n.appendChild(t)},K.$AppendChildren=function(n,t){d(t,function(t){K.$AppendChild(n,t)})},K.$InsertBefore=function(n,t,e){(e||t.parentNode).insertBefore(n,t)},K.$InsertAfter=function(n,t,e){K.$InsertBefore(n,t.nextSibling,e||t.parentNode)},K.$InsertAdjacentHtml=function(n,t,e){n.insertAdjacentHTML(t,e)},K.$RemoveElement=function(n,t){(t||n.parentNode).removeChild(n)},K.$RemoveElements=function(n,t){d(n,function(n){K.$RemoveElement(n,t)})},K.$Empty=function(n){K.$RemoveElements(K.$Children(n,!0),n)},K.$ParseInt=function(n,t){return parseInt(n,t||10)};var pn=parseFloat;K.$ParseFloat=pn,K.$IsChild=function(n,t){for(var e=document.body;t&&n!==t&&e!==t;)try{t=t.parentNode}catch(r){return!1}return n===t},K.$CloneNode=k,K.$LoadImage=function(n,t){function e(n,i){K.$RemoveEvent(o,"load",e),K.$RemoveEvent(o,"abort",r),K.$RemoveEvent(o,"error",r),t&&t(o,i)}function r(n){e(n,!0)}var o=new Image;s()&&11.6>un||!n?e(!n):(K.$AddEvent(o,"load",e),K.$AddEvent(o,"abort",r),K.$AddEvent(o,"error",r),o.src=n)},K.$LoadImages=function(n,t,e){function r(n,r){o--,t&&n&&n.src==t.src&&(t=n),!o&&e&&e(t)}var o=n.length+1;d(n,function(n){K.$LoadImage(n.src,r)}),r()},K.$BuildElement=function(n,t,e,r){r&&(n=k(n));var o=P(n,t);o.length||(o=$Jssor$.$GetElementsByTag(n,t));for(var i=o.length-1;i>-1;i--){var a=o[i],s=k(e);G(s,G(a)),$Jssor$.$CssCssText(s,a.style.cssText),$Jssor$.$InsertBefore(s,a),$Jssor$.$RemoveElement(a)}return n},K.$Buttonize=function(n){return new q(n)},K.$Css=I,K.$CssN=T,K.$CssP=M,K.$CssOverflow=x("overflow"),K.$CssTop=x("top",2),K.$CssLeft=x("left",2),K.$CssWidth=x("width",2),K.$CssHeight=x("height",2),K.$CssMarginLeft=x("marginLeft",2),K.$CssMarginTop=x("marginTop",2),K.$CssPosition=x("position"),K.$CssDisplay=x("display"),K.$CssZIndex=x("zIndex",1),K.$CssFloat=function(n,t){return I(n,e()?"styleFloat":"cssFloat",t)},K.$CssOpacity=function(n,t,e){return void 0==t?O(n):void S(n,t,e)},K.$CssCssText=function(n,t){return void 0==t?n.style.cssText:void(n.style.cssText=t)};var gn,wn={$Opacity:K.$CssOpacity,$Top:K.$CssTop,$Left:K.$CssLeft,$Width:K.$CssWidth,$Height:K.$CssHeight,$Position:K.$CssPosition,$Display:K.$CssDisplay,$ZIndex:K.$CssZIndex};K.$StyleSetter=z,K.$StyleSetterEx=Q,K.$GetStyles=function(n,t){z();var e={};return d(t,function(t,r){wn[r]&&(e[r]=wn[r](n))}),e},K.$SetStyles=function(n,t){var e=z();d(t,function(t,r){e[r]&&e[r](n,t)})},K.$SetStylesEx=function(n,t){Q(),K.$SetStyles(n,t)};var Cn=new function(){function n(n,t){for(var e=n[0].length,r=n.length,o=t[0].length,i=[],a=0;r>a;a++)for(var s=i[a]=[],u=0;o>u;u++){for(var $=0,c=0;e>c;c++)$+=n[a][c]*t[c][u];s[u]=$}return i}var t=this;t.$ScaleX=function(n,e){return t.$ScaleXY(n,e,0)},t.$ScaleY=function(n,e){return t.$ScaleXY(n,0,e)},t.$ScaleXY=function(t,e,r){return n(t,[[e,0],[0,r]])},t.$TransformPoint=function(t,e){var r=n(t,[[e.x],[e.y]]);return E(r[0][0],r[1][0])}};K.$CreateMatrix=function(n,t,e){var r=Math.cos(n),o=Math.sin(n);return[[r*t,-o*e],[o*t,r*e]]},K.$GetMatrixOffset=function(n,t,e){var r=Cn.$TransformPoint(n,E(-t/2,-e/2)),o=Cn.$TransformPoint(n,E(t/2,-e/2)),i=Cn.$TransformPoint(n,E(t/2,e/2)),a=Cn.$TransformPoint(n,E(-t/2,e/2));return E(Math.min(r.x,o.x,i.x,a.x)+t/2,Math.min(r.y,o.y,i.y,a.y)+e/2)},K.$Cast=function(n,t,e,r,o,i,a){var s=t;if(n){s={};for(var u in t){var $=i[u]||1,c=o[u]||[0,1],f=(e-c[0])/c[1];f=Math.min(Math.max(f,0),1),f*=$;var l=Math.floor(f);f!=l&&(f-=l);var d,v=r[u]||r.$Default||$JssorEasing$.$EaseSwing,h=v(f),m=n[u],E=(t[u],t[u]);$Jssor$.$IsNumeric(E)?d=m+E*h:(d=$Jssor$.$Extend({$Offset:{}},n[u]),$Jssor$.$Each(E.$Offset,function(n,t){var e=n*h;d.$Offset[t]=e,d[t]+=e})),s[u]=d}(t.$Zoom||t.$Rotate)&&(s.$Transform={$Rotate:s.$Rotate||0,$Scale:s.$Zoom,$OriginalWidth:a.$OriginalWidth,$OriginalHeight:a.$OriginalHeight})}if(t.$Clip&&a.$Move){var p=s.$Clip.$Offset,g=(p.$Top||0)+(p.$Bottom||0),w=(p.$Left||0)+(p.$Right||0);s.$Left=(s.$Left||0)+w,s.$Top=(s.$Top||0)+g,s.$Clip.$Left-=w,s.$Clip.$Right-=w,s.$Clip.$Top-=g,s.$Clip.$Bottom-=g}return s.$Clip&&$Jssor$.$CanClearClip()&&!s.$Clip.$Top&&!s.$Clip.$Left&&s.$Clip.$Right==a.$OriginalWidth&&s.$Clip.$Bottom==a.$OriginalHeight&&(s.$Clip=null),s}};
