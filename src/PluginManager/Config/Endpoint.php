<?php


namespace Giberson\Tdd\Apigility\PluginManager\Config;


class Endpoint
{
    protected function canonicalize($uri)
    {
        return str_replace('/', '_', $uri);
    }

    public function REST($uri)
    {
        $c = $this->canonicalize($uri);
        $controller = "$c\\Controller";
        return [
            'router' => [
                'routes' => [
                    $c => [
                        'type' => 'literal',
                        'options' => [
                            'route' => $uri,
                            'defaults' => [
                                'controller' => $controller,
                            ],
                        ],
                    ]
                ]
            ],
            'zf-rest' => [
                $controller => [
                    'route_name' => $c,
                    'collection_http_methods' => ['GET'],
                    'entity_http_methods' => [],
                    'collection_name' => basename($uri) . '_collection'
                ]
            ]
        ];
    }

    public function RPC($uri)
    {
        echo "RPC: $uri";
        return [];
    }
}