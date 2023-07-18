export function Popover (Alpine){
    Alpine.directive('popover', (el, directive)=>{
        handlePopover(el, Alpine);
    })
}


const handlePopover = (el, Alpine) => {

    let listeners = Alpine.bound(el, 'listeners', []);

    listeners = listeners.reduce((acc, curr)=>{
        return {...acc, ['@'+curr+'.window'](){
            this.$data.props = this.$event.detail;
            this.$data.__trigger = this.$event.target;
            this.$dispatch('onload');
            this.$data.__isPopOverShow = true;

            }}
    },{})

    Alpine.bind(el, ()=>({
        ['x-data'](){
            return{
                __isPopOverShow: false,
                __listeners: [],
                __trigger: null,
                props: {},
                __visibility: 'hidden',
                __positions: {
                    top: 0,
                    left: 0
                },
                init(){
                },
                close(){
                    this.__isPopOverShow = false;
                    this.__visibility = 'hidden';
                    this.$dispatch('onclose');
                }
            }
        },
        ['x-effect'](){
            if(this.$data.__trigger){
                handleTrigger(this.$el, this.$data.__trigger);
            }
        },
        [':style'](){
          return {
              position: 'fixed',
              visibility: this.$data.__visibility,
              ...this.$data.__positions
          }
        },
        ['x-show'](){
          return this.$data.__isPopOverShow;
        },
        ['@click.outside'](){
            if(this.$data.__trigger !== this.$event.target){
                this.$data.close();
            }
        },
        ...listeners

    }))
}

const handleTrigger = (el, target) => {
    setTimeout(()=>{
        const targetBoundingClient = target.getBoundingClientRect();
        const popoverBoundingClient = el.getBoundingClientRect();

        let top = 0;
        if(window.innerHeight < ((targetBoundingClient.y - (el.clientHeight/2)) + el.clientHeight)){
            top =  top - (top + el.clientHeight - window.innerHeight) - 10
        } else if((el.clientHeight/2) >  targetBoundingClient.y){
            top = (el.clientHeight/2)- targetBoundingClient.y;
        } else {
            top = targetBoundingClient.y - (el.clientHeight/2);
        }


        let left = targetBoundingClient.x + target.clientWidth  + 8
        if(window.innerWidth < left + el.clientWidth){
            left = left - (target.clientWidth + 8 + 8 + el.clientWidth);
        }

        Alpine.$data(el).__positions = {
            top: top + 'px',
            left: left + 'px'
        }
        Alpine.$data(el).__visibility = 'visible';
    }, 100)
}


