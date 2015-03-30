<?php
/**
 * phalcon-base.
 * Description:
 * User: eagle
 * Date: 2015/03/30
 * Email: 0x07de@gmail.com
 * Github: http://github.com/eaglewu
 */
if (extension_loaded('xhprof')) {
    xhprof_enable(XHPROF_FLAGS_NO_BUILTINS | XHPROF_FLAGS_CPU | XHPROF_FLAGS_MEMORY);

    /**
     * Load main index file
     * Warring! Don't use break function eg. die(), exit() in project.
     */
    include __DIR__ . '/index.php';

    $xhprof_data = xhprof_disable();

    $XHPROF_ROOT = __DIR__ . '/xhprof';

    include_once $XHPROF_ROOT . '/xhprof_lib/utils/xhprof_lib.php';
    include_once $XHPROF_ROOT . '/xhprof_lib/utils/xhprof_runs.php';

    $namespace = "xhprof_phalcon";
    $xhprof_runs = new  XHProfRuns_Default ();
    $run_id = $xhprof_runs->save_run($xhprof_data, $namespace);

    echo <<<HTML
<br><br>
<div align="center">
    <a align="center" href="xhprof/xhprof_html/index.php?run={$run_id}&source={$namespace}">
        Show XHProf
    </a>
</div>
HTML;

} else {

    echo <<<HTML
<a target="__bank" href="https://pecl.php.net/package/xhprof">
    Xhprof
</a> Extension Missing.
HTML;

}

