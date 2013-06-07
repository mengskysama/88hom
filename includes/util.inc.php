<?php
/*
* 创建FCKeditor
* @param String $FCKeditor_object 提交时对象名$_POST['FCKeditor_object'];
* @param String $path	           fckeditor.php所在的位置
* @param String $value 		   FCKeditor出现的内容
* @return String
*/
function createCKeditor($object, $vipLevel, $width = 490, $height = 200, $value = '') {
	global $cfg;
	if ($vipLevel == 0) {
		$toolType = 'Basic';
	} else if ($vipLevel == 1) {
		$toolType = 'Full';
	} else {
		$toolType = 'Default';
	}
	$CKEditor=new CKEditor(); 
	$CKEditor->returnOutput = true; //设置输出可用变量的情况
	$CKEditor->basePath = ECMS_PATH.'common/libs/fck/ckeditor/';
	$CKEditor->config['filebrowserBrowseUrl']=$cfg ['web_url'].'common/libs/fck/ckfinder/ckfinder.html?Type=Files';
	$CKEditor->config['filebrowserImageBrowseUrl']=$cfg ['web_url'].'common/libs/fck/ckfinder/ckfinder.html?Type=Images';
	$CKEditor->config['filebrowserFlashBrowseUrl']=$cfg ['web_url'].'common/libs/fck/ckfinder/ckfinder.html?Type=Flash';
	$CKEditor->config['filebrowserUploadUrl']=$cfg ['web_url'].'common/libs/fck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	$CKEditor->config['filebrowserImageUploadUrl']=$cfg ['web_url'].'common/libs/fck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	$CKEditor->config['filebrowserFlashUploadUrl']=$cfg ['web_url'].'common/libs/fck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
	$CKEditor->config['height']=$height;
	//$CKEditor->config['width']=$width;
	$CKEditor->config['toolbar']=$toolType;
	return $CKEditor->editor($object,$value); 
}
//简体字与繁体字不相同的子集,1298个汉字
class FanJianConvert{
	private static $sd="皑蔼碍爱翱袄奥坝罢摆败颁办绊帮绑镑谤剥饱宝报鲍辈贝钡狈备惫绷笔毕毙币闭边编贬变辩辫标鳖别瘪濒滨宾摈饼并拨钵铂驳卜补财参蚕残惭惨灿苍舱仓沧厕侧册测层诧搀掺蝉馋谗缠铲产阐颤场尝长偿肠厂畅钞车彻尘沉陈衬撑称惩诚骋痴迟驰耻齿炽冲虫宠畴踌筹绸丑橱厨锄雏础储触处传疮闯创锤纯绰辞词赐聪葱囱从丛凑蹿窜错达带贷担单郸掸胆惮诞弹当挡党荡档捣岛祷导盗灯邓敌涤递缔颠点垫电淀钓调迭谍叠钉顶锭订丢东动栋冻斗犊独读赌镀锻断缎兑队对吨顿钝夺堕鹅额讹恶饿儿尔饵贰发罚阀珐矾钒烦范贩饭访纺飞诽废费纷坟奋愤粪丰枫锋风疯冯缝讽凤肤辐抚辅赋复负讣妇缚该钙盖干赶秆赣冈刚钢纲岗皋镐搁鸽阁铬个给龚宫巩贡钩沟构购够蛊顾剐关观馆惯贯广规硅归龟闺轨诡柜贵刽辊滚锅国过骇韩汉号阂鹤贺横轰鸿红后壶护沪户哗华画划话怀坏欢环还缓换唤痪焕涣黄谎挥辉毁贿秽会烩汇讳诲绘荤浑伙获货祸击机积饥讥鸡绩缉极辑级挤几蓟剂济计记际继纪夹荚颊贾钾价驾歼监坚笺间艰缄茧检碱硷拣捡简俭减荐槛鉴践贱见键舰剑饯渐溅涧将浆蒋桨奖讲酱胶浇骄娇搅铰矫侥脚饺缴绞轿较秸阶节茎鲸惊经颈静镜径痉竞净纠厩旧驹举据锯惧剧鹃绢杰洁结诫届紧锦仅谨进晋烬尽劲荆觉决诀绝钧军骏开凯颗壳课垦恳抠库裤夸块侩宽矿旷况亏岿窥馈溃扩阔蜡腊莱来赖蓝栏拦篮阑兰澜谰揽览懒缆烂滥捞劳涝乐镭垒类泪篱离里鲤礼丽厉励砾历沥隶俩联莲连镰怜涟帘敛脸链恋炼练粮凉两辆谅疗辽镣猎临邻鳞凛赁龄铃凌灵岭领馏刘龙聋咙笼垄拢陇楼娄搂篓芦卢颅庐炉掳卤虏鲁赂禄录陆驴吕铝侣屡缕虑滤绿峦挛孪滦乱抡轮伦仑沦纶论萝罗逻锣箩骡骆络妈玛码蚂马骂吗买麦卖迈脉瞒馒蛮满谩猫锚铆贸么霉没镁门闷们锰梦谜弥觅幂绵缅庙灭悯闽鸣铭谬谋亩钠纳难挠脑恼闹馁内拟腻撵捻酿鸟聂啮镊镍柠狞宁拧泞钮纽脓浓农疟诺欧鸥殴呕沤盘庞赔喷鹏骗飘频贫苹凭评泼颇扑铺朴谱栖凄脐齐骑岂启气弃讫牵扦钎铅迁签谦钱钳潜浅谴堑枪呛墙蔷强抢锹桥乔侨翘窍窃钦亲寝轻氢倾顷请庆琼穷趋区躯驱龋颧权劝却鹊确让饶扰绕热韧认纫荣绒软锐闰润洒萨鳃赛叁伞丧骚扫涩杀纱筛晒删闪陕赡缮伤赏烧绍赊摄慑设绅审婶肾渗声绳胜圣师狮湿诗尸时蚀实识驶势适释饰视试寿兽枢输书赎属术树竖数帅双谁税顺说硕烁丝饲耸怂颂讼诵擞苏诉肃虽随绥岁孙损笋缩琐锁獭挞抬态摊贪瘫滩坛谭谈叹汤烫涛绦讨腾誊锑题体屉条贴铁厅听烃铜统头秃图涂团颓蜕脱鸵驮驼椭洼袜弯湾顽万网韦违围为潍维苇伟伪纬谓卫温闻纹稳问瓮挝蜗涡窝卧呜钨乌污诬无芜吴坞雾务误锡牺袭习铣戏细虾辖峡侠狭厦吓锨鲜纤咸贤衔闲显险现献县馅羡宪线厢镶乡详响项萧嚣销晓啸蝎协挟携胁谐写泻谢锌衅兴汹锈绣虚嘘须许叙绪续轩悬选癣绚学勋询寻驯训讯逊压鸦鸭哑亚讶阉烟盐严颜阎艳厌砚彦谚验鸯杨扬疡阳痒养样瑶摇尧遥窑谣药爷页业叶医铱颐遗仪彝蚁艺亿忆义诣议谊译异绎荫阴银饮隐樱婴鹰应缨莹萤营荧蝇赢颖哟拥佣痈踊咏涌优忧邮铀犹游诱舆鱼渔娱与屿语吁御狱誉预驭鸳渊辕园员圆缘远愿约跃钥岳粤悦阅云郧匀陨运蕴酝晕韵杂灾载攒暂赞赃脏凿枣灶责择则泽贼赠扎札轧铡闸栅诈斋债毡盏斩辗崭栈战绽张涨帐账胀赵蛰辙锗这贞针侦诊镇阵挣睁狰争帧郑证织职执纸挚掷帜质滞钟终种肿众诌轴皱昼骤猪诸诛烛瞩嘱贮铸筑驻专砖转赚桩庄装妆壮状锥赘坠缀谆着浊兹资渍踪综总纵邹诅组钻";
 	private static $td="皚藹礙愛翺襖奧壩罷擺敗頒辦絆幫綁鎊謗剝飽寶報鮑輩貝鋇狽備憊繃筆畢斃幣閉邊編貶變辯辮標鼈別癟瀕濱賓擯餅並撥缽鉑駁蔔補財參蠶殘慚慘燦蒼艙倉滄廁側冊測層詫攙摻蟬饞讒纏鏟産闡顫場嘗長償腸廠暢鈔車徹塵沈陳襯撐稱懲誠騁癡遲馳恥齒熾沖蟲寵疇躊籌綢醜櫥廚鋤雛礎儲觸處傳瘡闖創錘純綽辭詞賜聰蔥囪從叢湊躥竄錯達帶貸擔單鄲撣膽憚誕彈當擋黨蕩檔搗島禱導盜燈鄧敵滌遞締顛點墊電澱釣調叠諜疊釘頂錠訂丟東動棟凍鬥犢獨讀賭鍍鍛斷緞兌隊對噸頓鈍奪墮鵝額訛惡餓兒爾餌貳發罰閥琺礬釩煩範販飯訪紡飛誹廢費紛墳奮憤糞豐楓鋒風瘋馮縫諷鳳膚輻撫輔賦複負訃婦縛該鈣蓋幹趕稈贛岡剛鋼綱崗臯鎬擱鴿閣鉻個給龔宮鞏貢鈎溝構購夠蠱顧剮關觀館慣貫廣規矽歸龜閨軌詭櫃貴劊輥滾鍋國過駭韓漢號閡鶴賀橫轟鴻紅後壺護滬戶嘩華畫劃話懷壞歡環還緩換喚瘓煥渙黃謊揮輝毀賄穢會燴彙諱誨繪葷渾夥獲貨禍擊機積饑譏雞績緝極輯級擠幾薊劑濟計記際繼紀夾莢頰賈鉀價駕殲監堅箋間艱緘繭檢堿鹼揀撿簡儉減薦檻鑒踐賤見鍵艦劍餞漸濺澗將漿蔣槳獎講醬膠澆驕嬌攪鉸矯僥腳餃繳絞轎較稭階節莖鯨驚經頸靜鏡徑痙競淨糾廄舊駒舉據鋸懼劇鵑絹傑潔結誡屆緊錦僅謹進晉燼盡勁荊覺決訣絕鈞軍駿開凱顆殼課墾懇摳庫褲誇塊儈寬礦曠況虧巋窺饋潰擴闊蠟臘萊來賴藍欄攔籃闌蘭瀾讕攬覽懶纜爛濫撈勞澇樂鐳壘類淚籬離裏鯉禮麗厲勵礫曆瀝隸倆聯蓮連鐮憐漣簾斂臉鏈戀煉練糧涼兩輛諒療遼鐐獵臨鄰鱗凜賃齡鈴淩靈嶺領餾劉龍聾嚨籠壟攏隴樓婁摟簍蘆盧顱廬爐擄鹵虜魯賂祿錄陸驢呂鋁侶屢縷慮濾綠巒攣孿灤亂掄輪倫侖淪綸論蘿羅邏鑼籮騾駱絡媽瑪碼螞馬罵嗎買麥賣邁脈瞞饅蠻滿謾貓錨鉚貿麽黴沒鎂門悶們錳夢謎彌覓冪綿緬廟滅憫閩鳴銘謬謀畝鈉納難撓腦惱鬧餒內擬膩攆撚釀鳥聶齧鑷鎳檸獰甯擰濘鈕紐膿濃農瘧諾歐鷗毆嘔漚盤龐賠噴鵬騙飄頻貧蘋憑評潑頗撲鋪樸譜棲淒臍齊騎豈啓氣棄訖牽扡釺鉛遷簽謙錢鉗潛淺譴塹槍嗆牆薔強搶鍬橋喬僑翹竅竊欽親寢輕氫傾頃請慶瓊窮趨區軀驅齲顴權勸卻鵲確讓饒擾繞熱韌認紉榮絨軟銳閏潤灑薩鰓賽三傘喪騷掃澀殺紗篩曬刪閃陝贍繕傷賞燒紹賒攝懾設紳審嬸腎滲聲繩勝聖師獅濕詩屍時蝕實識駛勢適釋飾視試壽獸樞輸書贖屬術樹豎數帥雙誰稅順說碩爍絲飼聳慫頌訟誦擻蘇訴肅雖隨綏歲孫損筍縮瑣鎖獺撻擡態攤貪癱灘壇譚談歎湯燙濤縧討騰謄銻題體屜條貼鐵廳聽烴銅統頭禿圖塗團頹蛻脫鴕馱駝橢窪襪彎灣頑萬網韋違圍爲濰維葦偉僞緯謂衛溫聞紋穩問甕撾蝸渦窩臥嗚鎢烏汙誣無蕪吳塢霧務誤錫犧襲習銑戲細蝦轄峽俠狹廈嚇鍁鮮纖鹹賢銜閑顯險現獻縣餡羨憲線廂鑲鄉詳響項蕭囂銷曉嘯蠍協挾攜脅諧寫瀉謝鋅釁興洶鏽繡虛噓須許敘緒續軒懸選癬絢學勳詢尋馴訓訊遜壓鴉鴨啞亞訝閹煙鹽嚴顔閻豔厭硯彥諺驗鴦楊揚瘍陽癢養樣瑤搖堯遙窯謠藥爺頁業葉醫銥頤遺儀彜蟻藝億憶義詣議誼譯異繹蔭陰銀飲隱櫻嬰鷹應纓瑩螢營熒蠅贏穎喲擁傭癰踴詠湧優憂郵鈾猶遊誘輿魚漁娛與嶼語籲禦獄譽預馭鴛淵轅園員圓緣遠願約躍鑰嶽粵悅閱雲鄖勻隕運蘊醞暈韻雜災載攢暫贊贓髒鑿棗竈責擇則澤賊贈紮劄軋鍘閘柵詐齋債氈盞斬輾嶄棧戰綻張漲帳賬脹趙蟄轍鍺這貞針偵診鎮陣掙睜猙爭幀鄭證織職執紙摯擲幟質滯鍾終種腫衆謅軸皺晝驟豬諸誅燭矚囑貯鑄築駐專磚轉賺樁莊裝妝壯狀錐贅墜綴諄著濁茲資漬蹤綜總縱鄒詛組鑽";
	//繁体to简体
 	public static function tradition2simple($sContent,$charset = 'UTF-8'){
  		$iContent=mb_strlen($sContent,$charset);
  		$simpleCN='';
  		for($i=0;$i<$iContent;$i++){
		   	$str=mb_substr($sContent,$i,1,$charset);
		   	$match=mb_strpos(FanJianConvert::$td,$str,null,$charset);
		   	$simpleCN.=($match!==false )?mb_substr(FanJianConvert::$sd,$match,1,$charset):$str;
		}
  		return $simpleCN;
 	}
 	//简体to繁体
 	public static function simple2tradition($sContent,$charset = 'UTF-8'){
  		$iContent=mb_strlen($sContent,$charset);
  		$traditionalCN='';
  		for($i=0;$i<$iContent;$i++){
			$str=mb_substr($sContent,$i,1,$charset);
		   	$match=mb_strpos(FanJianConvert::$sd,$str,null,$charset);
		   	$traditionalCN.=($match!==false )?mb_substr(FanJianConvert::$td,$match,1,$charset):$str;
  		}
  		return $traditionalCN;
 	} 
}
//对于中文字符串的编码转换
function charsetIconv($vars,$from='UTF-8',$to='GBK') {
	if (is_array($vars)) {
		$result = array();
		foreach ($vars as $key => $value) {
			$result[$key] = charsetIconv($value,$from,$to);
		}
	} else {
		$result = iconv($from,$to, $vars);
	}
	return $result;
}
//中英文混合字符串等长度截取
function sysCnSubStr($string,$length,$etc='...',$charset ='gbk',$replace=true) {
	$string = strip_tags($string);
	if($replace){
		$string = str_replace ( array ('　', ' ', '&nbsp;', '"', '<', '>' ), array ('', '', '', '"', '<', '>' ), $string );
	}
	if (strlen ( $string ) <= $length) {
		return $string;
	}
	$strcut = '';
	if (strtolower ( $charset ) == 'utf-8') {
		$n = $tn = $noc = 0;
		while ( $n < strlen ( $string ) ) {
			$t = ord ( $string [$n] );
			if ($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
				$tn = 1;
				$n ++;
				$noc ++;
			} elseif (194 <= $t && $t <= 223) {
				$tn = 2;
				$n += 2;
				$noc += 2;
			} elseif (224 <= $t && $t < 239) {
				$tn = 3;
				$n += 3;
				$noc += 2;
			} elseif (240 <= $t && $t <= 247) {
				$tn = 4;
				$n += 4;
				$noc += 2;
			} elseif (248 <= $t && $t <= 251) {
				$tn = 5;
				$n += 5;
				$noc += 2;
			} elseif ($t == 252 || $t == 253) {
				$tn = 6;
				$n += 6;
				$noc += 2;
			} else {
				$n ++;
			}
			if ($noc >= $length) {
				break;
			}
		}
		if ($noc > $length) {
			$n -= $tn;
		}
		$strcut = substr ( $string, 0, $n );
	} else {
		for($i = 0; $i < $length; $i ++) {
			$strcut .= ord ( $string [$i] ) > 127 ? $string [$i] . $string [++ $i] : $string [$i];
		}
	}
	return $strcut . $etc;
}
function c_addslashes($string, $force = 0) {
	if(!$GLOBALS['magic_quotes_gpc'] || $force) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = c_addslashes($val, $force);
			}
		} else {
			$string = addslashes($string);
		}
	}
	return $string;
}
function addslashes_mssql($string) {
	return str_replace('\'','\'\'',$string);
}
/**
* 字符串加密、解密函数
*
*
* @param	string	$txt		字符串
* @param	string	$operation	ENCODE为加密，DECODE为解密，可选参数，默认为ENCODE，
* @param	string	$key		密钥：数字、字母、下划线
* @param	string	$expiry		过期时间
* @return	string
*/
function sysAuth($string, $operation = 'ENCODE', $key = '', $expiry = 0) {
	$key_length = 4;
	$key = md5($key != '' ? $key : ECMS_KEY_ADMIN);
	$fixedkey = md5($key);
	$egiskeys = md5(substr($fixedkey, 16, 16));
	$runtokey = $key_length ? ($operation == 'ENCODE' ? substr(md5(microtime(true)), -$key_length) : substr($string, 0, $key_length)) : '';
	$keys = md5(substr($runtokey, 0, 16) . substr($fixedkey, 0, 16) . substr($runtokey, 16) . substr($fixedkey, 16));
	$string = $operation == 'ENCODE' ? sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$egiskeys), 0, 16) . $string : base64_decode(substr($string, $key_length));

	$i = 0; $result = '';
	$string_length = strlen($string);
	for ($i = 0; $i < $string_length; $i++){
		$result .= chr(ord($string{$i}) ^ ord($keys{$i % 32}));
	}
	if($operation == 'ENCODE') {
		return $runtokey . str_replace('=', '', base64_encode($result));
	} else {
		if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$egiskeys), 0, 16)) {
			return substr($result, 26);
		} else {
			return '';
		}
	}
}
//
function html2text($str){  
  	$str = preg_replace("/<style .*?<\/style>/is", "", $str);  
  	$str = preg_replace("/<script .*?<\/script>/is", "", $str);  
	$str = preg_replace("/<br \s*\/?\/>/i", "\n", $str);  
	$str = preg_replace("/<\/?p>/i", "\n\n", $str);  
	$str = preg_replace("/<\/?td>/i", "\n", $str);  
	$str = preg_replace("/<\/?div>/i", "\n", $str);  
	$str = preg_replace("/<\/?blockquote>/i", "\n", $str);  
	$str = preg_replace("/<\/?li>/i", "\n", $str);  
	$str = preg_replace("/\&nbsp\;/i", " ", $str);  
	$str = preg_replace("/\&nbsp/i", " ", $str);  
	$str = preg_replace("/\&amp\;/i", "&", $str);  
	$str = preg_replace("/\&amp/i", "&", $str);    
	$str = preg_replace("/\&lt\;/i", "<", $str);  
	$str = preg_replace("/\&lt/i", "<", $str);  
	$str = preg_replace("/\&ldquo\;/i", '"', $str);  
	$str = preg_replace("/\&ldquo/i", '"', $str);  
	$str = preg_replace("/\&lsquo\;/i", "'", $str);  
	$str = preg_replace("/\&lsquo/i", "'", $str);  
	$str = preg_replace("/\&rsquo\;/i", "'", $str);  
	$str = preg_replace("/\&rsquo/i", "'", $str);  
	$str = preg_replace("/\&gt\;/i", ">", $str);   
	$str = preg_replace("/\&gt/i", ">", $str);   
	$str = preg_replace("/\&rdquo\;/i", '"', $str);   
	$str = preg_replace("/\&rdquo/i", '"', $str);   
	$str = strip_tags($str);  
	$str = html_entity_decode($str, ENT_QUOTES, 'iso-8859-1');  
 	$str = preg_replace("/\&\#.*?\;/i", "", $str);          
 	return $str;
}
//后台权限检查
function sysPermissionsChecking($typeName){
	$msg=true;
	$user=$_SESSION['Admin_User'];
	if($user['userId']!=ECMS_SYSTEM_ADMIN){
		if(file_exists(ECMS_PATH_CONF.'system/user_'.$user['userId'].'.php')){
			$userPermissions=require ECMS_PATH_CONF.'system/user_'.$user['userId'].'.php';
			if(isset($userPermissions[$typeName])&&!empty($userPermissions[$typeName])){
				$msg=true;
			}else{
				$msg=false;
			}
		}else{
			$msg=false;
		}
	}
	return $msg;
}
//通用分页
function sysPageInfo($totalNum=0,$pageSize=10,$currentPage=null,$url,$params){
		//当前页 
		$currentPage=($currentPage == null ? 1 : $currentPage);
		//echo $totalNum.'-'.$pageSize.'-'.$currentPage.'-'.$url;
		//总页数
		$totalPage = $totalNum%$pageSize==0?$totalNum/$pageSize:(intval($totalNum/$pageSize)+1);
		//如果当前页大于总页则取总页数,否则不变
		$currentPage = $currentPage > $totalPage?$totalPage:$currentPage;
		//参数
		$params = $params==null?'':'&'.$params;
		//页段,上10页,下10页
		$pageParagraph = ceil($currentPage/10);
		//最大页段
		$maxPageParagraph = ceil($totalPage/10);
		//页信息
		$pageInfo = '<label class="pagingInfo">'.$currentPage.'/'.$totalPage.',&nbsp;'.$pageSize.'/页,&nbsp;&nbsp;共:&nbsp;'.$totalNum
		.'&nbsp;&nbsp;</label><a class="pointer" href="'.$url.'-1.htm" title="首页"><<</a>';
		if($pageParagraph > 1)
			$pageInfo .= '<a class="pointer" href="'.$url.'-'.(($pageParagraph - 1) * 10).'.htm" title="前十页"><&nbsp;</a>';
			 
		$startPage = ($pageParagraph - 1)*10 +1 ;
		$endPage = $pageParagraph*10 + 1;
		for($i=$startPage;$i<$endPage;$i++){
			if($i == $currentPage)
			{
				$pageInfo.='<a class="currentPage">'.$i.'</a>';
			}else{
				if($i <= $totalPage){
					$pageInfo .= '<a href="'.$url.'-'.$i.'.htm">'.$i.'</a>';
				}
			}
		}
		
		if($pageParagraph < $maxPageParagraph)
		{
			$pageInfo .= '<a class="pointer" href="'.$url.'-'.($pageParagraph *10+1).'.htm" title="下十页">&nbsp;></a>';
		}
		$pageInfo .= '<a class="pointer" href="'.$url.'-'.$totalPage.'.htm" title="末页">>></a>';
		return $pageInfo;
}
//通用分页
//updated by Cheneil on 14 May
function sysAdminPageInfo($totalNum=0,$pageSize=10,$currentPage=null,$url,$params){
		//当前页 
		$currentPage=($currentPage == null ? 1 : $currentPage);
		//echo $totalNum.'-'.$pageSize.'-'.$currentPage.'-'.$url;
		//总页数
		$totalPage = ($totalNum%$pageSize==0) ? ($totalNum/$pageSize) : (intval($totalNum/$pageSize)+1);
		//如果当前页大于总页则取总页数,否则不变
		$currentPage = $currentPage > $totalPage?$totalPage:$currentPage;
		//参数
		$params = $params==null?'':'&'.$params;
		//页段,上10页,下10页
		$pageParagraph = ceil($currentPage/10);
		//最大页段
		$maxPageParagraph = ceil($totalPage/10);
		//页信息
		$pageInfo = '<label class="pagingInfo">'.$currentPage.'/'.$totalPage.',&nbsp;'.$pageSize.'/页,&nbsp;&nbsp;共:&nbsp;'.$totalNum
		.'&nbsp;&nbsp;</label><a class="pointer" href="'.$url.'=1" title="首页"><<</a>';
		if($pageParagraph > 1)
			$pageInfo .= '<a class="pointer" href="'.$url.'='.(($pageParagraph - 1) * 10).'" title="前十页"><&nbsp;</a>';
			 
		$startPage = ($pageParagraph == 0) ? 1 : ($pageParagraph - 1)*10 +1 ;
		$endPage = $pageParagraph*10 + 1;
		for($i=$startPage;$i<$endPage;$i++){
			if($i == $currentPage)
			{
				$pageInfo.='<a class="currentPage">'.$i.'</a>';
			}else{
				if($i <= $totalPage){
					$pageInfo .= '<a href="'.$url.'='.$i.'">'.$i.'</a>';
				}
			}
		}
		
		if($pageParagraph < $maxPageParagraph)
		{
			$pageInfo .= '<a class="pointer" href="'.$url.'='.($pageParagraph *10+1).'" title="下十页">&nbsp;></a>';
		}
		$pageInfo .= '<a class="pointer" href="'.$url.'='.$totalPage.'" title="末页">>></a>';
		return $pageInfo;
}
//二维数组排序
function arraySort($arr,$keys,$type='asc'){
	$keysvalue = $newarray = array();
	foreach ($arr as $k=>$v){
		$keysvalue[$k] = $v[$keys];
	}
	if($type == 'asc'){
		asort($keysvalue);
	}else{
		arsort($keysvalue);
	}
	reset($keysvalue);
	foreach ($keysvalue as $k=>$v){
		$newarray[$k] = $arr[$k];
	}
	return $newarray;
} 
//获取用户IP
function getClinetIP(){
	if(!empty($_SERVER["HTTP_CLIENT_IP"]))
		$cip = $_SERVER["HTTP_CLIENT_IP"];
    else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
        $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    else if(!empty($_SERVER["REMOTE_ADDR"]))
        $cip = $_SERVER["REMOTE_ADDR"];
    else
        $cip = "无法获取ip";
    return $cip;
}
/*
 * 通过Ip检查是否重复点击
 * @return boolean
 */
function checkClickByIp($name,$id,$time){
	$value=getCookies('AUTH_MEMBER_IP');
	$ip=getClinetIP();
	if(!empty($value)){
		if(empty($value[$ip.'_'.$name.'_'.$id])){
			$value[$ip.'_'.$name.'_'.$id]=array('id'=>$id,'type'=>$name,'ip'=>$ip);
			setCookies('AUTH_MEMBER_IP', $value, $time);
			return true;
		}else{
			return false;
		}
	}else{
		$value[$ip.'_'.$name.'_'.$id]=array('id'=>$id,'type'=>$name,'ip'=>$ip);
		setCookies('AUTH_MEMBER_IP', $value, $time);
		return true;
	}
}
//设置cookie
function setCookies($name,$value,$time,$path='',$domain=''){
	$value=serialize($value);//将内容序列号
	$value=urlencode($value);//将内容进行url编码
	setcookie($name,$value,time()+$time,$path,$domain);
}
//获取cookie
function getCookies($name){
	$value='';
	if(isset($_COOKIE[$name])){
		$value=$_COOKIE[$name];
		if(!empty($value)){
			$value=urldecode($value);//将内容进行url解码
			$value=unserialize($value);//将内容反序列化
		}
	}
	return $value;
}
//将浏览过的（ProductViewed）或收藏的（ProductCollection）产品保存到cookie
function setProductCookies($name,$id,$time){
	$value=getCookies($name);
	if(!empty($value)){
		$value[$id]=array('id'=>$id,'time'=>time());
		setCookies($name, $value, $time);
	}else{
		$value[$id]=array('id'=>$id,'time'=>time());
		setCookies($name, $value, $time);
	}
}
//将浏览过的（ProductViewed）或收藏的（ProductCollection）产品从cookie中取出
function getProductCookies($name,$key='time',$type='desc'){
	$value=getCookies($name);
	if(!empty($value)){
		return arraySort($value,$key,$type);
	}else{
		return '';
	}
}
//将浏览过的（InfomationViewed）或收藏的（InfomationCollection）文章保存到cookie
function setInfomationCookies($name,$id,$time){
	$value=getCookies($name);
	if(!empty($value)){
		$value[$id]=array('id'=>$id,'time'=>time());
		setCookies($name, $value, $time);
	}else{
		$value[$id]=array('id'=>$id,'time'=>time());
		setCookies($name, $value, $time);
	}
}
//将浏览过的（InfomationViewed）或收藏的（InfomationCollection）文章从cookie中取出
function getInfomationCookies($name,$key='time',$type='desc'){
	$value=getCookies($name);
	if(!empty($value)){
		return arraySort($value,$key,$type);
	}else{
		return '';
	}
}
//蜘蛛统计
function spiderCount(){
	global $cfg;
	$useragent=$_SERVER['HTTP_USER_AGENT'];
	if(substr_count($useragent,"Baiduspider")){$spider="1";}
	if(substr_count($useragent,"Googlebot")){$spider="2";}
	if(substr_count($useragent,"MSNBot")){$spider="3";}
	if(substr_count($useragent,"Slurp")){$spider="4";}
	if(substr_count($useragent,"sogou")){$spider="5";}
	if(substr_count($useragent,"soso")){$spider="6";}
	if(substr_count($useragent,"youdao")){$spider="7";}
	if(substr_count($useragent,"LiuMang")){$spider="8";}
	if(!empty($spider)){
		$file=ECMS_PATH_SPIDER.date('Y-m').'.txt';
		$fp=fopen($file,"a");
		if($fp==false){
			die('文件'.$file.'被禁止创建或写入！');
		}else{
			fwrite($fp,$spider."|".time()."|".$_SERVER['REQUEST_URI'].$cfg['line_tag']);
		}
		fclose($fp);
	}
}
//获取蜘蛛名称
function spiderName($type){
	switch ($type) {
		case "1": 
		$name="百度";
		break;
		case "2": 
		$name="谷歌";
		break;
		case "3": 
		$name="MSN";
		break;
		case "4": 
		$name="雅虎";
		break;
		case "5": 
		$name="搜狗";
		break;
		case "6": 
		$name="搜搜";
		break;
		case "7": 
		$name="有道";
		break;
		case "8": 
		$name="流氓";
		break;
	}
	return $name;
}
function extend_file($file_name)
 {
	 $extend =explode("." , $file_name);
	 $va=count($extend)-1;
	 return $extend[$va];
 }
 

 function getParameter($param, $method='POST'){
 	if($method == 'POST'){
 		return !empty($_POST[$param]) ? $_POST[$param] : "";
 	}else{
 		return !empty($_GET[$param]) ? $_GET[$param] : "";
 	}
 }
 //解码javascript的escape
 function unescape($escstr)
 {
 	preg_match_all("/%u[0-9A-Za-z]{4}|%.{2}|[0-9a-zA-Z.+-_]+/", $escstr, $matches);
 	$ar = &$matches[0];
 	$c = "";
 	foreach($ar as $val)
 	{
 		if (substr($val, 0, 1) != "%")
 		{
 			$c .= $val;
 		} elseif (substr($val, 1, 1) != "u")
 		{
 			$x = hexdec(substr($val, 1, 2));
 			$c .= chr($x);
 		}
 		else
 		{
 			$val = intval(substr($val, 2), 16);
 			if ($val < 0x7F) // 0000-007F
 			{
 				$c .= chr($val);
 			} elseif ($val < 0x800) // 0080-0800
 			{
 				$c .= chr(0xC0 | ($val / 64));
 				$c .= chr(0x80 | ($val % 64));
 			}
 			else // 0800-FFFF
 			{
 				$c .= chr(0xE0 | (($val / 64) / 64));
 				$c .= chr(0x80 | (($val / 64) % 64));
 				$c .= chr(0x80 | ($val % 64));
 			}
 		}
 	}
 	return $c;
 }
 //根据用户输入的Email跳转到相应的电子邮箱首页
 function gotomail($mail){
 	$t=explode('@',$mail);
 	$t=strtolower($t[1]);
 	if($t=='163.com'){
 		return 'mail.163.com';
 	}else if($t=='vip.163.com'){
 		return 'vip.163.com';
 	}else if($t=='126.com'){
 		return 'mail.126.com';
 	}else if($t=='qq.com'||$t=='vip.qq.com'||$t=='foxmail.com'){
 		return 'mail.qq.com';
 	}else if($t=='gmail.com'){
 		return 'mail.google.com';
 	}else if($t=='sohu.com'){
 		return 'mail.sohu.com';
 	}else if($t=='tom.com'){
 		return 'mail.tom.com';
 	}else if($t=='vip.sina.com'){
 		return 'vip.sina.com';
 	}else if($t=='sina.com.cn'||$t=='sina.com'){
 		return 'mail.sina.com.cn';
 	}else if($t=='tom.com'){
 		return 'mail.tom.com';
 	}else if($t=='yahoo.com.cn'||$t=='yahoo.cn'){
 		return 'mail.cn.yahoo.com';
 	}else if($t=='tom.com'){
 		return 'mail.tom.com';
 	}else if($t=='yeah.net'){
 		return 'www.yeah.net';
 	}else if($t=='21cn.com'){
 		return 'mail.21cn.com';
 	}else if($t=='hotmail.com'){
 		return 'www.hotmail.com';
 	}else if($t=='sogou.com'){
 		return 'mail.sogou.com';
 	}else if($t=='188.com'){
 		return 'www.188.com';
 	}else if($t=='139.com'){
 		return 'mail.10086.cn';
 	}else if($t=='189.cn'){
 		return 'webmail15.189.cn/webmail';
 	}else if($t=='wo.com.cn'){
 		return 'mail.wo.com.cn/smsmail';
 	}else if($t=='139.com'){
 		return 'mail.10086.cn';
 	}else {
 		return 'mail.'.$t;
 	}
 }
//send sms
 function sendSMS($strMobile,$content){
 	$url=" http://service.winic.org:8009/sys_port/gateway/?id=%s&pwd=%s&to=%s&content=%s&time=";
 	$id = urlencode("88hom");
 	$pwd = urlencode("88hom168");
 	$to = urlencode($strMobile);
 	$content = iconv("UTF-8","GB2312",$content);
 	$rurl = sprintf($url, $id, $pwd, $to, $content);
 
 	$ch = curl_init();
 	curl_setopt($ch, CURLOPT_POST, 1);
 	curl_setopt($ch, CURLOPT_HEADER, 0);
 	curl_setopt($ch, CURLOPT_URL,$rurl);
 	curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
 
 	$result = curl_exec($ch);
 	//echo "result->".$result;
 	curl_close($ch);
 	return $result;
 }
?>