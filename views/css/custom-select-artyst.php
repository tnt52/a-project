<?header("Content-Type: text/css");require("../../helpers/dimensions_helper.php");require("../../helpers/couleurs_helper.php");require("../../config/base.php");?>
/********** AQUA STYLE ********/
.selectbox-input {
                                 border: 0;
                                 background: transparent;
                                 padding: 0;
                                 margin: 0;
                }
ul.aqua {
    width: <?=wLimitQ?>px;
    list-style: none;
    margin: 0;
    padding: 0;
    background-color:#FFFFFF;
    border: none; /*1px solid #444;*/
    position: absolute;
    z-index: 9999;
    cursor: default;
    display: none;
}

ul.aqua li {
width: <?=wLimitQ?>px;
    -moz-user-select: none;
    padding: 3px 0 3px 5px;
    _padding: 0 0 0 5px; /* IE ... */
    color: #444;
    font-size: <?=hLmini?>px;
    background: #FFF;
    text-decoration: none;
    cursor: default;
    z-index: 9999;
}

ul.aqua li.selected {
    color:#FF0000;
    font-weight:bold;
    /*background: lightsteelblue;*/
}

a.aqua {
    display: block;
    width: <?=wLimitQ?>px;
    height: <?=hLimitQ?>px;
    background: url(<?=baseurl?>system/application/images/selects/aqua.gif) no-repeat left 0;
    font-size: <?=hLmini?>px;
    text-decoration: none;
    cursor: default;
    color: #444;
}

a.aqua div {
    background: url(<?=baseurl?>system/application/images/selects/aqua.gif) no-repeat right 0;
    padding: 2px 0 4px 0;
    height: 13px;
    _height: <?=hLimitQ?>px;  /* IE ... */
    overflow: hidden;
    margin-left: 7px;
    -moz-user-select: none;
}

a.aqua div * { font: 11px Arial; color: #444; }

a.aqua:hover,
a.aqua:focus,
a.aqua:active {
    background: url(<?=baseurl?>system/application/images/selects/aqua.gif) no-repeat left -<?=hLimitQ?>px;
}

a.aqua:hover div,
a.aqua:focus div,
a.aqua:active div {
    background: url(<?=baseurl?>system/application/images/selects/aqua.gif) no-repeat right -<?=hLimitQ?>px;
}