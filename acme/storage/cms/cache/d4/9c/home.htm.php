<?php 
class Cms5d0756f480b0d785413312_92c25263dcb1d51529760c873bcb2359Class extends Cms\Classes\PageCode
{
public function onPagePosts()
{
    $this->blogPosts->setProperty('pageNumber', post('page'));
    $this->pageCycle();
}
}
