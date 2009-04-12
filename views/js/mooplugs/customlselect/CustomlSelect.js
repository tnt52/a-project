var CustomSelect = new Class({
  Implements: Events,
  initialize: function(selectArea){
    if(!selectArea) { return (false); }
    this.selectArea = selectArea;
    this.selectList = false;
    this.selected = false;
    this.selectOpen = false;
    this.buildContents();
    this.selectElement = $(selectArea).getElement('select');
    this.selectElement.setStyle('display', 'none');
    this.elements = this.selectElement.getChildren().each(function(child) {
      if(child.get('tag') == 'optgroup') {
        this.addOptionGroup(child);
      } else {
        this.addOption(child);
      }
    }.bind(this));
    this.bindEvents();
    },
  buildContents: function() {
    this.selectField = new Element('div', {
      'class': 'selectField',
      'id': 'selectField'
    });
    this.dropArea = new Element('div', {
      'class': 'status'
    });
    this.selectedOption = new Element('div', {
      'class': 'selected'
    });
    this.optionContainer = new Element('div', {
      'class': 'optContainer',
      'html': ''
    });
    this.selectedOption.inject(this.dropArea);
    this.dropArea.inject(this.selectField);
    this.optionContainer.inject(this.selectField);
    this.selectField.inject(this.selectArea, 'top');
  },
  bindEvents: function() {
    this.dropArea.addEvents({
      'click': function(e){
        if(this.selectOpen == true) {
          this.hideList();
        } else {
          new Event(e).stop();
          this.showList();
        }
      }.bind(this),
      'mouseover': function(e) {
        if(this.selectOpen == false) {
          this.hideList();
        }
      }.bind(this)
    });
    document.addEvent('click', function() {
      this.hideList();
    }.bind(this));
  },
  
  addOptionGroup: function(optionGroup) {
    var group = new Element('div').addClass('optGroup');
    var label = new Element('div').addClass('optLabel'); 
    var optList  = new Element('div').addClass('optList');
    optList.inject(group);
    label.setText(optionGroup.getProperty('label'));
    label.inject(group, 'top');
    optionGroup.getElements('option').each(function(option) {
      newOption = this.returnOption(option);
      newOption.inject(optList);
    }.bind(this));
    group.inject(this.optionContainer);

  },
  addOption: function(option) {
    newOption = this.returnOption(option);
    newOption.inject(this.optionContainer);
  },
  returnOption: function(option) {
    var newOption = new Element('div', {
      'class': 'opt',
      'html': option.text
    });
    if($defined(option.getProperty('class')) && $chk(option.getProperty('class'))) {
      newOption.addClass(option.getProperty('class'));
    }
    if(option.disabled) { 
      newOption.addClass('disabled') 
    } else {
      newOption.addEvents({
        'click': this.onOptionClick.bindWithEvent(this),
        'mouseout': this.onOptionMouseout.bindWithEvent(this),
        'mouseover': this.onOptionMouseover.bindWithEvent(this)
      })
    }
    if(option.selected) { 
      if(this.selected) { this.selected.removeClass('selected'); }
      this.selected = newOption;
      newOption.addClass('selected');
      this.selectedOption.setHTML(option.text);
    }
    newOption.value = option.value;
    return newOption;
  },
  onOptionClick: function(e) {
    var event = new Event(e);
    if(this.selected != event.target ) {
      this.selected.removeClass('selected');
      event.target.addClass('selected');
      this.selected = event.target;
      this.selectedOption.setText(this.selected.getText());
      this.selectElement.value = event.target.value;
    }
    this.hideList();
  },
  onOptionMouseover: function(e) {
    var event = new Event(e);
    event.target.addClass('over');
  },
  onOptionMouseout: function(e) {
    var event = new Event(e);
    event.target.removeClass('over');
  },
  showList: function() {
    if(this.selectOpen == false) {
      this.selectOpen = true;
      this.optionContainer.setStyle('display','block');
      this.selectField.setStyle('z-index', 100000);
    }
  },
  hideList: function() {
    if(this.selectOpen == true) {
      this.selectOpen = false;
      this.optionContainer.setStyle('display','none');
      this.selectField.setStyle('z-index', 1);
    }
  }
});

