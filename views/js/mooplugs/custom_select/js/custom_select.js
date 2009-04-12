/*
    Mootools CustomSelect
    
    CustomSelect 0.1 - replacement for standard html select element
    Author: Bonch <demerest@gmail.com>
    Date: 23 Sep 2008
    http://imaker.ru/custom-select/
    
    Enjoy
    
    TODO: ���� ���� ������, �� �� ������ ������������� �������������� ��� ������ ���������.
    ��� ����� ����� �����, ����� �������� ��������� ��� ���� ���������.
*/

var CustomSelect = new Class({
    Implements     : [Events, Options],
    options        : {
        onChange : $empty,
        onSelect : $empty,
        onShow   : $empty,
        onHide   : $empty,
        theme    : 'aqua',
        max_lines : 10, // ������������ ���-�� ��������� ��� ���������
        line_height : 20 // ������ ��������
    },
    box            : null, // ���� (a c div ������)
    select         : null, // �������� ����������
    selectbox      : null, // ������ ����������� (UL ������)
    selectedIndex  : null, // ������� ������ �����������
    currentElement : null, // ������� ���������� ������� �����������
    currentText    : null, // ������� �����
    width          : null, // ������ ��������� �����������
    display        : false, // ������ ����������� (������� ��� ���)
    
    initialize: function(select, options) {
        this.setOptions(options);
        this.select = select;
        
        this.width = this.select.getWidth();
        
        // ������� �������� ����������
        this.select.setStyle('display', 'none');
        
        // ������� ����������� ���������� �� ������ select
        this.build_selectbox();
        
        // ������� �� ����������
        this.box.addEvent('mousedown', function(e) {
            if (this.display) {
                this.hide();
            } else {
                this.show();    
                this.box.focus();
            }
            
            e.stop();
        }.bind(this) );
        

        // �������� ������� �� onchange ��������� �����������
        this.select.addEvent('change', function(e) {
            e.stop();
            this.selectbox.getElements('li').each(function(li) {
                if (li.getProperty('index') == this.select.selectedIndex)
                    this.change_item.run(li, this);
            }.bind(this) )
        }.bind(this) );
        
        // ��� ����� �� document ��������� ����������
        window.document.addEvent('click', function(e) {
            var obj = e.target;
            while (obj.parentNode && obj != this.box) obj = obj.parentNode;
            if (obj != this.box) this.hide();
        }.bind( this ));
    },
    
    /* ������ ���������� ������ */
    hide: function() {
        if (this.display) {
            this.selectbox.setStyle('display', 'none');
            this.display = false;
            this.box.removeClass('focused');
            
            this.selectbox.getElements('li').each(function(li) {
                if (li.getProperty('index') == this.select.selectedIndex) {
                    this.unselect_lis();
                    this.currentElement = li.addClass('selected');;
                }
            }.bind(this) );
            
            this.fireEvent('onHide', this.currentElement);
        }
    },
    
    /* �������� ���������� ������ */
    show: function() {
        if (!this.display) {
            this.fireEvent('onShow', this.currentElement);
            this.selectbox.setStyle('display', 'block');
            this.display = true;
            this.box.addClass('focused');
        }
    },
    
    /* ������� ����������� ���������� �� ������������ */
    build_selectbox: function() {
        // ������� ������� A � DIV ������ A
        this.box = new Element('a', {
            'class'  : this.options.theme,
            'href'   :  'javascript:;',
            'styles' : {
                'width' : this.width+'px'
            }
        }).inject(this.select, 'after');
        
        this.box_div = new Element('div').inject(this.box);
        
        // ������� ������ UL
        this.selectbox     = new Element('ul', {
            'class' : this.options.theme
        }).inject( this.box, 'after' );
        this.selectedIndex = this.select.selectedIndex;
        
        // ������������� ������ ����������� ����
        if (this.selectbox.getWidth() < this.width)
            this.selectbox.setStyle('width', this.width + 'px');
        
        // ������� li �������� ������, �������� ������� �������
        // � ���������� �������
        this.build_options();
        
        // ������������ �������� A �� ������
        this.box.addEvent((Browser.Engine.trident || Browser.Engine.webkit) ?
            'keydown' : 'keypress', this.change_item_on_keyup.bind( this ));
        
        // ������������ �� �����
        this.box.addEvent('focus', function() {
            this.box.addClass('focused');
        }.bind(this) );
        
        this.box.addEvent('blur', function() {
            this.box.removeClass('focused');
        }.bind(this) );
    },
    
    /* ��������� ������ LI ��������� */
    build_options: function() {
        this.select.getElements('option').each(function(option) {
            var li = new Element('li')
              .set('text', option.get('text') )
              .inject( this.selectbox )
              .setProperty('index', option.index); // ������������� ������
            
            // ������������� ���������� �������
            if (option.selected) {
                this.currentElement = li.addClass( 'selected' );
                this.currentText = option.get('text');
            }
            
            // ������������� ������� �� ����� �������� � ��������� ��������� 
            li.addEvent('mouseup', function(e) {
                e.stop();
                this.change_item.run(li, this);
                this.hide();
            }.bind(this) );
        }.bind(this));
        
        // ������������ ������ �����������, ���� � ��� �����
        if (this.select.options.length > this.options.max_lines) {
            // ������������ ������ �����������
            // TODO: this.options.line_height ������������ �����������
            var height = this.options.line_height * this.options.max_lines;
            
            this.selectbox.setStyles({
                'height'     : height+'px',
                'overflow-y' : 'auto'
            });
        }
        
        /* ������������� ��������� ��� ��������� ���� */
        this.toggle_selection();
        
        /* ������������� ������� ����� */
        this.box_div.set('text', this.currentText );
    },
    
    /* ����������� ���������� */
    rebuild: function() {
        // �������� ����������
        this.selectbox.getElements('li').each(function(li) {
            li.dispose();
        });
        
        this.build_options();
    },
    
    /* ������������� ��������� ��� ��������� ���� */
    toggle_selection: function() {
        this.selectbox.getElements('li').each(function(li) {
            li.addEvent('mouseenter', function() {
                this.unselect_lis();
                this.currentElement = li.addClass('selected');
                this.selectedIndex = this.currentElement.getProperty('index');
                this.fireEvent('onSelect', this.currentElement);
            }.bind( this ) );
        }.bind( this ));
    },
    
    /* ����� ��������� �� ���� ��������� li */
    unselect_lis: function() {
        this.selectbox.getElements('li').each(function(li) {
            li.removeClass('selected');
        });
    },
    
    /* Change item srom selectbox */
    change_item: function(li) {
        // ������� ���
        this.unselect_lis(this.selectbox);
        
        this.selectedIndex  = li.getProperty('index');
        this.currentElement = li;
        
        // ������������� ����� ���������� ��������
        this.currentElement.addClass('selected');

        // ������������� ��������� �����
        this.box.getElement('div').set('text', this.currentElement.get('text') );
        
        // ������ ������ � �������� �����������
        this.select.selectedIndex = this.selectedIndex;
        
        this.fireEvent('onChange', [this.currentElement,
            this.select.options[ this.selectedIndex ].get('value')]);
    },
    
    /* �������� ������� �� ������ up down left right esc */
    change_item_on_keyup: function(e) {
        if (e.key == 'tab') return true;
        if (e.key == 'esc' || e.key == 'enter') {
            this.hide();
            return true;
        }
        if ((e.key == 'up' || e.key == 'down') && e.alt) {
            this.display ? this.hide() : this.show();
            return true;
        }
        
        var li = null;
        
        /* ��������� � ����� */
        if (e.key == 'up' || e.key == 'left') {
            li = this.change_element_by_method('getPrevious');
        } else if (e.key == 'down' || e.key == 'right') {
            li = this.change_element_by_method('getNext');
        } else if (e.code == 36 || e.code == 33) {
            li = this.change_element_by_method('getFirst', true);
        } else if (e.code == 35 || e.code == 34) {
            li = this.change_element_by_method('getLast', true);
        } else {
            // ���� ���� ������� �� ��������� �����
            li = this.change_element_by_char(e.key);
        }
        
        if (li != null) {
            this.fireEvent('onSelect', li);
            this.change_item.run(li, this);
        }
    },
    
    /* �������� ������� ������ �� ���������� ������ */
    change_element_by_method: function(method, from_child) {
        return from_child ? this.currentElement.getParent()[method]() : 
            this.currentElement[method]();
    },
    
    /* �������� ������� ������ �� ��������� ����� */
    change_element_by_char: function(key) {
        // ���� ������ �������
        var length  = this.selectbox.getElements('li').length;
        var li   = null;
        var patt = new RegExp('^'+key, 'i');
        
        var i = 0;
        var el = this.currentElement;
        while ((el = el.getNext() || el.getParent().getFirst()) && li == null) {
            i++;
            if (i > length) { break;} // Ugly, but works
            if (patt.test( el.get('text') )) {
                li = el;
            }
        }
        
        return li;
    }
});