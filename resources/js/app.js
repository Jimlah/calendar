import Alpine from "alpinejs";
import Tab from "./tab.js";
import {livewire_hot_reload} from 'virtual:livewire-hot-reload'
import ContextMenu from "./context-menu.js";
import {Popover} from "./popover.js";
import "./livewirehooks.js"

livewire_hot_reload();


Alpine.plugin(Tab);
Alpine.plugin(ContextMenu)
Alpine.plugin(Popover);
window.Alpine = Alpine;

window.Alpine.start();
