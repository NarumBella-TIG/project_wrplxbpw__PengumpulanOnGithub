// Chart.js CDN loader
(function(){
    if (!window.Chart) {
        var script = document.createElement('script');
        script.src = 'https://cdn.jsdelivr.net/npm/chart.js';
        script.onload = function() { window.dispatchEvent(new Event('chartjs:loaded')); };
        document.head.appendChild(script);
    }
})();
