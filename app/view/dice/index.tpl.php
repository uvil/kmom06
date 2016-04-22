<h1>Rulla en tärning</h1>

<p>Detta är ett testexempel på en applikation till ett tärningskastningsspel.</p>

<p>Hur många gånger vill du rulla tärningen, <a href='<?=$this->url->create("dice?roll=1")?>'>1 kast</a>, <a href='<?=$this->url->create("dice?roll=3")?>'>3 kast</a> eller <a href='<?=$this->url->create("dice?roll=6")?>'>6 kast</a>? </p>

<?php if(isset($roll)) : ?>
<p>Du gjorde <?=$roll?> kast och fick följande serie.</p>


<ul class='dice'>
<?php foreach($results as $val) : ?>
<li class='dice-<?=$val?>'><?=$val?></li>
<?php endforeach; ?>
</ul>

<p>Du fick totalt <?=$total?> poäng.</p>
<?php endif; ?>
