<?php
if($lastpage > 1)
    {   
        $pagination .= "<div class='pagination'>";
        if ($page > 1)
            $pagination.= "<a href='javascript:void(0)' onClick='jobChangePagination(".($prev).");'>&laquo; Previous&nbsp;&nbsp;</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Previous&nbsp;&nbsp;</span>";   
        if ($lastpage < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class='current'>$counter</span>";
                else
                    $pagination.= "<a href='javascript:void(0)' onClick='jobChangePagination(".($counter).");'>$counter</a>";     
            }
        }
        elseif($lastpage > 5 + ($adjacents * 2))
        {
            if($page < 1 + ($adjacents * 2))
            {
                for($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                    else
                        $pagination.= "<a href=\"#Page=".($counter)."\" onClick='jobChangePagination(".($counter).");'>$counter</a>";     
                }
                $pagination.= "...";
                $pagination.= "<a href='javascript:void(0)' onClick='jobChangePagination(".($lpm1).");'>$lpm1</a>";
                $pagination.= "<a href='javascript:void(0)' onClick='jobChangePagination(".($lastpage).");'>$lastpage</a>";   
           }
           elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<a href='javascript:void(0)' onClick='jobChangePagination(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0)' onClick='jobChangePagination(2);'>2</a>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<span class='current'>$counter</span>";
                   else
                       $pagination.= "<a href='javascript:void(0)' onClick='jobChangePagination(".($counter).");'>$counter</a>";     
               }
               $pagination.= "..";
               $pagination.= "<a href='javascript:void(0)' onClick='jobChangePagination(".($lpm1).");'>$lpm1</a>";
               $pagination.= "<a href='javascript:void(0)' onClick='jobChangePagination(".($lastpage).");'>$lastpage</a>";   
           }
           else
           {
               $pagination.= "<a href='javascript:void(0)' onClick='jobChangePagination(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0)' onClick='jobChangePagination(2);'>2</a>";
               $pagination.= "..";
               for($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                   else
                        $pagination.= "<a href='javascript:void(0)' onClick='jobChangePagination(".($counter).");'>$counter</a>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<a href='javascript:void(0)' onClick='jobChangePagination(".($next).");'>Next &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Next &raquo;</span>";
        $pagination.= "</div>";       
    }
    if(isset($_POST['pageId']) && !empty($_POST['pageId']))
        {
            $id=$_POST['pageId'];
        }
        else
        {
            $id='0';
        }
echo $pagination;
?>