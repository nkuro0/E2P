<?php
function sort_link($page ,$text, $order=false)
{
    global $order_by, $order_dir;

    if(!$order)
        $order = $text;

    $link = '<a class="item" href="?page='.$page.''.$order;
    if($order_by==$order && $order_dir=='ASC')
        $link .= '&inverse=true';
    $link .= '"';
    if($order_by==$order && $order_dir=='ASC')
        $link .= ' class="item"';
    elseif($order_by==$order && $order_dir=='DESC')
        $link .= ' class="item"';
    $link .= '>' . $text . '</a>';

    return $link;
}
