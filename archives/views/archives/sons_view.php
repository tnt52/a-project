<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=windows-1252">
	<TITLE></TITLE>
	<META NAME="GENERATOR" CONTENT="OpenOffice.org 2.3  (Win32)">
	<META NAME="CREATED" CONTENT="20080224;14213591">
	<META NAME="CHANGED" CONTENT="20080224;14580857">
</HEAD>
<BODY LANG="fr-FR" DIR="LTR">
<TABLE WIDTH=100% BORDER=1 CELLPADDING=4 CELLSPACING=3 STYLE="page-break-before: always; page-break-inside: avoid">
	<COL WIDTH=43*>
	<COL WIDTH=43*>
	<COL WIDTH=43*>
	<COL WIDTH=43*>
	<COL WIDTH=43*>
	<COL WIDTH=43*>
	<TR VALIGN=TOP>
		<TD WIDTH=17%>
			<P>Plus</P>
		</TD>
		<TD WIDTH=17%>
			<P>Titre</P>
		</TD>
		<TD WIDTH=17%>
			<P>Artiste</P>
		</TD>
		<TD WIDTH=17%>
			<P>Les avis de 
			</P>
		</TD>
		<TD WIDTH=17%>
			<P>Ton avis</P>
		</TD>
		<TD WIDTH=17%>
			<P>Play</P>
		</TD>
	</TR>
	<?php foreach ($titres as $key => $value): ?>
	<TR VALIGN=TOP>
		<TD WIDTH=17%>
			<P>Plus</P>
		</TD>
		<TD WIDTH=17%>
			<P><?=$value?></P>
		</TD>
		<TD WIDTH=17%>
			<P><?=$artistes[$key]?></P>
		</TD>
		<TD WIDTH=17%>
			<P><?=$avisgene[$key]?>
			</P>
		</TD>
		<TD WIDTH=17%>
			<P><?=$tonavis[$key]?></P>
		</TD>
		<TD WIDTH=17%>
			<P>Play</P>
		</TD>
	</TR>
	<? endforeach?>
</TABLE>
<P><BR><BR>
</P>
</BODY>
</HTML>
