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

    Alpine.directive('dark', ()=>{
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }

        // Whenever the user explicitly chooses light mode
        localStorage.theme = 'light'

        // Whenever the user explicitly chooses dark mode
        localStorage.theme = 'dark'

        // Whenever the user explicitly chooses to respect the OS preference
        localStorage.removeItem('theme')
    });
})

window.Livewire = Livewire
Livewire.start();
