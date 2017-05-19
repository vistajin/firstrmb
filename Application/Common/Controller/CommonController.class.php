<?php

namespace Common\Controller;

use Think\Controller;

class CommonController extends Controller {
	public function getHeaderAndFooterInfo() {
		// basic info
		$m = M ( "BasicInfo" );
		$result = $m->where ( "uid = 1" )->find ();
		$this->assign ( "basicInfo", $result );
		
		// friendly links
		$m = M ( "FriendLink" );
		$result = $m->where ( "isShow=1" )->order ( "seq" )->select ();
		$this->assign ( "friendLinks", $result );
		
		// sell menu
		$m = M ( "SellCategory" );
		$result = $m->order ( "seq" )->select ();
		$this->assign ( "sellCategoryList", $result );
		
		// home slide
		$m = M ( "HomeSlide" );
		$result = $m->select ();
		$this->assign ( "slideList", $result );
	}
	public function getLeftNaviInfo() {
		// contactusSimple
		$m = M ( "RichText" );
		$r = $m->where ( "category='contactusSimple'" )->find ();
		if ($r == NULL) {
			$this->assign ( "contactusSimple", "" );
		} else {
			$this->assign ( "contactusSimple", $r ["content"] );
		}
		
		// recommend sell items
		$m = M ( "SellItem" );
		$r = $m->where ( "isShow=1 and isRecommend=1" )->select ();
		if ($r == NULL) {
			$this->assign ( "recommendSellItems", "" );
		} else {
			foreach ( $r as &$rr ) {
				if (strlen ( $rr ["title"] ) < 12) {
					$rr ["titleShort"] = $rr ["title"];
				} else {
					$rr ["titleShort"] = substr ( $rr ["title"], 12 ) . "..";
				}
			}
			$this->assign ( "recommendSellItems", $r );
		}
	}
}