<?php
class Core {
    public function Run($routes){
        $url = isset($_GET['url']) ? "/".$_GET['url'] : "/";
        $temp = false;
        foreach ($routes as $keyvalue => $value) {
            $pattern = '#^'.preg_replace('/{id}/', '(\w+)', $keyvalue).'$#';
            if (preg_match($pattern, $url, $matches)) {
                [$currentController, $action] = explode('@', $value);
                require_once __DIR__."/../Controllers/$currentController.php";
                $controller = new $currentController();
                $controller->$action($matches);
                $temp = true;
            }
        }
        if (!$temp){
            echo "page not found";
        }
    }
}