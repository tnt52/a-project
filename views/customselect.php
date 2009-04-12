<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Custom Select Fields</title>
<?=$Header?>
<script type="text/javascript">
  window.addEvent('domready', function() {
    var mySelect = new CustomSelect('selectContainer');
  });
</script>
<style type="text/css">
<!--
body {
  margin: 40px;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 9pt;
  color: #454545;
}

div.selectField {
  position: relative;
  background-color: #efefef;
  width: 200px;
  margin: 0px;
  padding: 0px;
  background-image: url(<?=baseurl?>system/application/images/selects/customselectfields/dropdown-back.gif);
  background-repeat: no-repeat;
  background-position: 0% 0%;
  cursor: default;
}
div.selectField div.status {
  padding: 2px;
  height: 20px;
  display: block;
  background-image: url(<?=baseurl?>system/application/images/selects/customselectfields/dropdown-btn-sprite.gif);
  background-repeat: no-repeat;
  background-position: 100% 0%;
  cursor: default;
}
div.selectField:hover div.status {
  background-position: 100% 100%;
}
div.selectField div.status div.selected {
  padding: 3px 5px;
  font-size: 8.5pt;
  color: #666666;
  display: block;
  overflow: hidden;
  cursor: text;
  margin-right: 24px;
  height: 14px;
}
div.optContainer {
  display: none;
  position: absolute;
  padding: 5px;
  background-color: #ffffff;
  border: solid 1px #dddddd;
  width: 240px;
  height: 200px;
  overflow: auto;
  left: 0px;
  top: 24px;
}
div.optGroup div.optLabel {
  font-weight: bold;
}
div.opt {
  font-size: 8.5pt;
  cursor: default;
  padding: 2px 2px 2px 2px;
  color: #666666;
}
div.optGroup div.opt {
  cursor: default;
  padding: 2px 2px 2px 15px;
}
div.optContainer div.selected {
  background: #697fb9;
  color: #ffffff;
}
div.optContainer div.disabled {
  color: #dddddd;
}
div.optContainer div.over {
  background: #f2f2f2;
  color: #666666;
}
-->
</style>
</head>
<body>

<h1>Custom Select Fields</h1>


<form action="" method="get" name="form1">
<div id="selectContainer">
  <select name="select">
    <optgroup label="Test Group 1">
      <option value="opt1">Option 1</option>
      <option value="opt2">Option 2</option>
      <option value="opt3">Option 3</option>

      <option value="opt4" selected="selected">Option 4</option>
      <option value="opt5">Option 5</option>
    </optgroup>
    <option value="opt6">Option 6</option>
    <option value="opt7">Option 7</option>
    <optgroup label="Test Group 2">
      <option value="opt8">Option 8 trying it out with a very very very long text feild</option>

      <option value="opt9">Option 9</option>
      <option value="opt10">Option 10</option>
      <option value="opt11" disabled="disabled">Option 11 Disabled</option>
      <option value="opt12">Option 12</option>
    </optgroup>
    <option value="opt13">Option 13</option>

    <option value="opt14">Option 14</option>
    <option value="opt15">Option 15</option>
  </select>
</div>
&nbsp;<br />

<input type="submit" name="Submit" id="button" value="Submit" />
</form>




</body>
</html>

<!--
<div class="selectFeild">
  <div class="status">
    <div class="selected">Option 4</div>
  </div>
  <div class="optContainer">
    <div class="optGroup">
      <div class="optLabel">Test Group 1</div>
      <div class="optList">
        <div class="opt">Option 1</div>
        <div class="opt">Option 2</div>
        <div class="opt">Option 3</div>
        <div class="opt selected">Option 4</div>
        <div class="opt">Option 5</div>
      </div>
    </div>
    <div class="opt">Option 6</div>
    <div class="opt">Option 7</div>
    <div class="optGroup">
      <div class="optLabel">Test Group 2</div>
      <div class="optList">
        <div class="opt">Option 8 trying it out with a very very very long text feild</div>
        <div class="opt">Option 9</div>
        <div class="opt">Option 10</div>
        <div class="opt disabled">Option 11 Disabled</div>
        <div class="opt">Option 12</div>
      </div>
    </div>
    <div class="opt">Option 13</div>
    <div class="opt">Option 14</div>
    <div class="opt">Option 15</div>
  </div>
</div>
-->