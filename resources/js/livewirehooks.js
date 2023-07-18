document.addEventListener("DOMContentLoaded", () => {
    Livewire.hook('component.initialized', (component) => {})
    Livewire.hook('element.initialized', (el, component) => {})
    Livewire.hook('element.updating', (fromEl, toEl, component) => {})
    Livewire.hook('element.updated', (el, component) => {})
    Livewire.hook('element.removed', (el, component) => {})
    Livewire.hook('message.sent', (message, component) => {})
    Livewire.hook('message.failed', (message, component) => {})
    Livewire.hook('message.received', (message, component) => {})
    Livewire.hook('message.processed', (message, component) => {})
});

Livewire.on('event-created', event => {
    setTimeout(()=>{
       window.dispatchEvent(new CustomEvent('event-created-' + event.id));
    },10)
})
