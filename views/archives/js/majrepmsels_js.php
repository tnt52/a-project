<?header("Content-Type: text/javascript");
if ($sel=="true"):
foreach ($reps->result_array() as $row): ?>
$('<?=$row['cle']."repMsel"?>').setHTML(<?=$row['reponse']?>);
<? endforeach;?>
$$('.repMselCol').each(function(p){
  p.effects({
                   duration: 200,
                   transition: Fx.Transitions.Bounce.easeOut
       }).start({
                   'opacity':[0,1]
       });
/*  p.effect('opacity').start(0,1);*/
});
<?exit();endif;?>
//$$('.repMselCol').setStyle("width",0);
$$('.repMselCol').each(function(p){
  p.effects({
                   duration: 200,
                   transition: Fx.Transitions.Bounce.easeOut
       }).start({
                   'opacity':[1,0]
       });
/*  p.effect('opacity').start(1,0);*/
});