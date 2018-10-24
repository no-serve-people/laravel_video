<?php
namespace App\Http\Controllers\Core;

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Common\CommonController;
use App\Http\Controllers\Common\SystemCotroller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use QL\Ext\CurlMulti;
use QL\QueryList;
class CoreController extends Controller
{
    private $ql;
    private $common;
    private $domin;
    private $opts = ['headers' => ["User-Agent" => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36"]];
    private $vinfo = [];
    private $search = [];
    public function __construct()
    {
        $this->ql = new QueryList();
        $this->ql->use(CurlMulti::class);
        $this->domin = 'https://www.360kan.com';
        $this->common = new CommonController();
    }
    public function indexDsCollect()
    {
        $xzv_93 = ['title' => ['ul:eq(10) .s1', 'text', ''], 'url' => ['ul:eq(10) a.js-link', 'href', ''], 'img' => ['ul:eq(10) .js-playicon img', 'data-src', ''], 'pf' => ['ul:eq(10) .s2', 'text', ''], 'js' => ['ul:eq(10) .w-newfigure-hint', 'text']];
        $xzv_112 = $this->ql->get($this->domin, '', $this->opts)->rules($xzv_93)->query()->getData();
        $this->ql->destruct();
        return $xzv_112->all();
    }
    public function dyList($xzv_91, $xzv_55)
    {
        if ($xzv_91 == 101) {
            die('未找到相应资源');
        }
        $xzv_57 = $this->domin . '/dianying/list?rank=rankhot&cat=' . $xzv_91 . '&area=all&act=all&year=all&pageno=' . $xzv_55;
        $xzv_23 = ['title' => ['.list.g-clear .s1', 'text', ''], 'url' => ['.list.g-clear a.js-tongjic', 'href', '', function ($xzv_60) {
            return base64_encode($this->domin . $xzv_60);
        }], 'img' => ['.list.g-clear .cover.g-playicon img', 'src', ''], 'pf' => ['.list.g-clear .s2', 'text', ''], 'year' => ['.list.g-clear .hint', 'text'], 'star' => ['.list.g-clear .star', 'text', '']];
        $xzv_81 = $this->ql->get($xzv_57)->rules($xzv_23)->query()->getData();
        $this->ql->destruct();
        return $xzv_81->all();
    }
    public function dsjList($xzv_19, $xzv_58)
    {
        $xzv_124 = $this->domin . '/dianshi/list?rank=rankhot&cat=' . $xzv_19 . '&area=all&act=all&year=all&pageno=' . $xzv_58;
        $xzv_77 = ['title' => ['.list.g-clear .s1', 'text', ''], 'url' => ['.list.g-clear a.js-tongjic', 'href', '', function ($xzv_52) {
            return base64_encode($this->domin . $xzv_52);
        }], 'img' => ['.list.g-clear .cover.g-playicon img', 'src', ''], 'js' => ['.list.g-clear .hint', 'text', ''], 'star' => ['.list.g-clear .star', 'text', '']];
        $xzv_53 = $this->ql->get($xzv_124)->rules($xzv_77)->query()->getData();
        $this->ql->destruct();
        return $xzv_53->all();
    }
    public function zyList($xzv_85, $xzv_18)
    {
        $xzv_56 = $this->domin . '/zongyi/list?rank=rankhot&cat=' . $xzv_85 . '&area=all&act=all&pageno=' . $xzv_18;
        $xzv_68 = ['title' => ['.list.g-clear .s1', 'text', ''], 'url' => ['.list.g-clear a.js-tongjic', 'href', '', function ($xzv_67) {
            return base64_encode($this->domin . $xzv_67);
        }], 'img' => ['.list.g-clear .cover.g-playicon img', 'src', ''], 'js' => ['.list.g-clear .hint', 'text', ''], 'star' => ['.list.g-clear .star', 'text', '']];
        $xzv_65 = $this->ql->get($xzv_56)->rules($xzv_68)->query()->getData();
        $this->ql->destruct();
        return $xzv_65->all();
    }
    public function dmList($xzv_66, $xzv_114)
    {
        $xzv_105 = $this->domin . '/dongman/list?rank=rankhot&cat=' . $xzv_66 . '&area=all&act=all&pageno=' . $xzv_114;
        $xzv_102 = ['title' => ['.list.g-clear .s1', 'text', ''], 'url' => ['.list.g-clear a.js-tongjic', 'href', '', function ($xzv_64) {
            return base64_encode($this->domin . $xzv_64);
        }], 'img' => ['.list.g-clear .cover.g-playicon img', 'src', ''], 'js' => ['.list.g-clear .hint', 'text', '']];
        $xzv_90 = $this->ql->get($xzv_105)->rules($xzv_102)->query()->getData();
        $this->ql->destruct();
        return $xzv_90->all();
    }
    public function getDyPlay($xzv_71)
    {
        $xzv_106 = ['title' => ['.title-left.g-clear h1', 'text', ''], 'desc' => ['.item-desc-wrap.g-clear.js-close-wrap', 'text', '-span'], 'playname' => ['.top-list-zd.g-clear a[data-daochu^="to="]', 'text', '-span'], 'play' => ['.top-list-zd.g-clear a[data-daochu^="to="]', 'href', '', function ($xzv_4) {
            if (strpos($xzv_4, 'cps') && strpos($xzv_4, 'youku')) {
                $xzv_107 = explode('&', $xzv_4);
                $xzv_63 = str_replace('url=', '', $xzv_107[1]);
                return $xzv_63;
            } else {
                if (strpos($xzv_4, '?')) {
                    $xzv_108 = strpos($xzv_4, '?');
                    return substr($xzv_4, 0, $xzv_108);
                } else {
                    return $xzv_4;
                }
            }
        }]];
        $xzv_3 = $this->ql->get($xzv_71)->rules($xzv_106)->query()->getData();
        $this->ql->destruct();
        return $xzv_3->all();
    }
    public function getDsjPlay($xzv_122)
    {
        $xzv_59 = ['title' => ['.title-left.g-clear h1', 'text', ''], 'desc' => ['.js-close-wrap', 'text', '-span']];
        $xzv_121 = $this->ql->get($xzv_122)->rules($xzv_59)->query()->getData();
        $this->ql->destruct();
        return $xzv_121->all();
    }
    public function getZyPlay($xzv_80)
    {
        $xzv_2 = ['bt' => ['.title-left.g-clear h1', 'text', ''], 'zd' => ['.ea-site', 'text', ''], 'desc' => ['.item-desc-wrap.g-clear.js-close-wrap', 'text', '-span'], 'title' => ['.js-year-page .s1', 'text', ''], 'href' => ['.js-month-tab a.js-link', 'href'], time => ['.js-month-tab .w-newfigure-hint', 'text', '']];
        $xzv_115 = $this->ql->get($xzv_80)->rules($xzv_2)->query()->getData();
        $this->ql->destruct();
        return $xzv_115->all();
    }
    public function getLike($xzv_7)
    {
        $xzv_8 = ['title' => ['.s-guess-right a', 'text', ''], 'url' => ['.s-guess-right a', 'href', '', function ($xzv_101) {
            return base64_encode($this->domin . $xzv_101);
        }], 'img' => ['.s-guess-left.g-playicon.js-playicon img', 'data-src']];
        $xzv_15 = $this->ql->get($xzv_7)->rules($xzv_8)->query()->getData();
        $this->ql->destruct();
        return $xzv_15->all();
    }
    public function getTDLike($xzv_79 = 'tv', $xzv_76)
    {
        if ($xzv_79 == 'tv') {
            $xzv_117 = ['title' => ['.s-guess-list .title', 'text', ''], 'url' => ['.s-guess-list .title a', 'href', '', function ($xzv_54) {
                return base64_encode($this->domin . $xzv_54);
            }], 'img' => ['.s-guess-list li .js-playicon img', 'data-src', '']];
        } else {
            $xzv_117 = ['title' => ['.m-guess-list .title', 'text', ''], 'url' => ['.m-guess-list .title a', 'href', '', function ($xzv_98) {
                return base64_encode($this->domin . $xzv_98);
            }], 'img' => ['.m-guess-list li .js-playicon img', 'data-src', '']];
        }
        $xzv_97 = $this->ql->get($xzv_76)->rules($xzv_117)->query()->getData();
        return $xzv_97->all();
    }
    public function getSearch($xzv_10, $xzv_11 = "")
    {
        $xzv_128 = 'https://so.360kan.com/index.php?kw=' . $xzv_10;
        $xzv_38 = ['dy_title' => ['.m-mainpic a', 'title', ''], 'dy_addr' => ['.m-mainpic a', 'href', '', function ($xzv_9) use($xzv_11) {
            $xzv_33 = str_replace('http://', 'https://', $xzv_9);
            if ($xzv_11 == 'wx') {
                return 'http://' . config('webset.webdomin') . '/play/' . base64_encode($xzv_9) . '.html';
            }
            return base64_encode($xzv_33);
        }], 'dy_img' => ['.m-mainpic img', 'src', ''], 'dy_type' => ['.cont .playtype', 'text', ''], 'dy_desc' => ['.m-description p', 'text', '']];
        $xzv_99 = $this->ql->get($xzv_128)->rules($xzv_38)->query()->getData();
        $this->ql->destruct();
        return $xzv_99->all();
    }
    public function getTotal()
    {
        $xzv_119 = $this->domin . '/dianshi/list.php';
        $xzv_75 = ['total' => ['.app span', 'text', '']];
        $xzv_96 = $this->ql->get($xzv_119)->rules($xzv_75)->query()->getData();
        $this->ql->destruct();
        return $xzv_96->all();
    }
    public function getCx($xzv_120, $xzv_12)
    {
        $xzv_118 = 'http://' . $xzv_12 . '/index.php?m=vod-search';
        $xzv_31 = ['wd' => $xzv_120, 'submit' => 'search'];
        $xzv_92 = $this->common->curl_post($xzv_118, $xzv_31);
        $xzv_51 = ['title' => ['.xing_vb4 a', 'text', '-span'], 'url' => ['.xing_vb4 a', 'href', '']];
        $xzv_73 = $this->ql->html($xzv_92)->rules($xzv_51)->query()->getData();
        $this->ql->destruct();
        $xzv_13 = $xzv_73->all();
        foreach ($xzv_13 as $xzv_120 => $xzv_34) {
            $xzv_34['url'] = 'http://' . $xzv_12 . $xzv_34['url'];
            $xzv_13[$xzv_120]['url'] = $xzv_34['url'];
        }
        return $xzv_13;
    }
    public function autoCxSearch($xzv_14, $xzv_27, $xzv_116 = "")
    {
        $xzv_1 = 'http://' . $xzv_27 . '/index.php?m=vod-search';
        $xzv_0 = ['wd' => $xzv_14, 'submit' => 'search'];
        $xzv_70 = $this->common->curl_post($xzv_1, $xzv_0);
        $xzv_109 = ['title' => ['.xing_vb4 a', 'text', '-span'], 'url' => ['.xing_vb4 a', 'href', ''], 'type' => ['.xing_vb5', 'text', '']];
        $xzv_36 = [];
        $xzv_45 = $this->ql->html($xzv_70)->rules($xzv_109)->query()->getData();
        $xzv_47 = $xzv_45->all();
        foreach ($xzv_47 as $xzv_14 => $xzv_48) {
                $xzv_48['url'] = 'http://' . $xzv_27 . $xzv_48['url'];
                $xzv_36[] = $xzv_48['url'];
        }
        $xzv_49 = ['dy_addr' => ['.nvc dl dd a:eq(2)', 'href', '', function ($xzv_6) use($xzv_116) {
            if ($xzv_116 == 'wx') {
                return 'http://' . config('webset.webdomin') . '/play/' . base64_encode($xzv_6) . '.html';
            }
            return base64_encode($xzv_6);
        }], 'dy_title' => ['.vodh h2', 'text'], 'dy_star' => ['.vodinfobox ul li:eq(2) span', 'text', ''], 'dy_desc' => ['.vodplayinfo:eq(1)', 'text', ''], 'dy_img' => ['.lazy', 'src']];
        if ($xzv_27 == 'www.go1977.com') {
            $xzv_49 = ['dy_addr' => ['.nvc dl dd a:eq(2)', 'href', '', function ($xzv_43) use($xzv_116) {
                if ($xzv_116 == 'wx') {
                    return 'http://' . config('webset.webdomin') . '/play/' . base64_encode($xzv_43) . '.html';
                }
                return base64_encode($xzv_43);
            }], 'dy_title' => ['.vodh h2', 'text'], 'dy_star' => ['.vodinfobox ul li:eq(2) span', 'text', ''], 'dy_desc' => ['.vodplayinfo:eq(0)', 'text', ''], 'dy_img' => ['.lazy', 'src']];
        }
        $this->ql->rules($xzv_49)->curlMulti($xzv_36)->success(function (QueryList $xzv_17) {
            $xzv_37 = $xzv_17->query()->getData();
            $xzv_5 = $xzv_37->all();
            $this->search[] = $xzv_5;
            $xzv_17->destruct();
        })->start(['maxThread' => 100, 'maxTry' => 3, 'opt' => [CURLOPT_TIMEOUT => 10, CURLOPT_CONNECTTIMEOUT => 1, CURLOPT_RETURNTRANSFER => true], 'cache' => ['enable' => true, 'compress' => true, dir => 'storage/app/public/cache', 'expire' => 86400, 'verifyPost' => false]]);
        $xzv_127 = [];
        $xzv_103 = $this->search;
        foreach ($xzv_103 as $xzv_48) {
            $xzv_127[] = $xzv_48[0];
        }
        return $xzv_127;
    }
    public function getCxData($xzv_104)
    {
        $xzv_39 = ['dyname' => ['.vodh h2', 'text'], 'dydesc' => ['.vodplayinfo:eq(1)', 'text', ''], 'dylogo' => ['.lazy', 'src']];
        if (strpos($xzv_104, 'www.go1977.com') !== false) {
            $xzv_39 = ['dyname' => ['.vodh h2', 'text'], 'dydesc' => ['.vodplayinfo:eq(0)', 'text', ''], 'dylogo' => ['.lazy', 'src']];
        }
        $xzv_94 = $this->ql->get($xzv_104)->rules($xzv_39)->query()->getData();
        $this->ql->destruct();
        return $xzv_94->all();
    }
    public function getCxLink($xzv_40, $xzv_42 = "")
    {
        $xzv_16 = [];
        $xzv_46 = [];
        $xzv_82 = [];
        $xzv_41 = [];
        $xzv_24 = 1;
        $xzv_61 = 1;
        $xzv_84 = 1;
        $xzv_62 = ['dyaddr' => ['input', 'value', '']];
        $xzv_87 = $this->ql->get($xzv_40)->rules($xzv_62)->range('.vodplayinfo ul>li')->query()->getData();
        $this->ql->destruct();
        $xzv_44 = $xzv_87->all();
        if (count($xzv_44) > 3) {
            foreach ($xzv_44 as $xzv_20) {
                if (strpos($xzv_20['dyaddr'], 'm3u8')) {
                    $xzv_46[] = '第' . $xzv_24++ . '集$' . (config('playerconfig.m3u8') ?? '/public/player/player.php?url=') . $xzv_20['dyaddr'];
                } elseif (strpos($xzv_20['dyaddr'], 'mp4')) {
                    $xzv_41[] = '第' . $xzv_61++ . '集$' . (config('playerconfig.mp4') ?? '/public/player/player.php?url=') . $xzv_20['dyaddr'];
                } else {
                    $xzv_82[] = '第' . $xzv_84++ . '集$' . $xzv_20['dyaddr'];
                }
            }
        } else {
            foreach ($xzv_44 as $xzv_20) {
                if (strpos($xzv_20['dyaddr'], 'm3u8')) {
                    $xzv_46[] = '超清HD$' . (config('playerconfig.m3u8') ?? '/public/player/player.php?url=') . $xzv_20['dyaddr'];
                } elseif (strpos($xzv_20['dyaddr'], 'mp4')) {
                    $xzv_41[] = '超清HD$' . (config('playerconfig.mp4') ?? '/public/player/player.php?url=') . $xzv_20['dyaddr'];
                } else {
                    $xzv_82[] = '超清HD$' . $xzv_20['dyaddr'];
                }
            }
        }
        switch ($xzv_42) {
            case 'm3u8':
                return $xzv_46;
                break;
            case 'mp4':
                return $xzv_41;
                break;
            case 'zhilian':
                return $xzv_82;
                break;
            case 'total':
                if ($xzv_46) {
                    $xzv_16['m3u8'] = $xzv_46;
                }
                if ($xzv_41) {
                    $xzv_16['mp4'] = $xzv_41;
                }
                if ($xzv_82) {
                    $xzv_16['zhilian'] = $xzv_82;
                }
                return $xzv_16;
                break;
        }
    }
    public function AutoCxList(Request $xzv_126, $xzv_86, $xzv_125, $xzv_123)
    {
        $xzv_88 = 'http://' . $xzv_86 . '/?m=vod-type-id-' . $xzv_125 . '-pg-' . $xzv_123 . '.html';
        $xzv_89 = [];
        $xzv_78 = [link => ['.xing_vb4 a', 'href', '', function ($xzv_50) use($xzv_86) {
            return 'http://' . $xzv_86 . $xzv_50;
        }]];
        $xzv_32 = $this->ql->get($xzv_88)->rules($xzv_78)->query()->getData()->all();
        foreach ($xzv_32 as $xzv_28) {
            $xzv_89[] = $xzv_28[link];
        }
        $xzv_129 = ['dy_addr' => ['.nvc dl dd a:eq(2)', 'href', '', function ($xzv_69) {
            return base64_encode($xzv_69);
        }], 'dy_title' => ['.vodh h2', 'text'], 'dy_star' => ['.vodinfobox ul li:eq(2) span', 'text', ''], 'dy_img' => ['.lazy', 'src']];
        $this->ql->rules($xzv_129)->curlMulti($xzv_89)->success(function (QueryList $xzv_21) {
            $xzv_35 = $xzv_21->query()->getData();
            $xzv_111 = $xzv_35->all();
            $this->vinfo[] = $xzv_111;
            $xzv_21->destruct();
        })->start(['maxThread' => 100, 'maxTry' => 3, 'opt' => [CURLOPT_TIMEOUT => 10, CURLOPT_CONNECTTIMEOUT => 1, CURLOPT_RETURNTRANSFER => true], 'cache' => ['enable' => true, 'compress' => true, dir => 'storage/app/public/cache', 'expire' => 86400, 'verifyPost' => false]]);
        return $this->vinfo;
    }
    public function getWxSearch($xzv_83)
    {
        $xzv_110 = '';
        $xzv_30 = [];
        $xzv_22 = 'http://api.t.sina.com.cn/short_url/shorten.json?source=' . config('wxconfig.sina_app_key');
        $xzv_29 = config('autocxconfig.dizhi');
        $xzv_110 = $this->getSearch($xzv_83, 'wx');
        $xzv_113 = $this->autoCxSearch($xzv_83, $xzv_29, 'wx');
        $xzv_72 = ['dy_title' => config('wxconfig.twtitle'), 'dy_img' => config('wxconfig.reimg'), 'dy_addr' => 'http://' . config('webset.webdomin') . '/search/' . urlencode($xzv_83) . '.html'];
        if (!empty($xzv_113)) {
            foreach ($xzv_113 as $xzv_100) {
                array_unshift($xzv_110, $xzv_100);
            }
        }
        if (!empty($xzv_110) || !empty($xzv_113)) {
            array_unshift($xzv_110, $xzv_72);
        }
        if (!empty($xzv_110)) {
            $xzv_25 = count($xzv_110);
            if (config('wxconfig.fanghong')) {
                if ($xzv_25 >= 4) {
                    for ($xzv_95 = 0; $xzv_95 < 4; $xzv_95++) {
                        $xzv_22 .= '&url_long=' . $xzv_110[$xzv_95]['dy_addr'];
                    }
                    $xzv_26 = $this->common->curl_get_dwz($xzv_22);
                    $xzv_74 = json_decode($xzv_26, 1);
                    foreach ($xzv_74 as $xzv_83 => $xzv_100) {
                        $xzv_30[$xzv_83] = $xzv_110[$xzv_83];
                        $xzv_30[$xzv_83]['dy_addr'] = $xzv_100['url_short'];
                    }
                    return $xzv_30;
                } else {
                    for ($xzv_95 = 0; $xzv_95 < $xzv_25; $xzv_95++) {
                        $xzv_22 .= '&url_long=' . $xzv_110[$xzv_95]['dy_addr'];
                    }
                    $xzv_26 = $this->common->curl_get_dwz($xzv_22);
                    $xzv_74 = json_decode($xzv_26, 1);
                    foreach ($xzv_74 as $xzv_83 => $xzv_100) {
                        $xzv_30[$xzv_83] = $xzv_110[$xzv_83];
                        $xzv_30[$xzv_83]['dy_addr'] = $xzv_100['url_short'];
                    }
                    return $xzv_30;
                }
            } else {
                return $xzv_110;
            }
        }
    }
}