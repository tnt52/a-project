var CustomSelectText = new Class({
    Implements     : [Events, Options],
    Extends: CustomSelect,
    options        : {

    },
    
    // Таблица соответствий кастомных селектбоксов с нативными
    initialize: function(select, options) {
        this.parent(select, options);
        this.setOptions(options);
        
        //alert(this.box_div)
        
        this.box.addEvent('mousedown', function(e) {
            this.box_div.empty();
            
            var input = new Element('input', {
                'type' : 'text',
                'class' : 'selectbox-input'
            }).inject(this.box_div);
            
            this.box.removeEvents((Browser.Engine.trident || Browser.Engine.webkit) ?
            'keydown' : 'keypress');
            
            input.focus();
        }.bind(this) );
    }
});