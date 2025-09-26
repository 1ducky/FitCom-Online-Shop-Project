<?php

function Pagination($page,$total){
    global $basepath;
    global $baseurl;
    global $query;
    $page=$page+1;

    ob_start()
?>

<?php if($total !== null):?>
    <div class="container d-flex flex-row justify-content-center align-items-center gap-3 my-3 ">
        <?php if($page > 1):?>
            <a href="<?php echo $baseurl . '?' . http_build_query(array_merge($query,['page' => max($page-1,1)]))?>" class="btn btn-sm tc tshov icon d-flex align-items-center justify-content-center">
                <i class="fas fa-arrow-left"></i>
            </a>
        <?php endif;?>
        
        
        <a href="#" class="btn btn-sm tc tshov icon d-flex align-items-center justify-content-center">
            <?= $page ?>
        </a>
        <?php if($page < $total):?>
            <a href="<?php echo $baseurl . '?' . http_build_query(array_merge($query,['page' => $page+1]))?>" class="btn btn-sm tc tshov icon d-flex align-items-center justify-content-center">
                <i class="fas fa-arrow-right"></i>
            </a>
        <?php endif;?>


    </div>
<?php endif;?>




<?php return ob_get_clean();}
?>