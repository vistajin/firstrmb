<?php

namespace Home\Controller;

use Think\Controller;

class ActivityController extends Controller {
	public function activity($category = "activity") {
		$common = A ( "Common/Common" );
		$common->getHeaderAndFooterInfo ();
		$common->getLeftNaviInfo ();

		// actovoty / news
		$m = M ( "RichText" );
		$where ["category"] = $category;
		$where ["isShow"] = "1";
		$Page = getpage ( $m, $where, C ( "LIST_PAGE_SIZE" ) );
		$limit = $Page->firstRow . ',' . $Page->listRows;
		$list = $m->where ( $where )->limit ( $limit )->order ( "seq" )->select ();
		$show = $Page->show ();
		$this->assign ( "page", $show );
		$this->assign ( "activity", $list );
		$this->assign ( "nowPage", $Page->nowPage );
		$this->assign ( "totalPages", $Page->totalPages );

		self::setPageInfo($category);


		$this->display ();
	}
	public function detail($uid) {
		$common = A ( "Common/Common" );
		$common->getHeaderAndFooterInfo ();
		$common->getLeftNaviInfo ();

		$m = M ( "RichText" );
		$r = $m->where ( "uid=%d", $uid )->find ();
		if ($r == NULL) {
			$this->assign ( "record", "" );
		} else {
			$this->assign ( "record", $r );
		}
		self::setPageInfo($r["category"]);
		$this->display ();
	}

	private function setPageInfo($category) {
		if ($category == "activity") {
			$this->assign ( "pageName", "新闻动态" );
			$this->assign ( "pageName2", "<span>&gt; 公司动态</span>" );
			$this->assign ( "activityHover", "class='nav-hover'" );
			$this->assign ( "activityItemHover", "class='item-hover'" );
		} else if ($category == "industryNews") {
			$this->assign ( "pageName", "新闻动态" );
			$this->assign ( "pageName2", "<span>&gt; 行业动态</span>" );
			$this->assign ( "activityHover", "class='nav-hover'" );
			$this->assign ( "industryNewsItemHover", "class='item-hover'" );
		} else if ($category == "pqgs") {
			$this->assign ( "pageName", "<span>票券概述</span>" );
			$this->assign ( "pqgsHover", "class='nav-hover'" );
		} else if ($category == "zpbb") {
			$this->assign ( "pageName", "<span>正票版别</span>" );
			$this->assign ( "zpbbHover", "class='nav-hover'" );
		} else if ($category == "ypbb") {
			$this->assign ( "pageName", "<span>样票版别</span>" );
			$this->assign ( "ypbbHover", "class='nav-hover'" );
		}
	}
}