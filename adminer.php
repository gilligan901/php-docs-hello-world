<?php
/** Adminer Editor - Compact database editor
* @link https://www.adminer.org/
* @author Jakub Vrana, https://www.vrana.cz/
* @copyright 2009 Jakub Vrana
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.8.1
*/function
adminer_errors($bc,$cc){return!!preg_match('~^(Trying to access array offset on value of type null|Undefined array key)~',$cc);}error_reporting(6135);set_error_handler('adminer_errors',E_WARNING);$tc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($tc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$Hg=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($Hg)$$X=$Hg;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");function
connection(){global$h;return$h;}function
adminer(){global$b;return$b;}function
version(){global$ca;return$ca;}function
idf_unescape($u){if(!preg_match('~^[`\'"]~',$u))return$u;$_d=substr($u,-1);return
str_replace($_d.$_d,$_d,substr($u,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return
preg_replace('~[^0-9]+~','',$X);}function
number_type(){return'((?<!o)int(?!er)|numeric|real|float|double|decimal|money)';}function
remove_slashes($Te,$tc=false){if(function_exists("get_magic_quotes_gpc")&&get_magic_quotes_gpc()){while(list($y,$X)=each($Te)){foreach($X
as$sd=>$W){unset($Te[$y][$sd]);if(is_array($W)){$Te[$y][stripslashes($sd)]=$W;$Te[]=&$Te[$y][stripslashes($sd)];}else$Te[$y][stripslashes($sd)]=($tc?$W:stripslashes($W));}}}}function
bracket_escape($u,$Ga=false){static$ug=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($u,($Ga?array_flip($ug):$ug));}function
min_version($Tg,$Ld="",$i=null){global$h;if(!$i)$i=$h;$Bf=$i->server_info;if($Ld&&preg_match('~([\d.]+)-MariaDB~',$Bf,$A)){$Bf=$A[1];$Tg=$Ld;}return(version_compare($Bf,$Tg)>=0);}function
charset($h){return(min_version("5.5.3",0,$h)?"utf8mb4":"utf8");}function
script($Kf,$tg="\n"){return"<script".nonce().">$Kf</script>$tg";}function
script_src($Mg){return"<script src='".h($Mg)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noreferrer noopener"';}function
h($P){return
str_replace("\0","&#0;",htmlspecialchars($P,ENT_QUOTES,'utf-8'));}function
nl_br($P){return
str_replace("\n","<br>",$P);}function
checkbox($B,$Y,$Ua,$wd="",$me="",$Xa="",$xd=""){$H="<input type='checkbox' name='$B' value='".h($Y)."'".($Ua?" checked":"").($xd?" aria-labelledby='$xd'":"").">".($me?script("qsl('input').onclick = function () { $me };",""):"");return($wd!=""||$Xa?"<label".($Xa?" class='$Xa'":"").">$H".h($wd)."</label>":$H);}function
optionlist($C,$wf=null,$Pg=false){$H="";foreach($C
as$sd=>$W){$re=array($sd=>$W);if(is_array($W)){$H.='<optgroup label="'.h($sd).'">';$re=$W;}foreach($re
as$y=>$X)$H.='<option'.($Pg||is_string($y)?' value="'.h($y).'"':'').(($Pg||is_string($y)?(string)$y:$X)===$wf?' selected':'').'>'.h($X);if(is_array($W))$H.='</optgroup>';}return$H;}function
html_select($B,$C,$Y="",$le=true,$xd=""){if($le)return"<select name='".h($B)."'".($xd?" aria-labelledby='$xd'":"").">".optionlist($C,$Y)."</select>".(is_string($le)?script("qsl('select').onchange = function () { $le };",""):"");$H="";foreach($C
as$y=>$X)$H.="<label><input type='radio' name='".h($B)."' value='".h($y)."'".($y==$Y?" checked":"").">".h($X)."</label>";return$H;}function
select_input($Ba,$C,$Y="",$le="",$Ke=""){$cg=($C?"select":"input");return"<$cg$Ba".($C?"><option value=''>$Ke".optionlist($C,$Y,true)."</select>":" size='10' value='".h($Y)."' placeholder='$Ke'>").($le?script("qsl('$cg').onchange = $le;",""):"");}function
confirm($Td="",$xf="qsl('input')"){return
script("$xf.onclick = function () { return confirm('".($Td?js_escape($Td):lang(0))."'); };","");}function
print_fieldset($t,$Bd,$Wg=false){echo"<fieldset><legend>","<a href='#fieldset-$t'>$Bd</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$t');",""),"</legend>","<div id='fieldset-$t'".($Wg?"":" class='hidden'").">\n";}function
bold($Na,$Xa=""){return($Na?" class='active $Xa'":($Xa?" class='$Xa'":""));}function
odd($H=' class="odd"'){static$s=0;if(!$H)$s=-1;return($s++%2?$H:'');}function
js_escape($P){return
addcslashes($P,"\r\n'\\/");}function
json_row($y,$X=null){static$uc=true;if($uc)echo"{";if($y!=""){echo($uc?"":",")."\n\t\"".addcslashes($y,"\r\n\t\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'null');$uc=false;}else{echo"\n}\n";$uc=true;}}function
ini_bool($jd){$X=ini_get($jd);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$H;if($H===null)$H=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$H;}function
set_password($Sg,$M,$V,$E){$_SESSION["pwds"][$Sg][$M][$V]=($_COOKIE["adminer_key"]&&is_string($E)?array(encrypt_string($E,$_COOKIE["adminer_key"])):$E);}function
get_password(){$H=get_session("pwds");if(is_array($H))$H=($_COOKIE["adminer_key"]?decrypt_string($H[0],$_COOKIE["adminer_key"]):false);return$H;}function
q($P){global$h;return$h->quote($P);}function
get_vals($F,$e=0){global$h;$H=array();$G=$h->query($F);if(is_object($G)){while($I=$G->fetch_row())$H[]=$I[$e];}return$H;}function
get_key_vals($F,$i=null,$Ef=true){global$h;if(!is_object($i))$i=$h;$H=array();$G=$i->query($F);if(is_object($G)){while($I=$G->fetch_row()){if($Ef)$H[$I[0]]=$I[1];else$H[]=$I[0];}}return$H;}function
get_rows($F,$i=null,$n="<p class='error'>"){global$h;$kb=(is_object($i)?$i:$h);$H=array();$G=$kb->query($F);if(is_object($G)){while($I=$G->fetch_assoc())$H[]=$I;}elseif(!$G&&!is_object($i)&&$n&&defined("PAGE_HEADER"))echo$n.error()."\n";return$H;}function
unique_array($I,$w){foreach($w
as$v){if(preg_match("~PRIMARY|UNIQUE~",$v["type"])){$H=array();foreach($v["columns"]as$y){if(!isset($I[$y]))continue
2;$H[$y]=$I[$y];}return$H;}}}function
escape_key($y){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$y,$A))return$A[1].idf_escape(idf_unescape($A[2])).$A[3];return
idf_escape($y);}function
where($Z,$p=array()){global$h,$x;$H=array();foreach((array)$Z["where"]as$y=>$X){$y=bracket_escape($y,1);$e=escape_key($y);$H[]=$e.($x=="sql"&&is_numeric($X)&&preg_match('~\.~',$X)?" LIKE ".q($X):($x=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$X)):" = ".unconvert_field($p[$y],q($X))));if($x=="sql"&&preg_match('~char|text~',$p[$y]["type"])&&preg_match("~[^ -@]~",$X))$H[]="$e = ".q($X)." COLLATE ".charset($h)."_bin";}foreach((array)$Z["null"]as$y)$H[]=escape_key($y)." IS NULL";return
implode(" AND ",$H);}function
where_check($X,$p=array()){parse_str($X,$Sa);remove_slashes(array(&$Sa));return
where($Sa,$p);}function
where_link($s,$e,$Y,$oe="="){return"&where%5B$s%5D%5Bcol%5D=".urlencode($e)."&where%5B$s%5D%5Bop%5D=".urlencode(($Y!==null?$oe:"IS NULL"))."&where%5B$s%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($f,$p,$K=array()){$H="";foreach($f
as$y=>$X){if($K&&!in_array(idf_escape($y),$K))continue;$za=convert_field($p[$y]);if($za)$H.=", $za AS ".idf_escape($y);}return$H;}function
cookie($B,$Y,$Ed=2592000){global$aa;return
header("Set-Cookie: $B=".urlencode($Y).($Ed?"; expires=".gmdate("D, d M Y H:i:s",time()+$Ed)." GMT":"")."; path=".preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]).($aa?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session($zc=false){$Og=ini_bool("session.use_cookies");if(!$Og||$zc){session_write_close();if($Og&&@ini_set("session.use_cookies",false)===false)session_start();}}function&get_session($y){return$_SESSION[$y][DRIVER][SERVER][$_GET["username"]];}function
set_session($y,$X){$_SESSION[$y][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Sg,$M,$V,$l=null){global$Mb;preg_match('~([^?]*)\??(.*)~',remove_from_uri(implode("|",array_keys($Mb))."|username|".($l!==null?"db|":"").session_name()),$A);return"$A[1]?".(sid()?SID."&":"").($Sg!="server"||$M!=""?urlencode($Sg)."=".urlencode($M)."&":"")."username=".urlencode($V).($l!=""?"&db=".urlencode($l):"").($A[2]?"&$A[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($Gd,$Td=null){if($Td!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($Gd!==null?$Gd:$_SERVER["REQUEST_URI"]))][]=$Td;}if($Gd!==null){if($Gd=="")$Gd=".";header("Location: $Gd");exit;}}function
query_redirect($F,$Gd,$Td,$df=true,$gc=true,$mc=false,$jg=""){global$h,$n,$b;if($gc){$Qf=microtime(true);$mc=!$h->query($F);$jg=format_time($Qf);}$Nf="";if($F)$Nf=$b->messageQuery($F,$jg,$mc);if($mc){$n=error().$Nf.script("messagesPrint();");return
false;}if($df)redirect($Gd,$Td.$Nf);return
true;}function
queries($F){global$h;static$Xe=array();static$Qf;if(!$Qf)$Qf=microtime(true);if($F===null)return
array(implode("\n",$Xe),format_time($Qf));$Xe[]=(preg_match('~;$~',$F)?"DELIMITER ;;\n$F;\nDELIMITER ":$F).";";return$h->query($F);}function
apply_queries($F,$S,$dc='table'){foreach($S
as$Q){if(!queries("$F ".$dc($Q)))return
false;}return
true;}function
queries_redirect($Gd,$Td,$df){list($Xe,$jg)=queries(null);return
query_redirect($Xe,$Gd,$Td,$df,false,!$df,$jg);}function
format_time($Qf){return
lang(1,max(0,microtime(true)-$Qf));}function
relative_uri(){return
str_replace(":","%3a",preg_replace('~^[^?]*/([^?]*)~','\1',$_SERVER["REQUEST_URI"]));}function
remove_from_uri($Be=""){return
substr(preg_replace("~(?<=[?&])($Be".(SID?"":"|".session_name()).")=[^&]*&~",'',relative_uri()."&"),0,-1);}function
pagination($D,$zb){return" ".($D==$zb?$D+1:'<a href="'.h(remove_from_uri("page").($D?"&page=$D".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($D+1)."</a>");}function
get_file($y,$Cb=false){$rc=$_FILES[$y];if(!$rc)return
null;foreach($rc
as$y=>$X)$rc[$y]=(array)$X;$H='';foreach($rc["error"]as$y=>$n){if($n)return$n;$B=$rc["name"][$y];$qg=$rc["tmp_name"][$y];$qb=file_get_contents($Cb&&preg_match('~\.gz$~',$B)?"compress.zlib://$qg":$qg);if($Cb){$Qf=substr($qb,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Qf,$ef))$qb=iconv("utf-16","utf-8",$qb);elseif($Qf=="\xEF\xBB\xBF")$qb=substr($qb,3);$H.=$qb."\n\n";}else$H.=$qb;}return$H;}function
upload_error($n){$Qd=($n==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($n?lang(2).($Qd?" ".lang(3,$Qd):""):lang(4));}function
repeat_pattern($He,$Cd){return
str_repeat("$He{0,65535}",$Cd/65535)."$He{0,".($Cd%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\0-\x8\xB\xC\xE-\x1F]~',$X));}function
shorten_utf8($P,$Cd=80,$Wf=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$Cd).")($)?)u",$P,$A))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$Cd).")($)?)",$P,$A);return
h($A[1]).$Wf.(isset($A[2])?"":"<i>…</i>");}function
format_number($X){return
strtr(number_format($X,0,".",lang(5)),preg_split('~~u',lang(6),-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($Te,$ad=array(),$Oe=''){$H=false;foreach($Te
as$y=>$X){if(!in_array($y,$ad)){if(is_array($X))hidden_fields($X,array(),$y);else{$H=true;echo'<input type="hidden" name="'.h($Oe?$Oe."[$y]":$y).'" value="'.h($X).'">';}}}return$H;}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($Q,$nc=false){$H=table_status($Q,$nc);return($H?$H:array("Name"=>$Q));}function
column_foreign_keys($Q){global$b;$H=array();foreach($b->foreignKeys($Q)as$Cc){foreach($Cc["source"]as$X)$H[$X][]=$Cc;}return$H;}function
enum_input($T,$Ba,$o,$Y,$Xb=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$Nd);$H=($Xb!==null?"<label><input type='$T'$Ba value='$Xb'".((is_array($Y)?in_array($Xb,$Y):$Y===0)?" checked":"")."><i>".lang(7)."</i></label>":"");foreach($Nd[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$Ua=(is_int($Y)?$Y==$s+1:(is_array($Y)?in_array($s+1,$Y):$Y===$X));$H.=" <label><input type='$T'$Ba value='".($s+1)."'".($Ua?' checked':'').'>'.h($b->editVal($X,$o)).'</label>';}return$H;}function
input($o,$Y,$r){global$U,$b,$x;$B=h(bracket_escape($o["field"]));echo"<td class='function'>";if(is_array($Y)&&!$r){$xa=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$xa[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$xa);$r="json";}$jf=($x=="mssql"&&$o["auto_increment"]);if($jf&&!$_POST["save"])$r=null;$Ic=(isset($_GET["select"])||$jf?array("orig"=>lang(8)):array())+$b->editFunctions($o);$Ba=" name='fields[$B]'";if($o["type"]=="enum")echo
h($Ic[""])."<td>".$b->editInput($_GET["edit"],$o,$Ba,$Y);else{$Pc=(in_array($r,$Ic)||isset($Ic[$r]));echo(count($Ic)>1?"<select name='function[$B]'>".optionlist($Ic,$r===null||$Pc?$r:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):h(reset($Ic))).'<td>';$ld=$b->editInput($_GET["edit"],$o,$Ba,$Y);if($ld!="")echo$ld;elseif(preg_match('~bool~',$o["type"]))echo"<input type='hidden'$Ba value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?" checked='checked'":"")."$Ba value='1'>";elseif($o["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$Nd);foreach($Nd[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$Ua=(is_int($Y)?($Y>>$s)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$B][$s]' value='".(1<<$s)."'".($Ua?' checked':'').">".h($b->editVal($X,$o)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$B'>";elseif(($gg=preg_match('~text|lob|memo~i',$o["type"]))||preg_match("~\n~",$Y)){if($gg&&$x!="sqlite")$Ba.=" cols='50' rows='12'";else{$J=min(12,substr_count($Y,"\n")+1);$Ba.=" cols='30' rows='$J'".($J==1?" style='height: 1.2em;'":"");}echo"<textarea$Ba>".h($Y).'</textarea>';}elseif($r=="json"||preg_match('~^jsonb?$~',$o["type"]))echo"<textarea$Ba cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$Sd=(!preg_match('~int~',$o["type"])&&preg_match('~^(\d+)(,(\d+))?$~',$o["length"],$A)?((preg_match("~binary~",$o["type"])?2:1)*$A[1]+($A[3]?1:0)+($A[2]&&!$o["unsigned"]?1:0)):($U[$o["type"]]?$U[$o["type"]]+($o["unsigned"]?0:1):0));if($x=='sql'&&min_version(5.6)&&preg_match('~time~',$o["type"]))$Sd+=7;echo"<input".((!$Pc||$r==="")&&preg_match('~(?<!o)int(?!er)~',$o["type"])&&!preg_match('~\[\]~',$o["full_type"])?" type='number'":"")." value='".h($Y)."'".($Sd?" data-maxlength='$Sd'":"").(preg_match('~char|binary~',$o["type"])&&$Sd>20?" size='40'":"")."$Ba>";}echo$b->editHint($_GET["edit"],$o,$Y);$uc=0;foreach($Ic
as$y=>$X){if($y===""||!$X)break;$uc++;}if($uc)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $uc), oninput: function () { this.onchange(); }});");}}function
process_input($o){global$b,$m;$u=bracket_escape($o["field"]);$r=$_POST["function"][$u];$Y=$_POST["fields"][$u];if($o["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($o["auto_increment"]&&$Y=="")return
null;if($r=="orig")return(preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?idf_escape($o["field"]):false);if($r=="NULL")return"NULL";if($o["type"]=="set")return
array_sum((array)$Y);if($r=="json"){$r="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads")){$rc=get_file("fields-$u");if(!is_string($rc))return
false;return$m->quoteBinary($rc);}return$b->processInput($o,$Y,$r);}function
fields_from_edit(){global$m;$H=array();foreach((array)$_POST["field_keys"]as$y=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$y];$_POST["fields"][$X]=$_POST["field_vals"][$y];}}foreach((array)$_POST["fields"]as$y=>$X){$B=bracket_escape($y,1);$H[$B]=array("field"=>$B,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($y==$m->primary),);}return$H;}function
search_tables(){global$b,$h;$_GET["where"][0]["val"]=$_POST["query"];$zf="<ul>\n";foreach(table_status('',true)as$Q=>$R){$B=$b->tableName($R);if(isset($R["Engine"])&&$B!=""&&(!$_POST["tables"]||in_array($Q,$_POST["tables"]))){$G=$h->query("SELECT".limit("1 FROM ".table($Q)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($Q),array())),1));if(!$G||$G->fetch_row()){$Re="<a href='".h(ME."select=".urlencode($Q)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$B</a>";echo"$zf<li>".($G?$Re:"<p class='error'>$Re: ".error())."\n";$zf="";}}}echo($zf?"<p class='message'>".lang(9):"</ul>")."\n";}function
dump_headers($Yc,$Xd=false){global$b;$H=$b->dumpHeaders($Yc,$Xd);$ye=$_POST["output"];if($ye!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($Yc).".$H".($ye!="file"&&preg_match('~^[0-9a-z]+$~',$ye)?".$ye":""));session_write_close();ob_flush();flush();return$H;}function
dump_csv($I){foreach($I
as$y=>$X){if(preg_match('~["\n,;\t]|^0|\.\d*0$~',$X)||$X==="")$I[$y]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$I)."\r\n";}function
apply_sql_function($r,$e){return($r?($r=="unixepoch"?"DATETIME($e, '$r')":($r=="count distinct"?"COUNT(DISTINCT ":strtoupper("$r("))."$e)"):$e);}function
get_temp_dir(){$H=ini_get("upload_tmp_dir");if(!$H){if(function_exists('sys_get_temp_dir'))$H=sys_get_temp_dir();else{$q=@tempnam("","");if(!$q)return
false;$H=dirname($q);unlink($q);}}return$H;}function
file_open_lock($q){$Gc=@fopen($q,"r+");if(!$Gc){$Gc=@fopen($q,"w");if(!$Gc)return;chmod($q,0660);}flock($Gc,LOCK_EX);return$Gc;}function
file_write_unlock($Gc,$_b){rewind($Gc);fwrite($Gc,$_b);ftruncate($Gc,strlen($_b));flock($Gc,LOCK_UN);fclose($Gc);}function
password_file($ub){$q=get_temp_dir()."/adminer.key";$H=@file_get_contents($q);if($H||!$ub)return$H;$Gc=@fopen($q,"w");if($Gc){chmod($q,0660);$H=rand_string();fwrite($Gc,$H);fclose($Gc);}return$H;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$_,$o,$hg){global$b;if(is_array($X)){$H="";foreach($X
as$sd=>$W)$H.="<tr>".($X!=array_values($X)?"<th>".h($sd):"")."<td>".select_value($W,$_,$o,$hg);return"<table cellspacing='0'>$H</table>";}if(!$_)$_=$b->selectLink($X,$o);if($_===null){if(is_mail($X))$_="mailto:$X";if(is_url($X))$_=$X;}$H=$b->editVal($X,$o);if($H!==null){if(!is_utf8($H))$H="\0";elseif($hg!=""&&is_shortable($o))$H=shorten_utf8($H,max(0,+$hg));else$H=h($H);}return$b->selectVal($H,$_,$o,$X);}function
is_mail($Ub){$_a='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$Lb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$He="$_a+(\\.$_a+)*@($Lb?\\.)+$Lb";return
is_string($Ub)&&preg_match("(^$He(,\\s*$He)*\$)i",$Ub);}function
is_url($P){$Lb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("~^(https?)://($Lb?\\.)+$Lb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$P);}function
is_shortable($o){return
preg_match('~char|text|json|lob|geometry|point|linestring|polygon|string|bytea~',$o["type"]);}function
count_rows($Q,$Z,$pd,$Jc){global$x;$F=" FROM ".table($Q).($Z?" WHERE ".implode(" AND ",$Z):"");return($pd&&($x=="sql"||count($Jc)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$Jc).")$F":"SELECT COUNT(*)".($pd?" FROM (SELECT 1$F GROUP BY ".implode(", ",$Jc).") x":$F));}function
slow_query($F){global$b,$sg,$m;$l=$b->database();$kg=$b->queryTimeout();$Hf=$m->slowQuery($F,$kg);if(!$Hf&&support("kill")&&is_object($i=connect())&&($l==""||$i->select_db($l))){$vd=$i->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$vd,'&token=',$sg,'\');
}, ',1000*$kg,');
</script>
';}else$i=null;ob_flush();flush();$H=@get_key_vals(($Hf?$Hf:$F),$i,false);if($i){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$H;}function
get_token(){$af=rand(1,1e6);return($af^$_SESSION["token"]).":$af";}function
verify_token(){list($sg,$af)=explode(":",$_POST["token"]);return($af^$_SESSION["token"])==$sg;}function
lzw_decompress($La){$Jb=256;$Ma=8;$Za=array();$lf=0;$mf=0;for($s=0;$s<strlen($La);$s++){$lf=($lf<<8)+ord($La[$s]);$mf+=8;if($mf>=$Ma){$mf-=$Ma;$Za[]=$lf>>$mf;$lf&=(1<<$mf)-1;$Jb++;if($Jb>>$Ma)$Ma++;}}$Ib=range("\0","\xFF");$H="";foreach($Za
as$s=>$Ya){$Tb=$Ib[$Ya];if(!isset($Tb))$Tb=$fh.$fh[0];$H.=$Tb;if($s)$Ib[]=$fh.$Tb[0];$fh=$Tb;}return$H;}function
on_help($fb,$Ff=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $fb, $Ff) }, onmouseout: helpMouseout});","");}function
edit_form($Q,$p,$I,$Kg){global$b,$x,$sg,$n;$ag=$b->tableName(table_status1($Q,true));page_header(($Kg?lang(10):lang(11)),$n,array("select"=>array($Q,$ag)),$ag);$b->editRowPrint($Q,$p,$I,$Kg);if($I===false)echo"<p class='error'>".lang(12)."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$p)echo"<p class='error'>".lang(13)."\n";else{echo"<table cellspacing='0' class='layout'>".script("qsl('table').onkeydown = editingKeydown;");foreach($p
as$B=>$o){echo"<tr><th>".$b->fieldName($o);$Db=$_GET["set"][bracket_escape($B)];if($Db===null){$Db=$o["default"];if($o["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$Db,$ef))$Db=$ef[1];}$Y=($I!==null?($I[$B]!=""&&$x=="sql"&&preg_match("~enum|set~",$o["type"])?(is_array($I[$B])?array_sum($I[$B]):+$I[$B]):(is_bool($I[$B])?+$I[$B]:$I[$B])):(!$Kg&&$o["auto_increment"]?"":(isset($_GET["select"])?false:$Db)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$o);$r=($_POST["save"]?(string)$_POST["function"][$B]:($Kg&&preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(!$_POST&&!$Kg&&$Y==$o["default"]&&preg_match('~^[\w.]+\(~',$Y))$r="SQL";if(preg_match("~time~",$o["type"])&&preg_match('~^CURRENT_TIMESTAMP~i',$Y)){$Y="";$r="now";}input($o,$Y,$r);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($p){echo"<input type='submit' value='".lang(14)."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Kg?lang(15):lang(16))."' title='Ctrl+Shift+Enter'>\n",($Kg?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".lang(17)."…', this); };"):"");}}echo($Kg?"<input type='submit' name='delete' value='".lang(18)."'>".confirm()."\n":($_POST||!$p?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$sg,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0 \0\n @\0 C  \"\0`E Q    ? tvM' Jd d\\ b0\0 \"  fӈ  s5    A XPaJ 0   8 #R T  z` #.  c X  Ȁ? -\0 Im? . M  \0ȯ(̉  /(% \0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1̇ ٌ l7  B1 4vb0  fs   n2B ѱ٘ n: #( b.\rDc)  a7E    l ñ  i1̎s   -4  f 	  i7     t4   y Zf4  i AT V V
  f:Ϧ,:1 Qݼ b2` # >:7G 1   s  L XD*bv<܌# e@ :4 !fo   t:<  咾 o  \ni   ', a_ : i Bv |N 4.5Nf i vp h  l  ֚ O    =  OFQ  k\$  i    d2T p  6     - Z     6    h: a ,    2 #8А #  6 n    J  h t     4O42 ok  *r   @p@ !      ? 6  r[  L  :2B j !Hb  P =!1V \"  0  \nS   D7  Dڛ C! !  Gʌ   + =tC .C  :+  =       % c 1MR/ EȒ4   2 䱠 ` 8( ӹ[W
  = yS b = -ܹBS+
ɯ     @pL4Yd  q     6 3Ĭ  Ac܌ Ψ k [&>   Z pkm] u-c:   Nt δpҝ  8 = #  [.  ޯ ~   m y PP |I֛    Q 9v[ Q  \n  r 'g +  T 2  V  z 4  8  (	 Ey*#j 2]  R    )  [N R\$ <>: >\$; >  \r   H  T \n w N  wأ  <  Gw    \\Y _ Rt^ > \r}  S\rz 4= \nL %J  \",Z 8    i 0u ?    s3# ى :   㽖  E]x   s^8  K^  *0  w    ~   :  i   v2w     ^7   7 c  u+U% {P *4̼ LX./!  1C  qx!H  Fd  L   Ġ `6   5  f  Ć = H l  V1  \0a2 ;  6    _ه \0& Z S d)KE'  n  [
X  \0ZɊ F[P ޘ@  !  Y ,` \"ڷ  0Ee9
yF>  9b    F5:   \0}Ĵ  (\$    37H    M A  6R  {Mq 7G  C C m2 ( Ct>[ -t /&C ] etG ̬4@r>   < Sq /   Q hm        L  #  K |   6fKP \r%t  V=\" SH\$ }   )w ,W\0F  u@ b
 9 \rr 2 # D  X   yOI >  n
  Ǣ%   '  _  t\rτz \\1 hl ]Q5Mp6k   qh \$ H~ |  !*4    `S   S t PP\\g  7 \n-  :袪p    l B   7Өc (wO0\\:   w   p4   {T  jO 6HÊ r   q \n  %% y']\$  a Z .fc q*- FW  k  z   j   lg : \$\" N \r# d Â   sc ̠  \"j \r     Ւ Ph 1/  DA)   [ kn p76 Y  R{ M P   @\n- a 6  [ zJH, dl B h o     + #Dr^ ^  e  E    ĜaP   JG z  t 2 X     V     ȳ  B_%K=E  b弾 §kU(.! ܮ8    I.@ K xn   : P 3 2  m H		C* :v T \nR     
0u     ҧ]     P
/ JQd {L ޳:Y  2b  T   3 4   c V=   L4  r ! B Y 6  MeL        i o 9< G  ƕЙMhm^ U N   
 Tr
5HiM / n 흳T  [-<__ 3/Xr(<        uҖGNX20 \r\$^  :'9 O  ; k    f  N'a    b , V  1  HI!%6@  \$ EGڜ 1 (mU  rս   `  iN+Ü )   0l  f0  [U  V  -:I^  \$ s b\re  ug h ~9 ߈ b     f +0   hXrݬ !\$ e, w+    3  _ A k  \nk r ʛcuWdY \\ ={. č   g  p8 t\rRZ v J: >  Y|+ @    C t\r  jt  6  
% ?  ǎ > /
     9F`ו  v~K     R W  z  lm wL 9Y *q x z  Se ݛ    ~ D     x   ɟi7 2   Oݻ   _{  53  t   _  z 3 d) C  \$?KӪP %  T&  &\0P NA ^ ~   p    Ϝ   \r\$     b*+D6궦ψ  J\$( ol  h&  KBS>   ;z  x oz>  o Z \nʋ[ v   Ȝ  2 OxِV 0f     2Bl bk 6Zk hXcd 0* KT H=   π p0 lV  
  \r   n m  )(   ");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:  gCI  \n8   3)  7   81  x:\nOg#)  r7\n\"  ` |2 gSi H)N S  \r  \"0  @ ) `(\$s6O!  V/=  ' T4 =  iS  6IO G# X VC  s  Z1. hp8, [ H 
~Cz   2 l c3   s   I b 4\n F8T I   U*fz  r0 E    y   f Y.:  I  ( c  ΋! _l  ^ ^(  N{S  )r q Y  l٦3 3 \n +G   y   i   xV3w uh ^r    a۔   c  \r   (.  Ch <\r) ѣ ` 7   43'm5   \n P :2 P    q    C }ī     38 B 0 hR  r( 0  b\\0 Hr44  B ! p \$ rZZ 2܉.Ƀ(\\ 5 
|\nC( \"  P   .
  N RT Γ  > HN  8HP \\ 7Jp~   2%  OC 1 .  C8·H  * j    S( /  6KU    <2 pOI   `   ⳈdO H  5 -  4  pX25-Ң ۈ z7  \"( P \\32:]U    ߅!] < A ۤ   iڰ l\r \0v  #J8  wm  ɤ < ɠ  %m;p# `X D   iZ  N0    9
  占  `  wJ D  2 9t  *  y  NiIh\\9    :    xﭵyl* Ȉ  Y     8 W  ?   ޛ3   !\"6 n[  \r *\$ Ƨ nzx 9\r |*3ףp ﻶ :(p\\;  mz   9    8N   j2    \r H H&  ( z  7i k      c  e   t   2:SH Ƞ /) x @  t ri9    8    yҷ   V +^Wڦ  kZ Y l ʣ   4  Ƌ      \\E { 7\0 p   D  i -T    0l %=   ˃9( 5 \n\n n,4 \0 a} ܃.  Rs\02B\\ b1 S \0003, XPHJsp d K  CA! 2*W    2\$ + f^\n 1    zE  Iv \\ 2  .*A   E(d    b  ܄  9    Dh &  ? H s Q 2 x~nÁJ T2 &  e R   G Q  Tw ݑ  P   \\ )6     sh\\3 \0R	 '\r+*;R H . ! [ '~ %t<  p K# ! l   Le    ,   & \$	  `  CX  ӆ0֭     :M h	 ڜG  !&3 D <! 23  ?h J e    h \r m   Ni       N Hl7  v  WI .
  - 5֧ey  \rEJ\ni*
 \$ @ RU0,\$U E    ªu)@(t SJk p! ~   d` >  \n
 ;#\rp9 jɹ ]&Nc(r   TQU  S  \08n`  y b   L O5  ,  >   x   f䴒   +  \" I {kM [\r% [	 e
 a 1!    Ԯ F@ b)R  72  0 \nW   L ܜҮtd +    0wgl 0n@  ɢ i M  \nA M5n \$E ױN  l     % 1 A      k r iFB   ol,muNx- _ ֤C(   f l\r1p[9x(i BҖ  zQl  8C 	  XU Tb  I ` p+V\0  ; Cb  X +ϒ s  ]H  [ k x G* ] awn ! 6     mS  I  K ~/ ӥ7  eeN  S /;d A >}l~     %^ f آpڜDE  a  t\nx= kЎ *d   T    j2  j  \n    , e=  M84   a j@ T s   nf  \n 6 \rd  0   Y '%ԓ  ~	 Ҩ <  
 AH G  8   ΃\$z  {   u2*  a  > (w K.bP {  o  ´ z # 2 8= 
8>   A, e   + C x *   -b=m   , a  lzk   \$W , m Ji ʧ   +   0 [
  .R sK   X  Z
L  2 ` ( C vZ      \$ ׹, D?H  NxX  )  M  \$ ,  *\nѣ\$<q şh!  S    xsA! : K  }       R  A2k X p\n<      l   3     VV } g&Yݍ! + ;< Y  YE3r َ  C o5    ճ kk     ۣ  t  U   ) [    }  u  l :D  +Ϗ _o  h140   0  b K 㬒     lG  #        |Ud IK   7 ^  @  O\0H  Hi 6\r    \\cg\0   2 B *e \n  	 zr ! nWz&  {H  '\$X  w@ 8 DGr*   H 'p# Į   \nd   
,   
, ;g~ \0 #    E  \r I`  '  %E . ]` Л  %&  m  \r  %4S v #\n  fH\$% - #   qB     Q- c2   &   ]   qh\r l] s    h 
7 n#    - jE Fr l&d    z F6    \"   |   s@    z)0rpڏ\0 X\0   |DL<!  o * D {.B<E   0nB(   |\r\n ^    h !   r\$  (^ ~    /p q  B  O     ,\\  #RR  %   d Hj 
`   
 ̭ V  bS d i E   oh r<i/k\$- \$o  + ŋ  l  O &evƒ i jMPA'u'   ( M(h/+  WD So .
n . n   ( (\"   h &p  / /1D̊ j娸E  &⦀ ,'l\$/., d   W bbO3 B sH :J`! .         ,F  7(  Կ 

 1 l s  Ҏ   Ţq X\r    ~R鰱` Ҟ Y* :R  rJ  %L +n \"  \r  ͇H!qb 2 Li %    Wj#9  ObE.I: 6 7\0 6+ % .    a7E8VS ? (DG ӳB %;   /<     \r    > M  @   H  D
s 
 Z[tH Enx(  R x  @  GkjW >   #T/8 c8 Q0  _ IIGII !  YEd E ^ td th `DV!C 8  \r   b 3 !3 @ 33N} ZB 3	 3 30  M( >  } \\ t f f   I\r   337 X \"td ,\nbtNO`P ; ܕҭ   \$\n    Zѭ5U5WU ^ho   t PM/5K4Ej  KQ&53GX Xx) <5D  \r V \n r 5b܀\\J\">  1S\r[-  D
u \r   )00 Y  ˢ k{\n  #  \r ^  | uܻU _n U4 U ~Yt \rI  @䏳 R  3: uePMS 0T wW X   D  KOU   ;U \n OY  Y Q,M[\0 _ D   W  J* \rg(] \r\"ZC  6u + Y  Y6ô 0 q (  8}  3AX3T  h9j j f  Mt PJbqMP5>      Y k%&\\ 1d  E4   Yn   \$< U]Ӊ1 mbֶ ^     \"NV  p  p  eM   W ܢ \\ )\n  \nf7\n  2
  r8  =Ek7tV    7P   L  a6  v@' 6i  j&>  ;  `  a	\0pڨ( J  ) \\  n  Ĭm\0  2  eqJ  P  t  f
j  \"[\0     X,<\\      +md  ~     s%o  mn ),ׄ ԇ \r4  8\r    mE H]     HW M0D ߀  ~ ˁ K 
 E}    |f ^   \r> -z]2s xD d[s t S  \0Qf- K`   t   wT 9  Z  	 \nB 9 Nb  < B I5o  oJ p  JNd  \r hލ  2 \" x  HC ݍ :   9Yn16  zr+z   \\     m   T    @Y2lQ<2O+ %  .Ӄh 0A   Z  2R  1  / hH\r X  aNB&   M@ [x  ʮ   8&L V͜v * j ۚGH   \\ٮ	   &s \0Q  \\\" b  	  \rBs  w  	   BN` 7 Co(    \nè   1 9 *E   S  U 0U  t '| m   ?h[ \$.# 5	  	p  yB @R ]   @|  {   P\0x /  w % EsBd   CU ~O׷ P @X ]    Z3  1  { eLY   ڐ \\ (*R` 	 \n     QCF *     霬 p X|`N   \$ [   @ U      Z `Zd\"\\\"    )  I : t  oD 
\0[     -   g    *`hu% ,    I 7ī H m 6 }  N ͳ\$ M UYf&1    e]pz   I  m G/   w  ! \\#5 4I d E hq   Ѭk x| k qD b z?   >   :  [ L ƬZ X  :       j w5	 Y  0    \$\0C  dSg    { @ \n` 	   C    M     # t}x N    { ۰)  C  FKZ j  \0PFY B pFk  0< > D<JE  g\r . 2  8 U@* 5fk  JD   4  TDU76 /  @  K+   J     @ =  WIOD 85 M  N \$R \0 5  \r  _   E   I ϳN l   y\\   qU  Q   \n@   ۺ p   P۱ 7ԽN\r R{* qm \$\0R  ԓ   q È+U@ B  Of* Cˬ MC  `_
    ˵N  T 5٦C׻     \\W e&_X _؍h   B 3   % FW   | Gޛ' [ ł    V  #^\r  GR    P  Fg     Yi    z\n   + ^/       \\ 6  b  dmh  @q   Ah ),J  W  cm em] ӏe kZb0     Y ]ym  f e B;   O  w apDW     { \0  -2/bN sֽ޾Ra Ϯh&qt\n\" i Rm hz e     FS7  PP 䖤  :B    sm  Y d   7}3?* t    lT } ~     =c      	  3 ;T L  5*	 ~# A    s x-7  f5` #\"N b  G    @ e [     s    -  M6  qq  h e5 \0Ң   * b IS   Fή9} p -  `{  ɖkP 0T<  Z9 0<՚\r  ;!  g \r\nK 
\n  \0  * \nb7( _ @, e2\r ] K +\0  p C\\Ѣ,0 ^ MЧ    @ ;X\r  ?\$\r j + /  B  P     J{\"a 6 䉜 | \n\0  \\5   	
156   . [ U
د\0d  8Y :!   =  X. uC    !S   o p B   7  ů Rh \\h E= y:< :u  2 80 si  TsB @\$   @ u	 Q   .  T0 M\\/ d+ƃ\n  =  d   A   )\r@@ h3   8.eZa|. 7 Yk c   'D#  Y @X q =M  44 B AM  dU\" Hw4 (>  8    C ?e_`  X: A9ø   p G  Gy6  F Xr  l 1  ػ B Å9Rz  hB {    \0  ^  - 0 %D 5F\"\"     i `  nAf  \"tDZ\"_ V\$  !/ D ᚆ      ٦ ̀F,25 j T  y\0 N x\r Yl  #  Eq\n  B2 \n  6   4   !/ \n  Q  * ;)bR Z0\0 CDo 
˞ 48      e \n S%\\ PIk  (0  u/  G      \\ } 4Fp  G _ G?)g ot  [v  \0  ?b ;  `( ی NS)\n x=  +@  7  j 0  , 1Åz    >0  Gc  L VX
     %    Q+   o F   ܶ >Q- c   l    w  z5G  @(h c H  r?  Nb @       lx3 U` rw   U   t 8  = l#   l 䨉8 E\"    O6\n  1e `\\hKf V/зPaYK O     x 	 Oj   r7 F;  B    ̒  > Ц V\rĖ  | 'J z    # PB  Y5\0NC ^\n~LrR  [̟Rì g eZ\0x ^ i<Q /) %@ʐ  fB Hf {%P \"\"   @   )   DE(iM2 S * y S \"   e̒1  ט\n4`ʩ>  Q*  y n    T u     ~% +W  XK   Q [ʔ  l PYy#D٬D< FL   @ 6']Ƌ  \rF ` ! %\n 0 c   ˩%c8WrpG .T Do UL2 * |\$ : r  @   & 4  H >    %0* Zc(@ ]  Q:*   (&\"x 'JO 1  `>7	# \"O4PX   |B4  [   ٘\$n 1`  GSA   AH  \" )   S  f ɦ  -\" W +ɖ \0s-[ fo٧ D  x
    =C .  9   f  c \07 ?Ó95 ֦Z 0  f 
    H?R'q>o  @aD   G[;G D BBdġ q   2 |1 
 q      w< #  EY ^    Q\\ [X     >?v [   I        g\0 )   g u  g42jú' T     vy,u  D =p H\\  ^b  q   it   X   FP @P
  T  i2# g  Dᮙ %9 @ ");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress('');}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo'';break;case"cross.gif":echo'';break;case"up.gif":echo'';break;case"down.gif":echo'';break;case"arrow.gif":echo'';break;}}exit;}if($_GET["script"]=="version"){$Gc=file_open_lock(get_temp_dir()."/adminer.version");if($Gc)file_write_unlock($Gc,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));exit;}global$b,$h,$m,$Mb,$Rb,$Zb,$n,$Ic,$Mc,$aa,$kd,$x,$ba,$zd,$ke,$Je,$Tf,$Qc,$sg,$wg,$U,$Jg,$ca;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";if($_SERVER["HTTP_X_FORWARDED_PREFIX"])$_SERVER["REQUEST_URI"]=$_SERVER["HTTP_X_FORWARDED_PREFIX"].$_SERVER["REQUEST_URI"];$aa=($_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off"))||ini_bool("session.cookie_secure");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$Ce=array(0,preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$Ce[]=true;call_user_func_array('session_set_cookie_params',$Ce);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$tc);if(function_exists("get_magic_quotes_runtime")&&get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",15);$zd=array('en'=>'English','ar'=>'العربية','bg'=>'Български','bn'=>'বাংলা','bs'=>'Bosanski','ca'=>'Català','cs'=>'Čeština','da'=>'Dansk','de'=>'Deutsch','el'=>'Ελληνικά','es'=>'Español','et'=>'Eesti','fa'=>'فارسی','fi'=>'Suomi','fr'=>'Français','gl'=>'Galego','he'=>'עברית','hu'=>'Magyar','id'=>'Bahasa Indonesia','it'=>'Italiano','ja'=>'日本語','ka'=>'ქართული','ko'=>'한국어','lt'=>'Lietuvių','ms'=>'Bahasa Melayu','nl'=>'Nederlands','no'=>'Norsk','pl'=>'Polski','pt'=>'Português','pt-br'=>'Português (Brazil)','ro'=>'Limba Română','ru'=>'Русский','sk'=>'Slovenčina','sl'=>'Slovenski','sr'=>'Српски','sv'=>'Svenska','ta'=>'த‌மிழ்','th'=>'ภาษาไทย','tr'=>'Türkçe','uk'=>'Українська','vi'=>'Tiếng Việt','zh'=>'简体中文','zh-tw'=>'繁體中文',);function
get_lang(){global$ba;return$ba;}function
lang($u,$fe=null){if(is_string($u)){$Me=array_search($u,get_translations("en"));if($Me!==false)$u=$Me;}global$ba,$wg;$vg=($wg[$u]?$wg[$u]:$u);if(is_array($vg)){$Me=($fe==1?0:($ba=='cs'||$ba=='sk'?($fe&&$fe<5?1:2):($ba=='fr'?(!$fe?0:1):($ba=='pl'?($fe%10>1&&$fe%10<5&&$fe/10%10!=1?1:2):($ba=='sl'?($fe%100==1?0:($fe%100==2?1:($fe%100==3||$fe%100==4?2:3))):($ba=='lt'?($fe%10==1&&$fe%100!=11?0:($fe%10>1&&$fe/10%10!=1?1:2)):($ba=='bs'||$ba=='ru'||$ba=='sr'||$ba=='uk'?($fe%10==1&&$fe%100!=11?0:($fe%10>1&&$fe%10<5&&$fe/10%10!=1?1:2)):1)))))));$vg=$vg[$Me];}$xa=func_get_args();array_shift($xa);$Ec=str_replace("%d","%s",$vg);if($Ec!=$vg)$xa[0]=format_number($fe);return
vsprintf($Ec,$xa);}function
switch_lang(){global$ba,$zd;echo"<form action='' method='post'>\n<div id='lang'>",lang(19).": ".html_select("lang",$zd,$ba,"this.form.submit();")," <input type='submit' value='".lang(20)."' class='hidden'>\n","<input type='hidden' name='token' value='".get_token()."'>\n";echo"</div>\n</form>\n";}if(isset($_POST["lang"])&&verify_token()){cookie("adminer_lang",$_POST["lang"]);$_SESSION["lang"]=$_POST["lang"];$_SESSION["translations"]=array();redirect(remove_from_uri());}$ba="en";if(isset($zd[$_COOKIE["adminer_lang"]])){cookie("adminer_lang",$_COOKIE["adminer_lang"]);$ba=$_COOKIE["adminer_lang"];}elseif(isset($zd[$_SESSION["lang"]]))$ba=$_SESSION["lang"];else{$ra=array();preg_match_all('~([-a-z]+)(;q=([0-9.]+))?~',str_replace("_","-",strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"])),$Nd,PREG_SET_ORDER);foreach($Nd
as$A)$ra[$A[1]]=(isset($A[3])?$A[3]:1);arsort($ra);foreach($ra
as$y=>$We){if(isset($zd[$y])){$ba=$y;break;}$y=preg_replace('~-.*~','',$y);if(!isset($ra[$y])&&isset($zd[$y])){$ba=$y;break;}}}$wg=$_SESSION["translations"];if($_SESSION["translations_version"]!=4240734095){$wg=array();$_SESSION["translations_version"]=4240734095;}function
get_translations($yd){switch($yd){case"en":$g="A9D  y @s: G ( ff     	  :  S   a2\"1 ..L' I  m # s, K  OP#I @%9  i4 o2ύ   ,9 % P b2  a  r\n2 N C ( r4  1C`( :Eb 9A i: &㙔 y  F  Y  \r \n  8Z S=\$A    ` = ܌   0 \n  dF 	  n:Zΰ)  Q   mw    O  mfpQ ΂  q  a į #q  w7S X3      o \n>Z M zi  s; ̒  _ :   #|@ 46  : \r-z| (j*   0 :-h  /̸ 8)+r^1/Л η, ZӈKX 9, p :>#   ( 6 qB 7  4   2 Lt .   \nH h\n|Z29Cz 7I    H\nj=)  ( /
\n  C :  \$  0ʖ  Zs j  8 4N` ; 
P 9Ikl  m _<\" H\"   L     2    q a	 r 4 Ԉ1OAH< M	 U\$   V   % \$	К& B  
c͜<       KF    ⧭~ , r(  J\0Ap   9   P&' h6B;  0   \" ƎR ΂ \" ލJ p򍯃  1 #  :   ݅  P  [      3  \r O b  8 +    !       :  0 )` > x ( \n [   
  ɝ/  ]G @\$cB3   O  t   \$     |   7 }   x !   ݰX 4   ;< y 9 %	R \n  ,  q	 ]   ñ  .ϴ {jֿۆ ]P#_   \"   6 A? zB J Zx   Ł<p ~  =   ×D  ZJ0 <( b  09i  h  #3; ez&   Y     0Ɓ\0 K2  0=mآ y \\     _ɨ \n (      \0 \"H  &4D !  ~ Ni #FD4 2.eI A    bL   P\$ 0 {  7~\$ 7 xdq \n\0004  vZ[ 3 1  hѺ9Gd ! 0   \r mR  vI
90f  Ȓ ZK  B   HIN8d' = W5   -o  .SH   ܐ ue    ! ٕH   St h   G  'Ǹʴ   L\n	 L*C  5a .S ֣ > }s5rJs  }yE܀  JA  d  @H \0gL(  H   # R  tX ix   Y &\0JI &, +  q \\1 % V PʬH ڝS sNH  M ~3 QT&ƫ 3  r} I 8 Ѹ + C  `+  5 s H⑳ N       	' G=@B F  q  sIB 0i~{Nb[\n ҵ0F       z Mo   \" q\\      Û5 J  .  `.  * 3j  ]x5 ɠAFb ? ᴳ c  ITI F   @o' /D Ný: j t( j 7 <<B  PN\nyQm6AR   4UV W _ YOS    A \r -Z ;HHm0.";break;case"ar":$g=" C P   l* \r ,&\n A   (J.   0Se\\ \r  b @ 0 ,\nQ,l)   µ   A  j_1 C M  e
  S \ng@ Og  X DM )  0  cA  n8 e*y#au4    Ir*;rS U dJ	}   *z U @  X;ai1l(n      [ y d u'c(  oF    e3 Nb   p2N S  ӳ:LZ z P \\b u . [ Q`u	!  Jy  &2  (gT  SњM x 5g5 K K ¦    0ʀ( 7\rm8 7( 9\r f\"7N 9     4 x荶 
 x ; #\"       2ɰW\"J\nB  'hk ūb Di \\@   p   yf   9    V ? TXW   F  { 3)\" W9 |  eRhU  Ҫ 1  P >   \"o| 7   LQi\\  H\"    #  1  ŋ #  ܇Jr   > J   sޜ:  ?P]< T(\"'? n pSJ SZ ɻ  \" \"T(  < @SN  ^v8b W  V #   3 h D  >T&      L  e  S x   |  'ȍ @I    w  [I l~ !T l tK =덮   )u ۄ 83 Q_@ 	 ht) `P 5 h  cT0   C   OhH\"7 ^  pL\n7gM* g  <7cp 4  Rg : `B C  6L @0 M( 3 c 2 Q[!*j =A@  bO!B   \r  <   : cd9 è \r x  ach9o 0 A \" Ck : a@   c\rO 5  /     jf*4Pf3gî     \r 71 X     0z\r  8a ^   \\0    x 7 :i  D{   3  x )   !3 p N     ZS~^(\$ HWsjt) U RfPy F \"\0䮚8p\r-u< + y/-   ޛ w/\\9=    C im4 \"  Hm 6    _[< ކ tma a\rf 4   ] n <    ̩)?j Ƌ \\  
	!. 4P  M  80 iC v     Ro    7\n  \$d7  .   \rA\0c   4    6G%  RJ  : a   v\0jC@pSD4   CEJ   H 6 k     Tk\rq   \r5cfoЪ  ; 8   ! xa   \$ \r D\r   @   c7  4C   H    ҆0  !4\$ 4Y\0 F J +EF  mHh     _y\r-  P U2\\   i     \nز~'R\0H FA E(   (B !ZFj   '  	 I#A ς\0 UѧB @7C |l  q  
 d] \"x%7\n # C ŧ ؚ '  \n<) BDY  /   , U {  8 BlN \$ ĺO rs꺻Ȫ  MU L  D h   [S \n ( K7 ! p P<0 5 \0S\n!0ib\rk  P(XZZ䡒rT֛  iS
R\$ X F~ B .uH    -: \$  5 M  P֭ \" lY   0     	 C  6 |Ckh  i\rL l;   37  L 5 \r  
ͷ\"B F ៻ Nz )} f 1{Žx#  Ò5\n[5w   *Pn  alֶD \\ #\0Z aШ @  r   [ \0DuR  D-.aH ! \0STX  f} \r %     &     @\$rq3T  ի     l_  )   &d ] զ!\$ Ys u  F  U Q   I   Q+ߌ   Pd";break;case"bg":$g=" P \r E @4 !Awh Z(&  ~\n  fa  N `   D  4   \" ]4\r;Ae2  a       .a   rp  @ד |.W.X4  FP     \$ hR s   }@ Зp Д B 4 sE ΢7f &E ,  i X\nFC1  l7c  MEo)_G    _< Gӭ}   ,k놊qPX }F +9   7i  
Z贚i Q  _a   Z  * n^   S  9   Y V  ~ ] X\\R 6   } j }	 l 4 v  =  3	 \0 @D
| ¤   [     ^]# s. 3d\0*  X 7  p@2 C  9(   :# 9  \0 7   A    8\\z8Fc       m X   4 
;  r 'HS   2 6A> ¦ 6  5	 ܸ kJ  & j \"K      9 {.  - ^ : *U? +*>S 3z>J&SK &   hR    & :  ɒ>I J   L H ,   / \r/  SYF. Rc[?IL  6M )   V 5԰КRf  e rh   i ʍW4  & +Œد \\ A#\" -(   U⭣  ?	   Zw j  K \0 +@ \"M* EV \nC    bM  r    + )   YNJb BX    6#  ' ,}   ́C2      R*ZWE*   ˲  x ם   N}  [
4    {^a\n hR8th(  ΀  P   ۈ       v   ʚ
  V  D\"\r# b6F pA  w  \\g2   7cH  .(  ? P :TF O2 7  W; ;k =  ˓   6   )R  L   \$pRM ֨k   ή  v <  y   ?}E  L  jޣh Jfw  \n     7 3 T5w: o mz~] Q  `    {ŉ-v,\\PѫB ` 4r A 1'3* Q fq  ̆  d\r  7\"   ۙ    @r      p`     pa P  V {     G4 x\"  1 @ xa  t  !   *j  `  ^I = x  _@ x    a	 `\$ N5< D  ayAj ٓ ]
a|1 p Øwa w 1 ȏb  r b'    \$G ,E   QѦU     O ye>GM =un^ 9 !rd   B\r g%nY=  Kϲ 8f   ^tN S  \\  @ЍCc  l v^\0bF  A  C* !   \$| 9a : \0  <\$   : A?Q   \0 1 (V pa\r   6 4J Q)   B # xV  Z;Jw  :\n (&-DS+ ?   R^d	Y5l \0    ,ڊ  7 \0  Hve 3Κ|  ӅGa Щ  L E֥B  '   T   REH  w p C  a  kWa   >  d  1>L   (*\"Hle\"8 Hv    M\$O F& eR  uhtݧ  TQ ;QТ DR 2g4 ]j%f   Y\\K-6  ) /l2K.   '  Lӛ Md|Hׇ4KK  8  S   \\& Z¥\$ &   OK\$x   0 N xϬ ^ Mj ;  ^
 p+א B  4 K   L[ .  Y w  s ί       _ \$  E  1d gNJ  .  . I !! \nٖ@L, е C - \0F\n  L  K ZR Y є ^ݓ * \n  /c y      ? 0J   8 rF>L   6  S  b < uڹ 	 Y\n     L ]j/yF \\ 12 _ M  q Dn 6  tɊ ; \\ S  izo \nZ;    !M  Ӭɖo sZN  * @ 
AŁ ɖ 2r   0 ] 1(c(mn k]ڥ 
 ֭2b . WW   N  1     TU <饛 Qy. 2 v i  24  =  C  p J ? y    eҪW  Z [  ¥{g W\0 \r  HR_v y2~\0 .	 m * U.    D7 ʹq \n &̈́ v!\0E a+N & g 7
R N r cn/H  + & rz* JDC   j f  vM  _n 	  *' ԰ :3< } +J  +   i 2# ";break;case"bn":$g=" S)\nt]\0_  	XD)L  @ 4l5   BQp   9  \n  \0  ,  h SE 0 b a% .  H \0  .b  2n  D e* D  M   ,OJÐ  v    х\$:IK  g5U4 L 	Nd!u> &      a\\ @'Jx  S   4 P D     z  .S  E< O S   kb O af hb  \0 B   r  )    Q  W  E {K  PP~ 9\\  l* _W	  7  ɼ  4N Q   8 'cI  g2   O9  d0 < CA  :#ܺ %3  5 !n nJ mk
    ,q   @ᭋ (n+L 9 x   k I  2 L\0I  #Vܦ #`       B  4  :    ,X   2    ,(_)  
7* \n p   p@2 C  9. # \0 #  2\r  7   8M   : c  2@ L    S6 \\4 Gʂ\0 /n:& .Ht  ļ/  0  2 TgPEt̥L ,
L5H    L  G  j %   R t    -I 04=XK \$Gf Jz  R\$ a`(     +b0  z  5qL /\n  S 5\" P     (]x W } YT   W5
e ޵}*P  9/Vu*R     bX    e ݔ ^5h       O !.[8  \n @  <  S   \\ bѶr 8 ȊE( x  m +Ď + ^,@'nE)\\ tW Z \$z·+ /\$D  \$8Z   qd   ZCڷFLO  NC	Y   
da ! sA  AB  19~ +g  *\r Y(աI  k M ՉW\$Sr j _ F  s 6   .ڟG4 @ \$ Bh \nb : h\\- ^h .  M   Mѳ TmGǺЈ @/r  M X    N    7cH  Q>   T   :@S w r<  3`ؓ* *+ J  H \\ \0%    \0  8m! < \0   cg 9 ` \0l\r & 0X|Ô! 0  A\r `mI     \nTK N\n 5*q\n :   ; c  L  3>P  Rh !   
  ~! 6\0xO     s @  x 
 \\ 	 7 p^Cp/O :?)  ?)03  ^A \n6 m v\n  *D\$8  !n ]  ( 	= f     oqv S  G B(`  _hp\r0	DFh #Tl   9GH   z   9G  t ~/  \"  Hm  6 \0 #   t  Z}'a\rg 4 \$   nyX ) VTW; zol  D 5b   I: ͔P\r  0 9\n  \0w=  1@ \" r   0 id  \$ ТB  D   d 0  @   \r! 6 5t ڎ  EL % J;GDٝ@   C . ʣZ   h    {   IPe     ) \r   #  ='      T\0r   '  M!Pw   (   | @sPp    ;pp   9 UDO c\r 4 x ( *<  0 xS ڡ   \0 FXj-  Ɦ q  h G2 }b     % , +RgT	 ՟M    @E   н&I? ] T  9B  k Dl  6 f S!s  \0dL)W7T\nV 3H y;  2 Zy  v\rӜ  (C  O  7ص2 - MA 'jU]T Q+!( h 0 @' 0 C xa 7  s R#  _D2@-\rMm7 G   *`d  \$b} ˯q R   JĮ  |  l7ǐA L(  @ h =  #J  hi J Ha N\r  7 h L1! @ ; ̕Q  (LjQ:, @3 (( 
=JZ ) ²    :    4εl   g g8 \" *ɭs      \r Z#N+  ʕ5p;Y W   \no 6 (CkB4 ji kL   3A  ]B6a\r ]>٘lB F   F  K  R K-    g5a / >    :Z':'H  ^  x   Z ,; JPH  3 ) \\  G ٯQ mz W疝u* %  (& = Q5 ] m x > g  f x^   >{jv  I  ܧW    8  X4 ]ep䋤 V6U8&eVZSzwN`+ Ǚ rK&0 me ۖD      Q[  il,  u@ :/        { uo +>q P/\n  A }   #  *ˊ  > 

J \\L  UZ { 1&  x    R";break;case"bs":$g="D0 \r    e  L S   ?	E 34S6MƨA  t7  p tp@u9   x N0   V\"d7    dp   ؈ L A H a)̅. RL  	 p7   L X\nFC1  l7AG   n7   (U l     b  eēѴ >4    ) y  FY  \n, ΢A f  -     e3 Nw |  H \r ] ŧ  43 X ݣw  A! D  6e o7 Y>9   q \$   iM pV tb q\$ ٤ \n%   LIT k   ) 乪  0 h   4	\n\n: \n  :4P  ; c\"\\&  H \ro 4    x  @  , \nl E  j +)  \n   C r 5    ү/ ~    ;.     j & f)|0 B8 7    ,	 +-+; 2t  p ɘ  H ǋ    '  ʊ B   B  5(   L{,  S K I    \"5/ԥ!IQR <* PH   gR )t ƭ < 14 h 2#    &2 ڇr  5 l<  /  \"  th  P 2% \"X;O  X=1\"     # ìX  JŘ    2   h9\\HE e 1 ͫ ?4  \r dޑ\nM| ih9 6  \$ Bh \nb 2B h 
c 4<   b      B#h   kV    n ) ( ?  7cHߜ% c  \r  0 
'  2 7/ f9Yե@  hڍ)>p: cT9 è؁\r : 9   嬌5r  t 7 8P9 3RR2 *4MC   :  c6X ( 8@       y r  a 42c0z\r  8a ^  (]  Ð\\   {  	 靅 }أ Hx ! \\+6 \n XQ  h  C97 Ҹ'p R  # '\n检     , s< ;  =J;  j   c [׌       	#h ӱ p    4K   @   B 95r    s_h 6 P MQ+ 9  f   g\$q   ݙ 晱 D\\4\r2 3vf   _l-  6hT A}\r!  @   >  9   _	 H) 's(  ,  \\ D  GD 	TA a% \r  hP `1 4  Ԯ \rY A(@    e!+G D  w ~͔ \r  p ù q w:   C ᄔ& ^   ; ! 0   &YI uE`Ȉz 5  6 UTdڹ 9  6r  aR 1&rzs LA+  0@ ٽ; I D  EC D 蜸!\n 9  FL8 ST 1 Cn1  )v b Q 86 <  	   @' 0 ȣ\" C   
  ! q  4h    !	2W\r*Cpf!D2   Q  S> }436 O % %  b Q	   2 J@B0T \$i   4 O94 r H	&\r!  rQ  , F+  E C4\$ ]Uu*r R  X = 4` u` +ݢ B   _Q  Jʮ 0CK    ܊; YB u t A  kE so\n P# p \\  <d J  y4  n] v+  NL \rh  V   A(  .L0
rR \0eCfؕ S aI  \r ԏ .wڍ16   ✏  /p   B|f UI R  P  Ca m \0_  U  0 ڰ     4 d  A# ~ E  \r 2 vߗ   iUf7     V   0j1 Hf  j b    5   \0";break;case"ca":$g="E9 j   e3 NC P \\33A D i  s9 LF (  d5M C	 @e6Ɠ   r    d `g I hp  L 9  Q* K  5L    S, W-  \r  < e4 &\" P b2  a  r\n1e  y  g4  & Q: h4 \rC    M   Xa    +     \\>R  LK&  v    
   3  é pt  0Y\$l 1\"P      d  \$ Ě`o9>U  ^y ==  \n) n +Oo   M|   *  u   Nr9]x  {d   3j P(  c  2&\" :   :  \0  \r rh (  8    p \r#{\$ j    #Ri *  h    B  8B D J4  h  n{  K  !/28,\$   #  @ :.̀  ( p 4 h* ; p  B+   0 9 ˰! S  ,  7\r3:hŠ 2a o4эZ 0    ˴ @ʡ9 ( C p  E1   ^uxc=  ( 20؃  zR6\r x 	   	 Z R  3єr9g +     ͧ0e 	a  P    qq\$	 I (  2 N ;W 
R v  m  oP py0o  4^    _q% 9[    @ 	 ht) `P 2 h  cL0    u Pu&     E ꓯY   \$  K 7bb&C   6L\0SFҤ   3  +  t99  7R   *\r  |70 \$:  P  \n  C3 0  \n  > *l7Cc(P9 . R  #    b*` Z\n3f #&   : 2 \$  h42 0z\r  8a ^  h\\    3   _\0 OdT A p ;  ^0  h   f +   9?  떺6  9    Bk  \$ Z1 X o 2  < t=K  =_Z;    ݟj7v 3  _ \"*   !e6   f   >a\rdt )   Բ8/` \\ ҆{I (\\a  \n BQ/% #  GC\n Z  ;  R  #r]    3i#\r _   \r	`h1   f \" M\n \rv~  Q 0Fd hT   @Z (    A\$M R  P  8E {pg6f ֚ cJj   ,\0  C   P W   >  I\$ \"  \0001Ģl * 710¡C~ C|> )    ` M  6\0    \$    Њ & 1_AR V T 'B   TaH -\n1 E8Ia1	\$D< H  ! \r <݂) H	*?39ʻ v   ?     ) a ' ( 2 >   @    \nO :   >͑\\/3V 5Q_<2Ȅ͢ VB^  yeD M \n}   # yPp@L)p/\0@  gR | Ɠ  C4 Q!   0 Aグ MMy f  tWHy  9S 9 :d  UPOST \$ \$   VaXI'  e  * Yk9 *\n~ 4   \"\r0 V  c  ꍬ VCmpP   b  5B 7 @B F  / jy \" ֮ 9 B `7    kF k  3֥&M F Y  Zl    hbL[ݮ 5   T 
1l &  z  m |7,\0 0 :v Ԋ
[aI0a  d ]    d^ >w Z  =	PqI *   ej\r\0eT ~      }	 ` ` #J   Z #\nˣ\\ @ / U Di  Z\n  ";break;case"cs":$g="O8 'c! ~\n  fa N2 \r C
2i6 Q  h90 'Hi  b7    i  i6ȍ   A;͆Y  @v2 \r& y Hs JGQ 8%9  e:L :e2   Zt @\nFC1  l7AP  4T ت ;j\nb dWeH  a1M  ̬   N   e   ^/J -{ J p lP   D  le2b  c  u:F   \r  bʻ P  77  LDn [?j1F  7     I61T7r   { F E3i    Ǔ^0 b b    p@c4{ 2 & \0   r\"  JZ \r(挥b 䢦 k : CP ) z =\n  1 c( *\n  99* ^    :4   2  Y
    a    8 Q F& X ? |\$߸ \n!\r)   <i  R B8 7  x 4ƈ  65  n \r#D  8 je ) Kb9F  n  BD  B  5\$C z9Ƃ   ;   A  
  . sV M  #   @10 N  }Q  ,  C 7 P pHV   55@ 2DI  ;<c*,0  P  2\"  À   kʌB} 9  \$q@  @  1t3n  ͳm  P <  '? CtIO   M 67  z 5% k    ^p] `  0  p  GϢ@t&  Ц) C \\6   哎B i   -4 
ă   8	 ٚ+0  =)   D + 0  w<	J3<3    ^ uЅ\r\rr  j  m^4#H  : k  3   &  \0     4 5p R\r  ` 75 4 Ӳ ;Fղ 	ޚ ; њ6; ^;oW ÿG   p  \r 8  M4 V ; )      %v  P҉ 7 M\$ԍ . l  j nM %\n73x 2o      @2   D4    x   G    H  c ^2\r   4 !xDQ  84   xa  t 1zNCSTj   ~  dn/ ԑS:Fɺ[  	7 0 V ( !2\"j JF    @ P@r{i =    | E >     <    \0|Cjc t7\" /\0 aE L  `\nc5 ` bd`TC )p   [BoP  t I+Y  O U   # 8
  i pBPQۻ 0ӃQ4   & , P i   4   ^ 2Gi+	 rC 3 +a 3 0     H   H\n\0 MI Z M0 @   D R 2   F(g  A   \\В 1       BA    9  tn3x  ǂyȤ A	  %ր@   0  xS\nA   	;f   ƇT&\\ y%k  \"\$q'  % p          Y   y;L    \$ B  S     *D z  h   \$ P K | 	   FkܩF\$3\r    P  \\xB O\naPB G b f Xߴ6 Hil  7  : C0i    rja k~t     PQ \naD&RNU ௛ ЏEGhoM  #Ifoɂ6( 7r8  KA    6 ׁ g =/S  lᏳ Л  C	BS Y 4J  L    OC\rYB4Q  ZQB  \" ^ 3FiX*     ܢ2   Ό B  =`IXC  6  P } yTtV B  k U    @  ) D  F 6  a Gb   e ¨T  P  , ζ  4 r I Xa  ZN  D9Y6 .= b   D u D+e   &    n2*\"Q       ; G/ e4  9Zƫ  B Љ  9  E h  6ZvN 6  ?. ,8x   ^ l  Rv] h\nez`az  B\"!\ny \0֪  x  @g ֫{G   2 ֠x @*\$i0 U V    <lH  \n\n    q &¬ 9&   ~";break;case"da":$g="E9 Q  k5 NC P \\33AAD    eA \"   o0 #cI \\\n& Mpci   :IM   Js:0  #   s B S \nNF  M ,  8 P FY8 0  cA  n8    h( r4  & 	 I7 S	 |l I FS% o7l51 r      ( 6 n7   13 / )  @a:0  \n  ]   t  e     8  g:` 	   h   B\r g Л    ) 0 3  h\n!  pQT k7  WX '\"h.  e9 <: t = 3  ȓ . @;)CbҜ) X  bD  MB   *ZH  	8 :'    ;M  < 
   9  \r #j      EBp :Ѡ 欑       # j   \"<< cr ߯K   ; 
~  r&7 O &8 @(!L .7422 	  B \" l 1M ( s  \rC  @PH  h  ) N  ;,   ' p   H 4  C\$2@   \r   )(#S N' P  \r   Q  U,    t \$ \nn  6 : B@ 	 ht) `P   نR v J. U#j2=Lr   \n  7B0 8 \r 2 	 ܃\r  OL P B ނ-( 3 \n E P\$U06  b*\r l <    1 o  3   {    #=   j M êjaM   p <  P 42I[mv 2 #&` d  \$Hx0 Bz3   ˎ t   \$:[γ  z    @4 !xDm bb   x CX  3  \$6'K B  t7@ <\$#,BN ߡh .  o    
      ζ:k  ñ Z mCv z W d(  6 ͂   [   zƑhw  ۠-\0@3 M*D ģ   l     5  h |!Kͳ >~ #c|  d.   9 L {  <  e  : `f (a9 1  ~Khs\$   9  Py@0 ͜  * I :2 l\0 k  d   \n\\ z 8   } < \"Ӫ` x.I\$  #rFO  3    f )O3  1Ӎ  k      Hw\r 1 e6fM
   `1   ªAHe Є0  0-,d\$   ^  : y'<֒ TK	q M 3  \r@oa ~ 8sD.\r q С2 DC  P`     ,R'  : B  /i- ,  G l >' 99	BxS\n  9 \$B   X    6:@Ci    w(J4   vOP ,]NY| @ Uk L砂> GH !(%, .  B`-A \0  .#. K \" , @L8 p H o /  U C  \\  z W y      F ۂ Ȅ     \"    N  la    \"9р4  >hMd    \n  B   * @ # e }.\$ J LP 1 qMDW  )}a1  PH GI8K2Df  %JF&  5 (a cH  1m    g:   Jh X ~
U\r>y  CJ F& #H  3 1 E6ar  =hN C @  |F	  _  #xb Mi  +  a YKA  b [    ] TZ 6 PT.  )O\$U_k 0D  ";break;case"de":$g="S4    @s4  S  %  pQ  \n6L Sp  o  'C) @f2 \r s) 0a    i  i6 M dd b \$RCI   [0  cI     S: y7 a  t\$ t  C  f4    ( e   *,t\n% M b   e6[ @   r  d  Qfa &7   n9 ԇCіg/   * )aRA`  m+G; =DY  : ֎Q   K\n c\n|j '] C       \\ <, : \r٨U;Iz d   g#  7% _, a a# \\  \n p 7\r : Cx \$k   6#zZ@ x :    x ; C\"f!1J
*  n   .2:    8 QZ    , \$	  0  0 s ΎH ̀ K Z  C\nT  m{    S  C '  9\r`P 2  lº \0 3 #dr  5\r  Z\$  4  )h\" C  Hќ (C \0 :B` 3  U9      d :  F i b !-SU  P 0 K * pHWA  : b 6+C  I+ ¨  s7 B
z4  F   +H   (Z  #`+Z (   5 7\r  6 #\\4!-3W     e z j }7 ݌W  &cT =R@ 	 ht) `R 6   Տ B ŷc > Jl`    z   I ݖ цc   \$ f&G\\ /4C 7 6\" ϡ   x  -7C   !  V6\r %J\r h  B @\\D 8A62 4   bj   \"  )  : =    ߭ 6   [%    J  \r s   8> |n KI \r  &z \0002?   Y   h     2\r \rB   {D  A\0x0 7@z+  9 Ax^; r5ܯp\\3  ߲ \$v   A 4   6\rsL 7! ^0   g  gP:  \0000  @ kV3juE     ѡ\"`     Z  ʏ  |  ; x  3<w   k z/M =`   9goy |Chp-          ɚ   y5 Y	 ` NVQO7    f N N2/Г  @P L   13 7   ^  T!f 1 :  \n1?Dp @ f: `8   ;k  蘧B#Z M@ 1 6  I >2  | # b a 4    V {6*    dL \$ h\" c &WyD 2 G Q | !  Hg\n9 F [ aCJ= 0t*n \n    Ħ  L# \"m \n T a z7 r  r  1 BfR  *  sӀ NEȢXv 2 &ٲC `)~_ {GlNI ~uD  d   ;E  #@   K̺6    ] ؅ 0 Gö  A;c \n髗t   J #n ѿ F\n Jn ِh &	 P	 L* .A 	 e7   j]@z8U. ` Q IKP  OZ*Q߇R    \$  	d % p } q v     5\\ D( ʬ  4F  P(.J Ѥ<\$\r  ipl\" r  N   `̺ 3 F    `\nB , R*kX lHe]Ȧ ڕL   p  l  AQ      DA\rs  V %  S + B ĒI2 -d# T*`Z\r,AGQ   5 o ]   e U /  3&l  v -1[t  ;љFuK  eĠ 0 0d  | |P  LC \n5\$f7  b/ H       V آL\"    -&a4     RR6d      \"f%  6 BX  sU\n   f ! FkE     m \n	n   i T0   _  &Gp  0@+8 {hf2ѝ ` \0";break;case"el":$g=" J    = Z   &r͜ g Y {=;	E 30  \ng\$Y H 9z X   ň U J fz2'g akx  c7C ! ( @  ˥j k9s    Vz 8 UYz MI  !   U> P  T-N'  DS \n ΤT H} k -(K TJ   ח4j0 b2  a  s ]`株  t   0   s Oj  C;3TA]Һ   a O r      4 v O   x B -wJ`     # k  4L [_  \" h       -2 _ɡUk]ô   u*   \"M n ?O3   ) \\̮(R\nB \\ \n hg6ʣp 7kZ~A@ ٝ  L   &  .WB     \"@I    1H @&tg:0 Z ' 1    vg ʃ   C B  5  x 7( 9\r㒌\"#  1#   x 9      2   9  (Ȼ 
 [ y J  x [ʇ +     \\  FOz   \n  ]&,Cv , 
     [WBk 4 F 9~   lD /  /!D( (  H@K  C╖  =A  PX  J  P HF[(eH Bܚ ; \\t C  %%%   % *d 7   2P B  P  oD@gFuӼ 4Ȥ   dӇn  Qת  Kq8 \$􌄗cn4 c 霦;   I	     \0 <  (湾r  \ns8 (%  xH A 	   ^     R^ 5 ֶЦ    B 2     ]  JE P    6D1 @Len A B	=   o򊠯     \r  QR  ]  /  X )yQ iz '   &qR  [ :\$ Ah  z^^ ڄ w     Ja| ;\n g變\"\r#  6M A2 #w  Ξ  2   9 #     D` 9\$ ؅Ŀ; Q 	     >6    v B _ YÑ          7*  K ' | u _KQ +dR+\$G  c/ \$\",
	s ;L S<CmEb! :6  \\ 
j Q \$( S	<!tJ 
  ^rO  *  BT   \n  fab :   \r	r  V  T
Ń  <EԌb)((x @ R t P: \0  \0A  4   \n | 1\0xA\0hA 3 D t  ^ \0.2B  \\ C8/     @ W& \n  /    xE^2 B   ! \n b > %(K MJ % p  R@\" z%  +  D; Qo  \$\$    bMI =(    3J U+  |  \"  `g J!F %̻S ܥ7  |^<`) mz v e D   \$ jEE  TR[ \rRg \n88#C	<  Lj! \$X @ GPЛ c   v  Co	 =   Y a  9'  Әs  Ȇ   -E\r! 4\nț uO I   ,lj ֒     C )[   0   &%< 8:A    quP%A_ d9j|\0 \0(.   %p} S%%  )^ PC|R Kz  \0pA ;7p ꅱO   Pޝ ^ B &\$ od sO `V sCpp  ?   C h\r!   @ & o  0   ] R \"PqC: Jp aL)`\\  I I  hM  +; PgMa )M[i ʽ  \nC l <  ޮp  X伈  P ܧ  B  2 Q     a,\"S Q ~{	  /D  ؆   Q 3 C  CF  b5/   al  -f \n|W  1 8ZHxS\n ݏA u 	  TTԪ%V ` 0&H@ b   P: o\$ _2 * 1  Vf 3^ 5 \" _\rQT  L;C    f%X0 (m '  #K12  H  ђ  ,A>u    e ne ] g+DCMA IKD 뒅 يJ Ey ,  #   ! l\r  ޖ jE ڊ bJ- Ƽ  ]    ʇ&̫n    0 7s \r     P SQM    `+a 톸d N  τ 9a	 I3  <T _ -& Y`  `   :Er  :-	   ζDE     0- 3[&SȦ[9   mĄ  o7 6?A   )  ٔ   J\\2q. U\ni    1)A  Fs      %1  3 0 j O 
!1  M7F g0 Mi     E nԔp6 ߹  Î ´  s 1  d WqLht  D i  wq   ͬzAش{     , v   K    ʖ  \$T   g gA    U  Ws  l    3  ٌ N q & ֜/   
PjV!e )  |   F  X:  '  \n4W X8  Tϯ zb4| a\n";break;case"es":$g=" _ NgF @s2 Χ#x %  pQ8  2   y  b6D lp t0     h4    QY(6 Xk  \nx E̒)t e 	Nd) \n r  b 蹖 2 \0   d3\rF q  n4  U@Q  i3 L&ȭV t2     4& ̆ 1  )L (N\"-  DˌM Q  v U#v Bg    S   x  #W Ўu  @   R < f q Ӹ pr q ߼ n 3t\"O  B 7  (      % vI       U7 {є 9M  	   9 J :  bM
  ;  \"h(- \0 ϭ `@:   0 \n@6/̂  .#R ) ʊ 8 4 	  0 p *\r( 4   C  \$ \\.9 **a Ck쎁B0ʗÎз P  H   P :F[*  *.<   4 1 h .  o   ) Z  H L !    ʢ`޸ ΃| 8n( A 2  :  <   xJ2 4 ;O  P R   j   X T  \r&gD  jD J x  c  3 k[ L
,   L +\"8 x 2\rC  9  sJ TC-  /6  T4  0    4ƈ h0 tx\$	К& B    ^6  x 0  \nуp M  .u ? @   X # * < 3 Cd ̳ik   3 7+.  ҹ ؆ Q R V H 7     R\$  c0 \r : 9   0  b  t   @    3c Q  4 -s  R   n >(   Ak y  
Q         D4   9 Ax^; ti¾ r 3   _\\  (  A P -A ^0  Nע Q  õд 	 NH 1   \n M CJ&L  %PH     4  pAƳ  % r  5     ?=K   OՄJP|\$     ] 6 IC     '!   }  88  2 #\$FIA*3   @dh Qhn   @ y n    FϳI)N  +OzmI 5b 	 Wa %' w l3< ډ)<+i! 2  t#A@\$ <#@    A1 dp r   cv  2bi I #e : `-\r T;  = wC  0    p !  ~ 0%  9E:H  \"0 a  x^ S\nA  b\ny8 \n P6 d8    %MU  :  d*\r M?7    nH ܜV*  ?\$ 6MC u\n!\\b  !T  a   \" H yf3\n< Bi   08 B  `mpo   ht^ Y ȍ  rxS\n t & rG   1m(   @   uF! tO - gp LCc#Q1   7R  ld   ^ cU r\nF  Bb \0 o \0 \" \$d :4   gn )t` IY Ck     C  0 x J e {j ؔUE      ޮ  V  I q x    `+Mf+ &fId j D   JZ 4  ]  N  T    p j&   Ut Q   v GkAYW u)̏Fj HV1 7  %S` 0y`e8 :9UQ)D p6գ\na  U8ǒCX
-p^Q0t    d +ob*2AKR  E ff  \0  fOP  !*  \\Pj De \$ T    S6  ZVul
 dV-U\r  O= 1	\\  Wqz  p*1  W     7 ~";break;case"et":$g="K0   a   5 M C) ~\n  fa F0 M  \ry9 &!  \n2 IIن  cf p( a5  3#t    ΧS  %9     p   N S\$ X\nFC1  l7AGH  \n7  &xT  \n*LP |     j  \n) NfS    9  f\\U}:   Rɼ  4Nғq Uj;F  |   : / II     R  7    a ýa     t  p   Aߚ '#< { Л  ]   a  	  U7 sp  r9Zf C )2 ӤWR  O   c ҽ 	    jx    2 n v)\nZ ގ ~2 ,X  #j*D( 2< p  ,  <1E`P :  Ԡ   88#(  !jD0 `P   # +%  	  JAH#  x   R \"  Z 9D    \$   H2p   \\ \r 2  ( &\r b* 0`P ෎ /  d  7 H 5  *@HKK #  <  S:  \\ 8b	 R  \r, 0
LF B  4 K P  4| B(Z  B\\     ʙRK:n7(  j 7)%d !  : P  7#  X\$	К& B  * h\\- 7  .  y6  H6IJ   Opܹ     Op  \r  ߈  dE  ʲ jR7  26   {7'P\\R\r   7  k< Z 1 l  3 b @ C X Y  3 /jq8 S 2  R  c|6h R    \n D  ҁ b   \0 7%  1 i      4  D4   9 Ax^; rI Ar 3  ^    & A     ^0  +4 n&I< hp   cI    8 1#*j   zUK
  8W 0\\n   o   p  \r ' Oƍ n\nb^ D   H 8    :s\\ /  zӸ  R %O~d  | %   4  
  O Tl\$ 0 7\${C g    &  { Ʊ  vrbY >k   i  )|4 Ci&A̚ R S  x#(P2 \0ɑ!%l%28iՔ  @\$d Ы 0 P 50ؙ= ͠   h\r   5 \r `; \" SD^ F 9 6s i } 8gvb]   1  N        mz4fEL0  3 AG d)  ñi\r   ;rpN  <%    H    <4  iB( ѣ (X I&XRL
 }4 c 1 m  B)	Z   p Z P T  Y e ] Ld I]\$ +V\$.Z B H9.& 4N ^ Àh\0     e% c1     oѣi\naD&\0 h L**Dd       d  +J>k   j M `AU   J  S  -oV  0u1s  J lK   [ IJ\" ¦ڡ :t os  dja\r  5 7f  aK  % ƖB F  7Jv   @ O4  _ 9r! p  JP 0 \$X&     \n1m !%   kG   R֩ũ \n    o a 0L   Z  I >  @FП * \rr  bu¡ Bd n7µQb  ×H B[Xbk ֲ Z 9gU  (;;  #v 4  2  Xu/ 4   B@";break;case"fa":$g=" B    6P텛aT F6  (J.   0Se Sě
aQ\n  \$6 Ma+X !(A      t ^. 2 [\"S  - \\ J   
)Cfh  !(i 2o	D6  \n sRXĨ\0Sm`ۘ  k6 Ѷ m  kv ᶹ6 	 C!Z Q dJɊ X  +<NCiW Q Mb\"    * 5o# d v\\  % ZA   #  g+   >m c   [  P vr  s  \r ZU  s   /  H r   % ) NƓq GXU +)6\r  *  < 7\rcp ;  \0 9Cx   0 C 2   2 a:#c  8AP  	c 2+d\"     %e _! y !m  * Tڤ%Br    9 j     S& %hiT -%   ,:ɤ% @ 5 Qb <̳^ &	 \\ z   \"  7 2  J &Y  [  M k  Ln  3  X n v % ;C     l4 B: ʓ2sC' I    1\n  I  B  i^ \" #  ! HK[>  T        !hH A   DB:  3S  \n @R +    ;    	r됉 C_  C         ~X  qR   L =Oj [2l _& \r \$     |  [\\  	   U < b  0 J  ; Ѱ\$	К& B  
c l<  h 6    -G MT%o \"\r#  6B A@ v   :  2   7cH߮E)  , C   6I)D &  &F
x䴵2 1     Tk. , C@  K  FF  l x  I  < e\" J RB  st   p  .   \\3? ( ]  % V| D  \\ y!  f ^ɜd  I- ╉.K \n @ \0C#6 : h@   k   \0ǯ \$  @4C(  C@ : t   >Ϸ C8^  zjAѯ ^  Aǰ3  ^A [F Y  Ep Qi + 腸  @ʻ ,- |4   Rrt	P 8 d +cL   
 +zwm9 G  S }   ?G    \r ?    Zk  0|  R8\$ `   r  6  gZ!!UH .(V S \"*  B   ! ݱbf   _4D  < (Ck ;   \0bB     C* !   \$: a : \0  9쑁 : A+P J y   lI >4nY   S I \\B V zB / ä\n (#8 N :q l   \n^
{T u   c/ \0Ck .D  ^ \0pA     &g !C-%\r 9.e8w %C> A?0sDr   YaCC uDH  %l @ir  w \$P a  Y F ᭭ U     X yI (w ,      eh ̬ 7\0A S6 Y % 7  ,    L voQ t	\$h<   CJ Cdm  i[?Hq ad^ J|r  9N  }C( {   X Zfh ч   ZE - D:8 %`Z)(L@ Ն   \$8 \\  bIT 1 Fk  y   WZcF x Y ?E ل W  S\n!1֨V)mw\$     R  զ F  <\"cv  اBs0 \n U J    ^QjU   #& l,u l  C˶    Hl^ ^ A!    ;
 y   0 _5 !R uj.§ gI    6  F Z  W  /  O P)* @ 
A·nq  k m!EOc   0 /a#   u< Wq+HGq  6   	;f}I 3 LZ;> %  U  x    U &K  )ݶ g
E ?E^-S ]	.bi d    ̺ TqRV  H D m 0&\$ \n  ( ɆO)64pi1i\$x̞\\F  R\r O  0\n 8~ y%m ]t     & X'i U OY   UM  vKwil   ";break;case"fi":$g="O6N  x  a9L# P \\33`    d7 Ά   i  &H  \$:GNa  l4 e p( u:  &蔲`t:D H b4o A   B  b  v?K      d3\rF q  t< \rL5 *Xk:  +d  nd    j0 I ZA  a\r';e    K jI Nw} G  \r, k2 h    @Ʃ(vå  a  p1I  ݈*mM qza  M C^ m  v   ;  c 㞄凃     P F    K u ҡ  t2£s 1  e ţxo}Z :   L9 - f  S\\5\r Jv) jL0 M  5 nKf ( ږ 3   9    0`   KPR2i  < \r8'   \n\r+ 9  \0 ϱvԧN  +D  #  zd:'L@ 4  *fŠA\0 ,0\rr䨰jj\"  8ޝE L_ #Jl Dp+ 06  		cd   <    0 .   \n  2  P25     SK1X  1   pH    0  S   c &B ;  B ( \$I    h  4 l \n  &-    #K č5  :16j    5 e   \r-0 r5 e  ( ]L[   p\\VU t5WU  KBj7=S 	 ht) `P 8 (\\- ؈ . V~ 	C CR ]p Mr ׳iN=75  Bp wGB   d\0 % ` *H 7  2`  \$  B X ho< : A  ڃL\n\r fL2 
b 79/sE C.  7P D A KFBR 򐏳 ł j ΰ˴Pz (\r   j      I  #vƎ Nѧ .F   O^   s ; ( q  y  |*     r  @  #Jj MC 6 d QH:  .cJٸ   # @ 2   D4(   x   ? 9 X   z0ۨ `^ π 2]#\n  B d m  ^0 ɨ F r       Oj.| %  `  @  4 f  .椐 F A 9 ='   {Oq g    n|    2  N  Q R   1 L7  \$] e4Z%(  ñlC ? F \n_C aM C ) \"     ai j  ޖ  h
  vh} @    9;      GW(- MD  ړPt y3 Z  \n	   6nX P	A	v]! +&8  B Wa 4Ȑ P  (yX/\0 C?  \r=d &p  y .  \"~PL ! 7 f B \\+ A\$ M \$#    h    = Q+     \0C\naH# x  (  f/  i\n4%`    ˹@\"  \n r ]Ɉm. ΅E  j   _   FA 1y\$t P g
 _K8    z h P31   
  q  \n  IJPʖf V5  t O\naP  [(| \n  4GY  t` Ѣ8 [ n  3  E8 !S( h  g >	9 r \$0 *e(  #@  ; d    W! 8P\r,  ^JO̵@+\$ իȢ  f  P\"wbJedgD K.y { v AMY%  xK ) \0 Xlͧ  (! @ \nͻ vT9Q  N\raC
 *!¨S)  e`̅P ;A C0  7 \" m ] Yr cU_l  7&  A҂A ! 0f    gyD&  X p ) M   ߐ  (5 \r  #   \\    Z: b  O15 З ,  Q        H  4 aJ]sō9 <_  @S  kI >  k͊6  \\ աK  r f   w  H@ TG A @ l  2\nJC Kt      ޫ {/l; ܀\\ r|o   @  # G 7   @";break;case"fr":$g=" E 1i  u9 fS   i7\n  \0 %   ( m8 g3I  e  I cI  i 
 D  i6L  İ 22@ sY 2:JeS \ntL M&Ӄ     Ps  Le 
C  f4    ( i   Ɠ<B \n  LgSt g M CL 7 j  ? 7Y3   :N  xI Na;OB  '  ,f  &Bu  L K      ^ \rf Έ    9 g!uz c7     '   z\\ή     k 
 n  M<    3 0    3  P 퍏 *  X 7      P 0  rP2\r T    B   p ;  #D2  NՎ \$   ;	
 C( 2#K       +   \0P 4&\\£   8)Qj  C '\r h ʣ   D 2 B 4ˀP    윲ɬI  N   2ɦ ;'\" dK +@Qp * \0S  1\nG20#   S  J    M32 䡰   , H 2cc&    \r :!-gZ   4 P[  xH    2  e   d?/  r\n       )[O P Vُ º\" m d%2\nc  ݁B  a Z ,(ƃ,}t7I 3 	  ɫ v\0Ʌ  g  xB 8YS   H (w  0  @ 	 ht) `P 5 h  cl0   &\r R   *,  Z+ .G   v    RI     F U V 0  z §B  Ѣ% F \r 7 \n  (  XT #  + 6շ Tͣ S G    b;~ H >ۻPET {  E  c   3w   P  i   4 6đ #6  \"8@   j  o  H    z42 0z\r\r  9 Ax^;  p    \\3  P_dw0^      x l   !E  mST    KiTĂ ] G 7 PkT  '     Ru^2ay/- G  ^  z  t  Cs j(  2   pU¥X   ɉ=\r   ) I  R\$ ʆ e b     ~ ٩F(9   J ;  ;  @ \0rvʌ2 8p@  k 9 c<LCy}31UK  G	 !FT     Δ#jfd  5Rr  FeI #  BB H\np:  \\ P b c !\rĔ fظ >\r mrN   !'  @XPPd]'AQ1R BI ?d  F x  -RH  BnM !|y \\ F >B(T\r᭥\0 F<     C 5p  3ҲK i ! V   - E !   @S y)2p  @ A8\"*+ A 3 Һ Wi  sRj C\r  T eC zk  `  y  l\$   z- :E H \0 ¡>,m 3 &HRX  Mb 2\"  j a=' B3  \$H=      Qҳrh  C   \0 ˙ H  h a   F    Ɂ ԑ  L Q	    ` \" 3RE)} )L\nM5 & &ЄB`'U      \$ =    *aZ   j ielM      D' 'L Y *l  OlA 7{2 X ڴ l6  fǉ C,A  4
F_  + nUn !  1       o\r&  6 - Q  q  \0 0-  Y P alݰ 䴆 6\"  rLV v 1  }\\ x \$  4U#?I<RrW@ Ht   W  6} Tv  嶀ҝ?&\$  PE S F   + B  _   ऀ  Xlk E 4   V
֔ 2&   MFp v  la  ߕ     O  2   \nR5f] i  KΎY =  2a͂   3) ЭT\r t B  \" ";break;case"gl":$g="E9 j  g:    P \\33AAD y @ T   l2 \r&    a9\r 1  h2 aB Q<A'6 XkY x  ̒l c\n NF I  d  1\0  B M  	   h, @\nFC1  l7AF#  \n7  4u &e7B\rƃ b7 f S%6P\n\$  ף   ]E FS   ' M\" c r5z;d jQ 0 ·[   (  p %  \n#   	ˇ) A` Y  '7T8N6 Bi R  hGcK  z& Q\n rǓ;  T *  u Z \n9M =Ӓ 4  肎  K  9   Ț\n
 X0 А 䎬\n k ҲCI Y J 欥 r  * 4    0 m  4 pꆖ  {Z   \\. \r/   \r R8?i: \r
 ~!;	D \nC* 
( \$    V  6    0 \0Q!  X   @1  *  JD7  D S   S \"<   #   Q p  1ₔ    ;   A#\r I#p    @1-(V   8# R 7A j        Ǣ  \r  3\0  jc   sTG^\nc*Ajȫ *\" -T 2 B
;U<  <C5X CP[+Z ذ 1  Vuu 6\r  \0  T( 3 @P \$ Bh \nb 2 x 6   Í \" l sR* 8wt ( B %IM  D nb D +B M  ϲ n O  k  SR 2  ^    \"_  
? r   1} j N \$* L * r 7 X ':     Z k:I n5Pð V > % R .   lET 0 Ui   >P  
R#8Aul V    R0 C63   :    x مѧ:  #8^    \" xDw    }F   ;q, 7k ,'\n - <    K}  l H  ; 5A7  2yӨ\\t  O  }o_  c j2v wr  s C  @DU  I\$     P '¥U b OBS     ׋* C )k    ! \$  #Tc  &\0 ؼ, R  u˔  \r1 99O   g A `C  	 3= %; v   	 , 3W D Z0 ME    P	@    #((*  2   ;#āU:S 	7%a    ;pC \nĂ  2)G]     Q: 86 \\  iƉ  A   Z \$1=  xkl )      Pf U\0  	Toĩ  J  m3  Ň  S )^I	*	  V9\$G l  GބIHfB JW* J    {  | fn INZ 14BV k \\   r    / 2cF  £Wm  
s tL  K/   H Փ 4   Gs6l HvCm`   z'  P D  0 
 JE%  \0 Bcݡǈ  rN Z L  #H u  &.   A&  HEPm :   A4	  ƔZ Hj  nD ș4   ڬK  E V\\@TK ~V  Ճf m & \n  q 1 #H 	)   ԴPV 9+   : Tn ]%  Ƃ\0 0- 5W  aIo8u Қ  jKɠAQh   s 	d+t  b@U[ K   =DR K6 5   q = uA p   T   A  WIE:ŐX     %\$ P  J ѝ <GH(P#~f AKp *5A *    ӯ   - h \r   #y  XEb ; E kd7  w K~o 5 ]  69  ";break;case"he":$g=" J5 \rt  U@   a  k   ( ff P        <= R  \rt ]S F Rd ~ k T-t ^q   ` z \0 2nI& A -yZV\r%  S  `(`1ƃQ  p9  '    K &cu4   Q      K* u\r  u I Ќ4  MH㖩|   Bjs   =5  .  -   uF }  D 3 ~G=  `1: F 9 k  )\\ 
  N5      % ( n5   sp  r9 B Q t0  '3(  o2    d p8x  Y    \"O  {J !\ryR   i&   J   \nҔ '*    *   -  ӯH v &j \n A\n7t  .
|  Ģ6 ' \\h -,J k (;   .   ! R   c 1) !+h   ,V % 2֝  # I4 ' \rb k  z{	1     40  \$  M\n6 A b    nk T l9-   ð)      D  妨  # ht   I    d 
5  ;-r ^    \"	 <   *TRlw   Z /b@ 	 ht) `P <ۃȺ  hZ2  F A(    H  j <N  x^O  y    2 Ø 7 0(  k  :\r {& ( \" \\ MpJV    z MԺk%i >   m֝  Z[e  b   LX Xp| b 5\n6J1  N)z  Ӣk      6 #s    2_J a  \r  3   :    xﷅږ  <o  { {    A `  d x !    :p g  fH> 3 -됓 N3_*6h:v sN f   Ųl Fնmۆ媻 v o        M +:'e  	 _   
   r O { Ѱר S ]  0P:     4= Ǿ \0 4  `@1=   3<Ch ?#5   cg 9 `   `o U   =   \0 ؃#\0o  6 4]3      \n (\0PR I R X! F  ڨg !  \0 C        | q \r  @    # ; \$       J-  O  ?  ? p Cj    3 a  2  C! 5*1 L   Yb\\ c (Z PS)i*p  %   ԏr!   fMVI\$E, %  d hrlĽ@ZZ   q  bzKT o'iY   @5 C D\\  i>I I8   īƠxS\n d Rb% 3 a%Ld ;՛Rxk T H l 0i `& &gU pW-@#HZI  M  \$d  ) c;   `   c q\$ vr`  F  y  i A -  v (  Ľ  `sIK O   OS T#ĵ)N m   Iid   TM!k3  b,A0- \n D s:    TE  #FQDv(  ) d z\\  	\\  n  ,% 0 9 \"   -|F%< @K jT \$r   G D~]T V dC      I eFI  -   ycG }NN   X dK i  z  H  Tz   Uy   rf -	!  6\$@";break;case"hu":$g="B4     e7   P \\33\r 5	  d8NF0Q8 m C|  e6kiL   0  CT \\\n Č' LMBl4 fj MRr2 X)\no9  D    :OF \\ @\nFC1  l7AL5   \n L  Lt n1 eJ  7)  F ) \n!aOL5   x  L sT  V \r *DAq2Q Ǚ d u'c-L  8 'cI '   Χ!  !4Pd& nM J 6 A    p <W>do6N    \n   \"a } c1 =]  \n*J Un\\t (; 1 (6B  5  x 73  7 I   8  Z 7* 9 c    ;  \"n    ̘ R   XҬ L 玊zd \r 謫j   mc #%\rTJ  e ^        D <cH α
 ( - C \$ M #  *  ; 9ʻF   @ ޠq  Fr 6H   \$`P  0 K *モ k  C @9\"   M\rI\n :! \"  HKQU%MTT S   PH  iZ  P   t}RP CC   b \r˛  pb P   X    % o   ;  Z6 - ?  S `  !  ؟4u  6 }N   r \rw    ] p6   ~      
~_ \06    \$ C  \r   < Ⱥ\r p  #  6\$    6 `A3 v`֩    ²7cHߠ& b  IK 5KZ7  2  0 WM G  {_p4a\0   c0  : 9   < = . ]D6 㪲aK\0 W \\ Q Zn*5P  I p@  + 5  z   a b4)0z\r  8a ^  h]; T z    \r xDw-   |  cX  !JSl5K   Σ )K  !t5K   F\r =Uz8\r*DDs OC  ?S    _  Awi w  ~ Z )  \$   m `tx  #4E  :0   4 J6\r %吂 P\$  ; VB9r* d  Ja\r   6L h` ; Tr H r 0 *   \nl͡ 6  ېD=3G\0֝ \$ 9! 0   M qw/.  d  a2}t b  L /lQ 7L H\n Fs \n\nb+d|  6 B ˒ f  Cm\nUeD !b``w.N,͔ (AI sC  \n  4kK NC   Â A\r! Ҟ  \nO   8'# e @C\naH#\0   ! %B \0    { -3 P 5'  dJѝQ)H7  Q   	  7 &g    p DCɧ - .B 8E 8 S\nR 2
\$Qؑ   , g\0 ! R  b9\"   G  ¡0O\0 . V ! qK's Q A z@ ;   Ո ȃ  fN  i   X   b ` )  L   6  #H VL  n\nP \$WA n  <-  ,bD沣 PU bL涞 ci 7^  7 r  \r{S    ⒍X|(    P | ]\r!  C cMCe ,R~f ɸF \$I'    B T  3W3?pg J  3 {\$  l ,\n իp      \r   G \"\$  '~   3  쾥c E M E Ҕ  ` a E0 a  [j\rzQ  z#A84   Eg1 A  Q &, %q/j P    C}Hb y< m  ; \0007㰯T(    S@h դ;x  \$o1>&=fZ %tU  J@<[ m H\"  ^2cuxkX   B w\rᬵ ;X  9 ";break;case"id":$g="A7\"Ʉ i7 BQp   9     A8N i  g:   @  e9 '1p( e9 NRiD  0   I *70#d @%9    L @t A P)l `1ƃQ  p9  3||+6bU t0 ͒Ҝ  f) Nf      S+Դ o: \r  @n7  #I  l2      :c    >㘺M  p*   4Sq     7hA ]  l 7   c'      ' D \$  H 4 U7  z  o9KH    d7    x   Ng3  Ȗ C  \$s  **J   H 5 mܽ  b\\  Ϫ  ˠ  , R<Ҏ    \0Ε\"I O A\0 A r BS   8 7      ڠ &#BZ\"  H  B M9 \n & c  K - Cjr B( !\$ɐꅌ 4  )  A b     Bq&    5   ۯκ  h(  H     6O[)    L	 
V4 Mh R5Sb!J   ůcbv   jZ \"@t&  Ц) B  a \" Z6  h 2R
JJ 9 \" ӱ @@   \n 靬2      X̸@P  L; 1 x 3-#pʺ%m %  d \r   	
 1 i  3S \0 7  @ )  \$h@A  hڄ6 (P9 *ZQX2 \0 ~ Ih ż)  l:  @     9b Ȋ%\0x     C@ : t 㾤(y P=8^   , xDk  z }|B XĽb  @  pÈ   B  O  l  H2    iV  j  g(F   cv p  ,) ճ\r  mV 4\r l @ x  `h   KI\nF K5&  3e C0 { ;   N %   (W>   / Ya   '\$    \0 K     ,!qwR:  L _3 \n@  'Rm< 'AB \nJyl0\$ ! U  Y  2fT˙  }Ðt&      û x\$  R  	ce B3 ~I[~I ; @ IX giDЧ ' N  `   0  4I N X)    > 
  ( a    PP P 91!U  KI      P\r!  !RZHxy1 6 P G Q & X8 R`F 1 \r  ȳ jG    7xtzˀ \n<) B J\n(l1\$      Qs Z   '	 ;R      0i\$	\n \r  3 <  \$ Q	 2 ,@ 0T~  6   d \"
嫦T es(VI4ŝG 5  țD S  Ғ ֜D   ӈ_\n-c fpIp Q II   V Hc\"Ŗ_ d  u.    Z ,NB0эP  h8   &   L & X   z@PGn      i  \\ a <  r I\n\nJ^v\0  ΁ @Ѵɨ\"   <(% - LL%\r \\0  9 PL\r  6   {* [    V  4  )    Պ  %  )p  \\%)  = B   }0  H EEL - '^   R#`";break;case"it":$g="S4 Χ#x %   ( a9@L& )  o    l2 \r  p \"u9  1qp( a  b 㙦I!6 NsY f7  Xj \0  B  c   H 2 NgC, Z0  cA  n8   S|\\o   &  N &(܂ZM7 \r1  I b2 M  s: \$Ɠ9 ZY7 D 	 C#\"'j	      !   4Nz
  S    fʠ 1     c0   x-T E%        \n\" &V  3  Nw⩸ #; pPC     Τ&C~~Ft h    ts;      #Cb     l7\r*(椩j\n  4 Q P%    \r(*\r#  # Cv   `N:    :    M пN \\) P 2  . c ʍ\r  Ҷ )J :H Z\" H    0Р  #  1B*ݯ 2n \r RJ80I  / Br ;# ʙ  ( Cʨ     C \0  A j        cp : B|  %ΜT  S[_9S   ( ^ 	 ;<:, 2    73   2ԃ\n>-u  O  qR  쎪% \n4   P \$ Bh \nb 2 x 6    o \" +5M =PL SZ   Ш-  x w  <@  I * 469@S  \"	 3Δ \n L  \"   ތMCˎ c3   2 Ac@9cC
 ׉, 6   P9 / 	  dr:7  r         ՌךP ɘMc M         !  D4U    xﳅ V   @   {ض7i ^ ۝ 7  ^0 ؂w )M 90 /\"Ȑ䚦) 7  ҩ   ܳa   ֹ l Ųl FԵ v 7n +v 	#h N   м   5 /  0 h Z&p <   0ðI\n揥m2 \r !\0 1 (  2 i# ); #7.   Bds0A CP H !n}/ p    ze93 #  L1;?  W  IHP	@        | @b(\$ ! D  a 3A  <   t5f  JúCh e!+ VL!; 8\$  İ  X?O Ԇ7  ;`O &  p  oy ! 0  ` I    @ 10\r    `ҁr  y  tcpP0Dtʖ    	AE\$   \"LS  ! U;  x   # 6 ֞  M\$    3Q  h  \"DF A\0P	 L*F EC y>)E Ts&)	VCDI! 0    <^\$     Ğ` \naD& ,0T  1; (r  f  L91\$   q:M@ 9C < eE  7I tS  ^'   G! \$a  N   % \$   '  _ :% U D \0\n  3 \\  !   x [d3 jᴼ    hFA       T  /Cr^  -O   Nc zK1   B   	΂  DLQ %  \0  ^ 0yZ J&  #  0 Ҵ# v  \"-t  Sb L \r5/ *L 20 \$3 \r Z DSKYBe   =+ b B  ~0\\ P 0 S LX&.,     \"C!̌ OS    \rGV 
  Cv      =~& V ";break;case"ja":$g=" W' \nc   / ɘ2-޼O   ᙘ@ S  N4UƂP ԑ \\}%QGq B\r[^G0e<	 &  0S 8 r &    #A PKY}t   Q \$  I +ܪ Õ8  B0  <   h5\r  S R 9P : aKI  T\n\n>  Ygn4\n T:Shi 1zR  xL&   g` ɼ  4N Q   8 'cI  g2   My  d0 5 CA tt0    S ~   9     s  =  O \\   
    t\\  m  t T  BЪOsW  :QP\n p   p@2 C  99 #  # X2\r  Z7  \0  \\28B#    bB   > h1\\se	 ^ 1R e Lr?h1F  zP   B*   * ;@  1.  %[  ,;L      )K  2 Aɂ\0M  Rr  ZzJ zK  12 #    eR   iYD# |έN( \\# R8    U8NOYs  I%  `  tr A   ~A , [   ( sD   % G'u) X  ME 9^  EJt ) M  txN A       EH  d ! b     !8s   ] g1G       [^ \" E   t %  E?4 rU % \\r    ]/ J	X g1n]   0 I 2  \$ 6 AҘ Ie y~  Mz   y},EҔ =   u1  0 
cΤ<  p 6   ȪU7 ?V  3  I!  X  Ö 2  9 #~ P5 9p     4 \0 95 x 3\r H 2  ]sm uP    7  h 7!\0빎  ܎c0 6` 3 C Xݎ\\  3 <PA      P9 ;řɐ\\  *50t3l  7 \0 2w|X ׌{  2A\0x0    C@ : t   >  X   p_\nm#    >  px
 >q   nG\n h pO    H   5ȫ HXV  : 3  R  H &  ۑ\0sDH    \\\"%{π4>'   C }  ;      r~   7   /ED  \r m!      o[  9  kJAiņ   h    b|\"O2 YL  xS\n S 5  1     u     Z[  3B 4 ]2tΡ : \r\"N! \r 9  9 a 0   s 2F  #  A  ,   \0 *1Fh   rC AQ!  [ ( [ۓ  \$ 		VL 4a\r 8 
Mٯ6& ڛpʷP r   !t3+]Pw  2A8Gnn \0sD ۠c ppw   0 C  a 2       F 1   h Sjt \n  F -xA(  c  5  GRED  W&  9Dx    U P B bd s'BL:  Q  	 P 	0 D A,  L!E2H  ,\\d\r+t ! \$  7N8 Sr C2\n\r J#      BR v ps O\naP 5 b A&    Dr[ 3  >Sp UDXBt 	 ` E E Q *jk 5 \$_k  * f   To S pTF \0 B` ӔG   PpU   t<  rCH ՠ  V  BHr   H  d  ]i-H &Š ʎ  2\"TV  BHsc1   v ޛ ~/p\nm 6  Ckl   i[[ e A 39  s5 \r 9 'lB F  =   c l A 'U K,W @ 8_  0%b   	 612   :   ,Pt aDs p 2H )b9 )& FDɐ >   B gܗ ~: 1  hUf\\ϚH0 =g  \" H.	 ?    Q Ā  q   Xx   p  LK ʥ# , %o  Y sc  , v^K *Z   ;b n   ( X  ";break;case"ka":$g=" A  	n\0  %`	 j     ᙘ@s@  1   # 		 ( 0  \0   T0  V     4  ]A     C% P jX P    \n9  =A ` h Js!O   ­A G 	 , I#   	i tA g \0P b2  a  s@U\\) ] 'V@ h] ' I  .%  ڳ  :Bă    UM@T  z ƕ duS *w    y  yO  d (  OƐNo < h t 2>\\r  ֥    ; 7HP< 6 % I  m s wi\\ :   \r P   3ZH>   { A  :   P\"9 jt >   M s  < .ΚJ  l  *-;.   J  AJK     Z  m O1K  ӿ  2m p    vK  ^  (  .  䯴 O!F  L  ڪ  R   k  j A   /9+ e
  | # w/\n❓ K +  !L  n= , J\0 ͭu4A    ݥN:<  Y . \n J M xݯ Γ  , H 0 0     Եm( V /V  wY  <X 5 QU: K =@k; Y Od@ Gu K M̬  C\"K  -?4]   pH A   V M ' 6͐ť Y   %E#  P 6  I   ?; m r  ֽ  ď 4\$  T ob !Ҁ '0 f [ 傻  4  HTB ,   ֹ Ӊ  >    r\0 JO       Z   * R  7[H  dm K  T    W-      ?I<Ī˓ ө 86  ل ډj  > 5  M  | u M  Z   *\\  w䊩_ Eo )n ; _^  5  ֹ Yꭢ  
 Z d	z  Uy  F B9 = n> r ǍR %  4   PP  8ύ0#  4  ( *     k ɂ  3Zuc XG<     9 \$@ e     s @  x<
 
 ~    xe\r  2  C i     ԩ #  )S.xa  |ݸ  l˱ )/]    S #     S yH1[@B Z S R  <r i  D  = +   Pz  p	3r<  D\r  F	 X/`      	a<) a < HT +E~7   MC  K    * }M + w,    : Ĥ   + w   7 ꧉) 7
| ɕ*   F\$υJĨ\n z '%:! e 둕  ۪7u ➋o5^-Ǹ a e  :S L77e&	' R  p 5* \\q RQp  X Ǿ     q ,3 g< 
\n-   \0  p | uw  ',5=   ;T  \\StkQz QĜ뚗C6Vk (K! mB <  
i R /)Qe LV}' :    t^T6  9 z ݢ @R   /I6  L ` )zGvIQR \\   Nds !Oc\rQ '  ,  ֣  4  r  G Kp  Jo w :V w  s4 .j  ] | , ~   ؙ Tt    0'  ! ~    Y q  |  >x  ^ \r1?\n<) I @Y Ʃ S WP  j     ̧ q(  hʎ  Z c   v ߛ TUV℧%b Rg% ʥw z  r 
@w  9  KFN; n *  i[  we  D    g] %  }su  KSnG+    - :cN .  %   Y L   MT   RI xB   \" f = e  3   3 7lI  H d RPn46  I   A a \nʘp    Td p סv}WExSp * 84  Ժĩe Q    s<q  6 v  9x M/ oR ` ӌ  65 ]zy I L S }   SP;  5L  p͝I Ve[){s Q' Z;\"	<  e N H   0 , da
  zM  Պ J  /    dGm*   }FYJ F q    l  #C4 y \\2   d:]  d%\0     >m   c }  & 7 =\0  Ϟ   l7j 2";break;case"ko":$g=" E  dH ڕL@    ؊Z  h R ?	E 30 شD   c :  !# t+ B u Ӑd  < LJ    N\$ H  iBvr Z  2X \\,S \n % ɖ  \n ؞VA *zc *  D   0  cA  n8  k # -^O\"\$  S 6 u  \$-ah \\%+S L Av   :G\n ^ в(&Mؗ  -V *v   ֲ\$ O-F +N R 6u-  t Q    }K 槔 'Rπ     l q#Ԩ 9 N   Ӥ# d  `  'cI ϟV 	 *[6   a M P 7\rcp ;  \0 9Cx䠈  0 C 2   2 a:  8 H8CC  	  2J ʜBv  hLdxR   @ \0  n)0 * #L eyp 0.CXu   <H4 \r\r A\0 < \nDj    /q֫ < u  z 8jrL R X,S   ǅQvu 	 \\    :Ž'Y(J !a\0 eL  Ӛ u  YdD  E TjMH	 Z Ev   % MŠ i U/1NF&%\$    1`   O: PP!hH    Y9  EBbP9d  P [ J  b 0 !@v d  T    Y   vHgY< ?I  Wl \$j   ߥ    u|Iͫ ~d 2 eJ    XM Ptu   t  \"  \" Z6  h 2/M wKr=y^  E T \"\r# 06C  A	A v   :  2   7cH߰(5 R ^ ` 90 Y J Z G M[ v  e9 5Q*  d*\r x@6 #p  \0 1 q\0 3 `@6\r ; 9   Ō#8   &)þ   aN˾ { A :bꖨ>  2` 4q#\\B3j     6  :1 {     \r  3   :    x      p    |=    A  
> 8x
 >(- ͈Rk  kH . ۱@<  +   ;I ,   4ד\n,h    K F/U뽗  ^  |o  w   rϹ ?v כ P   mk    l  (t\r d G Z\r(    r     C  \0H     *  4l선  8C l` ;    L    (  Cf  ǹF   sH6> \$  N @ 1¨ Clh # j] \n (dfs AT& :  r  i~+e| B<Yұ m Ǘ   0pA  5\0 VJ)A   D \$ s hGY0  *!z  9J b Z\r   E	   4 0  ; K   ^0e byB uS\nA e  MО%  	 H*  ^d   6  4(    \"   &e  0  LiY8h) Qx *     fy R< \n   >PBI! :  ҲQ%k Vz\" C  D   ד  A   ! /5 d (!@' 0 y  R  aZ a \"    n   ) <   p_Mp \"     (   D   *   \" \0 )  A s) *\n~;D3 ! V ZK F   7  %  y     1m	 T Б	U|  \0?' 2 zf.3fv  X  %  #( ^ ( h\r͕') 1biq    Z W  Xlu z    ^ v 5fd8x C3  e#G 8^2\$   * @ 
A Uz    ,	 7N \n &L  5   ;    &   & N)	   D  - M d͙  nĕ  H .qH: I ; ua S 2CS0f Y  #D  Ę e{\0 l,    Lx  (    O     \nu    8ʺ
5     o
 z  P ū/BǱ   - # -c CddO6     ź  P2& o asmU*a \0";break;case"lt":$g="T4  FH %   ( e8NǓY @ W ̦á @f \r  Q4 k9 M a   Ō  ! ^-	Nd)!Ba    S9 lt:  F  0  cA  n8  U
i0   #I  n P! D @l2    Kg\$)L =&:\nb+ u    l F0j   o: \r#(  8Yƛ   /:E  
  @t4M   HI  'S9   P춛h  b&Nq   | J  PV u  o   ^<k4 9`  \$ g, #H( ,1XI 3& U7  sp  r9X C	 X 2 k> 6 cF8,c @  c  # :   Lͮ.X@  0Xض# r Y # z   \"  *ZH* C     д#R Ӎ(  ) h\"  <   \r  b	     2 C+    \n 5 Hh 2  l  )ht 2  :   H :  Rd   p K  5 +\"\\F  l -B  8? )|7  h 4 3[   \nB;% D G, Z	 i{0  PJ2K  5J  %SRTâ , ˁA b   x  *      : S 4  (  T ȔS@P :<s  \"  tP1   ˓  U4   FἮu  5\$ I py.ׅ균 	}_   0    ƁK  d @t&  Ц) B  \" Z6  h 2Z Į    *   X D   -\rk* fM p2 
 ܔ   H) lZ# K  ̨ 3 b 2 o  4 T 3  ދ%s A6X  ώc0 6- z͟  8 < B \r  Pڳ   P9 )  b i{  ; *7)(b 2  | *2o ^3fit #&  [ Ǡ ##   @    D4   9 Ax^; p  jc \\   z   B;   }⿳0x !  5rA[ )IR U  bSo]|D, Ì f5\$i-%   t   | [ K% u݇e v     w   6xϚ\0ny\$   
 q =  jA l     } 	q MF  \"  XySF d   !S   *C >   6  e` rs /*@    l     H x      bR  g BX 9maA   \\b2ɐ! .   ߅	u \0  eDH   A(P ͚,f  zAh\$   .  a\"    c   1\"-  EW   }[ 5  %H Hc\r\0   w` L  2  ه6    e; l! 0   -      q   D7\"K J]esA   Y\$\n   /BVJ -%  4 EXj;E   \$vv 6| r s  ӠI!a  j \$y.*    C  AA    9\0]< >   Kh j   \$ Aӗ h O\naR2  cA\0S  s  If 'D  5    Jߟ   P  +  a F W ä*CD  O h}M\"wm R ZRBa3 TͰ  #  T  #t7B mM\\  #J &.E  %  ȉ(   WeB   \rk\". 9^ z S  })  QԮ   vbU% 1  @-  \n ia  V e	 R D    = r    'B T  3GFMN \$ 5 鑢8Sy h x \\b:   Gw4   \$H aK      \\
 {Ė   K l\rI  ڀ S y+ E   Hqc-   S _M   %p6 ̅|ʾʴ͹,RO d  (&   d  ,8Vz  K UA \r Y l y M  .+ _ M Uؾ͝ 6a z<ĉ  J+*     (V! )   ļ   .  d 2d_ t8 ";break;case"ms":$g="A7\"   t4  BQp   9   S	 @n0 Mb4d  3 d& p( =G# i  s4 N    n3    0r5    h	Nd))W F  SQ  %   h5\r  Q  s7 Pca T4  f \$RH\n*   (1  A7[ 0!  i9 `J  Xe6  鱤@k2 ! )  Bɝ/   Bk4   C% A 4 Js. g  @  	 œ  oF 6 sB       e9NyCJ|y `J#h( G uH > T k7      r  \"    :7 Nqs|[ 8z,  c     *  < ⌤h   7   ) Z   \"  íBR|     3  P 7  z 0  Z  % 
   
p    \n    ,X 0 P   A  #BJ\" c \\'7  E % a 6\"  7 .J Ls*   \n 	.zh  X .x    I % A b    Br'q 0  Ц 2`P  H z (\r+k \"  { \"   2 sCz8\r# oM& a; ʏ  zt4  `   \rd 	@t&  Ц) B  i \" (6    Tt  B# \r   =  01\\ K t  (  ɂ Ĥ  `  Cd?# (  '#x 3- pʒ  LS#/]     K   #r  1 L v6bS27 ')\nF\"\n  /R D (  k 3    ,Ӊ  \n .  J*:	   \nC1c l q,   2gxP c  7 sD    9 0z\r  8a ^   \\ k. \\   z|  J*4 !xDjC#    x 6O -^      ba S 62
 ڒ˕ e  c l  Xr 0spA  >ӵ ~  5;   \r   ^ (D   0 q x@1 wp@дz  V#c\0 6Cz̜(O a S~ !3    1 
H@; ( {  {8  f9 Ȉ P   s ԏ  R  Ht)H  8  C lE 6/  \\   |    \"BnH\n \0PR J -     U\n : 
 0A,'   :@ ;'       \"!C\" w\"       Hc) 3 ֆ    'I    O \0C\naH#\$  TM N   Ѓ b ͊7(ЌǣG)  eK\0 ,   KF =   N\nt9 ` 4@ɹ   9 G m YV  -  y  n\$: . ^ U7f   РTu    \0K  P  鏚!   Þ    1L  ȡ#h * BdB'\$  EK3L F\n  H =  J  T dj 'd ؛Aɤ W `䚃UA   D D  kӕ	r \rU E   la   6;\rQF2 `  Ʋ@   3 o bh  )fF T*`Z	-0Ȓ       2\n `#Xk  =M   u:&\$(z 	 y Z5 gRp޻b{5NrS3 Jc( zI,   @o(  3 J|  t`b I \" f `:1 \\T \"   TIm  K \rPNE( s_ 5& ]  R kN  \"% ʪ T ";break;case"nl":$g="W2 N       ) ~\n  fa O7M s)  j5 FS   n2 X!  o0   p( a<M Sl  e 2 t I&   #y  +Nb)̅5!Q  q ; 9  `1ƃQ  p9 &pQ  i3 M `(  ɤf˔ Y; M`    @ ߰
   \n, ঃ	 Xn7 s     4'S   ,:*R 	  5' t)<_u       FĜ      '5    >2  v t+CN  6D Ͼ  G#  U7  ~	ʘr  ({S	 X2' @  m`  c  9  Ț Oc .N  c  ( j  *    %\n2J c 2D b  O[چJPʙ   a hl8:# H \$ #\"   :   : 0 1p@ ,	 ,' NK   j    ܠ   X  3;  \rш 4 C k	G  0  P 0 c@   P 7M   \rH  7LC` 	   ; )\\  # 4 EO  ̎ A j   X B ~宮 ¾ pBȫ23 # B] \"  l     0 9#  5(TS 9!K Q M ᡣ ę& \nSn M2  \\V j7 P \$ Bh \nb 2 H  cV5
   8    aWn`  6  J. ~\" *      \0ұF\"b>  #` ;3(+  \r 0̏/i     P 4  K̦ P <    1 i  3 `A6/C     *( Ҩ    ꕅ R    6   #x3  c8  c6*: 38@     9:#@4  \0x p  T   Ax^; rc ! r 3  _\0:   A 0    ^0  0 q\nXٸ |  
 < 僂 2  5 l o 8 WS    8J  ] p	 qW; ۪   |      ? J |\$  p 1\rçE bsb7 -Vz0   D  ɘ h zO #eP
 \$\"G 0T    @x !F~ ɷ \$ JCf%g F  SL(  ؒ   ,h r,5n K  c y2   P \n (<f<IR =   pPUZ \ne   # O  4 @  p \n  @p0   `R *%L 4 ] &ua 85 D  !)  @  𠠑  A  Sp   x)   O [ Z : S A 'n   l   6' '(    \$h  ? @  AM蔚  (L  o  -  RlM .!ԣ \0 S	 tr =P K  &6h( P T   F2TK\nYM  \\5 &  %K # Y C  W\0r \$l 1  ރr= 9 G 1,C5     E   Q	  ) 0 u 0T  l  T   aa!  J 5:Oj8ͤ\$ uG P i    O A5TL    OH  \\ e  J^i	5l 6    8A \"  \$L T 9(˄j\nN ,j T*`Z{zM)   + 1b  ErqAu32 \r!* Y\" +HQ  >HL G  0 \\sk \r! < _%   \nDvz bF   7  , Ec P\"b   ʈu #  5` L v?  Zrbw PPjIL   H  .I U  \nɑa  ~  \"   +Ra}   C@PEx 꿨j ̊ !g\no    a # ()\\c RQS  (  ";break;case"no":$g="E9 Q  k5 NC P \\33AAD    eA \"a  t     l  \\ u6  x  A%   k    l9 !B)̅)#I̦  Zi ¨q , @\nFC1  l7AGCy o9L q  \n\$      ?6B %#)  \n̳h Z r  &K ( 6 nW  mj4` q   e> 䶁\rKM7' *\\^ w6^MҒa  >mv >  t  4 	    j   	 
L  w;i  y `N -1 B9{ Sq  o; !G+D  a:] у! ˢ  gY  8#Ø  H ֍ R>O   6Lb ͨ    ) 2,  \"   8       	ɀ  =  @ CH צּL 	  ;!N 2   \n 8 6/˓ 69k[B  C\"9 C{f/ 2  3ą-   \n  .|Ѕ2(   J '.#   ` !, 1O 5 R.4 A l   @,\nv \r  ΍ ʀ:0/ \0) lS 2 BC\$2A+     z> P*\r) W    0 ML  ְZ Ԏ u>  J@  c% E4 H 	 ht) `P  \" Ms  0 `V( D     1   h{^ ( \r 4 \r7*  HF2     	   
#z0 C0 V  \n : d :   7   c   c0 6# Z 9     +c\n O jْ @  \"  : M ؏(C   C\$   \0 I ɡ\" r1 q  !\0П  D4&À  xﻅ ^  -8^   ڙ AxDpO   |  d   d bv89 hA   H  x@88ct k j  ZMC   򼽚mVٷn  n   o    _ 7p (|\$     hW Bz  k7ܪ  c8ԝ lc 82J]   ajt\\W K ;GMX R  \$    3 |\" ɢ# 9= ^ CfZd:  `̙ ug \0: d ØaE 1 W Ks.%̦2@ ِ    E	  ֯  P	@ hP   ((      Yss t!  . S2e l4 u _] 4E@ \"lOA}EH  &  /g T    @n  p ChA  @(.Faklu\$   oBS\nA   S  O   ?0 L  #1-   Kɉ >&Ē   J`od 9 6R  
R d   \"X F T7    ` T'  : s  a1k    ҁA  Q\02 i     w H(k  E٥  @f  073  P [ '  e 3 QAhkKD 3 S ~' N& 3AY # x  \"H]& \naD& L !;i P(#3z^j |% `E >T  R1eС 3 H \"    9
ً_t   JTz~  \" V}:(o   R la    iˣ / d  z6  I }Ɲ #   T ᆆP yC| 	  : 3FM 0 5   : ָK ERS 0|M  Aԛ  ! b\\' y, qK  <    \"
M  #l  
\n}\ri  A   J J Q&    1 	     (X    3  pgT-(&p KU  . QʻTFM| : P   o  &H 2 ";break;case"pl":$g="C=D )  eb   )  e7 BQp   9   s     \r&    yb      ob \$Gs( M0  g i  n0 ! Sa ` b! 29) V%9   	 Y 4   I  0  cA  n8   X1 b2    i <\n!Gj C\r  6\" 'C  D7 8k  @r2юFF  6 Վ   Z B  . j4   U  i '\n   v7v;=  SF7& A < ؉    r   Z  p  k'  z\n* κ\0Q+ 5Ə&(y   7     r7   C\r  0 c+D7  ` :#     \09   ȩ { <e  m( 2  Z  Nx  ! t*\n    -򴇫 P ȠϢ *#  j3<   P :  ; =C ;   # \0/J 9I    B8 7 #  H {80  \"S4H 6\r 
   , Oc     \$@[w8 0 4 nhº k Y\0 cU'>     ȓ1c  o   S \r:ʎ R   PH  iX  P = [    b  pc\n	 J :H   2 ]& P   H #,P 1ȱ {f6II B S `+  D ]  R )   l6 \\ 7  ^ Ŵ ߃  A^   \$I    @ 	 ht) `T&6       P 7څ  &    6@J @   \0ŖE  ^9f 8   8ߞ  J \r ʂ  N^3 > \nq:i<ݔ%  4P V   Sr1 X ʌA ; X 3 #  r) K  :9wް2kJ ˮ  Nö {. 9  X  [~>  @në  (; c      |. 8   qۊZ  < *:&گI9 pX v  { _ i\"	      @BɻD S7 N c \r 2      D4   9 Ax^;  u  ?O   `^Ѩ ӟ  |ѯ Q2 | (j(! < u ZSj =D=6  	 \$ h   9A T! BP , Q =     |O ˾t   s }  2   σs *\0  ,  K   \rO  %  r r   D.TY}G 4(  A	aA     {  ̼10p   5! \0 	 T\r0 7    \r      ISa 30  a :ǵ   tl2I 5       f
  D   D  ( [ |  \$L \rm  `  f]   pD, %Δ   P \\     @  Ă\r 'b Q/ 1 4r 9 EP  !̰5:YvA#-4o47      F@ -  o q  sൠ  L B\r  9@   | R`0  \" 1 \r)  @CT   aL)hF A   0  \0 l ' ^: tȑ@k?	IǹBrN  ? D )\$. h ;Ӟ I J!     W \\iF  &&~@   }))   MaNe  7 III z\$ A ̖   m+u7 %\$&Jr )U      ^l\r'Fغ  !A  :   CU  j \"b  HS\n!1 \n Qù  *0      .  #@ إ\" Jp :R \0PR2(H   JP  # 4< kt - [N 5 B|C    ɲ r  & ć  j ԺoV /  u㻯  )  d A6i 6  UH \" u 
EN@ Q ) t  ` bm }*    rL  Ql/ 9  ( B F  ^{ u  ˶a  ۤ L}  	 *  q% Nl!)  1j\"   ޙP Mdb   GP |   כ\ny) e ! 7ے H \n K*  XӉ! 4Ƣz_ o0P xzgwW b    '.D   F   x ګ\0  =G R #     -     ` u U &G[   
0  c q  =G=\\ \"i  	 &      \" V     E&  ";break;case"pt":$g="T2 D  r:OF (J.   0Q9  7 j   s9 էc) @e7 &  2f4  SI  .& 	  6  ' I 2d  fsX l@%9  jT l 7E &Z! 8   h5\r  Q  z4  F  i7M ZԞ 	 &))  8& ̆   X\n\$  py  1~4נ\"   ^  
&  a V#'
  ٞ2   H   d0 vf      β     K\$ Sy  x  ` \\[\rOZ  x   N - &     gM [ <  7 ES < n5   st  I  ܰl0 )\r T:\"m < # 0 ;  \"p(. \0  C# &   / K\$a  R    `@5(L 4 cȚ) ҏ6Q `7\r*Cd8\$     jC  Cj  P  r!/\n \nN  ㌯   %l n 1    /   =m p\" m  1A8 # 2J  %\r;  J 0    딂2i r'\r 3.  2 !-1M!(  ؁O  xH A (&  B C  6V 8@6\r r ' S;&= H ͈ \0׌k    jx4 b\$      #r ( JV S =  %	Tl Ӵ 0ڍ ҕ I  3  Ȑ\$ Bh \nb 2 x 6   Å \" 2ٮk  HR 2   \\   C8ҹvsX  \r Ѵ d7  3 o'  II 6  k& ; ޠ'  @   êM^. XَZU x? Lht 2  S  )
.  [l o   i rӿ\r   p #&   %  A 43 0z\r  8a ^   ]pp\n 3  @^ /.{  A Hܼ  ^0  F ˫  k   |5c \$ T  m  A\nX+ l     q #  2; |    B7t# Igu\n |\$   _'9 wa  p  \r  0 p8 H jzJ 8[M     !6&    ¡3 a    	1 #   Ө@ 3 m5 5 ڨ    ݠs꓈+̀ 62r,e B1dd     Q	7
  C l  H\n5  ( AP\$  #  @\$  ս9 5f j1M  ?H0 +  u	     (  H0 k      2B   ' ]   @   <c o' ! 0   )N	  º .      I \0 \0(( 4  9A(e! s H m  NDBbר C \r #  eS'\$   H \n
      dgU ^CD؁8;
O cW }     XP	 L*\"4    %]` 3 i \$] ԅ  |O	   9   MSi-    `՚k: ]   c  W ؁    Q	 j2  0T d LX  `f  9D   ~Ĕ   N)ɠ~&)4  N :\r h J  _ٛ! 1  \\ i < Uz   x `+ A \\ b   b3   + [ұ'N    XkߊA i P  h8\$Ṹ   N) R f H  ,MI4 \\  \r  NG  - E   X 'F6# b 0y`l@·2s  ]    B jQ \n  =35v^]C :   ^ a,'07 Z   e6   P  9b閔T lZ  9  שk#b Ŋ DQ , * Y <D  e`b 6*ً  ).Kɲ f `;KR,Y  \\ \$ &  ";break;case"pt-br":$g="V7  j   m̧(1  ?	E 30  \n'0 f \rR 8 g6  e6 㱤 rG%    o  i  h Xj   2L SI p 
6 N  Lv>%9  \$\\ n 7F  Z) \r9   h5\r  Q  z4  F  i7M     &)A  9\" *R Q\$ s  NXH  f  F[   \"  M Q  ' S   f  s   ! \r4g฽ 䧂 f   L o7T  Y| % 7RA\\ i A  _f       DIA  \$   QT *  f y ܕM8䜈   ; Kn؎  v   9   Ȝ 
 @35     z7  ȃ2 k \nں  R  43   Ґ   30\n D %\r  : k  Cj =p3  C!0J \nC,| +  /  ╪r\0 0 e;\n  ت,   > <  \ni[\\   ͉ z    z7M*07   J A( C    4ہC @ A j   P B N1   0I \r 
	 | Њ2 G3j    `Pjz4 o`  c   4` (P)k)N  \r \r  JT % H]NR \r    ys  K#= 	@t&  Ц) C    h^- 8h . \r   :      #  &) W  5 D X e  c> \" c 5Mb^ \r 0 9ю2  .U ͊ z  1
.: hRF3 MsC ab\n9h     \r.  h0P9 .4 V   C# L z   s xC 8 3 ɮ!z   d  `-kF3   :    x ǅ   !ar 3  X^  *   A 8 =! ^0   F¬  5 : !\ré  :  l@ . s 2 \"k & '\n  7\\     G /  |o; <     ̏FOτJ |\$   k  7Q  p R㦆5 ʔ E' C n  p&aբ zM  = ŭ&   h;  1   ց)1  x   fx 9  p  r k0a   } q	y     FL hFl ˬ 0   D  \" @PA @ D0PVI*,    2BXI1('! ( *zM  6k@ )x n A 	\\ t     ;   bw   ! 8 T  R   0 \n gp   :\r    0  4xN\" 9  @ Iq \\ )   b Ti9\n'P D}\"\nEDr 5    J S^   # 0C ܘH   ׸I\"  բB   +~  5lY ٧!\rټ   D  <` \$B O\naQ%\$|OY; #  *    d 8  5P	 2DJ6L FT˲\$;  7\$\0άSbn3   L   ڹrT1 @LCq - @  J' \\ Dþ C4ښ!ȓ 5y>\r#+4 s# kI 7RT / o  s! @'Ӆ&i  F   ! :  ER ' y.     u{ 3 \\ \r*؋    vW/   d j '!  > ` Y\n P# p  ْnuYK : QW)ߖ 2   ENM2C  Ζ  \r )\$  E Rf  :    ؕ ho2A < P  s!N .Ս Uw= ԩԦh \0k: N %Yl Jj: ( W\" NT-(  ޘ vlQ \n\rC a . qF/Iu#   s M?R 6 )K-c !O H @     &GсL BC鬘1d `Mŭ1  Ř {cȸEj   U@";break;case"ro":$g="S:   VBl  9 L S      BQp    	 @p: \$\"  c   f   L L #  >e L  1p( /   i  i L  I @-	Nd   e9 % 	  @n  h  | X\nFC1  l7AFsy o9B & \rن 7F԰ 82`u   Z:LFSa zE2`xHx( n9 ̹ g  I f;   =,  f  o  NƜ    :n N, h  2YY N ;   ΁   A f    2 r'-K     ! {  :< ٸ \nd& g- (  0`P ތ P 7\rcp ; )  ' # -@2\r   1À +C *9   Ȟ ˨ބ  : /a6    2 ā J E\nℛ,Jh   P #Jh    V9#   JA(0   \r,+   ѡ9P \"    ڐ.    /q )    #  x 2  l  1	 C0LK 0 q6%  3  ̎A   A 2  Sb n  , 93 ` 3      pʁ3  @ +  ﴡ( \r \0    CʰA@PH   gh  P   5j,; [O  :@CZ    	a:\" ޘMw] \r)CJ\"' (Vt HO\"8ȦT   p(   l  ت+x\"\n63a 
b/p   x*  h\$	К& B   8 6    \" y=舦 i¥`+՞    V  hK 9      أum 3 b  gc w4	(\"b B   V# d   9 c2 6Uo Y m \rY 8     R šeKO +	  A\nv0  K *^ 9on zë  X4< 0z\r  8a ^   \\ )   /8_Y    /  xDxLR 3  x rJD  (| GC  '1[ 3     C, 0 , ]  l*   J9W   D  Lu/T s vN  ; >  \r  <#Ɲ R  %7 T @ k i@ ޯ 	 \rd  p W  +  # Cu&O   \\^q lL %W `C  & N9t   f~9 7F M  gF1 \0 N JO ~    \r2:jof (¤  2F  Ð A  LG ` .ARp X +\$      S|   r 8䡲8 w<.J+ # K \"* (  xH !~H  s  AD!N   < Ta ' )    a zH 4 &&) Bt  IIC(  % J  j\\) ~  rK Y`g            .M \r* G AN<  : \"Z   w\$ ++7   9(  >ҰCQC\n<) H b  =  n F@ K#   \$.  YL  Ĩ贿   % -*\"  A       ,	 o) K  L+h 5\0    )7  V 4 '-  \0 ly\" YJ \nl1  hÐs, X U  V   S=  U 5gU    ٴ|	   l.l     I.%q b  W4L b f   H,) W Y  \n ^a   \0@  okJ S  =cl\n      2V \"1\n P# p  = >  b )   ܊1LR   CS\$I  d  =(I 2      r  v	 \0003  `V\re F m<)Z@Q 3Kh+ZGh Y.( r GwG(Jc(p  \0  \0 v   .ڍ W   UJ  S _m :  j  +j+G =asMH    L ,LEd   ]WL  E     i \"  CQ  g݅ L    @ ރ1 \$  ";break;case"ru":$g=" I4Qb \r  h-Z(KA{   ᙘ@s4  \$h X4m E F
yAg
   
  \nQBKW2)R A@ apz\0]NKWRi Ay-] ! &  	   p CE#   yl  \n@N'R)  \0 	Nd*;AEJ K    F   \$ V & 'AA 0 @\nFC1  l7c+ &\"I Iз  >Ĺ   K,q  ϴ .   u 9 ꠆  L   ,&  NsD M     e!_  Z  G* r ;i  9X  p d    'ˌ6ky } V  \n P    ػN 3\0\$ , :) f (nB> \$e \n  mz      !0<=     S<  lP * E i 䦖 ; (P1 W j t E    k !S< 9DzT  \nkX]\$
      ٶ j 4  y
>    N:D .     1ܧ\r= T  > +h <F    . \" ]   -1 d\nþ    \\ ,   3  :M bd     5 N (+ 2JU    C% G  #   \n T    ,  `#HkΖŵJ  Ljm})T ʣU% c Ļ    7 \$ qNˀ 8N\$@#\$_̓  W(mԌ  l q / 8   u \\  Y( \\  75   -
   Zt  9D  Y.Bh5 C  %   A j  p  B 8  Ge  x Z, rhA	 7<2A M  - Xa Ζ Ȳ<|V Au h     Hj     )hc  * d R   7 y KZ   H  })   YW k V   R _ O ¯p
 (   c %,  \"  q  !  A ;jr   6+Č e8th)\$ w\0( >Z wd- E  .șf   H 0 C`ʸ a\0 9(  z ǵ .^  :{Ø 7 Û Ш5\06    W P  o xhГ G 4    qQ P \r 4  ^ :b&&   NB >  ]?  ,m/+\\ \$d a 9\$b ø- t> =Ka Za  iah@ T 6 j b    8py	% T ` yНt1XTxaaE!    fa	   %XxS  y    DH, UDe , @ b HMИ     Į h \rK \\# ̡%T  d  1 .  \r l        v` &0 hi\r  9 ` 
 ZGD   Y  = 8    @r      p`    3 pa  V  {      p/@ H)6   JW   | T *# ` \"  v M	 ^ u+   E  3 ) b U R RT* !` p   ?A^8m _L	 1&4șS2gM	 *eXr   lM    L E r/2 SS }] w@ iĮl )#2 < b A r5  IDy`4  eO  >  RE  ē A  Q   Uq= 8    )      J)b vJ   j;\n%q W   ԊT    ީ   K[ b    T I :   ՙxA ̏>i  ƪV nS u I    h 6\n\$ PP\\ Iu \$~   
Q݃ 覭 <   EQ   \0~ Bb  F @ B  8  4& hsd  5 9     s.N  j yn\" )  GYC CS  @  U2 R  %%  Xk = * rIHe %H  (BWY 	 > *A HJYA>  mB  K d \n _+ bbŞ 6 7 w<.a (   6Q  a 1v  L  't  }  ID*     	) D  M Ѓ r \$ D hCP v 4\r      {  m@ ( ( ²& <     >LEC < \"    XԦ  cw`V>OTU lZ`a !  \r KP! n         +sؑ\$\n  ͠r n H  /  XQ	  Ry\0F\n A] v/  zt  \$  \n A !  Q.K] '%1  䡵  E    o  ;   z  +s  ,  MRr  F  B =  +  	/AWM w
? {  q Q  e{ Z_ W[  &  \r   V4M X q D    r  E  \\L# e u	 \r    Q >  &C 苾\r\n3 X B00 \n S    U i C ^R  r  d t9  {d ^8q .w_j   :2  uKű   B  *.  } o ~ Veo A}o ԏ        s.Ҫ W ) ^ (ڗ   'a e yujxڹƒh ,  ((% \0@0 _,  !w 		/   w   D { e   \\L=  GZ_   @f ˌ4  ɐ1  ]9\\g v  E * 3     \0* 1 6 &    ž C D  {  % )  b  7l U \nm/\0  / h     K^L D < d N%K e d[  Ɗ  ܊Eԕ : )     )    颚jR jZ     ` {`Ȧ`服j͏\"  6^ 9M@  x  ";break;case"sk":$g="N0  FP %   (  ]  (a @n2 \r C	  l7  &           P \r h   l2      5  rxdB\$r: \rFQ\0  B   18   -9   H 0  cA  n8   )   D &sL b\nb M&}0 a1g ̤ k0  2pQZ@ _bԷ   0  _0  ɾ h  \r Y 83 Nb   p /ƃN  b a  aWw M\r +o;I   Cv  \0  !    F\"< lb Xj v& g  0  <   zn5      9\"iH 0    {T   ףC 8@Ø H \0oڞ>  d  z =\n 1 H 5     *  j + P 2  ` 2     I  5 eKX<  b  6 P  +P , @ P     )  ` 2  h :3 P  ʃ u%4 D 9  9  9    ֎@P  HEl   P  \$2=;&  9ʢ  䍒HA:ӥ7E s   M  *   @1   V    Y Հ ֎ P  M pHX   4'  \rc\$^7    -A  J Bb]A B =ʢ  )Y (Z   P   , FRQ, :RO@4I z *1 n#w  m\\2 c\n>8 4   9 O     n ಞa   3 ] \0씶I( G	К& B  C#h\\-      B 2K  ڰ	 c \" Β ) f   Cu,7  M =&cl 6M S:   ` 3ؚ0    
wҕ *\r 
 7!\0  ~9 c0 6	  `弌#> .  ں   P9 )N P s  2 C,쐎     H  ?\rX̪   3  ɣ j M     H2   D4   9 Ax^; r  ? r&3   _ c Ӭ } @ 8x !   {   &O
 0 5+  9  JIYY? }\n p    p\r!   @ A x 伷  ދ . U뽐  C Uj | |Chp'	 7 G  ZZ \rl 7`  b S             b^ xy( ԛ    ALOOy \0 G #  a ׇ\$ԫ fe =    (op YA  YH j -(Z^ b22 쾙 xOT \0'' Z` b   dB) 2d\0 \0  G    @PCk`1  g\r_Ѧ# Ԫ \"\rY A 8 \0 @S ?  Ց`   r! 8P  `#  ʸ; FL  ; U ̦0  C))M 0 k C\naH#@  xX #  P G rIK Gj؜ OY-% ż:c   16'V7*           \nq)	\$,<  陵'* bK(C  A  \0! l   '1̐ x ,   CE V 3 ObHIA@' 0 \"-   A   pI  *  f[ iIEA   S = U   :\$6 D[   ג pUysL(  AUQ \" *  q.  \n  Z4 ު c AU  nvC   e \rX2 E  T85p:     0   0 \"vM N\$ Z*  dQ} \$;B    %!\r6 Vؙ     ) Zq 
   MO\$~   ,2D #J A  ӘG * @ 
A  Edl   ^   dl%Z    X b  	Y  yo8akץ  (Sxl %   P   rQ 0E\0   1\$H t  V  n fI `       \$i8גSc܏  \$ + CS to\$h: tFF Z(ç      8m\"h!%\\n_9M   %R4  + +ɒ I I V g(  1&Vʅ^ 5 e*%A, 3 c,	  *J   H C    4 (N   F\r* ,   >8 𦲂";break;case"sl":$g="S:D   ib#L& H %   ( 6     l7 WƓ  @d0 \r Y ]0   XI     \r& y  '  ̲  %9   J nn  S鉆^ #!  j6    !  n7  F 9 <l I    /* L  QZ v   c   c  M Q  3   g#N\0 e3 Nb	P  p @s  Nn b   f  .      Pl5MB z
67Q     fn _ T9 n3  ' Q       ( p ]/ Sq  w NG( .St0  FC~k#?9   )   9   ȗ ` 4  c<  Mʨ  2\$ R    %Jp@ *  ^ ;  1!  ֹ\r#  b 
,0 J` :     B 0 H`&   #  x 2   !\"  l;*  1   ~2   5  P4 L 2 R@ P( ) ϐ*5 R<   |h'\r  2  X b:!-
C 4M5\$ pACR < @R   \\  b : J 5 Òx 8  K: Bd F    (Γ  / (Z6 #J '  P  K    < @   -  g hZ  -`  M 6!i  \r[6݄ [    l [V 4  M  \r  x\\ \0엏I@ 	@t&  Ц) P 
o[ . K (  â[   /\r3h  5\n>B9d    8ߖ N <6  d 1Ld    2t 5Rh #; \$ M   Xp  e   ,c  :  @  T   0 h ]   : !@         ᡔ( ^*1 +63d[  4\n  AC_  P@& ` 3   :    x ͅͶ       { \$ x^  :R   x f)   % \0\\@  7 Vd  i    k    \0 V  /] Ơ  % r  5 s  Ў]J2 p~\\7uj@|\$   /% çc  4 	  ` Q	!=M5  D  a \\J܌&I	2J\r 7  U  h A 1    Y. 97  Рa 0 5& ՚ Z f  E \r s),2 CId !Sz}\r\n\" I   (x!\$  \$!t   H\n\0  RGI2w    ^ yP   ΐs,f? lҟp@G \0wP\r \rSff  K ѐ\" A? A\n sH  4 MI (qC
qK)D %8 J i aL)gv κ 4P 6    A   b`L   (  P % d  c7<4   0ݹ>D   gx    O  C b^H y1d 4 B ~z  Ԃ  f  f= q   Q@c\$    S f[j\\.   E  C 7\n<) Gv hj: V^K @ \"LW#  4v 9H ,! q6  3  Gx \0S\n!0e @ 7 R-  (  ? 3 %4  L m/J	}  e! n *&;rz ʔéU	@(\"     F ? B r%  O 2\0  WP}_\\E } 5 +9 3 . P b ՠ  E Xk UI  3   \n Y:\rfԜ  O  u7 ,  K     P  h8dn    ^# N ƘjB B    q  	k ձ\$6 *   m *X ʿ/ lan\n#  l  w^g
 vM5	   K! &0TF   ]  oh Y%\0x 9\$ W \\**v y \$R    g)  '      IH ~4(  c qi
X   @ ]  M`  ; k n ! I\\p  0  A \0 Y !    4Kn (IT v !{ d = \r	     į  8\0";break;case"sr":$g=" J4   4P-Ak	@  
6 \r  h/`  P \\33`   
h   E    C 
 \\f LJⰦ  e_
   D eh  RƂ   hQ 	  j Q    * 1a1 CV 9  %9  P	u6cc U P  / A B P b2  a  s\$_  T   I0 .\"u Z H  - 0ՃAcYXZ 5 V\$Q 4 Y iq   c9m:  M Q  v2 \r    i;M S9   :q !   :\r<  ˵ɫ x b   x >D q M  |];ٴRT R Ҕ= q0 !/kV֠ N )\nS )  H 3  <  Ӛ ƨ2E H 2	  ׊ p   p@2 C  9(B#  #  2\r s 7   8Fr  c f2-d⚓ E  D  N  +1       \"  &, n  kBր    4  ;XM   ` &	 p  I u2Q ȧ sֲ> k%;+\ry H S I6! ,  ,R ն ƌ#Lq NSF l \$  d @ 0  \ne3  jڱ    t  6 ]*Ъ  _>\rR )Jt@ .)!?W 35PhLS  N   k    @[  J2   Ά7=Ң̷m  ^	{̒K \"   \\w b  o \\ 3   ϲJ	 %  O jC   6 m ֹ   8 3j¬c:ϵ  HJ  t *HOKu 擶֔1 1 v( Cj    ˫  (\" ]  45,/+    j^Y~        y Ĉ\" ֨   Ƌ  B      lȎ  (I :ZB@ 	 ht) `P &\r h\\- <h . Y5  d   P   X@  ^7s A t(  Ø 7  Z +- P :M v#  7  0 	 \n  NH g-   7  h 7!\0 ֎   c0 6` 3 C X ^  3 0 A ] l\$:  @ ׉ | Cj -i (AP \"   uu L   r0|  : Ȍ\0<&  `z @t  9  ^
ü)    Dh  8/    H|4@ d\$  /    t4 ȉ \", q DL[ #U|  o-d2   RIꄬQ  G\$\$  Pp\r. &A 6   0  xR \\- 0 9Cg \\3u   \"  Hm ,6 0 b 9 4   tA \rg4 d`  n 5  b y\" ̘ ,E :d 8 O\"ciP     ) #  R5t   { y >'ȋ  :  0 #A\0c  84   Y C 10 : F D )lť  ֞aT t  P@@P  ѫN ޡ q P   %҄݄    C rQ   \"   s  ?H3   z7\0  } >\r 4   z.;2p7    IIs 0 &CHg   cM   \nx ȱ D BS\nA)    K 
  \\  ȸT H b   EJiJ #)d ֆA Q  ƹt  =t]%P  i ӊ    8 d  J¶]m 5\0  HC˻  t4   t ;G=   s fFA Ǩ1L pc|H m  sk1  )ADO ¤ r p      AU   v Ѩ\"e&k& O  R Y5J   UJp 5  J  Ȣڷ&  ?  \$  7 !7 
 D   )  5 &\r ` @   \r2)\"  Ch 08  ܢ  Z  * W  n	.ND C i    E  a qnڹ]
 ka  Q0?u    XV d w#  h q  Ũ'c݌ mw  \$. o v  b-y        ~ l\nH5 P  h8tpRɡ2    l! 9*b ڱ^T \r :%j|   &J   + s  -e R *  1l    &OȬ_   3  ][  k,h3L    ZYX G\"L++S  l  I 3  t zƮD j=\\Z u)  n rh oacU X< Z M h;  F  Uz	 Qv Hf*ۉog a u  V!L2  FԝJ\0 \r,      = 0f4  s -  >[ PI \" O   AA W  W  D !~";break;case"sv":$g=" B C    R̧! (J.    !   3 ԰#I  eL A Dd0     i6M  Q!  3 Β    : 3 y bkB BS \nhF L   q A      d3\rF q  t7 ATSI :a6 & <  b2 &') H d   7#q  u ]D ).hD  1ˤ  r4  6 \\ o0 \"򳄢?  ԍ   z M\ng g  f u  Rh <#   m   w\r 7B'[m 0 \n*JL[ N^4kM hA  \n'   s5    Nu)  ɝ H' o   2&   60#rB \" 0 ʚ~R<   9(A   02^7* Z 0 nH 9<    <  P9    Bp 6      m v֍/8   C b     *ҋ3B 6' R:60 8܎ -\" 34  3 N+ EL  6  P      * ( (!cl@ \" +    /\0J C > a\n  `P    (   Zt j  o#1 Ԅ)  ! <Is  d(茔    e&\" ɀ#D ,ҀM-N #:  cH 5 tH ^  \$ P#4  vm Ѕ DjZ̝m\r6 h>  :  @t&  Ц) C  <   Z  U t  J   `@  h4    , a    H@ 0D\"`Ң:  )5 r3 %\" !uߍ #  #3 \0ڍ2  >9  ;   t   ̘X Ò[)+r6   ڎ Wi      y }v\$։,h F N  柨 W|    eޕ  \0;\r  8h 	 0     \"9h 	 ï    B   H    D44C   x х  ( 8^   ޡ' x^  w0  x e    ܨ 84|@A i۴ @   : è  ͵ -ऩ     +ks 8:s  E t  P9u]` <# ~7vj`|\$   c  r ؛
@ Դ@  \\ 3      4   7|   7   cp E)4V*̥t J54 	 @v | Z\\3 I    ݕs6/ < p  Z\r0Ⱦ   {1\$  @@P ! 6  ZH0t> X R HHV  ņhx  2 1 s2f I h  .cX~Q  |:     \" Խ\"x J  ?    gLQZ @LC\" 6)8 %@R L7  f  %&9   *yc 8   vz43 R= X H  r-(5   U BiƬ[ &M{Po  n   \0 0fX% \r, 9  I2AO 1P k  Q4\n<) E |1  ӈ  @H ݁ ]  ) 3 b \r'5 ԍ[  D   Y6 \n!0   f HF\n A  MD\r% x 2  B*j   o Q &  @   O1 7  @  @  C!Ē   ̶cy 3 \$   OL ? 
m UCM#\r  5 E X  x O  P%)\" a   8   iT*J0qGJ*v \n&    I a  u^ Օ a㥉 A̚  # )WE ד !*	    !_ 3 p (  rB	Cָ   3| 5z  Y    : F    *u S  R JN,AJ  T H a : X p  \n\n  Țs /* \nm  H ]A[͝  iXZ\n Op";break;case"ta":$g=" W* 
 i  F \\Hd_
     + BQp   9   t\\U      @ W  
(< \\  @1	| @(: \r  	 S.WA  ht ] R&    \\     I` D J \$  :  TϠX  ` *   rj1k , Յz@%9   5| Ud ߠj䦸  
C  f4    ~ L  g     p:E5 e&   @.     qu    W[  \" +@ m  \0  ,- һ[ ׋&  a;D x  r4  & )  s< !   :\r?    8\nRl       [zR. <   \n  8N\"  0   AN * Åq`  	 & B  %0dB   Bʳ (B ֶnK  *   9Q āB  4  :     Nr\$  Ţ  )2  0 \n*  [ ;  \0 9Cx    0 o 7   :\$\n 5O  9  P  EȊ    R    Zĩ \0 Bnz  A    J<> p 4  r  K)T  B |%(D  FF  \r,t ]T jr   
  D   :=KW-D4:\0  ȩ]_ 4 b  - , W B G \r z  6 O& r̤ʲp   Պ I  G  =  :2  F6Jr 
Z {<   CM, s| 8 7  -  @   Z6| Y   L  \"#s*M    /YC)J iW P  j   _  P* #   D\$ c)IJ 
6 a+% ]. I m |\" ڣ GZ  h    ]XlTґ qUh  J2FW fF ;~ `- s d     O  xH   [  ; d     园  #y  =0_  \r ͱ
 P   !^      Y qR ˫_  o-\\ Pšklx\$1s+ ů 5 u /= }mnB7 v Gm w]R         ząۯ ) ~ Cܷ   q۞   ,     nC6z P 5ts@PH	\0 &  t\n     
  y A .  \"m  q      '     |Rf\rд ) b  *   R*#  ȋs`,mݭ ز\0Q ;  9   0lI  0 \"-% k3  g  5a 1x    (m! < \0ꨃ cg 9 ` C  9    ha \$	\n݃jH   0S]  %\$ W9   qH3 E  B  \$ o D  Fc  O f ! Q  @C\$ \rɞ?5J  \"g\0 0    \"\r : \0  x/ ,Yd  rj    ä= Ms 8<  b-   ,,u  Ȭr   b M   _9}˰   \\  K{Jhٮ@U ÔJ + 58p y   M  \0 T    _  1f<əa f     \r RC K6 \0>	&  1P '        <!      T   N     Rm     {  ,} P   A^\n    6U(  <# < LU  C  r   <G 
Z  񬄀0 P@  ; ! 6 9     B`   n r {D!S fTo	h\n\n (  % * d L    ؁   \\ޛ  ,     S zOY   =   | vO0  { X \$M   ^ 4  2e?57 	D  PU  0 OHg `  X#      )   R\r  U   xNhiZ  0 3>Ty 4s  8 J  
j VJ +Ccfד U̕ !  @Pi l  D #\nB x;F+ R )  \r ,@  ; 8y b   9ap  (Ә  /] 9x :vSq \"-  Ȳ a ق&+ \$     in  <' P    :    Hm  Y    CCN6\n   p!gd  xh%    (\n<) L  m| a  G #N Q   +bJ@   & |  U 1g D  @3H\n% nפ: ) ZsM g ΠE (ІX§k/  PJE 1^ @L  z    m 4 t ! ~q\$vh% & F]m:_  D_=DE` fl 1 & hf 5   ;fXy  pF  m u   } m @  (p  s ޒ  * Ͼ8^   _M 5  ^cU 
   C ˕   JN ;  (    @ly 4 0 +L  36  yO Hf   k O%bx  * @ 
A 2 م\$  ;  75Wih  p    z q'b  O - q   V iA S  m RzA]    ; ; ( [ s3@X \0  ݣ0 oA Z   D    	J     DL    A7 u'  
  f hy٢w   /=   Cf TM\r %n@y ( ^0  7ۍ   ^B?  -  n   /   uUL@  U   \n	   Ԝ w     i,lLH6g   \n4f     2 JGOZ D   \$ʣ   Z  Ӌ^y\0  \0ʬ Ih>{ b  f  n L2    M   o      \"1   
   `{ & /| <D' t00 e g    0 
   ";break;case"th":$g=" \\! 
 M  @ 0tD \0   \nX:&\0  * \n8 \0 	E 30 /\0ZB 
(^\0 A K 2\0   &  b 8 KG 
n    	I ?J\\ )  b .  )
 \\ S  \"  s\0C WJ  _6\\+eV 6r Jé5k   ] 8  @%9  9  4  fv2  #!  j6  5  : i\\ ( zʳy W e j \0MLrS  {q\0 ק |\\Iq	 n [ R |  馛  7;Z  4	=j    .    Y7 D 	   7     i6L S       0  x 4\r/  0 O ڶ p  \0@ - p BP , JQpXD1   jCb 2 α; 󤅗\$3  \$\r 6  мJ   +  . 6  Q󄟨1   `P   #pά    P. JV !  \0 0@P 7\ro  7( 9\r㒰\"@ ` 9     >x p 8   9     i ؃+  ¿ )ä 6MJԟ 1lY\$ O*U @   ,     8n x\\5 T( 6/\n5  8   
  BN H\\I1rl H  Ô Y;r |  ՌIM &  3I  h  _ Q B1  , nm1,  ; , d  E ;  &i d  (UZ b    !N   T E  ^      m 0 A \r  nB, ] *;\\ I wB    9X\\5o}aS{X, B   ֈg%' 幋  \"  PӃ,Ŋ g(     + v \$#\"L CIr /   A j     (b  w; D  4 `Zb  `\\i l   |   ʙ [  :   ,  d0   jvʫ8gN\\gN  u    T q1ij  ]Gՠ eS  U_t   S       H\$	К& B  xI  )c  P^- e j. yz %vx ıB\$?5 @ Shn   ?    (x@  9   y T A    Q =A 9   0lJ    P   H  ֚p i\0ih܅@ | ha\r   XCc?  3 P `o T9     a *  	[PmJ     \nP{ IN   3~ 	  Y(i 27 yX\n  4  \0 \rJ    H  tNp> D  a=pt3 D t  ^  .1  \$  xe\r  =@   \" ҕ%P xa  `) 9P [;LE  d H lE:  .HƦЋSE1 a  e  \r  E 0 Sn J MN  ` Rm 4  \"\$Ph  :HI))%  w Rr@I  (%  R   ^ @>	! 8  (    O   p ڏ   !    \n  ̀\r   sPsVʝ*  \\  A-f   A    ) x   # # twT  7@ S~\" x  e3@   (\0 A \0c   4 دݩ :G=\r< p \\R S ꬝ef * `[   +2  A\0P	@ \nUK .\n     w&z qˤ  R    W  }  ?A  (0  	O   D  e)Zn   E 5\r  l@ T7  | : M ;   ( i @Sj { a 0  Map    Vr 0  3kc I \" G M^</ Y   4XAo  \\.tc܉]  e&K [ oqŅN    a]-      Y ;n~a6NV D. i u|VI%' @ ڏ O      C u?  3'\0 '   i 1Ĕ S,҆?h> \"ۼ  !eq)    V  = e\$\\cL 0\nU\$   |  \0 mi  !B
Q .y\n¦: c  iũ\\   U  f  P |)pSb 2lH  n 8Q	  3Y @} PF\n  6  A\$VĘ @& ܜ  H    8ϥ [\$ ! 6@ tq Y   	|l2 I 7   FTVYY i  v  M   ` {   K45-1    W 
  W CHc\ryL     3**em Ұ  m )  EP 0- A d V\" k;i5LiR Nn=ֻ  W  _ 	A[   zp A3  (&    η. !  8 (      Ȝ 8WD  7L q   ˍ YS   <dK  f 9̾i> 9 \" :   
   X	  :  S \n rnW v \r  ,l1X_\r#W՛&  yk꾔 )   P  G#	͈ +7j r Ww A6.	 G 	]85 򮼡 9^ 2 P[  % \n ";break;case"tr":$g="E6 M 	 i= BQp   9       3    !  i6`' y \\\nb,P! = 2 ̑H   o< N X bn   )̅'  b  )  :GX   @\nFC1  l7ASv*|%4  F`( a1\r 	!   ^ 2Q |% O3   v  K  s  fSd  kXjya  t5  XlF : ډi  x   \\ F a6 3   ]7  F	 Ӻ  AE=   4 \\ K K: L& QT k7  8  KH0 F  fe9 <8S   p  NÙ J2\$ (@: N  \r \n     l4  0@5 0J   	 /     㢐  S  B  :/ B  l- P 45 \n6 iA`Ѝ H  `P 2  ` H  < 4m   @3  m  1 Q<, EE (AC|#BJ Ħ.8  3X 8 q bԄ \"l  L ? -J   lb鄁 \\ xc! `P    # 떠  &\r(
R     2 k Z ld  #  b 8#   b=h  t W  c   	 PS   Xu    	x e K-J b t\"  戋c  <  h 0  8 \n z!V  Ƶ J \r   p <C r i=IX   6I`Q C    2' *|9 и  c  :    \rx ͉  \0 0 PH@7 c  ܌, x \r   Ä 6e\"8 H֋ n
 C [ M     \$ ~k   , 9   ;z\"N   {MF    GL%   2 c\\Z Y-x    3   :    x ǅ ~ԏ (  !zg~  K  A ׸+* 0  ח +\"ȇ x k: r9Ź  5  X\r   3Cڎ  M 6     Am      wv   2(sTy , 6 o    ?  x   () sw1 &8?  (>@E0   F ] B m \0  Y  # 0  s>qY lG |X BL  I\"w 	
 5J xlK   '   l\$] A  E;Ce1 4 . C N9% Α Bd \\E\$ U   K >\rD   @P9U   j@ AE/ L)  S\nqP*EP66p  leq? 4-ϑ 1 %  F'г \"    H 9n\r\n ̟ ~̙  a E   T  ?  ? u.     (k  u=  & t B\0(aL)h    {     9\$;D     !    l   uB     
 O  LxO  ( G   AQ>> s#P \r ɇ N V: P ӌh <^ 嗺  ~ xn\$ *   ^ P	 L* >A   j M : ʉ@F	EhG )BA < vEPQ t \nk6R B0T S\n 3  A BSaL(  vR    \$ %d     de= 50k ! 8uR\"I 1 \" @     ) H EU VS 95u\0 斢 , +-f 3Y[  r  xġlTהkM ~\" w g %  4 \\O/  \$4 T  !0 K c 6  }  jy yUc5 -uY ~ U  G I    {_9 [  # h =%)  .)|   [   n      3n/   40D \nse   L =P  Y T Tc?c-  ۫ Z   { Uް*   XoY5 FUg] :d '[     r    R 2  p      U. r";break;case"uk":$g=" I4 ɠ h-`  & K BQp   9  	 r h- 
 -}[  Z    H`R      db  rb h d  Z   G H     \r Ms6@Se+ȃE6 J Td Jsh\$g \$ G  f j>   C  f4    j  SdR B \rh  SE 6\rV G!TI  V     {Z L    ʔi%Q B   vUXh   Z
k   7* M)4 / 55 CB h ഹ 	     HT6\\  h t vc  l V    Y j 
 ׶  ԮpNUf@ ;I f  \r:b ib ﾦ    j   i %l  h%. \n   { ; y \$ CC I , #D Ė\r 5   X? j в   H )Lxݦ(kfB K   {  ) )Ư FHm\\ F  \$j H!d*   B   郴՗.C \$.)D\n    lb 9 kjķ  \\   ̐ʾ  D    \rZ\r  qd 隅1#D & ?l &@ 1   M1 \\   ` hr@ :      ,    ΢[\nC * ( m,  r  L  J 4 \" 윴   GUN/     ;s?K  
  s3  BcH ( Ȃ4
^     ~ r }M  t %İ pH     \r^ 2 [\$  CkJV G  A\\D [sPבB Xƍh    65҄ԩ \$ c   ї W(   WF -^ &  +B  X{7 1  p   R   :ڒ   ;-(lN ɳmN   z ŷ  UGH   -r4iV  &/# d \n4  s ^  v@s  m 1 	\$X   4 c 6  @7 A\0 7u݇e vC( :v  7  M M tZ6  l  rt^ y=` = ˖:Z 7_ >V  h\\T 2b `\$ +  jx\\ d fA  \$;   5`B   & )a    |J/   GLڋ  &/  '   K Y Ч% p ^  m }  '      %@  L`[ja   A 93  t        ]8'\$9 l%> \0  TI`3 y H     S  N  6  .
Y 7E\0  Q|    mJMk Ԫq  QL2   (rL       t<\$  0 \0  (f   4 @  : ; P\\c w    p^  xdx  :<0 
 >!eĺ  x
 >z  xh  q.2EM1G(    `ke 2 e s  PJSYb _ T, D ֣Ձ\\7    ʎ Jm i`Ē x\" v7 BHi\" d  JJIi1  r   OJ | ,   UbQNry  \"W  	  O 5> Q9X,8D CG aԩ zeY    ͓2X  \r  RA 1b1 ^/Ľ V P    r l Ϭ   =G |@o Nf  `GJ|[>q| 
d zr XEUc  UKZ73 a<  f J97 -:  -   >S\" Ag4Q T   \\ \":e   [P nEĵ   eJ5  ͐ Q sM v  )%>     
^ }k \"vKX  - ɦB EB Y'  . Dc\$ ^3\"JlT: 6r  : i AuIJ 0  1 i   V ]\n1tWI 覩 M Qrqb 0 .n   C<     Y7 ީY bcr	!u&Gê  Ud5 a BU K8 %=۶  X aѦ+S g {n CDC x  A/N  |G {l!<6gQw6  hp*  r ė  Q
 @xS\n  _˪t  .c k> xU% | &  ̗2 # 8  J C  %2     T C9<GD ab<H	  8 K  bH  6Eo)z . \0S\n!0 Bd!\0B0T\n   =H eP>  ڑ\nq {  /u=o 
 XP   :J    \r ˚dG >!% U j  [ #X
P i  N   ɼk X 1   X T -  r   \ru l <   Cy      X 3P  3 l  ڻ<  - ҂   ,+Oo   ̵. ,@@B F  D @n к֤ GG @   `  g \\ .  ;  peo  i7qˎf V{ 	     OA  h7_   &sri /! t   7D   T ) ,89 JN\$ B     aJ-  3  v 1    Τ ;  'xj  }    ɱs  	    a\0   C lg z  ! q5w Tg   -M:6q  P Z u- n%p e a  ԳS#B  5>Ҳ*i  ' u R4  # 4j Pq & ъ3 e  0";break;case"vi":$g="Bp  &       * (J.   0Q,  Z   )v  @Tf \n pj p * V   C` ]  rY< #\$b\$L2  @%9   I     Γ   4˅    d3\rF q  t9N1 Q E3ڡ h j
 [ J;   o  \n ( Ub 
 da   I¾Ri  D \0\0 A) X 8@q: g!  C _#y ̸ 6:    ڋ .   K; .   }F  ͼS0  6       \\  v    N5  n5   x!  r7   C	  1#     ( ͍ &:    ; #\"\\! %:8!K H + ڜ0R 7   wC(\$F]   ] +  0  Ҏ9 jjP  e Fd  c@  J* # ӊX \n\npE ɚ44 K\n d    @3  & !\0  3Z   0 9ʤ H ( \" ; mh # CJV  %h >% *l    ΢m) 	Rܘ   A    ,   \r E *iH\$ @ 70 C    : @  LpѪ PH   gd   X n	~ /E,1 L a M ] @   u*pM   	\n, <Ď   S    'HAy cd G t     JpS  S   5 eC# ur   ܄  8 ( B v	К& B  
c \\<  h 6    
  ʲ  \"\r1  6@j@@  cs  Gz8妌  x7cLQg  f9 C@6-\0P 7 C   0 6;c*]635 ]    P    e 'A   A?  8  x V \r hX\" ̎ \\j   U Ae 72 \n]  H  @Υ     @몮  6  1  H   4l 0z\r  8a ^   \\0   \\   x 7 \$P    D{ P    ^0  p    !@ Jjw HP ~:q  ̪ TD  \n   ЭSuM   uPR %  W  ^[ y D; 7    Oe    ڪ(   z 0 &O 6    Ihg a0    -sht   .D 4)%      @  6  Á v! 6 UrC2 i  : 0 C0u   7  	  4@h . V   s !  B   BE   T h
 w=
 n   H\n i <%  3HD 7  . !O}rN \0 N D y͠  PB\n q ;  X}  (a  p@v㔿\r  : \$    ~    b  h 6 ڴI  :e   0  3\r/   d   Js\$  (34  Ы  i  ,  j Hh *    p   0F   9]- I \0'K  '  {  JE I ?    6gy @   \$[! w  \$ .  ;g5c tݳ  \r<   
 @ FU  x  !C   Tp !Ɠ & \\ g8\" hf 	 9'g  b-    R a +x(qD  @dwIѡ P Ԩ Y # D #I&s L 9 t1 aBD  1= Z i   mu'} ٙ7:'<	 u6 R	s E  ? h_ zbU#  :)H C-Z -W _ ӈ-	^Y  2> 5-7    б1 )M@ 0-  !Z 	OY 2u Yx DH   ɳ ,zn8\n E  KX  uVp< \0  r \" / u_򆕫  & \\p ؋3eڳ ui   g uY 4   li-0  w -     H r 2I: av#U ر aE   .   n  [ւ  '  t F ** ʼ D \$o4    5{l N";break;case"zh":$g=" A* s \\ r    |%   : \$\nr.   2 r/d Ȼ[8  S 8 r !T
 \\ s   I4 b r  ЀJs!J   : 2 r ST⢔\n   h5\r  S R 9Q  * -Y(eȗB  +  ΅ FZ I9P Yj^F X9   P      2 s&֒E  ~     yc ~   #}K r s   k  | i -r ̀ )c(  C ݦ#* J!A R \n k P  /W t  Z U9  WJQ3 W q * 'Os% dbʯC9  Mnr;N P )  Z '1T   * J;   )nY5      9XS#%    Ans %  O- 30 *\\O Ĺlt  0]  6r   ^ - 8   \0J   |r  \nÑ )V   l   )2 @Q)n   K  +)3    '< (M   ] Qsš  AR L I SA b     8s   N]  \" ^  9zW% s] Aɱ  E t I E 1j   IW) i:R 9T   Q5L 	^  y#XM!,   5 x B m @?   G\n  \$	К& B  
c  <  p 6    V i== )M8  0 D  W XD TA  K `P :Ijs    ] !tC1  E2  9  D 6I !bt  X 1   HdzW  5 D I\$ q C ey*Ƒ VO  tƐ   XP  #  4  ( ? A\0A  \" D yvV  @4C(  C@ : t  ;ɳ x 3  (   x 0  O, A    DYb %	jt  D  x   xM:mD/ F{F     6   U3 p e                Nǲ \\o  c( :rC 5ɄJ8| a i+  xq,\\ ř* A qs  .D(  Y\r  \n QP a t   ^'O  > 4V A \$ j (\"q\"V \"  ^@C M  #	ȄJ `ż4  PP . 0ƙ8  [ .   \nA\0P	A C  `X te׼R4`  73 xs J   /  qV+ h 1  	3 \nO  ?g,   pxK8    G  P  ^,h r     @cL2.\0 ! 0  ' j     Z r ֞^ @  0 ( M  :C  W
T   yJ?ÔQ	 V( s	 8c 鐇 \$      2ړm\0s
  h ,AWR  iW\n<) Fz Y1D Y4 #  _ -   -e \n\"N   \$H     ^I   w C `  !    BaL'ƾb  N R |8(ml   E \$1    6%    TpY ` P  H -)#  ^,%b9`   ^   a   0C  >\$\r  _  fi q (L  a  D\"; T*`Z h*    4` q#  Y    
   \"P\\  2T!i C @ CL\\ \n Kf   m   b * !^  w B \r  @: y3L u 	oh _  %\"\\LI-\"\0  '/R=l\"0  u r H *	3
ƭqN	i*  6)%(( )ү0 =W   R,";break;case"zh-tw":$g=" ^  %ӕ\\ r     |%   : \$\ns .e UȸE9PK72 ( P h)ʅ@ 
:i	%  c Je  R)ܫ{  	Nd T P   \\  Õ8 
C  f4    aS@/%    N    Nd %гC  ɗB Q+    B _MK, \$   u  ow f  T9 WK  ʏW    2mizX:P	 *  _/ g*eSLK ۈ  ι^9 H \r   7  Zz>     0)ȿN \n r!U=R \n    ^   J  T O ](  I  ^ܫ ]E J4\$yhr  2^?[  eC r  ^[# k ֑g1'  ) T'9jB)# , %')n䪪 hV   d =Oa @ IBO   s ¦K   J  12A\$ & 8mQd   lY r % \0J ԀD&  H i 8 )^r *  \\gA2 @ 1D   v   i`\\  
>  - 1 IAC er2 : @   ĶH PH   gR  i N(k  ] g1Gʇ9{I q\$   Rz   q   |@  _s ZH\$kW α|C9T  . ' %   ! C ItW\\ B J(d\r i e  G ʲ \$	К& B  
c <  p 6    c \$   ( L@  (@s  J  ʕ   5C DB6    \r   ˕ I6Q0D  ]̱ ^K  8   t   R2. #r	 @  4  Dw  t \n |F\$9t%4ND' VC ]9O a: F @ 2\r H 2 Zƴא B  6 D-i\"!\0 9 0z\r  8a ^  \\0  \0\r    p^2\r p :\r= ^  1H4E D^ K < G(a |B  9 } ݮ z \$pPV F E [  ^Ԑ r ) s 9 tI   Q u p  nz   |  8 \"U < L%    W	2    F	c,   k     ( [d'   H  i\0U  C  8 D xA  M ! q	  L hM4       & Ć {)D(   ^.   @\" 2 \0   u 1  S | H !bj   @XqMJ  T   + OhV+
 \0  9g^5 Tk\r\0 b s) #   =D [ (  d 0  M \0C\naH#\0  [ 0\r 2/\rQ1/ÔK\n  -  T% ę `9 p HᲔX '\$9A5   83 9DP D  S! '   3 ,͗Q /  {>ˁ\0LPP \"	 %  M# <  'E \n<) @@ \n\0 (  ap& h/Ŏ	do d؛L 2 !ZA Ai   ϊ ^| \0 {A*vH  
G ,)  N\r  9  '\nH,  ?   x+ @ @  \r) 1*9HK ITIͪ m @J \ru[R&}	 /cx  F \0# 2\r .   9  ?5 M)C +   D r ETa \n P# pqP9 ]g @5ț) # M  :  y  \0J
 |&J  @ 51=C ڜ  pt N<:=  W D\$ \"ׯ  
  * Vb   (*  \0 ) Bs â \nh r    W 8      :#b YE {Sz % ^  ̪ i fL + 2  ( # ";break;}$wg=array();foreach(explode("\n",lzw_decompress($g))as$X)$wg[]=(strpos($X,"\t")?explode("\t",$X):$X);return$wg;}if(!$wg){$wg=get_translations($ba);$_SESSION["translations"]=$wg;}if(extension_loaded('pdo')){class
Min_PDO{var$_result,$server_info,$affected_rows,$errno,$error,$pdo;function
__construct(){global$b;$Me=array_search("SQL",$b->operators);if($Me!==false)unset($b->operators[$Me]);}function
dsn($Pb,$V,$E,$C=array()){$C[PDO::ATTR_ERRMODE]=PDO::ERRMODE_SILENT;$C[PDO::ATTR_STATEMENT_CLASS]=array('Min_PDOStatement');try{$this->pdo=new
PDO($Pb,$V,$E,$C);}catch(Exception$ec){auth_error(h($ec->getMessage()));}$this->server_info=@$this->pdo->getAttribute(PDO::ATTR_SERVER_VERSION);}function
quote($P){return$this->pdo->quote($P);}function
query($F,$Dg=false){$G=$this->pdo->query($F);$this->error="";if(!$G){list(,$this->errno,$this->error)=$this->pdo->errorInfo();if(!$this->error)$this->error=lang(21);return
false;}$this->store_result($G);return$G;}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result($G=null){if(!$G){$G=$this->_result;if(!$G)return
false;}if($G->columnCount()){$G->num_rows=$G->rowCount();return$G;}$this->affected_rows=$G->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($F,$o=0){$G=$this->query($F);if(!$G)return
false;$I=$G->fetch();return$I[$o];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(PDO::FETCH_ASSOC);}function
fetch_row(){return$this->fetch(PDO::FETCH_NUM);}function
fetch_field(){$I=(object)$this->getColumnMeta($this->_offset++);$I->orgtable=$I->table;$I->orgname=$I->name;$I->charsetnr=(in_array("blob",(array)$I->flags)?63:0);return$I;}}}$Mb=array();function
add_driver($t,$B){global$Mb;$Mb[$t]=$B;}class
Min_SQL{var$_conn;function
__construct($h){$this->_conn=$h;}function
select($Q,$K,$Z,$Jc,$se=array(),$z=1,$D=0,$Re=false){global$b,$x;$pd=(count($Jc)<count($K));$F=$b->selectQueryBuild($K,$Z,$Jc,$se,$z,$D);if(!$F)$F="SELECT".limit(($_GET["page"]!="last"&&$z!=""&&$Jc&&$pd&&$x=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$K)."\nFROM ".table($Q),($Z?"\nWHERE ".implode(" AND ",$Z):"").($Jc&&$pd?"\nGROUP BY ".implode(", ",$Jc):"").($se?"\nORDER BY ".implode(", ",$se):""),($z!=""?+$z:null),($D?$z*$D:0),"\n");$Qf=microtime(true);$H=$this->_conn->query($F);if($Re)echo$b->selectQuery($F,$Qf,!$H);return$H;}function
delete($Q,$Ye,$z=0){$F="FROM ".table($Q);return
queries("DELETE".($z?limit1($Q,$F,$Ye):" $F$Ye"));}function
update($Q,$N,$Ye,$z=0,$L="\n"){$Rg=array();foreach($N
as$y=>$X)$Rg[]="$y = $X";$F=table($Q)." SET$L".implode(",$L",$Rg);return
queries("UPDATE".($z?limit1($Q,$F,$Ye,$L):" $F$Ye"));}function
insert($Q,$N){return
queries("INSERT INTO ".table($Q).($N?" (".implode(", ",array_keys($N)).")\nVALUES (".implode(", ",$N).")":" DEFAULT VALUES"));}function
insertUpdate($Q,$J,$Pe){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}function
slowQuery($F,$kg){}function
convertSearch($u,$X,$o){return$u;}function
value($X,$o){return(method_exists($this->_conn,'value')?$this->_conn->value($X,$o):(is_resource($X)?stream_get_contents($X):$X));}function
quoteBinary($rf){return
q($rf);}function
warnings(){return'';}function
tableHelp($B){}}$Mb["sqlite"]="SQLite 3";$Mb["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
__construct($q){$this->_link=new
SQLite3($q);$Tg=$this->_link->version();$this->server_info=$Tg["versionString"];}function
query($F){$G=@$this->_link->query($F);$this->error="";if(!$G){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($G->numColumns())return
new
Min_Result($G);$this->affected_rows=$this->_link->changes();return
true;}function
quote($P){return(is_utf8($P)?"'".$this->_link->escapeString($P)."'":"x'".reset(unpack('H*',$P))."'");}function
store_result(){return$this->_result;}function
result($F,$o=0){$G=$this->query($F);if(!is_object($G))return
false;$I=$G->_result->fetchArray();return$I[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($G){$this->_result=$G;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$e=$this->_offset++;$T=$this->_result->columnType($e);return(object)array("name"=>$this->_result->columnName($e),"type"=>$T,"charsetnr"=>($T==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
__construct($q){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($q);}function
query($F,$Dg=false){$Vd=($Dg?"unbufferedQuery":"query");$G=@$this->_link->$Vd($F,SQLITE_BOTH,$n);$this->error="";if(!$G){$this->error=$n;return
false;}elseif($G===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($G);}function
quote($P){return"'".sqlite_escape_string($P)."'";}function
store_result(){return$this->_result;}function
result($F,$o=0){$G=$this->query($F);if(!is_object($G))return
false;$I=$G->_result->fetch();return$I[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($G){$this->_result=$G;if(method_exists($G,'numRows'))$this->num_rows=$G->numRows();}function
fetch_assoc(){$I=$this->_result->fetch(SQLITE_ASSOC);if(!$I)return
false;$H=array();foreach($I
as$y=>$X)$H[idf_unescape($y)]=$X;return$H;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$B=$this->_result->fieldName($this->_offset++);$He='(\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($He\\.)?$He\$~",$B,$A)){$Q=($A[3]!=""?$A[3]:idf_unescape($A[2]));$B=($A[5]!=""?$A[5]:idf_unescape($A[4]));}return(object)array("name"=>$B,"orgname"=>$B,"orgtable"=>$Q,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
__construct($q){$this->dsn(DRIVER.":$q","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
__construct(){parent::__construct(":memory:");$this->query("PRAGMA foreign_keys = 1");}function
select_db($q){if(is_readable($q)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$q)?$q:dirname($_SERVER["SCRIPT_FILENAME"])."/$q")." AS a")){parent::__construct($q);$this->query("PRAGMA foreign_keys = 1");$this->query("PRAGMA busy_timeout = 500");return
true;}return
false;}function
multi_query($F){return$this->_result=$this->query($F);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$J,$Pe){$Rg=array();foreach($J
as$N)$Rg[]="(".implode(", ",$N).")";return
queries("REPLACE INTO ".table($Q)." (".implode(", ",array_keys(reset($J))).") VALUES\n".implode(",\n",$Rg));}function
tableHelp($B){if($B=="sqlite_sequence")return"fileformat2.html#seqtab";if($B=="sqlite_master")return"fileformat2.html#$B";}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;list(,,$E)=$b->credentials();if($E!="")return
lang(22);return
new
Min_DB;}function
get_databases(){return
array();}function
limit($F,$Z,$z,$he=0,$L=" "){return" $F$Z".($z!==null?$L."LIMIT $z".($he?" OFFSET $he":""):"");}function
limit1($Q,$F,$Z,$L="\n"){global$h;return(preg_match('~^INTO~',$F)||$h->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($F,$Z,1,0,$L):" $F WHERE rowid = (SELECT rowid FROM ".table($Q).$Z.$L."LIMIT 1)");}function
db_collation($l,$bb){global$h;return$h->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name");}function
count_tables($k){return
array();}function
table_status($B=""){global$h;$H=array();foreach(get_rows("SELECT name AS Name, type AS Engine, 'rowid' AS Oid, '' AS Auto_increment FROM sqlite_master WHERE type IN ('table', 'view') ".($B!=""?"AND name = ".q($B):"ORDER BY name"))as$I){$I["Rows"]=$h->result("SELECT COUNT(*) FROM ".idf_escape($I["Name"]));$H[$I["Name"]]=$I;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$I)$H[$I["name"]]["Auto_increment"]=$I["seq"];return($B!=""?$H[$B]:$H);}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){global$h;return!$h->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($Q){global$h;$H=array();$Pe="";foreach(get_rows("PRAGMA table_info(".table($Q).")")as$I){$B=$I["name"];$T=strtolower($I["type"]);$Db=$I["dflt_value"];$H[$B]=array("field"=>$B,"type"=>(preg_match('~int~i',$T)?"integer":(preg_match('~char|clob|text~i',$T)?"text":(preg_match('~blob~i',$T)?"blob":(preg_match('~real|floa|doub~i',$T)?"real":"numeric")))),"full_type"=>$T,"default"=>(preg_match("~'(.*)'~",$Db,$A)?str_replace("''","'",$A[1]):($Db=="NULL"?null:$Db)),"null"=>!$I["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$I["pk"],);if($I["pk"]){if($Pe!="")$H[$Pe]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$T))$H[$B]["auto_increment"]=true;$Pe=$B;}}$Nf=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$Nf,$Nd,PREG_SET_ORDER);foreach($Nd
as$A){$B=str_replace('""','"',preg_replace('~^"|"$~','',$A[1]));if($H[$B])$H[$B]["collation"]=trim($A[3],"'");}return$H;}function
indexes($Q,$i=null){global$h;if(!is_object($i))$i=$h;$H=array();$Nf=$i->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*"|`[^`]*`)++)~i',$Nf,$A)){$H[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+|(?:`[^`]*+`)+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$A[1],$Nd,PREG_SET_ORDER);foreach($Nd
as$A){$H[""]["columns"][]=idf_unescape($A[2]).$A[4];$H[""]["descs"][]=(preg_match('~DESC~i',$A[5])?'1':null);}}if(!$H){foreach(fields($Q)as$B=>$o){if($o["primary"])$H[""]=array("type"=>"PRIMARY","columns"=>array($B),"lengths"=>array(),"descs"=>array(null));}}$Of=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($Q),$i);foreach(get_rows("PRAGMA index_list(".table($Q).")",$i)as$I){$B=$I["name"];$v=array("type"=>($I["unique"]?"UNIQUE":"INDEX"));$v["lengths"]=array();$v["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($B).")",$i)as$qf){$v["columns"][]=$qf["name"];$v["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($B).' ON '.idf_escape($Q),'~').' \((.*)\)$~i',$Of[$B],$ef)){preg_match_all('/("[^"]*+")+( DESC)?/',$ef[2],$Nd);foreach($Nd[2]as$y=>$X){if($X)$v["descs"][$y]='1';}}if(!$H[""]||$v["type"]!="UNIQUE"||$v["columns"]!=$H[""]["columns"]||$v["descs"]!=$H[""]["descs"]||!preg_match("~^sqlite_~",$B))$H[$B]=$v;}return$H;}function
foreign_keys($Q){$H=array();foreach(get_rows("PRAGMA foreign_key_list(".table($Q).")")as$I){$Cc=&$H[$I["id"]];if(!$Cc)$Cc=$I;$Cc["source"][]=$I["from"];$Cc["target"][]=$I["to"];}return$H;}function
view($B){global$h;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\s+~iU','',$h->result("SELECT sql FROM sqlite_master WHERE name = ".q($B))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($l){return
false;}function
error(){global$h;return
h($h->error);}function
check_sqlite_name($B){global$h;$kc="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($kc)\$~",$B)){$h->error=lang(23,str_replace("|",", ",$kc));return
false;}return
true;}function
create_database($l,$d){global$h;if(file_exists($l)){$h->error=lang(24);return
false;}if(!check_sqlite_name($l))return
false;try{$_=new
Min_SQLite($l);}catch(Exception$ec){$h->error=$ec->getMessage();return
false;}$_->query('PRAGMA encoding = "UTF-8"');$_->query('CREATE TABLE adminer (i)');$_->query('DROP TABLE adminer');return
true;}function
drop_databases($k){global$h;$h->__construct(":memory:");foreach($k
as$l){if(!@unlink($l)){$h->error=lang(24);return
false;}}return
true;}function
rename_database($B,$d){global$h;if(!check_sqlite_name($B))return
false;$h->__construct(":memory:");$h->error=lang(24);return@rename(DB,$B);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($Q,$B,$p,$_c,$gb,$Yb,$d,$Ea,$Ee){global$h;$Ng=($Q==""||$_c);foreach($p
as$o){if($o[0]!=""||!$o[1]||$o[2]){$Ng=true;break;}}$c=array();$xe=array();foreach($p
as$o){if($o[1]){$c[]=($Ng?$o[1]:"ADD ".implode($o[1]));if($o[0]!="")$xe[$o[0]]=$o[1][0];}}if(!$Ng){foreach($c
as$X){if(!queries("ALTER TABLE ".table($Q)." $X"))return
false;}if($Q!=$B&&!queries("ALTER TABLE ".table($Q)." RENAME TO ".table($B)))return
false;}elseif(!recreate_table($Q,$B,$c,$xe,$_c,$Ea))return
false;if($Ea){queries("BEGIN");queries("UPDATE sqlite_sequence SET seq = $Ea WHERE name = ".q($B));if(!$h->affected_rows)queries("INSERT INTO sqlite_sequence (name, seq) VALUES (".q($B).", $Ea)");queries("COMMIT");}return
true;}function
recreate_table($Q,$B,$p,$xe,$_c,$Ea,$w=array()){global$h;if($Q!=""){if(!$p){foreach(fields($Q)as$y=>$o){if($w)$o["auto_increment"]=0;$p[]=process_field($o,$o);$xe[$y]=idf_escape($y);}}$Qe=false;foreach($p
as$o){if($o[6])$Qe=true;}$Ob=array();foreach($w
as$y=>$X){if($X[2]=="DROP"){$Ob[$X[1]]=true;unset($w[$y]);}}foreach(indexes($Q)as$td=>$v){$f=array();foreach($v["columns"]as$y=>$e){if(!$xe[$e])continue
2;$f[]=$xe[$e].($v["descs"][$y]?" DESC":"");}if(!$Ob[$td]){if($v["type"]!="PRIMARY"||!$Qe)$w[]=array($v["type"],$td,$f);}}foreach($w
as$y=>$X){if($X[0]=="PRIMARY"){unset($w[$y]);$_c[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($Q)as$td=>$Cc){foreach($Cc["source"]as$y=>$e){if(!$xe[$e])continue
2;$Cc["source"][$y]=idf_unescape($xe[$e]);}if(!isset($_c[" $td"]))$_c[]=" ".format_foreign_key($Cc);}queries("BEGIN");}foreach($p
as$y=>$o)$p[$y]="  ".implode($o);$p=array_merge($p,array_filter($_c));$eg=($Q==$B?"adminer_$B":$B);if(!queries("CREATE TABLE ".table($eg)." (\n".implode(",\n",$p)."\n)"))return
false;if($Q!=""){if($xe&&!queries("INSERT INTO ".table($eg)." (".implode(", ",$xe).") SELECT ".implode(", ",array_map('idf_escape',array_keys($xe)))." FROM ".table($Q)))return
false;$Bg=array();foreach(triggers($Q)as$_g=>$lg){$zg=trigger($_g);$Bg[]="CREATE TRIGGER ".idf_escape($_g)." ".implode(" ",$lg)." ON ".table($B)."\n$zg[Statement]";}$Ea=$Ea?0:$h->result("SELECT seq FROM sqlite_sequence WHERE name = ".q($Q));if(!queries("DROP TABLE ".table($Q))||($Q==$B&&!queries("ALTER TABLE ".table($eg)." RENAME TO ".table($B)))||!alter_indexes($B,$w))return
false;if($Ea)queries("UPDATE sqlite_sequence SET seq = $Ea WHERE name = ".q($B));foreach($Bg
as$zg){if(!queries($zg))return
false;}queries("COMMIT");}return
true;}function
index_sql($Q,$T,$B,$f){return"CREATE $T ".($T!="INDEX"?"INDEX ":"").idf_escape($B!=""?$B:uniqid($Q."_"))." ON ".table($Q)." $f";}function
alter_indexes($Q,$c){foreach($c
as$Pe){if($Pe[0]=="PRIMARY")return
recreate_table($Q,$Q,array(),array(),array(),0,$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($Q,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($S){return
apply_queries("DELETE FROM",$S);}function
drop_views($Vg){return
apply_queries("DROP VIEW",$Vg);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
move_tables($S,$Vg,$dg){return
false;}function
trigger($B){global$h;if($B=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$u='(?:[^`"\s]+|`[^`]*`|"[^"]*")+';$Ag=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$u\\s*(".implode("|",$Ag["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($u))?\\s+ON\\s*$u\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$h->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($B)),$A);$ge=$A[3];return
array("Timing"=>strtoupper($A[1]),"Event"=>strtoupper($A[2]).($ge?" OF":""),"Of"=>idf_unescape($ge),"Trigger"=>$B,"Statement"=>$A[4],);}function
triggers($Q){$H=array();$Ag=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q))as$I){preg_match('~^CREATE\s+TRIGGER\s*(?:[^`"\s]+|`[^`]*`|"[^"]*")+\s*('.implode("|",$Ag["Timing"]).')\s*(.*?)\s+ON\b~i',$I["sql"],$A);$H[$I["name"]]=array($A[1],$A[2]);}return$H;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
begin(){return
queries("BEGIN");}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ROWID()");}function
explain($h,$F){return$h->query("EXPLAIN QUERY PLAN $F");}function
found_rows($R,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($tf){return
true;}function
create_sql($Q,$Ea,$Uf){global$h;$H=$h->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($Q));foreach(indexes($Q)as$B=>$v){if($B=='')continue;$H.=";\n\n".index_sql($Q,$v['type'],$B,"(".implode(", ",array_map('idf_escape',$v['columns'])).")");}return$H;}function
truncate_sql($Q){return"DELETE FROM ".table($Q);}function
use_sql($j){}function
trigger_sql($Q){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q)));}function
show_variables(){global$h;$H=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$y)$H[$y]=$h->result("PRAGMA $y");return$H;}function
show_status(){$H=array();foreach(get_vals("PRAGMA compile_options")as$qe){list($y,$X)=explode("=",$qe,2);$H[$y]=$X;}return$H;}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
support($oc){return
preg_match('~^(columns|database|drop_col|dump|indexes|descidx|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$oc);}function
driver_config(){$U=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);return
array('possible_drivers'=>array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite"),'jush'=>"sqlite",'types'=>$U,'structured_types'=>array_keys($U),'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL"),'functions'=>array("hex","length","lower","round","unixepoch","upper"),'grouping'=>array("avg","count","count distinct","group_concat","max","min","sum"),'edit_functions'=>array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",)),);}}$Mb["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error,$timeout;function
_error($bc,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($M,$V,$E){global$b;$l=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($M,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($E,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$l!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$Tg=pg_version($this->_link);$this->server_info=$Tg["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($P){return"'".pg_escape_string($this->_link,$P)."'";}function
value($X,$o){return($o["type"]=="bytea"&&$X!==null?pg_unescape_bytea($X):$X);}function
quoteBinary($P){return"'".pg_escape_bytea($this->_link,$P)."'";}function
select_db($j){global$b;if($j==$b->database())return$this->_database;$H=@pg_connect("$this->_string dbname='".addcslashes($j,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($H)$this->_link=$H;return$H;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($F,$Dg=false){$G=@pg_query($this->_link,$F);$this->error="";if(!$G){$this->error=pg_last_error($this->_link);$H=false;}elseif(!pg_num_fields($G)){$this->affected_rows=pg_affected_rows($G);$H=true;}else$H=new
Min_Result($G);if($this->timeout){$this->timeout=0;$this->query("RESET statement_timeout");}return$H;}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$o=0){$G=$this->query($F);if(!$G||!$G->num_rows)return
false;return
pg_fetch_result($G->_result,0,$o);}function
warnings(){return
h(pg_last_notice($this->_link));}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($G){$this->_result=$G;$this->num_rows=pg_num_rows($G);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$e=$this->_offset++;$H=new
stdClass;if(function_exists('pg_field_table'))$H->orgtable=pg_field_table($this->_result,$e);$H->name=pg_field_name($this->_result,$e);$H->orgname=$H->name;$H->type=pg_field_type($this->_result,$e);$H->charsetnr=($H->type=="bytea"?63:0);return$H;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL",$timeout;function
connect($M,$V,$E){global$b;$l=$b->database();$this->dsn("pgsql:host='".str_replace(":","' port='",addcslashes($M,"'\\"))."' client_encoding=utf8 dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",$V,$E);return
true;}function
select_db($j){global$b;return($b->database()==$j);}function
quoteBinary($rf){return
q($rf);}function
query($F,$Dg=false){$H=parent::query($F,$Dg);if($this->timeout){$this->timeout=0;parent::query("RESET statement_timeout");}return$H;}function
warnings(){return'';}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$J,$Pe){global$h;foreach($J
as$N){$Kg=array();$Z=array();foreach($N
as$y=>$X){$Kg[]="$y = $X";if(isset($Pe[idf_unescape($y)]))$Z[]="$y = $X";}if(!(($Z&&queries("UPDATE ".table($Q)." SET ".implode(", ",$Kg)." WHERE ".implode(" AND ",$Z))&&$h->affected_rows)||queries("INSERT INTO ".table($Q)." (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).")")))return
false;}return
true;}function
slowQuery($F,$kg){$this->_conn->query("SET statement_timeout = ".(1000*$kg));$this->_conn->timeout=1000*$kg;return$F;}function
convertSearch($u,$X,$o){return(preg_match('~char|text'.(!preg_match('~LIKE~',$X["op"])?'|date|time(stamp)?|boolean|uuid|'.number_type():'').'~',$o["type"])?$u:"CAST($u AS text)");}function
quoteBinary($rf){return$this->_conn->quoteBinary($rf);}function
warnings(){return$this->_conn->warnings();}function
tableHelp($B){$Fd=array("information_schema"=>"infoschema","pg_catalog"=>"catalog",);$_=$Fd[$_GET["ns"]];if($_)return"$_-".str_replace("_","-",$B).".html";}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b,$U,$Tf;$h=new
Min_DB;$wb=$b->credentials();if($h->connect($wb[0],$wb[1],$wb[2])){if(min_version(9,0,$h)){$h->query("SET application_name = 'Adminer'");if(min_version(9.2,0,$h)){$Tf[lang(25)][]="json";$U["json"]=4294967295;if(min_version(9.4,0,$h)){$Tf[lang(25)][]="jsonb";$U["jsonb"]=4294967295;}}}return$h;}return$h->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database WHERE has_database_privilege(datname, 'CONNECT') ORDER BY datname");}function
limit($F,$Z,$z,$he=0,$L=" "){return" $F$Z".($z!==null?$L."LIMIT $z".($he?" OFFSET $he":""):"");}function
limit1($Q,$F,$Z,$L="\n"){return(preg_match('~^INTO~',$F)?limit($F,$Z,1,0,$L):" $F".(is_view(table_status1($Q))?$Z:" WHERE ctid = (SELECT ctid FROM ".table($Q).$Z.$L."LIMIT 1)"));}function
db_collation($l,$bb){global$h;return$h->result("SELECT datcollate FROM pg_database WHERE datname = ".q($l));}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT user");}function
tables_list(){$F="SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema()";if(support('materializedview'))$F.="
UNION ALL
SELECT matviewname, 'MATERIALIZED VIEW'
FROM pg_matviews
WHERE schemaname = current_schema()";$F.="
ORDER BY 1";return
get_key_vals($F);}function
count_tables($k){return
array();}function
table_status($B=""){$H=array();foreach(get_rows("SELECT c.relname AS \"Name\", CASE c.relkind WHEN 'r' THEN 'table' WHEN 'm' THEN 'materialized view' ELSE 'view' END AS \"Engine\", pg_relation_size(c.oid) AS \"Data_length\", pg_total_relation_size(c.oid) - pg_relation_size(c.oid) AS \"Index_length\", obj_description(c.oid, 'pg_class') AS \"Comment\", ".(min_version(12)?"''":"CASE WHEN c.relhasoids THEN 'oid' ELSE '' END")." AS \"Oid\", c.reltuples as \"Rows\", n.nspname
FROM pg_class c
JOIN pg_namespace n ON(n.nspname = current_schema() AND n.oid = c.relnamespace)
WHERE relkind IN ('r', 'm', 'v', 'f', 'p')
".($B!=""?"AND relname = ".q($B):"ORDER BY relname"))as$I)$H[$I["Name"]]=$I;return($B!=""?$H[$B]:$H);}function
is_view($R){return
in_array($R["Engine"],array("view","materialized view"));}function
fk_support($R){return
true;}function
fields($Q){$H=array();$wa=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, pg_get_expr(d.adbin, d.adrelid) AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment".(min_version(10)?", a.attidentity":"")."
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($Q)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$I){preg_match('~([^([]+)(\((.*)\))?([a-z ]+)?((\[[0-9]*])*)$~',$I["full_type"],$A);list(,$T,$Cd,$I["length"],$sa,$ya)=$A;$I["length"].=$ya;$Ta=$T.$sa;if(isset($wa[$Ta])){$I["type"]=$wa[$Ta];$I["full_type"]=$I["type"].$Cd.$ya;}else{$I["type"]=$T;$I["full_type"]=$I["type"].$Cd.$sa.$ya;}if(in_array($I['attidentity'],array('a','d')))$I['default']='GENERATED '.($I['attidentity']=='d'?'BY DEFAULT':'ALWAYS').' AS IDENTITY';$I["null"]=!$I["attnotnull"];$I["auto_increment"]=$I['attidentity']||preg_match('~^nextval\(~i',$I["default"]);$I["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^,)]+(.*)~',$I["default"],$A))$I["default"]=($A[1]=="NULL"?null:idf_unescape($A[1]).$A[2]);$H[$I["field"]]=$I;}return$H;}function
indexes($Q,$i=null){global$h;if(!is_object($i))$i=$h;$H=array();$bg=$i->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($Q));$f=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $bg AND attnum > 0",$i);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption, (indpred IS NOT NULL)::int as indispartial FROM pg_index i, pg_class ci WHERE i.indrelid = $bg AND ci.oid = i.indexrelid",$i)as$I){$ff=$I["relname"];$H[$ff]["type"]=($I["indispartial"]?"INDEX":($I["indisprimary"]?"PRIMARY":($I["indisunique"]?"UNIQUE":"INDEX")));$H[$ff]["columns"]=array();foreach(explode(" ",$I["indkey"])as$gd)$H[$ff]["columns"][]=$f[$gd];$H[$ff]["descs"]=array();foreach(explode(" ",$I["indoption"])as$hd)$H[$ff]["descs"][]=($hd&1?'1':null);$H[$ff]["lengths"]=array();}return$H;}function
foreign_keys($Q){global$ke;$H=array();foreach(get_rows("SELECT conname, condeferrable::int AS deferrable, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($Q)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$I){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$I['definition'],$A)){$I['source']=array_map('idf_unescape',array_map('trim',explode(',',$A[1])));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$A[2],$Md)){$I['ns']=idf_unescape($Md[2]);$I['table']=idf_unescape($Md[4]);}$I['target']=array_map('idf_unescape',array_map('trim',explode(',',$A[3])));$I['on_delete']=(preg_match("~ON DELETE ($ke)~",$A[4],$Md)?$Md[1]:'NO ACTION');$I['on_update']=(preg_match("~ON UPDATE ($ke)~",$A[4],$Md)?$Md[1]:'NO ACTION');$H[$I['conname']]=$I;}}return$H;}function
constraints($Q){global$ke;$H=array();foreach(get_rows("SELECT conname, consrc
FROM pg_catalog.pg_constraint
INNER JOIN pg_catalog.pg_namespace ON pg_constraint.connamespace = pg_namespace.oid
INNER JOIN pg_catalog.pg_class ON pg_constraint.conrelid = pg_class.oid AND pg_constraint.connamespace = pg_class.relnamespace
WHERE pg_constraint.contype = 'c'
AND conrelid != 0 -- handle only CONSTRAINTs here, not TYPES
AND nspname = current_schema()
AND relname = ".q($Q)."
ORDER BY connamespace, conname")as$I)$H[$I['conname']]=$I['consrc'];return$H;}function
view($B){global$h;return
array("select"=>trim($h->result("SELECT pg_get_viewdef(".$h->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($B)).")")));}function
collations(){return
array();}function
information_schema($l){return($l=="information_schema");}function
error(){global$h;$H=h($h->error);if(preg_match('~^(.*\n)?([^\n]*)\n( *)\^(\n.*)?$~s',$H,$A))$H=$A[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($A[3]).'})(.*)~','\1<b>\2</b>',$A[2]).$A[4];return
nl_br($H);}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).($d?" ENCODING ".idf_escape($d):""));}function
drop_databases($k){global$h;$h->close();return
apply_queries("DROP DATABASE",$k,'idf_escape');}function
rename_database($B,$d){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($B));}function
auto_increment(){return"";}function
alter_table($Q,$B,$p,$_c,$gb,$Yb,$d,$Ea,$Ee){$c=array();$Xe=array();if($Q!=""&&$Q!=$B)$Xe[]="ALTER TABLE ".table($Q)." RENAME TO ".table($B);foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c[]="DROP $e";else{$Qg=$X[5];unset($X[5]);if($o[0]==""){if(isset($X[6]))$X[1]=($X[1]==" bigint"?" big":($X[1]==" smallint"?" small":" "))."serial";$c[]=($Q!=""?"ADD ":"  ").implode($X);if(isset($X[6]))$c[]=($Q!=""?"ADD":" ")." PRIMARY KEY ($X[0])";}else{if($e!=$X[0])$Xe[]="ALTER TABLE ".table($B)." RENAME $e TO $X[0]";$c[]="ALTER $e TYPE$X[1]";if(!$X[6]){$c[]="ALTER $e ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $e ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($o[0]!=""||$Qg!="")$Xe[]="COMMENT ON COLUMN ".table($B).".$X[0] IS ".($Qg!=""?substr($Qg,9):"''");}}$c=array_merge($c,$_c);if($Q=="")array_unshift($Xe,"CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($Xe,"ALTER TABLE ".table($Q)."\n".implode(",\n",$c));if($Q!=""||$gb!="")$Xe[]="COMMENT ON TABLE ".table($B)." IS ".q($gb);if($Ea!=""){}foreach($Xe
as$F){if(!queries($F))return
false;}return
true;}function
alter_indexes($Q,$c){$ub=array();$Nb=array();$Xe=array();foreach($c
as$X){if($X[0]!="INDEX")$ub[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$Nb[]=idf_escape($X[1]);else$Xe[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q)." (".implode(", ",$X[2]).")";}if($ub)array_unshift($Xe,"ALTER TABLE ".table($Q).implode(",",$ub));if($Nb)array_unshift($Xe,"DROP INDEX ".implode(", ",$Nb));foreach($Xe
as$F){if(!queries($F))return
false;}return
true;}function
truncate_tables($S){return
queries("TRUNCATE ".implode(", ",array_map('table',$S)));return
true;}function
drop_views($Vg){return
drop_tables($Vg);}function
drop_tables($S){foreach($S
as$Q){$O=table_status($Q);if(!queries("DROP ".strtoupper($O["Engine"])." ".table($Q)))return
false;}return
true;}function
move_tables($S,$Vg,$dg){foreach(array_merge($S,$Vg)as$Q){$O=table_status($Q);if(!queries("ALTER ".strtoupper($O["Engine"])." ".table($Q)." SET SCHEMA ".idf_escape($dg)))return
false;}return
true;}function
trigger($B,$Q){if($B=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");$f=array();$Z="WHERE trigger_schema = current_schema() AND event_object_table = ".q($Q)." AND trigger_name = ".q($B);foreach(get_rows("SELECT * FROM information_schema.triggered_update_columns $Z")as$I)$f[]=$I["event_object_column"];$H=array();foreach(get_rows('SELECT trigger_name AS "Trigger", action_timing AS "Timing", event_manipulation AS "Event", \'FOR EACH \' || action_orientation AS "Type", action_statement AS "Statement" FROM information_schema.triggers '."$Z ORDER BY event_manipulation DESC")as$I){if($f&&$I["Event"]=="UPDATE")$I["Event"].=" OF";$I["Of"]=implode(", ",$f);if($H)$I["Event"].=" OR $H[Event]";$H=$I;}return$H;}function
triggers($Q){$H=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE trigger_schema = current_schema() AND event_object_table = ".q($Q))as$I){$zg=trigger($I["trigger_name"],$Q);$H[$zg["Trigger"]]=array($zg["Timing"],$zg["Event"]);}return$H;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE","INSERT OR UPDATE","INSERT OR UPDATE OF","DELETE OR INSERT","DELETE OR UPDATE","DELETE OR UPDATE OF","DELETE OR INSERT OR UPDATE","DELETE OR INSERT OR UPDATE OF"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routine($B,$T){$J=get_rows('SELECT routine_definition AS definition, LOWER(external_language) AS language, *
FROM information_schema.routines
WHERE routine_schema = current_schema() AND specific_name = '.q($B));$H=$J[0];$H["returns"]=array("type"=>$H["type_udt_name"]);$H["fields"]=get_rows('SELECT parameter_name AS field, data_type AS type, character_maximum_length AS length, parameter_mode AS inout
FROM information_schema.parameters
WHERE specific_schema = current_schema() AND specific_name = '.q($B).'
ORDER BY ordinal_position');return$H;}function
routines(){return
get_rows('SELECT specific_name AS "SPECIFIC_NAME", routine_type AS "ROUTINE_TYPE", routine_name AS "ROUTINE_NAME", type_udt_name AS "DTD_IDENTIFIER"
FROM information_schema.routines
WHERE routine_schema = current_schema()
ORDER BY SPECIFIC_NAME');}function
routine_languages(){return
get_vals("SELECT LOWER(lanname) FROM pg_catalog.pg_language");}function
routine_id($B,$I){$H=array();foreach($I["fields"]as$o)$H[]=$o["type"];return
idf_escape($B)."(".implode(", ",$H).")";}function
last_id(){return
0;}function
explain($h,$F){return$h->query("EXPLAIN $F");}function
found_rows($R,$Z){global$h;if(preg_match("~ rows=([0-9]+)~",$h->result("EXPLAIN SELECT * FROM ".idf_escape($R["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$ef))return$ef[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$h;return$h->result("SELECT current_schema()");}function
set_schema($sf,$i=null){global$h,$U,$Tf;if(!$i)$i=$h;$H=$i->query("SET search_path TO ".idf_escape($sf));foreach(types()as$T){if(!isset($U[$T])){$U[$T]=0;$Tf[lang(26)][]=$T;}}return$H;}function
foreign_keys_sql($Q){$H="";$O=table_status($Q);$xc=foreign_keys($Q);ksort($xc);foreach($xc
as$wc=>$vc)$H.="ALTER TABLE ONLY ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." ADD CONSTRAINT ".idf_escape($wc)." $vc[definition] ".($vc['deferrable']?'DEFERRABLE':'NOT DEFERRABLE').";\n";return($H?"$H\n":$H);}function
create_sql($Q,$Ea,$Uf){global$h;$H='';$of=array();$Af=array();$O=table_status($Q);if(is_view($O)){$Ug=view($Q);return
rtrim("CREATE VIEW ".idf_escape($Q)." AS $Ug[select]",";");}$p=fields($Q);$w=indexes($Q);ksort($w);$pb=constraints($Q);if(!$O||empty($p))return
false;$H="CREATE TABLE ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." (\n    ";foreach($p
as$pc=>$o){$De=idf_escape($o['field']).' '.$o['full_type'].default_value($o).($o['attnotnull']?" NOT NULL":"");$of[]=$De;if(preg_match('~nextval\(\'([^\']+)\'\)~',$o['default'],$Nd)){$_f=$Nd[1];$Mf=reset(get_rows(min_version(10)?"SELECT *, cache_size AS cache_value FROM pg_sequences WHERE schemaname = current_schema() AND sequencename = ".q($_f):"SELECT * FROM $_f"));$Af[]=($Uf=="DROP+CREATE"?"DROP SEQUENCE IF EXISTS $_f;\n":"")."CREATE SEQUENCE $_f INCREMENT $Mf[increment_by] MINVALUE $Mf[min_value] MAXVALUE $Mf[max_value]".($Ea&&$Mf['last_value']?" START $Mf[last_value]":"")." CACHE $Mf[cache_value];";}}if(!empty($Af))$H=implode("\n\n",$Af)."\n\n$H";foreach($w
as$bd=>$v){switch($v['type']){case'UNIQUE':$of[]="CONSTRAINT ".idf_escape($bd)." UNIQUE (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;case'PRIMARY':$of[]="CONSTRAINT ".idf_escape($bd)." PRIMARY KEY (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;}}foreach($pb
as$lb=>$nb)$of[]="CONSTRAINT ".idf_escape($lb)." CHECK $nb";$H.=implode(",\n    ",$of)."\n) WITH (oids = ".($O['Oid']?'true':'false').");";foreach($w
as$bd=>$v){if($v['type']=='INDEX'){$f=array();foreach($v['columns']as$y=>$X)$f[]=idf_escape($X).($v['descs'][$y]?" DESC":"");$H.="\n\nCREATE INDEX ".idf_escape($bd)." ON ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." USING btree (".implode(', ',$f).");";}}if($O['Comment'])$H.="\n\nCOMMENT ON TABLE ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." IS ".q($O['Comment']).";";foreach($p
as$pc=>$o){if($o['comment'])$H.="\n\nCOMMENT ON COLUMN ".idf_escape($O['nspname']).".".idf_escape($O['Name']).".".idf_escape($pc)." IS ".q($o['comment']).";";}return
rtrim($H,';');}function
truncate_sql($Q){return"TRUNCATE ".table($Q);}function
trigger_sql($Q){$O=table_status($Q);$H="";foreach(triggers($Q)as$yg=>$xg){$zg=trigger($yg,$O['Name']);$H.="\nCREATE TRIGGER ".idf_escape($zg['Trigger'])." $zg[Timing] $zg[Event] ON ".idf_escape($O["nspname"]).".".idf_escape($O['Name'])." $zg[Type] $zg[Statement];;\n";}return$H;}function
use_sql($j){return"\connect ".idf_escape($j);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".(min_version(9.2)?"pid":"procpid"));}function
show_status(){}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
support($oc){return
preg_match('~^(database|table|columns|sql|indexes|descidx|comment|view|'.(min_version(9.3)?'materializedview|':'').'scheme|routine|processlist|sequence|trigger|type|variables|drop_col|kill|dump)$~',$oc);}function
kill_process($X){return
queries("SELECT pg_terminate_backend(".number($X).")");}function
connection_id(){return"SELECT pg_backend_pid()";}function
max_connections(){global$h;return$h->result("SHOW max_connections");}function
driver_config(){$U=array();$Tf=array();foreach(array(lang(27)=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),lang(28)=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),lang(25)=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),lang(29)=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),lang(30)=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),lang(31)=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$y=>$X){$U+=$X;$Tf[$y]=array_keys($X);}return
array('possible_drivers'=>array("PgSQL","PDO_PgSQL"),'jush'=>"pgsql",'types'=>$U,'structured_types'=>$Tf,'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL"),'functions'=>array("char_length","lower","round","to_hex","to_timestamp","upper"),'grouping'=>array("avg","count","count distinct","max","min","sum"),'edit_functions'=>array(array("char"=>"md5","date|time"=>"now",),array(number_type()=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",)),);}}$Mb["oracle"]="Oracle (beta)";if(isset($_GET["oracle"])){define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;var$_current_db;function
_error($bc,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($M,$V,$E){$this->_link=@oci_new_connect($V,$E,$M,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$n=oci_error();$this->error=$n["message"];return
false;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){$this->_current_db=$j;return
true;}function
query($F,$Dg=false){$G=oci_parse($this->_link,$F);$this->error="";if(!$G){$n=oci_error($this->_link);$this->errno=$n["code"];$this->error=$n["message"];return
false;}set_error_handler(array($this,'_error'));$H=@oci_execute($G);restore_error_handler();if($H){if(oci_num_fields($G))return
new
Min_Result($G);$this->affected_rows=oci_num_rows($G);oci_free_statement($G);}return$H;}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$o=1){$G=$this->query($F);if(!is_object($G)||!oci_fetch($G->_result))return
false;return
oci_result($G->_result,$o);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
__construct($G){$this->_result=$G;}function
_convert($I){foreach((array)$I
as$y=>$X){if(is_a($X,'OCI-Lob'))$I[$y]=$X->load();}return$I;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$e=$this->_offset++;$H=new
stdClass;$H->name=oci_field_name($this->_result,$e);$H->orgname=$H->name;$H->type=oci_field_type($this->_result,$e);$H->charsetnr=(preg_match("~raw|blob|bfile~",$H->type)?63:0);return$H;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";var$_current_db;function
connect($M,$V,$E){$this->dsn("oci:dbname=//$M;charset=AL32UTF8",$V,$E);return
true;}function
select_db($j){$this->_current_db=$j;return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}function
insertUpdate($Q,$J,$Pe){global$h;foreach($J
as$N){$Kg=array();$Z=array();foreach($N
as$y=>$X){$Kg[]="$y = $X";if(isset($Pe[idf_unescape($y)]))$Z[]="$y = $X";}if(!(($Z&&queries("UPDATE ".table($Q)." SET ".implode(", ",$Kg)." WHERE ".implode(" AND ",$Z))&&$h->affected_rows)||queries("INSERT INTO ".table($Q)." (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).")")))return
false;}return
true;}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;$h=new
Min_DB;$wb=$b->credentials();if($h->connect($wb[0],$wb[1],$wb[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces ORDER BY 1");}function
limit($F,$Z,$z,$he=0,$L=" "){return($he?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $F$Z) t WHERE rownum <= ".($z+$he).") WHERE rnum > $he":($z!==null?" * FROM (SELECT $F$Z) WHERE rownum <= ".($z+$he):" $F$Z"));}function
limit1($Q,$F,$Z,$L="\n"){return" $F$Z";}function
db_collation($l,$bb){global$h;return$h->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT USER FROM DUAL");}function
get_current_db(){global$h;$l=$h->_current_db?$h->_current_db:DB;unset($h->_current_db);return$l;}function
where_owner($Oe,$ze="owner"){if(!$_GET["ns"])return'';return"$Oe$ze = sys_context('USERENV', 'CURRENT_SCHEMA')";}function
views_table($f){$ze=where_owner('');return"(SELECT $f FROM all_views WHERE ".($ze?$ze:"rownum < 0").")";}function
tables_list(){$Ug=views_table("view_name");$ze=where_owner(" AND ");return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."$ze
UNION SELECT view_name, 'view' FROM $Ug
ORDER BY 1");}function
count_tables($k){global$h;$H=array();foreach($k
as$l)$H[$l]=$h->result("SELECT COUNT(*) FROM all_tables WHERE tablespace_name = ".q($l));return$H;}function
table_status($B=""){$H=array();$uf=q($B);$l=get_current_db();$Ug=views_table("view_name");$ze=where_owner(" AND ");foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q($l).$ze.($B!=""?" AND table_name = $uf":"")."
UNION SELECT view_name, 'view', 0, 0 FROM $Ug".($B!=""?" WHERE view_name = $uf":"")."
ORDER BY 1")as$I){if($B!="")return$I;$H[$I["Name"]]=$I;}return$H;}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){return
true;}function
fields($Q){$H=array();$ze=where_owner(" AND ");foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($Q)."$ze ORDER BY column_id")as$I){$T=$I["DATA_TYPE"];$Cd="$I[DATA_PRECISION],$I[DATA_SCALE]";if($Cd==",")$Cd=$I["CHAR_COL_DECL_LENGTH"];$H[$I["COLUMN_NAME"]]=array("field"=>$I["COLUMN_NAME"],"full_type"=>$T.($Cd?"($Cd)":""),"type"=>strtolower($T),"length"=>$Cd,"default"=>$I["DATA_DEFAULT"],"null"=>($I["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$H;}function
indexes($Q,$i=null){$H=array();$ze=where_owner(" AND ","aic.table_owner");foreach(get_rows("SELECT aic.*, ac.constraint_type, atc.data_default
FROM all_ind_columns aic
LEFT JOIN all_constraints ac ON aic.index_name = ac.constraint_name AND aic.table_name = ac.table_name AND aic.index_owner = ac.owner
LEFT JOIN all_tab_cols atc ON aic.column_name = atc.column_name AND aic.table_name = atc.table_name AND aic.index_owner = atc.owner
WHERE aic.table_name = ".q($Q)."$ze
ORDER BY ac.constraint_type, aic.column_position",$i)as$I){$bd=$I["INDEX_NAME"];$eb=$I["DATA_DEFAULT"];$eb=($eb?trim($eb,'"'):$I["COLUMN_NAME"]);$H[$bd]["type"]=($I["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($I["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$H[$bd]["columns"][]=$eb;$H[$bd]["lengths"][]=($I["CHAR_LENGTH"]&&$I["CHAR_LENGTH"]!=$I["COLUMN_LENGTH"]?$I["CHAR_LENGTH"]:null);$H[$bd]["descs"][]=($I["DESCEND"]&&$I["DESCEND"]=="DESC"?'1':null);}return$H;}function
view($B){$Ug=views_table("view_name, text");$J=get_rows('SELECT text "select" FROM '.$Ug.' WHERE view_name = '.q($B));return
reset($J);}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$h;return
h($h->error);}function
explain($h,$F){$h->query("EXPLAIN PLAN FOR $F");return$h->query("SELECT * FROM plan_table");}function
found_rows($R,$Z){}function
auto_increment(){return"";}function
alter_table($Q,$B,$p,$_c,$gb,$Yb,$d,$Ea,$Ee){$c=$Nb=array();$ve=($Q?fields($Q):array());foreach($p
as$o){$X=$o[1];if($X&&$o[0]!=""&&idf_escape($o[0])!=$X[0])queries("ALTER TABLE ".table($Q)." RENAME COLUMN ".idf_escape($o[0])." TO $X[0]");$ue=$ve[$o[0]];if($X&&$ue){$je=process_field($ue,$ue);if($X[2]==$je[2])$X[2]="";}if($X)$c[]=($Q!=""?($o[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($Q!=""?")":"");else$Nb[]=idf_escape($o[0]);}if($Q=="")return
queries("CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($Q)."\n".implode("\n",$c)))&&(!$Nb||queries("ALTER TABLE ".table($Q)." DROP (".implode(", ",$Nb).")"))&&($Q==$B||queries("ALTER TABLE ".table($Q)." RENAME TO ".table($B)));}function
alter_indexes($Q,$c){$Nb=array();$Xe=array();foreach($c
as$X){if($X[0]!="INDEX"){$X[2]=preg_replace('~ DESC$~','',$X[2]);$ub=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");array_unshift($Xe,"ALTER TABLE ".table($Q).$ub);}elseif($X[2]=="DROP")$Nb[]=idf_escape($X[1]);else$Xe[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q)." (".implode(", ",$X[2]).")";}if($Nb)array_unshift($Xe,"DROP INDEX ".implode(", ",$Nb));foreach($Xe
as$F){if(!queries($F))return
false;}return
true;}function
foreign_keys($Q){$H=array();$F="SELECT c_list.CONSTRAINT_NAME as NAME,
c_src.COLUMN_NAME as SRC_COLUMN,
c_dest.OWNER as DEST_DB,
c_dest.TABLE_NAME as DEST_TABLE,
c_dest.COLUMN_NAME as DEST_COLUMN,
c_list.DELETE_RULE as ON_DELETE
FROM ALL_CONSTRAINTS c_list, ALL_CONS_COLUMNS c_src, ALL_CONS_COLUMNS c_dest
WHERE c_list.CONSTRAINT_NAME = c_src.CONSTRAINT_NAME
AND c_list.R_CONSTRAINT_NAME = c_dest.CONSTRAINT_NAME
AND c_list.CONSTRAINT_TYPE = 'R'
AND c_src.TABLE_NAME = ".q($Q);foreach(get_rows($F)as$I)$H[$I['NAME']]=array("db"=>$I['DEST_DB'],"table"=>$I['DEST_TABLE'],"source"=>array($I['SRC_COLUMN']),"target"=>array($I['DEST_COLUMN']),"on_delete"=>$I['ON_DELETE'],"on_update"=>null,);return$H;}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Vg){return
apply_queries("DROP VIEW",$Vg);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
last_id(){return
0;}function
schemas(){$H=get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX')) ORDER BY 1");return($H?$H:get_vals("SELECT DISTINCT owner FROM all_tables WHERE tablespace_name = ".q(DB)." ORDER BY 1"));}function
get_schema(){global$h;return$h->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($tf,$i=null){global$h;if(!$i)$i=$h;return$i->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($tf));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$J=get_rows('SELECT * FROM v$instance');return
reset($J);}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
support($oc){return
preg_match('~^(columns|database|drop_col|indexes|descidx|processlist|scheme|sql|status|table|variables|view)$~',$oc);}function
driver_config(){$U=array();$Tf=array();foreach(array(lang(27)=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),lang(28)=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),lang(25)=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),lang(29)=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$y=>$X){$U+=$X;$Tf[$y]=array_keys($X);}return
array('possible_drivers'=>array("OCI8","PDO_OCI"),'jush'=>"oracle",'types'=>$U,'structured_types'=>$Tf,'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL"),'functions'=>array("length","lower","round","upper"),'grouping'=>array("avg","count","count distinct","max","min","sum"),'edit_functions'=>array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",)),);}}$Mb["mssql"]="MS SQL (beta)";if(isset($_GET["mssql"])){define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$n){$this->errno=$n["code"];$this->error.="$n[message]\n";}$this->error=rtrim($this->error);}function
connect($M,$V,$E){global$b;$l=$b->database();$mb=array("UID"=>$V,"PWD"=>$E,"CharacterSet"=>"UTF-8");if($l!="")$mb["Database"]=$l;$this->_link=@sqlsrv_connect(preg_replace('~:~',',',$M),$mb);if($this->_link){$id=sqlsrv_server_info($this->_link);$this->server_info=$id['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($F,$Dg=false){$G=sqlsrv_query($this->_link,$F);$this->error="";if(!$G){$this->_get_error();return
false;}return$this->store_result($G);}function
multi_query($F){$this->_result=sqlsrv_query($this->_link,$F);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($G=null){if(!$G)$G=$this->_result;if(!$G)return
false;if(sqlsrv_field_metadata($G))return
new
Min_Result($G);$this->affected_rows=sqlsrv_rows_affected($G);return
true;}function
next_result(){return$this->_result?sqlsrv_next_result($this->_result):null;}function
result($F,$o=0){$G=$this->query($F);if(!is_object($G))return
false;$I=$G->fetch_row();return$I[$o];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($G){$this->_result=$G;}function
_convert($I){foreach((array)$I
as$y=>$X){if(is_a($X,'DateTime'))$I[$y]=$X->format("Y-m-d H:i:s");}return$I;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$o=$this->_fields[$this->_offset++];$H=new
stdClass;$H->name=$o["Name"];$H->orgname=$o["Name"];$H->type=($o["Type"]==1?254:0);return$H;}function
seek($he){for($s=0;$s<$he;$s++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($M,$V,$E){$this->_link=@mssql_connect($M,$V,$E);if($this->_link){$G=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");if($G){$I=$G->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$I[0]] $I[1]";}}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){return
mssql_select_db($j);}function
query($F,$Dg=false){$G=@mssql_query($F,$this->_link);$this->error="";if(!$G){$this->error=mssql_get_last_message();return
false;}if($G===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($G);}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result->_result);}function
result($F,$o=0){$G=$this->query($F);if(!is_object($G))return
false;return
mssql_result($G->_result,0,$o);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($G){$this->_result=$G;$this->num_rows=mssql_num_rows($G);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$H=mssql_fetch_field($this->_result);$H->orgtable=$H->table;$H->orgname=$H->name;return$H;}function
seek($he){mssql_data_seek($this->_result,$he);}function
__destruct(){mssql_free_result($this->_result);}}}elseif(extension_loaded("pdo_dblib")){class
Min_DB
extends
Min_PDO{var$extension="PDO_DBLIB";function
connect($M,$V,$E){$this->dsn("dblib:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$M)),$V,$E);return
true;}function
select_db($j){return$this->query("USE ".idf_escape($j));}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$J,$Pe){foreach($J
as$N){$Kg=array();$Z=array();foreach($N
as$y=>$X){$Kg[]="$y = $X";if(isset($Pe[idf_unescape($y)]))$Z[]="$y = $X";}if(!queries("MERGE ".table($Q)." USING (VALUES(".implode(", ",$N).")) AS source (c".implode(", c",range(1,count($N))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Kg)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($u){return"[".str_replace("]","]]",$u)."]";}function
table($u){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($u);}function
connect(){global$b;$h=new
Min_DB;$wb=$b->credentials();if($h->connect($wb[0],$wb[1],$wb[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("SELECT name FROM sys.databases WHERE name NOT IN ('master', 'tempdb', 'model', 'msdb')");}function
limit($F,$Z,$z,$he=0,$L=" "){return($z!==null?" TOP (".($z+$he).")":"")." $F$Z";}function
limit1($Q,$F,$Z,$L="\n"){return
limit($F,$Z,1,0,$L);}function
db_collation($l,$bb){global$h;return$h->result("SELECT collation_name FROM sys.databases WHERE name = ".q($l));}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($k){global$h;$H=array();foreach($k
as$l){$h->select_db($l);$H[$l]=$h->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$H;}function
table_status($B=""){$H=array();foreach(get_rows("SELECT ao.name AS Name, ao.type_desc AS Engine, (SELECT value FROM fn_listextendedproperty(default, 'SCHEMA', schema_name(schema_id), 'TABLE', ao.name, null, null)) AS Comment FROM sys.all_objects AS ao WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($B!=""?"AND name = ".q($B):"ORDER BY name"))as$I){if($B!="")return$I;$H[$I["Name"]]=$I;}return$H;}function
is_view($R){return$R["Engine"]=="VIEW";}function
fk_support($R){return
true;}function
fields($Q){$hb=get_key_vals("SELECT objname, cast(value as varchar(max)) FROM fn_listextendedproperty('MS_DESCRIPTION', 'schema', ".q(get_schema()).", 'table', ".q($Q).", 'column', NULL)");$H=array();foreach(get_rows("SELECT c.max_length, c.precision, c.scale, c.name, c.is_nullable, c.is_identity, c.collation_name, t.name type, CAST(d.definition as text) [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($Q))as$I){$T=$I["type"];$Cd=(preg_match("~char|binary~",$T)?$I["max_length"]:($T=="decimal"?"$I[precision],$I[scale]":""));$H[$I["name"]]=array("field"=>$I["name"],"full_type"=>$T.($Cd?"($Cd)":""),"type"=>$T,"length"=>$Cd,"default"=>$I["default"],"null"=>$I["is_nullable"],"auto_increment"=>$I["is_identity"],"collation"=>$I["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$I["is_identity"],"comment"=>$hb[$I["name"]],);}return$H;}function
indexes($Q,$i=null){$H=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($Q),$i)as$I){$B=$I["name"];$H[$B]["type"]=($I["is_primary_key"]?"PRIMARY":($I["is_unique"]?"UNIQUE":"INDEX"));$H[$B]["lengths"]=array();$H[$B]["columns"][$I["key_ordinal"]]=$I["column_name"];$H[$B]["descs"][$I["key_ordinal"]]=($I["is_descending_key"]?'1':null);}return$H;}function
view($B){global$h;return
array("select"=>preg_replace('~^(?:[^[]|\[[^]]*])*\s+AS\s+~isU','',$h->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($B))));}function
collations(){$H=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$d)$H[preg_replace('~_.*~','',$d)][]=$d;return$H;}function
information_schema($l){return
false;}function
error(){global$h;return
nl_br(h(preg_replace('~^(\[[^]]*])+~m','',$h->error)));}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).(preg_match('~^[a-z0-9_]+$~i',$d)?" COLLATE $d":""));}function
drop_databases($k){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$k)));}function
rename_database($B,$d){if(preg_match('~^[a-z0-9_]+$~i',$d))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $d");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($B));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".number($_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($Q,$B,$p,$_c,$gb,$Yb,$d,$Ea,$Ee){$c=array();$hb=array();foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c["DROP"][]=" COLUMN $e";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~",'\1\2',$X[1]);$hb[$o[0]]=$X[5];unset($X[5]);if($o[0]=="")$c["ADD"][]="\n  ".implode("",$X).($Q==""?substr($_c[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($e!=$X[0])queries("EXEC sp_rename ".q(table($Q).".$e").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($Q=="")return
queries("CREATE TABLE ".table($B)." (".implode(",",(array)$c["ADD"])."\n)");if($Q!=$B)queries("EXEC sp_rename ".q(table($Q)).", ".q($B));if($_c)$c[""]=$_c;foreach($c
as$y=>$X){if(!queries("ALTER TABLE ".idf_escape($B)." $y".implode(",",$X)))return
false;}foreach($hb
as$y=>$X){$gb=substr($X,9);queries("EXEC sp_dropextendedproperty @name = N'MS_Description', @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table', @level1name = ".q($B).", @level2type = N'Column', @level2name = ".q($y));queries("EXEC sp_addextendedproperty @name = N'MS_Description', @value = ".$gb.", @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table', @level1name = ".q($B).", @level2type = N'Column', @level2name = ".q($y));}return
true;}function
alter_indexes($Q,$c){$v=array();$Nb=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$Nb[]=idf_escape($X[1]);else$v[]=idf_escape($X[1])." ON ".table($Q);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q):"ALTER TABLE ".table($Q)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$v||queries("DROP INDEX ".implode(", ",$v)))&&(!$Nb||queries("ALTER TABLE ".table($Q)." DROP ".implode(", ",$Nb)));}function
last_id(){global$h;return$h->result("SELECT SCOPE_IDENTITY()");}function
explain($h,$F){$h->query("SET SHOWPLAN_ALL ON");$H=$h->query($F);$h->query("SET SHOWPLAN_ALL OFF");return$H;}function
found_rows($R,$Z){}function
foreign_keys($Q){$H=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($Q))as$I){$Cc=&$H[$I["FK_NAME"]];$Cc["db"]=$I["PKTABLE_QUALIFIER"];$Cc["table"]=$I["PKTABLE_NAME"];$Cc["source"][]=$I["FKCOLUMN_NAME"];$Cc["target"][]=$I["PKCOLUMN_NAME"];}return$H;}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Vg){return
queries("DROP VIEW ".implode(", ",array_map('table',$Vg)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$Vg,$dg){return
apply_queries("ALTER SCHEMA ".idf_escape($dg)." TRANSFER",array_merge($S,$Vg));}function
trigger($B){if($B=="")return
array();$J=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($B));$H=reset($J);if($H)$H["Statement"]=preg_replace('~^.+\s+AS\s+~isU','',$H["text"]);return$H;}function
triggers($Q){$H=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($Q))as$I)$H[$I["name"]]=array($I["Timing"],$I["Event"]);return$H;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$h;if($_GET["ns"]!="")return$_GET["ns"];return$h->result("SELECT SCHEMA_NAME()");}function
set_schema($sf){return
true;}function
use_sql($j){return"USE ".idf_escape($j);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
support($oc){return
preg_match('~^(comment|columns|database|drop_col|indexes|descidx|scheme|sql|table|trigger|view|view_trigger)$~',$oc);}function
driver_config(){$U=array();$Tf=array();foreach(array(lang(27)=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),lang(28)=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),lang(25)=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),lang(29)=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$y=>$X){$U+=$X;$Tf[$y]=array_keys($X);}return
array('possible_drivers'=>array("SQLSRV","MSSQL","PDO_DBLIB"),'jush'=>"mssql",'types'=>$U,'structured_types'=>$Tf,'unsigned'=>array(),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL"),'functions'=>array("len","lower","round","upper"),'grouping'=>array("avg","count","count distinct","max","min","sum"),'edit_functions'=>array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",)),);}}$Mb["mongo"]="MongoDB (alpha)";if(isset($_GET["mongo"])){define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$server_info=MongoClient::VERSION,$error,$last_id,$_link,$_db;function
connect($Lg,$C){try{$this->_link=new
MongoClient($Lg,$C);if($C["password"]!=""){$C["password"]="";try{new
MongoClient($Lg,$C);$this->error=lang(22);}catch(Exception$Qb){}}}catch(Exception$Qb){$this->error=$Qb->getMessage();}}function
query($F){return
false;}function
select_db($j){try{$this->_db=$this->_link->selectDB($j);return
true;}catch(Exception$ec){$this->error=$ec->getMessage();return
false;}}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($G){foreach($G
as$rd){$I=array();foreach($rd
as$y=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$y]=63;$I[$y]=(is_a($X,'MongoId')?"ObjectId(\"$X\")":(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?"$X":(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$I;foreach($I
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$I=current($this->_rows);if(!$I)return$I;$H=array();foreach($this->_rows[0]as$y=>$X)$H[$y]=$I[$y];next($this->_rows);return$H;}function
fetch_row(){$H=$this->fetch_assoc();if(!$H)return$H;return
array_values($H);}function
fetch_field(){$ud=array_keys($this->_rows[0]);$B=$ud[$this->_offset++];return(object)array('name'=>$B,'charsetnr'=>$this->_charset[$B],);}}class
Min_Driver
extends
Min_SQL{public$Pe="_id";function
select($Q,$K,$Z,$Jc,$se=array(),$z=1,$D=0,$Re=false){$K=($K==array("*")?array():array_fill_keys($K,true));$Jf=array();foreach($se
as$X){$X=preg_replace('~ DESC$~','',$X,1,$sb);$Jf[$X]=($sb?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($Q)->find(array(),$K)->sort($Jf)->limit($z!=""?+$z:0)->skip($D*$z));}function
insert($Q,$N){try{$H=$this->_conn->_db->selectCollection($Q)->insert($N);$this->_conn->errno=$H['code'];$this->_conn->error=$H['err'];$this->_conn->last_id=$N['_id'];return!$H['err'];}catch(Exception$ec){$this->_conn->error=$ec->getMessage();return
false;}}}function
get_databases($yc){global$h;$H=array();$Bb=$h->_link->listDBs();foreach($Bb['databases']as$l)$H[]=$l['name'];return$H;}function
count_tables($k){global$h;$H=array();foreach($k
as$l)$H[$l]=count($h->_link->selectDB($l)->getCollectionNames(true));return$H;}function
tables_list(){global$h;return
array_fill_keys($h->_db->getCollectionNames(true),'table');}function
drop_databases($k){global$h;foreach($k
as$l){$kf=$h->_link->selectDB($l)->drop();if(!$kf['ok'])return
false;}return
true;}function
indexes($Q,$i=null){global$h;$H=array();foreach($h->_db->selectCollection($Q)->getIndexInfo()as$v){$Hb=array();foreach($v["key"]as$e=>$T)$Hb[]=($T==-1?'1':null);$H[$v["name"]]=array("type"=>($v["name"]=="_id_"?"PRIMARY":($v["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($v["key"]),"lengths"=>array(),"descs"=>$Hb,);}return$H;}function
fields($Q){return
fields_from_edit();}function
found_rows($R,$Z){global$h;return$h->_db->selectCollection($_GET["select"])->count($Z);}$pe=array("=");}elseif(class_exists('MongoDB\Driver\Manager')){class
Min_DB{var$extension="MongoDB",$server_info=MONGODB_VERSION,$affected_rows,$error,$last_id;var$_link;var$_db,$_db_name;function
connect($Lg,$C){$Xa='MongoDB\Driver\Manager';$this->_link=new$Xa($Lg,$C);$this->executeCommand('admin',array('ping'=>1));}function
executeCommand($l,$fb){$Xa='MongoDB\Driver\Command';try{return$this->_link->executeCommand($l,new$Xa($fb));}catch(Exception$Qb){$this->error=$Qb->getMessage();return
array();}}function
executeBulkWrite($be,$Qa,$tb){try{$nf=$this->_link->executeBulkWrite($be,$Qa);$this->affected_rows=$nf->$tb();return
true;}catch(Exception$Qb){$this->error=$Qb->getMessage();return
false;}}function
query($F){return
false;}function
select_db($j){$this->_db_name=$j;return
true;}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($G){foreach($G
as$rd){$I=array();foreach($rd
as$y=>$X){if(is_a($X,'MongoDB\BSON\Binary'))$this->_charset[$y]=63;$I[$y]=(is_a($X,'MongoDB\BSON\ObjectID')?'MongoDB\BSON\ObjectID("'."$X\")":(is_a($X,'MongoDB\BSON\UTCDatetime')?$X->toDateTime()->format('Y-m-d H:i:s'):(is_a($X,'MongoDB\BSON\Binary')?$X->getData():(is_a($X,'MongoDB\BSON\Regex')?"$X":(is_object($X)||is_array($X)?json_encode($X,256):$X)))));}$this->_rows[]=$I;foreach($I
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$I=current($this->_rows);if(!$I)return$I;$H=array();foreach($this->_rows[0]as$y=>$X)$H[$y]=$I[$y];next($this->_rows);return$H;}function
fetch_row(){$H=$this->fetch_assoc();if(!$H)return$H;return
array_values($H);}function
fetch_field(){$ud=array_keys($this->_rows[0]);$B=$ud[$this->_offset++];return(object)array('name'=>$B,'charsetnr'=>$this->_charset[$B],);}}class
Min_Driver
extends
Min_SQL{public$Pe="_id";function
select($Q,$K,$Z,$Jc,$se=array(),$z=1,$D=0,$Re=false){global$h;$K=($K==array("*")?array():array_fill_keys($K,1));if(count($K)&&!isset($K['_id']))$K['_id']=0;$Z=where_to_query($Z);$Jf=array();foreach($se
as$X){$X=preg_replace('~ DESC$~','',$X,1,$sb);$Jf[$X]=($sb?-1:1);}if(isset($_GET['limit'])&&is_numeric($_GET['limit'])&&$_GET['limit']>0)$z=$_GET['limit'];$z=min(200,max(1,(int)$z));$Gf=$D*$z;$Xa='MongoDB\Driver\Query';try{return
new
Min_Result($h->_link->executeQuery("$h->_db_name.$Q",new$Xa($Z,array('projection'=>$K,'limit'=>$z,'skip'=>$Gf,'sort'=>$Jf))));}catch(Exception$Qb){$h->error=$Qb->getMessage();return
false;}}function
update($Q,$N,$Ye,$z=0,$L="\n"){global$h;$l=$h->_db_name;$Z=sql_query_where_parser($Ye);$Xa='MongoDB\Driver\BulkWrite';$Qa=new$Xa(array());if(isset($N['_id']))unset($N['_id']);$gf=array();foreach($N
as$y=>$Y){if($Y=='NULL'){$gf[$y]=1;unset($N[$y]);}}$Kg=array('$set'=>$N);if(count($gf))$Kg['$unset']=$gf;$Qa->update($Z,$Kg,array('upsert'=>false));return$h->executeBulkWrite("$l.$Q",$Qa,'getModifiedCount');}function
delete($Q,$Ye,$z=0){global$h;$l=$h->_db_name;$Z=sql_query_where_parser($Ye);$Xa='MongoDB\Driver\BulkWrite';$Qa=new$Xa(array());$Qa->delete($Z,array('limit'=>$z));return$h->executeBulkWrite("$l.$Q",$Qa,'getDeletedCount');}function
insert($Q,$N){global$h;$l=$h->_db_name;$Xa='MongoDB\Driver\BulkWrite';$Qa=new$Xa(array());if($N['_id']=='')unset($N['_id']);$Qa->insert($N);return$h->executeBulkWrite("$l.$Q",$Qa,'getInsertedCount');}}function
get_databases($yc){global$h;$H=array();foreach($h->executeCommand('admin',array('listDatabases'=>1))as$Bb){foreach($Bb->databases
as$l)$H[]=$l->name;}return$H;}function
count_tables($k){$H=array();return$H;}function
tables_list(){global$h;$cb=array();foreach($h->executeCommand($h->_db_name,array('listCollections'=>1))as$G)$cb[$G->name]='table';return$cb;}function
drop_databases($k){return
false;}function
indexes($Q,$i=null){global$h;$H=array();foreach($h->executeCommand($h->_db_name,array('listIndexes'=>$Q))as$v){$Hb=array();$f=array();foreach(get_object_vars($v->key)as$e=>$T){$Hb[]=($T==-1?'1':null);$f[]=$e;}$H[$v->name]=array("type"=>($v->name=="_id_"?"PRIMARY":(isset($v->unique)?"UNIQUE":"INDEX")),"columns"=>$f,"lengths"=>array(),"descs"=>$Hb,);}return$H;}function
fields($Q){global$m;$p=fields_from_edit();if(!$p){$G=$m->select($Q,array("*"),null,null,array(),10);if($G){while($I=$G->fetch_assoc()){foreach($I
as$y=>$X){$I[$y]=null;$p[$y]=array("field"=>$y,"type"=>"string","null"=>($y!=$m->primary),"auto_increment"=>($y==$m->primary),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1,),);}}}}return$p;}function
found_rows($R,$Z){global$h;$Z=where_to_query($Z);$rg=$h->executeCommand($h->_db_name,array('count'=>$R['Name'],'query'=>$Z))->toArray();return$rg[0]->n;}function
sql_query_where_parser($Ye){$Ye=preg_replace('~^\sWHERE \(?\(?(.+?)\)?\)?$~','\1',$Ye);$dh=explode(' AND ',$Ye);$eh=explode(') OR (',$Ye);$Z=array();foreach($dh
as$bh)$Z[]=trim($bh);if(count($eh)==1)$eh=array();elseif(count($eh)>1)$Z=array();return
where_to_query($Z,$eh);}function
where_to_query($Zg=array(),$ah=array()){global$b;$_b=array();foreach(array('and'=>$Zg,'or'=>$ah)as$T=>$Z){if(is_array($Z)){foreach($Z
as$hc){list($ab,$ne,$X)=explode(" ",$hc,3);if($ab=="_id"&&preg_match('~^(MongoDB\\\\BSON\\\\ObjectID)\("(.+)"\)$~',$X,$A)){list(,$Xa,$X)=$A;$X=new$Xa($X);}if(!in_array($ne,$b->operators))continue;if(preg_match('~^\(f\)(.+)~',$ne,$A)){$X=(float)$X;$ne=$A[1];}elseif(preg_match('~^\(date\)(.+)~',$ne,$A)){$Ab=new
DateTime($X);$Xa='MongoDB\BSON\UTCDatetime';$X=new$Xa($Ab->getTimestamp()*1000);$ne=$A[1];}switch($ne){case'=':$ne='$eq';break;case'!=':$ne='$ne';break;case'>':$ne='$gt';break;case'<':$ne='$lt';break;case'>=':$ne='$gte';break;case'<=':$ne='$lte';break;case'regex':$ne='$regex';break;default:continue
2;}if($T=='and')$_b['$and'][]=array($ab=>array($ne=>$X));elseif($T=='or')$_b['$or'][]=array($ab=>array($ne=>$X));}}}return$_b;}$pe=array("=","!=",">","<",">=","<=","regex","(f)=","(f)!=","(f)>","(f)<","(f)>=","(f)<=","(date)=","(date)!=","(date)>","(date)<","(date)>=","(date)<=",);}function
table($u){return$u;}function
idf_escape($u){return$u;}function
table_status($B="",$nc=false){$H=array();foreach(tables_list()as$Q=>$T){$H[$Q]=array("Name"=>$Q);if($B==$Q)return$H[$Q];}return$H;}function
create_database($l,$d){return
true;}function
last_id(){global$h;return$h->last_id;}function
error(){global$h;return
h($h->error);}function
collations(){return
array();}function
logged_user(){global$b;$wb=$b->credentials();return$wb[1];}function
connect(){global$b;$h=new
Min_DB;list($M,$V,$E)=$b->credentials();$C=array();if($V.$E!=""){$C["username"]=$V;$C["password"]=$E;}$l=$b->database();if($l!="")$C["db"]=$l;if(($Da=getenv("MONGO_AUTH_SOURCE")))$C["authSource"]=$Da;$h->connect("mongodb://$M",$C);if($h->error)return$h->error;return$h;}function
alter_indexes($Q,$c){global$h;foreach($c
as$X){list($T,$B,$N)=$X;if($N=="DROP")$H=$h->_db->command(array("deleteIndexes"=>$Q,"index"=>$B));else{$f=array();foreach($N
as$e){$e=preg_replace('~ DESC$~','',$e,1,$sb);$f[$e]=($sb?-1:1);}$H=$h->_db->selectCollection($Q)->ensureIndex($f,array("unique"=>($T=="UNIQUE"),"name"=>$B,));}if($H['errmsg']){$h->error=$H['errmsg'];return
false;}}return
true;}function
support($oc){return
preg_match("~database|indexes|descidx~",$oc);}function
db_collation($l,$bb){}function
information_schema(){}function
is_view($R){}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
foreign_keys($Q){return
array();}function
fk_support($R){}function
engines(){return
array();}function
alter_table($Q,$B,$p,$_c,$gb,$Yb,$d,$Ea,$Ee){global$h;if($Q==""){$h->_db->createCollection($B);return
true;}}function
drop_tables($S){global$h;foreach($S
as$Q){$kf=$h->_db->selectCollection($Q)->drop();if(!$kf['ok'])return
false;}return
true;}function
truncate_tables($S){global$h;foreach($S
as$Q){$kf=$h->_db->selectCollection($Q)->remove();if(!$kf['ok'])return
false;}return
true;}function
driver_config(){global$pe;return
array('possible_drivers'=>array("mongo","mongodb"),'jush'=>"mongo",'operators'=>$pe,'functions'=>array(),'grouping'=>array(),'edit_functions'=>array(array("json")),);}}$Mb["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){define("DRIVER","elastic");if(function_exists('json_decode')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url,$_db;function
rootQuery($Ge,$qb=array(),$Vd='GET'){@ini_set('track_errors',1);$rc=@file_get_contents("$this->_url/".ltrim($Ge,'/'),false,stream_context_create(array('http'=>array('method'=>$Vd,'content'=>$qb===null?$qb:json_encode($qb),'header'=>'Content-Type: application/json','ignore_errors'=>1,))));if(!$rc){$this->error=$php_errormsg;return$rc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=lang(32)." $http_response_header[0]";return
false;}$H=json_decode($rc,true);if($H===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$ob=get_defined_constants(true);foreach($ob['json']as$B=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$B)){$this->error=$B;break;}}}}return$H;}function
query($Ge,$qb=array(),$Vd='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($Ge,'/'),$qb,$Vd);}function
connect($M,$V,$E){preg_match('~^(https?://)?(.*)~',$M,$A);$this->_url=($A[1]?$A[1]:"http://")."$V:$E@$A[2]";$H=$this->query('');if($H)$this->server_info=$H['version']['number'];return(bool)$H;}function
select_db($j){$this->_db=$j;return
true;}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows;function
__construct($J){$this->num_rows=count($J);$this->_rows=$J;reset($this->_rows);}function
fetch_assoc(){$H=current($this->_rows);next($this->_rows);return$H;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($Q,$K,$Z,$Jc,$se=array(),$z=1,$D=0,$Re=false){global$b;$_b=array();$F="$Q/_search";if($K!=array("*"))$_b["fields"]=$K;if($se){$Jf=array();foreach($se
as$ab){$ab=preg_replace('~ DESC$~','',$ab,1,$sb);$Jf[]=($sb?array($ab=>"desc"):$ab);}$_b["sort"]=$Jf;}if($z){$_b["size"]=+$z;if($D)$_b["from"]=($D*$z);}foreach($Z
as$X){list($ab,$ne,$X)=explode(" ",$X,3);if($ab=="_id")$_b["query"]["ids"]["values"][]=$X;elseif($ab.$X!=""){$fg=array("term"=>array(($ab!=""?$ab:"_all")=>$X));if($ne=="=")$_b["query"]["filtered"]["filter"]["and"][]=$fg;else$_b["query"]["filtered"]["query"]["bool"]["must"][]=$fg;}}if($_b["query"]&&!$_b["query"]["filtered"]["query"]&&!$_b["query"]["ids"])$_b["query"]["filtered"]["query"]=array("match_all"=>array());$Qf=microtime(true);$uf=$this->_conn->query($F,$_b);if($Re)echo$b->selectQuery("$F: ".json_encode($_b),$Qf,!$uf);if(!$uf)return
false;$H=array();foreach($uf['hits']['hits']as$Vc){$I=array();if($K==array("*"))$I["_id"]=$Vc["_id"];$p=$Vc['_source'];if($K!=array("*")){$p=array();foreach($K
as$y)$p[$y]=$Vc['fields'][$y];}foreach($p
as$y=>$X){if($_b["fields"])$X=$X[0];$I[$y]=(is_array($X)?json_encode($X):$X);}$H[]=$I;}return
new
Min_Result($H);}function
update($T,$cf,$Ye,$z=0,$L="\n"){$Fe=preg_split('~ *= *~',$Ye);if(count($Fe)==2){$t=trim($Fe[1]);$F="$T/$t";return$this->_conn->query($F,$cf,'POST');}return
false;}function
insert($T,$cf){$t="";$F="$T/$t";$kf=$this->_conn->query($F,$cf,'POST');$this->_conn->last_id=$kf['_id'];return$kf['created'];}function
delete($T,$Ye,$z=0){$Zc=array();if(is_array($_GET["where"])&&$_GET["where"]["_id"])$Zc[]=$_GET["where"]["_id"];if(is_array($_POST['check'])){foreach($_POST['check']as$Sa){$Fe=preg_split('~ *= *~',$Sa);if(count($Fe)==2)$Zc[]=trim($Fe[1]);}}$this->_conn->affected_rows=0;foreach($Zc
as$t){$F="{$T}/{$t}";$kf=$this->_conn->query($F,'{}','DELETE');if(is_array($kf)&&$kf['found']==true)$this->_conn->affected_rows++;}return$this->_conn->affected_rows;}}function
connect(){global$b;$h=new
Min_DB;list($M,$V,$E)=$b->credentials();if($E!=""&&$h->connect($M,$V,""))return
lang(22);if($h->connect($M,$V,$E))return$h;return$h->error;}function
support($oc){return
preg_match("~database|table|columns~",$oc);}function
logged_user(){global$b;$wb=$b->credentials();return$wb[1];}function
get_databases(){global$h;$H=$h->rootQuery('_aliases');if($H){$H=array_keys($H);sort($H,SORT_STRING);}return$H;}function
collations(){return
array();}function
db_collation($l,$bb){}function
engines(){return
array();}function
count_tables($k){global$h;$H=array();$G=$h->query('_stats');if($G&&$G['indices']){$fd=$G['indices'];foreach($fd
as$ed=>$Rf){$dd=$Rf['total']['indexing'];$H[$ed]=$dd['index_total'];}}return$H;}function
tables_list(){global$h;if(min_version(6))return
array('_doc'=>'table');$H=$h->query('_mapping');if($H)$H=array_fill_keys(array_keys($H[$h->_db]["mappings"]),'table');return$H;}function
table_status($B="",$nc=false){global$h;$uf=$h->query("_search",array("size"=>0,"aggregations"=>array("count_by_type"=>array("terms"=>array("field"=>"_type")))),"POST");$H=array();if($uf){$S=$uf["aggregations"]["count_by_type"]["buckets"];foreach($S
as$Q){$H[$Q["key"]]=array("Name"=>$Q["key"],"Engine"=>"table","Rows"=>$Q["doc_count"],);if($B!=""&&$B==$Q["key"])return$H[$B];}}return$H;}function
error(){global$h;return
h($h->error);}function
information_schema(){}function
is_view($R){}function
indexes($Q,$i=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($Q){global$h;$Jd=array();if(min_version(6)){$G=$h->query("_mapping");if($G)$Jd=$G[$h->_db]['mappings']['properties'];}else{$G=$h->query("$Q/_mapping");if($G){$Jd=$G[$Q]['properties'];if(!$Jd)$Jd=$G[$h->_db]['mappings'][$Q]['properties'];}}$H=array();if($Jd){foreach($Jd
as$B=>$o){$H[$B]=array("field"=>$B,"full_type"=>$o["type"],"type"=>$o["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);if($o["properties"]){unset($H[$B]["privileges"]["insert"]);unset($H[$B]["privileges"]["update"]);}}}return$H;}function
foreign_keys($Q){return
array();}function
table($u){return$u;}function
idf_escape($u){return$u;}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
fk_support($R){}function
found_rows($R,$Z){return
null;}function
create_database($l){global$h;return$h->rootQuery(urlencode($l),null,'PUT');}function
drop_databases($k){global$h;return$h->rootQuery(urlencode(implode(',',$k)),array(),'DELETE');}function
alter_table($Q,$B,$p,$_c,$gb,$Yb,$d,$Ea,$Ee){global$h;$Ue=array();foreach($p
as$lc){$pc=trim($lc[1][0]);$qc=trim($lc[1][1]?$lc[1][1]:"text");$Ue[$pc]=array('type'=>$qc);}if(!empty($Ue))$Ue=array('properties'=>$Ue);return$h->query("_mapping/{$B}",$Ue,'PUT');}function
drop_tables($S){global$h;$H=true;foreach($S
as$Q)$H=$H&&$h->query(urlencode($Q),array(),'DELETE');return$H;}function
last_id(){global$h;return$h->last_id;}function
driver_config(){$U=array();$Tf=array();foreach(array(lang(27)=>array("long"=>3,"integer"=>5,"short"=>8,"byte"=>10,"double"=>20,"float"=>66,"half_float"=>12,"scaled_float"=>21),lang(28)=>array("date"=>10),lang(25)=>array("string"=>65535,"text"=>65535),lang(29)=>array("binary"=>255),)as$y=>$X){$U+=$X;$Tf[$y]=array_keys($X);}return
array('possible_drivers'=>array("json + allow_url_fopen"),'jush'=>"elastic",'operators'=>array("=","query"),'functions'=>array(),'grouping'=>array(),'edit_functions'=>array(array("json")),'types'=>$U,'structured_types'=>$Tf,);}}class
Adminer{var$operators=array("<=",">=");var$_values=array();function
name(){return"<a href='https://www.adminer.org/editor/'".target_blank()." id='h1'>".lang(33)."</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
connectSsl(){}function
permanentLogin($ub=false){return
password_file($ub);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
serverName($M){}function
database(){global$h;if($h){$k=$this->databases(false);return(!$k?$h->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1)"):$k[(information_schema($k[0])?1:0)]);}}function
schemas(){return
schemas();}function
databases($yc=true){return
get_databases($yc);}function
queryTimeout(){return
5;}function
headers(){}function
csp(){return
csp();}function
head(){return
true;}function
css(){$H=array();$q="adminer.css";if(file_exists($q))$H[]=$q;return$H;}function
loginForm(){echo"<table cellspacing='0' class='layout'>\n",$this->loginFormField('username','<tr><th>'.lang(34).'<td>','<input type="hidden" name="auth[driver]" value="server"><input name="auth[username]" id="username" value="'.h($_GET["username"]).'" autocomplete="username" autocapitalize="off">'.script("focus(qs('#username'));")),$this->loginFormField('password','<tr><th>'.lang(35).'<td>','<input type="password" name="auth[password]" autocomplete="current-password">'."\n"),"</table>\n","<p><input type='submit' value='".lang(36)."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],lang(37))."\n";}function
loginFormField($B,$Tc,$Y){return$Tc.$Y;}function
login($Hd,$E){return
true;}function
tableName($Zf){return
h($Zf["Comment"]!=""?$Zf["Comment"]:$Zf["Name"]);}function
fieldName($o,$se=0){return
h(preg_replace('~\s+\[.*\]$~','',($o["comment"]!=""?$o["comment"]:$o["field"])));}function
selectLinks($Zf,$N=""){$a=$Zf["Name"];if($N!==null)echo'<p class="tabs"><a href="'.h(ME.'edit='.urlencode($a).$N).'">'.lang(38)."</a>\n";}function
foreignKeys($Q){return
foreign_keys($Q);}function
backwardKeys($Q,$Yf){$H=array();foreach(get_rows("SELECT TABLE_NAME, CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_COLUMN_NAME
FROM information_schema.KEY_COLUMN_USAGE
WHERE TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_NAME = ".q($Q)."
ORDER BY ORDINAL_POSITION",null,"")as$I)$H[$I["TABLE_NAME"]]["keys"][$I["CONSTRAINT_NAME"]][$I["COLUMN_NAME"]]=$I["REFERENCED_COLUMN_NAME"];foreach($H
as$y=>$X){$B=$this->tableName(table_status($y,true));if($B!=""){$uf=preg_quote($Yf);$L="(:|\\s*-)?\\s+";$H[$y]["name"]=(preg_match("(^$uf$L(.+)|^(.+?)$L$uf\$)iu",$B,$A)?$A[2].$A[3]:$B);}else
unset($H[$y]);}return$H;}function
backwardKeysPrint($Ia,$I){foreach($Ia
as$Q=>$Ha){foreach($Ha["keys"]as$db){$_=ME.'select='.urlencode($Q);$s=0;foreach($db
as$e=>$X)$_.=where_link($s++,$e,$I[$X]);echo"<a href='".h($_)."'>".h($Ha["name"])."</a>";$_=ME.'edit='.urlencode($Q);foreach($db
as$e=>$X)$_.="&set".urlencode("[".bracket_escape($e)."]")."=".urlencode($I[$X]);echo"<a href='".h($_)."' title='".lang(38)."'>+</a> ";}}}function
selectQuery($F,$Qf,$mc=false){return"<!--\n".str_replace("--","--><!-- ",$F)."\n(".format_time($Qf).")\n-->\n";}function
rowDescription($Q){foreach(fields($Q)as$o){if(preg_match("~varchar|character varying~",$o["type"]))return
idf_escape($o["field"]);}return"";}function
rowDescriptions($J,$Bc){$H=$J;foreach($J[0]as$y=>$X){if(list($Q,$t,$B)=$this->_foreignColumn($Bc,$y)){$Zc=array();foreach($J
as$I)$Zc[$I[$y]]=q($I[$y]);$Gb=$this->_values[$Q];if(!$Gb)$Gb=get_key_vals("SELECT $t, $B FROM ".table($Q)." WHERE $t IN (".implode(", ",$Zc).")");foreach($J
as$Zd=>$I){if(isset($I[$y]))$H[$Zd][$y]=(string)$Gb[$I[$y]];}}}return$H;}function
selectLink($X,$o){}function
selectVal($X,$_,$o,$we){$H=$X;$_=h($_);if(preg_match('~blob|bytea~',$o["type"])&&!is_utf8($X)){$H=lang(39,strlen($we));if(preg_match("~^(GIF|\xFF\xD8\xFF|\x89PNG\x0D\x0A\x1A\x0A)~",$we))$H="<img src='$_' alt='$H'>";}if(like_bool($o)&&$H!="")$H=(preg_match('~^(1|t|true|y|yes|on)$~i',$X)?lang(40):lang(41));if($_)$H="<a href='$_'".(is_url($_)?target_blank():"").">$H</a>";if(!$_&&!like_bool($o)&&preg_match(number_type(),$o["type"]))$H="<div class='number'>$H</div>";elseif(preg_match('~date~',$o["type"]))$H="<div class='datetime'>$H</div>";return$H;}function
editVal($X,$o){if(preg_match('~date|timestamp~',$o["type"])&&$X!==null)return
preg_replace('~^(\d{2}(\d+))-(0?(\d+))-(0?(\d+))~',lang(42),$X);return$X;}function
selectColumnsPrint($K,$f){}function
selectSearchPrint($Z,$f,$w){$Z=(array)$_GET["where"];echo'<fieldset id="fieldset-search"><legend>'.lang(43)."</legend><div>\n";$ud=array();foreach($Z
as$y=>$X)$ud[$X["col"]]=$y;$s=0;$p=fields($_GET["select"]);foreach($f
as$B=>$Fb){$o=$p[$B];if(preg_match("~enum~",$o["type"])||like_bool($o)){$y=$ud[$B];$s--;echo"<div>".h($Fb)."<input type='hidden' name='where[$s][col]' value='".h($B)."'>:",(like_bool($o)?" <select name='where[$s][val]'>".optionlist(array(""=>"",lang(41),lang(40)),$Z[$y]["val"],true)."</select>":enum_input("checkbox"," name='where[$s][val][]'",$o,(array)$Z[$y]["val"],($o["null"]?0:null))),"</div>\n";unset($f[$B]);}elseif(is_array($C=$this->_foreignKeyOptions($_GET["select"],$B))){if($p[$B]["null"])$C[0]='('.lang(7).')';$y=$ud[$B];$s--;echo"<div>".h($Fb)."<input type='hidden' name='where[$s][col]' value='".h($B)."'><input type='hidden' name='where[$s][op]' value='='>: <select name='where[$s][val]'>".optionlist($C,$Z[$y]["val"],true)."</select></div>\n";unset($f[$B]);}}$s=0;foreach($Z
as$X){if(($X["col"]==""||$f[$X["col"]])&&"$X[col]$X[val]"!=""){echo"<div><select name='where[$s][col]'><option value=''>(".lang(44).")".optionlist($f,$X["col"],true)."</select>",html_select("where[$s][op]",array(-1=>"")+$this->operators,$X["op"]),"<input type='search' name='where[$s][val]' value='".h($X["val"])."'>".script("mixin(qsl('input'), {onkeydown: selectSearchKeydown, onsearch: selectSearchSearch});","")."</div>\n";$s++;}}echo"<div><select name='where[$s][col]'><option value=''>(".lang(44).")".optionlist($f,null,true)."</select>",script("qsl('select').onchange = selectAddRow;",""),html_select("where[$s][op]",array(-1=>"")+$this->operators),"<input type='search' name='where[$s][val]'></div>",script("mixin(qsl('input'), {onchange: function () { this.parentNode.firstChild.onchange(); }, onsearch: selectSearchSearch});"),"</div></fieldset>\n";}function
selectOrderPrint($se,$f,$w){$te=array();foreach($w
as$y=>$v){$se=array();foreach($v["columns"]as$X)$se[]=$f[$X];if(count(array_filter($se,'strlen'))>1&&$y!="PRIMARY")$te[$y]=implode(", ",$se);}if($te){echo'<fieldset><legend>'.lang(45)."</legend><div>","<select name='index_order'>".optionlist(array(""=>"")+$te,($_GET["order"][0]!=""?"":$_GET["index_order"]),true)."</select>","</div></fieldset>\n";}if($_GET["order"])echo"<div style='display: none;'>".hidden_fields(array("order"=>array(1=>reset($_GET["order"])),"desc"=>($_GET["desc"]?array(1=>1):array()),))."</div>\n";}function
selectLimitPrint($z){echo"<fieldset><legend>".lang(46)."</legend><div>";echo
html_select("limit",array("","50","100"),$z),"</div></fieldset>\n";}function
selectLengthPrint($hg){}function
selectActionPrint($w){echo"<fieldset><legend>".lang(47)."</legend><div>","<input type='submit' value='".lang(48)."'>","</div></fieldset>\n";}function
selectCommandPrint(){return
true;}function
selectImportPrint(){return
true;}function
selectEmailPrint($Vb,$f){if($Vb){print_fieldset("email",lang(49),$_POST["email_append"]);echo"<div>",script("qsl('div').onkeydown = partialArg(bodyKeydown, 'email');"),"<p>".lang(50).": <input name='email_from' value='".h($_POST?$_POST["email_from"]:$_COOKIE["adminer_email"])."'>\n",lang(51).": <input name='email_subject' value='".h($_POST["email_subject"])."'>\n","<p><textarea name='email_message' rows='15' cols='75'>".h($_POST["email_message"].($_POST["email_append"]?'{$'."$_POST[email_addition]}":""))."</textarea>\n","<p>".script("qsl('p').onkeydown = partialArg(bodyKeydown, 'email_append');","").html_select("email_addition",$f,$_POST["email_addition"])."<input type='submit' name='email_append' value='".lang(11)."'>\n";echo"<p>".lang(52).": <input type='file' name='email_files[]'>".script("qsl('input').onchange = emailFileChange;"),"<p>".(count($Vb)==1?'<input type="hidden" name="email_field" value="'.h(key($Vb)).'">':html_select("email_field",$Vb)),"<input type='submit' name='email' value='".lang(53)."'>".confirm(),"</div>\n","</div></fieldset>\n";}}function
selectColumnsProcess($f,$w){return
array(array(),array());}function
selectSearchProcess($p,$w){global$m;$H=array();foreach((array)$_GET["where"]as$y=>$Z){$ab=$Z["col"];$ne=$Z["op"];$X=$Z["val"];if(($y<0?"":$ab).$X!=""){$ib=array();foreach(($ab!=""?array($ab=>$p[$ab]):$p)as$B=>$o){if($ab!=""||is_numeric($X)||!preg_match(number_type(),$o["type"])){$B=idf_escape($B);if($ab!=""&&$o["type"]=="enum")$ib[]=(in_array(0,$X)?"$B IS NULL OR ":"")."$B IN (".implode(", ",array_map('intval',$X)).")";else{$ig=preg_match('~char|text|enum|set~',$o["type"]);$Y=$this->processInput($o,(!$ne&&$ig&&preg_match('~^[^%]+$~',$X)?"%$X%":$X));$ib[]=$m->convertSearch($B,$X,$o).($Y=="NULL"?" IS".($ne==">="?" NOT":"")." $Y":(in_array($ne,$this->operators)||$ne=="="?" $ne $Y":($ig?" LIKE $Y":" IN (".str_replace(",","', '",$Y).")")));if($y<0&&$X=="0")$ib[]="$B IS NULL";}}}$H[]=($ib?"(".implode(" OR ",$ib).")":"1 = 0");}}return$H;}function
selectOrderProcess($p,$w){$cd=$_GET["index_order"];if($cd!="")unset($_GET["order"][1]);if($_GET["order"])return
array(idf_escape(reset($_GET["order"])).($_GET["desc"]?" DESC":""));foreach(($cd!=""?array($w[$cd]):$w)as$v){if($cd!=""||$v["type"]=="INDEX"){$Oc=array_filter($v["descs"]);$Fb=false;foreach($v["columns"]as$X){if(preg_match('~date|timestamp~',$p[$X]["type"])){$Fb=true;break;}}$H=array();foreach($v["columns"]as$y=>$X)$H[]=idf_escape($X).(($Oc?$v["descs"][$y]:$Fb)?" DESC":"");return$H;}}return
array();}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return"100";}function
selectEmailProcess($Z,$Bc){if($_POST["email_append"])return
true;if($_POST["email"]){$yf=0;if($_POST["all"]||$_POST["check"]){$o=idf_escape($_POST["email_field"]);$Vf=$_POST["email_subject"];$Td=$_POST["email_message"];preg_match_all('~\{\$([a-z0-9_]+)\}~i',"$Vf.$Td",$Nd);$J=get_rows("SELECT DISTINCT $o".($Nd[1]?", ".implode(", ",array_map('idf_escape',array_unique($Nd[1]))):"")." FROM ".table($_GET["select"])." WHERE $o IS NOT NULL AND $o != ''".($Z?" AND ".implode(" AND ",$Z):"").($_POST["all"]?"":" AND ((".implode(") OR (",array_map('where_check',(array)$_POST["check"]))."))"));$p=fields($_GET["select"]);foreach($this->rowDescriptions($J,$Bc)as$I){$if=array('{\\'=>'{');foreach($Nd[1]as$X)$if['{$'."$X}"]=$this->editVal($I[$X],$p[$X]);$Ub=$I[$_POST["email_field"]];if(is_mail($Ub)&&send_mail($Ub,strtr($Vf,$if),strtr($Td,$if),$_POST["email_from"],$_FILES["email_files"]))$yf++;}}cookie("adminer_email",$_POST["email_from"]);redirect(remove_from_uri(),lang(54,$yf));}return
false;}function
selectQueryBuild($K,$Z,$Jc,$se,$z,$D){return"";}function
messageQuery($F,$jg,$mc=false){return" <span class='time'>".@date("H:i:s")."</span><!--\n".str_replace("--","--><!-- ",$F)."\n".($jg?"($jg)\n":"")."-->";}function
editRowPrint($Q,$p,$I,$Kg){}function
editFunctions($o){$H=array();if($o["null"]&&preg_match('~blob~',$o["type"]))$H["NULL"]=lang(7);$H[""]=($o["null"]||$o["auto_increment"]||like_bool($o)?"":"*");if(preg_match('~date|time~',$o["type"]))$H["now"]=lang(55);if(preg_match('~_(md5|sha1)$~i',$o["field"],$A))$H[]=strtolower($A[1]);return$H;}function
editInput($Q,$o,$Ba,$Y){if($o["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ba value='-1' checked><i>".lang(8)."</i></label> ":"").enum_input("radio",$Ba,$o,($Y||isset($_GET["select"])?$Y:0),($o["null"]?"":null));$C=$this->_foreignKeyOptions($Q,$o["field"],$Y);if($C!==null)return(is_array($C)?"<select$Ba>".optionlist($C,$Y,true)."</select>":"<input value='".h($Y)."'$Ba class='hidden'>"."<input value='".h($C)."' class='jsonly'>"."<div></div>".script("qsl('input').oninput = partial(whisper, '".ME."script=complete&source=".urlencode($Q)."&field=".urlencode($o["field"])."&value=');
qsl('div').onclick = whisperClick;",""));if(like_bool($o))return'<input type="checkbox" value="1"'.(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?' checked':'')."$Ba>";$Uc="";if(preg_match('~time~',$o["type"]))$Uc=lang(56);if(preg_match('~date|timestamp~',$o["type"]))$Uc=lang(57).($Uc?" [$Uc]":"");if($Uc)return"<input value='".h($Y)."'$Ba> ($Uc)";if(preg_match('~_(md5|sha1)$~i',$o["field"]))return"<input type='password' value='".h($Y)."'$Ba>";return'';}function
editHint($Q,$o,$Y){return(preg_match('~\s+(\[.*\])$~',($o["comment"]!=""?$o["comment"]:$o["field"]),$A)?h(" $A[1]"):'');}function
processInput($o,$Y,$r=""){if($r=="now")return"$r()";$H=$Y;if(preg_match('~date|timestamp~',$o["type"])&&preg_match('(^'.str_replace('\$1','(?P<p1>\d*)',preg_replace('~(\\\\\\$([2-6]))~','(?P<p\2>\d{1,2})',preg_quote(lang(42)))).'(.*))',$Y,$A))$H=($A["p1"]!=""?$A["p1"]:($A["p2"]!=""?($A["p2"]<70?20:19).$A["p2"]:gmdate("Y")))."-$A[p3]$A[p4]-$A[p5]$A[p6]".end($A);$H=($o["type"]=="bit"&&preg_match('~^[0-9]+$~',$Y)?$H:q($H));if($Y==""&&like_bool($o))$H="'0'";elseif($Y==""&&($o["null"]||!preg_match('~char|text~',$o["type"])))$H="NULL";elseif(preg_match('~^(md5|sha1)$~',$r))$H="$r($H)";return
unconvert_field($o,$H);}function
dumpOutput(){return
array();}function
dumpFormat(){return
array('csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($l){}function
dumpTable($Q,$Uf,$qd=0){echo"\xef\xbb\xbf";}function
dumpData($Q,$Uf,$F){global$h;$G=$h->query($F,1);if($G){while($I=$G->fetch_assoc()){if($Uf=="table"){dump_csv(array_keys($I));$Uf="INSERT";}dump_csv($I);}}}function
dumpFilename($Yc){return
friendly_url($Yc);}function
dumpHeaders($Yc,$Xd=false){$ic="csv";header("Content-Type: text/csv; charset=utf-8");return$ic;}function
importServerPath(){}function
homepage(){return
true;}function
navigation($Wd){global$ca;echo'<h1>
',$this->name(),' <span class="version">',$ca,'</span>
<a href="https://www.adminer.org/editor/#download"',target_blank(),' id="version">',(version_compare($ca,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($Wd=="auth"){$uc=true;foreach((array)$_SESSION["pwds"]as$Sg=>$Cf){foreach($Cf[""]as$V=>$E){if($E!==null){if($uc){echo"<ul id='logins'>",script("mixin(qs('#logins'), {onmouseover: menuOver, onmouseout: menuOut});");$uc=false;}echo"<li><a href='".h(auth_url($Sg,"",$V))."'>".($V!=""?h($V):"<i>".lang(7)."</i>")."</a>\n";}}}}else{$this->databasesPrint($Wd);if($Wd!="db"&&$Wd!="ns"){$R=table_status('',true);if(!$R)echo"<p class='message'>".lang(9)."\n";else$this->tablesPrint($R);}}}function
databasesPrint($Wd){}function
tablesPrint($S){echo"<ul id='tables'>",script("mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});");foreach($S
as$I){echo'<li>';$B=$this->tableName($I);if(isset($I["Engine"])&&$B!="")echo"<a href='".h(ME).'select='.urlencode($I["Name"])."'".bold($_GET["select"]==$I["Name"]||$_GET["edit"]==$I["Name"],"select")." title='".lang(58)."'>$B</a>\n";}echo"</ul>\n";}function
_foreignColumn($Bc,$e){foreach((array)$Bc[$e]as$Ac){if(count($Ac["source"])==1){$B=$this->rowDescription($Ac["table"]);if($B!=""){$t=idf_escape($Ac["target"][0]);return
array($Ac["table"],$t,$B);}}}}function
_foreignKeyOptions($Q,$e,$Y=null){global$h;if(list($dg,$t,$B)=$this->_foreignColumn(column_foreign_keys($Q),$e)){$H=&$this->_values[$dg];if($H===null){$R=table_status($dg);$H=($R["Rows"]>1000?"":array(""=>"")+get_key_vals("SELECT $t, $B FROM ".table($dg)." ORDER BY 2"));}if(!$H&&$Y!==null)return$h->result("SELECT $B FROM ".table($dg)." WHERE $t = ".q($Y));return$H;}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);$Mb=array("server"=>"MySQL")+$Mb;if(!defined("DRIVER")){define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($M="",$V="",$E="",$j=null,$Le=null,$If=null){global$b;mysqli_report(MYSQLI_REPORT_OFF);list($Wc,$Le)=explode(":",$M,2);$Pf=$b->connectSsl();if($Pf)$this->ssl_set($Pf['key'],$Pf['cert'],$Pf['ca'],'','');$H=@$this->real_connect(($M!=""?$Wc:ini_get("mysqli.default_host")),($M.$V!=""?$V:ini_get("mysqli.default_user")),($M.$V.$E!=""?$E:ini_get("mysqli.default_pw")),$j,(is_numeric($Le)?$Le:ini_get("mysqli.default_port")),(!is_numeric($Le)?$Le:$If),($Pf?64:0));$this->options(MYSQLI_OPT_LOCAL_INFILE,false);return$H;}function
set_charset($Ra){if(parent::set_charset($Ra))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $Ra");}function
result($F,$o=0){$G=$this->query($F);if(!$G)return
false;$I=$G->fetch_array();return$I[$o];}function
quote($P){return"'".$this->escape_string($P)."'";}}}elseif(extension_loaded("mysql")&&!((ini_bool("sql.safe_mode")||ini_bool("mysql.allow_local_infile"))&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($M,$V,$E){if(ini_bool("mysql.allow_local_infile")){$this->error=lang(59,"'mysql.allow_local_infile'","MySQLi","PDO_MySQL");return
false;}$this->_link=@mysql_connect(($M!=""?$M:ini_get("mysql.default_host")),("$M$V"!=""?$V:ini_get("mysql.default_user")),("$M$V$E"!=""?$E:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($Ra){if(function_exists('mysql_set_charset')){if(mysql_set_charset($Ra,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $Ra");}function
quote($P){return"'".mysql_real_escape_string($P,$this->_link)."'";}function
select_db($j){return
mysql_select_db($j,$this->_link);}function
query($F,$Dg=false){$G=@($Dg?mysql_unbuffered_query($F,$this->_link):mysql_query($F,$this->_link));$this->error="";if(!$G){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($G===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($G);}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$o=0){$G=$this->query($F);if(!$G||!$G->num_rows)return
false;return
mysql_result($G->_result,0,$o);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($G){$this->_result=$G;$this->num_rows=mysql_num_rows($G);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$H=mysql_fetch_field($this->_result,$this->_offset++);$H->orgtable=$H->table;$H->orgname=$H->name;$H->charsetnr=($H->blob?63:0);return$H;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($M,$V,$E){global$b;$C=array(PDO::MYSQL_ATTR_LOCAL_INFILE=>false);$Pf=$b->connectSsl();if($Pf){if(!empty($Pf['key']))$C[PDO::MYSQL_ATTR_SSL_KEY]=$Pf['key'];if(!empty($Pf['cert']))$C[PDO::MYSQL_ATTR_SSL_CERT]=$Pf['cert'];if(!empty($Pf['ca']))$C[PDO::MYSQL_ATTR_SSL_CA]=$Pf['ca'];}$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$M)),$V,$E,$C);return
true;}function
set_charset($Ra){$this->query("SET NAMES $Ra");}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($F,$Dg=false){$this->pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,!$Dg);return
parent::query($F,$Dg);}}}class
Min_Driver
extends
Min_SQL{function
insert($Q,$N){return($N?parent::insert($Q,$N):queries("INSERT INTO ".table($Q)." ()\nVALUES ()"));}function
insertUpdate($Q,$J,$Pe){$f=array_keys(reset($J));$Oe="INSERT INTO ".table($Q)." (".implode(", ",$f).") VALUES\n";$Rg=array();foreach($f
as$y)$Rg[$y]="$y = VALUES($y)";$Wf="\nON DUPLICATE KEY UPDATE ".implode(", ",$Rg);$Rg=array();$Cd=0;foreach($J
as$N){$Y="(".implode(", ",$N).")";if($Rg&&(strlen($Oe)+$Cd+strlen($Y)+strlen($Wf)>1e6)){if(!queries($Oe.implode(",\n",$Rg).$Wf))return
false;$Rg=array();$Cd=0;}$Rg[]=$Y;$Cd+=strlen($Y)+2;}return
queries($Oe.implode(",\n",$Rg).$Wf);}function
slowQuery($F,$kg){if(min_version('5.7.8','10.1.2')){if(preg_match('~MariaDB~',$this->_conn->server_info))return"SET STATEMENT max_statement_time=$kg FOR $F";elseif(preg_match('~^(SELECT\b)(.+)~is',$F,$A))return"$A[1] /*+ MAX_EXECUTION_TIME(".($kg*1000).") */ $A[2]";}}function
convertSearch($u,$X,$o){return(preg_match('~char|text|enum|set~',$o["type"])&&!preg_match("~^utf8~",$o["collation"])&&preg_match('~[\x80-\xFF]~',$X['val'])?"CONVERT($u USING ".charset($this->_conn).")":$u);}function
warnings(){$G=$this->_conn->query("SHOW WARNINGS");if($G&&$G->num_rows){ob_start();select($G);return
ob_get_clean();}}function
tableHelp($B){$Kd=preg_match('~MariaDB~',$this->_conn->server_info);if(information_schema(DB))return
strtolower(($Kd?"information-schema-$B-table/":str_replace("_","-",$B)."-table.html"));if(DB=="mysql")return($Kd?"mysql$B-table/":"system-database.html");}}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
table($u){return
idf_escape($u);}function
connect(){global$b,$U,$Tf;$h=new
Min_DB;$wb=$b->credentials();if($h->connect($wb[0],$wb[1],$wb[2])){$h->set_charset(charset($h));$h->query("SET sql_quote_show_create = 1, autocommit = 1");if(min_version('5.7.8',10.2,$h)){$Tf[lang(25)][]="json";$U["json"]=4294967295;}return$h;}$H=$h->error;if(function_exists('iconv')&&!is_utf8($H)&&strlen($rf=iconv("windows-1250","utf-8",$H))>strlen($H))$H=$rf;return$H;}function
get_databases($yc){$H=get_session("dbs");if($H===null){$F=(min_version(5)?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA ORDER BY SCHEMA_NAME":"SHOW DATABASES");$H=($yc?slow_query($F):get_vals($F));restart_session();set_session("dbs",$H);stop_session();}return$H;}function
limit($F,$Z,$z,$he=0,$L=" "){return" $F$Z".($z!==null?$L."LIMIT $z".($he?" OFFSET $he":""):"");}function
limit1($Q,$F,$Z,$L="\n"){return
limit($F,$Z,1,0,$L);}function
db_collation($l,$bb){global$h;$H=null;$ub=$h->result("SHOW CREATE DATABASE ".idf_escape($l),1);if(preg_match('~ COLLATE ([^ ]+)~',$ub,$A))$H=$A[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$ub,$A))$H=$bb[$A[1]][-1];return$H;}function
engines(){$H=array();foreach(get_rows("SHOW ENGINES")as$I){if(preg_match("~YES|DEFAULT~",$I["Support"]))$H[]=$I["Engine"];}return$H;}function
logged_user(){global$h;return$h->result("SELECT USER()");}function
tables_list(){return
get_key_vals(min_version(5)?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($k){$H=array();foreach($k
as$l)$H[$l]=count(get_vals("SHOW TABLES IN ".idf_escape($l)));return$H;}function
table_status($B="",$nc=false){$H=array();foreach(get_rows($nc&&min_version(5)?"SELECT TABLE_NAME AS Name, ENGINE AS Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($B!=""?"AND TABLE_NAME = ".q($B):"ORDER BY Name"):"SHOW TABLE STATUS".($B!=""?" LIKE ".q(addcslashes($B,"%_\\")):""))as$I){if($I["Engine"]=="InnoDB")$I["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\1',$I["Comment"]);if(!isset($I["Engine"]))$I["Comment"]="";if($B!="")return$I;$H[$I["Name"]]=$I;}return$H;}function
is_view($R){return$R["Engine"]===null;}function
fk_support($R){return
preg_match('~InnoDB|IBMDB2I~i',$R["Engine"])||(preg_match('~NDB~i',$R["Engine"])&&min_version(5.6));}function
fields($Q){$H=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($Q))as$I){preg_match('~^([^( ]+)(?:\((.+)\))?( unsigned)?( zerofill)?$~',$I["Type"],$A);$H[$I["Field"]]=array("field"=>$I["Field"],"full_type"=>$I["Type"],"type"=>$A[1],"length"=>$A[2],"unsigned"=>ltrim($A[3].$A[4]),"default"=>($I["Default"]!=""||preg_match("~char|set~",$A[1])?(preg_match('~text~',$A[1])?stripslashes(preg_replace("~^'(.*)'\$~",'\1',$I["Default"])):$I["Default"]):null),"null"=>($I["Null"]=="YES"),"auto_increment"=>($I["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$I["Extra"],$A)?$A[1]:""),"collation"=>$I["Collation"],"privileges"=>array_flip(preg_split('~, *~',$I["Privileges"])),"comment"=>$I["Comment"],"primary"=>($I["Key"]=="PRI"),"generated"=>preg_match('~^(VIRTUAL|PERSISTENT|STORED)~',$I["Extra"]),);}return$H;}function
indexes($Q,$i=null){$H=array();foreach(get_rows("SHOW INDEX FROM ".table($Q),$i)as$I){$B=$I["Key_name"];$H[$B]["type"]=($B=="PRIMARY"?"PRIMARY":($I["Index_type"]=="FULLTEXT"?"FULLTEXT":($I["Non_unique"]?($I["Index_type"]=="SPATIAL"?"SPATIAL":"INDEX"):"UNIQUE")));$H[$B]["columns"][]=$I["Column_name"];$H[$B]["lengths"][]=($I["Index_type"]=="SPATIAL"?null:$I["Sub_part"]);$H[$B]["descs"][]=null;}return$H;}function
foreign_keys($Q){global$h,$ke;static$He='(?:`(?:[^`]|``)+`|"(?:[^"]|"")+")';$H=array();$vb=$h->result("SHOW CREATE TABLE ".table($Q),1);if($vb){preg_match_all("~CONSTRAINT ($He) FOREIGN KEY ?\\(((?:$He,? ?)+)\\) REFERENCES ($He)(?:\\.($He))? \\(((?:$He,? ?)+)\\)(?: ON DELETE ($ke))?(?: ON UPDATE ($ke))?~",$vb,$Nd,PREG_SET_ORDER);foreach($Nd
as$A){preg_match_all("~$He~",$A[2],$Kf);preg_match_all("~$He~",$A[5],$dg);$H[idf_unescape($A[1])]=array("db"=>idf_unescape($A[4]!=""?$A[3]:$A[4]),"table"=>idf_unescape($A[4]!=""?$A[4]:$A[3]),"source"=>array_map('idf_unescape',$Kf[0]),"target"=>array_map('idf_unescape',$dg[0]),"on_delete"=>($A[6]?$A[6]:"RESTRICT"),"on_update"=>($A[7]?$A[7]:"RESTRICT"),);}}return$H;}function
view($B){global$h;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\s+AS\s+~isU','',$h->result("SHOW CREATE VIEW ".table($B),1)));}function
collations(){$H=array();foreach(get_rows("SHOW COLLATION")as$I){if($I["Default"])$H[$I["Charset"]][-1]=$I["Collation"];else$H[$I["Charset"]][]=$I["Collation"];}ksort($H);foreach($H
as$y=>$X)asort($H[$y]);return$H;}function
information_schema($l){return(min_version(5)&&$l=="information_schema")||(min_version(5.5)&&$l=="performance_schema");}function
error(){global$h;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$h->error));}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).($d?" COLLATE ".q($d):""));}function
drop_databases($k){$H=apply_queries("DROP DATABASE",$k,'idf_escape');restart_session();set_session("dbs",null);return$H;}function
rename_database($B,$d){$H=false;if(create_database($B,$d)){$S=array();$Vg=array();foreach(tables_list()as$Q=>$T){if($T=='VIEW')$Vg[]=$Q;else$S[]=$Q;}$H=(!$S&&!$Vg)||move_tables($S,$Vg,$B);drop_databases($H?array(DB):array());}return$H;}function
auto_increment(){$Fa=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$v){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$v["columns"],true)){$Fa="";break;}if($v["type"]=="PRIMARY")$Fa=" UNIQUE";}}return" AUTO_INCREMENT$Fa";}function
alter_table($Q,$B,$p,$_c,$gb,$Yb,$d,$Ea,$Ee){$c=array();foreach($p
as$o)$c[]=($o[1]?($Q!=""?($o[0]!=""?"CHANGE ".idf_escape($o[0]):"ADD"):" ")." ".implode($o[1]).($Q!=""?$o[2]:""):"DROP ".idf_escape($o[0]));$c=array_merge($c,$_c);$O=($gb!==null?" COMMENT=".q($gb):"").($Yb?" ENGINE=".q($Yb):"").($d?" COLLATE ".q($d):"").($Ea!=""?" AUTO_INCREMENT=$Ea":"");if($Q=="")return
queries("CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)$O$Ee");if($Q!=$B)$c[]="RENAME TO ".table($B);if($O)$c[]=ltrim($O);return($c||$Ee?queries("ALTER TABLE ".table($Q)."\n".implode(",\n",$c).$Ee):true);}function
alter_indexes($Q,$c){foreach($c
as$y=>$X)$c[$y]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($Q).implode(",",$c));}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Vg){return
queries("DROP VIEW ".implode(", ",array_map('table',$Vg)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$Vg,$dg){global$h;$hf=array();foreach($S
as$Q)$hf[]=table($Q)." TO ".idf_escape($dg).".".table($Q);if(!$hf||queries("RENAME TABLE ".implode(", ",$hf))){$Eb=array();foreach($Vg
as$Q)$Eb[table($Q)]=view($Q);$h->select_db($dg);$l=idf_escape(DB);foreach($Eb
as$B=>$Ug){if(!queries("CREATE VIEW $B AS ".str_replace(" $l."," ",$Ug["select"]))||!queries("DROP VIEW $l.$B"))return
false;}return
true;}return
false;}function
copy_tables($S,$Vg,$dg){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($S
as$Q){$B=($dg==DB?table("copy_$Q"):idf_escape($dg).".".table($Q));if(($_POST["overwrite"]&&!queries("\nDROP TABLE IF EXISTS $B"))||!queries("CREATE TABLE $B LIKE ".table($Q))||!queries("INSERT INTO $B SELECT * FROM ".table($Q)))return
false;foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")))as$I){$zg=$I["Trigger"];if(!queries("CREATE TRIGGER ".($dg==DB?idf_escape("copy_$zg"):idf_escape($dg).".".idf_escape($zg))." $I[Timing] $I[Event] ON $B FOR EACH ROW\n$I[Statement];"))return
false;}}foreach($Vg
as$Q){$B=($dg==DB?table("copy_$Q"):idf_escape($dg).".".table($Q));$Ug=view($Q);if(($_POST["overwrite"]&&!queries("DROP VIEW IF EXISTS $B"))||!queries("CREATE VIEW $B AS $Ug[select]"))return
false;}return
true;}function
trigger($B){if($B=="")return
array();$J=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($B));return
reset($J);}function
triggers($Q){$H=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")))as$I)$H[$I["Trigger"]]=array($I["Timing"],$I["Event"]);return$H;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($B,$T){global$h,$Zb,$kd,$U;$wa=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$Lf="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$Cg="((".implode("|",array_merge(array_keys($U),$wa)).")\\b(?:\\s*\\(((?:[^'\")]|$Zb)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$He="$Lf*(".($T=="FUNCTION"?"":$kd).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Cg";$ub=$h->result("SHOW CREATE $T ".idf_escape($B),2);preg_match("~\\(((?:$He\\s*,?)*)\\)\\s*".($T=="FUNCTION"?"RETURNS\\s+$Cg\\s+":"")."(.*)~is",$ub,$A);$p=array();preg_match_all("~$He\\s*,?~is",$A[1],$Nd,PREG_SET_ORDER);foreach($Nd
as$Be)$p[]=array("field"=>str_replace("``","`",$Be[2]).$Be[3],"type"=>strtolower($Be[5]),"length"=>preg_replace_callback("~$Zb~s",'normalize_enum',$Be[6]),"unsigned"=>strtolower(preg_replace('~\s+~',' ',trim("$Be[8] $Be[7]"))),"null"=>1,"full_type"=>$Be[4],"inout"=>strtoupper($Be[1]),"collation"=>strtolower($Be[9]),);if($T!="FUNCTION")return
array("fields"=>$p,"definition"=>$A[11]);return
array("fields"=>$p,"returns"=>array("type"=>$A[12],"length"=>$A[13],"unsigned"=>$A[15],"collation"=>$A[16]),"definition"=>$A[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME AS SPECIFIC_NAME, ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
routine_id($B,$I){return
idf_escape($B);}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ID()");}function
explain($h,$F){return$h->query("EXPLAIN ".(min_version(5.1)&&!min_version(5.7)?"PARTITIONS ":"").$F);}function
found_rows($R,$Z){return($Z||$R["Engine"]!="InnoDB"?null:$R["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($sf,$i=null){return
true;}function
create_sql($Q,$Ea,$Uf){global$h;$H=$h->result("SHOW CREATE TABLE ".table($Q),1);if(!$Ea)$H=preg_replace('~ AUTO_INCREMENT=\d+~','',$H);return$H;}function
truncate_sql($Q){return"TRUNCATE ".table($Q);}function
use_sql($j){return"USE ".idf_escape($j);}function
trigger_sql($Q){$H="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")),null,"-- ")as$I)$H.="\nCREATE TRIGGER ".idf_escape($I["Trigger"])." $I[Timing] $I[Event] ON ".table($I["Table"])." FOR EACH ROW\n$I[Statement];;\n";return$H;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($o){if(preg_match("~binary~",$o["type"]))return"HEX(".idf_escape($o["field"]).")";if($o["type"]=="bit")return"BIN(".idf_escape($o["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))return(min_version(8)?"ST_":"")."AsWKT(".idf_escape($o["field"]).")";}function
unconvert_field($o,$H){if(preg_match("~binary~",$o["type"]))$H="UNHEX($H)";if($o["type"]=="bit")$H="CONV($H, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))$H=(min_version(8)?"ST_":"")."GeomFromText($H, SRID($o[field]))";return$H;}function
support($oc){return!preg_match("~scheme|sequence|type|view_trigger|materializedview".(min_version(8)?"":"|descidx".(min_version(5.1)?"":"|event|partitioning".(min_version(5)?"":"|routine|trigger|view")))."~",$oc);}function
kill_process($X){return
queries("KILL ".number($X));}function
connection_id(){return"SELECT CONNECTION_ID()";}function
max_connections(){global$h;return$h->result("SELECT @@max_connections");}function
driver_config(){$U=array();$Tf=array();foreach(array(lang(27)=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),lang(28)=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),lang(25)=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),lang(60)=>array("enum"=>65535,"set"=>64),lang(29)=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),lang(31)=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$y=>$X){$U+=$X;$Tf[$y]=array_keys($X);}return
array('possible_drivers'=>array("MySQLi","MySQL","PDO_MySQL"),'jush'=>"sql",'types'=>$U,'structured_types'=>$Tf,'unsigned'=>array("unsigned","zerofill","unsigned zerofill"),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","FIND_IN_SET","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL"),'functions'=>array("char_length","date","from_unixtime","lower","round","floor","ceil","sec_to_time","time_to_sec","upper"),'grouping'=>array("avg","count","count distinct","group_concat","max","min","sum"),'edit_functions'=>array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array(number_type()=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",)),);}}$jb=driver_config();$Ne=$jb['possible_drivers'];$x=$jb['jush'];$U=$jb['types'];$Tf=$jb['structured_types'];$Jg=$jb['unsigned'];$pe=$jb['operators'];$Ic=$jb['functions'];$Mc=$jb['grouping'];$Rb=$jb['edit_functions'];if($b->operators===null)$b->operators=$pe;define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~\?.*~','',relative_uri()).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ca="4.8.1";function
page_header($mg,$n="",$Pa=array(),$ng=""){global$ba,$ca,$b,$Mb,$x;page_headers();if(is_ajax()&&$n){page_messages($n);exit;}$og=$mg.($ng!=""?": $ng":"");$pg=strip_tags($og.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="',$ba,'" dir="',lang(61),'">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>',$pg,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME)."?file=default.css&version=4.8.1"),'">
',script_src(preg_replace("~\\?.*~","",ME)."?file=functions.js&version=4.8.1");if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.8.1"),'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.8.1"),'">
';foreach($b->css()as$yb){echo'<link rel="stylesheet" type="text/css" href="',h($yb),'">
';}}echo'
<body class="',lang(61),' nojs">
';$q=get_temp_dir()."/adminer.version";if(!$_COOKIE["adminer_version"]&&function_exists('openssl_verify')&&file_exists($q)&&filemtime($q)+86400>time()){$Tg=unserialize(file_get_contents($q));$Ve="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqWOVuF5uw7/+Z70djoK
RlHIZFZPO0uYRezq90+7Amk+FDNd7KkL5eDve+vHRJBLAszF/7XKXe11xwliIsFs
DFWQlsABVZB3oisKCBEuI71J4kPH8dKGEWR9jDHFw3cWmoH3PmqImX6FISWbG3B8
h7FIx3jEaw5ckVPVTeo5JRm/1DZzJxjyDenXvBQ/6o9DgZKeNDgxwKzH+sw9/YCO
jHnq1cFpOIISzARlrHMa/43YfeNRAm/tsBXjSxembBPo7aQZLAWHmaj5+K19H10B
nCpz9Y++cipkVEiKRGih4ZEvjoFysEOdRLj6WiD/uUNky4xGeA6LaJqh5XpkFkcQ
fQIDAQAB
-----END PUBLIC KEY-----
";if(openssl_verify($Tg["version"],base64_decode($Tg["signature"]),$Ve)==1)$_COOKIE["adminer_version"]=$Tg["version"];}echo'<script',nonce(),'>
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick',(isset($_COOKIE["adminer_version"])?"":", onload: partial(verifyVersion, '$ca', '".js_escape(ME)."', '".get_token()."')");?>});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape(lang(62)),'\';
var thousandsSeparator = \'',js_escape(lang(5)),'\';
</script>

<div id="help" class="jush-',$x,' jsonly hidden"></div>
',script("mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});"),'
<div id="content">
';if($Pa!==null){$_=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($_?$_:".").'">'.$Mb[DRIVER].'</a> &raquo; ';$_=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$M=$b->serverName(SERVER);$M=($M!=""?$M:lang(63));if($Pa===false)echo"$M\n";else{echo"<a href='".h($_)."' accesskey='1' title='Alt+Shift+1'>$M</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Pa)))echo'<a href="'.h($_."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Pa)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Pa
as$y=>$X){$Fb=(is_array($X)?$X[1]:h($X));if($Fb!="")echo"<a href='".h(ME."$y=").urlencode(is_array($X)?$X[0]:$X)."'>$Fb</a> &raquo; ";}}echo"$mg\n";}}echo"<h2>$og</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($n);$k=&get_session("dbs");if(DB!=""&&$k&&!in_array(DB,$k,true))$k=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");header("X-Frame-Options: deny");header("X-XSS-Protection: 0");header("X-Content-Type-Options: nosniff");header("Referrer-Policy: origin-when-cross-origin");foreach($b->csp()as$xb){$Rc=array();foreach($xb
as$y=>$X)$Rc[]="$y $X";header("Content-Security-Policy: ".implode("; ",$Rc));}$b->headers();}function
csp(){return
array(array("script-src"=>"'self' 'unsafe-inline' 'nonce-".get_nonce()."' 'strict-dynamic'","connect-src"=>"'self'","frame-src"=>"https://www.adminer.org","object-src"=>"'none'","base-uri"=>"'none'","form-action"=>"'self'",),);}function
get_nonce(){static$de;if(!$de)$de=base64_encode(rand_string());return$de;}function
page_messages($n){$Lg=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Ud=$_SESSION["messages"][$Lg];if($Ud){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Ud)."</div>".script("messagesPrint();");unset($_SESSION["messages"][$Lg]);}if($n)echo"<div class='error'>$n</div>\n";}function
page_footer($Wd=""){global$b,$sg;echo'</div>

';switch_lang();if($Wd!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="',lang(64),'" id="logout">
<input type="hidden" name="token" value="',$sg,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($Wd);echo'</div>
',script("setupSubmitHighlight(document);");}function
int32($Zd){while($Zd>=2147483648)$Zd-=4294967296;while($Zd<=-2147483649)$Zd+=4294967296;return(int)$Zd;}function
long2str($W,$Xg){$rf='';foreach($W
as$X)$rf.=pack('V',$X);if($Xg)return
substr($rf,0,end($W));return$rf;}function
str2long($rf,$Xg){$W=array_values(unpack('V*',str_pad($rf,4*ceil(strlen($rf)/4),"\0")));if($Xg)$W[]=strlen($rf);return$W;}function
xxtea_mx($hh,$gh,$Xf,$sd){return
int32((($hh>>5&0x7FFFFFF)^$gh<<2)+(($gh>>3&0x1FFFFFFF)^$hh<<4))^int32(($Xf^$gh)+($sd^$hh));}function
encrypt_string($Sf,$y){if($Sf=="")return"";$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($Sf,true);$Zd=count($W)-1;$hh=$W[$Zd];$gh=$W[0];$We=floor(6+52/($Zd+1));$Xf=0;while($We-->0){$Xf=int32($Xf+0x9E3779B9);$Qb=$Xf>>2&3;for($_e=0;$_e<$Zd;$_e++){$gh=$W[$_e+1];$Yd=xxtea_mx($hh,$gh,$Xf,$y[$_e&3^$Qb]);$hh=int32($W[$_e]+$Yd);$W[$_e]=$hh;}$gh=$W[0];$Yd=xxtea_mx($hh,$gh,$Xf,$y[$_e&3^$Qb]);$hh=int32($W[$Zd]+$Yd);$W[$Zd]=$hh;}return
long2str($W,false);}function
decrypt_string($Sf,$y){if($Sf=="")return"";if(!$y)return
false;$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($Sf,false);$Zd=count($W)-1;$hh=$W[$Zd];$gh=$W[0];$We=floor(6+52/($Zd+1));$Xf=int32($We*0x9E3779B9);while($Xf){$Qb=$Xf>>2&3;for($_e=$Zd;$_e>0;$_e--){$hh=$W[$_e-1];$Yd=xxtea_mx($hh,$gh,$Xf,$y[$_e&3^$Qb]);$gh=int32($W[$_e]-$Yd);$W[$_e]=$gh;}$hh=$W[$Zd];$Yd=xxtea_mx($hh,$gh,$Xf,$y[$_e&3^$Qb]);$gh=int32($W[0]-$Yd);$W[0]=$gh;$Xf=int32($Xf-0x9E3779B9);}return
long2str($W,true);}$h='';$Qc=$_SESSION["token"];if(!$Qc)$_SESSION["token"]=rand(1,1e6);$sg=get_token();$Je=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($y)=explode(":",$X);$Je[$y]=$X;}}function
add_invalid_login(){global$b;$Gc=file_open_lock(get_temp_dir()."/adminer.invalid");if(!$Gc)return;$nd=unserialize(stream_get_contents($Gc));$jg=time();if($nd){foreach($nd
as$od=>$X){if($X[0]<$jg)unset($nd[$od]);}}$md=&$nd[$b->bruteForceKey()];if(!$md)$md=array($jg+30*60,0);$md[1]++;file_write_unlock($Gc,serialize($nd));}function
check_invalid_login(){global$b;$nd=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$md=($nd?$nd[$b->bruteForceKey()]:array());$ce=($md[1]>29?$md[0]-time():0);if($ce>0)auth_error(lang(65,ceil($ce/60)));}$Ca=$_POST["auth"];if($Ca){session_regenerate_id();$Sg=$Ca["driver"];$M=$Ca["server"];$V=$Ca["username"];$E=(string)$Ca["password"];$l=$Ca["db"];set_password($Sg,$M,$V,$E);$_SESSION["db"][$Sg][$M][$V][$l]=true;if($Ca["permanent"]){$y=base64_encode($Sg)."-".base64_encode($M)."-".base64_encode($V)."-".base64_encode($l);$Se=$b->permanentLogin(true);$Je[$y]="$y:".base64_encode($Se?encrypt_string($E,$Se):"");cookie("adminer_permanent",implode(" ",$Je));}if(count($_POST)==1||DRIVER!=$Sg||SERVER!=$M||$_GET["username"]!==$V||DB!=$l)redirect(auth_url($Sg,$M,$V,$l));}elseif($_POST["logout"]&&(!$Qc||verify_token())){foreach(array("pwds","db","dbs","queries")as$y)set_session($y,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),lang(66).' '.lang(67));}elseif($Je&&!$_SESSION["pwds"]){session_regenerate_id();$Se=$b->permanentLogin();foreach($Je
as$y=>$X){list(,$Wa)=explode(":",$X);list($Sg,$M,$V,$l)=array_map('base64_decode',explode("-",$y));set_password($Sg,$M,$V,decrypt_string(base64_decode($Wa),$Se));$_SESSION["db"][$Sg][$M][$V][$l]=true;}}function
unset_permanent(){global$Je;foreach($Je
as$y=>$X){list($Sg,$M,$V,$l)=array_map('base64_decode',explode("-",$y));if($Sg==DRIVER&&$M==SERVER&&$V==$_GET["username"]&&$l==DB)unset($Je[$y]);}cookie("adminer_permanent",implode(" ",$Je));}function
auth_error($n){global$b,$Qc;$Df=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$Df]||$_GET[$Df])&&!$Qc)$n=lang(68);else{restart_session();add_invalid_login();$E=get_password();if($E!==null){if($E===false)$n.=($n?'<br>':'').lang(69,target_blank(),'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$Df]&&$_GET[$Df]&&ini_bool("session.use_only_cookies"))$n=lang(70);$Ce=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$Ce["lifetime"]);page_header(lang(36),$n,null);echo"<form action='' method='post'>\n","<div>";if(hidden_fields($_POST,array("auth")))echo"<p class='message'>".lang(71)."\n";echo"</div>\n";$b->loginForm();echo"</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])&&!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header(lang(72),lang(73,implode(", ",$Ne)),false);page_footer("auth");exit;}stop_session(true);if(isset($_GET["username"])&&is_string(get_password())){list($Wc,$Le)=explode(":",SERVER,2);if(preg_match('~^\s*([-+]?\d+)~',$Le,$A)&&($A[1]<1024||$A[1]>65535))auth_error(lang(74));check_invalid_login();$h=connect();$m=new
Min_Driver($h);}$Hd=null;if(!is_object($h)||($Hd=$b->login($_GET["username"],get_password()))!==true){$n=(is_string($h)?h($h):(is_string($Hd)?$Hd:lang(32)));auth_error($n.(preg_match('~^ | $~',get_password())?'<br>'.lang(75):''));}if($_POST["logout"]&&$Qc&&!verify_token()){page_header(lang(64),lang(76));page_footer("db");exit;}if($Ca&&$_POST["token"])$_POST["token"]=$sg;$n='';if($_POST){if(!verify_token()){$jd="max_input_vars";$Rd=ini_get($jd);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$y){$X=ini_get($y);if($X&&(!$Rd||$X<$Rd)){$jd=$y;$Rd=$X;}}}$n=(!$_POST["token"]&&$Rd?lang(77,"'$jd'"):lang(76).' '.lang(78));}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$n=lang(79,"'post_max_size'");if(isset($_GET["sql"]))$n.=' '.lang(80);}function
email_header($Rc){return"=?UTF-8?B?".base64_encode($Rc)."?=";}function
send_mail($Ub,$Vf,$Td,$Hc="",$sc=array()){$ac=(DIRECTORY_SEPARATOR=="/"?"\n":"\r\n");$Td=str_replace("\n",$ac,wordwrap(str_replace("\r","","$Td\n")));$Oa=uniqid("boundary");$Aa="";foreach((array)$sc["error"]as$y=>$X){if(!$X)$Aa.="--$Oa$ac"."Content-Type: ".str_replace("\n","",$sc["type"][$y]).$ac."Content-Disposition: attachment; filename=\"".preg_replace('~["\n]~','',$sc["name"][$y])."\"$ac"."Content-Transfer-Encoding: base64$ac$ac".chunk_split(base64_encode(file_get_contents($sc["tmp_name"][$y])),76,$ac).$ac;}$Ka="";$Sc="Content-Type: text/plain; charset=utf-8$ac"."Content-Transfer-Encoding: 8bit";if($Aa){$Aa.="--$Oa--$ac";$Ka="--$Oa$ac$Sc$ac$ac";$Sc="Content-Type: multipart/mixed; boundary=\"$Oa\"";}$Sc.=$ac."MIME-Version: 1.0$ac"."X-Mailer: Adminer Editor".($Hc?$ac."From: ".str_replace("\n","",$Hc):"");return
mail($Ub,email_header($Vf),$Ka.$Td.$Aa,$Sc);}function
like_bool($o){return
preg_match("~bool|(tinyint|bit)\\(1\\)~",$o["full_type"]);}$h->select_db($b->database());$ke="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";$Mb[DRIVER]=lang(36);if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["download"])){$a=$_GET["download"];$p=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$K=array(idf_escape($_GET["field"]));$G=$m->select($a,$K,array(where($_GET,$p)),$K);$I=($G?$G->fetch_row():array());echo$m->value($I[0],$p[$_GET["field"]]);exit;}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$p=fields($a);$Z=(isset($_GET["select"])?($_POST["check"]&&count($_POST["check"])==1?where_check($_POST["check"][0],$p):""):where($_GET,$p));$Kg=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($p
as$B=>$o){if(!isset($o["privileges"][$Kg?"update":"insert"])||$b->fieldName($o)==""||$o["generated"])unset($p[$B]);}if($_POST&&!$n&&!isset($_GET["select"])){$Gd=$_POST["referer"];if($_POST["insert"])$Gd=($Kg?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$Gd))$Gd=ME."select=".urlencode($a);$w=indexes($a);$Fg=unique_array($_GET["where"],$w);$Ze="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($Gd,lang(81),$m->delete($a,$Ze,!$Fg));else{$N=array();foreach($p
as$B=>$o){$X=process_input($o);if($X!==false&&$X!==null)$N[idf_escape($B)]=$X;}if($Kg){if(!$N)redirect($Gd);queries_redirect($Gd,lang(82),$m->update($a,$N,$Ze,!$Fg));if(is_ajax()){page_headers();page_messages($n);exit;}}else{$G=$m->insert($a,$N);$Ad=($G?last_id():0);queries_redirect($Gd,lang(83,($Ad?" $Ad":"")),$G);}}}$I=null;if($_POST["save"])$I=(array)$_POST["fields"];elseif($Z){$K=array();foreach($p
as$B=>$o){if(isset($o["privileges"]["select"])){$za=convert_field($o);if($_POST["clone"]&&$o["auto_increment"])$za="''";if($x=="sql"&&preg_match("~enum|set~",$o["type"]))$za="1*".idf_escape($B);$K[]=($za?"$za AS ":"").idf_escape($B);}}$I=array();if(!support("table"))$K=array("*");if($K){$G=$m->select($a,$K,array($Z),$K,array(),(isset($_GET["select"])?2:1));if(!$G)$n=error();else{$I=$G->fetch_assoc();if(!$I)$I=false;}if(isset($_GET["select"])&&(!$I||$G->fetch_assoc()))$I=null;}}if(!support("table")&&!$p){if(!$Z){$G=$m->select($a,array("*"),$Z,array("*"));$I=($G?$G->fetch_assoc():false);if(!$I)$I=array($m->primary=>"");}if($I){foreach($I
as$y=>$X){if(!$Z)$I[$y]=null;$p[$y]=array("field"=>$y,"null"=>($y!=$m->primary),"auto_increment"=>($y==$m->primary));}}}edit_form($a,$p,$I,$Kg);}elseif(isset($_GET["select"])){$a=$_GET["select"];$R=table_status1($a);$w=indexes($a);$p=fields($a);$Dc=column_foreign_keys($a);$ie=$R["Oid"];parse_str($_COOKIE["adminer_import"],$ta);$pf=array();$f=array();$hg=null;foreach($p
as$y=>$o){$B=$b->fieldName($o);if(isset($o["privileges"]["select"])&&$B!=""){$f[$y]=html_entity_decode(strip_tags($B),ENT_QUOTES);if(is_shortable($o))$hg=$b->selectLengthProcess();}$pf+=$o["privileges"];}list($K,$Jc)=$b->selectColumnsProcess($f,$w);$pd=count($Jc)<count($K);$Z=$b->selectSearchProcess($p,$w);$se=$b->selectOrderProcess($p,$w);$z=$b->selectLimitProcess();if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Gg=>$I){$za=convert_field($p[key($I)]);$K=array($za?$za:idf_escape(key($I)));$Z[]=where_check($Gg,$p);$H=$m->select($a,$K,$Z,$K);if($H)echo
reset($H->fetch_row());}exit;}$Pe=$Ig=null;foreach($w
as$v){if($v["type"]=="PRIMARY"){$Pe=array_flip($v["columns"]);$Ig=($K?$Pe:array());foreach($Ig
as$y=>$X){if(in_array(idf_escape($y),$K))unset($Ig[$y]);}break;}}if($ie&&!$Pe){$Pe=$Ig=array($ie=>0);$w[]=array("type"=>"PRIMARY","columns"=>array($ie));}if($_POST&&!$n){$ch=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$Va=array();foreach($_POST["check"]as$Sa)$Va[]=where_check($Sa,$p);$ch[]="((".implode(") OR (",$Va)."))";}$ch=($ch?"\nWHERE ".implode(" AND ",$ch):"");if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");$Hc=($K?implode(", ",$K):"*").convert_fields($f,$p,$K)."\nFROM ".table($a);$Lc=($Jc&&$pd?"\nGROUP BY ".implode(", ",$Jc):"").($se?"\nORDER BY ".implode(", ",$se):"");if(!is_array($_POST["check"])||$Pe)$F="SELECT $Hc$ch$Lc";else{$Eg=array();foreach($_POST["check"]as$X)$Eg[]="(SELECT".limit($Hc,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p).$Lc,1).")";$F=implode(" UNION ALL ",$Eg);}$b->dumpData($a,"table",$F);exit;}if(!$b->selectEmailProcess($Z,$Dc)){if($_POST["save"]||$_POST["delete"]){$G=true;$ua=0;$N=array();if(!$_POST["delete"]){foreach($f
as$B=>$X){$X=process_input($p[$B]);if($X!==null&&($_POST["clone"]||$X!==false))$N[idf_escape($B)]=($X!==false?$X:idf_escape($B));}}if($_POST["delete"]||$N){if($_POST["clone"])$F="INTO ".table($a)." (".implode(", ",array_keys($N)).")\nSELECT ".implode(", ",$N)."\nFROM ".table($a);if($_POST["all"]||($Pe&&is_array($_POST["check"]))||$pd){$G=($_POST["delete"]?$m->delete($a,$ch):($_POST["clone"]?queries("INSERT $F$ch"):$m->update($a,$N,$ch)));$ua=$h->affected_rows;}else{foreach((array)$_POST["check"]as$X){$Yg="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p);$G=($_POST["delete"]?$m->delete($a,$Yg,1):($_POST["clone"]?queries("INSERT".limit1($a,$F,$Yg)):$m->update($a,$N,$Yg,1)));if(!$G)break;$ua+=$h->affected_rows;}}}$Td=lang(84,$ua);if($_POST["clone"]&&$G&&$ua==1){$Ad=last_id();if($Ad)$Td=lang(83," $Ad");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$Td,$G);if(!$_POST["delete"]){edit_form($a,$p,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$n=lang(85);else{$G=true;$ua=0;foreach($_POST["val"]as$Gg=>$I){$N=array();foreach($I
as$y=>$X){$y=bracket_escape($y,1);$N[idf_escape($y)]=(preg_match('~char|text~',$p[$y]["type"])||$X!=""?$b->processInput($p[$y],$X):"NULL");}$G=$m->update($a,$N," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Gg,$p),!$pd&&!$Pe," ");if(!$G)break;$ua+=$h->affected_rows;}queries_redirect(remove_from_uri(),lang(84,$ua),$G);}}elseif(!is_string($rc=get_file("csv_file",true)))$n=upload_error($rc);elseif(!preg_match('~~u',$rc))$n=lang(86);else{cookie("adminer_import","output=".urlencode($ta["output"])."&format=".urlencode($_POST["separator"]));$G=true;$db=array_keys($p);preg_match_all('~(?>"[^"]*"|[^"\r\n]+)+~',$rc,$Nd);$ua=count($Nd[0]);$m->begin();$L=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$J=array();foreach($Nd[0]as$y=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$L]*)$L~",$X.$L,$Od);if(!$y&&!array_diff($Od[1],$db)){$db=$Od[1];$ua--;}else{$N=array();foreach($Od[1]as$s=>$ab)$N[idf_escape($db[$s])]=($ab==""&&$p[$db[$s]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$ab))));$J[]=$N;}}$G=(!$J||$m->insertUpdate($a,$J,$Pe));if($G)$G=$m->commit();queries_redirect(remove_from_uri("page"),lang(87,$ua),$G);$m->rollback();}}}$ag=$b->tableName($R);if(is_ajax()){page_headers();ob_start();}else
page_header(lang(48).": $ag",$n);$N=null;if(isset($pf["insert"])||!support("table")){$N="";foreach((array)$_GET["where"]as$X){if($Dc[$X["col"]]&&count($Dc[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$N.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($R,$N);if(!$f&&support("table"))echo"<p class='error'>".lang(88).($p?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($K,$f);$b->selectSearchPrint($Z,$f,$w);$b->selectOrderPrint($se,$f,$w);$b->selectLimitPrint($z);$b->selectLengthPrint($hg);$b->selectActionPrint($w);echo"</form>\n";$D=$_GET["page"];if($D=="last"){$Fc=$h->result(count_rows($a,$Z,$pd,$Jc));$D=floor(max(0,$Fc-1)/$z);}$vf=$K;$Kc=$Jc;if(!$vf){$vf[]="*";$rb=convert_fields($f,$p,$K);if($rb)$vf[]=substr($rb,2);}foreach($K
as$y=>$X){$o=$p[idf_unescape($X)];if($o&&($za=convert_field($o)))$vf[$y]="$za AS $X";}if(!$pd&&$Ig){foreach($Ig
as$y=>$X){$vf[]=idf_escape($y);if($Kc)$Kc[]=idf_escape($y);}}$G=$m->select($a,$vf,$Z,$Kc,$se,$z,$D,true);if(!$G)echo"<p class='error'>".error()."\n";else{if($x=="mssql"&&$D)$G->seek($z*$D);$Wb=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$J=array();while($I=$G->fetch_assoc()){if($D&&$x=="oracle")unset($I["RNUM"]);$J[]=$I;}if($_GET["page"]!="last"&&$z!=""&&$Jc&&$pd&&$x=="sql")$Fc=$h->result(" SELECT FOUND_ROWS()");if(!$J)echo"<p class='message'>".lang(12)."\n";else{$Ja=$b->backwardKeys($a,$ag);echo"<div class='scrollable'>","<table id='table' cellspacing='0' class='nowrap checkable'>",script("mixin(qs('#table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true), onkeydown: editingKeydown});"),"<thead><tr>".(!$Jc&&$K?"":"<td><input type='checkbox' id='all-page' class='jsonly'>".script("qs('#all-page').onclick = partial(formCheck, /check/);","")." <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".lang(89)."</a>");$ae=array();$Ic=array();reset($K);$bf=1;foreach($J[0]as$y=>$X){if(!isset($Ig[$y])){$X=$_GET["columns"][key($K)];$o=$p[$K?($X?$X["col"]:current($K)):$y];$B=($o?$b->fieldName($o,$bf):($X["fun"]?"*":$y));if($B!=""){$bf++;$ae[$y]=$B;$e=idf_escape($y);$Xc=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($y);$Fb="&desc%5B0%5D=1";echo"<th id='th[".h(bracket_escape($y))."]'>".script("mixin(qsl('th'), {onmouseover: partial(columnMouse), onmouseout: partial(columnMouse, ' hidden')});",""),'<a href="'.h($Xc.($se[0]==$e||$se[0]==$y||(!$se&&$pd&&$Jc[0]==$e)?$Fb:'')).'">';echo
apply_sql_function($X["fun"],$B)."</a>";echo"<span class='column hidden'>","<a href='".h($Xc.$Fb)."' title='".lang(90)."' class='text'> ↓</a>";if(!$X["fun"]){echo'<a href="#fieldset-search" title="'.lang(43).'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($y)."');");}echo"</span>";}$Ic[$y]=$X["fun"];next($K);}}$Dd=array();if($_GET["modify"]){foreach($J
as$I){foreach($I
as$y=>$X)$Dd[$y]=max($Dd[$y],min(40,strlen(utf8_decode($X))));}}echo($Ja?"<th>".lang(91):"")."</thead>\n";if(is_ajax()){if($z%2==1&&$D%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($J,$Dc)as$Zd=>$I){$Fg=unique_array($J[$Zd],$w);if(!$Fg){$Fg=array();foreach($J[$Zd]as$y=>$X){if(!preg_match('~^(COUNT\((\*|(DISTINCT )?`(?:[^`]|``)+`)\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\(`(?:[^`]|``)+`\))$~',$y))$Fg[$y]=$X;}}$Gg="";foreach($Fg
as$y=>$X){if(($x=="sql"||$x=="pgsql")&&preg_match('~char|text|enum|set~',$p[$y]["type"])&&strlen($X)>64){$y=(strpos($y,'(')?$y:idf_escape($y));$y="MD5(".($x!='sql'||preg_match("~^utf8~",$p[$y]["collation"])?$y:"CONVERT($y USING ".charset($h).")").")";$X=md5($X);}$Gg.="&".($X!==null?urlencode("where[".bracket_escape($y)."]")."=".urlencode($X):"null%5B%5D=".urlencode($y));}echo"<tr".odd().">".(!$Jc&&$K?"":"<td>".checkbox("check[]",substr($Gg,1),in_array(substr($Gg,1),(array)$_POST["check"])).($pd||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Gg)."' class='edit'>".lang(92)."</a>"));foreach($I
as$y=>$X){if(isset($ae[$y])){$o=$p[$y];$X=$m->value($X,$o);if($X!=""&&(!isset($Wb[$y])||$Wb[$y]!=""))$Wb[$y]=(is_mail($X)?$ae[$y]:"");$_="";if(preg_match('~blob|bytea|raw|file~',$o["type"])&&$X!="")$_=ME.'download='.urlencode($a).'&field='.urlencode($y).$Gg;if(!$_&&$X!==null){foreach((array)$Dc[$y]as$Cc){if(count($Dc[$y])==1||end($Cc["source"])==$y){$_="";foreach($Cc["source"]as$s=>$Kf)$_.=where_link($s,$Cc["target"][$s],$J[$Zd][$Kf]);$_=($Cc["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\1'.urlencode($Cc["db"]),ME):ME).'select='.urlencode($Cc["table"]).$_;if($Cc["ns"])$_=preg_replace('~([?&]ns=)[^&]+~','\1'.urlencode($Cc["ns"]),$_);if(count($Cc["source"])==1)break;}}}if($y=="COUNT(*)"){$_=ME."select=".urlencode($a);$s=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$Fg))$_.=where_link($s++,$W["col"],$W["val"],$W["op"]);}foreach($Fg
as$sd=>$W)$_.=where_link($s++,$sd,$W);}$X=select_value($X,$_,$o,$hg);$t=h("val[$Gg][".bracket_escape($y)."]");$Y=$_POST["val"][$Gg][bracket_escape($y)];$Sb=!is_array($I[$y])&&is_utf8($X)&&$J[$Zd][$y]==$I[$y]&&!$Ic[$y];$gg=preg_match('~text|lob~',$o["type"]);echo"<td id='$t'";if(($_GET["modify"]&&$Sb)||$Y!==null){$Nc=h($Y!==null?$Y:$I[$y]);echo">".($gg?"<textarea name='$t' cols='30' rows='".(substr_count($I[$y],"\n")+1)."'>$Nc</textarea>":"<input name='$t' value='$Nc' size='$Dd[$y]'>");}else{$Id=strpos($X,"<i>…</i>");echo" data-text='".($Id?2:($gg?1:0))."'".($Sb?"":" data-warning='".h(lang(93))."'").">$X</td>";}}}if($Ja)echo"<td>";$b->backwardKeysPrint($Ja,$J[$Zd]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n","</div>\n";}if(!is_ajax()){if($J||$D){$fc=true;if($_GET["page"]!="last"){if($z==""||(count($J)<$z&&($J||!$D)))$Fc=($D?$D*$z:0)+count($J);elseif($x!="sql"||!$pd){$Fc=($pd?false:found_rows($R,$Z));if($Fc<max(1e4,2*($D+1)*$z))$Fc=reset(slow_query(count_rows($a,$Z,$pd,$Jc)));else$fc=false;}}$Ae=($z!=""&&($Fc===false||$Fc>$z||$D));if($Ae){echo(($Fc===false?count($J)+1:$Fc-$D*$z)>$z?'<p><a href="'.h(remove_from_uri("page")."&page=".($D+1)).'" class="loadmore">'.lang(94).'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$z).", '".lang(95)."…');",""):''),"\n";}}echo"<div class='footer'><div>\n";if($J||$D){if($Ae){$Pd=($Fc===false?$D+(count($J)>=$z?2:1):floor(($Fc-1)/$z));echo"<fieldset>";if($x!="simpledb"){echo"<legend><a href='".h(remove_from_uri("page"))."'>".lang(96)."</a></legend>",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".lang(96)."', '".($D+1)."')); return false; };"),pagination(0,$D).($D>5?" …":"");for($s=max(1,$D-4);$s<min($Pd,$D+5);$s++)echo
pagination($s,$D);if($Pd>0){echo($D+5<$Pd?" …":""),($fc&&$Fc!==false?pagination($Pd,$D):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$Pd'>".lang(97)."</a>");}}else{echo"<legend>".lang(96)."</legend>",pagination(0,$D).($D>1?" …":""),($D?pagination($D,$D):""),($Pd>$D?pagination($D+1,$D).($Pd>$D+1?" …":""):"");}echo"</fieldset>\n";}echo"<fieldset>","<legend>".lang(98)."</legend>";$Kb=($fc?"":"~ ").$Fc;echo
checkbox("all",1,0,($Fc!==false?($fc?"":"~ ").lang(99,$Fc):""),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$Kb' : checked); selectCount('selected2', this.checked || !checked ? '$Kb' : checked);")."\n","</fieldset>\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>',lang(89),'</legend><div>
<input type="submit" value="',lang(14),'"',($_GET["modify"]?'':' title="'.lang(85).'"'),'>
</div></fieldset>
<fieldset><legend>',lang(100),' <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="',lang(10),'">
<input type="submit" name="clone" value="',lang(101),'">
<input type="submit" name="delete" value="',lang(18),'">',confirm(),'</div></fieldset>
';}$Ec=$b->dumpFormat();foreach((array)$_GET["columns"]as$e){if($e["fun"]){unset($Ec['sql']);break;}}if($Ec){print_fieldset("export",lang(102)." <span id='selected2'></span>");$ye=$b->dumpOutput();echo($ye?html_select("output",$ye,$ta["output"])." ":""),html_select("format",$Ec,$ta["format"])," <input type='submit' name='export' value='".lang(102)."'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($Wb,'strlen'),$f);}echo"</div></div>\n";if($b->selectImportPrint()){echo"<div>","<a href='#import'>".lang(103)."</a>",script("qsl('a').onclick = partial(toggle, 'import');",""),"<span id='import' class='hidden'>: ","<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$ta["format"],1);echo" <input type='submit' name='import' value='".lang(103)."'>","</span>","</div>";}echo"<input type='hidden' name='token' value='$sg'>\n","</form>\n",(!$Jc&&$K?"":script("tableCheck();"));}}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["script"])){if($_GET["script"]=="kill")$h->query("KILL ".number($_POST["kill"]));elseif(list($Q,$t,$B)=$b->_foreignColumn(column_foreign_keys($_GET["source"]),$_GET["field"])){$z=11;$G=$h->query("SELECT $t, $B FROM ".table($Q)." WHERE ".(preg_match('~^[0-9]+$~',$_GET["value"])?"$t = $_GET[value] OR ":"")."$B LIKE ".q("$_GET[value]%")." ORDER BY 2 LIMIT $z");for($s=1;($I=$G->fetch_row())&&$s<$z;$s++)echo"<a href='".h(ME."edit=".urlencode($Q)."&where".urlencode("[".bracket_escape(idf_unescape($t))."]")."=".urlencode($I[0]))."'>".h($I[1])."</a><br>\n";if($I)echo"...\n";}exit;}else{page_header(lang(63),"",false);if($b->homepage()){echo"<form action='' method='post'>\n","<p>".lang(104).": <input type='search' name='query' value='".h($_POST["query"])."'> <input type='submit' value='".lang(43)."'>\n";if($_POST["query"]!="")search_tables();echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^tables\[/);",""),'<th>'.lang(105),'<td>'.lang(106),"</thead>\n";foreach(table_status()as$Q=>$I){$B=$b->tableName($I);if(isset($I["Engine"])&&$B!=""){echo'<tr'.odd().'><td>'.checkbox("tables[]",$Q,in_array($Q,(array)$_POST["tables"],true)),"<th><a href='".h(ME).'select='.urlencode($Q)."'>$B</a>";$X=format_number($I["Rows"]);echo"<td align='right'><a href='".h(ME."edit=").urlencode($Q)."'>".($I["Engine"]=="InnoDB"&&$X?"~ $X":$X)."</a>";}}echo"</table>\n","</div>\n","</form>\n",script("tableCheck();");}}page_footer();