<?php

namespace App\Libraries;
use Illuminate\Support\Facades\Http;
use Log;

class Shopify
{
    private $key;

    private $key_secret;

    private $access_token;

    private $domain;

    private $reqID;

    private $mutationWithMedia = <<<GQL
mutation CreateProductWithNewMedia(\$product: ProductCreateInput!, \$media: [CreateMediaInput!]) {
  productCreate(product: \$product, media: \$media) {
    product {
      id
      title
      variants(first: 10) { nodes { id title price sku } }
      media(first: 10) { nodes { alt mediaContentType preview { status } } }
      metafields(first: 10) { nodes { namespace key value } }
    }
    userErrors { field message }
  }
}
GQL;

    private $mutationWithoutMedia = <<<GQL
mutation CreateProduct(\$product: ProductCreateInput!) {
  productCreate(product: \$product) {
    product {
      id
      title
      variants(first: 10) { nodes { id title price sku } }
      metafields(first: 10) { nodes { namespace key value } }
    }
    userErrors { field message }
  }
}
GQL;

    private $createProduct = <<<GQL
mutation createProduct(\$productSet: ProductSetInput!, \$synchronous: Boolean!) {
  productSet(synchronous: \$synchronous, input: \$productSet) {
    product {
      id
      media(first: 5) {
        nodes {
          id
          alt
          mediaContentType
          status
        }
      }
      variants(first: 5) {
        nodes {
          title
          price
          media(first: 5) {
            nodes {
              id
              alt
              mediaContentType
              status
            }
          }
        }
      }
    }
    userErrors {
      field
      message
    }
  }
}
GQL;
    public function __construct($config)
    {
        $this->key = $config->key;
        $this->key_secret = $config->key_secret;
        $this->access_token = $config->access_token;
        $this->domain = $config->domain;
        $this->reqID = rand(1111111111, 99999999999999);
    }

    public function createProduct($productData,$query)
    {
        $body = [
            "query" => $this->{$query},
            "variables" => $productData
        ];

        $request = [
            "url" => "https://{$this->domain}/admin/api/2025-07/graphql.json",
            "header" => [
                "Content-Type" => "application/json",
                "X-Shopify-Access-Token" => $this->access_token
            ],
            "method" => "post",
            "body" => $body,
            "dir" => "create_product"
        ];

        return $this->hit($request);
    }


    private function hit($res)
    {
        $method = $res['method'];
        $this->apiLog('info', $res['dir'] . " Request -" . $this->reqID, $res['body']);

        $response = Http::withHeaders($res['header'])->$method($res['url'], $res['body']);
        $result = $response->json();

        $this->apiLog('info', $res['dir'] . " Response -" . $this->reqID, $result);

        return [
            "status" => $response->successful(),
            "statuscode" => $response->status(),
            "response" => $result
        ];
    }


    protected function apiLog($level, $message, array $context = [])
    {
        Log::channel('api')->$level($message, $context);
    }


}
