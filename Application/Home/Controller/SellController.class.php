<?php

namespace Home\Controller;

use Think\Controller;

class SellController extends Controller {
	public function sell($category_uid = -1) {
		$common = A ( "Common/Common" );
		$common->getHeaderAndFooterInfo ();
		$common->getLeftNaviInfo ();
		
		$m = M ( "SellCategory" );
		$result = $m->order ( "seq" )->select ();
		if ($category_uid === - 1) {
			$category_uid = $result [0] ["uid"];
		}
		$this->assign ( "category_uid", $category_uid );
		
		$result = $m->where("uid=%d", $category_uid)->find ();
		$this->assign ( "pageName", $result ["text"] );
		

		$m = M ( "SellItem" );
		$where ["isShow"] = 1;
		$where ["category_uid"] = $category_uid;
		$Page = getpage ( $m, $where, C ( "LIST_PAGE_SIZE" ) );
		$limit = $Page->firstRow . ',' . $Page->listRows;
		$list = $m->where ( $where )->limit ( $limit )->order ( "seq" )->select ();
		$show = $Page->show ();
		$this->assign ( "page", $show );
		$this->assign ( "sellItemList", $list );
		$this->assign ( "nowPage", $Page->nowPage );
		$this->assign ( "totalPages", $Page->totalPages );

		$result = $m->where ( "uid=%d", $category_uid )->find ();
		
		
		$this->assign ( "sellHover", "class='nav-hover'" );
		$this->display ();
	}
	public function detail($uid) {
		$common = A ( "Common/Common" );
		$common->getHeaderAndFooterInfo ();
		$common->getLeftNaviInfo ();
		
		$m = M ( "SellItem" );
		$r = $m->where ( "uid=%d", $uid )->find ();
		if ($r == NULL) {
			$this->assign ( "record", "" );
		} else {
			$this->assign ( "record", $r );
			$this->assign ( "category_uid", $r ["category_uid"] );
			$m = M ( "SellCategory" );
			$this->assign ( "category_uid", $r ["category_uid"] );
			
			$result = $m->where("uid=%d", $r ["category_uid"])->find ();
			$this->assign ( "pageName", $result ["text"] );
		}
		$this->assign ( "sellHover", "class='nav-hover'" );
		$this->display ();
	}
}