# Error - Internal Server Error

Call to undefined method Gemini\Client::geminiProVision()

PHP 8.2.12
Laravel 12.36.1
127.0.0.1:8000

## Stack Trace

0 - vendor\laravel\framework\src\Illuminate\Support\Facades\Facade.php:363
1 - app\Http\Controllers\Student\ConsultationController.php:63
2 - vendor\laravel\framework\src\Illuminate\Routing\ControllerDispatcher.php:46
3 - vendor\laravel\framework\src\Illuminate\Routing\Route.php:265
4 - vendor\laravel\framework\src\Illuminate\Routing\Route.php:211
5 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:822
6 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
7 - vendor\laravel\boost\src\Middleware\InjectBoost.php:22
8 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
9 - vendor\laravel\framework\src\Illuminate\Routing\Middleware\SubstituteBindings.php:50
10 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
11 - vendor\laravel\framework\src\Illuminate\Auth\Middleware\Authenticate.php:63
12 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
13 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken.php:87
14 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
15 - vendor\laravel\framework\src\Illuminate\View\Middleware\ShareErrorsFromSession.php:48
16 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
17 - vendor\laravel\framework\src\Illuminate\Session\Middleware\StartSession.php:120
18 - vendor\laravel\framework\src\Illuminate\Session\Middleware\StartSession.php:63
19 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
20 - vendor\laravel\framework\src\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse.php:36
21 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
22 - vendor\laravel\framework\src\Illuminate\Cookie\Middleware\EncryptCookies.php:74
23 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
24 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:137
25 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:821
26 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:800
27 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:764
28 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:753
29 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:200
30 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
31 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TransformsRequest.php:21
32 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull.php:31
33 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
34 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TransformsRequest.php:21
35 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TrimStrings.php:51
36 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
37 - vendor\laravel\framework\src\Illuminate\Http\Middleware\ValidatePostSize.php:27
38 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
39 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance.php:109
40 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
41 - vendor\laravel\framework\src\Illuminate\Http\Middleware\HandleCors.php:48
42 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
43 - vendor\laravel\framework\src\Illuminate\Http\Middleware\TrustProxies.php:58
44 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
45 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\InvokeDeferredCallbacks.php:22
46 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
47 - vendor\laravel\framework\src\Illuminate\Http\Middleware\ValidatePathEncoding.php:26
48 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
49 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:137
50 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:175
51 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:144
52 - vendor\laravel\framework\src\Illuminate\Foundation\Application.php:1220
53 - public\index.php:20
54 - vendor\laravel\framework\src\Illuminate\Foundation\resources\server.php:23

## Request

POST /student/consultation

## Headers

* **host**: 127.0.0.1:8000
* **connection**: keep-alive
* **content-length**: 644200
* **cache-control**: max-age=0
* **sec-ch-ua**: "Chromium";v="142", "Google Chrome";v="142", "Not_A Brand";v="99"
* **sec-ch-ua-mobile**: ?0
* **sec-ch-ua-platform**: "Windows"
* **origin**: http://127.0.0.1:8000
* **content-type**: multipart/form-data; boundary=----WebKitFormBoundaryWgbqCkT5o9TJ9ocB
* **upgrade-insecure-requests**: 1
* **user-agent**: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36
* **accept**: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7
* **sec-fetch-site**: same-origin
* **sec-fetch-mode**: navigate
* **sec-fetch-user**: ?1
* **sec-fetch-dest**: document
* **referer**: http://127.0.0.1:8000/student/consultation/create
* **accept-encoding**: gzip, deflate, br, zstd
* **accept-language**: ar,en-US;q=0.9,en;q=0.8
* **cookie**: XSRF-TOKEN=eyJpdiI6IlEzeDY2T0FqZWpxdlhSeWNBWE5uV0E9PSIsInZhbHVlIjoiV1NIb3QzUUswSmJxY2pMTWhuejVtVGFtOU5kcFVxWlNpTGcwZ0dROWRnRHUwNUNuM0k4VjkvVXF5K1BnM3E2bkJMNVR0TmQ5ME5WT21YejgwbUw5aWF4ZEpFNmlzenVMOElwN3h1ZmVOL09CblA4V1dJMHZhc21YMnVxUjBxZDEiLCJtYWMiOiI4YmUyNzg1MjEyZTIwMTcyYjhkMDM3NGUwODE1NWE0OTY1ODQ5MGIzMmY0YTA4ZDMzZGE4ODk5ODNkMWIwOGZhIiwidGFnIjoiIn0%3D; laravel-session=eyJpdiI6IlVGbE5NQUR1SjdOQ3oyVFNIdXoxRHc9PSIsInZhbHVlIjoiN1VUTHNMQVg4ajVtT1FheW1QeGdSdy9LeXJLYmhKYU5TZTdVdUx3OFJRWWJYMG5rM0VmRkc2NStFTGJJWGtyaURHaUhjM0kyd1B4dVVwNUxjc3hublZuYjRUanI3YnFKajBIUTJNWnZrS3V3NFliU1puNHVTeEovQkFSYmQ3NXIiLCJtYWMiOiI4N2VlY2YyYjdhOGI5ZTdkY2ZjNmU5ODMzMzcxZjk3YzIxM2U2N2ZjYTY5YWQ2MzA0Y2NkM2VkYWM5NDljMTJlIiwidGFnIjoiIn0%3D

## Route Context

controller: App\Http\Controllers\Student\ConsultationController@store
route name: student.consultation.store
middleware: web, auth

## Route Parameters

No route parameter data available.

## Database Queries

* mysql - select * from `sessions` where `id` = 'G9wQZXrFcmRrhYcuZtMIVCLKX0KOUDIStT6koTlD' limit 1 (3.11 ms)
* mysql - select * from `users` where `id` = 3 limit 1 (0.77 ms)
