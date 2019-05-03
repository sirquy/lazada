# Lazada php by Quy Nguyen

This is a [Lazada Open API](https://open.lazada.com) Client for PHP.

## Requirements

* PHP >= 7.1
* [Composer](https://getcomposer.org/download/)

## Installation

Execute the following command to get the package:

```
$ composer require quynp/lazada
```

## Usage

Create an instance of the Lazada client, then use to access the Lazada Open Platform API.

```php
<?php

use Lazada\LazopClient;
use Lazada\LazopRequest;
use Exception;

class lazada {
    
    public $lazada;
    public $partner_id;
    public $partner_key;
    public $access_token;
    public $auth_url = 'https://auth.lazada.com/rest';
    public $api_url = 'https://api.lazada.vn/rest';

    public function __construct($access_token = '') {
        $this->partner_id = 'Lazada App ID';
        $this->partner_key = 'Lazada App Secret';
        $this->access_token = $access_token;
        $this->lazada = new LazopClient($this->api_url, $this->partner_id, $this->partner_key);
    }

    public function request($path, $params = [], $method = 'GET') {
        $request = new LazopRequest($path, $method);
        if(!empty($params)) {
            foreach($params as $key => $value) {
                $request->addApiParam($key, $value);
            }
        }
        return $this->lazada->execute($request, $this->access_token);
    }

    public function authorization($return_url) {
        try {
            $auth_url = 'https://auth.lazada.com/oauth/authorize?response_type=code&force_auth=true&redirect_uri='.$return_url."&client_id=".$this->partner_id;
            return $auth_url;
        } catch(\Exception $e) {
            return false;
        }
    }
    
    public function get_access_token($code) {
        try {
            $lazada = new LazopClient($this->auth_url, $this->partner_id, $this->partner_key);
            $request = new LazopRequest('/auth/token/create');
            $request->addApiParam('code', $code);
            return $lazada->execute($request);
        } catch(\Exception $e) {
            return false;
        }
    }
}
```

## Examples

### Get seller shop information

```php
public function getShopInfo() {
    return $this->request('/seller/get');
}
```
