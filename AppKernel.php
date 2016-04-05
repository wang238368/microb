<?php
/*
 * This file is part of the microb package.
 *
 *  (c) YANG BIN <162058339@qq.com>
 *
 */

use Microb\Kernel;
use Think\Think;

class AppKernel extends Kernel
{
    public function run($mode = "common", $storageType = "File", $debug = true)
    {
        $this->initApp($mode, ucfirst($storageType), $debug);
        Think::start();
    }

    protected function initApp($mode, $storageType, $debug)
    {
        $this->init();
        /*
         * 应用目录
         */
        defined("APP_PATH") or define("APP_PATH", __DIR__."/app/");

        /*
         * 应用附加目录
         */

        defined("ADDON_PATH") or define("ADDON_PATH", APP_PATH."Addon");

        /*
         * 应用公共目录
         */
        defined("COMMON_PATH") or define("COMMON_PATH", APP_PATH."Common/");

        /*
         * 应用公共配置目录
         */
        defined("CONF_PATH") or define("CONF_PATH", COMMON_PATH."Conf/");

        /*
         * 应用公共语言目录
         */
        defined("LANG_PATH") or define("LANG_PATH", COMMON_PATH."Lang/");

        /*
         * 应用静态目录
         */
        defined("HTML_PATH") or define("HTML_PATH", APP_PATH."Html/");

        /*
         * 应用运行时目录
         */
        defined("RUNTIME_PATH") or define("RUNTIME_PATH", APP_PATH."Runtime/");

        /*
         * 应用运行时日志目录
         */
        defined("LOG_PATH") or define("LOG_PATH", RUNTIME_PATH."Logs/");

        /*
         * 应用运行时缓存目录
         */
        defined("TEMP_PATH") or define("TEMP_PATH", RUNTIME_PATH."Temp/");

        /*
         * 应用运行时数据目录
         */
        defined("DATA_PATH") or define("DATA_PATH", RUNTIME_PATH."Data/");

        /*
         * 应用运行时模板缓存目录
         */
        defined("CACHE_PATH") or define("CACHE_PATH", RUNTIME_PATH."Cache/");

        /*
         * 应用模板目录
         */
        defined("TMPL_PATH") or define("TMPL_PATH", __DIR__."/media/view/");


        /*
         * 系统开始执行时间
         */
        $GLOBALS["_beginTime"] = microtime(TRUE);

        /*
         *  记录内存初始使用
         */
        function_exists("memory_get_usage") || $GLOBALS["_startUseMems"] = memory_get_usage();

        /*
         * URL 模式定义
         * URL_COMMON 普通模式
         * URL_PATHINFO PATHINFO模式
         * URL_REWRITE REWRITE模式
         * URL_COMPAT 兼容模式
         */
        define("URL_COMMON", "0");
        define("URL_PATHINFO", "1");
        define("URL_REWRITE", "2");
        define("URL_COMPAT", "3");

        /*
         * 配置文件后缀
         */
        defined("CONF_EXT") or define("CONF_EXT", ".php");

        /*
         * 配置文件解析方法
         */
        defined("CONF_PARSE") or define("CONF_PARSE", "");

        /*
         * 配置应用模式
         * 要求首字母小写 common|sae
         * 默认是common模式
         * 新浪Sae模式   "sae"
         */
        define("APP_MODE", $mode);

        /*
         * 配置应用存储类型
         * 要求首字母大写 File|Sae
         * 默认是File类型
         */
        define("STORAGE_TYPE", $storageType);

        /*
         * 应用是否是调试模式
         */
        define("APP_DEBUG", $debug);

        /*
         * 应用类文件后缀
         */
        define("EXT", ".class.php");

        /*
         * 应用状态 加载对应的配置文件
         */
        defined("APP_STATUS") or define("APP_STATUS", "on");

        if (!IS_CLI) {
            if (!defined("_PHP_FILE_")) {
                if (IS_CGI) {
                    //CGI/FASTCGI模式下
                    $_temp = explode(".php", $_SERVER["PHP_SELF"]);
                    define("_PHP_FILE_",
                        rtrim(str_replace($_SERVER["HTTP_HOST"], "",
                                $_temp[0].".php"), "/"));
                } else {
                    define("_PHP_FILE_", rtrim($_SERVER["SCRIPT_NAME"], "/"));
                }
            }
            if (!defined("__ROOT__")) {
                $_root = rtrim(dirname(_PHP_FILE_), "/");
                define("__ROOT__",
                    (($_root == "/" || $_root == "\\") ? "" : $_root));
            }
        }
    }

}