<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ralph
 * Date: 10/12/13
 * Time: 2:37 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<h1>All threads</h1>
<div class="pagination">
<ul>
    <?php foreach ($threads as $v): ?>
        <li>
            <a href="<?php eh(url('thread/view', array('thread_id' => $v->id))) ?>">
                <?php eh($v->title) ?>
            </a>
        </li>
    <?php endforeach ?>
</ul>
</div>
<div class="pager page-header">
    <?php
        // If there is more than 1 page of results
        if($lastPage != 1) :
            /**
             * Checks if we're on page 1. If yes, then we don't need a link
             * to the previous page or the first page. If not, we generate
             * links to the first page, and to the previous page.
             * */
            if($pagenum > 1) : $previous = $pagenum - 1; ?>
            <a href="<?php eh(url('',array('page' => $previous)))?>">Previous</a>
            <?php
                // Renders links of pages.
                for($i = $pagenum - 4; $i < $pagenum; $i++) : if($i > 0) : ?>
                <a href="<?php eh(url('',array('page' => $i)))?>"><?php echo $i ?></a>
            <?php endif; endfor; ?>
        <?php endif;
            // render the target pagenum but without it being a link
            echo $pagenum ?>
        <?php
            // Render links of pages.
            for($i = $pagenum + 1; $i <= $lastPage; $i++) : ?>
            <a href="<?php eh(url('',array('page' => $i)))?>"><?php echo $i ?></a>
            <?php if($i >= $pagenum + 4) : break; endif ?>
        <?php endfor ?>
        <?php
            // Same as above but instead, checks if we're on the last page and generate next link.
            if($pagenum != $lastPage) : $next = $pagenum + 1; ?>
            <a href="<?php eh(url('',array('page' => $next)))?>">Next</a>
        <?php endif ?>
    <?php endif ?>
</div>
<a class="btn btn-primary" href="<?php eh(url('thread/create')) ?>">Create</a>
<?php if(isset($_SESSION['username'])) : ?>
    <a class="btn btn-primary" href="<?php eh(url('user/logout')) ?>">Logout</a>
<?php endif ?>
