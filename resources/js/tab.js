export  default function (Alpine) {
    Alpine.directive('tabs', (el, directive) => {
        if (!directive.value) {
            handleRoot(el, Alpine)
        }
    }).before('bind')
}

const handleRoot = (el, Alpine) => {
    Alpine.bind(el, (e) => ({
     ['x-data'](){
         return{
             __currentTab: null,
             __panels: [],
             __panelButtons: [],
             __changeTab(index){
                 this.__currentTab = this.__panels[index]
             }
         }
     }
    }))
}


const handlePanel = (el, Alpine) => {
    return{
        ['x-data'](){
            return{
                init(){
                    Alpine.$data.__panels.push(this.$el)
                }
            }
        },
        ['x-show'](){
            return Alpine.$data.__currentTab === this.$el
        }
    }
}

const handleButton = (el, Alpine) => {
    return{
        ['x-data'](){
            return{
                init(){
                    Alpine.$data.__panelButtons.push(this.$el)
                }
            }
        },
        ['@click.prevent'](){
            const index = Alpine.$data.__panels.indexOf(this.$el);
            Alpine.$data.__changeTab(index);
        }
    }
}
