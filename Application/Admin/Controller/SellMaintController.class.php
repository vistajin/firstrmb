<?php

namespace Admin\Controller;

use Common\Controller\AuthController;

class SellMaintController extends AuthController {
	public function sellCategoryList() {
		$m = M ( "SellCategory" );
		$Page = getpage ( $m, $where, C ( "LIST_PAGE_SIZE" ) );
		$limit = $Page->firstRow . ',' . $Page->listRows;
		$list = $m->where ( $where )->limit ( $limit )->order ( "seq" )->select ();
		$show = $Page->show ();
		$this->assign ( "page", $show );
		$this->assign ( "list", $list );
		$this->assign ( "nowPage", $Page->nowPage );
		$this->assign ( "totalPages", $Page->totalPages );
		$this->display ();
	}
	public function addSellCategoryInput() {
		$this->display ();
	}
	public function addSellCategory() {
		$m = M ( "SellCategory" );
		$r = $m->field ( "max(seq) as seq" )->find ();
		$data ["seq"] = intval ( $r ["seq"] ) + 1;
		$data ["text"] = $_POST ["text"];
		$m->add ( $data );
		
		//$this->redirect ( "Admin/SellMaint/sellCategoryList" );
		$this->redirect ( "Admin/SellMaint/refreshTop" );
	}
	public function editSellCategoryInput($uid) {
		$m = M ( "SellCategory" );
		$result = $m->where ( "uid = %d", $uid )->find ();
		$this->assign ( "record", $result );
		$this->display ();
	}
	public function updateSellCategory($uid) {
		$m = M ( "SellCategory" );
		$data ["text"] = $_POST ["text"];
		$m->where ( "uid = %d", $uid )->save ( $data );
		$this->redirect ( "Admin/SellMaint/refreshTop" );
	}
	public function deleteSellCategory($uid) {
		$data = M ( "SellItem" );
		$count = $data->where ( "category_uid = %d", $uid )->count ();
		if ($count > 0) {
			$this->error("请删除该目录下所有藏品再删除该目录！");
			return;
		}
		
		$data = M ( "SellCategory" );
		$result = $data->where ( "uid = %d", $uid )->delete ();
		if ($result === 1) {
			//$this->redirect ( "Admin/SellMaint/sellCategoryList" );
			$this->redirect ( "Admin/SellMaint/refreshTop" );
		} else {
			$this->error("删除出售目录失败！");
		}
	}
	public function upSellCategory($uid) {
		self::moveSellCategoryOrder ( $uid, "up" );
	}
	public function downSellCategory($uid) {
		self::moveSellCategoryOrder ( $uid, "down" );
	}
	private function moveSellCategoryOrder($uid, $upOrDown) {
		if ($upOrDown == "up") {
			$comp = "<";
			$fun = "max";
			$err = "该记录已经是第一条记录！";
		} else {
			$comp = ">";
			$fun = "min";
			$err = "该记录已经是最后一条可显示记录！";
		}
		$m = M ( "SellCategory" );
		$r = $m->where ( "uid = %d", $uid )->find ();
		$rr = $m->where ( "seq " . $comp . " %d", $r ["seq"] )->field ( $fun . "(seq) as seq" )->find ();
		
		if ($rr ["seq"] != null) {
			$seq1 = $r ["seq"];
			$seq2 = $rr ["seq"];
			
			$r2 = $m->where ( "seq = %d", $seq2 )->field ( "uid" )->find ();
			$uid2 = $r2 ["uid"];
			
			$r ["seq"] = $seq2;
			$m->where ( "uid = %d", $uid )->save ( $r );
			
			$r2 ["seq"] = $seq1;
			$m->where ( "uid = %d", $uid2 )->save ( $r2 );
			
			//$this->redirect ( "Admin/SellMaint/sellCategoryList" );
			$this->redirect ( "Admin/SellMaint/refreshTop" );
		} else {
			$this->error ( $err );
		}
	}
	
	// ------------------------------------SellItem-------------------------------
	private function getSellCategory() {
		$m = M ( "SellCategory" );
		$r = $m->order ( "seq" )->select ();
		$ary = array ();
		foreach ( $r as $entry ) {
			$ary [$entry ["uid"]] = $entry ["text"];
		}
		$this->assign ( "sellCategoryList", $ary );
	}
	public function sellItemList($category_uid = null) {
		// self::getSellCategory ();
		$m = M ( "SellItem" );
		if ($category_uid != null) {
			$where = "category_uid = " . $category_uid;
		}
		$Page = getpage ( $m, $where, C ( "LIST_PAGE_SIZE" ) );
		$limit = $Page->firstRow . ',' . $Page->listRows;
		$list = $m->where ( $where )->order ( "seq" )->limit ( $limit )->select ();
		$show = $Page->show ();
		$this->assign ( "page", $show );
		$this->assign ( "list", $list );
		$this->assign ( "nowPage", $Page->nowPage );
		$this->assign ( "totalPages", $Page->totalPages );
		$this->assign ( "category_uid", $category_uid );
		$this->display ();
	}
	public function addSellItemInput($category_uid) {
		self::getSellCategory ();
		$this->assign ( "category_uid", $category_uid );
		$this->display ();
	}
	public function addSellItem() {
		$m = M ( "SellItem" );
		
		$r = $m->where ( "category_uid=%d", $_POST ["category_uid"] )->field ( "max(seq) as seq" )->find ();
		$data ["seq"] = intval ( $r ["seq"] ) + 1;
		
		$data ["category_uid"] = $_POST ["category_uid"];
		$data ["title"] = $_POST ["title"];
		$data ["isShow"] = $_POST ["isShow"];
		$data ["isRecommend"] = $_POST ["isRecommend"];
		$data ["content"] = $_POST ["content"];
		$data ["update_time"] = date ( "Y-m-d H:i:s", time () );
		
		if ($_FILES ["photo"] ["name"] != "") {
			$info = upload ();
			if ($info [0] == true) {
				foreach ( $info [1] as $file ) {
					$data ["img"] = $file ["savepath"] . $file ["savename"];
				}
			} else {
				$this->error ( $info [1] );
			}
		}
		
		$m->add ( $data );
		$this->redirect ( "Admin/SellMaint/sellItemList/category_uid/" . $_POST ["category_uid"] );
	}
	public function editSellItemInput() {
		self::getSellCategory ();
		$m = M ( "SellItem" );
		$r = $m->where ( "uid=%d", $_POST ["uid"] )->find ();
		$this->assign ( "record", $r );
		$this->display ();
	}
	public function updateSellItem($uid) {
		$m = M ( "SellItem" );
		$r = $m->where ( "uid=%d", $uid )->find ();
		// $data ["category_uid"] = $_POST ["category_uid"];
		$data ["title"] = $_POST ["title"];
		$data ["isShow"] = $_POST ["isShow"];
		$data ["isRecommend"] = $_POST ["isRecommend"];
		$data ["content"] = $_POST ["content"];
		$data ["update_time"] = date ( "Y-m-d H:i:s", time () );
		
		if ($_FILES ["photo"] ["name"] != "") {
			$info = upload ();
			if ($info [0] == true) {
				// 删除之前旧的文件
				if ($r ["img"] != null) {
					unlink ( $_SERVER ['DOCUMENT_ROOT'] . __ROOT__ . "/Uploads/" . $r ["img"] );
				}
				
				foreach ( $info [1] as $file ) {
					$data ["img"] = $file ["savepath"] . $file ["savename"];
				}
			} else {
				$this->error ( $info [1] );
			}
		}
		$m->where ( "uid = %d", $uid )->save ( $data );
		$this->redirect ( "Admin/SellMaint/sellItemList/category_uid/" . $r ["category_uid"] );
	}
	public function deleteSellItem($uid) {
		$data = M ( "SellItem" );
		$r = $data->where ( "uid=%d", $uid )->find ();
		$result = $data->where ( "uid = %d", $uid )->delete ();
		if ($result === 1) {
			// 删除之前旧的文件
			if ($r ["img"] != null) {
				unlink ( $_SERVER ['DOCUMENT_ROOT'] . __ROOT__ . "/Uploads/" . $r ["img"] );
			}
			
			$this->redirect ( "Admin/SellMaint/sellItemList/category_uid/" . $r ["category_uid"] );
		} else {
			echo "删除藏品失败！";
		}
	}
	public function upSellItem($uid, $category_uid) {
		self::moveSellItemOrder ( $uid, "up", $category_uid );
	}
	public function downSellItem($uid, $category_uid) {
		self::moveSellItemOrder ( $uid, "down", $category_uid );
	}
	private function moveSellItemOrder($uid, $upOrDown, $category_uid) {
		if ($upOrDown == "up") {
			$comp = "<";
			$fun = "max";
			$err = "该记录已经是第一条记录！";
		} else {
			$comp = ">";
			$fun = "min";
			$err = "该记录已经是最后一条可显示记录！";
		}
		$m = M ( "SellItem" );
		$r = $m->where ( "uid = %d", $uid )->find ();
		$rr = $m->where ( "isShow=1 and category_uid=%d and seq " . $comp . " %d", $category_uid, $r ["seq"] )->field ( $fun . "(seq) as seq" )->find ();
		
		if ($rr ["seq"] != null) {
			$seq1 = $r ["seq"];
			$seq2 = $rr ["seq"];
			
			$r2 = $m->where ( "isShow=1 and category_uid=%d and seq=%d", $category_uid, $seq2 )->field ( "uid" )->find ();
			$uid2 = $r2 ["uid"];
			
			$r ["seq"] = $seq2;
			$m->where ( "uid = %d", $uid )->save ( $r );
			
			$r2 ["seq"] = $seq1;
			$m->where ( "uid = %d", $uid2 )->save ( $r2 );
			
			$this->redirect ( "Admin/SellMaint/sellItemList/category_uid/".$category_uid );
		} else {
			$this->error ( $err );
		}
	}
	
	// ------------------------------------TreeMenu-------------------------------
	public function genMenuTree() {
		$m = M ( "SellCategory" );
		$list = $m->order ( "seq" )->select ();
		if ($list == null) {
			$treeItem = array ();
			$treeItem [0] ["id"] = $noId;
			$treeItem [0] ["text"] = "无目录";
			$treeItem [0] ["href"] = "javascript: void()";
			$this->assign ( "treeSellCategory", json_encode ( $treeItem ) );
		} else {
			foreach ( $list as &$category ) {
				$category ["id"] = "sellItem" . $category ["uid"];
				$category ["href"] = "/firstrmb/Admin/SellMaint/sellItemList/category_uid/" . $category ["uid"];
			}
			$this->assign ( "treeSellCategory", json_encode ( $list ) );
		}
	}
}