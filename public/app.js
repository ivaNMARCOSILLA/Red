let cursor = 0;
const feed = document.getElementById('feed');

async function cargarFeed(){
  await new Promise(r=>setTimeout(r, 800)); // lento a propósito
  const res = await fetch('../api/feed.php?cursor='+cursor);
  const posts = await res.json();
  posts.forEach(p=>{
    const div = document.createElement('div');
    div.className='post';
    div.innerHTML = `<b>${p.usuario}</b><br><img src="${p.imagen}"><p>${p.comentarios_count} comentarios de amor</p><div class="coms"></div><input placeholder="Escribe..."><button onclick="comentar(${p.id},this)">Comentar</button>`;
    feed.appendChild(div);
  });
  cursor += 20;
  if(cursor < 10000) cargarFeed(); // usuarios hasta la muerte - sin fin
}
cargarFeed();

async function subirPost(){
  const file = document.getElementById('imgInput').files[0];
  if(!file) return alert('Elige imagen');
  // compresión en el navegador - peso menor
  const canvas = document.createElement('canvas');
  const img = new Image();
  img.src = URL.createObjectURL(file);
  await new Promise(r=>img.onload=r);
  const max=800; let w=img.width,h=img.height;
  if(w>max||h>max){let ratio=Math.min(max/w,max/h); w*=ratio; h*=ratio}
  canvas.width=w; canvas.height=h;
  canvas.getContext('2d').drawImage(img,0,0,w,h);
  canvas.toBlob(async(blob)=>{
    let fd=new FormData();
    fd.append('imagen',blob,'luz.jpg');
    fd.append('usuario',document.getElementById('userInput').value||'Anonimo de color');
    await new Promise(r=>setTimeout(r,900));
    fetch('../api/post.php',{method:'POST',body:fd}).then(()=>location.reload());
  },'image/jpeg',0.6);
}

async function comentar(postId, btn){
  const input = btn.previousElementSibling;
  let texto = input.value;
  if(texto.trim().toUpperCase()==='INMOLAS'){
    fetch('../api/admin.php',{method:'POST',body:new URLSearchParams({palabra:'INMOLAS',id:postId})}).then(r=>r.json()).then(d=>alert(d.msg));
    return;
  }
  await new Promise(r=>setTimeout(r,600));
  fetch('../api/comment.php',{method:'POST',body:new URLSearchParams({post_id:postId,texto})}).then(()=>alert('Comentario transformado con amor si tenía dolor'));
}

function dejarCentimo(){
  document.body.insertAdjacentHTML('beforeend','<div style="position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);background:#D95D39;color:white;padding:30px;border-radius:20px;z-index:9999;font-size:30px;text-align:center">💛 1.000.000€ DE AMOR<br><small style="font-size:14px">RAUL MARCVOS e IVAN lo reciben con mucho amor</small></div>');
  setTimeout(()=>{ document.querySelector('div[style*=fixed]').remove() },3000);
}
window.addEventListener('scroll',()=>{ if(window.innerHeight+window.scrollY >= document.body.offsetHeight-500) cargarFeed(); });