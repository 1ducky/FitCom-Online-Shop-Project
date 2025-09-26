<?php

function RenderCommentList($data){
    

    ob_start();
?> 



<div class="container my-3 position-relative bg-white p-3">
    <h2>Ulasan Pembeli</h2>
    <div class="py-4">
        <?php if(!isset($data['data'])):?>
            <h2>Tidak ada Penilaian</h2>
        <?php else:?>    
            <?php foreach ($data['data'] as $comment):?>   
                <section class=" card shadow-sm mb-3">
                    <div class="card-body">
                        <div class="header d-flex flex-row justify-content-start align-items-baseline gap-2">
                            <h6><?=htmlspecialchars($comment['email']) ?></h6>
                            <p>
                                <?=htmlspecialchars($comment['rating']) ?>
                                <?php for ($i = 0; $i < $comment['rating']; $i++): ?>
                                    <i class="fas fa-star text-warning"></i>
                                <?php endfor; ?>
                            </p>
                            <small class="text-muted si"><?=htmlspecialchars($comment['create_at']) ?></small>
                        </div>
                        <div class="mb-3"><?=htmlspecialchars($comment['komentar']) ?></div>
                        <?php if(isset($comment['update_at'])):?>
                            <small class="text-muted">Update pada <?=htmlspecialchars($comment['update_at']) ?></small>
                        <?php endif ?>
                    </div>
                </section>
                <?php endforeach?>
                <a href="" class="text-muted position-absolute bottom-0 end-0 mb-4 me-4">lihat ulasan lainnya > </a>
        <?php endif;?>
    </div>
</div>

<?php
return ob_get_clean();
}
?>