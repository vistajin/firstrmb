<?php

namespace Home\Controller;

use Think\Controller;

class BuyInfoController extends Controller {
	public function detail() {
		$common = A ( "Common/Common" );
		$common->getHeaderAndFooterInfo ();
		$common->getLeftNaviInfo ();
		
		$m = M ( "RichText" );
		$r = $m->where ( "category='buyInfo'" )->find ();
		if ($r == NULL) {
			$this->assign ( "buyInfo", "" );
		} else {
			$this->assign ( "buyInfo", $r ["content"] );
		}
		$this->assign ( "buyInfoHover", "class='nav-hover'" );
		$this->display ();
	}
}