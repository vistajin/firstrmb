<?php

namespace Admin\Controller;

use Think\Controller;
use Think\Verify;

class LoginController extends Controller {
	public function login($username = null, $password = null, $code) {
		if (IS_POST) {
			$v = new Verify ();
			if (! $v->check ( $code, "" )) {
				$this->error ( "验证码有误！" );
			}
			
			$m = M ( "user" );
			$result = $m->where ( "user_name='%s' and user_password='%s'", $username, md5 ( $password ) )->find ();
			if (count ( $result ) == 0) {
				$this->error ( "错误的用户名或密码！" );
			}
			$result ["last_logon_time"] = date ( "Y-m-d H:i:s", time () );
			$m->where ( "user_name='%s' and user_password='%s'", $username, md5 ( $password ) )->save ( $result );
			session ( "firstrmb_user_auth", $result );
			// $this->success ( "登录成功", U ( "Index/index" ) );
			$this->redirect ( "Index/admin" );
		} else {
			$this->index ();
		}
	}
	public function logout() {
		session ( "firstrmb_user_auth", null );		
		$this->redirect ( "Login/index" );
	}
	public function index() {
		/*
		 * echo "<br>"."网站的根目录地址".__ROOT__." ";
		 * echo "<br>"."入口文件地址".__APP__." ";
		 * echo "<br>"."当前模块地址".__URL__." ";
		 * echo "<br>"."当前url地址".__SELF__." ";
		 * echo "<br>"."当前操作地址".__ACTION__." ";
		 * echo "<br>"."当前模块的模板目录".__CURRENT__." ";
		 * echo "<br>"."当前操作名称".ACTION_NAME." ";
		 * echo "<br>"."当前项目目录".APP_PATH." ";
		 * echo "<br>"."当前项目名称".APP_NAME." ";
		 * echo "<br>"."当前项目的模板目录".APP_TMPL_PATH." ";
		 * echo "<br>"."项目的公共文件目录".APP_PUBLIC_PATH." ";
		 * echo "<br>"."项目的配置文件目录".CONFIG_PATH." ";
		 * echo "<br>"."项目的公共文件目录".COMMON_PATH." ";
		 * //自动缓存与表相关的全部信息
		 * echo "<br>"."项目的数据文件目录".DATA_PATH." runtime下的data目录";
		 * echo "<br>"." ".GROUP_NAME."";
		 * echo "<br>"." ".IS_CGI."";
		 * echo "<br>"." ".IS_WIN."";
		 * echo "<br>"." ".LANG_SET."";
		 * echo "<br>"." ".LOG_PATH."";
		 * echo "<br>"." ".LANG_PATH."";
		 * echo "<br>"." ".TMPL_PATH."";
		 * //js放入的位置，供多个应用的公共资源
		 * echo "<br>"." ".WEB_PUBLIC_PATH."";
		 */
// 		$m = M ( "BasicInfo" );
// 		$result = $m->where ( "uid = 1")->find ();
// 		// session ( "company_name", C ( "COMPANY_NAME" ) );
// 		session ( "company_name", $result["name"] );
		$this->display ();
	}
}