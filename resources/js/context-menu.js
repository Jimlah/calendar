export default function (Alpine) {
    Alpine.directive('contextmenu', (el, directive) => {
        if(!directive.value)handleRoot(el, Alpine, directive)
        else if(directive.value==='trigger') handleTrigger(el, Alpine, directive)
        else if(directive.value==='contextmenu') handleContextMenu(el, Alpine, directive)

    }).before('bind');
}

const handleRoot = (el, Alpine, directive) => {
    Alpine.bind(el, ()=>({
        ['x-data'](){
            return{
                __position: {
                  top: 0,
                  left: 0
                },
                __group: null,
                __contextMenu: {},
                init(){

                },
                __calculateContextMenuPosition(event, group){
                    if(window.innerHeight < event.clientY + this.__contextMenu[group].offsetHeight){
                        this.__position.top = (window.innerHeight - this.__contextMenu[group].offsetHeight) + 'px';
                    } else {
                        this.__position.top = event.clientY + 'px';
                    }
                    if(window.innerWidth < event.clientX + this.__contextMenu.offsetWidth){
                        this.__position.left = (event.clientX - this.__contextMenu[group].offsetWidth) + 'px';
                    } else {
                        this.__position.left = event.clientX + "px";
                    }
                }
            }
        }
    }))
}
const handleTrigger = (el, Alpine, directive) => {
    Alpine.bind(el, ()=>({
        ['x-init'](){
        },
        ['x-on:contextmenu.self.prevent'](){
            this.$data.__calculateContextMenuPosition(this.$event,directive.modifiers[0]);
            Alpine.$data(this.$data.__contextMenu[directive.modifiers[0]]).__isContextMenuOpen = true;
        },
        ['x-on:dblclick.prevent'](){
            this.$wire.create()
        }
    }))
}
const handleContextMenu = (el, Alpine, directive) => {
    Alpine.bind(el, ()=>({
        ['x-data'](){
          return {
              __isContextMenuOpen: false
          }
        },
        ['x-init'](){
            this.$el.style.position = 'fixed';
            this.$data.__contextMenu[directive.modifiers[0]] = this.$el;
        },
        ['x-show'](){
            return this.__isContextMenuOpen;
        },
        ['x-on:click.outside'](){
            this.__isContextMenuOpen = false;
        },
        ['x-bind:style'](){
            return this.$data.__position;
        }
    }))
}
