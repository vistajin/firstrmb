<?php

namespace Home\Controller;

use Think\Controller;

class QuickLinkInHomeController extends Controller {
	public function detail($uid) {
		$common = A ( "Common/Common" );
		$common->getHeaderAndFooterInfo ();
		$common->getLeftNaviInfo();
		
		// quickLinkInHome
		$m = M ( "RichText" );
		$r = $m->where ( "uid=%d", $uid )->find ();
		if ($r == NULL) {
			$this->assign ( "content", "" );
		} else {
			$this->assign ( "content", $r ["content"] );
			$this->assign ( "pageName", $r ["title"] );
		}
		$this->display ();
	}
}