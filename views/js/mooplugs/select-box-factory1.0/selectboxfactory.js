/*
Select Box Logic 1.0 by Ari N. Karp, September 2008
using mooTools v.1.11, easily convertable to v1.2

Blog: theuiguy.blogspot.com

There is a ui log in here that is not supplied. If you'd like the logger I 
created, please ask.

You are free to use at will, just at least visit my blog and tell me
1. if you are using it and how (for curiosity sake)
2. some feedback on how you changed, enhanced, or minimized it. 

I believe in sharing code to the community, so if you feel the same, then
please share your changes with me to help make the UI a better place.

For help on this, please visit theuiguy.blogspot.com and I will get back asap.
*/

/*****************************************************/
/* UI FACTORY CLASS (THE FIRST CUT)  SEE DEFS BELOW
/*****************************************************/
var selectBoxFactory = new Class({		
	
	options: {
		id : "",
		type : "default",
		coords : null,
		definition : null
	},

	initialize: function(options){	
		this.setOptions(options);
		this.type = this.options.type; // for a module with multiple types, use a comma
		this.coords = this.options.coords; // a json object of position requirements.
		this.id = this.options.id;
		this.definition = this.options.definition;
		this.classSets = this.options.classSets;
		this.result = null; // set by selectBoxFactory that returns, like dialogs	
		this.defaultErrorMessage = "A note of failure from selectBoxFactory:\n\n";
		if(!this.type || !this.definition) return;
		$each(this.type.split(","), function(type, index){		
 			try{
				return this._initSelectBox(type);	
			}catch(e){
				this._alertProblem(e.description);
			}finally{			
				return false;
			}			
		},this)
	},
	
	_initSelectBox : function(type){		
		this._setupSelectBox(type);
		if(this.choices) this._setupChoices();
		if(this.useInfo) this._setupInfo();			
		if(this.useToggle || this.sift) this._setupToggle();			
		if(this.heading) this._setupHeading();		
		if(!this.choices) this._setupSelectBoxStack();				
		if(this.useStates && this.dropdownStack.childNodes.length > 0) this._setupStateButtons(this.uiChoices);			
		if(this.sift && this.type !== "dropdown") this._setupSiftTool();
		this._displaySelectBox();
		this._setupToggleEvents();
		this._setupSelectBoxEvents();		
		this._beginSelectBoxRoutine();
	},
	
	_beginSelectBoxRoutine : function(){ // the very last thing to happen.
		this.dropdown.fireEvent('checkAble');					
		if(this.toggleStyle === "closed"){	// dropdowns will enable based on this finishing.		
			this.uiSelectBoxRep.toggle();
			this.dropdown.style.display = "none";
			this.dropdownStack.style.display = "none";
			if(this.useInfo) this.infoBar.style.display = "none";
			this.uiToggle.fireEvent("click");
		}
	},
	
	_createChoice : function(choice,index){	
		var c = new Element("div",{ // for more than 50 choices, dont use mootools createElement in v1.11, use createElement
			count : index,
			id : choice[0],
			title : choice[1],				
			displayName : choice[2],
			isSelected : choice[3],
			state : choice[4]
		}).setHTML(choice[2]);		
		return c;
	},
	
	_setupChoices : function(){		// should use addchoice.
		$each(this.choices, function(choice, index){ 
			if($(choice[0])) return;
			this._insertChoice(this._createChoice(choice,index));	
		},this);
		// now emulate setting up the stack;
		$each(this.uiChoices, function(choice, index){ 
			if($(choice[0])) return;
			this._setupChoice(choice,this);
			if(this.useStates) this._setupStateButtons([choice]);
		},this);
		// to test add and remove, turn this on:
		// this._addChoice(['Aardvark4','Aardvark4','Aardvark4',false])
		// this._removeChoice('Aardvark4');	
	},
	
	_insertChoice : function(choice){		
		if(this.defaultSort === "ascending"){
			choice.inject(this.dropdownStack);
		}else{
			if(this.dropdownStack.childNodes.length > 0){
				choice.injectBefore(this.dropdownStack.childNodes[0]);
			}else{
				choice.injectTop(this.dropdownStack);
			}			
		}	
		this.uiChoices.push(choice);
	},
	
	_addChoice : function(choice){ // must be an array
		var index = this.dropdownStack.childNodes.length + 1;	
		if(!$(choice[0])){
			this._insertChoice(this._createChoice(choice,index));				
			this._setupChoices();
			if(this.useStates) this._setupStateButtons([$(choice[0])]);
			this._displaySelectBox();
		}
	},

	_removeChoice : function(choice){
		if($(choice)){
			this.uiChoices.remove($(choice))
			this.dropdownStack.removeChild($(choice));
			this._displaySelectBox();
		}
	},
	
	_setupSelectBox : function(type){ // the very first thing to happen.
		/*
		_setup:
			You set up a dropdown by creating a JSON object anywhere. See the html example.
			You have to have a set of HTML divs already built into the page. (I may allow a dynamic creator at some point)
			You don't need to assign this object to a variable in order for this to work, but it helps for later reference.		
		Defaults:
		*/
		this.postponeMouseover = false;	
		this.availableHeightForSelectBox = 0;
		this.showScrollbars = false;
		this.headingHeight = 0;
		this.hBuffer = 0;		
		this.vAlign = "50%";
		this.vAlignImage = (window.ie || window.gecko) ? "20%" : "50%";
		this.selectedNodes = [];
		this.nameArray = [];		
		
		/*
		this.siftTitle 
			the sift title shows when the user mouses over the box. In this version, all the user has to do is begin
			typing. However, you may want to enable a search button. If you do use a search button then you
			will have no room for heatmap filter buttons unless you make the dropdown
			very wide, so be careful what you choose to show.
		*/
		this.siftTitle = "Begin typing to sift results. Use AND (+) 'plus', or OR (|) 'pipe' to extend search. Use (!) 'not' to flip the search."
		
		/*
		this.choices:
			allows you to programmatically decide up front what the choices will be. Your definition must
			be fully defined in this case (since there is no dom container)		
			these MUST be unique! 
			It is an array like so: [id, display, title, selected, state]
			0 : ['Aardvark','Aardvark','Aardvark',false,0],
			1 : ['Aardvark1','Aardvark1','Aardvark1',false,1],
			2 : ['Aardvark2','Aardvark2','Aardvark2',false,2],
			
		this.sort
			how to sort the choices.
				
		*/		
		this.choices = this.definition.choices;
		this.defaultSort = this.definition.defaultSort || false;
		
		/*
		this.states:
			a JSON object, when present, allows the ui to generate state by changing the
			classes (bg color). The way it works is based on states of 1-5, and can 
			be represented any way we want, as long as there is a corresponding class to 1-5
			.uiSelectBoxChoice.uiSelectBoxChoice1...2...3... so forth.
					
		*/		
		this.useStates = this.definition.useStates || false;		
		if(this.useStates){
			this.states = [];
			this.stateButtons = [];
			this.stateColors = this.definition.stateColors; //as many as there are states you want to show.
			this.selectedItemBGColor = this.definition.selectedItemBGColor || "#364F80";
			this.showStateButtons = this.definition.showStateButtons || false;
		}
		/*
		this.classSet:
			4 styles that make the dropdown look nice. Define this in your css. 
			if you don't want a toggle, specify a class anyway. You will be happy you did.
			Defaults are uiSelectBox,uiSelectBoxToggle,uiSelectBoxChoice,uiSelectBoxStack.
			
		this.type:
			the type of dropdown.
		*/
		this.classSet = this.definition.classSets.selectClassSet.split(",") || $(this.id).getAttribute("classSetSelect");
		this.type = type;
		
		/*
		this.container:
			Does the dropdown need to fill a particular container or should it exist by itself on the screen?
			If it needs a container, be sure to add container to the definition.
		
		this.dropdown:
			I am a reference to a container or I am a reference to a standalone object.
			We force this to show as block level element.

		this.dropdownStack:
			dropdownStack we use as the "viewport" for scrolling.
		*/
		this.container = (this.definition.useSelf) ? $(this.id) : $(this.definition.container);
		this.container["originalHeight"] = this.container.clientHeight; // helps ie figure out height.
		this.dropdown = (this.definition.useSelf) ? $(this.id) : $$('#' + this.container.id + ' div.' + this.classSet[0])[0];
		this.dropdown.style.display = "block"; 
		this.dropdownStack = this.dropdown.firstChild; 
				
		/*
		this.heading :
			Does this dropdown fit into a container that has some kind of heading?
			If it does, then be sure to let the code add the dimensions of the heading to the logic of how tall that dropdown should be.
			If you are using the dropdown by itself (not in a container) then this is null.		
		*/
		this.heading = (this.definition.useSelf) ? null : this.container.moduleHeading;

		/*
		this.defaultToggleColor :
			If specified, it is what the toggle background color will be if the dropdown class is not used.
			Meaning, if you ask for sift, then the arrow graphic is not necessary.
			
		*/		
		this.defaultToggleColor = this.definition.defaultToggleColor || "#DBE2F0";
		
		/*
		this.maxChoices:
			Comes from definition or the object in the DOM.
			This is how many choices we should show before creating a scrollbar. Also used in calcs.			
		*/
		this.maxChoices = this.definition.maxSize || this.dropdown.getAttribute("maxSize");		
		//this.maxChoices = (this.maxChoices === 0) ? 1 : this.maxChoices; // what happens when max is 0, then its a dropdown.	
	
		/*
		this.useInfo:
			A count of items selected.
		*/		
		this.useInfo = (this.definition.useInfo || this.dropdown.getAttribute("info") === "true") ? true : false; // force it to be boolean
		
		/*
		this.toggleStyle:
			Normally, the type of dropdown tells us how to show the toggle.
			This is here to allow the user the options of showing a toggle open or closed by default if not a dropdown.
			Values are open, closed, none
			
		this.useToggle:
			Internal code to help with calcs, etc.
		
		this.toggleLabel
			What to show in the toggle by default, if nothing has been chosen programmatically.
		
		this.toggleLabelChosen
			What to show in the toggle when something is selected.
		*/				
		this.toggleStyle = this.definition.toggleStyle || this.dropdown.getAttribute("toggleStyle"); 
		this.toggleLabel = this.definition.toggleLabel || this.dropdown.getProperty("toggleLabel") ||  "Select One: ";		
		this.toggleLabelChosen = this.definition.introMessage || "<b>Item chosen: </b> ";
		this.useToggle = ((this.toggleStyle !== undefined && this.toggleStyle !== "none" && this.toggleStyle !== null) || type==="dropdown") ? true : false;

		/*
		this.useEraser:
			Puts a little eraser icon that the use can click to clear a selection.
			If you don't use this, a clear image is used to help maintain dropdown size.
		*/
		this.useEraser = (this.definition.useEraser || this.dropdown.getAttribute("useEraser") === "true") ? true : false; // force it to be boolean
		
		/*
		this.sift:
			Adds a neat widget which acts as a data filter.
			Even though any select type can take sift, it really is for "open" select boxes (size > 1)
		*/
		this.sift = (this.definition.useSift || this.dropdown.getAttribute("useSift") === "true") ? true : false; // force it to be boolean
		
		/*
		this.extend:
			offers you more flexibility in case you want to override the width for one dropdown in specific cases.
		*/
		this.extend = this.definition.extend || 0;
		this.uiChoices = [];   
		if(!this.dropdown || !this.container || this.dropdownStack.childNodes.length === 0) return;	 
	},
	
	_setupInfo : function(){
		this.dropdown.knownSelected = 0;
		this.infoBar = new Element("div",{
			id : 'divUpdate' + this.dropdown.id,
		 	'class' : 'selectUpdate'
		}).inject(this.dropdown,'after');
		this.infoBar.setHTML(this.dropdown.knownSelected  + " selected");	
	},
	
	_setupHeading : function(){
		this.headingHeight = (this.heading.style.marginBottom) ? this.heading.style.marginBottom.toInt() : 0; 	
		this.headingHeight += (this.heading.style.paddingTop) ?  this.heading.style.paddingTop.toInt() : 0;  			
	},
			
	_setupToggle : function(){	
		var p = this;
		this.header = new Element("div",{'class':'toggleText'});		
		this.clearIconContainer = new Element("div",{styles:{'display':'inline'}});	
		this.uiToggle = new Element("div",{
			id : 'uiSelectBoxToggle' + this.id,
			'clicked' : 0,
			'class' :  this.classSet[1], 
			'toggleCount' : 0
		});			
		this.uiToggle.inject(this.dropdown,"before");	
		this.cImage = (this.useEraser) ? app.images[1].clone(true) : app.images[0].clone(true);			
		this.cIWidth = (this.useEraser) ? 30 : 6;			
		this.clearIcon  = new Element(this.cImage,{ 
			id: 'clearButton' + this.id, 
			width : this.cIWidth, 
			height : 20, // for ie
			events : {
				'click': function(event){			
					if(p.currentStateButtonInFocus) p.currentStateButtonInFocus.fireEvent("click");
					p.uiChoices.forEach(function(c, index){
						if(c.className ===  p.classSet[2] + ' '+ p.classSet[2]+'Selected'){ 
							if(p.type !== "selectmultiple" || p.type==="dropdown"){
								this.lastunselected = c.others.filter(function(item, i){return item.className === (p.classSet[2])});	/* only one other item could have been selected. grab it */				
								this.lastunselected = this.lastunselected[0];
								//c.cloneEvents(this.lastunselected,'mouseover').cloneEvents(this.lastunselected,'mouseout');
			     			}else{
								//c.cloneEvents(c.cloneMe,'mouseover').cloneEvents(c.cloneMe,'mouseout');
							}
							c.setClass(p.classSet[2] + ' '+p.classSet[2]); 
							if(p.useStates) c.style.backgroundColor = p.stateColors[c.getAttribute("state").toInt()];
							c.selected = false;
							c.setProperty("isSelected","false");						
							p.dropdown.knownSelected = 0;
						}			
						if(p.useInfo) p.infoBar.setHTML(p.dropdown.knownSelected + " selected");
						if(p.dropdownStack.firstChild.tagName === "IMG") p.uiToggle.childNodes[1].style.verticalAlign = p.vAlign;
						if(p.type === "dropdown") p.uiToggle.childNodes[1].setHTML(p.toggleLabel);
						if(event) event.cancelBubble = true;
					});	
				}											
			}
		});
		this.clearIconContainer.inject(this.uiToggle);	
		this.header.inject(this.uiToggle);
		(this.sift) ? new Element("input",{title: this.siftTitle, id:'siftBox'+this.id,type:"text",'class':'siftBox'}).injectTop(this.header) : this.header.setHTML(this.toggleLabel);				
		if(this.sift) this.uiToggle.style.background = this.defaultToggleColor; 
		this.clearIcon.inject(this.clearIconContainer);
		if(this.useStates){
			this.statesHeader = new Element("div",{'class':'statesHeader'});
			this.statesHeader.inject(this.header);
		}
		//alert(this.statesHeader.offsetWidth)
		if(window.ie){ // YAIEH
			this.clearIcon.style.verticalAlign = "0%"; 
			if(this.sift){ this.header.style.verticalAlign = "20%"; }else{ this.header.style.verticalAlign = "40%"; }
		}else{
			this.header.style.verticalAlign = this.vAlign;
		}		
	},
		
	_setupStateButtons : function(obj){		
		var p = this; // in lieu of enclosure.
		obj.forEach(function(o, index){			
			this.states.include(o.getAttribute("state").toInt());
			o.setAttribute("data",o.getAttribute("data") + "|" + o.getAttribute("state"));// for sifting.
		},this);		
		if(this.showStateButtons){
			this.states.forEach(function(state, index){			
				var sElement = new Element("div",{id:'state'+index,'class':'statesHeaderItem unPushedHeaderItem'}).setHTML("&nbsp;&nbsp;&nbsp;").inject(this.statesHeader);					
				this.stateButtons.push(sElement);
				this.statesHeader.style.width = (this.statesHeader.offsetWidth + sElement.offsetWidth) + "px";				
				sElement.style.backgroundColor = this.stateColors[index];				
			},this);				
			this.stateButtons.forEach(function(stateButton, index){			
				stateButton.others = this.stateButtons.filter(function(item, i){return item.id !== stateButton.id});		
				stateButton.addEvent('click', function(e){												
					p.currentStateButtonInFocus = stateButton;
					if(this.selected === false || this.selected === undefined){
						$('siftBox'+p.id).value = index;
						this.setClass("statesHeaderItem pushedHeaderItem");
						this.selected = true;
					}else{
						$('siftBox'+p.id).value = "";							
						this.setClass("statesHeaderItem unPushedHeaderItem");
						this.selected = false;
					}
					$each(this.others, function(other, index){		
						other.setClass("statesHeaderItem unPushedHeaderItem");
					},this);
				p._captureKeys();
				});
			},this);
		}	
	},
	
	_setupToggleEvents : function(){
		var p = this; // binds p to this in lieu of having an enclosure.
		if(this.useToggle){		
			this.timeOut = 8 * this.actualCountOfChoices;
			this.bothTime = 300+ this.timeOut; 
			this.uiSelectBoxRep = new Fx.Slide(this.dropdown.id);
			this.fx = new Fx.Styles(this.uiToggle, {duration: 300, wait:false, transition: Fx.Transitions.Circ.easeInOut});		
			this.dropdownStack.style.overflowX = "hidden";
			if(window.gecko) this.dropdownStack.style.overflowY = "hidden";
			this.uiToggle.addEvent('click', function(e){
				/* 
				Special considerations for FF (gecko) are peppered in.
				The reason is that setting the scrollbar to auto causes the rendering engine
				to "flash" as it passes underneath a positioned div. All these timeouts
				allow the overflow to be set on a timer, so it never shows in FF passing under the div.
				*/
				if(p.maxChoices > 0){	
					if(p.showScrollbars){							
						if(window.gecko){ 	
							window.setTimeout(function(){
								//alert(p.uiToggle.getAttribute("clicked").toInt())
								if(p.uiToggle.getAttribute("clicked").toInt() % 2 === 0){
									if(p.dropdownStack.style.display === "block") p.dropdownStack.style.overflowY = 'auto';
								}
							},p.bothTime);
						}else{
							p.dropdownStack.style.overflowY = 'auto';
						}																																						
					}
				}	
				if(window.gecko){					
					if(p.dropdownStack.style.overflowY === 'auto'){
						if(this.getAttribute("clicked").toInt() % 2 === 0) p.dropdownStack.style.overflowY = "hidden";
					}				
				}
				window.setTimeout(function(){ 
					if(p.toggleStyle === "closed"){
						p.dropdown.style.display = "block";	
						p.dropdownStack.style.display = "block";	
						if(p.useInfo) p.infoBar.style.display = "block";
					}			
					if(p.dropdown.getProperty("isDisabled") === "true") p.dropdown.fireEvent("enable");		
				},(p.bothTime+150));							
				p.uiSelectBoxRep.toggle();		
				if(window.gecko) this.setAttribute("clicked",this.getAttribute("clicked").toInt()+1);
			});	
		}else{
			if(this.showScrollbars){
				this.dropdownStack.style.overflowY = 'auto';
				this.dropdownStack.style.overflowX = 'hidden';				
			}
		}		
	},
	
	_setupSelectBoxStack : function(){				
		$each(this.dropdownStack.childNodes, function(c, index){
			if(c.id !== undefined) this.uiChoices.push(new Element(c,{id:c.id}));
		},this);
	},
	
	_setupSelectBoxEvents : function(){		
		var p = this; // binds p to this in lieu of having an enclosure.
		this.dropdown.setProperty('tabIndex', '-1'); // allows key focus to work in ff;
		this.dropdown.addEvent('keydown', function(e){
			e.cancelBubble = true;
			e = new Event(e);
			var instanceOf = false;
			p.nameArray.forEach(function(c, index){
				$(c).fireEvent("mouseout");
				if(e.key === c.toLowerCase().charAt(0) && instanceOf === false){
					instanceOf = true;
					$(c).fireEvent("graze");					
					this.firstChild.scrollTop = $(c).offsetTop - $(c).offsetHeight;
				}				
			},this);
		});	
		this.dropdown.addEvent('mouseover', function(e){
			this.focus(); // ensures keys fire on correct dropdown.
		});			
		this.dropdown.addEvent('clearSelections', function(event){			
			p.uiChoices.forEach(function(c, index){
				c.setClass(p.classSet[2]);
				c.selected = false;
				c.setProperty("isSelected","false");	
			});	
			this.knownSelected = 0;
			if(p.useInfo) infoBar.setHTML(this.knownSelected + " selected");
			if(p.useToggle && p.uiToggle.childNodes[1].firstChild.tagName !== "IMG") p.uiToggle.childNodes[1].setHTML(p.toggleLabel);			
			this.fireEvent('shutDown');
		});		
		this.dropdown.addEvent('shutDown', function(event){			
			if(p.useToggle) if(this.firstChild.display === "block") p.uiSelectBoxRep.toggle();
		});
		this.dropdown.addEvent('disable', function(e){
			this.setProperty("isDisabled","true");
			this.setClass(p.classSet[0]+'Disabled');
			if(p.useToggle) p.uiToggle.setClass(p.classSet[1]+'Disabled');
			p.uiChoices.forEach(function(c, index){
				c.removeEvents();
				c.selected = false;
				c.setProperty("isSelected","false");
				c.setClass(p.classSet[2] + ' '+p.classSet[2]+'Disabled');
			});
		});	
		this.dropdown.addEvent('enable', function(e){			
			this.setClass(p.classSet[0]);	
			this.setProperty("isDisabled","false");
			if(p.useToggle) p.uiToggle.setClass(p.classSet[1]);			
			if(!p.choices){
				p.uiChoices.forEach(function(c, index){			
					p._setupChoice(c,p);
					if(c.getProperty("isSelected") === "true") c.fireEvent('click',c); 						
				});			
			}
		});	
		this.dropdown.addEvent('checkAble', function(e){ // will disable dropdowns at first.
			if((p.type === "dropdown" && p.toggleStyle==="closed")|| this.getProperty("isDisabled") === "true" || this.getProperty("isDisabled") === null){				
				this.fireEvent('disable');
			}else{
				this.fireEvent('enable');
			}				
		});							
	},

	_setupChoice : function(c,p){		
		c.setClass(p.classSet[2] + ' '+p.classSet[2]); 		
		if(this.useStates) c.style.backgroundColor = p.stateColors[c.getAttribute("state").toInt()];		
		p.nameArray.push(c.id);		
		if(c.getAttribute("data")) c.setAttribute("data", c.getAttribute("data") + "|" + c.id); // forces id to be there.
		c.data = (c.getAttribute("data")) ? $A(c.getAttribute("data").split("|")) : [c.id]; //For more comprehensive searches, you can use... data. $A(c.getAttribute("data").split("||")); 
		c.others = p.uiChoices.filter(function(item, i){return item.id !== c.id});		
		c.addEvent('graze', function(e){
			if(!this.selected && !p.postponeMouseover){ this.setClass(p.classSet[2] + ' '+p.classSet[2]+'Graze');}
		});
		c.addEvent('mouseover', function(e){
			if(!this.selected && !p.postponeMouseover){ this.setClass(p.classSet[2] + ' '+p.classSet[2]+'Active');}
		});
		c.addEvent('mouseout', function(e){
			if(!this.selected) this.setClass(p.classSet[2] + ' '+p.classSet[2]);
			if(this.useStates) this.style.backgroundColor = p.stateColors[this.getAttribute("state").toInt()];
		});
		c.addEvent('click', function(e){
			var ctl = true; // this is always true (programmatic or user) unless user clicks. (this way we can show saved items)
			var sft = false;
			if(e && e.type !== undefined) ctl = e.ctrlKey;
			if(e && e.type !== undefined) sft = e.shiftKey;
			p._setupSelectBoxItemEvents(this,sft,ctl);
		});		
	},
	
	_setupSelectBoxItemEvents : function(node,shift,ctrl){
		//alert(node.id + " // ctrl " + ctrl + " // shift " + shift)	
		this.clearSelection = true;		
		this.dropdown.highlightNode = node;
		if(node.selected && !ctrl){				
			this._resetSelectBoxItem(node);														
		}else{
			if(!(shift) && this.dropdown.sourceNode === undefined){				
				this._setSelectBoxItem(node,false);
			}else{
				if(shift && this.dropdown.sourceNode !== undefined && this.type === "selectmultiple"){ 								
					this._shiftSelectBoxItem(node);
				}else{
					if(ctrl && this.dropdown.sourceNode !== undefined && this.type === "selectmultiple"){
						this._controlSelectBoxItem(node);
					}else{
						if(this.dropdown.sourceNode !== undefined){
							this._setSelectBoxItem(node,true);
						}
					}
				}			
			}
		}
		if(!(ctrl) && !(shift)){
			node.lastselected = node.others.filter(function(item, i){return item.className === (this.classSet[2] + ' '+this.classSet[2]+'Selected')},this);
		}
		if(this.type === "dropdown"){
			this.uiToggle.fireEvent('click');
			this.uiToggle.childNodes[1].empty();
			if(node.firstChild.tagName !== undefined){
				this.uiToggle.childNodes[1].style.verticalAlign = this.vAlignImage; // what does safari need?
				var newC = new Element(node.firstChild.tagName,{src:node.firstChild.src});
				newC.inject(this.uiToggle.childNodes[1]);
			}else{
				var printId = (this.toggleLabelChosen === "") ? "<b><font style='font-size:11px'>"+node.getText()+"</font></b>" : node.getText();								
				this.uiToggle.childNodes[1].style.verticalAlign = this.vAlign;
				this.uiToggle.childNodes[1].setHTML(this.toggleLabelChosen + printId);							
			}
			this.uiToggle.title = node.id;
		}
		if(this.clearSelection) $("focusBox").focus();
		if(node.lastselected && node.lastselected.length > 0 && !ctrl && !shift){
			node.lastselected = node.lastselected[0];
			node.lastselected.setClass(p.classSet[2] + ' '+p.classSet[2]);
			if(this.useStates) node.style.backgroundColor = p.stateColors[node.getAttribute("state").toInt()];	
			//node.lastselected.cloneEvents(node.cloneMe,'mouseover').cloneEvents(node.cloneMe,'mouseout');
			node.lastselected.selected = false;
			node.lastselected.setProperty("isSelected","false");
			if(this.useInfo) $('divUpdate' + this.dropdown.id).setHTML(--this.dropdown.knownSelected + " selected");
		}		
	},
	
	_resetSelectBoxItem : function(node){
		//log.out("<b>Scenario E</b>: Reset")
		this.dropdown.sourceNode = node;
		node.lastselected = [node];		
		node.setProperty("isSelected",node.selected.toString());		
		this.selectedNodes = [];
		this.selectedNodes.push(node);
		if(this.type === "selectmultiple"){
			$each(node.others, function(n, index){				
				if(n.selected){				
					n.selected = false;
					n.setClass(this.classSet[2] + ' '+this.classSet[2]);
					if(this.useStates) n.style.backgroundColor = this.stateColors[n.getAttribute("state").toInt()];	
					n.setProperty("isSelected",n.selected.toString());		
					if(this.useInfo) $('divUpdate' + this.dropdown.id).setHTML(--this.dropdown.knownSelected + " selected");
				 }
			},this);
		}			
	},
	
	_setSelectBoxItem : function(node,isNodeDefined){
	//log.out("<b>Scenario B</b>: User clicked subsequent times, but never use shift or ctrl key.")		
		this.dropdown.sourceNode = node;						
		node.setClass(this.classSet[2] + ' '+this.classSet[2]+'Selected');
		node.style.backgroundColor = this.selectedItemBGColor;
		node.selected = true;
		this.clearSelection = false;
		this.selectedNodes = [];
		node.setProperty("isSelected",node.selected.toString());		
		//node.cloneMe = new Element("div",{}).cloneEvents(node,'mouseover').cloneEvents(node,'mouseout');		
		//node.removeEvents('mouseout').removeEvents('mouseover');
		if(this.useInfo) $('divUpdate' + this.dropdown.id).setHTML(++this.dropdown.knownSelected + " selected");
		if(isNodeDefined){
			$each(node.others, function(n, index){				
				if(n.selected){
					n.selected = false;
					n.setClass(this.classSet[2] + ' '+this.classSet[2]);
					if(this.useStates) n.style.backgroundColor = this.stateColors[n.getAttribute("state").toInt()];	
					n.setProperty("isSelected",n.selected.toString());		
					if(this.useInfo) $('divUpdate' + this.dropdown.id).setHTML(--this.dropdown.knownSelected + " selected");
				 }
			},this);		
		}else{
			this.selectedNodes.push(node);
		}
	},

	_shiftSelectBoxItem : function(node){
		//log.out("<b>Scenario B</b>: User is shift clicking")
		if(this.useInfo) this.dropdown.knownSelected = 0;
		this.selectedNodes = [];
		this._rangeSelections(); 		
		$each(this.selectedNodes, function(node, index){		
			node.selected = true;
			node.setProperty("isSelected",node.selected.toString());
			node.setClass(this.classSet[2] + ' '+this.classSet[2]+'Selected');
			node.style.backgroundColor = this.selectedItemBGColor;
			//node.cloneMe = new Element("div",{}).cloneEvents(node,'mouseover').cloneEvents(node,'mouseout');
			//node.removeEvents('mouseout').removeEvents('mouseover');
			if(this.useInfo) $('divUpdate' + this.dropdown.id).setHTML(++this.dropdown.knownSelected + " selected");
		},this);		
	},
	
	_controlSelectBoxItem : function(node){
		if(node.selected){
			//log.out("<b>Scenario C.1</b>: User clicked and used CTRl, but item was selected. So unselecting it.")
			node.selected = false;
			node.setClass(this.classSet[2] + ' '+this.classSet[2]);
			if(this.useStates) node.style.backgroundColor = this.stateColors[node.getAttribute("state").toInt()];	
			node.setProperty("isSelected",node.selected.toString());		
			this.selectedNodes.remove(node);
			if(this.useInfo) $('divUpdate' + this.dropdown.id).setHTML(--this.dropdown.knownSelected + " selected");
		}else{
			//log.out("<b>Scenario C.2</b>: User clicked and used CTRl, but item was unselected. So selecting it.")
			node.selected = true;
			node.setProperty("isSelected",node.selected.toString());
			this.selectedNodes.push(node);
			node.setClass(this.classSet[2] + ' '+this.classSet[2]+'Selected');
			node.style.backgroundColor = this.selectedItemBGColor;
			//node.cloneMe = new Element("div",{}).cloneEvents(node,'mouseover').cloneEvents(node,'mouseout');
			//node.removeEvents('mouseout').removeEvents('mouseover');
			if(this.useInfo) $('divUpdate' + this.dropdown.id).setHTML(++this.dropdown.knownSelected + " selected");
		}	
	},
			
	_rangeSelections : function(){
		var x = 0;
		var directionLeft;
		var directionRight;
		var startingPoint = this.dropdown.sourceNode.getAttribute("count").toInt();
		var endPoint = this.dropdown.highlightNode.getAttribute("count").toInt();
		var difference = endPoint - startingPoint;
		if(difference.toString().indexOf("-") != -1){ 
			directionLeft =  parseInt(endPoint,10);
			directionRight = parseInt(startingPoint,10);
		}else{
			directionLeft = parseInt(startingPoint,10);
			directionRight = parseInt(endPoint,10);
		}			
		while(directionLeft <= directionRight){
			for(i=0;i<this.dropdownStack.childNodes.length;i++){
				if(this.dropdownStack.childNodes[i].getAttribute("count").toInt() === directionLeft) var tResult = this.dropdownStack.childNodes[i];
			}
			this.selectedNodes[x] = tResult;		
			directionLeft++;
			x++;
		}
	},	

	_setupSiftTool : function(){
		var p = this;
		var stateHeaderWidth = (this.useStates) ? this.statesHeader.offsetWidth : 0;
		var headCalc = (this.uiToggle.offsetWidth - (this.clearIconContainer.offsetWidth + 4 + stateHeaderWidth)); // taking 4 away for looks.
		//alert(this.uiToggle.offsetWidth + " ?? " + this.clearIconContainer.offsetWidth + " ?? "  + this.statesHeader.offsetWidth)
		this.header.firstChild.style.width = Math.max(headCalc,50) + "px"; 
		this.header.addEvent('keyup', function(event){
			p._captureKeys();				
		});			
		this.clearIcon.addEvent('click',function(event){
	    	p.header.firstChild.value = "";
	    	p._captureKeys();
		});
		this.cArray = [];
	},

	_captureKeys : function(){
	    this.uiChoices.forEach(function(obj, index){
			 if(this.testFailAttribute(obj,'siftBox'+this.id)){
	              if(this.cArray.contains(obj.id)){
	                   return false;
	              }else{
	                   this.cArray[this.cArray.length] = obj.id;
	              }
	         }else{
	              if(this.cArray.contains(obj.id)){
	                   this.cArray.remove(obj.id);
	                   obj.style.display = "block";
	              }
	         }
	    },this);
    	this.tM = null;
		this.isAnd = -1;
		this.isOr = -1;
		this.isNot = -1
		this.firstStyle = "";
		this.secondStyle = "";
		this.returnNeg = false;
		this.returnPos = true;
	},
		
	testFailAttribute : function(obj,box){
	    if(!this.tM){
			 this.firstStyle = "block";
			 this.secondStyle = "none";
			 this.returnNeg = false;
			 this.returnPos = true;
			 this.isNot = $(box).value.indexOf("!");
	         this.isAnd = $(box).value.indexOf("+");
	         this.isOr = $(box).value.indexOf("|"); //must be one or the other.
			 if(this.isOr === -1) this.tM = $(box).value.toLowerCase().split(/\+/g);
			 if(this.isAnd === -1) this.tM = $(box).value.toLowerCase().split(/\|/g);
	         if(this.isOr !== -1 && this.isAnd !== -1) return;
	    }
	    obj["doShowObj"] = 0;
	    this.tM.forEach(function(m, index){
	         index = index+1;
	         m = m.escapeRegExp();
	         if(!this.testFailMatch(obj,m)){
	              obj["doShowObj"]++;
	         }else{
	              if(this.isOr !== -1){
	                   if(index === 1 && obj["doShowObj"] > 0) obj["doShowObj"]--;
	              }else{
	                   if(obj["doShowObj"] > 0) obj["doShowObj"]--;
	              }
	         }
	    },this);
	  	if(this.isNot !== -1){
	   		this.firstStyle = "none";
			this.secondStyle = "block";
			this.returnPos = false;
			this.returnNeg = true;
		}	
		if(this.isOr === -1){
			if(obj["doShowObj"] === this.tM.length){
				obj.style.display = this.firstStyle;
				return this.returnNeg;		
			}else{
				obj.style.display = this.secondStyle;	
				return this.returnPos;	
			}
		}
		if(this.isOr !== -1){
			if(obj["doShowObj"] > 0){
				obj.style.display = this.firstStyle;
				return this.returnNeg;		
			}else{
				obj.style.display = this.secondStyle;	
				return this.returnPos;	
			}				
		}		
	},

	testFailMatch : function(obj,testMatch){
		var patternFailsMatch = [];
		testMatch = testMatch.replace("!","");
			obj.data.forEach(function(c, index){		
				if(!c.toLowerCase().test(testMatch)) patternFailsMatch.push(1);
			});				
			if(patternFailsMatch.length === obj.data.length){
				return true;
			}else{
				return false; 		    
			}
	},
		
	_displaySelectBox : function(){
		/*
		A few rules of thumb...
			- If you are using a container and set max size to end up taller than the height can support,
			the scrollbars will ignore your max size and show what it can. You must either increase
			the height in your style, or reduce max width.

		*/		
		if(this.dropdownStack.childNodes.length === 0) return;
		//if(this.sift) this.dropdown.offsetHeight + this.uiToggle.offsetHeight;
		this.actualHeightOfSelectBoxChoice = this.dropdownStack.childNodes[0].offsetHeight;				
		this.knownHeightOfContainer = (this.definition.useSelf) ? this.container.offsetHeight : this.container["originalHeight"];	
		if(this.maxChoices > 0){
			this.actualCountOfChoices = this.dropdownStack.childNodes.length;		
			this.heightOfMaxColumns = (this.actualHeightOfSelectBoxChoice * this.maxChoices);		
			this.heightOfActualColumns = (this.actualHeightOfSelectBoxChoice * this.actualCountOfChoices);	
			if(this.type !== "dropdown"){					
				//log.clearUiLog();
				//log.out("HEIGHT OF MAX: " + this.heightOfMaxColumns)
				//log.out("HEIGHT OF ACTUAL COLUMNS: " + this.heightOfActualColumns)
				//log.out("HEIGHT OF DROPDOWN:" + this.dropdown.offsetHeight)
				//log.out("HEIGHT OF INFO: " + this.infoBar.offsetHeight)
				//log.out("HEIGHT OF TOGGLE: " + this.uiToggle.offsetHeight)				
				//log.out("HEIGHT OF ACTUAL PLUS HEADER: " + (this.heightOfActualColumns + this.uiToggle.offsetHeight))
				//log.out("HEIGHT OF CONTAINER: " + this.knownHeightOfContainer)	
				//log.out("<strong>HEIGHT OF EVERYTHING</strong>: " + (this.heightOfActualColumns + this.uiToggle.offsetHeight + this.infoBar.offsetHeight))					
				if(!this.definition.useSelf){					
					this.infoHeight = (this.useInfo) ? this.infoBar.offsetHeight : 0; 					
					this.toggleHeight = (this.useToggle || this.sift) ? this.uiToggle.offsetHeight : 0;				
					this.availableHeightForSelectBox =  this.knownHeightOfContainer - (this.infoHeight + this.toggleHeight);					
					if(this.availableHeightForSelectBox < this.heightOfActualColumns || this.heightOfActualColumns > this.heightOfMaxColumns) this.showScrollbars = true;						
					this.dropdownStack.style.height = (this.availableHeightForSelectBox) + "px";	
					if(this.heightOfActualColumns > this.heightOfMaxColumns){
						this.dropdownStack.style.height = (this.heightOfMaxColumns) + "px";	
					}									
				}else{
					this.dropdownStack.style.height = (this.heightOfActualColumns) + "px";
					if(this.heightOfActualColumns > this.heightOfMaxColumns){
						this.showScrollbars = true;
						this.dropdownStack.style.height = (this.heightOfMaxColumns) + "px";	
					}
				}				
				//log.out("AVAILABLE:" + this.availableHeightForSelectBox)
			}else{				
				this.dropdownOverflow = (this.actualHeightOfSelectBoxChoice * this.maxChoices);
				if(this.heightOfActualColumns > this.dropdownOverflow) this.showScrollbars = true;
				if((this.actualCountOfChoices >= this.maxChoices) && this.showScrollbars === true){
					this.dropdownStack.style.height = this.dropdownOverflow;	
				}		
			}		
		}		
	},	

	_alertProblem : function(d){
		var msg = this.defaultErrorMessage;
		// classet
		var newErr = d.toLowerCase().indexOf("classset");
		var newErrMsg = "Classsets must be in the definition under a JSON object called 'classSets' (whose values are separated by commas), or it must be an attribute on the DOM element you are trying to reference. (also separated by commas).\n\n";
		//container
		var newErr = d.toLowerCase().indexOf("firstchild");
		var newErrMsg = "DOM Error. Chances are you did something as follows:\n\n1.Referenced an invalid container for the dropdown.\n2.Referenced an invalid dropdown.\n\nRemember, if you want the dropdown to be inside a container, be sure to add container to the definition.\n\n";
		//dropdown
		var newErr = d.toLowerCase().indexOf("dropdown"); // let it use the previous msg
		// set error
		if(newErr > -1) msg = msg + newErrMsg;	
		alert(msg + "Original Error:\n" + d);
	}
			
});
selectBoxFactory.implement(new Options, new Events);