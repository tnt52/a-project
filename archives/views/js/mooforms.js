/**
* @desc mooForms.js - custom radio and checkboxes for forms.
* @author Shaun Freeman <shaun@shaunfreeman.co.uk>
* @Copyright Shaun Freeman 2007
* @date Wed Oct 24 13:31:24 BST 2007 
* @license      GNU/GPL, see LICENSE.txt
*   This program is free software: you can redistribute it and/or modify
*   it under the terms of the GNU General Public License as published by
*   the Free Software Foundation, either version 3 of the License, or
*   (at your option) any later version.
*
*   This program is distributed in the hope that it will be useful,
*   but WITHOUT ANY WARRANTY; without even the implied warranty of
*   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*   GNU General Public License for more details.
*
*   You should have received a copy of the GNU General Public License
*   along with this program.  If not, see <http://www.gnu.org/licenses/>.
* @version 1.0 - Wed Oct 24 13:31:24 BST 2007
*     - 1st release
*
* @version 1.1 - Sat Jan 19 15:31:36 GMT 2008
*     - added labelPosition
*       - put label on left or right
*/

var mooForms = new Class({
    
    initialize: function(element, options){
        this.options = Object.extend({
            imageDir: './images/',
            checkboxImage: {image: 'checkbox.gif', width: 16, height: 20},
            radioImage: {image: 'radio.gif', width: 16, height: 20},
            spacer: 'spacer.gif',
            inputs: ['checkbox', 'radio'],
            labelPosition: 'right'
        }, options || {});
        
        this.el = $(element);
        this.elid = element;
        
        this.options.inputs.each(function (input) {
            this.build(input);
        }.bind(this));
        
        this.divs = $ES('div', this.el);
        
        this.divs.each(function(item){ 
        
            if (item.hasClass('checkbox') || item.hasClass('radio')) {
                
                item.addEvent('mousedown', function(event){
                    new Event(event).stop();
                    this.effect(item);
                    return false;
                }.bind(this));

                item.addEvent('click', function(event){  
                    this.handle(item);
                }.bind(this));
                
                if (window.ie) {
                    // disable ie's drag 'n' drop on the div container
                    item.ondragstart = function(event){
                        window.event.returnValue=false;
                    };
                    document.addEvent('mouseup', function(event){
                        this.clear(item);
                    }.bind(this));
                } else {
                    window.addEvent('mouseup', function(event){
                        this.clear(item);
                    }.bind(this));
                }
            }
        }.bind(this));
    },
 
    build: function(input){
        
        formElement = $ES('input[type=' + input + ']', this.el);
        
        formElement.each(function (inputElement) {
            
            if (input == 'checkbox') {
                this.image = this.options.imageDir + this.options.checkboxImage.image;
                this.imageWidth = this.options.checkboxImage.width;
                this.imageHeight = this.options.checkboxImage.height;
                
            }
            if (input == 'radio') {
                this.image = this.options.imageDir + this.options.radioImage.image;
                this.imageWidth = this.options.radioImage.width;
                this.imageHeight = this.options.radioImage.height;
            }

            this.spacer = new Asset.image(this.options.imageDir + this.options.spacer);
            
            this.spacer.setStyles({
                'width': this.imageWidth,
                'height': this.imageHeight,
                'vertical-align': 'middle',
                'background-image': 'url(' + this.image + ')',
                'background-repeat': 'no-repeat',
                'background-position': '0px 0px'
            });
            
            wrapper = new Element('div', {
                'class': input,
                'styles': {
                    'cursor': 'default', 
                    'display': 'inline'
                }
            });
            
                
            if (this.options.labelPosition == 'left') {
                label = inputElement.getPrevious();
                wrapper.injectBefore(inputElement).
                        adopt(label)
                        .adopt(this.spacer)
                        .adopt(inputElement); 
            } else {
                label = inputElement.getNext();
                wrapper.injectBefore(inputElement)
                        .adopt(this.spacer)
                        .adopt(inputElement)
                        .adopt(label);
            }
            
            label.setStyles({
                'vertical-align': 'middle',
                'display': 'inline'
            });
            
            inputElement.setStyle('display', 'none');
            
            if (inputElement.getAttribute('checked')) {
                wrapper.addClass('selected');
                this.spacer.setStyle('background-position', '0px -' + (this.imageHeight * 2) + 'px');
            }
        }.bind(this)); 
    },
    
    getImageHeight: function(item){
        if (item.hasClass('checkbox')) {
            this.imageHeight = this.options.checkboxImage.height;
        } else {
            this.imageHeight = this.options.radioImage.height;
        }
    },
 
    effect: function(item){
        
        this.getImageHeight(item);
        
        if(item.className == 'checkbox' || item.className == 'radio') {
            $E('img', item).setStyle('background-position', '0px -' + this.imageHeight + 'px');
        } else {
            $E('img', item).setStyle('background-position', '0px -' + (this.imageHeight * 3) + 'px');
        }
    },
 
    handle: function(item){
    
        selector = $E('input', item);  
        
        if(item.className == 'checkbox') {
            selector.setProperty('checked', 'checked');
            item.addClass('selected');
            $E('img', item).setStyle('background-position', '0px -' + (this.options.checkboxImage.height * 2) + 'px');
        } else if (item.className == 'checkbox selected') {
            selector.removeProperty('checked');
            item.removeClass('selected');
            $E('img', item).setStyle('background-position', '0px 0px');
        } else {
            selector.setProperty('checked', 'checked');
            item.addClass('selected');
            $E('img', item).setStyle('background-position', '0px -' + (this.options.radioImage.height * 2) + 'px');
            itemName = selector.getProperty('name');
            
            this.inputs = $ES('input[name=' + itemName + ']', this.el);
            
            this.inputs.each(function(radio){
                if (radio != selector) {
                    radio.getParent().removeProperty('checked');
                    radio.getParent().removeClass('selected');          
                    $E('img', radio.getParent()).setStyle('background-position', '0px 0px');
                }
            });
        }
    },
    
    clear: function(item){
    
        this.getImageHeight(item);
        
        if (item.className == 'checkbox' || item.className == 'radio') {
            $E('img', item).setStyle('background-position', '0px 0px');
        } else if (item.className == 'checkbox selected' || item.className == 'radio selected') {
            $E('img', item).setStyle('background-position', '0px -' + (this.imageHeight * 2) + 'px');
        }
    }
});