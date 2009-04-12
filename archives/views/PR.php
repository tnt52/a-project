<SCRIPT language="JavaScript" type="text/JavaScript">
function clicRep(form){
 void(form.send());
}
window.addEvent('domready', function() {
     new mooForms('repMA<?=$keyQ?>', {
                          imageDir: '<?=base_url()?>system/application/images/',
                          radioImage: {image: 'radio.png', width: 24, height: 24},
                          inputs: ['radio']
                          });
     $('repMA<?=$keyQ?>').getElements('span').each(function(el){
          el.addEvent( 'click',function (){clicRep($('repMA<?=$keyQ?>'))} );
     });
  });
</SCRIPT>
<STYLE>
form.rep {
   margin: 0 0 0 0;
   padding: 0 0 0 0;
}
</STYLE>
<form id="repMA<?=$keyQ?>" CLASS="rep" action="<?=base_url()?>index.php/answer" method="POST">
<input type="hidden" name="keyquestion" value="<?=$keyQ?>"/>
<input type="hidden" name="keymembreq" value="<?=$keyMq?>"/>
<input type="hidden" name="TR" value="<?=TRgou?>"/>
<input type="hidden" name="TQ" value="<?=TOson?>"/>
<input type="hidden" name="TMA" value="<?=TMmem?>"/>
<input type="hidden" name="importance" value="1"/>
<input type="hidden" name="theme" value="1"/>
<input type="hidden" name="tribu" value="1"/>
<span ><input type="radio"  name="rep<?=$keyQ?>" class="gout" value="-3" <?if ($rep==-3) echo 'checked="checked"';?> /><label  for="#"></label></span>
<span ><input type="radio"  name="rep<?=$keyQ?>" class="gout" value="-1" <?if ($rep==-1) echo 'checked="checked"';?>/><label  for="#"></label></span>
<span ><input type="radio"  name="rep<?=$keyQ?>" class="gout" value="0" <?if ($rep==0) echo 'checked="checked"';?>/><label  for="#"></label></span>
<span ><input type="radio"  name="rep<?=$keyQ?>" class="gout" value="1" <?if ($rep==1) echo 'checked="checked"';?>/><label  for="#"></label></span>
<span ><input type="radio"  name="rep<?=$keyQ?>" class="gout" value="3" <?if ($rep==3) echo 'checked="checked"';?>/><label for="#"></label></span>
</form>

