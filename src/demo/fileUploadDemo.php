<?php
    include "../LazopSdk.php";

    $c = new LazopClient('https://api.lazada.test/rest', '${appKey}', '${appSecret}');
    $request = new LazopRequest('/xiaoxuan/mockfileupload');
    $request->addApiParam('file_name','pom.xml');
    $request->addFileParam('file_bytes',file_get_contents('/Users/xt/Documents/work/tasp/tasp/pom.xml'));

    var_dump($c->execute($request));
?>