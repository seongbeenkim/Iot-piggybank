<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// 설렉트나 체크박스 선택함수
function checkSelect($csValue1,$csValue2,$csType) {
	if ((string)$csValue1==(string)$csValue2) {
		if ($csType=="s") {
			return "selected";
		} else if ($csType=="c") {
			return "checked";
		} else if ($csType=="r") {
			return "readonly";
		}
	}
}

//정보 리턴
function fnRetState($sValue,$arrValue) {
	for( $iCnt=0; $iCnt<sizeof($arrValue); $iCnt++ ){
		if (($sValue==$arrValue[$iCnt][0])) {
			return $arrValue[$iCnt][1];
		}
	}
}

function fnThumb($sPath01,$sPath02,$sFile,$iWidth,$iHeight) {
	//추가내용
	/*
	imagepng(그림(리소스),파일이름(있으면 저장함),압축한 정도(1~9));
	imagegif(그림(리소스),파일이름(있으면 저장함));
	imagejpeg(그림(리소스),파일이름(있으면 저장함),품질(최대 100));
	*/
	$bCheckValue=false;
	$arrValue01=explode('.',$sFile);
	$sValue02=array_pop($arrValue01);
	$sFileNameExt=strtolower($sValue02);
	$sCheckFile = array("jpg","png","gif","jpeg");
	if(in_array($sFileNameExt,$sCheckFile)) {
		$bCheckValue=true;
	}
	if ($bCheckValue) {
		$sSourceImage = imagecreatefromstring(file_get_contents($sPath02.$sFile)); //파일읽기
		$iOriWidth = imagesx($sSourceImage);
		$iOriHeight = imagesy($sSourceImage);
		$iHeight02=$iOriHeight*$iWidth/$iOriWidth;
		if ($iHeight=="") {
			if ($iHeight02<1) {
				$iHeight=1;
			} else {
				$iHeight=round($iHeight02);
			}
		}
		if ($sFileNameExt=="png") {
			$sVirtualImage = imagecreatetruecolor($iWidth,$iHeight); //가상 이미지 만들기
			imagealphablending($sVirtualImage, false);
			imagesavealpha($sVirtualImage, true);
			$sTransparent = imagecolorallocatealpha($sVirtualImage, 255, 255, 255, 127);
			imagecopyresampled($sVirtualImage, $sSourceImage,0,0,0,0,$iWidth, $iHeight,$iOriWidth,$iOriHeight); //사이즈 변경하여 복사
			imagepng($sVirtualImage,$sPath01."/".$arrValue01[0].".png",9); // png파일로 썸네일 생성
			$sFileName=$arrValue01[0].".png";
		} else if ($sFileNameExt=="gif") {
			$sVirtualImage = imagecreatetruecolor($iWidth,$iHeight); //가상 이미지 만들기
			imagecopyresampled($sVirtualImage, $sSourceImage,0,0,0,0,$iWidth, $iHeight,$iOriWidth,$iOriHeight); //사이즈 변경하여 복사
			imagegif($sVirtualImage,$sPath01."/".$arrValue01[0].".gif");
			$sFileName=$arrValue01[0].".gif";
		} else {
			$sVirtualImage = imagecreatetruecolor($iWidth,$iHeight); //가상 이미지 만들기
			imagecopyresampled($sVirtualImage, $sSourceImage,0,0,0,0,$iWidth, $iHeight,$iOriWidth,$iOriHeight); //사이즈 변경하여 복사
			imagejpeg($sVirtualImage,$sPath01."/".$arrValue01[0].".jpg",100);
			$sFileName=$arrValue01[0].".jpg";
		}
		return $sFileName;
	}
}

function fnAlertMsg($sValue) {
	$sRetValue ="<script language='javascript' type='text/javascript'>\n";
	$sRetValue .="alert('".$sValue."');\n";
	$sRetValue .="history.back();";
	$sRetValue .="</script>";
	echo $sRetValue;
	exit;
}
function fnAlertMsgUrl($sValue01,$sValue02) {
	$sRetValue ="<script language='javascript' type='text/javascript'>\n";
	$sRetValue .="alert('".$sValue01."');\n";
	$sRetValue .="location.href='".$sValue02."';";
	$sRetValue .="</script>";
	echo $sRetValue;
	exit;
}
function fnParam() {
	$arrData="?sMethod=get";
//	echo sizeof($_REQUEST);
	foreach($_REQUEST as $key => $val){
		if ($key!="sMethod") {
			$arrData.="&".$key."=".urlencode(addslashes(trim($val)));
		}
	}
	return $arrData;
}
//Idx 제거
function fnParam02() {
	$arrData="?sMethod=get";
//	echo sizeof($_REQUEST);
	foreach($_REQUEST as $key => $val){
		if (!($key=="Idx"||$key=="sMethod")) {
			$arrData.="&".$key."=".urlencode(addslashes(trim($val)));
		}
	}
	return $arrData;
}
//서브 제거
function fnParam03() {
	$arrData="?sMethod=get";
//	echo sizeof($_REQUEST);
	foreach($_REQUEST as $key => $val){
		if (!($key=="Idx"||$key=="sPage02"||$key=="sMethod")) {
			$arrData.="&".$key."=".urlencode(addslashes(trim($val)));
		}
	}
	return $arrData;
}
function fnGetKind($sValue01) {
	$CI = get_instance();
	$sRetValue ="";
	$sQuery="select tbl1.Kind from tbl_kind as tbl1 where tbl1.Category='".$sValue01."' order by tbl1.Sort asc " ;
	$arrFnResult=$CI->db->query($sQuery);
	$sRetValue=$arrFnResult;
	return $sRetValue;
}
function fnGetKeyword($sValue) {
	$CI = get_instance();
	$sRetValue ="";
	$sQuery="select tbl1.Idx,tbl1.Keyword from tbl_keyword as tbl1 where Category='".$sValue."' order by tbl1.Sort asc " ;
	$arrFnResult=$CI->db->query($sQuery);
	$sRetValue=$arrFnResult;
	return $sRetValue;
}

function fnGetStyle01($sValue) {
	if ($sValue=="0") {
		$sRetValue="inverse";
	} else {
		$sRetValue="primary m-l-70";
	}
	return $sRetValue;
}
function fnGetReplyYn($sValue) {
	if ($sValue=="0") {
		$sRetValue="<h5><span class='label label-danger'>답변 준비중</span></h5>";
	} else {
		$sRetValue="<h5><span class='label label-default'>답변 완료</span></h5>";
	}
	return $sRetValue;
}
function fnGetWeightImg($sValue) {
	if ($sValue==0) {
		$sRetValue="";
	} else if ($sValue>0) {
		$sRetValue="<span class='text-primary'><i class='fa fa-arrow-up'></i></span>";
	} else {
		$sRetValue="<span class='text-danger'><i class='fa fa-arrow-down'></i></span>";
	}
	return $sRetValue;
}

function fnGetWeightImg02($sValue) {
	if ($sValue==0) {
		$sRetValue="<span class='label label-default'>".$sValue."% <i class='fa fa-arrows-h'></i></span>";
	} else if ($sValue>0) {
		$sRetValue="<span class='label label-primary'>".$sValue."% <i class='fa fa-arrow-up'></i>";
	} else {
		$sRetValue="<span class='label label-danger'>".$sValue."% <i class='fa fa-arrow-down'></i></span>";
	}
	return $sRetValue;
}
function fnFileLink($sValue01,$sFolder) { // 이미지명 , 폴더명
	$bCheckValue=false;
	$arrValue01=explode('.',$sValue01);
	$sValue02=array_pop($arrValue01);
	$sFileNameExt=strtolower($sValue02);
	$sCheckFile = array("jpg","png","gif","jpeg");
	$sRetValue="";
	if(in_array($sFileNameExt,$sCheckFile)) {
		$bCheckValue=true;
	}
	if ($bCheckValue) {
		$sRetValue="<a data-lightbox='gallery-group' href='http://img.iminfintech.co.kr/".$sFolder."/".$sValue01."'><img src='http://img.iminfintech.co.kr/".$sFolder."/medium/".$sValue01."'/></a>";
	} else {
		$sRetValue="<a href='/download/download?FilePath=/".$sFolder."/".$sValue01."'>".$sValue01."</a>";
	}
	return $sRetValue;
}
function fnstrCuting($string, $limit_length) {
	$string=strip_tags($string);
	$string=mb_strimwidth($string,'0',$limit_length, '...', 'utf-8');
	return $string;
}
function fnEnter($sValue) {
	$sRetValue=nl2br($sValue);
	$sRetValue=htmlspecialchars_decode($sRetValue);
	return $sRetValue;
}


function fnCheckPermission($sValue01,$sValue02) {
	if (strpos($sValue01,$sValue02) > -1) {
		return "checked";
	}
}
function fnImageView($sValue01,$sValue02,$sValue03) { // 이미지명,css클래스,직접입력 스타일
	$bCheckValue=false;
	$arrValue01=explode('.',$sValue01);
	$sValue05=array_pop($arrValue01);
	$sFileNameExt=strtolower($sValue05);
	$sCheckFile = array("jpg","png","gif","jpeg");
	$sRetValue="";
	if(in_array($sFileNameExt,$sCheckFile)) {
		$bCheckValue=true;
	}
	if ($bCheckValue) {
		if ($sValue01!="") {
			$sRetValue="<img src='http://img.iminfintech.co.kr".$sValue01."' class='".$sValue02."' style='".$sValue03."'/>";
		} else {
			$sRetValue="";
		}
	} else {
		$sRetValue="";
	}
	return $sRetValue;
}
//스타일 확대가 있는 이미지
function fnImageView02($sValue01,$sValue02,$sValue03) { // 이미지명,css클래스,직접입력
	$bCheckValue=false;
	$arrValue01=explode('.',$sValue01);
	$sValue05=array_pop($arrValue01);
	$sFileNameExt=strtolower($sValue05);
	$sCheckFile = array("jpg","png","gif","jpeg");
	$sRetValue="";
	if(in_array($sFileNameExt,$sCheckFile)) {
		$bCheckValue=true;
	}
	if ($bCheckValue) {
		if ($sValue01!="") {
			$sOriginalUrl= str_replace("/medium/","/",$sValue01);
			$sRetValue="<a data-lightbox='gallery-group' href='http://img.iminfintech.co.kr".$sOriginalUrl."'><img src='http://img.iminfintech.co.kr".$sValue01."' class='".$sValue02."' style='".$sValue03."'/></a>";
		} else {
			$sRetValue="";
		}
	} else {
		$sRetValue="";
	}
	return $sRetValue;
}
//파일삭제
function fnDelFile($sValue) {
	if (file_exists($sValue)) {
		unlink($sValue);
	}
}
function fnGetRegistItem($sValue01) {
	$CI = get_instance();
	$sRetValue ="";
	$sQuery="select tbl1.ItemName from tbl_regist_item as tbl1 where tbl1.Idx='".$sValue01."' " ;
	$arrFnResult=$CI->db->query($sQuery)->row()->ItemName;
	$sRetValue=$arrFnResult;
	return $sRetValue;
}
function fnBannerView01($sValue01) {
	$sRetValue="";
	if ($sValue01=="1") {
		$sRetValue="일반";
	} else if ($sValue01=="2") {
		$sRetValue="회원";
	} else if ($sValue01=="3") {
		$sRetValue="스테이지";
	}
	return $sRetValue;
}
function fnBannerView02($sValue01) {
	$sRetValue="";
	if ($sValue01=="1") {
		$sRetValue="고정";
	} else if ($sValue01=="2") {
		$sRetValue="맞춤";
	}
	return $sRetValue;
}
function fnBannerView03($sValue01) {
	$sRetValue ="";
	if ($sValue01!=0) {
		$CI = get_instance();
		$sQuery="select tbl1.CategoryName from tbl_category as tbl1 where tbl1.Idx='".$sValue01."' " ;
		$sRetValue=$CI->db->query($sQuery)->row()->CategoryName;
	}
	return $sRetValue;
}
function fnMemberGrade($sValue01) {
	switch(trim($sValue01)) {
		default:
			return "";
		break;
		case '1':
			return "<span class='badge badge-default badge-square'>일반</span>";
		break;
		case '3':
			return "<span class='badge badge-primary badge-square'>플러스</span>";
		break;
		case '4':
			return "<span class='badge badge-primary badge-square'>제휴</span>";
		break;
	}
}
function fnMemberGrade02($sValue01) {
	switch(trim($sValue01)) {
		default:
			return "";
		break;
		case '1':
			return "일반";
		break;
		case '3':
			return "플러스";
		break;
		case '4':
			return "제휴";
		break;
	}
}
function fnMemberAgreePath($sValue01) {
	switch(trim($sValue01)) {
		default:
			return "";
		break;
		case 'F':
			return "<span class='badge badge-facebook'>F</span>";
		break;
		case 'K':
			return "<span class='badge badge-kakao'>K</span>";
		break;
		case 'E':
			return "<span class='badge badge-default'>E</span>";
		break;
	}
}
function fnMemberNanum($sValue01) {
	switch(trim($sValue01)) {
		default:
			return "";
		break;
		case 'Y':
			return "<span class='badge badge-primary badge-square'>Y</span>";
		break;
		case 'N':
			return "<span class='badge badge-default badge-square'>N</span>";
		break;
	}
}
function fnMemberNanum02($sValue01) {
	switch(trim($sValue01)) {
		default:
			return "";
		break;
		case 'Y':
			return "Y";
		break;
		case 'N':
			return "N";
		break;
	}
}
function fnMemberGender($sValue01) {
	switch(trim($sValue01)) {
		default:
			return "";
		break;
		case 'M':
			return "<span class='fa fa-mars text-primary'></span>";
		break;
		case 'W':
			return "<span class='fa fa-venus text-danger'></span>";
		break;
	}
}
function fnMemberGender02($sValue01) {
	switch(trim($sValue01)) {
		default:
			return "";
		break;
		case 'M':
			return "남자";
		break;
		case 'W':
			return "여자";
		break;
	}
}
function fnMemberAge($sValue01) {
	if ($sValue01!="") {
		$sValue=substr($sValue01,0,2);
		if ($sValue>date("y")) {
			$sValue="19".$sValue;
		} else {
			$sValue="20".$sValue;
		}
		$sValue=date("Y")-$sValue+1;
	} else {
		$sValue="";
	}
		return $sValue;
}
function fnMemberSearchAge($sValue) {
	$sValue01=date("Y")+1;
//	$sRetValue=" and left(tbl1.PlusUserPSNNo,2)<='".$sValue01."' and left(tbl1.PlusUserPSNNo,2)>='".$sValue02."' ";
	$sRetValue=" and floor((".$sValue01."-tbl1.UserYear)/10)='".$sValue."' ";
	return $sRetValue;
}
function fnMemberCategory($sValue) {
	$CI = get_instance();
	$arrValue=explode("||",$sValue);
	if (is_array($arrValue)) {
		for ($iCnt=0;$iCnt<sizeof($arrValue)-1;$iCnt++) {
			$sQuery="select tbl1.CategoryName from tbl_category as tbl1 where tbl1.Idx='".$arrValue[$iCnt]."' " ;
			$CategoryName=$CI->db->query($sQuery)->row()->CategoryName;
//			echo " <span class='badge badge-primary badge-square pull-left'>".$CategoryName."</span> ";
			echo " [".$CategoryName."] " ;
		}
	}
}
function fnMemberSuccessionYn($sValue01) {
	switch(trim($sValue01)) {
		default:
			return "";
		break;
		case 'N':
			return "<span class='badge badge-default badge-square'>N</span>";
		break;
		case 'Y':
			return "<span class='badge badge-primary badge-square'>Y</span>";
		break;
	}
}
function fnMemberSafeKeyYn($sValue01) {
	if ($sValue01!="") {
		echo "<span class='badge badge-primary badge-square'>Y</span>";
	}
}
function fnMemberSMSYn($sValue01) {
	switch(trim($sValue01)) {
		default:
			return "";
		break;
		case 'N':
			return "<span class='badge badge-default badge-square'>N</span>";
		break;
		case 'Y':
			return "<span class='badge badge-primary badge-square'>Y</span>";
		break;
	}
}
function fnMemberEmailYn($sValue01) {
	switch(trim($sValue01)) {
		default:
			return "";
		break;
		case 'N':
			return "<span class='badge badge-default badge-square'>N</span>";
		break;
		case 'Y':
			return "<span class='badge badge-primary badge-square'>Y</span>";
		break;
	}
}
function fnNoticeCategory($sValue01) {
	switch(trim($sValue01)) {
		default:
			return "";
		break;
		case '1':
			return "[서비스운영]";
		break;
		case '2':
			return "[시스템관련]";
		break;
		case '3':
			return "[이벤트]";
		break;
	}
}
function fnStageSecret($sValue01) {
	switch(trim($sValue01)) {
		default:
			return "";
		break;
		case 'Y':
			return "<i class='fa fa-2x fa-lock'></i>";
		break;
		case 'N':
			return "<i class='fa fa-2x fa-unlock'></i>";
		break;
	}
}
function fnStageSecret02($sValue01) {
	switch(trim($sValue01)) {
		default:
			return "";
		break;
		case 'Y':
			return "<i class='fa fa-lock text-danger f-s-20'></i>";
		break;
		case 'N':
			return "<i class='fa fa-unlock text-danger f-s-20'></i>";
		break;
	}
}
function fnStageSecret03($sValue01) {
	switch(trim($sValue01)) {
		default:
			return "";
		break;
		case 'Y':
			return "비공개";
		break;
		case 'N':
			return "공개";
		break;
	}
}
function fnStageState($sValue01) {
	switch(trim($sValue01)) {
		default:
			return "";
		break;
		case 'R':
			return "대기";
		break;
		case 'S':
			return "진행";
		break;
		case 'C':
			return "단순연체";
		break;
		case 'L':
			return "연체";
		break;
		case 'W':
			return "부실";
		break;
		case 'E':
			return "완료";
		break;
		case 'D':
			return "삭제";
		break;
	}
}
function fnStageState02($sValue01) {
	switch(trim($sValue01)) {
		default:
			return "";
		break;
		case 'R':
			return "<span class='badge badge-default badge-square'>대기</span>";
		break;
		case 'S':
			return "<span class='badge badge-primary badge-square'>진행</span>";
		break;
		case 'C':
			return "<span class='badge badge-warning badge-square'>단순연체</span>";
		break;
		case 'L':
			return "<span class='badge badge-warning badge-square'>연체</span>";
		break;
		case 'W':
			return "<span class='badge badge-danger badge-square'>부실</span>";
		break;
		case 'E':
			return "<span class='badge badge-success badge-square'>완료</span>";
		break;
		case 'D':
			return "<span class='badge badge-inverse badge-square'>삭제</span>";
		break;
	}
}
function fnSelectEffect($sValue01,$sValue02) {
	if ($sValue01==$sValue02) {
		return "badge-warning";
	} else {
		return "badge-default";
	}
}
function fnRecommend($sValue01) {
	if ($sValue01=="Y") {
		return "<i class='fa fa-2x fa-star text-warning'></i>";
	} else {
		return "";
	}
}

function fnDepositState($sValue01) {
	if ($sValue01=="Y") {
		return "정상";
	} else if ($sValue01=="A") {
		return "대기";
	} else if ($sValue01=="N") {
		return "연체";
	} else if ($sValue01=="H") {
		return "부분입금";
	} else {
		return "";
	}
}
function fnDepositState02($sValue01) {
	if ($sValue01=="Y") {
		return "<span class='badge badge-info badge-square'>정상</span>";
	} else if ($sValue01=="A") {
		return "<span class='badge badge-default badge-square'>대기</span>";
	} else if ($sValue01=="H") {
		return "<span class='badge badge-warning badge-square'>부분입금</span>";
	} else if ($sValue01=="N") {
		return "<span class='badge badge-warning badge-square'>연체</span>";
	} else {
		return "";
	}
}
function fnRate($periods,$payment,$present,$future,$type=null,$guess=null) {
	if ($guess=="") { $guess=0.01;}
	if ($future=="") { $future=0;}
	if ($type=="") { $type=0;}
	// Set maximum epsilon for end of iteration
	$epsMax = 1e-10;
	// Set maximum number of iterations
	$iterMax = 10;
	$y=0;
	$y0=0;
	$y1=0;
	$x0=0;
	$x1=0;
	$f=0;
	$i=0;
	$rate=$guess;
	if (abs($rate) < $epsMax) {
		$y = $present * (1 + $periods * $rate) + $payment * (1 + $rate * $type) * $periods + $future;
	} else {
		$f = exp($periods * log(1 + $rate));
		$y = $present * $f + $payment * (1 / $rate + $type) * ($f - 1) + $future;
	}
	$y0 = $present + $payment * $periods + $future;
	$y1 = $present * $f + $payment * (1 / $rate + $type) * ($f - 1) + $future;
	$i = $x0 = 0;
	$x1 = $rate;
	while ((abs($y0 - $y1) > $epsMax) && ($i < $iterMax)) {
		$rate = ($y1 * $x0 - $y0 * $x1) / ($y1 - $y0);
		$x0 = $x1;
		$x1 = $rate;
		if (abs($rate) < $epsMax) {
			$y = $present * (1 + $periods * $rate) + $payment * (1 + $rate * $type) * $periods + $future;
		} else {
			$f = exp($periods * log(1 + $rate));
			$y = $present * $f + $payment * (1 / $rate + $type) * ($f - 1) + $future;
		}
		$y0 = $y1;
		$y1 = $y;
		++$i;
	}
	return $rate;
}
function fnFixed($sValue) {
	$sRetValue ="";
	if ($sValue!="") {
		$sRetValue=round(($sValue*100))/100;
	}
	return $sRetValue;
}
function fnStageCode() {
	$NowYear = date("y");
	$StageCode01="A";
	for ($StartYear=16;$StartYear<$NowYear;$StartYear++) {
		++$StageCode01;
	}
	$StageCode02=date("z");
	$iRemainSpace=3-strlen($StageCode02);
	for ($iCnt=0;$iCnt<$iRemainSpace;$iCnt++) {
		$StageCode02="0".$StageCode02;
	}
	$sRetStageCode=$StageCode01.$StageCode02;
	return $sRetStageCode;
}
function fnLeaveReason($sValue01) {
	switch(trim($sValue01)) {
		default:
			return "";
		break;
		case '1':
			return "이율이 낮아서";
		break;
		case '2':
			return "사람이 안차서";
		break;
		case '3':
			return "개인 변심";
		break;
		case '4':
			return "서비스 불만";
		break;
		case '5':
			return "순번 변경 목적";
		break;
	}
}
function fnConsultingType($sValue01) {
	switch(trim($sValue01)) {
		default:
			return "";
		break;
		case '1':
			return "상품 설명";
		break;
		case '2':
			return "상품 추천";
		break;
		case '3':
			return "서비스 이용";
		break;
		case '4':
			return "불만 접수";
		break;
		case '5':
			return "서비스 탈퇴";
		break;
		case '6':
			return "약정 철회";
		break;
	}
}

function fnConsultingResultType($sValue01) {
	switch(trim($sValue01)) {
		default:
			return "";
		break;
		case '1':
			return "즉시 처리";
		break;
		case '2':
			return "관리자 처리";
		break;
		case '3':
			return "피드백 예정";
		break;
		case '4':
			return "기타(장시간 소요)";
		break;
	}
}

function fnUserType($sValue01) {
	switch(trim($sValue01)) {
		default:
			return "";
		break;
		case '1':
			return "일반형";
		break;
		case '2':
			return "따지는형";
		break;
		case '3':
			return "노인형";
		break;
		case '4':
			return "불량형";
		break;
	}
}
function fnUserWithdrawState($sValue01) {
	switch(trim($sValue01)) {
		default:
			return "";
		break;
		case '1':
			return "<span class='text-danger'>처리중</span>";
		break;
		case '2':
			return "<span class='text-info'>보류중</span>";
		break;
		case '3':
			return "<span class='text-warning'>승계처리</span>";
		break;
		case '4':
			return "<span class='text-default'>탈퇴처리</span>";
		break;
	}
}
function fnUserWithdrawState02($sValue01) {
	switch(trim($sValue01)) {
		default:
			return "";
		break;
		case '1':
			return "<span class='badge badge-danger badge-square width-75'>처리중</span>";
		break;
		case '2':
			return "<span class='badge badge-info badge-square width-75'>보류중</span>";
		break;
		case '3':
			return "<span class='badge badge-warning badge-square width-75'>승계처리</span>";
		break;
		case '4':
			return "<span class='badge badge-default badge-square width-75'>탈퇴처리</span>";
		break;
	}
}
function fnFileInfo($sValue) {
	if ($sValue!=="") {
		$arrFileInfo= pathinfo($sValue);
		return $arrFileInfo;
	}
}
function fnEraser($sValue) {
	$fnRetValue="";
	if ($sValue!="") {
		$sValue=str_replace(",","",$sValue);
		$sValue=str_replace("원","",$sValue);
	}
	$fnRetValue=$sValue;
	return $fnRetValue;
}

function fnRound($sValue01,$sValue02) {
	$fnRetValue=substr($sValue01,0,strpos($sValue01,'.')+$sValue02+1);
	$fnRetValue=round($fnRetValue,$sValue02-1);
	/*
	$fnRetValue=floor($sValue01*pow(10,$sValue02))*pow(0.1,$sValue02);
//	$fnRetValue=round($fnRetValue,$sValue02-1);
	$fnRetValue=round($fnRetValue,$sValue02-1);
	*/
	return $fnRetValue;
}
//총 1000에서 각 부분의 리스크를 뺀 나머지 점수
function fnICSS($sValue01,$sValue02,$sValue03) { // 회원 고유번호,ICSS 컬럼명,ICSS 변경점수
	if ($sValue01!=""&&$sValue02!="") {
		$CI = &get_instance();
		//기존회원 정보가 있는지 조회
		$sQuery="SELECT count(Idx) as iCnt01 FROM tbl_member_ICSS WHERE UserIdx='".$sValue01."'";
		$iCnt01= $CI->db->query($sQuery)->row_array()["iCnt01"];
		if ($iCnt01==0) {
			$UserRisk=$sValue03;
			$UserICSSScore=1000-$UserRisk;
			$UserICSSScore=fnRound($UserICSSScore,2);
			$UserICSSGrade=fnICSSGrade($UserICSSScore);
			$sQuery="insert into tbl_member_ICSS (UserIdx,ICSSGrade,ICSSScore,RISKScore,".$sValue02.") values ('".$sValue01."','".$UserICSSGrade."','".$UserICSSScore."','".$UserRisk."','".$sValue03."')";
			$CI->db->query($sQuery);
		} else {
			//해당 컬럼의 내용 업데이트
			$sQuery="update tbl_member_ICSS set ".$sValue02."='".$sValue03."' where UserIdx='".$sValue01."'";
			$CI->db->query($sQuery);
			//등급 및 점수 재설정
			$sQuery="SELECT NiceGradeScore,NiceMoneyScore,OPRScore,SNScore,CLAScore,POUScore,SNEScore,ARScore,DSScore FROM tbl_member_ICSS WHERE UserIdx='".$sValue01."'";
			$UserOriInfo= $CI->db->query($sQuery)->row_array();
			$UserRisk=$UserOriInfo["NiceGradeScore"]+$UserOriInfo["NiceMoneyScore"]+$UserOriInfo["OPRScore"]+$UserOriInfo["SNScore"]+$UserOriInfo["CLAScore"]+$UserOriInfo["POUScore"]+$UserOriInfo["SNEScore"]+$UserOriInfo["ARScore"]+$UserOriInfo["DSScore"];
			$UserICSSScore=1000-$UserRisk;
			$UserICSSScore=fnRound($UserICSSScore,2);
			$UserICSSGrade=fnICSSGrade($UserICSSScore);
			$sQuery="update tbl_member_ICSS set ICSSGrade='".$UserICSSGrade."',ICSSScore='".$UserICSSScore."',RISKScore='".$UserRisk."' where UserIdx='".$sValue01."'";
			$CI->db->query($sQuery);
		}
	}
}
function fnICSSNiceGrade($iNiceGrade) { // 나이스 등급
	$fnRetValue="";
	$fnArrValue= file_get_contents("/home/src/imin/homepage/assets/json/icss-nice-grade.json");
	$fnArrValue= utf8_encode($fnArrValue);
	$fnArrValue= json_decode($fnArrValue,true);
	for ($iCnt=0;$iCnt<count($fnArrValue);$iCnt++) {
		if ($fnArrValue[$iCnt][0]==$iNiceGrade) {
			$fnRetValue=$fnArrValue[$iCnt][1];
//			var_dump($fnArrNiceGrade[$iCnt]);
		}
//			var_dump($this->ICSSSN[$iCnt]);
	}
	if ($fnRetValue!="") {
		$fnRetValue=$fnRetValue*0.4;
//		$fnRetValue=fnRound($fnRetValue,4);
	}
	return $fnRetValue;
}
function fnICSSNiceMoney($iNiceMoney,$iNiceGrade) {  // 나이스 대출금액,나이스 등급
	$fnRetValue="";
	$fnArrValue= file_get_contents("/home/src/imin/homepage/assets/json/icss-nice-money.json");
	$fnArrValue= utf8_encode($fnArrValue);
	$fnArrValue= json_decode($fnArrValue,true);
	for ($iCnt=0;$iCnt<count($fnArrValue);$iCnt++) {
		if ($fnArrValue[$iCnt][0]>=$iNiceMoney) {
			$fnRetValue=$fnArrValue[$iCnt][$iNiceGrade];
//			var_dump($fnArrNiceGrade[$iCnt]);
		} else {
			break;
		}
//			var_dump($this->ICSSSN[$iCnt]);
	}
	if ($fnRetValue!="") {
		$fnRetValue=$fnRetValue*10;
//		$fnRetValue=fnRound($fnRetValue,4);
	}
	return $fnRetValue;
}
function fnICSSOPR($iPaymentNumber01,$iPaymentNumber02) { //누적 납입 횟수,연체 누적 횟수
	if ($iPaymentNumber02>10) { $iPaymentNumber02=10; }
	//납입 횟수가 없고, 연체횟수만 존재시 초기값 적용
	if (($iPaymentNumber01==0)&&($iPaymentNumber02==1)) {
		$iPaymentNumber01=1;
	}
	//연체 누적횟수가 납입 횟수보다 많을 시 연체 누적횟수=납입 횟수 적용
	if ($iPaymentNumber02>$iPaymentNumber01) {
		$iPaymentNumber02=$iPaymentNumber01;
	}
	$fnRetValue=0;
	if ($iPaymentNumber02!=0) {
		$fnArrValue= file_get_contents("/home/src/imin/homepage/assets/json/icss-opr.json");
		$fnArrValue= utf8_encode($fnArrValue);
		$fnArrValue= json_decode($fnArrValue,true);
		for ($iCnt=0;$iCnt<count($fnArrValue);$iCnt++) {
			if ($fnArrValue[$iCnt][0]==$iPaymentNumber01) {
				$fnRetValue=$fnArrValue[$iCnt][$iPaymentNumber02];
			}
		}
		if ($fnRetValue!="") {
			$fnRetValue=$fnRetValue*0.2;
	//		$fnRetValue=fnRound($fnRetValue,4);
		}
	}
	return $fnRetValue;
}
function fnICSSSN($iStageNumber,$iMyTurnNumber) { //스테이지 인원수,나의 순번
	$fnRetValue="";
	$fnArrValue= file_get_contents("/home/src/imin/homepage/assets/json/icss-sn.json");
	$fnArrValue= utf8_encode($fnArrValue);
	$fnArrValue= json_decode($fnArrValue,true);
	for ($iCnt=0;$iCnt<count($fnArrValue);$iCnt++) {
		if ($fnArrValue[$iCnt][0]==$iStageNumber) {
			$fnRetValue=$fnArrValue[$iCnt][$iMyTurnNumber];
		}
	}
	if ($fnRetValue!="") {
		$fnRetValue=$fnRetValue*10;
//		$fnRetValue=fnRound($fnRetValue,4);
	}
	return $fnRetValue;
}
function fnICSSSNAccumulate($iUserIdx) { //회원 고유번호
	$fnRetValue=0;
	$CI = &get_instance();
	$sQuery="SELECT tbl1.MyTurn,tbl2.StageNum FROM tbl_stage_apply as tbl1 left join tbl_stage as tbl2 on tbl1.ParentIdx=tbl2.Idx WHERE tbl2.State!='E' and tbl1.UserIdx='".$iUserIdx."'";

	$arrFnResult= $CI->db->query($sQuery)->result_array();
	if ($arrFnResult) {
		foreach($arrFnResult as $row) {
			$fnRetValue=$fnRetValue+fnICSSSN($row["StageNum"],$row["MyTurn"]);
		}
	} else {
		$fnRetValue=0;
	}
	return $fnRetValue;
}

function fnICSSCLAAccumulate($iUserIdx) { //회원 고유번호
	$fnRetValue=0;
	$CI = &get_instance();
	//회원 스테이지 가입 수,약정 대출 금액
	$sQuery="select tbl1.MyTurn,tbl2.NowTurn,tbl2.StageNum,(select count(Idx) as iCnt01 from tbl_stage_deposit where ParentIdx=tbl2.Idx and UserIdx='".$iUserIdx."' and DepositState='Y') as DepositCnt,((tbl2.StageNum-tbl1.MyTurn)*(tbl2.StageMoney*10000)) - (if((select count(Idx) as iCnt01 from tbl_stage_deposit where ParentIdx=tbl2.Idx and UserIdx='".$iUserIdx."' and DepositState='Y')>tbl1.MyTurn,((select count(Idx) as iCnt01 from tbl_stage_deposit where ParentIdx=tbl2.Idx and UserIdx='".$iUserIdx."' and DepositState='Y')-tbl1.MyTurn)*(tbl2.StageMoney*10000),0)) as ICSSTotalMoney from tbl_stage_apply as tbl1 left join tbl_stage as tbl2 on tbl1.ParentIdx=tbl2.Idx where tbl1.UserIdx='".$iUserIdx."' and tbl2.State!='E'";
	$arrFnResult= $CI->db->query($sQuery);
	$arrFnUserInfo["iCnt01"]=$arrFnResult->num_rows();
	$arrFnUserInfo["iCnt02"]=0;
	foreach ($arrFnResult->result_array() as $row2) {
		$arrFnUserInfo["iCnt02"]=$arrFnUserInfo["iCnt02"]+$row2["ICSSTotalMoney"];
	}
	$fnRetValue=(fnICSSCLA($arrFnUserInfo["iCnt01"],$arrFnUserInfo["iCnt02"])/100)*10000;
	return $fnRetValue;
}

function fnICSSCLA($iMyStageNumber,$iLoanMoney) { //스테이지 가입 수,약정대출금액
	$fnRetValue=0;
	$fnArrValue= file_get_contents("/home/src/imin/homepage/assets/json/icss-cla.json");
	$fnArrValue= utf8_encode($fnArrValue);
	$fnArrValue= json_decode($fnArrValue,true);
	if ($iMyStageNumber>0&&$iLoanMoney>0) {
		for ($iCnt=0;$iCnt<count($fnArrValue);$iCnt++) {
			if ($fnArrValue[$iCnt][0]>=$iLoanMoney) {
				$fnRetValue=$fnArrValue[$iCnt][$iMyStageNumber];
			} else {
				break;
			}
		}
	}
	$fnRetValue=$fnRetValue*0.1;
//	$fnRetValue=fnRound($fnRetValue,4);
	return $fnRetValue;
}
function fnICSSPOUAccumulate($iUserIdx) { //회원 고유번호
	$fnRetValue=0;
	$CI = &get_instance();
	$sQuery="select sum(tbl2.StageNum-1) as iPou01,count(tbl2.StageNum) as iPou02 from tbl_stage_apply as tbl1 left join tbl_stage as tbl2 on tbl1.ParentIdx=tbl2.Idx where tbl1.UserIdx='".$iUserIdx."' and tbl2.State='E'";
	$arrFnResult= $CI->db->query($sQuery)->row_array();
	if ($arrFnResult) {
		$fnRetValue=fnICSSPOU01($arrFnResult["iPou01"])+fnICSSPOU02($arrFnResult["iPou02"]);
		$fnRetValue=$fnRetValue*0.05;
	} else {
		$fnRetValue=0;
	}
	return $fnRetValue;
}
function fnICSSPOU01($iPou01) { //누적완료기간
	//58이상 58로 계산
	if ($iPou01> 58) { $iPou01=58; }
	$fnRetValue="";
	$fnArrValue= file_get_contents("/home/src/imin/homepage/assets/json/icss-pou-1.json");
	$fnArrValue= utf8_encode($fnArrValue);
	$fnArrValue= json_decode($fnArrValue,true);
	for ($iCnt=0;$iCnt<count($fnArrValue);$iCnt++) {
		if ($fnArrValue[$iCnt][0]==$iPou01) {
			$fnRetValue=$fnArrValue[$iCnt][1];
		}
	}
	if ($fnRetValue!="") {
//		$fnRetValue=$fnRetValue*0.05;
//		$fnRetValue=fnRound($fnRetValue,4);
	}
	return $fnRetValue;
}
function fnICSSPOU02($iPou02) { //누적완료펀드
	//28이상 28로 계산
	if ($iPou02> 28) { $iPou02=28; }
	$fnRetValue="";
	$fnArrValue= file_get_contents("/home/src/imin/homepage/assets/json/icss-pou-2.json");
	$fnArrValue= utf8_encode($fnArrValue);
	$fnArrValue= json_decode($fnArrValue,true);
	for ($iCnt=0;$iCnt<count($fnArrValue);$iCnt++) {
		if ($fnArrValue[$iCnt][0]==$iPou02) {
			$fnRetValue=$fnArrValue[$iCnt][1];
		}
	}
	if ($fnRetValue!="") {
//		$fnRetValue=$fnRetValue*0.05;
//		$fnRetValue=fnRound($fnRetValue,4);
	}
	return $fnRetValue;
}
function fnICSSSNE($iSNE01,$iSNE02) { //매칭 횟수,진행스테이지 내 친구수
	$fnRetValue="";
	//매칭 10 이상시 10으로 계산
	if ($iSNE01>10) { $iSNE01=10; }
	//진행 스테이지 내 친구수 30 이상시 30으로 계산
	if ($iSNE02>30) { $iSNE02=30; }
	if ($iSNE01==0) {
		$fnRetValue=0.0138;
	} else {
		$fnArrValue= file_get_contents("/home/src/imin/homepage/assets/json/icss-sne.json");
		$fnArrValue= utf8_encode($fnArrValue);
		$fnArrValue= json_decode($fnArrValue,true);
		for ($iCnt=0;$iCnt<count($fnArrValue);$iCnt++) {
			if ($fnArrValue[$iCnt][0]==$iSNE02) {
				$fnRetValue=$fnArrValue[$iCnt][$iSNE01];
			}
		}
		if ($fnRetValue!="") {
			$fnRetValue=$fnRetValue*0.02;
//			$fnRetValue=fnRound($fnRetValue,4);
		}
	}
	return $fnRetValue;
}
function fnICSSSNE02($iSNE01,$iSNE02) { //재매칭 횟수,진행스테이지 내 친구수
	$fnRetValue=0;
	//재매칭 10 이상시 10으로 계산
	if ($iSNE01>10) { $iSNE01=10; }
	//진행 스테이지 내 친구수 30 이상시 30으로 계산
	if ($iSNE02>30) { $iSNE02=30; }
	if ($iSNE01==0||$iSNE02==0) {
		$fnRetValue=0;
	} else {
		$fnArrValue= file_get_contents("/home/src/imin/homepage/assets/json/icss-sne.json");
		$fnArrValue= utf8_encode($fnArrValue);
		$fnArrValue= json_decode($fnArrValue,true);
		for ($iCnt=0;$iCnt<count($fnArrValue);$iCnt++) {
			if ($fnArrValue[$iCnt][0]==$iSNE02) {
				$fnRetValue=$fnArrValue[$iCnt][$iSNE01];
			}
		}
		if ($fnRetValue!="") {
			$fnRetValue=(0.69-$fnRetValue)*0.02;
//			$fnRetValue=fnRound($fnRetValue,4);
		}
	}
	return $fnRetValue;
}

function fnICSSAR($iYear) { //출생년도
	$fnRetValue=0;
	if ($iYear>=1992) {
		$fnRetValue=0.282;
	}
	return $fnRetValue;
}
function fnICSSSDS01($iDS) { //소득세
	$fnRetValue=0;
	if ($iDS==0) {
		$fnRetValue=0;
	} else {
		if ($iDS<=12000000) {
			$fnRetValue= -0.345;
		} else if ($iDS>12000000&&$iDS<=46000000) {
			$fnRetValue= -0.690;
		} else if ($iDS>46000000&&$iDS<=88000000) {
			$fnRetValue= -1.380;
		} else if ($iDS>88000000&&$iDS<=150000000) {
			$fnRetValue= -2.070;
		} else if ($iDS>150000000) {
			$fnRetValue= -2.760;
		}
		$fnRetValue=$fnRetValue*0.01;
	//	$fnRetValue=fnRound($fnRetValue,4);
	}
	return $fnRetValue;
}
function fnICSSSDS02($iDS) { //재산세
	$fnRetValue=0;
	if ($iDS==0) {
		$fnRetValue=0;
	} else {
		if ($iDS<=60000000) {
			$fnRetValue= -0.345;
		} else if ($iDS>60000000&&$iDS<=150000000) {
			$fnRetValue= -0.690;
		} else if ($iDS>150000000&&$iDS<=300000000) {
			$fnRetValue= -1.380;
		} else if ($iDS>300000000) {
			$fnRetValue= -2.070;
		}
		$fnRetValue=$fnRetValue*0.01;
	//	$fnRetValue=fnRound($fnRetValue,4);
	}
	return $fnRetValue;
}

function fnICSSGrade($iICSSScore) { //ICSS 스코어
	$fnRetValue=0;
	$CI = &get_instance();
	$sQuery="SELECT ICSS FROM tbl_ICSS_score WHERE LimitScore01<='".$iICSSScore."' and LimitScore02 >='".$iICSSScore."'";
	$arrFnResult= $CI->db->query($sQuery)->row_array();
	return $arrFnResult["ICSS"];
}

function ICSSTest() {
	/*
	$ICSS01 = fnICSSNiceGrade(1);
	$ICSS02 = fnICSSNiceMoney(1000000,1);
	$ICSS03 = fnICSSOPR(5,2);
	$ICSS04 = fnICSSCLA(3,4000000);
	$ICSS05 = fnICSSPOU01(8);
	$ICSS06 = fnICSSPOU02(8);
	$ICSS07 = fnICSSSNE(5,1);
	$ICSS08 = fnICSSAR(1992);
	$ICSS09 = fnICSSSDS01(46000001);
	$ICSS10 = fnICSSSDS02(46000001);
	$RISK=$ICSS01+$ICSS02+$ICSS03+$ICSS04+$ICSS05+$ICSS06+$ICSS07+$ICSS08+$ICSS09+$ICSS10;
	$ICSSScore=1000-$RISK/100*10000;
	echo "ICSS01 : ".$ICSS01."<br>";
	echo "ICSS02 : ".$ICSS02."<br>";
	echo "ICSS03 : ".$ICSS03."<br>";
	echo "ICSS04 : ".$ICSS04."<br>";
	echo "ICSS05 : ".$ICSS05."<br>";
	echo "ICSS06 : ".$ICSS06."<br>";
	echo "ICSS07 : ".$ICSS07."<br>";
	echo "ICSS08 : ".$ICSS08."<br>";
	echo "ICSS09 : ".$ICSS09."<br>";
	echo "ICSS10 : ".$ICSS10."<br>";
	echo "RISK : ".$RISK."<br>";
	echo "ICSSScore : ".$ICSSScore;
	*/

}
//월한도
function fnMonthMaxLoan($sValue01) { //회원 고유번호
	$arrRetValue = array();
	$CI = &get_instance();
	$sQuery="SELECT tbl2.MonthLimitLoan FROM tbl_member_ICSS as tbl1 left join tbl_ICSS_score as tbl2 on tbl1.ICSSGrade=tbl2.ICSS WHERE tbl1.UserIdx='".$sValue01."'";
	$arrFnResult= $CI->db->query($sQuery)->row_array();
	$arrRetValue["UserMonthLimitLoan"]=$arrFnResult["MonthLimitLoan"];
	$sQuery="SELECT sum(tbl2.StageMoney) as UsedMoney from tbl_stage_apply as tbl1 left join tbl_stage_payment as tbl2 on tbl1.ParentIdx=tbl2.ParentIdx and tbl1.UserIdx=tbl2.UserIdx left join tbl_stage as tbl3 on tbl1.ParentIdx=tbl3.Idx WHERE tbl1.UserIdx='".$sValue01."' and tbl3.State!='E'";
	$arrFnResult= $CI->db->query($sQuery)->row_array();
	$arrRetValue["UserUsedMoney"]=$arrFnResult["UsedMoney"];
	$arrRetValue["UserMonthLimitMoney"]=$arrRetValue["UserMonthLimitLoan"]-$arrRetValue["UserUsedMoney"];
//	$arrRetValue["UserMonthLimitPercent"]=$arrRetValue["UserMonthLimitMoney"]/$arrRetValue["UserMonthLimitLoan"]*100;
	if ($arrRetValue["UserMonthLimitMoney"]<0) {
		$arrRetValue["UserMonthLimitMoney"]=0;
	}
	return $arrRetValue;
}

function fnConvertMoney($sValue01) {
	$sRetValue=$sValue01/10000;
	$sRetValue=$sRetValue."만원";
	return $sRetValue;
}
function fnICSSHistory($iUserIdx) { // 회원 고유번호
	$CI = &get_instance();
	$sQuery="insert into tbl_member_ICSS_history (UserIdx,ICSSGrade,ICSSScore,RISKScore,NiceGradeScore,NiceMoneyScore,OPRScore,SNScore,CLAScore,POUScore,SNEScore,ARScore,DSScore) select UserIdx,ICSSGrade,ICSSScore,RISKScore,NiceGradeScore,NiceMoneyScore,OPRScore,SNScore,CLAScore,POUScore,SNEScore,ARScore,DSScore from tbl_member_ICSS where UserIdx='".$iUserIdx."'";
	$CI->db->query($sQuery);
}
function fnReceiveState($sValue01) {
	if ($sValue01=="Y") {
		return "<span class='badge badge-default badge-square'>정상</span>";
	} else if ($sValue01=="A") {
		return "<span class='badge badge-warning badge-square'>승계</span>";
	} else if ($sValue01=="N") {
		return "<span class='badge badge-info badge-square'>잔여</span>";
	} else {
		return "";
	}
}
function fnReceiveState02($sValue01) {
	if ($sValue01=="Y") {
		return "<span class='badge badge-default badge-square'>지급</span>";
	} else if ($sValue01=="H") {
		return "<span class='badge badge-warning badge-square'>부분지급</span>";
	} else if ($sValue01=="N") {
		return "<span class='badge badge-warning badge-square'>미지급</span>";
	} else {
		return "";
	}
}

function fnReceiveState03($sValue01) {
	if ($sValue01=="Y") {
		return "지급";
	} else if ($sValue01=="N") {
		return "연체";
	} else {
		return "";
	}
}
function fnReceiveState04($sValue01) {
	if ($sValue01=="Y") {
		return "지급";
	} else if ($sValue01=="H") {
		return "부분지급";
	} else if ($sValue01=="N") {
		return "미지급";
	} else {
		return "";
	}

}

function fnPrincipal($sValue01,$sValue02,$sValue03,$sValue04,$sValue05) { //회원코드, 해당 회차, 스테이지코드,원리금 수취권 금액,지급일
	if ($sValue01!=""&&$sValue02!=""&&$sValue03!=""&&$sValue04!="") {
		$CI = &get_instance();
		$sQuery="select tbl1.Idx from tbl_member as tbl1 where tbl1.UserCode='".$sValue01."'";
		$arrFnResult01= $CI->db->query($sQuery)->row_array();
		$UserIdx=$arrFnResult01["Idx"];
		$sQuery="select tbl1.UserIdx,tbl1.MyTurn,tbl3.MonthPayment,tbl2.Idx,(tbl2.StageMoney*10000) as StageMoney,left(tbl2.StartDate,10) as StartDate,left(tbl2.EndDate,10) as EndDate,left(tbl2.StartDate,4) as StartYear,tbl2.NowReceiveTurn,tbl4.ScheduledReceiveDate from tbl_stage_apply as tbl1 left join tbl_stage as tbl2 on tbl1.ParentIdx=tbl2.Idx left join tbl_stage_payment as tbl3 on tbl1.ParentIdx=tbl3.ParentIdx and tbl1.UserIdx=tbl3.UserIdx left join tbl_stage_receive as tbl4 on tbl1.ParentIdx=tbl4.ParentIdx and tbl1.UserIdx=tbl4.UserIdx where tbl2.StageCode='".$sValue03."' and tbl1.MyTurn > '".$sValue02."'";
		$arrFnResult02= $CI->db->query($sQuery)->result_array();
		//$dStartDate=date("Y-m-d",strtotime(date("Y-m-d")."+3 days"));
		$dStartDate=$sValue05;
		foreach($arrFnResult02 as $row) {
			//문서번호 = 스테이지 시작년도-스테이지코드-자신의순번-회차
			$DocumentNo="제".$row["StartYear"]."-".$sValue03.$row["MyTurn"]."-".$row["NowReceiveTurn"];
			$sQuery="insert into tbl_stage_principal (ParentIdx,DocumentNo,PrincipalMoney,PrincipalStartDate,PrincipalEndDate,DebtorIdx,CreditorIdx,StageStartDate,StageEndDate) values ('".$row["Idx"]."','".$DocumentNo."','".$row["MonthPayment"]."','".$dStartDate."','".$row["ScheduledReceiveDate"]."','".$UserIdx."','".$row["UserIdx"]."','".$row["StartDate"]."','".$row["EndDate"]."')";
			$CI->db->query($sQuery);
		}
	}
}

function fnPrincipal2($sValue01,$sValue02,$sValue03,$sValue04,$sValue05) { //회원코드, 해당 회차, 스테이지코드,원리금 수취권 금액,지급일
	if ($sValue01!=""&&$sValue02!=""&&$sValue03!=""&&$sValue04!="") {
		$CI = &get_instance();
		$sQuery="select tbl1.Idx from tbl_member as tbl1 where tbl1.UserCode='".$sValue01."'";
		$arrFnResult01= $CI->db->query($sQuery)->row_array();
		$UserIdx=$arrFnResult01["Idx"];
		$sQuery="select tbl1.UserIdx,tbl1.MyTurn,tbl3.MonthPayment,tbl2.Idx,(tbl2.StageMoney*10000) as StageMoney,left(tbl2.StartDate,10) as StartDate,left(tbl2.EndDate,10) as EndDate,left(tbl2.StartDate,4) as StartYear,tbl2.NowReceiveTurn,tbl4.ScheduledReceiveDate from tbl_stage_apply as tbl1 left join tbl_stage as tbl2 on tbl1.ParentIdx=tbl2.Idx left join tbl_stage_payment as tbl3 on tbl1.ParentIdx=tbl3.ParentIdx and tbl1.UserIdx=tbl3.UserIdx left join tbl_stage_receive as tbl4 on tbl1.ParentIdx=tbl4.ParentIdx and tbl1.UserIdx=tbl4.UserIdx where tbl2.StageCode='".$sValue03."' and tbl1.MyTurn > '".$sValue02."'";
		$arrFnResult02= $CI->db->query($sQuery)->result_array();
		//$dStartDate=date("Y-m-d",strtotime(date("Y-m-d")."+3 days"));
		$dStartDate=$sValue05;
		foreach($arrFnResult02 as $row) {
                        $sQuery="select DepositState from tbl_stage_deposit as tbl1 where tbl1.ParentIdx='".$row["Idx"]."'";
                        $arrFnResult03= $CI->db->query($sQuery)->row_array();
                        $DepositState = $arrFnResult03["DepositState"];
                        if ($DepositState=="Y") {
				//문서번호 = 스테이지 시작년도-스테이지코드-자신의순번-회차
				$DocumentNo="제".$row["StartYear"]."-".$sValue03.$row["MyTurn"]."-".$row["NowReceiveTurn"];
				$sQuery="insert into tbl_stage_principal (ParentIdx,DocumentNo,PrincipalMoney,PrincipalStartDate,PrincipalEndDate,DebtorIdx,CreditorIdx,StageStartDate,StageEndDate) values ('".$row["Idx"]."','".$DocumentNo."','".$row["MonthPayment"]."','".$dStartDate."','".$row["ScheduledReceiveDate"]."','".$UserIdx."','".$row["UserIdx"]."','".$row["StartDate"]."','".$row["EndDate"]."')";
				$CI->db->query($sQuery);
			}
		}
	}
}

function fnHolidayCheck($sValue01,$arrValue01) { //입금일 , 휴일
	$bHolidayCnt=0;
	for ($iCnt=1;$iCnt<4;$iCnt++) {
		$sValue02=date("Y-m-d",strtotime($sValue01."+".$iCnt." days"));
		$nowState=false;
		if (is_array($arrValue01)) {
			for ($iCnt02=0; $iCnt02<sizeof($arrValue01); $iCnt02++) {
				if ($sValue02==$arrValue01[$iCnt02]) {
					$bHolidayCnt++;
					$nowState=true;
					break;
				}
			}
		}
		if (!$nowState) {
			//매주 주말 체크
			if (date('w',strtotime($sValue02))==0) {
				$bHolidayCnt++;
			}
			if (date('w',strtotime($sValue02))==6) {
				$bHolidayCnt++;
			}
		}
	}
	return $bHolidayCnt;
}
function fnDateDiff($sValue01,$arrValue01) { //최초일,휴일(배열)
	$sRetValue01=0;
	if ($sValue01!="") {
		$dStartDate = new DateTime($sValue01);
		$dEndDate = new DateTime(date("Y-m-d"));
		$arrDateGap = date_diff($dStartDate,$dEndDate);
		$dDateGap=$arrDateGap->days;
		$bFnHolidayCnt=0;
		if ($dEndDate>$dStartDate) {
			$dTempDate=$sValue01;
			for ($iFnCht=1;$iFnCht<=$dDateGap;$iFnCht++) {
				$bFnHolidayCheckSub=false;
				$dTempDate=date("Y-m-d",strtotime($dTempDate."+1 days"));
				if (date('w',strtotime($dTempDate))==0) {
					$bFnHolidayCnt++;
					$bFnHolidayCheckSub=true;
				}
				if (date('w',strtotime($dTempDate))==6) {
					$bFnHolidayCnt++;
					$bFnHolidayCheckSub=true;
				}
				if (!$bFnHolidayCheckSub) {
					for ($iFnCht02=0; $iFnCht02<sizeof($arrValue01); $iFnCht02++) {
						if ($dTempDate==$arrValue01[$iFnCht02]) {
							$bFnHolidayCnt++;
							break;
						}
					}
				}
			}
			$sRetValue01=$dDateGap-$bFnHolidayCnt;
		}
	}
	return $sRetValue01;
}
function fnLogWrite($sQuery) {
	/*
	$objFile = fopen("/home/src/imin/test/".date("Y-m-d").".txt", "a");
	$sValue="";
	$sValue.="==========================================\r\n";
	$sValue.=$sQuery;
	$sValue.="\r\n";
	$sValue.="==========================================\r\n";
	fwrite($objFile,$sValue);
	fclose($objFile);
	*/
}
function fnFaqCategory($sValue01) {
	switch(trim($sValue01)) {
		default:
			return "";
		break;
		case '1':
			return "서비스관련";
		break;
		case '2':
			return "투자 및 대출관련";
		break;
		case '3':
			return "일반관련";
		break;
	}
}
function fnIPTReverse($sValue) {
	switch(trim($sValue)) {
		default:
			return "";
		break;
		case '1':
			return "6";
		break;
		case '2':
			return "5";
		break;
		case '3':
			return "4";
		break;
		case '4':
			return "3";
		break;
		case '5':
			return "2";
		break;
		case '6':
			return "1";
		break;
	}
}
function fnRound02($sValue01,$sValue02) {
	$fnRetValue=substr($sValue01,0,strpos($sValue01,'.')+$sValue02+1);
	$fnRetValue=round($fnRetValue,$sValue02-1);
	/*
	$fnRetValue=floor($sValue01*pow(10,$sValue02))*pow(0.1,$sValue02);
//	$fnRetValue=round($fnRetValue,$sValue02-1);
	$fnRetValue=round($fnRetValue,$sValue02-1);
	*/
	if (strlen($fnRetValue)>5) {
		$fnRetValue=substr($fnRetValue,0,5);
	}
	return $fnRetValue;
}
function fnGetOverdueDate($sValue) {
	$CI = &get_instance();
	$sRetValue ="";
	$sQuery="select DATEDIFF(now(),DefaultDepositDate) as OverDate from tbl_stage_deposit WHERE ParentIdx='".$sValue."' and DepositState IN ('N','H') order by DATEDIFF(now(),DefaultDepositDate) desc limit 0,1" ;
	$arrFnResult=$CI->db->query($sQuery)->row_array()["OverDate"];
	$sRetValue=$arrFnResult;
	return $sRetValue;
}
?>
