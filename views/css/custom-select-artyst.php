<?header("Content-Type: text/css");require("../../helpers/dimensions_helper.php");require("../../helpers/couleurs_helper.php");require("../../config/base.php");?>
/********** TRIANGLES STYLE ********/
.selectbox-input {
                                 border: 0;
                                 background: transparent;
                                 padding: 0;
                                 margin: 0;
                }
ul.lines {
    //width: <?=wLimitQ?>px;
    list-style: none;
    margin: 0;
    padding: 0;
    background-color:#CCCCCC;
    border: none; /*1px solid #444;*/
    position: absolute;
    z-index: 9999;
    cursor: default;
    display: none;
}

ul.lines li {
//width: <?=wLimitQ?>px;
    -moz-user-select: none;
    padding: 3px 0 3px 8px;
    _padding: 0 0 0 8px; /* IE ... */
    color: #444;
    font-size: <?=hL?>px;
    //background: #FFF;
    text-decoration: none;
    cursor: default;
    z-index: 9999;
}

ul.lines li.selected {
    color:#FF0000;
    /*font-weight:bold;
    background: lightsteelblue;*/
}

a.lines {
    display: block;
    //width: <?=wLimitQ?>px;
    height: <?=hLimitQ?>px;
    background: url(<?=baseurl?>system/application/images/selects/lines.gif) no-repeat left 0;
    font-size: <?=hL?>px;
    text-decoration: none;
    cursor: default;
    color: #444;
}

a.lines div {
    background: url(<?=baseurl?>system/application/images/selects/lines.gif) no-repeat right 0;
    padding: 2px 0 4px 0;
    height: 13px;
    _height: <?=hLimitQ?>px;  /* IE ... */
    overflow: hidden;
    margin-left: 7px;
    -moz-user-select: none;
}

a.lines div * { font: 11px Arial; color: #444; }

a.lines:hover,
a.lines:focus,
a.lines:active {
    background: url(<?=baseurl?>system/application/images/selects/lines.gif) no-repeat left -<?=hLimitQ?>px;
}

a.lines:hover div,
a.lines:focus div,
a.lines:active div {
    background: url(<?=baseurl?>system/application/images/selects/lines.gif) no-repeat right -<?=hLimitQ?>px;
}