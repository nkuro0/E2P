<?php
function sort_link($page ,$text, $order=false)
{
    global $order_by, $order_dir;

    if(!$order)
        $order = $text;


    if($_GET['order'] == $order){
        $link = '<a class="item active" href="?page='.$page.''.$order;
    }
    else {
        $link = '<a class="item" href="?page='.$page.''.$order;
    }

    if($order_by==$order && $order_dir=='ASC')
        $link .= '&inverse=true';
    $link .= '"';
    if($order_by==$order && $order_dir=='ASC')
        $link .= ' class="item"';
    elseif($order_by==$order && $order_dir=='DESC')
        $link .= ' class="item"';
    $link .= '>' . $text . '</a>';
    if($_GET['order'] == $order && $order_dir=='ASC'){
        $link .= '<i class="angle up icon"></i>';
    }
    elseif($_GET['order'] == $order && $order_dir=='DESC'){
        $link .= '<i class="angle down icon"></i>';
    }

    return $link;
}
