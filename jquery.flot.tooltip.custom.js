/*
 * jquery.flot.tooltip
 *
 * description: easy-to-use tooltips for Flot charts
 * version: 0.8.5
 * authors: Krzysztof Urbas @krzysu [myviews.pl],Evan Steinkerchner @Roundaround
 * website: https://github.com/krzysu/flot.tooltip
 *
 * build on 2015-06-12
 * released under MIT License, 2012
*/
!function(t){var e={tooltip:{show:!1,cssClass:"flotTip",content:"%s | X: %x | Y: %y",xDateFormat:null,yDateFormat:null,monthNames:null,dayNames:null,shifts:{x:10,y:20},defaultTheme:!0,snap:!0,lines:!1,onHover:function(t,e){},$compat:!1}}
e.tooltipOpts=e.tooltip
var i=function(t){this.tipPosition={x:0,y:0},this.init(t)}
i.prototype.init=function(e){function i(t){var i={}
i.x=t.pageX,i.y=t.pageY,e.setTooltipPosition(i)}function o(i,o,n){var a=function(t,e,i,o){return Math.sqrt((i-t)*(i-t)+(o-e)*(o-e))},p=function(t,e,i,o,s,n,p){if(!p||(p=function(t,e,i,o,s,n){if("undefined"!=typeof i)return{x:i,y:e}
if("undefined"!=typeof o)return{x:t,y:o}
var a,p=-1/((n-o)/(s-i))
return{x:a=(s*(t*p-e+o)+i*(t*-p+e-n))/(p*(s-i)+o-n),y:p*a-p*t+e}}(t,e,i,o,s,n),p.x>=Math.min(i,s)&&p.x<=Math.max(i,s)&&p.y>=Math.min(o,n)&&p.y<=Math.max(o,n))){var r=o-n,l=s-i,d=i*n-o*s
return Math.abs(r*t+l*e+d)/Math.sqrt(r*r+l*l)}var x=a(t,e,i,o),c=a(t,e,s,n)
return x>c?c:x}
if(n)e.showTooltip(n,s.tooltipOptions.snap?n:o)
else if(s.plotOptions.series.lines.show&&s.tooltipOptions.lines===!0){var r=s.plotOptions.grid.mouseActiveRadius,l={distance:r+1},d=o
e.getData()
t.each(e.getData(),function(t,i){for(var n=0,r=-1,x=1;x<i.data.length;x++)i.data[x-1][0]<=o.x&&i.data[x][0]>=o.x&&(n=x-1,r=x)
if(-1===r)return void e.hideTooltip()
var c={x:i.data[n][0],y:i.data[n][1]},f={x:i.data[r][0],y:i.data[r][1]},u=p(i.xaxis.p2c(o.x),i.yaxis.p2c(o.y),i.xaxis.p2c(c.x),i.yaxis.p2c(c.y),i.xaxis.p2c(f.x),i.yaxis.p2c(f.y),!1)
if(u<l.distance){var y=a(c.x,c.y,o.x,o.y)<a(o.x,o.y,f.x,f.y)?n:r,h=(i.datapoints.pointsize,[o.x,c.y+(f.y-c.y)*((o.x-c.x)/(f.x-c.x))]),m={datapoint:h,dataIndex:y,series:i,seriesIndex:t}
l={distance:u,item:m},s.tooltipOptions.snap&&(d={pageX:i.xaxis.p2c(h[0]),pageY:i.yaxis.p2c(h[1])})}}),l.distance<r+1?e.showTooltip(l.item,d):e.hideTooltip()}else e.hideTooltip()}var s=this,n=t.plot.plugins.length
if(this.plotPlugins=[],n)for(var a=0;n>a;a++)this.plotPlugins.push(t.plot.plugins[a].name)
e.hooks.bindEvents.push(function(e,n){if(s.plotOptions=e.getOptions(),"boolean"==typeof s.plotOptions.tooltip&&(s.plotOptions.tooltipOpts.show=s.plotOptions.tooltip,s.plotOptions.tooltip=s.plotOptions.tooltipOpts,delete s.plotOptions.tooltipOpts),s.plotOptions.tooltip.show!==!1&&"undefined"!=typeof s.plotOptions.tooltip.show){s.tooltipOptions=s.plotOptions.tooltip,s.tooltipOptions.$compat?(s.wfunc="width",s.hfunc="height"):(s.wfunc="innerWidth",s.hfunc="innerHeight")
s.getDomElement()
t(e.getPlaceholder()).bind("plothover",o),t(n).bind("mousemove",i)}}),e.hooks.shutdown.push(function(e,s){t(e.getPlaceholder()).unbind("plothover",o),t(s).unbind("mousemove",i)}),e.setTooltipPosition=function(e){var i=s.getDomElement(),o=i.outerWidth()+s.tooltipOptions.shifts.x,n=i.outerHeight()+s.tooltipOptions.shifts.y
e.x-t(window).scrollLeft()>t(window)[s.wfunc]()-o&&(e.x-=o),e.y-t(window).scrollTop()>t(window)[s.hfunc]()-n&&(e.y-=n),isNaN(e.x)?s.tipPosition.x=s.tipPosition.xPrev:(s.tipPosition.x=e.x,s.tipPosition.xPrev=e.x),isNaN(e.y)?s.tipPosition.y=s.tipPosition.yPrev:(s.tipPosition.y=e.y,s.tipPosition.yPrev=e.y)},e.showTooltip=function(t,i,o){var n=s.getDomElement(),a=s.stringFormat(s.tooltipOptions.content,t)
""!==a&&(n.html(a),e.setTooltipPosition({x:i.pageX,y:i.pageY}),n.css({left:s.tipPosition.x+s.tooltipOptions.shifts.x,top:s.tipPosition.y+s.tooltipOptions.shifts.y}).show(),"function"==typeof s.tooltipOptions.onHover&&s.tooltipOptions.onHover(t,n))},e.hideTooltip=function(){s.getDomElement().hide().html("")}},i.prototype.getDomElement=function(){var e=t("."+this.tooltipOptions.cssClass)
return 0===e.length&&(e=t("<div />").addClass(this.tooltipOptions.cssClass),e.appendTo("body").hide().css({position:"absolute"}),this.tooltipOptions.defaultTheme&&e.css({background:"#fff","z-index":"1040",padding:"0.4em 0.6em","border-radius":"0.5em","font-size":"0.8em",border:"1px solid #111",display:"none","white-space":"nowrap"})),e},i.prototype.stringFormat=function(t,e){var i,o,s,n,a,p=/%p\.{0,1}(\d{0,})/,r=/%s/,l=/%c/,d=/%lx/,x=/%ly/,c=/%x\.{0,1}(\d{0,})/,f=/%y\.{0,1}(\d{0,})/,u="%x",y="%y",h="%ct",m="%n"
if("undefined"!=typeof e.series.threshold?(i=e.datapoint[0],o=e.datapoint[1],s=e.datapoint[2]):"undefined"!=typeof e.series.curvedLines?(i=e.datapoint[0],o=e.datapoint[1]):"undefined"!=typeof e.series.lines&&e.series.lines.steps?(i=e.series.datapoints.points[2*e.dataIndex],o=e.series.datapoints.points[2*e.dataIndex+1],s=""):(i=e.series.data[e.dataIndex][0],o=e.series.data[e.dataIndex][1],s=e.series.data[e.dataIndex][2]),null===e.series.label&&e.series.originSeries&&(e.series.label=e.series.originSeries.label),"function"==typeof t&&(t=t(e.series.label,i,o,e)),"boolean"==typeof t&&!t)return""
if(s&&(t=t.replace(h,s)),"undefined"!=typeof e.series.percent?n=e.series.percent:"undefined"!=typeof e.series.percents&&(n=e.series.percents[e.dataIndex]),"number"==typeof n&&(t=this.adjustValPrecision(p,t,n)),e.series.hasOwnProperty("pie")&&(a=e.series.data[0][1]),"number"==typeof a&&(t=t.replace(m,a)),t="undefined"!=typeof e.series.label?t.replace(r,e.series.label):t.replace(r,""),t="undefined"!=typeof e.series.color?t.replace(l,e.series.color):t.replace(l,""),t=this.hasAxisLabel("xaxis",e)?t.replace(d,e.series.xaxis.options.axisLabel):t.replace(d,""),t=this.hasAxisLabel("yaxis",e)?t.replace(x,e.series.yaxis.options.axisLabel):t.replace(x,""),this.isTimeMode("xaxis",e)&&this.isXDateFormat(e)&&(t=t.replace(c,this.timestampToDate(i,this.tooltipOptions.xDateFormat,e.series.xaxis.options))),this.isTimeMode("yaxis",e)&&this.isYDateFormat(e)&&(t=t.replace(f,this.timestampToDate(o,this.tooltipOptions.yDateFormat,e.series.yaxis.options))),"number"==typeof i&&(t=this.adjustValPrecision(c,t,i)),"number"==typeof o&&(t=this.adjustValPrecision(f,t,o)),"undefined"!=typeof e.series.xaxis.ticks){var g
g=this.hasRotatedXAxisTicks(e)?"rotatedTicks":"ticks"
var v=e.dataIndex+e.seriesIndex
for(var O in e.series.xaxis[g])if(e.series.xaxis[g].hasOwnProperty(v)&&!this.isTimeMode("xaxis",e)){var b=this.isCategoriesMode("xaxis",e)?e.series.xaxis[g][v].label:e.series.xaxis[g][v].v
b===i&&(t=t.replace(c,e.series.xaxis[g][v].label))}}if("undefined"!=typeof e.series.yaxis.ticks)for(var P in e.series.yaxis.ticks)if(e.series.yaxis.ticks.hasOwnProperty(P)){var w=this.isCategoriesMode("yaxis",e)?e.series.yaxis.ticks[P].label:e.series.yaxis.ticks[P].v
w===o&&(t=t.replace(f,e.series.yaxis.ticks[P].label))}return"undefined"!=typeof e.series.xaxis.tickFormatter&&(t=t.replace(u,e.series.xaxis.tickFormatter(i,e.series.xaxis).replace(/\$/g,"$$"))),"undefined"!=typeof e.series.yaxis.tickFormatter&&(t=t.replace(y,e.series.yaxis.tickFormatter(o,e.series.yaxis).replace(/\$/g,"$$"))),t},i.prototype.isTimeMode=function(t,e){return"undefined"!=typeof e.series[t].options.mode&&"time"===e.series[t].options.mode},i.prototype.isXDateFormat=function(t){return"undefined"!=typeof this.tooltipOptions.xDateFormat&&null!==this.tooltipOptions.xDateFormat},i.prototype.isYDateFormat=function(t){return"undefined"!=typeof this.tooltipOptions.yDateFormat&&null!==this.tooltipOptions.yDateFormat},i.prototype.isCategoriesMode=function(t,e){return"undefined"!=typeof e.series[t].options.mode&&"categories"===e.series[t].options.mode},i.prototype.timestampToDate=function(e,i,o){var s=t.plot.dateGenerator(e,o)
return t.plot.formatDate(s,i,this.tooltipOptions.monthNames,this.tooltipOptions.dayNames)},i.prototype.adjustValPrecision=function(t,e,i){var o,s=e.match(t)
return null!==s&&""!==RegExp.$1&&(o=RegExp.$1,i=i.toFixed(o),e=e.replace(t,i)),e},i.prototype.hasAxisLabel=function(e,i){return-1!==t.inArray("axisLabels",this.plotPlugins)&&"undefined"!=typeof i.series[e].options.axisLabel&&i.series[e].options.axisLabel.length>0},i.prototype.hasRotatedXAxisTicks=function(e){return-1!==t.inArray("tickRotor",this.plotPlugins)&&"undefined"!=typeof e.series.xaxis.rotatedTicks}
var o=function(t){new i(t)}
t.plot.plugins.push({init:o,options:e,name:"tooltip",version:"0.8.5"})}(jQuery)
