/* ===== SiLiSa BG: JS (partikel, jendela pabrik, spotlight, tilt logo; salin sebelum </body>) ===== */
(function(){
  var NS='http://www.w3.org/2000/svg';
  var wg=document.getElementById('sb-wins');
  if(wg){[[46,266,4,3,26,28],[574,290,5,3,28,22],[738,166,3,7,18,24]].forEach(function(g){
    for(var r=0;r<g[3];r++)for(var k=0;k<g[2];k++){ if(Math.random()<.32) continue;
      var e=document.createElementNS(NS,'rect'); e.setAttribute('x',g[0]+k*g[4]); e.setAttribute('y',g[1]+r*g[5]);
      e.setAttribute('width',6); e.setAttribute('height',9); e.setAttribute('class','win');
      e.style.animationDuration=(3+Math.random()*7).toFixed(1)+'s'; e.style.animationDelay=(-Math.random()*8).toFixed(1)+'s'; wg.appendChild(e); var gl=document.getElementById('sb-wg'); if(gl) gl.appendChild(e.cloneNode());}
  });}

  var tk=document.querySelector('.silisa-bg .truck'); if(tk){var t2=tk.cloneNode(true); t2.classList.add('b'); tk.parentNode.appendChild(t2);}
  var bg=document.querySelector('.silisa-bg'), c=document.getElementById('sb-fx'); if(!bg||!c) return;
  var host=bg.parentElement, mill=bg.querySelector('.mill'), wrap=document.getElementById('logoWrap'), img=document.getElementById('logoImg');
  if(wrap&&img) wrap.style.setProperty('--logo','url("'+img.getAttribute('src')+'")');
  var x=c.getContext('2d'), reduce=matchMedia('(prefers-reduced-motion: reduce)').matches;
  var W,H,dpr,ps=[],mx=0,my=0,tx=0,ty=0,R=function(a,b){return a+Math.random()*(b-a)};
  function mk(init){
    var t=Math.random(), z=R(.35,1), type=t<.28?'fiber':t<.48?'ash':t<.66?'ember':t<.86?'leaf':'drop';
    return {type:type,z:z,x:R(0,W),y:init?R(0,H):H+20,
      vy:-R(.16,.46)*(type==='ember'?1.7:type==='leaf'?.6:1)*z, vx:R(-.12,.12),
      r:type==='fiber'?R(6,15)*z:type==='leaf'?R(8,17)*z:type==='drop'?R(3,6.5)*z:R(1,2.6)*z,
      a:R(.35,.8),rot:R(0,6.28),vr:R(-.012,.012),ph:R(0,6.28),l:1,ch:false};
  }
  function size(){
    dpr=Math.min(window.devicePixelRatio||1,2); W=host.clientWidth; H=host.clientHeight; host.style.setProperty('--mh',mill.offsetHeight+'px');
    c.width=W*dpr; c.height=H*dpr; x.setTransform(dpr,0,0,dpr,0,0);
    var n=Math.max(40,Math.min(100,Math.round(W*H/13000))); ps=[]; for(var i=0;i<n;i++) ps.push(mk(true));
  }
  function draw(p,t){
    var fade=Math.max(0,Math.min(1,p.y/(H*.2),(H-p.y)/40+.4))*p.l; if(fade<=0) return;
    var a=p.a*fade, px=p.x+mx*36*p.z, py=p.y+my*22*p.z;
    x.save(); x.translate(px,py);
    if(p.type==='fiber'){
      x.rotate(p.rot); x.strokeStyle='rgba(196,138,82,'+a+')'; x.lineWidth=1.2*p.z+.3;
      x.beginPath(); x.moveTo(-p.r,0); x.quadraticCurveTo(0,-p.r*.7,p.r,0); x.stroke();
    }else if(p.type==='ash'){
      x.fillStyle='rgba(222,205,192,'+(a*.45)+')'; x.beginPath(); x.arc(0,0,p.r,0,6.283); x.fill();
    }else if(p.type==='leaf'){
      x.rotate(p.rot+Math.sin(t/900+p.ph)*.7); var r=p.r;
      x.fillStyle='rgba(226,172,92,'+(a*.8)+')'; x.beginPath(); x.moveTo(0,-r); x.quadraticCurveTo(r*.75,0,0,r); x.quadraticCurveTo(-r*.75,0,0,-r); x.fill();
      x.strokeStyle='rgba(95,50,20,'+a+')'; x.lineWidth=.8; x.beginPath(); x.moveTo(0,-r); x.lineTo(0,r); x.stroke();
    }else if(p.type==='drop'){
      var d=p.r; x.fillStyle='rgba(224,138,60,'+(a*.9)+')'; x.beginPath(); x.moveTo(0,-d*1.5); x.quadraticCurveTo(d*1.1,d*.3,0,d); x.quadraticCurveTo(-d*1.1,d*.3,0,-d*1.5); x.fill();
      x.fillStyle='rgba(255,240,215,'+(a*.8)+')'; x.beginPath(); x.ellipse(-d*.3,-d*.1,d*.18,d*.35,.4,0,6.283); x.fill();
    }else{
      var f=.7+.3*Math.sin(t/260+p.ph), g=x.createRadialGradient(0,0,0,0,0,p.r*5);
      x.globalCompositeOperation='lighter'; g.addColorStop(0,'rgba(255,170,80,'+(a*f)+')'); g.addColorStop(1,'rgba(224,138,60,0)');
      x.fillStyle=g; x.beginPath(); x.arc(0,0,p.r*5,0,6.283); x.fill();
    }
    x.restore();
  }
  var chim=0;
  function frame(t){
    x.clearRect(0,0,W,H); mx+=(tx-mx)*.06; my+=(ty-my)*.06;
    if(chim<16&&Math.random()<.1){var e=mk(false); e.type='ember'; e.ch=true; e.l=1; e.r=R(1.6,3);
      e.x=W*.139+R(-4,4); e.y=H-mill.offsetHeight*(1-82/400); e.vx=R(-.1,.6); e.vy=-R(.5,1.3); e.z=1; e.a=.9; ps.push(e); chim++;}
    for(var i=ps.length-1;i>=0;i--){
      var p=ps[i]; p.x+=p.vx+Math.sin(t/1800+p.ph)*.18; p.y+=p.vy; p.rot+=p.vr;
      if(p.ch){p.l-=.006; if(p.l<=0){ps.splice(i,1);chim--;continue;}}
      else if(p.y<-24||p.x<-30||p.x>W+30){ps[i]=mk(false);continue;}
      draw(p,t);
    }
    bg.style.setProperty('--sx',((mx+.5)*100).toFixed(1)+'%'); bg.style.setProperty('--sy',((my+.5)*100).toFixed(1)+'%');
    bg.style.setProperty('--px',(-mx*16).toFixed(1)+'px');
    if(wrap) wrap.style.transform='perspective(900px) rotateY('+(mx*10).toFixed(2)+'deg) rotateX('+(-my*8).toFixed(2)+'deg)';
    requestAnimationFrame(frame);
  }
  host.addEventListener('mousemove',function(e){var b=host.getBoundingClientRect(); tx=(e.clientX-b.left)/b.width-.5; ty=(e.clientY-b.top)/b.height-.5;});
  host.addEventListener('mouseleave',function(){tx=0;ty=0;});
  window.addEventListener('resize',size); size();
  if(reduce){for(var i=0;i<ps.length;i++) draw(ps[i],0);} else requestAnimationFrame(frame);
})();
/* ===== akhir JS SiLiSa BG ===== */

(function(){
  var form=document.getElementById('login-form'), s1=document.getElementById('langkah-peran'), s2=document.getElementById('langkah-akun'),
      sub=document.getElementById('sub-login'), badge=document.getElementById('peran-terpilih'), pw=document.getElementById('password'),
      go=document.getElementById('goBtn'), nama={operator:'Operator',manajer:'Manajer',admin:'Admin'};
  function peran(){return form.querySelector('input[name="peran"]:checked').value}
  function langkah2(){badge.textContent=nama[peran()];s1.hidden=true;s2.hidden=false;sub.textContent='Masuk dengan email dan password akunmu.';document.getElementById('email').focus()}
  function langkah1(){s2.hidden=true;s1.hidden=false;sub.textContent='Pilih peran untuk melanjutkan.'}
  document.getElementById('btn-lanjut').addEventListener('click',langkah2);
  document.getElementById('btn-ganti').addEventListener('click',langkah1);
  document.getElementById('btn-lihat').addEventListener('click',function(){var t=pw.type==='password';pw.type=t?'text':'password';this.textContent=t?'Sembunyikan':'Tampilkan'});
  form.addEventListener('submit',function(e){
    if(!s1.hidden){e.preventDefault();langkah2();return}
    go.classList.add('loading');go.querySelector('.lbl').textContent='Memuat…';
  });
  window.addEventListener('pageshow',function(){go.classList.remove('loading');go.querySelector('.lbl').textContent='Masuk'});
  badge.textContent=nama[peran()];
  if(!s2.hidden) sub.textContent='Masuk dengan email dan password akunmu.';
})();

(function(){
  var card=document.querySelector('.card'); if(!card) return;
  card.addEventListener('pointermove',function(e){
    var b=card.getBoundingClientRect();
    card.style.setProperty('--cx',(e.clientX-b.left)+'px');
    card.style.setProperty('--cy',(e.clientY-b.top)+'px');
  });
})();