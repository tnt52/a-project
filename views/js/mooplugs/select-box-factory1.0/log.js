var log = {
	start : function(){
		this.lastclock = 0;
		this.currentclock = new Date();
		this.xDate = new Date();
		this.logWrapper = "uiLog";
		this.clockID;
		this.startLogClock();
		this.positionLog();
		this.started = true;
	},
	out : function(m){
		window.setTimeout(function(){log._out(m)},1);
	},
	_out : function(m){
		if(this.started){
		$("uilogcontents").innerHTML += this.updateLogClock() + m + " <b>(" +  (this.currentclock - this.xDate) + ")</b> ms" + "<br>";
		this.xDate = new Date();
		}
	},
	clearUiLog : function(){
		$("uilogcontents").innerHTML = "";
	},
	showUiLog : function(){
		$(this.logWrapper).style.display = "block";
		$("uilogcontents").style.display = "block";	
	},	
	hideUiLog : function(){
		$(this.logWrapper).style.display = "none";
		$("uilogcontents").style.display = "none";
	},
	positionLog : function(){
		try{
		var widthLeft = ((parseInt(document.body.clientWidth,10) / 2) - (($(this.logWrapper).offsetWidth)/ 2)) + "px";		
		$(this.logWrapper).style.bottom = "5px";
		$(this.logWrapper).style.left = widthLeft;
		$(this.logWrapper).style.display = "block";
		}catch(e){};
	},	
	startLogClock : function(){
		this.clockID = window.setTimeout(function(){log.updateLogClock()}, 500);
		this.positionLog();
	},
	/*
	stopLogClock : function(){
		if(this.clockID){
			clearTimeout(this.clockID);
			this.clockID  = 0;
		}
	},
	*/
	updateLogClock : function(){	
		try{
			if(this.clockID){
				clearTimeout(this.clockID);
				this.clockID  = 0;
			}		
			var tDate = new Date();
			this.clockID =  window.setTimeout(function(){log.updateLogClock()},1000);
			this.currentclock = tDate;
			return "[" + this._formatDate(tDate,"dd-MM-yy hh:mm:ss:iii") + "] \>\> ";	
		}catch(e){}
	},	
	_addZero : function(vNumber,millis){
		if(millis == undefined) millis = "";
		if(millis=="true"){
			return ((vNumber < 100) ? 0 : "") + vNumber;
		}else{
			return ((vNumber < 10) ? 0 : "") + vNumber;
		}
	},	
	_formatDate : function(vDate, vFormat){ 
		var vDay = this._addZero(vDate.getDate());
		var vMonth = this._addZero(vDate.getMonth()+1);
		var vYearLong = this._addZero(vDate.getFullYear());
		var vYearShort = this._addZero(vDate.getFullYear().toString().substring(3,4));
		var vYear  = (vFormat.indexOf("yyyy")>-1?vYearLong:vYearShort); 
		var vHour = this._addZero(vDate.getHours());
		var vMinute	= this._addZero(vDate.getMinutes());
		var vSecond	= this._addZero(vDate.getSeconds());
		var vMillis	= this._addZero(vDate.getMilliseconds(),'true');
		var vDateString	 = vFormat.replace(/dd/g, vDay).replace(/MM/g, vMonth).replace(/y{1,4}/g, vYear);
		vDateString	= vDateString.replace(/hh/g, vHour).replace(/mm/g, vMinute).replace(/ss/g, vSecond).replace(/iii/g, vMillis);
		return vDateString;
	}		
}

