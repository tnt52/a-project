<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Sans Titre</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="HAPedit 3.1">
<?=$Header?>
<SCRIPT>
var cfeHead = new cfe.base();
//cfeHead.setModuleOptions('select',{scrolling:true, scrollSteps: 5});
window.addEvent('domready', function(){
    cfeHead.init({spacer: "http://127.0.0.1/system/application/images/spacer.gif", toolTips: true, toolTipsStyle: "normal"});
});
</SCRIPT>
</head>
<body bgcolor="#FFFFFF">
<fieldset class="txt1" id="i1"><legend class="tog"><strong>Textinput&amp;-area</strong>(input[text,password],textarea)- w/ slidingDoors</legend>

<ul>
  <li><label for="input1">This toggles a text field</label>
    <input id="input1" class="mediumInput" type="text" value="" name="input1" />
    </li>
    
  <li><label for="input2">This toggles a second text field</label>
    <input id="input2" type="text" value="" name="input2" />
    </li>
    
  <li><label for="input3">This toggles a smaller third text field</label>

    <input id="input3" class="shortInput" title="Put your initials here" type="text" value="" name="input3" />
    </li>
    
  <li><label for="password">Secret password field</label>
    <input id="password" title="SlidingDoors was disabled for password fields by calling cfe.setModuleOptions(cfePassword,{slidingDoors:false});" type="password" value="" name="password" />
    </li>

  <li><label for="textarea1">And this one a text area</label>
    <textarea name="textarea1" id="textarea1" rows="4" cols="5"></textarea>

    </li>
</ul>
</fieldset>
<DIV class="CatTitle oeuvres" ALIGN=CENTER>Oeuvres</DIV>
<Span id="SearchCat" STYLE="position:relative;left:0px;top:16px;">
<form method="post" action="#" onsubmit="searchCat(this,event)">
  <input type="text" name="searchtextcat" id="searchtextcat" size="15" /><label for="searchtextcat"></label>
  <input type="submit" class="GO" value="GO" />
  parmi&nbsp;
  <input type="checkbox" name="inTC1" id="inTC1" value="oeuvres.titre" checked /> les <label for="inTC1">Oeuvres</label>
  <input type="checkbox" name="inTC2" id="inTC2" value="artistes.nom" checked />  les <label for="inTC2">Artistes</label>
  <!--<table border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td rowspan="2">
          <input type="text" name="searchtextcat" id="searchtextcat" />
          <label for="searchtextcat"></label>
          <input type="submit" class="GO" value="GO" />dans
      </td>
      <td><input type="checkbox" name="inTC1" id="inTC1" value="oeuvres.titre" checked />
          les
          <label for="inTC1">Oeuvres</label>
      </td>
    </tr>
    <tr>
      <td>
          <input type="checkbox" name="inTC2" id="inTC2" value="artistes.nom" checked />
          les
          <label for="inTC2">Artistes</label>
      </td>
    </tr>
  </table>-->
</form>
</Span>
<Span id="PagesCat"></Span>
<DIV >
          <label for="limitQO">Affichage:</label>
          <select id="limitQO" name="limitQO" size="1" style="width:30px">
          <option>20</option>
          <option>50</option>
          <option>100</option>
          </select>
          par page
</DIV>
</body>
</html>