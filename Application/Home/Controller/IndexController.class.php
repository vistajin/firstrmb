<?php

namespace Home\Controller;

use Think\Controller;
use Admin\Controller\RichEditController;

class IndexController extends Controller {
	public function index() {
		$common = A ( "Common/Common" );
		$common->getHeaderAndFooterInfo ();
		$common->getLeftNaviInfo();

		// corpinfo
		$m = M ( "RichText" );
		$r = $m->where ( "category='corpbrief'" )->find ();
		if ($r == NULL) {
			$this->assign ( "corpbrief", "" );
		} else {
			$this->assign ( "corpbrief", $r ["content"] );
		}

		// quick link - quickLinkInHome
		//		$m = M ( "RichText" );
		//		$r = $m->where ( "category='quickLinkInHome' and isShow=1" )->select ();
		//		if ($r == NULL) {
		//			$this->assign ( "quickLinkInHome", "" );
		//		} else {
		//			$this->assign ( "quickLinkInHome", $r );
		//		}

		// about us
		//		$m = M ( "RichText" );
		//		$r = $m->where ( "category='aboutUs'" )->find ();
		//		if ($r == NULL) {
		//			$this->assign ( "aboutUs", "" );
		//		} else {
		//			$this->assign ( "aboutUs", $r ["content"] );
		//		}

		// activity / news
		$m = M ( "RichText" );
		$r = $m->where ( "category='activity' and isShow=1" )->order ( "thedate desc" )->select ();
		if ($r == NULL) {
			$this->assign ( "activity", "" );
		} else {
			$this->assign ( "activity", $r );
		}

		// buy info
		$m = M ( "RichText" );
		$r = $m->where ( "category='buyInfo'" )->find ();
		if ($r == NULL) {
			$this->assign ( "buyInfo", "" );
		} else {
			$this->assign ( "buyInfo", $r );
		}

		// industry news
		$m = M ( "RichText" );
		$r = $m->where ( "category='industryNews' and isShow=1" )->order ( "thedate desc" )->select ();
		if ($r == NULL) {
			$this->assign ( "industryNews", "" );
		} else {
			$this->assign ( "industryNews", $r );
		}

		$this->assign ( "homeHover", "class='nav-hover'" );

		$this->display ();
	}
}