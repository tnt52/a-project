// JavaScript Document

function Blur_inpt(field,def,funct){
      var mss=funct();
      blurDef(field,def);
      if (mss=="vide") {
         if(field.className.substr(0,5)=="oblig") mss="champ obligatoire";
         else mss="";
      }
      if (mss=="") field.className=field.className.substr(0,5);
      else field.className=field.className.substr(0,5)+"_ko";
      var span=field.getNext();
      if (span) {
         if (span.hasClass("mss_oblig")) span.setText(mss);
         if (span.hasClass("mss_facul")) {
            span.set(0);
            span.setText(mss);
            span.effects({
              duration: 500,
              transition: Fx.Transitions.Bounce.easeOut
            }).start({
              'opacity':[0,1],
              'width':[0,100]
            });
            var fx=new Fx.Styles(span,{
              duration: 500,
              transition: Fx.Transitions.Bounce.easeOut
            });
            fx.start.pass([{
              'opacity':[1,0],
              'width':[100,0]
            }], fx).delay(1000);

         }
      }
}

function Focus_inpt(field,def){
         focusDef(field,def);
         var span=field.getNext();
         if (span && span.hasClass("mss_facul")) {
            span.effects({
              duration: 500,
              transition: Fx.Transitions.Bounce.easeOut
            }).start({
              'opacity':[0,1],
              'width':[0,100]
            });
         }
}



function focusDef(field,def){
    if (field.value==def) field.value='';
}
function blurDef(field,def){
    if (field.value=='') field.value=def;
}
/*function initForms(formul){
    var f=formul;//
    //document.write("test"+f.id);
    var e;  
    for (i=0;i<f.length;i++){
        e = f.elements[i];
                
        if (e.className.substr(0,5)=="oblig" || e.className.substr(0,5)=="facul") {
            //document.write(e.className);          
            e.onblur=MyInput.onBlur;
            e.onfocus=MyInput.onFocus;
            e.onblur();
        }
    }
}*/



function onBlurInput(field,def){
    if (field.value==def || field.value=='') {
//              document.write(field.className);
                field.value=def;
                field.className=field.className.substr(0,5)+"_ko";
    //          document.write(field.className);
    }
            else {
                //document.write(field.className);
                field.className=field.className.substr(0,5);
                //document.write(field.className);
            }
}
function onFocusInput(field,def){
    if (field.value==def) {
            field.value="";
        }
}
//var lastClass=new Array();
var MyInput = {
    onBlur: function (){
        /*if (this.value=="sout") document.write(lastClass);
        else lastClass.push(this.className);*/
            if (this.value==this.alt+"?" || this.value=='') {
                //document.write(field.className)
                this.value=this.alt+"?";
                this.className=this.className.substr(0,5)+"_ko";
            }
            else {
                //document.write(field.className);
                this.className=this.className.substr(0,5);
                //document.write(field.className);
            }
            
        },
    onFocus: function (){
        if (this.value==this.alt+"?") {
            this.value="";
            //field.className=field.className+"_ko";
        }
        //else field.className=field.className.substr(0,5);
        this.select();
    }
}


