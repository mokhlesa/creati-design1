# Symfony\Component\Routing\Exception\RouteNotFoundException - Internal Server Error

Route [contact.index] not defined.

PHP 8.2.12
Laravel 12.36.1
127.0.0.1:8000

## Stack Trace

0 - vendor\laravel\framework\src\Illuminate\Routing\UrlGenerator.php:526
1 - vendor\laravel\framework\src\Illuminate\Foundation\helpers.php:871
2 - resources\views\help\index.blade.php:137
3 - vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php:123
4 - vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php:124
5 - vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php:57
6 - vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php:76
7 - vendor\laravel\framework\src\Illuminate\View\View.php:208
8 - vendor\laravel\framework\src\Illuminate\View\View.php:191
9 - vendor\laravel\framework\src\Illuminate\View\View.php:160
10 - vendor\laravel\framework\src\Illuminate\Http\Response.php:78
11 - vendor\laravel\framework\src\Illuminate\Http\Response.php:34
12 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:939
13 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:906
14 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:821
15 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
16 - vendor\laravel\boost\src\Middleware\InjectBoost.php:22
17 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
18 - vendor\laravel\framework\src\Illuminate\Routing\Middleware\SubstituteBindings.php:50
19 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
20 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken.php:87
21 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
22 - vendor\laravel\framework\src\Illuminate\View\Middleware\ShareErrorsFromSession.php:48
23 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
24 - vendor\laravel\framework\src\Illuminate\Session\Middleware\StartSession.php:120
25 - vendor\laravel\framework\src\Illuminate\Session\Middleware\StartSession.php:63
26 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
27 - vendor\laravel\framework\src\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse.php:36
28 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
29 - vendor\laravel\framework\src\Illuminate\Cookie\Middleware\EncryptCookies.php:74
30 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
31 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:137
32 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:821
33 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:800
34 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:764
35 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:753
36 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:200
37 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
38 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TransformsRequest.php:21
39 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull.php:31
40 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
41 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TransformsRequest.php:21
42 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TrimStrings.php:51
43 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
44 - vendor\laravel\framework\src\Illuminate\Http\Middleware\ValidatePostSize.php:27
45 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
46 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance.php:109
47 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
48 - vendor\laravel\framework\src\Illuminate\Http\Middleware\HandleCors.php:48
49 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
50 - vendor\laravel\framework\src\Illuminate\Http\Middleware\TrustProxies.php:58
51 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
52 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\InvokeDeferredCallbacks.php:22
53 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
54 - vendor\laravel\framework\src\Illuminate\Http\Middleware\ValidatePathEncoding.php:26
55 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
56 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:137
57 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:175
58 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:144
59 - vendor\laravel\framework\src\Illuminate\Foundation\Application.php:1220
60 - public\index.php:20
61 - vendor\laravel\framework\src\Illuminate\Foundation\resources\server.php:23

## Request

GET /help

## Headers

* **host**: 127.0.0.1:8000
* **connection**: keep-alive
* **sec-ch-ua**: "Google Chrome";v="143", "Chromium";v="143", "Not A(Brand";v="24"
* **sec-ch-ua-mobile**: ?0
* **sec-ch-ua-platform**: "Windows"
* **upgrade-insecure-requests**: 1
* **user-agent**: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36
* **accept**: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7
* **sec-fetch-site**: same-origin
* **sec-fetch-mode**: navigate
* **sec-fetch-user**: ?1
* **sec-fetch-dest**: document
* **referer**: http://127.0.0.1:8000/blog/nthry-alaloan-kyf-tkhtar-alaloan-almnasb-ltsamymk
* **accept-encoding**: gzip, deflate, br, zstd
* **accept-language**: ar,en-US;q=0.9,en;q=0.8
* **cookie**: XSRF-TOKEN=eyJpdiI6Ik1kTHpZTEljbjFBK29FeWtsV2FXTHc9PSIsInZhbHVlIjoieUE4UnVaYmZjcHpsR0lkbGgxWXFYOUxBeVF2THgxaHJoSTdVeERKQnpldzdzdnJBYnN3cEtRKytKdlVaRFJKSkt0Q1kxMldFcXNDU1Rzb0pQSEFYSWxqbXJSZ21KYTIzQ2hxOXJiOFlhWlVvdmYyeDNnd0pDYjZ6Unl5Y3pSVk0iLCJtYWMiOiI5NjM4YThjYjJjNTIwMzljOTk1NjhjODQyYmZhMjdkZDczYWM5MmExM2NhZTFjNzU2OTVmN2I1YjA4ZTJhNjY4IiwidGFnIjoiIn0%3D; laravel-session=eyJpdiI6IjVubUN4Zml0VWZibyswSzVRSHJ0Qnc9PSIsInZhbHVlIjoiTXdpUkVFZVJJRFFQVWhJZ0UzTm9kUFBoUm8yZ2JtTFJZZEZBcnVZOHBVcDNWY1lZMHBkSndWVVJRUTMyVlduV3B0M1RxNThsZ2ZNYjB1NlpNMGh5UHhxT3hUYmM4ZnFBL3ROc2NWQUhlZmxQYThnS0pYQVk0NGJ2alBMRHZlVU0iLCJtYWMiOiIwM2ZlMTM4ZmMyYmYwNGVlYWQwNjY0OWU5YjFmY2NlMWUyMjk2YjZmYmZiNjZkYTExYTYwYmFlM2EzZDcyMDc1IiwidGFnIjoiIn0%3D

## Route Context

controller: App\Http\Controllers\HelpController@index
route name: help.index
middleware: web

## Route Parameters

No route parameter data available.

## Database Queries

* mysql - select * from `sessions` where `id` = '9O53wSNnU50QitSZBRbtY9UU2SpSXlybe9ll8iGC' limit 1 (32.41 ms)
* mysql - select * from `users` where `id` = 1 limit 1 (0.72 ms)
