import Alpine from "alpinejs";
import Tab from "./tab.js";
import {livewire_hot_reload} from 'virtual:livewire-hot-reload'
import ContextMenu from "./context-menu.js";

livewire_hot_reload();


Alpine.plugin(Tab);
Alpine.plugin(ContextMenu)
window.Alpine = Alpine;

window.Alpine.start();
