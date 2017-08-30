<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 表单验证规则配置。
 * author lantian。
 * time 2017年3月12日17:04:08。
 */

$config = 
        array
        (
            "user_login/login"=>
            array
            (
                array
                (
                    "field"=>"username",
                    "label"=>"用户名",
                    "rules"=>"trim|required|exact_length[11]",
                ),
                array
                (
                    "field"=>"password",
                    "label"=>"密码",
                    "rules"=>"trim|required|min_length[1]|max_length[20]",
                ),
            ),
        );