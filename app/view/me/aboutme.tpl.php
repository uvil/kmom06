<article class="article1">
 
    <div class="img">  
        <img src="img/me/<?=$img?>" alt="en bild på Urban">
    </div>
    
    <div class="txt">
      <?=$content?>
    </div>
    
    <?php if(isset($byline)) : ?>  
      <footer class="byline">
        <?=$byline?>
      </footer>  
    <?php endif; ?>
 
</article>
