/* SiLiSa - tampilan Operator. JavaScript biasa, tanpa framework.
   Hapus atribut data-demo di <body> saat dipakai di server: form lalu terkirim normal. */
const $=(s,r=document)=>r.querySelector(s),$$=(s,r=document)=>[...r.querySelectorAll(s)];
const R=matchMedia('(prefers-reduced-motion:reduce)').matches,DEMO=document.body.hasAttribute('data-demo');
const fmt=n=>n.toLocaleString('id-ID',{minimumFractionDigits:1,maximumFractionDigits:1}),num=s=>parseFloat(String(s).replace(',','.')),r1=n=>Math.round(n*10)/10;
const COL={'Tandan kosong':'#c48a52','Cangkang':'#e07b2a','Serat':'#e2b24f','Abu boiler':'#8c6a56'};
function count(el,to){const dec=el.dataset.dec!=='0',from=+el.dataset.v||0,t0=performance.now(),show=v=>el.textContent=dec?fmt(v):Math.round(v);el.dataset.v=to;if(R)return show(to);(function f(t){const p=Math.min(1,(t-t0)/900);show(from+(to-from)*(1-Math.pow(1-p,3)));if(p<1)requestAnimationFrame(f)})(t0)}
let tt;function toast(m){const t=$('#toast');t.textContent=m;t.classList.add('s');clearTimeout(tt);tt=setTimeout(()=>t.classList.remove('s'),2600)}
/* dedaunan sawit: pelepah dengan anak daun */
function frond(W,H,n,c1,c2,sw){const P=[[0,0],[W*.5,H*.02],[W,H]],B=t=>[0,1].map(k=>(1-t)*(1-t)*P[0][k]+2*(1-t)*t*P[1][k]+t*t*P[2][k]),T=t=>[0,1].map(k=>2*(1-t)*(P[1][k]-P[0][k])+2*t*(P[2][k]-P[1][k]));
 let s=`<svg class="fl" width="${W}" height="${H}" viewBox="-10 -10 ${W+20} ${H+20}" fill="none" stroke-linecap="round"><path d="M0 0Q${P[1]} ${P[2]}" stroke="${c2}" stroke-width="${sw+1.5}"/>`;
 for(let i=1;i<=n;i++){const t=.06+.9*i/n,[x,y]=B(t),[dx,dy]=T(t),a=Math.atan2(dy,dx),L=(1-t*.78)*W*.34;
  for(const d of[-1,1]){const g=a+d*(1.02-t*.3),ex=x+Math.cos(g)*L,ey=y+Math.sin(g)*L,cx=x+Math.cos(g)*L*.5+Math.cos(a)*L*.28,cy=y+Math.sin(g)*L*.5+Math.sin(a)*L*.28;
   s+=`<path d="M${x.toFixed(1)} ${y.toFixed(1)}Q${cx.toFixed(1)} ${cy.toFixed(1)} ${ex.toFixed(1)} ${ey.toFixed(1)}" stroke="${i%2?c1:c2}" stroke-width="${sw}"/>`}}
 return s+'</svg>'}
$('#f1').innerHTML=frond(430,340,17,'var(--leaf1)','var(--leaf2)',3.2);
$('#f2').innerHTML=frond(300,240,13,'#f1c79a','#e3a46b',2.6);
$('#sf').innerHTML=frond(260,230,12,'#7a5532','#5e3f23',2.4);
for(let i=0;i<9;i++){const l=document.createElement('span');l.className='leaf';l.innerHTML='<svg width="22" height="22"><use href="#lf"/></svg>';
 l.style.cssText=`left:${8+Math.random()*88}%;animation-duration:${16+Math.random()*14}s;animation-delay:-${Math.random()*28}s;scale:${.6+Math.random()*.9}`;document.body.append(l)}
/* logo: tetes minyak, daun sawit, panah daur ulang */
(function(){let s='<svg viewBox="0 0 100 100" width="58" height="58" role="img" aria-label="Logo SiLiSa"><defs><linearGradient id="gA" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#f08e36"/><stop offset="1" stop-color="#a24a1c"/></linearGradient><linearGradient id="gD" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ffc16e"/><stop offset="1" stop-color="#d4570f"/></linearGradient></defs>';
 s+='<g class="lg-a"><path d="M56 16A36 36 0 0 1 84 64" fill="none" stroke="url(#gA)" stroke-width="9"/><polygon points="80.4,73.7 92.3,67.4 75.3,61.2" fill="#d0692a"/><path d="M70.6 81.5A36 36 0 0 1 34.8 84.6" fill="none" stroke="url(#gA)" stroke-width="9"/><polygon points="25.7,80.4 31,92.8 38.6,76.4" fill="#b4551f"/></g><g class="lg-l">';
 const g=['#4f8f2f','#7db047','#386f27'];
 for(let i=0;i<9;i++){const t=i/8,a=(105+t*165)*Math.PI/180,bx=50+21*Math.cos(a),by=52+21*Math.sin(a),dir=105+t*165+30,L=22+10*Math.sin(Math.PI*t)+(i===0?6:0),w=i===0?9:7;
  s+=`<path d="M0 0Q${L/2} -${w} ${L} 0Q${L/2} ${w} 0 0Z" fill="${g[i%3]}" transform="translate(${bx.toFixed(1)} ${by.toFixed(1)}) rotate(${dir.toFixed(1)})"/>`}
 s+='</g><g class="lg-d"><path d="M50 30C58 42 66 50 66 60a16 16 0 0 1-32 0C34 50 42 42 50 30z" fill="url(#gD)"/><ellipse cx="43.500" cy="57" rx="3" ry="6.500" fill="#fff" opacity=".45" transform="rotate(15 43.5 57)"/></g></svg>';
 $('#logo').innerHTML=s})();

/* mode gelap */
const root=document.documentElement,tb=$('#theme');
function setTheme(t){root.dataset.theme=t;tb.setAttribute('aria-pressed',t==='dark');$('#themeState').textContent=t==='dark'?'ON':'OFF'}
setTheme(root.dataset.theme||(matchMedia('(prefers-color-scheme:dark)').matches?'dark':'light'));
tb.onclick=()=>{const t=root.dataset.theme==='dark'?'light':'dark';setTheme(t);try{localStorage.setItem('silisa-theme',t)}catch(e){}};
/* tanggal hari ini */
const iso=new Date(Date.now()-new Date().getTimezoneOffset()*6e4).toISOString().slice(0,10);
$$('input[type=date]').forEach(i=>{if(!i.value)i.value=iso});
$('#today').textContent=new Date().toLocaleDateString('id-ID',{day:'numeric',month:'short',year:'numeric'});
/* angka ringkasan naik dari nol */
$$('[data-count]').forEach(el=>count(el,+el.dataset.count));
/* chip jenis limbah, tersambung ke <select name="jenis_limbah"> */
const sel=$('#jenis'),box=$('#chips');
if(sel&&box){box.innerHTML=[...sel.options].map(o=>`<button type="button" class="chip${o.selected?' on':''}" data-v="${o.value}">${o.text}</button>`).join('');box.hidden=false;sel.classList.add('sr');sel.tabIndex=-1;sel.setAttribute('aria-hidden','true');
 box.onclick=e=>{const c=e.target.closest('.chip');if(!c)return;sel.value=c.dataset.v;sel.dispatchEvent(new Event('change'))};
 sel.onchange=()=>$$('.chip',box).forEach(x=>x.classList.toggle('on',x.dataset.v===sel.value))}
/* perkiraan TKKS saat TBS diisi (rasio ada di data-ratio) */
const est=$('.est'),tbs=$('#tbs');
if(est&&tbs)tbs.addEventListener('input',()=>{const v=num(tbs.value);if(v>0)count($('#est'),r1(v*(+est.dataset.ratio||.22)))});
/* validasi jumlah; angka dikirim dengan titik desimal */
function bind(id,field,done){const f=$(id);if(!f)return;f.addEventListener('submit',e=>{const q=f.elements[field],v=num(q.value);
 if(!(v>0)){e.preventDefault();q.classList.remove('bad');void q.offsetWidth;q.classList.add('bad');q.focus();toast('Isi jumlah dalam ton, misalnya 2,5');return}
 q.value=v;if(DEMO){e.preventDefault();done(v);q.value=''}})}
bind('#fWaste','jumlah',v=>{const n=sel.value,d=new Date(),li=document.createElement('li');li.className='new';
 li.innerHTML=`<span class="dot" style="background:${COL[n]||'#c48a52'}"></span><div class="n"><b>${n}</b><small>${String(d.getHours()).padStart(2,'0')}.${String(d.getMinutes()).padStart(2,'0')}</small></div><span class="q">${fmt(v)} ton</span>`;
 $('#hl').prepend(li);count($('#sL'),r1((+$('#sL').dataset.v||0)+v));toast(n+' '+fmt(v)+' ton tersimpan (contoh)')});
bind('#fTbs','tbs',v=>{count($('#sT'),v);toast('TBS '+fmt(v)+' ton tersimpan (contoh)')});
if(DEMO)$$('[data-t]').forEach(a=>a.addEventListener('click',e=>{e.preventDefault();toast('Halaman '+a.dataset.t+' belum ada di tampilan contoh')}));