<?php
/** Adminer - Compact database management
* @link http://www.adminer.org/
* @author Jakub Vrana, http://www.vrana.cz/
* @copyright 2007 Jakub Vrana
* @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 3.3.3
*/

error_reporting(6135);
$ac=(!ereg('^(unsafe_raw)?$',ini_get("filter.default")));

if($ac||ini_get("filter.default_flags")){
	foreach(array('_GET','_POST','_COOKIE','_SERVER') as $W){
		$Pf=filter_input_array(constant("INPUT$W"),FILTER_UNSAFE_RAW);
		if($Pf){$$W=$Pf;}
	}
}

if(isset($_GET["file"])){
	header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");
	if($_GET["file"]=="favicon.ico"){
		header("Content-Type: image/x-icon");
echo base64_decode("AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA////AAAA/wBhTgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAERERAAAAAAETMzEQAAAAATERExAAAAABMRETEAAAAAExERMQAAAAATERExAAAAABMRETEAAAAAEzMzMREREQATERExEhEhABEzMxEhEREAAREREhERIRAAAAARIRESEAAAAAESEiEQAAAAABEREQAAAAAAAAAAD//9UAwP/VAIB/AACAf/AAgH+kAIB/gACAfwAAgH8AAIABAACAAf8AgAH/AMAA/wD+AP8A/wAIAf+B1QD//9UA");
	}elseif($_GET["file"]=="default.css"){
		header("Content-Type: text/css; charset=utf-8");
echo 'body{color:#000;background:#fff;font:90%/1.25 Verdana,Arial,Helvetica,sans-serif;margin:0;}
a{color:blue;}
a:visited{color:navy;}
a:hover{color:red;}
h1{font-size:150%;margin:0;padding:.8em 1em;border-bottom:1px solid #999;font-weight:normal;color:#777;background:#eee;}
h2{font-size:150%;margin:0 0 20px -18px;padding:.8em 1em;border-bottom:1px solid #000;color:#000;font-weight:normal;background:#ddf;}
h3{font-weight:normal;font-size:130%;margin:1em 0 0;}
form{margin:0;}
table{margin:1em 20px 0 0;border:0;border-top:1px solid #999;border-left:1px solid #999;font-size:90%;}
td,th{border:0;border-right:1px solid #999;border-bottom:1px solid #999;padding:.2em .3em;}
th{background:#eee;text-align:left;}
thead th{text-align:center;}
thead td,thead th{background:#ddf;}
fieldset{display:inline;vertical-align:top;padding:.5em .8em;margin:.8em .5em 0 0;border:1px solid #999;}
p{margin:.8em 20px 0 0;}
img{vertical-align:middle;border:0;}
td img{max-width:200px;max-height:200px;}
code{background:#eee;}
tbody tr:hover td,tbody tr:hover th{background:#eee;}
pre{margin:1em 0 0;}
input[type=image]{vertical-align:middle;}
.version{color:#777;font-size:67%;}
.js .hidden,.nojs .jsonly{display:none;}
.nowrap td,.nowrap th,td.nowrap{white-space:pre;}
.wrap td{white-space:normal;}
.error{color:red;background:#fee;}
.error b{background:#fff;font-weight:normal;}
.message{color:green;background:#efe;}
.error,.message{padding:.5em .8em;margin:1em 20px 0 0;}
.char{color:#007F00;}
.date{color:#7F007F;}
.enum{color:#007F7F;}
.binary{color:red;}
.odd td{background:#F5F5F5;}
.js .checked td,.js .checked th{background:#ddf;}
.time{color:silver;font-size:70%;}
.function{text-align:right;}
.number{text-align:right;}
.datetime{text-align:right;}
.type{width:15ex;width:auto\\9;}
.options select{width:20ex;width:auto\\9;}
.active{font-weight:bold;}
.sqlarea{width:98%;}
#menu{position:absolute;margin:10px 0 0;padding:0 0 30px 0;top:2em;left:0;width:19em;overflow:auto;overflow-y:hidden;white-space:nowrap;}
#menu p{padding:.8em 1em;margin:0;border-bottom:1px solid #ccc;}
#content{margin:2em 0 0 21em;padding:10px 20px 20px 0;}
#lang{position:absolute;top:0;left:0;line-height:1.8em;padding:.3em 1em;}
#breadcrumb{white-space:nowrap;position:absolute;top:0;left:21em;background:#eee;height:2em;line-height:1.8em;padding:0 1em;margin:0 0 0 -18px;}
#loader{position:fixed;top:0;left:18em;z-index:1;}
#h1{color:#777;text-decoration:none;font-style:italic;}
#version{font-size:67%;color:red;}
#schema{margin-left:60px;position:relative;}
#schema .table{border:1px solid silver;padding:0 2px;cursor:move;position:absolute;}
#schema .references{position:absolute;}
.rtl h2{margin:0 -18px 20px 0;}
.rtl p,.rtl table,.rtl .error,.rtl .message{margin:1em 0 0 20px;}
.rtl #content{margin:2em 21em 0 0;padding:10px 0 20px 20px;}
.rtl #breadcrumb{left:auto;right:21em;margin:0 -18px 0 0;}
.rtl #lang,.rtl #menu{left:auto;right:0;}
@media print{
	#lang,#menu{display:none;}
	#content{margin-left:1em;}
	#breadcrumb{left:1em;}
	.nowrap td,.nowrap th,td.nowrap{white-space:normal;}
}';
	}elseif($_GET["file"]=="functions.js"){
		header("Content-Type: text/javascript; charset=utf-8");
?>
function toggle(id){var el=document.getElementById(id);el.className=(el.className=='hidden'?'':'hidden');return true;}
function cookie(assign,days){var date=new Date();date.setDate(date.getDate()+days);document.cookie=assign+'; expires='+date;}
function verifyVersion(){cookie('adminer_version=0',1);var script=document.createElement('script');script.src=location.protocol+'//www.adminer.org/version.php';document.body.appendChild(script);}
function selectValue(select){var selected=select.options[select.selectedIndex];return((selected.attributes.value||{}).specified?selected.value:selected.text);}
function trCheck(el){var tr=el.parentNode.parentNode;tr.className=tr.className.replace(/(^|\s)checked(\s|$)/,'$2')+(el.checked?' checked':'');}
function formCheck(el,name){var elems=el.form.elements;for(var i=0;i<elems.length;i++){if(name.test(elems[i].name)){elems[i].checked=el.checked;trCheck(elems[i]);}}}
function tableCheck(){var tables=document.getElementsByTagName('table');for(var i=0;i<tables.length;i++){if(/(^|\s)checkable(\s|$)/.test(tables[i].className)){var trs=tables[i].getElementsByTagName('tr');for(var j=0;j<trs.length;j++){trCheck(trs[j].firstChild.firstChild);}}}}
function formUncheck(id){var el=document.getElementById(id);el.checked=false;trCheck(el);}
function formChecked(el,name){var checked=0;var elems=el.form.elements;for(var i=0;i<elems.length;i++){if(name.test(elems[i].name)&&elems[i].checked){checked++;}}
return checked;}
function tableClick(event){var click=true;var el=event.target||event.srcElement;while(!/^tr$/i.test(el.tagName)){if(/^table$/i.test(el.tagName)){return;}
if(/^(a|input|textarea)$/i.test(el.tagName)){click=false;}
el=el.parentNode;}
el=el.firstChild.firstChild;if(click){el.click&&el.click();el.onclick&&el.onclick();}
trCheck(el);}
function setHtml(id,html){var el=document.getElementById(id);if(el){if(html==undefined){el.parentNode.innerHTML='&nbsp;';}else{el.innerHTML=html;}}}
function nodePosition(el){var pos=0;while(el=el.previousSibling){pos++;}
return pos;}
function pageClick(href,page,event){if(!isNaN(page)&&page){href+=(page!=1?'&page='+(page-1):'');if(!ajaxSend(href)){location.href=href;}}}
function selectAddRow(field){field.onchange=function(){};var row=field.parentNode.cloneNode(true);var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/[a-z]\[\d+/,'$&1');selects[i].selectedIndex=0;}
var inputs=row.getElementsByTagName('input');if(inputs.length){inputs[0].name=inputs[0].name.replace(/[a-z]\[\d+/,'$&1');inputs[0].value='';inputs[0].className='';}
field.parentNode.parentNode.appendChild(row);}
function bodyKeydown(event,button){var target=event.target||event.srcElement;if(event.ctrlKey&&(event.keyCode==13||event.keyCode==10)&&!event.altKey&&!event.metaKey&&/select|textarea|input/i.test(target.tagName)){target.blur();if(!ajaxForm(target.form,(button?button+'=1':''))){if(button){target.form[button].click();}else{target.form.submit();}}
return false;}
return true;}
function editingKeydown(event){if((event.keyCode==40||event.keyCode==38)&&event.ctrlKey&&!event.altKey&&!event.metaKey){var target=event.target||event.srcElement;var sibling=(event.keyCode==40?'nextSibling':'previousSibling');var el=target.parentNode.parentNode[sibling];if(el&&(/^tr$/i.test(el.tagName)||(el=el[sibling]))&&/^tr$/i.test(el.tagName)&&(el=el.childNodes[nodePosition(target.parentNode)])&&(el=el.childNodes[nodePosition(target)])){el.focus();}
return false;}
if(event.shiftKey&&!bodyKeydown(event,'insert')){eventStop(event);return false;}
return true;}
function functionChange(select){var input=select.form[select.name.replace(/^function/,'fields')];if(selectValue(select)){if(input.origMaxLength===undefined){input.origMaxLength=input.maxLength;}
input.removeAttribute('maxlength');}else if(input.origMaxLength>=0){input.maxLength=input.origMaxLength;}}
function ajax(url,callback,data){var xmlhttp=(window.XMLHttpRequest?new XMLHttpRequest():(window.ActiveXObject?new ActiveXObject('Microsoft.XMLHTTP'):false));if(xmlhttp){xmlhttp.open((data?'POST':'GET'),url);if(data){xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');}
xmlhttp.setRequestHeader('X-Requested-With','XMLHttpRequest');xmlhttp.onreadystatechange=function(){if(xmlhttp.readyState==4){callback(xmlhttp);}};xmlhttp.send(data);}
return xmlhttp;}
function ajaxSetHtml(url){return ajax(url,function(xmlhttp){if(xmlhttp.status){var data=eval('('+xmlhttp.responseText+')');for(var key in data){setHtml(key,data[key]);}}});}
var originalFavicon;function replaceFavicon(href){var favicon=document.getElementById('favicon');if(favicon){favicon.href=href;favicon.parentNode.appendChild(favicon);}}
var ajaxState=0;function ajaxSend(url,data,popState,noscroll){if(!history.pushState){return false;}
var currentState=++ajaxState;onblur=function(){if(!originalFavicon){originalFavicon=(document.getElementById('favicon')||{}).href;}
replaceFavicon(location.pathname+'?file=loader.gif&amp;version=3.3.3');};setHtml('loader','<img src="'+location.pathname+'?file=loader.gif&amp;version=3.3.3" alt="">');return ajax(url,function(xmlhttp){if(currentState==ajaxState){var title=xmlhttp.getResponseHeader('X-AJAX-Title');if(title){document.title=decodeURIComponent(title);}
var redirect=xmlhttp.getResponseHeader('X-AJAX-Redirect');if(redirect){return ajaxSend(redirect,'',popState);}
onblur=function(){};if(originalFavicon){replaceFavicon(originalFavicon);}
if(!xmlhttp.status){setHtml('loader','');}else{if(!popState){if(data||url!=location.href){history.pushState(data,'',url);}}
if(!noscroll&&!/&order/.test(url)){scrollTo(0,0);}
setHtml('content',xmlhttp.responseText);var content=document.getElementById('content');var scripts=content.getElementsByTagName('script');var length=scripts.length;for(var i=0;i<length;i++){var script=document.createElement('script');script.text=scripts[i].text;content.appendChild(script);}
var as=document.getElementById('menu').getElementsByTagName('a');var href=location.href.replace(/(&(sql=|dump=|(select|table)=[^&]*)).*/,'$1');for(var i=0;i<as.length;i++){as[i].className=(href==as[i].href?'active':'');}
var dump=document.getElementById('dump');if(dump){var match=/&(select|table)=([^&]+)/.exec(href);dump.href=dump.href.replace(/[^=]+$/,'')+(match?match[2]:'');}
if(window.jush){jush.highlight_tag('code',0);}}}},data);}
onpopstate=function(event){if((ajaxState||event.state)&&!/#/.test(location.href)){ajaxSend(location.href,(event.state&&confirm(areYouSure)?event.state:''),1);}else{ajaxState++;}};function ajaxForm(form,data,noscroll){if((/&(database|scheme|create|view|sql|user|dump|call)=/.test(location.href)&&!/\./.test(data))||(form.onsubmit&&form.onsubmit()===false)){return false;}
var params=[];for(var i=0;i<form.elements.length;i++){var el=form.elements[i];if(/file/i.test(el.type)&&el.value){return false;}else if(el.name&&(!/checkbox|radio|submit|file/i.test(el.type)||el.checked)){params.push(encodeURIComponent(el.name)+'='+encodeURIComponent(/select/i.test(el.tagName)?selectValue(el):el.value));}}
if(data){params.push(data);}
if(form.method=='post'){return ajaxSend((/\?/.test(form.action)?form.action:location.href),params.join('&'),false,noscroll);}
return ajaxSend((form.action||location.href).replace(/\?.*/,'')+'?'+params.join('&'),'',false,noscroll);}
function selectDblClick(td,event,text){if(/input|textarea/i.test(td.firstChild.tagName)){return;}
var original=td.innerHTML;var input=document.createElement(text?'textarea':'input');input.onkeydown=function(event){if(!event){event=window.event;}
if(event.keyCode==27&&!(event.ctrlKey||event.shiftKey||event.altKey||event.metaKey)){td.innerHTML=original;}};var pos=event.rangeOffset;var value=td.firstChild.alt||td.textContent||td.innerText;input.style.width=Math.max(td.clientWidth-14,20)+'px';if(text){var rows=1;value.replace(/\n/g,function(){rows++;});input.rows=rows;}
if(value=='\u00A0'||td.getElementsByTagName('i').length){value='';}
if(document.selection){var range=document.selection.createRange();range.moveToPoint(event.clientX,event.clientY);var range2=range.duplicate();range2.moveToElementText(td);range2.setEndPoint('EndToEnd',range);pos=range2.text.length;}
td.innerHTML='';td.appendChild(input);input.focus();if(text==2){return ajax(location.href+'&'+encodeURIComponent(td.id)+'=',function(xmlhttp){if(xmlhttp.status){input.value=xmlhttp.responseText;input.name=td.id;}});}
input.value=value;input.name=td.id;input.selectionStart=pos;input.selectionEnd=pos;if(document.selection){var range=document.selection.createRange();range.moveEnd('character',-input.value.length+pos);range.select();}}
function bodyClick(event,db,ns){if(event.button||event.ctrlKey||event.shiftKey||event.altKey||event.metaKey){return;}
if(event.getPreventDefault?event.getPreventDefault():event.returnValue===false||event.defaultPrevented){return false;}
var el=event.target||event.srcElement;if(/^a$/i.test(el.parentNode.tagName)){el=el.parentNode;}
if(/^a$/i.test(el.tagName)&&!/:|#|&download=/i.test(el.getAttribute('href'))&&/[&?]username=/.test(el.href)){var match=/&db=([^&]*)/.exec(el.href);var match2=/&ns=([^&]*)/.exec(el.href);return!(db==(match?match[1]:'')&&ns==(match2?match2[1]:'')&&ajaxSend(el.href));}
if(/^input$/i.test(el.tagName)&&/image|submit/.test(el.type)){return!ajaxForm(el.form,(el.name?encodeURIComponent(el.name)+(el.type=='image'?'.x':'')+'=1':''),el.type=='image');}
return true;}
function eventStop(event){if(event.stopPropagation){event.stopPropagation();}else{event.cancelBubble=true;}}
var jushRoot=location.protocol + '//www.adminer.org/static/';function bodyLoad(version){if(history.state!==undefined){onpopstate(history);}
if(jushRoot){var script=document.createElement('script');script.src=jushRoot+'jush.js';script.onload=function(){if(window.jush){jush.create_links=' target="_blank" rel="noreferrer"';jush.urls.sql_sqlset=jush.urls.sql[0]=jush.urls.sqlset[0]=jush.urls.sqlstatus[0]='http://dev.mysql.com/doc/refman/'+version+'/en/$key';var pgsql='http://www.postgresql.org/docs/'+version+'/static/';jush.urls.pgsql_pgsqlset=jush.urls.pgsql[0]=pgsql+'$key';jush.urls.pgsqlset[0]=pgsql+'runtime-config-$key.html#GUC-$1';jush.style(jushRoot+'jush.css');if(window.jushLinks){jush.custom_links=jushLinks;}
jush.highlight_tag('code',0);}};script.onreadystatechange=function(){if(/^(loaded|complete)$/.test(script.readyState)){script.onload();}};document.body.appendChild(script);}}
function formField(form,name){for(var i=0;i<form.length;i++){if(form[i].name==name){return form[i];}}}
function typePassword(el,disable){try{el.type=(disable?'text':'password');}catch(e){}}
function loginDriver(driver){var trs=driver.parentNode.parentNode.parentNode.rows;for(var i=1;i<trs.length;i++){trs[i].className=(/sqlite/.test(driver.value)?'hidden':'');}}
function textareaKeydown(target,event){if(!event.shiftKey&&!event.altKey&&!event.ctrlKey&&!event.metaKey){if(event.keyCode==9){if(target.setSelectionRange){var start=target.selectionStart;var scrolled=target.scrollTop;target.value=target.value.substr(0,start)+'\t'+target.value.substr(target.selectionEnd);target.setSelectionRange(start+1,start+1);target.scrollTop=scrolled;return false;}else if(target.createTextRange){document.selection.createRange().text='\t';return false;}}
if(event.keyCode==27){var els=target.form.elements;for(var i=1;i<els.length;i++){if(els[i-1]==target){els[i].focus();break;}}
return false;}}
return true;}
var added='.',rowCount;function delimiterEqual(val,a,b){return(val==a+'_'+b||val==a+b||val==a+b.charAt(0).toUpperCase()+b.substr(1));}
function idfEscape(s){return s.replace(/`/,'``');}
function editingNameChange(field){var name=field.name.substr(0,field.name.length-7);var type=formField(field.form,name+'[type]');var opts=type.options;var candidate;var val=field.value;for(var i=opts.length;i--;){var match=/(.+)`(.+)/.exec(opts[i].value);if(!match){if(candidate&&i==opts.length-2&&val==opts[candidate].value.replace(/.+`/,'')&&name=='fields[1]'){return;}
break;}
var table=match[1];var column=match[2];var tables=[table,table.replace(/s$/,''),table.replace(/es$/,'')];for(var j=0;j<tables.length;j++){table=tables[j];if(val==column||val==table||delimiterEqual(val,table,column)||delimiterEqual(val,column,table)){if(candidate){return;}
candidate=i;break;}}}
if(candidate){type.selectedIndex=candidate;type.onchange();}}
function editingAddRow(button,allowed,focus){if(allowed&&rowCount>=allowed){return false;}
var match=/(\d+)(\.\d+)?/.exec(button.name);var x=match[0]+(match[2]?added.substr(match[2].length):added)+'1';var row=button.parentNode.parentNode;var row2=row.cloneNode(true);var tags=row.getElementsByTagName('select');var tags2=row2.getElementsByTagName('select');for(var i=0;i<tags.length;i++){tags2[i].name=tags[i].name.replace(/([0-9.]+)/,x);tags2[i].selectedIndex=tags[i].selectedIndex;}
tags=row.getElementsByTagName('input');tags2=row2.getElementsByTagName('input');var input=tags2[0];for(var i=0;i<tags.length;i++){if(tags[i].name=='auto_increment_col'){tags2[i].value=x;tags2[i].checked=false;}
tags2[i].name=tags[i].name.replace(/([0-9.]+)/,x);if(/\[(orig|field|comment|default)/.test(tags[i].name)){tags2[i].value='';}
if(/\[(has_default)/.test(tags[i].name)){tags2[i].checked=false;}}
tags[0].onchange=function(){editingNameChange(tags[0]);};row.parentNode.insertBefore(row2,row.nextSibling);if(focus){input.onchange=function(){editingNameChange(input);};input.focus();}
added+='0';rowCount++;return true;}
function editingRemoveRow(button){var field=formField(button.form,button.name.replace(/drop_col(.+)/,'fields$1[field]'));field.parentNode.removeChild(field);button.parentNode.parentNode.style.display='none';return true;}
var lastType='';function editingTypeChange(type){var name=type.name.substr(0,type.name.length-6);var text=selectValue(type);for(var i=0;i<type.form.elements.length;i++){var el=type.form.elements[i];if(el.name==name+'[length]'&&!((/(char|binary)$/.test(lastType)&&/(char|binary)$/.test(text))||(/(enum|set)$/.test(lastType)&&/(enum|set)$/.test(text)))){el.value='';}
if(lastType=='timestamp'&&el.name==name+'[has_default]'&&/timestamp/i.test(formField(type.form,name+'[default]').value)){el.checked=false;}
if(el.name==name+'[collation]'){el.className=(/(char|text|enum|set)$/.test(text)?'':'hidden');}
if(el.name==name+'[unsigned]'){el.className=(/(int|float|double|decimal)$/.test(text)?'':'hidden');}
if(el.name==name+'[on_delete]'){el.className=(/`/.test(text)?'':'hidden');}}}
function editingLengthFocus(field){var td=field.parentNode;if(/(enum|set)$/.test(selectValue(td.previousSibling.firstChild))){var edit=document.getElementById('enum-edit');var val=field.value;edit.value=(/^'.+','.+'$/.test(val)?val.substr(1,val.length-2).replace(/','/g,"\n").replace(/''/g,"'"):val);td.appendChild(edit);field.style.display='none';edit.style.display='inline';edit.focus();}}
function editingLengthBlur(edit){var field=edit.parentNode.firstChild;var val=edit.value;field.value=(/\n/.test(val)?"'"+val.replace(/\n+$/,'').replace(/'/g,"''").replace(/\n/g,"','")+"'":val);field.style.display='inline';edit.style.display='none';}
function columnShow(checked,column){var trs=document.getElementById('edit-fields').getElementsByTagName('tr');for(var i=0;i<trs.length;i++){trs[i].getElementsByTagName('td')[column].className=(checked?'':'hidden');}}
function partitionByChange(el){var partitionTable=/RANGE|LIST/.test(selectValue(el));el.form['partitions'].className=(partitionTable||!el.selectedIndex?'hidden':'');document.getElementById('partition-table').className=(partitionTable?'':'hidden');}
function partitionNameChange(el){var row=el.parentNode.parentNode.cloneNode(true);row.firstChild.firstChild.value='';el.parentNode.parentNode.parentNode.appendChild(row);el.onchange=function(){};}
function foreignAddRow(field){field.onchange=function(){};var row=field.parentNode.parentNode.cloneNode(true);var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/\]/,'1$&');selects[i].selectedIndex=0;}
field.parentNode.parentNode.parentNode.appendChild(row);}
function indexesAddRow(field){field.onchange=function(){};var parent=field.parentNode.parentNode;var row=parent.cloneNode(true);var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/indexes\[\d+/,'$&1');selects[i].selectedIndex=0;}
var inputs=row.getElementsByTagName('input');for(var i=0;i<inputs.length;i++){inputs[i].name=inputs[i].name.replace(/indexes\[\d+/,'$&1');inputs[i].value='';}
parent.parentNode.appendChild(row);}
function indexesChangeColumn(field,prefix){var columns=field.parentNode.parentNode.getElementsByTagName('select');var names=[];for(var i=0;i<columns.length;i++){var value=selectValue(columns[i]);if(value){names.push(value);}}
field.form[field.name.replace(/\].*/,'][name]')].value=prefix+names.join('_');}
function indexesAddColumn(field,prefix){field.onchange=function(){indexesChangeColumn(field,prefix);};var select=field.form[field.name.replace(/\].*/,'][type]')];if(!select.selectedIndex){select.selectedIndex=3;select.onchange();}
var column=field.parentNode.cloneNode(true);select=column.getElementsByTagName('select')[0];select.name=select.name.replace(/\]\[\d+/,'$&1');select.selectedIndex=0;var input=column.getElementsByTagName('input')[0];input.name=input.name.replace(/\]\[\d+/,'$&1');input.value='';field.parentNode.parentNode.appendChild(column);field.onchange();}
var that,x,y,em,tablePos;function schemaMousedown(el,event){that=el;x=event.clientX-el.offsetLeft;y=event.clientY-el.offsetTop;}
function schemaMousemove(ev){if(that!==undefined){ev=ev||event;var left=(ev.clientX-x)/em;var top=(ev.clientY-y)/em;var divs=that.getElementsByTagName('div');var lineSet={};for(var i=0;i<divs.length;i++){if(divs[i].className=='references'){var div2=document.getElementById((divs[i].id.substr(0,4)=='refs'?'refd':'refs')+divs[i].id.substr(4));var ref=(tablePos[divs[i].title]?tablePos[divs[i].title]:[div2.parentNode.offsetTop/em,0]);var left1=-1;var isTop=true;var id=divs[i].id.replace(/^ref.(.+)-.+/,'$1');if(divs[i].parentNode!=div2.parentNode){left1=Math.min(0,ref[1]-left)-1;divs[i].style.left=left1+'em';divs[i].getElementsByTagName('div')[0].style.width=-left1+'em';var left2=Math.min(0,left-ref[1])-1;div2.style.left=left2+'em';div2.getElementsByTagName('div')[0].style.width=-left2+'em';isTop=(div2.offsetTop+ref[0]*em>divs[i].offsetTop+top*em);}
if(!lineSet[id]){var line=document.getElementById(divs[i].id.replace(/^....(.+)-\d+$/,'refl$1'));var shift=ev.clientY-y-that.offsetTop;line.style.left=(left+left1)+'em';if(isTop){line.style.top=(line.offsetTop+shift)/em+'em';}
if(divs[i].parentNode!=div2.parentNode){line=line.getElementsByTagName('div')[0];line.style.height=(line.offsetHeight+(isTop?-1:1)*shift)/em+'em';}
lineSet[id]=true;}}}
that.style.left=left+'em';that.style.top=top+'em';}}
function schemaMouseup(ev,db){if(that!==undefined){ev=ev||event;tablePos[that.firstChild.firstChild.firstChild.data]=[(ev.clientY-y)/em,(ev.clientX-x)/em];that=undefined;var s='';for(var key in tablePos){s+='_'+key+':'+Math.round(tablePos[key][0]*10000)/10000+'x'+Math.round(tablePos[key][1]*10000)/10000;}
s=encodeURIComponent(s.substr(1));var link=document.getElementById('schema-link');link.href=link.href.replace(/[^=]+$/,'')+s;cookie('adminer_schema-'+db+'='+s,30);}}<?php
	}else{
		header("Content-Type: image/gif");
		switch($_GET["file"]){
		case"plus.gif":echo base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIYSPqcvtD00I8cwqKb5v+q8pIAhxlRmhZYi17iPE8kzLBQA7");break;
		case"cross.gif":echo base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACI4SPqcvtDyMKYdZGb355wy6BX3dhlOEx57FK7gtHwkzXNl0AADs=");break;
		case"up.gif":echo base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIISPqcvtD00IUU4K730T9J5hFTiKEXmaYcW2rgDH8hwXADs=");break;
		case"down.gif":echo base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIISPqcvtD00I8cwqKb5bV/5cosdMJtmcHca2lQDH8hwXADs=");break;
		case"arrow.gif":echo base64_decode("R0lGODlhCAAKAIAAAICAgP///yH5BAEAAAEALAAAAAAIAAoAAAIPBIJplrGLnpQRqtOy3rsAADs=");break;
		case"loader.gif":echo base64_decode("R0lGODlhEAAQAPIAAP///wAAAMLCwkJCQgAAAGJiYoKCgpKSkiH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJCgAAACwAAAAAEAAQAAADMwi63P4wyklrE2MIOggZnAdOmGYJRbExwroUmcG2LmDEwnHQLVsYOd2mBzkYDAdKa+dIAAAh+QQJCgAAACwAAAAAEAAQAAADNAi63P5OjCEgG4QMu7DmikRxQlFUYDEZIGBMRVsaqHwctXXf7WEYB4Ag1xjihkMZsiUkKhIAIfkECQoAAAAsAAAAABAAEAAAAzYIujIjK8pByJDMlFYvBoVjHA70GU7xSUJhmKtwHPAKzLO9HMaoKwJZ7Rf8AYPDDzKpZBqfvwQAIfkECQoAAAAsAAAAABAAEAAAAzMIumIlK8oyhpHsnFZfhYumCYUhDAQxRIdhHBGqRoKw0R8DYlJd8z0fMDgsGo/IpHI5TAAAIfkECQoAAAAsAAAAABAAEAAAAzIIunInK0rnZBTwGPNMgQwmdsNgXGJUlIWEuR5oWUIpz8pAEAMe6TwfwyYsGo/IpFKSAAAh+QQJCgAAACwAAAAAEAAQAAADMwi6IMKQORfjdOe82p4wGccc4CEuQradylesojEMBgsUc2G7sDX3lQGBMLAJibufbSlKAAAh+QQJCgAAACwAAAAAEAAQAAADMgi63P7wCRHZnFVdmgHu2nFwlWCI3WGc3TSWhUFGxTAUkGCbtgENBMJAEJsxgMLWzpEAACH5BAkKAAAALAAAAAAQABAAAAMyCLrc/jDKSatlQtScKdceCAjDII7HcQ4EMTCpyrCuUBjCYRgHVtqlAiB1YhiCnlsRkAAAOwAAAAAAAAAAAA==");break;
		}
	}
	exit;
}
function connection(){global$g;return$g;}
function adminer(){global$b;return$b;}
function idf_unescape($r){$Oc=substr($r,-1);return str_replace($Oc.$Oc,$Oc,substr($r,1,-1));}
function escape_string($W){return substr(q($W),1,-1);}
function remove_slashes($qe,$ac=false){if(get_magic_quotes_gpc()){while(list($v,$W)=each($qe)){foreach($W
as$Kc=>$V){unset($qe[$v][$Kc]);if(is_array($V)){$qe[$v][stripslashes($Kc)]=$V;$qe[]=&$qe[$v][stripslashes($Kc)];}else{$qe[$v][stripslashes($Kc)]=($ac?$V:stripslashes($V));}}}}}
function bracket_escape($r,$Ba=false){static$Ef=array(':'=>':1',']'=>':2','['=>':3');return strtr($r,($Ba?array_flip($Ef):$Ef));}
function h($L){return htmlspecialchars(str_replace("\0","",$L),ENT_QUOTES);}
function nbsp($L){return(trim($L)!=""?h($L):"&nbsp;");}
function nl_br($L){return str_replace("\n","<br>",$L);}
function checkbox($_,$X,$La,$Mc="",$Dd="",$Jc=false){
	static $q=0;$q++;$F="<input type='checkbox' name='$_' value='".h($X)."'".($La?" checked":"").($Dd?' onclick="'.h($Dd).'"':'').($Jc?" class='jsonly'":"")." id='checkbox-$q'>";
	return($Mc!=""?"<label for='checkbox-$q'>$F".h($Mc)."</label>":$F);
}
function optionlist($Hd,$Pe=null,$Uf=false){
	$F="";
	foreach($Hd as$Kc=>$V){
	$Id=array($Kc=>$V);
	if(is_array($V)){$F.='<optgroup label="'.h($Kc).'">';$Id=$V;}
	foreach($Id as$v=>$W){
	$F.='<option'.($Uf||is_string($v)?' value="'.h($v).'"':'').(($Uf||is_string($v)?(string)$v:$W)===$Pe?' selected':'').'>'.h($W);}
	if(is_array($V)){$F.='</optgroup>';}
	}
	return$F;
}
function html_select($_,$Hd,$X="",$Cd=true){
	if($Cd){return"<select name='".h($_)."'".(is_string($Cd)?' onchange="'.h($Cd).'"':"").">".optionlist($Hd,$X)."</select>";}
	$F="";
	foreach($Hd as$v=>$W){
		$F.="<label><input type='radio' name='".h($_)."' value='".h($v)."'".($v==$X?" checked":"").">".h($W)."</label>";
	}
	return$F;
}
function confirm($bb="",$cf=false){return" onclick=\"".($cf?"eventStop(event); ":"")."return confirm('".lang(0).($bb?" (' + $bb + ')":"")."');\"";}
function print_fieldset($q,$Tc,$ag=false,$Dd=""){echo"<fieldset><legend><a href='#fieldset-$q' onclick=\"".h($Dd)."return !toggle('fieldset-$q');\">$Tc</a></legend><div id='fieldset-$q'".($ag?"":" class='hidden'").">\n";}
function bold($Ga){return($Ga?" class='active'":"");}
function odd($F=' class="odd"'){static$p=0;if(!$F){$p=-1;}return($p++%2?$F:'');}
function js_escape($L){return addcslashes($L,"\r\n'\\/");}
function json_row($v,$W=null){static$bc=true;if($bc){echo"{";}if($v!=""){echo($bc?"":",")."\n\t\"".addcslashes($v,"\r\n\"\\").'": '.(isset($W)?'"'.addcslashes($W,"\r\n\"\\").'"':'undefined');$bc=false;}else{echo"\n}\n";$bc=true;}}
function ini_bool($Bc){$W=ini_get($Bc);return(eregi('^(on|true|yes)$',$W)||(int)$W);}
function sid(){static$F;if(!isset($F)){$F=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));}return$F;}
function q($L){global$g;return$g->quote($L);}
function get_vals($D,$e=0){global$g;$F=array();$E=$g->query($D);if(is_object($E)){while($G=$E->fetch_row()){$F[]=$G[$e];}}return$F;}
function get_key_vals($D,$h=null){global$g;if(!is_object($h)){$h=$g;}$F=array();$E=$h->query($D);if(is_object($E)){while($G=$E->fetch_row()){$F[$G[0]]=$G[1];}}return$F;}
function get_rows($D,$h=null,$k="<p class='error'>"){
	global$g;
	if(!is_object($h)){$h=$g;}$F=array();$E=$h->query($D);
	if(is_object($E)){
		while($G=$E->fetch_assoc()){$F[]=$G;}
	}elseif(!$E&&$g->error&&$k&&defined("PAGE_HEADER")){
		echo$k.error()."\n";
	}
	return$F;
}
function unique_array($G,$t){foreach($t
as$s){if(ereg("PRIMARY|UNIQUE",$s["type"])){$F=array();foreach($s["columns"]as$v){if(!isset($G[$v])){continue
2;}$F[$v]=$G[$v];}return$F;}}$F=array();foreach($G
as$v=>$W){if(!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~',$v)){$F[$v]=$W;}}return$F;}
function where($Z){global$u;$F=array();foreach((array)$Z["where"]as$v=>$W){$F[]=idf_escape(bracket_escape($v,1)).(ereg('\\.',$W)||$u=="mssql"?" LIKE ".exact_value(addcslashes($W,"%_\\")):" = ".exact_value($W));}foreach((array)$Z["null"]as$v){$F[]=idf_escape($v)." IS NULL";}return
implode(" AND ",$F);}
function where_check($W){parse_str($W,$Ka);remove_slashes(array(&$Ka));return where($Ka);}
function where_link($p,$e,$X,$Ed="="){return"&where%5B$p%5D%5Bcol%5D=".urlencode($e)."&where%5B$p%5D%5Bop%5D=".urlencode((isset($X)?$Ed:"IS NULL"))."&where%5B$p%5D%5Bval%5D=".urlencode($X);}
function cookie($_,$X){global$ba;$Vd=array($_,(ereg("\n",$X)?"":$X),time()+2592000,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$ba);if(version_compare(PHP_VERSION,'5.2.0')>=0){$Vd[]=true;}return
call_user_func_array('setcookie',$Vd);}
function restart_session(){if(!ini_bool("session.use_cookies")){session_start();}}
function &get_session($v){return$_SESSION[$v][DRIVER][SERVER][$_GET["username"]];}
function 
set_session($v,$W){$_SESSION[$v][DRIVER][SERVER][$_GET["username"]]=$W;}
function auth_url($sb,$J,$U){global$tb;preg_match('~([^?]*)\\??(.*)~',remove_from_uri(implode("|",array_keys($tb))."|username|".session_name()),$z);return"$z[1]?".(sid()?SID."&":"").($sb!="server"||$J!=""?urlencode($sb)."=".urlencode($J)."&":"")."username=".urlencode($U).($z[2]?"&$z[2]":"");}
function 
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}
function 
redirect($Wc,$hd=null){if(isset($hd)){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',(isset($Wc)?$Wc:$_SERVER["REQUEST_URI"]))][]=$hd;}if(isset($Wc)){if($Wc==""){$Wc=".";}header((is_ajax()?"X-AJAX-Redirect":"Location").": $Wc");exit;}}
function 
query_redirect($D,$Wc,$hd,$ve=true,$Pb=true,$Wb=false){global$g,$k,$b;if($Pb){$Wb=!$g->query($D);}$Ye="";if($D){$Ye=$b->messageQuery("$D;");}if($Wb){$k=error().$Ye;return
false;}if($ve){redirect($Wc,$hd.$Ye);}return
true;}

function queries($D=null){
	global$g;
	static$te=array();
	if(!isset($D)){return implode(";\n",$te);}
	$te[]=(ereg(';$',$D)?"DELIMITER ;;\n$D;\nDELIMITER ":$D);
	return $g->query($D);
}
function 
apply_queries($D,$P,$Lb='table'){foreach($P
as$N){if(!queries("$D ".$Lb($N))){return
false;}}return
true;}
function 
queries_redirect($Wc,$hd,$ve){return
query_redirect(queries(),$Wc,$hd,$ve,false,!$ve);}
function 
remove_from_uri($Ud=""){return
substr(preg_replace("~(?<=[?&])($Ud".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}
function 
pagination($Td,$gb){return" ".($Td==$gb?$Td+1:'<a href="'.h(remove_from_uri("page").($Td?"&page=$Td":"")).'">'.($Td+1)."</a>");}
function 
get_file($v,$lb=false){$Yb=$_FILES[$v];if(!$Yb||$Yb["error"]){return$Yb["error"];}$F=file_get_contents($lb&&ereg('\\.gz$',$Yb["name"])?"compress.zlib://$Yb[tmp_name]":($lb&&ereg('\\.bz2$',$Yb["name"])?"compress.bzip2://$Yb[tmp_name]":$Yb["tmp_name"]));if($lb){$Ze=substr($F,0,3);
if(function_exists("iconv")&&ereg("^\xFE\xFF|^\xFF\xFE",$Ze,$Ae)){$F=iconv("utf-16","utf-8",$F);}elseif($Ze=="\xEF\xBB\xBF"){$F=substr($F,3);}}return$F;}
function upload_error($k){$fd=($k==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):null);return($k?lang(1).($fd?" ".lang(2,$fd):""):lang(3));}
function repeat_pattern($ce,$w){return str_repeat("$ce{0,65535}",$w/65535)."$ce{0,".($w%65535)."}";}
function is_utf8($W){return(preg_match('~~u',$W)&&!preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~',$W));}
function shorten_utf8($L,$w=80,$gf=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{FFFF}]",$w).")($)?)u",$L,$z)){preg_match("(^(".repeat_pattern("[\t\r\n -~]",$w).")($)?)",$L,$z);}return h($z[1]).$gf.(isset($z[2])?"":"<i>...</i>");}
function friendly_url($W){return
preg_replace('~[^a-z0-9_]~i','-',$W);}
function hidden_fields($qe,$xc=array()){while(list($v,$W)=each($qe)){if(is_array($W)){foreach($W
as$Kc=>$V){$qe[$v."[$Kc]"]=$V;}}elseif(!in_array($v,$xc)){echo'<input type="hidden" name="'.h($v).'" value="'.h($W).'">';}}}
function hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}
function column_foreign_keys($N){global$b;$F=array();foreach($b->foreignKeys($N)as$n){foreach($n["source"]as$W){$F[$W][]=$n;}}return$F;}
function enum_input($S,$za,$l,$X,$Db=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$l["length"],$ad);$F=(isset($Db)?"<label><input type='$S'$za value='$Db'".((is_array($X)?in_array($Db,$X):$X===0)?" checked":"")."><i>".lang(4)."</i></label>":"");foreach($ad[1]as$p=>$W){$W=stripcslashes(str_replace("''","'",$W));$La=(is_int($X)?$X==$p+1:(is_array($X)?in_array($p+1,$X):$X===$W));$F.=" <label><input type='$S'$za value='".($p+1)."'".($La?' checked':'').'>'.h($b->editVal($W,$l)).'</label>';}return$F;}
function input($l,$X,$o){global$T,$b,$u;$_=h(bracket_escape($l["field"]));echo"<td class='function'>";$Ce=($u=="mssql"&&$l["auto_increment"]);if($Ce&&!$_POST["save"]){$o=null;}$lc=(isset($_GET["select"])||$Ce?array("orig"=>lang(5)):array())+$b->editFunctions($l);$za=" name='fields[$_]'";if($l["type"]=="enum"){echo
nbsp($lc[""])."<td>".$b->editInput($_GET["edit"],$l,$za,$X);}else{$bc=0;foreach($lc
as$v=>$W){if($v===""||!$W){break;}$bc++;}$Cd=($bc?" onchange=\"var f = this.form['function[".h(js_escape(bracket_escape($l["field"])))."]']; if ($bc > f.selectedIndex) f.selectedIndex = $bc;\"":"");$za.=$Cd;echo(count($lc)>1?html_select("function[$_]",$lc,!isset($o)||in_array($o,$lc)||isset($lc[$o])?$o:"","functionChange(this);"):nbsp(reset($lc))).'<td>';$Dc=$b->editInput($_GET["edit"],$l,$za,$X);if($Dc!=""){echo$Dc;}elseif($l["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$l["length"],$ad);foreach($ad[1]as$p=>$W){$W=stripcslashes(str_replace("''","'",$W));$La=(is_int($X)?($X>>$p)&1:in_array($W,explode(",",$X),true));echo" <label><input type='checkbox' name='fields[$_][$p]' value='".(1<<$p)."'".($La?' checked':'')."$Cd>".h($b->editVal($W,$l)).'</label>';}}elseif(ereg('blob|bytea|raw|file',$l["type"])&&ini_bool("file_uploads")){echo"<input type='file' name='fields-$_'$Cd>";}elseif(ereg('text|lob',$l["type"])){echo"<textarea ".($u!="sqlite"||ereg("\n",$X)?"cols='50' rows='12'":"cols='30' rows='1' style='height: 1.2em;'")."$za>".h($X).'</textarea>';}else{$gd=(!ereg('int',$l["type"])&&preg_match('~^(\\d+)(,(\\d+))?$~',$l["length"],$z)?((ereg("binary",$l["type"])?2:1)*$z[1]+($z[3]?1:0)+($z[2]&&!$l["unsigned"]?1:0)):($T[$l["type"]]?$T[$l["type"]]+($l["unsigned"]?0:1):0));echo"<input value='".h($X)."'".($gd?" maxlength='$gd'":"").(ereg('char|binary',$l["type"])&&$gd>20?" size='40'":"")."$za>";}}} 
function 
process_input($l){global$b;$r=bracket_escape($l["field"]);$o=$_POST["function"][$r];$X=$_POST["fields"][$r];if($l["type"]=="enum"){if($X==-1){return
false;}if($X==""){return"NULL";}return+$X;}if($l["auto_increment"]&&$X==""){return
null;}if($o=="orig"){return($l["on_update"]=="CURRENT_TIMESTAMP"?idf_escape($l["field"]):false);}if($o=="NULL"){return"NULL";}if($l["type"]=="set"){return
array_sum((array)$X);}if(ereg('blob|bytea|raw|file',$l["type"])&&ini_bool("file_uploads")){$Yb=get_file("fields-$r");if(!is_string($Yb)){return
false;}return
q($Yb);}return$b->processInput($l,$X,$o);} 
function 
search_tables(){global$b,$g;$_GET["where"][0]["op"]="LIKE %%";$_GET["where"][0]["val"]=$_POST["query"];$gc=false;foreach(table_status()as$N=>$O){$_=$b->tableName($O);if(isset($O["Engine"])&&$_!=""&&(!$_POST["tables"]||in_array($N,$_POST["tables"]))){$E=$g->query("SELECT".limit("1 FROM ".table($N)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($N),array())),1));if($E->fetch_row()){if(!$gc){echo"<ul>\n";$gc=true;}echo"<li><a href='".h(ME."select=".urlencode($N)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$_</a>\n";}}}echo($gc?"</ul>":"<p class='message'>".lang(6))."\n";} 

function dump_headers($wc,$pd=false)
{
	global$b;
	$F=$b->dumpHeaders($wc,$pd);
	$Rd=$_POST["output"];
	if($Rd!="text"){
		header("Content-Disposition: attachment; filename=".friendly_url($wc!=""?$wc:(SERVER!=""?SERVER:"localhost")).".$F".($Rd!="file"&&!ereg('[^0-9a-z]',$Rd)?".$Rd":""));
	}
	session_write_close();
	return $F;
} 
function 
dump_csv($G){foreach($G
as$v=>$W){if(preg_match("~[\"\n,;\t]~",$W)||$W===""){$G[$v]='"'.str_replace('"','""',$W).'"';}}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$G)."\r\n";} 
function 
apply_sql_function($o,$e){return($o?($o=="unixepoch"?"DATETIME($e, '$o')":($o=="count distinct"?"COUNT(DISTINCT ":strtoupper("$o("))."$e)"):$e);} 
function 
password_file(){$pb=ini_get("upload_tmp_dir");if(!$pb){if(function_exists('sys_get_temp_dir')){$pb=sys_get_temp_dir();}else{$Zb=@tempnam("","");if(!$Zb){return
false;}$pb=dirname($Zb);unlink($Zb);}}$Zb="$pb/adminer.key";$F=@file_get_contents($Zb);if($F){return$F;}$ic=@fopen($Zb,"w");if($ic){$F=md5(uniqid(mt_rand(),true));fwrite($ic,$F);fclose($ic);}return$F;} 
function 
is_mail($Ab){$ya='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$rb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$ce="$ya+(\\.$ya+)*@($rb?\\.)+$rb";return
preg_match("(^$ce(,\\s*$ce)*\$)i",$Ab);} 
function 
is_url($L){$rb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return(preg_match("~^(https?)://($rb?\\.)+$rb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$L,$z)?strtolower($z[1]):"");}global$b,$g,$tb,$zb,$Hb,$k,$lc,$qc,$ba,$Cc,$u,$ca,$Nc,$Bd,$ef,$Q,$R,$T,$Rf,$ia;if(!isset($_SERVER["REQUEST_URI"])){$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"].($_SERVER["QUERY_STRING"]!=""?"?$_SERVER[QUERY_STRING]":"");}$ba=$_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_name("adminer_sid");$Vd=array(0,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$ba);if(version_compare(PHP_VERSION,'5.2.0')>=0){$Vd[]=true;}call_user_func_array('session_set_cookie_params',$Vd);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$ac);if(function_exists("set_magic_quotes_runtime")){set_magic_quotes_runtime(false);}
@set_time_limit(0);
@ini_set("zend.ze1_compatibility_mode",false);
@ini_set("precision",20);
$Nc=array(
'en'=>'English',
'zh'=>'简体中文',);
function get_lang(){global$ca;return$ca;}
function lang($r,$wd=null){
	global$ca,$R;$Ff=$R[$r];
	if(is_array($Ff)){
		$fe=($wd==1?0:($ca=='cs'||$ca=='sk'?($wd&&$wd<5?1:2):($ca=='fr'?(!$wd?0:1):($ca=='pl'?($wd%10>1&&$wd%10<5&&$wd/10%10!=1?1:2):($ca=='sl'?($wd%100==1?0:($wd%100==2?1:($wd%100==3||$wd%100==4?2:3))):($ca=='lt'?($wd%10==1&&$wd%100!=11?0:($wd%10>1&&$wd/10%10!=1?1:2)):($ca=='ru'?($wd%10==1&&$wd%100!=11?0:($wd%10>1&&$wd%10<5&&$wd/10%10!=1?1:2)):1)))))));
		$Ff=$Ff[$fe];
	}
	$xa=func_get_args();
	array_shift($xa);
	return vsprintf((isset($Ff)?$Ff:$r),$xa);
}

function switch_lang(){
	global$ca,$Nc;
	echo"<form action=''>\n<div id='lang'>";hidden_fields($_GET,array('lang'));
	echo lang(7).": ".html_select("lang",$Nc,$ca,"var loc = location.search.replace(/[?&]lang=[^&]*/, ''); location.search = loc + (loc ? '&' : '') + 'lang=' + this.value;")," <input type='submit' value='".lang(8)."' class='hidden'>\n","</div>\n</form>\n";
}
if(isset($_GET["lang"])){$_COOKIE["adminer_lang"]=$_GET["lang"];$_SESSION["lang"]=$_GET["lang"];}
$ca="en";
if(isset($Nc[$_COOKIE["adminer_lang"]])){
	cookie("adminer_lang",$_COOKIE["adminer_lang"]);$ca=$_COOKIE["adminer_lang"];
}elseif(isset($Nc[$_SESSION["lang"]])){
	$ca=$_SESSION["lang"];
}else{
	$pa=array();preg_match_all('~([-a-z]+)(;q=([0-9.]+))?~',str_replace("_","-",strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"])),$ad,PREG_SET_ORDER);
	foreach($ad as$z){$pa[$z[1]]=(isset($z[3])?$z[3]:1);}
	arsort($pa);
	foreach($pa as$v=>$C){
		if(isset($Nc[$v])){$ca=$v;break;}
		$v=preg_replace('~-.*~','',$v);
		if(!isset($pa[$v])&&isset($Nc[$v])){$ca=$v;break;}
	}
}

switch($ca){
case"en":$R=array('Are you sure?','Unable to upload a file.','Maximum allowed file size is %sB.','File does not exist.','empty','original','No tables.','Language','Use','Please use one of the extensions %s.','File exists.','User types','Numbers','Date and time','Strings','Binary','Network','Geometry','Lists','System','Server','Username','Password','Login','Permanent login','Select data','Show structure','Alter view','Alter table','New item','Last page','Edit',array('%d byte','%d bytes'),'Select','Functions','Aggregation','Search','anywhere','Sort','descending','Limit','Text length','Action','SQL command','open','save','Alter database','Alter schema','Create schema','Database schema','Privileges','Dump','Logout','database','schema','Create new table','select','ltr','Resend POST data?','Invalid CSRF token. Send the form again.','Logout successful.','Session support must be enabled.','Session expired, please login again.','Invalid credentials.','No extension','None of the supported PHP extensions (%s) are available.','Too big POST data. Reduce the data or increase the %s configuration directive.','Database','Invalid database.','Databases have been dropped.','Select database','Create new database','Process list','Variables','Status','%s version: %s through PHP extension %s','Logged as: %s','Collation','Tables','Drop','Refresh','Schema','Invalid schema.','No rows.','%.3f s','Foreign keys','collation','ON DELETE','Column name','Parameter name','Type','Length','Options','Auto Increment','Default values','Comment','Add next','Move up','Move down','Remove','View','Table','Column','Indexes','Alter indexes','Source','Target','ON UPDATE','Alter','Add foreign key','Triggers','Add trigger','Permanent link','Export','Output','Format','Routines','Events','Data','Create user','Error in query',array('%d row','%d rows'),array('Query executed OK, %d row affected.','Query executed OK, %d rows affected.'),'No commands to execute.',array('%d query executed OK.','%d queries executed OK.'),'File upload','File uploads are disabled.','Execute','Stop on error','Show only errors','From server','Webserver file %s','Run file','History','Clear','Edit all','Item has been deleted.','Item has been updated.','Item%s has been inserted.','Insert','Save','Save and continue edit','Save and insert next','Delete','Table has been dropped.','Table has been altered.','Table has been created.','Create table','Maximum number of allowed fields exceeded. Please increase %s and %s.','Table name','engine','Partition by','Partitions','Partition name','Values','Indexes have been altered.','Index Type','Column (length)','Name','Database has been dropped.','Database has been renamed.','Database has been created.','Database has been altered.','Create database','Schema has been dropped.','Schema has been created.','Schema has been altered.','Call',array('Routine has been called, %d row affected.','Routine has been called, %d rows affected.'),'Foreign key has been dropped.','Foreign key has been altered.','Foreign key has been created.','Source and target columns must have the same data type, there must be an index on the target columns and referenced data must exist.','Foreign key','Target table','Change','Add column','View has been dropped.','View has been altered.','View has been created.','Create view','Event has been dropped.','Event has been altered.','Event has been created.','Alter event','Create event','Start','End','Every','On completion preserve','Routine has been dropped.','Routine has been altered.','Routine has been created.','Alter function','Alter procedure','Create function','Create procedure','Return type','Sequence has been dropped.','Sequence has been created.','Sequence has been altered.','Alter sequence','Create sequence','Type has been dropped.','Type has been created.','Alter type','Create type','Trigger has been dropped.','Trigger has been altered.','Trigger has been created.','Alter trigger','Create trigger','Time','Event','User has been dropped.','User has been altered.','User has been created.','Hashed','Routine','Grant','Revoke',array('%d process has been killed.','%d processes have been killed.'),'%d in total','Kill',array('%d item has been affected.','%d items have been affected.'),'Double click on a value to modify it.',array('%d row has been imported.','%d rows have been imported.'),'Unable to select the table','edit','Relations','Use edit link to modify this value.','Page','last','whole result','Clone','Import',',','Tables have been truncated.','Tables have been moved.','Tables have been copied.','Tables have been dropped.','Tables and views','Search data in tables','Engine','Data Length','Index Length','Data Free','Rows','Analyze','Optimize','Check','Repair','Truncate','Move to other database','Move','Copy','Sequences','Schedule','At given time',array('%d e-mail has been sent.','%d e-mails have been sent.'));break;
case"zh":$R=array('你确定吗？','不能上传文件。','最多允许的文件大小为 %sB','文件不存在。','空','原始','没有表。','语言','使用','请使用这些扩展中的一个：%s。','文件已存在。','用户类型','数字','日期时间','字符串','二进制','网络','几何图形','列表','系统','服务器','用户名','密码','登录','保持登录','选择数据','显示结构','更改视图','更改表','新建项','末页','编辑','%d 字节','选择','函数','集合','搜索','任意位置','排序','降序','限定','文本长度','动作','SQL命令','打开','保存','更改数据库','更改模式','创建模式','数据库概要','权限','导出','注销','数据库','模式','创建新表','选择','ltr','重新发送 POST 数据？','无效 CSRF 令牌。重新发送表单。','注销成功。','会话必须被启用。','会话已过期，请重新登录。','无效凭据。','没有扩展','没有支持的 PHP 扩展可用（%s）。','太大的 POST 数据。减少数据或者增加 %s 配置命令。','数据库','无效数据库。','已丢弃数据库。','选择数据库','创建新数据库','进程列表','变量','状态','%s 版本：%s 通过 PHP 扩展 %s','登录为：%s','校对','表','丢弃','刷新','模式','非法模式。','没有行。','%.3f 秒','外键','校对','ON DELETE','列名','参数名','类型','长度','选项','自动增量','默认值','注释','添加下一个','上移','下移','移除','视图','表','列','索引','更改索引','源','目标','ON UPDATE','更改','添加外键','触发器','创建触发器','固定链接','导出','输出','格式','子程序','事件','数据','创建用户','查询出错','%d 行','执行查询OK，%d 行受影响。','没有命令执行。','%d 条查询已成功执行。','文件上传','文件上传被禁用。','执行','出错时停止','仅显示错误','来自服务器','Web服务器文件 %s','运行文件','历史','清除','编辑全部','已删除项目。','已更新项目。','已插入项目%s。','插入','保存','保存并继续编辑','保存并插入下一个','删除','已丢弃表。','已更改表。','已创建表。','创建表','超过最多允许的字段数量。请增加 %s 和 %s 。','表名','引擎','分区类型','分区','分区名','值','已更改索引。','索引类型','列（长度）','名称','已丢弃数据库。','已重命名数据库。','已创建数据库。','已更改数据库。','创建数据库','已丢弃模式。','已创建模式。','已更改模式。','调用','子程序被调用，%d 行被影响。','已删除外键。','已更改外键。','已创建外键。','源列和目标列必须具有相同的数据类型，在目标列上必须有一个索引并且引用的数据必须存在。','外键','目标表','更改','增加列','已丢弃视图。','已更改视图。','已创建视图。','创建视图','已丢弃事件。','已更改事件。','已创建事件。','更改事件','创建事件','开始','结束','每','完成后保存','已丢弃子程序。','已更改子程序。','已创建子程序。','更改函数','更改过程','创建函数','创建过程','返回类型','已丢弃序列。','已创建序列。','已更改序列。','更改序列','创建序列','已丢弃类型。','已创建类型。','更改类型','创建类型','已丢弃触发器。','已更改触发器。','已创建触发器。','更改触发器','创建触发器','时间','事件','已丢弃用户。','已更改用户。','已创建用户。','Hashed','子程序','授权','废除','%d 个进程被终止','共计 %d','终止','%d 个项目受到影响。','在值上双击类修改它。','%d 行已导入。','不能选择该表','编辑','关联信息','使用编辑链接来修改该值。','页面','最后','所有结果','克隆','导入',',','已清空表。','已转移表。','表已复制。','已丢弃表。','表和视图','在表中搜索数据','引擎','数据长度','索引长度','数据空闲','行数','分析','优化','检查','修复','清空','转移到其它数据库','转移','复制','序列','调度','在指定时间','HH:MM:SS');break;
}
if(extension_loaded('pdo')){
	class Min_PDO extends PDO{
		var$_result,$server_info,$affected_rows,$error;
		function __construct(){}
		function dsn($wb,$U,$B,$Ob='auth_error'){
			set_exception_handler($Ob);
			parent::__construct($wb,$U,$B);
			restore_exception_handler();
			$this->setAttribute(13,array('Min_PDOStatement'));
			$this->server_info=$this->getAttribute(4);
		}
		function query($D,$Lf=false){
			$E=parent::query($D);
			if(!$E){$Jb=$this->errorInfo();$this->error=$Jb[2];return false;}
			$this->store_result($E);return$E;
		}
		function multi_query($D){
			return$this->_result=$this->query($D);
		}
		function store_result($E=null){
			if(!$E){$E=$this->_result;}
			if($E->columnCount()){
				$E->num_rows=$E->rowCount();
				return$E;
			}
			$this->affected_rows=$E->rowCount();
			return true;
		}
		function next_result(){return$this->_result->nextRowset();}
		function result($D,$l=0){
			$E=$this->query($D);
			if(!$E){return false;}
			$G=$E->fetch();
			return$G[$l];
		}
	}
	
	class Min_PDOStatement extends PDOStatement{
		var$_offset=0,$num_rows;
		function fetch_assoc(){return$this->fetch(2);}
		function fetch_row(){return$this->fetch(3);} 
		function fetch_field(){
			$G=(object)$this->getColumnMeta($this->_offset++);
			$G->orgtable=$G->table;
			$G->orgname=$G->name;
			$G->charsetnr=(in_array("blob",$G->flags)?63:0);
			return$G;
		}
	}
}

$tb=array();
$tb["sqlite"]="SQLite 3";
$tb["sqlite2"]="SQLite 2";
if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){
	$ie=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");
	define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));

	if(extension_loaded(isset($_GET["sqlite"])?"sqlite3":"sqlite")){
		if(isset($_GET["sqlite"])){
			class Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$error,$_link;function
			Min_SQLite($Zb){$this->_link=new
			SQLite3($Zb);$Yf=$this->_link->version();$this->server_info=$Yf["versionString"];} 
			function query($D){$E=@$this->_link->query($D);if(!$E){$this->error=$this->_link->lastErrorMsg();return
			false;}elseif($E->numColumns()){return
			new
			Min_Result($E);}$this->affected_rows=$this->_link->changes();return
			true;} 
			function quote($L){return"'".$this->_link->escapeString($L)."'";} 
			function store_result(){return$this->_result;} 
			function result($D,$l=0){$E=$this->query($D);if(!is_object($E)){return
			false;}$G=$E->_result->fetchArray();return$G[$l];}}
			class Min_Result{
				var$_result,$_offset=0,$num_rows;
			function Min_Result($E){$this->_result=$E;} 
			function fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);} 
			function fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);} 
			function fetch_field(){$e=$this->_offset++;$S=$this->_result->columnType($e);return(object)array("name"=>$this->_result->columnName($e),"type"=>$S,"charsetnr"=>($S==SQLITE3_BLOB?63:0),);} 
			function __desctruct(){return$this->_result->finalize();}
			}
		}else{
			class Min_SQLite{
				var$extension="SQLite",$server_info,$affected_rows,$error,$_link;
				function Min_SQLite($Zb){
					$this->server_info=sqlite_libversion();
					$this->_link=new SQLiteDatabase($Zb);
				} 
				function query($D,$Lf=false){
					$md=($Lf?"unbufferedQuery":"query");$E=@$this->_link->$md($D,SQLITE_BOTH,$k);
					if(!$E){
						$this->error=$k;return false;
					}elseif($E===true){
						$this->affected_rows=$this->changes();return true;
					}
					return new Min_Result($E);
				} 
				function quote($L){return"'".sqlite_escape_string($L)."'";} 
				function store_result(){return$this->_result;} 
				function result($D,$l=0){
					$E=$this->query($D);if(!is_object($E)){return false;}$G=$E->_result->fetch();return$G[$l];
				}
			}
			class Min_Result{
				var$_result,$_offset=0,$num_rows;
				function Min_Result($E){$this->_result=$E;if(method_exists($E,'numRows')){$this->num_rows=$E->numRows();}} 
				function fetch_assoc(){$G=$this->_result->fetch(SQLITE_ASSOC);if(!$G){return
				false;}$F=array();foreach($G
				as$v=>$W){$F[($v[0]=='"'?idf_unescape($v):$v)]=$W;}return$F;} 
				function fetch_row(){return$this->_result->fetch(SQLITE_NUM);} 
				function fetch_field(){
					$_=$this->_result->fieldName($this->_offset++);$ce='(\\[.*]|"(?:[^"]|"")*"|(.+))';
					if(preg_match("~^($ce\\.)?$ce\$~",$_,$z)){$N=($z[3]!=""?$z[3]:idf_unescape($z[2]));$_=($z[5]!=""?$z[5]:idf_unescape($z[4]));}
					return(object)array("name"=>$_,"orgname"=>$_,"orgtable"=>$N,);
				}
			}
		}
	}elseif(extension_loaded("pdo_sqlite")){
		class Min_SQLite extends Min_PDO{
			var$extension="PDO_SQLite";
			function Min_SQLite($Zb){
				$this->dsn(DRIVER.":$Zb","","");
			}
		}
	}if(class_exists("Min_SQLite")){
		class Min_DB extends Min_SQLite{
			function Min_DB(){$this->Min_SQLite(":memory:");} 
			function select_db($Zb){
				if(is_readable($Zb)&&$this->query("ATTACH ".$this->quote(ereg("(^[/\\]|:)",$Zb)?$Zb:dirname($_SERVER["SCRIPT_FILENAME"])."/$Zb")." AS a")){
					$this->Min_SQLite($Zb);return true;
				}
				return false;
			} 
			function multi_query($D){return$this->_result=$this->query($D);} 
			function next_result(){return false;}
		}
	} 
	function idf_escape($r){return'"'.str_replace('"','""',$r).'"';} 
	function table($r){return idf_escape($r);} 
	function connect(){return new Min_DB;} 
	function get_databases(){return array();} 
	function limit($D,$Z,$x,$A=0,$Re=" "){return" $D$Z".(isset($x)?$Re."LIMIT $x".($A?" OFFSET $A":""):"");} 
	function limit1($D,$Z){global$g;return($g->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($D,$Z,1):" $D$Z");} 
	function db_collation($j,$Qa){global$g;return$g->result("PRAGMA encoding");} 
	function engines(){return array();} 
	function logged_user(){return get_current_user();} 
	function tables_list(){return get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name",1);} 
	function count_tables($i){return array();} 
	function table_status($_=""){
		$F=array();
		foreach(get_rows("SELECT name AS Name, type AS Engine FROM sqlite_master WHERE type IN ('table', 'view')".($_!=""?" AND name = ".q($_):""))as$G){
			$G["Auto_increment"]="";$F[$G["Name"]]=$G;
		}
		foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$G){
		$F[$G["name"]]["Auto_increment"]=$G["seq"];
		}
		return($_!=""?$F[$_]:$F);
	} 
	function is_view($O){return$O["Engine"]=="view";} 
	function fk_support($O){global$g;return$_GET["create"]==""&&!$g->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");} 
	function fields($N){
		$F=array();
		foreach(get_rows("PRAGMA table_info(".table($N).")")as$G){
			$S=strtolower($G["type"]);
			$mb=$G["dflt_value"];
			$F[$G["name"]]=array("field"=>$G["name"],"type"=>(eregi("int",$S)?"integer":(eregi("char|clob|text",$S)?"text":(eregi("blob",$S)?"blob":(eregi("real|floa|doub",$S)?"real":"numeric")))),"full_type"=>$S,"default"=>(ereg("'(.*)'",$mb,$z)?str_replace("''","'",$z[1]):($mb=="NULL"?null:$mb)),"null"=>!$G["notnull"],"auto_increment"=>eregi('^integer$',$S)&&$G["pk"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$G["pk"],);
		}
		return$F;
	} 
	function indexes($N,$h=null){
		$F=array();
		$le=array();
		foreach(fields($N)as$l){
			if($l["primary"]){$le[]=$l["field"];}
		}
		if($le){$F[""]=array("type"=>"PRIMARY","columns"=>$le,"lengths"=>array());}
		
		foreach(get_rows("PRAGMA index_list(".table($N).")")as$G){
			$F[$G["name"]]["type"]=($G["unique"]?"UNIQUE":"INDEX");
			$F[$G["name"]]["lengths"]=array();
			foreach(get_rows("PRAGMA index_info(".idf_escape($G["name"]).")")as$Je){$F[$G["name"]]["columns"][]=$Je["name"];}
		}return$F;
	} 
	function foreign_keys($N){
			$F=array();
			foreach(get_rows("PRAGMA foreign_key_list(".table($N).")")as$G){$n=&$F[$G["id"]];if(!$n){$n=$G;}$n["source"][]=$G["from"];$n["target"][]=$G["to"];}return$F;
	} 
	function view($_){
			global$g;
			return array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\\s+~iU','',$g->result("SELECT sql FROM sqlite_master WHERE name = ".q($_))));
	} 
	function collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());} 
	function information_schema($j){returnfalse;} 
	function error(){global$g;return h($g->error);} 
	function exact_value($W){return q($W);} 
	function check_sqlite_name($_){global$g;$Vb="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($Vb)\$~",$_)){$g->error=lang(9,str_replace("|",", ",$Vb));return 
	false;}return true;} 
	function create_database($j,$d){
			global$g;
			if(file_exists($j)){$g->error=lang(10);return false;}
			if(!check_sqlite_name($j)){return false;}
			$y=new Min_SQLite($j);
			$y->query('PRAGMA encoding = "UTF-8"');
			$y->query('CREATE TABLE adminer (i)');
			$y->query('DROP TABLE adminer');return true;
	} 
	function drop_databases($i){global$g;$g->Min_SQLite(":memory:");foreach($i as$j){if(!@unlink($j)){$g->error=lang(10);return false;}}return true;} 
	function rename_database($_,$d){global$g;if(!check_sqlite_name($_)){return false;}$g->Min_SQLite(":memory:");$g->error=lang(10);return @rename(DB,$_);} 
	function auto_increment(){return " PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");} 
	function alter_table($N,$_,$m,$dc,$Ua,$Fb,$d,$_a,$Zd){
			$c=array();
			foreach($m as$l){if($l[1]){$c[]=($N!=""&&$l[0]==""?"ADD ":"  ").implode($l[1]);}}$c=array_merge($c,$dc);
			if($N!=""){
				foreach($c as$W){
					if(!queries("ALTER TABLE ".table($N)." $W")){return false;}
				}
				if($N!=$_&&!queries("ALTER TABLE ".table($N)." RENAME TO ".table($_))){return false;}
			}elseif(!queries("CREATE TABLE ".table($_)." (\n".implode(",\n",$c)."\n)")){
				return false;
			}
			if($_a){queries("UPDATE sqlite_sequence SET seq = $_a WHERE name = ".q($_));}
			return true;
	} 
	function alter_indexes($N,$c){
			foreach($c as$W){
				if(!queries($W[2]=="DROP"?"DROP INDEX ".idf_escape($W[1]):"CREATE $W[0] ".($W[0]!="INDEX"?"INDEX ":"").idf_escape($W[1]!=""?$W[1]:uniqid($N."_"))." ON ".table($N)." $W[2]")){return false;}
			}return true;
	} 
	function truncate_tables($P){return apply_queries("DELETE FROM",$P);} 
	function drop_views($Y){return apply_queries("DROP VIEW",$Y);} 
	function drop_tables($P){return apply_queries("DROP TABLE",$P);} 
	function move_tables($P,$Y,$tf){return false;} 
	function trigger($_){global$g;if($_==""){return array("Statement"=>"BEGIN\n\t;\nEND");}preg_match('~^CREATE\\s+TRIGGER\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*([a-z]+)\\s+([a-z]+)\\s+ON\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*(?:FOR\\s*EACH\\s*ROW\\s)?(.*)~is',$g->result("SELECT sql FROM sqlite_master WHERE name = ".q($_)),$z);return array("Timing"=>strtoupper($z[1]),"Event"=>strtoupper($z[2]),"Trigger"=>$_,"Statement"=>$z[3]);} 
	function triggers($N){$F=array();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($N))as$G){preg_match('~^CREATE\\s+TRIGGER\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*([a-z]+)\\s*([a-z]+)~i',$G["sql"],$z);$F[$G["name"]]=array($z[1],$z[2]);}return $F;} 
	function trigger_options(){return array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Type"=>array("FOR EACH ROW"),);} 
	function routine($_,$S){} 
	function routines(){} 
	function routine_languages(){} 
	function begin(){return queries("BEGIN");} 
	
	function insert_into($N,$K)
	{
		return queries("INSERT INTO ".table($N).($K?" (".implode(", ",array_keys($K)).")\nVALUES (".implode(", ",$K).")":"DEFAULT VALUES"));
	} 
	function insert_update($N,$K,$le){return queries("REPLACE INTO ".table($N)." (".implode(", ",array_keys($K)).") VALUES (".implode(", ",$K).")");} 
	function last_id(){global$g;return $g->result("SELECT LAST_INSERT_ROWID()");} 
	function explain($g,$D){return $g->query("EXPLAIN $D");} 
	function found_rows($O,$Z){} 
	function types(){return array();} 
	function schemas(){return array();} 
	function get_schema(){return "";} 
	function set_schema($Ne){return true;} 
	function create_sql($N,$_a){global$g;return $g->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($N));} 
	function truncate_sql($N){return "DELETE FROM ".table($N);} 
	function use_sql($jb){} 
	function trigger_sql($N,$M){return implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($N)));} 
	function show_variables(){global$g;$F=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$v){$F[$v]=$g->result("PRAGMA $v");}return $F;} 
	function show_status(){$F=array();foreach(get_vals("PRAGMA compile_options")as$Gd){list($v,$W)=explode("=",$Gd,2);$F[$v]=$W;}return $F;} 
	function support($Xb){
			return ereg('^(view|trigger|variables|status|dump)$',$Xb);
	}
	$u="sqlite";
	$T=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);
	$ef=array_keys($T);
	$Rf=array();
	$Fd=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","");
	$lc=array("hex","length","lower","round","unixepoch","upper");
	$qc=array("avg","count","count distinct","group_concat","max","min","sum");
	$zb=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));
}
$tb["pgsql"]="PostgreSQL";
if(isset($_GET["pgsql"])){
	$ie=array("PgSQL","PDO_PgSQL");
	define("DRIVER","pgsql");
	if(extension_loaded("pgsql")){
		class Min_DB{
			var $extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error;
			function _error($Ib,$k){if(ini_bool("html_errors")){$k=html_entity_decode(strip_tags($k));}$k=ereg_replace('^[^:]*: ','',$k);$this->error=$k;} 
			function connect($J,$U,$B){
				global$b;$j=$b->database();
				set_error_handler(array($this,'_error'));
				$this->_string="host='".str_replace(":","' port='",addcslashes($J,"'\\"))."' user='".addcslashes($U,"'\\")."' password='".addcslashes($B,"'\\")."'";$this->_link=@pg_connect($this->_string.($j!=""?" dbname='".addcslashes($j,"'\\")."'":" dbname='template1'"),PGSQL_CONNECT_FORCE_NEW);
				if(!$this->_link&&$j!=""){
					$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='template1'",PGSQL_CONNECT_FORCE_NEW);
				}restore_error_handler();
				if($this->_link){
					$Yf=pg_version($this->_link);$this->server_info=$Yf["server"];
					pg_set_client_encoding($this->_link,"UTF8");
				}
				return (bool)$this->_link;
			} 
			function quote($L){return "'".pg_escape_string($this->_link,$L)."'";} 
			function select_db($jb){
				global$b;
				if($jb==$b->database()){return $this->_database;}
				$F=@pg_connect("$this->_string dbname='".addcslashes($jb,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);
				if($F){$this->_link=$F;}
				return $F;
			} 
			function close(){$this->_link=@pg_connect("$this->_string dbname='template1'");} 
			function query($D,$Lf=false){$E=@pg_query($this->_link,$D);if(!$E){$this->error=pg_last_error($this->_link);return 
			false;}elseif(!pg_num_fields($E)){$this->affected_rows=pg_affected_rows($E);return true;}return new Min_Result($E);} 
			function multi_query($D){return $this->_result=$this->query($D);} 
			function store_result(){return $this->_result;} 
			function next_result(){return false;} 
			function result($D,$l=0){
				$E=$this->query($D);if(!$E||!$E->num_rows){return false;}
				return pg_fetch_result($E->_result,0,$l);
			}
		}
		class Min_Result{
			var$_result,$_offset=0,$num_rows;
			function Min_Result($E){$this->_result=$E;$this->num_rows=pg_num_rows($E);} 
			function fetch_assoc(){return pg_fetch_assoc($this->_result);} 
			function fetch_row(){return pg_fetch_row($this->_result);} 
			function fetch_field(){
				$e=$this->_offset++;
				$F=new stdClass;
				if(function_exists('pg_field_table')){
					$F->orgtable=pg_field_table($this->_result,$e);
				}
				$F->name=pg_field_name($this->_result,$e);
				$F->orgname=$F->name;
				$F->type=pg_field_type($this->_result,$e);
				$F->charsetnr=($F->type=="bytea"?63:0);return $F;
			} 
			function __destruct(){pg_free_result($this->_result);}
		}

}elseif(extension_loaded("pdo_pgsql")){
	class Min_DB extends Min_PDO{
		var$extension="PDO_PgSQL";
		function connect($J,$U,$B){
			global$b;$j=$b->database();
			$L="pgsql:host='".str_replace(":","' port='",addcslashes($J,"'\\"))."' options='-c client_encoding=utf8'";
			$this->dsn($L.($j!=""?" dbname='".addcslashes($j,"'\\")."'":""),$U,$B);
			return true;
		} 
		function select_db($jb){global$b;return ($b->database()==$jb);} 
		function close(){}
	}
}
function idf_escape($r){return '"'.str_replace('"','""',$r).'"';} 
function table($r){return idf_escape($r);} 
function connect(){global$b;$g=new Min_DB;$fb=$b->credentials();if($g->connect($fb[0],$fb[1],$fb[2])){return $g;}return $g->error;} 
function get_databases(){return get_vals("SELECT datname FROM pg_database ORDER BY datname");} 
function limit($D,$Z,$x,$A=0,$Re=" "){return " $D$Z".(isset($x)?$Re."LIMIT $x".($A?" OFFSET $A":""):"");} 
function limit1($D,$Z){return " $D$Z";} 
function db_collation($j,$Qa){global$g;return $g->result("SHOW LC_COLLATE");} 
function engines(){return array();} 
function logged_user(){global$g;return $g->result("SELECT user");} 
function tables_list(){return get_key_vals("SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema() ORDER BY table_name");} 
function count_tables($i){return array();} 
function table_status($_=""){$F=array();foreach(get_rows("SELECT relname AS \"Name\", CASE relkind WHEN 'r' THEN '' ELSE 'view' END AS \"Engine\", pg_relation_size(oid) AS \"Data_length\", pg_total_relation_size(oid) - pg_relation_size(oid) AS \"Index_length\", obj_description(oid, 'pg_class') AS \"Comment\", relhasoids AS \"Oid\"
FROM pg_class
WHERE relkind IN ('r','v')
AND relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())".($_!=""?" AND relname = ".q($_):""))as$G){$F[$G["Name"]]=$G;}return ($_!=""?$F[$_]:$F);} 
function is_view($O){return $O["Engine"]=="view";} 
function fk_support($O){return true;} 
function fields($N){$F=array();foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, d.adsrc AS default, a.attnotnull, col_description(c.oid, a.attnum) AS comment
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($N)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$G){ereg('(.*)(\\((.*)\\))?',$G["full_type"],$z);list(,$G["type"],,$G["length"])=$z;$G["full_type"]=$G["type"].($G["length"]?"($G[length])":"");$G["null"]=($G["attnotnull"]=="f");$G["auto_increment"]=eregi("^nextval\\(",$G["default"]);$G["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~^(.*)::.+$~',$G["default"],$z)){$G["default"]=($z[1][0]=="'"?idf_unescape($z[1]):$z[1]);}$F[$G["field"]]=$G;}return $F;} 
function indexes($N,$h=null){global$g;if(!is_object($h)){$h=$g;}$F=array();$nf=$h->result("SELECT oid FROM pg_class WHERE relname = ".q($N));$f=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $nf AND attnum > 0",$h);foreach(get_rows("SELECT relname, indisunique, indisprimary, indkey FROM pg_index i, pg_class ci WHERE i.indrelid = $nf AND ci.oid = i.indexrelid",$h)as$G){$F[$G["relname"]]["type"]=($G["indisprimary"]=="t"?"PRIMARY":($G["indisunique"]=="t"?"UNIQUE":"INDEX"));$F[$G["relname"]]["columns"]=array();foreach(explode(" ",$G["indkey"])as$_c){$F[$G["relname"]]["columns"][]=$f[$_c];}$F[$G["relname"]]["lengths"]=array();}return $F;} 
function foreign_keys($N){global$Bd;$F=array();foreach(get_rows("SELECT conname, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT oid FROM pg_class WHERE relname = ".q($N).")
AND contype = 'f'::char
ORDER BY conkey, conname")as$G){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$G['definition'],$z)){$G['source']=array_map('trim',explode(',',$z[1]));$G['table']=$z[2];if(preg_match('~(.+)\.(.+)~',$z[2],$Zc)){$G['ns']=$Zc[1];$G['table']=$Zc[2];}$G['target']=array_map('trim',explode(',',$z[3]));$G['on_delete']=(preg_match("~ON DELETE ($Bd)~",$z[4],$Zc)?$Zc[1]:'');$G['on_update']=(preg_match("~ON UPDATE ($Bd)~",$z[4],$Zc)?$Zc[1]:'');$F[$G['conname']]=$G;}}return $F;} 
function view($_){global$g;return array("select"=>$g->result("SELECT pg_get_viewdef(".q($_).")"));} 
function collations(){return array();} 
function information_schema($j){return ($j=="information_schema");} 
function error(){global$g;$F=h($g->error);if(preg_match('~^(.*\\n)?([^\\n]*)\\n( *)\\^(\\n.*)?$~s',$F,$z)){$F=$z[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($z[3]).'})(.*)~','\\1<b>\\2</b>',$z[2]).$z[4];}return nl_br($F);} 
function exact_value($W){return q($W);} 
function create_database($j,$d){return queries("CREATE DATABASE ".idf_escape($j).($d?" ENCODING ".idf_escape($d):""));} 
function drop_databases($i){global$g;$g->close();return apply_queries("DROP DATABASE",$i,'idf_escape');} 
function rename_database($_,$d){return queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($_));} 
function auto_increment(){return "";} 
function alter_table($N,$_,$m,$dc,$Ua,$Fb,$d,$_a,$Zd){$c=array();$te=array();foreach($m as$l){$e=idf_escape($l[0]);$W=$l[1];if(!$W){$c[]="DROP $e";}else{$Wf=$W[5];unset($W[5]);if(isset($W[6])&&$l[0]==""){$W[1]=($W[1]=="bigint"?" big":" ")."serial";}if($l[0]==""){$c[]=($N!=""?"ADD ":"  ").implode($W);}else{if($e!=$W[0]){$te[]="ALTER TABLE ".table($N)." RENAME $e TO $W[0]";}$c[]="ALTER $e TYPE$W[1]";if(!$W[6]){$c[]="ALTER $e ".($W[3]?"SET$W[3]":"DROP DEFAULT");$c[]="ALTER $e ".($W[2]==" NULL"?"DROP NOT":"SET").$W[2];}}if($l[0]!=""||$Wf!=""){$te[]="COMMENT ON COLUMN ".table($N).".$W[0] IS ".($Wf!=""?substr($Wf,9):"''");}}}$c=array_merge($c,$dc);if($N==""){array_unshift($te,"CREATE TABLE ".table($_)." (\n".implode(",\n",$c)."\n)");}elseif($c){array_unshift($te,"ALTER TABLE ".table($N)."\n".implode(",\n",$c));}if($N!=""&&$N!=$_){$te[]="ALTER TABLE ".table($N)." RENAME TO ".table($_);}if($N!=""||$Ua!=""){$te[]="COMMENT ON TABLE ".table($_)." IS ".q($Ua);}if($_a!=""){}foreach($te as$D){if(!queries($D)){return false;}}return true;} 
function alter_indexes($N,$c){
	$cb=array();$ub=array();
	foreach($c as $W){
		if($W[0]!="INDEX"){$cb[]=($W[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($W[1]):"\nADD $W[0] ".($W[0]=="PRIMARY"?"KEY ":"").$W[2]);
		}elseif($W[2]=="DROP"){$ub[]=idf_escape($W[1]);
		}elseif(!queries("CREATE INDEX ".idf_escape($W[1]!=""?$W[1]:uniqid($N."_"))." ON ".table($N)." $W[2]")){return false;}
	}return ((!$cb||queries("ALTER TABLE ".table($N).implode(",",$cb)))&&(!$ub||queries("DROP INDEX ".implode(", ",$ub))));
} 
function truncate_tables($P){return queries("TRUNCATE ".implode(", ",array_map('table',$P)));return true;} 
function drop_views($Y){return queries("DROP VIEW ".implode(", ",array_map('table',$Y)));} 
function drop_tables($P){return queries("DROP TABLE ".implode(", ",array_map('table',$P)));} 
function move_tables($P,$Y,$tf){foreach($P as$N){if(!queries("ALTER TABLE ".table($N)." SET SCHEMA ".idf_escape($tf))){return 
false;}}foreach($Y as$N){if(!queries("ALTER VIEW ".table($N)." SET SCHEMA ".idf_escape($tf))){return false;}}return true;} 
function trigger($_){if($_==""){return array("Statement"=>"EXECUTE PROCEDURE ()");}$H=get_rows('SELECT trigger_name AS "Trigger", condition_timing AS "Timing", event_manipulation AS "Event", \'FOR EACH \' || action_orientation AS "Type", action_statement AS "Statement" FROM information_schema.triggers WHERE event_object_table = '.q($_GET["trigger"]).' AND trigger_name = '.q($_));return reset($H);} 
function triggers($N){$F=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE event_object_table = ".q($N))as$G){$F[$G["trigger_name"]]=array($G["condition_timing"],$G["event_manipulation"]);}return $F;} 
function trigger_options(){return array("Timing"=>array("BEFORE","AFTER"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);} 
function routines(){return get_rows('SELECT p.proname AS "ROUTINE_NAME", p.proargtypes AS "ROUTINE_TYPE", pg_catalog.format_type(p.prorettype, NULL) AS "DTD_IDENTIFIER"
FROM pg_catalog.pg_namespace n
JOIN pg_catalog.pg_proc p ON p.pronamespace = n.oid
WHERE n.nspname = current_schema()
ORDER BY p.proname');} 
function routine_languages(){return get_vals("SELECT langname FROM pg_catalog.pg_language");} 
function begin(){return queries("BEGIN");} 

function insert_into($N,$K)
{
	return queries("INSERT INTO ".table($N).($K?" (".implode(", ",array_keys($K)).")\nVALUES (".implode(", ",$K).")":"DEFAULT VALUES"));
} 
function insert_update($N,$K,$le){global$g;$Sf=array();$Z=array();foreach($K as$v=>$W){$Sf[]="$v = $W";if(isset($le[idf_unescape($v)])){$Z[]="$v = $W";}}return ($Z&&queries("UPDATE ".table($N)." SET ".implode(", ",$Sf)." WHERE ".implode(" AND ",$Z))&&$g->affected_rows)||queries("INSERT INTO ".table($N)." (".implode(", ",array_keys($K)).") VALUES (".implode(", ",$K).")");} 
function last_id(){return 0;} 
function explain($g,$D){return $g->query("EXPLAIN $D");} 
function found_rows($O,$Z){global$g;if(ereg(" rows=([0-9]+)",$g->result("EXPLAIN SELECT * FROM ".idf_escape($O["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$Ae)){return $Ae[1];}return false;} 
function types(){return get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");} 
function schemas(){return get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");} 
function get_schema(){global$g;return $g->result("SELECT current_schema()");} 
function set_schema($Me){global$g,$T,$ef;$F=$g->query("SET search_path TO ".idf_escape($Me));foreach(types()as$S){if(!isset($T[$S])){$T[$S]=0;$ef[lang(11)][]=$S;}}return $F;} 
function use_sql($jb){return "\connect ".idf_escape($jb);} 
function show_variables(){return get_key_vals("SHOW ALL");} 
function process_list(){return get_rows("SELECT * FROM pg_stat_activity ORDER BY procpid");} 
function show_status(){} 
function support($Xb){return ereg('^(comment|view|scheme|processlist|sequence|trigger|type|variables|drop_col)$',$Xb);}$u="pgsql";$T=array();$ef=array();foreach(array(lang(12)=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),lang(13)=>array("date"=>13,"time"=>17,"timestamp"=>20,"interval"=>0),lang(14)=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),lang(15)=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),lang(16)=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),lang(17)=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$v=>$W){$T+=$W;$ef[$v]=array_keys($W);}$Rf=array();$Fd=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$lc=array("char_length","lower","round","to_hex","to_timestamp","upper");$qc=array("avg","count","count distinct","max","min","sum");$zb=array(array("char"=>"md5","date|time"=>"now",),array("int|numeric|real|money"=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$tb["oracle"]="Oracle";if(isset($_GET["oracle"])){
	$ie=array("OCI8","PDO_OCI");
	define("DRIVER","oracle");
	if(extension_loaded("oci8")){
		class Min_DB{
			var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$error;
			function _error($Ib,$k){
				if(ini_bool("html_errors")){$k=html_entity_decode(strip_tags($k));}
				$k=ereg_replace('^[^:]*: ','',$k);$this->error=$k;
			} 
			function connect($J,$U,$B){
				$this->_link=@oci_new_connect($U,$B,$J,"AL32UTF8");
				if($this->_link){$this->server_info=oci_server_version($this->_link);return true;}
				$k=oci_error();$this->error=$k["message"];return false;
			} 
			function quote($L){return "'".str_replace("'","''",$L)."'";} 
			function select_db($jb){return true;} 
			function query($D,$Lf=false){
				$E=oci_parse($this->_link,$D);
				if(!$E){$k=oci_error($this->_link);$this->error=$k["message"];return false;}
				set_error_handler(array($this,'_error'));$F=@oci_execute($E);restore_error_handler();
				if($F){if(oci_num_fields($E)){return new Min_Result($E);}$this->affected_rows=oci_num_rows($E);}return $F;
			} 
			function multi_query($D){return $this->_result=$this->query($D);} 
			function store_result(){return $this->_result;} 
			function next_result(){return false;} 
			function result($D,$l=1){$E=$this->query($D);if(!is_object($E)||!oci_fetch($E->_result)){return false;}return oci_result($E->_result,$l);}
		}
		class Min_Result{
			var$_result,$_offset=1,$num_rows;
			function Min_Result($E){$this->_result=$E;} 
			function _convert($G){foreach((array)$G
			as$v=>$W){if(is_a($W,'OCI-Lob')){$G[$v]=$W->load();}}return $G;} 
			function fetch_assoc(){return $this->_convert(oci_fetch_assoc($this->_result));} 
			function fetch_row(){return $this->_convert(oci_fetch_row($this->_result));} 
			function fetch_field(){
				$e=$this->_offset++;$F=new stdClass;
				$F->name=oci_field_name($this->_result,$e);
				$F->orgname=$F->name;
				$F->type=oci_field_type($this->_result,$e);
				$F->charsetnr=(ereg("raw|blob|bfile",$F->type)?63:0);return $F;
			} 
			function __destruct(){oci_free_statement($this->_result);}
		}
	}elseif(extension_loaded("pdo_oci")){
		class Min_DB extends Min_PDO{
			var$extension="PDO_OCI";
			function connect($J,$U,$B){$this->dsn("oci:dbname=//$J;charset=AL32UTF8",$U,$B);return true;} 
			function select_db($jb){return true;}
		}
	} 
	function idf_escape($r){return '"'.str_replace('"','""',$r).'"';} 
	function table($r){return idf_escape($r);} 
	function connect(){global$b;$g=new Min_DB;$fb=$b->credentials();if($g->connect($fb[0],$fb[1],$fb[2])){return $g;}return $g->error;} 
	function get_databases(){return get_vals("SELECT tablespace_name FROM user_tablespaces");} 
	function limit($D,$Z,$x,$A=0,$Re=" "){return ($A?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $D$Z) t WHERE rownum <= ".($x+$A).") WHERE rnum > $A":(isset($x)?" * FROM (SELECT $D$Z) WHERE rownum <= ".($x+$A):" $D$Z"));} 
	function limit1($D,$Z){return " $D$Z";} 
	function db_collation($j,$Qa){global$g;return $g->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");} 
	function engines(){return array();}
	function logged_user(){global$g;return $g->result("SELECT USER FROM DUAL");}
	function tables_list(){return get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
	UNION SELECT view_name, 'view' FROM user_views");}
	function count_tables($i){return array();}

function
table_status($_=""){$F=array();$Oe=q($_);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine" FROM all_tables WHERE tablespace_name = '.q(DB).($_!=""?" AND table_name = $Oe":"")."
UNION SELECT view_name, 'view' FROM user_views".($_!=""?" WHERE view_name = $Oe":""))as$G){if($_!=""){return $G;}$F[$G["Name"]]=$G;}return $F;} 
function 
is_view($O){return $O["Engine"]=="view";} 
function 
fk_support($O){return 
true;} 
function 
fields($N){$F=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($N)." ORDER BY column_id")as$G){$S=$G["DATA_TYPE"];$w="$G[DATA_PRECISION],$G[DATA_SCALE]";if($w==","){$w=$G["DATA_LENGTH"];}$F[$G["COLUMN_NAME"]]=array("field"=>$G["COLUMN_NAME"],"full_type"=>$S.($w?"($w)":""),"type"=>strtolower($S),"length"=>$w,"default"=>$G["DATA_DEFAULT"],"null"=>($G["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return $F;} 
function 
indexes($N,$h=null){$F=array();foreach(get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = ".q($N)."
ORDER BY uc.constraint_type, uic.column_position",$h)as$G){$F[$G["INDEX_NAME"]]["type"]=($G["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($G["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$F[$G["INDEX_NAME"]]["columns"][]=$G["COLUMN_NAME"];$F[$G["INDEX_NAME"]]["lengths"][]=($G["CHAR_LENGTH"]&&$G["CHAR_LENGTH"]!=$G["COLUMN_LENGTH"]?$G["CHAR_LENGTH"]:null);}return $F;} 
function 
view($_){$H=get_rows('SELECT text "select" FROM user_views WHERE view_name = '.q($_));return 
reset($H);} 
function 
collations(){return 
array();} 
function 
information_schema($j){return 
false;} 
function 
error(){global$g;return 
h($g->error);} 
function 
exact_value($W){return 
q($W);} 
function 
explain($g,$D){$g->query("EXPLAIN PLAN FOR $D");return $g->query("SELECT * FROM plan_table");} 
function 
found_rows($O,$Z){} 
function 
alter_table($N,$_,$m,$dc,$Ua,$Fb,$d,$_a,$Zd){$c=$ub=array();foreach($m
as$l){$W=$l[1];if($W&&$l[0]!=""&&idf_escape($l[0])!=$W[0]){queries("ALTER TABLE ".table($N)." RENAME COLUMN ".idf_escape($l[0])." TO $W[0]");}if($W){$c[]=($N!=""?($l[0]!=""?"MODIFY (":"ADD ("):"  ").implode($W).($N!=""?")":"");}else{$ub[]=idf_escape($l[0]);}}if($N==""){return 
queries("CREATE TABLE ".table($_)." (\n".implode(",\n",$c)."\n)");}return (!$c||queries("ALTER TABLE ".table($N)."\n".implode("\n",$c)))&&(!$ub||queries("ALTER TABLE ".table($N)." DROP (".implode(", ",$ub).")"))&&($N==$_||queries("ALTER TABLE ".table($N)." RENAME TO ".table($_)));} 
function 
foreign_keys($N){return 
array();} 
function 
truncate_tables($P){return 
apply_queries("TRUNCATE TABLE",$P);} 
function 
drop_views($Y){return 
apply_queries("DROP VIEW",$Y);} 
function 
drop_tables($P){return 
apply_queries("DROP TABLE",$P);} 
function 
begin(){return 
true;} 
function insert_into($N,$K)
{
	return queries("INSERT INTO ".table($N)." (".implode(", ",array_keys($K)).")\nVALUES (".implode(", ",$K).")");
} 
function 
last_id(){return 
0;} 
function 
schemas(){return 
array();} 
function 
get_schema(){return "";} 
function 
set_schema($Ne){return 
true;} 
function 
show_variables(){return 
get_key_vals('SELECT name, display_value FROM v$parameter');} 
function 
show_status(){$H=get_rows('SELECT * FROM v$instance');return 
reset($H);} 
function 
support($Xb){return 
ereg("view|drop_col|variables|status",$Xb);}$u="oracle";$T=array();$ef=array();foreach(array(lang(12)=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),lang(13)=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),lang(14)=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),lang(15)=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$v=>$W){$T+=$W;$ef[$v]=array_keys($W);}$Rf=array();$Fd=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","");$lc=array("length","lower","round","upper");$qc=array("avg","count","count distinct","max","min","sum");$zb=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$tb["mssql"]="MS SQL";if(isset($_GET["mssql"])){$ie=array("SQLSRV","MSSQL");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$k){$this->error.="$k[message]\n";}$this->error=rtrim($this->error);} 
function 
connect($J,$U,$B){$this->_link=@sqlsrv_connect($J,array("UID"=>$U,"PWD"=>$B));if($this->_link){$Ac=sqlsrv_server_info($this->_link);$this->server_info=$Ac['SQLServerVersion'];}else{$this->_get_error();}return (bool)$this->_link;} 
function 
quote($L){return "'".str_replace("'","''",$L)."'";} 
function 
select_db($jb){return $this->query("USE $jb");} 
function 
query($D,$Lf=false){$E=sqlsrv_query($this->_link,$D);if(!$E){$this->_get_error();return 
false;}return $this->store_result($E);} 
function 
multi_query($D){$this->_result=sqlsrv_query($this->_link,$D);if(!$this->_result){$this->_get_error();return 
false;}return 
true;} 
function 
store_result($E=null){if(!$E){$E=$this->_result;}if(sqlsrv_field_metadata($E)){return 
new
Min_Result($E);}$this->affected_rows=sqlsrv_rows_affected($E);return 
true;} 
function 
next_result(){return 
sqlsrv_next_result($this->_result);} 
function 
result($D,$l=0){$E=$this->query($D);if(!is_object($E)){return 
false;}$G=$E->fetch_row();return $G[$l];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
Min_Result($E){$this->_result=$E;} 
function 
_convert($G){foreach((array)$G
as$v=>$W){if(is_a($W,'DateTime')){$G[$v]=$W->format("Y-m-d H:i:s");}}return $G;} 
function 
fetch_assoc(){return $this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC,SQLSRV_SCROLL_NEXT));} 
function 
fetch_row(){return $this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC,SQLSRV_SCROLL_NEXT));} 
function 
fetch_field(){if(!$this->_fields){$this->_fields=sqlsrv_field_metadata($this->_result);}$l=$this->_fields[$this->_offset++];$F=new
stdClass;$F->name=$l["Name"];$F->orgname=$l["Name"];$F->type=($l["Type"]==1?254:0);return $F;} 
function 
seek($A){for($p=0;$p<$A;$p++){sqlsrv_fetch($this->_result);}} 
function 
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($J,$U,$B){$this->_link=@mssql_connect($J,$U,$B);if($this->_link){$E=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");$G=$E->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$G[0]] $G[1]";}else{$this->error=mssql_get_last_message();}return (bool)$this->_link;} 
function 
quote($L){return "'".str_replace("'","''",$L)."'";} 
function 
select_db($jb){return 
mssql_select_db($jb);} 
function 
query($D,$Lf=false){$E=mssql_query($D,$this->_link);if(!$E){$this->error=mssql_get_last_message();return 
false;}if($E===true){$this->affected_rows=mssql_rows_affected($this->_link);return 
true;}return 
new
Min_Result($E);} 
function 
multi_query($D){return $this->_result=$this->query($D);} 
function 
store_result(){return $this->_result;} 
function 
next_result(){return 
mssql_next_result($this->_result);} 
function 
result($D,$l=0){$E=$this->query($D);if(!is_object($E)){return 
false;}return 
mssql_result($E->_result,0,$l);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
Min_Result($E){$this->_result=$E;$this->num_rows=mssql_num_rows($E);} 
function 
fetch_assoc(){return 
mssql_fetch_assoc($this->_result);} 
function 
fetch_row(){return 
mssql_fetch_row($this->_result);} 
function 
num_rows(){return 
mssql_num_rows($this->_result);} 
function 
fetch_field(){$F=mssql_fetch_field($this->_result);$F->orgtable=$F->table;$F->orgname=$F->name;return $F;} 
function 
seek($A){mssql_data_seek($this->_result,$A);} 
function 
__destruct(){mssql_free_result($this->_result);}}} 
function 
idf_escape($r){return "[".str_replace("]","]]",$r)."]";} 
function 
table($r){return ($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($r);} 
function 
connect(){global$b;$g=new
Min_DB;$fb=$b->credentials();if($g->connect($fb[0],$fb[1],$fb[2])){return $g;}return $g->error;} 
function 
get_databases(){return 
get_vals("EXEC sp_databases");} 
function 
limit($D,$Z,$x,$A=0,$Re=" "){return (isset($x)?" TOP (".($x+$A).")":"")." $D$Z";} 
function 
limit1($D,$Z){return 
limit($D,$Z,1);} 
function 
db_collation($j,$Qa){global$g;return $g->result("SELECT collation_name FROM sys.databases WHERE name =  ".q($j));} 
function 
engines(){return 
array();} 
function 
logged_user(){global$g;return $g->result("SELECT SUSER_NAME()");} 
function 
tables_list(){return 
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");} 
function 
count_tables($i){global$g;$F=array();foreach($i
as$j){$g->select_db($j);$F[$j]=$g->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return $F;} 
function 
table_status($_=""){$F=array();foreach(get_rows("SELECT name AS Name, type_desc AS Engine FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V')".($_!=""?" AND name = ".q($_):""))as$G){if($_!=""){return $G;}$F[$G["Name"]]=$G;}return $F;} 
function 
is_view($O){return $O["Engine"]=="VIEW";} 
function 
fk_support($O){return 
true;} 
function 
fields($N){$F=array();foreach(get_rows("SELECT c.*, t.name type, d.definition [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($N))as$G){$S=$G["type"];$w=(ereg("char|binary",$S)?$G["max_length"]:($S=="decimal"?"$G[precision],$G[scale]":""));$F[$G["name"]]=array("field"=>$G["name"],"full_type"=>$S.($w?"($w)":""),"type"=>$S,"length"=>$w,"default"=>$G["default"],"null"=>$G["is_nullable"],"auto_increment"=>$G["is_identity"],"collation"=>$G["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$G["is_identity"],);}return $F;} 
function 
indexes($N,$h=null){$F=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($N),$h)as$G){$F[$G["name"]]["type"]=($G["is_primary_key"]?"PRIMARY":($G["is_unique"]?"UNIQUE":"INDEX"));$F[$G["name"]]["lengths"]=array();$F[$G["name"]]["columns"][$G["key_ordinal"]]=$G["column_name"];}return $F;} 
function 
view($_){global$g;return 
array("select"=>preg_replace('~^(?:[^[]|\\[[^]]*])*\\s+AS\\s+~isU','',$g->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($_))));} 
function 
collations(){$F=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$d){$F[ereg_replace("_.*","",$d)][]=$d;}return $F;} 
function 
information_schema($j){return 
false;} 
function 
error(){global$g;return 
nl_br(h(preg_replace('~^(\\[[^]]*])+~m','',$g->error)));} 
function 
exact_value($W){return 
q($W);} 
function 
create_database($j,$d){return 
queries("CREATE DATABASE ".idf_escape($j).(eregi('^[a-z0-9_]+$',$d)?" COLLATE $d":""));} 
function 
drop_databases($i){return 
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$i)));} 
function 
rename_database($_,$d){if(eregi('^[a-z0-9_]+$',$d)){queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $d");}queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($_));return 
true;} 
function 
auto_increment(){return " IDENTITY".($_POST["Auto_increment"]!=""?"(".(+$_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";} 
function 
alter_table($N,$_,$m,$dc,$Ua,$Fb,$d,$_a,$Zd){$c=array();foreach($m
as$l){$e=idf_escape($l[0]);$W=$l[1];if(!$W){$c["DROP"][]=" COLUMN $e";}else{$W[1]=preg_replace("~( COLLATE )'(\\w+)'~","\\1\\2",$W[1]);if($l[0]==""){$c["ADD"][]="\n  ".implode("",$W).($N==""?substr($dc[$W[0]],16+strlen($W[0])):"");}else{unset($W[6]);if($e!=$W[0]){queries("EXEC sp_rename ".q(table($N).".$e").", ".q(idf_unescape($W[0])).", 'COLUMN'");}$c["ALTER COLUMN ".implode("",$W)][]="";}}}if($N==""){return 
queries("CREATE TABLE ".table($_)." (".implode(",",(array)$c["ADD"])."\n)");}if($N!=$_){queries("EXEC sp_rename ".q(table($N)).", ".q($_));}if($dc){$c[""]=$dc;}foreach($c
as$v=>$W){if(!queries("ALTER TABLE ".idf_escape($_)." $v".implode(",",$W))){return 
false;}}return 
true;} 
function 
alter_indexes($N,$c){$s=array();$ub=array();foreach($c
as$W){if($W[2]=="DROP"){if($W[0]=="PRIMARY"){$ub[]=idf_escape($W[1]);}else{$s[]=idf_escape($W[1])." ON ".table($N);}}elseif(!queries(($W[0]!="PRIMARY"?"CREATE $W[0] ".($W[0]!="INDEX"?"INDEX ":"").idf_escape($W[1]!=""?$W[1]:uniqid($N."_"))." ON ".table($N):"ALTER TABLE ".table($N)." ADD PRIMARY KEY")." $W[2]")){return 
false;}}return (!$s||queries("DROP INDEX ".implode(", ",$s)))&&(!$ub||queries("ALTER TABLE ".table($N)." DROP ".implode(", ",$ub)));} 
function 
begin(){return 
queries("BEGIN TRANSACTION");} 
function 
insert_into($N,$K){return 
queries("INSERT INTO ".table($N).($K?" (".implode(", ",array_keys($K)).")\nVALUES (".implode(", ",$K).")":"DEFAULT VALUES"));} 
function 
insert_update($N,$K,$le){$Sf=array();$Z=array();foreach($K
as$v=>$W){$Sf[]="$v = $W";if(isset($le[idf_unescape($v)])){$Z[]="$v = $W";}}return 
queries("MERGE ".table($N)." USING (VALUES(".implode(", ",$K).")) AS source (c".implode(", c",range(1,count($K))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Sf)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($K)).") VALUES (".implode(", ",$K).");");} 
function 
last_id(){global$g;return $g->result("SELECT SCOPE_IDENTITY()");} 
function 
explain($g,$D){$g->query("SET SHOWPLAN_ALL ON");$F=$g->query($D);$g->query("SET SHOWPLAN_ALL OFF");return $F;} 
function 
found_rows($O,$Z){} 
function 
foreign_keys($N){$F=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($N))as$G){$n=&$F[$G["FK_NAME"]];$n["table"]=$G["PKTABLE_NAME"];$n["source"][]=$G["FKCOLUMN_NAME"];$n["target"][]=$G["PKCOLUMN_NAME"];}return $F;} 
function 
truncate_tables($P){return 
apply_queries("TRUNCATE TABLE",$P);} 
function 
drop_views($Y){return 
queries("DROP VIEW ".implode(", ",array_map('table',$Y)));} 
function 
drop_tables($P){return 
queries("DROP TABLE ".implode(", ",array_map('table',$P)));} 
function 
move_tables($P,$Y,$tf){return 
apply_queries("ALTER SCHEMA ".idf_escape($tf)." TRANSFER",array_merge($P,$Y));} 
function 
trigger($_){if($_==""){return 
array();}$H=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($_));$F=reset($H);if($F){$F["Statement"]=preg_replace('~^.+\\s+AS\\s+~isU','',$F["text"]);}return $F;} 
function 
triggers($N){$F=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($N))as$G){$F[$G["name"]]=array($G["Timing"],$G["Event"]);}return $F;} 
function 
trigger_options(){return 
array("Timing"=>array("AFTER","INSTEAD OF"),"Type"=>array("AS"),);} 
function 
schemas(){return 
get_vals("SELECT name FROM sys.schemas");} 
function 
get_schema(){global$g;if($_GET["ns"]!=""){return $_GET["ns"];}return $g->result("SELECT SCHEMA_NAME()");} 
function 
set_schema($Me){return 
true;} 
function 
use_sql($jb){return "USE ".idf_escape($jb);} 
function 
show_variables(){return 
array();} 
function 
show_status(){return 
array();} 
function 
support($Xb){return 
ereg('^(scheme|trigger|view|drop_col)$',$Xb);}$u="mssql";$T=array();$ef=array();foreach(array(lang(12)=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),lang(13)=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),lang(14)=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),lang(15)=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$v=>$W){$T+=$W;$ef[$v]=array_keys($W);}$Rf=array();$Fd=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$lc=array("len","lower","round","upper");$qc=array("avg","count","count distinct","max","min","sum");$zb=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$tb=array("server"=>"MySQL")+$tb;if(!defined("DRIVER")){$ie=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
Min_DB(){parent::init();} 
function 
connect($J,$U,$B){mysqli_report(MYSQLI_REPORT_OFF);list($uc,$ee)=explode(":",$J,2);$F=@$this->real_connect(($J!=""?$uc:ini_get("mysqli.default_host")),($J.$U!=""?$U:ini_get("mysqli.default_user")),($J.$U.$B!=""?$B:ini_get("mysqli.default_pw")),null,(is_numeric($ee)?$ee:ini_get("mysqli.default_port")),(!is_numeric($ee)?$ee:null));if($F){if(method_exists($this,'set_charset')){$this->set_charset("utf8");}else{$this->query("SET NAMES utf8");}}return $F;} 
function 
result($D,$l=0){$E=$this->query($D);if(!$E){return 
false;}$G=$E->fetch_array();return $G[$l];} 
function 
quote($L){return "'".$this->escape_string($L)."'";}}}elseif(extension_loaded("mysql")){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$error,$_link,$_result;function
connect($J,$U,$B){$this->_link=@mysql_connect(($J!=""?$J:ini_get("mysql.default_host")),("$J$U"!=""?$U:ini_get("mysql.default_user")),("$J$U$B"!=""?$B:ini_get("mysql.default_password")),true,131072);if($this->_link){$this->server_info=mysql_get_server_info($this->_link);if(function_exists('mysql_set_charset')){mysql_set_charset("utf8",$this->_link);}else{$this->query("SET NAMES utf8");}}else{$this->error=mysql_error();}return (bool)$this->_link;} 
function 
quote($L){return "'".mysql_real_escape_string($L,$this->_link)."'";} 
function 
select_db($jb){return 
mysql_select_db($jb,$this->_link);} 
function 
query($D,$Lf=false){$E=@($Lf?mysql_unbuffered_query($D,$this->_link):mysql_query($D,$this->_link));if(!$E){$this->error=mysql_error($this->_link);return 
false;}if($E===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return 
true;}return 
new
Min_Result($E);} 
function 
multi_query($D){return $this->_result=$this->query($D);} 
function 
store_result(){return $this->_result;} 
function 
next_result(){return 
false;} 
function 
result($D,$l=0){$E=$this->query($D);if(!$E||!$E->num_rows){return 
false;}return 
mysql_result($E->_result,0,$l);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
Min_Result($E){$this->_result=$E;$this->num_rows=mysql_num_rows($E);} 
function 
fetch_assoc(){return 
mysql_fetch_assoc($this->_result);} 
function 
fetch_row(){return 
mysql_fetch_row($this->_result);} 
function 
fetch_field(){$F=mysql_fetch_field($this->_result,$this->_offset++);$F->orgtable=$F->table;$F->orgname=$F->name;$F->charsetnr=($F->blob?63:0);return $F;} 
function 
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($J,$U,$B){$this->dsn("mysql:host=".str_replace(":",";unix_socket=",preg_replace('~:(\\d)~',';port=\\1',$J)),$U,$B);$this->query("SET NAMES utf8");return 
true;} 
function 
select_db($jb){return $this->query("USE ".idf_escape($jb));} 
function 
query($D,$Lf=false){$this->setAttribute(1000,!$Lf);return 
parent::query($D,$Lf);}}} 
function 
idf_escape($r){return "`".str_replace("`","``",$r)."`";} 
function 
table($r){return 
idf_escape($r);} 
function 
connect(){global$b;$g=new
Min_DB;$fb=$b->credentials();if($g->connect($fb[0],$fb[1],$fb[2])){$g->query("SET sql_quote_show_create = 1");return $g;}$F=$g->error;if(function_exists('iconv')&&!is_utf8($F)&&strlen($Ke=iconv("windows-1250","utf-8",$F))>strlen($F)){$F=$Ke;}return $F;} 
function 
get_databases($cc=true){global$g;$F=&get_session("dbs");if(!isset($F)){if($cc){restart_session();ob_flush();flush();}$F=get_vals($g->server_info>=5?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA":"SHOW DATABASES");}return $F;} 
function 
limit($D,$Z,$x,$A=0,$Re=" "){return " $D$Z".(isset($x)?$Re."LIMIT $x".($A?" OFFSET $A":""):"");} 
function 
limit1($D,$Z){return 
limit($D,$Z,1);} 
function 
db_collation($j,$Qa){global$g;$F=null;$cb=$g->result("SHOW CREATE DATABASE ".idf_escape($j),1);if(preg_match('~ COLLATE ([^ ]+)~',$cb,$z)){$F=$z[1];}elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$cb,$z)){$F=$Qa[$z[1]][-1];}return $F;} 
function 
engines(){$F=array();foreach(get_rows("SHOW ENGINES")as$G){if(ereg("YES|DEFAULT",$G["Support"])){$F[]=$G["Engine"];}}return $F;} 
function 
logged_user(){global$g;return $g->result("SELECT USER()");} 
function 
tables_list(){global$g;return 
get_key_vals("SHOW".($g->server_info>=5?" FULL":"")." TABLES");} 
function 
count_tables($i){$F=array();foreach($i
as$j){$F[$j]=count(get_vals("SHOW TABLES IN ".idf_escape($j)));}return $F;} 
function 
table_status($_=""){$F=array();foreach(get_rows("SHOW TABLE STATUS".($_!=""?" LIKE ".q(addcslashes($_,"%_")):""))as$G){if($G["Engine"]=="InnoDB"){$G["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$G["Comment"]);}if(!isset($G["Rows"])){$G["Comment"]="";}if($_!=""){return $G;}$F[$G["Name"]]=$G;}return $F;} 
function 
is_view($O){return !isset($O["Rows"]);} 
function 
fk_support($O){return 
eregi("InnoDB|IBMDB2I",$O["Engine"]);} 
function 
fields($N){$F=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($N))as$G){preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~',$G["Type"],$z);$F[$G["Field"]]=array("field"=>$G["Field"],"full_type"=>$G["Type"],"type"=>$z[1],"length"=>$z[2],"unsigned"=>ltrim($z[3].$z[4]),"default"=>($G["Default"]!=""||ereg("char",$z[1])?$G["Default"]:null),"null"=>($G["Null"]=="YES"),"auto_increment"=>($G["Extra"]=="auto_increment"),"on_update"=>(eregi('^on update (.+)',$G["Extra"],$z)?$z[1]:""),"collation"=>$G["Collation"],"privileges"=>array_flip(explode(",",$G["Privileges"])),"comment"=>$G["Comment"],"primary"=>($G["Key"]=="PRI"),);}return $F;} 
function 
indexes($N,$h=null){$F=array();foreach(get_rows("SHOW INDEX FROM ".table($N),$h)as$G){$F[$G["Key_name"]]["type"]=($G["Key_name"]=="PRIMARY"?"PRIMARY":($G["Index_type"]=="FULLTEXT"?"FULLTEXT":($G["Non_unique"]?"INDEX":"UNIQUE")));$F[$G["Key_name"]]["columns"][]=$G["Column_name"];$F[$G["Key_name"]]["lengths"][]=$G["Sub_part"];}return $F;} 
function 
foreign_keys($N){global$g,$Bd;static$ce='`(?:[^`]|``)+`';$F=array();$db=$g->result("SHOW CREATE TABLE ".table($N),1);if($db){preg_match_all("~CONSTRAINT ($ce) FOREIGN KEY \\(((?:$ce,? ?)+)\\) REFERENCES ($ce)(?:\\.($ce))? \\(((?:$ce,? ?)+)\\)(?: ON DELETE ($Bd))?(?: ON UPDATE ($Bd))?~",$db,$ad,PREG_SET_ORDER);foreach($ad
as$z){preg_match_all("~$ce~",$z[2],$We);preg_match_all("~$ce~",$z[5],$tf);$F[idf_unescape($z[1])]=array("db"=>idf_unescape($z[4]!=""?$z[3]:$z[4]),"table"=>idf_unescape($z[4]!=""?$z[4]:$z[3]),"source"=>array_map('idf_unescape',$We[0]),"target"=>array_map('idf_unescape',$tf[0]),"on_delete"=>$z[6],"on_update"=>$z[7],);}}return $F;} 
function 
view($_){global$g;return 
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\\s+AS\\s+~isU','',$g->result("SHOW CREATE VIEW ".table($_),1)));} 
function 
collations(){$F=array();foreach(get_rows("SHOW COLLATION")as$G){if($G["Default"]){$F[$G["Charset"]][-1]=$G["Collation"];}else{$F[$G["Charset"]][]=$G["Collation"];}}ksort($F);foreach($F
as$v=>$W){asort($F[$v]);}return $F;} 
function 
information_schema($j){global$g;return ($g->server_info>=5&&$j=="information_schema");} 
function 
error(){global$g;return 
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$g->error));} 
function 
exact_value($W){return 
q($W)." COLLATE utf8_bin";} 
function 
create_database($j,$d){set_session("dbs",null);return 
queries("CREATE DATABASE ".idf_escape($j).($d?" COLLATE ".q($d):""));} 
function 
drop_databases($i){set_session("dbs",null);return 
apply_queries("DROP DATABASE",$i,'idf_escape');} 
function 
rename_database($_,$d){if(create_database($_,$d)){$Be=array();foreach(tables_list()as$N=>$S){$Be[]=table($N)." TO ".idf_escape($_).".".table($N);}if(!$Be||queries("RENAME TABLE ".implode(", ",$Be))){queries("DROP DATABASE ".idf_escape(DB));return 
true;}}return 
false;} 
function 
auto_increment(){$Aa=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$s){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$s["columns"],true)){$Aa="";break;}if($s["type"]=="PRIMARY"){$Aa=" UNIQUE";}}}return " AUTO_INCREMENT$Aa";} 
function 
alter_table($N,$_,$m,$dc,$Ua,$Fb,$d,$_a,$Zd){$c=array();foreach($m
as$l){$c[]=($l[1]?($N!=""?($l[0]!=""?"CHANGE ".idf_escape($l[0]):"ADD"):" ")." ".implode($l[1]).($N!=""?" $l[2]":""):"DROP ".idf_escape($l[0]));}$c=array_merge($c,$dc);$af="COMMENT=".q($Ua).($Fb?" ENGINE=".q($Fb):"").($d?" COLLATE ".q($d):"").($_a!=""?" AUTO_INCREMENT=$_a":"").$Zd;if($N==""){return 
queries("CREATE TABLE ".table($_)." (\n".implode(",\n",$c)."\n) $af");}if($N!=$_){$c[]="RENAME TO ".table($_);}$c[]=$af;return 
queries("ALTER TABLE ".table($N)."\n".implode(",\n",$c));} 
function 
alter_indexes($N,$c){foreach($c
as$v=>$W){$c[$v]=($W[2]=="DROP"?"\nDROP INDEX ".idf_escape($W[1]):"\nADD $W[0] ".($W[0]=="PRIMARY"?"KEY ":"").($W[1]!=""?idf_escape($W[1])." ":"").$W[2]);}return 
queries("ALTER TABLE ".table($N).implode(",",$c));} 
function 
truncate_tables($P){return 
apply_queries("TRUNCATE TABLE",$P);} 
function 
drop_views($Y){return 
queries("DROP VIEW ".implode(", ",array_map('table',$Y)));} 
function 
drop_tables($P){return 
queries("DROP TABLE ".implode(", ",array_map('table',$P)));} 
function 
move_tables($P,$Y,$tf){$Be=array();foreach(array_merge($P,$Y)as$N){$Be[]=table($N)." TO ".idf_escape($tf).".".table($N);}return 
queries("RENAME TABLE ".implode(", ",$Be));} 
function 
copy_tables($P,$Y,$tf){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($P
as$N){$_=($tf==DB?table("copy_$N"):idf_escape($tf).".".table($N));if(!queries("DROP TABLE IF EXISTS $_")||!queries("CREATE TABLE $_ LIKE ".table($N))||!queries("INSERT INTO $_ SELECT * FROM ".table($N))){return 
false;}}foreach($Y
as$N){$_=($tf==DB?table("copy_$N"):idf_escape($tf).".".table($N));$Zf=view($N);if(!queries("DROP VIEW IF EXISTS $_")||!queries("CREATE VIEW $_ AS $Zf[select]")){return 
false;}}return 
true;} 
function 
trigger($_){if($_==""){return 
array();}$H=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($_));return 
reset($H);} 
function 
triggers($N){$F=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($N,"%_")))as$G){$F[$G["Trigger"]]=array($G["Timing"],$G["Event"]);}return $F;} 
function 
trigger_options(){return 
array("Timing"=>array("BEFORE","AFTER"),"Type"=>array("FOR EACH ROW"),);} 
function 
routine($_,$S){global$g,$Hb,$Cc,$T;$va=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$Kf="((".implode("|",array_merge(array_keys($T),$va)).")(?:\\s*\\(((?:[^'\")]*|$Hb)+)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s]+)['\"]?)?";$ce="\\s*(".($S=="FUNCTION"?"":$Cc).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Kf";$cb=$g->result("SHOW CREATE $S ".idf_escape($_),2);preg_match("~\\(((?:$ce\\s*,?)*)\\)".($S=="FUNCTION"?"\\s*return S\\s+$Kf":"")."\\s*(.*)~is",$cb,$z);$m=array();preg_match_all("~$ce\\s*,?~is",$z[1],$ad,PREG_SET_ORDER);foreach($ad
as$Ud){$_=str_replace("``","`",$Ud[2]).$Ud[3];$m[]=array("field"=>$_,"type"=>strtolower($Ud[5]),"length"=>preg_replace_callback("~$Hb~s",'normalize_enum',$Ud[6]),"unsigned"=>strtolower(preg_replace('~\\s+~',' ',trim("$Ud[8] $Ud[7]"))),"full_type"=>$Ud[4],"inout"=>strtoupper($Ud[1]),"collation"=>strtolower($Ud[9]),);}if($S!="FUNCTION"){return 
array("fields"=>$m,"definition"=>$z[11]);}return 
array("fields"=>$m,"return s"=>array("type"=>$z[12],"length"=>$z[13],"unsigned"=>$z[15],"collation"=>$z[16]),"definition"=>$z[17],"language"=>"SQL",);} 
function 
routines(){return 
get_rows("SELECT * FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));} 
function 
routine_languages(){return 
array();} 
function 
begin(){return 
queries("BEGIN");} 

function insert_into($N,$K)
{
	return queries("INSERT INTO ".table($N)." (".implode(", ",array_keys($K)).")\nVALUES (".implode(", ",$K).")");
} 

function insert_update($N,$K,$le)
{
	foreach($K as$v=>$W){$K[$v]="$v = $W";}
	$Sf=implode(", ",$K);
	return queries("INSERT INTO ".table($N)." SET $Sf ON DUPLICATE KEY UPDATE $Sf");
} 
function 
last_id(){global$g;return $g->result("SELECT LAST_INSERT_ID()");} 
function 
explain($g,$D){return $g->query("EXPLAIN $D");} 
function 
found_rows($O,$Z){return ($Z||$O["Engine"]!="InnoDB"?null:$O["Rows"]);} 
function 
types(){return 
array();} 
function 
schemas(){return 
array();} 
function 
get_schema(){return "";} 
function 
set_schema($Me){return 
true;} 
function 
create_sql($N,$_a){global$g;$F=$g->result("SHOW CREATE TABLE ".table($N),1);if(!$_a){$F=preg_replace('~ AUTO_INCREMENT=\\d+~','',$F);}return $F;} 
function 
truncate_sql($N){return "TRUNCATE ".table($N);} 
function 
use_sql($jb){return "USE ".idf_escape($jb);} 
function 
trigger_sql($N,$M){$F="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($N,"%_")),null,"-- ")as$G){$F.="\n".($M=='CREATE+ALTER'?"DROP TRIGGER IF EXISTS ".idf_escape($G["Trigger"]).";;\n":"")."CREATE TRIGGER ".idf_escape($G["Trigger"])." $G[Timing] $G[Event] ON ".table($G["Table"])." FOR EACH ROW\n$G[Statement];;\n";}return $F;} 
function 
show_variables(){return 
get_key_vals("SHOW VARIABLES");} 
function 
process_list(){return 
get_rows("SHOW FULL PROCESSLIST");} 
function 
show_status(){return 
get_key_vals("SHOW STATUS");} 
function support($Xb){
	global$g;
	return !ereg("scheme|sequence|type".($g->server_info<5.1?"|event|partitioning".($g->server_info<5?"|view|routine|trigger":""):""),$Xb);
}
$u="sql";$T=array();$ef=array();
foreach(array(
	lang(12)=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),
	lang(13)=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),
	lang(14)=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),
	lang(15)=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),
	lang(18)=>array("enum"=>65535,"set"=>64),)as$v=>$W){
	$T+=$W;$ef[$v]=array_keys($W);
}

$Rf=array("unsigned","zerofill","unsigned zerofill");
$Fd=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","");
$lc=array("char_length","date","from_unixtime","hex","lower","round","sec_to_time","time_to_sec","upper");
$qc=array("avg","count","count distinct","group_concat","max","min","sum");
$zb=array(
	array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1/hex","date|time"=>"now",),
	array("int|float|double|decimal"=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",)
);

}
define("SERVER",$_GET[DRIVER]);
define("DB",$_GET["db"]);
define("ME",preg_replace('~^[^?]*/([^?]*).*~','\\1',$_SERVER["REQUEST_URI"]).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));
$ia="3.3.3";
class Adminer{
	var$operators;
	function name(){return "<a href='http://www.adminer.org/' id='h1'>Adminer</a>";} 
function 
credentials(){return 
array(SERVER,$_GET["username"],get_session("pwds"));} 
function 
permanentLogin(){return 
password_file();} 
function 
database(){return 
DB;} 
function 
headers(){return 
true;} 
function 
head(){return 
true;} 
function 
loginForm(){global$tb;echo'<table cellspacing="0">
<tr><th>',lang(19),'<td>',html_select("driver",$tb,DRIVER,"loginDriver(this);"),'<tr><th>',lang(20),'<td><input name="server" value="',h(SERVER),'" title="hostname[:port]">
<tr><th>',lang(21),'<td><input id="username" name="username" value="',h($_GET["username"]),'">
<tr><th>',lang(22);?><td><input type="password" name="password">
</table>
<script type="text/javascript">
var username = document.getElementById('username');
username.focus();
username.form['driver'].onchange();
</script>
<?php

echo"<p><input type='submit' value='".lang(23)."'>\n",checkbox("permanent",1,$_COOKIE["adminer_permanent"],lang(24))."\n";} 
function 
login($Xc,$B){return 
true;} 
function 
tableName($lf){return 
h($lf["Name"]);} 
function 
fieldName($l,$Jd=0){return '<span title="'.h($l["full_type"]).'">'.h($l["field"]).'</span>';} 
function 
selectLinks($lf,$K=""){echo'<p class="tabs">';$Vc=array("select"=>lang(25),"table"=>lang(26));if(is_view($lf)){$Vc["view"]=lang(27);}else{$Vc["create"]=lang(28);}if(isset($K)){$Vc["edit"]=lang(29);}foreach($Vc
as$v=>$W){echo" <a href='".h(ME)."$v=".urlencode($lf["Name"]).($v=="edit"?$K:"")."'".bold(isset($_GET[$v])).">$W</a>";}echo"\n";} 
function 
foreignKeys($N){return 
foreign_keys($N);} 
function 
backwardKeys($N,$kf){return 
array();} 
function 
backwardKeysPrint($Ca,$G){} 
function 
selectQuery($D){global$u;return "<p><a href='".h(remove_from_uri("page"))."&amp;page=last' title='".lang(30)."'>&gt;&gt;</a> <code class='jush-$u'>".h(str_replace("\n"," ",$D))."</code> <a href='".h(ME)."sql=".urlencode($D)."'>".lang(31)."</a></p>\n";} 
function 
rowDescription($N){return "";} 
function 
rowDescriptions($H,$ec){return $H;} 
function 
selectVal($W,$y,$l){$F=($W!="<i>NULL</i>"&&ereg("char|binary",$l["type"])&&!ereg("var",$l["type"])?"<code>$W</code>":$W);if(ereg('blob|bytea|raw|file',$l["type"])&&!is_utf8($W)){$F=lang(32,strlen(html_entity_decode($W,ENT_QUOTES)));}return ($y?"<a href='$y'>$F</a>":$F);} 
function 
editVal($W,$l){return (ereg("binary",$l["type"])?reset(unpack("H*",$W)):$W);} 
function 
selectColumnsPrint($I,$f){global$lc,$qc;print_fieldset("select",lang(33),$I);$p=0;$kc=array(lang(34)=>$lc,lang(35)=>$qc);foreach($I
as$v=>$W){$W=$_GET["columns"][$v];echo"<div>".html_select("columns[$p][fun]",array(-1=>"")+$kc,$W["fun"]),"(<select name='columns[$p][col]'><option>".optionlist($f,$W["col"],true)."</select>)</div>\n";$p++;}echo"<div>".html_select("columns[$p][fun]",array(-1=>"")+$kc,"","this.nextSibling.nextSibling.onchange();"),"(<select name='columns[$p][col]' onchange='selectAddRow(this);'><option>".optionlist($f,null,true)."</select>)</div>\n","</div></fieldset>\n";} 
function 
selectSearchPrint($Z,$f,$t){print_fieldset("search",lang(36),$Z);foreach($t
as$p=>$s){if($s["type"]=="FULLTEXT"){echo"(<i>".implode("</i>, <i>",array_map('h',$s["columns"]))."</i>) AGAINST"," <input name='fulltext[$p]' value='".h($_GET["fulltext"][$p])."'>",checkbox("boolean[$p]",1,isset($_GET["boolean"][$p]),"BOOL"),"<br>\n";}}$p=0;foreach((array)$_GET["where"]as$W){if("$W[col]$W[val]"!=""&&in_array($W["op"],$this->operators)){echo"<div><select name='where[$p][col]'><option value=''>(".lang(37).")".optionlist($f,$W["col"],true)."</select>",html_select("where[$p][op]",$this->operators,$W["op"]),"<input name='where[$p][val]' value='".h($W["val"])."'></div>\n";$p++;}}echo"<div><select name='where[$p][col]' onchange='selectAddRow(this);'><option value=''>(".lang(37).")".optionlist($f,null,true)."</select>",html_select("where[$p][op]",$this->operators,"="),"<input name='where[$p][val]'></div>\n","</div></fieldset>\n";} 
function 
selectOrderPrint($Jd,$f,$t){print_fieldset("sort",lang(38),$Jd);$p=0;foreach((array)$_GET["order"]as$v=>$W){if(isset($f[$W])){echo"<div><select name='order[$p]'><option>".optionlist($f,$W,true)."</select>",checkbox("desc[$p]",1,isset($_GET["desc"][$v]),lang(39))."</div>\n";$p++;}}echo"<div><select name='order[$p]' onchange='selectAddRow(this);'><option>".optionlist($f,null,true)."</select>","<label><input type='checkbox' name='desc[$p]' value='1'>".lang(39)."</label></div>\n";echo"</div></fieldset>\n";} 
function 
selectLimitPrint($x){echo"<fieldset><legend>".lang(40)."</legend><div>";echo"<input name='limit' size='3' value='".h($x)."'>","</div></fieldset>\n";} 
function 
selectLengthPrint($wf){if(isset($wf)){echo"<fieldset><legend>".lang(41)."</legend><div>",'<input name="text_length" size="3" value="'.h($wf).'">',"</div></fieldset>\n";}} 
function 
selectActionPrint(){echo"<fieldset><legend>".lang(42)."</legend><div>","<input type='submit' value='".lang(33)."'>","</div></fieldset>\n";} 
function 
selectCommandPrint(){return !information_schema(DB);} 
function 
selectImportPrint(){return 
true;} 
function 
selectEmailPrint($Bb,$f){} 
function 
selectColumnsProcess($f,$t){global$lc,$qc;$I=array();$oc=array();foreach((array)$_GET["columns"]as$v=>$W){if($W["fun"]=="count"||(isset($f[$W["col"]])&&(!$W["fun"]||in_array($W["fun"],$lc)||in_array($W["fun"],$qc)))){$I[$v]=apply_sql_function($W["fun"],(isset($f[$W["col"]])?idf_escape($W["col"]):"*"));if(!in_array($W["fun"],$qc)){$oc[]=$I[$v];}}}return 
array($I,$oc);} 
function 
selectSearchProcess($m,$t){global$u;$F=array();foreach($t
as$p=>$s){if($s["type"]=="FULLTEXT"&&$_GET["fulltext"][$p]!=""){$F[]="MATCH (".implode(", ",array_map('idf_escape',$s["columns"])).") AGAINST (".q($_GET["fulltext"][$p]).(isset($_GET["boolean"][$p])?" IN BOOLEAN MODE":"").")";}}foreach((array)$_GET["where"]as$W){if("$W[col]$W[val]"!=""&&in_array($W["op"],$this->operators)){$Xa=" $W[op]";if(ereg('IN$',$W["op"])){$yc=process_length($W["val"]);$Xa.=" (".($yc!=""?$yc:"NULL").")";}elseif(!$W["op"]){$Xa.=$W["val"];}elseif($W["op"]=="LIKE %%"){$Xa=" LIKE ".$this->processInput($m[$W["col"]],"%$W[val]%");}elseif(!ereg('NULL$',$W["op"])){$Xa.=" ".$this->processInput($m[$W["col"]],$W["val"]);}if($W["col"]!=""){$F[]=idf_escape($W["col"]).$Xa;}else{$Ra=array();foreach($m
as$_=>$l){if(is_numeric($W["val"])||!ereg('int|float|double|decimal',$l["type"])){$_=idf_escape($_);$Ra[]=($u=="sql"&&ereg('char|text|enum|set',$l["type"])&&!ereg('^utf8',$l["collation"])?"CONVERT($_ USING utf8)":$_);}}$F[]=($Ra?"(".implode("$Xa OR ",$Ra)."$Xa)":"0");}}}return $F;} 
function 
selectOrderProcess($m,$t){$F=array();foreach((array)$_GET["order"]as$v=>$W){if(isset($m[$W])||preg_match('~^((COUNT\\(DISTINCT |[A-Z0-9_]+\\()(`(?:[^`]|``)+`|"(?:[^"]|"")+")\\)|COUNT\\(\\*\\))$~',$W)){$F[]=(isset($m[$W])?idf_escape($W):$W).(isset($_GET["desc"][$v])?" DESC":"");}}return $F;} 
function 
selectLimitProcess(){return (isset($_GET["limit"])?$_GET["limit"]:"30");} 
function 
selectLengthProcess(){return (isset($_GET["text_length"])?$_GET["text_length"]:"100");} 
function 
selectEmailProcess($Z,$ec){return 
false;} 
function 
messageQuery($D){global$u;static$bb=0;restart_session();$q="sql-".($bb++);$sc=&get_session("queries");if(strlen($D)>1e6){$D=ereg_replace('[\x80-\xFF]+$','',substr($D,0,1e6))."\n...";}$sc[$_GET["db"]][]=$D;return " <a href='#$q' onclick=\"return  !toggle('$q');\">".lang(43)."</a><div id='$q' class='hidden'><pre><code class='jush-$u'>".shorten_utf8($D,1000).'</code></pre><p><a href="'.h(str_replace("db=".urlencode(DB),"db=".urlencode($_GET["db"]),ME).'sql=&history='.(count($sc[$_GET["db"]])-1)).'">'.lang(31).'</a></div>';} 
function 
editFunctions($l){global$zb;$F=($l["null"]?"NULL/":"");foreach($zb
as$v=>$lc){if(!$v||(!isset($_GET["call"])&&(isset($_GET["select"])||where($_GET)))){foreach($lc
as$ce=>$W){if(!$ce||ereg($ce,$l["type"])){$F.="/$W";}}if($v&&!ereg('set|blob|bytea|raw|file',$l["type"])){$F.="/=";}}}return 
explode("/",$F);} 
function 
editInput($N,$l,$za,$X){if($l["type"]=="enum"){return (isset($_GET["select"])?"<label><input type='radio'$za value='-1' checked><i>".lang(5)."</i></label> ":"").($l["null"]?"<label><input type='radio'$za value=''".(isset($X)||isset($_GET["select"])?"":" checked")."><i>NULL</i></label> ":"").enum_input("radio",$za,$l,$X,0);}return "";} 
function 
processInput($l,$X,$o=""){if($o=="="){return $X;}$_=$l["field"];$F=($l["type"]=="bit"&&ereg("^([0-9]+|b'[0-1]+')\$",$X)?$X:q($X));if(ereg('^(now|getdate|uuid)$',$o)){$F="$o()";}elseif(ereg('^current_(date|timestamp)$',$o)){$F=$o;}elseif(ereg('^([+-]|\\|\\|)$',$o)){$F=idf_escape($_)." $o $F";}elseif(ereg('^[+-] interval$',$o)){$F=idf_escape($_)." $o ".(preg_match("~^(\\d+|'[0-9.: -]') [A-Z_]+$~i",$X)?$X:$F);}elseif(ereg('^(addtime|subtime|concat)$',$o)){$F="$o(".idf_escape($_).", $F)";}elseif(ereg('^(md5|sha1|password|encrypt|hex)$',$o)){$F="$o($F)";}if(ereg("binary",$l["type"])){$F="unhex($F)";}return $F;} 
function 
dumpOutput(){$F=array('text'=>lang(44),'file'=>lang(45));if(function_exists('gzencode')){$F['gz']='gzip';}if(function_exists('bzcompress')){$F['bz2']='bzip2';}return $F;} 
function 
dumpFormat(){return 
array('sql'=>'SQL','csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');} 
function 
dumpTable($N,$M,$Hc=false){if($_POST["format"]!="sql"){echo"\xef\xbb\xbf";if($M){dump_csv(array_keys(fields($N)));}}elseif($M){$cb=create_sql($N,$_POST["auto_increment"]);if($cb){if($M=="DROP+CREATE"){echo"DROP ".($Hc?"VIEW":"TABLE")." IF EXISTS ".table($N).";\n";}if($Hc){$cb=preg_replace('~^([A-Z =]+) DEFINER=`'.preg_replace('~@(.*)~','`@`(%|\\1)',logged_user()).'`~','\\1',$cb);}echo($M!="CREATE+ALTER"?$cb:($Hc?substr_replace($cb," OR REPLACE",6,0):substr_replace($cb," IF NOT EXISTS",12,0))).";\n\n";}if($M=="CREATE+ALTER"&&!$Hc){$D="SELECT COLUMN_NAME, COLUMN_DEFAULT, IS_NULLABLE, COLLATION_NAME, COLUMN_TYPE, EXTRA, COLUMN_COMMENT FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ".q($N)." ORDER BY ORDINAL_POSITION";echo"DELIMITER ;;
CREATE PROCEDURE adminer_alter (INOUT alter_command text) BEGIN
	DECLARE _column_name, _collation_name, after varchar(64) DEFAULT '';
	DECLARE _column_type, _column_default text;
	DECLARE _is_nullable char(3);
	DECLARE _extra varchar(30);
	DECLARE _column_comment varchar(255);
	DECLARE done, set_after bool DEFAULT 0;
	DECLARE add_columns text DEFAULT '";$m=array();$ua="";foreach(get_rows($D)as$G){$mb=$G["COLUMN_DEFAULT"];$G["default"]=(isset($mb)?q($mb):"NULL");$G["after"]=q($ua);$G["alter"]=escape_string(idf_escape($G["COLUMN_NAME"])." $G[COLUMN_TYPE]".($G["COLLATION_NAME"]?" COLLATE $G[COLLATION_NAME]":"").(isset($mb)?" DEFAULT ".($mb=="CURRENT_TIMESTAMP"?$mb:$G["default"]):"").($G["IS_NULLABLE"]=="YES"?"":" NOT NULL").($G["EXTRA"]?" $G[EXTRA]":"").($G["COLUMN_COMMENT"]?" COMMENT ".q($G["COLUMN_COMMENT"]):"").($ua?" AFTER ".idf_escape($ua):" FIRST"));echo", ADD $G[alter]";$m[]=$G;$ua=$G["COLUMN_NAME"];}echo"';
	DECLARE columns CURSOR FOR $D;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	SET @alter_table = '';
	OPEN columns;
	REPEAT
		FETCH columns INTO _column_name, _column_default, _is_nullable, _collation_name, _column_type, _extra, _column_comment;
		IF NOT done THEN
			SET set_after = 1;
			CASE _column_name";foreach($m
as$G){echo"
				WHEN ".q($G["COLUMN_NAME"])." THEN
					SET add_columns = REPLACE(add_columns, ', ADD $G[alter]', IF(
						_column_default <=> $G[default] AND _is_nullable = '$G[IS_NULLABLE]' AND _collation_name <=> ".(isset($G["COLLATION_NAME"])?"'$G[COLLATION_NAME]'":"NULL")." AND _column_type = ".q($G["COLUMN_TYPE"])." AND _extra = '$G[EXTRA]' AND _column_comment = ".q($G["COLUMN_COMMENT"])." AND after = $G[after]
					, '', ', MODIFY $G[alter]'));";}echo"
				ELSE
					SET @alter_table = CONCAT(@alter_table, ', DROP ', _column_name);
					SET set_after = 0;
			END CASE;
			IF set_after THEN
				SET after = _column_name;
			END IF;
		END IF;
	UNTIL done END REPEAT;
	CLOSE columns;
	IF @alter_table != '' OR add_columns != '' THEN
		SET alter_command = CONCAT(alter_command, 'ALTER TABLE ".table($N)."', SUBSTR(CONCAT(add_columns, @alter_table), 2), ';\\n');
	END IF;
END;;
DELIMITER ;
CALL adminer_alter(@adminer_alter);
DROP PROCEDURE adminer_alter;

";}}} 
function dumpData($N,$M,$D){
	global$g,$u;$cd=($u=="sqlite"?0:1048576);
	if($M){
		if($_POST["format"]=="sql"&&$M=="TRUNCATE+INSERT"){echo truncate_sql($N).";\n";}
		if($_POST["format"]=="sql"){$m=fields($N);}$E=$g->query($D,1);
		if($E){
			$Ec="";$Ia="";
			while($G=$E->fetch_assoc()){
				if($_POST["format"]!="sql"){
					if($M=="table"){dump_csv(array_keys($G));$M="INSERT";}dump_csv($G);
				}else{
					if(!$Ec){$Ec="INSERT INTO ".table($N)." (".implode(", ",array_map('idf_escape',array_keys($G))).") VALUES";}
					foreach($G as$v=>$W){$G[$v]=(isset($W)?(ereg('int|float|double|decimal',$m[$v]["type"])?$W:q($W)):"NULL");}
					$Ke=implode(",\t",$G);
					if($M=="INSERT+UPDATE"){
						$K=array();
						foreach($G as$v=>$W){$K[]=idf_escape($v)." = $W";}
						echo"$Ec ($Ke) ON DUPLICATE KEY UPDATE ".implode(", ",$K).";\n";
					}else{
						$Ke=($cd?"\n":" ")."($Ke)";
						if(!$Ia){$Ia=$Ec.$Ke;
						}elseif(strlen($Ia)+4+strlen($Ke)<$cd){$Ia.=",$Ke";
						}else{echo"$Ia;\n";$Ia=$Ec.$Ke;}
					}
				}
			}
			if($_POST["format"]=="sql"&&$M!="INSERT+UPDATE"&&$Ia){$Ia.=";\n";echo$Ia;}
		}elseif($_POST["format"]=="sql"){
			echo"-- ".str_replace("\n"," ",$g->error)."\n";
		}
	}
} 

function dumpHeaders($wc,$pd=false){
	$Rd=$_POST["output"];
	$Tb=($_POST["format"]=="sql"?"sql":($pd?"tar":"csv"));
	header("Content-Type: ".($Rd=="bz2"?"application/x-bzip":($Rd=="gz"?"application/x-gzip":($Tb=="tar"?"application/x-tar":($Tb=="sql"||$Rd!="file"?"text/plain":"text/csv")."; charset=utf-8"))));
	if($Rd=="bz2"){ob_start('bzcompress',1e6);}
	if($Rd=="gz"){ob_start('gzencode',1e6);}
	return $Tb;
} 
function homepage(){echo'<p>'.($_GET["ns"]==""?'<a href="'.h(ME).'database=">'.lang(46)."</a>\n":""),(support("scheme")?"<a href='".h(ME)."scheme='>".($_GET["ns"]!=""?lang(47):lang(48))."</a>\n":""),($_GET["ns"]!==""?'<a href="'.h(ME).'schema=">'.lang(49)."</a>\n":""),(support("privileges")?"<a href='".h(ME)."privileges='>".lang(50)."</a>\n":"");return 
true;} 
//===============================================================================================
function navigation($od){
	global$ia,$g,$Q,$u,$tb;
	echo'<h1>',$this->name(),' <span class="version">',$ia,'</span><a href="http://www.adminer.org/#download" id="version">',(version_compare($ia,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a></h1>';
	if($od=="auth"){$bc=true;
	foreach((array)$_SESSION["pwds"]as$sb=>$Ue){
		foreach($Ue as$J=>$Vf){
			foreach($Vf as$U=>$B){
				if(isset($B)){
					if($bc){echo"<p onclick='eventStop(event);'>\n";$bc=false;}
					echo"<a href='".h(auth_url($sb,$J,$U))."'>($tb[$sb]) ".h($U.($J!=""?"@$J":""))."</a><br>\n";
				}
			}
		}
	}
}else{

$i=get_databases();
echo'<form action="" method="post">
<p class="logout">
';
if(DB==""||!$od){
	echo"<a href='".h(ME)."sql='".bold(isset($_GET["sql"])).">".lang(43)."</a>\n";
	if(support("dump")){
		echo"<a href='".h(ME)."dump=".urlencode(isset($_GET["table"])?$_GET["table"]:$_GET["select"])."' id='dump'".bold(isset($_GET["dump"])).">".lang(51)."</a>\n";
	}
}

echo'<input type="submit" name="logout" value="',lang(52),'" onclick="eventStop(event);">
<input type="hidden" name="token" value="',$Q,'">
</p>
</form>
<form action="">
<p>
';
hidden_fields_get();
echo($i?html_select("db",array(""=>"(".lang(53).")")+$i,DB,"this.form.submit();"):'<input name="db" value="'.h(DB).'">'),'<input type="submit" value="',lang(8),'"',($i?" class='hidden'":""),' onclick="eventStop(event);">
';
if($od!="db"&&DB!=""&&$g->select_db(DB)){
	if(support("scheme")){
		echo"<br>".html_select("ns",array(""=>"(".lang(54).")")+schemas(),$_GET["ns"],"this.form.submit();");
		if($_GET["ns"]!=""){set_schema($_GET["ns"]);}
	}
	if($_GET["ns"]!==""&&!$od){
		echo'<p><a href="'.h(ME).'create="'.bold($_GET["create"]==="").">".lang(55)."</a>\n";$P=tables_list();
		if(!$P){
			echo"<p class='message'>".lang(6)."\n";
		}else{
			$this->tablesPrint($P);$Vc=array();
			foreach($P as$N=>$S){$Vc[]=preg_quote($N,'/');}
			echo"<script type='text/javascript'>\n","var jushLinks = { $u: [ '".js_escape(ME)."table=\$&', /\\b(".implode("|",$Vc).")\\b/g ] };\n";
			foreach(array("bac","bra","sqlite_quo","mssql_bra")as$W){echo"jushLinks.$W = jushLinks.$u;\n";}
			echo"</script>\n";
		}
	}
}
echo(isset($_GET["sql"])?'<input type="hidden" name="sql" value="">':(isset($_GET["schema"])?'<input type="hidden" name="schema" value="">':(isset($_GET["dump"])?'<input type="hidden" name="dump" value="">':""))),"</p></form>\n";
}
}
function
tablesPrint($P){echo"<p id='tables'>\n";foreach($P
as$N=>$S){echo'<a href="'.h(ME).'select='.urlencode($N).'"'.bold($_GET["select"]==$N).">".lang(56)."</a> ",'<a href="'.h(ME).'table='.urlencode($N).'"'.bold($_GET["table"]==$N)." title='".lang(26)."'>".$this->tableName(array("Name"=>$N))."</a><br>\n";}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);if(!isset($b->operators)){$b->operators=$Fd;} 
function 
page_header($zf,$k="",$Ha=array(),$_f=""){global$ca,$b,$g,$tb;header("Content-Type: text/html; charset=utf-8");if($b->headers()){header("X-Frame-Options: deny");header("X-XSS-Protection: 0");}$Af=$zf.($_f!=""?": ".h($_f):"");$Bf=strip_tags($Af.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());if(is_ajax()){header("X-AJAX-Title: ".rawurlencode($Bf));

}else{

echo'<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="',$ca,'" dir="',lang(57),'">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<title>',$Bf,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME))."?file=default.css&amp;version=3.3.3",'">
<script type="text/javascript">
var areYouSure = \'',lang(58),'\';
</script>
<script type="text/javascript" src="',h(preg_replace("~\\?.*~","",ME))."?file=functions.js&amp;version=3.3.3",'"></script>
';if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME))."?file=favicon.ico&amp;version=3.3.3",'" id="favicon">
';if(file_exists("adminer.css")){echo'<link rel="stylesheet" type="text/css" href="adminer.css">
';}}echo'
<body class="',lang(57),' nojs"',($_POST?"":" onclick=\"return  bodyClick(event, '".h(js_escape(DB)."', '".js_escape($_GET["ns"]))."');\"");echo' onkeydown="bodyKeydown(event);" onload="bodyLoad(\'',(is_object($g)?substr($g->server_info,0,3):""),'\');',(isset($_COOKIE["adminer_version"])?"":" verifyVersion();");?>">
<script type="text/javascript">
document.body.className = document.body.className.replace(/(^|\s)nojs(\s|$)/, '$1js$2');
</script>

<div id="content">
<?php
}if(isset($Ha)){$y=substr(preg_replace('~(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($y?$y:".").'">'.$tb[DRIVER].'</a> &raquo; ';$y=substr(preg_replace('~(db|ns)=[^&]*&~','',ME),0,-1);$J=(SERVER!=""?h(SERVER):lang(20));if($Ha===false){echo"$J\n";}else{echo"<a href='".($y?h($y):".")."' accesskey='1' title='Alt+Shift+1'>$J</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Ha))){echo'<a href="'.h($y."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';}if(is_array($Ha)){if($_GET["ns"]!=""){echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';}foreach($Ha
as$v=>$W){$ob=(is_array($W)?$W[1]:$W);if($ob!=""){echo'<a href="'.h(ME."$v=").urlencode(is_array($W)?$W[0]:$W).'">'.h($ob).'</a> &raquo; ';}}}echo"$zf\n";}}echo"<span id='loader'></span>\n","<h2>$Af</h2>\n";restart_session();$Tf=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$ld=$_SESSION["messages"][$Tf];if($ld){echo"<div class='message'>".implode("</div>\n<div class='message'>",$ld)."</div>\n";unset($_SESSION["messages"][$Tf]);}$i=&get_session("dbs");if(DB!=""&&$i&&!in_array(DB,$i,true)){$i=null;}if($k){echo"<div class='error'>$k</div>\n";}define("PAGE_HEADER",1);} 
function 
page_footer($od=""){global$b;if(!is_ajax()){echo'</div>

';switch_lang();echo'<div id="menu">
';$b->navigation($od);echo'</div>
';}} 
function 
int32($rd){while($rd>=2147483648){$rd-=4294967296;}while($rd<=-2147483649){$rd+=4294967296;}return (int)$rd;} 
function 
long2str($V,$bg){$Ke='';foreach($V
as$W){$Ke.=pack('V',$W);}if($bg){return 
substr($Ke,0,end($V));}return $Ke;} 
function 
str2long($Ke,$bg){$V=array_values(unpack('V*',str_pad($Ke,4*ceil(strlen($Ke)/4),"\0")));if($bg){$V[]=strlen($Ke);}return $V;} 
function 
xxtea_mx($fg,$eg,$if,$Kc){return 
int32((($fg>>5&0x7FFFFFF)^$eg<<2)+(($eg>>3&0x1FFFFFFF)^$fg<<4))^int32(($if^$eg)+($Kc^$fg));} 
function 
encrypt_string($df,$v){if($df==""){return "";}$v=array_values(unpack("V*",pack("H*",md5($v))));$V=str2long($df,true);$rd=count($V)-1;$fg=$V[$rd];$eg=$V[0];$C=floor(6+52/($rd+1));$if=0;while($C-->0){$if=int32($if+0x9E3779B9);$yb=$if>>2&3;for($Sd=0;$Sd<$rd;$Sd++){$eg=$V[$Sd+1];$qd=xxtea_mx($fg,$eg,$if,$v[$Sd&3^$yb]);$fg=int32($V[$Sd]+$qd);$V[$Sd]=$fg;}$eg=$V[0];$qd=xxtea_mx($fg,$eg,$if,$v[$Sd&3^$yb]);$fg=int32($V[$rd]+$qd);$V[$rd]=$fg;}return 
long2str($V,false);} 
function 
decrypt_string($df,$v){if($df==""){return "";}$v=array_values(unpack("V*",pack("H*",md5($v))));$V=str2long($df,false);$rd=count($V)-1;$fg=$V[$rd];$eg=$V[0];$C=floor(6+52/($rd+1));$if=int32($C*0x9E3779B9);while($if){$yb=$if>>2&3;for($Sd=$rd;$Sd>0;$Sd--){$fg=$V[$Sd-1];$qd=xxtea_mx($fg,$eg,$if,$v[$Sd&3^$yb]);$eg=int32($V[$Sd]-$qd);$V[$Sd]=$eg;}$fg=$V[$rd];$qd=xxtea_mx($fg,$eg,$if,$v[$Sd&3^$yb]);$eg=int32($V[0]-$qd);$V[0]=$eg;$if=int32($if-0x9E3779B9);}return 
long2str($V,true);}$g='';$Q=$_SESSION["token"];if(!$_SESSION["token"]){$_SESSION["token"]=rand(1,1e6);}$de=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$W){list($v)=explode(":",$W);$de[$v]=$W;}}if(isset($_POST["server"])){session_regenerate_id();$_SESSION["pwds"][$_POST["driver"]][$_POST["server"]][$_POST["username"]]=$_POST["password"];if($_POST["permanent"]){$v=base64_encode($_POST["driver"])."-".base64_encode($_POST["server"])."-".base64_encode($_POST["username"]);$ne=$b->permanentLogin();$de[$v]="$v:".base64_encode($ne?encrypt_string($_POST["password"],$ne):"");cookie("adminer_permanent",implode(" ",$de));}if(count($_POST)==($_POST["permanent"]?5:4)||DRIVER!=$_POST["driver"]||SERVER!=$_POST["server"]||$_GET["username"]!==$_POST["username"]){redirect(auth_url($_POST["driver"],$_POST["server"],$_POST["username"]));}}elseif($_POST["logout"]){if($Q&&$_POST["token"]!=$Q){page_header(lang(52),lang(59));page_footer("db");exit;}else{foreach(array("pwds","dbs","queries")as$v){set_session($v,null);}$v=base64_encode(DRIVER)."-".base64_encode(SERVER)."-".base64_encode($_GET["username"]);if($de[$v]){unset($de[$v]);cookie("adminer_permanent",implode(" ",$de));}redirect(substr(preg_replace('~(username|db|ns)=[^&]*&~','',ME),0,-1),lang(60));}}elseif($de&&!$_SESSION["pwds"]){session_regenerate_id();$ne=$b->permanentLogin();foreach($de
as$v=>$W){list(,$Na)=explode(":",$W);list($sb,$J,$U)=array_map('base64_decode',explode("-",$v));$_SESSION["pwds"][$sb][$J][$U]=decrypt_string(base64_decode($Na),$ne);}} 
function 
auth_error($Nb=null){global$g,$b,$Q;$Ve=session_name();$k="";if(!$_COOKIE[$Ve]&&$_GET[$Ve]&&ini_bool("session.use_only_cookies")){$k=lang(61);}elseif(isset($_GET["username"])){if(($_COOKIE[$Ve]||$_GET[$Ve])&&!$Q){$k=lang(62);}else{$B=&get_session("pwds");if(isset($B)){$k=h($Nb?$Nb->getMessage():(is_string($g)?$g:lang(63)));$B=null;}}}page_header(lang(23),$k,null);echo"<form action='' method='post' onclick='eventStop(event);'>\n";$b->loginForm();echo"<div>";hidden_fields($_POST,array("driver","server","username","password","permanent"));echo"</div>\n","</form>\n";page_footer("auth");}if(isset($_GET["username"])){if(!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);page_header(lang(64),lang(65,implode(", ",$ie)),false);page_footer("auth");exit;}$g=connect();}if(is_string($g)||!$b->login($_GET["username"],get_session("pwds"))){auth_error();exit;}$Q=$_SESSION["token"];if(isset($_POST["server"])&&$_POST["token"]){$_POST["token"]=$Q;}$k=($_POST?($_POST["token"]==$Q?"":lang(59)):($_SERVER["REQUEST_METHOD"]!="POST"?"":lang(66,'"post_max_size"')));function
connect_error(){global$g,$Q,$k,$tb;$i=array();if(DB!=""){page_header(lang(67).": ".h(DB),lang(68),true);}else{if($_POST["db"]&&!$k){queries_redirect(substr(ME,0,-1),lang(69),drop_databases($_POST["db"]));}page_header(lang(70),$k,false);echo"<p><a href='".h(ME)."database='>".lang(71)."</a>\n";foreach(array('privileges'=>lang(50),'processlist'=>lang(72),'variables'=>lang(73),'status'=>lang(74),)as$v=>$W){if(support($v)){echo"<a href='".h(ME)."$v='>$W</a>\n";}}echo"<p>".lang(75,$tb[DRIVER],"<b>$g->server_info</b>","<b>$g->extension</b>")."\n","<p>".lang(76,"<b>".h(logged_user())."</b>")."\n";if($_GET["refresh"]){set_session("dbs",null);}$i=get_databases();if($i){$Ne=support("scheme");$Qa=collations();echo"<form action='' method='post'>\n","<table cellspacing='0' class='checkable' onclick='tableClick(event);'>\n","<thead><tr><td>&nbsp;<th>".lang(67)."<td>".lang(77)."<td>".lang(78)."</thead>\n";foreach($i
as$j){$Fe=h(ME)."db=".urlencode($j);echo"<tr".odd()."><td>".checkbox("db[]",$j,in_array($j,(array)$_POST["db"])),"<th><a href='$Fe'>".h($j)."</a>","<td><a href='$Fe".($Ne?"&amp;ns=":"")."&amp;database=' title='".lang(46)."'>".nbsp(db_collation($j,$Qa))."</a>","<td align='right'><a href='$Fe&amp;schema=' id='tables-".h($j)."' title='".lang(49)."'>?</a>","\n";}echo"</table>\n","<script type='text/javascript'>tableCheck();</script>\n","<p><input type='submit' name='drop' value='".lang(79)."'".confirm("formChecked(this, /db/)",1).">\n";echo"<input type='hidden' name='token' value='$Q'>\n","<a href='".h(ME)."refresh=1' onclick='eventStop(event);'>".lang(80)."</a>\n","</form>\n";}}page_footer("db");if($i){echo"<script type='text/javascript'>ajaxSetHtml('".js_escape(ME)."script=connect');</script>\n";}}if(isset($_GET["status"])){$_GET["variables"]=$_GET["status"];}if(!(DB!=""?$g->select_db(DB):isset($_GET["sql"])||isset($_GET["dump"])||isset($_GET["database"])||isset($_GET["processlist"])||isset($_GET["privileges"])||isset($_GET["user"])||isset($_GET["variables"])||$_GET["script"]=="connect")){if(DB!=""){set_session("dbs",null);}connect_error();exit;}if(support("scheme")&&DB!=""&&$_GET["ns"]!==""){if(!isset($_GET["ns"])){redirect(preg_replace('~ns=[^&]*&~','',ME)."ns=".get_schema());}if(!set_schema($_GET["ns"])){page_header(lang(81).": ".h($_GET["ns"]),lang(82),true);page_footer("ns");exit;}} 
function 
select($E,$h=null,$vc=""){$Vc=array();$t=array();$f=array();$Fa=array();$T=array();odd('');for($p=0;$G=$E->fetch_row();$p++){if(!$p){echo"<table cellspacing='0' class='nowrap'>\n","<thead><tr>";for($Ic=0;$Ic<count($G);$Ic++){$l=$E->fetch_field();$_=$l->name;$Ld=$l->orgtable;$Kd=$l->orgname;if($vc){$Vc[$Ic]=($_=="table"?"table=":($_=="possible_keys"?"indexes=":null));}elseif($Ld!=""){if(!isset($t[$Ld])){$t[$Ld]=array();foreach(indexes($Ld,$h)as$s){if($s["type"]=="PRIMARY"){$t[$Ld]=array_flip($s["columns"]);break;}}$f[$Ld]=$t[$Ld];}if(isset($f[$Ld][$Kd])){unset($f[$Ld][$Kd]);$t[$Ld][$Kd]=$Ic;$Vc[$Ic]=$Ld;}}if($l->charsetnr==63){$Fa[$Ic]=true;}$T[$Ic]=$l->type;$_=h($_);echo"<th".($Ld!=""||$l->name!=$Kd?" title='".h(($Ld!=""?"$Ld.":"").$Kd)."'":"").">".($vc?"<a href='$vc".strtolower($_)."' target='_blank' rel='noreferrer'>$_</a>":$_);}echo"</thead>\n";}echo"<tr".odd().">";foreach($G
as$v=>$W){if(!isset($W)){$W="<i>NULL</i>";}elseif($Fa[$v]&&!is_utf8($W)){$W="<i>".lang(32,strlen($W))."</i>";}elseif(!strlen($W)){$W="&nbsp;";}else{$W=h($W);if($T[$v]==254){$W="<code>$W</code>";}}if(isset($Vc[$v])&&!$f[$Vc[$v]]){if($vc){$y=$Vc[$v].urlencode($G[array_search("table=",$Vc)]);}else{$y="edit=".urlencode($Vc[$v]);foreach($t[$Vc[$v]]as$Oa=>$Ic){$y.="&where".urlencode("[".bracket_escape($Oa)."]")."=".urlencode($G[$Ic]);}}$W="<a href='".h(ME.$y)."'>$W</a>";}echo"<td>$W";}}echo($p?"</table>":"<p class='message'>".lang(83))."\n";} 
function 
referencable_primary($Qe){$F=array();foreach(table_status()as$mf=>$N){if($mf!=$Qe&&fk_support($N)){foreach(fields($mf)as$l){if($l["primary"]){if($F[$mf]){unset($F[$mf]);break;}$F[$mf]=$l;}}}}return $F;} 
function 
textarea($_,$X,$H=10,$Ra=80){echo"<textarea name='$_' rows='$H' cols='$Ra' class='sqlarea' spellcheck='false' wrap='off' onkeydown='return  textareaKeydown(this, event);'>";if(is_array($X)){foreach($X
as$W){echo
h($W)."\n\n\n";}}else{echo
h($X);}echo"</textarea>";} 
function 
format_time($Ze,$Eb){return " <span class='time'>(".lang(84,max(0,array_sum(explode(" ",$Eb))-array_sum(explode(" ",$Ze)))).")</span>";} 
function 
edit_type($v,$l,$Qa,$fc=array()){global$ef,$T,$Rf,$Bd;echo'<td><select name="',$v,'[type]" class="type" onfocus="lastType = selectValue(this);" onchange="editingTypeChange(this);">',optionlist((!$l["type"]||isset($T[$l["type"]])?array():array($l["type"]))+$ef+($fc?array(lang(85)=>$fc):array()),$l["type"]),'</select>
<td><input name="',$v,'[length]" value="',h($l["length"]),'" size="3" onfocus="editingLengthFocus(this);"><td class="options">',"<select name='$v"."[collation]'".(ereg('(char|text|enum|set)$',$l["type"])?"":" class='hidden'").'><option value="">('.lang(86).')'.optionlist($Qa,$l["collation"]).'</select>',($Rf?"<select name='$v"."[unsigned]'".(!$l["type"]||ereg('(int|float|double|decimal)$',$l["type"])?"":" class='hidden'").'><option>'.optionlist($Rf,$l["unsigned"]).'</select>':''),($fc?"<select name='$v"."[on_delete]'".(ereg("`",$l["type"])?"":" class='hidden'")."><option value=''>(".lang(87).")".optionlist(explode("|",$Bd),$l["on_delete"])."</select> ":" ");} 
function 
process_length($w){global$Hb;return (preg_match("~^\\s*(?:$Hb)(?:\\s*,\\s*(?:$Hb))*\\s*\$~",$w)&&preg_match_all("~$Hb~",$w,$ad)?implode(",",$ad[0]):preg_replace('~[^0-9,+-]~','',$w));} 
function 
process_type($l,$Pa="COLLATE"){global$Rf;return " $l[type]".($l["length"]!=""?"(".process_length($l["length"]).")":"").(ereg('int|float|double|decimal',$l["type"])&&in_array($l["unsigned"],$Rf)?" $l[unsigned]":"").(ereg('char|text|enum|set',$l["type"])&&$l["collation"]?" $Pa ".q($l["collation"]):"");} 
function 
process_field($l,$Jf){return 
array(idf_escape($l["field"]),process_type($Jf),($l["null"]?" NULL":" NOT NULL"),(isset($l["default"])?" DEFAULT ".(($l["type"]=="timestamp"&&eregi('^CURRENT_TIMESTAMP$',$l["default"]))||($l["type"]=="bit"&&ereg("^([0-9]+|b'[0-1]+')\$",$l["default"]))?$l["default"]:q($l["default"])):""),($l["on_update"]?" ON UPDATE $l[on_update]":""),(support("comment")&&$l["comment"]!=""?" COMMENT ".q($l["comment"]):""),($l["auto_increment"]?auto_increment():null),);} 
function 
type_class($S){foreach(array('char'=>'text','date'=>'time|year','binary'=>'blob','enum'=>'set',)as$v=>$W){if(ereg("$v|$W",$S)){return " class='$v'";}}} 
function 
edit_fields($m,$Qa,$S="TABLE",$wa=0,$fc=array(),$Va=false){global$Cc;echo'<thead><tr class="wrap">
';if($S=="PROCEDURE"){echo'<td>&nbsp;';}echo'<th>',($S=="TABLE"?lang(88):lang(89)),'<td>',lang(90),'<textarea id="enum-edit" rows="4" cols="12" wrap="off" style="display: none;" onblur="editingLengthBlur(this);"></textarea>
<td>',lang(91),'<td>',lang(92);if($S=="TABLE"){echo'<td>NULL
<td><input type="radio" name="auto_increment_col" value=""><acronym title="',lang(93),'">AI</acronym>
<td',($_POST["defaults"]?"":" class='hidden'"),'>',lang(94),(support("comment")?"<td".($Va?"":" class='hidden'").">".lang(95):"");}echo'<td>',"<input type='image' name='add[".(support("move_col")?0:count($m))."]' src='".h(preg_replace("~\\?.*~","",ME))."?file=plus.gif&amp;version=3.3.3' alt='+' title='".lang(96)."'>",'<script type="text/javascript">row_count = ',count($m),';</script>
</thead>
<tbody onkeydown="return  editingKeydown(event);">
';foreach($m
as$p=>$l){$p++;$Md=$l[($_POST?"orig":"field")];$qb=(isset($_POST["add"][$p-1])||(isset($l["field"])&&!$_POST["drop_col"][$p]))&&(support("drop_col")||$Md=="");echo'<tr',($qb?"":" style='display: none;'"),'>
',($S=="PROCEDURE"?"<td>".html_select("fields[$p][inout]",explode("|",$Cc),$l["inout"]):""),'<th>';if($qb){echo'<input name="fields[',$p,'][field]" value="',h($l["field"]),'" onchange="',($l["field"]!=""||count($m)>1?"":"editingAddRow(this, $wa); "),'editingNameChange(this);" maxlength="64">';}echo'<input type="hidden" name="fields[',$p,'][orig]" value="',h($Md),'">
';edit_type("fields[$p]",$l,$Qa,$fc);if($S=="TABLE"){echo'<td>',checkbox("fields[$p][null]",1,$l["null"]),'<td><input type="radio" name="auto_increment_col" value="',$p,'"';if($l["auto_increment"]){echo' checked';}?> onclick="var field = this.form['fields[' + this.value + '][field]']; if (!field.value) { field.value = 'id'; field.onchange(); }">
<td<?php echo($_POST["defaults"]?"":" class='hidden'"),'>',checkbox("fields[$p][has_default]",1,$l["has_default"]),'<input name="fields[',$p,'][default]" value="',h($l["default"]),'" onchange="this.previousSibling.checked = true;">
',(support("comment")?"<td".($Va?"":" class='hidden'")."><input name='fields[$p][comment]' value='".h($l["comment"])."' maxlength='255'>":"");}echo"<td>",(support("move_col")?"<input type='image' name='add[$p]' src='".h(preg_replace("~\\?.*~","",ME))."?file=plus.gif&amp;version=3.3.3' alt='+' title='".lang(96)."' onclick='return  !editingAddRow(this, $wa, 1);'>&nbsp;"."<input type='image' name='up[$p]' src='".h(preg_replace("~\\?.*~","",ME))."?file=up.gif&amp;version=3.3.3' alt='^' title='".lang(97)."'>&nbsp;"."<input type='image' name='down[$p]' src='".h(preg_replace("~\\?.*~","",ME))."?file=down.gif&amp;version=3.3.3' alt='v' title='".lang(98)."'>&nbsp;":""),($Md==""||support("drop_col")?"<input type='image' name='drop_col[$p]' src='".h(preg_replace("~\\?.*~","",ME))."?file=cross.gif&amp;version=3.3.3' alt='x' title='".lang(99)."' onclick='return  !editingRemoveRow(this);'>":""),"\n";}} 
function 
process_fields(&$m){ksort($m);$A=0;if($_POST["up"]){$Oc=0;foreach($m
as$v=>$l){if(key($_POST["up"])==$v){unset($m[$v]);array_splice($m,$Oc,0,array($l));break;}if(isset($l["field"])){$Oc=$A;}$A++;}}if($_POST["down"]){$gc=false;foreach($m
as$v=>$l){if(isset($l["field"])&&$gc){unset($m[key($_POST["down"])]);array_splice($m,$A,0,array($gc));break;}if(key($_POST["down"])==$v){$gc=$l;}$A++;}}$m=array_values($m);if($_POST["add"]){array_splice($m,key($_POST["add"]),0,array(array()));}} 
function 
normalize_enum($z){return "'".str_replace("'","''",addcslashes(stripcslashes(str_replace($z[0][0].$z[0][0],$z[0][0],substr($z[0],1,-1))),'\\'))."'";} 
function 
grant($mc,$pe,$f,$Ad){if(!$pe){return 
true;}if($pe==array("ALL PRIVILEGES","GRANT OPTION")){return ($mc=="GRANT"?queries("$mc ALL PRIVILEGES$Ad WITH GRANT OPTION"):queries("$mc ALL PRIVILEGES$Ad")&&queries("$mc GRANT OPTION$Ad"));}return 
queries("$mc ".preg_replace('~(GRANT OPTION)\\([^)]*\\)~','\\1',implode("$f, ",$pe).$f).$Ad);} 
function 
drop_create($ub,$cb,$Wc,$kd,$id,$jd,$_){if($_POST["drop"]){return 
query_redirect($ub,$Wc,$kd,true,!$_POST["dropped"]);}$vb=$_!=""&&($_POST["dropped"]||queries($ub));$eb=queries($cb);if(!queries_redirect($Wc,($_!=""?$id:$jd),$eb)&&$vb){redirect(null,$kd);}return $vb;} 
function 
tar_file($Zb,$Ya){$F=pack("a100a8a8a8a12a12",$Zb,644,0,0,decoct(strlen($Ya)),decoct(time()));$Ma=8*32;for($p=0;$p<strlen($F);$p++){$Ma+=ord($F{$p});}$F.=sprintf("%06o",$Ma)."\0 ";return $F.str_repeat("\0",512-strlen($F)).$Ya.str_repeat("\0",511-(strlen($Ya)+511)%
512);}session_cache_limiter("");if(!ini_bool("session.use_cookies")||@ini_set("session.use_cookies",false)!==false){session_write_close();}$Bd="RESTRICT|CASCADE|SET NULL|NO ACTION";$Hb="'(?:''|[^'\\\\]|\\\\.)*+'";$Cc="IN|OUT|INOUT";if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"]){$_GET["edit"]=$_GET["select"];}if(isset($_GET["callf"])){$_GET["call"]=$_GET["callf"];}if(isset($_GET["function"])){$_GET["procedure"]=$_GET["function"];}if(isset($_GET["download"])){$a=$_GET["download"];header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));echo$g->result("SELECT".limit(idf_escape($_GET["field"])." FROM ".table($a)," WHERE ".where($_GET),1));exit;}elseif(isset($_GET["table"])){$a=$_GET["table"];$m=fields($a);if(!$m){$k=error();}$O=($m?table_status($a):array());page_header(($m&&is_view($O)?lang(100):lang(101)).": ".h($a),$k);$b->selectLinks($O);$Ua=$O["Comment"];if($Ua!=""){echo"<p>".lang(95).": ".h($Ua)."\n";}if($m){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(102)."<td>".lang(90).(support("comment")?"<td>".lang(95):"")."</thead>\n";foreach($m
as$l){echo"<tr".odd()."><th>".h($l["field"]),"<td title='".h($l["collation"])."'>".h($l["full_type"]).($l["null"]?" <i>NULL</i>":"").($l["auto_increment"]?" <i>".lang(93)."</i>":""),(isset($l["default"])?" [<b>".h($l["default"])."</b>]":""),(support("comment")?"<td>".nbsp($l["comment"]):""),"\n";}echo"</table>\n";if(!is_view($O)){echo"<h3>".lang(103)."</h3>\n";$t=indexes($a);if($t){echo"<table cellspacing='0'>\n";foreach($t
as$_=>$s){ksort($s["columns"]);$me=array();foreach($s["columns"]as$v=>$W){$me[]="<i>".h($W)."</i>".($s["lengths"][$v]?"(".$s["lengths"][$v].")":"");}echo"<tr title='".h($_)."'><th>$s[type]<td>".implode(", ",$me)."\n";}echo"</table>\n";}echo'<p><a href="'.h(ME).'indexes='.urlencode($a).'">'.lang(104)."</a>\n";if(fk_support($O)){echo"<h3>".lang(85)."</h3>\n";$fc=foreign_keys($a);if($fc){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(105)."<td>".lang(106)."<td>".lang(87)."<td>".lang(107).($u!="sqlite"?"<td>&nbsp;":"")."</thead>\n";foreach($fc
as$_=>$n){echo"<tr title='".h($_)."'>","<th><i>".implode("</i>, <i>",array_map('h',$n["source"]))."</i>","<td><a href='".h($n["db"]!=""?preg_replace('~db=[^&]*~',"db=".urlencode($n["db"]),ME):($n["ns"]!=""?preg_replace('~ns=[^&]*~',"ns=".urlencode($n["ns"]),ME):ME))."table=".urlencode($n["table"])."'>".($n["db"]!=""?"<b>".h($n["db"])."</b>.":"").($n["ns"]!=""?"<b>".h($n["ns"])."</b>.":"").h($n["table"])."</a>","(<i>".implode("</i>, <i>",array_map('h',$n["target"]))."</i>)","<td>".nbsp($n["on_delete"])."\n","<td>".nbsp($n["on_update"])."\n";if($u!="sqlite"){echo'<td><a href="'.h(ME.'foreign='.urlencode($a).'&name='.urlencode($_)).'">'.lang(108).'</a>';}}echo"</table>\n";}if($u!="sqlite"){echo'<p><a href="'.h(ME).'foreign='.urlencode($a).'">'.lang(109)."</a>\n";}}if(support("trigger")){echo"<h3>".lang(110)."</h3>\n";$If=triggers($a);if($If){echo"<table cellspacing='0'>\n";foreach($If
as$v=>$W){echo"<tr valign='top'><td>$W[0]<td>$W[1]<th>".h($v)."<td><a href='".h(ME.'trigger='.urlencode($a).'&name='.urlencode($v))."'>".lang(108)."</a>\n";}echo"</table>\n";}echo'<p><a href="'.h(ME).'trigger='.urlencode($a).'">'.lang(111)."</a>\n";}}}}elseif(isset($_GET["schema"])){page_header(lang(49),"",array(),DB.($_GET["ns"]?".$_GET[ns]":""));$of=array();$pf=array();$_="adminer_schema";$ea=($_GET["schema"]?$_GET["schema"]:$_COOKIE[($_COOKIE["$_-".DB]?"$_-".DB:$_)]);preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~',$ea,$ad,PREG_SET_ORDER);foreach($ad
as$p=>$z){$of[$z[1]]=array($z[2],$z[3]);$pf[]="\n\t'".js_escape($z[1])."': [ $z[2], $z[3] ]";}$Cf=0;$Ea=-1;$Me=array();$ze=array();$Sc=array();foreach(table_status()as$O){if(!isset($O["Engine"])){continue;}$fe=0;$Me[$O["Name"]]["fields"]=array();foreach(fields($O["Name"])as$_=>$l){$fe+=1.25;$l["pos"]=$fe;$Me[$O["Name"]]["fields"][$_]=$l;}$Me[$O["Name"]]["pos"]=($of[$O["Name"]]?$of[$O["Name"]]:array($Cf,0));foreach($b->foreignKeys($O["Name"])as$W){if(!$W["db"]){$Qc=$Ea;if($of[$O["Name"]][1]||$of[$W["table"]][1]){$Qc=min(floatval($of[$O["Name"]][1]),floatval($of[$W["table"]][1]))-1;}else{$Ea-=.1;}while($Sc[(string)$Qc]){$Qc-=.0001;}$Me[$O["Name"]]["references"][$W["table"]][(string)$Qc]=array($W["source"],$W["target"]);$ze[$W["table"]][$O["Name"]][(string)$Qc]=$W["target"];$Sc[(string)$Qc]=true;}}$Cf=max($Cf,$Me[$O["Name"]]["pos"][0]+2.5+$fe);}echo'<div id="schema" style="height: ',$Cf,'em;">
<script type="text/javascript">
tablePos = {',implode(",",$pf)."\n",'};
em = document.getElementById(\'schema\').offsetHeight / ',$Cf,';
document.onmousemove = schemaMousemove;
document.onmouseup = function (ev) {
	schemaMouseup(ev, \'',js_escape(DB),'\');
};
</script>
';foreach($Me
as$_=>$N){echo"<div class='table' style='top: ".$N["pos"][0]."em; left: ".$N["pos"][1]."em;' onmousedown='schemaMousedown(this, event);'>",'<a href="'.h(ME).'table='.urlencode($_).'"><b>'.h($_)."</b></a><br>\n";foreach($N["fields"]as$l){$W='<span'.type_class($l["type"]).' title="'.h($l["full_type"].($l["null"]?" NULL":'')).'">'.h($l["field"]).'</span>';echo($l["primary"]?"<i>$W</i>":$W)."<br>\n";}foreach((array)$N["references"]as$uf=>$_e){foreach($_e
as$Qc=>$we){$Rc=$Qc-$of[$_][1];$p=0;foreach($we[0]as$We){echo"<div class='references' title='".h($uf)."' id='refs$Qc-".($p++)."' style='left: $Rc"."em; top: ".$N["fields"][$We]["pos"]."em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: ".(-$Rc)."em;'></div></div>\n";}}}foreach((array)$ze[$_]as$uf=>$_e){foreach($_e
as$Qc=>$f){$Rc=$Qc-$of[$_][1];$p=0;foreach($f
as$tf){echo"<div class='references' title='".h($uf)."' id='refd$Qc-".($p++)."' style='left: $Rc"."em; top: ".$N["fields"][$tf]["pos"]."em; height: 1.25em; background: url(".h(preg_replace("~\\?.*~","",ME))."?file=arrow.gif) no-repeat right center;&amp;version=3.3.3'><div style='height: .5em; border-bottom: 1px solid Gray; width: ".(-$Rc)."em;'></div></div>\n";}}}echo"</div>\n";}foreach($Me
as$_=>$N){foreach((array)$N["references"]as$uf=>$_e){foreach($_e
as$Qc=>$we){$nd=$Cf;$ed=-10;foreach($we[0]as$v=>$We){$ge=$N["pos"][0]+$N["fields"][$We]["pos"];$he=$Me[$uf]["pos"][0]+$Me[$uf]["fields"][$we[1][$v]]["pos"];$nd=min($nd,$ge,$he);$ed=max($ed,$ge,$he);}echo"<div class='references' id='refl$Qc' style='left: $Qc"."em; top: $nd"."em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: ".($ed-$nd)."em;'></div></div>\n";}}}echo'</div>
<p><a href="',h(ME."schema=".urlencode($ea)),'" id="schema-link">',lang(112),'</a>
';}elseif(isset($_GET["dump"])){$a=$_GET["dump"];if($_POST){$ab="";foreach(array("output","format","db_style","routines","events","table_style","auto_increment","triggers","data_style")as$v){$ab.="&$v=".urlencode($_POST[$v]);}cookie("adminer_export",substr($ab,1));
$Tb=dump_headers(($a!=""?$a:DB),(DB==""||count((array)$_POST["tables"]+(array)$_POST["data"])>1));
$Gc=($_POST["format"]=="sql");
if($Gc){echo"-- Adminer $ia ".$tb[DRIVER]." dump

".($u!="sql"?"":"SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = ".q($g->result("SELECT @@time_zone")).";
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

");}$M=$_POST["db_style"];$i=array(DB);if(DB==""){$i=$_POST["databases"];if(is_string($i)){$i=explode("\n",rtrim(str_replace("\r","",$i),"\n"));}}foreach((array)$i
as$j){if($g->select_db($j)){if($Gc&&ereg('CREATE',$M)&&($cb=$g->result("SHOW CREATE DATABASE ".idf_escape($j),1))){if($M=="DROP+CREATE"){echo"DROP DATABASE IF EXISTS ".idf_escape($j).";\n";}echo($M=="CREATE+ALTER"?preg_replace('~^CREATE DATABASE ~','\\0IF NOT EXISTS ',$cb):$cb).";\n";}if($Gc){if($M){echo
use_sql($j).";\n\n";}if(in_array("CREATE+ALTER",array($M,$_POST["table_style"]))){echo"SET @adminer_alter = '';\n\n";}$Qd="";if($_POST["routines"]){foreach(array("FUNCTION","PROCEDURE")as$Ge){foreach(get_rows("SHOW $Ge STATUS WHERE Db = ".q($j),null,"-- ")as$G){$Qd.=($M!='DROP+CREATE'?"DROP $Ge IF EXISTS ".idf_escape($G["Name"]).";;\n":"").$g->result("SHOW CREATE $Ge ".idf_escape($G["Name"]),2).";;\n\n";}}}if($_POST["events"]){foreach(get_rows("SHOW EVENTS",null,"-- ")as$G){$Qd.=($M!='DROP+CREATE'?"DROP EVENT IF EXISTS ".idf_escape($G["Name"]).";;\n":"").$g->result("SHOW CREATE EVENT ".idf_escape($G["Name"]),3).";;\n\n";}}if($Qd){echo"DELIMITER ;;\n\n$Qd"."DELIMITER ;\n\n";}}if($_POST["table_style"]||$_POST["data_style"]){$Y=array();foreach(table_status()as$O){$N=(DB==""||in_array($O["Name"],(array)$_POST["tables"]));$hb=(DB==""||in_array($O["Name"],(array)$_POST["data"]));if($N||$hb){if(!is_view($O)){if($Tb=="tar"){ob_start();}$b->dumpTable($O["Name"],($N?$_POST["table_style"]:""));if($hb){$b->dumpData($O["Name"],$_POST["data_style"],"SELECT * FROM ".table($O["Name"]));}if($Gc&&$_POST["triggers"]&&$N&&($If=trigger_sql($O["Name"],$_POST["table_style"]))){echo"\nDELIMITER ;;\n$If\nDELIMITER ;\n";}if($Tb=="tar"){echo
tar_file((DB!=""?"":"$j/")."$O[Name].csv",ob_get_clean());}elseif($Gc){echo"\n";}}elseif($Gc){$Y[]=$O["Name"];}}}foreach($Y
as$Zf){$b->dumpTable($Zf,$_POST["table_style"],true);}if($Tb=="tar"){echo
pack("x512");}}if($M=="CREATE+ALTER"&&$Gc){$D="SELECT TABLE_NAME, ENGINE, TABLE_COLLATION, TABLE_COMMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE()";echo"DELIMITER ;;
CREATE PROCEDURE adminer_alter (INOUT alter_command text) BEGIN
	DECLARE _table_name, _engine, _table_collation varchar(64);
	DECLARE _table_comment varchar(64);
	DECLARE done bool DEFAULT 0;
	DECLARE tables CURSOR FOR $D;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	OPEN tables;
	REPEAT
		FETCH tables INTO _table_name, _engine, _table_collation, _table_comment;
		IF NOT done THEN
			CASE _table_name";foreach(get_rows($D)as$G){$Ua=q($G["ENGINE"]=="InnoDB"?preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$G["TABLE_COMMENT"]):$G["TABLE_COMMENT"]);echo"
				WHEN ".q($G["TABLE_NAME"])." THEN
					".(isset($G["ENGINE"])?"IF _engine != '$G[ENGINE]' OR _table_collation != '$G[TABLE_COLLATION]' OR _table_comment != $Ua THEN
						ALTER TABLE ".idf_escape($G["TABLE_NAME"])." ENGINE=$G[ENGINE] COLLATE=$G[TABLE_COLLATION] COMMENT=$Ua;
					END IF":"BEGIN END").";";}echo"
				ELSE
					SET alter_command = CONCAT(alter_command, 'DROP TABLE `', REPLACE(_table_name, '`', '``'), '`;\\n');
			END CASE;
		END IF;
	UNTIL done END REPEAT;
	CLOSE tables;
END;;
DELIMITER ;
CALL adminer_alter(@adminer_alter);
DROP PROCEDURE adminer_alter;
";}if(in_array("CREATE+ALTER",array($M,$_POST["table_style"]))&&$Gc){echo"SELECT @adminer_alter;\n";}}}if($Gc){echo"-- ".$g->result("SELECT NOW()")."\n";}exit;}page_header(lang(113),"",($_GET["export"]!=""?array("table"=>$_GET["export"]):array()),DB);echo'
<form action="" method="post">
<table cellspacing="0">
';$kb=array('','USE','DROP+CREATE','CREATE');$qf=array('','DROP+CREATE','CREATE');$ib=array('','TRUNCATE+INSERT','INSERT');if($u=="sql"){$kb[]='CREATE+ALTER';$qf[]='CREATE+ALTER';$ib[]='INSERT+UPDATE';}parse_str($_COOKIE["adminer_export"],$G);if(!$G){$G=array("output"=>"text","format"=>"sql","db_style"=>(DB!=""?"":"CREATE"),"table_style"=>"DROP+CREATE","data_style"=>"INSERT");}if(!isset($G["events"])){$G["routines"]=$G["events"]=($_GET["dump"]=="");$G["triggers"]=$G["table_style"];}echo"<tr><th>".lang(114)."<td>".html_select("output",$b->dumpOutput(),$G["output"],0)."\n";echo"<tr><th>".lang(115)."<td>".html_select("format",$b->dumpFormat(),$G["format"],0)."\n";echo($u=="sqlite"?"":"<tr><th>".lang(67)."<td>".html_select('db_style',$kb,$G["db_style"]).(support("routine")?checkbox("routines",1,$G["routines"],lang(116)):"").(support("event")?checkbox("events",1,$G["events"],lang(117)):"")),"<tr><th>".lang(78)."<td>".html_select('table_style',$qf,$G["table_style"]).checkbox("auto_increment",1,$G["auto_increment"],lang(93)).(support("trigger")?checkbox("triggers",1,$G["triggers"],lang(110)):""),"<tr><th>".lang(118)."<td>".html_select('data_style',$ib,$G["data_style"]),'</table>
<p><input type="submit" value="',lang(113),'">

<table cellspacing="0">
';$ke=array();if(DB!=""){$La=($a!=""?"":" checked");echo"<thead><tr>","<th style='text-align: left;'><label><input type='checkbox' id='check-tables'$La onclick='formCheck(this, /^tables\\[/);'>".lang(78)."</label>","<th style='text-align: right;'><label>".lang(118)."<input type='checkbox' id='check-data'$La onclick='formCheck(this, /^data\\[/);'></label>","</thead>\n";$Y="";foreach(table_status()as$O){$_=$O["Name"];$je=ereg_replace("_.*","",$_);$La=($a==""||$a==(substr($a,-1)=="%"?"$je%":$_));$me="<tr><td>".checkbox("tables[]",$_,$La,$_,"formUncheck('check-tables');");if(is_view($O)){$Y.="$me\n";}else{echo"$me<td align='right'><label>".($O["Engine"]=="InnoDB"&&$O["Rows"]?"~ ":"").$O["Rows"].checkbox("data[]",$_,$La,"","formUncheck('check-data');")."</label>\n";}$ke[$je]++;}echo$Y;}else{echo"<thead><tr><th style='text-align: left;'><label><input type='checkbox' id='check-databases'".($a==""?" checked":"")." onclick='formCheck(this, /^databases\\[/);'>".lang(67)."</label></thead>\n";$i=get_databases();if($i){foreach($i
as$j){if(!information_schema($j)){$je=ereg_replace("_.*","",$j);echo"<tr><td>".checkbox("databases[]",$j,$a==""||$a=="$je%",$j,"formUncheck('check-databases');")."</label>\n";$ke[$je]++;}}}else{echo"<tr><td><textarea name='databases' rows='10' cols='20'></textarea>";}}echo'</table>
</form>
';$bc=true;foreach($ke
as$v=>$W){if($v!=""&&$W>1){echo($bc?"<p>":" ")."<a href='".h(ME)."dump=".urlencode("$v%")."'>".h($v)."</a>";$bc=false;}}}elseif(isset($_GET["privileges"])){page_header(lang(50));$E=$g->query("SELECT User, Host FROM mysql.".(DB==""?"user":"db WHERE ".q(DB)." LIKE Db")." ORDER BY Host, User");$mc=$E;if(!$E){$E=$g->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");}echo"<form action=''><p>\n";hidden_fields_get();echo"<input type='hidden' name='db' value='".h(DB)."'>\n",($mc?"":"<input type='hidden' name='grant' value=''>\n"),"<table cellspacing='0'>\n","<thead><tr><th>".lang(21)."<th>".lang(20)."<th>&nbsp;</thead>\n";while($G=$E->fetch_assoc()){echo'<tr'.odd().'><td>'.h($G["User"])."<td>".h($G["Host"]).'<td><a href="'.h(ME.'user='.urlencode($G["User"]).'&host='.urlencode($G["Host"])).'">'.lang(31)."</a>\n";}if(!$mc||DB!=""){echo"<tr".odd()."><td><input name='user'><td><input name='host' value='localhost'><td><input type='submit' value='".lang(31)."'>\n";}echo"</table>\n","</form>\n",'<p><a href="'.h(ME).'user=">'.lang(119)."</a>";}elseif(isset($_GET["sql"])){if(!$k&&$_POST["export"]){dump_headers("sql");$b->dumpTable("","");$b->dumpData("","table",$_POST["query"]);exit;}restart_session();$tc=&get_session("queries");$sc=&$tc[DB];if(!$k&&$_POST["clear"]){$sc=array();redirect(remove_from_uri("history"));}page_header(lang(43),$k);if(!$k&&$_POST){$ic=false;$D=$_POST["query"];if($_POST["webfile"]){$ic=@fopen((file_exists("adminer.sql")?"adminer.sql":(file_exists("adminer.sql.gz")?"compress.zlib://adminer.sql.gz":"compress.bzip2://adminer.sql.bz2")),"rb");$D=($ic?fread($ic,1e6):false);}elseif($_FILES&&$_FILES["sql_file"]["error"]!=4){$D=get_file("sql_file",true);}if(is_string($D)){if(function_exists('memory_get_usage')){@ini_set("memory_limit",max(ini_get("memory_limit"),2*strlen($D)+memory_get_usage()+8e6));}if($D!=""&&strlen($D)<1e6){$C=$D.(ereg(';$',$D)?"":";");if(!$sc||end($sc)!=$C){$sc[]=$C;}}$Xe="(?:\\s|/\\*.*\\*/|(?:#|-- )[^\n]*\n|--\n)";if(!ini_bool("session.use_cookies")){session_write_close();}$nb=";";$A=0;$Db=true;$h=connect();if(is_object($h)&&DB!=""){$h->select_db(DB);}$Ta=0;$Kb=array();$Wd='[\'"'.($u=="sql"?'`#':($u=="sqlite"?'`[':($u=="mssql"?'[':''))).']|/\\*|-- |$'.($u=="pgsql"?'|\\$[^$]*\\$':'');$Df=microtime();parse_str($_COOKIE["adminer_export"],$qa);$xb=$b->dumpFormat();unset($xb["sql"]);while($D!=""){if(!$A&&preg_match("~^$Xe*DELIMITER\\s+(.+)~i",$D,$z)){$nb=$z[1];$D=substr($D,strlen($z[0]));}else{preg_match('('.preg_quote($nb)."|$Wd)",$D,$z,PREG_OFFSET_CAPTURE,$A);$gc=$z[0][0];if(!$gc&&$ic&&!feof($ic)){$D.=fread($ic,1e5);}else{$A=$z[0][1]+strlen($gc);if(!$gc&&rtrim($D)==""){break;}if($gc&&$gc!=$nb){while(preg_match('('.($gc=='/*'?'\\*/':($gc=='['?']':(ereg('^-- |^#',$gc)?"\n":preg_quote($gc)."|\\\\."))).'|$)s',$D,$z,PREG_OFFSET_CAPTURE,$A)){$Ke=$z[0][0];$A=$z[0][1]+strlen($Ke);if(!$Ke&&$ic&&!feof($ic)){$A-=strlen($gc);$D.=fread($ic,1e5);}elseif($Ke[0]!="\\"){break;}}}else{$Db=false;$C=substr($D,0,$z[0][1]);$Ta++;$me="<pre id='sql-$Ta'><code class='jush-$u'>".shorten_utf8(trim($C),1000)."</code></pre>\n";if(!$_POST["only_errors"]){echo$me;ob_flush();flush();}$Ze=microtime();if($g->multi_query($C)&&is_object($h)&&preg_match("~^$Xe*USE\\b~isU",$C)){$h->query($C);}do{$E=$g->store_result();$Eb=microtime();$xf=format_time($Ze,$Eb).(strlen($C)<1000?" <a href='".h(ME)."sql=".urlencode(trim($C))."'>".lang(31)."</a>":"");if($g->error){echo($_POST["only_errors"]?$me:""),"<p class='error'>".lang(120).": ".error()."\n";$Kb[]=" <a href='#sql-$Ta'>$Ta</a>";if($_POST["error_stops"]){break
2;}}elseif(is_object($E)){select($E,$h);if(!$_POST["only_errors"]){echo"<form action='' method='post'>\n","<p>".($E->num_rows?lang(121,$E->num_rows):"").$xf;$q="export-$Ta";$Sb=", <a href='#$q' onclick=\"return  !toggle('$q');\">".lang(113)."</a><span id='$q' class='hidden'>: ".html_select("output",$b->dumpOutput(),$qa["output"])." ".html_select("format",$xb,$qa["format"])."<input type='hidden' name='query' value='".h($C)."'>"." <input type='submit' name='export' value='".lang(113)."' onclick='eventStop(event);'><input type='hidden' name='token' value='$Q'></span>\n";if($h&&preg_match("~^($Xe|\\()*SELECT\\b~isU",$C)&&($Rb=explain($h,$C))){$q="explain-$Ta";echo", <a href='#$q' onclick=\"return  !toggle('$q');\">EXPLAIN</a>$Sb","<div id='$q' class='hidden'>\n";select($Rb,$h,($u=="sql"?"http://dev.mysql.com/doc/refman/".substr($g->server_info,0,3)."/en/explain-output.html#explain_":""));echo"</div>\n";}else{echo$Sb;}echo"</form>\n";}}else{if(preg_match("~^$Xe*(CREATE|DROP|ALTER)$Xe+(DATABASE|SCHEMA)\\b~isU",$C)){restart_session();set_session("dbs",null);session_write_close();}if(!$_POST["only_errors"]){echo"<p class='message' title='".h($g->info)."'>".lang(122,$g->affected_rows)."$xf\n";}}$Ze=$Eb;}while($g->next_result());$D=substr($D,$A);$A=0;}}}}if($Db){echo"<p class='message'>".lang(123)."\n";}elseif($_POST["only_errors"]){echo"<p class='message'>".lang(124,$Ta-count($Kb)).format_time($Df,microtime())."\n";}elseif($Kb&&$Ta>1){echo"<p class='error'>".lang(120).": ".implode("",$Kb)."\n";}}else{echo"<p class='error'>".upload_error($D)."\n";}}echo'
<form action="" method="post" enctype="multipart/form-data" id="form">
<p>';$C=$_GET["sql"];if($_POST){$C=$_POST["query"];}elseif($_GET["history"]=="all"){$C=$sc;}elseif($_GET["history"]!=""){$C=$sc[$_GET["history"]];}textarea("query",$C,20);echo($_POST?"":"<script type='text/javascript'>document.getElementsByTagName('textarea')[0].focus();</script>\n"),"<p>".(ini_bool("file_uploads")?lang(125).': <input type="file" name="sql_file"'.($_FILES&&$_FILES["sql_file"]["error"]!=4?'':' onchange="this.form[\'only_errors\'].checked = true;"').'> (&lt; '.ini_get("upload_max_filesize").'B)':lang(126)),'<p>
<input type="submit" value="',lang(127),'" title="Ctrl+Enter">
<input type="hidden" name="token" value="',$Q,'">
',checkbox("error_stops",1,$_POST["error_stops"],lang(128))."\n",checkbox("only_errors",1,$_POST["only_errors"],lang(129))."\n";print_fieldset("webfile",lang(130),$_POST["webfile"],"document.getElementById('form')['only_errors'].checked = true; ");$Wa=array();foreach(array("gz"=>"zlib","bz2"=>"bz2")as$v=>$W){if(extension_loaded($W)){$Wa[]=".$v";}}echo
lang(131,"<code>adminer.sql".($Wa?"[".implode("|",$Wa)."]":"")."</code>"),' <input type="submit" name="webfile" value="'.lang(132).'">',"</div></fieldset>\n";if($sc){print_fieldset("history",lang(133),$_GET["history"]!="");foreach($sc
as$v=>$W){echo'<a href="'.h(ME."sql=&history=$v").'">'.lang(31)."</a> <code class='jush-$u'>".shorten_utf8(ltrim(str_replace("\n"," ",str_replace("\r","",preg_replace('~^(#|-- ).*~m','',$W)))),80,"</code>")."<br>\n";}echo"<input type='submit' name='clear' value='".lang(134)."'>\n","<a href='".h(ME."sql=&history=all")."'>".lang(135)."</a>\n","</div></fieldset>\n";}echo'
</form>
';}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$Z=(isset($_GET["select"])?(count($_POST["check"])==1?where_check($_POST["check"][0]):""):where($_GET));$Sf=(isset($_GET["select"])?$_POST["edit"]:$Z);$m=fields($a);foreach($m
as$_=>$l){if(!isset($l["privileges"][$Sf?"update":"insert"])||$b->fieldName($l)==""){unset($m[$_]);}}if($_POST&&!$k&&!isset($_GET["select"])){$Wc=$_POST["referer"];if($_POST["insert"]){$Wc=($Sf?null:$_SERVER["REQUEST_URI"]);}elseif(!ereg('^.+&select=.+$',$Wc)){$Wc=ME."select=".urlencode($a);}if(isset($_POST["delete"])){query_redirect("DELETE".limit1("FROM ".table($a)," WHERE $Z"),$Wc,lang(136));}else{$K=array();foreach($m
as$_=>$l){$W=process_input($l);if($W!==false&&$W!==null){$K[idf_escape($_)]=($Sf?"\n".idf_escape($_)." = $W":$W);}}if($Sf){if(!$K){redirect($Wc);}query_redirect("UPDATE".limit1(table($a)." SET".implode(",",$K),"\nWHERE $Z"),$Wc,lang(137));}else{$E=insert_into($a,$K);$Pc=($E?last_id():0);queries_redirect($Wc,lang(138,($Pc?" $Pc":"")),$E);}}}$mf=$b->tableName(table_status($a));page_header(($Sf?lang(31):lang(139)),$k,array("select"=>array($a,$mf)),$mf);$G=null;if($_POST["save"]){$G=(array)$_POST["fields"];}elseif($Z){$I=array();foreach($m
as$_=>$l){if(isset($l["privileges"]["select"])){$I[]=($_POST["clone"]&&$l["auto_increment"]?"'' AS ":(ereg("enum|set",$l["type"])?"1*".idf_escape($_)." AS ":"")).idf_escape($_);}}$G=array();if($I){$H=get_rows("SELECT".limit(implode(", ",$I)." FROM ".table($a)," WHERE $Z",(isset($_GET["select"])?2:1)));$G=(isset($_GET["select"])&&count($H)!=1?null:reset($H));}}if($G===false){echo"<p class='error'>".lang(83)."\n";}echo'
<form action="" method="post" enctype="multipart/form-data" id="form">
';if($m){echo"<table cellspacing='0' onkeydown='return  editingKeydown(event);'>\n";foreach($m
as$_=>$l){echo"<tr><th>".$b->fieldName($l);$mb=$_GET["set"][bracket_escape($_)];$X=(isset($G)?($G[$_]!=""&&ereg("enum|set",$l["type"])?(is_array($G[$_])?array_sum($G[$_]):+$G[$_]):$G[$_]):(!$Sf&&$l["auto_increment"]?"":(isset($_GET["select"])?false:(isset($mb)?$mb:$l["default"]))));if(!$_POST["save"]&&is_string($X)){$X=$b->editVal($X,$l);}$o=($_POST["save"]?(string)$_POST["function"][$_]:($Sf&&$l["on_update"]=="CURRENT_TIMESTAMP"?"now":($X===false?null:(isset($X)?'':'NULL'))));if($l["type"]=="timestamp"&&$X=="CURRENT_TIMESTAMP"){$X="";$o="now";}input($l,$X,$o);echo"\n";}echo"</table>\n";}echo'<p>
';if($m){echo"<input type='submit' value='".lang(140)."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Sf?lang(141):lang(142))."' title='Ctrl+Shift+Enter'>\n";}}echo($Sf?"<input type='submit' name='delete' value='".lang(143)."' onclick=\"return  confirm('".lang(0)."');\">\n":($_POST||!$m?"":"<script type='text/javascript'>document.getElementById('form').getElementsByTagName('td')[1].firstChild.focus();</script>\n"));if(isset($_GET["select"])){hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));}echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$Q,'">
</form>
';}elseif(isset($_GET["create"])){$a=$_GET["create"];$Xd=array('HASH','LINEAR HASH','KEY','LINEAR KEY','RANGE','LIST');$ye=referencable_primary($a);$fc=array();foreach($ye
as$mf=>$l){$fc[str_replace("`","``",$mf)."`".str_replace("`","``",$l["field"])]=$mf;}$Od=array();$Pd=array();if($a!=""){$Od=fields($a);$Pd=table_status($a);}if($_POST&&!$_POST["fields"]){$_POST["fields"]=array();}if($_POST&&!$k&&!$_POST["add"]&&!$_POST["drop_col"]&&!$_POST["up"]&&!$_POST["down"]){if($_POST["drop"]){query_redirect("DROP TABLE ".table($a),substr(ME,0,-1),lang(144));}else{$m=array();$dc=array();ksort($_POST["fields"]);$Nd=reset($Od);$ua="FIRST";foreach($_POST["fields"]as$v=>$l){$n=$fc[$l["type"]];$Jf=(isset($n)?$ye[$n]:$l);if($l["field"]!=""){if(!$l["has_default"]){$l["default"]=null;}$mb=eregi_replace(" *on update CURRENT_TIMESTAMP","",$l["default"]);if($mb!=$l["default"]){$l["on_update"]="CURRENT_TIMESTAMP";$l["default"]=$mb;}if($v==$_POST["auto_increment_col"]){$l["auto_increment"]=true;}$re=process_field($l,$Jf);if($re!=process_field($Nd,$Nd)){$m[]=array($l["orig"],$re,$ua);}if(isset($n)){$dc[idf_escape($l["field"])]=($a!=""?"ADD":" ")." FOREIGN KEY (".idf_escape($l["field"]).") REFERENCES ".table($fc[$l["type"]])." (".idf_escape($Jf["field"]).")".(ereg("^($Bd)\$",$l["on_delete"])?" ON DELETE $l[on_delete]":"");}$ua="AFTER ".idf_escape($l["field"]);}elseif($l["orig"]!=""){$m[]=array($l["orig"]);}if($l["orig"]!=""){$Nd=next($Od);}}$Zd="";if(in_array($_POST["partition_by"],$Xd)){$ae=array();if($_POST["partition_by"]=='RANGE'||$_POST["partition_by"]=='LIST'){foreach(array_filter($_POST["partition_names"])as$v=>$W){$X=$_POST["partition_values"][$v];$ae[]="\nPARTITION ".idf_escape($W)." VALUES ".($_POST["partition_by"]=='RANGE'?"LESS THAN":"IN").($X!=""?" ($X)":" MAXVALUE");}}$Zd.="\nPARTITION BY $_POST[partition_by]($_POST[partition])".($ae?" (".implode(",",$ae)."\n)":($_POST["partitions"]?" PARTITIONS ".(+$_POST["partitions"]):""));}elseif($a!=""&&support("partitioning")){
	$Zd.="\n -- REMOVE PARTITIONING";
}$hd=lang(145);if($a==""){cookie("adminer_engine",$_POST["Engine"]);$hd=lang(146);}queries_redirect(ME."table=".urlencode($_POST["name"]),$hd,alter_table($a,$_POST["name"],$m,$dc,$_POST["Comment"],($_POST["Engine"]&&$_POST["Engine"]!=$Pd["Engine"]?$_POST["Engine"]:""),($_POST["Collation"]&&$_POST["Collation"]!=$Pd["Collation"]?$_POST["Collation"]:""),($_POST["Auto_increment"]!=""?+$_POST["Auto_increment"]:""),$Zd));}}page_header(($a!=""?lang(28):lang(147)),$k,array("table"=>$a),$a);$G=array("Engine"=>$_COOKIE["adminer_engine"],"fields"=>array(array("field"=>"","type"=>(isset($T["int"])?"int":(isset($T["integer"])?"integer":"")))),"partition_names"=>array(""),);if($_POST){$G=$_POST;if($G["auto_increment_col"]){$G["fields"][$G["auto_increment_col"]]["auto_increment"]=true;}process_fields($G["fields"]);}elseif($a!=""){$G=$Pd;$G["name"]=$a;$G["fields"]=array();if(!$_GET["auto_increment"]){$G["Auto_increment"]="";}foreach($Od
as$l){$l["has_default"]=isset($l["default"]);if($l["on_update"]){$l["default"].=" ON UPDATE $l[on_update]";}$G["fields"][]=$l;}if(support("partitioning")){$jc="FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = ".q(DB)." AND TABLE_NAME = ".q($a);$E=$g->query("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $jc ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1");list($G["partition_by"],$G["partitions"],$G["partition"])=$E->fetch_row();$G["partition_names"]=array();$G["partition_values"]=array();foreach(get_rows("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $jc AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION")as$Je){$G["partition_names"][]=$Je["PARTITION_NAME"];$G["partition_values"][]=$Je["PARTITION_DESCRIPTION"];}$G["partition_names"][]="";}}$Qa=collations();$hf=floor(extension_loaded("suhosin")?(min(ini_get("suhosin.request.max_vars"),ini_get("suhosin.post.max_vars"))-13)/10:0);if($hf&&count($G["fields"])>$hf){echo"<p class='error'>".h(lang(148,'suhosin.post.max_vars','suhosin.request.max_vars'))."\n";}$Gb=engines();foreach($Gb
as$Fb){if(!strcasecmp($Fb,$G["Engine"])){$G["Engine"]=$Fb;break;}}echo'
<form action="" method="post" id="form">
<p>
',lang(149),': <input name="name" maxlength="64" value="',h($G["name"]),'">
';if($a==""&&!$_POST){?><script type='text/javascript'>document.getElementById('form')['name'].focus();</script><?php }echo($Gb?html_select("Engine",array(""=>"(".lang(150).")")+$Gb,$G["Engine"]):""),' ',($Qa&&!ereg("sqlite|mssql",$u)?html_select("Collation",array(""=>"(".lang(86).")")+$Qa,$G["Collation"]):""),' <input type="submit" value="',lang(140),'">
<table cellspacing="0" id="edit-fields" class="nowrap">
';$Va=($_POST?$_POST["comments"]:$G["Comment"]!="");if(!$_POST&&!$Va){foreach($G["fields"]as$l){if($l["comment"]!=""){$Va=true;break;}}}edit_fields($G["fields"],$Qa,"TABLE",$hf,$fc,$Va);echo'</table>
<p>
',lang(93),': <input name="Auto_increment" size="6" value="',h($G["Auto_increment"]),'">
<label class="jsonly"><input type="checkbox" name="defaults" value="1"',($_POST["defaults"]?" checked":""),' onclick="columnShow(this.checked, 5);">',lang(94),'</label>
',(support("comment")?checkbox("comments",1,$Va,lang(95),"columnShow(this.checked, 6); toggle('Comment'); if (this.checked) this.form['Comment'].focus();",true).' <input id="Comment" name="Comment" value="'.h($G["Comment"]).'" maxlength="60"'.($Va?'':' class="hidden"').'>':''),'<p>
<input type="submit" value="',lang(140),'">
';if($_GET["create"]!=""){echo'<input type="submit" name="drop" value="',lang(79),'"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$Q,'">
';if(support("partitioning")){$Yd=ereg('RANGE|LIST',$G["partition_by"]);print_fieldset("partition",lang(151),$G["partition_by"]);echo'<p>
',html_select("partition_by",array(-1=>"")+$Xd,$G["partition_by"],"partitionByChange(this);"),'(<input name="partition" value="',h($G["partition"]),'">)
',lang(152),': <input name="partitions" size="2" value="',h($G["partitions"]),'"',($Yd||!$G["partition_by"]?" class='hidden'":""),'>
<table cellspacing="0" id="partition-table"',($Yd?"":" class='hidden'"),'>
<thead><tr><th>',lang(153),'<th>',lang(154),'</thead>
';foreach($G["partition_names"]as$v=>$W){echo'<tr>','<td><input name="partition_names[]" value="'.h($W).'"'.($v==count($G["partition_names"])-1?' onchange="partitionNameChange(this);"':'').'>','<td><input name="partition_values[]" value="'.h($G["partition_values"][$v]).'">';}echo'</table>
</div></fieldset>
';}echo'</form>
';}elseif(isset($_GET["indexes"])){$a=$_GET["indexes"];$zc=array("PRIMARY","UNIQUE","INDEX");$O=table_status($a);if(eregi("MyISAM|M?aria",$O["Engine"])){$zc[]="FULLTEXT";}$t=indexes($a);if($u=="sqlite"){unset($zc[0]);unset($t[""]);}if($_POST&&!$k&&!$_POST["add"]){$c=array();foreach($_POST["indexes"]as$s){$_=$s["name"];if(in_array($s["type"],$zc)){$f=array();$Uc=array();$K=array();ksort($s["columns"]);foreach($s["columns"]as$v=>$e){if($e!=""){$w=$s["lengths"][$v];$K[]=idf_escape($e).($w?"(".(+$w).")":"");$f[]=$e;$Uc[]=($w?$w:null);}}if($f){$Qb=$t[$_];if($Qb){ksort($Qb["columns"]);ksort($Qb["lengths"]);if($s["type"]==$Qb["type"]&&array_values($Qb["columns"])===$f&&(!$Qb["lengths"]||array_values($Qb["lengths"])===$Uc)){unset($t[$_]);continue;}}$c[]=array($s["type"],$_,"(".implode(", ",$K).")");}}}foreach($t
as$_=>$Qb){$c[]=array($Qb["type"],$_,"DROP");}if(!$c){redirect(ME."table=".urlencode($a));}queries_redirect(ME."table=".urlencode($a),lang(155),alter_indexes($a,$c));}page_header(lang(103),$k,array("table"=>$a),$a);$m=array_keys(fields($a));$G=array("indexes"=>$t);if($_POST){$G=$_POST;if($_POST["add"]){foreach($G["indexes"]as$v=>$s){if($s["columns"][count($s["columns"])]!=""){$G["indexes"][$v]["columns"][]="";}}$s=end($G["indexes"]);if($s["type"]||array_filter($s["columns"],'strlen')||array_filter($s["lengths"],'strlen')){$G["indexes"][]=array("columns"=>array(1=>""));}}}else{foreach($G["indexes"]as$v=>$s){$G["indexes"][$v]["name"]=$v;$G["indexes"][$v]["columns"][]="";}$G["indexes"][]=array("columns"=>array(1=>""));}echo'
<form action="" method="post">
<table cellspacing="0" class="nowrap">
<thead><tr><th>',lang(156),'<th>',lang(157),'<th>',lang(158),'</thead>
';$Ic=1;foreach($G["indexes"]as$s){echo"<tr><td>".html_select("indexes[$Ic][type]",array(-1=>"")+$zc,$s["type"],($Ic==count($G["indexes"])?"indexesAddRow(this);":1))."<td>";ksort($s["columns"]);$p=1;foreach($s["columns"]as$v=>$e){echo"<span>".html_select("indexes[$Ic][columns][$p]",array(-1=>"")+$m,$e,($p==count($s["columns"])?"indexesAddColumn":"indexesChangeColumn")."(this, '".js_escape($u=="sql"?"":$_GET["indexes"]."_")."');"),"<input name='indexes[$Ic][lengths][$p]' size='2' value='".h($s["lengths"][$v])."'> </span>";$p++;}echo"<td><input name='indexes[$Ic][name]' value='".h($s["name"])."'>\n";$Ic++;}echo'</table>
<p>
<input type="submit" value="',lang(140),'">
<noscript><p><input type="submit" name="add" value="',lang(96),'"></noscript>
<input type="hidden" name="token" value="',$Q,'">
</form>
';}elseif(isset($_GET["database"])){if($_POST&&!$k&&!isset($_POST["add_x"])){restart_session();if($_POST["drop"]){$_GET["db"]="";queries_redirect(remove_from_uri("db|database"),lang(159),drop_databases(array(DB)));}elseif(DB!==$_POST["name"]){if(DB!=""){$_GET["db"]=$_POST["name"];queries_redirect(preg_replace('~db=[^&]*&~','',ME)."db=".urlencode($_POST["name"]),lang(160),rename_database($_POST["name"],$_POST["collation"]));}else{$i=explode("\n",str_replace("\r","",$_POST["name"]));$ff=true;$Oc="";foreach($i
as$j){if(count($i)==1||$j!=""){if(!create_database($j,$_POST["collation"])){$ff=false;}$Oc=$j;}}queries_redirect(ME."db=".urlencode($Oc),lang(161),$ff);}}else{if(!$_POST["collation"]){redirect(substr(ME,0,-1));}query_redirect("ALTER DATABASE ".idf_escape($_POST["name"]).(eregi('^[a-z0-9_]+$',$_POST["collation"])?" COLLATE $_POST[collation]":""),substr(ME,0,-1),lang(162));}}page_header(DB!=""?lang(46):lang(163),$k,array(),DB);$Qa=collations();$_=DB;$Pa=null;if($_POST){$_=$_POST["name"];$Pa=$_POST["collation"];}elseif(DB!=""){$Pa=db_collation(DB,$Qa);}elseif($u=="sql"){foreach(get_vals("SHOW GRANTS")as$mc){if(preg_match('~ ON (`(([^\\\\`]|``|\\\\.)*)%`\\.\\*)?~',$mc,$z)&&$z[1]){$_=stripcslashes(idf_unescape("`$z[2]`"));break;}}}echo'
<form action="" method="post">
<p>
',($_POST["add_x"]||strpos($_,"\n")?'<textarea id="name" name="name" rows="10" cols="40">'.h($_).'</textarea><br>':'<input id="name" name="name" value="'.h($_).'" maxlength="64">')."\n".($Qa?html_select("collation",array(""=>"(".lang(86).")")+$Qa,$Pa):"");?>
<script type='text/javascript'>document.getElementById('name').focus();</script>
<input type="submit" value="<?php echo
lang(140),'">
';if(DB!=""){echo"<input type='submit' name='drop' value='".lang(79)."'".confirm().">\n";}elseif(!$_POST["add_x"]&&$_GET["db"]==""){echo"<input type='image' name='add' src='".h(preg_replace("~\\?.*~","",ME))."?file=plus.gif&amp;version=3.3.3' alt='+' title='".lang(96)."'>\n";}echo'<input type="hidden" name="token" value="',$Q,'">
</form>
';}elseif(isset($_GET["scheme"])){if($_POST&&!$k){$y=preg_replace('~ns=[^&]*&~','',ME)."ns=";if($_POST["drop"]){query_redirect("DROP SCHEMA ".idf_escape($_GET["ns"]),$y,lang(164));}else{$y.=urlencode($_POST["name"]);if($_GET["ns"]==""){query_redirect("CREATE SCHEMA ".idf_escape($_POST["name"]),$y,lang(165));}elseif($_GET["ns"]!=$_POST["name"]){query_redirect("ALTER SCHEMA ".idf_escape($_GET["ns"])." RENAME TO ".idf_escape($_POST["name"]),$y,lang(166));}else{redirect($y);}}}page_header($_GET["ns"]!=""?lang(47):lang(48),$k);$G=$_POST;if(!$G){$G=array("name"=>$_GET["ns"]);}echo'
<form action="" method="post">
<p><input name="name" value="',h($G["name"]),'">
<input type="submit" value="',lang(140),'">
';if($_GET["ns"]!=""){echo"<input type='submit' name='drop' value='".lang(79)."'".confirm().">\n";}echo'<input type="hidden" name="token" value="',$Q,'">
</form>
';}elseif(isset($_GET["call"])){$da=$_GET["call"];page_header(lang(167).": ".h($da),$k);$Ge=routine($da,(isset($_GET["callf"])?"FUNCTION":"PROCEDURE"));$yc=array();$Qd=array();foreach($Ge["fields"]as$p=>$l){if(substr($l["inout"],-3)=="OUT"){$Qd[$p]="@".idf_escape($l["field"])." AS ".idf_escape($l["field"]);}if(!$l["inout"]||substr($l["inout"],0,2)=="IN"){$yc[]=$p;}}if(!$k&&$_POST){$Ja=array();foreach($Ge["fields"]as$v=>$l){if(in_array($v,$yc)){$W=process_input($l);if($W===false){$W="''";}if(isset($Qd[$v])){$g->query("SET @".idf_escape($l["field"])." = $W");}}$Ja[]=(isset($Qd[$v])?"@".idf_escape($l["field"]):$W);}$D=(isset($_GET["callf"])?"SELECT":"CALL")." ".idf_escape($da)."(".implode(", ",$Ja).")";echo"<p><code class='jush-$u'>".h($D)."</code> <a href='".h(ME)."sql=".urlencode($D)."'>".lang(31)."</a>\n";if(!$g->multi_query($D)){echo"<p class='error'>".error()."\n";}else{$h=connect();if(is_object($h)){$h->select_db(DB);}do{$E=$g->store_result();if(is_object($E)){select($E,$h);}else{echo"<p class='message'>".lang(168,$g->affected_rows)."\n";}}while($g->next_result());if($Qd){select($g->query("SELECT ".implode(", ",$Qd)));}}}echo'
<form action="" method="post">
';if($yc){echo"<table cellspacing='0'>\n";foreach($yc
as$v){$l=$Ge["fields"][$v];$_=$l["field"];echo"<tr><th>".$b->fieldName($l);$X=$_POST["fields"][$_];if($X!=""){if($l["type"]=="enum"){$X=+$X;}if($l["type"]=="set"){$X=array_sum($X);}}input($l,$X,(string)$_POST["function"][$_]);echo"\n";}echo"</table>\n";}echo'<p>
<input type="submit" value="',lang(167),'">
<input type="hidden" name="token" value="',$Q,'">
</form>
';}elseif(isset($_GET["foreign"])){$a=$_GET["foreign"];if($_POST&&!$k&&!$_POST["add"]&&!$_POST["change"]&&!$_POST["change-js"]){if($_POST["drop"]){query_redirect("ALTER TABLE ".table($a)."\nDROP ".($u=="sql"?"FOREIGN KEY ":"CONSTRAINT ").idf_escape($_GET["name"]),ME."table=".urlencode($a),lang(169));}else{$We=array_filter($_POST["source"],'strlen');ksort($We);$tf=array();foreach($We
as$v=>$W){$tf[$v]=$_POST["target"][$v];}query_redirect("ALTER TABLE ".table($a).($_GET["name"]!=""?"\nDROP FOREIGN KEY ".idf_escape($_GET["name"]).",":"")."\nADD FOREIGN KEY (".implode(", ",array_map('idf_escape',$We)).") REFERENCES ".table($_POST["table"])." (".implode(", ",array_map('idf_escape',$tf)).")".(ereg("^($Bd)\$",$_POST["on_delete"])?" ON DELETE $_POST[on_delete]":"").(ereg("^($Bd)\$",$_POST["on_update"])?" ON UPDATE $_POST[on_update]":""),ME."table=".urlencode($a),($_GET["name"]!=""?lang(170):lang(171)));$k=lang(172)."<br>$k";}}page_header(lang(173),$k,array("table"=>$a),$a);$G=array("table"=>$a,"source"=>array(""));if($_POST){$G=$_POST;ksort($G["source"]);if($_POST["add"]){$G["source"][]="";}elseif($_POST["change"]||$_POST["change-js"]){$G["target"]=array();}}elseif($_GET["name"]!=""){$fc=foreign_keys($a);$G=$fc[$_GET["name"]];$G["source"][]="";}$We=array_keys(fields($a));$tf=($a===$G["table"]?$We:array_keys(fields($G["table"])));$xe=array();foreach(table_status()as$_=>$O){if(fk_support($O)){$xe[]=$_;}}echo'
<form action="" method="post">
<p>
';if($G["db"]==""&&$G["ns"]==""){echo
lang(174),':
',html_select("table",$xe,$G["table"],"this.form['change-js'].value = '1'; if (!ajaxForm(this.form)) this.form.submit();"),'<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="',lang(175),'"></noscript>
<table cellspacing="0">
<thead><tr><th>',lang(105),'<th>',lang(106),'</thead>
';$Ic=0;foreach($G["source"]as$v=>$W){echo"<tr>","<td>".html_select("source[".(+$v)."]",array(-1=>"")+$We,$W,($Ic==count($G["source"])-1?"foreignAddRow(this);":1)),"<td>".html_select("target[".(+$v)."]",$tf,$G["target"][$v]);$Ic++;}echo'</table>
<p>
',lang(87),': ',html_select("on_delete",array(-1=>"")+explode("|",$Bd),$G["on_delete"]),' ',lang(107),': ',html_select("on_update",array(-1=>"")+explode("|",$Bd),$G["on_update"]),'<p>
<input type="submit" value="',lang(140),'">
<noscript><p><input type="submit" name="add" value="',lang(176),'"></noscript>
';}if($_GET["name"]!=""){echo'<input type="submit" name="drop" value="',lang(79),'"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$Q,'">
</form>
';}elseif(isset($_GET["view"])){$a=$_GET["view"];$vb=false;if($_POST&&!$k){$vb=drop_create("DROP VIEW ".table($a),"CREATE VIEW ".table($_POST["name"])." AS\n$_POST[select]",($_POST["drop"]?substr(ME,0,-1):ME."table=".urlencode($_POST["name"])),lang(177),lang(178),lang(179),$a);}page_header(($a!=""?lang(27):lang(180)),$k,array("table"=>$a),$a);$G=$_POST;if(!$G&&$a!=""){$G=view($a);$G["name"]=$a;}echo'
<form action="" method="post">
<p>',lang(158),': <input name="name" value="',h($G["name"]),'" maxlength="64">
<p>';textarea("select",$G["select"]);echo'<p>
';if($vb){echo'<input type="hidden" name="dropped" value="1">';}echo'<input type="submit" value="',lang(140),'">
';if($_GET["view"]!=""){echo'<input type="submit" name="drop" value="',lang(79),'"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$Q,'">
</form>
';}elseif(isset($_GET["event"])){$aa=$_GET["event"];$Fc=array("YEAR","QUARTER","MONTH","DAY","HOUR","MINUTE","WEEK","SECOND","YEAR_MONTH","DAY_HOUR","DAY_MINUTE","DAY_SECOND","HOUR_MINUTE","HOUR_SECOND","MINUTE_SECOND");$bf=array("ENABLED"=>"ENABLE","DISABLED"=>"DISABLE","SLAVESIDE_DISABLED"=>"DISABLE ON SLAVE");if($_POST&&!$k){if($_POST["drop"]){query_redirect("DROP EVENT ".idf_escape($aa),substr(ME,0,-1),lang(181));}elseif(in_array($_POST["INTERVAL_FIELD"],$Fc)&&isset($bf[$_POST["STATUS"]])){$Le="\nON SCHEDULE ".($_POST["INTERVAL_VALUE"]?"EVERY ".q($_POST["INTERVAL_VALUE"])." $_POST[INTERVAL_FIELD]".($_POST["STARTS"]?" STARTS ".q($_POST["STARTS"]):"").($_POST["ENDS"]?" ENDS ".q($_POST["ENDS"]):""):"AT ".q($_POST["STARTS"]))." ON COMPLETION".($_POST["ON_COMPLETION"]?"":" NOT")." PRESERVE";queries_redirect(substr(ME,0,-1),($aa!=""?lang(182):lang(183)),queries(($aa!=""?"ALTER EVENT ".idf_escape($aa).$Le.($aa!=$_POST["EVENT_NAME"]?"\nRENAME TO ".idf_escape($_POST["EVENT_NAME"]):""):"CREATE EVENT ".idf_escape($_POST["EVENT_NAME"]).$Le)."\n".$bf[$_POST["STATUS"]]." COMMENT ".q($_POST["EVENT_COMMENT"]).rtrim(" DO\n$_POST[EVENT_DEFINITION]",";").";"));}}page_header(($aa!=""?lang(184).": ".h($aa):lang(185)),$k);$G=$_POST;if(!$G&&$aa!=""){$H=get_rows("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = ".q(DB)." AND EVENT_NAME = ".q($aa));$G=reset($H);}echo'
<form action="" method="post">
<table cellspacing="0">
<tr><th>',lang(158),'<td><input name="EVENT_NAME" value="',h($G["EVENT_NAME"]),'" maxlength="64">
<tr><th>',lang(186),'<td><input name="STARTS" value="',h("$G[EXECUTE_AT]$G[STARTS]"),'">
<tr><th>',lang(187),'<td><input name="ENDS" value="',h($G["ENDS"]),'">
<tr><th>',lang(188),'<td><input name="INTERVAL_VALUE" value="',h($G["INTERVAL_VALUE"]),'" size="6"> ',html_select("INTERVAL_FIELD",$Fc,$G["INTERVAL_FIELD"]),'<tr><th>',lang(74),'<td>',html_select("STATUS",$bf,$G["STATUS"]),'<tr><th>',lang(95),'<td><input name="EVENT_COMMENT" value="',h($G["EVENT_COMMENT"]),'" maxlength="64">
<tr><th>&nbsp;<td>',checkbox("ON_COMPLETION","PRESERVE",$G["ON_COMPLETION"]=="PRESERVE",lang(189)),'</table>
<p>';textarea("EVENT_DEFINITION",$G["EVENT_DEFINITION"]);echo'<p>
<input type="submit" value="',lang(140),'">
';if($aa!=""){echo'<input type="submit" name="drop" value="',lang(79),'"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$Q,'">
</form>
';}elseif(isset($_GET["procedure"])){$da=$_GET["procedure"];$Ge=(isset($_GET["function"])?"FUNCTION":"PROCEDURE");$He=routine_languages();$vb=false;if($_POST&&!$k&&!$_POST["add"]&&!$_POST["drop_col"]&&!$_POST["up"]&&!$_POST["down"]){$K=array();$m=(array)$_POST["fields"];ksort($m);foreach($m
as$l){if($l["field"]!=""){$K[]=(ereg("^($Cc)\$",$l["inout"])?"$l[inout] ":"").idf_escape($l["field"]).process_type($l,"CHARACTER SET");}}$vb=drop_create("DROP $Ge ".idf_escape($da),"CREATE $Ge ".idf_escape($_POST["name"])." (".implode(", ",$K).")".(isset($_GET["function"])?" return S".process_type($_POST["return s"],"CHARACTER SET"):"").(in_array($_POST["language"],$He)?" LANGUAGE $_POST[language]":"").rtrim("\n$_POST[definition]",";").";",substr(ME,0,-1),lang(190),lang(191),lang(192),$da);}page_header(($da!=""?(isset($_GET["function"])?lang(193):lang(194)).": ".h($da):(isset($_GET["function"])?lang(195):lang(196))),$k);$Qa=get_vals("SHOW CHARACTER SET");sort($Qa);$G=array("fields"=>array());if($_POST){$G=$_POST;$G["fields"]=(array)$G["fields"];process_fields($G["fields"]);}elseif($da!=""){$G=routine($da,$Ge);$G["name"]=$da;}echo'
<form action="" method="post" id="form">
<p>',lang(158),': <input name="name" value="',h($G["name"]),'" maxlength="64">
',($He?lang(7).": ".html_select("language",$He,$G["language"]):""),'<table cellspacing="0" class="nowrap">
';edit_fields($G["fields"],$Qa,$Ge);if(isset($_GET["function"])){echo"<tr><td>".lang(197);edit_type("return s",$G["return s"],$Qa);}echo'</table>
<p>';textarea("definition",$G["definition"]);echo'<p>
<input type="submit" value="',lang(140),'">
';if($da!=""){echo'<input type="submit" name="drop" value="',lang(79),'"',confirm(),'>';}if($vb){echo'<input type="hidden" name="dropped" value="1">';}echo'<input type="hidden" name="token" value="',$Q,'">
</form>
';}elseif(isset($_GET["sequence"])){$fa=$_GET["sequence"];if($_POST&&!$k){$y=substr(ME,0,-1);if($_POST["drop"]){query_redirect("DROP SEQUENCE ".idf_escape($fa),$y,lang(198));}elseif($fa==""){query_redirect("CREATE SEQUENCE ".idf_escape($_POST["name"]),$y,lang(199));}elseif($fa!=$_POST["name"]){query_redirect("ALTER SEQUENCE ".idf_escape($fa)." RENAME TO ".idf_escape($_POST["name"]),$y,lang(200));}else{redirect($y);}}page_header($fa!=""?lang(201).": ".h($fa):lang(202),$k);$G=$_POST;if(!$G){$G=array("name"=>$fa);}echo'
<form action="" method="post">
<p><input name="name" value="',h($G["name"]),'">
<input type="submit" value="',lang(140),'">
';if($fa!=""){echo"<input type='submit' name='drop' value='".lang(79)."'".confirm().">\n";}echo'<input type="hidden" name="token" value="',$Q,'">
</form>
';}elseif(isset($_GET["type"])){$ga=$_GET["type"];if($_POST&&!$k){$y=substr(ME,0,-1);if($_POST["drop"]){query_redirect("DROP TYPE ".idf_escape($ga),$y,lang(203));}else{query_redirect("CREATE TYPE ".idf_escape($_POST["name"])." $_POST[as]",$y,lang(204));}}page_header($ga!=""?lang(205).": ".h($ga):lang(206),$k);$G=$_POST;if(!$G){$G=array("as"=>"AS ");}echo'
<form action="" method="post">
<p>
';if($ga!=""){echo"<input type='submit' name='drop' value='".lang(79)."'".confirm().">\n";}else{echo"<input name='name' value='".h($G['name'])."'>\n";textarea("as",$G["as"]);echo"<p><input type='submit' value='".lang(140)."'>\n";}echo'<input type="hidden" name="token" value="',$Q,'">
</form>
';}elseif(isset($_GET["trigger"])){$a=$_GET["trigger"];$Hf=trigger_options();$Gf=array("INSERT","UPDATE","DELETE");$vb=false;if($_POST&&!$k&&in_array($_POST["Timing"],$Hf["Timing"])&&in_array($_POST["Event"],$Gf)&&in_array($_POST["Type"],$Hf["Type"])){$yf=" $_POST[Timing] $_POST[Event]";$Ad=" ON ".table($a);$vb=drop_create("DROP TRIGGER ".idf_escape($_GET["name"]).($u=="pgsql"?$Ad:""),"CREATE TRIGGER ".idf_escape($_POST["Trigger"]).($u=="mssql"?$Ad.$yf:$yf.$Ad).rtrim(" $_POST[Type]\n$_POST[Statement]",";").";",ME."table=".urlencode($a),lang(207),lang(208),lang(209),$_GET["name"]);}page_header(($_GET["name"]!=""?lang(210).": ".h($_GET["name"]):lang(211)),$k,array("table"=>$a));$G=$_POST;if(!$G){$G=trigger($_GET["name"])+array("Trigger"=>$a."_bi");}echo'
<form action="" method="post" id="form">
<table cellspacing="0">
<tr><th>',lang(212),'<td>',html_select("Timing",$Hf["Timing"],$G["Timing"],"if (/^".preg_quote($a,"/")."_[ba][iud]$/.test(this.form['Trigger'].value)) this.form['Trigger'].value = '".js_escape($a)."_' + selectValue(this).charAt(0).toLowerCase() + selectValue(this.form['Event']).charAt(0).toLowerCase();"),'<tr><th>',lang(213),'<td>',html_select("Event",$Gf,$G["Event"],"this.form['Timing'].onchange();"),'<tr><th>',lang(90),'<td>',html_select("Type",$Hf["Type"],$G["Type"]),'</table>
<p>',lang(158),': <input name="Trigger" value="',h($G["Trigger"]),'" maxlength="64">
<p>';textarea("Statement",$G["Statement"]);echo'<p>
<input type="submit" value="',lang(140),'">
';if($_GET["name"]!=""){echo'<input type="submit" name="drop" value="',lang(79),'"',confirm(),'>';}if($vb){echo'<input type="hidden" name="dropped" value="1">';}echo'<input type="hidden" name="token" value="',$Q,'">
</form>
';}elseif(isset($_GET["user"])){$ha=$_GET["user"];$pe=array(""=>array("All privileges"=>""));foreach(get_rows("SHOW PRIVILEGES")as$G){foreach(explode(",",($G["Privilege"]=="Grant option"?"":$G["Context"]))as$Za){$pe[$Za][$G["Privilege"]]=$G["Comment"];}}$pe["Server Admin"]+=$pe["File access on server"];$pe["Databases"]["Create routine"]=$pe["Procedures"]["Create routine"];unset($pe["Procedures"]["Create routine"]);$pe["Columns"]=array();foreach(array("Select","Insert","Update","References")as$W){$pe["Columns"][$W]=$pe["Tables"][$W];}unset($pe["Server Admin"]["Usage"]);foreach($pe["Tables"]as$v=>$W){unset($pe["Databases"][$v]);}$td=array();if($_POST){foreach($_POST["objects"]as$v=>$W){$td[$W]=(array)$td[$W]+(array)$_POST["grants"][$v];}}$nc=array();$zd="";if(isset($_GET["host"])&&($E=$g->query("SHOW GRANTS FOR ".q($ha)."@".q($_GET["host"])))){while($G=$E->fetch_row()){if(preg_match('~GRANT (.*) ON (.*) TO ~',$G[0],$z)&&preg_match_all('~ *([^(,]*[^ ,(])( *\\([^)]+\\))?~',$z[1],$ad,PREG_SET_ORDER)){foreach($ad
as$W){if($W[1]!="USAGE"){$nc["$z[2]$W[2]"][$W[1]]=true;}if(ereg(' WITH GRANT OPTION',$G[0])){$nc["$z[2]$W[2]"]["GRANT OPTION"]=true;}}}if(preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~",$G[0],$z)){$zd=$z[1];}}}if($_POST&&!$k){$_d=(isset($_GET["host"])?q($ha)."@".q($_GET["host"]):"''");$ud=q($_POST["user"])."@".q($_POST["host"]);$be=q($_POST["pass"]);if($_POST["drop"]){query_redirect("DROP USER $_d",ME."privileges=",lang(214));}else{$eb=false;if($_d!=$ud){$eb=queries(($g->server_info<5?"GRANT USAGE ON *.* TO":"CREATE USER")." $ud IDENTIFIED BY".($_POST["hashed"]?" PASSWORD":"")." $be");$k=!$eb;}elseif($_POST["pass"]!=$zd||!$_POST["hashed"]){queries("SET PASSWORD FOR $ud = ".($_POST["hashed"]?$be:"PASSWORD($be)"));}if(!$k){$De=array();foreach($td
as$xd=>$mc){if(isset($_GET["grant"])){$mc=array_filter($mc);}$mc=array_keys($mc);if(isset($_GET["grant"])){$De=array_diff(array_keys(array_filter($td[$xd],'strlen')),$mc);}elseif($_d==$ud){$yd=array_keys((array)$nc[$xd]);$De=array_diff($yd,$mc);$mc=array_diff($mc,$yd);unset($nc[$xd]);}if(preg_match('~^(.+)\\s*(\\(.*\\))?$~U',$xd,$z)&&(!grant("REVOKE",$De,$z[2]," ON $z[1] FROM $ud")||!grant("GRANT",$mc,$z[2]," ON $z[1] TO $ud"))){$k=true;break;}}}if(!$k&&isset($_GET["host"])){if($_d!=$ud){queries("DROP USER $_d");}elseif(!isset($_GET["grant"])){foreach($nc
as$xd=>$De){if(preg_match('~^(.+)(\\(.*\\))?$~U',$xd,$z)){grant("REVOKE",array_keys($De),$z[2]," ON $z[1] FROM $ud");}}}}queries_redirect(ME."privileges=",(isset($_GET["host"])?lang(215):lang(216)),!$k);if($eb){$g->query("DROP USER $ud");}}}page_header((isset($_GET["host"])?lang(21).": ".h("$ha@$_GET[host]"):lang(119)),$k,array("privileges"=>array('',lang(50))));if($_POST){$G=$_POST;$nc=$td;}else{$G=$_GET+array("host"=>$g->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)"));$G["pass"]=$zd;if($zd!=""){$G["hashed"]=true;}$nc[DB!=""&&!isset($_GET["host"])?idf_escape(addcslashes(DB,"%_")).".*":""]=array();}echo'<form action="" method="post">
<table cellspacing="0">
<tr><th>',lang(20),'<td><input name="host" maxlength="60" value="',h($G["host"]),'">
<tr><th>',lang(21),'<td><input name="user" maxlength="16" value="',h($G["user"]),'">
<tr><th>',lang(22),'<td><input id="pass" name="pass" value="',h($G["pass"]),'">
';if(!$G["hashed"]){echo'<script type="text/javascript">typePassword(document.getElementById(\'pass\'));</script>';}echo
checkbox("hashed",1,$G["hashed"],lang(217),"typePassword(this.form['pass'], this.checked);"),'</table>

';echo"<table cellspacing='0'>\n","<thead><tr><th colspan='2'><a href='http://dev.mysql.com/doc/refman/".substr($g->server_info,0,3)."/en/grant.html#priv_level' target='_blank' rel='noreferrer'>".lang(50)."</a>";$p=0;foreach($nc
as$xd=>$mc){echo'<th>'.($xd!="*.*"?"<input name='objects[$p]' value='".h($xd)."' size='10'>":"<input type='hidden' name='objects[$p]' value='*.*' size='10'>*.*");$p++;}echo"</thead>\n";foreach(array(""=>"","Server Admin"=>lang(20),"Databases"=>lang(67),"Tables"=>lang(101),"Columns"=>lang(102),"Procedures"=>lang(218),)as$Za=>$ob){foreach((array)$pe[$Za]as$oe=>$Ua){echo"<tr".odd()."><td".($ob?">$ob<td":" colspan='2'").' lang="en" title="'.h($Ua).'">'.h($oe);$p=0;foreach($nc
as$xd=>$mc){$_="'grants[$p][".h(strtoupper($oe))."]'";$X=$mc[strtoupper($oe)];if($Za=="Server Admin"&&$xd!=(isset($nc["*.*"])?"*.*":"")){echo"<td>&nbsp;";}elseif(isset($_GET["grant"])){echo"<td><select name=$_><option><option value='1'".($X?" selected":"").">".lang(219)."<option value='0'".($X=="0"?" selected":"").">".lang(220)."</select>";}else{echo"<td align='center'><input type='checkbox' name=$_ value='1'".($X?" checked":"").($oe=="All privileges"?" id='grants-$p-all'":($oe=="Grant option"?"":" onclick=\"if (this.checked) formUncheck('grants-$p-all');\"")).">";}$p++;}}}echo"</table>\n",'<p>
<input type="submit" value="',lang(140),'">
';if(isset($_GET["host"])){echo'<input type="submit" name="drop" value="',lang(79),'"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$Q,'">
</form>
';}elseif(isset($_GET["processlist"])){if(support("kill")&&$_POST&&!$k){$Lc=0;foreach((array)$_POST["kill"]as$W){if(queries("KILL ".(+$W))){$Lc++;}}queries_redirect(ME."processlist=",lang(221,$Lc),$Lc||!$_POST["kill"]);}page_header(lang(72),$k);echo'
<form action="" method="post">
<table cellspacing="0" onclick="tableClick(event);" class="nowrap checkable">
';$p=-1;foreach(process_list()as$p=>$G){if(!$p){echo"<thead><tr lang='en'>".(support("kill")?"<th>&nbsp;":"")."<th>".implode("<th>",array_keys($G))."</thead>\n";}echo"<tr".odd().">".(support("kill")?"<td>".checkbox("kill[]",$G["Id"],0):"");foreach($G
as$v=>$W){echo"<td>".(($u=="sql"?$v=="Info"&&$W!="":$v=="current_query"&&$W!="<IDLE>")?"<code class='jush-$u'>".shorten_utf8($W,100,"</code>").' <a href="'.h(ME.($G["db"]!=""?"db=".urlencode($G["db"])."&":"")."sql=".urlencode($W)).'">'.lang(31).'</a>':nbsp($W));}echo"\n";}echo'</table>
<script type=\'text/javascript\'>tableCheck();</script>
<p>
';if(support("kill")){echo($p+1)."/".lang(222,$g->result("SELECT @@max_connections")),"<p><input type='submit' value='".lang(223)."'>\n";}echo'<input type="hidden" name="token" value="',$Q,'">
</form>
';}elseif(isset($_GET["select"])){$a=$_GET["select"];$O=table_status($a);$t=indexes($a);$m=fields($a);$fc=column_foreign_keys($a);if($O["Oid"]=="t"){$t[]=array("type"=>"PRIMARY","columns"=>array("oid"));}parse_str($_COOKIE["adminer_import"],$ra);$Ee=array();$f=array();$wf=null;foreach($m
as$v=>$l){$_=$b->fieldName($l);if(isset($l["privileges"]["select"])&&$_!=""){$f[$v]=html_entity_decode(strip_tags($_));if(ereg('text|lob',$l["type"])){$wf=$b->selectLengthProcess();}}$Ee+=$l["privileges"];}list($I,$oc)=$b->selectColumnsProcess($f,$t);$Z=$b->selectSearchProcess($m,$t);$Jd=$b->selectOrderProcess($m,$t);$x=$b->selectLimitProcess();$jc=($I?implode(", ",$I):($O["Oid"]=="t"?"oid, ":"")."*")."\nFROM ".table($a);$pc=($oc&&count($oc)<count($I)?"\nGROUP BY ".implode(", ",$oc):"").($Jd?"\nORDER BY ".implode(", ",$Jd):"");if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Of=>$G){echo$g->result("SELECT".limit(idf_escape(key($G))." FROM ".table($a)," WHERE ".where_check($Of).($Z?" AND ".implode(" AND ",$Z):"").($Jd?" ORDER BY ".implode(", ",$Jd):""),1));}exit;}if($_POST&&!$k){$dg="(".implode(") OR (",array_map('where_check',(array)$_POST["check"])).")";$le=$Qf=null;foreach($t
as$s){if($s["type"]=="PRIMARY"){$le=array_flip($s["columns"]);$Qf=($I?$le:array());break;}}foreach((array)$Qf
as$v=>$W){if(in_array(idf_escape($v),$I)){unset($Qf[$v]);}}if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");if(!is_array($_POST["check"])||$Qf===array()){$cg=$Z;if(is_array($_POST["check"])){$cg[]="($dg)";}$D="SELECT $jc".($cg?"\nWHERE ".implode(" AND ",$cg):"").$pc;}else{$Mf=array();foreach($_POST["check"]as$W){$Mf[]="(SELECT".limit($jc,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($W).$pc,1).")";}$D=implode(" UNION ALL ",$Mf);}$b->dumpData($a,"table",$D);exit;}if(!$b->selectEmailProcess($Z,$fc)){if($_POST["save"]||$_POST["delete"]){$E=true;$sa=0;$D=table($a);$K=array();if(!$_POST["delete"]){foreach($f
as$_=>$W){$W=process_input($m[$_]);if($W!==null){if($_POST["clone"]){$K[idf_escape($_)]=($W!==false?$W:idf_escape($_));}elseif($W!==false){$K[]=idf_escape($_)." = $W";}}}$D.=($_POST["clone"]?" (".implode(", ",array_keys($K)).")\nSELECT ".implode(", ",$K)."\nFROM ".table($a):" SET\n".implode(",\n",$K));}if($_POST["delete"]||$K){$Sa="UPDATE";if($_POST["delete"]){$Sa="DELETE";$D="FROM $D";}if($_POST["clone"]){$Sa="INSERT";$D="INTO $D";}if($_POST["all"]||($Qf===array()&&$_POST["check"])||count($oc)<count($I)){$E=queries($Sa." $D".($_POST["all"]?($Z?"\nWHERE ".implode(" AND ",$Z):""):"\nWHERE $dg"));$sa=$g->affected_rows;}else{foreach((array)$_POST["check"]as$W){$E=queries($Sa.limit1($D,"\nWHERE ".where_check($W)));if(!$E){break;}$sa+=$g->affected_rows;}}}queries_redirect(remove_from_uri("page"),lang(224,$sa),$E);}elseif(!$_POST["import"]){if(!$_POST["val"]){$k=lang(225);}else{$E=true;$sa=0;foreach($_POST["val"]as$Of=>$G){$K=array();foreach($G
as$v=>$W){$v=bracket_escape($v,1);$K[]=idf_escape($v)." = ".(ereg('char|text',$m[$v]["type"])||$W!=""?$b->processInput($m[$v],$W):"NULL");}$D=table($a)." SET ".implode(", ",$K);$cg=" WHERE ".where_check($Of).($Z?" AND ".implode(" AND ",$Z):"");$E=queries("UPDATE".(count($oc)<count($I)?" $D$cg":limit1($D,$cg)));if(!$E){break;}$sa+=$g->affected_rows;}queries_redirect(remove_from_uri(),lang(224,$sa),$E);}}elseif(is_string($Yb=get_file("csv_file",true))){cookie("adminer_import","output=".urlencode($ra["output"])."&format=".urlencode($_POST["separator"]));$E=true;$Ra=array_keys($m);preg_match_all('~(?>"[^"]*"|[^"\\r\\n]+)+~',$Yb,$ad);$sa=count($ad[0]);begin();$Re=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));foreach($ad[0]as$v=>$W){preg_match_all("~((\"[^\"]*\")+|[^$Re]*)$Re~",$W.$Re,$bd);if(!$v&&!array_diff($bd[1],$Ra)){$Ra=$bd[1];$sa--;}else{$K=array();foreach($bd[1]as$p=>$Oa){$K[idf_escape($Ra[$p])]=($Oa==""&&$m[$Ra[$p]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$Oa))));}$E=insert_update($a,$K,$le);if(!$E){break;}}}if($E){queries("COMMIT");}queries_redirect(remove_from_uri("page"),lang(226,$sa),$E);queries("ROLLBACK");}else{$k=upload_error($Yb);}}}$mf=$b->tableName($O);page_header(lang(33).": $mf",$k);session_write_close();$K=null;if(isset($Ee["insert"])){$K="";foreach((array)$_GET["where"]as$W){if(count($fc[$W["col"]])==1&&($W["op"]=="="||(!$W["op"]&&!ereg('[_%]',$W["val"])))){$K.="&set".urlencode("[".bracket_escape($W["col"])."]")."=".urlencode($W["val"]);}}}$b->selectLinks($O,$K);if(!$f){echo"<p class='error'>".lang(227).($m?".":": ".error())."\n";}else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($I,$f);$b->selectSearchPrint($Z,$f,$t);$b->selectOrderPrint($Jd,$f,$t);$b->selectLimitPrint($x);$b->selectLengthPrint($wf);$b->selectActionPrint();echo"</form>\n";$Td=$_GET["page"];if($Td=="last"){$hc=$g->result("SELECT COUNT(*) FROM ".table($a).($Z?" WHERE ".implode(" AND ",$Z):""));$Td=floor(max(0,$hc-1)/$x);}$D="SELECT".limit((+$x&&$oc&&count($oc)<count($I)&&$u=="sql"?"SQL_CALC_FOUND_ROWS ":"").$jc,($Z?"\nWHERE ".implode(" AND ",$Z):"").$pc,($x!=""?+$x:null),($Td?$x*$Td:0),"\n");echo$b->selectQuery($D);$E=$g->query($D);if(!$E){echo"<p class='error'>".error()."\n";}else{if($u=="mssql"){$E->seek($x*$Td);}$Cb=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$H=array();while($G=$E->fetch_assoc()){if($Td&&$u=="oracle"){unset($G["RNUM"]);}$H[]=$G;}if($_GET["page"]!="last"){$hc=(+$x&&$oc&&count($oc)<count($I)?($u=="sql"?$g->result(" SELECT FOUND_ROWS()"):$g->result("SELECT COUNT(*) FROM ($D) x")):count($H));}if(!$H){echo"<p class='message'>".lang(83)."\n";}else{$Da=$b->backwardKeys($a,$mf);echo"<table cellspacing='0' class='nowrap checkable' onclick='tableClick(event);' onkeydown='return  editingKeydown(event);'>\n","<thead><tr>".(!$oc&&$I?"":"<td><input type='checkbox' id='all-page' onclick='formCheck(this, /check/);'> <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".lang(228)."</a>");$sd=array();$lc=array();reset($I);$ue=1;foreach($H[0]as$v=>$W){if($O["Oid"]!="t"||$v!="oid"){$W=$_GET["columns"][key($I)];$l=$m[$I?($W?$W["col"]:current($I)):$v];$_=($l?$b->fieldName($l,$ue):"*");if($_!=""){$ue++;$sd[$v]=$_;$e=idf_escape($v);echo'<th><a href="'.h(remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($v).($Jd[0]==$e||$Jd[0]==$v||(!$Jd&&count($oc)<count($I)&&$oc[0]==$e)?'&desc%5B0%5D=1':'')).'">'.(!$I||$W?apply_sql_function($W["fun"],$_):h(current($I)))."</a>";}$lc[$v]=$W["fun"];next($I);}}$Uc=array();if($_GET["modify"]){foreach($H
as$G){foreach($G
as$v=>$W){$Uc[$v]=max($Uc[$v],min(40,strlen(utf8_decode($W))));}}}echo($Da?"<th>".lang(229):"")."</thead>\n";foreach($b->rowDescriptions($H,$fc)as$rd=>$G){$Nf=unique_array($H[$rd],$t);$Of="";foreach($Nf
as$v=>$W){$Of.="&".(isset($W)?urlencode("where[".bracket_escape($v)."]")."=".urlencode($W):"null%5B%5D=".urlencode($v));}echo"<tr".odd().">".(!$oc&&$I?"":"<td>".checkbox("check[]",substr($Of,1),in_array(substr($Of,1),(array)$_POST["check"]),"","this.form['all'].checked = false; formUncheck('all-page');").(count($oc)<count($I)||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Of)."'>".lang(228)."</a>"));foreach($G
as$v=>$W){if(isset($sd[$v])){$l=$m[$v];if($W!=""&&(!isset($Cb[$v])||$Cb[$v]!="")){$Cb[$v]=(is_mail($W)?$sd[$v]:"");}$y="";$W=$b->editVal($W,$l);if(!isset($W)){$W="<i>NULL</i>";}else{if(ereg('blob|bytea|raw|file',$l["type"])&&$W!=""){$y=h(ME.'download='.urlencode($a).'&field='.urlencode($v).$Of);}if($W===""){$W="&nbsp;";}elseif($wf!=""&&ereg('text|blob',$l["type"])&&is_utf8($W)){$W=shorten_utf8($W,max(0,+$wf));}else{$W=h($W);}if(!$y){foreach((array)$fc[$v]as$n){if(count($fc[$v])==1||end($n["source"])==$v){$y="";foreach($n["source"]as$p=>$We){$y.=where_link($p,$n["target"][$p],$H[$rd][$We]);}$y=h(($n["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\\1'.urlencode($n["db"]),ME):ME).'select='.urlencode($n["table"]).$y);if(count($n["source"])==1){break;}}}}if($v=="COUNT(*)"){$y=h(ME."select=".urlencode($a));$p=0;foreach((array)$_GET["where"]as$V){if(!array_key_exists($V["col"],$Nf)){$y.=h(where_link($p++,$V["col"],$V["val"],$V["op"]));}}foreach($Nf
as$Kc=>$V){$y.=h(where_link($p++,$Kc,$V));}}}if(!$y){if(is_mail($W)){$y="mailto:$W";}if($se=is_url($G[$v])){$y=($se=="http"&&$ba?$G[$v]:"$se://www.adminer.org/redirect/?url=".urlencode($G[$v]));}}$q=h("val[$Of][".bracket_escape($v)."]");$X=$_POST["val"][$Of][bracket_escape($v)];$rc=h(isset($X)?$X:$G[$v]);$Yc=strpos($W,"<i>...</i>");$_b=is_utf8($W)&&$H[$rd][$v]==$G[$v]&&!$lc[$v];$vf=ereg('text|lob',$l["type"]);echo(($_GET["modify"]&&$_b)||isset($X)?"<td>".($vf?"<textarea name='$q' cols='30' rows='".(substr_count($G[$v],"\n")+1)."'>$rc</textarea>":"<input name='$q' value='$rc' size='$Uc[$v]'>"):"<td id='$q' ondblclick=\"".($_b?"selectDblClick(this, event".($Yc?", 2":($vf?", 1":"")).")":"alert('".h(lang(230))."')").";\">".$b->selectVal($W,$y,$l));}}if($Da){echo"<td>";}$b->backwardKeysPrint($Da,$H[$rd]);echo"</tr>\n";}echo"</table>\n",(!$oc&&$I?"":"<script type='text/javascript'>tableCheck();</script>\n");}if($H||$Td){$Mb=true;if($_GET["page"]!="last"&&+$x&&count($oc)>=count($I)&&($hc>=$x||$Td)){$hc=found_rows($O,$Z);if($hc<max(1e4,2*($Td+1)*$x)){ob_flush();flush();$hc=$g->result("SELECT COUNT(*) FROM ".table($a).($Z?" WHERE ".implode(" AND ",$Z):""));}else{$Mb=false;}}echo"<p class='pages'>";if(+$x&&$hc>$x){$dd=floor(($hc-1)/$x);echo'<a href="'.h(remove_from_uri("page"))."\" onclick=\"pageClick(this.href, +prompt('".lang(231)."', '".($Td+1)."'), event); return false;\">".lang(231)."</a>:",pagination(0,$Td).($Td>5?" ...":"");for($p=max(1,$Td-4);$p<min($dd,$Td+5);$p++){echo
pagination($p,$Td);}echo($Td+5<$dd?" ...":"").($Mb?pagination($dd,$Td):' <a href="'.h(remove_from_uri()."&page=last").'">'.lang(232)."</a>");}echo" (".($Mb?"":"~ ").lang(121,$hc).") ".checkbox("all",1,0,lang(233))."\n";if($b->selectCommandPrint()){echo'<fieldset><legend>',lang(31),'</legend><div>
<input type="submit" value="',lang(140),'"',($_GET["modify"]?'':' title="'.lang(225).'" class="jsonly"'),'>
<input type="submit" name="edit" value="',lang(31),'">
<input type="submit" name="clone" value="',lang(234),'">
<input type="submit" name="delete" value="',lang(143),'" onclick="return confirm(\'',lang(0);?> (' + (this.form['all'].checked ? <?php echo$hc,' : formChecked(this, /check/)) + \')\');">
</div></fieldset>
';}print_fieldset("export",lang(113));$Rd=$b->dumpOutput();

echo($Rd?html_select("output",$Rd,$ra["output"])." ":""),html_select("format",$b->dumpFormat(),$ra["format"])," <input type='submit' name='export' value='".lang(113)."' onclick='eventStop(event);'>\n","</div></fieldset>\n";}if($b->selectImportPrint()){print_fieldset("import",lang(235),!$H);echo"<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$ra["format"],1);echo" <input type='submit' name='import' value='".lang(235)."'>","<input type='hidden' name='token' value='$Q'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($Cb,'strlen'),$f);echo"</form>\n";}}}elseif(isset($_GET["variables"])){$af=isset($_GET["status"]);page_header($af?lang(74):lang(73));$Xf=($af?show_status():show_variables());if(!$Xf){echo"<p class='message'>".lang(83)."\n";}else{echo"<table cellspacing='0'>\n";foreach($Xf
as$v=>$W){echo"<tr>","<th><code class='jush-".$u.($af?"status":"set")."'>".h($v)."</code>","<td>".nbsp($W);}echo"</table>\n";}}elseif(isset($_GET["script"])){header("Content-Type: text/javascript; charset=utf-8");if($_GET["script"]=="db"){$jf=array("Data_length"=>0,"Index_length"=>0,"Data_free"=>0);foreach(table_status()as$O){$q=js_escape($O["Name"]);json_row("Comment-$q",nbsp($O["Comment"]));if(!is_view($O)){foreach(array("Engine","Collation")as$v){json_row("$v-$q",nbsp($O[$v]));}foreach($jf+array("Auto_increment"=>0,"Rows"=>0)as$v=>$W){if($O[$v]!=""){$W=number_format($O[$v],0,'.',lang(236));json_row("$v-$q",($v=="Rows"&&$O["Engine"]=="InnoDB"&&$W?"~ $W":$W));if(isset($jf[$v])){$jf[$v]+=($O["Engine"]!="InnoDB"||$v!="Data_free"?$O[$v]:0);}}elseif(array_key_exists($v,$O)){json_row("$v-$q");}}}}foreach($jf
as$v=>$W){json_row("sum-$v",number_format($W,0,'.',lang(236)));}json_row("");}else{foreach(count_tables(get_databases())as$j=>$W){json_row("tables-".js_escape($j),$W);}json_row("");}exit;}else{$sf=array_merge((array)$_POST["tables"],(array)$_POST["views"]);if($sf&&!$k&&!$_POST["search"]){$E=true;$hd="";if($u=="sql"&&count($_POST["tables"])>1&&($_POST["drop"]||$_POST["truncate"]||$_POST["copy"])){queries("SET foreign_key_checks = 0");}if($_POST["truncate"]){if($_POST["tables"]){$E=truncate_tables($_POST["tables"]);}$hd=lang(237);}elseif($_POST["move"]){$E=move_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$hd=lang(238);}elseif($_POST["copy"]){$E=copy_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$hd=lang(239);}elseif($_POST["drop"]){if($_POST["views"]){$E=drop_views($_POST["views"]);}if($E&&$_POST["tables"]){$E=drop_tables($_POST["tables"]);}$hd=lang(240);}elseif($_POST["tables"]&&($E=queries(($_POST["optimize"]?"OPTIMIZE":($_POST["check"]?"CHECK":($_POST["repair"]?"REPAIR":"ANALYZE")))." TABLE ".implode(", ",array_map('idf_escape',$_POST["tables"]))))){while($G=$E->fetch_assoc()){$hd.="<b>".h($G["Table"])."</b>: ".h($G["Msg_text"])."<br>";}}queries_redirect(substr(ME,0,-1),$hd,$E);}page_header(($_GET["ns"]==""?lang(67).": ".h(DB):lang(81).": ".h($_GET["ns"])),$k,true);if($b->homepage()){if($_GET["ns"]!==""){echo"<h3>".lang(241)."</h3>\n";$rf=tables_list();if(!$rf){echo"<p class='message'>".lang(6)."\n";}else{echo"<form action='' method='post'>\n","<p>".lang(242).": <input name='query' value='".h($_POST["query"])."'> <input type='submit' name='search' value='".lang(36)."'>\n";if($_POST["search"]&&$_POST["query"]!=""){search_tables();}echo"<table cellspacing='0' class='nowrap checkable' onclick='tableClick(event);'>\n",'<thead><tr class="wrap"><td><input id="check-all" type="checkbox" onclick="formCheck(this, /^(tables|views)\[/);">','<th>'.lang(101),'<td>'.lang(243),'<td>'.lang(77),'<td>'.lang(244),'<td>'.lang(245),'<td>'.lang(246),'<td>'.lang(93),'<td>'.lang(247),(support("comment")?'<td>'.lang(95):''),"</thead>\n";foreach($rf
as$_=>$S){$Zf=(isset($S)&&!eregi("table",$S));echo'<tr'.odd().'><td>'.checkbox(($Zf?"views[]":"tables[]"),$_,in_array($_,$sf,true),"","formUncheck('check-all');"),'<th><a href="'.h(ME).'table='.urlencode($_).'" title="'.lang(26).'">'.h($_).'</a>';if($Zf){echo'<td colspan="6"><a href="'.h(ME)."view=".urlencode($_).'" title="'.lang(27).'">'.lang(100).'</a>','<td align="right"><a href="'.h(ME)."select=".urlencode($_).'" title="'.lang(25).'">?</a>';}else{foreach(array("Engine"=>array(),"Collation"=>array(),"Data_length"=>array("create",lang(28)),"Index_length"=>array("indexes",lang(104)),"Data_free"=>array("edit",lang(29)),"Auto_increment"=>array("auto_increment=1&create",lang(28)),"Rows"=>array("select",lang(25)),)as$v=>$y){echo($y?"<td align='right'><a href='".h(ME."$y[0]=").urlencode($_)."' id='$v-".h($_)."' title='$y[1]'>?</a>":"<td id='$v-".h($_)."'>&nbsp;");}}echo(support("comment")?"<td id='Comment-".h($_)."'>&nbsp;":"");}echo"<tr><td>&nbsp;<th>".lang(222,count($rf)),"<td>".nbsp($u=="sql"?$g->result("SELECT @@storage_engine"):""),"<td>".nbsp(db_collation(DB,collations()));foreach(array("Data_length","Index_length","Data_free")as$v){echo"<td align='right' id='sum-$v'>&nbsp;";}echo"</table>\n","<script type='text/javascript'>tableCheck();</script>\n";if(!information_schema(DB)){echo"<p>".($u=="sql"?"<input type='submit' value='".lang(248)."'> <input type='submit' name='optimize' value='".lang(249)."'> <input type='submit' name='check' value='".lang(250)."'> <input type='submit' name='repair' value='".lang(251)."'> ":"")."<input type='submit' name='truncate' value='".lang(252)."'".confirm("formChecked(this, /tables/)")."> <input type='submit' name='drop' value='".lang(79)."'".confirm("formChecked(this, /tables|views/)",1).">\n";$i=(support("scheme")?schemas():get_databases());if(count($i)!=1&&$u!="sqlite"){$j=(isset($_POST["target"])?$_POST["target"]:(support("scheme")?$_GET["ns"]:DB));echo"<p>".lang(253).": ",($i?html_select("target",$i,$j):'<input name="target" value="'.h($j).'">')," <input type='submit' name='move' value='".lang(254)."' onclick='eventStop(event);'>",(support("copy")?" <input type='submit' name='copy' value='".lang(255)."' onclick='eventStop(event);'>":""),"\n";}echo"<input type='hidden' name='token' value='$Q'>\n";}echo"</form>\n";}echo'<p><a href="'.h(ME).'create=">'.lang(147)."</a>\n";if(support("view")){echo'<a href="'.h(ME).'view=">'.lang(180)."</a>\n";}if(support("routine")){echo"<h3>".lang(116)."</h3>\n";$Ie=routines();if($Ie){echo"<table cellspacing='0'>\n",'<thead><tr><th>'.lang(158).'<td>'.lang(90).'<td>'.lang(197)."<td>&nbsp;</thead>\n";odd('');foreach($Ie
as$G){echo'<tr'.odd().'>','<th><a href="'.h(ME).($G["ROUTINE_TYPE"]!="PROCEDURE"?'callf=':'call=').urlencode($G["ROUTINE_NAME"]).'">'.h($G["ROUTINE_NAME"]).'</a>','<td>'.h($G["ROUTINE_TYPE"]),'<td>'.h($G["DTD_IDENTIFIER"]),'<td><a href="'.h(ME).($G["ROUTINE_TYPE"]!="PROCEDURE"?'function=':'procedure=').urlencode($G["ROUTINE_NAME"]).'">'.lang(108)."</a>";}echo"</table>\n";}echo'<p>'.(support("procedure")?'<a href="'.h(ME).'procedure=">'.lang(196).'</a> ':'').'<a href="'.h(ME).'function=">'.lang(195)."</a>\n";}if(support("sequence")){echo"<h3>".lang(256)."</h3>\n";$Se=get_vals("SELECT sequence_name FROM information_schema.sequences WHERE sequence_schema = current_schema()");if($Se){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(158)."</thead>\n";odd('');foreach($Se
as$W){echo"<tr".odd()."><th><a href='".h(ME)."sequence=".urlencode($W)."'>".h($W)."</a>\n";}echo"</table>\n";}echo"<p><a href='".h(ME)."sequence='>".lang(202)."</a>\n";}if(support("type")){echo"<h3>".lang(11)."</h3>\n";$T=types();if($T){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(158)."</thead>\n";odd('');foreach($T
as$W){echo"<tr".odd()."><th><a href='".h(ME)."type=".urlencode($W)."'>".h($W)."</a>\n";}echo"</table>\n";}echo"<p><a href='".h(ME)."type='>".lang(206)."</a>\n";}if(support("event")){echo"<h3>".lang(117)."</h3>\n";$H=get_rows("SHOW EVENTS");if($H){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(158)."<td>".lang(257)."<td>".lang(186)."<td>".lang(187)."</thead>\n";foreach($H
as$G){echo"<tr>",'<th><a href="'.h(ME).'event='.urlencode($G["Name"]).'">'.h($G["Name"])."</a>","<td>".($G["Execute at"]?lang(258)."<td>".$G["Execute at"]:lang(188)." ".$G["Interval value"]." ".$G["Interval field"]."<td>$G[Starts]"),"<td>$G[Ends]";}echo"</table>\n";}echo'<p><a href="'.h(ME).'event=">'.lang(185)."</a>\n";}if($rf){echo"<script type='text/javascript'>ajaxSetHtml('".js_escape(ME)."script=db');</script>\n";}}}}page_footer();