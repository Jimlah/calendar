import {Alpine, Livewire} from '../../vendor/livewire/livewire/dist/livewire.esm';
import Tab from "./tab.js";
import ContextMenu from "./context-menu.js";
import {Popover} from "./popover.js";
import "./livewirehooks.js"


Alpine.plugin(Tab);
Alpine.plugin(ContextMenu)
Alpine.plugin(Popover);
window.addEventListener('alpine:init', ()=>{
    Alpine.directive('autosize', (el, _, {cleanup})=>{
        const handler = () => {
            el.style.height = 'auto';
            el.style.height = el.scrollHeight + 'px'
        };

        el.addEventListener('input', handler)

        cleanup(()=>{
            el.removeEventListener('input', handler)
        })

    })

    Alpine.directive('time', (el,_, {Alpine}) =>{
        Alpine.bind(el, ()=>({
            ['x-data'](){
                return {
                    init(){
                        this.time = new Date()

                        this.$nextTick(()=>{
                            setInterval(()=>{
                                this.time = new Date();
                            }, 1000)
                        })

                        this.$watch('time', (v)=>{
                            let minutes = (v.getHours() * 60) + (v.getMinutes());
                            let totalMinutes = 24 * 60
                            let height = this.$el.parentElement.scrollHeight;
                            this.top = height * (minutes / totalMinutes);
                        })
                    },
                    time: null,
                    top: 0,
                    calculatePosition(){

                    }
                }
            },
            ['x-bind:style'](){
                return {
                    top: this.$data.top + 'px'
                }
            }
        }));
    })
})

window.Livewire = Livewire
Livewire.start();
