/*
customFormElements 1.8b - style form elements on your own
by Maik Vlcek (http://www.mediavrog.net) - MIT-style license.
Copyright (c) 2008 Maik Vlcek (mediavrog.net)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"),
to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense,
and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

var cfeInterface = new Class({
    // type of cfe; e.g. Selector, Checkbox or Radiobutton
    type : "interface",
    
    // basic options for all cfes and always available
    options: {
        instanceID:0,
        spacer:false,
        aliasType: "span"
    },
    
    /**
     * initialization of cfe
     * set options, add focus/blur-Events to original
     * [call procedeLabel]          add events to label of cfe
     * !call build                  must be implemented by cfe; 
     * 
     * @param {Object} original
     * @param {Object} opt
     */ 
    initialize: function(original,opt){
            this.setOptions(this.options, opt);
            
        // set original element and add focus/blur-Events
            this.o = original.addEvents({
                "focus": this.setFocus.bind(this),
                "blur": this.removeFocus.bind(this)
            });
            
        // is there no other way to keep this object
            this.o.cfe = this;
            
        // specific initialization
            this.initializeAdv.bind(this)();
        
        // each cfe must implement this function
            this.build.bind(this)();    
    },
    
    // may be extended by cfe
    initializeAdv: function(){
        // get label for this element
        this.procedeLabel.bind(this)();
    },
    
    /**
     * checks for appropriate label and adds events if found 
     */
    procedeLabel: function(){
        
        this.implicitLabel = false;
        
        // get label for original input element
        if(this.o.id)
            this.l = $E("label[for="+this.o.id+"]");
        
        // no label was found for id, so try parent
        if(!this.l){
            this.l = this.o.getParent();
            this.l.getTag() == "label"?this.implicitLabel = true:"";            
        }
        
        if(this.l.getTag() == "label"){
            // remove for property
            this.dontRemoveForFromLabel?"":this.l.removeProperty("for");
        
            // add adequate className, add stdEvents
            this.l.addClass("for_"+ (this.o.id || (this.o.name+this.o.value).replace("]","-").replace("[","") )+" js"+this.type+"L");

            // add stdevents
            this.l.addEvents({
                "mouseover": this.hover.bind(this),
                "mouseout": this.unhover.bind(this),
                "click":this.clicked.bind(this)
            });
        }
        else{
            this.l = false;
            return false;
        }
    },
    
    /**
     * hides the original input element and creates a span as replacement/alias
     */
    hideAndReplace: function(){
        // hide original input
            this.o.setStyles({"position":"absolute","left":"-999px"});
            
            // fix for internet explorer
            if(window.ie){this.o.setStyles({"position":"static","width":"0"});}
            
        // create standard span as replacement
            this.a = new Element(this.options.aliasType,{
                "class": "js"+this.type,
                "events": {
                    "mouseover": this.hover.bind(this),
                    "mouseout": this.unhover.bind(this),
                    "click": this.setFocus.bind(this)                                   
                }
            }).setStyle("cursor","pointer").injectBefore(this.o);
            
        // check for implicit labels;
            if(!this.implicitLabel){
                this.a.addEvent("click",this.clicked.bindWithEvent(this));
            }
    },

    /**
     * standard mouseover-behaviour
     * add hover state to alias and label (if existent)
     */
    hover: function(){
        this.a.addClass("H");
        this.l?this.l.addClass("H"):"";
    },
    
    /**
     * standard mouseout-behaviour
     * removes hover state from alias and label (if existent)
     */
    unhover: function(){
        this.a.removeClass("H");
        this.l?this.l.removeClass("H"):"";
    },

    /**
     * standard focus-behaviour
     * adds focus state to alias and label (if existent)
     */
    setFocus: function(){
        this.a.addClass("F");
        this.l?this.l.addClass("F"):"";
    },

    /**
     * standard blur-behaviour
     * removes focus state from alias and label (if existent)
     */
    removeFocus: function(){
        this.a.removeClass("F");
        this.l?this.l.removeClass("F"):"";
    },
    
    clicked:function(){
        this.o.focus();
    }
});
cfeInterface.implement(new Options,new Events);

var customFormElements = new Class({
    
    version: "1.8b",
    
    options:{
        scope: false,
        spacer: "gfx/spacer.gif",
        toolTips: false,
        toolTipsStyle: "label"
    },
        
    modules: {},
    moduleOptions: {},
    
    initialize: function(debug){this.options.debug = debug | false;},
    
    getVersion: function(){return this.version;},
    
    throwMsg: function(errText){
        this.options.debug?alert(errText):"";
    },
    
    /* call to register module */
    registerModule: function(mod){
        if(!mod.prototype.build && !mod.prototype.noBuild){
            this.throwMsg.bind(this)("CustomFormElements: registration of Module '"+mod.prototype.type+"' failed. It will NOT be available.\nReason: lack of obligatory 'build' function.");
            return false;
        }
        else{
            this.modules[mod.prototype.selector] = mod;
            return true;
        }
    },
    
    registerModules: function(modColl){
        $each(modColl,function(mod){
            this.registerModule(mod);
        },this);
    },
    
    unregisterModule: function(mod){
        delete this.modules[mod.prototype.selector];
    },
    
    setModuleOptions: function(mod,opt){
        this.moduleOptions[mod.prototype.selector] = opt;
    },
    
    init: function(options){

        this.setOptions(this.options, options);
        
        //console.log(this.modules);
        //console.log(this.moduleOptions);
        
        $each(this.modules,function(module,selector,i){
            $ES(selector,this.options.scope || document.body).each(function(el,i){
                new module(el,$merge({"instanceID": i,"spacer":this.options.spacer},this.moduleOptions[selector]));
            },this);
            
            this.options.toolTips?this.initToolTips.bind(this)():"";
            
        },this);
                
    },
    
    initToolTips: function(){
        if(!Tips){
            this.throwMsg.bind(this)("CustomFormElements: initialization of toolTips failed.\nReason: Mootools Plugin 'Tips' not available.");
            return false;           
        }
        
        switch(this.options.toolTipsStyle){
            default:case 'label': this.toolTipsLabel.bind(this)();break;    
        }
    },
    
    toolTipsLabel: function(){
        var labels = $ES('label',this.options.scope | document.body);
        labels.each(function(lbl,i){
            if(!(forEl = lbl.getProperty("for"))){
                var cl = lbl.getProperty("class");
                
                if(cl){
                    var forEl = cl.match(/for_[a-zA-Z0-9\-]+/).toString();
                    forEl = forEl.replace(/for_/,"");
                    el = $(forEl);
                }
                else{
                    el = lbl.getElement("input");
                }
            }else{
                el = $(forEl);
            }

            if(el){
                if($chk(qmTitle = el.getProperty("title"))){
                    
                    el.setProperty("title","");
                    
                    var qm = new Element("img",{
                        "src": this.options.spacer,
                        "class": "jsQM",
                        "title": qmTitle
                    }).injectInside(lbl);
                }
            }
        },this);
        
        new Tips($ES('.jsQM[title]'));
    }
});
customFormElements.implement(new Options,new Events);
/****************************************/
/* §name:> checkbox                     */
/* ?help:> replaces checkboxes          */
/* !dep:>  core,interface               */
/****************************************/
var cfeCheckbox = cfeInterface.extend({
    
    type: "Checkbox",
    
    selector: "input[type=checkbox]",
    
    initializeAdv: function(){
        this.parent();
        this.hideAndReplace.bind(this)();
    },
    
    build: function(){
        // config alias
        this.a.adopt(new Element("img",{"src": this.options.spacer}));
        this.o.checked?this.a.addClass("A"):"";
        
        this.o.addEvent("keydown",this.toggleBySpace.bindWithEvent(this));
    },
    
    toggleBySpace: function(e){
        var event = new Event(e);
        if(event.key == 'space'){
            !this.o.checked?this.a.addClass("A"):this.a.removeClass("A");
        }
    },
    
    unhover: function(){
        this.parent();
        this.a.removeClass(this.o.checked!=true?"A":"");
    },
    
    selectO: function(){
        this.o.checked = true;
        this.a.addClass("A");
    },
    
    deselectO: function(){
        this.o.checked = false;
        this.a.removeClass("A");
    },
    
    clicked: function(){
        this.parent();
        
        this.fireEvent("mouseout");
        
        if(this.o.checked){
            this.deselectO();
            
        }
        else{
            this.selectO();
        }
    }
});

// implements selectAll/deselectAll functionality into custom form elements
var selectCheckboxes = new Class({
    
    // select all checkboxes in scope
    selectAll: function(scope){
        $ES("input[type='checkbox']",scope || document.body).each(function(el){
            el.cfe.selectO();
        });
    },  
    
    // deselect all checkboxes in scope
    deselectAll: function(scope){
        $ES("input[type='checkbox']",scope || document.body).each(function(el){
            el.cfe.deselectO();
        });
    }   
});
customFormElements.implement(new selectCheckboxes);
/****************************************/
/* §name:> radiobuttons                 */
/* ?help:> replaces radiobuttons        */
/* !dep:>  core,interface               */
/****************************************/
var cfeRadiobutton = cfeInterface.extend({
    
    type: "Radiobutton",
    
    selector: "input[type=radio]",

    initializeAdv: function(){
        this.parent();
        this.hideAndReplace.bind(this)();
        this.elName = this.o.getProperty("name").replace("]","").replace("[","-");
    },
    
    build: function(){
        // config alias
        this.a.addClass("cfe_radiogroup_"+this.elName).adopt(new Element("img",{"src": this.options.spacer}));
        this.o.checked?this.a.addClass("A"):"";
        this.a.input = this.o;
        this.o.addEvent("keydown",this.toggleBySpace.bindWithEvent(this));
    },
    
    toggleBySpace: function(e){
        var event = new Event(e);
        event.key == 'space'?this.clicked.bind(this)():"";
    },
    
    unhover: function(){
        this.parent();
        this.a.removeClass(this.o.checked!=true?"A":"");
    },
    
    clicked: function(){
        this.parent();
        
        $$(".cfe_radiogroup_"+this.elName).each(function(el){
            el.input.removeProperty("checked");
            el.removeClass(el.input.checked!=true?"A":"");
        }.bind(this));
    
        this.o.checked = "true";
        this.a.addClass("A");
    }
});
/****************************************/
/* §name:> submit                       */
/* ?help:> replaces submitbutton        */
/* !dep:>  core,interface               */
/****************************************/
var cfeSubmit = cfeInterface.extend({
    
    type:"Submit",
    
    options: {
        slidingDoors: true
    },
    
    selector: "input[type=submit]",
    
    initializeAdv: function(){
        this.hideAndReplace.bind(this)();
    },
    
    build: function(){
        this.a.addEvents({
            "mousedown": this.press.bind(this),
            "mouseup": this.release.bind(this)
        }).addClass("jsButton").adopt(this.o);      
        
        this.o.addEvents({
            "keydown":this.toggleBySpace.bindWithEvent(this),
            "keyup":this.toggleBySpace.bindWithEvent(this)
        });
        
        this.lab = new Element("span").addClass("label").setHTML(this.o.value).injectInside(this.a);
        
        if($chk(this.options.slidingDoors)){
            this.slidingDoors = new Element("span",{"class": "js"+this.type+"Slide"}).injectInside(this.a);
            this.slidingDoors.adopt(this.o).adopt(this.lab);
        }
    
        // disable text selection of label
        if(window.ie || window.opera){this.lab.setProperty("unselectable","on");}
        if(window.gecko){this.lab.setStyle("MozUserSelect","none");}
        if(window.webkit){this.lab.setStyle("KhtmlUserSelect","none");}
    },
    
    unhover: function(){
        this.parent();
        this.a.removeClass("P");
        this.over = false;
    },
    
    toggleBySpace: function(e){
        var event = new Event(e);
        if(event.key == 'space'){
            switch(event.type){
                case "keyup":this.a.removeClass("H").removeClass("P"); this.pressed = false;this.o.click();break;
                case "keydown": this.pressed = true;this.a.fireEvent("mouseover")
            }
        }
    },
    
    hover: function(){
        this.a.addClass(this.pressed?"P H":"H");
        this.over = true;
    },
    
    press: function(){
        if(!this.pressed){
            this.pressed = true;
        }
        this.a.addClass("P");
        window.addEvent("mouseup",this.release.bindAsEventListener(this));
    },
    
    release: function(e){
        var ev = new Event(e);
        
        if(this.over && (ev.event.button == 0 || (window.ie && ev.event.button == 1))){
            this.o.click();
            this.over = false;
        }
        else{
            window.removeEvent("mouseup");
        }
        
        this.a.removeClass("P");        
        this.pressed = false;
    }   
});
/****************************************/
/* §name:> reset                        */
/* ?help:> replaces reset buttons       */
/* !dep:>  core,submit                  */
/****************************************/
var cfeReset = cfeSubmit.extend({
    type:"Reset",
    selector: "input[type=reset]"
});
/****************************************/
/* §name:> image                        */
/* ?help:> replaces image buttons       */
/* !dep:>  core                         */
/****************************************/
var cfeImage = new Class({
    
    type:"Image",
    noBuild: true,
    
    selector: "input[type=image]",
    
    initialize:function(original,opt){
        this.setOptions(this.options,opt);
        this.o=original.addEvents({
            "mouseover":this.hover.bind(this),
            "mouseout":this.unhover.bind(this),
            "mousedown": this.press.bind(this),
            "mouseup": this.release.bind(this)
        });
    },
    
    hover:function(){
        $chk(this.pressed)?this.press.bind(this)():this.hoverState.bind(this)();
    },
    
    unhover:function(){
        this.o.src=this.oSrc;
    },
    
    release:function(){
        this.o.src=this.oSrc;
        this.pressed = false;
        window.removeEvent("mouseup");
    },
    
    press:function(){
        if(!$chk(this.pressed)){
            this.pressed = true;
            this.o.src=this.oSrc;
        }
        
        this.pressState.bind(this)();
        window.addEvent("mouseup",this.release.bindAsEventListener(this));
    },
    
    hoverState: function(){
        this.setState.attempt("H",this);
    },
    
    pressState: function(){
        this.setState.attempt("P",this);
    },
    
    setState: function(state){
        this.oSrc=this.o.src;
        var tmpSrc=this.oSrc;
        var ind=tmpSrc.lastIndexOf(".");
        var nSrc=tmpSrc.substring(0,ind)+state+tmpSrc.substring(ind);
        this.o.src=nSrc;
    }
});
cfeImage.implement(new Options,new Events);
/****************************************/
/* §name:> text                         */
/* ?help:> replaces textfields          */
/* !dep:>  core,interface               */
/****************************************/
var cfeText = cfeInterface.extend({
        
    type: "Text",
    
    selector: "input[type=text]",
    
    options: {
        slidingDoors: true
    },

    initializeAdv: function(){
        this.dontRemoveForFromLabel = true;
        this.parent();
    },
    
    build: function(){
        if($chk(this.options.slidingDoors)){
            this.slidingDoors = new Element("span",{"class": "js"+this.type+"Slide"}).injectBefore(this.o);
            this.slidingDoors.adopt(this.o);
            this.a=this.slidingDoors;
        }else{this.a=this.o;}
        
        this.a.addEvents({
            "mouseover": this.hover.bind(this),
            "mouseout": this.unhover.bind(this),
            "click":this.clicked.bind(this)
        }); 
    }
})
/****************************************/
/* §name:> textarea                     */
/* ?help:> replaces textarea elements   */
/* !dep:>  core,text                    */
/****************************************/
var cfeTextarea = cfeText.extend({
    type:"Textarea",
    selector: "textarea"
});
/****************************************/
/* §name:> password                     */
/* ?help:> replaces password fields     */
/* !dep:>  core,text                    */
/****************************************/
var cfePassword = cfeText.extend({
    type:"Password",
    selector: "input[type=password]"
});
/****************************************/
/* §name:> fileupload                   */
/* ?help:> replaces file upload fields  */
/* !dep:>  core,interface               */
/****************************************/
var cfeFile = cfeInterface.extend({
    
    type: "File",
    
    selector: "input[type=file]",
    
    options: {
        fileIcons: true,
        trimFilePath: true
    },
    
    build: function(){
        
        this.a = new Element("div",{
            "class": "js"+this.type+"Wrapper",
            "events": {
                "mouseover":this.hover.bind(this),
                "mouseout":this.unhover.bind(this),
                "mousemove":this.follow.bindWithEvent(this)
            }
        }).setStyle("overflow","hidden").injectBefore(this.o).adopt(this.o);
                
        this.initO.bind(this)();
        
        this.v = new Element("div",{"class": "js"+this.type+"Path"}).injectAfter(this.a).addClass("hidden");
        
        this.options.fileIcons?this.fileIcon = new Element("img",{"src": this.options.spacer}).injectInside(this.v):"";
        
        this.path = new Element("span",{"class":"filePath"}).injectInside(this.v);
        this.cross = new Element("img",{
            "src": this.options.spacer,
            "class":"delete"
        }).addEvent("click",this.deleteCurrentFile.bind(this)).injectInside(this.v);

        this.updateFilePath.bind(this)();
        this.unhover.bind(this)();
    },
    
    initO: function(){
        this.o.addEvents({
            "mouseout":this.updateFilePath.bind(this),
            "change": this.updateFilePath.bind(this)
        });
        
        this.o.setStyles({"cursor":"pointer","opacity":"0","visibility":"visible","height": this.a.getSize().size.y,"width": "auto","position":"relative"});
        if(window.gecko){this.o.setStyle("MozOpacity","0");}
    },
    
    follow: function(e){
        var ev = new Event(e);
        this.o.setStyle("left",(ev.client.x-this.a.getLeft()-(this.o.getSize().size.x-30)));
        
        /* special treatment for internet explorer as the fileinput will not be cut off by overflow:hidden */
        if(window.ie){
            if(ev.client.x < this.a.getLeft() || ev.client.x > this.a.getLeft()+this.a.getSize().size.x)
                this.o.setStyle("left", -999);
        }
    },
    
    updateFilePath: function(){
        if(this.o.value != "" && (this.path.getText() != this.o.getProperty("value"))){
                
            var path = this.o.getProperty("value");
            path = this.options.trimFilePath?this.trimFilePath(path):path;
            this.path.setHTML(path);
            
            if(this.options.fileIcons){
                var ind = path.lastIndexOf(".");
                this.fileIcon.setProperty("class",path.substring(++ind).toLowerCase());
            }
            this.v.removeClass("hidden");
        }else{
            this.path.setHTML("");
            this.v.addClass("hidden");
        }
    },
    
    deleteCurrentFile: function(){
        var newFileinput = new Element("input",{
            "type": "file",
            "class": this.o.getProperty("class"),
            "name": this.o.name,
            "id": this.o.id
        })
        this.o.replaceWith(newFileinput);
        this.o = newFileinput;
        
        this.initO.bind(this)();
        
        this.updateFilePath.bind(this)();
    },
    
    trimFilePath: function(path){
        var ind = false;
        if(!(ind = path.lastIndexOf("\\")))
            if(!(ind = path.lastIndexOf("\/")))
                ind = 0;
    
        return path.substring(++ind);
    }
});
/****************************************/
/* §name:> select                       */
/* ?help:> replaces select-elements     */
/* !dep:>  core,interface               */
/****************************************/
var cfeSelect = cfeInterface.extend({
    
    type: "Selector",
    
    selector: "select",
    
    options: {
        defaultSelect:1,
        size: 4,
        scrolling: true,
        scrollSteps: 5
    },
    
    stdEvents: {
        "mouseover":function(){this.addClass("H");},
        "mouseout":function(){this.removeClass("H");},
        "mousedown":function(){this.addClass("A");},
        "mouseup":function(){this.removeClass("A");}
    },
    
    initializeAdv: function(){
        this.parent();
        
        this.hideAndReplace.bind(this)();

        this.origOptions = this.o.getChildren();
        
        // key indices
        this.kind = [];
        
        // integrity check
        if(this.options.size > this.origOptions.length || this.options.scrolling != true){this.options.size = this.origOptions.length;}
    },
    
    build: function(){
    
        var i = this.options.instanceID;
                
        /* build the select element showing the currently selected item */
        this.a.addClass("jsSelector"+i);
        
        this.arrow = new Element("img",{
            "class": "js"+this.type+"Arrow",
            "src": this.options.spacer,
            "styles": {
                "float":"right",
                "display":"inline"
                }
            }).injectInside(this.a);
        
        // get important css styles
        this.aWidth = this.a.getStyle("width").toInt();
        this.gfxWidth = this.arrow.getSize().size.x;
        
        this.ai = new Element("span").addClass("js"+this.type+"Slide").injectInside(this.a).adopt(this.arrow);
        this.aWidth += this.ai.getStyle("padding").toInt()*2;
                
        this.activeEl = new Element("span",{
            "class": "jsOption",
            "styles": {
                "float":"left",
                "display":"inline"
                }
        }).setHTML(this.origOptions[0].getText()).injectBefore(this.arrow);
            
        this.gfxHeight = this.a.getSize().size.y*this.options.size;
        
        /* shows on click */
        this.container = new Element("div",{
                                     "class": "js"+this.type+"CWrapper js"+this.type+"CWrapper"+i,
                                     "styles":{
                                         "display":"none",
                                         "overflow":"hidden"
                                        }
                                     }).injectInside(document.body);

        this.cContent = new Element("div",{
            "class":"js"+this.type+"Content",
            "styles":{
                "float":"left",
                "display":"inline"
            }
        }).injectInside(this.container);
        
        this.aliasOptions = new Element("div",{
            "class": "js"+this.type+"C",
            "styles":{
                "height": this.gfxHeight,
                "width": this.options.scrolling?(this.cContent.getStyle("width").toInt()-this.gfxWidth):"100%",
                "overflow":"hidden",
                "float":"left",
                "display":"inline"
            }
        }).injectInside(this.cContent);

        
        // insert option elements
        this.origOptions.each(function(el,i){
            new Element("div",{
                "class": "jsOption jsOption"+i,
                "styles":{
                    "float":"left",
                    "width":"100%",
                    "clear":"left"
                },
                "events":{
                    "mouseover": this.selectOption.pass([i,true,true],this),
                    "mouseout": this.selectOption.pass([i,true,true],this),
                    "click": this.selectOption.pass(i,this)
                }
            }).setHTML(el.innerHTML).injectInside(this.aliasOptions);
                    
        }.bind(this));
        
        this.aOptions = this.aliasOptions.getChildren();
        
        // scroller if scrolling enabled
        if(this.options.scrolling){
            this.scrollerWrapper = new Element("div",{
                "class": "js"+this.type+"ScrollerWrapper",
                "styles":{
                    "height": this.gfxHeight,
                    "float":"left",
                    "display":"inline"
                    }
                }).injectInside(this.cContent);
                
            this.scrollerTop = new Element("img",{
               "class": "scrollTop",
               "src": this.options.spacer,
               "events": this.stdEvents
              }).addEvent("click",this.moveScoller.pass(-1*this.options.scrollSteps,this));
            
            this.scrollerBottom = new Element("img",{
              "class": "scrollBottom",
              "src": this.options.spacer,
              "events": this.stdEvents
             }).addEvent("click",this.moveScoller.pass(this.options.scrollSteps,this));

            this.scrollerWrapper.adopt(this.scrollerTop);

            this.scrollerBack = new Element("div").setStyle("height",this.gfxHeight - 2*this.scrollerTop.getStyle("height").toInt());
            
            this.scrollerKnob = new Element("img",{
                                            "class": "scrollKnob",
                                            "src": this.options.spacer,
                                            "events": this.stdEvents                            
                                        });
            
            this.scrollerBack.adopt(this.scrollerKnob);
                    
            this.scrollerWrapper.adopt(this.scrollerBack).adopt(this.scrollerBottom);
        }

        // select default option
        this.selectOption.attempt(this.options.defaultSelect-1,this);
        
    },
    
    moveScoller:function(by){
        var scrol = this.aliasOptions.getSize().scroll.y;
        this.slider.set(scrol+by<this.sliderSteps?scrol+by:this.sliderSteps);
    },
    
    selectOption: function(index,stayOpenAfterSelect,highlightOnly,focusOnElement){
        
        //console.log(index);
        index = index.limit(0,this.origOptions.length-1);
        
        this.highlighted?this.highlighted.removeClass("H"):"";
        this.highlighted = this.aOptions[index];
        this.highlighted.addClass("H");
        this.highlightedID = index;
        
        if(focusOnElement && this.options.scrolling){
            this.scrollToSelectedItem(this.highlightedID);
        }
        
        if(highlightOnly!=true){
            
            var selectit = this.origOptions[index];
                selectit.selected = "selected";
                
            this.selectedID = index;
            
            this.activeEl.setHTML(selectit.innerHTML);
        
            stayOpenAfterSelect?"":this.clicked.attempt("hide",this);
        }
    },
    
    scrollToSelectedItem:function(index,onlyIfNotVisible){
        
        this.slider.set((this.sliderSteps/(this.aOptions.length-this.options.size))*index);
    
    },
    
    selectOptionByKey: function(key){
        
        if(!this.kind[key]){
            this.kind[key] = [];
            
            this.origOptions.each(function(el,i){
                if(el.getText().charAt(0).toLowerCase() == key){
                    this.kind[key][this.kind[key].length] = i;
                }
            }.bind(this));
            //console.log("new indizees for key "+key+";Res:"+this.kind[key]);
        }
        
        if($defined(this.kind[key][0])){
            var ind = this.kind[key].indexOf(this.highlightedID);
            this.selectOption(this.kind[key][ind+1]?this.kind[key][ind+1]:this.kind[key][0],true,false,true);
        }
    },
    
    clicked: function(action){
        
        if(this.container.getStyle("display") == "block" || action == "hide"){
            this.container.setStyle("display","none");
            window.removeEvents("keyup","click");
        }
        else{
            this.parent();
            
            // show container
            this.container.setStyles({
                    "display":"block",
                    "position":"absolute",
                    "top": this.a.getTop(),
                    "left": this.a.getLeft(),
                    "width": this.ai.getSize().size.x
                    });
            
            // fix ie 2 pixel bug
            if(window.ie){this.container.setStyle("left",this.a.getLeft()+2);}
                            
            // scroller
            if(this.options.scrolling){
                this.sliderSteps = this.aliasOptions.getSize().scrollSize.y - (this.options.size*this.aliasOptions.getSize().scrollSize.y/this.aOptions.length);
                this.slider = new Slider(this.scrollerBack, this.scrollerKnob, {steps: this.sliderSteps, mode: "vertical" ,onChange: function(step){this.aliasOptions.scrollTo(false,step);}.bind(this)}).set(0);
                this.scrollToSelectedItem(this.selectedID);
            }
            
            // change value on key press
            window.addEvent("keyup",this.keyListener.bindWithEvent(this));
            
            // hide the container after click outside of it
            window.addEvent("click",this.clickOutsideListener.bindWithEvent(this));
        }
    },
    
    keyListener: function(e){
        var ev = new Event(e).stop();
        
        switch(ev.key){
            // disabled because event wont stop > page scrolls when pressing down/up
            /*case "up":
                this.scrollToSelectedItem(this.highlightedID-1,true);
                this.selectOption(this.highlightedID-1,true);
                break;
                
            case "down":
                this.scrollToSelectedItem(this.highlightedID+1,true);
                this.selectOption(this.highlightedID+1,true);
                break;
            */
            case "enter":this.selectOption(this.highlightedID);break;
            
            default: this.selectOptionByKey(ev.key);break;
        }
    },
    
    clickOutsideListener: function(event){
        event = new Event(event).stop();
                
        if(!(this.a.hasChild(event.target) || this.container.hasChild(event.target) || this.l == event.target ))
        {   
           this.clicked("hide");
        }
    }
});

