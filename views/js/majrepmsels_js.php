<SCRIPT>
<?//header("Content-Type: text/javascript");
if ($sel=="true"):
foreach ($reps->result_array() as $row): ?>
$('<?=$row['cle']."repMsel"?>').set('html','<?=$row['reponse']?>');
<? endforeach;?>
$$('.repMselCol').each(function(p){
  new Fx.Morph(p,{
                   duration: 200,
                   transition: Fx.Transitions.Bounce.easeOut
       }).start({
                   'opacity':[0,1]
       });
/*  p.effect('opacity').start(0,1);*/
});
<? echo "</SCRIPT>"; exit();endif;?>
$$('.repMselCol').each(function(p){
  new Fx.Morph(p,{
                   duration: 200,
                   transition: Fx.Transitions.Bounce.easeOut
       }).start({
                   'opacity':[1,0]
       });
/*  p.effect('opacity').start(1,0);*/
});
</SCRIPT>