<?php

namespace Admin\Controller;

use Common\Controller\AuthController;

class HomeMaintController extends AuthController {
	public function editBasicInfo($uid = 1) {
		self::getBasicInfo($uid);
		$this->display ();
	}
	public function getBasicInfo($uid = 1) {
		$m = M ( "BasicInfo" );
		$result = $m->where ( "uid = %d", $uid )->find ();
		$this->assign ( "basicInfo", $result );
	}
	public function updateBasicInfo($uid = 1) {
		$m = M ( "BasicInfo" );
		$data ["name"] = $_POST ["name"];
		$data ["network_record"] = $_POST ["network_record"];
		$data ["phone"] = $_POST ["phone"];
		$data ["email"] = $_POST ["email"];
		$data ["address"] = $_POST ["address"];
		$data ["copyright"] = $_POST ["copyright"];
		$data ["postal_code"] = $_POST ["postal_code"];
		$data ["update_time"] = date ( "Y-m-d H:i:s", time () );
		// 如果更换LOGO
		if ($_FILES ["photo"] ["name"] != "") {
			$info = upload ();
			if ($info [0] == true) {
				// 删除之前旧的文件
				$r = $m->where ( "uid=%d", $uid )->find ();
				unlink ( $_SERVER ['DOCUMENT_ROOT'] . __ROOT__ . "/Uploads/" . $r ["logo"] );

				foreach ( $info [1] as $file ) {
					$data ["logo"] = $file ["savepath"] . $file ["savename"];
				}
			} else {
				$this->error ( $info [1] );
			}
		}
		$m->where ( "uid = %d", $uid )->save ( $data );

		// $this->redirect ( "Admin/HomeMaint/editBasicInfo" );
		session ( "company_name", $_POST ["name"] );
		$this->redirect ( "Admin/SellMaint/refreshTop" );
	}
	public function friendLinkList() {
		$m = M ( "FriendLink" );
		$Page = getpage ( $m, $where, C ( "LIST_PAGE_SIZE" ) );
		$limit = $Page->firstRow . ',' . $Page->listRows;
		$list = $m->where ( $where )->limit ( $limit )->order ( "isShow desc, seq" )->select ();
		$show = $Page->show ();
		$this->assign ( "page", $show );
		$this->assign ( "list", $list );
		$this->assign ( "nowPage", $Page->nowPage );
		$this->assign ( "totalPages", $Page->totalPages );
		$this->display ();
	}
	public function addFriendLinkInput() {
		$this->display ();
	}
	public function addFriendLink() {
		$m = M ( "FriendLink" );

		// if ($_POST ["isShow"] == "1") {
		$r = $m->field ( "max(seq) as seq" )->find ();
		$data ["seq"] = intval ( $r ["seq"] ) + 1;
		$data ["text"] = $_POST ["text"];
		$data ["url"] = $_POST ["url"];
		$data ["isShow"] = $_POST ["isShow"];
		$m->add ( $data );

		$this->redirect ( "Admin/HomeMaint/friendLinkList" );
	}
	public function editFriendLinkInput($uid) {
		$m = M ( "FriendLink" );
		$result = $m->where ( "uid = %d", $uid )->find ();
		$this->assign ( "record", $result );

		$this->display ();
	}
	public function updateFriendLink($uid) {
		$m = M ( "FriendLink" );
		$data ["text"] = $_POST ["text"];
		$data ["isShow"] = $_POST ["isShow"];
		$data ["url"] = $_POST ["url"];
		$m->where ( "uid = %d", $uid )->save ( $data );
		$this->redirect ( "Admin/HomeMaint/friendLinkList" );
	}
	public function deleteFriendLink($uid) {
		$data = M ( "FriendLink" );
		$result = $data->where ( "uid = %d", $uid )->delete ();
		if ($result === 1) {
			$this->redirect ( "Admin/HomeMaint/friendLinkList" );
		} else {
			echo "删除友情链接失败！";
		}
	}
	public function upFriendLink($uid) {
		self::moveFriendLinkOrder($uid, "up");
	}
	public function downFriendLink($uid) {
		self::moveFriendLinkOrder($uid, "down");
	}

	private function moveFriendLinkOrder($uid, $upOrDown) {
		if ($upOrDown == "up") {
			$comp = "<";
			$fun = "max";
			$err = "该记录已经是第一条记录！";
		} else {
			$comp = ">";
			$fun = "min";
			$err = "该记录已经是最后一条可显示记录！";
		}
		$m = M ( "FriendLink" );
		$r = $m->where ( "uid = %d", $uid )->find ();
		$rr = $m->where ( "isShow = 1 and seq ".$comp." %d", $r ["seq"] )
		->field ( $fun."(seq) as seq" )->find ();

		if ($rr["seq"] != null) {
			$seq1 = $r ["seq"];
			$seq2 = $rr ["seq"];

			$r2 = $m->where ( "isShow = 1 and seq = %d", $seq2 )->field ( "uid" )->find ();
			$uid2 = $r2 ["uid"];

			$r ["seq"] = $seq2;
			$m->where ( "uid = %d", $uid )->save ( $r );

			$r2 ["seq"] = $seq1;
			$m->where ( "uid = %d", $uid2 )->save ( $r2 );

			$this->redirect ( "Admin/HomeMaint/friendLinkList" );
		} else {
			$this->error ( $err );
		}
	}

	//=========================幻灯片==============================
	public function slideList() {
		$homeSlide = M ( "HomeSlide" );
		$homeSlideList = $homeSlide->select ();
		$this->assign ( "list", $homeSlideList );

		// $php_json = json_encode($homeSlideList); //把php数组格式转换成 json 格式的数据
		// $this->assign("php_json",$php_json);

		$this->display ();
	}
	public function addSlide() {
		$this->display ();
	}
	public function doAddSlide($description) {
		$info = upload ();
		if ($info[0] == true) {
			$homeSlide = M ( "HomeSlide" );
			foreach ( $info[1] as $file ) {
				// echo $file["savepath"].$file["savename"];
				$data ["description"] = $description;
				$data ["path"] = $file ["savepath"] . $file ["savename"];
				$data ["upload_time"] = date ( "Y-m-d H:i:s", time () );
				$homeSlide->add ( $data );
			}
			$this->redirect ( "Admin/HomeMaint/slideList" );
		} else {
			$this->error ( $info[1] );
		}
	}
	public function editSlide($uid) {
		$homeSlide = M ( "HomeSlide" );
		$result = $homeSlide->where ( "uid = %d", $uid )->find ();
		$this->assign ( "record", $result );

		$this->display ();
	}
	public function updateSlide($uid, $description) {
		$m = M ( "HomeSlide" );
		$data ["description"] = $description;

		// 如果更换幻灯片
		if ($_FILES ["photo"] ["name"] != "") {
			$info = upload ();
			if ($info[0] == true) {
				foreach ( $info[1] as $file ) {
					$data ["path"] = $file ["savepath"] . $file ["savename"];
					$data ["upload_time"] = date ( "Y-m-d H:i:s", time () );
				}
				// 删除之前旧的文件
				$r = $m->where ( "uid=%d", $uid )->find();
				unlink($_SERVER['DOCUMENT_ROOT'].__ROOT__."/Uploads/".$r["path"]);
			} else {
				$this->error ( $info[1] );
			}
		}
		$m->where ( "uid = %d", $uid )->save ( $data );
		$this->redirect ( "Admin/HomeMaint/slideList" );
	}
	public function deleteSlide($uid) {
		$m = M ( "HomeSlide" );
		$r = $m->where ( "uid=%d", $uid )->find();
		$result = $m->where ( "uid = %d", $uid )->delete ();
		if ($result === 1) {
			unlink($_SERVER['DOCUMENT_ROOT'].__ROOT__."/Uploads/".$r["path"]);
			$this->redirect ( "Admin/HomeMaint/slideList" );
		} else {
			echo "删除幻灯片失败！";
		}
	}
}