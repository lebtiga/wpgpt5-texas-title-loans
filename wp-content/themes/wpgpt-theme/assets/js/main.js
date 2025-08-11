(function() {
  function ready(fn){ if(document.readyState!=='loading'){fn();} else {document.addEventListener('DOMContentLoaded',fn);} }

  ready(function(){
    // Populate year dropdown (last 30 years)
    var yearSelect=document.getElementById('f-year');
    if(yearSelect){
      var current=new Date().getFullYear();
      var start=current; var end=current-30;
      for(var y=start;y>=end;y--){
        var opt=document.createElement('option'); opt.value=String(y); opt.textContent=String(y); yearSelect.appendChild(opt);
      }
    }

    // Accordion
    document.querySelectorAll('[data-accordion]').forEach(function(acc){
      acc.querySelectorAll('.accordion__trigger').forEach(function(btn){
        btn.addEventListener('click',function(){
          var item=btn.closest('.accordion__item');
          if(item){ item.classList.toggle('is-open'); }
        });
      });
    });

    // Sticky CTA show on scroll on mobile
    var sticky=document.querySelector('[data-sticky-cta]');
    if(sticky){
      var toggle=function(){ sticky.style.display = (window.scrollY>400 && window.innerWidth<700) ? 'flex' : 'none'; };
      window.addEventListener('scroll',toggle,{passive:true});
      window.addEventListener('resize',toggle);
      toggle();
    }
  });
})();
