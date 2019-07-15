<?php 
class Cms5d147b5d0bc63839884286_89ad6e25e557affe06ac8f1978359d3dClass extends Cms\Classes\PageCode
{
public function onPagePosts()
{
    $this->blogPosts->setProperty('pageNumber', post('page'));
    $this->pageCycle();
}
}
