<?php
    include "../LazopSdk.php";

    $c = new LazopClient('https://api.lazada.test/rest', '${appKey}', '${appSecret}');
    $request = new LazopRequest('/mock/api/get');
    $request->addApiParam('api_id',1);
    $request->addHttpHeaderParam('cx','test');
    
    var_dump($c->execute($request));

?>