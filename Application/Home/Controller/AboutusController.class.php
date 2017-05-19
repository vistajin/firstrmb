<?php

namespace Home\Controller;

use Think\Controller;

class AboutusController extends Controller {
	public function aboutus($type = "corpinfo") {
		$common = A ( "Common/Common" );
		$common->getHeaderAndFooterInfo ();
		$common->getLeftNaviInfo();
		
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
		
		if ($type == 'corpinfo') {
			$m = M ( "RichText" );
			$r = $m->where ( "category='corpbrief'" )->find ();
			if ($r == NULL) {
				$this->assign ( "corpbrief", "" );
			} else {
				$this->assign ( "corpbrief", $r ["content"] );
			}
			$this->assign("pageName", "公司简介");
			$this->assign("corpinfoHover", "class='item-hover'");
		} else {
			$m = M ( "RichText" );
			$r = $m->where ( "category='contactus'" )->find ();
			if ($r == NULL) {
				$this->assign ( "contactus", "" );
			} else {
				$this->assign ( "contactus", $r ["content"] );
			}
			$this->assign("pageName", "联系我们");
			$this->assign("contactUsHover", "class='item-hover'");
		}
		
		$this->assign ( "aboutUsHover", "class='nav-hover'" );
		$this->display ();
	}
}